<?php
// Налаштування відправки
require 'config.php';



$name = $_POST['form']['name'] ?? '';
$email = $_POST['form']['email'] ?? '';
$messageText = $_POST['form']['textarea'] ?? '';





//Від кого лист
$mail->setFrom('', 'Лист від'); // Вказати потрібний E-mail
//Кому відправити
$mail->addAddress(''); // Вказати потрібний E-mail
//Тема листа
$mail->Subject = 'Вітання!';

//Тіло листа
$body = '<h1>Зустрічайте супер листа для !</h1>';


if ($name) {
	$body .= "<p><strong>Им'я:</strong> $name</p>";
}
if ($email) {
	$body .= "<p><strong>Email:</strong> $email</p>";
}
if ($messageText) {
	$body .= "<p><strong>Повідомлення:</strong> $messageText</p>";
}





//if(trim(!empty($_POST['email']))){
//$body.=$_POST['email'];
//}	

/*
	//Прикріпити файл
	if (!empty($_FILES['image']['tmp_name'])) {
		//шлях завантаження файлу
		$filePath = __DIR__ . "/files/sendmail/attachments/" . $_FILES['image']['name']; 
		//грузимо файл
		if (copy($_FILES['image']['tmp_name'], $filePath)){
			$fileAttach = $filePath;
			$body.='<p><strong>Фото у додатку</strong>';
			$mail->addAttachment($fileAttach);
		}
	}
	*/

$mail->Body = $body;

//Відправляємо
if (!$mail->send()) {
	$message = 'Помилка';
} else {
	$message = 'Дані надіслані!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
