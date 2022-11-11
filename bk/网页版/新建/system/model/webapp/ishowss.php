<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $mod = CW('post/mod');
    $idlist = CW('post/idlist');
    
    $db = functions::db();
    
    $idlist = explode(',',$idlist);
    foreach ($idlist as $id){
        
        $res = $db->exec('htmlcomment2','u',"ishow=1,id='{$id}'");
    }
    if($res){
        
        msg('操作成功!','确定','','success');
    }else{
        msg('数据无变动!','重填','javascript:location.reload()','error',true);
    }
   
    
?>