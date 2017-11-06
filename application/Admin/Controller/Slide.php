<?php

namespace app\Admin\controller;

use app\common\AdminController;
use think\Controller;

class Slide extends AdminController
{
    public function set()
    {
        if (request()->isPost()) {
            $focus_img = db("focus_img");

            $pay = input('post.f_order');
            $info = upload('add', 'img', 'jpg,png,gif,jpeg', 'focus_img', null, 2048000);
            if ($info['status'] == 0) {
                $where['f_img'] = $info['msg'];
                $where['f_order'] = $pay;
                if ($focus_img->insert($where)) { // 成功上传后 获取上传信息
                    echo json_encode(array('status' => 0, 'msg' => "上传成功"));
                    exit;
                } else {
                    echo json_encode(array('status' => 1, 'msg' => "上传失败！"));
                    exit;
                }
            } else {
                // 上传失败获取错误信息
                echo json_encode(array('status' => 1, 'msg' => $info['msg']));
                exit;
            }
        }
        $shuju = db('focus_img')->order('f_order asc')->select();

        $this->assign('info', $shuju);
        return view('slide/set');


    }

    /** 文件修改 */
    function edit()
    {
        //     dump($_POST);die;
//        die;
        $shuju = input('post.');
        $goods_id = input('post.id');
        if (!empty($_FILES['img_edit']) && !empty($_POST['imgName'])) {
            $info = upload('add', 'img_edit', 'jpg,png,gif,jpeg', 'focus_img', $_POST['imgName'], 2048000);
            $where['f_img'] = $info['msg'];
        }

        $where['f_order'] = $shuju['order_edit'];
        $res = db('focus_img')->where('f_id', $goods_id)->update($where);
        if ($res) {
            echo json_encode(array('status' => 0, 'msg' => "修改成功！！"));
            exit;
        } else {
            echo json_encode(array('status' => 1, 'msg' => "修改失败,没要更新任何数据"));
            exit;
        }
    }

    /** 删除 */
    public function dele()
    {
        if (!empty($_POST['id']) && !empty($_POST['img'])) {
            $focus_img = db("focus_img");
            $data = input('post.id');
            //dump(input('post.'));die;
            if ($focus_img->delete($data)) {
                //删除图片
                $info = upload('dele', 'img', 'jpg,png,gif,jpeg', 'focus_img', $_POST['img'], 2048000);

                if ($info) {
                    echo json_encode(array('status' => 0, 'msg' => "删除成功！！"));
                    exit;
                } else {
                    echo json_encode(array('status' => 1, 'msg' => "删除失败！！"));
                    exit;
                }
            } else {

                echo json_encode(array('status' => 1, 'msg' => "系统繁忙，稍后再试！"));
                exit;
            }
        } else {

            echo json_encode(array('status' => 1, 'msg' => "系统繁忙，稍后再试！"));
            exit;
        }
    }

}



