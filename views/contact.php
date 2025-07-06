<?php
session_start();
require_once '../models/database.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    if (empty($name) || empty($email) || empty($phone) || empty($subject) || empty($message)) {
        $error = 'Vui lòng điền đầy đủ thông tin.';
    } else {
        // Thêm thông tin liên hệ vào database
        $sql = "INSERT INTO contact (TenKH, Email, SDT, TieuDe, NoiDung, NgayGui) VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);
        
        if ($stmt->execute()) {
            $success = 'Cảm ơn bạn đã liên hệ. Chúng tôi sẽ phản hồi sớm nhất có thể!';
            // Reset form
            $name = $email = $phone = $subject = $message = '';
        } else {
            $error = 'Có lỗi xảy ra. Vui lòng thử lại sau.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Liên hệ - GenZShop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .contact-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }
        
        .contact-info {
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        }
        
        .contact-info h2 {
            font-size: 1.8rem;
            color: #111;
            margin-bottom: 20px;
        }
        
        .contact-info p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        
        .contact-details {
            display: grid;
            gap: 20px;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .contact-item i {
            font-size: 1.5rem;
            color: #111;
            width: 40px;
            height: 40px;
            background: #f5f5f5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .contact-item div {
            flex: 1;
        }
        
        .contact-item h3 {
            font-size: 1.1rem;
            color: #111;
            margin-bottom: 5px;
        }
        
        .contact-item p {
            color: #666;
            margin: 0;
        }
        
        .contact-form {
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        }
        
        .contact-form h2 {
            font-size: 1.8rem;
            color: #111;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            font-weight: 500;
            color: #222;
            margin-bottom: 8px;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            background: #f8f9fa;
            color: #111;
            transition: all 0.3s;
        }
        
        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #111;
            outline: none;
            background: #fff;
        }
        
        .form-group textarea {
            height: 150px;
            resize: vertical;
        }
        
        .submit-btn {
            width: 100%;
            padding: 14px;
            background: #111;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .submit-btn:hover {
            background: #333;
        }
        
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .alert.success {
            background: #e8f5e9;
            color: #388e3c;
            border-left: 5px solid #4caf50;
        }
        
        .alert.error {
            background: #fff5f5;
            color: #e53935;
            border-left: 5px solid #e53935;
        }
        
        @media (max-width: 768px) {
            .contact-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
<?php include '../includes/header.php'; ?>

<div class="contact-container">
    <div class="contact-info">
        <h2>Liên hệ với chúng tôi</h2>
        <p>Chúng tôi luôn sẵn sàng lắng nghe ý kiến và hỗ trợ bạn. Hãy liên hệ với chúng tôi qua các kênh sau:</p>
        
        <div class="contact-details">
            <div class="contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <div>
                    <h3>Địa chỉ</h3>
                    <p>123 Đường ABC, Quận XYZ, TP.HCM</p>
                </div>
            </div>
            
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <div>
                    <h3>Điện thoại</h3>
                    <p>0123 456 789</p>
                </div>
            </div>
            
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <div>
                    <h3>Email</h3>
                    <p>support@genzshop.com</p>
                </div>
            </div>
            
            <div class="contact-item">
                <i class="fas fa-clock"></i>
                <div>
                    <h3>Giờ làm việc</h3>
                    <p>Thứ 2 - Chủ nhật: 8:00 - 22:00</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="contact-form">
        <h2>Gửi tin nhắn cho chúng tôi</h2>
        
        <?php if ($success): ?>
            <div class="alert success">
                <i class="fas fa-check-circle"></i>
                <?= $success ?>
            </div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="alert error">
                <i class="fas fa-exclamation-circle"></i>
                <?= $error ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Họ và tên</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($name ?? '') ?>" required>
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($email ?? '') ?>" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="tel" id="phone" name="phone" value="<?= htmlspecialchars($phone ?? '') ?>" required pattern="[0-9]{10,11}">
            </div>
            
            <div class="form-group">
                <label for="subject">Tiêu đề</label>
                <input type="text" id="subject" name="subject" value="<?= htmlspecialchars($subject ?? '') ?>" required>
            </div>
            
            <div class="form-group">
                <label for="message">Nội dung</label>
                <textarea id="message" name="message" required><?= htmlspecialchars($message ?? '') ?></textarea>
            </div>
            
            <button type="submit" class="submit-btn">
                <i class="fas fa-paper-plane"></i> Gửi tin nhắn
            </button>
        </form>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
</body>
</html> 