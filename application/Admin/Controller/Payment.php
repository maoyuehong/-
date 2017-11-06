<?php

namespace app\Admin\controller;

use app\common\AdminController;
use think\Controller;

class Payment extends AdminController
{
    /*
     *
     *
     * */
    public function showlist()
    {
        $res = input('get.info');
        //dump($res);
        if (empty($res)) {
            $info = db('money_log')
                ->alias('a')
                ->join('Member b', 'a.p_user_id=b.m_id')
                ->field('b.m_user,b.m_mobile,a.p_id,a.p_info,a.p_money,a.p_state,a.p_time')
                ->order('a.p_time desc')
                // ->select();
                ->paginate(15);
        } else {
            $info = db('money_log')
                ->alias('a')
                ->join('Member b', 'a.p_user_id=b.m_id')
                ->field('b.m_user,b.m_mobile,a.p_id,a.p_info,a.p_money,a.p_state,a.p_time')
                ->order('a.p_time desc')
                ->where('m_user|m_mobile|p_id', 'like', '%' . $res . '%')
                // ->select();
                ->paginate(15,false,[
                    'query' => request()->param()
                ]);
        }


        $this->assign('info', $info);
        $this->assign('res', $res);
        return view('payment/showlist');
    }
}
