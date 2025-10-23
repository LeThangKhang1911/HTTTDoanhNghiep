<?php
    require_once 'ad-model/AdminXuhuong/get_xuhuong.php';
    $news_list = get_news_by_id($_GET['id']);
    $news = $news_list[0];

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
<h3 style="text-align: center">Sửa tin tức</h3>
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
    <form action="ad-controller/XuhuongManage/update_news.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
        <!-- Thêm trường ẩn để lưu ID tin tức -->
        <input type="hidden" name="news_id" value="<?php echo $news['id']; ?>">
        
        <div class="form-group">
            <label for="name">Tiêu đề:</label>
            <input type="text" id="name" name="name" maxlength="255" value="<?php echo ($news['name']); ?>" required>
        </div>
        
        <!-- Thêm trường ẩn để lưu tên ảnh hiện tại -->
        <input type="hidden" name="current_image" value="<?php echo ($news['image']); ?>">
        
        <div class="form-group">
            <label for="image">Ảnh bìa:</label>
            <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(this, 'preview1')">
            <img id="preview1" src="<?php echo !empty($news['image']) ? '../upload/image/news/'.($news['image']) : '#'; ?>" 
                 alt="Preview image" class="file-preview" 
                 style="display: <?php echo !empty($news['image']) ? 'block' : 'none'; ?>;">
        </div>
        
        <!-- Thêm trường ẩn để lưu tên ảnh chi tiết 1 hiện tại -->
        <input type="hidden" name="current_image2" value="<?php echo ($news['image2']); ?>">
        
        <div class="form-group">
            <label for="image2">Ảnh chi tiết 1:</label>
            <input type="file" id="image2" name="image2" accept="image/*" onchange="previewImage(this, 'preview2')">
            <img id="preview2" src="<?php echo !empty($news['image2']) ? '../upload/image/news/'.($news['image2']) : '#'; ?>" 
                 alt="Preview image" class="file-preview"
                 style="display: <?php echo !empty($news['image2']) ? 'block' : 'none'; ?>;">
        </div>
        
        <!-- Thêm trường ẩn để lưu tên ảnh chi tiết 2 hiện tại -->
        <input type="hidden" name="current_image3" value="<?php echo ($news['image3']); ?>">
        
        <div class="form-group">
            <label for="image3">Ảnh chi tiết 2:</label>
            <input type="file" id="image3" name="image3" accept="image/*" onchange="previewImage(this, 'preview3')">
            <img id="preview3" src="<?php echo !empty($news['image3']) ? '../upload/image/news/'.($news['image3']) : '#'; ?>" 
                 alt="Preview image" class="file-preview"
                 style="display: <?php echo !empty($news['image3']) ? 'block' : 'none'; ?>;">
        </div>
        
        <div class="form-group">
            <label for="description">Mô tả ngắn:</label>
            <textarea id="description" name="description"><?php echo ($news['description']); ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="detail">Nội dung chi tiết:</label>
            <textarea id="detail" name="detail"><?php echo ($news['detail']); ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="meta">Meta:</label>
            <input type="text" id="meta" name="meta" maxlength="255" value="<?php echo ($news['meta']); ?>">
        </div>
        
        <div class="form-group checkbox-container">
            <input type="checkbox" id="hide" name="hide" value="1" <?php echo ($news['hide'] == 1) ? 'checked' : ''; ?>>
            <label for="hide">Ẩn</label>
        </div>
        
        <div class="form-group">
            <label for="ordered">Thứ tự hiển thị:</label>
            <input type="number" id="ordered" name="ordered" min="0" value="<?php echo (int)$news['ordered']; ?>">
        </div>
        
        <div class="btn-container">
            <button type="submit" class="btn" name="btn-updatenews">Cập nhật tin tức</button>
            <a href="index-admin.php?pg=news" class="btn" style="background: #f44336; margin-left: 10px; text-decoration: none; display: inline-block; padding: 10px 15px; color: white;">Hủy</a>
        </div>
    </form>
</div>

<script>
    // Replace the <textarea id="editor1"> with a CKEditor 4
    // instance, using default configuration.
    CKEDITOR.replace( 'detail' );
    CKEDITOR.replace('description');
</script>