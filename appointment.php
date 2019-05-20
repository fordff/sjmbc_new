<?php

require("/home/stjohn47/phpmailer/PHPMailer_5.2.0/class.phpmailer.php");

if ($_POST) {
    
    // $body                = file_get_contents('appointment_made.html');
    
    $contact_email   = $_POST['contact-email']; // this is the sender's Email address
    $contact_name    = $_POST['contact-name'];
    $contact_phone   = $_POST['contact-phone'];
    $contact_message = $_POST['contact-message'];
    
    $Body .= "Appointment Request for Name: ";
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
    
    $mail->From     = $contact_email;
    $mail->FromName = "St. John MBC Mailer";
    
    $to      = "stjohnbakersfield@gmail.com";
    $to_name = "ST. John MBC Staff";
    $mail->AddAddress($to, $to_name);
    $mail->IsHTML(true); // set email format to HTML
    
    $mail->Subject = "Your Appointment";
    $mail->Body    = "This is the HTML message body <b>in bold!</b>";
    $mail->AltBody = "This is the body in plain text for non-HTML mail clients";
    
    if (!$mail->Send()) {
        echo "Message could not be sent. <p>";
        echo "Mailer Error: " . $mail->ErrorInfo;
        exit;
    }
}
header('Location: ../appointment.html');
?>