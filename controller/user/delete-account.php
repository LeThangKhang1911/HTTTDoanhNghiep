<?php
    session_start();
    require_once __DIR__.'/../../model/user/get_user.php';
    if(!isset($_SESSION['user'])){
        header('location: ../../index.php');
        exit();
    }
    $id = $_SESSION['user'];
    delete_account($id);
    unset($_SESSION['user']);
    header('location: ../../index.php')
?>