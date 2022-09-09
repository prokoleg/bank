<?php

class Url
{
	public static $title;
	public static $description;

	public static function getTitle()
	{
		if (isset($_GET['link'])) {
			if (REQUEST == 'link=pay') {
				self::$title = 'Таблица взносов';
				echo self::$title;
			} elseif (REQUEST == 'link=insert_pay') {
				self::$title = 'Внести';
				echo self::$title;
			} elseif (REQUEST == 'link=enter&registration=false') {
				self::$title = 'Вход';
				echo self::$title;
			} elseif (REQUEST == 'link=enter&registration=true') {
				self::$title = 'Регистрация';
				echo self::$title;
			} elseif (REQUEST == 'link=exit') {
				self::$title = 'Выход';
				echo self::$title;
			} elseif (REQUEST == 'link=qr') {
				self::$title = 'Перевод по QR-коду';
				echo self::$title;
			} elseif (REQUEST == 'link=settings') {
				self::$title = 'Настройки';
				echo self::$title;
			} elseif (REQUEST == 'setting=name') {
				self::$title = 'Настройки имени';
				echo self::$title;
			} elseif (REQUEST == 'link=user') {
				self::$title = 'Личный кабинет';
				echo self::$title;
			} elseif (REQUEST == 'link=users') {
				self::$title = 'Пользователи';
				echo self::$title;
			} elseif (REQUEST == 'name') {
				self::$title = 'Сменить имя';
				echo self::$title;
			} elseif (REQUEST == 'avatar') {
				self::$title = 'Сменить аватар';
				echo self::$title;
			} elseif (REQUEST == 'link=users') {
				self::$title = 'Пользователи';
				echo self::$title;
			} else {
				self::$title = '';
				echo self::$title;
			}
		return;
		}
		if (isset($_GET['im'])) {
			self::$title = "Пользователь ".$_GET['im'];
				echo self::$title;
			return;
		}
			self::$title = "Главная";
				echo self::$title;
			self::$description = "";
				echo self::$description;				
			return;
		}

	public static function urlString()
	{
		if (!$_GET) {
			require_once ('pages/index.php');
		}
		if (isset($_GET['link'])) {
			if ($_GET['link'] == 'pay') {
				include ('pages/pay.php');
			} elseif ($_GET['link'] == 'enter') {
				include ('pages/enter.php');
			} elseif ($_GET['link'] == 'insert_pay') {
				include ('pages/insert_pay.php');
			} elseif ($_GET['link'] == 'qr') {
				include ('pages/qrcode.php');
			} elseif ($_GET['link'] == 'settings') {
				include ('pages/profiledit.php');
			} elseif ($_GET['link'] == 'user') {
				include ('pages/user.php');
			} elseif ($_GET['link'] == 'users') {
				include ('pages/users.php');
			} elseif ($_GET['link'] == 'exit') {
				session_destroy();
				echo "<h2>Вы вышли!</h2>";
				echo "<meta http-equiv='refresh' content='1; URL=".HOME."'>";
			}
		} elseif (isset($_GET['im'])) {
			include ('pages/im.php');
		} elseif (isset($_GET['verefy'])) {
			include ('inc/verefy.php');
		} elseif (isset($_GET['name'])) {
			include ('pages/settings/name.php');
		} elseif (isset($_GET['avatar'])) {
			include ('pages/settings/avatar.php');
		} elseif (isset($_GET['pass'])) {
			include ('pages/settings/pass.php');
		} elseif (isset($_GET['replace_vk']) || isset($_GET['replace_youtube'])) {
			include ('pages/settings/social.php');
		} elseif (isset($_GET['add_vk']) || isset($_GET['add_youtube'])) {
			include ('pages/settings/social.php');
		}
		return;
	}

	public static function homeUrl()
	{
		$homepage = 'blanet.ru';
		return $homepage;
	}
}