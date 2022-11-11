<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $postid = CW('post/postid');
    $tel2 = CW('post/tel2');
    $commentid = CW('post/commentid');
  
 
  
    $pinglun = str_replace("\"","'",strip_tags($_REQUEST['pinglun'],'<img>'));file::debug($pinglun);
    if(!trim($pinglun)){
        echo json_encode(array(
            'state'=>2,
            'err'=>'请输入内容!'
        ));return;
    }
    $idd = CW('post/idd');


    $tel1 = CW('post/tel1');

    if($tel1==$tel2){
        echo json_encode(array(
            'state'=>2,
            'err'=>'不可回复自己!'
        ));return;
    }
    if(!$tel1){
        echo json_encode(array(
            'state'=>2,
            'err'=>'请先登录!'
        ));return;
    }
    $db = functions::db();
    $sendtime = $db->query('comments','ftime',"tel='{$tel1}'",'ftime desc',1);
    if(($sendtime[0]['ftime']+60)>time()){
        echo json_encode(array(
            'state'=>2,
            'err'=>'离上次评论时间过短,请稍后再试!'
        ));return;
    }
    
    $viptime = $db->query('users','viptime',"tel='{$tel1}'",'',1);
    // if($viptime[0]['viptime']<time()){
    //     echo json_encode(array(
    //         'err'=>'VIP用户才可以评论哦~'
    //     ));return;
    
    // }
    $res = false;
    if($tel2){
        $sendtime2 = $db->query('comment2','ftime',"tel1='{$tel1}'",'ftime desc',1);
        if(($sendtime2[0]['ftime']+60)>time()){
            echo json_encode(array(
                'state'=>2,
                'err'=>'离上次评论时间过短,请稍后再试!'
            ));return;
        }
        $res = $db->exec('comment2','i',array(
            'tel1'=>$tel1,
            'tel2'=>$tel2,
            'ftime'=>time(),
            'comment'=>$pinglun,
            'commentid'=>$commentid
        ));
        if($res && $idd){
            $db->exec('comment2','u',"state=3,id='{$idd}'");
        }
    }else{
        $res = $db->exec('comments','i',array(
            'postid'=>$postid,
            'tel'=>$tel1,
            'comments'=>$pinglun,
            'ftime'=>time(),
        ));
    }
    if($res){
        echo json_encode(array(
            'state'=>1,
            'data'=>'评论成功,请等待管理员审核!'
        ));
    }else{
        echo json_encode(array(
            'state'=>2,
            'err'=>'评论失败!'
        ));
    }
?>