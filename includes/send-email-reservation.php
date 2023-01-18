<?php
    session_start();

    $name = $_SESSION['form-data']['name'];
    $email = $_SESSION['form-data']['email'];
    $phone = $_SESSION['form-data']['phone'];
    $note = $_SESSION['form-data']['note'];
    $date = $_SESSION['form-data']['reservation_date'];

    $correctDate = date('d-m-Y', strtotime($_SESSION['form-data']['reservation_date']));

    $subject = 'Reservering door: '. $name . ' - ' . $email;

    $message = 'Nieuwe reservering: '. "\n" .
        'Naam: ' . $name . "\n" .
        'Telefoon: ' . $phone . "\n" .
        'Datum: ' . $correctDate . "\n" .
        'Beschrijving: ' . $note
        . "\n" .
        'Wilt u uw afspraak wijzigen klik dan hier: '  . 'http://localhost/CLE2-2022/edit.php?id='. $_SESSION['form-data']['id'] . "\n" .
        'Wilt u uw afspraak cancellen klik dan hier: ' . 'http://localhost/CLE2-2022/delete.php?id='. $_SESSION['form-data']['id'];

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

    echo 'Email verstuurd';

    header("Location: ../reservation_made.php");
?>