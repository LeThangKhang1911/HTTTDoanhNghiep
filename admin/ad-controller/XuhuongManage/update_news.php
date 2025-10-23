<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once __DIR__.'/../../ad-model/AdminXuhuong/get_xuhuong.php';
    require_once __DIR__.'/../../ad-model/AdminManagement/get_dieuchinh.php';
    if (isset($_POST['btn-updatenews'])) {
        $name = isset($_POST['name']) ? (trim($_POST['name'])) : '';
        $meta = isset($_POST['meta']) ? (trim($_POST['meta'])) : '';
        $description = isset($_POST['description']) ? (trim($_POST['description'])) : '';
        $detail = isset($_POST['detail']) ? (trim($_POST['detail'])) : '';
        $ordered = isset($_POST['ordered']) ? (int)$_POST['ordered'] : 0;
        $hide = isset($_POST['hide']) ? 1 : 0;

        // Kiểm tra dữ liệu bắt buộc
        $errors = [];

        if (empty($name)) {
            $errors[] = "Tiêu đề là bắt buộc!";
        }
        if (empty($description)) {
            $errors[] = "Mô tả ngắn là bắt buộc!";
        }
        if (empty($detail)) {
            $errors[] = "Nội dung chi tiết là bắt buộc!";
        }
        if ($ordered < 0) {
            $errors[] = "Thứ tự hiển thị phải là số không âm!";
        }

        if (!empty($errors)) {
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li style='color: red;'>$error</li>";
            }
            echo "</ul>";
            die();
        }

        // Cấu hình thư mục lưu ảnh
        $uploadDir = '../../../upload/image/news/';
        $maxFileSize = 100 * 1024 * 1024; // 100MB

        // Hàm xử lý tải lên tệp và kiểm tra trùng tên
        function uploadFile($fileKey, $uploadDir, $maxFileSize) {
            if (!empty($_FILES[$fileKey]['name'])) {
                $file = $_FILES[$fileKey];
                $originalFileName = basename($file['name']); // Lấy tên gốc với đuôi
                $filePath = $uploadDir . $originalFileName; // Sử dụng tên file gốc
                $fileSize = $file['size'];

                // Kiểm tra kích thước tệp
                if ($fileSize > $maxFileSize) {
                    die("Tệp $fileKey quá lớn!");
                }

                // Kiểm tra xem file đã tồn tại trong thư mục chưa
                if (!file_exists($filePath)) {
                    // Tải lên file nếu không có lỗi
                    if (move_uploaded_file($file['tmp_name'], $filePath)) {
                        return $originalFileName; // Trả về tên file gốc
                    } else {
                        die("Lỗi khi tải lên tệp $fileKey!");
                    }
                } else {
                    return $originalFileName;
                }
            }
            return null;
        }

        // Xử lý tải lên ảnh và lấy tên tệp
        $imageName = uploadFile('image', $uploadDir, $maxFileSize);
        $image2Name = uploadFile('image2', $uploadDir, $maxFileSize);
        $image3Name = uploadFile('image3', $uploadDir, $maxFileSize);

        // Nếu không có ảnh mới được tải lên, sử dụng tên ảnh hiện tại
        $imageName = $imageName !== null ? $imageName : (isset($_POST['current_image']) ? trim($_POST['current_image']) : '');
        $image2Name = $image2Name !== null ? $image2Name : (isset($_POST['current_image2']) ? trim($_POST['current_image2']) : '');
        $image3Name = $image3Name !== null ? $image3Name : (isset($_POST['current_image3']) ? trim($_POST['current_image3']) : '');

        $newid = update_news($_GET['id'], $name, $imageName, $image2Name, $image3Name, $description, $detail, $meta, $hide, $ordered);
        add_dieuchinhnews($_GET['id'], $_SESSION['admin']['adid'], "Sửa");

        $_SESSION['alert'] = [
            'message' => 'Sửa tin tức thành công.',
            'type' => 'success'
        ];
        header('location: ../../index-admin.php?pg=news');
    } else {
        $_SESSION['alert'] = [
            'message' => 'Đã có lỗi xảy ra.',
            'type' => 'error'
        ];
        header('location: ../../index-admin.php?pg=newsdetail&id='.$_GET['id']);
    }
?>