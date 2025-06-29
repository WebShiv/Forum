<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - IDiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include './partials/nav.php'; ?>

    <?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer-master/src/Exception.php';
require './PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/src/SMTP.php';

if(isset($_SESSION['username'])){
if (!isset($_SESSION['usermail'])) {
    echo "Email not found.";
    
}else{
$email = $_SESSION['usermail'];
$name = $_SESSION['username'];

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'narwadeshivam07@gmail.com';
    $mail->Password   = 'xehf makl buwq vklm'; 
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('narwadeshivam07@gmail.com', 'IDiscuss');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "Thanks for your feedback! ";
    $mail->Body    = 'Dear '. $name .', <br><br>Thanks for contacting us. We appreciate your message and will get back to you if necessary.<br><br>Regards,<br><strong>IDiscuss Team</strong>';

    $mail->send();
    echo '
     <div class="alert alert-info">
          <strong>Feedback Saved Check your email</strong> 
        </div>
    ';
}catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
}else{
     echo '
     <div class="alert alert-denger">
          <strong>Login First To send the Feedback</strong> 
        </div>
    ';
}
?>

    <?php include './partials/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>