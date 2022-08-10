<?php if($_SESSION && isset($_SESSION['login'])) : ?>
<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT

if(isset($_GET['name'])) :
?>
	<h1>Редактор имени и фамилии</h1>
	  <div class="row mb10 m10">
    <?php
    echo Menu::getSettingMenu();
    ?>
    <div class="col-md-6">
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
    <button type="submit" class="btn btn-outline-primary btn-lg btn-block mb10 m2" name="username">Сохранить</button>
  </div>
</form>
<!-- Форма регистрации -->
</div></div>
<?php

if (isset($_POST['username'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
  $enter_email = $_SESSION['email'];
  $username = new UserIm($firstname, $lastname);

  $changefn = new Database("UPDATE users SET firstname='".$username->getFirstname()."' WHERE email='".$enter_email."'");
  $db = $changefn->getConnection();
  $db = $changefn->getCloseDb();

  $changeln = new Database("UPDATE users SET lastname='".$username->getLastname()."' WHERE email='".$enter_email."'");
  $db = $changeln->getConnection();
  $db = $changeln->getCloseDb();
}
endif;
  endif;
  if(!isset($_SESSION['login'])) {
header('Location: '.HOME);
}