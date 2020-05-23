<?php 

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$phone = $_POST['user_phone'];
$email = $_POST['user_email'];
$place = $_POST['user_place'];
$date = $_POST['user_date'];
$message = $_POST['user_message'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'vodopyanova.photo@gmail.com'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'olpas1997'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('vodopyanova.photo@gmail.com'); // от кого будет уходить письмо?
$mail->addAddress('olpasewina@gmail.com');     // Кому будет уходить письмо 
$mail->addAddress('perdachelios@gmail.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка';
$mail->Body    = 'Имя: ' .$name . '<br>Номер телефона: ' .$phone. '<br>Почта: ' .$email. 
'<br>Место проведения: ' .$place. '<br>Дата: ' .$date. '<br>Сообщение: ' .$message;
$mail->AltBody = '';

if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: Thank.html');
}
?>