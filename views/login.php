<?php include '../includes/header.php'; ?>
<div class="form-container">
    <h2>Đăng Nhập</h2>
    <form action="#" method="post" class="auth-form">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Đăng nhập</button>
        <p>Chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
    </form>
</div>
<?php include '../includes/footer.php'; ?>
