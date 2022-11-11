<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $lv0 = CW('post/lv0') ? '0,' : '';
    $lv1 = CW('post/lv1') ? '1,' : '';
    $lv2 = CW('post/lv2') ? '2,' : '';
    $lv3 = CW('post/lv3') ? '3,' : '';
    $lv4 = CW('post/lv4') ? '4,' : '';
    $lv5 = CW('post/lv5') ? '5,' : '';
    $lv6 = CW('post/lv6') ? '6,' : '';
    $level = $lv0.$lv1.$lv2.$lv3.$lv4.$lv5.$lv6;
    $id = CW('post/id');
	if(!$id){
		msg('ID不存在,请返回列表重新操作','刷新','','',true);
	}
    $title = CW('post/title');
    $videocover = CW('post/videocover');
    $videourl = CW('post/videourl');
    $diamond = intval(CW('post/diamond'));
    $vipdiam = intval(CW('post/vipdiam'));
    if($vipdiam>$diamond){
        msg('会员钻石价格应低于普通钻石价格','刷新','','',true);
    }
    $hot = CW('post/hot');
    $like = CW('post/like');
    // $ftime = CW('post/ftime');
    ///////////////////////
    $topic = CW('post/topic');
    if(!$topic){
        msg('至少添加一个话题','刷新','','',true);
    }
    $topic = explode('|',$topic);
    $db = functions::db();
	foreach ($topic as $val){
	    
	    $_exist = $db->query('topic','id',"name='{$val}'",'',1);
	    if(!$_exist){
		    $db->exec('topic','i',array(
		        'name'=>$val,
		        'cover'=>TU.'/defaultcover.png',
		        'tuijian'=>'',
		        'desces'=>'该话题暂无描述~~',
		        'hot'=>0,
		        'num'=>0,
		        'beijingtu'=>TU.'/beijingtu.jpg'
		    ));
		}
		$_id = $db->query('topic','id',"name='{$val}'",'',1);
		$_ids .= $_id[0]['id'].',';
	}
	$_ids = substr($_ids,0,strlen($_ids)-1);
    /////////////////////////
    
    if(strlen($title)>500 || strlen($title)<3){
    	msg('标题字符要求为3~500','刷新','','',true);
    }
    $userid = CW('post/userid');
    // if(!preg_match("/^1[3|4|5|8][0-9]\d{8}$/",$userid)){    
    //     msg('手机号码格式错误','刷新','','',true);
    // }
    $ftime = CW('post/ftime') ? strtotime(CW('post/ftime')) : time();
    $update = array(
        'userid'=>$userid,
    	'title'=>$title,
    	'videocover'=>$videocover,
    	'videourl'=>$videourl,
    	'diamond'=>$diamond,
    	'vipdiam'=>$vipdiam,
    	'addparam'=>CW('post/addparam'),
    	'hot'=>$hot,
    	'ftime'=>$ftime,
    	'likes'=>$like,
    	'topic'=>$_ids,
    	'istuijian'=>CW('post/istuijian'),
    	'flag'=>CW('post/flag'),
    	'updatetime'=>time(),
    	'filesize'=>CW('post/filesize') ? CW('post/filesize') : '',
    	'downloadurl'=>CW('post/downloadurl'),
    	'downlevel'=>$level,
    // 	'ftime'=>CW('post/ftime') ? strtotime(CW('post/ftime')) : time(),
    	'ishow'=>CW('post/ishow')=='公开' ? 1 : 0
    );
    

    
    $res = $db->exec('post','u',array($update,array(
    	'id'=>$id	
    )));
    
   
    if($res){
        msg('更新成功!','刷新','javascript:location.reload()','success',true);
    }else{
        msg('数据无变动!','重置','javascript:location.reload()','error',true);
    }
?>