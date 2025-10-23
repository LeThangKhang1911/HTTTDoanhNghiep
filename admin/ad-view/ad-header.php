<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../view/layout/image/favicon-32x32.png">
  <title>
    Admin
  </title>
  <link rel="stylesheet" href="../view/layout/css/bootstrap.css">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
  <script src="ckeditor/ckeditor.js"></script>
  <style>
    html {
      overflow: hidden;
    }
  </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="../view/layout/image/logoweb.png" class="navbar-brand-img" alt="main_logo">
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active bg-gradient-dark text-white" href="index-admin.php?pg=dashboard">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Thống kê</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index-admin.php?pg=home">
            <i class="material-symbols-rounded opacity-5">home</i>
            <span class="nav-link-text ms-1">Trang chủ</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index-admin.php?pg=tour">
            <i class="material-symbols-rounded opacity-5">map</i>
            <span class="nav-link-text ms-1">Tour</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index-admin.php?pg=news">
            <i class="material-symbols-rounded opacity-5">newspaper</i>
            <span class="nav-link-text ms-1">Xu hướng du lịch</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index-admin.php?pg=contact">
            <i class="material-symbols-rounded opacity-5">contact_mail</i>
            <span class="nav-link-text ms-1">Liên hệ</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index-admin.php?pg=user">
            <i class="material-symbols-rounded opacity-5">person</i>
            <span class="nav-link-text ms-1">Khách hàng</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index-admin.php?pg=admin"> 
            <i class="material-symbols-rounded opacity-5">admin_panel_settings</i>
            <span class="nav-link-text ms-1">Quản trị viên</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index-admin.php?pg=historyTour"> 
            <i class="material-symbols-rounded">schedule</i>
            <span class="nav-link-text ms-1">Lịch sử điều chỉnh tour</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index-admin.php?pg=historyNews"> 
            <i class="material-symbols-rounded">schedule</i>
            <span class="nav-link-text ms-1">Lịch sử điều chỉnh tin tức</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index-admin.php?pg=historySlide"> 
            <i class="material-symbols-rounded">schedule</i>
            <span class="nav-link-text ms-1">Lịch sử điều chỉnh ảnh bìa</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Tài khoản quản trị viên</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index-admin.php?pg=adAccount">
            <i class="material-symbols-rounded opacity-5">person</i>
            <span class="nav-link-text ms-1">Tài khoản</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="ad-controller/ad-login-logout/ad-logout.php"> <!--cần chỉnh link -->
            <i class="material-symbols-rounded opacity-5">logout</i>
            <span class="nav-link-text ms-1">Đăng xuất</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center"><h2>Trang quản trị</h2></div>
          <ul class="navbar-nav d-flex align-items-center  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="material-symbols-rounded fixed-plugin-button-nav">settings</i>
              </a>
            </li>
            <li class="nav-item d-flex align-items-center">
              <a href="index-admin.php?pg=adAccount" class="nav-link text-body font-weight-bold px-0">
                <i class="material-symbols-rounded">account_circle</i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
  
    <script>
      const navLinks = document.querySelectorAll('.nav-link');
      const currentUrl = new URL(window.location.href);
      const currentPage = currentUrl.searchParams.get('pg') || 'dashboard'; 
      navLinks.forEach(link => {
        const href = link.getAttribute('href');
        const linkUrl = new URL(href, window.location.origin);
        const linkPage = linkUrl.searchParams.get('pg') || 'dashboard';
        if (linkPage === currentPage) {
          link.classList.remove('text-dark');
          link.classList.add('bg-gradient-info', 'text-white');
        }
      });
    </script>