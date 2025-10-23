document.addEventListener("DOMContentLoaded", function () {
  const profileTab = document.getElementById("profileTab");
  const passwordTab = document.getElementById("passwordTab");
  const tripTab = document.getElementById("tripTab");

  const profileContent = document.getElementById("profileContent");
  const passwordContent = document.getElementById("passwordContent");
  const tripContent = document.getElementById("tripContent");

  const backToProfile = document.getElementById("backToProfile");
  const backToProfileFromTrip = document.getElementById("backToProfileFromTrip");

  function switchTab(showContent, hideContents, activeTab, inactiveTabs) {
    showContent.style.display = "block"; // Hiển thị nội dung của tab đang chọn
    hideContents.forEach(content => content.style.display = "none"); // Ẩn các tab khác

    activeTab.classList.add("active"); // Bôi đậm tab đang chọn
    inactiveTabs.forEach(tab => tab.classList.remove("active")); // Xóa bôi đậm của tab không chọn
  }

  // Khi nhấn vào "Mật khẩu & Bảo mật"
  passwordTab.addEventListener("click", function (e) {
    e.preventDefault();
    switchTab(passwordContent, [profileContent, tripContent], passwordTab, [profileTab, tripTab]);
  });

  // Khi nhấn vào "Chuyến đi của tôi"
  tripTab.addEventListener("click", function (e) {
    e.preventDefault();
    switchTab(tripContent, [profileContent, passwordContent], tripTab, [profileTab, passwordTab]);
  });

  // Khi nhấn vào "Thông tin tài khoản"
  profileTab.addEventListener("click", function (e) {
    e.preventDefault();
    switchTab(profileContent, [passwordContent, tripContent], profileTab, [passwordTab, tripTab]);
  });

  // Khi nhấn "Quay lại" từ Đổi mật khẩu
  backToProfile.addEventListener("click", function () {
    switchTab(profileContent, [passwordContent, tripContent], profileTab, [passwordTab, tripTab]);
  });

  // Khi nhấn "Quay lại" từ Chuyến đi của tôi
  backToProfileFromTrip.addEventListener("click", function () {
    switchTab(profileContent, [passwordContent, tripContent], profileTab, [passwordTab, tripTab]);
  });
});


// kiểm tra mật khẩu xác nhận
document.querySelector(".checkPass").addEventListener("click", function () {
  let newPassword = document.getElementById("newPassword").value;
  let confirmPassword = document.getElementById("confirmPassword");

  if (confirmPassword.value !== newPassword) {
    confirmPassword.classList.add("is-invalid");
    confirmPassword.setCustomValidity(
      "Mật khẩu xác thực không chính xác, vui lòng nhập lại."
    );
    confirmPassword.reportValidity();
  } else {
    confirmPassword.classList.remove("is-invalid");
    confirmPassword.setCustomValidity("");
  }
});

//chỉnh sửa thông tin
document.querySelectorAll(".Edit-link").forEach(function (editBtn) {
  editBtn.addEventListener("click", function (event) {
    // Chỉ chặn reload trang khi nút ở trạng thái "Thay đổi" (không có lớp save-link)
    if (!this.classList.contains("save-link")) {
      event.preventDefault(); // Ngăn chặn reload trang nếu là thẻ <a>
    }

    let infoItem = this.closest(".info-item"); // Lấy phần tử cha gần nhất
    let infoText = infoItem.querySelector(".col-12.col-md-7 p"); // Lấy nội dung hiển thị
    let inputFieldName = infoItem.querySelector("input[type=hidden]").name; // Lấy tên trường ẩn

    if (infoText && !this.classList.contains("save-link")) {
      let currentValue = infoText.textContent.trim(); // Lấy giá trị hiện tại

      // Tạo một input thay thế <p>
      let inputField = document.createElement("input");
      inputField.type = "text";
      inputField.className = "form-control";
      inputField.value = currentValue;

      // Thay thế phần tử <p> bằng <input>
      infoItem
        .querySelector(".col-12.col-md-7")
        .replaceChild(inputField, infoText);

      // Chuyển nút "Thay đổi" thành "Lưu"
      this.textContent = "Lưu";
      this.classList.add("save-link");

      // Xử lý khi bấm "Lưu"
      const saveHandler = () => {
        let newValue = inputField.value.trim();

        // Cập nhật giá trị trường ẩn
        infoItem.querySelector(`input[name=${inputFieldName}]`).value = newValue;

        // Tạo lại thẻ <p> với giá trị mới
        let newText = document.createElement("p");
        newText.className = "mb-0";
        newText.textContent = newValue;

        // Thay thế <input> bằng <p>
        infoItem
          .querySelector(".col-12.col-md-7")
          .replaceChild(newText, inputField);

        // Chuyển lại nút về "Thay đổi"
        this.textContent = "Thay đổi";
        this.classList.remove("save-link");

        // Xóa sự kiện "Lưu" để tránh gắn nhiều lần
        this.removeEventListener("click", saveHandler);
      };

      // Gắn sự kiện "Lưu"
      this.addEventListener("click", saveHandler);
    }
  });
});