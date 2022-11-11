<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tel = CW('post/tel',1);
    $c = CW('post/card',3);
    if(!$c){
        echo json_encode(array(
            'err'=>'请先填写卡号!',
            'state'=>2
        ));return;
    }
    $db =functions::db();
    $card = $db->query('card','',"card='{$c}'",'',1);
    if(!$card){
        echo json_encode(array(
            'state'=>2,
            'err'=>'卡号错误!'
        ));return;
    }
    if($card[0]['ishow']){
        echo json_encode(array(
            'state'=>2,
            'err'=>'该兑换卡已被使用'
        ));return;
    }
    $issuccess= 0;
    //////////////////////////
    $user = $db->query('users','',"tel='{$tel}'");
    $user_diam = $user[0]['diam'];
    $viptime = $user[0]['viptime'];
    $cardtype = intval($card[0]['cardtype']);
    $res1 = $res2 = '';
    if($cardtype==1){//+钻石
        $ndiam = $user_diam + $card[0]['cardnum'];
        //$res1 = $db->exec("update users set diam='{$ndiam}' where tel='{$tel}'");
        $res1 = $db->exec('users','u',"diam='{$ndiam}',tel='{$tel}'");
        if($res1){
            $db->exec('card','u',"ishow=1,card='{$card[0]['card']}'");
        }
        $res2 = $db->exec('message','i',array(
            'tel'=>$tel,
            'ftime'=>time(),
            'mtype'=>'兑换卡',
            'desces'=>'兑换钻石'.$card[0]['cardnum'].'个'
        ));
        $issuccess = 1;
        $data = "成功兑换{$card[0]['cardnum']}个钻石";
    }elseif ($cardtype==2) {
        if(!$viptime){//从来没开过会员
            $viptime = time()+$card[0]['cardnum']*24*60*60;
        }else{
            if($viptime>time()){
                $viptime = $viptime+$card[0]['cardnum']*24*60*60;
            }else{
                $viptime = time()+$card[0]['cardnum']*24*60*60;
            }
        }
        if($card[0]['mylevel']){
            $mylevel = $card[0]['mylevel'];
            $add2 = ',VIP等级升为'.$mylevel;
        }else{
            $mylevel = $user[0]['mylevel'];
            $add2 = '';
        }
        if($card[0]['jinbinum']){
            $diam_ = $card[0]['jinbinum']+$user_diam;
            $add1 = ',并赠送金币'.$diam_.'个';
        }else{
            $diam_ = $user_diam;
            $add1 = '';
        }
        $res1 = $db->exec("update users set diam='{$diam_}',viptime='{$viptime}',mylevel='{$mylevel}' where tel='{$tel}'");
        if($res1){
            $db->exec('card','u',"ishow=1,card='{$card[0]['card']}'");
        }
        $res2 = $db->exec('message','i',array(
            'tel'=>$tel,
            'ftime'=>time(),
            'mtype'=>'兑换卡',
            //'mylevel'=>1,
            'desces'=>'兑换VIP'.$card[0]['cardnum'].'天'.$add1.$add2
        ));
        $data = "成功兑换{$card[0]['cardnum']}天VIP".$add1.$add2;$issuccess=1;
    }
    echo json_encode(array(
        'data'=>$data,
        'issuccess'=>$issuccess,
        'state'=>1,
    ));
?>