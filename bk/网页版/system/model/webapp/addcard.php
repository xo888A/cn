<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $cardtype = CW('post/cardtype',1);
    $cardnum = intval(CW('post/cardnum'));
    $num = intval(CW('post/num'));
    
    $mylevel = intval(CW('post/mylevel'));
    $jinbinum = intval(CW('post/jinbinum'));
    
    $count = $db->get_count('card');
    if($count>10000){
        msg('卡库最多存储10000张(含已使用),请先删除部分兑换卡','刷新','','',true);
    }
    if($cardnum<1){
        msg('钻石数或者VIP天数必须为大于0的整数','刷新','','',true);
    }
    if($num>5000 || $num<1){
    	msg('兑换卡的数目范围是1-5000','刷新','','',true);
    }
    if(intval($cardtype)==2){
        $mylevel = intval(CW('post/mylevel'));
        $jinbinum = intval(CW('post/jinbinum'));
        if($mylevel>6 || $mylevel<1){
            msg('等级范围1-6','刷新','','',true);
        }
    }else{
        $mylevel = $jinbinum = 0;
    }
    
    for($i=0;$i<$num;$i++){
        $db->exec('card','i',array(
        	'cardtype'=>$cardtype,
        	'cardnum'=>$cardnum,
        	'mylevel'=>$mylevel,
        	'jinbinum'=>$jinbinum,
        	'card'=>md5(uniqid(microtime(true),true))
        ));
    }
    
   msg('兑换卡生成完毕!','刷新','javascript:location.reload()','success',true);
?>