<?php
require_once "vendor/autoload.php"; //PHPMailer Object 
use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer(); //From email address and name 
$mail->From = "noreply@guardianlink.com"; 
$mail->FromName = "Full Name"; //To address and name 
$mail->addAddress("jsoriano.re@gmail.com"); //Address to which recipient will reply 
$mail->Subject = "Subject Text"; 
$mail->Body = "Hi";
$mail->AltBody = "This is the plain text version of the email content"; 
if(!$mail->send()) 
{
echo "Mailer Error: " . $mail->ErrorInfo; 
} 
else { echo "Message has been sent successfully"; 
}
if(!$mail->send()) 
{ 
echo "Mailer Error: " . $mail->ErrorInfo; 
} 
else 
{ 
    echo "Message has been sent successfully"; 
}

// // if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["action"]) && $_POST["action"] == "send_email") {
//     $to = "jsoriano.re@gmail.com";
//     $subject = "Guardian Link Test";
//     $message = "This is a test email sent from a PHP script.";
//     $headers = "From: admin@guardianlink.com" . "\r\n" .
//                "Reply-To: admin@guardianlink.com" . "\r\n" .
//                "X-Mailer: PHP/" . phpversion();


//     if (mail($to, $subject, $message, $headers)) {
//          echo "Email sent successfully.";
//         } else {
//          echo "Failed to send email.";
//     }
// // } else {
// //     echo "Invalid request.";
// // }
?>

