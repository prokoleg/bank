<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT

// Всякие инклюды
include_once ('inc/classes/class_im.php');
$enter_email = $_SESSION['email'];
$enter_login = $_SESSION['login'];
?>
  <h1>Редактор профиля <?= $enter_login; ?></h1>
    <div class="row mb10 m10">
    <?php
    echo Menu::getSettingMenu();
    ?>
    <div class="col-md-8">
      На этой странице вы можете изменить свои данные и пароль
</div></div>
