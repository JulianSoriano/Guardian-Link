<?php
//This line includes the Composer autoloader, which automatically loads the required PHPMailer classes from the vendor directory.
require_once "vendor/autoload.php";

//These lines import the PHPMailer and Exception classes, allowing you to use them without prefixing them with their full namespace.
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Initializes a new PHPMailer object and enables exceptions (true), so you can catch errors more easily.
$mail = new PHPMailer(true);

//Begins a try block, which allows you to catch exceptions that may occur during the email sending process.
try {
    
    // Server settings

    //Configures PHPMailer to use SMTP for sending emails.
    $mail->isSMTP();

    //Sets the SMTP server address. You need to replace this with your actual SMTP host.
    $mail->Host = 'smtp.gmail.com';

    //Tells PHPMailer to use SMTP authentication.
    $mail->SMTPAuth = true;

    //Sets the username and password for SMTP authentication. Replace these placeholders with your actual email credentials.
    $mail->Username = 'your_email@example.com';
    $mail->Password = 'your_password';

    //Configures PHPMailer to use TLS encryption for secure email transmission.
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    //Specifies the port for the SMTP server (587 is commonly used for TLS).
    $mail->Port = 587;

    //Sets the sender's email address and name that will appear in the "From" field of the email.
    $mail->setFrom('noreply@guardianlink.com', 'Guardian Link');

    //Adds a recipient's email address. You can call this method multiple times to add more recipients.
    $mail->addAddress('jsoriano.re@gmail.com');

    //These lines define the subject and body content of the email. Body is the HTML version, while AltBody is the plain text version (used by email clients that do not support HTML).
    $mail->Subject = 'Password Reset for Guardian Link';
    $mail->Body    = 'If you can read this you forgot you password. Click this link to enter the password reset page.';
    $mail->AltBody = 'This is the plain text version of the email content';

    //Calls the send() method to send the email. If it fails, an exception is thrown.
    $mail->send();
    
    //If the email is sent successfully, this message will be displayed. If an error occurs, the code jumps to the catch block.
    echo 'Message has been sent successfully';
} catch (Exception $e) {
    
    //If an exception occurs during sending, this line outputs the error message using the ErrorInfo property, which contains details about the failure.
    echo "Mailer Error: {$mail->ErrorInfo}";
}
?>

