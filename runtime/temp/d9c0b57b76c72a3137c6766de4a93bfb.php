<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\WWW\thinsone\public/../application/admin\view\index\index.html";i:1509508035;}*/ ?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.zi-han.net/theme/hplus/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:49 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="Shortcut Icon Bookmark" type="image/x-icon" href="/static/admin/img/favicon.ico">
    <title> 网站后台管理系统</title>

    <link href="/static/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/style.min.css" rel="stylesheet">
    <link href="/static/admin/css/login.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />

    <![endif]-->
    <script>
        if(window.top!==window.self){window.top.location=window.location};
    </script>

</head>

<body class="signin" onkeydown="keyLogin();">
    <div class="signinpanel">
        <div class="row">
            <div class="col-sm-7">
                <div class="signin-info">
                    <div class="logopanel m-b">

                    </div>

            </div>
            <div class="m-b" >

                    <h4 class="no-margins">登录：</h4>
                    <p class="m-t-md"></p>
                    <input type="text" class="form-control uname" placeholder="用户名" name="username" id="username" style="width: 260px;" onkeydown=KeyDown()>
                    <input type="password" class="form-control pword m-b" placeholder="密码"  name="password"  id="password" style="width: 260px" onkeydown=KeyDown()>
                   <input  type="text"  name="verify" id="verify" placeholder="验证码"  style="width: 150px;height: 32px;color:black;" onkeydown=KeyDown()><img id="captcha_img"  src="<?php echo captcha_src(); ?>" alt="点击刷新" onclick="gg()"><a
                    href="javascript:gg()"></a>

                <input type="button" class="btn btn-success btn-block" value="登录" name="btnsubmit" onclick="login()" style="width: 260px">

            </div>
        </div>
        <div class="signup-footer">
            <div class="pull-left">

            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="/static/admin/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/static/admin/layer/layer.js"></script>
<!--<script type="text/javascript" src="/static/admin/layer/theme/default/layer.css"></script>-->

<script type="text/javascript">
    var SubmitOrHidden = function(event) {
        e = event ? event : (window.event ? window.event : null);
        if (e.keyCode == 13) {
            login();
        }
    }
    window.document.onkeydown = SubmitOrHidden;
    function login(){
        //layer.alert('111111111',{icon:6});
        var username=$('[name=username]').val();
        var password=$('[name=password]').val();
        var verify=$('[name=verify]').val();
        $.ajax({
            type:'post',
            url:'/admin/index/index',
            dataType:'json',
            data:{
                'username':username,
                'password':password,
                'verify':verify,
            },
            success:function(ret){
                //console.log(ret);
                if(ret.status==0){
                   // $('#sendresult').html(ret['msg']);
                    //window.location.href = '/admin/lesson/index';
                   //alert(ret['msg']);
                  layer.msg(ret['msg'],{icon:6,time:2000},function(){
                      window.location.href = '/admin/lesson/index';
                  })
                    $('.layui-layer-content').css('color','#11CD6D');

                }else{
                //alert(11111);
                    //$('#sendresult').html(ret['msg']);
                    layer.msg(ret['msg'],{icon:5,time:2000});
                    refresh($('#captcha_img'));
                    $('.layui-layer-content').css('color','red');
                }
            }
        })
    }
    function gg(){
        var ts=Date.parse(new Date());
        $('#captcha_img').attr('src','/captcha?id='+ts);
    }

    function refresh(obj){
        obj.attr('src',"/captcha?id="+Math.random());
    }
</script>


<!-- Mirrored from www.zi-han.net/theme/hplus/login_v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:19:52 GMT -->
</html>
