<?php
	require "config.inc.php";
    require "system/runtime.php";
    $mod = CW('get/mod',2);



    if(!$mod){
        functions::url(INDEX);
    }

    if($mod!='login'){
        logincheck();
    }
    
    file::import('system-model-admin-'.$mod);
?>