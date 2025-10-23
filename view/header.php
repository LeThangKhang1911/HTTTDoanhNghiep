<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="du lịch, địa điểm du lịch, tour du lịch, khám phá, trải nghiệm, đặt vé máy bay, khách sạn, du lịch Việt Nam, du lịch nước ngoài, review du lịch, cẩm nang du lịch"> 
    <meta name="description" content="Khám phá các tour du lịch trong nước hấp dẫn tại Việt Nam, từ miền Bắc đến miền Nam. Đặt tour nhanh chóng, trải nghiệm đáng nhớ.">
    <base href="/">
    <link rel="stylesheet" href="view/layout/css/bootstrap.css">
    <link rel="stylesheet" href="view/layout/css/navbar.css">
    <link rel="stylesheet" href="view/layout/css/offcanvas.css">
    <?php if($pg==""){ ?><link rel="stylesheet" href="view/layout/css/body_index.css"><?php }elseif($pg=="Xu-huong-du-lich"){?>
    <link rel="stylesheet" href="view/layout/css/xuhuong.css"><?php } elseif($pg=="pay"){?>
    <link rel="stylesheet" href="view/layout/css/pay_style.css"><?php } elseif($pg=="detail"){?>
    <link rel="stylesheet" href="view/layout/css/detail.css"><?php } elseif($pg=="Tour"){?>
    <link rel="stylesheet" href="view/layout/css/body_tour.css"><?php } elseif($pg=="account"){?>
    <link rel="stylesheet" href="view/layout/css/account.css"> 
    <link rel="stylesheet" href="view/layout/css/btn-2fa.css"> <?php } elseif($pg=="Lien-he"){?>
    <link rel="stylesheet" href="view/layout/css/contatct.css"> <?php } elseif($pg=='newsdetail'){?>
    <link rel="stylesheet" href="view/layout/css/newsdetail.css"> <?php }?>
    <link rel="stylesheet" href="view/layout/css/btn-darkmode.css">
    <link rel="stylesheet" href="view/layout/css/darkmode.css">
    <link rel="stylesheet" href="view/layout/css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="view/layout/image/favicon-32x32.png" type="image/x-icon">
    <title>Du lich trong nuoc</title>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" id="bg-navbar">
        <div class="container-fluid nav-bg-slide" style="align-items: start !important;">
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" id="btn-carousel-prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next" id="btn-carousel-next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <script src="view/layout/js/navbar_search.js"></script>
            <div class="container">
                <div class="row d-flex justify-content-between align-items-start w-100 nav-bg-contact" style="background-color: rgba(0, 0, 0, 0.432); border-radius: 30px;">
                    <div class="col-6 col-sm-6 d-flex justify-content-start align-self-start">
                        <a href="tel: 19000000" class="nav-link contact-link" style="color: #fff; margin: 5px;">
                            <i class="bi bi-telephone-fill" style="font-size: 25px;"></i>
                            <span class="nav-contact-text">1900 0000</span> 
                        </a>
                        <a href="mailto: dulich@gmail" class="nav-link contact-link" style="color: #fff; margin: 5px;">
                            <i class="bi bi-envelope-at-fill" style="font-size: 25px;"></i>
                            <span class="nav-contact-text">dulich@gmail</span> 
                        </a>
                        <a href="index.php?pg=account" class="nav-link contact-link" style="color: #fff; margin: 5px;" <?php if(isset($_SESSION['user'])) echo ' class="user-logged-in"'; ?>>
                            <i class="bi bi-person-badge-fill" style="font-size: 25px;"></i>
                            <span class="nav-contact-text">
                                <?php
                                    require_once __DIR__.'/../model/user/get_user.php';
                                    if(isset($_SESSION['user'])){
                                        $user_list = get_user_by_id($_SESSION['user']);
                                        $user = $user_list[0];
                                        $name = $user['fullname'];
                                        echo $name;
                                    }
                                    else {
                                        echo "Tài khoản";
                                    }
                                ?>
                            </span> 
                        </a>
                    </div>
                    <div class="col-6 col-sm-6 d-flex justify-content-end align-self-start">
                        <!-- Nút darkmode --> 
                        <label for="theme" class="theme">
                            <span class="theme__toggle-wrap">
                                <input id="theme" class="theme__toggle" type="checkbox" role="switch" name="theme" value="dark">
                                <span class="theme__fill"></span>
                                <span class="theme__icon">
                                    <span class="theme__icon-part"></span>
                                    <span class="theme__icon-part"></span>
                                    <span class="theme__icon-part"></span>
                                    <span class="theme__icon-part"></span>
                                    <span class="theme__icon-part"></span>
                                    <span class="theme__icon-part"></span>
                                    <span class="theme__icon-part"></span>
                                    <span class="theme__icon-part"></span>
                                    <span class="theme__icon-part"></span>
                                </span>
                            </span>
                        </label>
                        <a href="view/login.php" target="_blank" class="nav-link contact-link" style="color: #fff; margin: 5px;">
                            <i class="bi bi-person-fill" style="font-size: 25px;"></i>
                            <span class="nav-contact-text">Đăng nhập</span> 
                        </a>
                        <a href="view/signup.php" target="_blank" class="nav-link contact-link" style="color: #fff; margin: 5px;">
                            <i class="bi bi-person-fill-add" style="font-size: 25px;"></i>
                            <span class="nav-contact-text">Đăng kí</span> 
                        </a>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-4 d-flex justify-content-between align-items-start">
                        <a href="index.php"><img src="view/layout/image/logoweb.png" alt="Logo"></a>
                        <div>
                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                                <span class="bi bi-list" style="color: #fff; font-size: 30px;"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-8 nav-menu">
                        <div class="nav-navigation container-lg d-flex justify-content-end">
                            <!-- <ul class="navbar-nav flex-row mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link nav-navigation-link" aria-current="page" href="index.php">Trang chủ</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link nav-navigation-link" role="button" href="index.php?pg=tour" target="_self">
                                        Tour
                                    </a>
                                    <ul class="dropdown-menu dropdown-navbar">
                                        <li class="d-flex">
                                            <div class="dropdown-col">
                                                <ul class="list-location">
                                                    <a href="" style="text-decoration: none; color:black">Du lịch miền Bắc</a>
                                                    <li><a class="dropdown-item" href="#">Tây Bắc</a></li>
                                                    <li><a class="dropdown-item" href="#">Hà Nội</a></li>
                                                    <li><a class="dropdown-item" href="#">Hạ Long</a></li>
                                                    <li><a class="dropdown-item" href="#">Sapa</a></li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-col">
                                                <ul class="list-location">
                                                    <a href="" style="text-decoration: none; color:black">Du lịch miền Trung</a>
                                                    <li><a class="dropdown-item" href="#">Huế - Đà Nẵng - Hội An</a></li>
                                                    <li><a class="dropdown-item" href="#">Quy Nhơn - Nha Trang</a></li>
                                                    <li><a class="dropdown-item" href="#">Đà Lạt</a></li>                                              
                                                </ul>
                                            </div>
                                            <div class="dropdown-col">
                                                <ul class="list-location">
                                                    <a href="" style="text-decoration: none; color:black">Du lịch miền Nam</a>
                                                    <li><a class="dropdown-item" href="#">Phú Quốc</a></li>
                                                    <li><a class="dropdown-item" href="#">Miền Tây</a></li>
                                                    <li><a class="dropdown-item" href="#">Vũng Tàu - Côn Đảo</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-navigation-link" href="index.php?pg=xuhuong" aria-expanded="false">
                                        Xu hướng du lịch
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-navigation-link" href="index.php?pg=contact" aria-expanded="false">
                                        Liên hệ
                                    </a>
                                </li>
                                <div class="search">
                                    <button type="button" id="btn-nav-search">
                                        <i class="bi bi-search" style="color: #fff;"></i>
                                    </button>
                                    <div id="form-container">
                                        <form action="#" method="post" class="search-form">
                                            <label for="location" style="font-weight: bold;">Điểm đến</label>
                                            <input class="form-input" type="text" name="location" id="location" placeholder="Nhập địa điểm muốn đến">
                                            <label for="time-go" style="font-weight: bold;">Ngày khởi hành</label>
                                            <input class="form-input" type="date" name="time-go" id="time-go">
                                        </form>
                                    </div>
                                    <script src="view/layout/js/search_form.js"></script>
                                </div>
                            </ul> -->
                            <?php 
                                require_once 'controller/menu/menu.php'; 
                                $menu = getMenu();
                                showMenu($menu);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- offcanvas -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-background">
            <div class="offcanvas-header">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="profile">
                <div class="d-flex justify-content-center align-items-center">
                    <a href="index.php?pg=account"><i class="bi bi-person-circle" style="font-size: 60px; color: #fff;"></i></a>
                </div>
                <div class="offcanvas-btn d-flex justify-content-center align-items-center">
                    <a href="view/login.php" target="_blank"><button type="button" class="off-btn-css">Đăng nhập</button></a>
                    <a href="view/signup.php" target="_blank"><button type="button" class="off-btn-css">Đăng kí</button></a>
                </div>
            </div>
        </div>
        <div class="offcanvas-body off-body-bg">
            <ul class="off-list-menu">
                <li class="off-list-item"><a href="index.php?pg=" class="off-list-link">Trang chủ</a></li>
                <li class="off-list-item" class="dropdown">
                    <a href="index.php?pg=Tour" target="_self" class="off-list-link">Tour trong nước</a></li>
                    <ul class="off-list-location">
                        <a href="index.php?pg=Tour&category=1" style="text-decoration: none; color: black">Du lịch miền Bắc</a>
                        <li><a href="index.php?pg=Tour&name=tay-bac" class="off-list-loca-link">Tây Bắc</a></li>
                        <li><a href="index.php?pg=Tour&name=ha-noi" class="off-list-loca-link">Hà Nội</a></li>
                        <li><a href="index.php?pg=Tour&name=ha-long" class="off-list-loca-link">Hạ Long</a></li>
                        <li><a href="index.php?pg=Tour&name=sap-pa" class="off-list-loca-link">Sapa</a></li>
                    </ul>
                    <ul class="off-list-location">
                        <a href="index.php?pg=Tour&category=2" style="text-decoration: none; color: black">Du lịch miền Trung</a>
                        <li><a href="index.php?pg=Tour&name=hue" class="off-list-loca-link">Huế</a></li>
                        <li><a href="index.php?pg=Tour&name=da-nang" class="off-list-loca-link">Đà Nẵng</a></li>
                        <li><a href="index.php?pg=Tour&name=hoi-an" class="off-list-loca-link">Hội An</a></li>
                        <li><a href="index.php?pg=Tour&name=nha-trang" class="off-list-loca-link">Nha Trang</a></li>
                        <li><a href="index.php?pg=Tour&name=da-lat" class="off-list-loca-link">Đà Lạt</a></li>
                    </ul>
                    <ul class="off-list-location">
                        <a href="index.php?pg=Tour&category=3" style="text-decoration: none; color: black">Du lịch miền Nam</a>
                        <li><a href="index.php?pg=Tour&name=phu-quoc" class="off-list-loca-link">Phú Quốc</a></li>
                        <li><a href="index.php?pg=Tour&name=mien-tay" class="off-list-loca-link">Miền Tây</a></li>
                        <li><a href="index.php?pg=Tour&name=vung-tau" class="off-list-loca-link">Vũng Tàu - Côn Đảo</a></li>
                    </ul>
                </li>
                <li class="off-list-item"><a href="index.php?pg=Xu-huong-du-lich" class="off-list-link">Xu hướng du lịch</a></li>
                <li class="off-list-item"><a href="index.php?pg=Lien-he" class="off-list-link">Liên hệ</a></li>
            </ul>
        </div>
    </div>