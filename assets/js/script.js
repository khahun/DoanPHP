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
