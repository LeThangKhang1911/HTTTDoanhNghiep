<?php
    require_once __DIR__.'/../../../model/pdo.php';
    // Hàm insert thông tin điều chỉnh tin tức
    function add_dieuchinhnews($idnews, $adminid, $action){
        $sql = "INSERT INTO dieuchinhnews (idnews, adminid, action) VALUES (?, ?, ?)";
        pdo_execute($sql, $idnews, $adminid, $action);
    }
    // Hàm lấy các điều chỉnh tin tức
    function get_dieuchinh_news(){
        $sql = "SELECT * FROM dieuchinhnews";
        return pdo_query($sql);

    }

    // hàm lấy các điều chỉnh tour
    function get_dieuchinh_tour(){
        $sql = "SELECT * FROM dieuchinhtour";
        return pdo_query($sql);
    }
    
    // hàm thêm thông tin điều chỉnh slide
    function add_dieuchinhslide($slideid, $adminid, $action){
        $sql = "INSERT INTO dieuchinhslide (slideid, adminid, action) VALUES (?, ?, ?)";
        pdo_execute($sql, $slideid, $adminid, $action);
    }

    // hàm lấy các điều chỉnh slide
    function get_dieuchinh_slide(){
        $sql = "SELECT * FROM dieuchinhslide";
        return pdo_query($sql);
    }

    // hàm thêm điều chỉnh tour
    function add_dieuchinhtour($tourid, $adminid, $action){
        $sql = "INSERT INTO dieuchinhtour (tourid, adminid, action) VALUES (?, ?, ?)";
        pdo_execute($sql, $tourid, $adminid, $action);
    }
?> 