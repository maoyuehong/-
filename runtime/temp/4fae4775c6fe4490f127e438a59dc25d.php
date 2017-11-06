<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\WWW\thinsone\public/../application/admin\view\member\information.html";i:1509343564;}*/ ?>
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
    <script src="../../../../../../hekai/首页Desktop/wap.js"></script>
</head>
<body>

<form action="" method="post">
    <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$v): ?>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="form-horizontal m-t">
            <div class="form-group">
                <label class="col-sm-2 control-label" style="width: 35%;">姓名：</label>
                <div class="col-sm-8" style="width: 20%;">
                    <p class="form-control-static" style="width: 20%;"><?php echo $v['m_name']; ?></p>
                </div>
                <label class="col-sm-2 control-label">会员号码：</label>

                    <p class="form-control-static"><?php echo $v['m_user']; ?></p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" style="width: 35%;">充值累计：</label>
                <div class="col-sm-8" style="width: 20%;">
                    <p class="form-control-static" style="width: 20%;"><?php echo $v['m_sum_money']; ?></p>
                </div>
                <label class="col-sm-2 control-label">当前代理为：</label>

                <p class="form-control-static">
                    <?php switch($v['m_agent']): case "1": ?>县级代理<?php break; case "2": ?>市级代理<?php break; case "3": ?>省级代理<?php break; case "4": ?>股东<?php break; default: ?>还没有升级为代理
                    <?php endswitch; ?>


                   </p>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" style="width: 35%;">手机号码：</label>
                <div class="col-sm-8" style="width: 20%;">
                    <p class="form-control-static" style="width: 20%;"><?php echo $v['m_mobile']; ?></p>
                </div>
                <label class="col-sm-2 control-label">出生日期：</label>

                <p class="form-control-static"><?php echo $v['m_birthday']; ?></p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" style="width: 35%;">所在地址：</label>
                <div class="col-sm-8" style="width: 20%;">
                    <p class="form-control-static" style="width: 80%;"><?php echo $v['m_address']; ?></p>
                </div>
                <label class="col-sm-2 control-label">银行名称：</label>

                <p class="form-control-static"><?php echo $v['m_bank_nickname']; ?></p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" style="width: 35%;">银行卡号：</label>
                <div class="col-sm-8" style="width: 20%;">
                    <p class="form-control-static" style="width: 20%;"><?php echo $v['m_bank_card']; ?></p>
                </div>
                <label class="col-sm-2 control-label">开户行：</label>

                <p class="form-control-static"><?php echo $v['m_bank_address']; ?></p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" style="width: 35%;">银行开户人名字：</label>
                <div class="col-sm-8" style="width: 20%;">
                    <p class="form-control-static" style="width: 20%;"><?php echo $v['m_bank_name']; ?></p>
                </div>
                <label class="col-sm-2 control-label">微信号：</label>

                <p class="form-control-static"><?php echo $v['m_wx']; ?></p>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" style="width: 35%;">支付宝号码：</label>
                <div class="col-sm-8" style="width: 20%;">
                    <p class="form-control-static" style="width: 20%;"><?php echo $v['m_alipay']; ?></p>
                </div>

                <label class="col-sm-2 control-label">推荐人：</label>
                  <?php if($z ==  NULL): else: ?>
                <p class="form-control-static"><?php echo $z['m_user']; ?>【<?php echo $z['m_mobile']; ?>】</p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" style="width: 35%;">身份证号码：</label>
                <div class="col-sm-8" style="width: 20%;">
                    <p class="form-control-static" style="width: 20%;"><?php echo $v['m_id_card']; ?></p>
                </div>

            </div>
            <?php if($list == 1): else: ?>
            <div class="form-group">

                <label class="col-sm-2 control-label" style="width: 60%;"><a href="javascript:history.back()"><button class="btn btn-primary" type="button"  style="width: 20%;">返回</button></a></label>
            </div>

        </div>
        <?php endif; ?>

    </div>


                                                <?php endforeach; endif; else: echo "" ;endif; ?>

</form>

<div class="gohome">

</div>
<script src="/static/admin/js/jquery-1.8.2.min.js"></script>
<script src="/static/admin/layer/layer.js"></script>

<script src='/static/admin/js/laydate/laydate.js'></script>
<script type="text/javascript">

</script>
</body>
</html>
