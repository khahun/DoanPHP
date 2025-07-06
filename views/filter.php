<?php
require_once '../models/database.php';

// Lấy các tham số từ URL
$min_price = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
$max_price = isset($_GET['max_price']) ? (int)$_GET['max_price'] : PHP_INT_MAX;
$category = isset($_GET['category']) ? $_GET['category'] : '';
$brand = isset($_GET['brand']) ? $_GET['brand'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';

// Xây dựng câu truy vấn cơ bản
$sql = "SELECT s.*, a.Anh1, d.TenDM, n.TenNCC 
        FROM sanpham s 
        LEFT JOIN anhsp a ON s.MaSP = a.MaSP 
        LEFT JOIN danhmuc d ON s.MaDM = d.MaDM 
        LEFT JOIN nhacc n ON s.MaNCC = n.MaNCC
        WHERE 1=1";

// Thêm điều kiện lọc theo giá
if ($min_price > 0) {
    $sql .= " AND s.DonGia >= $min_price";
}
if ($max_price < PHP_INT_MAX) {
    $sql .= " AND s.DonGia <= $max_price";
}

// Thêm điều kiện lọc theo danh mục
if (!empty($category)) {
    $sql .= " AND s.MaDM = '$category'";
}

// Thêm điều kiện lọc theo nhà cung cấp
if (!empty($brand)) {
    $sql .= " AND s.MaNCC = '$brand'";
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
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lọc sản phẩm</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Lọc sản phẩm</h1>
        
        <!-- Form lọc sản phẩm -->
        <form method="GET" action="" class="filter-form">
            <div class="filter-group">
                <label>Khoảng giá:</label>
                <input type="number" name="min_price" value="<?php echo $min_price; ?>" placeholder="Giá thấp nhất">
                <input type="number" name="max_price" value="<?php echo $max_price == PHP_INT_MAX ? '' : $max_price; ?>" placeholder="Giá cao nhất">
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

        <!-- Hiển thị kết quả -->
        <div class="product-grid">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="product-card">
                        <img src="../assets/images/<?php echo $row['AnhNen']; ?>" alt="<?php echo $row['TenSP']; ?>">
                        <h3><?php echo $row['TenSP']; ?></h3>
                        <p class="price"><?php echo number_format($row['DonGia']); ?> VNĐ</p>
                        <p class="category"><?php echo $row['TenDM']; ?></p>
                        <p class="brand"><?php echo $row['TenNCC']; ?></p>
                        <a href="chitietsanpham.php?id=<?php echo $row['MaSP']; ?>" class="btn">Xem chi tiết</a>
                    </div>
                    <?php
                }
            } else {
                echo "<p>Không tìm thấy sản phẩm nào phù hợp với điều kiện lọc.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html> 