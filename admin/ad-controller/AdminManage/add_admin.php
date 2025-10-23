<?php 
    require_once '../../ad-model/AdminManagement/get_admin.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Nhận dữ liệu từ form
        $fullname = isset($_POST['fullname']) ? trim($_POST['fullname']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';
        $rank = isset($_POST['hang']) ? trim($_POST['hang']) : '';
        $status = isset($_POST['hoatdong']) ? intval($_POST['hoatdong']) : 1;
        
        // Kiểm tra dữ liệu đầu vào
        if (empty($fullname) || empty($email) || empty($password)) {
            echo "Vui lòng điền đầy đủ thông tin bắt buộc!";
            exit;
        }
        
        // Kiểm tra email hợp lệ
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email không hợp lệ!";
            exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        // Thêm quản trị viên mới
        $result = add_admin($fullname, $email, $hashedPassword, $rank, $status);
        
        if ($result) {
            // Nếu sử dụng AJAX
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
                echo "success";
            } else {
                // Redirect nếu là form submit thông thường
                header("Location: ../../ad-view/ad-admin.php");
                exit;
            }
        } 
        else {
            echo "Thêm quản trị viên thất bại!";
        }
        
    } 
    else {
        echo "Yêu cầu không hợp lệ!";
    }

?>