<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $title = CW('post/title');
    
    $vidtype = CW('post/vidtype');
    if($vidtype=='长视频'){
        $videocover = CW('post/videocover');
        $videourl = CW('post/videourl');
        $shortvidcover = $shortvidurl = '';
    }else if($vidtype=='短视频'){
        $shortvidcover = CW('post/videocover');
        $shortvidurl = CW('post/videourl');
        $videocover = $videourl = '';
    }
    //var_dump($vidtype);return;
    $userid = CW('post/userid');
    $exist_user = $db->query('users','',"tel='{$userid}'",'',1);
    if(!$exist_user){
        echo  json_encode(array(
    	    'data'=>"该用户不存在!"
    	));return;
    }
    $isshenhe = $db->query('post','',"userid='{$userid}' and ishow=2");
    if($isshenhe){
        echo  json_encode(array(
    	    'data'=>"您有未审核的视频，请等待审核完成后再继续发布!"
    	));return;
    }
    if(!CW('post/topic')){
        echo  json_encode(array(
    	    'data'=>"请选择话题"
    	));return;
    }
    $topic = CW('post/topic');
    
    $exist_topic = $db->query('topic','',"id='{$topic}'",'',1);
    if(!$exist_topic){
        echo  json_encode(array(
    	    'data'=>"该分类不存在"
    	));return;
    }
    if(strlen($title)>500 || strlen($title)<3){
    	echo  json_encode(array(
    	    'data'=>"标题字符要求为3~500个字符"
    	));return;
    }
    if($videocover){
        if(strlen($videocover)>500 || strlen($videocover)<20){
    	echo  json_encode(array(
    	    'data'=>"长视频封面链接长度为20-500"
    	));return;
    }
    }
    if($videourl){
        if(strlen($videourl)>500 || strlen($videourl)<20){
    	echo  json_encode(array(
    	    'data'=>"长视频链接长度为20-500"
    	));return;
    }
    }
    if($shortvidurl){
        if(strlen($shortvidurl)>500 || strlen($shortvidurl)<20){
    	echo  json_encode(array(
    	    'data'=>"短视频链接长度为20-500"
    	));return;
    }
    }
    if($shortvidcover){
        if(strlen($shortvidcover)>500 || strlen($shortvidcover)<20){
    	echo  json_encode(array(
    	    'data'=>"短视频封面链接长度为20-500"
    	));return;
    }
    }
    
    // if(!preg_match("/^1[3|4|5|8][0-9]\d{8}$/",$userid)){    
    //     msg('手机号码格式错误','刷新','','',true);
    // }
    $array = array(
        'userid'=>$userid,
    	'title'=>$title,
    	'videocover'=>$videocover,
    	'videourl'=>$videourl,
    	'shortvidurl'=>$shortvidurl,
    	'shortvidcover'=>$shortvidcover,
    	'diamond'=>0,
    	'vipdiam'=>0,
    	'hot'=>0,
    	'likes'=>0,
    	'topic'=>$topic,
    	'istuijian'=>0,
    	'flag'=>'',
        'ftime'=>time(),
        'filesize'=>'',
        'addparam'=>'',
        'downloadurl'=>'',
    	'ishow'=>2
    );

    $res = $db->exec('post','i',$array);
    
   
    if($res){
        echo  json_encode(array(
    	    'data'=>"发布成功,请等待管理员审核",
    	    'state'=>'success'
    	));return;
    }else{
        echo  json_encode(array(
    	    'data'=>"发布失败,请稍后再试!"
    	));return;
    }
?>