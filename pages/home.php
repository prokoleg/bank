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
$conn = new mysqli(HOST, USER, PASS, DATABASE);
  $sql = "SELECT email, valid FROM users WHERE valid = 1 AND email='".$enter_email."'";
  $result = $conn->query($sql);
if ($result->num_rows > 0) {
	$valid = 1;
} else {
	$valid = 0;
}

	if ($valid = 1) {
// Create connection
$conn = new mysqli(HOST, USER, PASS, DATABASE);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "ALTER TABLE bank AUTO_INCREMENT=0";
if (($conn->query($sql) === TRUE) && ($valid == 1)) {
$sql = "INSERT INTO bank (pay) VALUES ($pay)";
}
if ($conn->query($sql) === FALSE) {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

if ($valid == 1) {
$obj = new Db($data, $pay);
echo $obj->Write();
header("Refresh: 0");
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
$conn = new mysqli(HOST, USER, PASS, DATABASE);
$sql = "SELECT id, pay, date_pay FROM bank";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$sum = 0;
	$count = 0;
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $sum += $row['pay'];
    $count++;
  }
} else {
  echo "0 results";
}
      echo "<h2 class='h-2 m5'>Количество транзакций: ".$count."</h2>";
      echo "<h3 class='m5 mb10'>Всего накоплено: ".$sum. "00₽</h3>";
$conn->close();
}

?>

<script src="js/print_rouble.js" crossorigin="anonymous"></script>