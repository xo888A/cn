<?php 
    if(!defined('CW')){exit('Access Denied');}
    $vid = CW('post/id',1);
    $tel = CW('post/tel',1);
    if(!$tel){
       echo json_encode(array(
           'state'=>2,
            'err'=>'请先登录！',
        ));return;
    }
    $db = functions::db();
    $exist = $db->query('sellvideo','',"tel='{$tel}' and vidid='{$vid}'");
    if($exist){
        echo json_encode(array(
            'state'=>2,
            'err'=>'请勿重复购买！',
        ));return;
    }
    $post = $db->query('post','vipdiam,diamond',"id='{$vid}'",'',1);
    $vipdiam = $post[0]['vipdiam'];
    $diamond = $post[0]['diamond'];
    $user = $db->query('users','viptime,diam',"tel='{$tel}'",'',1);
    $user_diam = $user[0]['diam'];
    if($user[0]['viptime']>time()){
        if($user_diam>$vipdiam){
            $surplusdiam = $user_diam-$vipdiam;
            $res1 = $db->exec('users','u',"diam='{$surplusdiam}',tel='{$tel}'");
            $res2 = $db->exec('sellvideo','i',array(
                    'tel'=>$tel,
                    'vidid'=>$vid,
                    'ftime'=>time()
            ));
            if($res1 && $res2){
                $db->exec('buyrecord','i',array(
                    'tel'=>$tel,
                    'paytype'=>'buyvid',
                    'payid'=>$vid,
                    'ftime'=>time()
                ));
                 echo json_encode(array(
                    'state'=>1,
                    'data'=>'购买成功',
                ));
            }else{
                echo json_encode(array(
                    'state'=>2,
                    'err'=>'购买失败！'
                ));
            }
        }else{
            echo json_encode(array(
                'state'=>2,
                'err'=>'您剩余的金币不足以购买本影片！'
            ));
        }
    }else{
        if($user_diam>$diamond){
            $surplusdiam = $user_diam-$diamond;
            $res1 = $db->exec('users','u',"diam='{$surplusdiam}',tel='{$tel}'");
            $res2 = $db->exec('sellvideo','i',array(
                    'tel'=>$tel,
                    'vidid'=>$vid,
                    'ftime'=>time()
                ));
            if($res1 && $res2){
                echo json_encode(array(
                    'state'=>1,
                    'data'=>'购买成功'
                ));
            }else{
                echo json_encode(array(
                   'state'=>2,
                    'err'=>'购买失败！',
                ));
            }
        }else{
            echo json_encode(array(
                'state'=>2,
                'err'=>'您剩余的金币不足以购买本影片！'
            ));
        }
    }
?>