<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $tel = CW('post/tel',3);
    $pass = CW('post/pass',3);
    $passt = CW('post/passt',3);
    $ip = functions::get_real_ip();
    $db = functions::db();
    $isover = $db->query('users','ftime',"ip='{$ip}'",'',1);
    $regtime = $isover[0]['ftime'];
    if(date('Ymd',$regtime)==date('Ymd',time())){
         echo json_encode(array(
             'err'=>'每人1天只能注册1个账号'
         ));return;
    }
    if(!$tel || !$pass || !$passt){
        echo json_encode(array(
            'err'=>'每项必填!'
        ));return;
    }
    if($pass!=$passt){
        echo json_encode(array(
            'err'=>'两次密码输入不一致!'
        ));return;
    }
    $db = functions::db();
    $exist = $db->query('users','',"tel='{$tel}'",'id asc',1);
    if($exist){
        echo json_encode(array(
            'err'=>'该账号已被注册!'
        ));return;
    }

    $code = CW('cookie/card');

    // if(!is_numeric($tel)){
    //     echo json_encode(array(
    //         'err'=>'账号请填写电话号码或者数字!'
    //     ));return;
    // }
    if(strlen($tel)<8 || strlen($pass)<8){
        echo json_encode(array(
            'err'=>'账号或密码位数不得小于8位!'
        ));return;
    }
    if(strlen($tel)>11 || strlen($pass)>20){
        echo json_encode(array(
            'err'=>'账号或密码位数不得超过20位!'
        ));return;
    }
    $isexist = false;
	$card = '';
	do {
		$card = chr(rand(97,122)).mt_rand(100000000,999999999);
		$isexist = $db->query('users','id',"card='{$card}'");
	} while ($isexist);
    $user = $db->query('sets','desces,nickname','id=1');
    $array = explode('|',$user[0]['nickname']);
    $nickname = $array[array_rand($array,1)];
    $avatar = IMG.'/avatar/o1/'.mt_rand(1,120).'.jpg';
    $descs = $user[0]['desces'];
    $time = time();
    $res = $db->exec('users','i',array(
        'nickname'=>$nickname,
        'tel'=>$tel,
        'password'=>functions::autocode($pass),
        'avatar'=>$avatar,
        'card'=>$card,
        'descs'=>$descs,
        'ftime'=>$time,
        'ip'=>$ip
    ));

    if($res){
        $append = '';
        if($code){
            $prevtel = $db->query('users','tel',"card='{$code}'",'',1);
            $prevtel = $prevtel[0]['tel']; 
            if($prevtel){
                
                functions::intobroker($prevtel,$tel,$time,0,$code);
            }
            
        }
        functions::set_cookie('__username',functions::autocode($tel));
        echo json_encode(array(
            'do'=>'goindex',
            'data'=>'注册成功'
        ));
    }else{
        echo json_encode(array(
            'err'=>'注册失败,请稍后再试!'
        ));
    }
?>