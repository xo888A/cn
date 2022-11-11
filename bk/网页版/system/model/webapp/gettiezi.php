<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $wherekey = CW('get/wherekey');
    $whereval = CW('get/whereval');
    $isright = CW('get/isright');
    if($wherekey){
        $where = $wherekey.'='.$whereval.' and';
    }else{
        $where = '';
    }
    $tpc = CW('get/topic');
    if($tpc){
        //$where = "topic like '%{$tpl}%' and";
        $where = "find_in_set($tpc,topic) and";
    }
    $type = CW('get/type');
    if($type=='video'){
        $add = " and videocover!=''";
        $istype = 'video';
    }elseif($type=='organ'){
        $add = " and imglist!=''";
        $istype = 'organ';
    }elseif($type=='likes'){
        $curname = CW('get/user');
        $postids = $db->query('likes','postid',"tel='{$curname}'");
        $implode = '';
        foreach ($postids as $postid){
            $implode .= $postid['postid'].',';
        }
        $implode = rtrim($implode,',');
        $add = " and id in($implode)";
    }elseif($type=='history'){
        $curname = CW('get/user');
        $postids = $db->query('history','vid',"dev='{$curname}'");
        $implode = '';
        foreach ($postids as $postid){
            $implode .= $postid['vid'].',';
        }
        $implode = rtrim($implode,',');
        $add = " and id in($implode)";
    }
    $where = $where." ishow=1 and shortvidcover=''".$add;
    $order = CW('get/order');
    if($order=='rand'){
        $order = 'rand()';
    }else{
        $order = 'ftime desc';
    }
    $num = CW('get/num',1);
    $db = functions::db();
    if(CW('get/orderby')=='hot'){
        $order = 'hot desc';
    }
    $articles = $db->query('post','',$where,$order,$num);
    $data = '';$isphone = functions::is_mobile();
    
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
            $_t = 'video';
        }else if($article['imglist']!=''){
            // $pos = stripos($article['imglist'],'|');
            // $v = '';
            // if($pos){
            //     $cover = substr($article['imglist'],0,$pos);
            // }else{
            //     $cover = $article['imglist'];
            // }
            $_t = 'organ';
            $cover = $article['organcover'];
            $i = TU.'/t.png';
            $addparam = $article['addparam'] ? $article['addparam'] : 0;
            $tag = "<img src='{$i}'>{$addparam}";
            $href = INDEX.'/index.php?mod=organ&id='.$article['id'];
        }
        $tips = functions::getnewtips($article['vipdiam'],$article['diamond']);
        if($isright){
            $hot = functions::hot($article['hot']);
            $like = functions::hot($article['likes']);
            $usr = $db->query('users','',"tel='{$article['userid']}'");
            $nickname =$usr[0]['nickname'] ? $usr[0]['nickname'] : '未知用户';
            $tu = TU;
            $url = INDEX."/index.php?mod={$istype}&id=".$article['id'];
            $hrefs = INDEX.'/index.php?mod=author&id='.functions::autocode($article['userid']);
            if($article['shortvidcover']!=''){
                    $_t = 'shortvideo';
            }
            if($_t=='video'){
                $iii = "og2(\"{$article['id']}\")";
            }else if($_t=='organ'){
                 $iii = "og(\"{$article['id']}\")";
            }
            if(CW('get/devs')){//openvideo(\"{$article['id']}\",\"$_t\")
                $data .= "<li >
                        <a class='d4' href='javascript:;' onclick='{$iii}'><img src='{$cover}' class='fl'></a>
                        <div class='fr rel'>
                            <p class='d1'>{$title}</p>
                            <p class='ts'><img src='{$tu}/b.png' class='b'>{$hot}<img class='c' src='{$tu}/c.png'>{$like}</p>
                            <a href='javascript:;' onclick='openuserindex(\"{$article['userid']}\")'><img src='{$tu}/up.png' class='b rimg'><span>{$nickname}</span></a>
                        </div>
                    </li>";
            }else{
                $data .= "<li>
                        <a class='d4' href='{$url}' ><img src='{$cover}' class='fl'></a>
                        <div class='fr rel'>
                            <p class='d1'>{$title}</p>
                            <p class='ts'><img src='{$tu}/b.png' class='b'>{$hot}<img class='c' src='{$tu}/c.png'>{$like}</p>
                            <a href='{$hrefs}'><img src='{$tu}/up.png' class='b rimg'><span>{$nickname}</span></a>
                        </div>
                    </li>";
            }
            
        }else{
            // if($isphone){
            //     $data = ''; 
            // }else{
                if(CW('get/dev')){
                    if($article['shortvidcover']!=''){
                        $_t = 'shortvideo';
                    }
                     $data .= "<li>
                    <div class='rel'>
                        <a href='javascript:;' onclick='openvideo(\"{$article['id']}\",\"{$_t}\")'><img class='cover' src='{$cover}' />
                        {$tips}
                        <p class='tag2 abs'>{$tag}</p>
                        {$v}</a>
                    </div>
                    <p class='overhid t'>{$title}</p>
                    <p class='ts'><img src='{$b}' class='b' />{$hot}<img class='c' src='{$c}' />{$likes}</p>
                </li>";
                }else{
                    $data .= "<li>
                    <div class='rel'>
                        <a href='{$href}'><img class='cover' src='{$cover}' />
                        {$tips}
                        <p class='tag2 abs'>{$tag}</p>
                        {$v}</a>
                    </div>
                    <p class='overhid t'>{$title}</p>
                    <p class='ts'><img src='{$b}' class='b' />{$hot}<img class='c' src='{$c}' />{$likes}</p>
                </li>";
                }
                
            //}
            
        }
    	
    }
    echo $data;
?>