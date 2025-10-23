document.addEventListener('DOMContentLoaded', function() {
    const toggleSwitch = document.getElementById('toggle-2fa');
    
    toggleSwitch.addEventListener('change', function() {
        const isChecked = this.checked;
        
        // Tạo FormData để gửi dữ liệu
        const formData = new FormData();
        formData.append('2fa', isChecked ? '1' : '0');
        
        // Gửi yêu cầu AJAX
        fetch('controller/user/control-2fa.php', {
            method: 'POST',
            body: formData,
            credentials: 'same-origin' // Để giữ phiên đăng nhập
        })
        .catch(error => {
            console.error('Lỗi:', error);
            // Khôi phục trạng thái ban đầu nếu có lỗi
            this.checked = !isChecked;
        });
    });
});