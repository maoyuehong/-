<?php

namespace app\Admin\controller;

use app\common\AdminController;
use think\Controller;

class Proportion extends AdminController
{
    public function showlist()
    {
        $admin = db('recharge_ratio');
        if (request()->isPost()) {
            //获取用户提交的额数据
            $info = input('post.');
            //dump($info);
            $shuju['r_money'] = $info['r_money'];
            $shuju['r_min_recharge'] = $info['r_min_recharge'];
            $shuju['r_max_recharge'] = $info['r_max_recharge'];
            $shuju['r_profit'] = $info['r_profile'];
            $shuju['r_withdrawals'] = $info['r_withdrawals'];
            $shuju['r_min_money'] = $info['r_min_money'];
            $shuju['r_max_money'] = $info['r_max_money'];
            if ($admin->where(array('r_id' => 1))->update($shuju)) {
                $this->error('修改成功', '/admin/proportion/showlist');
            } else {
                $this->error('您没有更新任何数据！');
            }
        }
        $res = db('recharge_ratio')->select();
        $this->assign('info', $res);
        return view('proportion/showlist');
    }

    public function upd()
    {
        return view('proportion/upd');
    }
}
