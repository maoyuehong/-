<?php

namespace app\Admin\controller;

use app\common\AdminController;
use think\Controller;

class Hold extends AdminController
{
    public function threshold()
    {
        $admin = db('distribution_money');
        $id = input('post.id');
        if (request()->isPost()) {
            $shuju = input('post.');
            if (!empty($_POST['id']) && isset($_POST['d_a']) && isset($_POST['d_b']) && isset($_POST['d_c'])) {
                $where['d_id'] = input('post.id');

                $data['d_a'] = input('post.d_a');
                $data['d_b'] = input('post.d_b');
                $data['d_c'] = input('post.d_c');
                if ($admin->where($where)->update($data)) {

                    echo json_encode(array('status' => 0, 'msg' => '保存成功！'));
                    exit;
                } else {

                    echo json_encode(array('status' => 0, 'msg' => '您没有更新任何数据！'));
                    exit;
                }
            } else {

                echo json_encode(array('status' => 0, 'msg' => '请填写相关信息！'));
                exit;
            }
        }


        $info = db('distribution_money')->select();
        $this->assign('info', $info);
        return view('hole/threshold');

    }
}
