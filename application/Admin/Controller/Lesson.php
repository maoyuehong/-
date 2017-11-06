<?php

namespace app\Admin\controller;

use app\common\AdminController;

use think\Cache;
use think\cache\Driver;
use think\Controller;
use think\Db;
use think\Request;
use \think\Session;

class Lesson extends AdminController
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //获取当前用户名

        $user = Request::instance()->session('a_name');
        // dump($user);
        $a_id = Request::instance()->session('a_id');
        // dump($a_id);
        if (!empty($user)) {
            if ($user !== 'admin') {
                //普通管理员
                //查询当前用户名的级别为

                $data = db('admin')
                    ->alias('a')
                    ->join('role b', 'a.a_name=b.role_name')
                    ->field('b.role_auth_ids')
                    ->find();
                //dump($data);
                $authinfo = $data['role_auth_ids'];
                // dump($authinfo);
                $authinfoA = db('auth')->where(array('auth_level' => '0', 'auth_id' => array('in', $authinfo)))->select();
                //dump($authinfoA);
                $authinfoB = db('auth')->where(array('auth_level' => '1', 'auth_id' => array('in', $authinfo)))->select();
                //dump($authinfoB);
            } else {
                //系统超级管理员
                $authinfoA = db('auth')->where(array('auth_level' => '0'))->select();
                //dump($authinfoA);
                $authinfoB = db('auth')->where(array('auth_level' => '1'))->select();

            }
            $this->assign('authinfoA', $authinfoA);
            $this->assign('authinfoB', $authinfoB);

            $res = db('admin')->where('a_name', $user)->select();
            $cont = db('withdrawals_log')->where('w_state', 1)->count();
            //dump($cont);

            //dump($res);
            $this->assign('cont', $cont);
            $this->assign('res', $res);


        } else {
            $this->error('请先登录', '/admin/index/index');


        }


        return view('lesson/index');
    }

    public function profile()

    {
        return view('profile');

    }

    public function index_v148b2()
    {
        //总资产
        //当前月份
        $d = date('n');
        //获取当前的天数
        $r = date('d');
        //获取当月的天数
        $days = date("t");
        //剩余的天数
        $z = $days - $r + 1;

        // $t = time();
        //$start_time = mktime(0,0,0,date("m",$t),date("d",$t),date("Y",$t));  //当天开始时间
        //dump($start_time);
        // $end_time = mktime(23,59,59,date("m",$t),date("d",$t),date("Y",$t)); //当天结束时间


        //获取当前月的开始时间、结束时间：
        $date = date("Y-m-d H:i:s");
        $s = strtotime($date);


        $firstday = date('Y-m-01 00:00:00', strtotime($date));  //本月第一天
        $one = strtotime($firstday);
        //dump($one);1506
        $lastday = date('Y-m-d 23:59:59', strtotime("$firstday +1 month -1 day")); //本月最后一天
        $two = strtotime($lastday);
        // dump($two);1509
        // $r=$lastday-$data


        $res = db('member')

            ->sum('m_sum_money');

        $futou=db('money_log')

            ->where('p_info','收益钱包支付')
            ->sum('p_money');


//dump($res);

        $ren = db('member')
            ->where('m_time', 'between', [$one, $two])
            ->count();
        // dump($ren);die;
        $tixian = db('withdrawals_log')
            //->fetchSql(true)

            ->sum('w_money');
        // dump($tixian);
        $denglu = db('member')
            ->count();
        //dump($denglu);
        $this->assign('futou',$futou);
        $this->assign('denglu', $denglu);
        $this->assign('ren', $ren);
        $this->assign('tixian', $tixian);
        $this->assign('res', $res);
        $this->assign('d', $d);

        //提现总金额
        $money = db('withdrawals_log')->sum('w_money');
        //dump($money);
        //获取所有提现用户总数
        $cont = db('withdrawals_log')->count();

        //获取已经成功提现的用户
        $rou = db('withdrawals_log')->where('w_state', 2)->count();
        //dump($rou);
        if ($cont == 0) {
            $cpl = 0;
        } else {
            //进度值；
            $cpl = round($rou / $cont * 100, 2) . "%";
        }
        $this->assign('cpl', $cpl);
        $this->assign('money', $money);

        //总共充值金额
        $cont = db('money_log')->sum('p_money');
        $this->assign('cont', $cont);
        //dump($cont);
        //总共充值人数
        $ren = db('money_log')->count();
        //dump($ren);die;
        //已提现的人数
        $zou = db('money_log')->where('p_state', 2)->count();
        if ($ren == 0) {
            $cen = 0;
        } else {
            $cen = round($zou / $ren * 100, 2) . "%";
        }

        //dump($cpl);

        $this->assign('z', $cen);


//获取开始日期
        $A1 = date('Y-m-01 ', strtotime($date));  //本月第一天
        //dump($A1);
        //dump($one);1506
        $A2 = date('Y-m-d ', strtotime("$A1 +1 month -1 day")); //本月最后一天
        //php获取今日开始时间戳和结束时间戳

        $A3 = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
        //dump($beginToday);

        $A4 = mktime(0, 0, 0, date('m'), date('d') + 1, date('Y')) - 1;
        //dump($A2);
        $ToStartMonth = strtotime($A1); //转换一下
        $ToEndMonth = time(); //一样转换一下
        $s = null;
        $z = null;
        $m = null;

        for ($start = $ToStartMonth; $start <= $ToEndMonth; $start += 24 * 3600) {
            $s .= "'" . date('Y-m-d', $start) . "',";

            /*    $where = ['>=',$start];
                $where1 = ['<=',$start+86399];*/

            //dump($where);
            $z .= db('withdrawals_log')
                    ->where('w_time', '>=', $start)
                    ->where('w_time', '<=', $start + 86399)
                    ->where('w_state', 2)
                    ->sum('w_money') . ",";

            $m .= db('money_log')
                    ->where('p_time', '>=', $start)
                    ->where('p_time', '<=', $start + 86399)
                    ->where('p_state', 2)
                    ->sum('p_money') . ",";

        }

        $this->assign('r', $s);

        $this->assign('a', $z);
        $this->assign('m', $m);

        return view('index_v148b2');
    }

    /*清除缓存*/
    public function cache()
    {
    	//清文件缓存
    	$file = dirname(realpath(dirname($_SERVER['SCRIPT_FILENAME']))).'/runtime/';
    	$dirs = array($file);
    	@mkdir($file);
    	//清理缓存
    	foreach($dirs as $value) {
    		$this->rmdirr($value);
    	}
    	$this->success("系统缓存清除成功！");
    }
    // 递归删除文件夹、文件
    public function rmdirr($dirname) {
    	if (!file_exists($dirname)) {
    		return false;
    	}
    	if (is_file($dirname) || is_link($dirname)) {
    		return unlink($dirname);
    	}
    	$dir = dir($dirname);
    	if($dir){
    		while (false !== $entry = $dir->read()) {
    			if ($entry == '.' || $entry == '..') {
    				continue;
    			}
    			//递归
    			$this->rmdirr($dirname . DIRECTORY_SEPARATOR . $entry);
    		}
    	}
    	$dir->close();
    	return rmdir($dirname);
    }

}
