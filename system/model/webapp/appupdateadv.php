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
    	msg('ID错误,请重新登录','确定','javascript:location.reload()','error');
    }
    $position = CW('post/position');
   
    $postid = CW('post/postid');//视频帖子ID
    $remarks = CW('post/remarks');
   
    $imgcover = CW('post/imgcover');

    
    $db = functions::db();
    if($position=='通用链接'){
        $url = substr($postid,0,strrpos($postid,'_'));
        $at = substr($postid,strrpos($postid,'_')+1);
        $click = $at=='@@' ? 'out' : 'in';
        $postid = $url;
    }else{
       
        $postid = $postid;
    }
    $res = $db->exec('appadv','u',array(array(
        'tel'=>'',
        'position'=>$position,
        'postid'=>$postid,
        'cover'=>$imgcover,
        'remarks'=>$remarks,
        'endtime'=>'',
        'positionabs'=>CW('post/positionabs'),
        'click'=>$click,
        'level'=>$level
    ),array(
        'id'=>$id    
    )));
    if($res){
        msg('更新成功!','刷新','javascript:location.reload()','success',true);
    }else{
        msg('数据无变动!','重置','javascript:location.reload()','error',true);
    } 
?>