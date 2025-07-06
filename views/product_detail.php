<?php
// Kết nối CSDL
$conn = new mysqli("localhost", "root", "", "shopgiaydep");
$conn->set_charset("utf8");

session_start();
$masp = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Truy vấn sản phẩm chính
$sql_product = "SELECT * FROM sanpham WHERE MaSP = $masp";
$result_product = $conn->query($sql_product);
$product = $result_product->fetch_assoc();

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

// Lấy đánh giá từ bảng binhluan
$binhluan = [];
$sql_binhluan = "SELECT b.*, k.TenKH FROM binhluan b LEFT JOIN khachhang k ON b.MaKH = k.MaKH WHERE b.MaSP = $masp ORDER BY b.ThoiGian DESC";
$result_binhluan = $conn->query($sql_binhluan);
if ($result_binhluan && $result_binhluan->num_rows > 0) {
    while ($row = $result_binhluan->fetch_assoc()) {
        $binhluan[] = $row;
    }
}

// Xử lý lưu đánh giá mới
$review_error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_review'])) {
    if (isset($_SESSION['user']['MaKH'])) {
        $makh = intval($_SESSION['user']['MaKH']);
        $sosao = intval($_POST['review_rating']);
        $noidung = $conn->real_escape_string($_POST['review_content']);
        $sql_insert = "INSERT INTO binhluan (MaSP, MaKH, NoiDung, ThoiGian, DanhGia) VALUES ($masp, $makh, '$noidung', NOW(), $sosao)";
        $conn->query($sql_insert);
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    } else {
        $review_error = 'Bạn cần <a href="/DoanPHP/views/login.php">đăng nhập</a> để gửi đánh giá.';
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title><?= $product['TenSP'] ?> - Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    
    <div class="product-detail">
        <div class="product-gallery">
            <img class="main-image" src="../assets/images/<?= $product['AnhNen'] ?>" alt="<?= $product['TenSP'] ?>">
            <div class="thumbnail-list">
                <?php foreach ($images as $img) {
                    $img = trim($img);
                    if (!empty($img) && $img !== 'undefined' && file_exists("../assets/images/$img")) {
                        echo "<img class='thumbnail' src='../assets/images/$img' alt='Thumbnail' onclick='changeMainImage(this.src)'>";
                    }
                } ?>
            </div>
        </div>
        <div class="product-info">
            <h1 class="product-title"><?= htmlspecialchars($product['TenSP']) ?></h1>
            <div class="product-price">
                <span class="original-price"><?= $gia_goc ?></span>
                <span class="sale-price"><?= $gia_sale ?></span>
                <span class="discount-badge">-42%</span>
            </div>
            <form id="productForm" onsubmit="addToCart(); return false;">
                <div class="product-options">
                    <div class="option-group">
                        <h4>Màu sắc</h4>
                        <div class="color-options">
                            <?php foreach ($colors as $color): ?>
                            <div class="color-option">
                                <input type="radio" name="color" id="color_<?= $color ?>" value="<?= $color ?>" required>
                                <label for="color_<?= $color ?>"><?= $color ?></label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="option-group">
                        <h4>Kích cỡ</h4>
                        <div class="size-options">
                            <?php foreach ($sizes as $size): ?>
                            <div class="size-option">
                                <input type="radio" name="size" id="size_<?= $size ?>" value="<?= $size ?>" required>
                                <label for="size_<?= $size ?>"><?= $size ?></label>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="quantity-group">
                        <label for="quantity">Số lượng</label>
                        <div class="quantity-input">
                            <button type="button" onclick="updateQuantity(-1)"><i class="fas fa-minus"></i></button>
                            <input type="number" id="quantity" name="quantity" value="1" min="1" readonly>
                            <button type="button" onclick="updateQuantity(1)"><i class="fas fa-plus"></i></button>
                        </div>
                    </div>
                </div>
                <button class="add-to-cart-btn" type="submit"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
            </form>
            <div class="product-description">
                <?= $product['MoTa'] ?>
            </div>
            <button class="size-guide-btn" onclick="openSizeGuide()"><i class="fas fa-ruler"></i> Hướng dẫn chọn size</button>
        </div>
    </div>
    <div id="sizeGuideModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeSizeGuide()">&times;</span>
            <img src="../assets/images/huongdanchonsize.png" alt="Bảng đo size giày" style="width:100%;">
        </div>
    </div>
    <div class="product-review">
        <h3>Đánh giá sản phẩm</h3>
        <div class="review-list">
            <?php if (count($binhluan) > 0): ?>
                <?php foreach ($binhluan as $bl): ?>
                    <div class="review">
                        <strong><?= htmlspecialchars($bl['TenKH'] ?? 'Ẩn danh') ?></strong>
                        <span class="review-time"><?= date('d/m/Y H:i', strtotime($bl['ThoiGian'])) ?></span>
                        <div class="stars">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <span class="star<?= ($i <= ($bl['DanhGia'] ?? 5)) ? ' filled' : '' ?>">★</span>
                            <?php endfor; ?>
                        </div>
                        <p><?= htmlspecialchars($bl['NoiDung']) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="review-empty">Chưa có đánh giá nào cho sản phẩm này.</div>
            <?php endif; ?>
        </div>
        <form class="review-form" method="post" style="margin-top:24px;" <?php if (!isset($_SESSION['user']['MaKH'])) echo 'onsubmit="return false;"'; ?>>
            <?php if (!isset($_SESSION['user']['MaKH'])): ?>
                <div style="color:red; margin-bottom:10px;">Bạn cần <a href="/DoanPHP/views/login.php">đăng nhập</a> để gửi đánh giá.</div>
            <?php endif; ?>
            <label for="review_rating">Đánh giá:</label>
            <div class="star-rating-input" id="starRatingInput">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <span class="star" data-value="<?= $i ?>">★</span>
                <?php endfor; ?>
                <input type="hidden" id="review_rating" name="review_rating" value="5" <?php if (!isset($_SESSION['user']['MaKH'])) echo 'disabled'; ?>>
            </div>
            <label for="review_content">Bình luận:</label>
            <textarea id="review_content" name="review_content" rows="3" required <?php if (!isset($_SESSION['user']['MaKH'])) echo 'disabled'; ?>></textarea>
            <button type="submit" name="submit_review" <?php if (!isset($_SESSION['user']['MaKH'])) echo 'disabled'; ?>>Gửi đánh giá</button>
        </form>
    </div>
    <script>
    function changeMainImage(src) {
        document.querySelector('.main-image').src = src;
    }
    function updateQuantity(change) {
        const input = document.getElementById('quantity');
        const newValue = parseInt(input.value) + change;
        if (newValue >= 1) input.value = newValue;
    }
    function openSizeGuide() {
        document.getElementById('sizeGuideModal').style.display = 'block';
    }
    function closeSizeGuide() {
        document.getElementById('sizeGuideModal').style.display = 'none';
    }
    function addToCart() {
        const color = document.querySelector('input[name="color"]:checked');
        const size = document.querySelector('input[name="size"]:checked');
        const quantity = document.getElementById('quantity').value;
        
        if (!color || !size) {
            alert('Vui lòng chọn màu sắc và kích thước');
            return;
        }

        // Tạo form data
        const formData = new FormData();
        formData.append('product_id', '<?php echo $masp; ?>');
        formData.append('color', color.value);
        formData.append('size', size.value);
        formData.append('quantity', quantity);
        formData.append('add_to_cart', '1');

        // Gửi request bằng AJAX
        fetch('cart.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Hiển thị thông báo thành công
                const alertBar = document.createElement('div');
                alertBar.className = 'alert-bar';
                alertBar.innerHTML = `
                    <div class="alert-content">
                        <i class="fas fa-check-circle"></i>
                        <span>Đã thêm sản phẩm vào giỏ hàng thành công!</span>
                    </div>
                `;
                document.body.appendChild(alertBar);

                // Tự động ẩn thông báo sau 1 giây và load lại trang
                setTimeout(() => {
                    alertBar.remove();
                    window.location.reload();
                }, 1000);
            } else {
                alert(data.message || 'Có lỗi xảy ra khi thêm vào giỏ hàng');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi xảy ra khi thêm vào giỏ hàng');
        });
    }
    // Star rating input logic
    const starInput = document.getElementById('starRatingInput');
    if (starInput) {
        const stars = starInput.querySelectorAll('.star');
        const ratingInput = document.getElementById('review_rating');
        let currentRating = parseInt(ratingInput.value) || 5;
        let hoverRating = 0;

        function updateStars(rating) {
            stars.forEach((star, idx) => {
                if (idx < rating) {
                    star.classList.add('selected');
                } else {
                    star.classList.remove('selected');
                }
            });
        }
        updateStars(currentRating);

        stars.forEach((star, idx) => {
            star.addEventListener('mouseenter', () => {
                updateStars(idx + 1);
            });
            star.addEventListener('mouseleave', () => {
                updateStars(currentRating);
            });
            star.addEventListener('click', () => {
                currentRating = idx + 1;
                ratingInput.value = currentRating;
                updateStars(currentRating);
            });
        });
    }
    </script>
    <style>
    body {
        background: #f5f6fa;
        color: #222;
        font-family: 'Segoe UI', Arial, sans-serif;
    }
    .alert-bar {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background: #28a745;
        color: white;
        padding: 12px 25px;
        border-radius: 4px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.08);
        z-index: 1000;
        animation: slideDown 0.3s ease-out;
    }
    .alert-content {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .alert-content i {
        font-size: 18px;
    }
    @keyframes slideDown {
        from {
            transform: translate(-50%, -100%);
            opacity: 0;
        }
        to {
            transform: translate(-50%, 0);
            opacity: 1;
        }
    }
    .product-detail {
        display: flex;
        gap: 40px;
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 4px 32px rgba(0,0,0,0.10);
        padding: 48px 48px 40px 48px;
        margin: 48px auto 0 auto;
        max-width: 1150px;
    }
    .product-gallery {
        flex: 1;
        background: #f8f9fa;
        border-radius: 14px;
        padding: 28px 18px 24px 18px;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: 0 2px 12px rgba(0,0,0,0.07);
    }
    .product-gallery .main-image {
        width: 360px;
        height: 360px;
        object-fit: cover;
        border-radius: 14px;
        box-shadow: 0 2px 16px rgba(0,0,0,0.10);
        background: #fff;
    }
    .thumbnail-list {
        display: flex;
        gap: 14px;
        margin-top: 22px;
    }
    .thumbnail {
        width: 62px;
        height: 62px;
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid #eee;
        cursor: pointer;
        transition: border 0.2s, box-shadow 0.2s;
        background: #fff;
    }
    .thumbnail:hover {
        border: 2px solid #111;
        box-shadow: 0 2px 8px rgba(0,0,0,0.10);
    }
    .product-info {
        flex: 1.2;
        display: flex;
        flex-direction: column;
        gap: 22px;
    }
    .product-title {
        font-size: 2.3rem;
        font-weight: 700;
        color: #111;
        margin-bottom: 8px;
    }
    .product-price {
        display: flex;
        align-items: center;
        gap: 20px;
        font-size: 1.4rem;
    }
    .original-price {
        color: #aaa;
        text-decoration: line-through;
    }
    .sale-price {
        color: #e53935;
        font-weight: bold;
        font-size: 1.6rem;
    }
    .discount-badge {
        background: #111;
        color: #fff;
        font-weight: bold;
        border-radius: 7px;
        padding: 3px 12px;
        margin-left: 10px;
        font-size: 1.05rem;
        letter-spacing: 1px;
    }
    .product-options h4, .quantity-group label {
        color: #111;
        margin-bottom: 7px;
        font-size: 1.08rem;
    }
    .color-options, .size-options {
        display: flex;
        gap: 18px;
        align-items: center;
        flex-wrap: wrap;
    }
    .color-option, .size-option {
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .color-option input[type="radio"], .size-option input[type="radio"] {
        accent-color: #111;
        width: 22px;
        height: 22px;
        margin: 0;
        cursor: pointer;
        border-radius: 50%;
        box-shadow: 0 1px 3px rgba(0,0,0,0.08);
        display: inline-block;
    }
    .color-option label, .size-option label {
        font-size: 1.08rem;
        color: #222;
        font-weight: 500;
        margin: 0 2px 0 0;
        cursor: pointer;
        user-select: none;
    }
    .quantity-group {
        margin-top: 18px;
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
    .quantity-input {
        display: flex;
        align-items: center;
        gap: 0;
    }
    .quantity-input button {
        background: #111;
        color: #fff;
        border: none;
        border-radius: 8px;
        width: 38px;
        height: 38px;
        font-size: 1.3rem;
        cursor: pointer;
        transition: background 0.2s, color 0.2s;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 1px 4px rgba(0,0,0,0.08);
        margin: 0 2px;
    }
    
    .quantity-input button:hover {
        background: #fff;
        color: #111;
        border: 1px solid #111;
    }
    .quantity-input input {
        width: 54px;
        text-align: center;
        background: #fff;
        color: #111;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1.15rem;
        font-weight: 600;
        margin: 0 2px;
        box-shadow: none;
        outline: none;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .add-to-cart-btn {
        background: #111;
        color: #fff;
        font-weight: bold;
        border: none;
        border-radius: 10px;
        padding: 14px 38px;
        font-size: 1.15rem;
        cursor: pointer;
        margin-top: 22px;
        transition: background 0.2s, color 0.2s, box-shadow 0.2s;
        box-shadow: 0 2px 8px rgba(0,0,0,0.10);
        letter-spacing: 1px;
    }
    .add-to-cart-btn:hover {
        background: #fff;
        color: #111;
        border: 1px solid #111;
        box-shadow: 0 4px 16px rgba(0,0,0,0.13);
    }
    .product-description {
        background: #f8f9fa;
        color: #333;
        border-radius: 10px;
        padding: 22px;
        margin-top: 20px;
        font-size: 1.13rem;
        box-shadow: 0 1px 6px rgba(0,0,0,0.06);
    }
    .size-guide-btn {
        background: #111;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 10px 22px;
        font-size: 1.05rem;
        cursor: pointer;
        margin-top: 12px;
        transition: background 0.2s, color 0.2s, border 0.2s;
        font-weight: 500;
    }
    .size-guide-btn:hover {
        background: #fff;
        color: #111;
        border: 1px solid #111;
    }
    .product-review {
        background: #fff;
        border-radius: 18px;
        margin: 32px auto 0 auto;
        min-width: 82%;
        padding: 48px 48px 32px 48px;
        box-shadow: 0 2px 16px rgba(0,0,0,0.10);
    }
    .product-review h3 {
        color: #111;
        font-size: 1.6rem;
        margin-bottom: 22px;
        font-weight: 700;
    }
    .review-list {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        margin-bottom: 28px;
    }
    .review {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 18px 20px;
        color: #222;
        box-shadow: 0 1px 6px rgba(0,0,0,0.05);
        min-width: 0;
        min-height: 120px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        box-sizing: border-box;
    }
    .review strong {
        color: #111;
        font-weight: 700;
    }
    .review-time {
        color: #aaa;
        font-size: 0.98em;
        margin-left: 12px;
    }
    .stars {
        color: #facc15;
        font-size: 1.13em;
        margin: 4px 0 8px 0;
    }
    .star {
        color: #eee;
        font-size: 1.2em;
    }
    .star.filled {
        color: #facc15;
    }
    .review-empty {
        color: #aaa;
        text-align: center;
        margin-bottom: 18px;
    }
    .review-form label {
        color: #111;
        margin-top: 10px;
        font-weight: 500;
    }
    .review-form input, .review-form select, .review-form textarea {
        width: 100%;
        background: #f8f9fa;
        color: #111;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 14px;
        font-size: 1.05rem;
    }
    .review-form button {
        background: #111;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 12px 32px;
        font-size: 1.13rem;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.2s, color 0.2s, border 0.2s;
        margin-top: 8px;
    }
    .review-form button:hover {
        background: #fff;
        color: #111;
        border: 1px solid #111;
    }
    @media (max-width: 900px) {
        .review-list {
            grid-template-columns: repeat(2, 1fr);
        }
    }
    @media (max-width: 600px) {
        .review-list {
            grid-template-columns: 1fr;
        }
    }
    .star-rating-input {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 2rem;
        margin-bottom: 12px;
        cursor: pointer;
    }
    .star-rating-input .star {
        color: #ccc;
        transition: color 0.2s;
        cursor: pointer;
    }
    .star-rating-input .star.selected,
    .star-rating-input .star.hovered {
        color: #facc15;
    }
    </style>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
