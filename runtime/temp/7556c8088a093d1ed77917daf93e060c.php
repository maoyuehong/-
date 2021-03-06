<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\WWW\thinsone\public/../application/admin\view\withdrawals\showlist.html";i:1509767219;}*/ ?>
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
  <div class="row m-b-xs">
    <div class="col-sm-9"></div>
    <div class="col-sm-3">
      <div class="input-group">
        <input type="text" id="info" placeholder="请输入会员号码或手机号" class="input-sm form-control" value="<?php echo $res; ?>">
        <span class="input-group-btn"><button type="button" class="btn btn-sm btn-primary" onclick="search();"> 搜索</button> </span>
      </div>
    </div>
  </div>
  <table class="table table-hover">
    <thead>
    <tr>
      <th >ID</th>
      <th>会员【电话】</th>
      <th>备注信息</th>
      <th>提现金额</th>
      <th>状态</th>
      <th>提现时间</th>

    </tr>
    </thead>
    <tbody>
    <?php if(is_array($info) || $info instanceof \think\Collection || $info instanceof \think\Paginator): if( count($info)==0 ) : echo "" ;else: foreach($info as $key=>$v): ?>
    <tr>
      <td ><?php echo $v['w_id']; ?></td>
      <td><?php echo $v['m_user']; ?>【<?php echo $v['m_mobile']; ?>】</td>
      <td><?php echo $v['w_info']; ?></td>
      <td><?php echo $v['w_money']; ?></td>
      <td  class="test<?php echo $v['w_id']; ?>">
        <?php switch($v['w_state']): case "1": ?>处理中<?php break; case "2": ?>已成功<?php break; endswitch; ?>
      </td>
      <td><?php echo date('Y-m-d H:i:s',$v['w_time']); ?></td>

      <td>

        <!--<a href="<?php echo url('upd',array('w_id'=>$v['w_id'])); ?>"><button class="btn btn-success btn-xs" type="button" ><i class="fa fa-edit"></i> 编辑</button></a>-->

        <?php if($v['w_state'] == 1): ?>
        <button class="btn btn-success btn-xs " type="button"   onclick="info('<?php echo $v['w_id']; ?>')">待处理 <i class="fa fa-edit" >
          <?php elseif($v['w_state'] == 2): endif; ?>
        <!--<button class="btn btn-danger btn-xs" type="button" onclick="dele();"><i class="fa fa-trash"></i> 删除</button>-->
      </td>
    </tr>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <tfoot>
    <tr>
      <td colspan="100" align="right">
<?php echo $info->render(); ?>
      </td>
    </tr>
    </tfoot>
    </tbody>
  </table>
</div>
<div class="gohome">
  <a class="animated bounceInUp" href="javascript:location.replace(location.href);" title="刷新" style="position:fixed;bottom:20px;right:20px;z-index:100;"><i class="fa fa-repeat"></i></a>
  <!--<a class="animated bounceInUp" href="javascript:$('body,html').animate({scrollTop:0},500);" title="TOP">Top</a>-->
</div>
<script src="/static/admin/js/jquery-1.8.2.min.js"></script>
<script src="/static/admin/layer/layer.js"></script>
<script type="text/javascript">
    var SubmitOrHidden = function(event) {
        e = event ? event : (window.event ? window.event : null);
        if (e.keyCode == 13) {
            search();
        }
    }
    window.document.onkeydown = SubmitOrHidden;
   function info(id){
        var w_id= id;
        //示范一个公告层
        var w_state=$('.test'+id).html();
        //console.log(w_state);return;

       // console.log(w_id);
        //alert(w_state);



        layer.alert('是否修改当前状态', {
            skin: 'layui-layer-molv' //样式类名 自定义样式
            ,closeBtn: 1  // 是否显示关闭按钮
            ,anim: 1 //动画类型
            ,btn: ['修改','我想想'] //按钮
            ,icon: 6  // icon
            ,yes:function(){
                $.ajax({
                    type:'post',
                    url:'/admin/withdrawals/upd',
                    dataType:'json',

                    data:{
                        'w_id':w_id ,
                        'w_state':w_state ,
                    },
                    success:function(msg){
                        if(msg.status==0){
                            layer.msg(msg['msg'],{icon:6},function(){
                                window.location.reload();
                            })
                        }else{
                            layer.msg(msg['msg'])
                        }
                    }
                })
            }
          });

    };

  /* 搜索 */
  function search(){
      var info = $("#info").val();
      window.location="__URL__/showlist?info="+info;
  }



</script>
</body>
</html>

