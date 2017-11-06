<?php

namespace app\common\model;

use think\Model;

class Pass extends Model
{
    protected $pk='a_id';
    protected $table='role';
    public  function saveAuth($role_id,$auth_id){
        //① 维护role_auth_ids信息
        $auth_ids = implode(',',$auth_id); //Array--->String

        //② 维护role_auth_ac信息
        //根据$auth_ids查询对应的权限信息，以便获得权限里边的"控制器"和"操作方法"
        $authinfo = db('auth')->where(array(
            'auth_level'=>array('gt','0'),
            'auth_id' => array('in',$auth_ids)
        ))->select();
        //dump($authinfo);
        //SELECT * FROM `sp_auth` WHERE `auth_level` > '0' AND `auth_id` IN ('101','105','106','102','108','109')
        //遍历$authinfo非顶级权限信息，获得controller和action信息
        $s = array();

        foreach($authinfo as $k => $v){
            $s[] = $v['auth_c'].'-'.$v['auth_a'];
            //$s[] = $v['auth_c'];

        }
        $ac = implode(',',$s); //Array--->String


        $arr = array(

            'role_auth_ids' => $auth_ids,
            'role_auth_ac' => $ac,

        );
        //dump($arr);
        //dump($arr['role_auth_ac']);
       // session('role_auth_ac',$arr['role_auth_ac']);
        return $this -> save($arr,['a_id'=>$role_id]);
        //dump(getLaetsql(save($arr)));
        //UPDATE `role` SET `role_auth_ids`='101,105,106,102,108,109',`role_auth_ac`='Goods-tianjia,Category-showlist,Order-dayin,Order-tianjia' WHERE `role_id` = 30
    }
}
