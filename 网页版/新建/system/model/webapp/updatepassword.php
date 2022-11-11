<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    
    echo json_encode(array(
            'err'=>'年轻人不要不讲武德,你改了密码别人还怎么测试?'
        ));return;
    

    $db = functions::db();
    $pass1 = CW('post/pass1',3);
    $pass2 = CW('post/pass2',3);
    $pass3 = CW('post/pass3',3);
    $us = getuser();
    if(!$us){
        echo json_encode(array(
            'err'=>'请先登录!'
        ));return;
    }
    
    if(strlen($pass1)>11 || strlen($pass2)>11 || strlen($pass3)>11){
        echo json_encode(array(
            'err'=>'密码位数不得超过11位!'
        ));return;
    }
    if(strlen($pass1)<5 || strlen($pass2)<5 || strlen($pass3)<5){
        echo json_encode(array(
            'err'=>'密码位数不得小于5位!'
        ));return;
    }
    
    
    if($pass2==$pass1){
        echo json_encode(array(
            'err'=>'新密码不可和旧密码一致!'
        ));return;
    }
    if($pass2!=$pass3){
        echo json_encode(array(
            'err'=>'新密码两次输入不一致!'
        ));return;
    }
    $password = $db->query('users','password',"tel='{$us}'",'',1);
    if(functions::autocode($password[0]['password'],'-')!=$pass1){
        echo json_encode(array(
            'err'=>'旧密码填写错误!'
        ));return;
    }
    $pass2 = functions::autocode($pass2);
    $res = $db->exec('users','u',"password='{$pass2}',tel='{$us}'");
    if($res){
        
        echo json_encode(array(
            'data'=>'密码更新成功',
            'do'=>'updateuserpass'
        ));
    }else{
        echo json_encode(array(
            'err'=>'数据无变动!'
        ));
    }
?>