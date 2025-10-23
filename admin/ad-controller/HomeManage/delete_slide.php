<?php
    session_start();
    require_once '../../ad-model/AdminHome/get_slide.php';
    require_once __DIR__.'/../../ad-model/AdminManagement/get_dieuchinh.php';
    $id = $_GET['id'];
    add_dieuchinhslide($id, $_SESSION['admin']['adid'], "Xóa");
    delete_slide_by_id($id);
    $_SESSION['alert'] = [
        'message' => 'Xóa ảnh thành công',
        'type' => 'warning'
    ];
    header('location: ../../index-admin.php?pg=home');
    exit();
?>