<?php
session_start();
require_once __DIR__ . '/../models/database.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$user = $_SESSION['user'];
$user_id = $user['MaKH'];

// Lấy thông tin mới nhất từ database
$user_db = selectKH($user_id);
if ($user_db) {
    $user = $user_db;
}

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_profile'])) {
        $name = trim($_POST['name']);
        $sdt = trim($_POST['sdt']);
        $address = trim($_POST['address']);
        
        if (empty($name) || empty($sdt) || empty($address)) {
            $error = 'Vui lòng nhập đầy đủ thông tin.';
        } else {
            $result = update_user($user_id, $name, $sdt, $address, $user['MatKhau']);
            if ($result) {
                $success = 'Cập nhật thông tin thành công!';
                // Cập nhật lại session
                $_SESSION['user'] = selectKH($user_id);
                $user = $_SESSION['user'];
            } else {
                $error = 'Cập nhật thất bại. Vui lòng thử lại.';
            }
        }
    } elseif (isset($_POST['change_password'])) {
        $current_password = trim($_POST['current_password']);
        $new_password = trim($_POST['new_password']);
        $confirm_password = trim($_POST['confirm_password']);
        
        if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
            $error = 'Vui lòng nhập đầy đủ thông tin mật khẩu.';
        } elseif ($new_password !== $confirm_password) {
            $error = 'Mật khẩu mới không khớp.';
        } elseif ($current_password !== $user['MatKhau']) {
            $error = 'Mật khẩu hiện tại không đúng.';
        } else {
            $result = update_user($user_id, $user['TenKH'], $user['SDT'], $user['DiaChi'], $new_password);
            if ($result) {
                $success = 'Đổi mật khẩu thành công!';
                // Cập nhật lại session
                $_SESSION['user'] = selectKH($user_id);
                $user = $_SESSION['user'];
            } else {
                $error = 'Đổi mật khẩu thất bại. Vui lòng thử lại.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tài khoản của tôi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .profile-container {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 36px 32px 28px 32px;
        }
        .profile-title {
            font-size: 2rem;
            font-weight: 700;
            color: #111;
            margin-bottom: 24px;
            text-align: center;
        }
        .profile-tabs {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 15px;
        }
        .profile-tab {
            padding: 10px 20px;
            cursor: pointer;
            font-weight: 500;
            color: #666;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .profile-tab.active {
            background: #111;
            color: #fff;
        }
        .profile-tab:hover:not(.active) {
            background: #f5f5f5;
        }
        .profile-form {
            display: none;
        }
        .profile-form.active {
            display: block;
        }
        .profile-form label {
            font-weight: 500;
            color: #222;
            margin-bottom: 6px;
            display: block;
        }
        .profile-form input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 1rem;
            background: #f8f9fa;
            color: #111;
        }
        .profile-form input:focus {
            border-color: #007bff;
            outline: none;
            background: #fff;
        }
        .profile-form button {
            width: 100%;
            padding: 14px;
            background: #111;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }
        .profile-form button:hover {
            background: #333;
        }
        .profile-alert {
            margin-bottom: 18px;
            padding: 12px 18px;
            border-radius: 8px;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .profile-alert.success {
            background: #e8f5e9;
            color: #388e3c;
            border-left: 5px solid #4caf50;
        }
        .profile-alert.error {
            background: #fff5f5;
            color: #e53935;
            border-left: 5px solid #e53935;
        }
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
</head>
<body>
<?php include '../includes/header.php'; ?>
<div class="profile-container">
    <div class="profile-title"><i class="fas fa-user-circle"></i> Tài khoản của tôi</div>
    
    <?php if ($success): ?>
        <div class="profile-alert success"><i class="fas fa-check-circle"></i> <?= $success ?></div>
    <?php endif; ?>
    <?php if ($error): ?>
        <div class="profile-alert error"><i class="fas fa-exclamation-circle"></i> <?= $error ?></div>
    <?php endif; ?>

    <div class="profile-tabs">
        <div class="profile-tab active" onclick="showTab('info')">
            <i class="fas fa-user"></i> Thông tin cá nhân
        </div>
        <div class="profile-tab" onclick="showTab('password')">
            <i class="fas fa-lock"></i> Đổi mật khẩu
        </div>
    </div>

    <form id="info-form" class="profile-form active" method="post" autocomplete="off">
        <label for="name">Họ và tên</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['TenKH']) ?>" required>
        
        <label for="sdt">Số điện thoại</label>
        <input type="tel" id="sdt" name="sdt" value="<?= htmlspecialchars($user['SDT']) ?>" required pattern="[0-9]{10,11}">
        
        <label for="address">Địa chỉ</label>
        <input type="text" id="address" name="address" value="<?= htmlspecialchars($user['DiaChi']) ?>" required>
        
        <button type="submit" name="update_profile">
            <i class="fas fa-save"></i> Cập nhật thông tin
        </button>
    </form>

    <form id="password-form" class="profile-form" method="post" autocomplete="off">
        <label for="current_password">Mật khẩu hiện tại</label>
        <div class="password-input-group">
            <input type="password" id="current_password" name="current_password" required>
            <i class="fas fa-eye toggle-password" onclick="togglePassword('current_password')"></i>
        </div>
        
        <label for="new_password">Mật khẩu mới</label>
        <div class="password-input-group">
            <input type="password" id="new_password" name="new_password" required>
            <i class="fas fa-eye toggle-password" onclick="togglePassword('new_password')"></i>
        </div>
        
        <label for="confirm_password">Xác nhận mật khẩu mới</label>
        <div class="password-input-group">
            <input type="password" id="confirm_password" name="confirm_password" required>
            <i class="fas fa-eye toggle-password" onclick="togglePassword('confirm_password')"></i>
        </div>
        
        <button type="submit" name="change_password">
            <i class="fas fa-key"></i> Đổi mật khẩu
        </button>
    </form>
</div>

<?php include '../includes/footer.php'; ?>

<script>
function showTab(tabName) {
    // Ẩn tất cả các form
    document.querySelectorAll('.profile-form').forEach(form => {
        form.classList.remove('active');
    });
    
    // Ẩn active class từ tất cả các tab
    document.querySelectorAll('.profile-tab').forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Hiển thị form được chọn
    document.getElementById(tabName + '-form').classList.add('active');
    
    // Thêm active class cho tab được chọn
    event.currentTarget.classList.add('active');
}

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
</body>
</html> 