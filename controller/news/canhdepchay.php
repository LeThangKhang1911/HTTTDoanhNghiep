<?php
    require_once __DIR__.'/../../model/news/get_canhdep.php';
    // hiện cảnh đẹp chạy với chỉ số bắt đầu và kết thúc của mảng
    function show_canhdep($list){
        $html = '';
        $chunks = array_chunk($list, 4); // chia mảng thành từng nhóm 4 ảnh

        foreach($chunks as $index => $chunk){
            $active = ($index == 0) ? 'active' : '';
            $interval = ($index == 0) ? 4000 : 3000;
    
            $html .= '<div class="carousel-item '.$active.'" data-bs-interval="'.$interval.'">';
            $html .= '<div class="row">';
    
            foreach($chunk as $canhdep){
                $html .= '<div class="image-container w-25">
                            <img src="upload/image/canhdepchay/'.$canhdep['image'].'" alt="" class="w-100 product-card-img">
                            <p class="text-overlay" style="color: white;">'.$canhdep['name'].'</p>
                          </div>';
            }
    
            $html .= '</div></div>';
        }
    
        return $html;
    }
    
?>
