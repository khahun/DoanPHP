<?php
session_start();
require_once '../models/database.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'nhanvien') {
    header('Location: ../views/home.php');
    exit();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tieu_de = trim($_POST['tieu_de']);
    $trang_thai = isset($_POST['trang_thai']) ? intval($_POST['trang_thai']) : 1;
    $hinh_anh = '';
    if (!empty($_FILES['hinh_anh']['name'])) {
        $target_dir = '../assets/images/';
        $file_name = time() . '_' . basename($_FILES['hinh_anh']['name']);
        $target_file = $target_dir . $file_name;
        if (move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $target_file)) {
            $hinh_anh = $file_name;
        } else {
            $error = 'Lỗi upload ảnh.';
        }
    }
    if (!$error && $tieu_de && $hinh_anh) {
        $stmt = $conn->prepare("INSERT INTO banner (tieu_de, hinh_anh, trang_thai) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $tieu_de, $hinh_anh, $trang_thai);
        $stmt->execute();
        header('Location: content.php');
        exit();
    } else if (!$error) {
        $error = 'Vui lòng nhập tiêu đề và chọn ảnh.';
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm banner mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8fafc; }
        .main-content {
            margin-left: 250px;
            padding: 40px 30px;
            min-height: 100vh;
        }
        .center-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding-top: 40px;
        }
        .form-label { font-weight: 500; }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Thêm banner mới</h2>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Tiêu đề banner <span class="text-danger">*</span></label>
                <input type="text" name="tieu_de" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Ảnh banner <span class="text-danger">*</span></label>
                <input type="file" name="hinh_anh" class="form-control" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Trạng thái</label>
                <select name="trang_thai" class="form-select" required>
                    <option value="1">Đang hoạt động</option>
                    <option value="0">Không hoạt động</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Lưu banner</button>
            <a href="content.php" class="btn btn-secondary ms-2">Quay lại</a>
        </form>
    </div>
</body>
</html> 