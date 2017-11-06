<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\WWW\thinsone\public/../application/admin\view\hole\threshold.html";i:1509358070;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link href="/static/admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">

    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
</head>

<form action="" method="post">

    <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$v): ?>
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="form-horizontal m-t">
            <div class="form-group">
                <label class="col-sm-3 control-label">一级累计金额:</label>
                <div class="input-group m-b" style="width: 15%">
                    <input type="text"  id="d_a" placeholder="请输入一级累计金额"    class="form-control"  value="<?php echo $v['d_a']; ?>" >
                    <span class="input-group-addon">元</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">二级累计金额：</label>
                <div class="input-group m-b" style="width: 15%">
                    <input type="text"   id="d_b" placeholder="请输入二级累计金额"     class="form-control"  value="<?php echo $v['d_b']; ?>">
                    <span class="input-group-addon">元</span>
            </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">三级累计金额：</label>
                <div class="input-group m-b" style="width: 15%">
                    <input type="text" id="d_c" placeholder="请输入三级累计金额"   class="form-control" value="<?php echo $v['d_c']; ?>">
                    <span class="input-group-addon">元</span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-3">
                    <button class="btn btn-primary" type="button"  onclick="edit('<?php echo $v['d_id']; ?>');">提交</button>

                </div>
            </div>
        </div>

    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>

</form>
<script src="/static/admin/js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/static/admin/layer/layer.js"></script>
<script type="text/javascript">
    function edit(id){
        var d_a=$('#d_a').val();

        var d_b=$('#d_b').val();
        var d_c=$('#d_c').val();
        $.ajax({
            type:'post',
            url:'__URL__/threshold',
            dataType:'json',
            data:{
                'id':id,
              'd_a':d_a,
                'd_b':d_b,
                'd_c':d_c
            },
            success:function(msg){
              if(msg.status==0){
                  layer.alert(msg.msg,{icon: 1, time: 2000})
              }else{
                  layer.alert(msg.msg,{icon: 1, time: 2000})
              }
            }
        })
    }

</script>
</body>
</html>

