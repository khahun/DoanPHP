<?php
session_start();
require_once __DIR__ . '/../models/database.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$user = $_SESSION['user'];
$orders = bill_user($user['MaKH']); // Lấy danh sách đơn hàng của khách hàng
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đơn hàng của tôi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background: #f5f6fa;
        }
        .orders-wrapper {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .orders-title {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-size: 2em;
            font-weight: 700;
        }
        .order-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            margin-bottom: 24px;
            overflow: hidden;
        }
        .order-header {
            background: #f8f9fa;
            padding: 16px 24px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .order-id {
            font-weight: 600;
            color: #333;
        }
        .order-date {
            color: #666;
            font-size: 0.95em;
        }
        .order-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 500;
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
        .order-items {
            padding: 24px;
        }
        .order-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
        }
        .order-item:last-child {
            border-bottom: none;
        }
        .item-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #eee;
        }
        .item-details {
            flex: 1;
        }
        .item-name {
            font-weight: 600;
            margin-bottom: 4px;
            color: #333;
        }
        .item-meta {
            color: #666;
            font-size: 0.9em;
            margin-bottom: 4px;
        }
        .item-price {
            color: #e44d26;
            font-weight: 600;
        }
        .order-summary {
            background: #f8f9fa;
            padding: 16px 24px;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .order-total {
            font-size: 1.1em;
            font-weight: 600;
            color: #333;
        }
        .order-actions {
            display: flex;
            gap: 12px;
        }
        .btn {
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.95em;
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
        .no-orders {
            text-align: center;
            padding: 40px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        }
        .no-orders i {
            font-size: 48px;
            color: #ccc;
            margin-bottom: 16px;
        }
        .no-orders p {
            color: #666;
            font-size: 1.1em;
        }
    </style>
</head>
<body>
<?php include '../includes/header.php'; ?>

<div class="orders-wrapper">
    <h1 class="orders-title">Đơn hàng của tôi</h1>
    
    <?php if ($orders && mysqli_num_rows($orders) > 0): ?>
        <?php while ($order = mysqli_fetch_assoc($orders)): 
            $order_details = bill_detail($order['MaHD']);
        ?>
            <div class="order-card">
                <div class="order-header">
                    <div>
                        <span class="order-id">Đơn hàng #<?php echo $order['MaHD']; ?></span>
                        <span class="order-date"><?php echo date('d/m/Y H:i', strtotime($order['NgayDat'])); ?></span>
                    </div>
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
                
                <div class="order-items">
                    <?php if ($order_details && mysqli_num_rows($order_details) > 0): ?>
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
                    <?php else: ?>
                        <div style="padding:16px;color:#888;">Không có sản phẩm trong đơn hàng này.</div>
                    <?php endif; ?>
                </div>
                
                <div class="order-summary">
                    <div class="order-total">
                        Tổng tiền: <?php echo number_format($order['TongTien']); ?>đ
                    </div>
                    <?php if ($order['MaGiamGia']): ?>
                        <div>Mã voucher: <?php echo htmlspecialchars($order['MaGiamGia']); ?></div>
                        <div>Giảm giá: -<?php echo number_format($order['TienGiam']); ?>đ</div>
                        <div>Tổng sau giảm: <?php echo number_format($order['TongTien'] - $order['TienGiam']); ?>đ</div>
                    <?php endif; ?>
                    <div class="order-actions">
                        <?php if ($order['TinhTrang'] == 'chưa duyệt'): ?>
                            <button class="btn btn-danger" onclick="cancelOrder(<?php echo $order['MaHD']; ?>)">
                                Hủy đơn hàng
                            </button>
                        <?php endif; ?>
                        <button class="btn btn-primary" onclick="viewOrderDetails(<?php echo $order['MaHD']; ?>)">
                            Xem chi tiết
                        </button>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <div class="no-orders">
            <i class="fas fa-shopping-bag"></i>
            <p>Bạn chưa có đơn hàng nào</p>
        </div>
    <?php endif; ?>
</div>

<script>
function viewOrderDetails(orderId) {
    // Chuyển hướng đến trang chi tiết đơn hàng
    window.location.href = `order-details.php?id=${orderId}`;
}

function cancelOrder(orderId) {
    if (confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')) {
        // Gửi request hủy đơn hàng
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
                location.reload();
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