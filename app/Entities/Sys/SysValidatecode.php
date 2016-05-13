<?php
/**
 * Created by PhpStorm.
 * User: fengyell <Luohaihua@misrobot.com>
 * Date: 2015/11/11
 * Time: 14:47
 */

namespace App\Entities\Sys;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Entities\User;

class SysValidatecode extends Model
{
    protected $connection	=	'sys';
    protected $table 		= 	'sys_validatecode';
    protected $fillable 	=	["id","uid","mobile","expiretime","type","code","email"];
    public function makeRandStr($length){
        $str='';
        $i=0;
        for($i;$i<$length;$i++)
        {
            $str.=rand(0,9);
        }
        return $str;
    }


    /**
     * 获取用户绑定验证码
     */
    public function getMobileVerify($mobile,$uid){
        $data=[
            'uid'=>$uid,
            'mobile'=>$mobile,
            'expiretime'=>time()+1800,
            'type'=>1,
            'code'=>$this->makeRandStr(6),
            'email'=>''
        ];
        try{
            $verify= $this->create($data);
            if($verify)
            {
                return $verify;
            }
            else
            {
                throw(new \Exception('验证码存储失败'));
            }
        }
        catch(\Exception $ex)
        {
            throw($ex);
        }
    }

    /**
     * 获取手机注册验证码
     */
    public function getMobileRegVerify($mobile){
        $data=[
            'uid'=>0,
            'mobile'=>$mobile,
            'expiretime'=>time()+1800,
            'type'=>1,
            'code'=>$this->makeRandStr(6),
            'email'=>''
        ];
        try{
            $verify= $this->create($data);
            if($verify)
            {
                return $verify;
            }
            else
            {
                throw(new \Exception('验证码存储失败'));
            }
        }
        catch(\Exception $ex)
        {
            throw($ex);
        }
    }

    public function getMobileResetPasswordVerify($mobile){
        try{
            //查询 当前手机号 是否有 有效的验证码 TODO: Zhoufuxiang 2016-3-9
            $result = $this->judgeCode($mobile, 2);
            if(is_null($result)){
                $data=[
                    'uid'=>0,
                    'mobile'=>$mobile,
                    'expiretime'=>time()+1800,
                    'type'=>2,
                    'code'=>$this->makeRandStr(6),
                    'email'=>''
                ];
                $verify= $this->create($data);
                if($verify)
                {
                    return $verify;
                }
                else
                {
                    throw(new \Exception('验证码存储失败'));
                }

            }else{
                return $result;
            }
        }
        catch(\Exception $ex)
        {
            throw($ex);
        }
    }

    /* TODO: Zhoufuxiang 2016-3-9
     * 查询 手机号 是否有 有效的验证码
     */
    public function judgeCode($mobile, $type){
        return $this->where('mobile', $mobile)->where('type',2)->where('expiretime','>',time())->first();
    }
}