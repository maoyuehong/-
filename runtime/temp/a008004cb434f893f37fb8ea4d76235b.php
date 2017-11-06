<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\WWW\thinsone\public/../application/admin\view\slide\set.html";i:1509337837;}*/ ?>
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
    <form class="form-horizontal m-t" id="form">
        <div class="form-group">
            <label class="col-sm-2 control-label">图片：</label>
            <div class="col-sm-5">
                <div class="input-group m-b">
						<span class="input-group-btn">
                    		<label for="addImg" class="btn btn-primary">
		                        <input type="file" accept="image/*" name="img" id="addImg" onchange="change_img(this);" class="hide"> 上传图片
		                    </label>
                    	</span>
                    <input type="text" id="imgUrl" disabled class="form-control">
                </div>
                <span class="help-block m-b-none">
						<i class="fa fa-info-circle"></i> 上传图片限制jpg、png、gif、jpeg格式，建议尺寸：宽度640px高度340px，图片大小<1024KB
					</span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">排序：</label>
            <div class="col-sm-5">
                <input type="number" min="0" name="f_order" id="f_order" class="form-control" value="1">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-5 col-sm-offset-2">
                <button class="btn btn-primary" type="button" onClick="add();">提交</button>
            </div>
        </div>
    </form>
    <div class="hr-line-dashed"></div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>图片</th>

            <th>顺序</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
<?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$v): ?>
            <tr>
                <td><?php echo $v['f_id']; ?></td>
                <td width="20%"><img src="/upload/focus_img/<?php echo $v['f_img']; ?>" width="60%" ></td>

                <td class="order"><?php echo $v['f_order']; ?></td>
                <td>
                    <button class="btn btn-success btn-xs" type="button" onclick="edit(this,'<?php echo $v['f_id']; ?>','<?php echo $v['f_img']; ?>');"><i class="fa fa-edit"></i> 编辑</button>
                    <button class="btn btn-danger btn-xs" type="button" onclick="dele(this,'<?php echo $v['f_id']; ?>','<?php echo $v['f_img']; ?>');"><i class="fa fa-trash"></i> 删除</button>
                </td>
            </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<div class="gohome">
    <a class="animated bounceInUp" href="javascript:location.replace(location.href);" title="刷新"><i class="fa fa-repeat"></i></a>
    <a class="animated bounceInUp" href="javascript:$('body,html').animate({scrollTop:0},500);" title="TOP">Top</a>
</div>
<script src="/static/admin/js/jquery-1.8.2.min.js"></script>
<script src="/static/admin/layer/layer.js"></script>
<script src="/static/admin/js/jquery.form.js"></script>
<script type="text/javascript">
    function change_img(obj){
        var filepath = $(obj).val();
        var extStart = filepath.lastIndexOf(".");
        var ext = filepath.substring(extStart,filepath.length).toUpperCase();
        if(ext!=".PNG" && ext!=".GIF" && ext!=".JPG" && ext!=".JPEG"){
            $(obj).val('');
            $("#imgUrl").val('');
            layer.msg("上传图片限于jpg、png、gif、jpeg格式", {icon: 2,time: 2000});
        }else{
            $("#imgUrl").val(filepath);
        }
    }
    var click = true;
    function add(){
        if(click){
            click = false;
            layer.msg('数据上传中...', {icon: 16,time: 120000});
            var img = $("#addImg").val();
            var url = $('#url').val();
            $("#form").ajaxSubmit({
                type: 'post',
                url: "__URL__/set",
                dataType:'json',
                data: {

                    'img': img,
                    'url': url,
                },
                success: function(data) {
                    if(data.status==0){
                        layer.msg(data.msg, {icon: 1,time: 2000},function(){
                            location.replace(location.href);
                        });
                    }else{
                        layer.msg(data.msg, {icon: 2,time: 2000});
                    }
                    click=true;
                }
            });
        }
    }
    function change_img_edit(obj){
        var filepath = $(obj).val();
        var extStart = filepath.lastIndexOf(".");
        var ext = filepath.substring(extStart,filepath.length).toUpperCase();
        if(ext!=".PNG" && ext!=".GIF" && ext!=".JPG" && ext!=".JPEG"){
            $(obj).val('');
            $("#imgUrl_edit").val('');
            layer.msg("上传图片限于png,gif,jpeg,jpg格式", {icon: 2,time: 2000});
        }else{
            $("#imgUrl_edit").val(filepath);
        }
    }
    function edit(obj,id,imgName){
        var url = $(obj).parents("tr").find(".url").html();
        var order = $(obj).parents("tr").find(".order").html();
        layer.confirm(
            "<form class=\"form-horizontal m-t\" id=\"form2\" style=\"width: 300px;\">"+
            "	<div class=\"form-group\">"+
            "		<label class=\"col-sm-4 control-label\">图片：</label>"+
            "		<div class=\"col-sm-8\">"+
            "			<div class=\"input-group m-b\">"+
            "				<span class=\"input-group-btn\">"+
            "            		<label for=\"addImg_edit\" class=\"btn btn-primary\">"+
            "                        <input type=\"file\" accept=\"image/*\" name=\"img_edit\" id=\"addImg_edit\" onchange=\"change_img_edit(this);\" class=\"hide\"> 上传图片"+
            "                    </label>"+
            "            	</span>"+
            "                <input type=\"text\" id=\"imgUrl_edit\" disabled class=\"form-control\">"+
            "            </div>"+
            "		</div>"+
            "	</div>"+
            "	<div class=\"form-group\">"+
            "		<label class=\"col-sm-4 control-label\">顺序：</label>"+
            "		<div class=\"col-sm-8\">"+
            "   		<input type=\"number\" id=\"order_edit\" min=\"1\" class=\"form-control\" value=\""+order+"\">"+
            "		</div>"+
            "	</div>"+
            "               <p>上传图片限制jpg、png、gif、jpeg格式，建议尺寸：2M，图片大小<1024KB </p>"+
            "</form>"
            ,{title:'编辑'}, function(index) {
                var img_edit = $("#addImg_edit").val();
                var order_edit = $("#order_edit").val();
                $("#form2").ajaxSubmit({
                    type: 'post',
                    url: "__URL__/edit",
                    dataType:'json',
                    data: {
                        'id': id,
                        'img_edit': img_edit,
                        'imgName': imgName,
                        'order_edit': order_edit,
                    },
                    success: function(data) {
                        if(data.status==0){
                            layer.msg(data.msg, {icon: 1,time: 2000},function(){
                                location.replace(location.href);
                            });
                        }else{
                            layer.msg(data.msg, {icon: 2,time: 2000});
                        }
                    }
                });
            });
    }
    function dele(obj,id,img) {
        layer.confirm('删除须谨慎，确认要删除吗？', {icon : 3,title : '提示'},function(index) {
            $.ajax({
                type:'post',
                url:"__URL__/dele",
                dataType:'json',
                    data:{
                    'id':id,
                    'img':img
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
