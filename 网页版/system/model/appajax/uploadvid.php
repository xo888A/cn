<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $tel = CW('post/tel');
    $vidtype = CW('post/vidtype');
    $isshenhe = $db->query('post','',"userid='{$tel}' and ishow=2");
    if($isshenhe){
        echo  json_encode(array(
            'state' => 2,
    	    'err'=>"Bạn có video chưa được xem xét, vui lòng đợi quá trình xem xét hoàn tất trước khi tiếp tục phát hành! "
    	));return;
    }
    $user = $db->query('users','id,freeze',"tel='{$tel}'",'',1);
    if(!$user[0]['id']){
        echo json_encode(array(
            'state' => 2,
            'err'=>'Người dùng hiện tại không bình thường, không được phép tải lên'
        ));return;
    }
    if($user[0]['freeze']){
        echo json_encode(array(
            'state' => 2,
            'err'=>'Tài khoản đã bị đóng băng, không được phép tải lên'
        ));return;
    }
    $textarea = CW('post/textarea');
    if(strlen($textarea)>255){
        echo json_encode(array(
            'state' => 2,
            'err'=>'Số kí tự trong tiêu đề vượt quá giới hạn'
        ));return;
    }
    $topiclist = CW('post/topiclist');
    
    $videourl = CW('file/videourl');
    $videocover = CW('file/videocover');
    
    $videocover_error = $videocover['error'];
    $videourl_error = $videourl['error'];
    if ($videocover_error > 0){
        if($videocover_error==1){
            $err = 'Tệp tải lên vượt quá giới hạn tối đa của máy chủ';
        }elseif ($videocover_error==2) {
            $err = 'Kích thước tệp tải lên vượt quá giới hạn giao diện người dùng';
        }elseif ($videocover_error==3) {
            $err = 'Tải lên không hoàn tất';
        }elseif ($videocover_error==4) {
            $err = 'Không có tệp nào được tải lên';
        }elseif ($videocover_error==6) {
            $err = 'Không tìm thấy thư mục tạm thời';
        }elseif ($videocover_error==7) {
            $err = 'Không thể ghi tệp';
        }
        echo json_encode(array(
            'state' => 2,
            'err'=>$err
        ));return;
    }
    if ($videourl_error > 0){
        if($videourl_error==1){
            $err = 'Tệp tải lên vượt quá giới hạn tối đa của máy chủ';
        }elseif ($videourl_error==2) {
            $err = 'Kích thước tệp tải lên vượt quá giới hạn giao diện người dùng';
        }elseif ($videourl_error==3) {
            $err = 'Tải lên không hoàn tất';
        }elseif ($videourl_error==4) {
            $err = 'Không có tệp nào được tải lên';
        }elseif ($videourl_error==6) {
            $err = 'Không tìm thấy thư mục tạm thời';
        }elseif ($videourl_error==7) {
            $err = 'Không thể ghi tệp';
        }
        echo json_encode(array(
            'state' => 2,
            'err'=>$err
        ));return;
    }

    $videocover_type = $videocover['type'];
    $videocover_size = $videocover["size"];
    $videocover_name = $videocover['name'];
    $videocover_tmpname = $videocover['tmp_name'];
    
    $videourl_type = $videourl['type'];
    $videourl_size = $videourl["size"];
    $videourl_name = $videourl['name'];
    $videourl_tmpname = $videourl['tmp_name'];
    
    $imgname_upload_success = false;
    
    if(!file_exists(VIDEO)){
        file::mk_dir(VIDEO);
    }
    $imgname = '';
    if(($videourl_type=='video/mp4' || $videourl_type=='video/quicktime' ) && ($videourl_size < VIDEOSIZE*1024*1024) && $videourl_size>0){
        if($videocover_size){
          if(($videocover_type=='image/jpeg' || $videocover_type=='image/png' || $videocover_type=='image/gif' || $videocover_type==='image/pjpeg') && ($videocover_size < COVERSIZE*1024*1024) && $videocover_size>0){
              $imgname = md5(uniqid()).strstr($videocover_name,'.');
              $imgurl = VIDEO.$imgname;
              if(move_uploaded_file($videocover_tmpname, $imgurl)){
                  $imgname_upload_success = true;
              }
          }
        }
        $videoname = md5(uniqid()).strstr($videourl_name,'.');
        $videourl = VIDEO.$videoname;
        if(move_uploaded_file($videourl_tmpname, $videourl)){
            
            if($vidtype=='Video dài'){
                $videocover = VIDEOURL.$imgname;
                $videourl = VIDEOURL.$videoname;
                $shortvidcover = $shortvidurl = '';
            }else if($vidtype=='Video ngắn'){
                $shortvidcover = VIDEOURL.$imgname;
                $shortvidurl = VIDEOURL.$videoname;
                $videocover = $videourl = '';
            }
            
            
            $array = array(
                'userid'=>$tel,
            	'title'=>$textarea,
            	'videocover'=>$videocover,
            	'videourl'=>$videourl,
            	'shortvidurl'=>$shortvidurl,
            	'shortvidcover'=>$shortvidcover,
            	'diamond'=>0,
            	'vipdiam'=>0,
            	'hot'=>0,
            	'likes'=>0,
            	'topic'=>$topiclist,
            	'istuijian'=>0,
            	'flag'=>'',
                'ftime'=>time(),
                'filesize'=>'',
                'addparam'=>'',
                'downloadurl'=>'',
            	'ishow'=>2
            );
            
            //file::debug(json_encode($array));
            $res = $db->exec('post','i',$array);
            if($res){
                echo json_encode(array(
                    'state'=>1
                ));
            }else{
                echo json_encode(array(
                    'state'=>2,
                    'err'=>'Kho dữ liệu bất thường, tải lên thất bại!!!'
                ));
            }
        }else{
          echo json_encode(array(
              'state' => 2,
              'err'=>'Tệp video tải lên thất bại!'
          ));
        }    
    }else{
        echo json_encode(array(
          'state' =>2,
          'err'=>'Sai loại tệp video hoặc kích thước không đáp ứng yêu cầu!'
        ));
    }
    
?>


