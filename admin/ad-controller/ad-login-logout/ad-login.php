<?php
    session_start();
    require_once '../../ad-model/AdminManagement/get_admin.php';
    if(isset($_POST['btn-adlogin'])){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $admin = get_admin_by_email($email);
        if($admin==0){
            $_SESSION['alert'] = [
                'message' => 'Tài khoản không tồn tại',
                'type' => 'error'
            ];
            header('Location: ../../view/login-admin.php');
            exit();
        }
        else {
            $ad = $admin[0];
            if(password_verify($pass, $ad['password']) && $ad['hoatdong']==1){
                $_SESSION['admin'] = [
                    'adid' => $ad['id'],
                    'capbac' => $ad['hang']
                ];
                $_SESSION['alert'] = [
                    'message' => 'Đăng nhập thành công!',
                    'type' => 'success'
                ];
                header('location: ../../index-admin.php');
            }
            else {
                $_SESSION['alert'] = [
                    'message' => 'Tài khoản hoặc mật khẩu không chính xác',
                    'type' => 'warning'
                ];
                header('Location: ../../../view/login-admin.php');
                exit();
            }
        }
    }
?>