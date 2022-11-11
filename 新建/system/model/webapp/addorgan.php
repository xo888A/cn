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
    
//  require_once  ROOT_URL.'/system/model/autoload.php';
// 	use Qiniu\Auth;
// 	use Qiniu\Storage\UploadManager;
// 	$auth = new Auth('GcjjSafVyxPrVGuTiDj4SMgZbRj8YEG7ewnw5KeI', 'pmJsVaB01lKeKlrLmJNYkFW-O7M_VgRmGjXnyrd9');
// 	$token = $auth->uploadToken(QJN);
// 	$uploadMgr = new UploadManager();
    $db = functions::db();
    $title = CW('post/title');

    $diamond = CW('post/diamond');
    $hot = CW('post/hot');
    $like = CW('post/like');
    $diamond = intval(CW('post/diamond'));
    $vipdiam = intval(CW('post/vipdiam'));
    if($vipdiam>$diamond){
        msg('会员钻石价格应低于普通钻石价格','刷新','','',true);
    }
    // $ftime = CW('post/ftime');
    ///////////////////////
    if(!CW('post/topic')){
        msg('至少添加一个话题','刷新','','',true);
    }
    $topic = explode('|',CW('post/topic'));
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
    // if(strlen($userid)!=11){
    // 	msg('手机号码必须为11位','刷新','','',true);
    // }
    $img1 = CW('post/img1') ? CW('post/img1').'|' : '';
    $img2 = CW('post/img2') ? CW('post/img2').'|' : '';
    $img3 = CW('post/img3') ? CW('post/img3').'|' : '';
    $img4 = CW('post/img4') ? CW('post/img4').'|' : '';
    $img5 = CW('post/img5') ? CW('post/img5').'|' : '';
    $img6 = CW('post/img6') ? CW('post/img6').'|' : '';
    $img7 = CW('post/img7') ? CW('post/img7').'|' : '';
    $img8 = CW('post/img8') ? CW('post/img8').'|' : '';
    $img9 = CW('post/img9') ? CW('post/img9').'|' : '';
    $img = $img1.$img2.$img3.$img4.$img5.$img6.$img7.$img8.$img9;
    $img = substr($img,0,-1);
    $ishow = CW('post/ishow')=='公开' ? 1 : 0;
    $ftime = CW('post/ftime') ? strtotime(CW('post/ftime')) : time();
    $res = $db->exec('post','i',array(
        'userid'=>$userid,
    	'title'=>$title,
    	'imglist'=>$img,
    	'hot'=>$hot,
    	'diamond'=>$diamond,
    	'vipdiam'=>$vipdiam,
    	'likes'=>$like,
    	'topic'=>$_ids,
    	'shikan'=>CW('post/shikan'),
    	'istuijian'=>CW('post/istuijian'),
        'ftime'=>$ftime,
        'organcover'=>CW('post/organcover'),
        'filesize'=>CW('post/filesize') ? CW('post/filesize') : '',
        'addparam'=>CW('post/addparam'),
        'downloadurl'=>CW('post/downloadurl'),
        'imgcontent'=>str_replace("\"","'",$_POST['imgcontent']),
    	'ishow'=>$ishow,
    	'downlevel'=>$level
    ));
    
   
    if($res){
        if($ishow){
            $array = explode(',',$_ids);
            foreach ($array as $val){
                $num = $db->query('topic','num',"id='{$val}'",'',1);
                $num = intval($num[0]['num'])+1;
                $db->exec('topic','u',"num='{$num}',id='{$val}'");
            }
        }
        msg('添加成功!','刷新','javascript:location.reload()','success',true);
    }else{
        msg('添加失败!','重置','javascript:location.reload()','error',true);
    }
?>