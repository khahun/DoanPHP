<header class="main-header">
  <div class="logo">
     <a href="home.php">
    <img src="../assets/images/logo.jpg" alt="GenZShop Logo">
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
      </ul>
    </li>

    <li class="menu-item">  
      <a href="#">DÉP</a>
      <ul class="submenu">
         <li><a href="Adidas.php">Adidas</a></li>
        <li><a href="Nike.php">Nike</a></li>
        <li><a href="Puma.php">Puma</a></li>
      </ul>
    </li>
        <li><a href="#">THANH LÝ</a></li>
        <li><a href="FlashSale.php" class="flashsale">FLASH ⚡ SALE</a></li>
      </ul>
      </ul>
  </div>
  <div class="nav-icons">
   <div class="user-menu">
  <i class="fa fa-user-circle fa-2x"></i>
  <div class="user-dropdown">
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
      
      <a href="#">Liên hệ hỗ trợ</a>
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

      <script src="../assets/script.js"></script>
</header>
