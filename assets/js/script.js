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


