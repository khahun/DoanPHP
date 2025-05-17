<?php
// Mảng sản phẩm - giống như bên trang danh sách
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

$id = $_GET['id'] ?? -1;
$product = null;
foreach ($products as $p) {
    if ($p['id'] == $id) {
        $product = $p;
        break;
    }
}

if (!$product) {
    echo "Sản phẩm không tồn tại.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title><?php echo $product['name']; ?></title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="wrapper">
<div class="product-page">
  <div class="product-container">
    <div class="product-image">
      <img src="<?php echo $product['img']; ?>" alt="<?php echo $product['name']; ?>">
      <span class="discount-tag"><?php echo $product['discount']; ?></span>
    </div>
    <div class="product-info">
      <h1><?php echo $product['name']; ?></h1>
      <p class="price-old"><?php echo $product['price_old']; ?></p>
      <p class="price-new"><?php echo $product['price_new']; ?></p>

      <div class="color-section">
        <p>Màu sắc</p>
        <img src="<?php echo $product['img']; ?>" class="color-thumb">
      </div>

      <div class="size-section">
        <p>Kích cỡ</p>
        <div class="size-options">
          <button>36</button>
          <button>37</button>
          <button>38</button>
          <button>39</button>
          <button class="selected">40</button>
          <button>41</button>
          <button>42</button>
          <button>43</button>
        </div>
      </div>

      <a href="#" class="size-guide">HD cách chọn size giày</a>
      <button class="buy-button">MUA NGAY</button>
      <p class="delivery-info">Giao tận nhà - Đổi trả dễ dàng</p>
    </div>
  </div>
</div>
</div>
</body>
</html>
