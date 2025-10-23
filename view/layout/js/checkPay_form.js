document
  .getElementById("paymentForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    // Kiểm tra tính hợp lệ của form
    if (!this.checkValidity()) {
      event.stopPropagation();
      this.classList.add("was-validated"); // Hiển thị lỗi Bootstrap
    } else {
      // Hiển thị thông báo thành công
      Swal.fire({
        icon: "success",
        title: "Thanh toán thành công!",
        text: "Cảm ơn bạn đã sử dụng dịch vụ.",
        confirmButtonText: "OK",
      });
    }
  });

document.addEventListener("DOMContentLoaded", function () {
  let inputSoLuong = document.getElementById("soluongthanhvien");
  let inputGiaChuyen = document.getElementById("giachuyen");
  let inputTongTien = document.getElementById("tongtien");

  function tinhTongTien() {
    let soLuong = parseInt(inputSoLuong.value) || 1;
    let giaChuyen = parseInt(inputGiaChuyen.value.replace(/\./g, "")) || 0;
    let tongTien = soLuong * giaChuyen;

    inputTongTien.value = tongTien.toLocaleString("vi-VN") + " VND";
  }

  inputSoLuong.addEventListener("input", tinhTongTien);

  tinhTongTien();
});
