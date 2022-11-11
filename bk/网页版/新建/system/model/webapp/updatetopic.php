<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $topicid = CW('post/id');
    $name = CW('post/name');
    $hot = intval(CW('post/hot'));
    $cover = CW('post/cover');
    $db = functions::db();
    $desces = CW('post/desces');
    $tuijian = CW('post/tuijian');
    $beijingtu = CW('post/beijingtu');
 
    $res = $db->exec('topic','u',array(array("beijingtu"=>$beijingtu,"name"=>$name,"cover"=>$cover,"desces"=>$desces,"hot"=>$hot,"tuijian"=>$tuijian),array("id"=>$topicid)));
   
    if($res){
    	msg('修改成功!','确定','','success');
    }else{
        msg('数据无变动!','重填','javascript:location.reload()','',true);
    }
?>