// hiện ẩn form tìm kiếm
let searchButton = document.getElementById('btn-nav-search');
let form = document.getElementById('form-container');
searchButton.addEventListener('click', (event) => {
    event.stopPropagation(); // Ngăn sự kiện lan lên document
    let currentDisplay = window.getComputedStyle(form).display;
    form.style.display = (currentDisplay === "none") ? "block" : "none";
});
// Ẩn form khi click ra ngoài
document.addEventListener('click', (event) => {
    if (!form.contains(event.target) && event.target !== searchButton) {
        form.style.display = "none";
    }
});

