<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $curuser = CW('get/tel',1);

    $count = $db->get_count('comment2',"tel2='{$curuser}'  and ishow=1");
    $page = intval(abs(CW('get/page',1)));
    $pagecount = ceil($count/PAGESIZE);
    
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
    $articles = $db->query('comment2','',"tel2='{$curuser}'  and ishow=1",'id desc',"{$page},".PAGESIZE);
    
    $data = '';
    $tu = TU;
    $img = IMG;
    foreach($articles as $article){
            $time = date('Y.m.d H:i:s',$article['ftime']);
            $u = $db->query('users','',"tel='{$article['tel1']}'",'',1);
            $avatar = $u[0]['avatar'] ? $u[0]['avatar'] : TU.'/default.jpg';
            if($article['state']=='0'){
                $a = "<span class='a1'>未读</span>";
            }else if($article['state']=='3'){
                $a = "<span class='a2'>已回复</span>";
            }else{
                $a = "<span class='a2'>已读</span>";
            }
            $addlevel1 = $u[0]['avatar'];
            $addlevel2 = IMG.'/T'.$u[0]['mylevel'].'.png';
            $addlevel3 = IMG.'/'.$u[0]['mylevel'].'.png';
            if($u[0]['viptime']<time()){
                $addlevel2 = INDEX."/image/k.png";//框
                $addlevel3 = INDEX."/image/k.png";//框
            }
            if(functions::isadmin($u[0]['tel'])){
                $addlevel2 = "{$img}/admin1.png";//框
                $addlevel3 = "{$img}/admin2.png";
            }
           
            
            $nkname = functions::getnickname($u[0]['nickname']);
            if($article['state']=='3'){
                $postid =$db->query('comments','postid',"id='{$article['commentid']}'");
                $post = $db->query('post','title,videourl,shortvidurl',"id='{$postid[0]['postid']}'");
               
                if($post[0]['videourl']){
                    //$_href = INDEX.'/index.php?mod=video&id='.$postid[0]['postid'];
                    $onclick = "openvideo(\"{$postid[0]['postid']}\",\"video\")";
                }
                else if($post[0]['shortvidurl']){
                    $onclick = "openvideo(\"{$postid[0]['postid']}\",\"shortvideo\")";
                }
                else{
                    //$_href = INDEX.'/index.php?mod=organ&id='.$postid[0]['postid'];
                    $onclick = "openvideo(\"{$postid[0]['postid']}\",\"organ\")";
                }
            }else{
                //$url = INDEX.'/index.php?mod=huifu&id='.$article['id'];
                $onclick = "openhuifu(\"{$article['id']}\")";
            }
            $comment = strip_tags($article['comment']);
            
                $data .= "<li class='overflow' onclick='{$onclick}'>
                <div class='fl  overflow'>
                    <p class='rel fl'>
                        <img class='avatar' src='{$addlevel1}'>
                        <img class='abs' src='{$addlevel2}'>
                    </p>
                    <div class='usermsg '>
                        <span class='abs gettime'>{$time} 回复了你</span>
                        <p class='overhid' style='height:25px'>{$nkname}<img class='level' src='{$addlevel3}'></p>
                        <p class='overhid read'>{$a}{$comment}</p>
                    </div>
                </div>
            </li>";

            
                    
        
    	
    }

    echo json_encode(array(
        'state'=>1,
        'data'=>$data
    ));
?>