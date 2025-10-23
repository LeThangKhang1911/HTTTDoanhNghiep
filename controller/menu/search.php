<?php
    require_once __DIR__ . '/../../model/tour/get_tour.php';

    if (isset($_POST['btn-search'])) {
        $destination = trim($_POST['location']); 
        if (!empty($destination)) {
            $des = removeTone($destination);
            $formatted_destination = str_replace(' ', '-', strtolower($des));
            header("Location: ../../index.php?pg=Tour&name=" . urlencode($formatted_destination));
            exit();
        } else {
            header("Location: ../../index.php?pg=Tour");
            exit();
        }
    }
    // hàm xóa dấu Tiếng Việt
    function removeTone($str) {
        $str = preg_replace([
            "/[àáạảãâầấậẩẫăằắặẳẵ]/u", "/[èéẹẻẽêềếệểễ]/u",
            "/[ìíịỉĩ]/u", "/[òóọỏõôồốộổỗơờớợởỡ]/u",
            "/[ùúụủũưừứựửữ]/u", "/[ỳýỵỷỹ]/u",
            "/[đ]/u", "/[ÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴ]/u",
            "/[ÈÉẸẺẼÊỀẾỆỂỄ]/u", "/[ÌÍỊỈĨ]/u",
            "/[ÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠ]/u", "/[ÙÚỤỦŨƯỪỨỰỬỮ]/u",
            "/[ỲÝỴỶỸ]/u", "/[Đ]/u"
        ], [
            "a", "e", "i", "o", "u", "y", "d",
            "A", "E", "I", "O", "U", "Y", "D"
        ], $str);
        return $str;
    }
?>