<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    
    $type = CW('post/type',2);
    $val = CW('post/val');
    $img = CW('post/img');
    $us = CW('post/tel');
    if(!$us){
        echo json_encode(array(
            'state'=>2,
                'err'=>'请先登录'
            ));return;
    }
    if(!$val){
        echo json_encode(array(
            'state'=>2,
                'err'=>'暂无描述'
            ));return;
    }
    if($type=='nickname'){
        if(strlen($val)>30 || strlen($val)<3){
        	echo json_encode(array(
        	    'state'=>2,
                'err'=>'昵称（小于30字符)'
            ));return;
        }
        $weijincis = $db->query('sets','weijinci','id=1');
        $weijincis = explode(',',$weijincis[0]['weijinci']);
        foreach ($weijincis as $weijinci){
            if(strpos($val,$weijinci) !== false){ 
             echo json_encode(array(
                 'state'=>2,
                'err'=>'昵称包含违禁词, 请修改!'
            ));return;
            }
        }
        //$res = $db->exec('users','u',"nickname='{$val}',tel='{$us}'");
        $res = $db->query("update users set nickname='{$val}' where tel='{$us}'");
        $data = '昵称更新成功';
    }elseif($type=='sex'){
        if($val!='Nam' && $val!='Nữ'){
            echo json_encode(array(
                'state'=>2,
                'err'=>'性别填写错误'
            ));return;
        }
        //$res = $db->exec('users','u',"sex='{$val}',tel='{$us}'");
        $res = $db->query("update users set sex='{$val}' where tel='{$us}'");
        $data = '性别更新成功';
    }elseif($type=='descs'){
        if(!$img){
        	echo json_encode(array(
        	    'state'=>2,
                'err'=>'头像有误,请重新上传'
            ));return;
        }
        if(strlen($val)>255 || strlen($val)<10){
        	echo json_encode(array(
        	    'state'=>2,
                'err'=>'名称长度介于 10 到 255 个字符之间'
            ));return;
        }
        
        // $res = $db->exec('users','u',array(array(
        //     'descs'=>$val,
        //     'avatar'=>$img
        // ),array(
        //     'tel'=>$us
        // )));
        $res = $db->query("update users set descs='{$val}',avatar='{$img}' where tel='{$us}'");
        $data = '更新成功';
    }elseif($type=='withdrawalspass'){
        if(!is_numeric($val)){
            echo json_encode(array(
                'state'=>2,
                'err'=>'提现密码为数字符'
            ));return;
        }
        if(strlen($val)!=6){
        	echo json_encode(array(
        	    'state'=>2,
                'err'=>'提现密码为6个数字'
            ));return;
        }
        //$res = $db->exec('users','u',"withdrawalspass='{$val}',tel='{$us}'");
        $res = $db->query("update users set withdrawalspass='{$val}' where tel='{$us}'");
        $data = '提现密码修改成功';
    }
    
    
    if($res){
        
        echo json_encode(array(
            'state'=>1,
            'data'=>$data,
            
        ));
    }else{
        echo json_encode(array(
            'state'=>2,
            'err'=>'更新成功'
        ));
    }
?>