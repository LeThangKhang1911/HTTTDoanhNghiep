<script src="../../view/layout/js/show_alert.js"></script>
<?php
    session_start();
    require_once __DIR__.'/../../model/user/get_user.php';
    require_once '../sendmail/sendmail.php';
    require_once '../signup-login/createOTP.php';
    if(isset($_POST['btn-login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user_list = get_user_by_email($email);
        if($user_list == 0){
            $_SESSION['alert'] = [
                'message' => 'Tài khoản không tồn tại',
                'type' => 'error'
            ];
            header('Location: ../../view/login-user.php');
            exit();
        }
        else {
            $user = $user_list[0];
            if(password_verify($password ,$user['password'])){
                if($user['2fa']==1){
                    $_SESSION['user-login'] = [
                        'email' => $email,
                        'password' => $password
                    ];
                    $_SESSION['status'] = "login";
                    $otp = OTP_session();
                    emailOTP($email, 'login', $otp);
                    header('location: verify.php');
                }
                else {
                    $_SESSION['user'] = $user['userid'];
                    $_SESSION['alert'] = [
                        'message' => 'Đăng nhập thành công!',
                        'type' => 'success'
                    ];
                    header('location: ../../index.php?pg=account');
                }
            }
            else {
                $_SESSION['alert'] = [
                    'message' => 'Mật khẩu hoặc tên đăng nhập không chinh xác',
                    'type' => 'error'
                ];
                header('Location: ../../view/login-user.php');
                exit();
            }
        }
    }
?>