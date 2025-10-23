<div class="container body-index">
        <!-- Phần tiêu đề ảnh địa điểm chạy -->
        <div class="location-slide" style="margin: 20px; border-bottom: solid 5px burlywood; border-radius: 5px;">
            <p class="d-flex align-items-center justify-content-center" style="font-size: larger;">Những điểm đến tuyệt vời</p>
            <h2 class="d-flex align-items-center justify-content-center">Thiên đường hội tụ</h2>
        </div>
        <!-- Phần 1 Cảnh đẹp -->
        <section id="section1" style="margin-top: 30px;">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- <div class="carousel-item active" data-bs-interval="4000">
                        <div class="row">
                            <div class="image-container w-25">
                                <img src="view/layout/image/bg-signup.jpg" alt="" class="w-100 product-card-img">
                                <p class="text-overlay"><a href="" style="text-decoration: none; color: red;">Tour</a></p>
                            </div>
                            <div class="image-container w-25">
                                <img src="../image/anam-resort-nha-trang-vietnam-23.webp" alt="" class="w-100 product-card-img">
                                <p class="text-overlay"><a href="" style="text-decoration: none; color: red;">Tour</a></p>
                            </div>
                            <div class="image-container w-25">
                                <img src="../image/anam-resort-nha-trang-vietnam-23.webp" alt="" class="w-100 product-card-img">
                                <p class="text-overlay"><a href="" style="text-decoration: none; color: red;">Tour</a></p>
                            </div>
                            <div class="image-container w-25">
                                <img src="../image/anam-resort-nha-trang-vietnam-23.webp" alt="" class="w-100 product-card-img">
                                <p class="text-overlay"><a href="" style="text-decoration: none; color: red;">Tour</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="row">
                            <div class="image-container w-25">
                                <img src="../image/breadcrumb.png" alt="" class="w-100 product-card-img">
                                <p class="text-overlay"><a href="" style="text-decoration: none; color: red;">Tour</a></p>
                            </div>
                            <div class="image-container w-25">
                                <img src="../image/breadcrumb.png" alt="" class="w-100 product-card-img">
                                <p class="text-overlay"><a href="" style="text-decoration: none; color: red;">Tour</a></p>
                            </div>
                            <div class="image-container w-25">
                                <img src="../image/breadcrumb.png" alt="" class="w-100 product-card-img">
                                <p class="text-overlay"><a href="" style="text-decoration: none; color: red;">Tour</a></p>
                            </div>
                            <div class="image-container w-25">
                                <img src="../image/breadcrumb.png" alt="" class="w-100 product-card-img">
                                <p class="text-overlay"><a href="" style="text-decoration: none; color: red;">Tour</a></p>
                            </div>
                        </div>
                    </div> -->
                    <?php
                        include_once 'controller/news/canhdepchay.php';
                        $canhdep = get_canhdep(8);
                        echo show_canhdep($canhdep);
                    ?>
                </div>
                <button class="carousel-control-prev btn-carou-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next btn-carou-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
    </div>
    <!-- Phần 2 Danh sách tour nổi bật và tour hot-->
    <section class="section2 mt-4">
        <div class="container-fluid section2-bg">
            <div class="container d-flex justify-content-center align-items-center">
                <h1 style="padding: 20px; color:crimson;">TOUR MỚI</h1>
            </div>
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <!-- <div class="col-xl-3 col-sm-6 col-12 d-flex justify-content-center align-items-center">
                        <div class="card" style="width: auto;">
                            <a href="#" class="product-img-link"><img src="../image/anam-resort-nha-trang-vietnam-23.webp" class="card-img-top product-card-img" alt="..."></a>
                            <div class="card-body">
                                <span class="discount-badge">- 3%</span>
                                <div class="card-body">
                                    <a href="#" class="tour-name"><h4 class="card-title">Du lịch</h4></a>
                                    <div class="d-flex">
                                        <span class="price">6.300.000đ</span>
                                        <div class="vehicle"><i class="bi bi-bus-front-fill"></i> <i class="bi bi-airplane-fill"></i></div>
                                    </div>
                                    <p class="old-price">6.500.000đ</p>
                                    <div class="d-flex justify-content-between">
                                        <span class="icon-text"><i class="bi bi-calendar3"></i> Khởi hành: Thứ 7 hằng tuần</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span class="icon-text"><i class="bi bi-clock"></i> Thời gian: 3 ngày 2 đêm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex justify-content-center align-items-center">
                        <div class="card" style="width: auto;">
                            <a href="#" class="product-img-link"><img src="../image/anam-resort-nha-trang-vietnam-23.webp" class="card-img-top product-card-img" alt="..."></a>
                            <div class="card-body">
                                <span class="discount-badge">- 3%</span>
                                <div class="card-body">
                                    <a href="#" class="tour-name"><h4 class="card-title">Du lịch</h4></a>
                                    <div class="d-flex">
                                        <span class="price">6.300.000đ</span>
                                        <div class="vehicle"><i class="bi bi-bus-front-fill"></i> <i class="bi bi-airplane-fill"></i></div>
                                    </div>
                                    <p class="old-price">6.500.000đ</p>
                                    <div class="d-flex justify-content-between">
                                        <span class="icon-text"><i class="bi bi-calendar3"></i> Khởi hành: Thứ 7 hằng tuần</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span class="icon-text"><i class="bi bi-clock"></i> Thời gian: 3 ngày 2 đêm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex justify-content-center align-items-center">
                        <div class="card" style="width: auto;">
                            <a href="#" class="product-img-link"><img src="../image/anam-resort-nha-trang-vietnam-23.webp" class="card-img-top product-card-img" alt="..."></a>
                            <div class="card-body">
                                <span class="discount-badge">- 3%</span>
                                <div class="card-body">
                                    <a href="#" class="tour-name"><h4 class="card-title">Du lịch</h4></a>
                                    <div class="d-flex">
                                        <span class="price">6.300.000đ</span>
                                        <div class="vehicle"><i class="bi bi-bus-front-fill"></i> <i class="bi bi-airplane-fill"></i></div>
                                    </div>
                                    <p class="old-price">6.500.000đ</p>
                                    <div class="d-flex justify-content-between">
                                        <span class="icon-text"><i class="bi bi-calendar3"></i> Khởi hành: Thứ 7 hằng tuần</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span class="icon-text"><i class="bi bi-clock"></i> Thời gian: 3 ngày 2 đêm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex justify-content-center align-items-center">
                        <div class="card" style="width: auto;">
                            <a href="#" class="product-img-link"><img src="../image/anam-resort-nha-trang-vietnam-23.webp" class="card-img-top product-card-img" alt="..."></a>
                            <div class="card-body">
                                <span class="discount-badge">- 3%</span>
                                <div class="card-body">
                                    <a href="#" class="tour-name"><h4 class="card-title">Du lịch</h4></a>
                                    <div class="d-flex">
                                        <span class="price">6.300.000đ</span>
                                        <div class="vehicle"><i class="bi bi-bus-front-fill"></i> <i class="bi bi-airplane-fill"></i></div>
                                    </div>
                                    <p class="old-price">6.500.000đ</p>
                                    <div class="d-flex justify-content-between">
                                        <span class="icon-text"><i class="bi bi-calendar3"></i> Khởi hành: Thứ 7 hằng tuần</span>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <span class="icon-text"><i class="bi bi-clock"></i> Thời gian: 3 ngày 2 đêm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <?php
                        require_once 'controller/tour/showtour.php';
                        $tour = get_tour_new(4);
                        showTour($tour);
                    ?>
                </div>
            </div>
            <div class="container d-flex justify-content-center align-items-center">
                <h1 style="padding: 20px; color:crimson;">TOUR HOT</h1>
            </div>
            <div>
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center">
                        <!-- <div class="col-xl-4 col-sm-6 col-12 d-flex justify-content-center align-items-center">
                            <div class="card" style="width: auto;">
                                <a href="#" class="product-img-link"><img src="../image/anam-resort-nha-trang-vietnam-23.webp" class="card-img-top product-card-img" alt="..."></a>
                                <div class="card-body">
                                    <span class="discount-badge">- 3%</span>
                                    <div class="card-body">
                                        <a href="#" class="tour-name"><h4 class="card-title">Du lịch</h4></a>
                                        <div class="d-flex">
                                            <span class="price">6.300.000đ</span>
                                            <div class="vehicle"><i class="bi bi-bus-front-fill"></i> <i class="bi bi-airplane-fill"></i></div>
                                        </div>
                                        <p class="old-price">6.500.000đ</p>
                                        <div class="d-flex justify-content-between">
                                            <span class="icon-text"><i class="bi bi-calendar3"></i> Khởi hành: Thứ 7 hằng tuần</span>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <span class="icon-text"><i class="bi bi-clock"></i> Thời gian: 3 ngày 2 đêm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12 d-flex justify-content-center align-items-center">
                            <div class="card" style="width: auto;">
                                <a href="#" class="product-img-link"><img src="../image/anam-resort-nha-trang-vietnam-23.webp" class="card-img-top product-card-img" alt="..."></a>
                                <div class="card-body">
                                    <span class="discount-badge">- 3%</span>
                                    <div class="card-body">
                                        <a href="#" class="tour-name"><h4 class="card-title">Du lịch</h4></a>
                                        <div class="d-flex">
                                            <span class="price">6.300.000đ</span>
                                            <div class="vehicle"><i class="bi bi-bus-front-fill"></i> <i class="bi bi-airplane-fill"></i></div>
                                        </div>
                                        <p class="old-price">6.500.000đ</p>
                                        <div class="d-flex justify-content-between">
                                            <span class="icon-text"><i class="bi bi-calendar3"></i> Khởi hành: Thứ 7 hằng tuần</span>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <span class="icon-text"><i class="bi bi-clock"></i> Thời gian: 3 ngày 2 đêm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12 d-flex justify-content-center align-items-center">
                            <div class="card" style="width: auto;">
                                <a href="#" class="product-img-link"><img src="../image/anam-resort-nha-trang-vietnam-23.webp" class="card-img-top product-card-img" alt="..."></a>
                                <div class="card-body">
                                    <span class="discount-badge">- 3%</span>
                                    <div class="card-body">
                                        <a href="#" class="tour-name"><h4 class="card-title">Du lịch</h4></a>
                                        <div class="d-flex">
                                            <span class="price">6.300.000đ</span>
                                            <div class="vehicle"><i class="bi bi-bus-front-fill"></i><i class="bi bi-airplane-fill"></i><i class="bi bi-train-front-fill"></i></div>
                                        </div>
                                        <p class="old-price">6.500.000đ</p>
                                        <div class="d-flex justify-content-between">
                                            <span class="icon-text"><i class="bi bi-calendar3"></i> Khởi hành: Thứ 7 hằng tuần</span>
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <span class="icon-text"><i class="bi bi-clock"></i> Thời gian: 3 ngày 2 đêm</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <?php
                            $tour = get_tour_by_view(3);
                            showTour($tour);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Phần 3 Thông tin về website -->
    <section id="section3" style="margin-top: 30px;">
        <div class="container d-flex justify-content-center align-items-center">
            <h4 style="padding: 20px; color: rgba(26, 136, 238, 0.862)">Lý do bạn nên chọn chúng tôi</h4>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center" style="border-bottom: 3px solid burlywood;">
                <div class="col-xl-3 col-sm-6 col-12 d-flex justify-content-center align-items-center section3-aboutme">
                    <div class="d-flex">
                        <div>
                            <i class="bi bi-tags" style="font-size: 50px;"></i>
                        </div>
                        <div style="margin: 10px; color: #006aff;">
                            <h6>Giá tốt - nhiều ưu đãi</h6>
                            <p>Nhiều ưu đãi và quà tặng hấp dẫn khi đặt tour.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex justify-content-center align-items-center section3-aboutme">
                    <div class="d-flex">
                        <div>
                            <i class="bi bi-cash-stack" style="font-size: 50px;"></i>
                        </div>
                        <div style="margin: 10px; color: #006aff;">
                            <h6>Thanh toán an toàn</h6>
                            <p>Được công nhận bởi các tổ chức quốc tế.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex justify-content-center align-items-center section3-aboutme">
                    <div class="d-flex">
                        <div>
                            <i class="bi bi-headset" style="font-size: 50px;"></i>
                        </div>
                        <div style="margin: 10px; color: #006aff;">
                            <h6>Tư vẫn miễn phí</h6>
                            <p>Hỗ trợ tư vấn online miễn phí.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex justify-content-center align-items-center section3-aboutme">
                    <div class="d-flex">
                        <div>
                            <i class="bi bi-award" style="font-size: 50px;"></i> 
                        </div>
                        <div style="margin: 10px; color: #006aff;">
                            <h6>Thương hiệu ưu tín</h6>
                            <p>Thương hiệu lữ hành hàng đầu Việt Nam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Phần 4 Xu hướng du lịch -->
    <section id="section4">
        <div>
            <div class="container d-flex justify-content-center align-items-center">
                <h2 style="padding: 20px; color: rgba(26, 136, 238, 0.862)">XU HƯỚNG DU LỊCH</h2>
            </div>
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-xl-4 col-sm-4 col-12 d-flex justify-content-center align-items-center" style="max-height: 650px;">
                        <!-- <div class="card" style="width: auto; height: auto;">
                            <a href="#" class="product-img-link"><img src="../image/anam-resort-nha-trang-vietnam-23.webp" class="card-img-top product-card-img" alt="..."></a>
                                <div class="card-body">
                                    <a href="#" class="tour-name"><h4 class="card-title">Du lịch</h4></a>
                                    <p>15/03/2025</p>
                                    <hr style="width: 40px; height: 5px; border: none; background-color: black; border-radius: 10px; margin: auto;">
                                    <p style="margin: 10px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti quia veniam veritatis nihil voluptas eveniet? Totam debitis voluptates nobis corrupti magni dignissimos cupiditate, iste eius. Obcaecati soluta ratione error harum?</p>
                                </div>
                        </div> -->
                        <?php
                            require_once 'controller/news/news.php';
                            $news = get_news(1);
                            echo showNewsHome($news);
                        ?>
                    </div>
                    <div class="col-xl-4 col-sm-4 col-12" style="max-height: 650px;">
                        <div class="row h-50" style="margin: 0px;">
                            <div class="col-12 h-100"> 
                                <!-- <div class="card" style="width: auto; height: auto;">
                                    <div class="card-body">
                                        <a href="#" class="tour-name"><h4 class="card-title">Du lịch</h4></a>
                                    </div>
                                </div> -->
                                <?php
                                    $news1 = get_news_id(1);
                                    echo showNewsHomeNoImage($news1);
                                ?>
                            </div>
                        </div>
                        <div class="row h-50" style="margin: 0px;">
                            <div class="col-12 h-100">
                                <!-- <div class="card" style="width: auto; height: auto;">                                    
                                    <div class="card-body">
                                        <a href="#" class="tour-name"><h4 class="card-title">Du lịch</h4></a>
                                    </div>                                
                                </div> -->
                                <?php
                                    $news2 = get_news_id(2);
                                    echo showNewsHomeNoImage($news2);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-4 col-12" style="max-height: 650px;">
                        <div class="row h-50" style="margin: 0px;">
                            <div class="col-12 h-100"> 
                                <!-- <div class="card" style="width: auto; height: auto;">
                                    <div class="card-body">
                                        <a href="#" class="tour-name"><h4 class="card-title">Du lịch</h4></a>
                                    </div>
                                </div> -->
                                <?php
                                    $news3 = get_news_id(3);
                                    echo showNewsHomeNoImage($news3);
                                ?>
                            </div>
                        </div>
                        <div class="row h-50" style="margin: 0px;">
                            <div class="col-12 h-100">
                                <!-- <div class="card" style="width: auto; height: auto;">                                    
                                    <div class="card-body">
                                        <a href="#" class="tour-name"><h4 class="card-title">Du lịch</h4></a>
                                    </div>                                
                                </div> -->
                                <?php
                                    $news4 = get_news_id(4);
                                    echo showNewsHomeNoImage($news4);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>