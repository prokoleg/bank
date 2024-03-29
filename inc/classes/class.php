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

	public function __construct($login, $pass)
	{
		$this->login = $login;
		$this->pass = $pass;
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

	public static function getNumberGroup()
	{
		self::$group = 1;
		return self::$group;
	}
}

class Menu
{
	public static $menu;

	public static function getSettingMenu()
	{
		self::$menu = "<div class='col-6 col-md-3'><ul>
		<li><a href='../cabinet'>Назад</a>
		<li><a href='../?name'>Имя</a></li>
		<li><a href='../?avatar'>Аватар</a></li>
		<li><a href='../?pass'>Пароль</a></li></ul></div>";

	    return self::$menu;
	}
}

class TimeShtamp
{
	public static $date_pay;

	public static function getDate()
	{

// Формирование даты
		$m = [
			'01' => 'января',
			'02' => 'февраля',
			'03' => 'марта',
			'04' => 'апреля',
			'05' => 'мая',
			'06' => 'июня',
			'07' => 'июля',
			'08' => 'августа',
			'09' => 'сентября',
			'10' => 'октября',
			'11' => 'ноября',
			'12' => 'декабря'
		];

		foreach ($m as $date_key => $date_value) {
			self::$date_pay = ($date_key = date('m')) ? date('d '.$m[$date_key].' Y H:i:s') : '';
		}
// Формирование даты Конец
		return self::$date_pay;
	}
}