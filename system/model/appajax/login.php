<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tel = CW('post/tel',3);
    $pass = CW('post/pass',3);

  
    if(!$tel || !$pass){
        echo json_encode(array(
            'err'=>'每项必填!',
            'state'=>2
        ));return;
        
    }
  
	$db = functions::db();
	$user = $db->query('users','',"tel='{$tel}'",'',1);
	$password = functions::autocode($user[0]['password'],'-');
	if($pass==$password){
	    echo json_encode(array(
            'state'=>1,
            'tel'=>$tel,
            'level'=>$user[0]['mylevel'] ? $user[0]['mylevel'] : 0
        ));
    }else{
        echo json_encode(array(
            'err'=>'账号密码错误!',
            'state'=>2
        ));
    }
?>