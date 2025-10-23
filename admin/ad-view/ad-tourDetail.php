<?php
require_once __DIR__ . '/../ad-model/AdminTour/get_tour.php';
require_once __DIR__ . '/../ad-model/AdminTour/get_tourdetail.php';
$tour_id = isset($_GET['id']) ? $_GET['id'] : 0;
if ($tour_id <= 0) {
    die("ID tour không hợp lệ.");
}
$tour = get_tour_by_id($tour_id);
if (!$tour) {
    die("Không tìm thấy tour với ID: " . $tour_id);
}
$chitiettour = get_chitiettour_by_tourid($tour_id);
$lichtrinhtour = get_lichtrinhtour_by_tourid($tour_id);

// Lấy danh sách danh mục
function get_all_categories() {
    $sql = "SELECT id, name FROM category ORDER BY name ASC";
    return pdo_query($sql);
}
$categories = get_all_categories();
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
    h3, h4 {
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
    input[type="text"], textarea, input[type="number"], select {
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
    .btn-danger {
        background: #f44336;
    }
    .btn-danger:hover {
        background: #e53935;
    }
</style>
<h3 style="text-align: center">Sửa thông tin tour</h3>
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
    <form action="ad-controller/TourManage/update_tour.php" method="post" enctype="multipart/form-data">
        <!-- Thêm trường ẩn để lưu ID tour -->
        <input type="hidden" name="id" value="<?php echo $tour['id']; ?>">
        
        <div class="form-group">
            <label for="name">Tên tour:</label>
            <input type="text" id="name" name="name" maxlength="255" value="<?php echo htmlspecialchars($tour['name']); ?>" required>
        </div>
        
        <!-- Thêm trường ẩn để lưu tên ảnh hiện tại -->
        <input type="hidden" name="current_image" value="<?php echo htmlspecialchars($tour['image']); ?>">
        
        <div class="form-group">
            <label for="image">Ảnh bìa:</label>
            <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(this, 'preview1')">
            <img id="preview1" src="<?php echo !empty($tour['image']) ? '../upload/image/tour/' . htmlspecialchars($tour['image']) : '#'; ?>" 
                 alt="Preview image" class="file-preview" 
                 style="display: <?php echo !empty($tour['image']) ? 'block' : 'none'; ?>;">
        </div>
        
        <div class="form-group">
            <label for="price">Giá:</label>
            <input type="number" id="price" name="price" step="0.01" value="<?php echo htmlspecialchars($tour['price']); ?>" required>
        </div>
        
        <div class="form-group">
            <label for="price_sale">Giá khuyến mãi:</label>
            <input type="number" id="price_sale" name="price_sale" step="0.01" value="<?php echo htmlspecialchars($tour['price_sale'] ?? 0); ?>">
        </div>
        
        <div class="form-group">
            <label for="sale_percent">Phần trăm giảm giá:</label>
            <input type="number" id="sale_percent" name="sale_percent" value="<?php echo htmlspecialchars($tour['sale_percent'] ?? 0); ?>">
        </div>
        
        <div class="form-group">
            <label for="vehicle">Phương tiện:</label>
            <input type="text" id="vehicle" name="vehicle" value="<?php echo htmlspecialchars($tour['vehicle'] ?? ''); ?>">
        </div>
        
        <div class="form-group">
            <label for="khoihanh">Khởi hành:</label>
            <input type="text" id="khoihanh" name="khoihanh" value="<?php echo htmlspecialchars($tour['khoihanh'] ?? ''); ?>">
        </div>
        
        <div class="form-group">
            <label for="thoigian">Thời gian:</label>
            <input type="text" id="thoigian" name="thoigian" value="<?php echo htmlspecialchars($tour['thoigian'] ?? ''); ?>">
        </div>
        
        <div class="form-group">
            <label for="diemkhoihanh">Điểm khởi hành:</label>
            <textarea id="diemkhoihanh" name="diemkhoihanh"><?php echo ($tour['diemkhoihanh'] ?? ''); ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea id="description" name="description"><?php echo ($tour['description']); ?></textarea>
        </div>
        
        <div class="form-group checkbox-container">
            <input type="checkbox" id="hide" name="hide" value="1" <?php echo ($tour['hide'] == 1) ? 'checked' : ''; ?>>
            <label for="hide">Ẩn</label>
        </div>
        
        <div class="form-group">
            <label for="ordered">Thứ tự hiển thị:</label>
            <input type="number" id="ordered" name="ordered" min="0" value="<?php echo (int)$tour['ordered']; ?>">
        </div>
        
        <div class="form-group">
            <label for="meta">Meta:</label>
            <input type="text" id="meta" name="meta" value="<?php echo htmlspecialchars($tour['meta'] ?? ''); ?>">
        </div>
        
        <div class="form-group">
            <label for="categoryid">Danh mục:</label>
            <select id="categoryid" name="categoryid" required>
                <option value="">Chọn danh mục</option>
                <?php foreach ($categories as $category) { ?>
                    <option value="<?php echo $category['id']; ?>" <?php echo ($tour['categoryid'] == $category['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($category['name']); ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        
        <div class="form-group">
            <label for="phanhang">Phân hạng:</label>
            <input type="number" id="phanhang" name="phanhang" min="0" value="<?php echo (int)$tour['phanhang']; ?>">
        </div>
        
        <div class="btn-container">
            <button type="submit" class="btn" name="btn-updatetour">Cập nhật tour</button>
            <a href="index-admin.php?pg=tour" class="btn btn-danger" style="margin-left: 10px; text-decoration: none; display: inline-block; padding: 10px 15px; color: white;">Hủy</a>
        </div>
    </form>
</div>

<!-- Form chi tiết tour -->
<div class="form-container" style="margin-top: 20px;">
    <h4 style="text-align: center;">Sửa chi tiết tour</h4>
    <form action="ad-controller/TourManage/update_tour.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo isset($chitiettour['id']) ? $chitiettour['id'] : ''; ?>">
        <input type="hidden" name="tourid" value="<?php echo $tour_id; ?>">
        <input type="hidden" name="current_image1" value="<?php echo htmlspecialchars($chitiettour['image1'] ?? ''); ?>">
        <input type="hidden" name="current_image2" value="<?php echo htmlspecialchars($chitiettour['image2'] ?? ''); ?>">
        <input type="hidden" name="current_image3" value="<?php echo htmlspecialchars($chitiettour['image3'] ?? ''); ?>">
        
        <div class="form-group">
            <label for="mota1">Mô tả chi tiết:</label>
            <textarea id="mota1" name="mota1"><?php echo htmlspecialchars($chitiettour['mota1'] ?? ''); ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="image1">Ảnh chi tiết 1:</label>
            <input type="file" id="image1" name="image1" accept="image/*" onchange="previewImage(this, 'preview2')">
            <img id="preview2" src="<?php echo !empty($chitiettour['image1']) ? '../upload/image/tour/' . htmlspecialchars($chitiettour['image1']) : '#'; ?>" 
                 alt="Preview image" class="file-preview" 
                 style="display: <?php echo !empty($chitiettour['image1']) ? 'block' : 'none'; ?>;">
        </div>
        
        <div class="form-group">
            <label for="image2">Ảnh chi tiết 2:</label>
            <input type="file" id="image2" name="image2" accept="image/*" onchange="previewImage(this, 'preview3')">
            <img id="preview3" src="<?php echo !empty($chitiettour['image2']) ? '../upload/image/tour/' . htmlspecialchars($chitiettour['image2']) : '#'; ?>" 
                 alt="Preview image" class="file-preview" 
                 style="display: <?php echo !empty($chitiettour['image2']) ? 'block' : 'none'; ?>;">
        </div>
        
        <div class="form-group">
            <label for="image3">Ảnh chi tiết 3:</label>
            <input type="file" id="image3" name="image3" accept="image/*" onchange="previewImage(this, 'preview4')">
            <img id="preview4" src="<?php echo !empty($chitiettour['image3']) ? '../upload/image/tour/' . htmlspecialchars($chitiettour['image3']) : '#'; ?>" 
                 alt="Preview image" class="file-preview" 
                 style="display: <?php echo !empty($chitiettour['image3']) ? 'block' : 'none'; ?>;">
        </div>
        
        <div class="btn-container">
            <button type="submit" class="btn" name="btn-updatechitiettour">Cập nhật chi tiết</button>
            <a href="index-admin.php?pg=tourdetail&id=<?php echo $tour_id; ?>" class="btn btn-danger" style="margin-left: 10px; text-decoration: none; display: inline-block; padding: 10px 15px; color: white;">Hủy</a>
        </div>
    </form>
</div>

<!-- Form lịch trình tour -->
<div class="form-container" style="margin-top: 20px;">
    <h4 style="text-align: center;">Sửa lịch trình tour</h4>
    <form action="ad-controller/TourManage/update_tour.php" method="post">
        <input type="hidden" name="id" value="<?php echo isset($lichtrinhtour['id']) ? $lichtrinhtour['id'] : ''; ?>">
        <input type="hidden" name="tourid" value="<?php echo $tour_id; ?>">
        
        <div class="form-group">
            <label for="Ngay1">Ngày 1:</label>
            <textarea id="Ngay1" name="Ngay1"><?php echo htmlspecialchars($lichtrinhtour['Ngay1'] ?? ''); ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="Ngay2">Ngày 2:</label>
            <textarea id="Ngay2" name="Ngay2"><?php echo htmlspecialchars($lichtrinhtour['Ngay2'] ?? ''); ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="Ngay3">Ngày 3:</label>
            <textarea id="Ngay3" name="Ngay3"><?php echo htmlspecialchars($lichtrinhtour['Ngay3'] ?? ''); ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="Ngay4">Ngày 4:</label>
            <textarea id="Ngay4" name="Ngay4"><?php echo htmlspecialchars($lichtrinhtour['Ngay4'] ?? ''); ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="Ngay5">Ngày 5:</label>
            <textarea id="Ngay5" name="Ngay5"><?php echo htmlspecialchars($lichtrinhtour['Ngay5'] ?? ''); ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="Ngay6">Ngày 6:</label>
            <textarea id="Ngay6" name="Ngay6"><?php echo htmlspecialchars($lichtrinhtour['Ngay6'] ?? ''); ?></textarea>
        </div>
        
        <div class="btn-container">
            <button type="submit" class="btn" name="btn-updatelichtrinhtour">Cập nhật lịch trình</button>
            <a href="index-admin.php?pg=tourdetail&id=<?php echo $tour_id; ?>" class="btn btn-danger" style="margin-left: 10px; text-decoration: none; display: inline-block; padding: 10px 15px; color: white;">Hủy</a>
        </div>
    </form>
</div>

<!-- Bảng bình luận -->
<div class="form-container" style="margin-top: 20px;">
    <h4 style="text-align: center;">Bình luận</h4>
    <table class="table">
        <thead>
            <tr>
                <th style="text-align: center;">ID</th>
                <th style="text-align: center;">Người dùng</th>
                <th style="text-align: center;">Nội dung</th>
                <th style="text-align: center;">Ngày</th>
                <th style="text-align: center;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once __DIR__ . '/../ad-model/AdminTour/get_tour.php';
            $comments = get_comments_by_tourid($tour_id);
            foreach ($comments as $comment) { ?>
                <tr>
                    <td style="text-align: center;"><?php echo $comment['id']; ?></td>
                    <td style="text-align: center;"><?php echo htmlspecialchars($comment['fullname'] ?? 'Khách'); ?></td>
                    <td style="text-align: center;"><?php echo htmlspecialchars($comment['content']); ?></td>
                    <td style="text-align: center;"><?php echo date('d/m/Y H:i:s', strtotime($comment['datecomment'])); ?></td>
                    <td style="text-align: center;">
                        <a href="ad-controller/TourManage/update_tour.php?action=delete_comment&comment_id=<?php echo $comment['id']; ?>&tourid=<?php echo $tour_id; ?>" 
                           class="btn btn-danger" 
                           style="padding: 5px 10px; text-decoration: none; color: white;"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này không?')">Xóa</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="path/to/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('mota1');
    CKEDITOR.replace('Ngay1');
    CKEDITOR.replace('Ngay2');
    CKEDITOR.replace('Ngay3');
    CKEDITOR.replace('Ngay4');
    CKEDITOR.replace('Ngay5');
    CKEDITOR.replace('Ngay6');
</script>