<?php
session_start();

// Xóa voucher khỏi session
if (isset($_SESSION['voucher'])) {
    unset($_SESSION['voucher']);
}

// Chuyển hướng về trang giỏ hàng
header('Location: cart.php');
exit(); 