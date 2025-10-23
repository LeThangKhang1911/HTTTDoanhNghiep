<?php
    session_start();
    require_once '../../ad-model/AdminManagement/get_admin.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['idad'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $hang = $_POST['hang'];
        $hoatdong = $_POST['hoatdong'];
        update_infor_admin($id, $fullname, $email, $hang, $hoatdong);
        $_SESSION['alert'] = [
            'message' => 'Cập nhật thông tin thành công!',
            'type' => 'success'
        ];
    }
    else {
        $_SESSION['alert'] = [
            'message' => 'Đã có lỗi xảy ra! Vui lòng thử lại.',
            'type' => 'error'
        ];
    }
?>