<?php
session_start();
header('Content-Type: application/json');

// Kiểm tra xem người dùng đã đăng nhập chưa
$response = array(
    'logged_in' => isset($_SESSION['user_id']),
    'user_id' => $_SESSION['user_id'] ?? null
);

echo json_encode($response);
?> 