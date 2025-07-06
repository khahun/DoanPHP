<?php
session_start();
require_once '../models/database.php';
require_once '../send_mail/PHPMailer.php';
require_once '../send_mail/SMTP.php';
require_once '../send_mail/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    
    // Debug
    error_log("Processing forgot password for email: " . $email);
    
    // Kiểm tra email tồn tại trong database
    $sql = "SELECT * FROM khachhang WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Tạo mã OTP ngẫu nhiên 6 số
        $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        
        // Thời gian hết hạn (15 phút)
        $expires_at = date('Y-m-d H:i:s', strtotime('+15 minutes'));
        
        // Debug
        error_log("Generated OTP: " . $otp);
        error_log("Expires at: " . $expires_at);
        
        // Xóa các OTP cũ của email này
        $sql = "DELETE FROM password_resets WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        
        // Lưu OTP mới vào database
        $sql = "INSERT INTO password_resets (email, otp, expires_at, is_used) VALUES (?, ?, ?, 0)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $email, $otp, $expires_at);
        
        if ($stmt->execute()) {
            error_log("OTP saved successfully to database");
            
            // Gửi email chứa mã OTP sử dụng PHPMailer
            $mail = new PHPMailer(true);
            
            try {
                // Tắt debug mode
                $mail->SMTPDebug = SMTP::DEBUG_OFF;
                
                // Cấu hình server
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'nghacs02@gmail.com';
                $mail->Password = 'xqluflkhfbcrwvry';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->CharSet = 'UTF-8';
                
                // Cấu hình bổ sung
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                // Người gửi và người nhận
                $mail->setFrom('nghacs02@gmail.com', 'GenZShop');
                $mail->addAddress($email);

                // Nội dung email
                $mail->isHTML(true);
                $mail->Subject = 'Yêu cầu đặt lại mật khẩu - GenZShop';
                $mail->Body = "
                    <h2>Yêu cầu đặt lại mật khẩu</h2>
                    <p>Xin chào,</p>
                    <p>Chúng tôi nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>
                    <p>Mã OTP của bạn là: <strong>{$otp}</strong></p>
                    <p>Mã này sẽ hết hạn sau 15 phút.</p>
                    <p>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.</p>
                    <p>Trân trọng,<br>GenZShop</p>
                ";

                $mail->send();
                error_log("Email sent successfully");
                
                // Xóa output buffer trước khi chuyển hướng
                ob_clean();
                $_SESSION['reset_email'] = $email;
                header('Location: verify-otp.php');
                exit();
            } catch (Exception $e) {
                error_log("Failed to send email: " . $mail->ErrorInfo);
                $error = "Không thể gửi email. Vui lòng thử lại sau. Lỗi: {$mail->ErrorInfo}";
            }
        } else {
            error_log("Failed to save OTP to database");
            $error = "Có lỗi xảy ra. Vui lòng thử lại sau.";
        }
    } else {
        error_log("Email not found in database: " . $email);
        $error = "Email không tồn tại trong hệ thống.";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quên mật khẩu - GenZShop</title>
    <link rel="stylesheet" href="/DoanPHP/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include '../includes/header.php'; ?>

<div class="auth-page-wrapper">
    <div class="login-form">
        <h2>Quên mật khẩu</h2>
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
            
            <button type="submit" class="login-btn">
                <i class="fas fa-paper-plane"></i>
                Gửi mã xác nhận
            </button>
        </form>
        
        <div class="register-link">
            <a href="login.php">Quay lại đăng nhập</a>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 