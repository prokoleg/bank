<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT

// Данные графика
class Dates
{
	public $data;

	function __construct($data)
	{
		$this->data = $data;
	}

	function getData()
	{
	$arr = array($this->data);
	foreach ($arr as $key => $value) {
	  $this->data = $value;
	}
	return $this->data;
	}
}
$arr = array(1,1.5,2,2.7,3,3.2,3);
foreach ($arr as $key => $value) {
  echo "\t\t\t".$value.",\n";
}
