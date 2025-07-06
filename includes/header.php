<<<<<<< HEAD
<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<header class="main-header">
  <div class="logo">
     <a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>home.php">
     <img src="../assets/images/logoweb.jpg" alt="GenZShop Logo">    </a>
  </div>
  <div class="nav">
  <ul class="nav-links">
  <li class="menu-item">
    <a href="#">DANH MỤC</a>
    <ul class="submenu">
      <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>Adidas.php">ADIDAS</a></li>
      <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>Nike.php">NIKE</a></li>
      <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>Puma.php">PUMA</a></li>
      <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>Vans.php">VANS</a></li>
      <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>Converse.php">CONVERSE</a></li>
      <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>Fila.php">FILA</a></li>
      <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>Reebok.php">REEBOK</a></li>
      <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>GiayNam.php">GIÀY NAM</a></li>
      <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>GiayNu.php">GIÀY NỮ</a></li>
      <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>GiayDoi.php">GIÀY ĐÔI</a></li>
      <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>thanhly.php">THANH LÝ</a></li>
      <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>FlashSale.php">FLASHSALE</a></li>
      <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>DépAdidas.php">DÉP</a></li>
    </ul>
  </li>
    <li class="menu-item">
      <a href="#">GIÀY</a>
      <ul class="submenu">
        <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>Adidas.php">Adidas</a></li>
        <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>Nike.php">Nike</a></li>
        <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>Puma.php">Puma</a></li>
        <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>Vans.php">Vans</a></li>
        <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>Converse.php">Converse</a></li>
        <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>Fila.php">Fila</a></li>
        <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>Reebok.php">Reebok</a></li>
      </ul>
    </li>
    <li class="menu-item">  
      <a href="#">DÉP</a>
      <ul class="submenu">
         <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>DépAdidas.php">Adidas</a></li>
        <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>DépNike.php">Nike</a></li>
        <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>DépPuma.php">Puma</a></li>
      </ul>
    </li>
        <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>thanhly.php">THANH LÝ</a></li>
        <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>FlashSale.php" class="flashsale">FLASH SALE</a></li>
        <li><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>contact.php">LIÊN HỆ</a></li>
      </ul>
      </ul>
  </div>
  <div class="search-container">
    <form action="../views/search.php" method="GET" class="search-form">
      <input type="text" name="keyword" placeholder="Tìm kiếm sản phẩm..." required>
      <button type="submit">
        <i class="fa-solid fa-magnifying-glass"></i>
      </button>
    </form>
  </div>
  <div class="nav-icons">
    <div class="user-menu-wrapper" id="userMenuWrapper">
      <?php if (isset($_SESSION['user'])): ?>
        <?php 
          $fullname = $_SESSION['user']['TenKH'] ?? '';
          $nameParts = explode(' ', trim($fullname));
          $lastName = end($nameParts);
        ?>
        <div class="user-menu" id="userMenuIcon" style="font-weight:600; color:#111; cursor:pointer;">
          <i class="fa fa-user-circle fa-2x"></i> <span style="vertical-align:middle; margin-left:6px;">Xin chào, <?php echo htmlspecialchars($lastName); ?></span>
        </div>
        <div class="user-dropdown" id="userDropdown">
          <?php if (isset($_SESSION['user']['user_type']) && $_SESSION['user']['user_type'] === 'nhanvien'): ?>
            <a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../admin/dashboard.php' : '../admin/dashboard.php'; ?>">Quản trị</a>
            <a href="/DoanPHP/views/logout.php">Đăng xuất</a>
          <?php else: ?>
            <a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>profile.php">Tài khoản của tôi</a>
            <a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>orders.php">Đơn hàng của tôi</a>
            <a href="/DoanPHP/views/logout.php">Đăng xuất</a>
          <?php endif; ?>
        </div>
      <?php else: ?>
        <div class="user-menu" id="userMenuIcon">
          <i class="fa fa-user-circle fa-2x"></i>
        </div>
        <div class="user-dropdown" id="userDropdown">
          <a href="/DoanPHP/views/login.php">Đăng nhập</a>
          <a href="/DoanPHP/views/register.php">Đăng ký</a>
        </div>
      <?php endif; ?>
    </div>

    <a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/includes' ? '../' : ''; ?>cart.php" class="cart-icon-wrapper">
      <i class="fa-solid fa-cart-shopping fa-2x"></i>
      <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
        <span class="cart-count"><?php echo count($_SESSION['cart']); ?></span>
      <?php endif; ?>
    </a>
  </div>
  <script src="../assets/js/script.js"></script>
=======
<header class="main-header">
  <div class="logo">
     <a href="home.php">
    <img src="../assets/images/logoweb.jpg" alt="GenZShop Logo">
    </a>
  </div>
  <div class="nav">
  <ul class="nav-links">
    <li class="menu-item">
      <a href="#">GIÀY</a>
      <ul class="submenu">
        <li><a href="Adidas.php">Adidas</a></li>
        <li><a href="Nike.php">Nike</a></li>
        <li><a href="Puma.php">Puma</a></li>
        <li><a href="Vans.php">Vans</a></li>
        <li><a href="Converse.php">Converse</a></li>
        <li><a href="Fila.php">Fila</a></li>
        <li><a href="Reebok.php">Reebok</a></li>
      </ul>
    </li>

    <li class="menu-item">  
      <a href="#">DÉP</a>
      <ul class="submenu">
         <li><a href="DépAdidas.php">Adidas</a></li>
        <li><a href="DépNike.php">Nike</a></li>
        <li><a href="DépPuma.php">Puma</a></li>
      </ul>
    </li>
        <li><a href="thanhly.php">THANH LÝ</a></li>
        <li><a href="FlashSale.php" class="flashsale">FLASH ⚡ SALE</a></li>
      </ul>
      </ul>
  </div>
  <div class="nav-icons">
    <div class="user-menu-wrapper" id="userMenuWrapper">
  <div class="user-menu" id="userMenuIcon">
    <i class="fa fa-user-circle fa-2x"></i>
  </div>
  <div class="user-dropdown" id="userDropdown">
    <button onclick="openLogin()">Đăng nhập</button>
    <button onclick="openZalo()">Đăng nhập qua Zalo</button>
    <button onclick="openRegister()">Đăng ký</button>
  </div>
</div>


    <a href="#"><i class="fa-solid fa-magnifying-glass fa-2x"></i></a>
    <a href="checkout.php">
      <i class="fa-solid fa-cart-shopping fa-2x"></i></a>
      </div>
      <!-- Modal Đăng Nhập -->
<div id="loginModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('loginModal')">&times;</span>
    <h2>Đăng nhập</h2>
    <input type="text" placeholder="Số điện thoại hoặc email">
    <input type="password" placeholder="Mật khẩu">
    <button>Đăng nhập</button>
    <div class="auth-switch">
      <a onclick="switchToRegister()">Chưa có tài khoản? Đăng ký</a><br>
      <a onclick="switchToZalo()">Đã có tài khoản bằng Zalo</a>
    </div>
  </div>
</div>
<!-- Modal Đăng nhập Zalo -->
<div id="zaloModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('zaloModal')">&times;</span>
    <h2>KHÁCH HÀNG ĐĂNG NHẬP</h2>
    <input type="text" placeholder="Số điện thoại có Zalo">
    <button>TIẾP TỤC</button>
    <div class="auth-switch">
      <a onclick="switchToLogin()">Đăng nhập bằng mật khẩu</a> |
      
      <a href="javascript:void(0);" onclick="openModal('modalLienHe')">Liên hệ hỗ trợ</a>
      
    </div>
  </div>
</div>

<!-- Modal Đăng Ký -->
<div id="registerModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeModal('registerModal')">&times;</span>
    <h2>Đăng ký</h2>
    <input type="text" placeholder="Họ tên">
    <input type="email" placeholder="Email">
    <input type="password" placeholder="Mật khẩu">
    <button>Đăng ký</button>
    <div class="auth-switch">
      <a onclick="switchToLogin()">Đã có tài khoản? Đăng nhập</a>
     
    </div>
  </div>
</div>

      <script src="../assets/js/script.js"></script>
>>>>>>> 9934819e0c09fc0f54bcd0b6242e6210abb6e70a
</header>
