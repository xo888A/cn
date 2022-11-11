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
    
    $res = $db->exec('answer','u',array(array(
    	'title'=>$title,
    	'content'=>$content,
    	'wtype'=>$wtype
    ),array(
        'id'=>CW('post/id')    
    )));
    if($res){
        msg('编辑成功!','刷新','javascript:location.reload()','success',true);
    }else{
        msg('数据无变动!','重置','javascript:location.reload()','error',true);
    }
?>