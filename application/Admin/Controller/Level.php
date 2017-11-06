<?php

namespace app\Admin\controller;

use think\Controller;

class Level extends Controller
{
    public function add()
    {
        $admin = db("member");


        if (request()->isPost()) {

            //dump($user);die;
            if (!empty($_POST['m_user']) && !empty($_POST['m_mobile']) && !empty($_POST['password']) && isset($_POST['password_two'])) {
                $where['m_user'] = input("post.m_user");
                $mobile['m_mobile'] = input('post.m_mobile');
                $shuju = input('post.m_introducer');
                if (!empty($shuju)) {
                    $user = db('member')->where(array('m_user' => $shuju))->field('m_id')->find();
                    if (!empty($user)) {
                        $data['m_introducer'] = $user['m_id'];
                    } else {
                        $this->error('该推荐人不存在');
                    }
                }
                $count = $admin->where($where)->count();
                // dump($user);die;
                $cont = $admin->where($mobile)->count();
                // dump($cont);die;
                if ($count == 0) {
                    if ($cont < 2) {
                        if (preg_match("/^[A-Za-z0-9_\,\.\;\\\'\?]{5,20}$/", $_POST['password']) && preg_match("/^[A-Za-z0-9_\,\.\;\\\'\?]{5,20}$/", $_POST['m_user'])) {//验证密码格式
                            if ($_POST['password'] == $_POST['password_two']) {
                                $data['m_user'] = input("post.m_user");
                                $data['m_mobile'] = input("post.m_mobile");
                                $data['m_password'] = md5(input("post.password"));
                                $data['m_time'] = time();
                                if ($res = $admin->insert($data)) {
                                    $this->error('添加用户成功！');
                                } else {
                                    $this->error('操作失败，请谨慎操作！');

                                }
                            } else {
                                $this->error('确认密码不一致！');

                            }
                        } else {
                            $this->error('用户名或密码格式有误！');

                        }

                    } else {
                        $this->error('该会员注册已经超过两次');
                    }
                } else {
                    $this->error('该用户名已存在');

                }
            } else {
                $this->error('请填写相关信息！');

            }

        }
        return view('level/add');
    }
}
