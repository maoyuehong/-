<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
//给用户更新权限
/***********递归方式获取上下级权限信息****************/
function generateTree($data){
    $items = array();
    foreach($data as $v){
        $items[$v['auth_id']] = $v;
    }
    $tree = array();
    foreach($items as $k => $item){
        if(isset($items[$item['auth_pid']])){
            $items[$item['auth_pid']]['son'][] = &$items[$k];
        }else{
            $tree[] = &$items[$k];
        }
    }
    return getTreeData($tree);
}
function getTreeData($tree,$level=0){
    static $arr = array();
    foreach($tree as $t){
        $tmp = $t;
        unset($tmp['son']);
        $tmp['level'] = $level;
        $arr[] = $tmp;
        if(isset($t['son'])){
            getTreeData($t['son'],$level+1);
        }
    }
    return $arr;
}

/***********递归方式获取上下级权限信息****************/
/***********图片上传*******************/

 function upload($type,$files,$fileType='jpg,png,gif,jpeg',$url,$img=null,$size=512000)
{
    switch ($type) {
        case 'add':
            if (!empty($_FILES[$files])) {
                $file = request()->file($files);
               // dump($file);
                if ($file) {
                    $info = $file->rule('uniqid')->validate(['size' => $size, 'ext' => $fileType])->move(ROOT_PATH . 'public' . DS . 'upload' . DS . $url);
                    //dump($info);
                    if ($info) {
                        if (!empty($img)) {
                            @unlink(ROOT_PATH . 'public' . DS . 'upload' . DS . $url . DS . $img);
                        }
                        $res = $info->getFilename();
                        return array('status' => 0, 'msg' => $res);
                    } else {
                        // 上传失败获取错误信息
                        return array('status' => 1, 'msg' => "上传失败！");
                    }

                } else {
                    return array('status' => 1, 'msg' => "上传文件失败,超出上传文件大小！请刷新");
                }
            } else {
                return array('status' => 1, 'msg' => "请选择要上传图片或文件！");
            }

            break;
        case 'dele':
            $fal_img = unlink(ROOT_PATH . 'public' . DS . 'upload' . DS . $url . DS . $img);
            return $fal_img;
            break;
    }
}