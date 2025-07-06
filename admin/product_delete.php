<?php
session_start();
require_once '../models/database.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'nhanvien') {
    header('Location: ../views/home.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Lấy thông tin ảnh sản phẩm trước khi xóa
    $sql_get_image = "SELECT AnhNen FROM sanpham WHERE MaSP = ?";
    $stmt_get_image = $conn->prepare($sql_get_image);
    $stmt_get_image->bind_param("i", $id);
    $stmt_get_image->execute();
    $result = $stmt_get_image->get_result();
    $product = $result->fetch_assoc();
    
    // Xóa các bản ghi liên quan trước
    $conn->query("DELETE FROM chitietsanpham WHERE MaSP = $id");
    $conn->query("DELETE FROM chitiethoadon WHERE MaSP = $id");
    $conn->query("DELETE FROM anhsp WHERE MaSP = $id");
    $conn->query("DELETE FROM phieunhap WHERE MaSP = $id");
    $conn->query("DELETE FROM phieuxuat WHERE MaSP = $id");
    $conn->query("DELETE FROM gio_hang WHERE MaSP = $id");
    
    // Xóa sản phẩm
    $sql = "DELETE FROM sanpham WHERE MaSP = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        // Xóa file ảnh nếu tồn tại
        if ($product && !empty($product['AnhNen'])) {
            $image_path = "../assets/images/" . $product['AnhNen'];
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        // Xóa thành công, chuyển về danh sách sản phẩm
        header('Location: products.php');
        exit();
    } else {
        echo "<script>alert('Xóa sản phẩm thất bại!'); window.location='products.php';</script>";
        exit();
    }
} else {
    header('Location: products.php');
    exit();
} 