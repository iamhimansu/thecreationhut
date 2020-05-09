<?php
if(filter_input_array(INPUT_POST)){
$name = filter_input(INPUT_POST, "username");
$email = filter_input(INPUT_POST, "email");
$message = filter_input(INPUT_POST, "message");
if (!$name==""|| !empty($name)) {if (!$email==""|| !empty($email)) {if (!$message==""|| !empty($message)) {
date_default_timezone_set('Asia/Kolkata');
require 'phpmailer/PHPMailerAutoload.php';
require 'phpmailer/creden.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = constant("EMAIL");
$mail->Password = constant("PASS");
//Set who the message is to be sent from
$mail->setFrom($email, $name);
//Set an alternative reply-to address
// $mail->addReplyTo('emailforwardertotch@gmail.com');
//Set who the message is to be sent to
$mail->addAddress('emailforwardertotch@gmail.com');
$mail->Subject = 'The Creation Hut';
$mail->Body = "<div style='width: 100%;height: auto; border: 1px solid #e5e5e5;box-shadow: -2px 2px 18px 3px;padding:10px'>
          <p style='font-weight: 400;'>From : ".$email."</p>
          <p style='font-weight: 400;'>Name : ".$name."</p>
          <p style='font-weight: 600'>Message</p>
          <p style='font-weight: 600'>".$message."</p>
        </div>";
$mail->AltBody = 'This is a plain-text message body';
if (!$mail->send()) {echo "error";} else {echo "success";}}else{echo "error";}
}else{echo "error";}}else{echo "error";}}else{echo "error";}
?>