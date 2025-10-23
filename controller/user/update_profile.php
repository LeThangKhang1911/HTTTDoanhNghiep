<?php
    session_start();
    require_once __DIR__.'/../../model/user/get_user.php';
    if(!isset($_SESSION['user'])){
        header('location: ../../index.php');
        exit();
    }
    if(isset($_POST['btn-changeName'])){
        $name = $_POST['fullname'];
        update_Name($_SESSION['user'], $name);
        header('location: ../../index.php?pg=account');
        exit();
    }
    if(isset($_POST['btn-changeGT'])){
        $gioitinh = $_POST['gioitinh'];
        update_Gioitinh($_SESSION['user'], $gioitinh);
        header('location: ../../index.php?pg=account');
        exit();
    }
    if(isset($_POST['btn-changeNS'])){
        $ngaysinh = $_POST['ngaysinh'];
        update_Ngaysinh($_SESSION['user'], $ngaysinh);
        header('location: ../../index.php?pg=account');
        exit();
    }
    if(isset($_POST['btn-changeSDT'])){
        $sdt = $_POST['phone'];
        update_phone($_SESSION['user'], $sdt);
        header('location: ../../index.php?pg=account');
        exit();
    }
    if(isset($_POST['btn-changeDC'])){
        $address = $_POST['address'];
        update_address($_SESSION['user'], $address);
        header('location: ../../index.php?pg=account');
        exit();
    }
?>