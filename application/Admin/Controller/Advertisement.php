<?php

namespace app\Admin\controller;

use think\Controller;

class Advertisement extends Controller
{
    public function administration()
    {

        $info = db('img')->where('i_id', 1)->find();

        $this->assign('info', $info);
        return view('advertisement/administration');
    }

    function edit()
    {
        //dump($_POST);die;
//

        $goods_id = input('post.id');
        if (!empty($_FILES['img_edit']) && !empty($_POST['imgName'])) {
            $info = upload('add', 'img_edit', 'jpg,png,gif,jpeg', 'img', $_POST['imgName'], 2048000);
            if ($info) {
                $where[$_POST['name']] = $info['msg'];
                $res = db('img')->where('i_id', 1)->update($where);
                if ($res) {
                    echo json_encode(array('status' => 0, 'msg' => "修改成功！！"));
                    exit;
                } else {
                    echo json_encode(array('status' => 1, 'msg' => "修改失败,没要更新任何数据"));
                    exit;
                }
            } else {
                echo json_encode(array('status' => 1, 'msg' => $info['msg']));
                exit;
            }

        }


    }
}
