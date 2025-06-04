<?php
include_once '../models/database.php';

// Lấy filter từ dropdown
$filter = $_GET['filter'] ?? '';

// Xây dựng câu truy vấn cơ bản
$sql = "SELECT MaSP, TenSP, DonGia, AnhNen FROM sanpham WHERE 1";

// Áp dụng bộ lọc
switch ($filter) {
    case 'price_asc':
        $sql .= " ORDER BY DonGia ASC";
        break;
    case 'price_desc':
        $sql .= " ORDER BY DonGia DESC";
        break;
    case 'name_asc':
        $sql .= " ORDER BY TenSP ASC";
        break;
    case 'name_desc':
        $sql .= " ORDER BY TenSP DESC";
        break;
    case 'new':
        $sql .= " ORDER BY MaSP DESC"; // Giả sử MaSP tăng dần là mới
        break;
    default:
        $sql .= " ORDER BY MaSP DESC";
}

$sql .= " LIMIT 30";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>GiayDoi</title>
</head>
<body>
<?php include '../includes/header.php'; ?>
<link rel="stylesheet" href="../assets/css/style.css">
<div class="hero-section">
    <img src="../assets/images/banerGD.jpg" alt="Banner chính" class="hero-banner">
</div>
<div class="container">
    <div class="sidebar">
        <h3>Danh mục sản phẩm</h3>
        <ul>
            <li><a href="Adidas.php">ADIDAS</a></li>
            <li><a href="Nike.php">NIKE</a></li>
            <li><a href="Puma.php">PUMA</a></li>
            <li><a href="GiayNam.php">GIÀY NAM</a></li>
            <li><a href="GiayNu.php">GIÀY NỮ</a></li>
            <li><a href="GiayTE.php">GIÀY TRẺ EM</a></li>
            <li><a href="GiayDoi.php">GIÀY ĐÔI</a></li>
        </ul>
    </div>
    <div class="main-content">
        <!-- Dropdown lọc sản phẩm -->
        <div class="filter-bar">
            <form method="get">
                <label for="filter">Sắp xếp sản phẩm:</label>
                <select name="filter" id="filter" onchange="this.form.submit()">
                    <option value="">-- Chọn --</option>
                    <option value="new" <?= ($filter == 'new') ? 'selected' : '' ?>>Mới nhất</option>
                    <option value="name_asc" <?= ($filter == 'name_asc') ? 'selected' : '' ?>>Tên A-Z</option>
                    <option value="name_desc" <?= ($filter == 'name_desc') ? 'selected' : '' ?>>Tên Z-A</option>
                    <option value="price_asc" <?= ($filter == 'price_asc') ? 'selected' : '' ?>>Giá: thấp đến cao</option>
                    <option value="price_desc" <?= ($filter == 'price_desc') ? 'selected' : '' ?>>Giá: cao xuống thấp</option>
                </select>
            </form>
        </div>

        <!-- Danh sách sản phẩm -->
           <div class="product-list">
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tensp = htmlspecialchars($row['TenSP']);
        $gia = number_format($row['DonGia']) . " VNĐ";
        $anh = !empty($row['AnhNen']) ? "../assets/images/" . $row['AnhNen'] : "../assets/images/no-image.png";
?>
    <div class="product-card">
        <a href="product_detail.php?id=<?= $row['MaSP'] ?>">
            <img src="<?= $anh ?>" alt="<?= $tensp ?>">
            <h3><?= $tensp ?></h3>
        </a>
        <p class="price">Giá: <?= $gia ?></p>
    </div>
<?php
    }
} else {
    echo "<p>Không có sản phẩm nào để hiển thị.</p>";
}
?>
</div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>
</body>
</html>