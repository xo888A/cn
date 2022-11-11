<?php 
if(!defined('CW')){exit('Access Denied');}
$db = functions::db();
$seo = $db->query('seo','','id=1');
if(!$seo){
    $db->exec('seo','i',array(
        'seo1'=>'网站首页',
        'seo2'=>'站长推荐',
        'seo3'=>'话题板块',
        'seo4'=>'话题列表',
        'seo5'=>'萌主列表',
        'seo6'=>'全部视频',
        'seo7'=>'社区',
        'seo8'=>'排行榜',
        'seo9'=>'下载APP',
        'seo10'=>'视频内容标题',
        'seo11'=>'社区内容标题',
        'seo12'=>'单页内容标题',
        'seo13'=>'精选萌主',
        'seo14'=>'专题归档',
        'seo15'=>'选择玩法',
        'seo16'=>'会员中心',
        'seo17'=>'账号设置',
    ));
    $seo = $db->query('seo','','id=1');
}

$tpl =  new Society();
$tpl->assign('seo1',$seo[0]['seo1']);
$tpl->assign('seo2',$seo[0]['seo2']);
$tpl->assign('seo3',$seo[0]['seo3']);
$tpl->assign('seo4',$seo[0]['seo4']);
$tpl->assign('seo5',$seo[0]['seo5']);
$tpl->assign('seo6',$seo[0]['seo6']);
$tpl->assign('seo7',$seo[0]['seo7']);
$tpl->assign('seo8',$seo[0]['seo8']);
$tpl->assign('seo9',$seo[0]['seo9']);
$tpl->assign('seo10',$seo[0]['seo10']);
$tpl->assign('seo11',$seo[0]['seo11']);
$tpl->assign('seo12',$seo[0]['seo12']);
$tpl->assign('seo13',$seo[0]['seo13']);
$tpl->assign('seo14',$seo[0]['seo14']);
$tpl->assign('seo15',$seo[0]['seo15']);
$tpl->assign('seo16',$seo[0]['seo16']);
$tpl->assign('seo17',$seo[0]['seo17']);
$tpl->compile('seo','admin'); 
?>