<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\WWW\thinsone\public/../application/admin\view\website\add.html";i:1509700290;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/static/admin/img/icon.png">
    <link href="/static/admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
</head>
<body>
<?php if(is_array($title) || $title instanceof \think\Collection || $title instanceof \think\Paginator): if( count($title)==0 ) : echo "" ;else: foreach($title as $key=>$v): ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="form-horizontal m-t">
        <div class="form-group">
            <label class="col-sm-2 control-label">网站域名：</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" disabled="disabled" placeholder="<?php echo $_SERVER['SERVER_NAME']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">网站名称：</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="title" placeholder="控制在25个字、50个字节以内" value="<?php echo $v['t_title']; ?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">SEO关键字：</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="name" placeholder="5个左右,8汉字以内,用英文,隔开" value="<?php echo $v['t_name']; ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label">SEO描述：</label>
            <div class="col-sm-8">
                <textarea class="form-control" id="content" placeholder="空制在80个汉字，160个字符以内"><?php echo $v['t_content']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">注册协议：</label>
            <div class="col-sm-8">
                <textarea  id="t_reg_content" style="width: 100%;height: 400px"><?php echo $v['t_reg_content']; ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">管理员手机号码：</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="t_admin_phone" placeholder="管理员手机号码" value="<?php echo $v['t_admin_phone']; ?>">
                <span class="help-block m-b-none">
						<i class="fa fa-info-circle"></i>填写手机号码，接收提现通知！
					</span>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-8 col-sm-offset-2">
                <button class="btn btn-primary" type="button" onClick="submit('<?php echo $v['t_id']; ?>');">提交</button>
            </div>
        </div>
    </div>

</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<div class="gohome">
    <a class="animated bounceInUp" href="javascript:location.replace(location.href);" title="刷新"><i class="fa fa-repeat"></i></a>
    <a class="animated bounceInUp" href="javascript:$('body,html').animate({scrollTop:0},500);" title="TOP">Top</a>
</div>
<script src="/static/admin/js/jquery-1.8.2.min.js"></script>
<script src="/static/admin/layer/layer.js"></script>
<!--引入富文本编辑器-->
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/admin/ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
    var ue =UE.getEditor('t_reg_content',{toolbars: [[
        'fullscreen', 'source', '|', 'undo', 'redo', '|',
        'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
        'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
        'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
        'directionalityltr', 'directionalityrtl', 'indent', '|',
        'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
        'link', 'unlink', 'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
        'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
        'horizontal'
    ]]});

</script>

<script type="text/javascript">

    function submit(id) {
        var title = $('#title').val();
        var name = $('#name').val();
        var content = $('#content').val();
        var t_admin_phone = $('#t_admin_phone').val();
        var t_reg_content = ue.getContent();
        $.ajax({
            type: 'post',
            url: '__URL__/add',
            dataType: 'json',
            data: {
                'id': id,
                'title': title,
                'name': name,
                'content': content,
                't_admin_phone': t_admin_phone,
                't_reg_content': t_reg_content
            },
            success: function (msg) {
                if (msg.status==0) {
                    layer.msg(msg.msg, {icon: 1, time: 2000});
                } else {
                    layer.msg(msg.msg, {icon: 2, time: 2000});
                }
            }

        })

    }


</script>
</body>
</html>
