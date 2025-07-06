<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả tìm kiếm</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<?php
require_once __DIR__ . '/../models/database.php';
require_once __DIR__ . '/../includes/header.php';

// Lấy từ khóa tìm kiếm và các tham số lọc
$keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
$min_price = isset($_GET['min_price']) && $_GET['min_price'] !== '' ? (int)$_GET['min_price'] : null;
$max_price = isset($_GET['max_price']) && $_GET['max_price'] !== '' ? (int)$_GET['max_price'] : null;
$category = isset($_GET['category']) ? $_GET['category'] : '';
$brand = isset($_GET['brand']) ? $_GET['brand'] : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';

// Xử lý tìm kiếm và lọc
if (!empty($keyword)) {
    // Xây dựng câu truy vấn cơ bản
    $sql = "SELECT s.*, d.TenDM, n.TenNCC 
            FROM sanpham s 
            LEFT JOIN danhmuc d ON s.MaDM = d.MaDM 
            LEFT JOIN nhacc n ON s.MaNCC = n.MaNCC 
            WHERE s.TenSP LIKE ?";
    
    // Thêm điều kiện lọc theo giá
    if ($min_price !== null) {
        $sql .= " AND s.DonGia >= ?";
    }
    if ($max_price !== null) {
        $sql .= " AND s.DonGia <= ?";
    }

    // Thêm điều kiện lọc theo danh mục
    if (!empty($category)) {
        $sql .= " AND s.MaDM = ?";
    }

    // Thêm điều kiện lọc theo nhà cung cấp
    if (!empty($brand)) {
        $sql .= " AND s.MaNCC = ?";
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

    // Chuẩn bị và thực thi câu truy vấn
    $stmt = $conn->prepare($sql);
    
    // Tạo mảng tham số
    $params = ["%$keyword%"];
    $types = "s";
    
    if ($min_price !== null) {
        $params[] = $min_price;
        $types .= "i";
    }
    if ($max_price !== null) {
        $params[] = $max_price;
        $types .= "i";
    }
    if (!empty($category)) {
        $params[] = $category;
        $types .= "s";
    }
    if (!empty($brand)) {
        $params[] = $brand;
        $types .= "s";
    }
    
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = false;
}
?>

<div class="container">
    <div class="search-results">
        <h2>Kết quả tìm kiếm cho: "<?php echo htmlspecialchars($keyword); ?>"</h2>
        
        <?php if (!empty($keyword)): ?>
            <!-- Form lọc sản phẩm -->
            <form method="GET" action="" class="filter-form">
                <input type="hidden" name="keyword" value="<?php echo htmlspecialchars($keyword); ?>">
                
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
                    <label>Thương hiệu:</label>
                    <select name="brand">
                        <option value="">Tất cả thương hiệu</option>
                        <?php
                        $brand_sql = "SELECT * FROM nhacc";
                        $brand_result = mysqli_query($conn, $brand_sql);
                        while ($b = mysqli_fetch_assoc($brand_result)) {
                            $selected = ($brand == $b['MaNCC']) ? 'selected' : '';
                            echo "<option value='{$b['MaNCC']}' $selected>{$b['TenNCC']}</option>";
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

            <?php if ($result && $result->num_rows > 0): ?>
                <div class="product-list">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="product-card">
                            <a href="../product_detail.php?id=<?= $row['MaSP'] ?>">
                                <img src="<?= !empty($row['AnhNen']) ? "../assets/images/" . $row['AnhNen'] : "../assets/images/no-image.png" ?>" 
                                     alt="<?= htmlspecialchars($row['TenSP']) ?>">
                                <h3><?= htmlspecialchars($row['TenSP']) ?></h3>
                            </a>
                            <p class="price">Giá: <?= number_format($row['DonGia']) ?> VNĐ</p>
                            <p class="category"><?= htmlspecialchars($row['TenDM']) ?></p>
                            <p class="brand"><?= htmlspecialchars($row['TenNCC']) ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <div class="no-results">
                    <p>Không tìm thấy sản phẩm nào phù hợp với từ khóa "<?php echo htmlspecialchars($keyword); ?>"</p>
                    <p>Vui lòng thử lại với từ khóa khác.</p>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<style>
.search-results {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
}

.search-results h2 {
    margin-bottom: 20px;
    color: #333;
    font-size: 24px;
    text-align: center;
}

.filter-form {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin: 0 auto 20px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: flex-end;
    gap: 15px;
    width: 90%;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.filter-group {
    display: flex;
    flex-direction: column;
    gap: 5px;
    min-width: 150px;
}

.filter-group label {
    font-weight: bold;
    color: #333;
    font-size: 14px;
}

.filter-group input,
.filter-group select {
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 100%;
}

.filter-group input[type="number"] {
    width: 120px;
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

.product-card .brand {
    color: #007bff;
    font-size: 14px;
    font-weight: bold;
    margin: 5px 0;
}

.no-results {
    text-align: center;
    padding: 40px;
    background: #f8f9fa;
    border-radius: 8px;
    margin-top: 20px;
}

.no-results p {
    margin: 10px 0;
    color: #666;
}

.no-results p:first-child {
    font-size: 18px;
    color: #333;
}
</style>

<?php require_once __DIR__ . '/../includes/footer.php'; ?> 
</body>
</html> 