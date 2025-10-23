const body = document.body;
const toggleCheckbox = document.getElementById("theme"); // Đổi thành checkbox
// Danh sách các phần tử cần áp dụng dark mode
const elementsToDarken = document.querySelectorAll(
    '.card, .card-body, .text-overlay, .discount-badge, .old-price, .price, .icon-text, .btn-carou-next, .btn-carou-prev, .pagination, .page-link, .nav-tabs .nav-link, del.text-muted, span.text-success'
);

// Hàm áp dụng theme
function applyTheme(theme) {
    if (theme === "dark-mode") {
        body.classList.add("dark-mode"); // Phải khớp với CSS
        elementsToDarken.forEach(el => el.classList.add("dark-mode"));
    } 
    else {
        body.classList.remove("dark-mode");
        elementsToDarken.forEach(el => el.classList.remove("dark-mode"));
    }
}

// Kiểm tra theme đã lưu trong localStorage khi tải trang
const savedTheme = localStorage.getItem("theme");
if (savedTheme) {
    applyTheme(savedTheme);
    toggleCheckbox.checked = savedTheme === "dark-mode"; // Cập nhật trạng thái checkbox
}

// Xử lý sự kiện khi thay đổi checkbox
toggleCheckbox.addEventListener("change", () => {
    const isDark = toggleCheckbox.checked; // Dựa vào trạng thái checkbox
    
    if (isDark) {
        // Chuyển sang Dark mode
        applyTheme("dark-mode");
        localStorage.setItem("theme", "dark-mode");
    } else {
        // Chuyển sang Light mode
        applyTheme("light");
        localStorage.setItem("theme", "light");
    }
});