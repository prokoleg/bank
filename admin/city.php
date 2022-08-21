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

$city = new Database("SELECT id, COUNT(*) FROM city GROUP BY id");
  $db = $city->getConnection();
while($row = $db->fetch_assoc()) {
  $num = $row['id'];
}
?>
    <h1 class="h2">Города <small style="font-size: 18px;">(всего <?= $num; ?>)</small></h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
<?php if (isset($_POST['addcity'])) :
$city = new Database("ALTER TABLE city AUTO_INCREMENT=0");
$db = $city->getConnection();
if ($db === TRUE) {
$city = new Database("INSERT INTO city (city) VALUES ('".$_POST['addcity']."')");
  $db = $city->getConnection();
}
echo "<span style='margin-right: 20px;'>Город <strong>".$_POST['addcity']."</strong> успешно занесен в БД</span>";
$db = $city->getCloseDb();
  endif;
?>
      	<form method="post">
      		<input type="text" name="addcity" autofocus="autofocus" placeholder="Добавьте город">
        <button type="submit" class="btn btn-sm btn-outline-secondary">Добавить</button>
        <button type="submit" class="btn btn-sm btn-outline-secondary" name="export">Export</button>
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

<script src="https://api-maps.yandex.ru/2.1/?apikey=null&lang=ru_RU&load=Geolink"
 type="text/javascript"></script>
<div class="col">
  <?php
$city = new Database("SELECT city FROM city ORDER BY city LIMIT 20");
$db = $city->getConnection();

if ($db->num_rows > 0) {
  // output data of each row
  while($row = $db->fetch_assoc()) {
  echo "\t\t<li class='city'><span class='ymaps-geolink'>".$row['city']."</span></li>\n";
  }
}
  ?>
    </div>
<div class="col">
  <?php
$city = new Database("SELECT city FROM city ORDER BY city LIMIT 20 OFFSET 20");
$db = $city->getConnection();

if ($db->num_rows > 0) {
  // output data of each row
  while($row = $db->fetch_assoc()) {
  echo "\t\t<li class='city'><span class='ymaps-geolink'>".$row['city']."</span></li>\n";
  }
}
  ?>
    </div>
<div class="col">
  <?php
$city = new Database("SELECT city FROM city ORDER BY city LIMIT 20 OFFSET 40");
$db = $city->getConnection();

if ($db->num_rows > 0) {
  // output data of each row
  while($row = $db->fetch_assoc()) {
  echo "\t\t<li class='city'><span class='ymaps-geolink'>".$row['city']."</span></li>\n";
  }
}
  ?>
    </div>
<div class="col">
  <?php
$city = new Database("SELECT city FROM city ORDER BY city LIMIT 20 OFFSET 60");
$db = $city->getConnection();

if ($db->num_rows > 0) {
  // output data of each row
  while($row = $db->fetch_assoc()) {
  echo "\t\t<li class='city'><span class='ymaps-geolink'>".$row['city']."</span></li>\n";
  }
}
  ?>
    </div>
<div class="col">
  <?php
$city = new Database("SELECT city FROM city ORDER BY city LIMIT 20 OFFSET 80");
$db = $city->getConnection();

if ($db->num_rows > 0) {
  // output data of each row
  while($row = $db->fetch_assoc()) {
  echo "\t\t<li class='city'><span class='ymaps-geolink'>".$row['city']."</span></li>\n";
  }
}
  ?>
    </div>
<div class="col">
  <?php
$city = new Database("SELECT city FROM city ORDER BY city LIMIT 20 OFFSET 100");
$db = $city->getConnection();

if ($db->num_rows > 0) {
  // output data of each row
  while($row = $db->fetch_assoc()) {
  echo "\t\t<li class='city'><span class='ymaps-geolink'>".$row['city']."</span></li>\n";
  }
}
  ?>
    </div>

  </div>
</div>
<?php
endif;