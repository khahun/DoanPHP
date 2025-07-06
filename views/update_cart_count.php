<?php
session_start();

if (isset($_POST['count'])) {
    $_SESSION['cart_count'] = (int)$_POST['count'];
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?> 