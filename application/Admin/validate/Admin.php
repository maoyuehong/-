<?php
namespace app\Admin\validate;
use think\Validate;
class Admin extends Validate{
    protected $rule = [
        'username'  =>  'require',
        'password' =>  'require',
        'verify'=>'require|captcha'

    ];
    protected $message = [
        'username.require'  =>  '用户名不能为空',
        'password' =>  '密码不能为空',
         'verify.require'=>'验证码不能为空',
        'verify.captcha'=>'验证码错误',

    ];


}
