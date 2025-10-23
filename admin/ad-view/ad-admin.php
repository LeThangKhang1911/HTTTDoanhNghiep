<?php
    require_once 'ad-model/AdminManagement/get_admin.php';
    $ad_list = get_admin();
    if ($_SESSION['admin']['capbac']!=1) {
        echo "<script>
                alert('Cấp bậc của bạn không đủ để vào trang này!');
                window.location.href='index-admin.php';
            </script>";
        exit();
    }
?>

<h2 style="margin-top: 20px; text-align: center;">Danh sách tất cả quản trị viên trang web</h2>

<div style="text-align: right; margin-bottom: 15px;">
    <button class="btn btn-success" onclick="openAddModal()">
        <i class="fas fa-plus"></i> Thêm quản trị viên
    </button>
</div>

<table class="table" style="margin-top: 10px;">
  <thead>
    <tr>
      <th scope="col" style="text-align:center;">ID</th>
      <th scope="col" style="text-align:center;">Họ và tên</th>
      <th scope="col" style="text-align:center;">Email</th>
      <th scope="col" style="text-align:center;">Cấp bậc</th>
      <th scope="col" style="text-align:center;">Ngày cấp tài khoản</th>
      <th scope="col" style="text-align:center;">Quyền truy cập</th>
      <th scope="col" style="text-align:center;">Điều chỉnh</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach($ad_list as $ad){
    ?>
        <tr>
            <th scope="row" style="text-align: center;"><?php echo $ad['id']; ?></th>
            <td style="text-align: center;"><?php echo $ad['fullname']; ?></td>
            <td style="text-align: center;"><?php echo $ad['email']; ?></td>
            <td style="text-align: center;"><?php echo $ad['hang']; ?></td>
            <td style="text-align: center;"><?php echo date('d/m/Y H:i:s', strtotime($ad['databegin'])); ?></td>
            <td style="text-align: center;">
                <?php 
                    if($ad['hoatdong']==1){
                        echo "Có";
                    }
                    else {
                        echo "Không";
                    }
                ?>
            </td>
            <td style="text-align: center;">
                <button class="btn btn-warning btn-sm edit-btn" onclick="openEditModal(<?php echo $ad['id']; ?>, '<?php echo htmlspecialchars($ad['fullname'], ENT_QUOTES, 'UTF-8'); ?>', '<?php echo htmlspecialchars($ad['email'], ENT_QUOTES, 'UTF-8'); ?>', '<?php echo htmlspecialchars($ad['hang'], ENT_QUOTES, 'UTF-8'); ?>', <?php echo $ad['hoatdong']; ?>)">Sửa</button>
                <a href="ad-controller/AdminManage/delete_ad.php?idad=<?php echo $ad['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
            </td>
        </tr>
    <?php } ?>
  </tbody>
</table>

<!-- Modal Form cho Sửa quản trị viên -->
<div id="editAdminModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('editAdminModal')">&times;</span>
        <h2>Sửa thông tin quản trị viên</h2>
        <form id="editAdminForm" method="post" action="../ad-controller/AdminManage/update_ad.php">
            <input type="hidden" id="adminId" name="idad">
            
            <div class="form-group">
                <label for="adminName">Họ và tên:</label>
                <input type="text" id="adminName" name="fullname" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="adminEmail">Email:</label>
                <input type="email" id="adminEmail" name="email" class="form-control" required>
            </div>
            

            <div class="form-group">
                <label for="adminRank">Cấp bậc:</label>
                <input type="text" id="adminRank" name="hang" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="adminStatus">Quyền truy cập:</label>
                <select id="adminStatus" name="hoatdong" class="form-control">
                    <option value="1">Có</option>
                    <option value="0">Không</option>
                </select>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                <button type="button" class="btn btn-secondary" onclick="closeModal('editAdminModal')">Hủy bỏ</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Form cho Thêm quản trị viên -->
<div id="addAdminModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('addAdminModal')">&times;</span>
        <h2>Thêm quản trị viên mới</h2>
        <form id="addAdminForm" method="post" action="../ad-controller/AdminManage/add_ad.php">
            <div class="form-group">
                <label for="newAdminName">Họ và tên:</label>
                <input type="text" id="newAdminName" name="fullname" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="newAdminEmail">Email:</label>
                <input type="email" id="newAdminEmail" name="email" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="newAdminPassword">Mật khẩu:</label>
                <input type="password" id="newAdminPassword" name="password" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="newAdminRank">Cấp bậc:</label>
                <input type="text" id="newAdminRank" name="hang" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="newAdminStatus">Quyền truy cập:</label>
                <select id="newAdminStatus" name="hoatdong" class="form-control">
                    <option value="1">Có</option>
                    <option value="0">Không</option>
                </select>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success">Thêm mới</button>
                <button type="button" class="btn btn-secondary" onclick="closeModal('addAdminModal')">Hủy bỏ</button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Modal styling */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow: auto;
    }
    
    .modal-content {
        background-color: #fff;
        margin: 10% auto;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: 60%;
        max-width: 600px;
        position: relative;
    }
    
    .close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
    }
    
    .form-group {
        margin-bottom: 15px;
    }
    
    
</style>

<script>
    
    function openEditModal(adminId, fullname, email, rank, status) {
        // Hiển thị modal
        document.getElementById('editAdminModal').style.display = 'block';
        
        // Đổ dữ liệu vào form
        document.getElementById('adminId').value = adminId;
        document.getElementById('adminName').value = fullname;
        document.getElementById('adminEmail').value = email;
        document.getElementById('adminRank').value = rank;
        document.getElementById('adminStatus').value = status;
    }
    
    // Function to open the Add modal
    function openAddModal() {
        // Hiển thị modal
        document.getElementById('addAdminModal').style.display = 'block';
        
        // Reset form nếu cần
        document.getElementById('addAdminForm').reset();
    }
    
    // Function to close the modal
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }
    
    // đóng form nếu click bên ngoài
    window.onclick = function(event) {
        if (event.target == document.getElementById('editAdminModal')) {
            closeModal('editAdminModal');
        }
        if (event.target == document.getElementById('addAdminModal')) {
            closeModal('addAdminModal');
        }
    }
    
    // Submit form Edit với AJAX
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('editAdminForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Tạo FormData object từ form
            const formData = new FormData(this);
            
            // Gửi dữ liệu bằng AJAX
            fetch('ad-controller/AdminManage/update_ad.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                closeModal('editAdminModal');
                // Làm mới trang để hiển thị dữ liệu đã cập nhật
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
        
        // Submit form Add với AJAX
        document.getElementById('addAdminForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Tạo FormData object từ form
            const formData = new FormData(this);
            
            // Gửi dữ liệu bằng AJAX
            fetch('ad-controller/AdminManage/add_admin.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                alert('Thêm quản trị viên mới thành công!');
                closeModal('addAdminModal');
                // Làm mới trang để hiển thị dữ liệu mới
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Đã xảy ra lỗi khi thêm quản trị viên mới. Vui lòng thử lại sau.');
            });
        });
    });
</script>