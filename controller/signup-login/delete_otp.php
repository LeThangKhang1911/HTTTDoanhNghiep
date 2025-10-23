<?php
    session_start();
    if (isset($_SESSION['otp'])) {
        unset($_SESSION['otp']); // Xóa OTP khỏi session
    }
?>