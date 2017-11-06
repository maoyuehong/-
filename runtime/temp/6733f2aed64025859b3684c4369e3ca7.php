<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\WWW\thinsone\public/../application/admin\view\lesson\index_v148b2.html";i:1509693458;}*/ ?>
<!DOCTYPE html>
<html>


<!-- Mirrored from www.zi-han.net/theme/hplus/index_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:18:46 GMT -->
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">




    <link rel="shortcut icon" href="favicon.ico"> <link href="/static/admin/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/static/admin/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">

    <!-- Morris -->
    <link href="/static/admin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="/static/admin/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="/static/admin/css/animate.min.css" rel="stylesheet">
    <link href="/static/admin/css/style.min862f.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="col-sm-2" style="width: 19.5%">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-info pull-right">全部</span>
                <h5>复投业绩</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins"><?php echo $futou; ?></h1>
                <div class="stat-percent font-bold text-info"><i class="fa fa-level-up"></i>
                </div>
                <small>总收入</small>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2" style="width: 19.5%">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">全部</span>
                    <h5>现金充值</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $res; ?></h1>
                    <div class="stat-percent font-bold text-success"> <i class="fa fa-bolt"></i>
                    </div>
                    <small>总收入</small>
                </div>
            </div>
        </div>
        <div class="col-sm-2" style="width: 19.5%">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">全部</span>
                    <h5>提现金额</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $tixian; ?></h1>
                    <div class="stat-percent font-bold text-navy"><i class="fa fa-level-up"></i>
                    </div>
                    <small>提现总额</small>
                </div>
            </div>
        </div>
        <div class="col-sm-2" style="width: 19.5%">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right"><?php echo $d; ?>月</span>
                    <h5>新增用户</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $ren; ?></h1>
                    <div class="stat-percent font-bold text-info"><i class="fa fa-level-up"></i>
                    </div>
                    <small>新用户</small>
                </div>
            </div>
        </div>


        <div class="col-sm-2" style="width: 19.5%">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">全部</span>
                    <h5>全部人数</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo $denglu; ?></h1>
                    <div class="stat-percent font-bold text-danger"> <i class="fa fa-level-up"></i>
                    </div>
                    <small>所有人</small>
                </div>
            </div>
        </div>
    </div>
    <div id="container" style="min-width:400px;height:400px"></div>
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>进度情况</h5>
                    <div class="ibox-tools">



                    </div>
                </div>
                <div class="ibox-content">
                    <h5>提现完成度</h5>
                    <div class="stat-percent"><?php echo $cpl; ?> <i class="fa fa-level-up text-navy"></i>
                    </div>
                    <div class="progress">
                        <div style="width: <?php echo $cpl; ?>" aria-valuemax="100" aria-valuemin="0" aria-valuenow="35" role="progressbar" class="progress-bar progress-bar-success">
                            <span class="sr-only"><?php echo $cpl; ?> Complete (success)</span>
                        </div>
                    </div>


                    <h5>充值完成度</h5>
                    <div class="stat-percent"><i class="fa fa-level-up text-navy"><?php echo $z; ?></i>
                    </div>

                    <div class="progress progress-striped">
                        <div style="width: <?php echo $z; ?>" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-warning">
                            <span class="sr-only">40% Complete (success)</span>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="gohome">
    <a class="animated bounceInUp" href="javascript:location.replace(location.href);" title="刷新" style="position:fixed;bottom:20px;right:20px;z-index:100;"><i class="fa fa-repeat" ></i></a>
    <!--<a class="animated bounceInUp" href="javascript:$('body,html').animate({scrollTop:0},500);" title="TOP">Top</a>-->
</div>

<script src="/static/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/static/admin/js/bootstrap.min.js?v=3.3.6"></script>
<script src="/static/admin/js/plugins/flot/jquery.flot.js"></script>
<script src="/static/admin/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="/static/admin/js/plugins/flot/jquery.flot.spline.js"></script>
<script src="/static/admin/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="/static/admin/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="/static/admin/js/plugins/flot/jquery.flot.symbol.js"></script>
<script src="/static/admin/js/plugins/peity/jquery.peity.min.js"></script>

<script src="/static/admin/js/content.min.js?v=1.0.0"></script>
<script src="/static/admin/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/static/admin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/static/admin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<script src="/static/admin/js/plugins/sparkline/jquery.sparkline.min.js"></script>

<script src="/static/admin/js/jquery-1.8.2.min.js"></script>
<script src="/static/admin/js/highcharts.js"></script>

<script type="text/javascript">
    $(function () {
        $('#container').highcharts({
            chart: {
                type: 'spline'
            },
            title: {
                text: '账单统计'
            },

            xAxis: {
                categories: [<?php echo $r; ?>]
            },
            yAxis: {
                title: {
                    text: '数据'
                },
                labels: {
                    formatter: function () {
                        return this.value;
                    }
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true,
                valueDecimals: 2,
                valuePrefix: '￥',
                /*valueSuffix: ' USD'*/
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                name: '提现',
                marker: {
                    symbol: 'square'
                },
                data: [<?php echo $a; ?>]
            }, {
                name: '充值',
                marker: {
                    symbol: 'diamond'
                },
                data: [<?php echo $m; ?>]
            }]
        });
    });

</script>

<script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
</body>
<!--



<!-- Mirrored from www.zi-han.net/theme/hplus/index_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 Jan 2016 14:18:49 GMT -->
</html>
