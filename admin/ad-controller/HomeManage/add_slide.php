<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    require_once __DIR__.'/../../ad-model/AdminHome/get_slide.php';
    require_once __DIR__.'/../../ad-model/AdminManagement/get_dieuchinh.php';
    if (isset($_POST['btn-addslide'])) {
        $name = isset($_POST['name']) ? (trim($_POST['name'])) : '';
        $ordered = isset($_POST['ordered']) ? (int)$_POST['ordered'] : 0;
        $hide = isset($_POST['hide']) ? 1 : 0;
        // Kiểm tra dữ liệu bắt buộc
        $errors = [];
        if (empty($name)) {
            $errors[] = "Tên ảnh là bắt buộc!";
        }
        if (empty($_FILES['image']['name'])) {
            $errors[] = "Ảnh là bắt buộc!";
        }
        if ($ordered < 0) {
            $errors[] = "Thứ tự hiển thị ảnh phải là số không âm!";
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
        $uploadDir = '../../../upload/image/slide/';
        $maxFileSize = 100 * 1024 * 1024; // 100MB
        // Hàm xử lý tải lên tệp và giữ nguyên tên gốc
        function uploadFile($fileKey, $uploadDir, $maxFileSize) {
            if (!empty($_FILES[$fileKey]['name'])) {
                $file = $_FILES[$fileKey];
                $originalFileName = basename($file['name']); // Lấy tên gốc với đuôi
                $uniqueFileName = $originalFileName;
                $filePath = $uploadDir . $uniqueFileName;
                $fileSize = $file['size'];

                if ($fileSize > $maxFileSize) {
                    die("Tệp $fileKey quá lớn!");
                }

                if (move_uploaded_file($file['tmp_name'], $filePath)) {
                    return $uniqueFileName; // Trả về tên tệp duy nhất
                } else {
                    die("Lỗi khi tải lên tệp $fileKey!");
                }
            }
            return null;
        }
        // Xử lý tải lên ảnh và lấy tên tệp
        $imageName = uploadFile('image', $uploadDir, $maxFileSize);
        $newid = add_slide($name, $imageName, $hide, $ordered);
        add_dieuchinhslide($newid, $_SESSION['admin']['adid'], "Thêm");
        $_SESSION['alert'] = [
            'message' => 'Thêm ảnh thành công.',
            'type' => 'success'
        ];
        header('location: ../../index-admin.php?pg=home');
    }
?>


<style>
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        margin: 20px;
    }
    .form-container {
        max-width: 800px;
        margin: 0 auto;
        background: #f9f9f9;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h1 {
        text-align: center;
        color: #333;
    }
    .form-group {
        margin-bottom: 15px;
    }
    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }
    input[type="text"], textarea, input[type="number"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type="file"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: white;
    }
    .file-preview {
        margin-top: 5px;
        max-width: 200px;
        display: none;
    }
    textarea {
        height: 150px;
        resize: vertical;
    }
    .checkbox-container {
        display: flex;
        align-items: center;
    }
    .checkbox-container input {
        margin-right: 10px;
        width: auto;
    }
    .btn-container {
        text-align: center;
        margin-top: 20px;
    }
    .btn {
        background: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
        font-size: 16px;
    }
    .btn:hover {
        background: #45a049;
    }
</style>
<h3 style="text-align: center">Thêm hình ảnh</h3>
<script>
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<div class="form-container">
    <form action="ad-controller/HomeManage/add_slide.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Tên ảnh:</label>
            <input type="text" id="name" name="name" maxlength="255" required>
        </div>
        
        <div class="form-group">
            <label for="image">File ảnh:</label>
            <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(this, 'preview1')">
            <img id="preview1" src="#" alt="Preview image" class="file-preview">
        </div>
        
        <div class="form-group checkbox-container">
            <input type="checkbox" id="hide" name="hide" value="1">
            <label for="hide">Ẩn</label>
        </div>
        
        <div class="form-group">
            <label for="ordered">Thứ tự hiển thị:</label>
            <input type="number" id="ordered" name="ordered" min="0">
        </div>
        
        <div class="btn-container">
            <button type="submit" class="btn" name="btn-addslide">Thêm ảnh</button>
            <button type="reset" class="btn" style="background: #f44336; margin-left: 10px;">Hủy</button>
        </div>
    </form>
</div>
