// Hàm định dạng thời gian
function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const secs = seconds % 60;
    return `${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
}

// Khởi tạo bộ đếm ngược
let timeLeft = 180; // 3 phút
const timerElement = document.getElementById('timer');
let countdown;

function startCountdown() {
    if (countdown) {
        clearInterval(countdown);
    }
    countdown = setInterval(() => {
        timerElement.textContent = formatTime(timeLeft);
        timeLeft--;
        if (timeLeft < 0) {
            clearInterval(countdown);
            alert('Mã OTP đã hết hạn! Vui lòng yêu cầu mã mới.');
            // Gọi PHP để xóa token
            fetch('../../../controller/signup-login/delete_otp.php')
                .then(response => response.text())
                .then(data => {
                    console.log('Kết quả xóa token:', data);
                    history.back(); // Quay lại trang trước
                })
                .catch(error => {
                    console.error('Lỗi khi gọi API xóa token:', error);
                    history.back(); // Dù lỗi vẫn quay lại
                });
        }
    }, 1000);
}

// Bắt đầu đếm ngược
startCountdown();

// Kiểm tra trạng thái gửi lại email từ URL
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.get('resend') === 'success') {
    alert('Gửi mail thành công!');
    timeLeft = 180; // Đặt lại bộ đếm
    startCountdown();
    // Xóa tham số resend khỏi URL để tránh lặp lại thông báo
    window.history.replaceState({}, document.title, 'verify.php');
} else if (urlParams.get('resend') === 'failed') {
    alert('Gửi mail lỗi.');
    window.history.replaceState({}, document.title, 'verify.php');
}