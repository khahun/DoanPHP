<?php
session_start();
require_once '../models/database.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'nhanvien') {
    header('Location: ../views/home.php');
    exit();
}

// Xử lý tìm kiếm và lọc
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$status = isset($_GET['status']) ? trim($_GET['status']) : '';

$where = [];
$params = [];
$types = '';

if ($search !== '') {
    $where[] = '(hoadon.MaHD LIKE ? OR khachhang.TenKH LIKE ?)';
    $params[] = "%$search%";
    $params[] = "%$search%";
    $types .= 'ss';
}
if ($status !== '') {
    $where[] = 'hoadon.TinhTrang = ?';
    $params[] = $status;
    $types .= 's';
}

$where_sql = $where ? ('WHERE ' . implode(' AND ', $where)) : '';
$sql = "SELECT hoadon.MaHD, khachhang.TenKH, hoadon.NgayDat, hoadon.TongTien, hoadon.TinhTrang FROM hoadon JOIN khachhang ON hoadon.MaKH = khachhang.MaKH $where_sql ORDER BY hoadon.MaHD DESC";
$stmt = $conn->prepare($sql);
if ($where) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

// Lấy danh sách trạng thái đơn hàng
$statusList = [];
$resStatus = $conn->query("SELECT DISTINCT TinhTrang FROM hoadon WHERE TinhTrang IS NOT NULL AND TinhTrang != ''");
while ($row = $resStatus->fetch_assoc()) {
    $statusList[] = $row['TinhTrang'];
}

// Xử lý cập nhật trạng thái đơn hàng
if (isset($_POST['update_status']) && isset($_POST['order_id']) && isset($_POST['new_status'])) {
    $order_id = intval($_POST['order_id']);
    $new_status = trim($_POST['new_status']);
    $stmt_upd = $conn->prepare("UPDATE hoadon SET TinhTrang=? WHERE MaHD=?");
    $stmt_upd->bind_param("si", $new_status, $order_id);
    $stmt_upd->execute();
    // Sau khi cập nhật, load lại trang để thấy thay đổi
    header("Location: orders.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
    body {
        background: #f8fafc;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        width: 100vw;
        overflow-x: hidden;
    }
    .main-content {
        margin-left: 260px;
        padding: 40px 30px;
        min-height: 100vh;
        max-width: calc(100vw - 260px);
        overflow-x: auto;
        background: #fff;
    }
    .form-control, .form-select {
        min-width: 180px;
    }
    .btn {
        min-width: 110px;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    @media (max-width: 900px) {
        .main-content { margin-left: 0; }
        .table-responsive { overflow-x: auto; }
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
        <h2 class="page-title">Quản lý đơn hàng</h2>
        <form class="row g-3 mb-3" method="get" action="">
            <div class="col-md-4">
                <input type="text" class="form-control" name="search" placeholder="Tìm mã đơn hàng hoặc tên khách..." value="<?php echo htmlspecialchars($search); ?>">
            </div>
            <div class="col-md-3">
                <select class="form-select" name="status">
                    <option value="">-- Lọc theo trạng thái --</option>
                    <?php foreach($statusList as $st): ?>
                        <option value="<?php echo htmlspecialchars($st); ?>" <?php if($status===$st) echo 'selected'; ?>><?php echo htmlspecialchars($st); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2 d-grid">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tìm kiếm</button>
            </div>
            <div class="col-md-3 text-end d-grid">
                <a href="orders.php" class="btn btn-secondary">Xóa lọc</a>
            </div>
        </form>
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Mã ĐH</th>
                    <th>Khách hàng</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Cập nhật trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['MaHD']; ?></td>
                        <td><?php echo htmlspecialchars($row['TenKH']); ?></td>
                        <td><?php echo $row['NgayDat']; ?></td>
                        <td><?php echo number_format($row['TongTien'], 0, ',', '.'); ?> đ</td>
                        <td><?php echo htmlspecialchars($row['TinhTrang']); ?></td>
                        <td>
                            <form method="post" class="d-flex align-items-center" style="gap:6px;">
                                <input type="hidden" name="order_id" value="<?php echo $row['MaHD']; ?>">
                                <select name="new_status" class="form-select form-select-sm" style="min-width:120px;">
                                    <?php
                                    $allStatus = [
                                        'Chờ xác nhận',
                                        'Đã xác nhận',
                                        'Đang xử lý',
                                        'Đang giao',
                                        'Đã giao',
                                        'Hủy'
                                    ];
                                    foreach($allStatus as $st) {
                                        $selected = ($row['TinhTrang'] == $st) ? 'selected' : '';
                                        echo "<option value='".htmlspecialchars($st)."' $selected>".htmlspecialchars($st)."</option>";
                                    }
                                    ?>
                                </select>
                                <button type="submit" name="update_status" class="btn btn-success btn-sm">Lưu</button>
                            </form>
                        </td>
                        <td>
                            <a href="order_detail.php?id=<?php echo $row['MaHD']; ?>" class="btn btn-info btn-sm">Chi tiết</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="6" class="text-center">Không có đơn hàng nào.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</body>
</html> 