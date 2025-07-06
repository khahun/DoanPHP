<?php
session_start();
require_once '../models/database.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user']['MaKH'];
$success = '';
$error = '';

// Xử lý áp dụng voucher
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['apply_voucher'])) {
    $voucher_code = trim($_POST['voucher_code']);
    $total_amount = floatval($_POST['total_amount']);
    

    
    // Kiểm tra voucher
    $sql = "SELECT * FROM voucher WHERE MaVoucher = ? AND TrangThai = 1 
            AND NgayBatDau <= NOW() AND NgayKetThuc >= NOW() 
            AND SoLuong > SoLuongDaSuDung";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $voucher_code);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $voucher = $result->fetch_assoc();
        
        // Debug logs
        error_log("Voucher found:");
        error_log("GiaTriToiThieu (Raw): " . $voucher['GiaTriToiThieu']);
        error_log("GiaTriToiThieu (Float): " . floatval($voucher['GiaTriToiThieu']));
        error_log("GiaTriGiamGia: " . $voucher['GiaTriGiamGia']);
        error_log("LoaiGiamGia: " . $voucher['LoaiGiamGia']);
        
        // Kiểm tra điều kiện áp dụng
        $min_amount = floatval($voucher['GiaTriToiThieu']);
        error_log("Comparison: " . $total_amount . " >= " . $min_amount);
        
        if ($total_amount >= $min_amount) {
            // Tính giá trị giảm giá
            $discount = 0;
            if ($voucher['LoaiGiamGia'] === 'percent') {
                $discount = $total_amount * (floatval($voucher['GiaTriGiamGia']) / 100);
                if ($voucher['GiaTriToiDa'] !== null) {
                    $discount = min($discount, floatval($voucher['GiaTriToiDa']));
                }
            } else {
                $discount = floatval($voucher['GiaTriGiamGia']);
            }
            
            // Debug logs
            error_log("Discount calculated: " . $discount);
            
            // Lưu voucher vào session
            $_SESSION['voucher'] = [
                'code' => $voucher_code,
                'discount' => $discount,
                'type' => $voucher['LoaiGiamGia'],
                'value' => $voucher['GiaTriGiamGia']
            ];
            
            $success = 'Áp dụng mã giảm giá thành công!';
            header('Location: checkout.php');
            exit();
        } else {
            $error = 'Đơn hàng chưa đạt giá trị tối thiểu ' . number_format($min_amount) . 'đ để áp dụng mã giảm giá.';
            error_log("Error: " . $error);
        }
    } else {
        $error = 'Mã giảm giá không hợp lệ hoặc đã hết hạn.';
        error_log("Error: " . $error);
    }
}

// Lấy danh sách voucher có thể sử dụng
$sql = "SELECT * FROM voucher WHERE TrangThai = 1 
        AND NgayBatDau <= NOW() AND NgayKetThuc >= NOW() 
        AND SoLuong > SoLuongDaSuDung
        ORDER BY NgayKetThuc ASC";
$result = $conn->query($sql);
$available_vouchers = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Mã giảm giá - GenZShop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .voucher-container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .voucher-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .voucher-header h1 {
            font-size: 2.5rem;
            color: #111;
            margin-bottom: 15px;
        }
        
        .voucher-header p {
            color: #666;
            font-size: 1.1rem;
        }
        
        .voucher-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .voucher-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 25px;
            position: relative;
            overflow: hidden;
        }
        
        .voucher-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 6px;
            background: #111;
        }
        
        .voucher-code {
            font-size: 1.5rem;
            font-weight: 700;
            color: #111;
            margin-bottom: 10px;
        }
        
        .voucher-name {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 15px;
        }
        
        .voucher-details {
            margin-bottom: 20px;
        }
        
        .voucher-detail {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
            color: #666;
        }
        
        .voucher-detail i {
            color: #111;
            width: 20px;
        }
        
        .voucher-validity {
            font-size: 0.9rem;
            color: #888;
            margin-top: 15px;
        }
        
        .voucher-form {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 30px;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .voucher-form h2 {
            font-size: 1.8rem;
            color: #111;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            font-weight: 500;
            color: #222;
            margin-bottom: 8px;
        }
        
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            background: #f8f9fa;
            color: #111;
        }
        
        .form-group input:focus {
            border-color: #111;
            outline: none;
            background: #fff;
        }
        
        .submit-btn {
            width: 100%;
            padding: 14px;
            background: #111;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .submit-btn:hover {
            background: #333;
        }
        
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .alert.success {
            background: #e8f5e9;
            color: #388e3c;
            border-left: 5px solid #4caf50;
        }
        
        .alert.error {
            background: #fff5f5;
            color: #e53935;
            border-left: 5px solid #e53935;
        }
        
        @media (max-width: 768px) {
            .voucher-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
<?php include '../includes/header.php'; ?>

<div class="voucher-container">
    <div class="voucher-header">
        <h1>Mã giảm giá</h1>
        <p>Chọn mã giảm giá phù hợp với đơn hàng của bạn</p>
    </div>
    
    <?php if ($success): ?>
        <div class="alert success">
            <i class="fas fa-check-circle"></i>
            <?= $success ?>
        </div>
    <?php endif; ?>
    
    <?php if ($error): ?>
        <div class="alert error">
            <i class="fas fa-exclamation-circle"></i>
            <?= $error ?>
        </div>
    <?php endif; ?>
    
    <div class="voucher-list">
        <?php foreach ($available_vouchers as $voucher): ?>
            <div class="voucher-card">
                <div class="voucher-code"><?= htmlspecialchars($voucher['MaVoucher']) ?></div>
                <div class="voucher-name"><?= htmlspecialchars($voucher['TenVoucher']) ?></div>
                <div class="voucher-details">
                    <div class="voucher-detail">
                        <i class="fas fa-tag"></i>
                        <?= $voucher['LoaiGiamGia'] === 'percent' ? 
                            'Giảm ' . $voucher['GiaTriGiamGia'] . '%' : 
                            'Giảm ' . number_format($voucher['GiaTriGiamGia']) . 'đ' ?>
                    </div>
                    <div class="voucher-detail">
                        <i class="fas fa-shopping-cart"></i>
                        Áp dụng cho đơn hàng từ <?= number_format($voucher['GiaTriToiThieu']) ?>đ
                    </div>
                    <?php if ($voucher['GiaTriToiDa']): ?>
                        <div class="voucher-detail">
                            <i class="fas fa-gift"></i>
                            Giảm tối đa <?= number_format($voucher['GiaTriToiDa']) ?>đ
                        </div>
                    <?php endif; ?>
                </div>
                <div class="voucher-validity">
                    <i class="fas fa-clock"></i>
                    Có hiệu lực đến <?= date('d/m/Y', strtotime($voucher['NgayKetThuc'])) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="voucher-form">
        <h2>Áp dụng mã giảm giá</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="voucher_code">Nhập mã giảm giá</label>
                <input type="text" id="voucher_code" name="voucher_code" required 
                       placeholder="Nhập mã giảm giá của bạn">
            </div>
            <input type="hidden" name="total_amount" value="<?= isset($_SESSION['cart_total']) ? $_SESSION['cart_total'] : 0 ?>">
            <button type="submit" name="apply_voucher" class="submit-btn">
                <i class="fas fa-ticket-alt"></i> Áp dụng mã giảm giá
            </button>
        </form>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
</body>
</html> 