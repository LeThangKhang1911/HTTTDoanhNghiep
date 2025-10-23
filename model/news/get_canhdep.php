<?php
    require_once __DIR__.'/../pdo.php';
    // lấy cảnh đẹp
    function get_canhdep($limi){
        $sql = "SELECT * FROM canhdep WHERE hide = 0 LIMIT ".$limi;
        return pdo_query($sql);
    }

    // lấy tất cả dữ liệu(dùng cho admin)
    function get_canhdep_all(){
        $sql = "SELECT * FROM canhdep";
        return pdo_query($sql);
    }
?>


