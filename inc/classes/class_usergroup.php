<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT

class UserGroup
{
	public $group;
	public $conn;
	public $sql;

	function __construct($group) {
		$this->group = $group;
	}

	function Group()
	{
		$root = $_SERVER['DOCUMENT_ROOT'];
        include_once ($root.'/inc/config.php');
        
        $this->conn = new mysqli(HOST, USER, PASS, DATABASE);
        $this->sql = "SELECT * FROM users WHERE user_group=$this->group";
        
        return $this->conn->query($this->sql);
	}
}