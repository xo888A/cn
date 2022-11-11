<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $descs = CW('post/descs');
    $us = getuser();
    $img = CW('post/simg');
    $file = CW("file/file");
    
    
    
    
    if(!file_exists(VIDEO)){
        file::mk_dir(VIDEO);
    }

    if(($file['type']=='image/jpeg' || $file['type']=='image/png'  || $file['type']=='image/pjpeg' || $file['type']=='video/mp4') && ($file["size"] < 2*1024*1024) && $file["size"]>0){
        $filename = md5(uniqid()).strstr($file['name'],'.');
  
        if(move_uploaded_file($file['tmp_name'], VIDEO.$filename)) {   
            
            // $res = $db->exec('users','u',array(array(
            //     'avatar'=>VIDEOURL.$filename,
            //     //'descs'=>$descs
            // ),array(
            //     'tel'=>$us
            // )));
            $_img = VIDEOURL.$filename;
            $res = $db->query("update users set avatar='{$_img}' where tel='{$us}'");
            
            echo json_encode(array(
                    'data'=>'更新成功',
                    'do'=>'reload'
                ));
            
            
        } else {
            echo json_encode(array(
                    'err'=>'上传失败'
            ));
        }
    }else{
        echo json_encode(array(
                    'err'=>'文件格式错误或者文件大小不符合要求'
            ));
       
    }
    


    
?>