<?php
include_once __DIR__ . '/../includes/header.php';
include_once __DIR__ . '/../models/database.php';

// Lấy các tham số lọc từ URL
$filters = [
    'product_type' => $_GET['product_type'] ?? '',
    'brand' => '', // Không lọc theo hãng trên trang giảm giá (chỉ lọc theo sale_only)
    'gender' => $_GET['gender'] ?? '',
    'size' => $_GET['size'] ?? '',
    'min_price' => $_GET['min_price'] ?? '',
    'max_price' => $_GET['max_price'] ?? '',
    'sale_only' => true, // Luôn lọc sản phẩm đang giảm giá
];

// Gọi hàm filterProducts với các tham số lọc
$result = filterProducts($filters);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sản phẩm đang giảm giá</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/../includes/header.php'; ?>

<div class="hero-section">
    <!-- Có thể thêm banner riêng cho trang sale nếu có -->
    <img src="assets/images/bannerSL.jpg" alt="Banner chính" class="hero-banner">
</div>

<div class="container">
    <div class="sidebar">
        <h3>Danh mục sản phẩm</h3>
        <ul>
           <li><a href="views/Adidas.php">ADIDAS</a></li>
        <li><a href="views/Nike.php">NIKE</a></li>
        <li><a href="views/Puma.php">PUMA</a></li>
        <li><a href="views/Vans.php">VANS</a></li>
        <li><a href="views/Converse.php">CONVERSE</a></li>
        <li><a href="views/Fila.php">FILA</a></li>
        <li><a href="views/Reebok.php">REEBOK</a></li>
        <li><a href="views/GiayNam.php">GIÀY NAM</a></li>
        <li><a href="views/GiayNu.php">GIÀY NỮ</a></li>  
        <li><a href="views/GiayDoi.php">GIÀY ĐÔI</a></li>
         <li><a href="thanhly.php">THANH LÝ</a></li>
         <li><a href="FlashSale.php">FLASHSALE</a></li>
        <li class="has-submenu">
           <a href="#">DÉP</a>
              <ul class="submenu">
                <li><a href="views/DépAdidas.php">DÉP ADIDAS</a></li>
                <li><a href="views/DépNike.php">DÉP NIKE</a></li>
               <li><a href="views/DépPuma.php">DÉP PUMA</a></li>
              </ul>
        </li>
        </ul>
    </div>
    <div class="main-content">
        <!-- Nút lọc sản phẩm -->
        <?php include __DIR__ . '/../includes/filter_form.php'; ?>
        <h2 class="mb-4">Sản phẩm đang giảm giá</h2>

        <!-- Danh sách sản phẩm -->
        <div class="product-list">
            <?php
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $tensp = htmlspecialchars($row['TenSP']);
                    $gia_goc = number_format($row['DonGia']) . " VNĐ";
                    $gia_sale = number_format($row['DonGiaSale']) . " VNĐ";
                    $anh = !empty($row['AnhNen']) ? "assets/images/" . $row['AnhNen'] : "assets/images/no-image.png";
            ?>
                <div class="product-card">
                    <a href="product_detail.php?id=<?= $row['MaSP'] ?>">
                        <img src="<?= $anh ?>" alt="<?= $tensp ?>">
                        <h3><?= $tensp ?></h3>
                    </a>
                    <p class="price">
                        <span class="original-price">Giá gốc: <?= $gia_goc ?></span><br>
                        <span class="sale-price">Giá sale: <?= $gia_sale ?></span>
                    </p>
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

<button id="scrollButton" class="scroll-button" title="Cuộn">⬆️</button>
<script>
const scrollButton = document.getElementById("scrollButton");

window.addEventListener("scroll", () => {
  if (window.scrollY > 200) {
    scrollButton.style.display = "block";
    if (window.innerHeight + window.scrollY >= document.body.scrollHeight - 100) {
      scrollButton.textContent = "⬆️";
    } else {
      scrollButton.textContent = "⬇️";
    }
  } else {
    scrollButton.style.display = "none";
  }
});

scrollButton.addEventListener("click", () => {
  if (window.innerHeight + window.scrollY >= document.body.scrollHeight - 100) {
    window.scrollTo({ top: 0, behavior: "smooth" });
  } else {
    window.scrollTo({ top: document.body.scrollHeight, behavior: "smooth" });
  }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include __DIR__ . '/../views/modalsshop.php'; ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>
</body>
</html> 