<?php
// script by Prokofiev Oleg info@blanet.ru ©2022
//
// Права на данный скрипт пренадлежает его автору.
// Модификация и использование данного скрипта разрешается только с разрешения
// его автора Прокофьева Олега (info@blanet.ru)
// Незаконное использование и распространение скрипта ЗАПРЕЩЕНО
// Скрипт распространяется по лицензии MIT

if ($_GET) :
	include_once ('../inc/classes/class_db.php');
?>
    <h1 class="h2">Пользователи</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
<?php
?>
      	<form method="post">
        <button type="submit" class="btn btn-sm btn-outline-secondary" disabled>Добавить</button>
        <button type="submit" class="btn btn-sm btn-outline-secondary" name="export" disabled>Export</button>
    </form>
      </div>
      <!--<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar" class="align-text-bottom"></span>
        This week
      </button> -->
    </div>
  </div>
  <div style="height: 100%;">
  <div class="row align-items-start">

<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Аватар</th>
        <th scope="col">Логин</th>
        <th scope="col">Имя</th>
        <th scope="col">Фамилия</th>
        <th scope="col">Почта</th>
        <th scope="col">IP</th>
        <th scope="col">Город</th>
        <th scope="col">Роль</th>
        <th scope="col">Удалить</th>
      </tr>
    </thead>
    <tbody>
<?php
// получаем соединение с базой данных
//include_once ('../inc/config.php');
$conn = new mysqli(HOST, USER, PASS, DATABASE);
$sql = "SELECT id, avatar, login, firstname, lastname, email, city, ip, user_group FROM users";
$result = $conn->query($sql);
while($row = mysqli_fetch_array($result))
{

	$usergroup = ($row['user_group'] == '1') ? "<span style='color: red'>Админ</span>" : "<span style='color: blue'>Пользователь</span>";

  	echo "  <tr>
              <td>".$row['id']."</td>
              <td><img src='../img/avatars/".$row['avatar']."' width='30px'></td>
              <td>".$row['login']."</td>
              <td>".$row['firstname']."</td>
              <td>".$row['lastname']."</td>
              <td><a href='mailto:".$row['email']."'>".$row['email']."</a></td>
              <td>".$row['ip']."</td>
              <td>".$row['city']."</td>
              <td>".$usergroup."</td>
              <td><a href='?users=true&del=".$row['id']."'>х</a></td>
            </tr>";

}

if (isset($_GET['del'])) {
  $userid = $_GET['del'];

    // Удаляем юзера
    $database = new Database("SELECT id, avatar FROM users WHERE id='".$userid."'");
    $db = $database->getConnection();
    while ($row = $db->fetch_assoc()) {
    $avatar = $row['avatar'];
    }

    $database = new Database("DELETE FROM users WHERE id='".$userid."'");
    $db = $database->getConnection();

  $delete = new Delete($userid, $avatar);
  echo $delete->UserDelete();
}
	
  $conn->close();

?>
    </tbody>
  </table>
</div>

  </div>
</div>

<?php
endif;