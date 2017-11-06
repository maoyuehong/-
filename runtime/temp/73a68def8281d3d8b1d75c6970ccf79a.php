<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\WWW\thinsone\public/../application/admin\view\member\dateils.html";i:1509949199;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <!--<link rel="icon" type="image/png" href="__PUBLIC__/admin/images/icon.png">-->
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
        <span class="input-group-btn"><button type="button" class="btn btn-sm btn-primary" onclick="search();">搜索 </button> </span>
      </div>
    </div>
  </div>

  <table class="table table-hover">
    <thead>
    <tr>
      <th>ID</th>
      <th>会员账号</th>
      <th>姓名</th>
      <th>手机号码</th>

      <th>总收益</th>
      <th>总资产</th>

      <th>最后登录时间</th>
      <th>注册时间</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$v): ?>
    <tr>
      <td><?php echo $v['m_id']; ?></td>
      <td><?php echo $v['m_user']; ?></td>
      <td><?php echo $v['m_name']; ?></td>
      <td><?php echo $v['m_mobile']; ?></td>

      <td><?php echo $v['m_profit']; ?></td>
      <td><?php echo $v['m_assets']; ?></td>


      <td><?php echo date("Y-m-d H:i:s",$v['m_last_login']); ?></td>
      <td><?php echo date("Y-m-d H:i:s",$v['m_time']); ?></td>

      <td>
        <a href="<?php echo url('upd',array('m_id'=>$v['m_id'])); ?>"><button class="btn btn-success btn-xs" type="button"><i class="fa fa-edit"></i> 编辑</button></a>
      <button class="btn btn-warning btn-xs" type="button" onclick="edit('详情信息','__URL__/information?list=1&id=<?php echo $v['m_id']; ?>')"><i class="fa fa-edit"></i> 详情信息</button>
      <button class="btn btn-success btn-xs" type="button" onclick="look('查看团队','__URL__/look1?index=1&id=<?php echo $v['m_id']; ?>')"><i class="fa fa-edit"></i> 查看团队</button>
        <a href="<?php echo url('lookup',array('m_id'=>$v['m_id'])); ?>"><button class="btn btn-xs btn-danger" type="button" ><i class="fa fa-edit"></i> 修改资产</button></a>
       <button class="btn btn-xs btn-info" type="button" onclick="look1('代理中心','__URL__/agent?test=1&id=<?php echo $v['m_id']; ?>')" ><i class="fa fa-edit"></i> 代理中心</button>
       <button class="btn btn-xs btn-info" type="button" onclick="look1('代理中心','__URL__/area?index=1&id=<?php echo $v['m_id']; ?>')" ><i class="fa fa-edit"></i> 区业绩查看</button>

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
 <!-- <a class="animated bounceInUp" href="javascript:$('body,html').animate({scrollTop:0},500);" title="TOP">Top</a>-->
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
     window.location="__URL__/details?info="+info;

  }
  /*编辑*/
  function edit(title,url) {
      layer.open({
          type: 2,
          area: ['50%',$(window).height()-100+'px'],
          fix: false, //不固定
          maxmin: true,
          shade:0.4,
          title: title,
          content: url
      });
  }
  /*一级推荐人*/
  function look(title,url) {
      layer.open({
          type: 2,
          area: ['50%',$(window).height()-100+'px'],
          fix: false, //不固定
          maxmin: true,
          shade:0.4,
          title: title,
          content: url

      });
  }
  /*一级推荐人*/
  function look1(title,url) {
      layer.open({
          type: 2,
          area: ['50%',$(window).height()-100+'px'],
          fix: false, //不固定
          maxmin: true,
          shade:0.4,
          title: title,
          content: url

      });
  }

</script>
</body>
</html>

