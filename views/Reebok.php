<?php
<<<<<<< HEAD
include_once __DIR__ . '/../models/database.php';

// Lấy các tham số từ URL
$min_price = isset($_GET['min_price']) && $_GET['min_price'] !== '' ? (int)$_GET['min_price'] : null;
$max_price = isset($_GET['max_price']) && $_GET['max_price'] !== '' ? (int)$_GET['max_price'] : null;
$category = isset($_GET['category']) ? $_GET['category'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

// Xây dựng câu truy vấn cơ bản
$sql = "SELECT s.*, a.Anh1, d.TenDM 
        FROM sanpham s 
        LEFT JOIN anhsp a ON s.MaSP = a.MaSP 
        LEFT JOIN danhmuc d ON s.MaDM = d.MaDM 
        LEFT JOIN nhacc n ON s.MaNCC = n.MaNCC
        WHERE n.TenNCC = 'REEBOK'";

// Thêm điều kiện tìm kiếm theo tên sản phẩm
if (!empty($keyword)) {
    $sql .= " AND s.TenSP LIKE '%" . mysqli_real_escape_string($conn, $keyword) . "%'";
}

// Thêm điều kiện lọc theo giá
if ($min_price !== null) {
    $sql .= " AND s.DonGia >= $min_price";
}
if ($max_price !== null) {
    $sql .= " AND s.DonGia <= $max_price";
}

// Thêm điều kiện lọc theo danh mục
if (!empty($category)) {
    $sql .= " AND s.MaDM = '$category'";
}

// Thêm điều kiện sắp xếp
switch ($sort) {
    case 'price_asc':
        $sql .= " ORDER BY s.DonGia ASC";
        break;
    case 'price_desc':
        $sql .= " ORDER BY s.DonGia DESC";
        break;
    default:
        $sql .= " ORDER BY s.MaSP DESC";
}

// Thực thi truy vấn
=======
include_once '../models/database.php';

// Lấy filter từ dropdown
$filter = $_GET['filter'] ?? '';
$sql = "SELECT sp.MaSP, sp.TenSP, sp.DonGia, sp.AnhNen
        FROM sanpham sp
        JOIN nhacc ncc ON sp.MaNCC = ncc.MaNCC
        WHERE ncc.TenNCC = 'REEBOK' AND sp.MaDM = 5";
// Áp dụng bộ lọc
switch ($filter) {
    case 'price_asc':
        $sql .= " ORDER BY sp.DonGia ASC";
        break;
    case 'price_desc':
        $sql .= " ORDER BY sp.DonGia DESC";
        break;
    case 'name_asc':
        $sql .= " ORDER BY sp.TenSP ASC";
        break;
    case 'name_desc':
        $sql .= " ORDER BY sp.TenSP DESC";
        break;
    case 'new':
        $sql .= " ORDER BY sp.MaSP DESC";
        break;
    default:
        $sql .= " ORDER BY sp.MaSP DESC";
}

$sql .= " LIMIT 30";
>>>>>>> 9934819e0c09fc0f54bcd0b6242e6210abb6e70a
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sản phẩm Reebok</title>
    <link rel="stylesheet" href="../assets/css/style.css">
<<<<<<< HEAD
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__ . '/../includes/header.php'; ?>

<div class="hero-section">
    <img src="../assets/images/bannerR.jpg" alt="Banner chính" class="hero-banner">
=======
</head>
<body>
<?php include '../includes/header.php'; ?>

<div class="hero-section">
    <img src="../assets/images/BannerR.jpg" alt="Banner chính" class="hero-banner">
>>>>>>> 9934819e0c09fc0f54bcd0b6242e6210abb6e70a
</div>

<div class="container">
    <div class="sidebar">
        <h3>Danh mục sản phẩm</h3>
        <ul>
<<<<<<< HEAD
           <li><a href="Adidas.php">ADIDAS</a></li>
=======
              <li><a href="Adidas.php">ADIDAS</a></li>
>>>>>>> 9934819e0c09fc0f54bcd0b6242e6210abb6e70a
        <li><a href="Nike.php">NIKE</a></li>
        <li><a href="Puma.php">PUMA</a></li>
        <li><a href="Vans.php">VANS</a></li>
        <li><a href="Converse.php">CONVERSE</a></li>
        <li><a href="Fila.php">FILA</a></li>
        <li><a href="Reebok.php">REEBOK</a></li>
        <li><a href="GiayNam.php">GIÀY NAM</a></li>
<<<<<<< HEAD
        <li><a href="GiayNu.php">GIÀY NỮ</a></li>  
        <li><a href="GiayDoi.php">GIÀY ĐÔI</a></li>
         <li><a href="thanhly.php">THANH LÝ</a></li>
         <li><a href="FlashSale.php">FLASHSALE</a></li>
=======
        <li><a href="GiayNu.php">GIÀY NỮ</a></li>
        <li><a href="GiayDoi.php">GIÀY ĐÔI</a></li>
        <li><a href="thanhly.php">THANH LÝ</a></li>
        <li><a href="FlashSale.php">FLASHSALE</a></li>
>>>>>>> 9934819e0c09fc0f54bcd0b6242e6210abb6e70a
        <li class="has-submenu">
           <a href="#">DÉP</a>
              <ul class="submenu">
                <li><a href="DépAdidas.php">DÉP ADIDAS</a></li>
                <li><a href="DépNike.php">DÉP NIKE</a></li>
               <li><a href="DépPuma.php">DÉP PUMA</a></li>
              </ul>
        </li>
        </ul>
    </div>
<<<<<<< HEAD
    <div class="main-content">
        <!-- Form lọc sản phẩm -->
        <form method="GET" action="" class="filter-form">
            <div class="filter-group search-group">
                <label>Tìm kiếm:</label>
                <input type="text" name="keyword" value="<?php echo htmlspecialchars($keyword); ?>" placeholder="Nhập tên sản phẩm...">
            </div>

            <div class="filter-group">
                <label>Khoảng giá:</label>
                <input type="number" name="min_price" value="<?php echo $min_price; ?>" placeholder="Giá thấp nhất">
                <input type="number" name="max_price" value="<?php echo $max_price; ?>" placeholder="Giá cao nhất">
            </div>

            <div class="filter-group">
                <label>Danh mục:</label>
                <select name="category">
                    <option value="">Tất cả danh mục</option>
                    <?php
                    $cat_sql = "SELECT * FROM danhmuc";
                    $cat_result = mysqli_query($conn, $cat_sql);
                    while ($cat = mysqli_fetch_assoc($cat_result)) {
                        $selected = ($category == $cat['MaDM']) ? 'selected' : '';
                        echo "<option value='{$cat['MaDM']}' $selected>{$cat['TenDM']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="filter-group">
                <label>Sắp xếp theo giá:</label>
                <select name="sort">
                    <option value="">Mặc định</option>
                    <option value="price_asc" <?php echo $sort == 'price_asc' ? 'selected' : ''; ?>>Giá tăng dần</option>
                    <option value="price_desc" <?php echo $sort == 'price_desc' ? 'selected' : ''; ?>>Giá giảm dần</option>
                </select>
            </div>

            <button type="submit" class="filter-btn">Lọc</button>
        </form>

        <!-- Danh sách sản phẩm -->
        <div class="product-list">
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
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
                    <p class="category"><?= $row['TenDM'] ?></p>
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

<style>
.filter-form {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin: 0 auto 20px;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: flex-end;
    gap: 15px;
    width: 1000px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    flex-wrap: wrap;
}

.filter-group {
    display: flex;
    flex-direction: column;
    gap: 5px;
    min-width: 150px;
    flex: 1;
}

.search-group {
    flex: 2;
}

.filter-group label {
    font-weight: bold;
    color: #333;
    font-size: 14px;
    margin-bottom: 5px;
}

.filter-group input,
.filter-group select {
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 100%;
}

.filter-group input[type="number"] {
    width: 100%;
}

.filter-group input[type="text"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.filter-btn {
    padding: 8px 20px;
    background: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background 0.3s;
    height: 35px;
    align-self: flex-end;
    min-width: 100px;
}

.filter-btn:hover {
    background: #0056b3;
}

.product-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.product-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    transition: transform 0.3s;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.product-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 4px;
}

.product-card h3 {
    margin: 10px 0;
    font-size: 16px;
    color: #333;
}

.product-card .price {
    color: #e44d26;
    font-weight: bold;
    margin: 5px 0;
}

.product-card .category {
    color: #666;
    font-size: 14px;
    margin: 5px 0;
}
</style>

=======

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
>>>>>>> 9934819e0c09fc0f54bcd0b6242e6210abb6e70a
<button id="scrollButton" class="scroll-button" title="Cuộn">⬆️</button>
<script>
const scrollButton = document.getElementById("scrollButton");

window.addEventListener("scroll", () => {
<<<<<<< HEAD
  if (window.scrollY > 200) {
    scrollButton.style.display = "block";
    if (window.innerHeight + window.scrollY >= document.body.scrollHeight - 100) {
      scrollButton.textContent = "⬆️";
    } else {
      scrollButton.textContent = "⬇️";
=======
  // Hiện nút khi cuộn xuống quá 200px
  if (window.scrollY > 200) {
    scrollButton.style.display = "block";

    // Đổi biểu tượng: nếu đang gần cuối -> nút cuộn lên
    if (window.innerHeight + window.scrollY >= document.body.scrollHeight - 100) {
      scrollButton.textContent = "⬆️"; // Cuộn lên đầu
    } else {
      scrollButton.textContent = "⬇️"; // Cuộn xuống cuối
>>>>>>> 9934819e0c09fc0f54bcd0b6242e6210abb6e70a
    }
  } else {
    scrollButton.style.display = "none";
  }
});

scrollButton.addEventListener("click", () => {
<<<<<<< HEAD
=======
  // Nếu đang ở gần cuối trang -> cuộn lên đầu
>>>>>>> 9934819e0c09fc0f54bcd0b6242e6210abb6e70a
  if (window.innerHeight + window.scrollY >= document.body.scrollHeight - 100) {
    window.scrollTo({ top: 0, behavior: "smooth" });
  } else {
    window.scrollTo({ top: document.body.scrollHeight, behavior: "smooth" });
  }
});
</script>
<<<<<<< HEAD

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include __DIR__ . '/../views/modalsshop.php'; ?>
<?php include __DIR__ . '/../includes/footer.php'; ?>
=======
<?php include '../views/modalsshop.php'; ?>
<?php include '../includes/footer.php'; ?>
>>>>>>> 9934819e0c09fc0f54bcd0b6242e6210abb6e70a
</body>
</html>
