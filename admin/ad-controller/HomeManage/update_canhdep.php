<?php
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }
    require_once __DIR__.'/../../ad-model/AdminHome/get_canhdep.php';
    $canhdep_list = get_canhdep_by_id($_GET['id']);
    $canhdep = $canhdep_list[0];
    if(isset($_POST['btn-updatecanhdep'])){
        $name = isset($_POST['name']) ? (trim($_POST['name'])) : '';
        $hide = isset($_POST['hide']) ? 1 : 0;
        // Kiểm tra dữ liệu bắt buộc
        $errors = [];
        if (empty($name)) {
            $errors[] = "Tên ảnh là bắt buộc!";
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
        // nếu không có ảnh mới được upload
        $imageName = $imageName !== null ? $imageName : (isset($_POST['current_image']) ? trim($_POST['current_image']) : '');
        update_canhdep_by_id($_GET['id'], $name, $imageName, $hide);
        $_SESSION['alert'] = [
            'message' => 'Sửa ảnh thành công.',
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
<h3 style="text-align: center">Sửa thông tin ảnh</h3>
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
    function showCurrentImage(previewId, imagePath) {
        if (imagePath) {
            const preview = document.getElementById(previewId);
            preview.src = imagePath;
            preview.style.display = 'block';
        }
    }
</script>
<div class="form-container">
    <form action="ad-controller/HomeManage/update_canhdep.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
        <!-- Thêm trường ẩn để lưu ID ảnh -->
        <input type="hidden" name="slide_id" value="<?php echo $canhdep['id']; ?>">
        
        <div class="form-group">
            <label for="name">Tên ảnh:</label>
            <input type="text" id="name" name="name" maxlength="255" value="<?php echo htmlspecialchars($canhdep['name']); ?>" required>
        </div>
        
        <!-- Thêm trường ẩn để lưu tên ảnh hiện tại -->
        <input type="hidden" name="current_image" value="<?php echo htmlspecialchars($canhdep['image']); ?>">
        
        <div class="form-group">
            <label for="image">Ảnh mới(nếu có):</label>
            <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(this, 'preview1')">
            <img id="preview1" src="<?php echo !empty($canhdep['image']) ? '../upload/image/canhdepchay/'.htmlspecialchars($canhdep['image']) : '#'; ?>" 
                 alt="Preview image" class="file-preview" 
                 style="display: <?php echo !empty($canhdep['image']) ? 'block' : 'none'; ?>;">
        </div>
        
        
        <div class="form-group checkbox-container">
            <input type="checkbox" id="hide" name="hide" value="1" <?php echo ($canhdep['hide'] == 1) ? 'checked' : ''; ?>>
            <label for="hide">Ẩn</label>
        </div>
        
        
        <div class="btn-container">
            <button type="submit" class="btn" name="btn-updatecanhdep">Cập nhật thông tin ảnh</button>
            <a href="index-admin.php?pg=home" class="btn" style="background: #f44336; margin-left: 10px; text-decoration: none; display: inline-block; padding: 10px 15px; color: white;">Hủy</a>
        </div>
    </form>
</div>
