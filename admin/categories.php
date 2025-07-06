<?php
session_start();
require_once '../models/database.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'nhanvien') {
    header('Location: ../views/home.php');
    exit();
}
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$where = [];
$params = [];
$types = '';
if ($search !== '') {
    $where[] = 'TenDM LIKE ?';
    $params[] = "%$search%";
    $types .= 's';
}
$where_sql = $where ? ('WHERE ' . implode(' AND ', $where)) : '';
$sql = "SELECT MaDM, TenDM FROM danhmuc $where_sql ORDER BY MaDM DESC";
$stmt = $conn->prepare($sql);
if ($where) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
// Xử lý thêm danh mục
if (isset($_POST['add_category'])) {
    $tenDM = trim($_POST['tenDM']);
    if (!empty($tenDM)) {
        $stmt = $conn->prepare("INSERT INTO danhmuc (TenDM) VALUES (?)");
        $stmt->bind_param("s", $tenDM);
        $stmt->execute();
        header("Location: categories.php");
        exit();
    }
}
// Xử lý sửa danh mục
if (isset($_POST['edit_category'])) {
    $maDM = intval($_POST['maDM']);
    $tenDM = trim($_POST['tenDM']);
    if (!empty($tenDM)) {
        $stmt = $conn->prepare("UPDATE danhmuc SET TenDM = ? WHERE MaDM = ?");
        $stmt->bind_param("si", $tenDM, $maDM);
        $stmt->execute();
        header("Location: categories.php");
        exit();
    }
}
// Xử lý xóa danh mục
if (isset($_GET['delete'])) {
    $maDM = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM danhmuc WHERE MaDM = ?");
    $stmt->bind_param("i", $maDM);
    $stmt->execute();
    header("Location: categories.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>body{background:#f8fafc;}.main-content{margin-left:260px;padding:40px 30px;}.page-title {
        text-align: center;
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 32px;
        letter-spacing: 1px;
    }</style>
</head>
<body>
    <?php include 'includes/sidebar.php'; ?>
<div class="main-content">
    <div class="center-container">
        <h2 class="page-title">Quản lý danh mục</h2>
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Thêm danh mục mới</h5>
            </div>
            <div class="card-body">
                <form method="post" class="row g-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="tenDM" placeholder="Tên danh mục" required>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" name="add_category" class="btn btn-primary">Thêm danh mục</button>
                    </div>
                </form>
            </div>
        </div>
        <form class="row g-3 mb-3" method="get" action="">
            <div class="col-md-6">
                <input type="text" class="form-control" name="search" placeholder="Tìm tên danh mục..." value="<?php echo htmlspecialchars($search); ?>">
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tìm kiếm</button>
            </div>
            <div class="col-md-3 text-end">
                <a href="categories.php" class="btn btn-secondary">Xóa lọc</a>
            </div>
        </form>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Mã DM</th>
                    <th>Tên danh mục</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['MaDM']; ?></td>
                        <td><?php echo htmlspecialchars($row['TenDM']); ?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['MaDM']; ?>">
                                <i class="fas fa-edit"></i> Sửa
                            </button>
                            <a href="?delete=<?php echo $row['MaDM']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                        </td>
                    </tr>
                    <!-- Modal sửa danh mục -->
                    <div class="modal fade" id="editModal<?php echo $row['MaDM']; ?>" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Sửa danh mục</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form method="post">
                                    <div class="modal-body">
                                        <input type="hidden" name="maDM" value="<?php echo $row['MaDM']; ?>">
                                        <div class="mb-3">
                                            <label class="form-label">Tên danh mục</label>
                                            <input type="text" class="form-control" name="tenDM" value="<?php echo htmlspecialchars($row['TenDM']); ?>" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button type="submit" name="edit_category" class="btn btn-primary">Lưu thay đổi</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="3" class="text-center">Không có danh mục nào.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 