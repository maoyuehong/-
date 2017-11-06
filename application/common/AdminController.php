<?php

namespace app\common;

use think\Controller;
use think\Db;
use think\Request;

class AdminController extends Controller
{
    //  //构造方法
    function __construct(){
        parent::__construct();//避免覆盖父类构造方法，先执行

        //控制管理员越权访问
        $admin_id   =  Request::instance()->session('a_id');
       // dump($admin_id);
        $admin_name = session('a_name');
        //dump($admin_name);
         $admin=db('admin')->where(array('a_id'=>$admin_id))->select('a_name');
         //dump($admin);
        //当前访问的控制器-操作方法
        //MODULE_NAME:分组名称
        //CONTROLLER_NAME:控制器名称
        //ACTION_NAME:操作方法名称
        //$nowAC = CONTROLLER_NAME."/".ACTION_NAME;  //Goods-showlist
        //$nowAC= request()->controller()."-".request()->action();
        $nowAC= request()->controller();
       // dump($nowAC);
        //获得当前管理员角色的权限信息
        $roleinfo = Db::table('admin')
            ->alias('a')
            ->join('Role b ','a.a_name = b.role_name')
            ->field('b.role_auth_ac')
            ->find();
//dump($roleinfo);
        //SELECT r.role_auth_ac FROM sp_manager m INNER JOIN sp_role as r on m.role_id=r.role_id WHERE m.mg_id = '500'
        //dump($roleinfo);die;
        //Goods-tianjia,Category-showlist,Order-dayin,Order-tianjia
        $have_auth = $roleinfo['role_auth_ac'];
       // dump($have_auth);
       // dump($have_auth);
      //dump($have_auth);die;
        //系统默认允许访问的权限(无需分配)
        $allow_auth = "Index-index,Lesson-index,Lesson-index_v1,Lesson-index_v148b2,Index-logout";
       //$allow_auth = "Index,Lesson";

        //判断：
        //① 判断当前访问的权限 是否在拥有的权限里边存在
        //② 判断当前访问的权限 是否是默认允许访问的
        //③ 判断当前用户 是否是系统管理员admin
        //以上①、②、③如果都是否定的，则就是越权访问
        //strpos($s1,$s2),判断$s2小串内容在$s1里边左数第几个位置有出现，返回位置数目，数目从0开始计数
        //如果没有出现要返回false
        //例如：strpos('helloworld','my')
        if(strpos($have_auth,$nowAC)===false &&
            strpos($allow_auth,$nowAC)===false &&
            $admin_name!=='admin'){
            exit('没有权限访问！');
            //$this->error('没有权限访问!','admin/index/index');
        }
    }
}
