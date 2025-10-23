<?php
    require_once __DIR__.'/../../model/tour/get_tour.php';

    // Hàm hiển thị các tour
    function showTour($list){
        foreach($list as $tour){
            if(check_tour_hide($tour['id'])){
                continue;
            }
    
            $imgPath = 'upload/image/tour/' . $tour['image']; 
            $seo_url = 'tour/'.$tour['meta'].'/'.$tour['id'].'/'.$tour['categoryid'];
            echo '<div class="col-xl-3 col-sm-6 col-12 d-flex justify-content-center align-items-center">';
            echo '<div class="card" style="width: auto;">';
            // echo '<a href="index.php?'.'pg=detail&tourid=' . $tour['id'] . '&categoryid='.$tour['categoryid'].'" class="product-img-link">';
            echo '<a href="'.$seo_url.'" class="product-img-link">';
            echo '<img src="' . $imgPath . '" class="card-img-top product-card-img" alt="...">';
            echo '</a>';
    
            echo '<div class="card-body">';
            if ($tour['sale_percent'] != 0) {
                echo '<span class="discount-badge">- ' . $tour['sale_percent'] . '%</span>';
            }
    
            // echo '<a href="index.php?pg=detail&tourid=' . $tour['id'] . '&categoryid='.$tour['categoryid'].'" class="tour-name"><h4 class="card-title">'. $tour['name'] .'</h4></a>';
            echo '<a href="'.$seo_url.'" class="tour-name"><h4 class="card-title">'. $tour['name'] .'</h4></a>';
            echo '<div class="d-flex">';
            echo '<span class="price">' . number_format(
                $tour['sale_percent'] != 0 ? $tour['price_sale'] : $tour['price'],
                0, ',', '.') . 'đ</span>';
    
            echo '<div class="vehicle">';
            if ($tour['vehicle'] == 1) {
                echo '<i class="bi bi-bus-front-fill"></i>';
            } elseif ($tour['vehicle'] == 2) {
                echo '<i class="bi bi-bus-front-fill"></i> <i class="bi bi-airplane-fill"></i>';
            } elseif ($tour['vehicle'] == 3) {
                echo '<i class="bi bi-bus-front-fill"></i> <i class="bi bi-airplane-fill"></i> <i class="bi bi-train-front-fill"></i>';
            }
            echo '</div>'; 
    
            echo '</div>'; 
    
            if ($tour['sale_percent'] != 0) {
                echo '<p class="old-price">' . number_format($tour['price'], 0, ',', '.') . 'đ</p>';
            }
    
            echo '<div class="d-flex justify-content-between">';
            echo '<span class="icon-text"><i class="bi bi-calendar3"></i> Khởi hành: '. $tour['khoihanh'] .'</span>';
            echo '</div>';
    
            echo '<div class="d-flex justify-content-between mt-2">';
            echo '<span class="icon-text"><i class="bi bi-clock"></i> Thời gian: '. $tour['thoigian'] .'</span>';
            echo '</div>';
    
            echo '</div>'; // card-body
            echo '</div>'; // card
            echo '</div>'; // col
        }
    }
    

?>