<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $me = CW('gp/tel');
    $level = $db->query('users','mylevel',"tel='{$me}'",'',1);
    $level = $level[0]['mylevel'];
    //$data1 = functions::get_contents(INDEX.'/webajax.php?mod=getphonetiezi&order=rand&num=10&type=organ&dev=app&spf=1');
    $adv1 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&dev=app&position=微社区详情页-右侧2广告&pos=right&num=2&level='.$level);
    $data2 = functions::get_contents(INDEX.'/webajax.php?mod=gettiezi&order=rand&isright=1&num=15&type=organ&orderby=hot&devs=app');
    $id= CW('gp/id');
    
    $tu = TU;
    
    
    $comments = $db->query('comments','',"postid='{$id}' and ishow=1",'ftime desc');
    $cms = '';
    if($comments){
    foreach ($comments as $comment){
        
        $comments2 = $db->query('comment2','',"commentid='{$comment['id']}'  and ishow=1",'ftime desc');
        if($comments2){
            foreach ($comments2 as $comment2){
                //////////////////////////////
                $addlevel1 = $addlevel2 = $_addlevel1 ='';
                $tel1 = $db->query('users','mylevel,tel,avatar,nickname',"tel='{$comment2['tel1']}'");
                $tel2 = $db->query('users','mylevel,tel,nickname',"tel='{$comment2['tel2']}'");
                if($tel1[0]['mylevel']){
                    $tu = IMG;
                    $addlevel1 = "<img class='addlevel1' src='{$tu}/{$tel1[0]['mylevel']}.png'>";
                    $addlevel2 = "<img class='addlevel3' src='{$tu}/T{$tel1[0]['mylevel']}.png'>";
                }
                if($tel2[0]['mylevel']){
                    $_addlevel1 = "<img class='addlevel1' src='{$tu}/{$tel2[0]['mylevel']}.png'>";
                }
                $avatarurl2 = INDEX.'/index.php?mod=author&id='.functions::autocode($tel1[0]['tel']);
                $time2 = date('Y-m-d H:i:s',$comment2['ftime']);//<img src='../image/T6.png' class='level' />
                $n1 = functions::getnickname($tel1[0]['nickname']);
                $n2 = functions::getnickname($tel2[0]['nickname']);
                
                if(functions::isadmin($tel1[0]['tel'])){
                    $addlevel2 = "<img class='addlevel3' src='{$tu}/admin1.png'>";
                    $addlevel1 = "<img class='addlevel1' src='{$tu}/admin2.png'>";
                }
                if(functions::isadmin($tel2[0]['tel'])){
                    $_addlevel1 = "<img class='addlevel1' src='{$tu}/admin2.png'>";
                   
                }
               ///////////////////////
                $addcomment .= "<li>
                                    <a href='javascript:;'><img class='fl i2' src='{$tel1[0]['avatar']}' />{$addlevel2}</a>
                                    <div class='fl sh'>
                                        <p class='tt'>{$n1}{$addlevel1}<span>回复</span>{$n2}{$_addlevel1}<a href='javascript:;' class='fr hfnow' postid='{$id}' tel1='{$us}' nickname='{$tel1[0]['nickname']}' tel2='{$comment2['tel1']}' commentid='{$comment['id']}'>回复</a></p>
                                        <p class='dd'>{$comment2['comment']}</p>
                                        <p class='ii'>{$time2}</p>
                                    </div>
                                    <div class='clear'></div>
                                </li>";
            }
            $addcommentsss = "<ul class='overflow h'>".$addcomment.'</ul>';
        }else{
            $addcommentsss = '';
        }
        
        
        
        

       /////////////////////
        $time = date('Y-m-d H:i:s',$comment['ftime']);
        $comuser = $db->query('users','',"tel='{$comment['tel']}'");
        $avatarurl = INDEX.'/index.php?mod=author&id='.functions::autocode($comment['tel']);
        $nick = $comuser[0]['nickname'] ? $comuser[0]['nickname'] : '未知用户';
        $addlevel1 = $addlevel2 = '';
        if($comuser[0]['mylevel']){
            $tu = IMG;
            $addlevel1 = "<img class='addlevel1' src='{$tu}/{$comuser[0]['mylevel']}.png'>";
            $addlevel2 = "<img class='addlevel2' src='{$tu}/T{$comuser[0]['mylevel']}.png'>";
        }
        $n3 = functions::getnickname($comuser[0]['nickname']);
        if(functions::isadmin($comuser[0]['tel'])){
            $addlevel2 = "<img class='addlevel2' src='{$tu}/admin1.png'>";
            $addlevel1 = "<img class='addlevel1' src='{$tu}/admin2.png'>";
        }
        ////////////////////////
        $cms .= "<div class='overflow m'>
                        <a href='javascript:;'  class='ipblock'><img class='fl i1' src='{$comuser[0]['avatar']}' />{$addlevel2}</a>
                        <ul class='fl overflow add'>
                            <li>
                                <p class='t'>{$n3}{$addlevel1}<a href='#textarea' class='fr hfnow' postid='{$id}' tel1='{$us}' tel2='{$comment['tel']}' nickname='{$nick}' commentid='{$comment['id']}'>回复</a></p>
                                <p class='d'>{$comment['comments']}</p>
                                <p class='i'>{$time}</p>
                                {$addcommentsss}
                            </li>
                        </ul>
          
                        
                        
                        
                        
                    </div>";
    }
    }else{
        
        $cms = "<div class='center'><img class='nodata' src='{$tu}/nodata.png'><p class='center nd'>暂无评论哦~</p></div>";
    }
    
    
    $pinglun = $db->get_count('comments',"postid='{$id}' and ishow=1");
    echo json_encode(array(
        'state'=>1,
        'postid'=>$id,
        'data'=>functions::data('organ','app'),
        'adv1'=>$adv1,
        'data2'=>$data2,
        'cms'=>$cms,
        'pinglunnum'=>functions::hot($pinglun)
    ));
?>