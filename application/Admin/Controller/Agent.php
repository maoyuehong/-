<?php

namespace app\Admin\controller;

use app\common\AdminController;
use think\Controller;

class Agent extends AdminController
{
    public function surface()
    {


            if (request()->isPost()) {
                $admin = db('agent_ratio');
                //获取用户提交的额数据
                $test = input('post.');
                //dump($test['a']);die;
                $shuju['a_a'] = $test['a'];
                $shuju['a_b'] = $test['b'];
                $shuju['a_c'] = $test['c'];
                $shuju['a_d'] = $test['d'];
                $shuju['a_sum_money'] = $test['a_sum_money'];
                $shuju['a_money'] = $test['money'];
                $z=$admin->where('a_id',1)->update($shuju);
               // halt($z);
                if ($z) {

                        $this->error('修改成功');


                } else {
                    $this->error('您没有更新任何数据！');
                }


            }

        $info = db('agent_ratio')->select();
        //dump($info);
        $this->assign('info', $info);
        return view('agent/surface');
    }
}
