<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\WWW\thinsone\public/../application/admin\view\payment\showlist.html";i:1509952278;}*/ ?>
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
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row m-b-xs">
    <div class="col-sm-9"></div>
    <div class="col-sm-3">
      <div class="input-group">
        <input type="text" id="info" placeholder="请输入用户名或手机号码" class="input-sm form-control" value="<?php echo $res; ?>">
        <span class="input-group-btn"><button type="button" class="btn btn-sm btn-primary" onclick="search();"> 搜索</button> </span>
      </div>
    </div>
  </div>
  <table class="table table-hover">
    <thead>
    <tr>
      <th>ID</th>
      <th>会员【电话】</th>
      <th>备注信息</th>
      <th>充值金额</th>
      <th>状态</th>
      <th>充值时间</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$v): ?>
    <tr>
      <td><?php echo $v['p_id']; ?></td>
      <td><?php echo $v['m_user']; ?>【<?php echo $v['m_mobile']; ?>】</td>
      <td><?php echo $v['p_info']; ?></td>
      <td><?php echo $v['p_money']; ?></td>
      <td>
        <?php switch($v['p_state']): case "1": ?>待付款<?php break; case "2": ?>已成功<?php break; endswitch; ?></td>
      <td><?php echo date("Y-m-d H:i:s",$v['p_time']); ?></td>
      <td>
<!--        <button class="btn btn-success btn-xs" type="button" onclick="edit();"><i class="fa fa-edit"></i> 编辑</button>-->
        <!--<button class="btn btn-danger btn-xs" type="button" onclick="dele();"><i class="fa fa-trash"></i> 删除</button>-->
      </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <tfoot>
    <tr>
      <td colspan="100" align="right">
 <?php echo $info->render(); ?>
      </td>
    </tr>
    </tfoot>
    </tbody>
  </table>
</div>
<div class="gohome">
  <a class="animated bounceInUp" href="javascript:location.replace(location.href);" title="刷新" style="position:fixed;bottom:20px;right:20px;z-index:100;"><i class="fa fa-repeat"></i></a>
<!--  <a class="animated bounceInUp" href="javascript:$('body,html').animate({scrollTop:0},500);" title="TOP">Top</a>-->
</div>
<script src="/static/admin/js/jquery-1.8.2.min.js"></script>
<script src="/static/admin/layer/layer.js"></script>
<script type="text/javascript">
    var SubmitOrHidden = function(event) {
        e = event ? event : (window.event ? window.event : null);
        if (e.keyCode == 13) {
            search();
        }
    }
    window.document.onkeydown = SubmitOrHidden;
  /* 搜索 */
  function search(){
      var info = $("#info").val();
      window.location="__URL__/showlist?info="+info;
  }

</script>
</body>
</html>
