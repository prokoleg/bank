<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT

class Delete
{
	public $delete_link;
	public $avatar;

	public function __construct($delete_link, $avatar)
	{
		$this->delete_link = $delete_link;
		$this->avatar = $avatar;
	}

	function UserDelete()
	{
		$this->delete_link = ($this->avatar = 'noavatar.png') ? '' : unlink($_SERVER['DOCUMENT_ROOT']."/img/avatars/".$this->avatar);
		$this->delete_link .= (isset($_GET['del'])) ? 'Удаление пользователя <strong>ID:'.$_GET['del'].'</strong> успешно произведено<hr>' : 'Fail';
		return $this->delete_link;
	}
}