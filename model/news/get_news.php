<?php
    require_once __DIR__.'/../pdo.php';
    // Hàm lấy tin tức theo id
    function get_news_id($id){
        $sql = "SELECT * FROM news WHERE hide = 0 AND id = $id";
        return pdo_query($sql);
    }
    // Hàm lấy tin tức mới nhất theo id
    function get_news($limi){
        $sql = "SELECT * FROM news WHERE hide = 0 ORDER BY id desc limit ".$limi;
        return pdo_query($sql);
    }
    // Hàm lấy tin tức theo ẩm thực
    function get_news_amthuc($limi){
        $sql = "SELECT * FROM news WHERE hide = 0 AND meta LIKE '%Amthuc%' LIMIT " . $limi;
        return pdo_query($sql);
    }
    // Hàm lấy tin tức theo kinh nghiệm
    function get_news_kinhnghiem($limi){
        $sql = "SELECT * FROM news WHERE hide = 0 AND meta LIKE '%Kinhnghiem%' LIMIT " . $limi;
        return pdo_query($sql);
    }
    // Hàm lấy tất cả tin tức
    function get_news_all($limi){
        $sql = "SELECT * FROM news WHERE hide = 0 LIMIT " . $limi;
        return pdo_query($sql);
    }

    // lấy tất cả dữ liệu(dùng cho admin)
    function get_news_all_admin(){
        $sql = "SELECT * FROM news";
        return pdo_query($sql);
    }
?>