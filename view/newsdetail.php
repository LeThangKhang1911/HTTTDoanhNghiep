
<div class="container">
    <!-- <h1 class="news-tieude">Tiêu đề</h1>
    <div id="carouselExample" class="carousel slide">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
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
    </div>
    <p class="news-content">
        Nội dung
    </p> -->
    <?php
        require_once 'controller/news/news.php';
        $news = get_news_id($_GET['newsid']);
        echo showNewsDetail($news);
    ?>
</div>

<div class="container">
    <h3 class="news-xuhuong" style="margin: 20px;">Xu hướng mới</h3>
    <div class="row d-flex justify-content-center align-items-center">
        <?php 
            $news = get_news(4);
            for ($i=0; $i < count($news); $i++) { 
                
        ?>
        <div class="col-xl-3 col-sm-6 col-12 d-flex justify-content-center align-items-center">
            <!-- <div class="card" style="width: auto; height: auto;">
                    <a href="#" class="product-img-link"><img src="../image/anam-resort-nha-trang-vietnam-23.webp" class="card-img-top product-card-img" alt="..."></a>
                    <div class="card-body">
                        <a href="#" class="tour-name"><h4 class="card-title">Du lịch</h4></a>
                        <p>15/03/2025</p>
                        <hr style="width: 40px; height: 5px; border: none; background-color: black; border-radius: 10px; margin: auto;">
                        <p style="margin: 10px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti quia veniam veritatis nihil voluptas eveniet? Totam debitis voluptates nobis corrupti magni dignissimos cupiditate, iste eius. Obcaecati soluta ratione error harum?</p>
                    </div>
            </div> -->
            <?php echo showNewsOne($news[$i]) ?>
        </div>
        <!-- <div class="col-xl-3 col-sm-6 col-12 d-flex justify-content-center align-items-center">
            <div class="card" style="width: auto; height: auto;">
                <a href="#" class="product-img-link"><img src="../image/anam-resort-nha-trang-vietnam-23.webp" class="card-img-top product-card-img" alt="..."></a>
                <div class="card-body">
                    <a href="#" class="tour-name"><h4 class="card-title">Du lịch</h4></a>
                    <p>15/03/2025</p>
                    <hr style="width: 40px; height: 5px; border: none; background-color: black; border-radius: 10px; margin: auto;">
                    <p style="margin: 10px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti quia veniam veritatis nihil voluptas eveniet? Totam debitis voluptates nobis corrupti magni dignissimos cupiditate, iste eius. Obcaecati soluta ratione error harum?</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 d-flex justify-content-center align-items-center">
            <div class="card" style="width: auto; height: auto;">
                <a href="#" class="product-img-link"><img src="../image/anam-resort-nha-trang-vietnam-23.webp" class="card-img-top product-card-img" alt="..."></a>
                    <div class="card-body">
                        <a href="#" class="tour-name"><h4 class="card-title">Du lịch</h4></a>
                        <p>15/03/2025</p>
                        <hr style="width: 40px; height: 5px; border: none; background-color: black; border-radius: 10px; margin: auto;">
                        <p style="margin: 10px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti quia veniam veritatis nihil voluptas eveniet? Totam debitis voluptates nobis corrupti magni dignissimos cupiditate, iste eius. Obcaecati soluta ratione error harum?</p>
                    </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12 d-flex justify-content-center align-items-center">
            <div class="card" style="width: auto; height: auto;">
                <a href="#" class="product-img-link"><img src="../image/anam-resort-nha-trang-vietnam-23.webp" class="card-img-top product-card-img" alt="..."></a>
                <div class="card-body">
                    <a href="#" class="tour-name"><h4 class="card-title">Du lịch</h4></a>
                    <p>15/03/2025</p>
                    <hr style="width: 40px; height: 5px; border: none; background-color: black; border-radius: 10px; margin: auto;">
                    <p style="margin: 10px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti quia veniam veritatis nihil voluptas eveniet? Totam debitis voluptates nobis corrupti magni dignissimos cupiditate, iste eius. Obcaecati soluta ratione error harum?</p>
                </div>
            </div>
        </div> -->
        <?php } ?>
    </div>
</div>
