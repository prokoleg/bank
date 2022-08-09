<?php

class Db
{
	public $pay;
	public $data;
	public static $user = '';

	function __construct($data, $pay)
	{
		$this->data = $data;
		$this->pay = $pay;
	}

	function Write()
	{
		return "Взнос на сумму ".$this->pay."р. проведен";
	}

	public static function User()
	{
		return self::$user;
	}
}

class Pictures
{
	public $avatar;

	public static function ImageQR()
	{
			echo "<h5 class='text-center'>Чтобы сделать взнос по QR-коду, отсканируйте этот код вашим банковским приложением</h5><img src='./img/qr-pay-masha.png' class='rounded mx-auto d-block' alt='QR-code'' width='250' height='250'>";
		return;
	}

	public function __construct($avatar)
	{
		$this->avatar = $avatar;
	}
	public function getAvatar()
	{
		return URL_AVATAR.$this->avatar;
	}
}

class User
{
	public $login;
	public $pass;
	public static $group;
	public static $vk_link;
	public static $telegram_link;
	public static $youtube_link;

	public function __construct($login, $pass)
	{
		$this->login = $login;
		$this->pass = $pass;
	}

	public function replacePass()
	{
		// Функция замены пароля на звездочки
		switch($this->pass)
		{
		    case $this->pass:
		        $this->pass = substr($this->pass, 0, 1).'******';
		        break;
		}
		return "<i class='bi bi-asterisk'></i> : ".$this->pass;
	}

	public function getUserName()
	{
		return $this->login;
	}

	public static function getGroup()
	{
		if (self::$group == 1) {
			echo '<i class="bi bi-people"></i> : <span style="color:red">Admin</span>';
		} elseif (self::$group == 2) {
			echo '<i class="bi bi-people"></i> : <span style="color:blue">User<?span>';
		} else {
			echo '<i class="bi bi-people"></i> : <span style="color:gray">Guest</span>';
		}
		return;
	}

	public static function userSocialLink()
	{
		echo (self::$vk_link !=null) ? '<a href="https://vk.com/'.self::$vk_link.'" target="_blank"><i class="bi bi-bootstrap mr10"></i></a>' : '<a href="#add_vk"><i class="bi bi-plus-square-dotted mr10"></i></a>';
		
		echo (self::$telegram_link != null) ? '<a href="https://t.me/'.self::$telegram_link.'" target="_blank"><i class="bi bi-telegram mr10"></i></a>' : '<a href="#add_telegram"><i class="bi bi-plus-square-dotted mr10"></i></a>';
		
		echo (self::$youtube_link !=null) ? '<a href="'.self::$youtube_link.'" target="_blank"><i class="bi bi-youtube mr10"></i></a>' : '<a href="#add_youtube"><i class="bi bi-plus-square-dotted mr10"></i></a>';
		return;
	}

	public static function socialLink()
	{
		echo (self::$vk_link !=null) ? '<a href="https://vk.com/'.self::$vk_link.'" target="_blank"><i class="bi bi-bootstrap mr10"></i></a>' : null;
		
		echo (self::$telegram_link != null) ? '<a href="https://t.me/'.self::$telegram_link.'" target="_blank"><i class="bi bi-telegram mr10"></i></a>' : null;
		
		echo (self::$youtube_link !=null) ? '<a href="'.self::$youtube_link.'" target="_blank"><i class="bi bi-youtube mr10"></i></a>' : null;
		return;
	}
}

class Mail
{
	public static $to;
	public static $from = "info@blanet.ru";
	private static $subject = "Подтверждение учетной записи";
	public static $message;
	public static $login;

	public static function getMail()
	{
		self::$message = "<h2>Здравствуйте ".self::$login."!</h2> <p>Недавно Вы регистрировались на проекте <strong>bank.blanet.ru</strong>. Для активации своей учетной записи перейдите по <a href='https://bank.blanet.ru/?verefy=".self::$to."'>ссылке</a></p><p>Если ссылка не работает, то просто скопируйте ее и вставьте в адресную строку вашего браузера: <strong>https://bank.blanet.ru/?verefy=".self::$to."</strong></p><p>Если вы не регистрировались, то просто проигнорируйте это письмо или сообщите <a href='mailto:info@blanet.ru?subject=Предупреждение%20о%20возможном%20взломе%20аккаунта&body=Я%20не%20регистрировался%20на%20вашем%20проекте.%20Проверьте%20пожалуйста%20вашего%20пользователя%20".self::$to."!'>администратору</a> Blanet.Ru</p><hr>С уважением. Команда Blanet.Ru";
		$headers  = "Content-type: text/html; charset=utf-8 \r\n";
		$headers .= "From: Робот активации Blanet.Ru <no-reply@blanet.ru>\r\n";

		return mail(self::$to, self::$subject, self::$message, $headers);
	}
}

class Menu
{
	public static $menu;

	public static function getSettingMenu()
	{
		self::$menu = "<div class='col-6 col-md-3'>
		<li><a href='../cabinet'>Назад</a>
		<li><a href='../?name'>Имя</a></li>
		<li><a href='../?avatar'>Аватар</a></li>
		<li><a href='../?pass'>Пароль</a></li>
		</div>";

	    return self::$menu;
	}
}