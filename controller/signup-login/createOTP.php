<?php 
    function OTP_session(){
        $otp = random_int(100000, 999999);
    
        // Lưu vào session kèm thời gian tạo
        $_SESSION['otp'] = [
            'code' => password_hash($otp, PASSWORD_DEFAULT), // Mã hóa OTP
            'created_at' => time() // Lưu thời gian tạo
        ];
        return $otp;
    }
    function is_session_expired($session_key, $timeout_seconds) {
        // Kiểm tra session key có tồn tại và có timestamp 'created_at' không
        if (!isset($_SESSION[$session_key]['created_at'])) {
            return true; // Không có session hoặc thiếu created_at → xem như hết hạn
        }
        // So sánh thời gian hiện tại với thời gian tạo
        if (time() - $_SESSION[$session_key]['created_at'] > $timeout_seconds) {
            return true; // Hết hạn
        }
        return false; // Còn hạn
    }
?>