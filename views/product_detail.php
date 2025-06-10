<?php
// Kết nối CSDL
$conn = new mysqli("localhost", "root", "", "shopgiaydep");
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
<div id="sizeGuideModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeSizeGuide()">&times;</span>
    <img src="../assets/images/huongdanchonsize.png" alt="Bảng đo size giày" style="width:100%;">
  </div>
</div>
<div class="main-content">
    <div class="review-container">
<div class="product-review">
  <h3>Đánh giá sản phẩm</h3>
  
  <!-- Hiển thị số sao trung bình -->
  <div class="star-rating">
    <span class="star filled">★</span>
    <span class="star filled">★</span>
    <span class="star filled">★</span>
    <span class="star filled">★</span>
    <span class="star">★</span>
    <span class="average">4.0/5</span>
  </div>

  <!-- Danh sách bình luận -->
  <div class="review-list">
    <div class="review">
      <strong>Nguyễn Văn A</strong>
      <div class="stars">★★★★☆</div>
      <p>Giày rất êm và đúng size, giao hàng nhanh.</p>
    </div>
    <div class="review">
      <strong>Trần Thị B</strong>
      <div class="stars">★★★★★</div>
      <p>Đôi này đi làm cực kỳ lịch sự mà vẫn thoải mái.</p>
    </div>
  </div>

  <!-- Form thêm bình luận -->
  <form class="review-form">
    <label for="name">Tên:</label><br>
    <input type="text" id="name" required><br>
    
    <label for="rating">Đánh giá:</label><br>
    <select id="rating" required>
      <option value="5">5 sao</option>
      <option value="4">4 sao</option>
      <option value="3">3 sao</option>
      <option value="2">2 sao</option>
      <option value="1">1 sao</option>
    </select><br>
    
    <label for="comment">Bình luận:</label><br>
    <textarea id="comment" rows="3" required></textarea><br>
    
    <button type="submit">Gửi đánh giá</button>
  </form>
  </div>
</div>
<script src="../assets/js/script.js"></script>
<?php include '../views/modalsshop.php'; ?>
<?php include '../includes/footer.php'; ?>
</body>
</html>
