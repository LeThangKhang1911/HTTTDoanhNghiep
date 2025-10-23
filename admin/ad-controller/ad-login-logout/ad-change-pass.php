<?php
    session_start();
    require_once '../../ad-model/AdminManagement/get_admin.php';
    if(isset($_POST['btn-changepass'])){
        $curPass = $_POST['current_password'];
        $newPass = $_POST['new_password'];
        $confirmPass = $_POST['confirm_password'];
        $adid = $_SESSION['admin']['adid'];
        $admin = get_admin_by_id($adid);
        if (count($admin)>0) {
            $ad = $admin[0];
            if(password_verify($curPass, $ad['password'])){
                if ($newPass === $confirmPass) {
                    update_pass_admin($ad['email'], $newPass);
                    $_SESSION['alert'] = [
                        'message' => 'Đổi mật khẩu thành công! Vui lòng đăng nhập lại',
                        'type' => 'success'
                    ];
                    header('location: ../../../view/login-admin.php');
                    exit();
                }   
                else {
                    $_SESSION['alert'] = [
                        'message' => 'Mật khẩu mới và xác nhận mật khẩu không khớp!',
                        'type' => 'error'
                    ];
                    header('location: ../../index-admin.php?pg=adAccount');
                    exit();
                }
            }
            else {
                $_SESSION['alert'] = [
                    'message' => 'Mật khẩu hiện tại không chính xác!',
                    'type' => 'error'
                ];
                header('location: ../../index-admin.php?pg=adAccount');
                exit();
            }
        }
        else {
            $_SESSION['alert'] = [
                'message' => 'Không tìm thấy thông tin admin',
                'type' => 'error'
            ];
            header('location: ../../index-admin.php?pg=adAccount');
            exit();
        }

    }
    else {
        $_SESSION['alert'] = [
            'message' => 'Đã xảy ra lỗi!',
            'type' => 'error'
        ];
        header('location: ../../index-admin.php?pg=adAccount');
        exit();
    }
?>