document.addEventListener("DOMContentLoaded", function () {
  const highlightText = document.getElementById('highlight-text');
  const texts = ["DEAL NGON", "BÁN CHẠY"];
  let index = 0;

  setInterval(() => {
    // Slide sang trái (ẩn)
    highlightText.style.transform = 'translateX(100%)';

    setTimeout(() => {
      // Đổi text khi đã slide ra ngoài
      index = (index + 1) % texts.length;
      highlightText.textContent = texts[index];
      // Cho nó nhảy sang trái ngoài khung
      highlightText.style.transform = 'translateX(-100%)';
    }, 500);

    setTimeout(() => {
      // Slide vào giữa lại
      highlightText.style.transform = 'translateX(0)';
    }, 600);
  }, 2000); // đổi chữ mỗi 3s
});
document.addEventListener("DOMContentLoaded", () => {
  const counters = document.querySelectorAll('.counter');

  counters.forEach(counter => {
    const updateCount = () => {
      const target = +counter.getAttribute('data-target');
      let count = +counter.innerText.replace(/\./g, '');
      const increment = target / 200;

      if (count < target) {
        count += increment;
        counter.innerText = Math.ceil(count).toLocaleString('vi-VN');
        setTimeout(updateCount, 10);
      } else {
        counter.innerText = target.toLocaleString('vi-VN');
      }
    };

    updateCount();
  });
});


const userIcon = document.getElementById("userIcon");
const modal = document.getElementById("authModal");
const closeBtn = document.querySelector(".close");
const loginTab = document.getElementById("loginTab");
const registerTab = document.getElementById("registerTab");
const loginForm = document.getElementById("loginForm");
const registerForm = document.getElementById("registerForm");

userIcon.onclick = () => modal.style.display = "block";
closeBtn.onclick = () => modal.style.display = "none";


loginTab.onclick = () => {
  loginForm.style.display = "block";
  registerForm.style.display = "none";
};

registerTab.onclick = () => {
  loginForm.style.display = "none";
  registerForm.style.display = "block";
};

function openSizeGuide() {
  document.getElementById("sizeGuideModal").style.display = "block";
}

function closeSizeGuide() {
  document.getElementById("sizeGuideModal").style.display = "none";
}

// Đóng khi click ra ngoài vùng modal
window.onclick = function (event) {
  // Đóng auth modal
  const authModal = document.getElementById("authModal");
  if (event.target === authModal) {
    authModal.style.display = "none";
  }

  // Đóng size guide modal
  const sizeGuideModal = document.getElementById("sizeGuideModal");
  if (event.target === sizeGuideModal) {
    sizeGuideModal.style.display = "none";
  }
};

document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.querySelector(".toggle-guide-btn");
  const contentBox = document.querySelector(".guide-hotline-wrapper");

  toggleBtn.addEventListener("click", function () {
    contentBox.style.display =
      contentBox.style.display === "none" || contentBox.style.display === ""
        ? "block"
        : "none";
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const toggleBtn = document.querySelector('.toggle-btn');
  const content = document.querySelector('.guide-content');

  toggleBtn.addEventListener('click', () => {
    const isVisible = content.style.display === 'block';
    content.style.display = isVisible ? 'none' : 'block';
    toggleBtn.textContent = isVisible ? '+' : '-';
  });
});

function openModal(id) {
  document.getElementById(id).style.display = "block";
  document.body.style.overflow = "hidden"; // Không cho cuộn trang nền
}

function closeModal(id) {
  document.getElementById(id).style.display = "none";
  document.body.style.overflow = "auto";
}

// Đăng nhập/ Đăng ký

function openLogin() {
  document.getElementById('loginModal').style.display = 'block';
  document.body.style.overflow = 'hidden';
}

function openRegister() {
  document.getElementById('registerModal').style.display = 'block';
  document.body.style.overflow = 'hidden';
}

function openZalo() {
  document.getElementById('zaloModal').style.display = 'block';
  document.body.style.overflow = 'hidden';
}

function switchToRegister() {
  closeModal('loginModal');
  openRegister();
}

function switchToZalo() {
  closeModal('loginModal');
  openZalo();
}

function switchToLogin() {
  closeModal('registerModal');
  closeModal('zaloModal');
  openLogin();
}

// Đặt thời gian đích
document.addEventListener("DOMContentLoaded", function () {
  const countdownDate = new Date("2025-06-30T23:59:00").getTime();

  function updateCountdown() {
    const now = new Date().getTime();
    const distance = countdownDate - now;

    if (distance < 0) return;

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("days").textContent = String(days).padStart(2, '0');
    document.getElementById("hours").textContent = String(hours).padStart(2, '0');
    document.getElementById("minutes").textContent = String(minutes).padStart(2, '0');
    document.getElementById("seconds").textContent = String(seconds).padStart(2, '0');
  }

  updateCountdown();
  setInterval(updateCountdown, 1000);
});

document.querySelector(".review-form").addEventListener("submit", function (e) {
  e.preventDefault();

  const name = document.getElementById("name").value;
  const rating = document.getElementById("rating").value;
  const comment = document.getElementById("comment").value;

  const stars = "★★★★★☆☆☆☆☆".slice(5 - rating, 10 - rating); // Xử lý sao

  const newReview = document.createElement("div");
  newReview.classList.add("review");
  newReview.innerHTML = `
      <strong>${name}</strong>
      <div class="stars">${stars}</div>
      <p>${comment}</p>
    `;

  document.querySelector(".review-list").prepend(newReview);

  this.reset();
  alert("Cảm ơn bạn đã đánh giá!");
});


