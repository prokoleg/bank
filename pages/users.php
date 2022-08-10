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
// получаем соединение с базой данных
$database = new Database("SELECT login, avatar, user_group FROM users");
$db = $database->getConnection();

if ($db->num_rows > 0) {
  while($row = $db->fetch_assoc()) {
  	$users = new User($row['login'], '');
  	$avatar = new Pictures($row['avatar']);

    if($row['user_group'] == 1) {
      $border = 'avatar_border_admin';
    } else {
      $border = 'avatar_border_user';
    }

  	echo "\t<div class='avatar center mr10'><a href='user/".$users->getUserName()."'><img src='".$avatar->getAvatar()."' height='60px' width='60px' alt='".$avatar->getAvatar()."' title='".$users->getUserName()."' class='avatar_border ".$border." avatar_margin_right'></a><br>".$row['login']."</div>\n";
  }  
  $db = $database->getCloseDb();
} else {
  echo "<div class='center'><code>Пользователи отстутствуют. Вы можете <a href='registration'>стать первым</a>!</code></div>";
}
?>
  </td></tr>
</tbody>
<footer>
  <tr><td>
    <small><strong>Легенда:</strong> <a href='?group=1'><span class="color_admin">Администратор</span></a>, <a href='?group=2'><span class="color_user">Пользователь</span></a></small>
  </td></tr>

<?php
// Отображаем юзеров из выбранной группы
if (isset($_GET['group'])) {

$database = new UserGroup($_GET['group']);
$db = $database->Group();
if ($db->num_rows > 0) {
  echo "<tr><td>";
while ($row = $db->fetch_assoc()) {
  echo "<a href='user/".$users->getUserName()."'>".$row['login']."</a>";
}
echo "</td></tr>";
}
}
?>
</footer>
</table>
<!-- Вывод всех транзакций -->
<?php endif; ?>
<?php if(!isset($_SESSION['login'])) {
header('Location: '.HOME);
}