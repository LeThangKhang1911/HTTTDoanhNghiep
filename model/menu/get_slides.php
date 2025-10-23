<?php
    require_once '../../model/pdo.php';
    // lấy dữ liệu slide cho banner slide ở header
    function get_images(){
        $sql = "SELECT image FROM slide where hide=0 ORDER BY `ordered` ASC LIMIT 3";
        return pdo_query($sql);
    }

    // lấy tất cả dữ liệu(dùng cho admin)
    function get_images_all(){
        $sql = "SELECT image FROM slide";
        return pdo_query($sql);
    }
?>
