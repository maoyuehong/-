<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\WWW\thinsone\public/../application/admin\view\notice\upd.html";i:1509697809;}*/ ?>
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
    <div class="form-horizontal m-t">
        <div class="form-group">
            <label class="col-sm-2 control-label">标题名称：</label>
            <div class="col-sm-8">
                <input type="text" style="width: 65%" id="name" placeholder="请输入标题名称" value="<?php echo $info['n_title']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">文章内容：</label>
            <div class="col-sm-8">
                <textarea   id="content" style="width: 80%;height: 50%" ><?php echo $info['n_content']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">是否轮播：</label>
            <div class="col-sm-8">
                <select name="state" id="state"  class="form-control m-b" style="width: 65%">
                    <option value="1" <?php if($info['n_state'] == 1): ?>selected="selected" <?php endif; ?>>不轮播</option>
                    <option value="2" <?php if($info['n_state'] == 2): ?>selected="selected" <?php endif; ?>>开始轮播</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">发布时间：</label>
            <div class="col-sm-8">
                <input type="text" class="form-control layer-date laydate-icon" id="date" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})" value="<?php echo date('Y-m-d H:i:s',$info['n_time']); ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-8 col-sm-offset-2">
                <button class="btn btn-primary" type="button" onClick="submit('<?php echo $info['n_id']; ?>');">提交</button>
            </div>
        </div>
    </div>
</div>
<div class="gohome">
    <a class="animated bounceInUp" href="javascript:location.replace(location.href);" title="刷新"><i class="fa fa-repeat"></i></a>
    <a class="animated bounceInUp" href="javascript:$('body,html').animate({scrollTop:0},500);" title="TOP">Top</a>
</div>
<script src="/static/admin/js/jquery-1.8.2.min.js"></script>
<script src="/static/admin/layer/layer.js"></script>
<script src='/static/admin/js/laydate/laydate.js'></script>
<!--引入富文本编辑器-->
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
    var ue =UE.getEditor('content',{toolbars: [[
        'fullscreen', 'source', '|', 'undo', 'redo', '|',
        'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
        'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
        'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
        'directionalityltr', 'directionalityrtl', 'indent', '|',
        'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
        'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
        'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
        'horizontal'
    ]]})
</script>
<script type="text/javascript">

    function submit(id){
        var name = $('#name').val();
        var content = ue.getContent();
      // console.log(content);
        var date = $('#date').val();
        var state = $('#state').val();
        //console.log(state);
        $.ajax({
            type:'post',
            url:"__URL__/about_us",
            dataType:'json',
            data:{
                'id':id,
                'name':name,
                'content':content,
                'date':date,
                'state':state
            },
            success:function(data) {
                if (data.status==0) {
                    layer.msg(data.msg, {icon: 1, time: 2000});
                } else {
                    layer.msg(data.msg, {icon: 2, time: 2000});
                }
            }
        })


    }
</script>

</body>
</html>
