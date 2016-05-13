<!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:16:41 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>Mr.Stock 管理后台</title>

    <meta name="keywords" content="Mr.Stock 管理后台">
    <meta name="description" content="Mr.Stock 管理后台">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <link href="{{asset('h+/css/bootstrap.min14ed.css')}}" rel="stylesheet">
    <link href="{{asset('h+/css/font-awesome.min93e3.css')}}" rel="stylesheet">
    <link href="{{asset('h+/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('h+/css/style.min862f.css')}}" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">
    <?php
    $errorsInfo =(array)$errors->getMessages();
    if(!empty($errorsInfo)){
        $errorsInfo = array_shift($errorsInfo);
    }
    ?>
    @forelse($errorsInfo as $errorItem)
        <div class="pnotice" style="display: none;">{{$errorItem}}</div>
    @empty
    @endforelse

    <!--左侧导航开始-->
    @include('layouts/left')
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0; display: none">
                <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

                </div>
            </nav>
        </div>
        <div class="row content-tabs">
            <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
            </button>
            <nav class="page-tabs J_menuTabs">
                <div class="page-tabs-content">
                    <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">首页</a>
                </div>
            </nav>
            <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
            </button>
            <div class="btn-group roll-nav roll-right">
                <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>

                </button>
                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                    <li class="J_tabShowActive"><a>定位当前选项卡</a>
                    </li>
                    <li class="divider"></li>
                    <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                    </li>
                    <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                    </li>
                </ul>
            </div>
            <a href="{{ url('/logout') }}" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
        </div>
        <div class="row J_mainContent" id="content-main">
            <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="" frameborder="0" data-id="index_v1.html" seamless></iframe>
        </div>
        <div class="footer">
            <div class="pull-right">&copy; 2016-2020 <a href="javascript:void(0)" target="_blank">tangjun</a>
            </div>
        </div>
    </div>
    <!--右侧部分结束-->

    <!--右侧边栏结束-->

</div>
<script src="{{asset('h+/js/jquery.min.js')}}"></script>
<script src="{{asset('h+/js/bootstrap.min.js')}}"></script>
<script src="{{asset('h+/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('h+/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('h+/js/plugins/layer/layer.min.js')}}"></script>
<script src="{{asset('h+/js/hplus.min.js')}}"></script>
<script type="text/javascript" src="{{asset('h+/js/contabs.min.js')}}"></script>
<script src="{{asset('h+/js/plugins/pace/pace.min.js')}}"></script>
</body>
<script>
    $(function(){
        //错误提示
        var msg = $('.pnotice').text();
        if(msg==''){
            $("#passwdTip").css('display','none');
            return;
        }else{
            $("#passwdTip").css('display','block');
        }
    })
</script>

<!-- Mirrored from www.zi-han.net/theme/hplus/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:17:11 GMT -->
</html>