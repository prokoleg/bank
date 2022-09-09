<?php if($_SESSION && isset($_SESSION['login'])) : ?>
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
      <div class='col-6 col-md-3 mb10 mt-50'>
    <?php

// Вывод загруженного аватара
$database = new Database("SELECT * FROM users WHERE email='".$enter_email."'");
$db = $database->getConnection();

while ($row = $db->fetch_assoc()) {
  $avatar = new Pictures($row['avatar']);
echo "<img src='".$avatar->getAvatar()."' height='100px' width='100px' alt='".$avatar->getAvatar()."' title='".$enter_email."' class='avatar_border'>";
}
$db = $database->getCloseDb();    
    
    echo Menu::getSettingMenu();
    ?>
  </div>
    <div class="col-md-8">
      На этой странице вы можете изменить свои данные и пароль, а также загрузить или изменить аватар. 
</div></div>
<?php endif; ?>
<?php if(!isset($_SESSION['login'])) {
header('Location: '.HOME);
}