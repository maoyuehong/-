<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\WWW\thinsone\public/../application/admin\view\manager\upd.html";i:1508465647;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/static/admin/images/icon.png">
    <link href="/static/admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
</head>

<form action="" method="post">
<?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$v): ?>

<div class="wrapper wrapper-content animated fadeInRight">
    <input type="hidden" name="a_id" value="<?php echo $v['a_id']; ?>">
    <div class="form-horizontal m-t">
        <div class="form-group">
            <label class="col-sm-3 control-label">昵称：</label>
            <div class="col-sm-8">
                <input type="text" id="nickname" name="a_nickname" class="form-control" placeholder="请输入昵称" value="<?php echo $v['a_nickname']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">用户名：</label>
            <div class="col-sm-8">
                <input type="text" id="name"  name="a_name" class="form-control" placeholder="请输入用户名" value="<?php echo $v['a_name']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">密码：</label>
            <div class="col-sm-8">
                <input type="password" id="password" name="a_password" class="form-control" placeholder="请输入登录密码">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">确认密码：</label>
            <div class="col-sm-8">
                <input type="password" id="password_two" name="password_two" class="form-control" placeholder="请输入确认密码">
                <span class="help-block m-b-none">
						<i class="fa fa-info-circle"></i> 密码由字母、数字和标点符号组成（至少5位-20位）
					</span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-8 col-sm-offset-3">
                <button class="btn btn-primary" type="submit"  >提交</button>
                <a href="javascript:history.back()"><button class="btn btn-primary" type="button"  >返回</button></a>
            </div>
        </div>
    </div>

</div>

<?php endforeach; endif; else: echo "" ;endif; ?>
</form>
<script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
<script type="text/javascript" src="/static/admin/layer/layer.js"></script>
<script type="text/javascript">

</script>
</body>
</html>
