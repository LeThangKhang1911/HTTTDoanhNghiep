<?php 
    session_start();
    require_once './createOTP.php';
    require_once '../sendmail/sendmail.php';
    if(isset($_SESSION['otp'])){
        unset($_SESSION['otp']);
    }
    $otp = OTP_session();
    if ($_SESSION['status'] == 'login') {
        $email = $_SESSION['user-login']['email'];
    }
    else if ($_SESSION['status'] == 'signup'){
        $email = $_SESSION['user-signup']['email'];
    }
    emailOTP($email, 'resend',$otp);
    header('location: verify.php');
?>