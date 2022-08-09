<?php if($_SESSION && isset($_SESSION['login'])) : ?>
<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT

if (isset($_GET['im'])) {
	$user = $_GET['im'];
?>
	<h1>Страница пользователя <?= $user; ?></h1>
	  <div class="row mb10 m10">
    <div class="col-6 col-md-4">
<?php
$database = new Database("SELECT * FROM users WHERE login='".$user."'");
$db = $database->getConnection();

while ($row = $db->fetch_assoc()) {
  $avatar = new Pictures($row['avatar']);
echo "<img src='".$avatar->getAvatar()."' height='100px' width='100px' alt='".$avatar->getAvatar()."' title='".$row['email']."' class='avatar_border'>";

?>
</div>
    <div class="col-md-8">
<?php
		  		echo "<br><i class='bi bi-person'></i> : ".$row['firstname']." ".$row['lastname']."<br>";
	    		echo "<i class='bi bi-telephone'></i> : ".$row['phone']."<br>";
	    		echo "<i class='bi bi-building'></i> : ".$row['city']."<br>";
	    		echo "<i class='bi bi-envelope'></i> : ".$row['email']."<br>";

// Вывод группы пользователя
user::$group = $row['user_group'];
user::getGroup();

user::$vk_link = $row['vk_link'];
user::$telegram_link = $row['telegram_link'];
user::$youtube_link = $row['youtube_link'];
echo "<br>";
user::socialLink();
}
}

?>
    	</div>
  </div>
<?php endif; ?>
<?php if(!isset($_SESSION['login'])) {
header('Location: '.HOME);
}