<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\WWW\thinsone\public/../application/admin\view\recharge\showlist.html";i:1509327377;}*/ ?>
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
    <input type="hidden" name="a_id" value="<?php echo $v['d_id']; ?>">
    <div class="form-horizontal m-t">
      <div class="form-group">
        <label class="col-sm-3 control-label">一级推荐人:</label>
        <div class="input-group m-b" style="width: 15%">
          <input type="text"  name="d_a" placeholder="请输入一级推荐人收益"    class="form-control"  value="<?php echo $v['d_a']; ?>" >
          <span class="input-group-addon">%</span>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">二级推荐人：</label>
        <div class="input-group m-b" style="width: 15%">
          <input type="text"   name="d_b" placeholder="请输入二级推荐人收益"     class="form-control"  value="<?php echo $v['d_b']; ?>">
          <span class="input-group-addon">%</span>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">三级推荐人:</label>
        <div class="input-group m-b" style="width: 15%">
          <input type="text" name="d_c" placeholder="请输入三级推荐人收益"   class="form-control" value="<?php echo $v['d_c']; ?>">
          <span class="input-group-addon">%</span>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-8 col-sm-offset-3">
          <button class="btn btn-primary" type="submit"  >提交</button>

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
