<?php
require_once('PHPMailer/src/PHPMailer.php');
require_once('PHPMailer/src/SMTP.php');
require_once('PHPMailer/src/Exception.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class EmailUtil {
  static function send($email, $subject, $content) {
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    // Server settings
    $mail->isSMTP(); // Send using SMTP
    $mail->Host = 'smtp.live.com'; // Set the SMTP server to send through
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
    $mail->Username = 'dat.187it06791@vanlanguni.vn'; // SMTP username
    $mail->Password = 'xxxxxxxxxxxx'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port = 587; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION    _SMTPS` above
    // Recipients
    $mail->setFrom('dat.187it06791@vanlanguni.vn', 'KSD');
    $mail->addAddress($email); // Add a recipient
    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $content;
    // send the message, check for errors
    if ($mail->send()) {
      return true;
    } else {
      echo 'PHPMailer Error: ' . $mail->ErrorInfo;
      return false;
    }
  }
}
?>