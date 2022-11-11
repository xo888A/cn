<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $id = CW('get/id');
    $rand = CW('get/rand');
    if($rand){
        $vid = $db->query('post','id,shortvidurl',"shortvidurl!='' ",' RAND() ',1);
        echo $vid[0]['shortvidurl'];
    }else{
        $tpl =  new Society();
        $vid = $db->query('post','id',"shortvidurl!='' ",' RAND() ',3);
        $tpl->assign('id1',$vid[0]['id']);
        $tpl->assign('id2',$vid[1]['id']);
        $tpl->assign('id3',$vid[2]['id']);
        $tpl->compile(basename(__FILE__,'.php'),'wap');
    }
    
?>