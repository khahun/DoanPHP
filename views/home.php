<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giới thiệu XSHOP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include '../includes/header.php'; ?>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="../assets/js/script.js" defer></script>


<div class="hero-section">
    <img src="../assets/images/banner.png" alt="Banner chính" class="hero-banner">
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
    $products = [
        ["id" => 1,"name" => "Nike Air Force 1 Full Trắng", "price_old" => "850.000₫", "price_new" => "550.000₫", "discount" => "35%", "img" => "../assets/images/h1.jpg"],
        ["id" => 2,"name" => "MLB Bigball Chunky NY Trắng Xanh Navy", "price_old" => "990.000₫", "price_new" => "600.000₫", "discount" => "33%", "img" => "../assets/images/h2.jpg"],
        ["id" => 3,"name" => "Giày Nike SB Force 58 Xám Đỏ", "price_old" => "950.000₫", "price_new" => "550.000₫", "discount" => "33%", "img" => "../assets/images/h3.jpg"],
        ["id" => 4,"name" => "Adidas Stan Smith Trắng Gót Lục", "price_old" => "1.000.000₫", "price_new" => "500.000₫", "discount" => "50%", "img" => "../assets/images/h17.jpg"],
        ["id" => 5,"name" => "Giày Adidas Forum 84 Trắng Đen","price_old" => "800.000₫", "price_new" => "400.000₫", "discount" => "50%", "img" => "../assets/images/h16.jpg"],
        ["id" => 6,"name" => "Nike Dunk Low Retro Trắng Xanh","price_old" => "900.000₫", "price_new" => "450.000₫", "discount" => "50%", "img" => "../assets/images/h15.jpg"],
        ["id" => 7,"name" => "Giày Puma Suede Da Lộn Đen Trắng", "price_old" => "1.150.000₫", "price_new" => "850.000₫", "discount" => "37%", "img" => "../assets/images/h15.jpg"],
        ["id" => 8,"name" => "Nike Air Force 1 Kem Nâu", "price_old" => "1.100.000₫", "price_new" => "700.000₫", "discount" => "28%", "img" => "../assets/images/h14.jpg"],
        ["id" => 9,"name" => "Adidas Stan Smith Trắng Gót Đen", "price_old" => "1.200.000₫", "price_new" => "600.000₫", "discount" => "50%", "img" => "../assets/images/h13.jpg"],
        ["id" => 10,"name" => "Giày Puma Suede Da Lộn Xanh Biển", "price_old" => "850.000₫", "price_new" => "500.000₫", "discount" => "20%", "img" => "../assets/images/h12.jpg"],
        ["id" => 11,"name" => "Nike Air Force 1 Da Kem Navy", "price_old" => "800.000₫", "price_new" => "600.000₫", "discount" => "15%", "img" => "../assets/images/h11.jpg"],
        ["id" => 12,"name" => "MLB Chunky Liner NY Trắng Gót Đen", "price_old" => "950.000₫", "price_new" => "550.000₫", "discount" => "20%", "img" => "../assets/images/h10.jpg"],
        ["id" => 13,"name" => "Nike Air Force 1 Shadow Xanh Xám", "price_old" => "1.350.000₫", "price_new" => "930.000₫", "discount" => "15%", "img" => "../assets/images/h9.jpg"],
        ["id" => 14,"name" => "Giày Asics Court MZ Kem Xám", "price_old" => "1.050.000₫", "price_new" => "800.000₫", "discount" => "15%", "img" => "../assets/images/h8.jpg"],
        ["id" => 15,"name" => "Giày MLB LA DODGERS Trắng", "price_old" => "1.250.000₫", "price_new" => "700.000₫", "discount" => "25%", "img" => "../assets/images/h7.jpg"],
        ["id" => 16,"name" => "Nike Jordan 1 High Đen Trắng", "price_old" => "850.000₫", "price_new" => "650.000₫", "discount" => "15%", "img" => "../assets/images/h6.jpg"],
        ["id" => 17,"name" => "Giày MLB Chunky P Boston Đỏ", "price_old" => "800.000₫", "price_new" => "580.000₫", "discount" => "15%", "img" => "../assets/images/h5.jpg"],
        ["id" => 18,"name" => "Adidas Samba OG Trắng Kẻ Đen Mũi Da Lộn", "price_old" => "900.000₫", "price_new" => "600.000₫", "discount" => "30%", "img" => "../assets/images/h4.jpg"]
    ];

    foreach ($products as $index => $product) {
        echo "<div class='product-card'>
               <a href='../product.php?id={$index}'>
                  <div class='discount-tag'>{$product['discount']}</div>
                  <img src='{$product['img']}' alt='{$product['name']}'>
                  <p class='product-name'>{$product['name']}</p>
                  <p class='product-price'><del>{$product['price_old']}</del> <strong>{$product['price_new']}</strong></p>
                </a>
              </div>";
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
    $products = [
        ["id" => 1,"name" => "Nike Air Force 1 Full Trắng", "price_old" => "850.000₫", "price_new" => "550.000₫", "discount" => "35%", "img" => "../assets/images/h1.jpg"],
        ["id" => 2,"name" => "MLB Bigball Chunky NY Trắng Xanh Navy", "price_old" => "990.000₫", "price_new" => "600.000₫", "discount" => "33%", "img" => "../assets/images/h2.jpg"],
        ["id" => 3,"name" => "Giày Nike SB Force 58 Xám Đỏ", "price_old" => "950.000₫", "price_new" => "550.000₫", "discount" => "33%", "img" => "../assets/images/h3.jpg"],
        ["id" => 4,"name" => "Adidas Stan Smith Trắng Gót Lục", "price_old" => "1.000.000₫", "price_new" => "500.000₫", "discount" => "50%", "img" => "../assets/images/h17.jpg"],
        ["id" => 5,"name" => "Giày Adidas Forum 84 Trắng Đen","price_old" => "800.000₫", "price_new" => "400.000₫", "discount" => "50%", "img" => "../assets/images/h16.jpg"],
        ["id" => 6,"name" => "Nike Dunk Low Retro Trắng Xanh","price_old" => "900.000₫", "price_new" => "450.000₫", "discount" => "50%", "img" => "../assets/images/h15.jpg"],
        ["id" => 7,"name" => "Giày Puma Suede Da Lộn Đen Trắng", "price_old" => "1.150.000₫", "price_new" => "850.000₫", "discount" => "37%", "img" => "../assets/images/h15.jpg"],
        ["id" => 8,"name" => "Nike Air Force 1 Kem Nâu", "price_old" => "1.100.000₫", "price_new" => "700.000₫", "discount" => "28%", "img" => "../assets/images/h14.jpg"],
        ["id" => 9,"name" => "Adidas Stan Smith Trắng Gót Đen", "price_old" => "1.200.000₫", "price_new" => "600.000₫", "discount" => "50%", "img" => "../assets/images/h13.jpg"],
        ["id" => 10,"name" => "Giày Puma Suede Da Lộn Xanh Biển", "price_old" => "850.000₫", "price_new" => "500.000₫", "discount" => "20%", "img" => "../assets/images/h12.jpg"],
        ["id" => 11,"name" => "Nike Air Force 1 Da Kem Navy", "price_old" => "800.000₫", "price_new" => "600.000₫", "discount" => "15%", "img" => "../assets/images/h11.jpg"],
        ["id" => 12,"name" => "MLB Chunky Liner NY Trắng Gót Đen", "price_old" => "950.000₫", "price_new" => "550.000₫", "discount" => "20%", "img" => "../assets/images/h10.jpg"],
        ["id" => 13,"name" => "Nike Air Force 1 Shadow Xanh Xám", "price_old" => "1.350.000₫", "price_new" => "930.000₫", "discount" => "15%", "img" => "../assets/images/h9.jpg"],
        ["id" => 14,"name" => "Giày Asics Court MZ Kem Xám", "price_old" => "1.050.000₫", "price_new" => "800.000₫", "discount" => "15%", "img" => "../assets/images/h8.jpg"],
        ["id" => 15,"name" => "Giày MLB LA DODGERS Trắng", "price_old" => "1.250.000₫", "price_new" => "700.000₫", "discount" => "25%", "img" => "../assets/images/h7.jpg"],
        ["id" => 16,"name" => "Nike Jordan 1 High Đen Trắng", "price_old" => "850.000₫", "price_new" => "650.000₫", "discount" => "15%", "img" => "../assets/images/h6.jpg"],
        ["id" => 17,"name" => "Giày MLB Chunky P Boston Đỏ", "price_old" => "800.000₫", "price_new" => "580.000₫", "discount" => "15%", "img" => "../assets/images/h5.jpg"],
        ["id" => 18,"name" => "Adidas Samba OG Trắng Kẻ Đen Mũi Da Lộn", "price_old" => "900.000₫", "price_new" => "600.000₫", "discount" => "30%", "img" => "../assets/images/h4.jpg"]
    ];

    foreach ($products as $index => $product) {
        echo "<div class='product-card'>
               <a href='../product.php?id={$index}'>
                  <div class='discount-tag'>{$product['discount']}</div>
                  <img src='{$product['img']}' alt='{$product['name']}'>
                  <p class='product-name'>{$product['name']}</p>
                  <p class='product-price'><del>{$product['price_old']}</del> <strong>{$product['price_new']}</strong></p>
                </a>
              </div>";
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

<script src="script.js"></script>
<?php include '../includes/footer.php'; ?>
</body>
</html>