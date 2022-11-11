<?php

    
    require "config.inc.php";
    require "system/runtime.php";
    //$ip = functions::get_real_ip();
    $mod = CW('get/mod',2);
    if(!$mod){ $mod = 'index';}
    file::import('system-model-appajax-'.$mod);
    

    // require "config.inc.php";
    // require "system/runtime.php";
    // $db = functions::db();
    // $geturl = $db->query('sets','geturl','id=1','',1);
    // $geturl = $geturl[0]['geturl'];
    // $param = http_build_query($_REQUEST);
    // $url = $geturl.'/ajax.php?mod='.$mod.'&'.$param;
    // $ch = curl_init();
    // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    // curl_setopt($ch, CURLOPT_URL, $url);
    // curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // curl_setopt($ch, CURLOPT_HEADER, 0);
    // $data = curl_exec($ch);
    // curl_close($ch);
    // echo $data;
?>