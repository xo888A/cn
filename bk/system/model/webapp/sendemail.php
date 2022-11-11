<?php 
    if(!defined('CW')){exit('Access Denied');}
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require ROOT_URL.'/email/Exception.php';
    require ROOT_URL.'/email/PHPMailer.php';
    require ROOT_URL.'/email/SMTP.php';
    
    
    $email = CW('post/email');
    $reg = '#^\w{3,50}@\w{1,64}\.\w{2,5}$#';
    
    if(!preg_match($reg,$email)){
        echo json_encode(array(
            'err'=>'邮箱格式错误!'
        ));return;
    }
    $code = mt_rand(100000,999999);
    
    $mail = new PHPMailer(true);
    $db = functions::db();
    $smtp = $db->query('sets','smtp1,smtp2,smtp3,smtp4,smtp5','id=1','',1);$smtp = $smtp[0];
    try {
        $mail->CharSet ="UTF-8";                     //设定邮件编码
        $mail->SMTPDebug = 0;                        // 调试模式输出
        $mail->isSMTP();                             // 使用SMTP
        $mail->Host = $smtp['smtp1'];                // SMTP服务器
        $mail->SMTPAuth = true;                      // 允许 SMTP 认证
        $mail->Username = $smtp['smtp2'];                // SMTP 用户名  即邮箱的用户名
        $mail->Password = $smtp['smtp3'];             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
        //$mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
        $mail->Port = intval($smtp['smtp4']);                            // 服务器端口 25 或者465 具体要看邮箱服务器支持
    
        $mail->setFrom($smtp['smtp5'], '萌堆');  //发件人
        $mail->addAddress($email, '');  // 收件人
        //$mail->addAddress('ellen@example.com');  // 可添加多个收件人
        //$mail->addReplyTo('xxxx@163.com', 'info'); //回复的时候回复给哪个邮箱 建议和发件人一致
        //$mail->addCC('cc@example.com');                    //抄送
        //$mail->addBCC('bcc@example.com');                    //密送
    
        //发送附件
        // $mail->addAttachment('../xy.zip');         // 添加附件
        // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名
    
        //Content
        $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
        $mail->Subject = '验证码';
        $mail->Body    = '你好,本次验证码为:'.$code;
        $mail->AltBody = '你好,本次验证码为:'.$code;
    
        $mail->send();
       
        echo json_encode(array(
            'data'=>'发送成功,请去邮件查看验证码!',
            'do'=>'receive'
        ));
    } catch (Exception $e) {
        echo json_encode(array(
            'err'=>$mail->ErrorInfo
        ));
    }
  
    
?>