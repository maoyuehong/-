<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\WWW\thinsone\public/../application/admin\view\notice\journalism.html";i:1508912419;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
  
    <link href="/static/admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row m-b-xs">
        <div class="col-sm-9"></div>
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>标题名称</th>

            <th>是否轮播</th>
            <th>发布时间</th>
            <th>操作</th>
            <th> <button class="btn btn-success btn-xs" type="button" onclick="add('添加','__URL__/add');"> 添加</button></th>
        </tr>
        </thead>
        <tbody>
<?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$v): ?>
            <tr>
                <td><?php echo $v['n_id']; ?></td>
                <td><?php echo $v['n_title']; ?></td>

                <td>
                    <?php switch($v['n_state']): case "1": ?>不轮播<?php break; case "2": ?>开始轮播<?php break; endswitch; ?>
                </td>
                <td><?php echo date('Y-m-d H:i:s',$v['n_time']); ?></td>
                <td>
                    <button class="btn btn-success btn-xs" type="button" onclick="edit('编辑','__URL__/about_us?id='+<?php echo $v['n_id']; ?>);"><i class="fa fa-edit"></i> 编辑</button>

                    <button class="btn btn-danger btn-xs" type="button" onclick="dele(this,'<?php echo $v['n_id']; ?>');"><i class="fa fa-trash"></i> 删除</button>

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
    <a class="animated bounceInUp" href="javascript:location.replace(location.href);" title="刷新"><i class="fa fa-repeat"></i></a>
    <a class="animated bounceInUp" href="javascript:$('body,html').animate({scrollTop:0},500);" title="TOP">Top</a>
</div>
<script src="/static/admin/js/jquery-1.8.2.min.js"></script>
<script src="/static/admin/layer/layer.js"></script>
<script type="text/javascript">
    /* 搜索 */
    function search(){
        var info = $("#info").val();
        window.location="__URL__/about_us?info="+info;
    }
    /*编辑*/
    function edit(title,url) {
        layer.open({
            type: 2,
            area: [$(window).width()-200+'px',$(window).height()-50+'px'],
            fix: false, //不固定
            maxmin: true,
            shade:0.4,
            title: title,
            content: url
        });
    }
    /*添加*/
    function add(title,url) {
        layer.open({
            type: 2,
            area: [$(window).width()-200+'px',$(window).height()-50+'px'],
            fix: false, //不固定
            maxmin: true,
            shade:0.4,
            title: title,
            content: url
        });
    }
    /*删除*/
    function dele(obj, id) {
        layer.confirm('删除须谨慎，确认要删除吗？', {icon : 3,title : '提示'},function(index) {
            $.ajax({
                type:'post',
                url:"__URL__/del",
                dataType:'json',
                data:{
                    'id':id
                },
                success:function(data) {
                    if (data.status==0) {
                        $(obj).parents().parents('tr').remove();
                        layer.msg(data.msg, {icon: 1, time: 2000});
                    } else {
                        layer.msg(data.msg, {icon: 2, time: 2000});
                    }
            }
            })
        });
    }
</script>
</body>
</html>
