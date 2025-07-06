<?php
session_start();
require_once __DIR__ . '/../models/database.php';

// Kiểm tra đăng nhập
if (!isset($_SESSION['user'])) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit();
}

// Kiểm tra method và order_id
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['order_id'])) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
    exit();
}

$order_id = $_POST['order_id'];
$user = $_SESSION['user'];

// Kiểm tra đơn hàng có thuộc về user không
$sql = "SELECT * FROM hoadon WHERE MaHD = $order_id AND MaKH = {$user['MaKH']} AND TinhTrang = 'chưa duyệt'";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Không thể hủy đơn hàng này']);
    exit();
}

// Lấy chi tiết đơn hàng để cập nhật lại số lượng sản phẩm
$order_details = bill_detail($order_id);

// Bắt đầu transaction
mysqli_begin_transaction($conn);

try {
    // Cập nhật lại số lượng sản phẩm
    while ($item = mysqli_fetch_assoc($order_details)) {
        $sql = "UPDATE chitietsanpham 
                SET SoLuong = SoLuong + {$item['SoLuong']} 
                WHERE MaSP = {$item['MaSP']} 
                AND MaSize = {$item['Size']} 
                AND MaMau = '{$item['MaMau']}'";
        mysqli_query($conn, $sql);
    }

    // Cập nhật trạng thái đơn hàng
    $sql = "UPDATE hoadon SET TinhTrang = 'đã hủy' WHERE MaHD = $order_id";
    mysqli_query($conn, $sql);

    // Commit transaction
    mysqli_commit($conn);

    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'message' => 'Hủy đơn hàng thành công']);
} catch (Exception $e) {
    // Rollback nếu có lỗi
    mysqli_rollback($conn);
    
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra khi hủy đơn hàng']);
} 