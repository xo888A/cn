<?php 
    if(!defined('CW')){exit('Access Denied');}
    $wtype = CW('post/wtype');
    $money = intval(CW('post/wallet'));
    $tel = CW('post/tel');
    $pass = CW('post/pass');
    $db = functions::db();
    $user = $db->query('users','money,withdrawalspass',"tel='{$tel}'",'',1);
    $minmoney = functions::getfield('sets','withdrawals','id=1');
    if(!$user){
        echo json_encode(array(
            'state'=>2,
            'err'=>'用户异常, 请重新登录'
        ));return;
    }
    if(!$user[0]['money']){
        echo json_encode(array(
            'state'=>2,
            'err'=>'您的余额为0, 无法提现'
        ));return;
    }
    if($user[0]['money']<$money){
        echo json_encode(array(
            'state'=>2,
            'err'=>'金额输入过大'
        ));return;
    }
    if(!$user[0]['withdrawalspass']){
        echo json_encode(array(
            'state'=>2,
            'err'=>'请先设置提现密码'
        ));return;
    }
    if($user[0]['withdrawalspass']!=$pass){
        echo json_encode(array(
            'state'=>2,
            'err'=>'提现密码错误'
        ));return;
    }
    if($money<$minmoney){
        echo json_encode(array(
            'state'=>2,
            'err'=>"最低提现{$minmoney}元"
        ));return;
    }
    $minpay = functions::getfield('sets','pay','id=1');
    $userpay = $db->query("select sum(pay) from pays where tel='{$tel}'");

    if(intval($userpay[0]['sum(pay)'])<$minpay){
        echo json_encode(array(
            'state'=>2,
            'err'=>"最低充值{$minpay}元, 才可提现"
        ));return;
    }
    $bankcard = CW('post/bankcard');
    $bankcardname = CW('post/bankcardname');
    $bankcardtype = CW('post/bankcardtype');
    $numberaddress = CW('post/numberaddress');
    $alipayname = CW('post/alipayname');
    $alipay = CW('post/alipay');
    
    
    if($wtype=='bank'){
        if(!$bankcard || !$bankcardtype || !$bankcardname){
            echo json_encode(array(
                'state'=>2,
                'err'=>'每项必填'
            ));return;
        }
        $res = $db->exec('withdrawals','i',array(
            'tel'=>$tel,
            'ftime'=>time(),
            'money'=>$money,
            'wtype'=>'bank',
            'bankcard'=>$bankcard,
            'bankcardname'=>$bankcardname,
            'bankcardtype'=>$bankcardtype,
            'myorder'=>md5(uniqid())
        ));
        $newmoney = $user[0]['money'] - $money;
        $res2 = $db->exec('users','u',"money='{$newmoney}',tel='{$tel}'");
        if($res && $res2){
            echo json_encode(array(
                'data'=>"提现成功",
                'do'=>'tx'
            ));
        }else{
            echo json_encode(array(
                'state'=>2,
                'err'=>'提现失败, 请重试'
            ));
        };
    }elseif ($wtype=='number') {
        if(!$numberaddress){
            echo json_encode(array(
                'state'=>2,
                'err'=>'请填写货币地址'
            ));return;
        }
        $res = $db->exec('withdrawals','i',array(
            'tel'=>$tel,
            'ftime'=>time(),
            'money'=>$money,
            'wtype'=>'number',
            'numberaddress'=>$numberaddress,
            'myorder'=>md5(uniqid())
        ));
        $newmoney = $user[0]['money'] - $money;
        $res2 = $db->exec('users','u',"money='{$newmoney}',tel='{$tel}'");
        if($res && $res2){
            echo json_encode(array(
                'data'=>"提现成功",
                'state'=>1
            ));
        }else{
            echo json_encode(array(
                'state'=>2,
                'err'=>'提现失败, 请重试'
            ));
        };
    }elseif ($wtype=='alipay') {
        if(!$alipayname || !$alipay){
            echo json_encode(array(
                'state'=>2,
                'err'=>'每项必填'
            ));return;
        }
        $res = $db->exec('withdrawals','i',array(
            'tel'=>$tel,
            'ftime'=>time(),
            'money'=>$money,
            'wtype'=>'alipay',
            'alipayname'=>$alipayname,
            'alipay'=>$alipay,
            'myorder'=>md5(uniqid())
        ));
        $newmoney = $user[0]['money'] - $money;
        $res2 = $db->exec('users','u',"money='{$newmoney}',tel='{$tel}'");
        if($res && $res2){
            echo json_encode(array(
                'data'=>"提现成功",
                'state'=>1
            ));
        }else{
            echo json_encode(array(
                'state'=>2,
                'err'=>'提现失败, 请重试'
            ));
        };
    }
?>