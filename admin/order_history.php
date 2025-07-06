<?php
session_start();
require_once '../models/database.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'nhanvien') {
    header('Location: ../views/home.php');
    exit();
}
if (!isset($_GET['khachhang'])) {
    header('Location: customers.php');
    exit();
}
$makh = intval($_GET['khachhang']);
// Lấy thông tin khách hàng
$sql_kh = "SELECT TenKH, Email FROM khachhang WHERE MaKH = ?";
$stmt_kh = $conn->prepare($sql_kh);
$stmt_kh->bind_param("i", $makh);
$stmt_kh->execute();
$kh = $stmt_kh->get_result()->fetch_assoc();
if (!$kh) {
    echo '<div class="alert alert-danger">Không tìm thấy khách hàng!</div>';
    exit();
}
// Lấy lịch sử đơn hàng
$sql = "SELECT MaHD, NgayDat, TongTien, TinhTrang FROM hoadon WHERE MaKH = ? ORDER BY MaHD DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $makh);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Lịch sử đơn hàng</title>
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
        .table {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
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
        }
    </style>
</head>
<body>
    <?php include 'includes/sidebar.php'; ?>
<div class="main-content">
    <div class="center-container">
        <a href="customers.php" class="btn btn-secondary mb-3"><i class="fa fa-arrow-left"></i> Quay lại</a>
        <h2 class="page-title">Lịch sử đơn hàng của <?php echo htmlspecialchars($kh['TenKH']); ?></h2>
        <p class="text-center mb-4">Email: <?php echo htmlspecialchars($kh['Email']); ?></p>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Mã ĐH</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['MaHD']; ?></td>
                        <td><?php echo $row['NgayDat']; ?></td>
                        <td><?php echo number_format($row['TongTien']); ?> VNĐ</td>
                        <td><?php echo $row['TinhTrang']; ?></td>
                        <td>
                            <a href="order_detail.php?id=<?php echo $row['MaHD']; ?>" class="btn btn-info btn-sm">Chi tiết</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="5" class="text-center">Khách hàng này chưa có đơn hàng nào.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html> 