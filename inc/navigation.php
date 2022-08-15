<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="../">
      <img src="../img/logo.webp" alt="logo" class="img-fluid" style="margin-left: 5vw;">
    </a>
    <!-- mobile menu -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <!-- mobile menu -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../">Главная</a>
        </li>
        <?php if($_SESSION && isset($_SESSION['login'])) : ?>
        <li class="nav-item">
          <a class="nav-link" href="../pay">Внести</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../list">Взносы</a>
        </li>
      <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link" href="../qr">QR-code</a>
        </li>
        <li class="nav-item">
          <?php if(!$_SESSION || empty($_SESSION['login'])) : ?>
          <a class="nav-link" href="../singin">Вход</a>
        <?php endif; ?>
        <?php if($_SESSION && isset($_SESSION['login'])) : ?>
        <li class="nav-item">
          <a class="nav-link" href="../users">Пользователи</a>
        </li>
        <!-- dropdown -->
        <div id="block">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['login']; ?></a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../cabinet"><i class="bi bi-info-square"></i> Личный кабинет</a></li>
<?php
if ($_SESSION['user_group'] == User::getNumberGroup()) {
?>
            <li><a class='dropdown-item' href='../admin'><i class="bi bi-diagram-3"></i> Админпанель</a></li>
<?php } ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../logout"><i class="bi bi-box-arrow-right"></i> Выход</a></li>
          </ul>
        </li>
      </div>
        <!-- dropdown -->
        <?php endif; ?>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Поиск" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Искать</button>
      </form>
    </div>
  </div>
</nav>
