<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

require 'db.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO contacts (name, phone, email, message)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param(
    "ssss",
    $name,
    $phone,
    $email,
    $message
);

$stmt->execute();

$mail = new PHPMailer(true);

$mail->SMTPDebug = 3;
$mail->Debugoutput = 'html';

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

try {

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;

    $mail->Username = 'arrazaqtruckpainting47@gmail.com';

    // Paste your Google App Password here
    $mail->Password = 'pfwmqtplpllyezdw';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('arrazaqtruckpainting47@gmail.com', 'Truck Painting Website');

    $mail->addAddress('arrazaqtruckpainting47@gmail.com');

    $mail->Subject = 'New Message From Customer';

    $mail->Body =
        "Name: " . $_POST['name'] . "\n" .
        "Phone: " . $_POST['phone'] . "\n" .
        "Email: " . $_POST['email'] . "\n\n" .
        "Message:\n" . $_POST['message'];

    $mail->send();

    header("Location: thankyou.html");
    exit();

} catch (Exception $e) {
    echo "<h2>PHPMailer Error:</h2>";
    echo $mail->ErrorInfo;
}
?>