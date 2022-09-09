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
	public static $verefy_code;
	public static $to;
	public static $from = "no-reply@blanet.ru";
	private static $subject;
    public static $message;
	public static $login;

	public static function MailVerefy()
	{
		self::$verefy_code = md5(self::$to);
		return self::$verefy_code;		
	}

	public static function getMail()
	{
		self::$verefy_code = md5(self::$to);
		self::$message = "<h2>Здравствуйте ".self::$login."!</h2> <p>Недавно Вы регистрировались на проекте <strong>bank.blanet.ru</strong>. Для активации своей учетной записи перейдите по <a href='https://bank.blanet.ru/?verefy=".self::$verefy_code."'>ссылке</a></p><p>Если ссылка не работает, то просто скопируйте ее и вставьте в адресную строку вашего браузера: <strong>https://bank.blanet.ru/?verefy=".self::$verefy_code."</strong></p><p>Если вы не регистрировались, то просто проигнорируйте это письмо или сообщите <a href='mailto:info@blanet.ru?subject=Предупреждение%20о%20возможном%20взломе%20аккаунта&body=Я%20не%20регистрировался%20на%20вашем%20проекте.%20Проверьте%20пожалуйста%20вашего%20пользователя%20".self::$to."!'>администратору</a> Blanet.Ru</p><hr>С уважением. Команда Blanet.Ru";
		$headers  = "Content-type: text/html; charset=UTF-8 \r\n";
		$headers .= "From: Blanet.Ru <no-reply@blanet.ru>\r\n";
        $headers .= "X-Mailer: Blanet.Ru";

        self::$subject = "=?UTF-8?B?" . base64_encode("Подтверждение учетной записи") . "?=";

		return mail(self::$to, self::$subject, self::$message, $headers);
	}
}