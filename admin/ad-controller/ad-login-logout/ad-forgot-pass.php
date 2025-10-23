<?php
    // Hàm tạo mật khẩu ngẫu nhiên
    function generateRandomPassword($length = 8) {
        $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lower = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $special = '!@#$%^&*()-_=+[]{}<>?';
        // Đảm bảo có ít nhất 1 ký tự từ mỗi nhóm
        $password = '';
        $password .= $upper[random_int(0, strlen($upper) - 1)];
        $password .= $lower[random_int(0, strlen($lower) - 1)];
        $password .= $numbers[random_int(0, strlen($numbers) - 1)];
        $password .= $special[random_int(0, strlen($special) - 1)];
        // Ghép các nhóm lại và trộn ngẫu nhiên
        $all = $upper . $lower . $numbers . $special;
        for ($i = 4; $i < $length; $i++) {
            $password .= $all[random_int(0, strlen($all) - 1)];
        }
        // Trộn chuỗi để không theo thứ tự cố định
        return str_shuffle($password);
    }
    require_once '../../ad-model/AdminManagement/get_admin.php';
    require_once '../../../controller/sendmail/sendmail.php';
    echo '<script src="../../../view/layout/js/show_alert.js"></script>';
    if(isset($_POST['btn-ad-forgot'])){
        $email = $_POST['email'];
        $admin = get_admin_by_email($email);
        if($admin > 0){
            $new_pass = generateRandomPassword();
            update_pass_admin($email, $new_pass);
            send_ForgotPass($email, $new_pass);
            header('location: ../../../view/login-admin.php');
        }
        else {
            echo "<script>showAlert('Tài khoản không tồn tại.', 'warning', 5000);</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../view/layout/css/forgot_pass.css">
    <link rel="shortcut icon" href="../../../view/layout/image/favicon-32x32-login.png" type="image/x-icon">
    <title>Quên mật khẩu</title>
</head>
<body>
    <form class="form-container" method="POST" action="ad-forgot-pass.php">
        <h2>Quên mật khẩu</h2>
        <input type="email" name="email" placeholder="Nhập email của bạn" required>
        <button type="submit" name="btn-ad-forgot">Gửi liên kết mật khẩu</button>
        <p class="login-link">
            <a href="../../../view/login-admin.php">Quay lại đăng nhập</a>
        </p>
    </form>

</body>
</html>