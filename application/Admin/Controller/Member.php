<?php

namespace app\Admin\controller;

use app\common\AdminController;
use think\Controller;
use think\Db;
use think\Loader;
use think\Request;

class Member extends AdminController
{
    protected $money=0;
    public function details()
    {
        $res = input('get.info');
        //$admin = db('member');

        //dump($res);

        //dump($admin);
        if (empty($res)) {
            $info = db('member')->order('m_id desc')->paginate(15);

        } else {
            $info = db('member')->where('m_user|m_mobile', 'like', '%' . $res . '%')->paginate(15,false,[
                'query' => request()->param()
            ]);
            //dump($info);

        }
        //dump($info);

        $this->assign('info', $info);
        $this->assign('res', $res);
        return view('member/dateils');
    }

    public function upd()
    {
        $user = input('param.m_id');
        //dump($user);
        //获取当前用户的详情信息

        //获取修改后的信息

        //对用户提交的数据进行验证
        if (Request::instance()->isPost()) {
            $shuju = input('post.');
            //'m_profit'=>'require',
            //'m_assets'=>'require',
            /*
                    'm_address'=>'require',
                    'm_bank_nickname'=>'require',
                    'm_bank_card'=>'require',
                    'm_bank_address'=>'require',
                    'm_bank_name'=>'require',
                    'm_wx'=>'require',
                    'm_alipay'=>'require',*/
            $shuju['m_profit'] = input('post.m_profit');
            $shuju['m_assets'] = input('post.m_assets');
            $shuju['m_address'] = input('post.m_address');
            $shuju['m_bank_nickname'] = input('post.m_bank_nickname');
            $shuju['m_bank_address'] = input('post.m_bank_address');
            $shuju['m_bank_card'] = input('post.m_bank_card');
            $shuju['m_bank_name'] = input('m_bank_name');
            $shuju['m_wx'] = input('post.m_wx');
            $shuju['m_birthday'] = input('post.m_birthday');
            $shuju['m_last_login'] = strtotime(input('post.m_last_login'));
            $shuju['m_time'] = strtotime(input('post.m_time'));
            $shuju['m_id_card'] = input('post.m_id_card');
            $res = input('post.m_introducer');


            // dump( $shuju['m_introducer']);

            //dump($res);die;
            $validate = $this->validate($shuju, 'Member');
            //dump($validate);
            if (true !== $validate) {
                // 验证失败 输出错误信息
                $this->error($validate, 'admin/member/details');
            } else {
                if (!empty($res)) {
                    $d = db('member')->where(array('m_user' => $res))->field('m_id')->find();
                    //dump($d);die;
                    if (!empty($d)) {
                        $shuju['m_introducer'] = $d['m_id'];
                        //dump( $shuju['m_introducer']);die;
                    } else {
                        $this->error('该推荐人不存在');
                    }
                }
                $z = db('member')->where(array('m_id' => $user))->update($shuju);
                // dump($z);die;
                if ($z) {
                    $this->error('修改成功', 'admin/member/details');
                } else {
                    $this->error('修改失败', 'admin/member/upd?m_id=' . $user);
                }
            }
        }

        $info = db('member')->where(array('m_id' => $user))->select();
        // dump($info['0']['m_introducer']);die;
        $r = db('member')->where(array('m_id' => $info['0']['m_introducer']))->field('m_user')->find();
        $z = $r['m_user'];
        //dump($z);
        $this->assign('info', $info);
        $this->assign('z', $z);

        return view('member/upd');
    }

    public function lookup()
    {
        $res = input('param.m_id');
        $e = db('recharge_ratio')->select();
        //dump($e);
        $u = $e['0']['r_money'] / 100;
        //dump($u);die;

        if (\request()->isPost()) {
            $shuju = input('post.');
            //dump($shuju);
            $info = db('member')->where(array('m_id' => $shuju['m_id']))->find();
            //dump($info);die;
            if(!empty($shuju['m_profit'])&&!empty($shuju['state'])&&!empty($shuju['m_name'])){
                if ($shuju['m_profit'] == 1) {
                    if ($shuju['state'] == 1) {
                        $z = $info['m_profit'] + $shuju['m_name'];
                        //dump($z);
                        $r = db('member')->where(array('m_id' => $shuju['m_id']))->update(array('m_profit' => $z));
                        if ($r) {
                            //成功
                            $money['p_id']=time() . mt_rand(1000, 9999) .$shuju['m_id'];
                            $money['p_user_id'] = $shuju['m_id'];
                            $money['p_money'] = $shuju['m_name'];
                            $money['p_info'] = '现金充值收益';
                            $money['p_state'] = 2;
                            $money['p_time'] = time();
                            db('money_log')->insert($money);
                            $this->error('充值成功');
                        } else {
                            //失败
                            $this->error('提现失败');
                        }

                    } elseif ($shuju['state'] == 2) {

                        $s = $info['m_profit'] - $shuju['m_name'];
                        if($s>=0){
                            $w = db('member')->where(array('m_id' => $shuju['m_id']))->update(array('m_profit' => $s));
                            //dump($w);
                            if ($w>0) {
                                //成功
                                $money['w_id']=time() . mt_rand(1000, 9999) .$shuju['m_id'];
                                $money['w_user_id'] = $shuju['m_id'];
                                $money['w_money'] = $shuju['m_name'];
                                $money['w_info'] = '提现收益'.'￥'.$shuju['m_name'];
                                $money['w_state'] = 2;
                                $money['w_time'] = time();
                                db('withdrawals_log')->insert($money);
                                $this->error('提现成功');
                            } else {
                                //失败
                                $this->error('提现失败');
                            }
                        }else{
                            $this->error('提现收益金额超出你拥有的收益金额');
                        }



                    } else {
                        $this->error('修改失败');
                    }

                } elseif ($shuju['m_profit'] == 2) {
                    if ($shuju['state'] == 1) {


                        Db::startTrans();
                        // dump($data);
                        $z = $info['m_assets'] + $shuju['m_name'] * $u;
                        $m = $info['m_sum_money'] + $shuju['m_name'];
                        //dump($z);die;
                        $res = db('member')->where(array('m_id' => $shuju['m_id']))->update(array('m_assets' => $z, 'm_sum_money' => $m));
                        //dump($res);die;
                        //以上都完成了则添加数据到充值记录表
                        $money['p_id'] = time() . mt_rand(1000, 9999) . $shuju['m_id'];
                        $money['p_user_id'] = $shuju['m_id'];
                        $money['p_money'] = $shuju['m_name'];
                        $money['p_info'] = '现金充值总资产';
                        $money['p_state'] = 2;
                        $money['p_time'] = time();
                        $res0 = db('money_log')->insert($money);
                        // dump($res0);die;

                        if($res&&$res0)
                        {
                            //根据A的推荐人id查找出一级推荐人A1的相关信息(找到用户上一级)
                            $A1=db('member')->where('m_id',$info['m_introducer'])->find();
                            if($A1)
                            {
                                //有一级推荐人
                                //获取用户A的一级推荐人A1充值金额达到多少时，可以获取A的充值金额
                                $recharge=db('distribution_money')->find();
                                //根据一级推荐人查找“一级推荐人下面”的所有一级推荐人总充值金额
                                $sum_money=db('member')->where('m_introducer',$A1['m_id'])->sum('m_sum_money');
                                //判断A1的总充值金额是否达到收益要求
                                if($sum_money>=$recharge['d_a'])
                                {
                                    //一级推荐人A1达到要求
                                    //获取收益比例表信息
                                    $ratio=db('distribution_ratio')->find();
                                    //计算一级推荐人该获取的收益
                                    $money=$shuju['m_name']*($ratio['d_a']/100);
                                    if(empty($money)){
                                        $res1=true;
                                        $res2=true;
                                    }else{
                                        //更新一级推荐人A1的总资产
                                        $res1=db('member')->where('m_id',$info['m_introducer'])->setInc('m_assets',$money);
                                        //A1的收益信息添加进收益表
                                        $res2=db('profit_log')->insert([
                                            'p_id'=>time().mt_rand(1000,9999).$A1['m_id'],
                                            'p_user_id'=>$A1['m_id'],//一级推荐人id0
                                            'p_info'=>"被推荐人***".substr($info['m_mobile'],-4)."充值,推荐人奖励￥".round($money,2)."存入总资产",
                                            'p_money'=>$money,//收益金额
                                            'p_state'=>2,
                                            'p_time'=>time(),
                                        ]);
                                    }
                                    if(!$res1 || !$res2){
                                        Db::rollback();
                                        $this->error('修改失败');
                                    }
                                }
                                //根据一级推荐人A1找出二级推荐人A2
                                $A2=db('member')->where('m_id',$A1['m_introducer'])->find();
                                if($A2){
                                    //有二级推荐人
                                    //根据二级推荐人查找“二级推荐人下面”的所有一级推荐人总充值金额
                                    $ratio=db('distribution_ratio')->find();
                                    $sum_money=db('member')->where('m_introducer',$A2['m_id'])->sum('m_sum_money');
                                    if($sum_money>=$recharge['d_b']) {
                                        //一级推荐人A1达到要求
                                        //获取收益比例表信息
                                        /*$ratio=db('distribution_ratio')->find();*/
                                        //计算二级推荐人该获取的收益
                                        $money = $shuju['m_name'] * ($ratio['d_b'] / 100);
                                        if (empty($money)) {
                                            $res3 = true;
                                            $res4 = true;
                                        } else {
                                            //更新二级推荐人A2的总资产
                                            $res3 = db('member')->where('m_id', $A1['m_introducer'])->setInc('m_assets', $money);
                                            //A2的收益信息添加进收益表
                                            $res4 = db('profit_log')->insert([
                                                'p_id'      => time() . mt_rand(1000, 9999) . $A2['m_id'],
                                                'p_user_id' => $A2['m_id'],//一级推荐人id
                                                'p_info'    => "被推荐人***" . substr($A1['m_mobile'], -4) . "充值,推荐人奖励￥" . round($money, 2) . "存入总资产",
                                                'p_money'   => $money,//收益金额
                                                'p_state'   => 2,
                                                'p_time'    => time(),
                                            ]);
                                        }
                                        if(!$res3 || !$res4){
                                            Db::rollback();
                                            $this->error('修改失败');
                                        }
                                    }

                                    //根据二级推荐人A2找三级推荐人A3
                                    $A3=db('member')->where('m_id',$A2['m_introducer'])->find();
                                    if($A3){
                                        //有三级推荐人
                                        //根据二级推荐人查找“二级推荐人下面”的所有一级推荐人总充值金额
                                        $sum_money=db('member')->where('m_introducer',$A3['m_id'])->sum('m_sum_money');
                                        if($sum_money>=$recharge['d_c']) {
                                            //一级推荐人A1达到要求
                                            //获取收益比例表信息
                                            /*$ratio=db('distribution_ratio')->find();*/
                                            //计算二级推荐人该获取的收益
                                            $money = $shuju['m_name'] * ($ratio['d_c'] / 100);
                                            if (empty($money)) {
                                                $res5 = true;
                                                $res6 = true;
                                            } else {
                                                //更新三级推荐人A3的总资产
                                                $res5 = db('member')->where('m_id', $A2['m_introducer'])->setInc('m_assets', $money);
                                                //A2的收益信息添加进收益表
                                                $res6 = db('profit_log')->insert([
                                                    'p_id'      => time() . mt_rand(1000, 9999) . $A3['m_id'],
                                                    'p_user_id' => $A3['m_id'],//一级推荐人id
                                                    'p_info'    => "被推荐人***" . substr($A2['m_mobile'], -4) . "充值,推荐人奖励￥" . round($money, 2) . "存入总资产",
                                                    'p_money'   => $money,//收益金额
                                                    'p_state'   => 2,
                                                    'p_time'    => time(),
                                                ]);
                                            }
                                            if(!$res5 || !$res6){
                                                Db::rollback();
                                                $this->error('修改失败');
                                            }else{
                                                Db::commit();
                                                $this->error('充值成功');
                                            }
                                        }else{
                                            Db::commit();
                                            $this->error('充值成功');
                                        }

                                    }else{
                                        //没有三级推荐人
                                        //提交
                                        Db::commit();
                                        $this->error('充值成功');
                                    }
                                }else{
                                    //没有一级推荐人
                                    //提交
                                    Db::commit();
                                    $this->error('充值成功');
                                }

                            }else{
                                //没有一级推荐人
                                //提交
                                Db::commit();
                                $this->error('充值成功');
                            }

                        }else{
                            //回退
                            Db::rollback();
                            $this->error('修改失败');
                        }

                    } elseif ($shuju['state'] == 2) {
                        $s = $info['m_assets'] - $shuju['m_name'];
                        if($s>=0) {
                            $w = db('member')->where(array('m_id' => $shuju['m_id']))->update(array('m_assets' => $s));
                            if ($w) {
                                //成功
                                $money['w_id'] = time() . mt_rand(1000, 9999) . $shuju['m_id'];
                                $money['w_user_id'] = $shuju['m_id'];
                                $money['w_money'] = $shuju['m_name'];
                                $money['w_info'] = '提现资产'.'￥'.$shuju['m_name'];
                                $money['w_state'] = 2;
                                $money['w_time'] = time();
                                db('withdrawals_log')->insert($money);
                                $this->error('提现成功');
                            } else {
                                //失败
                                $this->error('提现失败');
                            }
                        }else{
                            $this->error('提现资产金额超出你拥有的资产金额');
                        }
                    } else {
                        $this->error('修改失败');
                    }
                }


                }else{
                $this->error('数据不能为空');
            }
        }



        $info = db('member')->where(array('m_id' => $res))->select();
        $this->assign('info', $info);
        return view('member/lookup');
    }

    public function information()
    {
        $user = input('param.id');
        $list = input('param.list');
        //dump($list);
        // dump($user);
        $info = db('member')->where('m_id', $user)->select();
        //dump($info);die;
        $z = db('member')->where('m_id', $info['0']['m_introducer'])->find();

        //dump($z);die;
        //dump($info);

        $this->assign('info', $info);
        $this->assign('z', $z);
        $this->assign('list', $list);
        return view('member/information');
    }

    public function look1()
    {

        //获取当前人的一级推荐人的id
        $id = input('param.id');
        $index = input('param.index');
        $html = null;
        $jishu = 1;
        if ($index == 1) {
            $html = "一级推荐人";
            $jishu = 2;
        } else if ($index == 2) {
            $html = "二级推荐人";
            $jishu = 3;
        } else if ($index == 3) {
            $html = "三级推荐人";
        }
        // dump($html);
        $this->assign('title', $html);
        $this->assign('jishu', $jishu);
        //获取当前推荐人信息
        //
        $shuju = db('member')->where('m_introducer', $id)->paginate(15);

        $this->assign('info', $shuju);


        return view('member/look1');
    }

    //代理中心
    public function agent()
    {
        //获取id
        $id = input('param.id');
        $test = input('param.test');
        $html = null;
        $jishu = 1;
        if ($test == 1) {
            $html = "一级代理";
            $jishu = 2;
        } else if ($test == 2) {
            $html = "二级代理";
            $jishu = 3;
        } else if ($test == 3) {
            $html = "三级代理";
        }
        // dump($html);
        $this->assign('title', $html);
        $this->assign('jishu', $jishu);
        $sum_money = 0;//总业绩
        $state = 0;//县级代理
        $agent = 0;//市级代理
        $level = 0;//省级代理
        $holder = 0;//股东
        //获取当前所的有一级推荐人信息
        $member = db('member');
        $cut_money=$member->where('m_id',$id)->field('m_sum_money')->find();
        //dump($cut_money);
        $b = $member->where('m_introducer', $id)->paginate(15);
        $one_money = array();
        foreach ($b as $key => $val) {
            $sum_money += $val['m_sum_money'];
            if ($val['m_agent'] == 1) {
                $state++;//县级代理
            } else if ($val['m_agent'] == 2) {
                $agent++; //市级代理
            } else if ($val['m_agent'] == 3) {
                $level++;//省级代理
            } else if ($val['m_agent'] == 4) {
                $holder++;//股东
            }

            $c = $member->where('m_introducer', $val['m_id'])->select();
            $one = 0;
            // dump($state);
            if ($test != 3) {
                foreach ($c as $key2 => $val2) {
                    $sum_money += $val2['m_sum_money'];
                    if ($val2['m_agent'] == 1) {
                        $state++;//县级代理
                    } else if ($val2['m_agent'] == 2) {
                        $agent++; //市级代理
                    } else if ($val2['m_agent'] == 3) {
                        $level++;//省级代理
                    } else if ($val2['m_agent'] == 4) {
                        $holder++;//股东
                    }

                    $two = 0;
                    if ($test != 2) {
                        $d = $member->where('m_introducer', $val2['m_id'])->select();
                        foreach ($d as $key3 => $val3) {
                            $sum_money += $val3['m_sum_money'];
                            if ($val3['m_agent'] == 1) {
                                $state++;//县级代理
                            } else if ($val3['m_agent'] == 2) {
                                $agent++; //市级代理
                            } else if ($val3['m_agent'] == 3) {
                                $level++;//省级代理
                            } else if ($val3['m_agent'] == 4) {
                                $holder++;//股东
                            }

                            $two += $val3['m_sum_money'];
                        }
                    }
                    $one += $val2['m_sum_money'] + $two;
                }
            }
            $one_money[$key] = $val['m_sum_money'] + $one;
        }
//dump($state);
  /*      dump($sum_money);
        dump($cut_money);*/
  $sum_money1=$sum_money+$cut_money['m_sum_money'];
  //dump($sum_money1);

        $this->assign("one_money", $one_money);
        $this->assign("state", $state);//县级代理
        $this->assign("agent", $agent);//市级代理
        $this->assign("level", $level);//省级代理
        $this->assign("holder", $holder);//股东
        $this->assign("sum_money", $sum_money1);//总业绩
        $this->assign('info', $b);

        return view('member/agent');

    }

    public function area(){
        //获取id
        $id = input('param.id');
//dump($id);
        $index = input('param.index');
        // dump($html);




        //获取当前所的有一级推荐人信息
        $member = db('member');
       // $cut_money=$member->where('m_id',$id)->field('m_sum_money')->find();当前人业绩
        $b = $member->where('m_introducer', $id)->paginate(15);
        $rou = $member->where('m_id', $id)->find();
        //dump($rou);
        $sum_money=$member->where('m_introducer', $id)->sum('m_sum_money');
      if($index==1){
          $this->digui($id);
          session('money',$this->money);
          $index++;
      }
          $this->assign('sum_money',$sum_money);//总业绩

        $this->assign('info', $b);
        $this->assign('rou', $rou);
        $this->assign('index', $index);

        return view('member/area');

    }

    public function digui($id){
        $user=db('member')->where('m_introducer',$id)->select();
        //dump($user);
        if(!empty($user)){
            foreach($user as $k=>$v){
                //dump($k);
               $this->money+=$v['m_sum_money'];
               $this->digui($v['m_id']);
            }
        }

    }

}