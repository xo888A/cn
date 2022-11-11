<?php

	require "config.inc.php";
    require "system/runtime.php";
    

   
    $card = CW('get/card');
    if($card){
        functions::set_cookie('card',$card);
    }
    $mod = CW('get/mod',2);
    if(!$mod){ $mod = 'index';}
    file::import('system-model-'.$mod);
?>