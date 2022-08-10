<?php if($_SESSION && isset($_SESSION['login'])) : ?>
<?php
require_once('inc/form.php');
if ($_POST) {

	$data = $_POST['data'];
	$pay = $_POST['pay'];
	
if(!$_SESSION) {
	$pass = $_POST['pass'];
} elseif ($_SESSION && (isset($_SESSION['pass']))) {
	$pass = $_SESSION['pass'];
} else {
	$pass = '';
}

$enter_email = $_SESSION['email'];
$database = new Database("SELECT email, valid, firstname, lastname FROM users WHERE valid = 1 AND email='".$enter_email."'");
$db = $database->getConnection();

while ($row = $db->fetch_assoc()) {
$username = $row['firstname']." ".$row['lastname'];
}

if ($db->num_rows > 0) {
	$valid = 1;
} else {
	$valid = 0;
}

		$login = $_SESSION['login'];
	if ($login != NULL) {
$database = new Database("ALTER TABLE bank AUTO_INCREMENT=0");
$db = $database->getConnection();
if (($db === TRUE) && ($valid == 1)) {
$database = new Database("INSERT INTO bank (pay, user) VALUES ('".$pay."', '".$username."')");
	$db = $database->getConnection();
}
if ($db === FALSE) {
	echo "Error<br>" . $db->error;
}

if ($valid == 1) {
$obj = new Db($data, $pay);
echo $obj->Write();
//header("Location: ".$_SERVER['PHP_SELF']);
} elseif ($valid == 0) {
	echo "<code>Ваша учетная запись не валидирована администратором</code>";
}

} else {
	echo '<code>вы не ввели пароль <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
</svg></code>';
}
} else {

// Create connection
$database = new Database("SELECT id, pay, date_pay FROM bank");
$db = $database->getConnection();
if ($db->num_rows > 0) {
	$sum = 0;
	$count = 0;
  // output data of each row
  while($row = $db->fetch_assoc()) {
    $sum += $row['pay'];
    $count++;
  }
} else {
  echo "<br />";
}
      echo ($count > 0) ? "<h2 class='h-2 m5'>Количество транзакций: ".$count."</h2><h3 class='m5 mb10'>Всего накоплено: ".$sum. "0₽</h3>" : "Транзакций не было. Стань первым!";
}
$db = $database->getCloseDb();
?>
<?php endif; ?>
<?php if(!isset($_SESSION['login'])) {
header('Location: '.HOME);
}
?>
<script src="js/print_rouble.js" crossorigin="anonymous"></script>