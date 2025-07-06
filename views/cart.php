<?php
session_start();
require_once __DIR__ . '/../models/database.php';

// Xử lý thêm sản phẩm vào giỏ hàng
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'] ?? 1;
    $color = $_POST['color'] ?? '';
    $size = $_POST['size'] ?? '';
    
    // Lấy thông tin sản phẩm
    $sql = "SELECT * FROM sanpham WHERE MaSP = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    
    if ($product) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        
        // Tạo key duy nhất cho sản phẩm dựa trên ID, màu và size
        $cart_key = $product_id . '_' . $color . '_' . $size;
        
        // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
        if (isset($_SESSION['cart'][$cart_key])) {
            $_SESSION['cart'][$cart_key]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$cart_key] = array(
                'id' => $product['MaSP'],
                'name' => $product['TenSP'],
                'price' => $product['DonGia'],
                'image' => $product['AnhNen'],
                'quantity' => $quantity,
                'color' => $color,
                'size' => $size
            );
        }
        
        // Trả về response thành công
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit();
    }
}

// Xử lý cập nhật số lượng
if (isset($_POST['update_qty']) && isset($_POST['cart_key'])) {
    $cart_key = $_POST['cart_key'];
    $qty = max(1, intval($_POST['quantity']));
    if (isset($_SESSION['cart'][$cart_key])) {
        $_SESSION['cart'][$cart_key]['quantity'] = $qty;
    }
    header('Location: cart.php');
    exit();
}

// Xử lý xóa sản phẩm
if (isset($_POST['remove_item']) && isset($_POST['cart_key'])) {
    $cart_key = $_POST['cart_key'];
    unset($_SESSION['cart'][$cart_key]);
    header('Location: cart.php');
    exit();
}

// Tính tổng tiền
$total = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
}
$_SESSION['cart_total'] = $total;
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng - GenZShop</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
      .cart-flex {display: flex; gap: 32px; align-items: flex-start; flex-wrap: wrap;}
      .cart-left {flex: 2; min-width: 320px;}
      .cart-right {flex: 1; min-width: 260px;}
      @media (max-width: 900px) {.cart-flex {flex-direction: column;}}
      .cart-list {width: 100%;}
      .cart-item {display: flex; align-items: center; gap: 18px; margin-bottom: 18px; background: #fff; border-radius: 14px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 18px;}
      .cart-item-img img {width: 80px; height: 80px; object-fit: cover; border-radius: 8px; border: 1px solid #eee;}
      .cart-item-info {flex: 1;}
      .cart-item-title {font-weight: 600; color: #111; font-size: 1.1rem; margin-bottom: 4px;}
      .cart-item-options {color: #666; font-size: 0.95rem; margin-bottom: 4px;}
      .cart-item-price {color: #e53935; font-weight: 600; font-size: 1rem;}
      .cart-item-qty {display: flex; align-items: center; gap: 6px;}
      .cart-item-qty form {display: flex; align-items: center; gap: 4px;}
      .quantity-btn {width: 28px; height: 28px; border: 1px solid #ddd; background: #fff; border-radius: 6px; display: flex; align-items: center; justify-content: center; cursor: pointer; font-size: 1rem;}
      .quantity-btn:hover {background: #f0f4ff; border-color: #007bff; color: #007bff;}
      .quantity-input {width: 40px; text-align: center; border: 1px solid #ddd; border-radius: 6px; padding: 2px; font-size: 1rem;}
      .cart-item-subtotal {font-weight: 600; color: #111; min-width: 90px; text-align: right;}
      .cart-item-remove form {display: inline;}
      .remove-item {color: #dc3545; background: none; border: none; font-size: 1.1rem; cursor: pointer; transition: color 0.2s;}
      .remove-item:hover {color: #b71c1c;}
      .cart-summary {background: #fff; border-radius: 16px; box-shadow: 0 2px 12px rgba(0,0,0,0.06); padding: 2rem 1.5rem; margin-bottom: 18px;}
      .summary-total {font-size: 1.2rem; font-weight: 700; color: #111; display: flex; justify-content: space-between; margin-bottom: 18px;}
      .checkout-btn {width: 100%; padding: 1rem; background: #111; color: #fff; border: none; border-radius: 10px; font-weight: 700; font-size: 1.1rem; margin-bottom: 12px; transition: background 0.2s;}
      .checkout-btn:hover {background: #007bff;}
      .continue-shopping {width: 100%; padding: 1rem; background: #f8f9fa; color: #111; border: 1px solid #ddd; border-radius: 10px; font-weight: 600; font-size: 1.05rem; text-align: center; text-decoration: none; display: block;}
      .continue-shopping:hover {background: #e9ecef;}
      .cart-empty {text-align: center; padding: 3rem; background: #fff; border-radius: 18px; box-shadow: 0 5px 24px rgba(0,0,0,0.07);}
      .cart-empty i {font-size: 4rem; color: #ddd; margin-bottom: 1rem;}
      .cart-empty p {font-size: 1.2rem; color: #333; margin-bottom: 1.5rem;}
      .voucher-section {
          margin: 15px 0;
          padding: 15px;
          background: #f8f9fa;
          border-radius: 8px;
      }
      .apply-voucher-btn {
          display: flex;
          align-items: center;
          justify-content: center;
          gap: 10px;
          padding: 10px;
          background: #fff;
          border: 1px solid #ddd;
          border-radius: 8px;
          color: #111;
          text-decoration: none;
          font-weight: 500;
          transition: all 0.3s;
      }
      .apply-voucher-btn:hover {
          background: #f5f5f5;
          border-color: #111;
      }
      .applied-voucher {
          display: flex;
          align-items: center;
          justify-content: space-between;
          padding: 10px;
          background: #e8f5e9;
          border-radius: 8px;
          color: #388e3c;
      }
      .remove-voucher {
          color: #e53935;
          text-decoration: none;
          padding: 5px;
      }
      .remove-voucher:hover {
          color: #c62828;
      }
      .summary-item.discount {
          color: #388e3c;
      }
    </style>
</head>
<body>
<?php include '../includes/header.php'; ?>
<div class="cart-container">
    <div class="cart-header">
        <h2>Giỏ hàng của bạn</h2>
    </div>
    <?php if (empty($_SESSION['cart'])): ?>
        <div class="cart-empty">
            <i class="fas fa-shopping-cart"></i>
            <p>Giỏ hàng của bạn đang trống</p>
            <a href="home.php" class="continue-shopping">
                <i class="fas fa-arrow-left me-2"></i>Quay lại trang chủ
            </a>
        </div>
    <?php else: ?>
    <div class="cart-flex">
      <div class="cart-left">
        <?php foreach ($_SESSION['cart'] as $cart_key => $item): ?>
          <div class="cart-item" data-cart-key="<?php echo htmlspecialchars($cart_key); ?>">
            <div class="cart-item-img">
              <img src="../assets/images/<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
            </div>
            <div class="cart-item-info">
              <div class="cart-item-title"><?php echo htmlspecialchars($item['name']); ?></div>
              <div class="cart-item-options">Màu: <?php echo htmlspecialchars($item['color']); ?> | Size: <?php echo htmlspecialchars($item['size']); ?></div>
              <div class="cart-item-price"><?php echo number_format($item['price']); ?>đ</div>
            </div>
            <div class="cart-item-qty">
              <form method="post" action="cart.php" class="update-qty-form">
                <input type="hidden" name="cart_key" value="<?php echo htmlspecialchars($cart_key); ?>">
                <button type="button" class="quantity-btn decrease"><i class="fas fa-minus"></i></button>
                <input type="number" name="quantity" class="quantity-input" value="<?php echo $item['quantity']; ?>" min="1" max="10">
                <button type="button" class="quantity-btn increase"><i class="fas fa-plus"></i></button>
                <button type="submit" name="update_qty" value="1" class="update-cart-btn" style="display:none;margin-left:8px;">Cập nhật</button>
              </form>
            </div>
            <div class="cart-item-subtotal"><?php echo number_format($item['price'] * $item['quantity']); ?>đ</div>
            <div class="cart-item-remove">
              <form method="post" action="cart.php">
                <input type="hidden" name="cart_key" value="<?php echo htmlspecialchars($cart_key); ?>">
                <button type="submit" name="remove_item" class="remove-item"><i class="fas fa-trash"></i></button>
              </form>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="cart-right">
        <div class="cart-summary">
          <h3>Tổng đơn hàng</h3>
          <div class="summary-item">
              <span>Tạm tính:</span>
              <span><?= number_format($total) ?>đ</span>
          </div>
          
          <?php if (isset($_SESSION['voucher'])): ?>
              <div class="summary-item discount">
                  <span>Giảm giá (<?= $_SESSION['voucher']['code'] ?>):</span>
                  <span>-<?= number_format($_SESSION['voucher']['discount']) ?>đ</span>
              </div>
          <?php endif; ?>
          
          <div class="summary-item total">
              <span>Thành tiền:</span>
              <span><?= number_format($total - (isset($_SESSION['voucher']) ? $_SESSION['voucher']['discount'] : 0)) ?>đ</span>
          </div>
          
          <div class="voucher-section">
              <?php if (!isset($_SESSION['voucher'])): ?>
                  <a href="voucher.php" class="apply-voucher-btn">
                      <i class="fas fa-ticket-alt"></i> Áp dụng mã giảm giá
                  </a>
              <?php else: ?>
                  <div class="applied-voucher">
                      <span>Mã giảm giá: <?= $_SESSION['voucher']['code'] ?></span>
                      <a href="remove_voucher.php" class="remove-voucher">
                          <i class="fas fa-times"></i>
                      </a>
                  </div>
              <?php endif; ?>
          </div>
          
          <form method="get" action="checkout.php">
            <button type="submit" class="checkout-btn">
                <i class="fas fa-shopping-cart"></i> Thanh toán
            </button>
          </form>
        </div>
      </div>
    </div>
    <?php endif; ?>
</div>
<!-- Modal hướng dẫn chọn size -->
<div class="size-guide-modal" id="sizeGuideModal">
  <div class="size-guide-modal-content">
    <span class="size-guide-modal-close" onclick="closeSizeGuide()">&times;</span>
    <img src="../assets/images/huongdanchonsize.png" alt="Hướng dẫn chọn size giày">
  </div>
</div>
<div class="cart-update-alert" id="cartUpdateAlert">Đã cập nhật số lượng sản phẩm!</div>
<script>
function openSizeGuide() {
  document.getElementById('sizeGuideModal').classList.add('active');
}
function closeSizeGuide() {
  document.getElementById('sizeGuideModal').classList.remove('active');
}
window.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') closeSizeGuide();
});
document.getElementById('sizeGuideModal').addEventListener('click', function(e) {
  if (e.target === this) closeSizeGuide();
});
document.querySelectorAll('.cart-item-qty').forEach(function(qtyBox) {
  const form = qtyBox.querySelector('.update-qty-form');
  const input = form.querySelector('.quantity-input');
  const btnUpdate = form.querySelector('.update-cart-btn');
  const btnMinus = form.querySelector('.quantity-btn.decrease');
  const btnPlus = form.querySelector('.quantity-btn.increase');
  let lastValue = input.value;

  function showUpdateBtn() {
    btnUpdate.style.display = 'inline-block';
  }
  function hideUpdateBtn() {
    btnUpdate.style.display = 'none';
  }

  btnMinus.onclick = function() {
    let val = parseInt(input.value);
    if (val > 1) input.value = val - 1;
    if (input.value !== lastValue) showUpdateBtn();
  };
  btnPlus.onclick = function() {
    let val = parseInt(input.value);
    if (val < 10) input.value = val + 1;
    if (input.value !== lastValue) showUpdateBtn();
  };
  input.oninput = function() {
    if (input.value !== lastValue) showUpdateBtn();
  };
  form.onsubmit = function() {
    lastValue = input.value;
    hideUpdateBtn();
    showCartUpdateAlert();
  };
});
function showCartUpdateAlert() {
  var alertBox = document.getElementById('cartUpdateAlert');
  alertBox.classList.add('show');
  setTimeout(function() {
    alertBox.classList.remove('show');
  }, 1500);
}
document.querySelectorAll('.cart-item-remove form').forEach(function(form) {
  form.addEventListener('submit', function(e) {
    if (!confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
      e.preventDefault();
    }
  });
});
</script>
<?php include '../includes/footer.php'; ?>
</body>
</html> 