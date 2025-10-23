
<style>
    body {
        background-color: #f5f5f5;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        padding: 20px;
    }
    
    .container {
        max-width: 1000px;
        margin: 0 auto;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }
    
    .header {
        margin-bottom: 30px;
        text-align: center;
    }
    
    .profile-info {
        margin-bottom: 30px;
    }
    
    .info-card {
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }
    
    .info-title {
        font-size: 18px;
        color: #333;
        margin-bottom: 15px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }
    
    .info-row {
        display: flex;
        margin-bottom: 12px;
    }
    
    .info-label {
        font-weight: 600;
        width: 120px;
        color: #555;
    }
    
    .info-value {
        flex: 1;
        color: #333;
    }
    
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
    
    .alert {
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 4px;
    }
    
    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    
    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    
    .password-field-container {
        position: relative;
    }
    
    .toggle-password {
        position: absolute;
        right: 10px;
        top: 10px;
        cursor: pointer;
        color: #777;
    }
</style>


<?php


    // Xử lý thông báo nếu có
    $message = '';
    $message_type = '';
    require_once 'ad-model/AdminManagement/get_admin.php';
    $admin = get_admin_by_id($_SESSION['admin']['adid']);
    $ad = $admin[0];
?>

<div class="container">
    <div class="header">
        <h2>Tài khoản</h2>
    </div>
    
    <!-- Hiển thị thông báo nếu có -->
    <?php if (!empty($message)): ?>
        <div class="alert alert-<?php echo $message_type; ?>">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>
    
    <div class="profile-info">
        <div class="info-card">
            <h2 class="info-title">Thông tin cá nhân</h2>
            
            <div class="info-row">
                <div class="info-label">Họ và tên:</div>
                <div class="info-value"><?php echo htmlspecialchars($ad['fullname']); ?></div>
            </div>
            
            <div class="info-row">
                <div class="info-label">Email:</div>
                <div class="info-value"><?php echo htmlspecialchars($ad['email']); ?></div>
            </div>
            
            <div class="info-row">
                <div class="info-label">Cấp bậc:</div>
                <div class="info-value"><?php echo htmlspecialchars($ad['hang']); ?></div>
            </div>
        </div>
        
        <div style="text-align: right;">
            <button class="btn btn-primary" onclick="openChangePasswordModal()">
                <i class="fas fa-key"></i> Đổi mật khẩu
            </button>
        </div>
    </div>
</div>
<!-- Modal Form cho Đổi mật khẩu -->
<div id="changePasswordModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeModal('changePasswordModal')">&times;</span>
        <h2>Đổi mật khẩu</h2>
        <form id="passwordForm" method="post" action="ad-controller/ad-login-logout/ad-change-pass.php">
            <div class="form-group">
                <label for="current_password">Mật khẩu hiện tại:</label>
                <div class="password-field-container">
                    <input type="password" id="current_password" name="current_password" class="form-control" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="new_password">Mật khẩu mới:</label>
                <div class="password-field-container">
                    <input type="password" id="new_password" name="new_password" class="form-control" required>
                </div>
                <small class="text-danger" id="password-error" style="display: none;"></small>
            </div>
            
            <div class="form-group">
                <label for="confirm_password">Xác nhận mật khẩu:</label>
                <div class="password-field-container">
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                </div>
                <small class="text-danger" id="confirm-error" style="display: none;"></small>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-success" name="btn-changepass">Cập nhật mật khẩu</button>
                <button type="button" class="btn btn-secondary" onclick="closeModal('changePasswordModal')">Hủy bỏ</button>
            </div>
        </form>
    </div>
</div>
<script>
    // Function to open the Change Password modal
    function openChangePasswordModal() {
        document.getElementById('changePasswordModal').style.display = 'block';
        document.getElementById('passwordForm').reset();
        hideAllErrors();
    }
    
    // Function to close the modal
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }
    
    // Close modal if user clicks outside of it
    window.onclick = function(event) {
        if (event.target == document.getElementById('changePasswordModal')) {
            closeModal('changePasswordModal');
        }
    }
    
    // Xử lý toggle hiển thị mật khẩu
    document.addEventListener('DOMContentLoaded', function() {
        // Kiểm tra mật khẩu mới khi nhập
        const newPasswordInput = document.getElementById('new_password');
        const confirmPasswordInput = document.getElementById('confirm_password');
        const passwordError = document.getElementById('password-error');
        const confirmError = document.getElementById('confirm-error');
        
        newPasswordInput.addEventListener('input', function() {
            validateNewPassword();
        });
        
        confirmPasswordInput.addEventListener('input', function() {
            validateConfirmPassword();
        });
        
        // Kiểm tra form trước khi submit
        const passwordForm = document.getElementById('passwordForm');
        passwordForm.addEventListener('submit', function(e) {
            hideAllErrors();
            
            const isNewPasswordValid = validateNewPassword();
            const isConfirmPasswordValid = validateConfirmPassword();
            
            if (!isNewPasswordValid || !isConfirmPasswordValid) {
                e.preventDefault();
            }
        });
        
        function validateNewPassword() {
            const newPassword = newPasswordInput.value;
            
            if (newPassword.length < 8) {
                passwordError.textContent = 'Mật khẩu phải có ít nhất 8 ký tự';
                passwordError.style.display = 'block';
                return false;
            } else {
                passwordError.style.display = 'none';
                return true;
            }
        }
        
        function validateConfirmPassword() {
            const newPassword = newPasswordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            
            if (newPassword !== confirmPassword) {
                confirmError.textContent = 'Mật khẩu xác nhận không khớp';
                confirmError.style.display = 'block';
                return false;
            } else {
                confirmError.style.display = 'none';
                return true;
            }
        }
        
        function hideAllErrors() {
            passwordError.style.display = 'none';
            confirmError.style.display = 'none';
        }
        
    });
</script>
