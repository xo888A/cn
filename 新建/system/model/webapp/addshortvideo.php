<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    
    $db = functions::db();
    $tel = CW('post/tel');
    $title = CW('post/title');
    if(!CW('post/topic')){
        msg('至少添加一个话题','刷新','','',true);
    }
    $topic = explode('|',CW('post/topic'));
    $db = functions::db();
	foreach ($topic as $val){
	    
	    $_exist = $db->query('topic','id',"name='{$val}'",'',1);
	    if(!$_exist){
		    $db->exec('topic','i',array(
		        'name'=>$val,
		        'cover'=>TU.'/defaultcover.png',
		        'tuijian'=>'',
		        'desces'=>'该话题暂无描述~~',
		        'hot'=>mt_rand(1000,98888),
		        'num'=>0,
		        'beijingtu'=>TU.'/beijingtu.jpg'
		    ));
		}
	    
	    
	    
		$_id = $db->query('topic','id',"name='{$val}'",'',1);
		$_ids .= $_id[0]['id'].',';
	}
	$_ids = substr($_ids,0,strlen($_ids)-1);
    $shortvidcover = CW('post/shortvidcover');
    $shortvidurl = CW('post/shortvidurl');
    $likes = intval(CW('post/likes'));
    $ishow = CW('post/ishow');
    if(strlen($title)>500 || strlen($title)<6){
    	msg('标题字符要求为6-500','刷新','','',true);
    }
    if(strlen($tel)!=11){
    	//msg('手机号码必须为11位','刷新','','',true);
    }
    if(CW('post/diamond')=='VIP'){
	    $diamond = 1;
	}else{
	    $diamond = 0;
	}
    
    $ftime = CW('post/ftime') ? strtotime(CW('post/ftime')) : time();
    $res = $db->exec('post','i',array(
        'userid'=>$tel,
    	'title'=>$title,
    	'shortvidcover'=>$shortvidcover,
    	'shortvidurl'=>$shortvidurl,
    	'likes'=>$likes,
    	'diamond'=>$diamond,
    	'topic'=>$_ids,
        'ftime'=>$ftime,
    	'ishow'=>$ishow=='公开' ? 1 : 0
    ));
   
    if($res){
        msg('添加成功!','刷新','javascript:location.reload()','success',true);
    }else{
        msg('添加失败!','重置','javascript:location.reload()','error',true);
    }
?>