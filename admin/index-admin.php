<?php
    session_start();
    if (!isset($_SESSION['admin'])) {
        header('location: ../view/login-admin.php');
        exit();
    }
    $pg = isset($_GET["pg"]) ? $_GET["pg"] : "";
    include_once 'ad-view/ad-header.php';
    switch ($pg) {
        case 'dashboard':
            include_once 'ad-view/dashboard.php';
            break;
        case 'home':
            include_once 'ad-view/ad-Trangchu.php';
            break;
        case 'tour':
            include_once 'ad-view/ad-tour.php';
            break;
        case 'news':
            include_once 'ad-view/ad-xuhuong.php';
            break;
        case 'contact':
            include_once 'ad-view/ad-contact.php';
            break;
        case 'user':
            include_once 'ad-view/ad-user.php';
            break;
        case 'admin':
            include_once 'ad-view/ad-admin.php';
            break;
        case 'tourdetail':
            include_once 'ad-view/ad-tourDetail.php';
            break;
        case 'userdetail':
            include_once 'ad-view/ad-userDetail.php';
            break;
        case 'adAccount':
            include_once 'ad-view/ad-account.php';
            break;
        case 'newsdetail':
            include_once 'ad-view/ad-xuhuongDetail.php';
            break;
        case 'historyTour':
            include_once 'ad-view/ad-dieuchinhTour.php';
            break;
        case 'historyNews':
            include_once 'ad-view/ad-dieuchinhNews.php';
            break;
        case 'historySlide':
            include_once 'ad-view/ad-dieuchinhSlide.php';
            break;
        case 'addnews':
            include_once 'ad-controller/XuhuongManage/add_news.php';
            break;
        case 'addslide':
            include_once 'ad-controller/HomeManage/add_slide.php';
            break;
        case 'updateslide':
            include_once 'ad-controller/HomeManage/update_slide.php';
            break;
        case 'addcanhdep':
            include_once 'ad-controller/HomeManage/add_canhdep.php';
            break;
        case 'updatecanhdep':
            include_once 'ad-controller/HomeManage/update_canhdep.php';
            break;
        case 'addtour':
            include_once 'ad-controller/TourManage/add_tour.php';
            break;
        default:
            include_once 'ad-view/dashboard.php';
            break;
    }
    include_once 'ad-view/ad-footer.php';
    
?>
<?php
    if (isset($_SESSION['alert'])) {
        $msg = $_SESSION['alert']['message'];
        $type = $_SESSION['alert']['type'];
        echo "<script>
            window.onload = function() {
                showAlert('$msg', '$type', 5000);
            };
        </script>";
        unset($_SESSION['alert']);
    }
?>
<script src="../view/layout/js/show_alert.js"></script>