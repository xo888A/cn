<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $param1 = CW('post/param1');
    $param2 = CW('post/param2');
    $param3 = CW('post/param3');
    $param4 = CW('post/param4');
    $param5 = CW('post/param5');
    $res = $db->exec('email','u',array(array(
        'param1'=>$param1,
        'param2'=>$param2,
        'param3'=>$param3,
        'param4'=>$param4,
        'param5'=>$param5,
    ),array(
        'id'=>1    
    )));
    if($res){
        msg('更新成功!','刷新','javascript:location.reload()','success',true);
    }else{
        msg('数据无变动!','重置','javascript:location.reload()','error',true);
    }
?>