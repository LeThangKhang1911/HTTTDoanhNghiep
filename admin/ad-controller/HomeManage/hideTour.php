<?php
    session_start();
    require_once '../../../model/tour/get_tour.php';
    require_once '../../ad-model/AdminManagement/get_dieuchinh.php';
    $tourid = $_GET['id'];
    $hide = $_GET['hide'];
    $new_hide = ($hide == 0) ? 1 : 0;
    update_hide_tour_by_id($tourid, $new_hide);
    add_dieuchinhtour($tourid, $_SESSION['admin']['adid']);
    header('location: ../../index-admin.php?pg=home');
?>