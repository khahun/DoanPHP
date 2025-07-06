<?php
session_start();
require_once '../models/database.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'nhanvien') {
    header('Location: ../views/home.php');
    exit();
}
// Xử lý xóa banner
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM banner WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: content.php");
    exit();
}
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$where = '';
$params = [];
$types = '';
if ($search !== '') {
    $where = 'WHERE tieu_de LIKE ?';
    $params[] = "%$search%";
    $types = 's';
}
$sql = "SELECT id, tieu_de, hinh_anh, trang_thai FROM banner $where ORDER BY id DESC";
$stmt = $conn->prepare($sql);
if ($search !== '') {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý banner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background: #f8fafc;
        }

        .main-content {
            margin-left: 260px;
            padding: 40px 30px;
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
    <div class="main-content">
        <div class="center-container">
            <h2 class="page-title">Quản lý banner</h2>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="./banner_add.php" class="btn btn-success"><i class="fa fa-plus"></i> Thêm banner mới</a>
            </div>
            <form class="row g-3 mb-3" method="get" action="">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="search" placeholder="Tìm tiêu đề banner..." value="<?php echo htmlspecialchars($search); ?>">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tìm kiếm</button>
                </div>
                <div class="col-md-3 text-end">
                    <a href="content.php" class="btn btn-secondary">Xóa lọc</a>
                </div>
            </form>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Ảnh banner</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo htmlspecialchars($row['tieu_de']); ?></td>
                                <td class="text-center">
                                    <?php if (!empty($row['hinh_anh'])): ?>
                                        <img src="../assets/images/banners/<?php echo htmlspecialchars($row['hinh_anh']); ?>" alt="Banner" width="200" class="banner-img">
                                    <?php else: ?>
                                        <span class="text-muted">(Không có ảnh)</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($row['trang_thai'] == 1): ?>
                                        <span class="badge bg-success">Đang hoạt động</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">Không hoạt động</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="banner_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Sửa</a>
                                    <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa banner này?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Không có banner nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>