<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="position: fixed;">
  <div class="position-sticky pt-3 sidebar-sticky">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="<?= ADMIN ?>">
          <span data-feather="home" class="align-text-bottom"></span>
          Админпанель
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= ADMIN ?>/?city=true">
          <span data-feather="globe" class="align-text-bottom"></span>
          Города
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= ADMIN ?>/?users=true">
          <span data-feather="users" class="align-text-bottom"></span>
          Пользователи
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file" class="align-text-bottom"></span>
          Orders
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="shopping-cart" class="align-text-bottom"></span>
          Products
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="users" class="align-text-bottom"></span>
          Customers
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= ADMIN ?>/?stat=true">
          <span data-feather="bar-chart-2" class="align-text-bottom"></span>
          Статистика
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="layers" class="align-text-bottom"></span>
          Integrations
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
      <span>Saved reports</span>
      <a class="link-secondary" href="#" aria-label="Add a new report">
        <span data-feather="plus-circle" class="align-text-bottom"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2">
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Social engagement
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">
          <span data-feather="file-text" class="align-text-bottom"></span>
          Year-end sale
        </a>
      </li>
    </ul>
  </div>
</nav>