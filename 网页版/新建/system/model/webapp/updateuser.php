<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $id = CW('post/id');
    $db = functions::db();
	if(!$id){
		msg('ID不存在,请返回列表重新操作','刷新','','',true);
	}
    $nickname = CW('post/nickname');
    if(strlen($nickname)>30 || strlen($nickname)<3){
    	//msg('昵称要求最多10个汉字','刷新','','',true);
    }
    $tel = CW('post/tel');
    // if(strlen($tel)!=11){
    // 	msg('电话号码必须为11位','刷新','','',true);
    // }
    
    $days = CW('post/days');
    if($days>7 || $days<0){
    	msg('签到天数范围为1-7','刷新','','',true);
    }
    $card = CW('post/card');
    $diam = CW('post/diam');
    $money = CW('post/money');
    $viptime = CW('post/viptime');
    $sex = CW('post/sex');
    $withdrawalspass = CW('post/withdrawalspass');
    $lockpass = CW('post/lockpass');
    $desc = CW('post/descs');
    $freeze = CW('post/freeze');
    $strtime = strtotime($viptime);
    $mylevel = intval(CW('post/mylevel'));
    if($mylevel>7){
        msg('星标设置错误!','刷新','javascript:location.reload()','notice',true);
    }
    if($strtime>time()){
        $level = 1;
    }else{
        $level = 0;
    }
    if($mylevel){
        $level = $mylevel;
    }
    if($level>0 && $strtime<time()){
        msg('设置星标后, VIP时间必须大于当前时间!','刷新','javascript:location.reload()','notice',true);
    }
    
    $update = array(
    	'nickname'=>$nickname,
    	'tel'=>$tel,
    	'card'=>$card,
    	'diam'=>$diam ? intval($diam) : 0,
    	'money'=>$money ? intval($money) : 0,
    	'viptime'=>$viptime ? strtotime($viptime) : 0,
    	'sex'=>$sex,
    	'mylevel'=>$level,
    	'withdrawalspass'=>$withdrawalspass ? $withdrawalspass : '',
    	'lockpass'=>$lockpass ? $lockpass : '',
    	'days'=>$days,
    	'addparam'=>CW('post/addparam'),
    	'miaoshu'=>CW('post/miaoshu'),
    	'descs'=>$desc,
    	'man'=>CW('post/man'),
    	'kouliang'=>CW('post/kouliang'),
    	'freeze'=>$freeze=='冻结' ? '1' : '0',
    	'password'=>functions::autocode(CW('post/password')),
    	'cover'=>CW('post/cover'),
    	'avatar'=>CW('post/avatar'),
    	'email'=>CW('post/email'),
    	'flonum'=>intval(CW('post/flonum'))
    );

    $res = $db->exec('users','u',array($update,array(
    	'id'=>$id	
    )));
    
   
    if($res){
        msg('更新成功!','刷新','javascript:location.reload()','success',true);
    }else{
        msg('数据无变动!','重置','javascript:location.reload()','error',true);
    }
?>