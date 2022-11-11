<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tel = CW('post/tel',1);
    $type = intval(CW('post/type',1));
    $posttype = CW('post/posttype');
    if(!$tel){
        echo json_encode(array(
            'state'=>1,
            'err'=>'绑定手机号后才可操作'
        ));return;
    }
    $postid = CW('post/postid',1);
    if(!$postid){
        echo json_encode(array(
            'state'=>1,
            'err'=>'影片ID异常, 操作失败'
        ));return;
    }
    $db = functions::db();
    $exist = $db->query('users','',"tel='{$tel}'",'',1);
    if(!$exist){
        echo json_encode(array(
            'state'=>1,
            'err'=>'当前用户异常, 操作失败'
        ));return;
    }
    $islike = $db->query('likes','',"tel='{$tel}' and postid='{$postid}'",'',1);
    if($type==1){
        if($islike){
            echo json_encode(array(
                'state'=>1,
                'err'=>'请勿重复操作'
            ));return;
        }
        
        $res = $db->exec('likes','i',array(
            'tel'=>$tel,
            'postid'=>$postid,
            'posttype'=>$posttype,
            'ftime'=>time()
        ));
        if($res){
            $return_like = getlike($db,$postid)+1;
            $db->exec('post','u',"likes='{$return_like}',id='{$postid}'");
        }
    }else if($type==2){
        if(!$islike){
            echo json_encode(array(
                'state'=>1,
                'err'=>'ID异常, 请稍后操作'
            ));return;
        }
        $res = $db->exec('likes','d',"tel='{$tel}' and postid='{$postid}'");
        if($res){
            $return_like = getlike($db,$postid)-1;
            $db->exec('post','u',"likes='{$return_like}',id='{$postid}'");
        }
    }
    
    
    
    if($res){
        echo json_encode(array(
            'state'=>1,
            'data'=>'success',
            'num'=>functions::hot($return_like)
        ));
    }else{
        echo json_encode(array(
            'state'=>2,
            'err'=>'操作失败'
        ));
    }
    function getlike($db,$postid){
        $likes = $db->query('post','likes',"id='{$postid}'",'',1);
        $return_like = intval($likes[0]['likes']);
        return intval($return_like);
    }
    

?>