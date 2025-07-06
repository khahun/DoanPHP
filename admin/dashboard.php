<?php
session_start();
require_once '../models/database.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'nhanvien') {
    header('Location: ../views/home.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ff 100%);
            min-height: 100vh;
        }

        .main-content {
            margin-left: 260px;
            padding: 40px 30px;
        }

        .dashboard-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #2d3a4b;
            letter-spacing: 2px;
            margin-bottom: 40px;
        }

        .dashboard-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 32px;
        }

        .dashboard-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
            padding: 36px 32px;
            min-width: 260px;
            max-width: 320px;
            text-align: center;
            border: none;
            position: relative;
        }

        .dashboard-card i {
            font-size: 2.5rem;
            margin-bottom: 18px;
            color: #6366f1;
        }

        .dashboard-card .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #22223b;
            margin-bottom: 8px;
        }

        @media (max-width: 900px) {
            .main-content {
                margin-left: 0;
            }

            .dashboard-cards {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
</head>

<body>
    <?php include dirname($_SERVER['PHP_SELF']) == '/admin' ? 'includes/sidebar.php' : 'includes/sidebar.php'; ?>
    <div class="main-content">
        <div class="dashboard-title">Trang Quản Trị</div>
        <div class="dashboard-cards">
            <div class="dashboard-card">
                <i class="fa-solid fa-box-open"></i>
                <div class="card-title">Sản phẩm</div>
                <div><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/admin' ? 'products.php' : 'products.php'; ?>">Quản lý sản phẩm</a></div>
            </div>
            <div class="dashboard-card">
                <i class="fa-solid fa-file-invoice-dollar"></i>
                <div class="card-title">Đơn hàng</div>
                <div><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/admin' ? 'orders.php' : 'orders.php'; ?>">Quản lý đơn hàng</a></div>
            </div>
            <div class="dashboard-card">
                <i class="fa-solid fa-users"></i>
                <div class="card-title">Khách hàng</div>
                <div><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/admin' ? 'customers.php' : 'customers.php'; ?>">Quản lý khách hàng</a></div>
            </div>
            <div class="dashboard-card">
                <i class="fa-solid fa-list"></i>
                <div class="card-title">Danh mục</div>
                <div><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/admin' ? 'categories.php' : 'categories.php'; ?>">Quản lý danh mục</a></div>
            </div>
            <div class="dashboard-card">
                <i class="fa-solid fa-newspaper"></i>
                <div class="card-title">Nội dung</div>
                <div><a href="<?php echo dirname($_SERVER['PHP_SELF']) == '/admin' ? 'content.php' : 'content.php'; ?>">Quản lý nội dung</a></div>
            </div>
        </div>
    </div>
</body>

</html>