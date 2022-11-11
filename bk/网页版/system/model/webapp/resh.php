<?php 
    if(!defined('CW')){exit('Access Denied');}
    $type = CW('get/type',2);
    if($type=='video'){
        $data = functions::get_contents(INDEX.'/webajax.php?mod=gettiezi&order=rand&num=8&type=video');
    }elseif ($type=='organ') {
        $data = functions::get_contents(INDEX.'/webajax.php?mod=gettiezi&order=rand&num=8&type=organ');
    }elseif ($type=='all') {
        $data = functions::get_contents(INDEX.'/webajax.php?mod=gettiezi&order=rand&num=10');
    }elseif($type=='phone'){
        $t = CW('get/t');
        $data = functions::get_contents(INDEX.'/webajax.php?mod=getphonetiezi&num=10&order=rand&type='.$t);
    }
    echo $data;
    
?>