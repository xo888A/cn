<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $id = CW('post/id');
    $content = str_replace("\"","'",$_POST['content']);
    $mtype = CW('post/mtype');
    $ftime = CW('post/ftime');
    
    $res = $db->exec('sysmessage','u',array(array(
    	'content'=>$content,
    	'mtype'=>$mtype,
    	'ftime'=>CW('post/ftime')
    ),array(
        'id'=>$id    
    )));
    
   
    if($res){
        msg('编辑成功!','刷新','javascript:location.reload()','success',true);
    }else{
        msg('数据无变动!','重置','javascript:location.reload()','error',true);
    }
?>