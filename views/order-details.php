<?php
session_start();
require_once __DIR__ . '/../models/database.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Kiểm tra ID đơn hàng
if (!isset($_GET['id'])) {
    header('Location: orders.php');
    exit();
}

$order_id = $_GET['id'];
$user = $_SESSION['user'];

// Lấy thông tin đơn hàng
$sql = "SELECT h.*, n.* FROM hoadon h 
        LEFT JOIN nguoinhan n ON h.MaHD = n.MaHD 
        WHERE h.MaHD = $order_id AND h.MaKH = {$user['MaKH']}";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    header('Location: orders.php');
    exit();
}

$order = mysqli_fetch_assoc($result);
$order_details = bill_detail($order_id);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết đơn hàng #<?php echo $order_id; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background: #f5f6fa;
        }
        .order-details-wrapper {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #666;
            text-decoration: none;
            margin-bottom: 24px;
            font-size: 0.95em;
        }
        .back-link:hover {
            color: #333;
        }
        .order-details-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .order-header {
            background: #f8f9fa;
            padding: 20px 24px;
            border-bottom: 1px solid #eee;
        }
        .order-title {
            font-size: 1.5em;
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }
        .order-meta {
            display: flex;
            gap: 24px;
            color: #666;
            font-size: 0.95em;
        }
        .order-section {
            padding: 24px;
            border-bottom: 1px solid #eee;
        }
        .section-title {
            font-size: 1.1em;
            font-weight: 600;
            color: #333;
            margin-bottom: 16px;
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }
        .info-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .info-label {
            color: #666;
            font-size: 0.9em;
        }
        .info-value {
            color: #333;
            font-weight: 500;
        }
        .order-items {
            padding: 24px;
        }
        .order-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 16px 0;
            border-bottom: 1px solid #eee;
        }
        .order-item:last-child {
            border-bottom: none;
        }
        .item-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #eee;
        }
        .item-details {
            flex: 1;
        }
        .item-name {
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
            font-size: 1.1em;
        }
        .item-meta {
            color: #666;
            font-size: 0.95em;
            margin-bottom: 8px;
        }
        .item-price {
            color: #e44d26;
            font-weight: 600;
            font-size: 1.1em;
        }
        .order-summary {
            background: #f8f9fa;
            padding: 24px;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 1.05em;
        }
        .summary-row:last-child {
            margin-bottom: 0;
            padding-top: 12px;
            border-top: 1px solid #ddd;
            font-weight: 700;
            font-size: 1.2em;
            color: #e44d26;
        }
        .order-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.95em;
            font-weight: 500;
            margin-top: 8px;
        }
        .status-pending {
            background: #fff3cd;
            color: #856404;
        }
        .status-processing {
            background: #cce5ff;
            color: #004085;
        }
        .status-shipped {
            background: #d4edda;
            color: #155724;
        }
        .status-delivered {
            background: #d1e7dd;
            color: #0f5132;
        }
        .status-cancelled {
            background: #f8d7da;
            color: #721c24;
        }
        .order-actions {
            padding: 24px;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }
        .btn {
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 1em;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
        }
        .btn-primary {
            background: #007bff;
            color: #fff;
        }
        .btn-primary:hover {
            background: #0056b3;
        }
        .btn-danger {
            background: #dc3545;
            color: #fff;
        }
        .btn-danger:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
<?php include '../includes/header.php'; ?>

<div class="order-details-wrapper">
    <a href="orders.php" class="back-link">
        <i class="fas fa-arrow-left"></i>
        Quay lại danh sách đơn hàng
    </a>

    <div class="order-details-card">
        <div class="order-header">
            <h1 class="order-title">Đơn hàng #<?php echo $order_id; ?></h1>
            <div class="order-meta">
                <span>Ngày đặt: <?php echo date('d/m/Y H:i', strtotime($order['NgayDat'])); ?></span>
                <span class="order-status status-<?php echo strtolower($order['TinhTrang']); ?>">
                    <?php 
                    switch($order['TinhTrang']) {
                        case 'chưa duyệt':
                            echo 'Chờ xác nhận';
                            break;
                        case 'đã duyệt':
                            echo 'Đang xử lý';
                            break;
                        case 'đang giao':
                            echo 'Đang giao hàng';
                            break;
                        case 'đã giao':
                            echo 'Đã giao hàng';
                            break;
                        case 'đã hủy':
                            echo 'Đã hủy';
                            break;
                        default:
                            echo $order['TinhTrang'];
                    }
                    ?>
                </span>
            </div>
        </div>

        <div class="order-section">
            <h2 class="section-title">Thông tin người nhận</h2>
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Họ và tên</span>
                    <span class="info-value"><?php echo $order['TenNN']; ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Số điện thoại</span>
                    <span class="info-value"><?php echo $order['SDTNN']; ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Địa chỉ</span>
                    <span class="info-value"><?php echo $order['DiaChiNN']; ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Phương thức thanh toán</span>
                    <span class="info-value"><?php echo ($order['PhuongThucThanhToan'] == 'cod') ? 'Thanh toán khi nhận hàng (COD)' : 'Chuyển khoản ngân hàng'; ?></span>
                </div>
            </div>
        </div>

        <div class="order-items">
            <h2 class="section-title">Chi tiết sản phẩm</h2>
            <?php while ($item = mysqli_fetch_assoc($order_details)): 
                $product = product($item['MaSP']);
                $product = mysqli_fetch_assoc($product);
            ?>
                <div class="order-item">
                    <img src="../assets/images/<?php echo $product['AnhNen']; ?>" alt="<?php echo $product['TenSP']; ?>" class="item-image">
                    <div class="item-details">
                        <div class="item-name"><?php echo $product['TenSP']; ?></div>
                        <div class="item-meta">
                            Size: <?php echo $item['Size']; ?> | 
                            Màu: <?php echo $item['MaMau']; ?> | 
                            Số lượng: <?php echo $item['SoLuong']; ?>
                        </div>
                        <div class="item-price">
                            <?php echo number_format($item['ThanhTien']); ?>đ
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="order-summary">
            <div class="summary-row">
                <span>Tạm tính:</span>
                <span><?php echo number_format($order['TongTien']); ?>đ</span>
            </div>
            <div class="summary-row">
                <span>Phí vận chuyển:</span>
                <span>Miễn phí</span>
            </div>
            <?php if ($order['MaGiamGia']): ?>
            <div class="summary-row">
                <span>Mã voucher:</span>
                <span><?php echo htmlspecialchars($order['MaGiamGia']); ?></span>
            </div>
            <div class="summary-row">
                <span>Giảm giá:</span>
                <span>-<?php echo number_format($order['TienGiam']); ?>đ</span>
            </div>
            <div class="summary-row">
                <span>Tổng cộng:</span>
                <span><?php echo number_format($order['TongTien'] - $order['TienGiam']); ?>đ</span>
            </div>
            <?php else: ?>
            <div class="summary-row">
                <span>Tổng cộng:</span>
                <span><?php echo number_format($order['TongTien']); ?>đ</span>
            </div>
            <?php endif; ?>
        </div>

        <?php if ($order['TinhTrang'] == 'chưa duyệt'): ?>
        <div class="order-actions">
            <button class="btn btn-danger" onclick="cancelOrder(<?php echo $order_id; ?>)">
                Hủy đơn hàng
            </button>
        </div>
        <?php endif; ?>
    </div>
</div>

<script>
function cancelOrder(orderId) {
    if (confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')) {
        fetch('cancel-order.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `order_id=${orderId}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Hủy đơn hàng thành công!');
                window.location.href = 'orders.php';
            } else {
                alert('Có lỗi xảy ra khi hủy đơn hàng. Vui lòng thử lại!');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi xảy ra. Vui lòng thử lại!');
        });
    }
}
</script>

<?php include '../includes/footer.php'; ?>
</body>
</html> 