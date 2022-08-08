<?php if($_SESSION && isset($_SESSION['login'])) : ?>
<!-- Вывод всех транзакций -->
	<h1 class="m5 mb5">Таблица взносов</h1>
    <form method="post">
<table class="table table-hover table-bordered">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Сумма</th>
      <th scope="col">Кто внес</th>
      <th scope="col">Дата(г.м.д), время(ч.м.с)</th>
    </tr>
  </thead>
  <tbody>
<?php
$conn = new mysqli(HOST, USER, PASS, DATABASE);
$sql = "SELECT id, pay, user, date_pay FROM bank";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$sum = 0;
	$count = 0;
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $sum += $row['pay'];
    $count++;
    echo "\t<tr><th scope='row'>{$count}</th><td>{$row['pay']}0</td><td>{$row['user']}</td><td>{$row['date_pay']}</td></tr>\n";
  }
} else {
  echo "<p class='m10 mb5 center'>Взносов не было. Вы можете <a href='?link=insert_pay'>стать первым!</a></p>";
}

$conn->close();
?>
  </tbody>
</table>
<!-- Вывод всех транзакций -->
<?php endif; ?>
<?php if(!isset($_SESSION['login'])) {
header('Location: '.HOME);
}