<?php
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
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sản phẩm Reebok</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<?php include '../includes/header.php'; ?>

<div class="hero-section">
    <img src="../assets/images/BannerR.jpg" alt="Banner chính" class="hero-banner">
</div>

<div class="container">
    <div class="sidebar">
        <h3>Danh mục sản phẩm</h3>
        <ul>
              <li><a href="Adidas.php">ADIDAS</a></li>
        <li><a href="Nike.php">NIKE</a></li>
        <li><a href="Puma.php">PUMA</a></li>
        <li><a href="Vans.php">VANS</a></li>
        <li><a href="Converse.php">CONVERSE</a></li>
        <li><a href="Fila.php">FILA</a></li>
        <li><a href="Reebok.php">REEBOK</a></li>
        <li><a href="GiayNam.php">GIÀY NAM</a></li>
        <li><a href="GiayNu.php">GIÀY NỮ</a></li>
        <li><a href="GiayDoi.php">GIÀY ĐÔI</a></li>
        <li><a href="thanhly.php">THANH LÝ</a></li>
        <li><a href="FlashSale.php">FLASHSALE</a></li>
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
<?php include '../views/modalsshop.php'; ?>
<?php include '../includes/footer.php'; ?>
</body>
</html>
