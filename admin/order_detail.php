<?php
session_start();
require_once '../models/database.php';
if (!isset($_SESSION['user']) || empty($_SESSION['user']['is_admin'])) {
    header('Location: ../views/home.php');
    exit();
}
if (!isset($_GET['id'])) {
    header('Location: orders.php');
    exit();
}
$order_id = intval($_GET['id']);
// Lấy thông tin đơn hàng
$sql = "SELECT hoadon.*, khachhang.TenKH, khachhang.Email, khachhang.SDT, khachhang.DiaChi FROM hoadon JOIN khachhang ON hoadon.MaKH = khachhang.MaKH WHERE hoadon.MaHD = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();
if (!$order) {
    echo '<div class="alert alert-danger">Không tìm thấy đơn hàng!</div>';
    exit();
}
// Lấy danh sách sản phẩm trong đơn hàng
$sql_ct = "SELECT cthd.*, sp.TenSP, sp.AnhNen FROM chitiethoadon cthd JOIN sanpham sp ON cthd.MaSP = sp.MaSP WHERE cthd.MaHD = ?";
$stmt_ct = $conn->prepare($sql_ct);
$stmt_ct->bind_param("i", $order_id);
$stmt_ct->execute();
$products = $stmt_ct->get_result();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { background: #f8fafc; }
        .main-content { margin-left: 260px; padding: 40px 30px; }
        .order-info, .customer-info { background: #fff; border-radius: 12px; padding: 24px; margin-bottom: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
        .product-img { width: 60px; height: 60px; object-fit: cover; border-radius: 8px; }
    </style>
</head>
<body>
    <?php include dirname($_SERVER['PHP_SELF']) == '/admin' ? 'includes/sidebar.php' : 'includes/sidebar.php'; ?>
<div class="main-content">
    <a href="orders.php" class="btn btn-secondary mb-3"><i class="fa fa-arrow-left"></i> Quay lại</a>
    <h2 class="mb-4">Chi tiết đơn hàng #<?php echo $order['MaHD']; ?></h2>
    <div class="order-info mb-4">
        <h5>Thông tin đơn hàng</h5>
        <p><strong>Ngày đặt:</strong> <?php echo $order['NgayDat']; ?></p>
        <p><strong>Trạng thái:</strong> <?php echo htmlspecialchars($order['TinhTrang']); ?></p>
        <p><strong>Tổng tiền:</strong> <?php echo number_format($order['TongTien'], 0, ',', '.'); ?> đ</p>
    </div>
    <div class="customer-info mb-4">
        <h5>Thông tin khách hàng</h5>
        <p><strong>Tên:</strong> <?php echo htmlspecialchars($order['TenKH']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($order['Email']); ?></p>
        <p><strong>SĐT:</strong> <?php echo htmlspecialchars($order['SDT']); ?></p>
        <p><strong>Địa chỉ:</strong> <?php echo htmlspecialchars($order['DiaChi']); ?></p>
    </div>
    <div class="mb-4">
        <h5>Sản phẩm trong đơn hàng</h5>
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Size</th>
                    <th>Màu</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
            <?php if ($products->num_rows > 0): ?>
                <?php while($p = $products->fetch_assoc()): ?>
                <tr>
                    <td><img src="../assets/images/<?php echo htmlspecialchars($p['AnhNen']); ?>" class="product-img" alt=""></td>
                    <td><?php echo htmlspecialchars($p['TenSP']); ?></td>
                    <td><?php echo htmlspecialchars($p['Size']); ?></td>
                    <td><?php echo htmlspecialchars($p['MaMau']); ?></td>
                    <td><?php echo $p['SoLuong']; ?></td>
                    <td><?php echo number_format($p['DonGia'], 0, ',', '.'); ?> đ</td>
                    <td><?php echo number_format($p['ThanhTien'], 0, ',', '.'); ?> đ</td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="7" class="text-center">Không có sản phẩm nào.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html> 