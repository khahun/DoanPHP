<?php
include_once '../models/database.php';

$query = "SELECT * FROM sanpham";
$sql = "SELECT MaSP, TenSP, DonGia, AnhNen FROM sanpham ORDER BY MaSP DESC LIMIT 25";
$result = $conn->query($sql);
$km_sql = "
SELECT sp.MaSP, sp.TenSP, sp.DonGia, sp.AnhNen 
FROM sanpham sp 
JOIN sanphamkhuyenmai km ON sp.MaSP = km.MaSP
ORDER BY sp.MaSP DESC
LIMIT 15";
$km_result = $conn->query($km_sql);

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giới thiệu XSHOP</title>
</head>
<body>
<?php include '../includes/header.php'; ?>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="../assets/js/script.js" defer></script>
<div class="hero-section">
    <img src="../assets/images/banner.jpg" alt="Banner chính" class="hero-banner">
</div>
<div class="categories">
    <div class="category">
        <p>GIÀY NAM</p>
        <button>XEM MẪU</button>
    </div>
    <div class="category">
        <p>GIÀY NỮ</p>
        <button>XEM MẪU</button>
    </div>
    <div class="category">
        <p>GIÀY ĐÔI</p>
        <button>XEM MẪU</button>
    </div>
</div>
<h2 class="hot-title">HÀNG CAO CẤP <span>HOT NHẤT</span></h2>
<div class="product-list">
     <?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tensp = htmlspecialchars($row['TenSP']);
        $gia = number_format($row['DonGia']) . " VNĐ";
        $anh = !empty($row['AnhNen']) ? "../assets/images/" . $row['AnhNen'] : "../assets/images/no-image.png"; // fallback
?>
        <div style="width: 200px; border: 1px solid #ccc; padding: 10px; text-align: center;">
           <a href="product_detail.php?id=<?= $row['MaSP'] ?>">
    <img src="<?= $anh ?>" alt="<?= $tensp ?>" style="width: 100%;">
    <h3><?= $tensp ?></h3>
</a>
<p>Giá: <?= $gia ?></p>

        </div>
<?php
    }    
} else {
    echo "<p>Không có sản phẩm nào để hiển thị.</p>";
}
$conn->close();
?>
</div>
<div class="title-wrapper">
<h2 class="breadcrumb">
  <span>SẢN PHẨM</span>
  <span class="highlight-wrapper">
    <span id="highlight-text" class="highlight-slide">DEAL NGON </span>
  </span>
</h2>
</div>
<div class="product-list">
    <div class="product-list">
<?php
if ($km_result && $km_result->num_rows > 0) {
    while ($row = $km_result->fetch_assoc()) {
        $tensp = htmlspecialchars($row['TenSP']);
        $gia = number_format($row['DonGia']) . " VNĐ";
        $anh = !empty($row['AnhNen']) ? "../assets/images/" . $row['AnhNen'] : "../assets/images/no-image.png";
?>
    <div style="width: 200px; border: 1px solid #ccc; padding: 10px; text-align: center;">
        <a href="product_detail.php?id=<?= $row['MaSP'] ?>">
    <img src="<?= $anh ?>" alt="<?= $tensp ?>" style="width: 100%;">
    <h3><?= $tensp ?></h3>
</a>
<p>Giá: <?= $gia ?></p>

    </div>
<?php
    }
} else {
    echo "<p>Không có sản phẩm khuyến mãi nào để hiển thị.</p>";
}
?>
</div>

    
</div>

<div class="statistic-section">
    <div class="statistic-content">
        <p>
            Hơn 10 năm phát triển, XSHOP luôn mang đến những mẫu giày chất lượng tốt nhất với giá cả hợp lí nhất
            đến tay người tiêu dùng với hệ thống cửa hàng Số 1 Hà Nội và bán online khắp Việt Nam.
        </p>

        <h2 class="counter" data-target="1349841">0</h2>
        <p>Số Sản Phẩm Đã Bán</p>

        <h2 class="counter" data-target="567392">0</h2>
        <p>Khách Hàng Đã Mua</p>
    </div>

    <div class="statistic-video">
        <iframe width="560" height="350"
                src="https://www.youtube.com/embed/a1ILAowCiOw?autoplay=1&mute=1"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
    </div>
</div>
<script src="script.js"></script>
<?php include '../includes/footer.php'; ?>
</body>
</html>