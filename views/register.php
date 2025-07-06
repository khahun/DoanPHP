<?php
session_start();
include_once __DIR__ . '/../models/database.php';

$error = '';
$success = '';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    
    // Kiểm tra email đã tồn tại chưa
    $check_email = "SELECT * FROM khachhang WHERE Email = '$email'";
    $result_check = mysqli_query($conn, $check_email);
    
    if (mysqli_num_rows($result_check) > 0) {
        $error = "Email đã tồn tại! Vui lòng sử dụng email khác.";
    } else {
        // Thêm user mới
        $result_insert = newUser($name, $email, $sdt, $address, $password);
        if ($result_insert) {
            $_SESSION['success'] = "Đăng ký thành công! Vui lòng đăng nhập.";
            header("Location: login.php"); // Chuyển hướng sau khi đăng ký thành công
            exit();
        } else {
            $error = "Đăng ký thất bại! Vui lòng thử lại.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng ký - GenZShop</title>
    <link rel="stylesheet" href="/DoanPHP/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/../includes/header.php'; ?>

<div class="auth-page-wrapper">
    <div class="register-container">
        <h2>Đăng ký tài khoản</h2>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                <?php echo $success; ?>
            </div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Họ và tên</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập họ và tên của bạn" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email của bạn" required>
            </div>
            <div class="form-group">
                <label for="sdt">Số điện thoại</label>
                <input type="tel" class="form-control" id="sdt" name="sdt" placeholder="Nhập số điện thoại của bạn" required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ của bạn" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <div class="password-input-group">
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('password')"></i>
                </div>
            </div>
            
            <div class="form-group">
                <label for="confirm_password">Xác nhận mật khẩu</label>
                <div class="password-input-group">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('confirm_password')"></i>
                </div>
            </div>
            <button type="submit" name="register" class="btn btn-primary">
                <i class="fas fa-user-plus"></i>
                Đăng ký
            </button>
        </form>
        <p class="mt-3">Đã có tài khoản? <a href="login.php">Đăng nhập ngay</a></p>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function togglePassword(inputId) {
    const passwordInput = document.getElementById(inputId);
    const icon = passwordInput.nextElementSibling;
    
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        passwordInput.type = "password";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
}
</script>
<style>
.password-input-group {
    position: relative;
    display: flex;
    align-items: center;
}

.password-input-group input {
    width: 100%;
    padding-right: 40px;
}

.toggle-password {
    position: absolute;
    right: 10px;
    cursor: pointer;
    color: #666;
    transition: color 0.3s;
}

.toggle-password:hover {
    color: #333;
}
</style>
</body>
</html> 