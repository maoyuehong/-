<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\WWW\thinsone\public/../application/admin\view\member\lookup.html";i:1509591216;}*/ ?>
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
    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/static/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/cropper/cropper.min.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="/static/admin/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">
</head>
<body>

<form action="" method="post" class="form-horizontal">
    <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$v): ?>
    <input type="hidden" name="m_id" value="<?php echo $v['m_id']; ?>">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="form-horizontal m-t">
            <div class="form-group">
                <label class="col-sm-2 control-label">用户名：</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" disabled  id="m_name" name="m_name" style="width:50%;"  value="<?php echo $v['m_user']; ?>">
                </div>
            </div>
            <div class="form-horizontal m-t">
                <div class="form-group">
                    <label class="col-sm-2 control-label">手机号码：</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" disabled  min="1" id="m_mobile" name="m_mobile" style="width:50%;"  value="<?php echo $v['m_mobile']; ?>">
                    </div>
                </div>

                <div class="form-horizontal m-t">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">修改项目：</label>
                        <div class="col-sm-10">
                            <div class="radio radio-info radio-inline">
                                <input type="radio" id="inlineRadio2" value="2" name="m_profit">
                                <label for="inlineRadio2">总资产【<?php echo $v['m_assets']; ?>】 </label>
                            </div>
                            <div class="radio radio-info radio-inline">
                                <input type="radio" id="inlineRadio1" value="1" name="m_profit" >
                                <label for="inlineRadio1">总收益【<?php echo $v['m_profit']; ?>】</label>
                            </div>

                        </div>
                    </div>
                    <div class="form-horizontal m-t">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">修改项目：</label>
                            <div class="col-sm-10">
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="inlineRadio3" value="1" name="state" >
                                    <label for="inlineRadio3">充值</label>
                                </div>
                                <div class="radio radio-info radio-inline">
                                    <input type="radio" id="inlineRadio4" value="2" name="state">
                                    <label for="inlineRadio4">提现 </label>
                                </div>
                            </div>
                        </div>
                    <td>
                        <div class="form-horizontal m-t">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">请输入金额：</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="请输入你的充值(提现)金额"   id="m_money" name="m_name" style="width:40%;"  value="">
                                    <span class="help-block m-b-none">
						<i class="fa fa-info-circle"></i> 充值总资产将是您充值金额的两倍！
					</span>
                                </div>

                            </div>
                    <td>










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

</body>
</html>
