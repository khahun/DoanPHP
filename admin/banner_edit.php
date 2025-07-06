<?php
session_start();
require_once '../models/database.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'nhanvien') {
    header('Location: ../views/home.php');
    exit();
}

if (!isset($_GET['id'])) {
    header('Location: content.php');
    exit();
}
$id = intval($_GET['id']);
$sql = "SELECT * FROM banner WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$banner = $result->fetch_assoc();
if (!$banner) {
    header('Location: content.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tieu_de = $_POST['tieu_de'];
    $lien_ket = $_POST['lien_ket'];
    $trang_thai = intval($_POST['trang_thai']);
    $hinh_anh = $banner['hinh_anh'];
    if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] == 0) {
        $hinh_anh = basename($_FILES['hinh_anh']['name']);
        move_uploaded_file($_FILES['hinh_anh']['tmp_name'], '../assets/images/banners/' . $hinh_anh);
    }
    $sql = "UPDATE banner SET tieu_de=?, hinh_anh=?, lien_ket=?, trang_thai=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssii", $tieu_de, $hinh_anh, $lien_ket, $trang_thai, $id);
    if ($stmt->execute()) {
        header('Location: content.php');
        exit();
    } else {
        $error = 'Cập nhật banner thất bại!';
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa banner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Sửa banner</h2>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Tiêu đề</label>
            <input type="text" name="tieu_de" class="form-control" value="<?php echo htmlspecialchars($banner['tieu_de']); ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Liên kết</label>
            <input type="text" name="lien_ket" class="form-control" value="<?php echo htmlspecialchars($banner['lien_ket']); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="trang_thai" class="form-select" required>
                <option value="1" <?php if($banner['trang_thai']==1) echo 'selected'; ?>>Đang hoạt động</option>
                <option value="0" <?php if($banner['trang_thai']==0) echo 'selected'; ?>>Không hoạt động</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Ảnh hiện tại</label><br>
            <?php if (!empty($banner['hinh_anh'])): ?>
                <img src="../assets/images/banners/<?php echo htmlspecialchars($banner['hinh_anh']); ?>" alt="Banner" style="max-width:120px;max-height:60px;">
            <?php else: ?>
                <span class="text-muted">(Không có ảnh)</span>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Đổi ảnh (nếu muốn)</label>
            <input type="file" name="hinh_anh" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="content.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
</body>
</html> 