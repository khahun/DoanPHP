<?php
include_once '../models/database.php';

$query = "SELECT * FROM sanpham";
$sql = "SELECT MaSP, TenSP, DonGia, AnhNen FROM sanpham ORDER BY MaSP DESC LIMIT 30";
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
<script src="../assets/js/script.js"></script>
<div id="sale-notifications" class="notification-wrapper"></div>
<div class="hero-section">

    <img src="../assets/images/banner.jpg" alt="Banner chính" class="hero-banner">

</div>
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
        <p>GIÀY TRẺ EM</p>
        <a href="GiayTE.php"><button>XEM MẪU</button></a>
    </div>
    <div class="category">
        <p>GIÀY ĐÔI</p>
        <a href="GiayDoi.php"><button>XEM MẪU</button></a>
    </div>
</div>
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
<!-- Modal: Giới thiệu -->
<div id="modalGioiThieu" class="modal-info">
  <div class="modal-info-content">
    <span class="close" onclick="closeModal('modalGioiThieu')">&times;</span>
    <h2>Giới thiệu</h2>
    <p>Chào mừng bạn đến với GenZ Shop – điểm đến tin cậy dành cho các tín đồ giày dép hiện đại! Chúng tôi chuyên cung cấp đa dạng các mẫu giày từ sneaker thời thượng, giày thể thao năng động đến giày casual trẻ trung, phù hợp với mọi phong cách và cá tính của giới trẻ. Với sứ mệnh mang lại sản phẩm chất lượng cao, giá cả hợp lý cùng dịch vụ chăm sóc khách hàng tận tâm, GenZ Shop tự hào đồng hành cùng bạn trên từng bước đi đầy tự tin và phong cách.</p>
  </div>
</div>

<!-- Modal: Hướng dẫn đặt hàng -->
<div id="modalHuongDan" class="modal-info">
  <div class="modal-info-content">
   <span class="close" onclick="closeModal('modalHuongDan')">&times;</span>
    <h2>Hướng dẫn đặt hàng</h2>
    <p>Đặt hàng tại GenZ Shop cực kỳ đơn giản và nhanh chóng:<br>
<br>

      1. Chọn sản phẩm: Duyệt qua các danh mục và chọn mẫu giày bạn yêu thích.<br>
<br>

      2. Thêm vào giỏ hàng: Chọn size, màu sắc và nhấn "Thêm vào giỏ".<br>
<br>

      3. Kiểm tra giỏ hàng: Xem lại sản phẩm đã chọn, điều chỉnh số lượng nếu cần.<br>
<br>

      4. Thanh toán: Nhập thông tin giao hàng và chọn phương thức thanh toán (COD, chuyển khoản, ví điện tử).<br>
<br>

      5. Xác nhận đơn hàng: Nhân viên sẽ liên hệ xác nhận đơn và tiến hành xử lý.<br>
<br>

      6. Giao hàng: Đơn hàng sẽ được vận chuyển nhanh chóng đến địa chỉ của bạn.</p>
  </div>
</div>

<!-- Modal: Chính sách đổi hàng -->
<div id="modalChinhsach" class="modal-info">
  <div class="modal-info-content">
    <span class="close" onclick="closeModal('modalChinhsach')">&times;</span>
    <h2>Chính sách đổi hàng</h2>
 <ul class="circle">
    <p>GenZ Shop cam kết mang đến sự hài lòng tuyệt đối cho khách hàng với chính sách đổi hàng rõ ràng:<br>

<li>Chỉ nhận đổi hàng trong vòng 7 ngày kể từ ngày nhận hàng.</li><br>

<li>Sản phẩm phải còn nguyên tem, nhãn, chưa qua sử dụng và trong tình trạng như lúc nhận.</li><br>

<li>Khách hàng cần giữ lại hóa đơn và hộp sản phẩm để làm thủ tục đổi trả.</li><br>

<li>Các trường hợp lỗi do nhà sản xuất sẽ được hỗ trợ đổi mới miễn phí.</li><br>

<li>Hàng đổi sẽ được gửi trong vòng 3-5 ngày làm việc sau khi nhận sản phẩm trả lại.</li></p>
</ul>
  </div>
</div>

<!-- Modal: Bảo mật -->
<div id="modalBaoMat" class="modal-info">
  <div class="modal-info-content">
    <span class="close" onclick="closeModal('modalBaoMat')">&times;</span>
    <h2>Chính sách bảo mật</h2>
    <ul class="circle">
    <p>Thông tin cá nhân và dữ liệu khách hàng tại GenZ Shop được bảo vệ nghiêm ngặt theo tiêu chuẩn bảo mật cao nhất:
    <br>

<li>Chúng tôi chỉ thu thập thông tin cần thiết để xử lý đơn hàng và hỗ trợ khách hàng.</li><br>

<li>Thông tin không được chia sẻ hoặc bán cho bên thứ ba dưới bất kỳ hình thức nào.</li><br>

<li>Hệ thống thanh toán được mã hóa an toàn SSL, đảm bảo giao dịch của bạn luôn được bảo vệ.</li><br>

<li>Đội ngũ kỹ thuật luôn theo dõi và cập nhật các biện pháp bảo mật để tránh rủi ro.</li></p>
</ul>
  </div>
</div>


<!-- Modal Liên hệ -->
<div id="modalLienHe" class="modal-info">
  <div class="modal-info-content">
    <span class="close" onclick="closeModal('modalLienHe')">&times;</span>
    <h2>Liên hệ</h2>
    <ul class="circle">
    <p>Chúng tôi luôn sẵn sàng hỗ trợ bạn 24/7 qua các kênh sau:<br>

<li>Hotline: 1900 1234</li><br>

<li>Email: support@genzshop.vn</li><br>

<li>Fanpage Facebook: facebook.com/genzshop</li><br>

<li>Chat trực tiếp trên website</li><br>
<li>Mọi thắc mắc, góp ý hay yêu cầu hỗ trợ xin vui lòng liên hệ, đội ngũ GenZ Shop sẽ phản hồi nhanh chóng và tận tình.</li></p>
</ul>
  </div>
</div>


<!-- Modal: Hệ thống cửa hàng -->
<div id="modalHethong" class="modal-info">
  <div class="modal-info-content">
    <span class="close" onclick="closeModal('modalHethong')">&times;</span>
    <h2>Hệ Thống Cửa Hàng</h2>
     <ul class="circle">
    <p>GenZ Shop hiện có các cửa hàng trải dài tại các thành phố lớn để phục vụ khách hàng thuận tiện hơn:<br>

<li>Hà Nội: 123 Phố Huế, Quận Hai Bà Trưng</li><br>

<li>TP. Hồ Chí Minh: 456 Lê Văn Sỹ, Quận 3</li><br>

<li>Đà Nẵng: 78 Lê Duẩn, Quận Hải Châu</li><br>

<li>Hải Phòng: 99 Lê Lợi, Quận Ngô Quyền</li><br>
<li>Bạn cũng có thể đặt hàng online và nhận sản phẩm tại cửa hàng gần nhất hoặc giao tận nhà theo yêu cầu.</li></p>
</ul>
  </div>
</div>
<button id="scrollButton" class="scroll-button" title="Cuộn">⬆️</button>

<script src="../assets/js/script.js"></script>
<?php include '../includes/footer.php'; ?>
</body>
</html>