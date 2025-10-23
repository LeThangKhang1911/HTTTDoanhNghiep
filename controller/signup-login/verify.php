<?php
    session_start();
    require_once __DIR__.'/../../model/pdo.php';
    require_once './createOTP.php';
    require_once '../sendmail/sendmail.php';
    require_once __DIR__.'/../../model/user/get_user.php';
    echo '<script src="../../view/layout/js/show_alert.js"></script>';
    /**
     * Hàm xử lý xác thực OTP cho các trường hợp khác nhau
     * $type Loại xác thực: 'forgotpass', 'signup', 'login', 'resetpass'
     * $success_url URL chuyển hướng khi xác thực thành công
     * $fail_url URL chuyển hướng khi xác thực thất bại hoặc token hết hạn
     * $resend_path Đường dẫn gửi lại email OTP
     * $success_message Thông báo khi xác thực thành công
    */
    function verifyOTP($type, $success_url, $fail_url, $resend_path, $success_message){
        if (isset($_POST['btn-verify'])) {
    
            // Kiểm tra session chứa mã OTP
            if (!isset($_SESSION['otp'])) {
                echo "<script>
                        showAlert('Không tìm thấy mã OTP. Vui lòng nhấp vào gửi lại.', 'error', 3000); 
                    </script>";
                return;
            }
    
            // Kiểm tra OTP có bị hết hạn không
            if (is_session_expired('otp', 180)) {
                unset($_SESSION['otp']); // Xóa luôn session nếu hết hạn
                echo "<script>
                        showAlert('Mã OTP đã hết hạn', 'error', 5000); 
                        setTimeout(() => {
                            history.go(-2);
                        }, 4900);
                    </script>";
                return;
            }
    
            // Kiểm tra người dùng đã nhập mã OTP chưa
            if (empty($_POST['otp'])) {
                echo "<script>showAlert('Vui lòng nhập mã OTP', 'warning', 3000);</script>";
                return;
            }
    
            // Xác minh OTP
            if (password_verify($_POST['otp'], $_SESSION['otp']['code'])) {
                unset($_SESSION['otp']); // Xác minh thành công thì xóa OTP luôn
    
                switch ($type) {
                    case 'signup':
                        $sql = "INSERT INTO user(fullname, email, password, gioitinh, ngaysinh, phone, address) VALUES (?,?,?,?,?,?,?)";
                        pdo_execute(
                            $sql,
                            $_SESSION['user-signup']['fullname'],
                            $_SESSION['user-signup']['email'],
                            $_SESSION['user-signup']['password'],
                            $_SESSION['user-signup']['gioitinh'],
                            $_SESSION['user-signup']['ngaysinh'],
                            $_SESSION['user-signup']['sodienthoai'],
                            $_SESSION['user-signup']['diachi']
                        );
    
                        // Gửi mail và thông báo thành công
                        send_SuccessMail($_SESSION['user-signup']['email']);
                        unset($_SESSION['user-signup']); // xóa session sau khi đăng ký
                        echo "<script>showAlert('$success_message', 'success', 2000); 
                            setTimeout(() => {
                                window.location.href = '$success_url';
                            }, 1000);
                        </script>";
                        break;
                    case 'login':
                        $user_list = get_user_by_email($_SESSION['user-login']['email']);
                        $user = $user_list[0];
                        $_SESSION['user'] = $user['userid'];
                        unset($_SESSION['user-login']);
                        echo "<script>showAlert('$success_message', 'success', 2000); 
                            setTimeout(() => {
                                window.location.href = '$success_url';
                            }, 1000);
                        </script>";
                        break;
                    default:
                        echo "<script>showAlert('Loại xác minh không hợp lệ', 'error', 2000); 
                            setTimeout(() => {
                                window.location.href = '$fail_url';
                            }, 1200);
                        </script>";
                        break;
                }
    
            } 
            else {
                echo "<script>showAlert('Mã OTP không chính xác', 'warning', 5000);</script>";
            }
        }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../view/layout/css/verify.css">
    <title>Xác thực OTP</title>
    <link rel="shortcut icon" href="../../view/layout/image/favicon-32x32-login.png" type="image/x-icon">
</head>
<body>
    <form action="verify.php" method="post">
        <h3>Xác thực OTP</h3>
        <label for="otp">Nhập mã OTP</label>
        <input type="number" name="otp" id="otp" required>
        <button type="submit" name="btn-verify">Xác thực</button>
        <p>Bạn chưa nhận được mail xác nhận?
            <a href="../signup-login/resendmail.php">Gửi lại</a>
        </p>
        <p>Thời gian còn lại: <span id="timer">03:00</span></p>

        
    </form>
    <script src="../../view/layout/js/timer-verify.js"></script>
</body>
</html>



<?php
    $type = isset($_SESSION['status']) ? $_SESSION['status'] : ''; 
    switch ($type) {
        case 'signup':
            verifyOTP(
                'signup',
                '../../view/login-user.php',
                '../../view/signup.php',
                'verify.php',
                'Đăng kí tài khoản thành công!',
            );
            break;
        case 'login':
            verifyOTP(
                'login',
                '../../index.php?pg=account',
                '../../view/login-user.php',
                'verify.php',
                'Đăng nhập tài khoản thành công!'
            );
            break;
        default:
            echo "<script>alert('Loại xác thực không hợp lệ.'); window.location.href='index.php';</script>";
            break;
    }
?>