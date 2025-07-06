<?php
session_start();
require_once '../models/database.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'nhanvien') {
    header('Location: ../views/home.php');
    exit();
}
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$where = [];
$params = [];
$types = '';
if ($search !== '') {
    $where[] = '(MaKH LIKE ? OR TenKH LIKE ? OR Email LIKE ?)';
    $params[] = "%$search%";
    $params[] = "%$search%";
    $params[] = "%$search%";
    $types .= 'sss';
}
$where_sql = $where ? ('WHERE ' . implode(' AND ', $where)) : '';
$sql = "SELECT MaKH, TenKH, Email, SDT, DiaChi FROM khachhang $where_sql ORDER BY MaKH DESC";
$stmt = $conn->prepare($sql);
if ($where) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khách hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background: #f8fafc;
        }

        .main-content {
            margin-left: 260px;
            padding: 40px 30px;
        }

        .page-title {
            text-align: center;
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 32px;
            letter-spacing: 1px;
        }
    </style>
</head>

<body>
    <?php include 'includes/sidebar.php'; ?>
    <div class="main-content">
        <div class="center-container">
            <h2 class="page-title">Quản lý khách hàng</h2>
            <form class="row g-3 mb-3" method="get" action="">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="search" placeholder="Tìm mã, tên hoặc email khách hàng..." value="<?php echo htmlspecialchars($search); ?>">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Tìm kiếm</button>
                </div>
                <div class="col-md-3 text-end">
                    <a href="customers.php" class="btn btn-secondary">Xóa lọc</a>
                </div>
            </form>
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Mã KH</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                        <th>Lịch sử đơn hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result && $result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo $row['MaKH']; ?></td>
                                <td><?php echo htmlspecialchars($row['TenKH']); ?></td>
                                <td><?php echo htmlspecialchars($row['Email']); ?></td>
                                <td><?php echo htmlspecialchars($row['SDT']); ?></td>
                                <td><?php echo htmlspecialchars($row['DiaChi']); ?></td>
                                <td>
                                    <a href="order_history.php?khachhang=<?php echo $row['MaKH']; ?>" class="btn btn-info btn-sm">Lịch sử đơn hàng</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Không có khách hàng nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>