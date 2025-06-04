document.addEventListener("DOMContentLoaded", function() {
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
  window.onclick = e => { if (e.target == modal) modal.style.display = "none"; }

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
window.onclick = function(event) {
  const modal = document.getElementById("sizeGuideModal");
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

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
  closeModal('registerModal');
  document.getElementById('loginModal').style.display = 'block';
}

function openRegister() {
  closeModal('loginModal');
  document.getElementById('registerModal').style.display = 'block';
}

function closeModal(id) {
  document.getElementById(id).style.display = 'none';
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
  openLogin();
}
function switchToLogin() {
  closeModal('zaloModal');
  openLogin();
}

// Đóng modal khi click bên ngoài
window.onclick = function(event) {
  if (event.target.classList.contains('modal')) {
    event.target.style.display = "none";
  }
}

function openZalo() {
  closeModal('loginModal');
  closeModal('registerModal');
  document.getElementById('zaloModal').style.display = 'block';
}

window.addEventListener("DOMContentLoaded", function () {
    const endDate = new Date("2025-06-30T23:59:59").getTime();

    const daysEl = document.getElementById("days");
    const hoursEl = document.getElementById("hours");
    const minutesEl = document.getElementById("minutes");
    const secondsEl = document.getElementById("seconds");

    if (!daysEl || !hoursEl || !minutesEl || !secondsEl) {
        console.error("Countdown elements not found in the DOM.");
        return;
    }

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = endDate - now;

        if (distance < 0) {
            document.querySelector(".countdown").innerHTML = "<h2>ĐÃ HẾT GIỜ!</h2>";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance / (1000 * 60 * 60)) % 24);
        const minutes = Math.floor((distance / (1000 * 60)) % 60);
        const seconds = Math.floor((distance / 1000) % 60);

        daysEl.textContent = days.toString().padStart(2, '0');
        hoursEl.textContent = hours.toString().padStart(2, '0');
        minutesEl.textContent = minutes.toString().padStart(2, '0');
        secondsEl.textContent = seconds.toString().padStart(2, '0');
    }

    updateCountdown();
    setInterval(updateCountdown, 1000);
});


function showNotification(data) {
  const container = document.getElementById("sale-notifications");

  const notif = document.createElement("div");
  notif.className = "notification";
  notif.innerHTML = `
    <img src="${data.image_url}" alt="SP">
    <div class="text">
      <strong>${data.phone}</strong> đã vừa mua<br>
      ${data.product_name}<br>
      <small>${data.time}</small>
    </div>
  `;

  container.appendChild(notif);
  setTimeout(() => notif.remove(), 6000);
}

function fetchNotification() {
  fetch("get_notifications.php")
    .then(res => res.json())
    .then(data => {
      showNotification(data);
    });
}

document.addEventListener("DOMContentLoaded", () => {
  const scrollBtn = document.getElementById("scrollButton");

  function updateScrollIcon() {
    if (window.scrollY < 100) {
      scrollBtn.innerHTML = "⬇️";
    } else {
      scrollBtn.innerHTML = "⬆️";
    }
  }

  scrollBtn.addEventListener("click", () => {
    if (window.scrollY < 100) {
      window.scrollTo({ top: document.body.scrollHeight, behavior: "smooth" });
    } else {
      window.scrollTo({ top: 0, behavior: "smooth" });
    }
  });

  window.addEventListener("scroll", updateScrollIcon);
  updateScrollIcon();
});
