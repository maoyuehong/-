<?php

namespace app\Admin\controller;

use app\common\AdminController;
use think\Controller;
use think\Request;

class Auth extends AdminController
{
    public function showlist()
    {
        $info = db('auth')->select();
        $auth = generateTree($info);
        //dump($auth);
        $this->assign('auth', $auth);
        return view('auth/showlist');
    }

    public function tianjia()
    {
        $auth = db('auth');
        //dump($_POST);

        if (Request::instance()->isPost()) {
            $shuju = input('post.');
            $info = $shuju['auth_name'];
            if (!empty($info)) {
                $shuju['auth_level'] = $shuju['auth_pid'] == '0' ? '0' : '1';
                //获取当前用户提交的数据
                //dump($shuju);

                //dump($shuju);die;
                //写入数据库
                if ($auth->insert($shuju)) {
                    $this->error('添加成功', 'admin/auth/showlist');
                } else {
                    $this->error('添加失败！重新添加', 'admin/auth/tianjia');
                }

            } else {
                $this->error('不能为空', 'admin/auth/tianjia');
            }


        }

        //获取最顶级的权限
        $info = $auth->where(array('auth_level' => 0))->select();
        // dump($info);
        $this->assign('info', $info);
        return view('auth/tianjia');
    }

    public function del()
    {
        $info = input('param.auth_id');
        //dump($info);
        $z = db('auth')->where(array('auth_id' => $info))->delete();
        if ($z) {
            $this->error('删除成功', 'admin/auth/showlist');

        } else {
            $this->error('删除失败', 'admin/auth/showlist');
        }
    }

    public function upd()
    {
        $auth = db('auth');
        $res = input('param.auth_id');
        //dump($res);
        //获取详情信息并展示到页面上
        $user = db('auth')->where(array('auth_id' => $res))->select();
        $this->assign('user', $user);
        // dump($user);
        $info = db('auth')->where(array('auth_level' => 0))->select();
        //dump($info);
        $this->assign('info', $info);
        //获取修改后的信息

        // dump($shuju);
        if (Request::instance()->isPost()) {
            $shuju = input('post.');
            //dump($shuju);die;
            $z = $auth->where(array('auth_id' => $res))->update($shuju);
            if ($z) {
                $this->error('修改成功', 'admin/auth/showlist');
            } else {
                $this->error('修改失败', 'admin/auth/showlist');
            }
        }


        return view('auth/upd');
    }
}
