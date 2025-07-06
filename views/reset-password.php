<?php
session_start();
require_once '../models/database.php';

// Kiểm tra xem có email trong session không
if (!isset($_SESSION['reset_email'])) {
    header('Location: forgot-password.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_SESSION['reset_email'];
    $password = trim($_POST['password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');
    
    // Debug
    error_log("=== Reset Password Debug ===");
    error_log("Email: " . $email);
    
    // Kiểm tra mật khẩu
    if (strlen($password) < 6) {
        $error = "Mật khẩu phải có ít nhất 6 ký tự.";
    } elseif ($password !== $confirm_password) {
        $error = "Mật khẩu xác nhận không khớp.";
    } else {
        // Cập nhật mật khẩu mới (không mã hóa)
        $sql = "UPDATE khachhang SET MatKhau = ? WHERE Email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $password, $email);
        
        if ($stmt->execute()) {
            error_log("Password updated successfully");
            
            // Xóa session
            unset($_SESSION['reset_email']);
            
            // Chuyển hướng đến trang đăng nhập
            header('Location: login.php?reset=success');
            exit();
        } else {
            error_log("Failed to update password");
            $error = "Có lỗi xảy ra. Vui lòng thử lại sau.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt lại mật khẩu - GenZShop</title>
    <link rel="stylesheet" href="/DoanPHP/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include '../includes/header.php'; ?>

<div class="auth-page-wrapper">
    <div class="login-form">
        <h2>Đặt lại mật khẩu</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <?= $error ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="password">Mật khẩu mới</label>
                <div class="password-input-group">
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu mới" required>
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('password')"></i>
                </div>
            </div>
            
            <div class="form-group">
                <label for="confirm_password">Xác nhận mật khẩu</label>
                <div class="password-input-group">
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu mới" required>
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('confirm_password')"></i>
                </div>
            </div>
            
            <button type="submit" class="login-btn">
                <i class="fas fa-key"></i>
                Đặt lại mật khẩu
            </button>
        </form>
        
        <div class="register-link">
            <a href="login.php">Quay lại đăng nhập</a>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
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