<?php if($_SESSION && isset($_SESSION['login'])) : ?>
<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT
?>
  <div class="row mb10 m10">
    <div class="col-6 col-md-4">
<?php
$enter_email = $_SESSION['email'];
$enter_login = $_SESSION['login'];

if($enter_login !=NULL) {
// Вывод загруженного аватара
$database = new Database("SELECT * FROM users WHERE email='".$enter_email."'");
$db = $database->getConnection();

while ($row = $db->fetch_assoc()) {
  $avatar = new Pictures($row['avatar']);
echo "<img src='".$avatar->getAvatar()."' height='100px' width='100px' alt='".$avatar->getAvatar()."' title='".$enter_email."' class='avatar_border'>";
}
echo "<p></p><p><a href='../settings'>Редактировать</a></p>";
?>
<!-- Modal window -->
<br>
<!-- Modal window -->
</div>
    <div class="col-md-8">
    	<?php
    	$db = $database->getConnection();
	    	while ($row = $db->fetch_assoc()) {
		  		echo "<br><i class='bi bi-person'></i> : ".$row['login']."<br>";
	    		echo "<i class='bi bi-telephone'></i> : ".$row['phone']."<br>";
	    		echo "<i class='bi bi-building'></i> : ".$row['city']."<br>";
	    		echo "<i class='bi bi-envelope'></i> : ".$row['email']."<br>";
	    		$password = new User('', $row['password']);
	    		echo $password->replacePass(); // password

					user::$vk_link = $row['vk_link'];
					user::$telegram_link = $row['telegram_link'];
					user::$youtube_link = $row['youtube_link'];
					echo "<br>";
					user::userSocialLink();
                        $_SESSION['verefy'] = $row['valid'];
	    	}

			$db = $database->getCliseDb();
			
if (empty($_SESSION['verefy']) || $_SESSION['verefy'] != 1) {
	if (!$_POST) {
?>
<p><code>Ваш аккаунт не активирован.<br />Для активации нажмите кнопку ниже</code></p>
<form method="post">
<input type="submit" name="email" class="btn btn-outline-danger btn-lg" value="Активация">
</form>
<?php
}
if($_POST && !empty($enter_email)) {

	Mail::$to = $enter_email;
  Mail::$login = $enter_login;
	Mail::getMail();

	if (Mail::getMail()) {
		echo "<p><code>Проверьте почтовый ящик <strong>{$enter_email}</strong>.<br />Если письмо не пришло, проверьте папку СПАМ</code></p>";
	} else {
		echo "Sending fail";
	}
}
}
}
    	?>
    	</div>
  </div>
<?php endif; ?>
<?php if(!isset($_SESSION['login'])) {
header('Location: '.HOME);
}