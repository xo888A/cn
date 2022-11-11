<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $tel = CW('post/tel');
    $pass = CW('post/pass',3);

   
    if(!$tel || !$pass){
        echo json_encode(array(
            'err'=>'每项必填!'
        ));return;
        
    }
  
	$db = functions::db();

	$user = $db->query('users','password',"tel='{$tel}'",'',1);
	$password = functions::autocode($user[0]['password'],'-');
	if($pass==$password){
	    functions::set_cookie('__username',functions::autocode($tel));
    	echo json_encode(array(
            'data'=>1
        ));
    }else{
        echo json_encode(array(
            'err'=>'账号密码错误!'
        ));
    }
?>