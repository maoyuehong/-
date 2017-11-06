<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\WWW\thinsone\public/../application/admin\view\lesson\index.html";i:1509345682;}*/ ?>
<!DOCTYPE html>
<html>



<head>
    <meta charset="utf-8">
    <link rel="Shortcut Icon Bookmark" type="image/x-icon" href="/static/admin/img/favicon.ico">
    <title> 网站后台管理系统</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <style>
        .mobile {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            filter: alpha(opacity = 75);
            -moz-opacity: .75;
            -khtml-opacity: .75;
            background-color: rgba(0, 0, 0, 0.55);
            z-index: 9998;
        }
        .preview {
            position: fixed;
            display: block;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            width: 322px;
            height: 642px;
            margin:auto;
            z-index: 9999;
            background: transparent url('/static/admin/img/bg_mobile.png') no-repeat 0 0;
        }

    </style>

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/static/admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">


</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span><img alt="image" class="img-circle" src="/static/admin/img/logo.jpg" /></span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <?php if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): if( count($res)==0 ) : echo "" ;else: foreach($res as $key=>$v): ?>
                               <span class="block m-t-xs"><strong class="font-bold"><?php echo $v['a_name']; ?></strong></span>
                                <span class="text-muted text-xs block"><?php echo $v['a_nickname']; ?><b class="caret"></b></span>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">

                               <!-- <li><a class="J_menuItem" href="profile.html">个人资料</a>
                                </li>-->
                                <li class="divider"></li>
                                <li><a onclick="if(!confirm('你确定要退出嘛？')) {return false}" href="<?php echo url('/admin/index/logout'); ?>" target="_top">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element" >+
                        </div>
                    </li>
                    <?php if(is_array($authinfoA) || $authinfoA instanceof \think\Collection || $authinfoA instanceof \think\Paginator): if( count($authinfoA)==0 ) : echo "" ;else: foreach($authinfoA as $key=>$v): ?>
                    <li>

                        <a href="#balance-scale">
                            <i class="fa fa-balance-scale"></i>
                            <span class="nav-label"><?php echo $v['auth_name']; ?></span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <?php if(is_array($authinfoB) || $authinfoB instanceof \think\Collection || $authinfoB instanceof \think\Paginator): if( count($authinfoB)==0 ) : echo "" ;else: foreach($authinfoB as $key=>$vv): if($vv['auth_pid'] == $v['auth_id']): ?>
                            <li>
                                <a class="J_menuItem" href="/admin/<?php echo $vv['auth_c']; ?>/<?php echo $vv['auth_a']; ?>" data-index="0" target="rightframe"><?php echo $vv['auth_name']; ?></a>
                            </li>
                            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </ul>

                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                            <i class="fa fa-bars"></i> 菜单
                        </a>
                        <a class="minimalize-styl-2 btn btn-primary " onclick="look()"  >
                            <i class="fa fa-television"></i> 手机模拟
                        </a>


                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <?php if($cont == 0): else: ?>
                            <a class="dropdown count-info J_menuItem" href="/admin/withdrawals/status">
                                申请列表
                                <i class="fa fa-users"></i>
                                <span class="label label-warning" id="join_count"><?php echo $cont; ?></span>
                            </a>
                            <?php endif; ?>
                        </li>
                        <li class="dropdown hidden-xs">

                            <a href="__URL__/cache" title="清除缓存">
                                <i class="fa fa-trash"></i>
                                清除缓存
                            </a>
                        </li>
                        <li class="dropdown hidden-xs">
                            <a class="right-sidebar-toggle" aria-expanded="false">
                                <i class="fa fa-tasks"></i>
                                主题
                            </a>
                        </li>
                    </ul>
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
                <a href="/admin/index/logout" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
            </div>
            <div class="row J_mainContent" id="content-main">
                <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="index_v148b2.html?v=4.0" frameborder="0" data-id="index_v1.html" seamless></iframe>
            </div>
            <div class="footer">

                </div>
            </div>
        </div>
        <!--右侧部分结束-->
        <!--右侧边栏开始-->
        <div id="right-sidebar">
            <div class="sidebar-container">

                <ul class="nav nav-tabs navs-3">

                    <li class="active">
                        <a data-toggle="tab"  style="background-color:rgb(255,255,255)">

                        </a>
                    </li>
                    <li class="active">
                        <a data-toggle="tab" href="#tab-1" >
                            <i class="fa fa-gear"></i> 主题
                        </a>
                    </li>

                </ul>

                <div class="tab-content">
                    <div id="tab-1" class="tab-pane active">
                        <div class="sidebar-title">
                            <h3> <i class="fa fa-comments-o"></i> 主题设置</h3>
                            <small><i class="fa fa-tim"></i> 你可以从这里选择和预览主题的布局和样式，这些设置会被保存在本地，下次打开的时候会直接应用这些设置。</small>
                        </div>
                        <div class="skin-setttings">
                            <div class="title">主题设置</div>
                            <div class="setings-item">
                                <span>收起左侧菜单</span>
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                                        <label class="onoffswitch-label" for="collapsemenu">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                <span>固定顶部</span>

                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="fixednavbar" class="onoffswitch-checkbox" id="fixednavbar">
                                        <label class="onoffswitch-label" for="fixednavbar">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="setings-item">
                                <span>
                        固定宽度
                    </span>

                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                        <label class="onoffswitch-label" for="boxedlayout">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="title">皮肤选择</div>
                            <div class="setings-item default-skin nb">
                                <span class="skin-name ">
                         <a href="#" class="s-skin-0">
                             默认皮肤
                         </a>
                    </span>
                            </div>
                            <div class="setings-item blue-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-1">
                            蓝色主题
                        </a>
                    </span>
                            </div>
                            <div class="setings-item yellow-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-3">
                            黄色/紫色主题
                        </a>
                    </span>
                            </div>
                        </div>
                    </div>

        </div>
            </div>
        </div>


    <script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
    <script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
    <script src="/static/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/static/admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/static/admin/js/plugins/layer/layer.min.js"></script>
    <script src="/static/admin/js/hplus.min.js?v=4.1.0"></script>
    <script type="text/javascript" src="/static/admin/js/contabs.min.js"></script>
    <script src="/static/admin/js/plugins/pace/pace.min.js"></script>
                <script>

 function look(){

     if(document.querySelector('.mobile')==null){
         var str="<div class='mobile'><div class='preview'><iframe height='530' width='320' style='margin-top: 60px;margin-left: 1px;' src='__ROOT__/home/'></iframe></div></div>";
         $("body").append(str);
         $('.mobile').on('click',function(e){$(this).fadeOut(300)});
     }else{
         $('.mobile').fadeIn(300);
     }






 }


                </script>


</body>



<!-- Mirrored from www.zi-han.net/theme/hplus/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:17:11 GMT -->
</html>
