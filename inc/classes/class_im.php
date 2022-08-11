<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT

class UserIm
{
	public $firstname;
	public $lastname;
	public $email;
	public $phone;
	public $city;
	public static $password;

	function __construct($firstname, $lastname) {
		$this->firstname = $firstname;
		$this->lastname = $lastname;
	}

	function getFirstname() {
		return $this->firstname;
	}
	function getLastname() {
		return $this->lastname;
	}

	public static function getPass() {
		return crypt(self::$password, '$6$password$');
		//return password_hash(self::$password, PASSWORD_DEFAULT);
	}
}