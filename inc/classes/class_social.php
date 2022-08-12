<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT

class SocialLink
{
	public static $vk_link;
	public static $telegram_link;
	public static $youtube_link;

	// Социальные сети в профиле (можно редактировать)
	public static function userSocialLink()
	{
		echo (self::$vk_link !=null) ? '<a href="./?replace_vk"><i class="bi bi-bootstrap mr10"></i></a>' : '<a href="./?add_vk"><i class="bi bi-plus-square-dotted mr10"></i></a>';
		
		echo (self::$telegram_link != null) ? '<a href="https://t.me/'.self::$telegram_link.'" target="_blank" title="Заменить нельзя"><i class="bi bi-telegram mr10"></i></a>' : null;
		
		echo (self::$youtube_link !=null) ? '<a href="./?replace_youtube"><i class="bi bi-youtube mr10"></i></a>' : '<a href="./?add_youtube"><i class="bi bi-plus-square-dotted mr10"></i></a>';
		return;
	}

	// Социальные сети в профиле (для других)
	public static function socialLink()
	{
		echo (self::$vk_link !=null) ? '<a href="https://vk.com/'.self::$vk_link.'" target="_blank"><i class="bi bi-bootstrap mr10"></i></a>' : null;
		
		echo (self::$telegram_link != null) ? '<a href="https://t.me/'.self::$telegram_link.'" target="_blank"><i class="bi bi-telegram mr10"></i></a>' : null;
		
		echo (self::$youtube_link !=null) ? '<a href="https://www.youtube.com/channel/'.self::$youtube_link.'" target="_blank"><i class="bi bi-youtube mr10"></i></a>' : null;
		return;
	}
}

class Sl
{
	public $social_link;
	public $label_link;

	function __construct($social_link)
	{
		$this->social_link = $social_link;
	}

	function getSl()
	{
		foreach($_GET as $key => $value)
			$this->label_link = ($this->social_link == 'replace_vk') ? "Вконтакте" : "YouTube";
		$html = "<div class='col-md-6'>
				<form method='post' class='row g-3 mt10'>
	    		<div class='col-md-6'>
				<label>Введите ID аккаунта ".$this->label_link."</label>
				<input type='text' name='".$key."' class='form-control'>
				</div>
				<div class='col-12'>
				<button type='submit' class='btn btn-outline-primary btn-lg btn-block mb10 m2'>Сохранить</button>
				</div>
			</form></div>";
		return $html;
	}
}
