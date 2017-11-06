<?php

namespace app\Admin\controller;

use app\common\AdminController;
use think\Controller;

class Recharge extends AdminController
{
    public function showlist()
    {
        $admin = db('distribution_ratio');
        if (request()->isPost()) {
            //获取用户提交的额数据
            $info = input('post.');
            //dump($info);die;

            $shuju['d_a'] = $info['d_a'];
            $shuju['d_b'] = $info['d_b'];
            $shuju['d_c'] = $info['d_c'];

            if ($admin->where(array('d_id' => 1))->update($shuju)) {
                $this->error('修改成功', '/admin/recharge/showlist');
            } else {
                $this->error('您没有更新任何数据！');
            }


        }


        $info = db('distribution_ratio')->select();
        $this->assign('info', $info);
        return view('recharge/showlist');
    }

    public function upd()
    {
        $admin = db('distribution_ratio');
        if (request()->isPost()) {
            //获取用户提交的额数据
            $info = input('post.');
            //dump($info);die;

            $shuju['d_a'] = $info['d_a'];
            $shuju['d_b'] = $info['d_b'];
            $shuju['d_c'] = $info['d_c'];

            if ($admin->where(array('d_id' => 1))->update($shuju)) {
                $this->error('修改成功', '/admin/recharge/showlist');
            } else {
                $this->error('您没有更新任何数据！');
            }


        }


        $info = db('distribution_ratio')->select();
        $this->assign('info', $info);
        return view('recharge/upd');
    }
}
