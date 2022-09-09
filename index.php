<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT

session_start();

$home = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'];

if (!file_exists('inc/config.php')) {
    require_once ('inc/classes/class_url.php');
    header("Location: $home/install/index.php");
}

if (file_exists('inc/config.php')) :
// Всякие инклюды
    require_once ('inc/config.php');
// header
    require_once('inc/header.php');
// navbar
    require_once('inc/navigation.php');
?>
<!-- Content -->
<div class="container">
<?php
# Кнопка НАЗАД
    if(isset($_SERVER['HTTP_REFERER']) && $_GET) {
        $urlback = htmlspecialchars($_SERVER['HTTP_REFERER']);
        echo "<a href='$urlback' class='text-primary'><i class='bi bi-skip-backward'></i></a>"; 
  }
?>
	<?php url::urlString(); ?>
</div>
<!-- <img src="https://createqr.ru?Name=Прокофьева М.О&PersonalAcc=40817810290630019593&BankName=ПАО 'БАНК САНКТ-ПЕТЕРБУРГ'&BIC=044030790&CorrespAcc=30101810900000000790&SumRub=100&Purpose=Пожертвование"  width="150" height="150" alt="QR-код для оплаты"> -->

<!-- footer -->
<?php require_once('inc/footer.php');

endif;
?>