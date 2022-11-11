<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $me = CW('gp/tel');
    $id = CW('gp/id');
    $tu = TU;
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
 	$topic = $topic."<li class='alltopiclist'><a href='javascript:;' onclick='openwin(\"alltopiclist\")'>全部+</a></li>";
    
    
    
    
    $diam = $post[0]['diamond'];
 	$vipdiam = $post[0]['vipdiam'];
 	//判断是否购买，如果购买跳过
 	$us = $me;
 	$isbuy = $db->query('sellvideo','',"tel='{$us}' and vidid='{$id}'");
 	$curuser = $db->query('users','',"tel='{$us}'",'',1);
 	$isvip = $curuser[0]['viptime']>time() ? 'isvip' : 'notvip';
 	if($isvip=='isvip' && $vipdiam){
 	    $jinbi = $vipdiam;$append='';
 	}else{
 	    $jinbi = $diam;
 	    if(!$me){
 	         $append = "<a href='javascript:;' onclick='openwin(\"login\")' class='a'>开通VIP观看</a>";
 	    }else{
 	         $append = "<a href='javascript:;' onclick='openwin(\"vip\")' class='a'>开通VIP观看</a>";
 	    }
 	   
 	}
    $stop = false;
    $loginuser = $me;
 	$look =  $looktime = $curr =  $db->query('users','look,looktime,mylevel',"tel='{$loginuser}'",'',1);
    $set = $db->query('sets','lv1,lv2,lv3,lv4,lv5,lv6,downlv1,downlv2,downlv3,downlv4,downlv5,downlv6','id=1','',1);
 	$lv1 = $set[0]['lv1'];
 	$lv2 = $set[0]['lv2'];
 	$lv3 = $set[0]['lv3'];
 	$lv4 = $set[0]['lv4'];
 	$lv5 = $set[0]['lv5'];
 	$lv6 = $set[0]['lv6'];
 	
 	$look = $look[0]['look'];
 	$looktime = $looktime[0]['looktime'];
 	$user_level = $curr[0]['mylevel'];
 	if(date('Ymd',time())!=date('Ymd',$looktime)){
 	    
 	    $db->exec('users','u',array(array(
 	        'look'=>0,
 	        'looktime'=>time()
 	    ),array(
 	        'tel'=>$loginuser
 	    )));
 	    $look = $test = $db->query('users','',"tel='{$loginuser}'",'',1);
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

    $target = "target='_blank'";
    $downloadurl = $post[0]['downloadurl'] ? $post[0]['downloadurl'] : 'http://www.baidu.com';
    $_a = "<a href='javascript:;' class='c'>复制下载链接</a>";
 	if($isbuy){
 	    functions::history2($id,$me);
 	    $look++;
 	    $db->exec('users','u',"look='{$look}',tel='{$loginuser}'");
 	    $html = "{$post[0]['imgcontent']}";
 	}elseif(!$vipdiam && $isvip=='isvip'){
 	    functions::history2($id,$me);
 	    $look++;
 	    $db->exec('users','u',"look='{$look}',tel='{$loginuser}'");
 	    $html = "{$post[0]['imgcontent']}";
 	}elseif(!$vipdiam && !$diam){
 	    functions::history2($id,$me);
 	    $look++;
 	    $db->exec('users','u',"look='{$look}',tel='{$loginuser}'");
 	    $html = "{$post[0]['imgcontent']}";
 	}else{
 	    $target = '';
 	    $downloadurl = "javascript:alert('请先开通VIP');";
 	    $_a = "<a href='javascript:alert(\"请先开通VIP\")' class='cc'>复制下载链接</a>";
 	    $index = INDEX;
 	    $imglist = explode('|',$post[0]['shikan']);
 	    $filesize = $post[0]['filesize'] ? $post[0]['filesize'] : '未知';

 	    $addparam = $post[0]['addparam'] ? $post[0]['addparam'] : '';
 	    $part = "<div class='buy-wrap'>
                    <div class='abs'>
                        <p class='tit'>本帖子含<span>{$addparam}</span>张图片,压缩包<span>{$filesize}</span>购买后即可在线观看/下载原片</p>
                        <p class='btn'>{$append}<a class='b buyvideo' href='javascript:;' rel='{$id}'>单买{$jinbi}金币</a></p>
                    </div>
                </div>";
 	    
 	    $img1 = $imglist[0] ? "<img  src='{$imglist[0]}'>" : '';
 	    $img2 = $imglist[1] ? "<img  src='{$imglist[1]}'>" : '';
 	    $img3 = $imglist[2] ? "<img  src='{$imglist[2]}'>" : '';
 	    $img4 = $imglist[3] ? "<img  src='{$imglist[3]}'>" : '';
 	    $img5 = $imglist[4] ? "<img  src='{$imglist[4]}'>" : '';
 	    $img6 = $imglist[5] ? "<img  src='{$imglist[5]}'>" : '';
 	    $html = "<div class='rel'>
 	                {$img1}{$img2}{$img3}{$img4}{$img5}{$img6}
                    $part
                </div>";
 	}

 	
 	
 	if($stop){
 	    $imglist = explode('|',$post[0]['shikan']);
 	    $img1 = $imglist[0] ? "<img  src='{$imglist[0]}'>" : '';
 	    $img2 = $imglist[1] ? "<img  src='{$imglist[1]}'>" : '';
 	    $img3 = $imglist[2] ? "<img  src='{$imglist[2]}'>" : '';
 	    $img4 = $imglist[3] ? "<img  src='{$imglist[3]}'>" : '';
 	    $img5 = $imglist[4] ? "<img  src='{$imglist[4]}'>" : '';
 	    $img6 = $imglist[5] ? "<img  src='{$imglist[5]}'>" : '';
 	    
 	    $html = "<div class='rel'>
 	                {$img1}{$img2}{$img3}{$img4}{$img5}{$img6}
                    <div class='buy-wrap'>
                    <div class='abs'>
                        <p class='tit'>抱歉,今日看片配额已用完, 请24小时后再来!</p>
                        <p class='tit' style='margin-top:10px'>我的等级<img class='lookimg' src='{$tu}/{$curr[0]['mylevel']}.png' /> 每日配额: {$looknum}个</p>
                        <p class='btn'><a href='javascript:;' onclick='openwin(\"vip\")' class='a'>升级VIP等级</a><a class='b openinstroee' href='javascript:;' rel='{$id}'>看片配额说明</a></p>
                    </div>
                    </div>
                </div>";
 	}
    
    $isliked = $db->query('likes','',"tel='{$me}' and postid='{$id}'");
 	$nlike = functions::hot($post[0]['likes']);
 	if($isliked){
 	    $liked = "<img class='m1 liked' src='{$tu}/m1_.png' rel='{$id}' /><span class='liked_num2'>{$nlike}</span>";
 	}else{
 	    $liked = "<img class='m1 liked' src='{$tu}/m1.png' rel='{$id}' /><span class='liked_num2'>{$nlike}</span>";
 	}
    
    
    
    $table1 = "<tr>
 	            <td>LV1每日看片配额</td>
 	            <td><span>{$lv1}</span>个视频/套图</td>
 	         </tr>
 	         <tr>
 	            <td>LV2每日看片配额</td>
 	            <td><span>{$lv2}</span>个视频/套图</td>
 	         </tr>
 	         <tr>
 	            <td>LV3每日看片配额</td>
 	            <td><span>{$lv3}</span>个视频/套图</td>
 	         </tr>
 	         <tr>
 	            <td>LV4每日看片配额</td>
 	            <td><span>{$lv4}</span>个视频/套图</td>
 	         </tr>
 	         <tr>
 	            <td>LV5每日看片配额</td>
 	            <td><span>{$lv5}</span>个视频/套图</td>
 	         </tr>
 	         <tr>
 	            <td>LV6每日看片配额</td>
 	            <td><span>{$lv6}</span>个视频/套图</td>
 	         </tr>";
    $table2 = "<tr>
 	            <td>LV1每日下载配额</td>
 	            <td><span>{$set[0]['downlv1']}</span>个视频/套图</td>
 	         </tr>
 	         <tr>
 	            <td>LV2每日下载配额</td>
 	            <td><span>{$set[0]['downlv2']}</span>个视频/套图</td>
 	         </tr>
 	         <tr>
 	            <td>LV3每日下载配额</td>
 	            <td><span>{$set[0]['downlv3']}</span>个视频/套图</td>
 	         </tr>
 	         <tr>
 	            <td>LV4每日下载配额</td>
 	            <td><span>{$set[0]['downlv4']}</span>个视频/套图</td>
 	         </tr>
 	         <tr>
 	            <td>LV5每日下载配额</td>
 	            <td><span>{$set[0]['downlv5']}</span>个视频/套图</td>
 	         </tr>
 	         <tr>
 	            <td>LV6每日下载配额</td>
 	            <td><span>{$set[0]['downlv6']}</span>个视频/套图</td>
 	         </tr>";
    $biaoqing = $tietu = '';;
    for($i=0;$i<=49;$i++){
        $url = TU.'/img1/'.$i.'.png';
        $biaoqing.= "<li><img src='{$url}'/></li>";
    }
    for($i=0;$i<=29;$i++){
        $url = TU.'/img2/a'.$i.'.png';
        $tietu.= "<li><img src='{$url}'/></li>";
    }
    echo json_encode(array(
        'state'=>1,
        'avatar'=>$user[0]['avatar'],
        'username'=>$user[0]['nickname'],
        'user_follow'=>functions::hot($user[0]['flonum']),
        'user_descs'=>$user[0]['descs'] ? functions::cut2s($user[0]['descs'],10) : '用户很懒,什么也没有写~',
        'guanzhu'=>$guanzhu,
        'title'=>$post[0]['title'],
        'time'=>date('Y-m-d',$post[0]['ftime']),
        'look'=>functions::hot($post[0]['hot']),
        'like'=>functions::hot($post[0]['likes']),
        'topic'=>$topic,
        'html'=>$html,
        'liked'=>$liked,
        'table1'=>$table1,
        'table2'=>$table2,
        'godown'=>functions::autocode($id.'-'.$me),
        'biaoqing'=>$biaoqing,
        'tietu'=>$tietu,
        'tel'=>$post[0]['userid']
    ));
?>