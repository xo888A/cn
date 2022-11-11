<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $res = $db->exec('sets','u',array(array(
        'lv1'=>CW('post/lv1'),
        'lv2'=>CW('post/lv2'),
        'lv3'=>CW('post/lv3'),
        'lv4'=>CW('post/lv4'),
        'lv5'=>CW('post/lv5'),
        'lv6'=>CW('post/lv6'),
        
        'downlv1'=>CW('post/downlv1'),
        'downlv2'=>CW('post/downlv2'),
        'downlv3'=>CW('post/downlv3'),
        'downlv4'=>CW('post/downlv4'),
        'downlv5'=>CW('post/downlv5'),
        'downlv6'=>CW('post/downlv6'),
    ),array(
        'id'=>1    
    )));
    if($res){
    	msg('更新成功!','确定','','success');
    }else{
        msg('数据无变动!','重填','javascript:location.reload()','',true);
    }
?>