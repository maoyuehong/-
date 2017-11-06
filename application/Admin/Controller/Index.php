<?php

namespace app\Admin\controller;

use app\common\AdminController;
use app\common\model\Admin;

use think\captcha\Captcha;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use think\Validate;


class Index extends AdminController
{


    /*
     * 登录
     * */

    public function index()
    {
        if (strpos($_SERVER ["HTTP_USER_AGENT"], "MSIE 7.0")) {
            //echo($_SERVER ["HTTP_USER_AGENT"]);
            echo("Internet Explorer 6.0   浏览器版本过低！（为了更好的浏览体验，请切换至高级浏览器！");
            exit;
        } else if (strpos($_SERVER ["HTTP_USER_AGENT"], "MSIE 6.0")) {
            echo("Internet Explorer 7.0   浏览器版本过低！（为了更好的浏览体验，请切换至高级浏览器！");
            exit;

        } else if (strpos($_SERVER ["HTTP_USER_AGENT"], "MSIE 6.0")) {
            echo("Internet Explorer 8.0   浏览器版本过低！（为了更好的浏览体验，请切换至高级浏览器！");
            exit;

        } else if (strpos($_SERVER ["HTTP_USER_AGENT"], "MSIE 6.0")) {
            echo("Internet Explorer 9.0   浏览器版本过低！（为了更好的浏览体验，请切换至高级浏览器！");
            exit;

        }

        if (Request::instance()->isAjax()) {

            //echo 1111111111;
            //$user=input('post.');
            //dump($user);
            $res = (new Admin())->login(input('post.'));
            //echo 11111111111111;
            //dump($res);die;
            $user = input('post.verify');
            ///dump($user);
            /*  if(!captcha_check($user)){
                  $this->error('验证码错误');
              };*/
            if ($res['valid']) {

                //说明验证成功
                //echo $res['msg'];

                echo json_encode(array('status' => 0, 'msg' => $res['msg']));
                exit;
            } else {
                //说明验证失败
                // echo $res['msg'];
                echo json_encode(array('status' => 1, 'msg' => $res['msg']));
                exit;
            }
        }

        return view('index/index');
    }

    /*
     *
     * 退出登录
     * */
    public function logout()
    {
        Session::clear();
        return view('index/index');
    }

}