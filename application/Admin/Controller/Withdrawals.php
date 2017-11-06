<?php

namespace app\Admin\controller;

use app\common\AdminController;
use think\Controller;

class Withdrawals extends AdminController
{
    public function showlist()
    {
        $res = input('get.info');
        if (empty($res)) {
            $info = db('withdrawals_log')
                ->alias('a')
                ->join('Member b', 'a.w_user_id=b.m_id')
                ->field('b.m_user,b.m_mobile,a.w_id,a.w_info,a.w_money,a.w_state,a.w_time')
                ->order('a.w_time desc')
                // ->select();
                ->paginate(15);
            // $info=db('withdrawals_log')->order('w_time desc')->paginate(8);
        } else {
            $info = db('withdrawals_log')
                ->alias('a')
                ->join('Member b', 'a.w_user_id=b.m_id')
                ->field('b.m_user,b.m_mobile,a.w_id,a.w_info,a.w_money,a.w_state,a.w_time')
                ->order('a.w_time desc')
                ->where('m_user|m_mobile', 'like', '%' . $res . '%')
                // ->select();
                ->paginate(15,false,[
                    'query' => request()->param()
                ]);

        }

        //dump($info);
        $this->assign('info', $info);
        $this->assign('res', $res);
        return view('withdrawals/showlist');
    }

    /* public  function  upd()
     {
         //获取当前的修改的id
         $id=input('param.w_id');
          //获取当前用户传递的状态
         if(request()->isPost()){
             $info['w_state']=input('post.w_state');
             //dump($info);
             //修改当前状态
             $z=db('withdrawals_log')->where(array('w_id'=>$id))->update($info);
             if($z){
                 $this->error('修改成功','admin/withdrawals/showlist');
             }else{
                 $this->error('修改失败');
             }

         }

         $info=db('withdrawals_log')->where(array('w_id'=>$id))->select();
         $this->assign('info',$info);
         return view('withdrawals/upd');
     }*/
    public function upd()
    {
        //dump(input('post.'));
        if (request()->isAjax()) {
            $info = input('post.w_id');
            $res = trim(input('post.w_state'));
            //$info=input('post.');
            //dump($res);die;

            if ($res == '处理中') {
                $z = db('withdrawals_log')->where(array('w_id' => $info))->update(['w_state' => 2]);
            } else if ($res == '已成功') {
                $z = db('withdrawals_log')->where(array('w_id' => $info))->update(['w_state' => 1]);
            } else {
                echo json_encode(array('status' => 1, 'msg' => '修改失败，请联系管理员'));
                exit;
            }
            if ($z) {
                echo json_encode(array('status' => 0, 'msg' => '修改成功'));
                exit;
            } else {
                echo json_encode(array('status' => 1, 'msg' => '修改失败'));
                exit;
            }

        }
    }

    public function about_us()
    {

    }

    public function status()
    {
        $res = input('get.info');
        $info = db('withdrawals_log')
            ->alias('a')
            ->join('Member b', 'a.w_user_id=b.m_id')
            ->field('b.m_user,b.m_mobile,a.w_id,a.w_info,a.w_money,a.w_state,a.w_time')
            ->order('a.w_time desc')
            ->where('a.w_state', 1)
            // ->select();
            ->paginate(15,false,[
                'query' => request()->param()
            ]);
        $this->assign('res', $res);
        $this->assign('info', $info);
        return view('withdrawals/showlist');
    }
}
