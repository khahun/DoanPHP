<?php
session_start();
// Giả sử thông tin admin lưu trong session, ví dụ:
// $_SESSION['admin_name'], $_SESSION['admin_email']
// Nếu bạn lấy từ database thì thay phần này bằng truy vấn DB

// Kiểm tra quyền truy cập
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 1) {
    header('Location: ../views/home.php');
    exit();
}

$admin_name = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Admin';
$admin_email = isset($_SESSION['admin_email']) ? $_SESSION['admin_email'] : 'admin@example.com';

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin tài khoản Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .profile-container {
            margin-left: 260px;
            padding: 40px 30px;
        }
        .profile-card {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 32px 28px;
        }
        .profile-avatar {
            font-size: 3rem;
            color: #6366f1;
            margin-bottom: 18px;
        }
        .page-title {
            text-align: center;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 32px;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>
    <?php include 'includes/sidebar.php'; ?>
    <div class="profile-container">
        <div class="profile-card text-center">
            <div class="profile-avatar">
                <i class="fa-solid fa-user-shield"></i>
            </div>
            <h3><?php echo htmlspecialchars($admin_name); ?></h3>
            <p>Email: <?php echo htmlspecialchars($admin_email); ?></p>
            <p>Vai trò: <span class="badge bg-primary">Admin</span></p>
            <a href="logout.php" class="btn btn-danger mt-3">Đăng xuất</a>
        </div>
    </div>
</body>
</html> 