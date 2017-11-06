<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\WWW\thinsone\public/../application/admin\view\member\look1.html";i:1509346275;}*/ ?>
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
        <div class="col-sm-9">
            <button class="btn btn-primary btn-xs" type="button"  style="text-align: left" ><?php echo $title; ?></button>
        </div>

        <?php if($title == '一级推荐人'): else: ?>
        <div class="col-sm-3">

            <a href="javascript:history.back()"><button class="btn btn-primary btn-xs" type="button"  >返回上一级</button></a>
        </div>
        <?php endif; ?>
    </div>

    <table class="table table-hover">
        <thead>
        <tr>

            <th>会员账号</th>
            <th>姓名</th>
            <th>手机号码</th>
            <th>总收益</th>
            <th>总资产</th>

        </tr>
        </thead>
        <tbody>

        <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$v): ?>
        <tr>

            <td><?php echo $v['m_user']; ?></td>
            <td><?php echo $v['m_name']; ?></td>
            <td><?php echo $v['m_mobile']; ?></td>
            <td><?php echo $v['m_profit']; ?></td>
            <td><?php echo $v['m_assets']; ?></td>
            <td>
                <?php if($title == '三级推荐人'): ?>
                <button class="btn btn-success btn-xs" type="button" onclick="edit('<?php echo $v['m_id']; ?>')"><i class="fa fa-edit"></i> 详情信息</button>
                <?php else: ?>
                <button class="btn btn-success btn-xs" type="button" onclick="edit('<?php echo $v['m_id']; ?>')"><i class="fa fa-edit"></i> 详情信息</button>
                <button class="btn btn-primary btn-xs" type="button" onclick="look2('<?php echo $v['m_id']; ?>')"><i class="fa fa-edit"></i> 查看下級</button>
               <?php endif; ?>


                <!--<button class="btn btn-danger btn-xs" type="button" onclick="dele();"><i class="fa fa-trash"></i> 删除</button>-->
            </td>
        </tr>

        <?php endforeach; endif; else: echo "" ;endif; ?>

        <tfoot>
        <tr>

            <td colspan="100" align="right">

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

    /*编辑*/
    function edit(id) {
        var id=id
        window.location='__URL__/information?id='+id;
    }
    /*一级推荐人*/
    function look2(id) {
        var id=id
        window.location='__URL__/look1?index=<?php echo $jishu; ?>&id='+id;
    }

</script>
</body>
</html>

