<?php
session_start();
require_once '../models/database.php';

// Kiểm tra nếu đã đăng nhập thì chuyển hướng về trang chủ
if (isset($_SESSION['user'])) {
    header('Location: home.php');
    exit();
}

// Xử lý form đăng nhập
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    
    // Debug
    error_log("=== Login Debug ===");
    error_log("Email: " . $email);
    
    // Kiểm tra trong bảng khách hàng
    $sql_kh = "SELECT *, 'khachhang' as user_type FROM khachhang WHERE Email = ? AND MatKhau = ?";
    $stmt_kh = $conn->prepare($sql_kh);
    $stmt_kh->bind_param("ss", $email, $password);
    $stmt_kh->execute();
    $result_kh = $stmt_kh->get_result();
    
    // Kiểm tra trong bảng nhân viên
    $sql_nv = "SELECT *, 'nhanvien' as user_type FROM nhanvien WHERE Email = ? AND MatKhau = ?";
    $stmt_nv = $conn->prepare($sql_nv);
    $stmt_nv->bind_param("ss", $email, $password);
    $stmt_nv->execute();
    $result_nv = $stmt_nv->get_result();
    
    if ($result_kh->num_rows > 0) {
        $user = $result_kh->fetch_assoc();
        error_log("Login successful - Customer ID: " . $user['MaKH']);
        $_SESSION['user'] = $user;
        header('Location: /DoanPHP/views/home.php');
        exit();
    } elseif ($result_nv->num_rows > 0) {
        $user = $result_nv->fetch_assoc();
        error_log("Login successful - Staff ID: " . $user['MaNV']);
        $_SESSION['user'] = $user;
        header('Location: ../admin/dashboard.php');
        exit();
    } else {
        error_log("Login failed - Invalid credentials");
        $error = "Email hoặc mật khẩu không chính xác.";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập - GenZShop</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include '../includes/header.php'; ?>

<div class="auth-page-wrapper">
    <div class="login-form">
        <h2>Đăng nhập</h2>
        <?php if (isset($_GET['reset']) && $_GET['reset'] === 'success'): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                Mật khẩu đã được đặt lại thành công. Vui lòng đăng nhập lại.
            </div>
        <?php endif; ?>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <?= $error ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
            </div>
            
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <div class="password-input-group">
                    <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
                    <i class="fas fa-eye toggle-password" onclick="togglePassword('password')"></i>
                </div>
            </div>
            
            <button type="submit" class="login-btn">
                <i class="fas fa-sign-in-alt"></i>
                Đăng nhập
            </button>
        </form>
        
        <div class="register-link">
            <a href="forgot-password.php">Quên mật khẩu?</a>
            <span class="separator">|</span>
            <a href="register.php">Đăng ký tài khoản</a>
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