<?php
// Kết nối CSDL
$conn = new mysqli("localhost", "root", "", "shopgiaydep_sql");
$conn->set_charset("utf8");

$masp = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Truy vấn sản phẩm chính
$sql_product = "SELECT * FROM sanpham WHERE MaSP = $masp";
$result_product = $conn->query($sql_product);
$product = $result_product->fetch_assoc();

$masp = intval($_GET['id']); // Lấy ID sản phẩm từ URL

// Truy vấn lấy ảnh phụ
$img_query = "SELECT Anh1, Anh2, Anh3, Anh4 FROM anhsp WHERE MaSP = $masp";
$img_result = $conn->query($img_query);

$images = [];

if ($img_result && $img_result->num_rows > 0) {
    $images = $img_result->fetch_assoc();
}

// Truy vấn chi tiết sản phẩm
$sql_details = "SELECT * FROM chitietsanpham WHERE MaSP = $masp";
$result_details = $conn->query($sql_details);

$sizes = [];
$colors = [];
while ($row = $result_details->fetch_assoc()) {
    $sizes[] = $row['MaSize'];
    $colors[] = $row['MaMau'];
}
$sizes = array_unique($sizes);
$colors = array_unique($colors);

$gia_goc = number_format($product['DonGia'], 0, ',', '.') . 'đ';
$gia_sale = number_format($product['DonGia'] * 0.58, 0, ',', '.') . 'đ';

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?= $product['TenSP'] ?> - Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <div class="container">
        <div class="left-column">
            <img src="../assets/images/<?= $product['AnhNen'] ?>" alt="<?= $product['TenSP'] ?>">
          <div class="thumbnails">
<?php 
foreach ($images as $img) {
    $img = trim($img); // Loại bỏ khoảng trắng
    if (!empty($img) && $img !== 'undefined' && file_exists("../assets/images/$img")) {
        echo "<img src='../assets/images/$img' alt='Thumbnail'>";
    }
}
?>
</div>


        </div>
        <div class="right-column">
            <h1><?= $product['TenSP'] ?></h1>
            <p class="price">
                <del><?= $gia_goc ?></del>
                <strong><?= $gia_sale ?></strong>
            </p>
            
            <div class="section">
                <h4>Màu sắc</h4>
                <?php foreach ($colors as $color): ?>
                    <button class="option-btn"><?= $color ?></button>
                <?php endforeach; ?>
            </div>

            <div class="section">
                <h4>Kích cỡ</h4>
                <?php foreach ($sizes as $size): ?>
                    <button class="option-btn"><?= $size ?></button>
                <?php endforeach; ?>
               
</div>

            <button class="buy-btn">MUA NGAY</button>
            <p class="desc"><?= $product['MoTa'] ?></p>

<!-- Nút hướng dẫn chọn size giày -->
<div style="text-align: right; margin-top: 10px;">
  <a href="javascript:void(0);" onclick="openSizeGuide()" style="color: red; border: 2px solid red; padding: 5px 10px; text-decoration: none; border-radius: 5px;">HD cách chọn size giày</a>
</div>

        </div>
    </div>
   

    <?php include '../includes/footer.php'; ?>
<div id="sizeGuideModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeSizeGuide()">&times;</span>
    <img src="../assets/images/huongdanchonsize.png" alt="Bảng đo size giày" style="width:100%;">
  </div>
</div>
<script src="../assets/js/script.js"></script>

</body>
</html>
