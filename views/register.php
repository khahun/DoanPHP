<?php include '../includes/header.php'; ?>
<div class="form-container">
    <h2>Đăng Ký</h2>
    <form action="#" method="post" class="auth-form">
        <label for="fullname">Họ tên:</label>
        <input type="text" id="fullname" name="fullname" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Xác nhận mật khẩu:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <button type="submit">Đăng ký</button>
        <p>Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
    </form>
</div>
<?php include '../includes/footer.php'; ?>
