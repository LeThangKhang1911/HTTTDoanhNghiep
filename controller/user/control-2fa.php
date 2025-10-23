<?php
    session_start();
    require_once __DIR__.'/../../model/user/get_user.php';
    // Kiểm tra đăng nhập
    if(!isset($_SESSION['user'])){
        header('location: ../../index.php');
        exit();
    }
    
    // Nhận giá trị từ POST
    $is_2fa = isset($_POST['2fa']) ? (int)$_POST['2fa'] : 0;
    
    $user_list = get_user_by_id($_SESSION['user']);
    $user = $user_list[0];
    
    // Cập nhật trạng thái 2FA
    update_2fa($user['userid'], $is_2fa);
    
    // Báo thành công
    http_response_code(200);
    exit();
?>