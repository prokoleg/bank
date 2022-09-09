<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT

$home = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'];

if (file_exists('inc/config.php')) {
    header("Location: $home");
}

if (!file_exists('inc/config.php')) :
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css?v=<?php echo rand(0, 9999); ?>"/>
	<title>Install</title>
</head>
<body>
	<div class="w90 center">
<?php if (!$_GET && !$_POST) : ?>
			<h1>Здравствуйте</h1>
		<p>Это автоматический установщик CMS Blanet.Ru. Для продолжения нажмите ДАЛЕЕ</p>
<form method="post">
  <input type="submit" value="Далее" class="btn btn-outline-primary btn-lg btn-block mb10 m2" name="step0">
</form>
<?php endif; ?>
<?php if (isset($_POST['step0'])) : ?>
			<h1>Шаг 1</h1>
	<h5>Конфигурационный файл</h5>
		<p>Введите адрес сайта</p>
<form method="post">
<div class="mb-3 row g-3 m5">
    <label for="homepage" class="col-sm-2 col-form-label">Homepage</label>
    <div class="col-sm-10">
      <input type="text" name="homepage" class="form-control" id="homepage" value="<?= $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']; ?>">
    </div>
  </div>
  <input type="submit" value="Далее" class="btn btn-outline-primary btn-lg btn-block mb10 m2" name="step1">
</form>
<?php endif; ?>
<?php

if(isset($_POST['homepage'])) {
$config_data = "<?php
// Адрес сайта
define('HOME', '".$_POST['homepage']."');
";
file_put_contents('../inc/config.php', $config_data, FILE_APPEND | LOCK_EX);
}
?>

<?php if(isset($_POST['step1'])) : ?>
				<h1>Шаг 2</h1>
	<h5>Конфигурационный файл</h5>
	<p>Введите данные подключения к вашей БД</p>
<form method="post">
<div class="mb-3 row g-3 m5">
    <label for="user" class="col-sm-2 col-form-label">User</label>
    <div class="col-sm-10">
      <input type="text" name="user" class="form-control" id="user" placeholder="Имя пользователя БД">
    </div>
  </div>
<div class="mb-3 row">
    <label for="pass" class="col-sm-2 col-form-label">Пароль</label>
    <div class="col-sm-10">
      <input type="password" name="pass" class="form-control" id="pass" placeholder="Пароль БД">
    </div>
  </div>
<div class="mb-3 row">
    <label for="host" class="col-sm-2 col-form-label">Host</label>
    <div class="col-sm-10">
      <input type="text" name="host" class="form-control" id="host" placeholder="Хост">
    </div>
  </div>
<div class="mb-3 row">
    <label for="database" class="col-sm-2 col-form-label">Database</label>
    <div class="col-sm-10">
      <input type="text" name="database" class="form-control" id="database" placeholder="Имя БД">
    </div>
  </div>
  <input type="submit" value="Далее" class="btn btn-outline-primary btn-lg btn-block mb10 m2" name="step2">
</form>
</div>
<?php endif; ?>
<?php
if(isset($_POST['step2'])) :

$mysqli = new mysqli($_POST['host'], $_POST['user'], $_POST['pass'], $_POST['database']);
$mysqli->close();

$config_data = "
// Данные подключения к БД
define('USER', '".$_POST['user']."');
define('PASS', '".$_POST['pass']."');
define('HOST', '".$_POST['host']."');
define('DATABASE', '".$_POST['database']."');
define('DBTABLE', 'bank');

// Константы
define('REQUEST', \$_SERVER['QUERY_STRING']);
define('URL_AVATAR', HOME.'/img/avatars/');

// Подключение классов
foreach (glob('inc/classes/*.php') as \$filename)
{
    include \$filename;
}";

echo file_put_contents('../inc/config.php', $config_data, FILE_APPEND | LOCK_EX) ? '' : "<code>Увы, что-то пошло не так</code>";
?>
<h1>Шаг 3</h1>
<p>Запись конфигурационного файла (параметры подключения к БД) прошла успешно</p>
<form method="post">
  <input type="submit" value="Далее" class="btn btn-outline-primary btn-lg btn-block mb10 m2" name="step3">
</form>

<?php
endif;

if(isset($_POST['step3'])) :
?>
        <h1>Шаг 3.1</h1>
  <h5>Конфигурационный файл</h5>
  <p>Введите пароль для гостевого доступа (он будет один для всех гостей)</p>
<form method="post">

  <div class="mb-3 row">
    <label for="guestpass" class="col-sm-2 col-form-label">Гостевой пароль</label>
    <div class="col-sm-10">
      <input type="text" name="guestpass" class="form-control" id="guestpass" placeholder="1234" disabled>
    </div>
  </div>
  <input type="submit" value="Далее" class="btn btn-outline-primary btn-lg btn-block mb10 m2" name="step31">
</form>
<?php
endif;

if(isset($_POST['step31'])) :
  $config_data = "

// Гостевой пароль :)
define('USERPASS', '1234');
";
echo file_put_contents('../inc/config.php', $config_data, FILE_APPEND | LOCK_EX) ? '' : "<code>Увы, что-то пошло не так</code>";
?>
        <h1>Шаг 4</h1>
  <h5>Конфигурационный файл</h5>
  <p>Введите название вашего сайта</p>
<form method="post">

  <div class="mb-3 row">
    <label for="namesite" class="col-sm-2 col-form-label">Гостевой пароль</label>
    <div class="col-sm-10">
      <input type="text" name="namesite" class="form-control" id="namesite" placeholder="1234" disabled>
    </div>
  </div>
  <input type="submit" value="Далее" class="btn btn-outline-primary btn-lg btn-block mb10 m2" name="step4">
</form>
<?php
endif;

if(isset($_POST['step4'])) :
$config_data = "

// Имя сайта
define('SITENAME', '".$_POST['step4']."');
";
echo file_put_contents('../inc/config.php', $config_data, FILE_APPEND | LOCK_EX) ? '' : "<code>Увы, что-то пошло не так</code>";

include_once ('../inc/config.php');
$conn = new mysqli(HOST, USER, PASS, DATABASE);
$conn->multi_query(file_get_contents('db.sql'));

$conn->close();
echo "<h1>Поздравляем!</h1>
<p>Запись конфигурационного файла прошла успешно</p>
<p>Теперь ты можешь перейти на <a href=".HOME.">главную</a> страницу сайта или войти в <a href=".HOME."/singin>личный кабинет</a>(login: my@mail.dn / пароль: пусто) и обновить свои данные</p>";
endif;
  endif;
?>
</body>
</html>