<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    
    $adv1 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&position=首页-轮播图&isswiper=1&level='.getlevel());

    
    $set = $db->query('sets','tja','id=1');
    $tuijiantopic = explode(',',$set[0]['tja']);
    $tuijian = '';
    $a = TU.'/a.png';
    $b = TU.'/b.png';
    $c = TU.'/c.png';
    $isphone = functions::is_mobile();
    foreach ($tuijiantopic as $val){
        $topicid = $db->query('topic','id',"name='{$val}'",'',1);$topicid =  $topicid[0]['id'];
        if(!$topicid){continue;}
        if($isphone){
            $css = 'mt15  wrap';
            $data = functions::get_contents(INDEX.'/webajax.php?mod=gettiezi&topic='.$topicid.'&order=id&num=10&orderby=hot');
        }else{
            $data = functions::get_contents(INDEX.'/webajax.php?mod=gettiezi&topic='.$topicid.'&order=id&num=10&orderby=hot');$css='';
        }
        $img = IMG;
        $url = INDEX.'/index.php?mod=topiclist&id='.$topicid;
        $tuijian .= "<section class='public {$css}'><p class='tit'>{$val}<span class='fr mores'><a href='{$url}'>更多<img src='{$img}/rrr.png' /></a></span></p><ul class='overflow width1'>{$data}</ul></section>";
        if($isphone){$tuijian=$tuijian."<p class='line'></p>";}
    }
    $tpl =  new Society();
    
    $tpl->assign('adv1',$adv1);
    
    
 
    $tpl->assign('tuijian',$tuijian);
    if(functions::is_mobile()){
       
        $adv2 = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&position=首页-右侧6广告&num=6&level='.getlevel());
        $adv3 = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&position=首页-右侧4广告&num=4&part=add&level='.getlevel());
        $tpl->assign('adv2',$adv2);
        $tpl->assign('adv3',$adv3);
        //$data1 = functions::get_contents(INDEX.'/webajax.php?mod=getphonetiezi&order=rand&num=10');
        $data2 = functions::get_contents(INDEX.'/webajax.php?mod=getphonetiezi&order=hot&num=10&orderby=hot');
        $tpl->assign('data1',functions::data('index','h5'));
        $tpl->assign('data2',$data2);
        
        
        
        $where = " and find_in_set(0,level)";
        if(STARTADV){
            $level = getlevel();
            if($level){
                //$where = " and level like '%{$level}%'";
                $where1 = " and find_in_set($level,level)";
            }
        }    
     	$adv4 = '';
        $advs = $db->query('adv','',"position='首页移动-文字广告'".$where1,'');
        foreach ($advs as $adv){
            
            //////////////////////////
                $url = $adv['content1'];
                $url1 = substr($url,0,strrpos($url,'_'));
                $at = substr($url,strrpos($url,'_')+1);
                if($at=='@@'){
                    $add = "target='_blank'";
                }else{
                    $add = '';
                }
                //////////////////////////
            
            
             $adv4 .= "<li>
                                <a href='{$url1}' $add>{$adv['remarks']}</a>
                            </li>";
        }
        
        
        
        
        //$adv4 = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&position=首页移动-文字广告&iswenzi=true&level='.getlevel());
        $tpl->assign('adv4',$adv4);
        $username = functions::autocode(CW('cookie/__username'),'-');
        $index = INDEX;
        $i = IMG;
        if(!$username){
            $newadd = "<div class='newadddata overflow wrap'>
        <div class='div1'>
                        <a href='{$index}/index.php?mod=reg'>
                        <p class='p1'>原创社区</p>
                        <p class='p2'>平台耗资百万签约原创达人</p>
                        <img src='{$i}/md1.png' />
                        </a>
                    </div>
                    <div class='div2'>
                        <a href='{$index}/index.php?mod=reg'>
                        <p class='p1'>匠心打造</p>
                        <p class='p2'>手机电脑APP三端在线观看</p>
                        <img src='{$i}/md2.png' />
                        </a>
                    </div>
                    <div class='div3'>
                        <a href='{$index}/index.php?mod=reg'>
                        <p class='p1'>模特云集</p>
                        <p class='p2'>百位福利姬入驻原创更新中</p>
                        <img src='{$i}/md3.png' />
                        </a>
                    </div>
                    <div class='div4'>
                        <a href='{$index}/index.php?mod=reg'>
                        <p class='p1'>VIP特权</p>
                        <p class='p2'>赞助VIP全网视频图片无限看</p>
                        <img src='{$i}/md4.png' />
                        </a>
                    </div>
    </div>";
        }
          
        $tpl->assign('newadd',$newadd);
        
        $tpl->compile(basename(__FILE__,'.php'),'wap');
    }else{
        $adv2 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&position=首页-右侧6广告&num=6&level='.getlevel());
        $adv3 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&position=首页-右侧4广告&num=4&part=add&level='.getlevel());
        
        $tpl->assign('adv3',$adv3);
        //$data1 = functions::get_contents(INDEX.'/webajax.php?mod=gettiezi&order=rand&num=10');
        $data2 = functions::get_contents(INDEX.'/webajax.php?mod=gettiezi&order=hot&num=10&orderby=hot');
        $tpl->assign('data1',functions::data('index','pc'));
        $tpl->assign('data2',$data2);
        $index = INDEX;
        $i = IMG;
        $username = functions::autocode(CW('cookie/__username'),'-');
        if(!$username){
            $adv2 = "<div  class='newadddata w100 h100 overflow'>
                    <div class='div1 fl'>
                        <a href='{$index}/index.php?mod=reg'>
                        <p class='p1'>原创社区</p>
                        <p class='p2'>平台耗资百万签约原创达人</p>
                        <img src='{$i}/pcmd1.png' />
                        </a>
                    </div>
                    <div class='div2 fr'>
                        <a href='{$index}/index.php?mod=reg'>
                        <p class='p1'>匠心打造</p>
                        <p class='p2'>电脑/网页/APP三端在线观看</p>
                        <img src='{$i}/pcmd2.png' />
                        </a>
                    </div>
                    <div class='div3 fl'>
                        <a href='{$index}/index.php?mod=reg'>
                        <p class='p1'>模特云集</p>
                        <p class='p2'>百位福利姬入驻原创更新中</p>
                        <img src='{$i}/pcmd3.png' />
                        </a>
                    </div>
                    <div class='div4 fr'>
                        <a href='{$index}/index.php?mod=reg'>
                        <p class='p1'>VIP特权</p>
                        <p class='p2'>赞助VIP全网视频图片无限看</p>
                        <img src='{$i}/pcmd4.png' />
                        </a>
                    </div>
                </div>";
        }
        $tpl->assign('adv2',$adv2);
        
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
    
?>