<?php
    require_once __DIR__.'/../../model/news/get_news.php';
    // Hàm hiện tin tức trong home.php, hiển thị theo danh sách 
    function showNewsHome($list){
        $html = '<div class="card" style="width: auto; height: auto;">';
        foreach($list as $new){
            $date = $new['datebegin'];
            $Datebegin = date("d/m/Y", strtotime($date));
            $seo_url = $new['meta'].'/'.$new['id'];
            $html.='<a href="'.$seo_url.'" class="product-img-link"><img src="upload/image/news/'.$new['image'].'" class="card-img-top product-card-img" alt="..."></a>
                   <div class="card-body">
                       <a href="'.$seo_url.'" class="tour-name"><h4 class="card-title">'.$new['name'].'</h4></a>
                       <p>'.$Datebegin.'</p>
                       <hr style="width: 40px; height: 5px; border: none; background-color: red; border-radius: 10px; margin: auto;">
                       <p style="margin: 10px;">'.$new['description'].'</p>
                   </div>
            ';
        }
        $html.='</div>';
        return $html;
    }
    // hàm hiện tin tức không có ảnh theo danh sách
    function showNewsHomeNoImage($list){
        $html = '<div class="card" style="width: auto; height: auto;">';
        foreach($list as $new){
            $date = $new['datebegin'];
            $Datebegin = date("d/m/Y", strtotime($date));
            $seo_url = $new['meta'].'/'.$new['id'];
            $html.='
                   <div class="card-body">
                       <a href="'.$seo_url.'" class="tour-name"><h4 class="card-title">'.$new['name'].'</h4></a>
                       <p>'.$Datebegin.'</p>
                       <hr style="width: 40px; height: 5px; border: none; background-color: red; border-radius: 10px; margin: auto;">
                       <p style="margin: 10px;">'.$new['description'].'</p>
                   </div>
            ';
        }
        $html.='</div>';
        return $html;
    }
    
    // hàm hiện chi tiết tin tức
    function showNewsDetail($news){
        $html = '';
        foreach($news as $n){
            $html .= '
                <h1 class="news-tieude" style="margin: 20px">'.$n['name'].'</h1>
                <div id="carouselExampleIndicators" class="carousel slide" style="margin: 20px">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="upload/image/news/'.$n['image'].'" class="d-block w-100" alt="..." style="height: 650px">
                        </div>
                        <div class="carousel-item">
                            <img src="upload/image/news/'.$n['image2'].'" class="d-block w-100" alt="..." style="height: 650px">
                        </div>
                        <div class="carousel-item">
                            <img src="upload/image/news/'.$n['image3'].'" class="d-block w-100" alt="..." style="height: 650px">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <p class="news-content" style="margin-top: 20px">
                    '.nl2br($n['detail']).'
                </p>
            ';
        }
        return $html;
    }

    // Hàm hiển thị 1 tin duy nhất có ảnh
    function showNewsOne($news){
        $html = '<div class="card" style="width: auto; height: auto;">';
        
        $date = $news['datebegin'];
        $Datebegin = date("d/m/Y", strtotime($date));
        $seo_url = $news['meta'].'/'.$news['id'];
        $html.='<a href="'.$seo_url.'" class="product-img-link"><img src="upload/image/news/'.$news['image'].'" class="card-img-top product-card-img" alt="..."></a>
               <div class="card-body">
                   <a href="'.$seo_url.'" class="tour-name"><h4 class="card-title">'.$news['name'].'</h4></a>
                   <p>'.$Datebegin.'</p>
                   <hr style="width: 40px; height: 5px; border: none; background-color: red; border-radius: 10px; margin: auto;">
                   <p style="margin: 10px;">'.$news['description'].'</p>
               </div>
        ';
        
        $html.='</div>';
        return $html;
    }
    // Hàm hiển thị 1 tin duy nhất không có ảnh
    function showNewsHomeNoImageOne($news){
        $html = '<div class="card" style="width: auto; height: auto;">';
            $date = $news['datebegin'];
            $Datebegin = date("d/m/Y", strtotime($date));
            $seo_url = $news['meta'].'/'.$news['id'];
            $html.='
                   <div class="card-body">
                       <a href="'.$seo_url.'" class="tour-name"><h4 class="card-title">'.$news['name'].'</h4></a>
                       <p>'.$Datebegin.'</p>
                       <hr style="width: 40px; height: 5px; border: none; background-color: red; border-radius: 10px; margin: auto;">
                       <p style="margin: 10px;">'.$news['description'].'</p>
                   </div>
            ';
        $html.='</div>';
        return $html;
    }
?>

