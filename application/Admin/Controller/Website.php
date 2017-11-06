<?php

namespace app\Admin\controller;

use app\common\AdminController;
use think\Controller;

class website extends AdminController
{
    public function add()
    {
        $title = db("title");
        // dump($_POST);die;
        if (request()->isPost()) {
            if (!empty($_POST['id']) && isset($_POST['title']) && isset($_POST['name']) && isset($_POST['content']) && isset($_POST['t_admin_phone'])) {
                $where['t_id'] = input('post.id');

                $data['t_title'] = input('post.title');
                $data['t_name'] = input('post.name');
                $data['t_admin_phone'] = input('post.t_admin_phone');
                $data['t_content'] = input('post.content');
                $data['t_reg_content'] = input('post.t_reg_content');
                if ($title->where($where)->update($data)) {

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

        $where['t_id'] = 1;
        $title_info = $title->where($where)->select();
        // dump($title_info);die;
        $this->assign("title", $title_info);


        return view('website/add');
    }
    public function del(){
          $shuju=input('post.path');
           //$z=upload('dele','img','jpg,png,gif,jpeg',$shuju);
        $z = @unlink(ROOT_PATH . 'public' . DS .$shuju);
           if($z){
               echo json_encode(array('status' => 0, 'msg' => '删除成功'));
               exit;
           }else{
               echo json_encode(array('status' => 0, 'msg' => '删除失败'));
               exit;
           }
    }


}
