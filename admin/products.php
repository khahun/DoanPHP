<?php
session_start();
require_once '../models/database.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'nhanvien') {
    header('Location: ../views/home.php');
    exit();
}

// Lấy danh sách danh mục
$dmList = [];
$resDM = $conn->query("SELECT MaDM, TenDM FROM danhmuc");
while ($row = $resDM->fetch_assoc()) {
    $dmList[$row['MaDM']] = $row['TenDM'];
}

// Lấy danh sách nhà cung cấp
$nccList = [];
$resNCC = $conn->query("SELECT MaNCC, TenNCC FROM nhacc");
while ($row = $resNCC->fetch_assoc()) {
    $nccList[$row['MaNCC']] = $row['TenNCC'];
}

// Xử lý tìm kiếm và lọc
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$madm = isset($_GET['madm']) ? trim($_GET['madm']) : '';
$mancc = isset($_GET['mancc']) ? trim($_GET['mancc']) : '';
$noibat = isset($_GET['noibat']) ? trim($_GET['noibat']) : '';

$where = [];
$params = [];
$types = '';

if ($search !== '') {
    $where[] = '(sanpham.MaSP LIKE ? OR sanpham.TenSP LIKE ?)';
    $params[] = "%$search%";
    $params[] = "%$search%";
    $types .= 'ss';
}
if ($madm !== '') {
    $where[] = 'sanpham.MaDM = ?';
    $params[] = $madm;
    $types .= 'i';
}
if ($mancc !== '') {
    $where[] = 'sanpham.MaNCC = ?';
    $params[] = $mancc;
    $types .= 'i';
}
if ($noibat !== '') {
    $where[] = 'sanpham.SanPhamNoiBat = ?';
    $params[] = $noibat;
    $types .= 'i';
}

$where_sql = $where ? ('WHERE ' . implode(' AND ', $where)) : '';
$sql = "SELECT sanpham.*, danhmuc.TenDM, nhacc.TenNCC FROM sanpham "
    . "LEFT JOIN danhmuc ON sanpham.MaDM = danhmuc.MaDM "
    . "LEFT JOIN nhacc ON sanpham.MaNCC = nhacc.MaNCC "
    . "$where_sql ORDER BY sanpham.MaSP DESC";
$stmt = $conn->prepare($sql);
if ($where) {
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
    <title>Quản lý sản phẩm</title>
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
        .center-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .table {
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
            width: 100%;
            table-layout: fixed;
        }
        .table thead th {
            background: #212529;
            color: #fff;
            font-size: 1.08rem;
            text-align: center;
            vertical-align: middle;
        }
        .table tbody tr {
            vertical-align: middle;
            height: 70px;
        }
        .table td, .table th {
            padding: 14px 10px;
            word-break: break-word;
        }
        .table td.text-left {
            text-align: left;
        }
        .table td.text-center, .table th.text-center {
            text-align: center;
        }
        .product-img {
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
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
            <h2 class="page-title">Quản lý sản phẩm</h2>
            <div class="d-flex justify-content-end mb-4">
                <a href="product_add.php" class="btn btn-success shadow">
                    <i class="fa fa-plus"></i> Thêm sản phẩm
                </a>
            </div>
            <form class="row g-3 mb-3" method="get" action="">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="search" placeholder="Tìm mã hoặc tên sản phẩm..." value="<?php echo htmlspecialchars($search); ?>">
                </div>
                <div class="col-md-4">
                    <select class="form-select" name="madm">
                        <option value="">-- Lọc theo danh mục --</option>
                        <?php foreach ($dmList as $id => $name): ?>
                            <option value="<?php echo $id; ?>" <?php if ($madm === $id) echo 'selected'; ?>><?php echo htmlspecialchars($name); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-select" name="mancc">
                        <option value="">-- Lọc theo nhà cung cấp --</option>
                        <?php foreach ($nccList as $id => $name): ?>
                            <option value="<?php echo $id; ?>" <?php if ($mancc === $id) echo 'selected'; ?>><?php echo htmlspecialchars($name); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2 text-end">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tìm kiếm</button>
                </div>
                <div class="col-md-2 text-end">
                    <a href="products.php" class="btn btn-secondary">Xóa lọc</a>
                </div>
            </form>
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Ảnh</th>
                        <th class="text-center">Mã SP</th>
                        <th class="text-left">Tên sản phẩm</th>
                        <th class="text-center">Danh mục</th>
                        <th class="text-center">Nhà cung cấp</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-left">Mô tả</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td class="text-center"><img src="../assets/images/<?php echo htmlspecialchars($row['AnhNen']); ?>" alt="Ảnh" width="60" class="product-img"></td>
                                <td class="text-center"><?php echo $row['MaSP']; ?></td>
                                <td class="text-left">
                                    <span data-bs-toggle="tooltip" title="<?php echo htmlspecialchars($row['TenSP']); ?>">
                                        <?php echo (strlen($row['TenSP']) > 25) ? htmlspecialchars(substr($row['TenSP'], 0, 25)) . '...' : htmlspecialchars($row['TenSP']); ?>
                                    </span>
                                </td>
                                <td class="text-center"><?php echo htmlspecialchars($row['TenDM']); ?></td>
                                <td class="text-center"><?php echo htmlspecialchars($row['TenNCC']); ?></td>
                                <td class="text-center"><?php echo number_format($row['DonGia'], 0, ',', '.'); ?> đ</td>
                                <td class="text-center"><?php echo $row['SoLuong']; ?></td>
                                <td class="text-left">
                                    <?php echo strlen($row['MoTa']) > 30 ? htmlspecialchars(substr($row['MoTa'], 0, 30)) . '...' : htmlspecialchars($row['MoTa']); ?>
                                    <?php if (strlen($row['MoTa']) > 30): ?>
                                        <a tabindex="0" class="btn btn-link btn-sm" role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Mô tả chi tiết" data-bs-content="<?php echo htmlspecialchars($row['MoTa']); ?>">Xem</a>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="product_edit.php?id=<?php echo $row['MaSP']; ?>" class="btn btn-warning btn-sm me-1">Sửa</a>
                                    <a href="product_delete.php?id=<?php echo $row['MaSP']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="text-center">Không có sản phẩm nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl);
            });
        });
    </script>
</body>

</html>