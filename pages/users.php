<?php if($_SESSION && isset($_SESSION['login'])) : ?>
<!-- Вывод всех транзакций -->
	<h1 class="m5 mb5">Пользователи</h1>
<table class="table table-hover table-bordered">
  <thead class="table-light">
    <tr>
      <th scope="col" colspan="2">Пользователи</th>
    </tr>
  </thead>
  <tbody>
  	<tr><td>
<?php
$conn = new mysqli(HOST, USER, PASS, DATABASE);
$sql = "SELECT login, avatar, user_group FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
  	$users = new User($row['login'], '');
  	$avatar = new Pictures($row['avatar']);

    if($row['user_group'] == 1) {
      $border = 'avatar_border_admin';
    } else {
      $border = 'avatar_border_user';
    }

  	echo "\t<div class='avatar center mr10'><a href='user/".$users->getUserName()."'><img src='".$avatar->getAvatar()."' height='60px' width='60px' alt='".$avatar->getAvatar()."' title='".$users->getUserName()."' class='avatar_border ".$border." avatar_margin_right'></a><br>".$row['login']."</div>\n";
  }
} else {
  echo "<div class='center'><code>Пользователи отстутствуют. Вы можете <a href='registration'>стать первым</a>!</code></div>";
}
$conn->close();
?>
  </td></tr>
</tbody>
<footer>
  <tr><td>
    <strong>Легенда:</strong> <span class="color_admin">Администратор</span>, <span class="color_user">Пользователь</span>
  </td></tr>
</footer>
</table>
<!-- Вывод всех транзакций -->
<?php endif; ?>
<?php if(!isset($_SESSION['login'])) {
header('Location: '.HOME);
}