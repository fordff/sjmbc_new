<?php
require("/home/stjohn47/phpmailer/PHPMailer_5.2.0/class.phpmailer.php");

if ($_POST) {
    
    $body = file_get_contents('welcome_email.html');
    
    $clientEmail = addslashes(trim($_POST['email'])); // this is the sender's Email address
    $name        = $_POST['name'];
    $subject     = "St. John MBC Welcomes " . $name;
    
    $mail = new PHPMailer();
    
    $mail->IsSMTP(); // set mailer to use SMTP
    $mail->Host     = "localhost"; // specify main and backup server
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->Username = "info@stjohnmbcbakersfield.org"; // SMTP username
    $mail->Password = "sjmbc01"; // SMTP password
    
    $mail->From     = "info@stjohnmbcbakersfield.org";
    $mail->FromName = "St. John MBC Mailer";
    
    $mail->AddAddress($clientEmail, $name); // name is optional 
    $mail->IsHTML(true); // set email format to HTML
    
    $mail->Subject = $subject;
    $mail->MsgHTML($body);

    if (!$mail->Send()) {
        echo "Message could not be sent. <p>";
        echo "Mailer Error: " . $mail->ErrorInfo;
        exit;
    }
}

header('Location: newmembers.html');
?>