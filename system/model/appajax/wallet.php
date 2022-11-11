<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tel = CW('post/tel');
    $db = functions::db();
    $user = $db->query('users','',"tel='{$tel}'",'',1);
    
    
    $withdrawalses = $db->query('withdrawals','',"tel='{$tel}'");
    $w = '';
    foreach ($withdrawalses as $withdrawals){
        if($withdrawals['state']==0){
            $state = '申请中';
        }else if($withdrawals['state']==1){
            $state = '已打款';
        }
        $time = date('Y-m-d H:i:s',$withdrawals['ftime']);
        $w .= "<li>{$time} 提现 {$withdrawals['money']}VND 【{$state}】<li>";   
    }
    
    
    echo json_encode(array(
        'state'=>1,
        'diam'=>$user[0]['diam'] ? $user[0]['diam'] : 0,
        'money'=>$user[0]['money'] ? $user[0]['money'] : 0,
        'part2'=>$w
    ));
?>