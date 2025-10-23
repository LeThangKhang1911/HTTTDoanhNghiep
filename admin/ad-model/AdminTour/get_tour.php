<?php
require_once __DIR__.'/../../../model/pdo.php';

// Lấy tất cả tour
function get_all_tours() {
    $sql = "SELECT id, name, price, hide FROM tour ORDER BY ordered ASC";
    return pdo_query($sql);
}

// Lấy tour theo ID
function get_tour_by_id($id) {
    $sql = "SELECT id, name, price, price_sale, sale_percent, image, vehicle, khoihanh, thoigian, diemkhoihanh, description, hide, ordered, meta, categoryid, phanhang FROM tour WHERE id = ?";
    return pdo_query_one($sql, $id);
}

// Thêm tour
function add_tour($name, $price, $price_sale, $sale_percent, $image, $vehicle, $khoihanh, $thoigian, $diemkhoihanh, $description, $hide, $ordered, $meta, $categoryid, $phanhang) {
    $sql = "INSERT INTO tour (name, price, price_sale, sale_percent, image, vehicle, khoihanh, thoigian, diemkhoihanh, description, hide, ordered, meta, categoryid, phanhang) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    return pdo_execute_return_id($sql, $name, $price, $price_sale, $sale_percent, $image, $vehicle, $khoihanh, $thoigian, $diemkhoihanh, $description, $hide, $ordered, $meta, $categoryid, $phanhang);
}

// Cập nhật tour
function update_tour($id, $name, $price, $price_sale, $sale_percent, $image, $vehicle, $khoihanh, $thoigian, $diemkhoihanh, $description, $hide, $ordered, $meta, $categoryid, $phanhang) {
    $sql = "UPDATE tour SET name = ?, price = ?, price_sale = ?, sale_percent = ?, image = ?, vehicle = ?, khoihanh = ?, thoigian = ?, diemkhoihanh = ?, description = ?, hide = ?, ordered = ?, meta = ?, categoryid = ?, phanhang = ? WHERE id = ?";
    pdo_execute($sql, $name, $price, $price_sale, $sale_percent, $image, $vehicle, $khoihanh, $thoigian, $diemkhoihanh, $description, $hide, $ordered, $meta, $categoryid, $phanhang, $id);
}

// Xóa tour
function delete_tour_by_id($id) {
    $sql = "DELETE FROM tour WHERE id = ?";
    pdo_execute($sql, $id);
}
?>