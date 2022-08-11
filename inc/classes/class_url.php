<?php

class Url
{
	public static function getTitle()
	{
		if (isset($_GET['link'])) {
			if (REQUEST == 'link=pay') {
				$title = 'Таблица взносов';
			} elseif (REQUEST == 'link=insert_pay') {
				$title = 'Внести';
			} elseif (REQUEST == 'link=enter&registration=false') {
				$title = 'Вход';
			} elseif (REQUEST == 'link=enter&registration=true') {
				$title = 'Регистрация';
			} elseif (REQUEST == 'link=exit') {
				$title = 'Выход';
			} elseif (REQUEST == 'link=qr') {
				$title = 'Перевод по QR-коду';
			} elseif (REQUEST == 'link=settings') {
				$title = 'Настройки';
			} elseif (REQUEST == 'setting=name') {
				$title = 'Настройки имени';
			} elseif (REQUEST == 'link=user') {
				$title = 'Личный кабинет';
			} elseif (REQUEST == 'link=users') {
				$title = 'Пользователи';
			} elseif (REQUEST == 'name') {
				$title = 'Сменить имя';
			} elseif (REQUEST == 'avatar') {
				$title = 'Сменить аватар';
			} elseif (REQUEST == 'link=users') {
				$title = 'Пользователи';
			} else {
				$title = '';
			}
		return $title;
		}
		if (isset($_GET['im'])) {
			$title = "Пользователь ".$_GET['im'];
			return $title;
		}
			return "Главная";
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
		}
		return;
	}

	public static function homeUrl()
	{
		$homepage = 'blanet.ru';
		return $homepage;
	}
}