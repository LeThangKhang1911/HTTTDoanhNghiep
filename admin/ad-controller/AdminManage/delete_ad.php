<?php
    session_start();
    require_once '../../ad-model/AdminManagement/get_admin.php';
    $id = $_GET['idad'];
    delete_admin_by_id($id);
    $_SESSION['alert'] = [
        'message' => 'Xóa tài khoản thành công',
        'type' => 'warning'
    ];
    header('location: ../../index-admin.php?pg=admin');
    exit();
?>