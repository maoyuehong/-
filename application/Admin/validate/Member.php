<?php
namespace app\Admin\validate;
use think\Validate;
class Member extends    Validate{
    protected $rule = [
        'm_name'  =>  'require|length:6,20',
        'm_mobile' =>  'require|regex:zip',
        'm_user'=>'number',

        //'m_profit'=>'require',
        //'m_assets'=>'require',
   /*     'm_birthday'=>'require',
        'm_address'=>'require',
        'm_bank_nickname'=>'require',
        'm_bank_card'=>'require',
        'm_bank_address'=>'require',
        'm_bank_name'=>'require',
        'm_wx'=>'require',
        'm_alipay'=>'require',*/
        'm_introducer'=>'number|length:6,11',



    ];
    protected $message = [
        'm_name'  =>  '用户名不能为空',
        'm_user.length' =>'用户名必须在6到20位之间',
        'm_mobile.require' =>  '手机号码不能为空',
        'm_mobile.regex' =>  '请输入正确的手机号',

        'm_user.number'=>'推荐人手机号不能有字母',
       /* 'm_birthday'=>'出生日期不能为空',
        'm_address'=>'所在地址不能为空',
        'm_bank_nickname'=>'银行名称不能为空',
        'm_bank_card'=>'银行卡号不能为空',
        'm_bank_address'=>'开户行不能为空',
        'm_bank_name'=>'银行开户人姓名不能为空',
        'm_wx'=>'微信号不能为空',
        'm_alipay'=>'支付宝号码不能为空',*/
        'm_introducer.number'=>'推荐人手机号不能有字母',
        'm_introducer.length'=>'请填写正确的的推荐人号码',


    ];
    protected $regex = [ 'zip' => '^0?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$'];
}
