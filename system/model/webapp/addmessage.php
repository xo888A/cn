<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $content = str_replace("\"","'",$_POST['content']);
    $mtype = CW('post/mtype');
    
    $res = $db->exec('sysmessage','i',array(
    	'content'=>$content,
    	'mtype'=>$mtype,
    	'ftime'=>CW('post/ftime')
    ));
    
   
    if($res){
        msg('添加成功!','刷新','javascript:location.reload()','success',true);
    }else{
        msg('添加失败!','重置','javascript:location.reload()','error',true);
    }
?>