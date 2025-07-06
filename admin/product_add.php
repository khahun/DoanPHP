<?php
session_start();
require_once '../models/database.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['user_type'] !== 'nhanvien') {
    header('Location: ../views/home.php');
    exit();
}
// Lấy danh mục và nhà cung cấp
$danhmuc = $conn->query("SELECT * FROM danhmuc");
$nhacc = $conn->query("SELECT * FROM nhacc");

// Lấy danh sách size
$sizes = [];
$resSize = $conn->query("SELECT MaSize FROM size ORDER BY MaSize ASC");
if ($resSize) {
    while ($row = $resSize->fetch_assoc()) {
        $sizes[] = $row['MaSize'];
    }
}
// Lấy danh sách màu
$colors = [];
$resColor = $conn->query("SELECT MaMau FROM mau ORDER BY MaMau ASC");
if ($resColor) {
    while ($row = $resColor->fetch_assoc()) {
        $colors[] = $row['MaMau'];
    }
}

$error = '';
if(isset($_POST['add'])) {
    $TenSP = trim($_POST['TenSP']);
    $MaDM = $_POST['MaDM'];
    $MaNCC = $_POST['MaNCC'];
    $SoLuong = (int)$_POST['SoLuong'];
    $DonGia = (float)$_POST['DonGia'];
    $MoTa = trim($_POST['MoTa']);
    $MaSizes = isset($_POST['MaSize']) ? $_POST['MaSize'] : [];
    $MaMaus = isset($_POST['MaMau']) ? $_POST['MaMau'] : [];
    
    // Validate dữ liệu
    if(empty($TenSP) || empty($MaDM) || empty($MaNCC) || $SoLuong < 0 || $DonGia <= 0) {
        $error = 'Vui lòng nhập đầy đủ thông tin và đảm bảo số lượng, đơn giá hợp lệ!';
    } else if(empty($MaSizes) || empty($MaMaus)) {
        $error = 'Vui lòng chọn ít nhất một size và một màu!';
    } else {
        // Tạo thư mục images nếu chưa tồn tại
        $upload_dir = '../assets/images';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        // Xử lý upload ảnh nền
        $AnhNen = '';
        if(isset($_FILES['AnhNen']) && $_FILES['AnhNen']['error'] == 0) {
            $allowed = ['jpg', 'jpeg', 'png', 'gif'];
            $filename = $_FILES['AnhNen']['name'];
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            
            if(in_array($ext, $allowed)) {
                $AnhNen = uniqid() . '.' . $ext;
                $upload_path = $upload_dir . '/' . $AnhNen;
                
                if(move_uploaded_file($_FILES['AnhNen']['tmp_name'], $upload_path)) {
                    // Ảnh đã được upload thành công
                } else {
                    $error = 'Không thể upload ảnh nền. Vui lòng thử lại!';
                }
            } else {
                $error = 'Chỉ chấp nhận file ảnh (jpg, jpeg, png, gif)!';
            }
        }

        if(empty($error)) {
            // Bắt đầu transaction
            $conn->begin_transaction();
            try {
                // Thêm sản phẩm
                $sql = "INSERT INTO sanpham (TenSP, MaDM, MaNCC, SoLuong, DonGia, AnhNen, MoTa) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("siiidss", $TenSP, $MaDM, $MaNCC, $SoLuong, $DonGia, $AnhNen, $MoTa);
                
                if($stmt->execute()) {
                    $MaSP = $conn->insert_id;
                    
                    // Thêm chi tiết size và màu
                    foreach($MaSizes as $MaSize) {
                        foreach($MaMaus as $MaMau) {
                            $sql = "INSERT INTO chitietsanpham (MaSP, MaSize, MaMau, SoLuong) VALUES (?, ?, ?, ?)";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("issi", $MaSP, $MaSize, $MaMau, $SoLuong);
                            $stmt->execute();
                        }
                    }
                    
                    // Xử lý upload nhiều ảnh
                    if(isset($_FILES['AnhPhu'])) {
                        foreach($_FILES['AnhPhu']['tmp_name'] as $key => $tmp_name) {
                            if($_FILES['AnhPhu']['error'][$key] == 0) {
                                $filename = $_FILES['AnhPhu']['name'][$key];
                                $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                                
                                if(in_array($ext, $allowed)) {
                                    $AnhPhu = uniqid() . '.' . $ext;
                                    $upload_path = $upload_dir . '/' . $AnhPhu;
                                    
                                    if(move_uploaded_file($tmp_name, $upload_path)) {
                                        $sql = "INSERT INTO anhsanpham (MaSP, AnhPhu) VALUES (?, ?)";
                                        $stmt = $conn->prepare($sql);
                                        $stmt->bind_param("is", $MaSP, $AnhPhu);
                                        $stmt->execute();
                                    }
                                }
                            }
                        }
                    }
                    
                    $conn->commit();
                    header('Location: products.php');
                    exit();
                } else {
                    throw new Exception('Thêm sản phẩm thất bại!');
                }
            } catch (Exception $e) {
                $conn->rollback();
                $error = $e->getMessage();
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Thêm sản phẩm mới</h2>
    <?php if($error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Tên sản phẩm</label>
            <input type="text" name="TenSP" class="form-control" required value="<?php echo htmlspecialchars($_POST['TenSP'] ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Danh mục</label>
            <select name="MaDM" class="form-select" required>
                <option value="">-- Chọn danh mục --</option>
                <?php
                $danhmuc->data_seek(0);
                while($dm = $danhmuc->fetch_assoc()): ?>
                    <option value="<?php echo $dm['MaDM']; ?>" <?php if(isset($_POST['MaDM']) && $_POST['MaDM'] == $dm['MaDM']) echo 'selected'; ?>><?php echo $dm['TenDM']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Nhà cung cấp</label>
            <select name="MaNCC" class="form-select" required>
                <option value="">-- Chọn nhà cung cấp --</option>
                <?php
                $nhacc->data_seek(0);
                while($ncc = $nhacc->fetch_assoc()): ?>
                    <option value="<?php echo $ncc['MaNCC']; ?>" <?php if(isset($_POST['MaNCC']) && $_POST['MaNCC'] == $ncc['MaNCC']) echo 'selected'; ?>><?php echo $ncc['TenNCC']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Số lượng</label>
            <input type="number" name="SoLuong" class="form-control" required min="0" value="<?php echo htmlspecialchars($_POST['SoLuong'] ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Đơn giá</label>
            <input type="number" name="DonGia" class="form-control" required min="0" value="<?php echo htmlspecialchars($_POST['DonGia'] ?? ''); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Ảnh nền</label>
            <input type="file" name="AnhNen" class="form-control" accept="image/*" required>
            <small class="text-muted">Chọn ảnh chính cho sản phẩm (jpg, jpeg, png, gif)</small>
        </div>
        <div class="mb-3">
            <label class="form-label">Ảnh phụ</label>
            <input type="file" name="AnhPhu[]" class="form-control" accept="image/*" multiple>
            <small class="text-muted">Có thể chọn nhiều ảnh phụ cho sản phẩm (jpg, jpeg, png, gif)</small>
        </div>
        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="MoTa" class="form-control" rows="3"><?php echo htmlspecialchars($_POST['MoTa'] ?? ''); ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Mã size</label>
            <select name="MaSize[]" class="form-select" multiple required>
                <?php foreach($sizes as $size): ?>
                    <option value="<?php echo $size; ?>" <?php if(isset($_POST['MaSize']) && in_array($size, (array)$_POST['MaSize'])) echo 'selected'; ?>><?php echo $size; ?></option>
                <?php endforeach; ?>
            </select>
            <small class="text-muted">Giữ Ctrl (Windows) hoặc Command (Mac) để chọn nhiều size</small>
        </div>
        <div class="mb-3">
            <label class="form-label">Mã màu</label>
            <select name="MaMau[]" class="form-select" multiple required>
                <?php foreach($colors as $color): ?>
                    <option value="<?php echo $color; ?>" <?php if(isset($_POST['MaMau']) && in_array($color, (array)$_POST['MaMau'])) echo 'selected'; ?>><?php echo $color; ?></option>
                <?php endforeach; ?>
            </select>
            <small class="text-muted">Giữ Ctrl (Windows) hoặc Command (Mac) để chọn nhiều màu</small>
        </div>
        <button type="submit" name="add" class="btn btn-primary">Thêm sản phẩm</button>
        <a href="products.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
</body>
</html> 