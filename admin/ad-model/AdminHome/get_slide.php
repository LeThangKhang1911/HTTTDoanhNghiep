<?php
    require_once __DIR__.'/../../../model/pdo.php';
    // hàm lấy ảnh
    function get_slide(){
        $sql = "SELECT * FROM slide";
        return pdo_query($sql);
    }
    // hàm chèn ảnh mới
    function add_slide($name, $image, $hide, $ordered){
        $sql = "INSERT INTO slide (name, image, hide, ordered) VALUES (?, ?, ?, ?)";
        return pdo_execute_return_id($sql, $name, $image, $hide, $ordered);
    }
    // hàm lấy ảnh theo id
    function get_slide_by_id($id){
        $sql = "SELECT * FROM slide WHERE id = ?";
        return pdo_query($sql, $id);
    }
    // hàm update ảnh theo id
    function update_slide_by_id($id, $name, $image, $hide, $ordered){
        $sql = "UPDATE slide SET name = ?, image = ?, hide = ?, ordered = ? WHERE id = ?";
        pdo_execute($sql, $name, $image, $hide, $ordered, $id);
    }
    // hàm xóa slide theo id 
    function delete_slide_by_id($id){
        $sql = "DELETE FROM slide WHERE id = ?";
        pdo_execute($sql, $id);
    }
?>