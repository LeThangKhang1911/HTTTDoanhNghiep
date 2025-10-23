<?php
require_once __DIR__ . '/../../../model/pdo.php';
session_start();

$bookingid = $_GET['bookingid'] ?? 0;
$customerid = $_GET['customerid'] ?? 0;

if ($bookingid > 0 && $customerid > 0) {
    $sql = "UPDATE booktour SET status = 1 WHERE id = ? AND userid = ?";
    try {
        pdo_execute($sql, $bookingid, $customerid);
        $_SESSION['alert'] = ["type" => "success", "message" => "Hủy tour thành công!"];
    } catch (PDOException $e) {
        $_SESSION['alert'] = ["type" => "error", "message" => "Lỗi khi hủy tour: " . $e->getMessage()];
    }
} else {
    $_SESSION['alert'] = ["type" => "error", "message" => "Dữ liệu không hợp lệ."];
}

header("Location: ../../index-admin.php?pg=userdetail&id=" . $customerid);
exit();
?>