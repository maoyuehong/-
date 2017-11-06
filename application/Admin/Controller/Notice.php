<?php

namespace app\Admin\controller;

use app\common\AdminController;
use think\Controller;

class Notice extends AdminController
{
    public function journalism()
    {

        $info = db('news')->paginate(15);
        $this->assign('info', $info);
        return view('notice/journalism');
    }

    /**  内容管理   */
    public function about_us()
    {
        $about_us = db("news");
        $id = input('param.id');
        //dump($id);
        if (request()->isAjax()) {
            //dump($_POST['content']);die;

            if (!empty($_POST['name']) && isset($_POST['content']) && isset($_POST['date']) && !empty($_POST['state'])) {

                $where['n_id'] = input("post.id");
                $data['n_title'] = input('post.name');
                $data['n_content'] = $_POST['content'];
                $data['n_state'] = input('post.state');
                $data['n_time'] = strtotime(input('post.date'));
                if ($about_us->where($where)->update($data)) {
                    /*if (!empty($_POST['content'])) {
                         unlink(ROOT_PATH . 'public' . DS . 'upload' . DS . 'img_list' . DS .  );
                     }*/
                    echo json_encode(array('status' => 0, 'msg' => "保存成功！"));
                    exit;
                } else {

                    echo json_encode(array('status' => 0, 'msg' => "您没有更新任何数据！"));
                    exit;
                }
            } else {

                echo json_encode(array('status' => 0, 'msg' => "数据无效，请谨慎操作！"));
                exit;
            }
        }

        $info = $about_us->where('n_id', $id)->find();
        $this->assign('info', $info);
        return view('notice/upd');

    }

    public function del()
    {

        if (!empty($_POST['id'])) {
            $about_us = db("news");
            $data = input('post.id');
            if ($about_us->delete($data)) {

                echo json_encode(array('status' => 0, 'msg' => "删除成功！"));
                exit;
            } else {

                echo json_encode(array('status' => 0, 'msg' => "系统繁忙，请稍候再试！"));
                exit;
            }
        } else {

            echo json_encode(array('status' => 0, 'msg' => "操作失败，请谨慎操作！"));
            exit;
        }
    }


    public function add()
    {
        $about_us = db("news");
        if (request()->isPost()) {
            if (!empty($_POST['name']) && isset($_POST['content']) && isset($_POST['date']) && !empty($_POST['state'])) {
                //dump($_POST);die;
                $data['n_title'] = input('post.name');
                $data['n_content'] = $_POST['content'];
                $data['n_state'] = input('post.state');
                $data['n_time'] = strtotime(input('post.date'));
                if ($about_us->insert($data)) {
                    /*if (!empty($_POST['content'])) {
                         unlink(ROOT_PATH . 'public' . DS . 'upload' . DS . 'img_list' . DS .  );
                     }*/
                    echo json_encode(array('status' => 0, 'msg' => "保存成功！"));
                    exit;
                } else {

                    echo json_encode(array('status' => 0, 'msg' => "您没有添加任何数据！"));
                    exit;
                }
            } else {

                echo json_encode(array('status' => 0, 'msg' => "数据无效，请谨慎操作！"));
                exit;
            }
        }

        return view('notice/add');
    }


}
