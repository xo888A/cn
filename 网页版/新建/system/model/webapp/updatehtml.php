<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $id = CW('post/id');
    $name = CW('post/name');
    $content = str_replace("\"","'",$_POST['content']);
    $res = $db->exec('html','u',array(array(
        'name'=>$name,
        'content'=>$content
    ),array(
        'id'=>$id    
    )));
    if($res){
        msg('添加成功!','刷新','javascript:location.reload()','success',true);
    }else{
        msg('添加失败!','重置','javascript:location.reload()','error',true);
    }
?>