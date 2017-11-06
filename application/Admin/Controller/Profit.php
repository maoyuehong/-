<?php

namespace app\Admin\controller;

use app\common\AdminController;
use think\Controller;
use think\Db;
use think\Request;

class Profit extends AdminController
{
    public function showlist()
    {
        /*$data = Db::table('admin')
            ->alias('a')
            ->join('Role b', 'a.a_id =b.a_id')
            ->where(array('a.a_id'=>$a_id))
            ->field('b.role_auth_ids')
            ->find();*/
        $res = input('get.info');
        if (empty($res)) {
            $info = db('profit_log')
                ->alias('a')
                ->join('Member b', 'a.p_user_id=b.m_id')
                ->field('b.m_user,b.m_mobile,a.p_id,a.p_info,a.p_money,a.p_state,a.p_time')
                ->order('a.p_time desc')
                // ->select();
                ->paginate(15);
        } else {
            $info = db('profit_log')
                ->alias('a')
                ->join('Member b', 'a.p_user_id=b.m_id')
                ->field('b.m_user,b.m_mobile,a.p_id,a.p_info,a.p_money,a.p_state,a.p_time')
                ->where('m_user|m_mobile', 'like', '%' . $res . '%')
                ->order('a.p_time desc')
                // ->select();
                ->paginate(15,false,[
                    'query' => request()->param()
                ]);
        }

        // dump($info);die;
        $this->assign('res',$res);
        $this->assign('info', $info);
        return view('profit/showlist');
    }

}
