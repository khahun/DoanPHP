<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giới thiệu XSHOP</title>
</head>
<body>
<?php include('../includes/header.php'); ?>

<link rel="stylesheet" href="../assets/css/style.css">
<div class="checkout-container">
    <h2>Thanh toán</h2>
    <div class="checkout-box">
        <form action="xuly_thanhtoan.php" method="post">
            <label for="fullname">Họ và tên:</label>
            <input type="text" id="fullname" name="fullname" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="address">Địa chỉ giao hàng:</label>
            <textarea id="address" name="address" required></textarea>

            <label for="payment">Phương thức thanh toán:</label>
            <select id="payment" name="payment">
                <option value="cod">Thanh toán khi nhận hàng</option>
                <option value="bank">Chuyển khoản ngân hàng</option>
            </select>

            <button type="submit">Xác nhận thanh toán</button>
        </form>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
</body>
</html>
