<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    
    $title = CW('post/title');
    $wtype = CW('post/wtype');
    
    $content = str_replace("\"","'",$_POST['content']);
    if(!$title || !$content){
        msg('每项必填!','重填','javascript:location.reload()','',true);
    }
    
    $res = $db->exec('answer','i',array(
    	'title'=>$title,
    	'content'=>$content,
    	'wtype'=>$wtype
    ));
    if($res){
        msg('添加成功!','刷新','javascript:location.reload()','success',true);
    }else{
        msg('添加失败!','重置','javascript:location.reload()','error',true);
    }
?>