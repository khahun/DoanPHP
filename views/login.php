
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập</title>
  <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>

  <div class="auth-container">
    <h2>Đăng nhập</h2>
    <form method="post" action="">
      <input type="text" name="username" placeholder="Tên đăng nhập" required>
      <input type="password" name="password" placeholder="Mật khẩu" required>
      <button type="submit">Đăng nhập</button>
    </form>
    <p>Bạn chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
  </div>
 
</body>
</html>

