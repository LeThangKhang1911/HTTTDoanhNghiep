document.getElementById('btn-signup').addEventListener('click', (e) => {
    let fullname = document.forms[0]['fullname'];
    let email = document.forms[0]['email'];
    let password = document.forms[0]['password'];
    let repassword = document.forms[0]['repassword'];
    let birthday = document.forms[0]['birthday'];
    let phonenumber = document.forms[0]['phone-number'];
    let checkbox = document.forms[0]['check'];
    let error = '';

    if (fullname.value === '') {
        error = "Vui lòng nhập họ và tên của bạn.";
        fullname.focus();
    } else if (email.value === '') {
        error = "Vui lòng nhập email.";
        email.focus();
    } else if (!(email.value.includes('@'))) {
        error = "Email của bạn không chính xác.";
        email.focus();
    } else if (password.value === '') {
        error = "Vui lòng nhập mật khẩu.";
        password.focus();
    } else if (password.value.length < 8) {
        error = "Mật khẩu của bạn phải có ít nhất 8 kí tự.";
        password.focus();
    } else if (!checkPassword(password.value)) {
        error = "Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.";
        password.focus();
    } else if (repassword.value === '') {
        error = "Vui lòng nhập lại mật khẩu.";
        repassword.focus();
    } else if (password.value !== repassword.value) {
        error = "Mật khẩu nhập lại không khớp.";
        repassword.focus();
    } else if (birthday.value === '') {
        error = "Vui lòng nhập ngày tháng năm sinh.";
        birthday.focus();
    } else if (!checkAge(birthday.value, 18)) {
        error = "Bạn phải đủ 18 tuổi để được đăng kí tài khoản khách hàng.";
        birthday.focus();
    } else if (!checkPhoneNumber(phonenumber.value)) {
        error = "Số điện thoại chỉ chứa kí tự số.";
        phonenumber.focus();
    } else if (phonenumber.value.length !== 10) {
        error = "Số điện thoại phải có 10 chữ số.";
        phonenumber.focus();
    } else if (!checkbox.checked) {
        error = "Vui lòng xác nhận thông tin.";
        checkbox.focus();
    }

    if (error !== '') {
        e.preventDefault(); //ngăn submit khi có lỗi
        document.getElementById('errorMgs').innerHTML = error;
    } else {
        document.getElementById('errorMgs').innerHTML = '';
    }
});

const hideError = () => {
    document.getElementById('errorMgs').innerHTML = '';
};

document.forms[0]['fullname'].addEventListener('input', hideError);
document.forms[0]['email'].addEventListener('input', hideError);
document.forms[0]['password'].addEventListener('input', hideError);
document.forms[0]['birthday'].addEventListener('input', hideError);
document.forms[0]['phone-number'].addEventListener('input', hideError);
document.forms[0]['check'].addEventListener('input', hideError);

function checkAge(date, minAge) {
    const birthday = new Date(date);
    const today = new Date();
    let age = today.getFullYear() - birthday.getFullYear();
    const monthDiff = today.getMonth() - birthday.getMonth();
    const dayDiff = today.getDate() - birthday.getDate();

    if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
        age--;
    }

    return age >= minAge;
}

function checkPassword(password) {
    const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return regex.test(password);
}

function checkPhoneNumber(phone) {
    const regex = /^\d+$/;
    return regex.test(phone);
}
