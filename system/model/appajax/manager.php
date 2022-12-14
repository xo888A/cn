<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tu =TU;
    $db = functions::db();
    $page = intval(abs(CW('get/page',1)));
    $tel = CW('get/tel');
    $type = CW('get/type');
    if($type=='all'){
        $where = "(videocover!='' || shortvidurl!='') and userid='{$tel}' and ";
        $state_p = "<span style='color:yellowgreen;font-size:15px;font-weight:bold'>状态: 成功</span>";
    }else if($type=='success'){
        $where = "ishow=1 and (videocover!='' || shortvidurl!='') and userid='{$tel}' and ";
        $state_p = "<span style='color:yellowgreen;font-size:15px;font-weight:bold'>状态: 成功</span>";
    }else if($type=='on'){
        $where = "ishow=2 and (videocover!='' || shortvidurl!='') and userid='{$tel}' and ";
        $state_p = "<span style='color:red;font-size:15px;font-weight:bold'>状态: 审核中</span>";
    }
    
    $where = $where.'  1=1';
    $count = $db->get_count('post',$where); 
    $pagecount = ceil($count/PAGESIZE);
   
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;

    $articles = $db->query('post','',$where,'ftime desc',"{$page},".PAGESIZE);
    $data = '';
    foreach($articles as $article){
    	$time = date('Y-m-d',$article['ftime']);
        $cover = $article['videocover'];
    	$title = $article['title'];
    	$likes = functions::hot($article['likes']);
    	$hot = functions::hot($article['hot']);
        $a = TU.'/a.png';
        $b = TU.'/b.png';
        $c = TU.'/c.png';
        $cover = $v = '';
        if($article['videocover']!=''){
            $v = "<img class='vimg abs' src='".TU."/video.png' />";
            $cover = $article['videocover'];
            $tag = "{$article['addparam']}";
            $href = INDEX.'/index.php?mod=video&id='.$article['id'];
        }else if($article['imglist']!=''){
            $pos = stripos($article['imglist'],'|');
            $v = '';
            if($pos){
                $cover = substr($article['imglist'],0,$pos);
            }else{
                $cover = $article['imglist'];
            }
            
            $i = TU.'/t.png';
            $addparam = $article['addparam'] ? $article['addparam'] : 0;
            $tag = "<img src='{$i}'>{$addparam}";
            $href = INDEX.'/index.php?mod=organ&id='.$article['id'];
        }
        $tips = functions::getnewtips($article['vipdiam'],$article['diamond']);
        
            $user = $db->query('users','',"tel='{$article['userid']}'",'',1);$user = $user[0];
            $topic = explode(',',$article['topic']);
        	$tu1 = INDEX.'/index.php?mod=topiclist&id='.$topic[0];
        	$tu2 = INDEX.'/index.php?mod=topiclist&id='.$topic[1];
        	$tu3 = INDEX.'/index.php?mod=topiclist&id='.$topic[2];
        	$tu4 = INDEX.'/index.php?mod=topiclist&id='.$topic[3];
        	if($topic[0]){
        	    $n1 =functions::getTopicName($topic[0]);
        	    $topi1 = "<a href='javascript:;' tapmode onclick='opentopic(\"$n1\")'>#".$n1.'</a>';
        	}else{
        	    $topi1 = '';
        	}
        	if($topic[1]){
        	    $n2 =functions::getTopicName($topic[1]);
        	    $topi2 = "<a  href='javascript:;' tapmode onclick='opentopic(\"$n2\")'>#".$n2.'</a>';
        	}else{
        	    $topi2 = '';
        	}
        	if($topic[2]){
        	    $n3 = functions::getTopicName($topic[2]);
        	    $topi3 = "<a   href='javascript:;' tapmode onclick='opentopic(\"$n3\")'>#".$n3.'</a>';
        	}else{
        	    $topi3 = '';
        	}
        	if($topic[3]){
        	    $n4 = functions::getTopicName($topic[3]);
        	    $topi4 = "<a href='javascript:;' tapmode onclick='opentopic(\"$n4\")'>#".$n4.'</a>';
        	}else{
        	    $topi4 = '';
        	}
            $nickname = $user['nickname'] ? $user['nickname'] : '未知用户';
            $userurl = INDEX."/index.php?mod=author&id=".functions::autocode($article['userid']);
            $miaoshu =  $user['miaoshu'] ? $user['miaoshu'] : '暂无描述';
            if($article['videocover']!=''   || $article['shortvidcover']!=''){
                if($article['shortvidcover']){
                        $cover = $article['shortvidcover'];
                        $img = TU.'/dsp.png';
                        $tag = "<img src='{$img}' />".'短视频';
                        $_t = 'shortvideo';
                    }else{
                        $_t = 'video';
                        $cover = $cover;
                    }
                $data  .= "<li>
                            <div class='wrap'>
                                <!--<div class='avatar'>
                                     <a href='javascript:;'  onclick='openuserindex(\"{$article['userid']}\")'><img class='avatar' src='{$user['avatar']}'>
                                    <span>{$nickname}</span></a>
                                    <span class='m'><img src='{$tu}/desc.png'>{$miaoshu}</span>
                                </div>-->
                                <div class='w100 overflow'>
                                    <p class='fl'>{$state_p}</p>
                                    <p class='fr' style='color:red;font-size:15px;font-weight:bold' onclick='delid({$article['id']})'>删除</p>
                                </div>
                                <div class='img rel'>
                                    <a href='javascript:;' onclick='openvideo(\"{$article['id']}\",\"{$_t}\")'><img class='cover' src='{$cover}' />
                                    {$tips}
                                    <p class='tag2 abs'>{$tag}</p>
                                    {$v}</a>
                                </div>
                                <p class='overhid t'>{$title}</p>
                                <p class='stype overhid '>{$topi1}{$topi2}{$topi3}{$topi4}</p>
                                <!--<p class='ts'><img src='{$a}' />{$time}<img src='{$b}' class='b' />{$hot}<img class='c' src='{$c}' />{$likes}</p>-->
                            </div>
                            <p class='line'></p>
                        </li>";
            }
    	
    }
    echo json_encode(array(
        'state'=>1,
        'data'=>$data
    )); 

?>