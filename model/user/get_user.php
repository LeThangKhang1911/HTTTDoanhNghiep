<?php
    require_once __DIR__.'/../pdo.php';
    // hàm lấy tất cả user cho admin
    function get_user_all(){
        $sql = "SELECT * FROM user";
        return pdo_query($sql);
    }
    // lấy user theo email
    function get_user_by_email($email){
        $sql = "SELECT * FROM user WHERE email = '$email'";
        return pdo_query($sql);
    }
    // lấy user theo id
    function get_user_by_id($id){
        $sql = "SELECT * FROM user WHERE userid = '$id'";
        return pdo_query($sql);
    }

    // hàm update mật khẩu theo email
    function update_password($email, $new_password) {
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $sql = "UPDATE user SET password = ? WHERE email = ?";
        pdo_execute($sql, $hashed_password, $email);
    }
    // hàm update 2fa theo id user
    function update_2fa($id, $fa){
        $sql = "UPDATE user SET `2fa` = ? WHERE userid = ?";
        pdo_execute($sql, $fa, $id);
    }
    // Hàm xóa tài khoản theo id
    function delete_account($id){
        $sql = "DELETE FROM user WHERE userid = ?";
        pdo_execute($sql, $id);
    }
    // hàm cập nhật tên theo id
    function update_Name($id, $name){
        $sql = "UPDATE user SET fullname = ? where userid = ?";
        pdo_execute($sql, $name, $id);
    }
    // hàm cập giới tính tên theo id
    function update_Gioitinh($id, $gioitinh){
        $sql = "UPDATE user SET gioitinh = ? where userid = ?";
        pdo_execute($sql, $gioitinh, $id);
    }
    // hàm cập nhật ngày sinh theo id
    function update_Ngaysinh($id, $ngaysinh){
        $sql = "UPDATE user SET ngaysinh = ? where userid = ?";
        pdo_execute($sql, $ngaysinh, $id);
    }
    // hàm cập nhật số điện thoại theo id
    function update_phone($id, $phone){
        $sql = "UPDATE user SET phone = ? where userid = ?";
        pdo_execute($sql, $phone, $id);
    }
    // hàm cập nhật địa chỉ theo id
    function update_address($id, $address){
        $sql = "UPDATE user SET address = ? where userid = ?";
        pdo_execute($sql, $address, $id);
    }
    // hàm update password theo id
    function update_pass($id, $pass){
        $sql = "UPDATE user SET password = ? WHERE userid = ?";
        pdo_execute($sql, $pass, $id);
    }
?>