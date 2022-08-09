<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT

// Всякие инклюды
include_once ('inc/class_im.php');
$enter_email = $_SESSION['email'];
$enter_login = $_SESSION['login'];
?>
	<h1>Редактор профиля <?= $enter_login; ?></h1>
	  <div class="row mb10 m10">
    <div class="col-6 col-md-4">
<!-- Content -->
</div>
    <div class="col-md-8">
    	<!-- Форма регистрации -->
<form class="row g-3 mt10" method="post">
    <div class="col-md-6">
    <label for="firstname" class="form-label">Имя</label>
    <input name="firstname" type="text" class="form-control" id="firstname" autofocus="autofocus"  required="required">
  </div>
    <div class="col-md-6">
    <label for="lastname" class="form-label">Фамилия</label>
    <input name="lastname" type="text" class="form-control" id="lastname" required="required">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-outline-primary btn-lg btn-block mb10 m2" name="username" disabled>Сохранить</button>
  </div>
</form>
<!-- Форма регистрации -->
</div></div>
<?php

if (isset($_POST['username'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
  $username = new UserIm($firstname, $lastname);

  $changefn = new Database("UPDATE users SET firstname='".$username->getFirstname()."' WHERE email='".$enter_email."'");
  $db = $changefn->getConnection();

  $changeln = new Database("UPDATE users SET lastname='".$username->getLastname()."' WHERE email='".$enter_email."'");
  $db = $changeln->getConnection();
}
?>