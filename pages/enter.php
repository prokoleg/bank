<?php if (REQUEST == 'link=enter&registration=false') : ?>
<h1 class="m5 mb5">Вход</h1>
<?php endif; ?>
<?php if (REQUEST == 'link=enter&registration=true') : ?>
  <h1 class="m5">Регистрация</h1>
  <?php endif; ?>
<ul class="nav nav-tabs nav-fill">
  <li class="nav-item">
  <a class="nav-link" href="../singin">Вход</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="../registration">Регистрация</a>
  </li>
</ul>

<?php if ((REQUEST == 'link=enter') || (REQUEST == 'link=enter&registration=false')) : ?>
<!-- Форма входа -->
<form method="post">
<div class="mb-3 row g-3 m5">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" name="enter_email" class="form-control" id="staticEmail" autofocus="autofocus" placeholder="email@example.com">
    </div>
  </div>
<div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Пароль</label>
    <div class="col-sm-10">
      <input type="password" name="enter_pass" class="form-control" id="inputPassword" placeholder="Пароль">
    </div>
  </div>
    <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" name="save_me" type="checkbox" id="gridCheck" checked>
      <label class="form-check-label" for="gridCheck">Запомнить меня</label>
    </div>
  </div>
  <button class="btn btn-outline-primary btn-lg btn-block mb10 m2">Войти</button>
</form>
<!-- Форма входа -->
<?php endif; ?>

<?php if (REQUEST == 'link=enter&registration=true') : ?>
<!-- Форма регистрации -->
<form class="row g-3 mt10" method="post">
    <div class="col-md-6">
    <label for="firstname" class="form-label">Имя</label>
    <input name="firstname" type="text" class="form-control" id="firstname" autofocus="autofocus"  required="required">
  </div>
    <div class="col-md-6">
    <label for="lastname" class="form-label">Фамилия</label>
    <input name="lastname" type="text" class="form-control" id="lastname" required="required">
  </div>
  <div class="col-md-6">
    <label for="inputLogin" class="form-label">Логин</label>
    <input name="login" type="text" class="form-control" id="inputLogin" required="required">
  </div>
    <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input name="email" type="email" class="form-control" id="inputEmail4" required="required">
  </div>
  <div class="col-md-6">
    <label for="inputPassword" class="form-label">Пароль</label>
    <input name="password" type="password" class="form-control" id="inputPassword" required="required">
  </div>
    <div class="col-md-6">
    <label for="inputPassword2" class="form-label">Пароль (еще раз)</label>
    <input name="password2" type="password" class="form-control" id="inputPassword2" required="required">
  </div>
    <div class="col-md-2">
    <label for="inputPhone" class="form-label">Телефон</label>
    <input class="form-control" name="phone" id="inputPhone" type="tel" maxlength="50"
         required="required"
         pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}"
         placeholder="+71234567890">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Город</label>
    <select id="inputCity" class="form-select" name="city" required="required">
        <option selected value="null">...</option>
<?php
$city = new Database("SELECT city FROM city");
$db = $city->getConnection();

if ($db->num_rows > 0) {
  // output data of each row
  while($row = $db->fetch_assoc()) {
  echo "\t\t<option>".$row['city']."</option>\n";
  }
}
$db = $city->getCliseDb();
?>
    </select>
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" name="save_me" type="checkbox" id="gridCheck" checked>
      <label class="form-check-label" for="gridCheck">Запомнить меня</label>
    </div>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-outline-primary btn-lg btn-block mb10 m2">Регистрация</button>
  </div>
</form>
<!-- Форма регистрации -->
<?php endif; ?>
<?php

// Регистрация пользователя (запись в БД)
if (!empty($_POST['email'])) {
  $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
  $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
  $login = isset($_POST['login']) ? $_POST['login'] : '';
  $email = isset($_POST['email']) ? $_POST['email'] : '';
  $pass = (isset($_POST['password']) == $_POST['password2']) ? $_POST['password'] : '';
  $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
  $city = isset($_POST['city']) ? $_POST['city'] : '';
  $avatar = 'noavatar.png';
  $save_me = isset($_POST['save_me']) ? $_POST['save_me'] : '';

$reg = new Database("ALTER TABLE users AUTO_INCREMENT=0");
$db = $reg->getConnection();
if ($db === TRUE) {
$reg = new Database("INSERT INTO users (firstname, lastname, login, email, password, phone, city, avatar, save_me) VALUES ('".$firstname."', '".$lastname."', '".$login."', '".$email."', '".$pass."', '".$phone."', '".$city."', '".$avatar."', '".$save_me."')");
  $db = $reg->getConnection();
}

if ($db == TRUE) {
  echo "Учетная запись для <strong>{$login}</strong> успешно создана!";
} else {
  echo "Ups...";
}
$db = $reg->getCliseDb();
}

// Идентификация пользователя (логин в БД)
if (!empty($_POST['enter_email'])) {
  $enter_email = $_POST['enter_email'];
  $enter_pass = $_POST['enter_pass'];
  $remember_me = $_POST['save_me'];

  $_SESSION['email'] = $enter_email;

  $singin = new Database("SELECT login, email, password, valid, firstname, lastname FROM users WHERE email='".$enter_email."' AND password='".$enter_pass."'");
  $db = $singin->getConnection();
while($row = $db->fetch_assoc()) {
  $_SESSION['firstname'] = $row['firstname'];
  $_SESSION['lastname'] = $row['lastname'];
  $_SESSION['login'] = $row['login'];
  echo (($row['email'] === $enter_email) && ($row['password'] === $_POST['enter_pass'])) ? "Вы вошли как {$enter_email}" : (($row['valid'] === 0) ? "<code>Запросите у администрации валидации вашего аккаунта</code>" : "Введите пароль или email");
}
$db = $singin->getCliseDb();
  echo "<meta http-equiv='refresh' content='0; URL=".HOME."'>";
}
