<?php
    session_start();
    require_once '../../ad-model/AdminXuhuong/get_xuhuong.php';
    require_once __DIR__.'/../../ad-model/AdminManagement/get_dieuchinh.php';
    $id = $_GET['id'];
    add_dieuchinhnews($id, $_SESSION['admin']['adid'], "Xóa");
    delete_news_by_id($id);
    $_SESSION['alert'] = [
        'message' => 'Xóa tin tức khoản thành công',
        'type' => 'warning'
    ];
    header('location: ../../index-admin.php?pg=news');
    exit();
?>