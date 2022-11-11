<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tel = getuser();
    $db = functions::db();
    $user = $db->query('users','',"tel='{$tel}'",'',1);
    $tpl =  new Society();
    functions::getavatar($tpl);
    $tpl->assign('money',$user[0]['money']);
    $tpl->assign('diam',$user[0]['diam']);
    $withdrawalses = $db->query('withdrawals','',"tel='{$tel}'");
    $w = '';
    foreach ($withdrawalses as $withdrawals){
        if($withdrawals['state']==0){
            $state = '申请中';
        }else if($withdrawals['state']==1){
            $state = '已打款';
        }
        $time = date('Y-m-d H:i:s',$withdrawals['ftime']);
        $w .= "<li>{$time} 提现 {$withdrawals['money']}元 【{$state}】<li>";   
    }
    $tpl->assign('w',$w);
    if(isphone()){
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
?>