<?php if($_SESSION && isset($_SESSION['login'])) : ?>
<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT

if ($_GET) {
	foreach($_GET as $key => $value)
		$label_link = ($key == 'replace_vk') ? "Вконтакте" : "YouTube";
?>
	<h1>Редактор ссылки на <?= $label_link; ?></h1>
	  <div class="row mb10 m10">
    <?php
    echo Menu::getSettingMenu();

    $social = new Sl($key);
	echo $social->getSl();
    ?>
</div>
<?php
if (isset($_POST[$key])) {
  $enter_email = $_SESSION['email'];
  foreach($_POST as $key => $value)

  if(isset($_POST['replace_vk'])) {
  	$link = $_POST[$key];
  	$row = 'vk_link';
  }
    if(isset($_POST['replace_youtube'])) {
  	$link = $_POST[$key];
  	$row = 'youtube_link';
  }
  $changesl = new Database("UPDATE users SET $row='".$link."' WHERE email='".$enter_email."'");
  $db = $changesl->getConnection();
  $db = $changesl->getCloseDb();
    if($db == TRUE) {
    echo "<h4>Смена ссылки на аккаунт прошла успешно</h4>";
  }

} elseif (empty($_POST[$key])) {
  echo "<code>Введите ID аккаунта или веринтесь в <a href='../cabinet'>личный кабинет</a></code>";
}

}
endif;
if(!isset($_SESSION['login'])) {
header('Location: '.HOME);
}