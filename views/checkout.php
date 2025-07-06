<?php
session_start();
require_once __DIR__ . '/../models/database.php';

// Kiểm tra đăng nhập và giỏ hàng
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
if (empty($_SESSION['cart'])) {
    header('Location: cart.php');
    exit();
}

$user = $_SESSION['user'];
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}

$success = '';
$error = '';
$show_bank = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    $tennn = trim($_POST['tennn']);
    $sdt = trim($_POST['sdt']);
    $diachi = trim($_POST['diachi']);
    $payment = $_POST['payment'];
    if (empty($tennn) || empty($sdt) || empty($diachi)) {
        $error = 'Vui lòng nhập đầy đủ thông tin người nhận.';
    } else {
        // Lưu người nhận vào bảng nguoinhan
        $makh = $user['MaKH'];
        $id_nguoinhan = insert_nguoinhan($tennn, $diachi, $sdt, $makh);
        if ($id_nguoinhan) {
            // Lưu đơn hàng vào database
            $tt = $total;
            $result = order_product($tennn, $diachi, $sdt, $makh, $tt, $payment, $id_nguoinhan);
            if ($result) {
                unset($_SESSION['cart']);
                unset($_SESSION['voucher']);
                echo '<script>alert("Đặt hàng thành công! ✅ Bạn sẽ được chuyển tới trang đơn hàng.");window.location.href="orders.php";</script>';
                exit();
            } else {
                $error = 'Đặt hàng thất bại. Vui lòng thử lại.';
            }
        } else {
            $error = 'Không thể lưu thông tin người nhận.';
        }
    }
    $show_bank = ($payment === 'bank');
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh toán</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background: #f5f6fa;
        }
        .checkout-wrapper {
            max-width: 1000px;
            margin: 40px auto;
            display: flex;
            gap: 32px;
            justify-content: center;
        }
        .cart-summary, .checkout-form {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 32px 28px;
        }
        .cart-summary {
            flex: 1.2;
        }
        .checkout-form {
            flex: 1;
            min-width: 320px;
            max-width: 350px;
        }
        .cart-summary h2, .checkout-form h2 {
            text-align: center;
            margin-bottom: 24px;
            font-size: 1.5em;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .cart-item {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-bottom: 18px;
            background: #f8f9fb;
            border-radius: 12px;
            padding: 14px 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        }
        .cart-item img {
            width: 72px;
            height: 72px;
            object-fit: cover;
            border-radius: 8px;
            background: #fff;
            border: 1px solid #eee;
        }
        .item-details {
            flex: 1;
        }
        .item-name {
            font-weight: 600;
            font-size: 1.1em;
            margin-bottom: 4px;
            color: #222;
        }
        .item-meta {
            color: #666;
            font-size: 0.97em;
            margin-bottom: 2px;
        }
        .item-price {
            font-weight: 700;
            color: #e44d26;
            font-size: 1.1em;
        }
        .total-summary {
            margin-top: 24px;
            border-top: 1.5px solid #eee;
            padding-top: 18px;
        }
        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
            font-size: 1.05em;
        }
        .total-row.final {
            font-size: 1.2em;
            font-weight: 700;
            color: #e44d26;
        }
        .form-group {
            margin-bottom: 18px;
        }
        .form-group label {
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
        }
        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1.5px solid #ddd;
            border-radius: 6px;
            font-size: 1em;
            background: #f8f9fa;
            transition: border 0.2s;
        }
        .form-control:focus {
            border: 1.5px solid #4CAF50;
            outline: none;
        }
        .bank-info {
            background: #f1f8e9;
            padding: 12px;
            border-radius: 6px;
            margin-top: 8px;
            font-size: 0.98em;
            color: #2e7d32;
        }
        .checkout-submit-btn {
            background: linear-gradient(90deg, rgb(93, 95, 95) 0%, rgb(32, 38, 34) 100%);
            color: #fff;
            padding: 13px 0;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
            font-size: 1.1em;
            font-weight: 700;
            margin-top: 10px;
            box-shadow: 0 2px 8px rgba(67,233,123,0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: background 0.2s;
        }
        .checkout-submit-btn:hover {
            background: linear-gradient(90deg,rgb(32, 38, 34) 0%,rgb(93, 95, 95) 100%);
        }
        .alert {
            padding: 12px;
            margin-bottom: 18px;
            border-radius: 6px;
            font-size: 1em;
        }
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        @media (max-width: 900px) {
            .checkout-wrapper {
                flex-direction: column;
                gap: 24px;
                padding: 0 8px;
            }
            .cart-summary, .checkout-form {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
<?php include '../includes/header.php'; ?>

<div class="checkout-wrapper">
    <div class="cart-summary">
        <h2>Chi tiết đơn hàng</h2>
        <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <div class="cart-item">
                    <img src="../assets/images/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                    <div class="item-details">
                        <div class="item-name"><?php echo $item['name']; ?></div>
                        <div class="item-meta">
                            Size: <?php echo $item['size']; ?> | 
                            Màu: <?php echo $item['color']; ?> | 
                            Số lượng: <?php echo $item['quantity']; ?>
                        </div>
                        <div class="item-price">
                            <?php echo number_format($item['price'] * $item['quantity']); ?>đ
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="total-summary">
            <div class="total-row">
                <span>Tạm tính:</span>
                <span><?php echo number_format($total); ?>đ</span>
            </div>
            <div class="total-row">
                <span>Phí vận chuyển:</span>
                <span>Miễn phí</span>
            </div>
            <?php if (isset($_SESSION['voucher'])): ?>
            <div class="total-row">
                <span>Mã voucher:</span>
                <span><?php echo htmlspecialchars($_SESSION['voucher']['code']); ?></span>
            </div>
            <div class="total-row">
                <span>Giảm giá:</span>
                <span>-<?php echo number_format($_SESSION['voucher']['discount']); ?>đ</span>
            </div>
            <div class="total-row final">
                <span>Tổng cộng:</span>
                <span><?php echo number_format($total - $_SESSION['voucher']['discount']); ?>đ</span>
            </div>
            <?php else: ?>
            <form method="post" action="">
                <div class="total-row">
                Mã giảm giá: <?= $_SESSION['voucher']['code'] ?>
                    <span>Nhập mã giảm giá:</span>
                    <input type="text" name="voucher_code" placeholder="Nhập mã voucher" required style="padding:4px 8px; border-radius:4px; border:1px solid #ccc;">
                    <button type="submit" name="apply_voucher_checkout" style="padding:4px 12px; border-radius:4px; background:#007bff; color:#fff; border:none;">Áp dụng</button>
                </div>
            </form>
            <div class="voucher-suggestion" style="margin:10px 0;">
                <strong>Gợi ý mã giảm giá:</strong><br>
                <?php
                $sql = "SELECT * FROM voucher WHERE TrangThai = 1 AND NgayBatDau <= NOW() AND NgayKetThuc >= NOW() AND SoLuong > SoLuongDaSuDung";
                $result = mysqli_query($conn, $sql);
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div style="margin-bottom:4px;">';
                        echo '<b>' . htmlspecialchars($row['MaVoucher']) . '</b>: '; 
                        if ($row['LoaiGiamGia'] == 'percent') {
                            echo 'Giảm ' . $row['GiaTriGiamGia'] . '%';
                        } else {
                            echo 'Giảm ' . number_format($row['GiaTriGiamGia']) . 'đ';
                        }
                        echo ' (Đơn tối thiểu: ' . number_format($row['GiaTriToiThieu']) . 'đ)';
                        echo '</div>';
                    }
                } else {
                    echo 'Hiện không có mã giảm giá nào.';
                }
                ?>
            </div>
            <div class="total-row final">
                <span>Tổng cộng:</span>
                <span><?php echo number_format($total); ?>đ</span>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="checkout-form">
        <h2>Thông tin thanh toán</h2>
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo $success; ?></div>
        <?php endif; ?>
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="tennn">Họ và tên người nhận</label>
                <input type="text" id="tennn" name="tennn" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sdt">Số điện thoại</label>
                <input type="tel" id="sdt" name="sdt" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="diachi">Địa chỉ nhận hàng</label>
                <textarea id="diachi" name="diachi" class="form-control" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="payment">Phương thức thanh toán</label>
                <select id="payment" name="payment" class="form-control" required onchange="toggleBankInfo()">
                    <option value="cod">Thanh toán khi nhận hàng (COD)</option>
                    <option value="bank">Chuyển khoản ngân hàng</option>
                </select>
            </div>
            <div id="bank-info" class="bank-info" style="display:none;">
                <strong>Thông tin chuyển khoản:</strong><br>
                Ngân hàng: Vietcombank<br>
                Số tài khoản: 0123456789<br>
                Chủ tài khoản: PHAM TRINH THANH DUY<br>
                Nội dung: [Họ tên người nhận] + [SĐT] + [Mã đơn hàng]<br>
            </div>
            <button type="submit" name="checkout" class="checkout-submit-btn">
                <i class="fas fa-check"></i> Xác nhận đặt hàng
            </button>
        </form>
    </div>
</div>
<script>
function toggleBankInfo() {
    const payment = document.getElementById('payment').value;
    const bankInfo = document.getElementById('bank-info');
    bankInfo.style.display = payment === 'bank' ? 'block' : 'none';
}
</script>

<?php include '../includes/footer.php'; ?>
</body>
</html>
