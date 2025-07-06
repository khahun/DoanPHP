<?php
session_start();
require_once '../models/database.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'nhanvien') {
    header('Location: ../views/home.php');
    exit();
}

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM sanpham WHERE MaSP = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    header('Location: products.php');
    exit();
}

// Lấy danh mục và nhà cung cấp
$danhmuc = $conn->query("SELECT * FROM danhmuc");
$nhacc = $conn->query("SELECT * FROM nhacc");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tenSP = $_POST['tenSP'];
    $maDM = intval($_POST['maDM']);
    $maNCC = intval($_POST['maNCC']);
    $soluong = intval($_POST['soluong']);
    $gia = floatval($_POST['gia']);
    $mota = $_POST['mota'];
    $AnhNen = $product['AnhNen'];
    if(isset($_FILES['AnhNen']) && $_FILES['AnhNen']['error'] == 0) {
        $AnhNen = basename($_FILES['AnhNen']['name']);
        move_uploaded_file($_FILES['AnhNen']['tmp_name'], '../assets/images/' . $AnhNen);
    }
    $sql = "UPDATE sanpham SET TenSP=?, MaDM=?, MaNCC=?, SoLuong=?, DonGia=?, AnhNen=?, MoTa=? WHERE MaSP=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siiidssi", $tenSP, $maDM, $maNCC, $soluong, $gia, $AnhNen, $mota, $id);
    if ($stmt->execute()) {
        header('Location: products.php');
        exit();
    } else {
        echo "<script>alert('Cập nhật sản phẩm thất bại!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php include 'includes/sidebar.php'; ?>
    <div class="container mt-5">
        <h2>Sửa sản phẩm</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group mb-3">
                <label>Ảnh hiện tại</label><br>
                <img src="../assets/images/<?php echo htmlspecialchars($product['AnhNen']); ?>" alt="Ảnh sản phẩm" width="100">
            </div>
            <div class="form-group mb-3">
                <label>Đổi ảnh (nếu muốn)</label>
                <input type="file" name="AnhNen" class="form-control" accept="image/*">
            </div>
            <div class="form-group mb-3">
                <label for="maSP">Mã SP</label>
                <input type="text" class="form-control" id="maSP" name="maSP" value="<?php echo $product['MaSP']; ?>" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="tenSP">Tên sản phẩm</label>
                <input type="text" class="form-control" id="tenSP" name="tenSP" value="<?php echo isset($product['TenSP']) ? htmlspecialchars($product['TenSP']) : ''; ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="maDM">Danh mục</label>
                <select name="maDM" id="maDM" class="form-select" required>
                    <option value="">-- Chọn danh mục --</option>
                    <?php $danhmuc->data_seek(0); while($dm = $danhmuc->fetch_assoc()): ?>
                        <option value="<?php echo $dm['MaDM']; ?>" <?php if($product['MaDM']==$dm['MaDM']) echo 'selected'; ?>><?php echo $dm['TenDM']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="maNCC">Nhà cung cấp</label>
                <select name="maNCC" id="maNCC" class="form-select" required>
                    <option value="">-- Chọn nhà cung cấp --</option>
                    <?php $nhacc->data_seek(0); while($ncc = $nhacc->fetch_assoc()): ?>
                        <option value="<?php echo $ncc['MaNCC']; ?>" <?php if($product['MaNCC']==$ncc['MaNCC']) echo 'selected'; ?>><?php echo $ncc['TenNCC']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="gia">Giá</label>
                <input type="number" step="0.01" class="form-control" id="gia" name="gia" value="<?php echo isset($product['DonGia']) ? htmlspecialchars($product['DonGia']) : ''; ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="soluong">Số lượng</label>
                <input type="number" class="form-control" id="soluong" name="soluong" value="<?php echo isset($product['SoLuong']) ? htmlspecialchars($product['SoLuong']) : ''; ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="mota">Mô tả</label>
                <textarea class="form-control" id="mota" name="mota" rows="3"><?php echo isset($product['MoTa']) ? htmlspecialchars($product['MoTa']) : ''; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="products.php" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>
</html> 