<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 250px; min-height: 100vh; position:fixed;">
  <a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/admin/includes' ? '../dashboard.php' : 'dashboard.php'; ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
    <span class="fs-4"><i class="fa-solid fa-gauge"></i> Admin Panel</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/admin/includes' ? '../dashboard.php' : 'dashboard.php'; ?>" class="nav-link link-dark"><i class="fa-solid fa-house"></i> Dashboard</a>
    </li>
    <li>
      <a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/admin/includes' ? '../products.php' : 'products.php'; ?>" class="nav-link link-dark"><i class="fa-solid fa-box-open"></i> Quản lý sản phẩm</a>
    </li>
    <li>
      <a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/admin/includes' ? '../orders.php' : 'orders.php'; ?>" class="nav-link link-dark"><i class="fa-solid fa-file-invoice-dollar"></i> Quản lý đơn hàng</a>
    </li>
    <li>
      <a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/admin/includes' ? '../customers.php' : 'customers.php'; ?>" class="nav-link link-dark"><i class="fa-solid fa-users"></i> Quản lý khách hàng</a>
    </li>
    <li>
      <a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/admin/includes' ? '../categories.php' : 'categories.php'; ?>" class="nav-link link-dark"><i class="fa-solid fa-list"></i> Quản lý danh mục</a>
    </li>
    <li>
      <a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/admin/includes' ? '../content.php' : 'content.php'; ?>" class="nav-link link-dark"><i class="fa-solid fa-newspaper"></i> Quản lý nội dung</a>
    </li>
  </ul>
  <hr>
  <div class="dropdown">
    <a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/admin/includes' ? '../profile.php' : 'profile.php'; ?>" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
      <i class="fa-solid fa-user-shield me-2"></i> Admin
    </a>
    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
      <li><a class="dropdown-item" href="/DoanPHP/views/home.php">Về trang người dùng</a></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="/DoanPHP/views/logout.php">Đăng xuất</a></li>
    </ul>
  </div>
</div> 