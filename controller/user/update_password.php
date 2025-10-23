<?php
    session_start();
    require_once __DIR__.'/../../model/user/get_user.php';
    if(!isset($_SESSION['user'])){
        header('location: ../../view/login-user.php');
        exit();
    }
    if(isset($_POST['change_password'])){
        $curpass = $_POST['currentPassword'];
        $newpass = $_POST['newPassword'];
        $user_list = get_user_by_id($_SESSION['user']);
        $user = $user_list[0];
        if(password_verify($curpass, $user['password'])){
            $pass = password_hash($newpass, PASSWORD_BCRYPT);
            update_pass($_SESSION['user'], $pass);
            $_SESSION['alert'] = [
                'message' => 'Đổi mật khẩu thành công! Vui lòng đăng nhập lại.',
                'type' => 'warning'
            ];
            unset($_SESSION['user']);
            header('location: ../../view/login-user.php');
        }
        else {
            $_SESSION['alert'] = [
                'message' => 'Mật khẩu hiện tại không chính xác!Không thể thay đổi mật khẩu',
                'type' => 'error'
            ];
            header('location: ../../index.php?pg=account');
        }
    }
?>