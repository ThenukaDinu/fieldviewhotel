<?php

if (isset($_POST['name'])) {
    $name = $_POST['name']; // required
}
if (isset($_POST['email'])) {
    $email = $_POST['email']; // required
}
if (isset($_POST['message'])) {
    $message = $_POST['message']; // required
}

//Include required PHPMailer files
require './php_mailer/PHPMailer.php';
require './php_mailer/SMTP.php';
require './php_mailer/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer
$mail = new PHPMailer();
//Set mailer to use smtp
$mail->isSMTP();
//Define smtp host
$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
$mail->SMTPSecure = "ssl";
//Port to connect smtp
$mail->Port = "465";
//Set gmail username
$mail->Username = "hotelcontact.sdu.nibm@gmail.com";
//Set gmail password
$mail->Password = "sdu12345";
//Email subject
$mail->Subject = "New Contact Request From Customer";
//Set sender email
$mail->setFrom('hotelcontact.sdu.nibm@gmail.com');
//Enable HTML
$mail->isHTML(true);
//Attachment
//$mail->addAttachment('img/attachment.png');
//Email body
$mail->Body = "<h1>New Contact Request</h1></br>
            <p>Contact Person Email: $email</p>
            <p>Contact Person Name: $name</p> 
            <p>Message: $message</p>";
//Add recipient
$mail->addAddress("thenukadinu@gmail.com");
//Finally send email
if ( $mail->send() ) {
    echo "Email Sent..!";
}else{
    echo "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
}
//Closing smtp connection
$mail->smtpClose();

?>