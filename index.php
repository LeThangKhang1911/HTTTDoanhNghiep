<?php
    $pg = isset($_GET["pg"]) ? $_GET["pg"] : "";
    include "view/header.php";
    switch ($pg) {
        case 'Tour':
            include "view/tour.php";
            break;
        case 'Xu-huong-du-lich':
            include "view/xuhuong.php";
            break;
        case 'Lien-he':
            include "view/contact.php";
            break;
        case 'account':
            include "view/account.php";
            break;
        case 'pay':
            include "view/pay.php";
            break;
        case 'detail':
            include "view/detail.php";
            break;
        case 'newsdetail':
            include "view/newsdetail.php";
            break;
        default:
            include "view/home.php";
            break;
    }

    include "view/footer.php";
?>