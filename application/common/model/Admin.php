<?php

namespace app\common\model;


use think\Loader;
use think\Model;

class Admin extends Model
{
    protected $pk='a_id';
    protected $table='admin';
    public function login($data)
    {
        //dump($data);
        //执行验证
     //dump($_POST);
        $validate = Loader::validate('admin');
        if (!$validate->check($data)) {
            return ['valid'=>0,'msg'=>$validate->getError()];
            //dump($validate->getError());
            //如果正确就存入session


        }


        //die;
        //比对用户名和密码
       $userinfo= $this->where('a_name',$data['username'])->where('a_password',md5($data['password']))->find();
      // halt($userinfo);die;
        if(!$userinfo){
            //说明在数据库没有找到数据
            return ['valid'=>0,'msg'=>'用户名或密码不存在'];

        }
        //最近登录时间
        $data_two['a_date'] = array('exp','now()');
        //上次登录时间
        $data_two['a_out_date'] = $userinfo['a_date'];
        db('admin')->where('a_name',$data['username'])->where('a_password',md5($data['password']))->update($data_two);

            session('a_id',$userinfo['a_id']);
            session('a_name',$userinfo['a_name']);

            return ['valid'=>1,'msg'=>'登录成功...'];

    }
}
