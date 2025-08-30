<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth   = true;
        $mail->Port       = 2525;
        $mail->Username   = 'c36974a221d132';   
        $mail->Password   = '320f3d5b2e7a09';
        $mail->SMTPSecure = 'tls';

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('fardeenshahid006@gmail.com', 'Portfolio Owner'); 

        // Content
        $mail->isHTML(true);
        $mail->Subject = "New Contact Form Message from $name";
        $mail->Body    = "<b>Name:</b> $name <br>
                          <b>Email:</b> $email <br><br>
                          <b>Message:</b><br>$message";

        $mail->send();
        echo "<script>alert('Message sent successfully!'); window.location.href='Portfolio.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Failed to send message. Error: {$mail->ErrorInfo}'); window.location.href='Portfolio.html';</script>";
    }
}
?>
