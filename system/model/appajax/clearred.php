<?php 
    if(!defined('CW')){exit('Access Denied');}

    $user = CW('post/tel',1);
    $db = functions::db();
    $res = $db->exec('history','d',"dev='{$user}'");
    echo json_encode(array(
        'data'=>'清除成功',
        'state'=>1
    ));
?>