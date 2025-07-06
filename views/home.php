<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once '../models/database.php';

$query = "SELECT * FROM sanpham";
$sql = "SELECT MaSP, TenSP, DonGia, AnhNen FROM sanpham ORDER BY MaSP DESC LIMIT 80";
$result = $conn->query($sql);
$km_sql = "
SELECT sp.MaSP, sp.TenSP, sp.DonGia, sp.AnhNen 
FROM sanpham sp 
JOIN sanphamkhuyenmai km ON sp.MaSP = km.MaSP
ORDER BY sp.MaSP DESC
LIMIT 50";
$km_result = $conn->query($km_sql);

// Lấy banner hoạt động
$banner_sql = "SELECT hinh_anh, tieu_de FROM banner WHERE trang_thai = 1 ORDER BY id DESC";
$banner_result = $conn->query($banner_sql);

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giới thiệu GenZSHOP</title>

</head>
<body>
<?php include '../includes/header.php'; ?>
<!-- Multi Banner Slider -->
<div class="multi-banner-slider">
  <button class="slider-btn prev">&#10094;</button>
  <div class="slider-container">
    <div class="slider-track">
      <img src="../assets/images/bannerA.jpg" class="slider-item" />
      <img src="../assets/images/bannerN.jpg" class="slider-item" />
      <img src="../assets/images/bannerV.jpg" class="slider-item" />
      <img src="../assets/images/bannerR.jpg" class="slider-item" />
      <img src="../assets/images/bannerC.jpg" class="slider-item" />
      <img src="../assets/images/bannerP.jpg" class="slider-item" />
    </div>
  </div>
  <button class="slider-btn next">&#10095;</button>
</div>
<style>
.multi-banner-slider {
  position: relative;
  width: 100%;
  overflow: hidden;
}
.slider-container {
  overflow: hidden;
  width: 100%;
}
.slider-track {
  display: flex;
  transition: transform 0.5s ease-in-out;
  width: max-content;
}
.slider-item {
  width: 100vw;
  flex-shrink: 0;
  object-fit: cover;
}
.slider-btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(0, 0, 0, 0.5);
  color: #fff;
  border: none;
  border-radius: 50%;
  width: 40px;
  height: 40px;
  cursor: pointer;
  z-index: 10;
  font-size: 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: background-color 0.3s;
}
.slider-btn:hover {
  background-color: rgba(0, 0, 0, 0.8);
}
.slider-btn.prev {
  left: 10px;
}
.slider-btn.next {
  right: 10px;
}
</style>
<script>
const bannerTrack = document.querySelector('.slider-track');
const bannerSlides = document.querySelectorAll('.slider-item');
const bannerPrev = document.querySelector('.slider-btn.prev');
const bannerNext = document.querySelector('.slider-btn.next');
const slidesToShow = 1;
let currentSlide = 0;
function updateSlider() {
  const slideWidth = bannerSlides[0].offsetWidth; 
  bannerTrack.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
}
bannerPrev.addEventListener('click', () => {
  if (currentSlide > 0) currentSlide--;
  updateSlider();
});
bannerNext.addEventListener('click', () => {
  if (currentSlide < bannerSlides.length - slidesToShow) currentSlide++;
  updateSlider();
});
setInterval(() => {
  currentSlide = (currentSlide + 1) % (bannerSlides.length - slidesToShow + 1);
  updateSlider();
}, 5000);
window.addEventListener('resize', updateSlider);
</script>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<div id="sale-notifications" class="notification-wrapper"></div>
<button id="scrollButton" class="scroll-button" title="Cuộn">⬆️</button>
<script>
const scrollButton = document.getElementById("scrollButton");

window.addEventListener("scroll", () => {
  // Hiện nút khi cuộn xuống quá 200px
  if (window.scrollY > 200) {
    scrollButton.style.display = "block";

    // Đổi biểu tượng: nếu đang gần cuối -> nút cuộn lên
    if (window.innerHeight + window.scrollY >= document.body.scrollHeight - 100) {
      scrollButton.textContent = "⬆️"; // Cuộn lên đầu
    } else {
      scrollButton.textContent = "⬇️"; // Cuộn xuống cuối
    }
  } else {
    scrollButton.style.display = "none";
  }
});

scrollButton.addEventListener("click", () => {
  // Nếu đang ở gần cuối trang -> cuộn lên đầu
  if (window.innerHeight + window.scrollY >= document.body.scrollHeight - 100) {
    window.scrollTo({ top: 0, behavior: "smooth" });
  } else {
    window.scrollTo({ top: document.body.scrollHeight, behavior: "smooth" });
  }
});
</script>
<div class="categories">
    <div class="category">
        <p>GIÀY NAM</p>
        <a href="GiayNam.php"><button>XEM MẪU</button></a>
    </div>
    <div class="category">
        <p>GIÀY NỮ</p>
       <a href="GiayNu.php"><button>XEM MẪU</button></a>
    </div>
    <div class="category">
        <p>GIÀY ĐÔI</p>
        <a href="GiayDoi.php"><button>XEM MẪU</button></a>
    </div>
</div>
<br>
<h2 class="hot-title">HÀNG CAO CẤP <span>HOT NHẤT</span></h2>
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
<div class="title-wrapper">
<h2 class="breadcrumb">
  <span>SẢN PHẨM</span>
  <span class="highlight-wrapper">
    <span id="highlight-text" class="highlight-slide">DEAL NGON </span>
  </span>
</h2>
</div>
    <div class="product-list">
<?php
if ($km_result && $km_result->num_rows > 0) {
    while ($row = $km_result->fetch_assoc()) {
        $tensp = htmlspecialchars($row['TenSP']);
        $gia = number_format($row['DonGia']) . " VNĐ";
        $anh = !empty($row['AnhNen']) ? "../assets/images/" . $row['AnhNen'] : "../assets/images/no-image.png";
?>
    <div class="product-card">
        <span class="sale-badge">SALE</span>
        <a href="product_detail.php?id=<?= $row['MaSP'] ?>">
            <img src="<?= $anh ?>" alt="<?= $tensp ?>">
            <h3><?= $tensp ?></h3>
        </a>
        <p class="price">Giá: <?= $gia ?></p>
    </div>
<?php
    }
} else {
    echo "<p>Không có sản phẩm khuyến mãi nào để hiển thị.</p>";
}
?>
</div>

<div class="statistic-section">
    <div class="statistic-content">
        <p>
            Hơn 10 năm phát triển, GENZSHOP luôn mang đến những mẫu giày chất lượng tốt nhất với giá cả hợp lí nhất
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
<?php include '../views/modalsshop.php'; ?>
<script src="../assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include '../includes/footer.php'; ?>
</body>
</html>