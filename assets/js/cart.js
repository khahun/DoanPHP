// Biến lưu trữ giỏ hàng
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// Hàm cập nhật số lượng hiển thị trên icon giỏ hàng
function updateCartCount() {
    const totalItems = cart.reduce((total, item) => total + (parseInt(item.quantity) || 1), 0);
    const cartCount = document.querySelector('.cart-count');
    
    if (cartCount) {
        if (totalItems > 0) {
            cartCount.textContent = totalItems > 99 ? '99+' : totalItems;
            cartCount.style.display = 'flex';
        } else {
            cartCount.style.display = 'none';
        }
    }
}

// Gọi hàm cập nhật khi trang được tải
document.addEventListener('DOMContentLoaded', updateCartCount);

// Hàm kiểm tra đăng nhập
function checkLogin() {
    // Kiểm tra session PHP thông qua AJAX
    return fetch('../check_login.php')
        .then(response => response.json())
        .then(data => {
            if (!data.logged_in) {
                // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
                window.location.href = '../views/login.php?redirect=' + encodeURIComponent(window.location.href);
                return false;
            }
            return true;
        })
        .catch(error => {
            console.error('Error:', error);
            return false;
        });
}

// Hàm thêm sản phẩm vào giỏ hàng
async function addToCart(productId, name, price, image, color, size, quantity) {
    // Kiểm tra đăng nhập trước
    const isLoggedIn = await checkLogin();
    if (!isLoggedIn) return;

    // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
    const existingItem = cart.find(item =>
        item.productId === productId &&
        item.color === color &&
        item.size === size
    );

    if (existingItem) {
        // Nếu đã tồn tại thì tăng số lượng
        existingItem.quantity = (parseInt(existingItem.quantity) || 0) + parseInt(quantity);
    } else {
        // Nếu chưa tồn tại thì thêm mới
        cart.push({
            productId,
            name,
            price,
            image,
            color,
            size,
            quantity: parseInt(quantity)
        });
    }

    // Lưu giỏ hàng vào localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

    // Cập nhật số lượng hiển thị
    updateCartCount();

    // Hiển thị thông báo
    showNotification('Đã thêm sản phẩm vào giỏ hàng!');
}

// Hàm hiển thị thông báo
function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'notification';
    notification.textContent = message;
    document.body.appendChild(notification);

    // Tự động ẩn sau 3 giây
    setTimeout(() => {
        notification.remove();
    }, 3000);
}

// Hàm cập nhật số lượng sản phẩm
function updateQuantity(input) {
    const value = parseInt(input.value);
    if (value < 1) {
        input.value = 1;
    }
}

// Hàm kiểm tra form trước khi thêm vào giỏ hàng
function validateAddToCartForm() {
    const color = document.querySelector('input[name="color"]:checked');
    const size = document.querySelector('input[name="size"]:checked');
    const quantity = document.getElementById('quantity').value;

    if (!color) {
        showNotification('Vui lòng chọn màu sắc!');
        return false;
    }
    if (!size) {
        showNotification('Vui lòng chọn kích cỡ!');
        return false;
    }
    if (quantity < 1) {
        showNotification('Số lượng không hợp lệ!');
        return false;
    }
    return true;
} 