<?php if($_SESSION && isset($_SESSION['login'])) : ?>
<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT

$enter_email = $_SESSION['email'];
$enter_login = $_SESSION['login'];

$conn = new mysqli(HOST, USER, PASS, DATABASE);
$sql = "UPDATE users SET valid=1 WHERE email='".$enter_email."'";
$result = $conn->query($sql);

?>
  <div class="row mb10 m10">
    <div class="col-6 col-md-4">
    	<h3>Поздравляем! Ваша учетная запись активна</h3>
	</div>
</div>
<?php
$conn->close();
endif; ?>
<?php if(!isset($_SESSION['login'])) {
header('Location: '.HOME);
}