<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $tja = CW('post/tja');
    $tjb = CW('post/tjb');
    $tjc = CW('post/tjc');
    $tjd = CW('post/tjd');
    $tje = CW('post/tje');
    $tjf = CW('post/tjf');
    $tjg = CW('post/tjg');
    $tjh = CW('post/tjh');
    // if($p2<$p1 || $p3<$p2 || $p4<$p3 || $p5<$p4){
    //     msg('用户返利比设置错误, 请注意开始金额与结束金额的搭配','刷新','javascript:location.reload()','',true);
    // }
    

    $res = $db->exec('sets','u',array(
        array(
            "tja"=>$tja,
            "tjb"=>$tjb,
            "tjc"=>$tjc,
            "tjd"=>$tjd,
            "tje"=>$tje,
            "tjf"=>$tjf,
            "tjg"=>$tjg,
            "tjh"=>$tjh,
            "tuijianlist"=>CW('post/tuijianlist'),
            'vlist'=>CW('post/vlist'),
            'ilist'=>CW('post/ilist'),
            'add1'=>CW('post/add1'),
            'add2'=>CW('post/add2'),
            'add3'=>CW('post/add3'),
        ),array(
            "id"=>1
        )));
   
    //if($res){
    	msg('设置成功!','确定','','success');
    //}else{
    //    msg('数据无变动!','重填','javascript:location.reload()','',true);
    //}
?>