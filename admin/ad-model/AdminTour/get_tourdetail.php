<?php
require_once __DIR__.'/../../../model/pdo.php';

// Lấy chi tiết tour theo tour ID
function get_chitiettour_by_tourid($tourid) {
    $sql = "SELECT * FROM chitiettour WHERE tourid = ?";
    return pdo_query_one($sql, $tourid);
}

// Thêm chi tiết tour
function add_chitiettour($tourid, $mota1, $image1, $image2, $image3) {
    $sql = "INSERT INTO chitiettour (tourid, mota1, image1, image2, image3) VALUES (?, ?, ?, ?, ?)";
    return pdo_execute_return_id($sql, $tourid, $mota1, $image1, $image2, $image3);
}

// Cập nhật chi tiết tour
function update_chitiettour($id, $mota1, $image1, $image2, $image3) {
    $sql = "UPDATE chitiettour SET mota1 = ?, image1 = ?, image2 = ?, image3 = ? WHERE id = ?";
    pdo_execute($sql, $mota1, $image1, $image2, $image3, $id);
}

// Lấy lịch trình tour theo tour ID
function get_lichtrinhtour_by_tourid($tourid) {
    $sql = "SELECT * FROM lichtrinhtour WHERE tourid = ?";
    return pdo_query_one($sql, $tourid);
}

// Thêm lịch trình tour
function add_lichtrinhtour($tourid, $Ngay1, $Ngay2, $Ngay3, $Ngay4, $Ngay5, $Ngay6) {
    $sql = "INSERT INTO lichtrinhtour (tourid, Ngay1, Ngay2, Ngay3, Ngay4, Ngay5, Ngay6) VALUES (?, ?, ?, ?, ?, ?, ?)";
    return pdo_execute_return_id($sql, $tourid, $Ngay1, $Ngay2, $Ngay3, $Ngay4, $Ngay5, $Ngay6);
}

// Cập nhật lịch trình tour
function update_lichtrinhtour($id, $Ngay1, $Ngay2, $Ngay3, $Ngay4, $Ngay5, $Ngay6) {
    $sql = "UPDATE lichtrinhtour SET Ngay1 = ?, Ngay2 = ?, Ngay3 = ?, Ngay4 = ?, Ngay5 = ?, Ngay6 = ? WHERE id = ?";
    pdo_execute($sql, $Ngay1, $Ngay2, $Ngay3, $Ngay4, $Ngay5, $Ngay6, $id);
}

// Lấy bình luận theo tour ID
function get_comments_by_tourid($tourid) {
    $sql = "SELECT c.*, u.fullname FROM comment c JOIN user u ON c.userid = u.userid WHERE c.tourid = ? ORDER BY c.datecomment DESC";
    return pdo_query($sql, $tourid);
}
function delete_comment($comment_id, $tourid) {
    $sql = "DELETE FROM comment WHERE id = ? AND tourid = ?";
    pdo_execute($sql, $comment_id, $tourid);
}
?>