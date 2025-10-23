<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../ad-model/AdminTour/get_tour.php';
require_once __DIR__ . '/../../ad-model/AdminTour/get_tourdetail.php';
require_once __DIR__ . '/../../ad-model/AdminManagement/get_dieuchinh.php';

// Lấy danh sách danh mục
function get_all_categories()
{
    $sql = "SELECT id, name FROM category ORDER BY name ASC";
    return pdo_query($sql);
}
$categories = get_all_categories();

// Lấy dữ liệu từ session nếu có (để điền lại form)
$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];
unset($_SESSION['form_data']); // Xóa sau khi lấy

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn-addtour'])) {
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
    $sale_percent = isset($_POST['sale_percent']) ? intval($_POST['sale_percent']) : 0;
    $vehicle = isset($_POST['vehicle']) ? trim($_POST['vehicle']) : '';
    $khoihanh = isset($_POST['khoihanh']) ? trim($_POST['khoihanh']) : '';
    $thoigian = isset($_POST['thoigian']) ? trim($_POST['thoigian']) : '';
    $diemkhoihanh = isset($_POST['diemkhoihanh']) ? trim($_POST['diemkhoihanh']) : '';
    $description = isset($_POST['description']) ? trim($_POST['description']) : '';
    $hide = isset($_POST['hide']) ? 1 : 0;
    $ordered = isset($_POST['ordered']) ? intval($_POST['ordered']) : 0;
    $meta = isset($_POST['meta']) ? trim($_POST['meta']) : '';
    $categoryid = isset($_POST['categoryid']) ? intval($_POST['categoryid']) : 0;
    $phanhang = isset($_POST['phanhang']) ? intval($_POST['phanhang']) : 0;

    // Chi tiết tour
    $mota1 = isset($_POST['mota1']) ? trim($_POST['mota1']) : '';
    // Lịch trình tour
    $Ngay1 = isset($_POST['Ngay1']) ? trim($_POST['Ngay1']) : '';
    $Ngay2 = isset($_POST['Ngay2']) ? trim($_POST['Ngay2']) : '';
    $Ngay3 = isset($_POST['Ngay3']) ? trim($_POST['Ngay3']) : '';
    $Ngay4 = isset($_POST['Ngay4']) ? trim($_POST['Ngay4']) : '';
    $Ngay5 = isset($_POST['Ngay5']) ? trim($_POST['Ngay5']) : '';
    $Ngay6 = isset($_POST['Ngay6']) ? trim($_POST['Ngay6']) : '';

    // Tính giá khuyến mãi
    $price_sale = ($sale_percent > 0 && $sale_percent <= 100) ? $price * (1 - $sale_percent / 100) : $price;

    // Kiểm tra dữ liệu bắt buộc
    $errors = [];
    if (empty($name)) {
        $errors[] = "Tên tour là bắt buộc!";
    }
    if ($price <= 0) {
        $errors[] = "Giá tour phải lớn hơn 0!";
    }
    if (empty($_FILES['image']['name'])) {
        $errors[] = "Ảnh bìa là bắt buộc!";
    }
    if ($categoryid <= 0 || !pdo_query_one("SELECT id FROM category WHERE id = ?", $categoryid)) {
        $errors[] = "Danh mục không hợp lệ!";
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
    $uploadDir = __DIR__ . '/../../../upload/image/tour/';
    $maxFileSize = 100 * 1024 * 1024; // 100MB

    // Tạo thư mục nếu chưa tồn tại
    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0777, true)) {
            die("Không thể tạo thư mục $uploadDir! Kiểm tra quyền thư mục cha.");
        }
    }

    // Kiểm tra quyền ghi thư mục
    if (!is_writable($uploadDir)) {
        die("Thư mục $uploadDir không có quyền ghi! Vui lòng kiểm tra quyền thư mục.");
    }

    // Hàm xử lý tải lên tệp
    function uploadFile($fileKey, $uploadDir, $maxFileSize)
    {
        if (!empty($_FILES[$fileKey]['name'])) {
            $file = $_FILES[$fileKey];
            $originalFileName = basename($file['name']);
            $cleanFileName = preg_replace('/[^A-Za-z0-9\-_\.]/', '_', $originalFileName);
            $filePath = $uploadDir . $cleanFileName;
            $fileSize = $file['size'];

            if ($fileSize > $maxFileSize) {
                die("Tệp $fileKey quá lớn! Giới hạn là 100MB.");
            }

            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                return $cleanFileName;
            } else {
                die("Lỗi khi tải lên tệp $fileKey! Đường dẫn đích: $filePath");
            }
        }
        return null;
    }

    // Xử lý tải lên ảnh
    $image = uploadFile('image', $uploadDir, $maxFileSize);
    $image1 = uploadFile('image1', $uploadDir, $maxFileSize);
    $image2 = uploadFile('image2', $uploadDir, $maxFileSize);
    $image3 = uploadFile('image3', $uploadDir, $maxFileSize);

    // Kiểm tra các ảnh chi tiết
    if ($image1 === null || $image2 === null || $image3 === null) {
        echo "<ul><li style='color: red;'>Tất cả các ảnh chi tiết (image1, image2, image3) là bắt buộc!</li></ul>";
        die();
    }

    // Thêm tour và lấy ID
    $tour_id = add_tour($name, $price, $price_sale, $sale_percent, $image, $vehicle, $khoihanh, $thoigian, $diemkhoihanh, $description, $hide, $ordered, $meta, $categoryid, $phanhang);

    // Thêm chi tiết tour
    if ($tour_id) {
        add_chitiettour($tour_id, $mota1, $image1, $image2, $image3);
    }

    // Thêm lịch trình tour
    if ($tour_id) {
        add_lichtrinhtour($tour_id, $Ngay1, $Ngay2, $Ngay3, $Ngay4, $Ngay5, $Ngay6);
    }

    // Ghi log vào dieuchinhtour
    $adminid = isset($_SESSION['admin']['adid']) ? $_SESSION['admin']['adid'] : 1;
    add_dieuchinhtour($tour_id, $adminid, "Thêm");

    // Lưu thông báo thành công và chuyển hướng bằng JavaScript
    $_SESSION['alert'] = [
        'message' => 'Thêm tour thành công.',
        'type' => 'success'
    ];
    $baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . '/CuoiKi_LTWUD/admin/index-admin.php';
    echo '<script>window.location.href = "' . $baseUrl . '?pg=tour";</script>';
    exit(); // Đảm bảo dừng thực thi sau khi chuyển hướng
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tour Mới</title>
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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
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

        input[type="text"],
        textarea,
        input[type="number"],
        select {
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
            /* Ẩn preview mặc định khi chưa chọn ảnh */
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

        .btn-cancel {
            background: #f44336;
            margin-left: 10px;
        }

        .btn-cancel:hover {
            background: #d32f2f;
        }

        h4 {
            color: #333;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h3>Thêm tour mới</h3>
        <form method="POST" enctype="multipart/form-data" onsubmit="return validateFiles()">
            <div class="form-group">
                <label for="name">Tên tour</label>
                <input type="text" id="name" name="name" maxlength="255" value="<?php echo isset($form_data['name']) ? htmlspecialchars($form_data['name']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Giá gốc</label>
                <input type="number" id="price" name="price" step="0.01" value="<?php echo isset($form_data['price']) ? htmlspecialchars($form_data['price']) : ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="sale_percent">Phần trăm giảm giá (%)</label>
                <input type="number" id="sale_percent" name="sale_percent" min="0" max="100" value="<?php echo isset($form_data['sale_percent']) ? htmlspecialchars($form_data['sale_percent']) : ''; ?>">
            </div>
            <div class="form-group">
                <label>Giá sau khuyến mãi</label>
                <input type="number" id="price_sale_display" name="price_sale_display" step="0.01" value="<?php echo isset($form_data['price']) && isset($form_data['sale_percent']) ? htmlspecialchars(number_format($form_data['price'] * (1 - $form_data['sale_percent'] / 100), 2)) : '0.00'; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="image">Hình ảnh</label>
                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(this, 'preview1')" required>
                <img id="preview1" src="#" alt="Preview image" class="file-preview">
            </div>
            <div class="form-group">
                <label for="vehicle">Phương tiện</label>
                <input type="text" id="vehicle" name="vehicle" value="<?php echo isset($form_data['vehicle']) ? htmlspecialchars($form_data['vehicle']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="khoihanh">Khởi hành</label>
                <input type="text" id="khoihanh" name="khoihanh" value="<?php echo isset($form_data['khoihanh']) ? htmlspecialchars($form_data['khoihanh']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="thoigian">Thời gian</label>
                <input type="text" id="thoigian" name="thoigian" value="<?php echo isset($form_data['thoigian']) ? htmlspecialchars($form_data['thoigian']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="diemkhoihanh">Điểm khởi hành</label>
                <textarea id="diemkhoihanh" name="diemkhoihanh"><?php echo isset($form_data['diemkhoihanh']) ? ($form_data['diemkhoihanh']) : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea id="description" name="description"><?php echo isset($form_data['description']) ? ($form_data['description']) : ''; ?></textarea>
            </div>
            <div class="form-group checkbox-container">
                <input type="checkbox" id="hide" name="hide" value="1" <?php echo isset($form_data['hide']) ? 'checked' : ''; ?>>
                <label for="hide">Ẩn</label>
            </div>
            <div class="form-group">
                <label for="ordered">Thứ tự hiển thị</label>
                <input type="number" id="ordered" name="ordered" min="0" value="<?php echo isset($form_data['ordered']) ? htmlspecialchars($form_data['ordered']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="meta">Meta</label>
                <input type="text" id="meta" name="meta" maxlength="255" value="<?php echo isset($form_data['meta']) ? ($form_data['meta']) : ''; ?>">
            </div>
            <div class="form-group">
                <label for="categoryid">Danh mục</label>
                <select id="categoryid" name="categoryid" required>
                    <option value="">Chọn danh mục</option>
                    <?php foreach ($categories as $category) { ?>
                        <option value="<?php echo $category['id']; ?>" <?php echo isset($form_data['categoryid']) && $form_data['categoryid'] == $category['id'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category['name']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="phanhang">Phân hạng</label>
                <input type="number" id="phanhang" name="phanhang" min="0" value="<?php echo isset($form_data['phanhang']) ? ($form_data['phanhang']) : ''; ?>">
            </div>
            <h4>Chi tiết tour</h4>
            <div class="form-group">
                <label for="mota1">Mô tả chi tiết</label>
                <textarea id="mota1" name="mota1"><?php echo isset($form_data['mota1']) ? ($form_data['mota1']) : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="image1">Ảnh chi tiết 1</label>
                <input type="file" id="image1" name="image1" accept="image/*" onchange="previewImage(this, 'preview2')" required>
                <img id="preview2" src="#" alt="Preview image" class="file-preview">
            </div>
            <div class="form-group">
                <label for="image2">Ảnh chi tiết 2</label>
                <input type="file" id="image2" name="image2" accept="image/*" onchange="previewImage(this, 'preview3')" required>
                <img id="preview3" src="#" alt="Preview image" class="file-preview">
            </div>
            <div class="form-group">
                <label for="image3">Ảnh chi tiết 3</label>
                <input type="file" id="image3" name="image3" accept="image/*" onchange="previewImage(this, 'preview4')" required>
                <img id="preview4" src="#" alt="Preview image" class="file-preview">
            </div>
            <h4>Lịch trình tour</h4>
            <div class="form-group">
                <label for="Ngay1">Ngày 1</label>
                <textarea id="Ngay1" name="Ngay1"><?php echo isset($form_data['Ngay1']) ? ($form_data['Ngay1']) : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="Ngay2">Ngày 2</label>
                <textarea id="Ngay2" name="Ngay2"><?php echo isset($form_data['Ngay2']) ? ($form_data['Ngay2']) : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="Ngay3">Ngày 3</label>
                <textarea id="Ngay3" name="Ngay3"><?php echo isset($form_data['Ngay3']) ? ($form_data['Ngay3']) : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="Ngay4">Ngày 4</label>
                <textarea id="Ngay4" name="Ngay4"><?php echo isset($form_data['Ngay4']) ? ($form_data['Ngay4']) : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="Ngay5">Ngày 5</label>
                <textarea id="Ngay5" name="Ngay5"><?php echo isset($form_data['Ngay5']) ? ($form_data['Ngay5']) : ''; ?></textarea>
            </div>
            <div class="form-group">
                <label for="Ngay6">Ngày 6</label>
                <textarea id="Ngay6" name="Ngay6"><?php echo isset($form_data['Ngay6']) ? ($form_data['Ngay6']) : ''; ?></textarea>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn" name="btn-addtour">Thêm tour</button>
                <button type="reset" class="btn btn-cancel">Hủy</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="../view/layout/js/show_alert.js"></script>
    <script>
        function previewImage(input, previewId) {
            var preview = document.getElementById(previewId);
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                preview.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '#';
                preview.style.display = 'none';
            }
        }

        // Cập nhật giá khuyến mãi khi thay đổi price hoặc sale_percent
        function updatePriceSale() {
            var price = parseFloat(document.getElementById('price').value) || 0;
            var salePercent = parseInt(document.getElementById('sale_percent').value) || 0;
            var priceSale = price * (1 - salePercent / 100);
            document.getElementById('price_sale_display').value = priceSale.toFixed(2);
        }

        // Thêm sự kiện khi thay đổi giá hoặc phần trăm giảm
        document.getElementById('price').addEventListener('input', updatePriceSale);
        document.getElementById('sale_percent').addEventListener('input', updatePriceSale);

        // Khởi tạo CKEditor
        CKEDITOR.replace('description');
        CKEDITOR.replace('diemkhoihanh');
        CKEDITOR.replace('mota1');
        CKEDITOR.replace('Ngay1');
        CKEDITOR.replace('Ngay2');
        CKEDITOR.replace('Ngay3');
        CKEDITOR.replace('Ngay4');
        CKEDITOR.replace('Ngay5');
        CKEDITOR.replace('Ngay6');

        // Gọi lần đầu để hiển thị giá khuyến mãi ban đầu
        updatePriceSale();
    </script>
</body>

</html>