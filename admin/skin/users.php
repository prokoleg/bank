<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<h2>Пользователи</h2>
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
        <th scope="col">Город</th>
        <th scope="col">Роль</th>
      </tr>
    </thead>
    <tbody>
<?php
// получаем соединение с базой данных
include ('../inc/config.php');
$conn = new mysqli(HOST, USER, PASS, DATABASE);
$sql = "SELECT id, avatar, login, firstname, lastname, email, city, user_group FROM users";
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
              <td>".$row['city']."</td>
              <td>".$usergroup."</td>
            </tr>";

}  
  $conn->close();
?>
    </tbody>
  </table>
</div>
</main>