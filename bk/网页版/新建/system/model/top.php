<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $topics = $db->query('sets','tuijianlist','id=1');
    $topics = $topics[0]['tuijianlist'];
    $topics = explode(',',$topics);
    $t = '';
    foreach ($topics as $topic){
        $ts = $db->query('topic','',"name='{$topic}'");
        $url = INDEX.'/index.php?mod=topiclist&id='.$ts[0]['id'];
        $t .= "<li><a href='{$url}'>{$topic}</a></li>";
    }
    $index = INDEX;
    $t .= "<li class='special'><a href='{$index}/index.php?mod=alltopiclist'>查看全部分类+</a></li>";
    $tpl =  new Society();
    $tpl->assign('topic',$t);
    $name = CW('get/mod');
    if($name=='user' || $name=='look'){
        $tname = '会员中心';
    }elseif($name=='set'){
        $tname = '账号设置';
    }elseif($name=='wallet'){
        $tname = '我的钱包';
    }elseif($name=='vip'){
        $tname = '充值会员';
    }elseif($name=='money'){
        $tname = '充值金币';
    }elseif($name=='card'){
        $tname = '卡密兑换';
    }elseif($name=='concern'){
        $tname = '我的关注';
    }elseif($name=='albuy'){
        $tname = '已购影片';
    }elseif($name=='customer'){
        $tname = '客服中心';
    }elseif($name=='message'){
        $tname = '消息中心';
    }elseif($name=='shares'){
        $tname = '推广赚钱';
    }elseif($name=='activity'){
        $tname = '官方活动';
    }elseif($name=='app'){
        $tname = '推荐APP';
    }elseif($name=='msga'){
        $tname = '我的消息';
    }elseif($name=='login'){
        $tname = '登录';
    }elseif($name=='reg'){
        $tname = '注册';
    }elseif($name=='findpass'){
        $tname = '找回密码';
    }
    $tpl->assign('tname',$tname);
    
    
    
    $curname = functions::autocode(CW('cookie/__username'),'-');
    //$num = $db->get_count('comment2',"tel2='{$curname}' and state=0 and ishow=1");
    $num1 = $db->get_count('comment2',"tel2='{$curname}' and state=0 and ishow=1");
    $num2 = $db->get_count('htmlcomment2',"tel2='{$curname}' and state=0 and ishow=1");
    $num = intval($num1)+intval($num2);
    if(intval($num)>0){
        $sw = "<script>
                $(function(){
                    $('.b11').text({$num1});
                    $('.b22').text({$num2});
                    $('.overflow.message.width1 li:nth-child(3)').attr('class','rel');
                    $('.overflow.message.width1 li:nth-child(3)').append(\"<span class='abs msgnumber'>{$num}</span>\");
                });
            </script>";
    $tpl->assign('sw',$sw);
    }
    
    
    
    
    
    
    
    
    $tpl->compile(basename(__FILE__,'.php'),'wap'); 

    
?>