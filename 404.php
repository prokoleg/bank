<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<title>404 Страница не найдена</title>
</head>
<body>
<div class="container">
<?php
$id = $argv[0];
$id = abs(intval($id));
if (!$id) $id = 404;

// ассоциативный массив кодов и описаний
$a[401] = "Требуется авторизация";
$a[403] = "Пользователь не прошел аутентификацию, доступ запрещен";
$a[404] = "Документ не найден";
$a[500] = "Внутренняя ошибка сервера";
$a[400] = "Неправильный запрос";

// определяем дату и время в стандартном формате
$time = date("H:i:s");
// эта переменная содержит тело сообщения
$body =<<<END
Запрошенный Вами URL: <b>https://bank.blanet.ru{$_SERVER['REQUEST_URI']}</b><br />
Возможно интересующую Вас информацию можно найти на главной странице:<br />
<a href="https://bank.blanet.ru/" target="_blank"><b>https://bank.blanet.ru</b></a><br />
<br />
Ваш IP: <b>{$_SERVER['REMOTE_ADDR']}</b><br />
Ваш браузер: <b>{$_SERVER['HTTP_USER_AGENT']}</b><br />
Текущее время сервера: <b>$time</b><br />
END;
if ($_SERVER['HTTP_REFERER']) $body .= "Вы пришли со страницы: <b>{$_SERVER['HTTP_REFERER']}</b><br />\n";
// if ($_SERVER['HTTP_X_FORWARDER_FOR']) $body .= "Ваш IP через прокси: <b>{$_SERVER['HTTP_X_FORWARDER_FOR']}</b><br />\n";
?>
<h1><i><?=$id?></i> <?=$a[$id]?></h1>
<p><?=$body?></p>
</div>
</body>
</html>