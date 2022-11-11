<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $curuser = getuser();

    $count = $db->get_count('htmlcomment2',"tel2='{$curuser}'  and ishow=1");
    
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
    $articles = $db->query('htmlcomment2','',"tel2='{$curuser}'  and ishow=1",'id desc',"{$page},".PAGESIZE);
    
    $data = '';
    $tu = TU;
    $img = IMG;
    foreach($articles as $article){
       
            $time = date('Y.m.d H:i:s',$article['ftime']);
            $u = $db->query('users','',"tel='{$article['tel1']}'",'',1);
            
            if($article['tel1']=='88888'){
                
            }
            
            
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
                $postid =$db->query('htmlcomments','postid',"id='{$article['commentid']}'");
                $url = $url = INDEX.'/index.php?mod=html&id='.$postid[0]['postid'];///////////////////////////
            }else{
                $url = INDEX.'/index.php?mod=huifu&focum=true&id='.$article['id'];
            }
            
            $comment = strip_tags($article['comment']);
            if(isphone()){
                $data .= "<li class='overflow'><a href='$url'>
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
                </div></a>
            </li>";
            }else{
                $data .= "<li class='overflow'><a href='$url'>
                        <div class='fl w50 overflow'>
                            <p class='rel fl'>
                                <img class='avatar' src='{$addlevel1}' />
                                <img class='abs' src='{$addlevel2}' />
                            </p>
                            <div class='fl usermsg'>
                                <p>{$nkname}<img class='level' src='{$addlevel3}'/></p>
                                <p>{$time} 回复了你</p>
                            </div>
                        </div>
                        <div class='fr w50 read'>
                            <p class='overhid'>{$a}{$comment}</p>
                        </div></a>
                    </li>";
            }
            
                    
        
    	
    }
    $allurl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(stripos($allurl ,"&page=")){
    	$nallurl = substr($allurl,0,stripos($allurl ,"&page="));
    }else{
    	$nallurl = $allurl;
    }
    $pageurl = $nallurl.'&page=';
    $page = functions::page($count,$pagecount,$pageurl);

    $tpl =  new Society();
    $html =  "";
    $tpl->assign('data',$data ? $data : $html);
    $tpl->assign('page',$page);
    functions::getavatar($tpl);
    if(isphone()){
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
?>