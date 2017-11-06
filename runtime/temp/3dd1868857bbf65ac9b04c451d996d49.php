<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\WWW\thinsone\public/../application/admin\view\Role\showlist.html";i:1509361855;}*/ ?>
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

        </div>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>角色ID</th>
            <th>名称</th>
            <th>权限AC</th>


        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): if( count($list)==0 ) : echo "" ;else: foreach($list as $key=>$v): ?>
        <tr>
            <td><?php echo $v['a_id']; ?></td>

            <td><?php echo $v['role_name']; ?></td>
            <td><?php echo $v['auth_ac_name']; ?></td>
            <td>
                <a href="<?php echo url('distribute',array('a_id'=>$v['a_id'])); ?>"><button class="btn btn-success btn-xs" type="button"><i class="fa fa-edit"></i> 分配权限</button></a>
            </td>

        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <tfoot>
        <tr>

        </tr>
        </tfoot>
        </tbody>
    </table>
  
</div>
<div class="gohome">
    <a class="animated bounceInUp" href="javascript:location.replace(location.href);" title="刷新" style="position:fixed;bottom:20px;right:20px;z-index:100;"><i class="fa fa-repeat" ></i></a>
    <!--<a class="animated bounceInUp" href="javascript:$('body,html').animate({scrollTop:0},500);" title="TOP">Top</a>-->
</div>

<script src="/static/admin/js/jquery-1.8.2.min.js"></script>
<script src="/static/admin/layer/layer.js"></script>
<script type="text/javascript">
    /* 搜索 */
    function search(){
        var info = $("#info").val();
        window.location="__URL__/showlist?info="+info
    }

</script>
</body>
</html>
