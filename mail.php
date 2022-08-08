<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT

class Mail
{
	public static $to;
	public static $from = "info@blanet.ru";
	private static $subject = "Подтверждение учетной записи";
	public static $message = "<h2>Зддравствуйте!</h2> </br>Недавно Вы регистрировались на проекте bank.blanet.ru. Для активации своей учетной записи перейдите по <a href='https://bank.blanet.ru/?verefy='>ссылке</a>";

	public static function getMail()
	{
		$headers  = "Content-type: text/html; charset=utf-8 \r\n";
		$headers .= "From: Робот активации <info@blanet.ru>\r\n"; 
		$headers .= "Reply-To: info@blanet.ru\r\n"; 

		return mail(self::$to, self::$subject, self::$message, $headers);
	}
}
?>
<form method="post">
	<input type="email" name="email"><label>Email</label>
	<button>Ok</button>
</form>
<?php

if($_POST && !empty($_POST['email'])) {

	Mail::$to = $_POST['email'];
	Mail::getMail();

	if (Mail::getMail()) {
		echo "Статус отправки на {$_POST['email']}: OK";
	} else {
		echo "Sending fail";
	}
}