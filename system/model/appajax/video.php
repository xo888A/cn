<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $me = $us =  CW('post/tel');
    $id = CW('post/id');
    $tu = TU;
    $pinglunnum = $db->get_count('comments',"postid='{$id}' and ishow=1");
    $post = $db->query('post','',"id='{$id}'");
    $user =  $db->query('users','',"tel='{$post[0]['userid']}'",'',1);
    
    $tel = $user[0]['tel']; 
    $isfollow = $db->query('follow','',"tel1='{$me}' and tel2='{$tel}'",'',1);
    if($isfollow){
        $guanzhu = "<a href='javascript:;' onclick='cancelguanzhu(\"{$tel}\")' class='followuser user_{$tel}' user='{$tel}'  style='background:#ccc'>已关注</a>";
    }else{
        $guanzhu = "<a href='javascript:;' onclick='guanzhu(\"{$tel}\")'  class='followuser user_{$tel}' user='{$tel}'>关注</a>";
    }
    $topices = explode(',',$post[0]['topic']);
 	$topic = '';
 	foreach ($topices as $topice){
 	    $topicname = $db->query('topic','name',"id='{$topice}'");
 	    if(!$topicname){continue;}
 	    $topic .= "<li><a href='javascript:;' onclick='opentopic(\"{$topicname[0]['name']}\")'>#{$topicname[0]['name']}</a></li>";
 	}
 	$topic = $topic."<li class='alltopiclist'><a href='javascript:;' onclick='openwin(\"alltopiclist\")'>全部</a></li>";
    $biaoqing = $tietu = '';;
    for($i=0;$i<=49;$i++){
        $url = TU.'/img1/'.$i.'.png';
        $biaoqing.= "<li><img src='{$url}'/></li>";
    }
    for($i=0;$i<=29;$i++){
        $url = TU.'/img2/a'.$i.'.png';
        $tietu.= "<li><img src='{$url}'/></li>";
    }
    
    
    
    
    
    $filesize = $post[0]['filesize'] ? $post[0]['filesize'] : '0M';
 	$addparam = $post[0]['addparam'] ? $post[0]['addparam'] : '00:00';
    $diam = $post[0]['diamond'];
 	$vipdiam = $post[0]['vipdiam'];
 	//判断是否购买，如果购买跳过
 	$isbuy = $db->query('sellvideo','',"tel='{$us}' and vidid='{$id}'");
 	$curuser = $db->query('users','',"tel='{$us}'",'',1);
 	$isvip = $curuser[0]['viptime']>time() ? 'isvip' : 'notvip';
 	$index = INDEX;
 	if($isvip=='isvip' && $vipdiam){
 	    $jinbi = $vipdiam;$append='';
 	}else{
 	    $jinbi = $diam;
 	    $append = "<a href='javascript:;' onclick='openwin(\"vip\")' class='a'>开通VIP观看</a>";
 	}
//  	if($vipdiam){
//         //需要购买
//     }elseif (!$vipdiam && $diam) {
//         //VIP免费
//     }else{
//         //免费
//     }
    $loginuser = $me;
 	$look =  $looktime = $curr = $db->query('users','look,looktime,mylevel',"tel='{$loginuser}'",'',1);
 	$part = "<div class='maincontent'>
                    <div class='rel h100'>
                        <img class='w100 h100' src='{$post[0]['videocover']}' />
                        <div class='mask'></div>
                        <div class='abs'>
                            <p class='tit'>此视频时长<span>{$addparam}</span>分钟，压缩文件<span>{$filesize}</span>购买VIP后可直接观看/下载原版电影 </p>
                            <p class='btn'>{$append}<a class='b buyvideo' href='javascript:;' rel='{$id}'>购买一次{$jinbi}金币</a></p>
                        </div>                                 
                    </div>
                </div>";
                
    $download = $post[0]['downloadurl'] ? $post[0]['downloadurl'] : 'http://www.baidu.com';
    $target = "target='_blank'";
    $_a = "<a href='javascript:;' class='c'>复制下载链接</a>";
    $stop = false;
    
    $set = $db->query('sets','lv1,lv2,lv3,lv4,lv5,lv6,downlv1,downlv2,downlv3,downlv4,downlv5,downlv6','id=1','',1);
 	$lv1 = $set[0]['lv1'];
 	$lv2 = $set[0]['lv2'];
 	$lv3 = $set[0]['lv3'];
 	$lv4 = $set[0]['lv4'];
 	$lv5 = $set[0]['lv5'];
 	$lv6 = $set[0]['lv6'];
 	$user_level = $curr[0]['mylevel'];
 	$look = $look[0]['look'];
 	$looktime = $looktime[0]['looktime'];
 	
 	if(date('Ymd',time())!=date('Ymd',$looktime)){
 	    $db->exec('users','u',array(array(
 	        'look'=>0,
 	        'looktime'=>time()
 	    ),array(
 	        'tel'=>$loginuser
 	    )));
 	    $look = $db->query('users','look',"tel='{$loginuser}'",'',1);
 	    $look = $look[0]['look'];
 	}
 	
 	if($user_level==1){
 	    if($look>=$lv1){
 	        $stop = true;
 	    }
 	    $looknum = $lv1;
 	}elseif($user_level==2){
 	    if($look>=$lv2){
 	        $stop = true;
 	    }$looknum = $lv2;
 	}elseif($user_level==3){
 	    if($look>=$lv3){
 	        $stop = true;
 	    }$looknum = $lv3;
 	}elseif($user_level==4){
 	    if($look>$lv4){
 	        $stop = true;
 	    }$looknum = $lv4;
 	}elseif($user_level==5){
 	    if($look>=$lv5){
 	        $stop = true;
 	    }$looknum = $lv5;
 	}elseif($user_level==6){
 	    
 	    if($look>=$lv6){
 	        $stop = true;
 	    }$looknum = $lv6;
 	}

    
 	if($isbuy){
 	    functions::history2($id,$me);
 	    $look++;
 	    $db->exec('users','u',"look='{$look}',tel='{$loginuser}'");
 	    $html = "playershow";
 	}elseif(!$vipdiam && $isvip=='isvip'){
 	    functions::history2($id,$me);
 	    $look++;
 	    $db->exec('users','u',"look='{$look}',tel='{$loginuser}'");
 	    $html = "playershow";
 	}elseif(!$vipdiam && !$diam){
 	    functions::history2($id,$me);$look++;$db->exec('users','u',"look='{$look}',tel='{$loginuser}'");
 	    $html = "playershow";
 	}else{
 	    $html = $part;
 	    $target = '';
 	    $download = "javascript:alert('请先开通VIP');";
 	    $_a = "<a href='javascript:alert(\"请先开通VIPP\")' class='cc'>复制下载链接</a>";
 	}

 	/////////////////////////2022-03-01加
 	$tu = TU;
 	if($stop){
 	    $html = "<div class='maincontent'>
                    <div class='rel h100'>
                        <img class='w100 h100' src='{$post[0]['videocover']}' />
                        <div class='mask'></div>
                        <div class='abs'>
                            <p class='tit'>抱歉,今日看片配额已用完, 请24小时后再来</p>
                        <p class='tit' style='margin-top:10px'>我的等级<img class='lookimg' src='{$tu}/{$curr[0]['mylevel']}.png' style='height:25px;vertical-align:middle' /> 每日配额: {$looknum}个</p>
                            <p class='btn'><a href='javascript:;' onclick='openwin(\"vip\")' class='a'> 升级VIP </a><a class='b openinstroee' href='javascript:;' rel='{$id}'>看片配额说明</a></p>
                        </div>
                    </div>
                </div>";
 	}
    
    

	 
    
    
    
    
    
    
    
    
    $table1 = "<tr>
 	            <td>LV1 每日浏览量 </td>
 	            <td><span>{$lv1}</span>视频/图片库</td>
 	         </tr>
 	         <tr>
 	            <td>LV2 每日浏览量 </td>
 	            <td><span>{$lv2}</span>视频/图片库</td>
 	         </tr>
 	         <tr>
 	            <td>LV3 每日浏览量 </td>
 	            <td><span>{$lv3}</span>视频/图片库</td>
 	         </tr>
 	         <tr>
 	            <td>LV4 每日浏览量 </td>
 	            <td><span>{$lv4}</span>视频/图片库</td>
 	         </tr>
 	         <tr>
 	            <td>LV5 每日浏览量 </td>
 	            <td><span>{$lv5}</span>视频/图片库</td>
 	         </tr>
 	         <tr>
 	            <td>LV6 每日浏览量 </td>
 	            <td><span>{$lv6}</span>视频/图片库</td>
 	         </tr>";
    $table2 = "<tr>
 	            <td>LV1 下载限制</td>
 	            <td><span>{$set[0]['downlv1']}</span>视频/图片库</td>
 	         </tr>
 	         <tr>
 	            <td>LV2 下载限制</td>
 	            <td><span>{$set[0]['downlv2']}</span>视频/图片库</td>
 	         </tr>
 	         <tr>
 	            <td>LV3 下载限制/td>
 	            <td><span>{$set[0]['downlv3']}</span>视频/图片库</td>
 	         </tr>
 	         <tr>
 	            <td>LV4 下载限制</td>
 	            <td><span>{$set[0]['downlv4']}</span>视频/图片库</td>
 	         </tr>
 	         <tr>
 	            <td>LV5 下载限制</td>
 	            <td><span>{$set[0]['downlv5']}</span>视频/图片库</td>
 	         </tr>
 	         <tr>
 	            <td>LV6 下载限制</td>
 	            <td><span>{$set[0]['downlv6']}</span>视频/图片库</td>
 	         </tr>";
 	$level = $db->query('users','mylevel',"tel='{$me}'",'',1);
    $level = $level[0]['mylevel'];
    // <div class="swiper-slide">
    //     <a href="#">这里是视频播放上面的单排滚动文字</a>
    // </div>
    
    
    $where = " and find_in_set(0,level)";
    if(STARTADV){
        if($level){
            //$where = " and level like '%{$level}%'";
            $where = " and find_in_set($level,level)";
        }
    }    
    $adv4 = '';
    $advs = $db->query('appadv','',"positionabs='播放视频页-广告'".$where,'');
    foreach ($advs as $adv){
         $onclick ="openadv(\"{$adv['id']}\")";
         $adv4 .= "<li>
                            <a href='javascript:;' onclick='{$onclick}'>{$adv['remarks']}</a>
                        </li>";
    }
    
 
 	//$adv4 = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&dev=app&position=Trang phát video-Quảng cáo&iswenzi=true&level='.$level);
 	$isliked = $db->query('likes','',"tel='{$us}' and postid='{$id}'");
    echo json_encode(array(
        'state'=>1,
        'adv4'=>$adv4,
        'biaoqing'=>$biaoqing,
        'tietu'=>$tietu,
        'topic'=>$topic,
        'title'=>$post[0]['title'],
        'time'=>date('Y-m-d',$post[0]['ftime']),
        'look'=>functions::hot($post[0]['hot']),
        'like'=>functions::hot($post[0]['likes']),
        'pinglunnum'=>functions::hot($pinglunnum),
        'nickname'=>$user[0]['nickname'],
        'avatar'=>$user[0]['avatar'],
        'guanzhu'=>$guanzhu,
        'godown'=>functions::autocode($id.'-'.$me),
        'user_follow'=>functions::hot($user[0]['flonum']),
        'user_descs'=>$user[0]['descs'] ? functions::cut2s($user[0]['descs'],10) : '暂时无评论哦~',
        'html'=>$html,
        'table1'=>$table1,
        'table2'=>$table2,
        'videocover'=>$post[0]['videocover'],
        'videourl'=>$post[0]['videourl'],
        'tel'=>$post[0]['userid'],
        'liked'=>$isliked ? '../image/m1_.png' : '../image/y1.png'
    ));
?>