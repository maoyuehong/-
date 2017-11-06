<?php

namespace app\Admin\controller;

use app\common\AdminController;
use app\common\model\Pass;
use app\common\model\Tianjia;
use think\Controller;
use think\Db;
use think\Request;


class Role extends AdminController
{


    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function showlist()

    {
        /*  $data = Db::table('role')
              ->alias('a')
              ->join('admin b', 'a.a_id =b.a_id')
              ->field('b.a_id,b.a_name,a.role_auth_ac')
              ->select();*/
        //dump($data);
        $user = db('Role')->select();
        //dump($user);die;
        foreach ($user as $k => $value) {
            $user[$k]['auth_ac_name'] = null;
            $val = explode(",", $value['role_auth_ac']);
            //dump($val);die;
            foreach ($val as $key => $value2) {
                $auth = explode('-', $value2);
                // dump($auth['0'].'-'.$auth['1']);die;
                //$name = db('auth')->where(array("auth_c"=>$auth['0'],"auth_a"=>$auth['1']))->find();
                $name = db('auth')->where(array("auth_c" => $auth['0']))->find();
                //dump($name['auth_name']);
                $user[$k]['auth_ac_name'] .= $name['auth_name'] . ',';
            }
        }

        $this->assign('list', $user);
        return view('/Role/showlist');
    }

    public function distribute()
    {
        $role = db('Role');
        $user = Request::instance()->session('a_name');

        if (\request()->isPost()) {
            $info = session('role_id');
            //dump($info);
            //dump($_POST);die;
            //数据入库
            $z = (new Pass())->saveAuth($_POST['a_id'], $_POST['auth_id']);
            if ($z) {
                $this->error('分配权限成功', 'admin/role/showlist');
            } else {
                $this->error('分配权限失败！请重新分配', 'admin/role/distribute');
            }


        } else {
            //获取被分配的角色id，并的到对应的信息
            $role_id = input('param.a_id');
            // dump($role_id);
            //dump($res);
            //$roleinfo=db('Role')->where(array('a_id'=>$role_id))->select();
            $roleinfo = db('Role')->find($role_id);
            //dump($roleinfo);
            $this->assign('roleinfo', $roleinfo);
            //dump($role_id);
            session('role_id', $role_id);
            //把可用于分配信息提取出来，并找出父级和子级
            $authinfoA = db('auth')->where(array('auth_level' => '0'))->select();
            //dump($authinfoA);
            $authinfoB = db('auth')->where(array('auth_level' => '1'))->select();
            //dump($authinfoB);
            $this->assign('authinfoA', $authinfoA);
            $this->assign('authinfoB', $authinfoB);
            return view('/Role/distribute');
        }
    }
    /*  public function del(){
          //获取当前点删除用户的id
          $user=input('param.a_id');
          //获取当前用户的详情信息
          $info=db('role')->where(array('a_id'=>$user))->delete();
          //dump($info);
          if($info){
              $this->error('删除成功','admin/role/showlist');
          }else{
              $this->errer('删除失败','admin/role/showlist');
          }
      }*/
}
