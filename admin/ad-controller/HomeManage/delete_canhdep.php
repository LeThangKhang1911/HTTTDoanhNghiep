<?php
    session_start();
    require_once '../../ad-model/AdminHome/get_canhdep.php';
    $id = $_GET['id'];
    delete_canhdep_by_id($id);
    $_SESSION['alert'] = [
        'message' => 'Xóa ảnh thành công',
        'type' => 'warning'
    ];
    header('location: ../../index-admin.php?pg=home');
    exit();
?>