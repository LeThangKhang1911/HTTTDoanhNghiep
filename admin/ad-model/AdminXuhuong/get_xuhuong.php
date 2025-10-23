<?php
    require_once __DIR__.'/../../../model/pdo.php';
    // Hàm lấy tất cả tin tức
    function get_all_news(){
        $sql = "SELECT * FROM news";
        return pdo_query($sql);
    }
    // Hàm lấy tin tức theo id
    function get_news_by_id($id){
        $sql = "SELECT * FROM news WHERE id = ?";
        return pdo_query($sql, $id);
    }
    // Hàm thêm tin tức
    function add_news($name, $image, $image2, $image3, $description, $detail, $meta, $hide, $ordered){
        $sql = "INSERT INTO news (name, image, image2, image3, description, detail, meta, hide, ordered)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
                ";
        return pdo_execute_return_id($sql, $name, $image, $image2, $image3, $description, $detail, $meta, $hide, $ordered);
    }
    // Hàm update tin tức theo id
    function update_news($id, $name, $image, $image2, $image3, $description, $detail, $meta, $hide, $ordered){
        $sql = "UPDATE news 
                SET name = ?, image = ?, image2 = ?, image3 = ?, 
                    description = ?, detail = ?, meta = ?, hide = ?, ordered = ?
                WHERE id = ?";
        pdo_execute($sql, $name, $image, $image2, $image3, $description, $detail, $meta, $hide, $ordered, $id);
    }
    // Hàm xóa tin tức theo id
    function delete_news_by_id($id) {
        $sql = "DELETE FROM news WHERE id = ?";
        pdo_execute($sql, $id);
    }
?>