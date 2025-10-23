<?php
    require_once __DIR__ . '/../pdo.php';

    // lấy dữ liệu menu từ database
    function getMenu() {
        $sql = "SELECT * FROM menu where hide=0 ORDER BY `ordered` asc";
        return pdo_query($sql);
    }

    // lấy tất cả dữ liệu(dùng cho admin)
    function getMenuAll(){
        $sql = "SELECT * FROM menu";
        return pdo_query($sql);
    }
?>