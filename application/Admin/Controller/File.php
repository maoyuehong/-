<?php

namespace app\Admin\controller;

use app\common\AdminController;
use think\Controller;

class File extends AdminController
{


    public function index()
    {

        $file_menu = array("file_list" => "文件列表", "img_list" => "文章图片", "img" => "网站插图", "focus_img" => "幻灯片", "cases_img" => "全景封面图");
        //dump($file_menu);
        $this->assign('file_menu', $file_menu);
        return view('file/index');
    }

}
