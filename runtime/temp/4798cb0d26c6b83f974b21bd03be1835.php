<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\WWW\thinsone\public/../application/admin\view\member\upd.html";i:1509326873;}*/ ?>
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

<form action="" method="post">
    <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$v): ?>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="form-horizontal m-t">
            <div class="form-group">
                <label class="col-sm-2 control-label">姓名：</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="请输入姓名"   id="m_name" name="m_name" style="width:50%;"  value="<?php echo $v['m_user']; ?>">
                </div>
            </div>
            <div class="form-horizontal m-t">
                <div class="form-group">
                    <label class="col-sm-2 control-label">会员号码：</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" placeholder="请输入会员号码" min="1" id="m_user" name="m_mobile" style="width:50%;"  value="<?php echo $v['m_user']; ?>">
                    </div>
                </div>
            <div class="form-horizontal m-t">
                <div class="form-group">
                    <label class="col-sm-2 control-label">手机号码：</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" placeholder="请输入手机号码" min="1" id="m_mobile" name="m_mobile" style="width:50%;"  value="<?php echo $v['m_mobile']; ?>">
                    </div>
                </div>
                <div class="form-horizontal m-t">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">身份证号码：</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="请输入身份证号"  id="m_id_card" name="m_id_card" style="width:50%;"  value="<?php echo $v['m_id_card']; ?>">
                        </div>
                    </div>



                    <div class="form-horizontal m-t">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">出生日期：</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="请输入出生日期"  id="m_birthday" name="m_birthday" onclick="laydate({istime: true, format: 'YYYY年MM月DD日 '})"  style="width:50%;" value="<?php echo $v['m_birthday']; ?>">
                                    </div>
                                </div>
             <div class="form-horizontal m-t">
                  <div class="form-group">
                  <label class="col-sm-2 control-label">所在地址：</label>
              <div class="col-sm-8">
                   <input type="text" class="form-control" placeholder="请输入所在地址"  id="m_address" name="m_address" style="width:50%;" value="<?php echo $v['m_address']; ?>">
             </div>
              </div>
                 <div class="form-horizontal m-t">
                     <div class="form-group">
                         <label class="col-sm-2 control-label">银行名称：</label>
                         <div class="col-sm-8">
                             <input type="text" class="form-control" placeholder="请输入银行名称"  id="m_bank_nickname" name="m_bank_nickname" style="width:50%;" value="<?php echo $v['m_bank_nickname']; ?>">
                         </div>
                     </div>
                     <div class="form-horizontal m-t">
                         <div class="form-group">
                             <label class="col-sm-2 control-label">银行卡号：</label>
                             <div class="col-sm-8">
                                 <input type="text" class="form-control" placeholder="请输入银行卡号"  id="m_bank_card" name="m_bank_card" style="width:50%;" value="<?php echo $v['m_bank_card']; ?>">
                             </div>
                         </div>
                         <div class="form-horizontal m-t">
                             <div class="form-group">
                                 <label class="col-sm-2 control-label">开户行：</label>
                                 <div class="col-sm-8">
                                     <input type="text" class="form-control" placeholder="请输入开户行"  id="m_bank_address" name="m_bank_address" style="width:50%;" value="<?php echo $v['m_bank_address']; ?>">
                                 </div>
                             </div>
                             <div class="form-horizontal m-t">
                                 <div class="form-group">
                                     <label class="col-sm-2 control-label">银行开户人名字：</label>
                                     <div class="col-sm-8">
                                         <input type="text" class="form-control" placeholder="请输入银行开户人姓名"  id="m_bank_name" name="m_bank_name" style="width:50%;" value="<?php echo $v['m_bank_name']; ?>">
                                     </div>
                                 </div>

                                 <div class="form-horizontal m-t">
                                     <div class="form-group">
                                         <label class="col-sm-2 control-label">微信号：</label>
                                         <div class="col-sm-8">
                                             <input type="text" class="form-control" placeholder="请输入微信号码"  id="m_wx" name="m_wx" style="width:50%;" value="<?php echo $v['m_wx']; ?>">
                                         </div>
                                     </div>
                                     <div class="form-horizontal m-t">
                                         <div class="form-group">
                                             <label class="col-sm-2 control-label">支付宝号码：</label>
                                             <div class="col-sm-8">
                                                 <input type="text" class="form-control" placeholder="请输入支付宝号码"  id="m_alipay" name="m_alipay" style="width:50%;" value="<?php echo $v['m_alipay']; ?>">
                                             </div>
                                         </div>
                                         <div class="form-horizontal m-t">
                                             <div class="form-group">
                                                 <label class="col-sm-2 control-label">推荐人账号：</label>
                                                 <div class="col-sm-8">
                                                     <input type="text" class="form-control" placeholder="请输入推荐人账号"  id="m_introducer" name="m_introducer" style="width:50%;" value="<?php echo $z; ?>">
                                                 </div>
                                             </div>





            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2">
                    <button class="btn btn-primary" type="submit"  style="width: 20%;">修改</button>
                    <a href="javascript:history.back()"><button class="btn btn-primary" type="button"  style="width: 20%;">返回</button></a>
                </div>
            </div>
        </div>
    </div>

                                     <?php endforeach; endif; else: echo "" ;endif; ?>
  </form>

<div class="gohome">
    <a class="animated bounceInUp" href="javascript:location.replace(location.href);" title="返回"><i class="fa fa-repeat"></i></a>
    <a class="animated bounceInUp" href="javascript:$('body,html').animate({scrollTop:0},500);" title="TOP">Top</a>
</div>
<script src="/static/admin/js/jquery-1.8.2.min.js"></script>
<script src="/static/admin/layer/layer.js"></script>

<script src='/static/admin/js/laydate/laydate.js'></script>
<script type="text/javascript">
    $('#bottom').xheditor({skin:'nostyle',width:'100%',height:'200',cleanPaste:3,upBtnText:'上传',html5Upload:false,upImgUrl:'__ROOT__/Rootadmin/MainIndex/add_img_list',upImgExt:'jpg,jpeg,gif,png'});
    function submit(id){
        var title = $('#title').val();
        var name = $('#name').val();
        var content = $('#content').val();
        var bottom = $('#bottom').val();
        var code = $('#code').val();
        $.post("__URL__/seo",{switch_case:1,id:id,title:title,name:name,content:content,bottom:bottom,code:code},
            function(data){
                if(data.fal){
                    layer.msg(data.content, {icon: 1,time: 2000});
                }else{
                    layer.msg(data.content, {icon: 2,time: 2000});
                }
            });
    }
</script>
</body>
</html>
