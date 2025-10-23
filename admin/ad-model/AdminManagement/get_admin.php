<?php
    require_once __DIR__.'/../../../model/pdo.php';
    // Hàm lấy tất cả admin
    function get_admin(){
        $sql = "SELECT * FROM admin";
        return pdo_query($sql);
    }
    // hàm lấy admin theo id
    function get_admin_by_id($id){
        $sql = "SELECT * FROM admin WHERE id = ?";
        return pdo_query($sql, $id);
    }
    // hàm thêm admin
    function add_admin($name, $email, $pass, $hang, $hoatdong){
        $sql = "INSERT INTO admin (fullname, email, password, hang, hoatdong)
                VALUES (?, ?, ?, ?, ?)";
        pdo_execute($sql, $name, $email, $pass, $hang, $hoatdong);
    }
    // hàm lấy admin theo email
    function get_admin_by_email($email){
        $sql = "SELECT * FROM admin WHERE email = ?";
        return pdo_query($sql, $email);
    }
    // hàm upate mật khẩu theo email
    function update_pass_admin($email, $pass){
        $hash_password = password_hash($pass, PASSWORD_BCRYPT);
        $sql = "UPDATE admin SET password = ? WHERE email = ?";
        pdo_execute($sql, $hash_password, $email);
    }
    // hàm update thông tin admin trừ mặt khẩu theo id
    function update_infor_admin($id, $name, $email, $hang, $hoatdong){
        $sql = "UPDATE admin 
            SET fullname = ?, email = ?, hang = ?, hoatdong = ? 
            WHERE id = ?";
        pdo_execute($sql, $name, $email, $hang, $hoatdong, $id);
    }
    // hàm xóa admin theo id
    function delete_admin_by_id($id){
        $sql = "DELETE FROM admin WHERE id=?";
        pdo_execute($sql, $id);
    }
?>