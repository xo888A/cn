<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $id = CW('post/id');
    $id = functions::autocode($id,'-');
    $tid = substr($id,0,strrpos($id,'-'));
    $user = $tel = substr($id,strripos($id,'-')+1);
    $post = $db->query('post','',"id='{$id}'",'',1);
    $tu = TU;
    if(!$user){
        // $html = "<div class='rel h100'>
        //                 <img class='w100 h100' src='{$post[0]['videocover']}' />
        //                 <div class='mask'></div>
        //                 <div class='abs'>
        //                     <img style='width:50px' src='{$tu}/nodata.png' />
        //                     <p class='tit'>请先登录!</p>
        //                 </div>
        //             </div>";
        echo json_encode(array(
            'err'=>'请先登录',
            //'do'=>'download'
        ));return;
    }
    $curuser = $db->query('users','',"tel='{$tel}'",'',1);
    $isbuy = $db->query('sellvideo','',"tel='{$user}' and vidid='{$tid}'");
    $isvip = $curuser[0]['viptime']>time() ? 'isvip' : 'notvip';
    $diam = $post[0]['diamond'];
 	$vipdiam = $post[0]['vipdiam'];
    if($isbuy || (!$vipdiam && $isvip=='isvip') || (!$vipdiam && !$diam)){
 	    
 	}else{
 	    echo json_encode(array(
            'err'=>'权限不足,请购买再下载!',
            //'do'=>'download'
        ));return;
 	}
    
    
    
    $set = $db->query('sets','jiaocheng,downlv1,downlv2,downlv3,downlv4,downlv5,downlv6','id=1','',1);
    $jiaocheng = $set[0]['jiaocheng'];
    $lv1 = $set[0]['downlv1'];
 	$lv2 = $set[0]['downlv2'];
 	$lv3 = $set[0]['downlv3'];
 	$lv4 = $set[0]['downlv4'];
 	$lv5 = $set[0]['downlv5'];
 	$lv6 = $set[0]['downlv6'];
    $user = $db->query('users','',"tel='{$user}'",'',1);
    $downloadtime = $user[0]['downloadtime'];
    $downloadnum = $user[0]['downloadnum'];
    if(date('Ymd',time())!=date('Ymd',$downloadtime)){
 	    $db->exec('users','u',array(array(
 	        'downloadnum'=>0,
 	        'downloadtime'=>time()
 	    ),array(
 	        'tel'=>$tel
 	    )));
 	    $downloadnum = $db->query('users','downloadnum',"tel='{$tel}'",'',1);
 	    $downloadnum = $downloadnum[0]['downloadnum'];
 	}
 	$user_level = $user[0]['mylevel'];
 	$user_level = intval($user_level);
 	$stop = false;
 	if($user_level==1){
 	    if($downloadnum>=$lv1){
 	        $stop = true;
 	    }
 	    $downloadnums = $lv1;
 	}elseif($user_level==2){
 	    if($downloadnum>=$lv2){
 	        $stop = true;
 	    }$downloadnums = $lv2;
 	}elseif($user_level==3){
 	    if($downloadnum>=$lv3){
 	        $stop = true;
 	    }$downloadnums = $lv3;
 	}elseif($user_level==4){
 	    if($downloadnum>$lv4){
 	        $stop = true;
 	    }$downloadnums = $lv4;
 	}elseif($user_level==5){
 	    if($downloadnum>=$lv5){
 	        $stop = true;
 	    }$downloadnums = $lv5;
 	}elseif($user_level==6){
 	    if($downloadnum>=$lv6){
 	        $stop = true;
 	    }$downloadnums = $lv6;
 	}
 	$index = INDEX;
 	$filesize = $post[0]['filesize'] ? $post[0]['filesize'] : '0M';
 	//我的等级$user_level
 	//数据等级 $post[0]['downlevel']
 	$exist = false;
    if(strstr($post[0]['downlevel'],"{$user_level}")){
        $exist = true;
    }
    $foreachs = explode(',',rtrim($post[0]['downlevel'],','));
    foreach ($foreachs as $foreach){
        //if($foreach=='0'){continue;}
        $addlevel .= 'LV'.$foreach.',';
    }
 	if($stop){
 	    $html = "<div class='fix downloadzip'>
                <div class='w rel'>
                    <img src='{$tu}/close.png' class='closezip abs' />
                    <div class='padding'>
                        <p class='t'>附件下载信息</p>
                        <img src='{$tu}/zip.png' />
                        <div class='r abs'>
                            <p>文件大小:<span>{$filesize}</span></p>
                            <p class='m'>文件格式:<span>ZIP压缩包</span></p>
                            <p class='color'><a href='{$jiaocheng}' target='_blank'>手机下载解压教程?</a></p>
                        </div>
                        <p style='margin-top:10px'>今日下载配额已用完,请24小时后再来</p>
                        <p style='margin-top:5px'>我的等级<img class='dlelvl' src='{$tu}/{$user[0]['mylevel']}.png'> 每日配额: {$downloadnums}个</p>
                        <a href='{$index}/index.php?mod=vip' class='d' >升级VIP等级</a>
                        <a href='javascript:;' class='c openinstros' >下载配额说明</a>
                    </div>
                </div>
            </div>";
 	}elseif(!$stop && !$exist){
 	    $html = "<div class='fix downloadzip'>
                <div class='w rel'>
                    <img src='{$tu}/close.png' class='closezip abs' />
                    <div class='padding'>
                        <p class='t'>附件下载信息</p>
                        <img src='{$tu}/zip.png' />
                        <div class='r abs'>
                            <p>文件大小:<span>{$filesize}</span></p>
                            <p class='m'>文件格式:<span>ZIP压缩包</span></p>
                            <p class='color'><a href='{$jiaocheng}' target='_blank'>手机下载解压教程?</a></p>
                        </div>
                        <p style='margin-top:10px;line-height: 25px;'>抱歉,本视频由于版权限制,仅限<span style='color:#FF7AA5'>{$addlevel}</span>等级会员下载</p>
                        <p style='margin-top:5px'>我的等级<img class='dlelvl' src='{$tu}/{$user[0]['mylevel']}.png'></p>
                        <a href='{$index}/index.php?mod=vip' class='d' >升级VIP等级</a>
                    </div>
                </div>
            </div>";
 	}else{
 	    $downloadnum++;
 	    $downloadurl = $post[0]['downloadurl'];
 	    $db->exec('users','u',"downloadnum='{$downloadnum}',tel='{$tel}'");
 	    $html = "<div class='fix downloadzip'>
                <div class='w rel'>
                    <img src='{$tu}/close.png' class='closezip abs' />
                    <div class='padding'>
                        <p class='t'>附件下载信息</p>
                        <img src='{$tu}/zip.png' />
                        <div class='r abs'>
                            <p>文件大小:<span>{$filesize}</span></p>
                            <p class='m'>文件格式:<span>ZIP压缩包</span></p>
                            <p class='color'><a href='{$jiaocheng}' target='_blank'>手机下载解压教程?</a></p>
                        </div>
                        <a href='{$downloadurl}' class='d' target='_blank'>开始下载</a>
                        <a href='javascript:;' class='c'>复制下载链接</a>
                    </div>
                </div>
            </div>
            <script>
            var clipboard = new Clipboard('.downloadzip .c', {
                text: function() {
                    return '{$downloadurl}';
                }
            });
            clipboard.on('success',
            function(e) {
                $('.downloadzip').hide();
                alert('下载链接复制成功');
            });
            </script>
            ";
 	}

 	echo json_encode(array(
 	    'do'=>'download',
 	    'data'=>$html
 	));
?> 