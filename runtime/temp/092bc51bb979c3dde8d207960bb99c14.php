<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\WWW\thinsone\public/../application/admin\view\level\add.html";i:1509364337;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="__PUBLIC__/admin/images/icon.png">
    <link href="/static/admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
</head>
<body>

<form action="" method="post">


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="form-horizontal m-t">
            <div class="form-group">
                <label class="col-sm-2 control-label">用户名：</label>
                <div class="col-sm-8">
                    <input type="text"  class="form-control" placeholder="请输入你的用户名（由字母和数字组成）"  id="m_user" name="m_user" style="width:50%;"  value="">
                </div>
            </div>
            <div class="form-horizontal m-t">
                <div class="form-group">
                    <label class="col-sm-2 control-label">手机号码：</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" min="1" placeholder="请输入你的手机号码" id="m_mobile" name="m_mobile" style="width:50%;"  value="">
                    </div>
                </div>

                <div class="form-horizontal m-t">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">推荐人用户名：</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="请输入你的推荐人用户名（由字母和数字组成）"  id="m_profit" name="m_introducer" style="width:50%;"  value="">
                        </div>
                    </div>
                    <div class="form-horizontal m-t">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">密码：</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" placeholder="请输入你的密码"  name="password" style="width:50%;" value="">
                            </div>
                        </div>
                        <div class="form-horizontal m-t">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">重复密码：</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" placeholder="请重复你的密码"   name="password_two" style="width:50%;" value="">
                                </div>
                            </div>





                            <div class="form-group">
                                                                <div class="col-sm-8 col-sm-offset-2">
                                                                    <button class="btn btn-primary" type="submit"  style="width: 20%;">添加</button>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


</form>

<div class="gohome">


</div>
<script src="/static/admin/js/jquery-1.8.2.min.js"></script>
<script src="/static/admin/layer/layer.js"></script>

<script src='/static/admin/js/laydate/laydate.js'></script>
</body>
</html>
