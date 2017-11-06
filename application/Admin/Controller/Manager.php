<?php

namespace app\Admin\controller;

use app\common\AdminController;
use think\Controller;


class Manager extends AdminController
{
    public function showlist()
    {
        $res = input('param.info');
        //dump($res);

        //获取当前用户id
        $id = session('a_id');
        // dump($id);
        $admin = db('admin')->select();
        //
        $this->assign('user', $admin);
        if ($id == 1) {
            if (empty($res)) {
                $admin = db('admin')->paginate(6);

            } else {
                $admin = db('admin')->where('a_name', 'like', '%' . $res . '%')->paginate(15,false,[
                    'query' => request()->param()
                ]);

            }
            //dump($admin);


        } else {
            $admin = db('admin')->where(array('a_id' => $id))->paginate(1);

        }

        $this->assign('info', $admin);
        $this->assign('res', $res);
        return view('manager/showlist');
    }

    public function upd()
    {
        $id = input('param.a_id');


        $user = db('admin')->where(array('a_id' => $id))->select();
        $admin = db('admin');
        //dump($_POST);die;
        if (\request()->isPost()) {
            if (!empty($_POST['a_id']) && !empty($_POST['a_nickname']) && !empty($_POST['a_name'])) {
                $where['a_id'] = input('post.a_id');
                // dump($where['a_id']);

                $data['a_nickname'] = input("post.a_nickname");
                $data['a_name'] = input("post.a_name");

                $admin_session = session('a_id');
                if ($_POST['a_id'] != 1 && $admin_session['a_id'] == 1) {
                    $data['a_list'] = input("post.a_list");
                }
//用户名是否存在
                $where_count['a_id'] = array('neq', input('post.a_id'));
                $where_count['a_name'] = input("post.a_name");
                $count = $admin->where($where_count)->count();
                if ($count == 0) {
                    //新密码是否为null
                    if (!empty($_POST['a_password']) && isset($_POST['password_two'])) {
                        if (preg_match("/^[A-Za-z0-9_\,\.\;\\\'\?]{5,20}$/", $_POST['a_password'])) {//验证密码格式
                            if ($_POST['a_password'] == $_POST['password_two']) {
                                $data['a_password'] = md5(input("post.a_password"));
                            } else {

                                $this->error('确认密码不一致！');
                            }
                        } else {

                            $this->error('密码格式有误！');
                        }
                    }
                } else {

                    $this->error('该用户名已存在！');
                }
                if ($res = $admin->where($where)->update($data)) {
                    $this->error('保存成功！');

                } else {

                    $this->error('您没有更新任何数据！');
                }
            } else {

                $this->error('请填写相关信息！');
            }

        }


        $this->assign('info', $user);
        return view('manager/upd');

    }

    public function del()
    {
        //获取当前点删除用户的id
        $user = input('param.a_id');
        $name = input('param.a_name');
        //dump($name);die;
        // dump($user);
        //获取当前用户的详情信息
        $info = db('admin')->where(array('a_id' => $user))->delete();

        if ($info) {
            db('role')->where(array('role_name' => $name))->delete();
            $this->error('删除成功', 'admin/manager/showlist');
            //echo json_encode(array('status'=>0,'msg'=>'删除成功！请谨慎删除！'));
        } else {
            $this->error('删除失败', 'admin/manager/showlist');
            //echo json_encode(array('status'=>1,'msg'=>'删除失败'));
        }
    }

    /** 新增管理员  */
    public function admin_add()
    {
        $admin = db("admin");

        if (request()->isAjax()) {
            if (!empty($_POST['nickname']) && !empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['password_two']) && isset($_POST['list'])) {
                $where['a_name'] = input("post.name");
                $count = $admin->where($where)->count();
                if ($count == 0) {
                    if (preg_match("/^[A-Za-z0-9_\,\.\;\\\'\?]{5,20}$/", $_POST['password'])) {//验证密码格式
                        if ($_POST['password'] == $_POST['password_two']) {
                            $data['a_nickname'] = input("post.nickname");
                            $data['a_name'] = input("post.name");
                            $data['a_password'] = md5(input("post.password"));
                            $data['a_list'] = input("post.list");
                            $data['a_date'] = '0000-00-00 00:00:00';
                            $data['a_out_date'] = '0000-00-00 00:00:00';
                            if ($res = $admin->insert($data)) {

                                $info['role_name'] = $data['a_name'];
                                db('role')->insert($info);
                                echo json_encode(array('fal' => 0, 'msg' => '保存成功！'));
                                exit;
                            } else {

                                echo json_encode(array('fal' => 1, 'msg' => '操作失败，请谨慎操作！'));
                                exit;
                            }
                        } else {

                            echo json_encode(array('fal' => 1, 'msg' => '确认密码不一致！'));
                            exit;
                        }
                    } else {

                        echo json_encode(array('fal' => 1, 'msg' => '密码格式有误！'));
                        exit;
                    }
                } else {

                    echo json_encode(array('fal' => 1, 'msg' => '该用户名已存在！'));
                    exit;
                }
            } else {

                echo json_encode(array('fal' => 1, 'msg' => '请填写相关信息！'));
                exit;
            }

        }
        return view("manager/admin_add");
        exit;


    }


}
