<?php if($_SESSION && isset($_SESSION['login'])) : ?>
<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT

if(isset($_GET['pass'])) :
?>
	<h1>Сменить пароль</h1>
	  <div class="row mb10 m10">
    <?php
    echo Menu::getSettingMenu();
    ?>
    <div class="col-md-6">
    	<!-- Форма смены пароля -->
<form class="row g-3 mt10" method="post">
    <div class="col-md-6">
    <label for="pass1" class="form-label">Новый пароль</label>
    <input name="pass1" type="text" class="form-control" id="pass1" autofocus="autofocus"  required="required">
  </div>
    <div class="col-md-6">
    <label for="pass2" class="form-label">Новый пароль (еще раз)</label>
    <input name="pass2" type="text" class="form-control" id="pass2" required="required">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-outline-primary btn-lg btn-block mb10 m2" name="pass">Сохранить</button>
  </div>
</form>
<!-- Форма смены пароля -->
</div></div>
<?php

if (isset($_POST['pass']) && ($_POST['pass1'] == $_POST['pass2'])) {
  $enter_email = $_SESSION['email'];
  UserIm::$password = $_POST['pass1'];

  $changepass = new Database("UPDATE users SET password='".UserIm::getPass()."' WHERE email='".$enter_email."'");
  $db = $changepass->getConnection();

  $db = $changepass->getCloseDb();
  if($db == TRUE) {
    echo "<h3>Смена пароля прошла успешно</h3>";
  }
} elseif (isset($_POST['pass']) && ($_POST['pass1'] != $_POST['pass2'])) {
  echo "<code>Пароли не совпадают</code>";
}
endif;
  endif;
  if(!isset($_SESSION['login'])) {
header('Location: '.HOME);
}