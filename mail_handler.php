
<?php

require("/home/stjohn47/phpmailer/PHPMailer_5.2.0/class.phpmailer.php");

if ($_POST) {
    
    $to = "stjohnbakersfield@gmail.com"; // this is your Email address
    
    $errorMSG = "";
    
    $msg_subject = "ST. John MBC Contact Form - Stay Connected";
    
    if (empty($_POST["contact-email"])) {
        $errorMSG .= "Email is required ";
    } else {
        $contact_email = $_POST["contact-email"];
    }
    $contact_name    = $_POST['contact_first_name']." ".$_POST['contact_last_name'] ;
    $contact_message = $_POST['contact-message'];
    $contact_phone   = $_POST['contact-phone'];
    
    $Body .= "Name: ";
    $Body .= $contact_name;
    $Body .= "\n";
    $Body .= "Email: ";
    $Body .= $contact_email;
    $Body .= "\n";
    $Body .= "Phone: ";
    $Body .= $contact_phone;
    $Body .= "\n";
    $Body .= "Subject: ";
    $Body .= $msg_subject;
    $Body .= "\n";
    $Body .= "Message: ";
    $Body .= $contact_message;
    $Body .= "\n";
    
    $mail = new PHPMailer();
    $mail->IsSMTP(); // set mailer to use SMTP
    $mail->Host     = "localhost"; // specify main and backup server
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->Username = "info@stjohnmbcbakersfield.org"; // SMTP username
    $mail->Password = "sjmbc01"; // SMTP password
    
    $mail->From     = "info@stjohnmbcbakersfield.org";
    $mail->FromName = "St. John MBC Mailer";
    
    $mail->AddAddress($to, "SJMBC Staff"); // name is optional
    $mail->AddReplyTo($from, $full_name);
    
    // $mail->WordWrap = 50;                                 // set word wrap to 50 characters
    
    $mail->IsHTML(true); // set email format to HTML
    
    $mail->Subject = "St. John MBC Contact Form";
    $mail->MsgHTML($body);
    //$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
    
    if (!$mail->Send()) {
        echo "Message could not be sent. <p>";
        echo "Mailer Error: " . $mail->ErrorInfo;
        header('Location: stayconnected.html');
    }
}
header('Location: stayconnected.html');

?>