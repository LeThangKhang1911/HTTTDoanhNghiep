<?php
session_start(); // Bắt đầu session
require_once __DIR__ . '/../../ad-model/AdminTour/get_tour.php';
require_once __DIR__ . '/../../ad-model/AdminManagement/get_dieuchinh.php';

// Kiểm tra xem id có tồn tại và là số hợp lệ
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['alert'] = [
        'message' => 'ID không hợp lệ!',
        'type' => 'error'
    ];
    header('location: ../../index-admin.php?pg=tour');
    exit;
}

$id = (int)$_GET['id'];
add_dieuchinhtour($id, $_SESSION['admin']['adid'], "Xóa");
// Xóa tour
delete_tour_by_id($id);
$_SESSION['alert'] = [
    'message' => 'Xóa tour thành công!',
    'type' => 'success'
];

header('location: ../../index-admin.php?pg=tour');
exit;
