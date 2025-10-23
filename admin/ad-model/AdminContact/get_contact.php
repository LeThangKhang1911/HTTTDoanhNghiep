<?php
    require_once __DIR__.'/../../../model/pdo.php';
    // hàm lấy liên hệ
    function get_feedback(){
        $sql = "SELECT * FROM customerfeedback";
        return pdo_query($sql);
    }
?>