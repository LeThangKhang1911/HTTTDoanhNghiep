<?php
    require_once '../../model/menu/get_slides.php';
    // Đưa dữ liệu từ php sang js để hiển thị 
    $images = get_images();
    $img = array_column($images, 'image');
    if (empty($img)) {
        $img = [];
    }
    echo json_encode($img); // Trả về dữ liệu JSON
?>