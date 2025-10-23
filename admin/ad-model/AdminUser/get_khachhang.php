<?php
require_once __DIR__ . '/../../../model/pdo.php';

function get_all_customers() {
    $sql = "SELECT userid, fullname, email, gioitinh, ngaysinh, phone, address, 2fa, datebegin FROM user ORDER BY userid DESC";
    try {
        return pdo_query($sql);
    } catch (PDOException $e) {
        return [];
    }
}

function get_customer_by_id($id) {
    $sql = "SELECT userid, fullname, email, gioitinh, ngaysinh, phone, address, 2fa, datebegin FROM user WHERE userid = ?";
    try {
        return pdo_query_one($sql, $id);
    } catch (PDOException $e) {
        return [];
    }
}
?>