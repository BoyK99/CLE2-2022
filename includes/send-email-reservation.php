<?php
    session_start();

    $id = $_SESSION['form-data']['id'];
    $name = $_SESSION['form-data']['name'];
    $email = $_SESSION['form-data']['email'];
    $phone = $_SESSION['form-data']['phone'];
    $note = $_SESSION['form-data']['note'];
    $code = $_SESSION['form-data']['code'];
    $date = $_SESSION['form-data']['reservation_date'];

    $correctDate = date('d-m-Y', strtotime($_SESSION['form-data']['reservation_date']));

    $subject = 'Reservering door: '. $name . ' - ' . $email;

    $message = 'Nieuwe reservering: '. "<br>" .
        'Naam: ' . $name . "<br>" .
        'Telefoon: ' . $phone . "<br>" .
        'Datum: ' . $correctDate . "<br>" .
        'Beschrijving: ' . $note .
         "<br>" .
         "<br>" .
        'Bevestigings code: ' . $code .
        "<br>" .
        'Wilt u uw afspraak wijzigen klik dan hier: ' . '<a href="http://localhost/CLE2-2022/edit.php?id='. $id. '">Wijzig</a>' .
        "<br>" .
        'Wilt u uw afspraak cancellen klik dan hier: ' . '<a href="http://localhost/CLE2-2022/delete.php?id='. $id . '">Cancel</a>';

    require "../vendor/autoload.php";
    include_once 'globals.php';

    use PHPMailer\PHPMailer\PHPMailer;

    $mail = new PHPMailer(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    $mail->isSMTP();
    $mail->isHTML(true);
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

//    echo 'Email verstuurd';

    header("Location: ../reservation_made.php");
?>