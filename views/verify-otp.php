<?php
session_start();
require_once '../models/database.php';

// Kiểm tra xem có email trong session không
if (!isset($_SESSION['reset_email'])) {
    header('Location: forgot-password.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $otp = trim($_POST['otp'] ?? '');
    $email = $_SESSION['reset_email'];
    
    // Debug thông tin
    error_log("=== OTP Verification Debug ===");
    error_log("Email from session: " . $email);
    error_log("OTP entered: " . $otp);
    
    // Kiểm tra OTP trong database
    $sql = "SELECT * FROM password_resets WHERE email = ? ORDER BY created_at DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        error_log("Found OTP record:");
        error_log("ID: " . $row['id']);
        error_log("Stored OTP: " . $row['otp']);
        error_log("Created at: " . $row['created_at']);
        error_log("Expires at: " . $row['expires_at']);
        error_log("Is used: " . $row['is_used']);
        
        // Kiểm tra OTP
        if ($row['otp'] === $otp) {
            error_log("OTP matches");
            
            // Kiểm tra thời gian hết hạn
            if (strtotime($row['expires_at']) > time()) {
                error_log("OTP is not expired");
                
                // Kiểm tra trạng thái sử dụng
                if ($row['is_used'] == 0) {
                    error_log("OTP is not used yet");
                    
                    // Đánh dấu OTP đã sử dụng
                    $sql = "UPDATE password_resets SET is_used = 1 WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("i", $row['id']);
                    $stmt->execute();
                    
                    error_log("OTP marked as used");
                    
                    // Chuyển hướng đến trang đặt lại mật khẩu
                    header('Location: reset-password.php');
                    exit();
                } else {
                    error_log("OTP has already been used");
                    $error = "Mã OTP đã được sử dụng. Vui lòng yêu cầu mã mới.";
                }
            } else {
                error_log("OTP is expired");
                $error = "Mã OTP đã hết hạn. Vui lòng yêu cầu mã mới.";
            }
        } else {
            error_log("OTP does not match");
            $error = "Mã OTP không chính xác.";
        }
    } else {
        error_log("No OTP record found for email: " . $email);
        $error = "Không tìm thấy mã OTP. Vui lòng yêu cầu mã mới.";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xác nhận mã OTP - GenZShop</title>
    <link rel="stylesheet" href="/DoanPHP/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include '../includes/header.php'; ?>

<div class="auth-page-wrapper">
    <div class="login-form">
        <h2>Xác nhận mã OTP</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i>
                <?= $error ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="otp">Mã OTP</label>
                <input type="text" id="otp" name="otp" placeholder="Nhập mã OTP đã nhận" required>
            </div>
            
            <button type="submit" class="login-btn">
                <i class="fas fa-check"></i>
                Xác nhận
            </button>
        </form>
        
        <div class="register-link">
            <a href="forgot-password.php">Quay lại</a>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 