<script src="../../view/layout/js/show_alert.js"></script>
<?php
    session_start();
    require_once __DIR__.'/../../model/user/get_user.php';
    require_once '../sendmail/sendmail.php';
    require_once '../signup-login/createOTP.php';
    if(isset($_POST['btn-register'])){
        $ten = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $gioitinh = $_POST['gender'];
        $ngaysinh = $_POST['birthday'];
        $sodienthoai = $_POST['phone-number'];
        $diachi = $_POST['address'];
        // Kiểm tra user đã tồn tại
        $user = get_user_by_email($email);
        if(count($user)>0){
            $_SESSION['alert'] = [
                'message' => 'Tài khoản đã tồn tại',
                'type' => 'error'
            ];
            header('Location: ../../view/signup.php');
            exit();
        }
        else{
            $_SESSION['user-signup'] = [
                'fullname' => $ten,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'gioitinh' => $gioitinh,
                'ngaysinh' => $ngaysinh,
                'sodienthoai' => $sodienthoai,
                'diachi' => $diachi
            ];
            $_SESSION['status'] = "signup";
            $otp = OTP_session();
            emailOTP($email, 'register', $otp);
            header('location: verify.php');
        }
    }
?>