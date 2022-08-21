<?php

class Links
{
	public static $link;

	public static function Url()
	{
		$link = (isset($_GET['city']) && ($_GET['city'] == 'true')) ? include ('city.php') : '';
		$link = (isset($_GET['users']) && ($_GET['users'] == 'true')) ? include ('users.php') : '';
		$link = (isset($_GET['stat']) && ($_GET['stat'] == 'true')) ? include ('skin/graph.php') : '';

		return $link;
	}
}
