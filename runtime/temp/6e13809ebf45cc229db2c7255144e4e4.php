<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\WWW\thinsone\public/../application/admin\view\manager\showlist.html";i:1509766689;}*/ ?>
<!DOCTYPE HTML>
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
<style>
  .pagination{
    padding-left: 80%;
  }
</style>
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
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="col-sm-4">
    <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$vo): if($key%3 == 0): ?>
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5><?php echo $vo['a_nickname']; ?></h5>
            <div class="ibox-tools">

              <a href="<?php echo url('upd',array('a_id'=>$vo['a_id'])); ?>"><button class="btn btn-xs btn-info " type="button" ><i class="fa fa-edit"></i> 修改密码</button></a>

              <?php if($vo['a_id'] == 1): ?>
                <button class="btn btn-xs btn-primary " type="button" onclick="add('新增管理员','__URL__/admin_add');"><i class="fa fa-plus"></i> 新增管理员</button>
              <?php elseif(\think\Session::get('a_id') ==  $vo['a_id']): else: ?>
              <a href="<?php echo url('del',array('a_id'=>$vo['a_id'],'a_name'=>$vo['a_name'])); ?>" ><button class="btn btn-xs btn-danger " onclick="if(!confirm('你确定要删除吗？删除蒋不可恢复！')){return false}"><i class="fa fa-trash"></i> 删除</button></a>
              <?php endif; ?>

            </div>
          </div>
          <div class="ibox-content">
            <h4>用户名：<?php echo $vo['a_name']; ?></h4>
            <p><strong>管理权限：</strong><?php echo $vo['a_list']; ?></p>
            <small class="text-muted">最近登录时间：<?php echo $vo['a_date']; ?><br/>上次登录时间：<?php echo $vo['a_out_date']; ?></small>
          </div>
        </div>
      <?php endif; endforeach; endif; else: echo "" ;endif; ?>
  </div>
  <div class="col-sm-4">
    <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$vo): if($key%3 == 1): ?>
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5><?php echo $vo['a_nickname']; ?></h5>
          <div class="ibox-tools">

            <a href="<?php echo url('upd',array('a_id'=>$vo['a_id'])); ?>"><button class="btn btn-xs btn-info " type="button" ><i class="fa fa-edit"></i> 修改密码</button></a>

            <?php if($vo['a_id'] == 1): ?>
            <button class="btn btn-xs btn-primary " type="button" onclick="add('新增管理员','__URL__/admin_add');"><i class="fa fa-plus"></i> 新增管理员</button>
            <?php elseif(\think\Session::get('a_id') ==  $vo['a_id']): else: ?>
            <a href="<?php echo url('del',array('a_id'=>$vo['a_id'],'a_name'=>$vo['a_name'])); ?>"><button class="btn btn-xs btn-danger " type="button" onclick="if(!confirm('你确定要删除吗？删除蒋不可恢复！')){return false}"><i class="fa fa-trash"></i> 删除</button></a>
            <?php endif; ?>

          </div>
        </div>
        <div class="ibox-content">
          <h4>用户名：<?php echo $vo['a_name']; ?></h4>
          <p><strong>管理权限：</strong><?php echo $vo['a_list']; ?></p>
          <small class="text-muted">最近登录时间：<?php echo $vo['a_date']; ?><br/>上次登录时间：<?php echo $vo['a_out_date']; ?></small>
        </div>
      </div>
    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
  </div>
  <div class="col-sm-4">
    <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$vo): if($key%3 == 2): ?>
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5><?php echo $vo['a_nickname']; ?></h5>
          <div class="ibox-tools">

            <a href="<?php echo url('upd',array('a_id'=>$vo['a_id'])); ?>"><button class="btn btn-xs btn-info " type="button" ><i class="fa fa-edit"></i> 修改密码</button></a>

            <?php if($vo['a_id'] == 1): ?>
            <button class="btn btn-xs btn-primary " type="button" onclick="add('新增管理员','__URL__/admin_add');"><i class="fa fa-plus"></i> 新增管理员</button>
            <?php elseif(\think\Session::get('a_id') ==  $vo['a_id']): else: ?>
            <a href="<?php echo url('del',array('a_id'=>$vo['a_id'],'a_name'=>$vo['a_name'])); ?>"><button class="btn btn-xs btn-danger " type="button" onclick="if(!confirm('你确定要删除吗？删除蒋不可恢复！')){return false}"><i class="fa fa-trash"></i> 删除</button></a>
            <?php endif; ?>

          </div>
        </div>
        <div class="ibox-content">
          <h4>用户名：<?php echo $vo['a_name']; ?></h4>
          <p><strong>管理权限：</strong><?php echo $vo['a_list']; ?></p>
          <small class="text-muted">最近登录时间：<?php echo $vo['a_date']; ?><br/>上次登录时间：<?php echo $vo['a_out_date']; ?></small>
        </div>
      </div>
    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
  </div>
  <?php echo $info->render(); ?>
  <!--<div class="col-sm-4">
    <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$vo): ?>
      <if condition="$key%3 eq 1 ">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5><?php echo $vo['a_nickname']; ?></h5>
            <div class="ibox-tools">
              <button class="btn btn-xs btn-info " type="button" onclick="edit('编辑',array('id'=>$vo['a_id']);"><i class="fa fa-edit"></i> 编辑</button>
              <button class="btn btn-xs btn-danger " type="button" onclick="dele(this,'<?php echo $vo['a_id']; ?>');"><i class="fa fa-trash"></i> 删除</button>
            </div>
          </div>
          <div class="ibox-content">
            <h4>用户名：<?php echo $vo['a_name']; ?></h4>
            <p><strong>管理权限：</strong><?php echo $vo['a_list']; ?></p>
            <small class="text-muted">最近登录时间：<?php echo $vo['a_date']; ?><br/>上次登录时间：<?php echo $vo['a_out_date']; ?></small>
          </div>
        </div>
      </if>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
  <div class="col-sm-4">
    <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$vo): ?>
      <if condition="$key%3 eq 2 ">
        <div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5><?php echo $vo['a_nickname']; ?></h5>
            <div class="ibox-tools">
              <button class="btn btn-xs btn-info " type="button" onclick="edit('编辑',array('id'=>$vo['a_id']);"><i class="fa fa-edit"></i> 编辑</button>
              <button class="btn btn-xs btn-danger " type="button" onclick="dele(this,'<?php echo $vo['a_id']; ?>');"><i class="fa fa-trash"></i> 删除</button>
            </div>
          </div>
          <div class="ibox-content">
            <h4>用户名：<?php echo $vo['a_name']; ?></h4>
            <p><strong>管理权限：</strong><?php echo $vo['a_list']; ?></p>
            <small class="text-muted">最近登录时间：<?php echo $vo['a_date']; ?><br/>上次登录时间：<?php echo $vo['a_out_date']; ?></small>
          </div>
        </div>
      </if>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
</div>-->
<div class="gohome">
  <a class="animated bounceInUp" href="javascript:location.replace(location.href);" title="刷新" style="position:fixed;bottom:20px;right:20px;z-index:100;"><i class="fa fa-repeat" ></i></a>
</div>
<script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/admin/js/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" src="/static/admin/layer/layer.js"></script>
<script type="text/javascript">
    var SubmitOrHidden = function(event) {
        e = event ? event : (window.event ? window.event : null);
        if (e.keyCode == 13) {
            search();
        }
    }
    window.document.onkeydown = SubmitOrHidden;
  /*管理员-添加*/
  function search() {

      /*var info=$('[name=info]').val();*/
      var info=$('#info').val();
     /* $.ajax({
          type:'get',
          url:'__URL__/showlist',
          dataType:'json',
          data:{
              'info':info
          },
          success:function(){

          }
      })*/
     window.location='__URL__/showlist?info='+info;
  }
  /*管理员-编辑*/
  function add(title,url) {
      layer.open({
          type: 2,
          area: ['800px',$(window).height()-50+'px'],
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