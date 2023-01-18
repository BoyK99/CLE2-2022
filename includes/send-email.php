<?php
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    require "../vendor/autoload.php";
    include_once 'globals.php';

    use PHPMailer\PHPMailer\PHPMailer;

    $mail = new PHPMailer(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.office365.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = "1026544@hr.nl";
    $mail->Password = $pwd;

    $mail->setFrom("1026544@hr.nl", "Test");
    $mail->addReplyTo($email);
    $mail->addAddress("1026544@hr.nl");

    $mail->Subject = $subject;
    $mail->Body = $message;

    $mail->send();

    header("Location: ../emailsent.php");
?>