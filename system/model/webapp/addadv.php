<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();

    $lv0 = CW('post/lv0') ? '0,' : '0,';
    $lv1 = CW('post/lv1') ? '1,' : '';
    $lv2 = CW('post/lv2') ? '2,' : '';
    $lv3 = CW('post/lv3') ? '3,' : '';
    $lv4 = CW('post/lv4') ? '4,' : '';
    $lv5 = CW('post/lv5') ? '5,' : '';
    $lv6 = CW('post/lv6') ? '6,' : '';
    $level = $lv0.$lv1.$lv2.$lv3.$lv4.$lv5.$lv6;
    $position = CW('post/position');
    if($position=='APP帖子详情页'){
        $postid = CW('post/postid');
        if(!$postid){
            msg('视频帖子ID还未设置','刷新','','',true);
        }
    }
    // elseif ($position=='APP应用中心') {
        
    // }else{
    //     msg('请重新选择广告位置!','刷新','','',true);
    // }
    $tel = CW('post/tel');//视频帖子ID
    $postid = CW('post/postid');//视频帖子ID
    $remarks = CW('post/remarks');
    if($position=='APP会员-会员' && !$remarks){
        msg('VIP会员-会员,此处广告必须填写广告备注','刷新','','',true);
    }
    if($position=='APP会员-钻石' && !$remarks){
        msg('VIP会员-钻石,此处广告必须填写广告备注','刷新','','',true);
    }
    if($remarks){
        if(strlen($remarks)>255){
            msg('广告备注最多255个字符','刷新','','',true);
        }
    }
    $imgcover = CW('post/imgcover');
    if(!$imgcover){
        //msg('广告封面还没上传','刷新','','',true);
    }
    //$endtime = strtotime(CW('post/endtime'));
    
    
    // $select = CW('post/select');
    
    // if($select=='新窗口打开'){
    //     $content1 = $content1.'_@@';
    // }elseif($select=='当前窗口打开'){
    //     $content1 = $content1.'_@';
    // }
    $db = functions::db();
    $res = $db->exec('adv','i',array(
        'tel'=>$tel,
        'position'=>$position,
        'postid'=>$postid,
        'cover'=>$imgcover,
        'remarks'=>$remarks,
        'endtime'=>$endtime,
        'click'=>$select,
        'content1'=>CW('post/content1'),
        'content2'=>$content2,
        'content3'=>$content3,
        'content4'=>$content4,
        'content5'=>$content5,
        'level'=>$level
    ));
    if($res){
        msg('添加成功!','刷新','javascript:location.reload()','success',true);
    }else{
        msg('添加失败!','重置','javascript:location.reload()','error',true);
    } 
?>