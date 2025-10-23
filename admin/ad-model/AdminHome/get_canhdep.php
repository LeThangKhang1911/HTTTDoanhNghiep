<?php
    require_once __DIR__.'/../../../model/pdo.php';
    // hàm lấy cảnh đẹp
    function get_canhdep(){
        $sql = "SELECT * FROM canhdep";
        return pdo_query($sql);
    }

    // hàm lấy cảnh đẹp theo id
    function get_canhdep_by_id($id){
        $sql = "SELECT * FROM canhdep WHERE id = ?";
        return pdo_query($sql, $id);
    }

    // hàm thêm cảnh đẹp
    function add_canhdep($name, $image, $hide){
        $sql = "INSERT INTO canhdep (name, image, hide) VALUES (?, ?, ?)";
        pdo_execute($sql, $name, $image, $hide);
    }

    // hàm update cảnh đẹp theo id
    function update_canhdep_by_id($id, $name, $image, $hide){
        $sql = "UPDATE canhdep SET name = ?, image = ?, hide = ? WHERE id = ?";
        pdo_execute($sql, $name, $image, $hide, $id);
    }

    // hàm xóa cảnh đẹp theo id
    function delete_canhdep_by_id($id){
        $sql = "DELETE FROM canhdep WHERE id = ?";
        pdo_execute($sql, $id);
    }
?>