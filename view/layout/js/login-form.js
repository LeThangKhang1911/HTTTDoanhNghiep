document.getElementById('btn-login').addEventListener('click', (e) => {
    let email = document.forms[0]['email'];
    let password = document.forms[0]['password'];
    let error = '';
    
    if(email.value == '') {
        error = "Vui lòng nhập email.";
        email.focus();
    }
    else if(!(email.value.includes('@'))) {
        error = "Email của bạn không chính xác.";
        email.focus();
    }
    else if(password.value == '') {
        error = "Vui lòng nhập mật khẩu.";
        password.focus();
    }
    else if(password.value.length < 8) {
        error = "Mật khẩu của bạn phải có ít nhất 8 kí tự";
        password.focus();
    }
    
    document.getElementById('errorMgs').innerHTML = error;
    
    // Chỉ ngăn gửi form khi có lỗi
    if(error !== '') {
        e.preventDefault();
    }
});

hideError = () => {
    document.getElementById('errorMgs').innerHTML = '';
};

document.forms[0]['email'].addEventListener('input', hideError);
document.forms[0]['password'].addEventListener('input', hideError);