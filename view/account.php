<?php
    require_once __DIR__ . '/../controller/tour/data_account.php';
    require_once __DIR__.'/../model/user/get_user.php';
    // Nếu trang là 'account', xử lý đăng xuất
    if (isset($_GET['action']) && $_GET['action'] === 'logout') {
        session_destroy();
        //chuyển hướng trang hiện tại về index.php
        echo '<script> window.location.href = "index.php";</script>';
        exit();
    }
    // Gọi hàm xử lý và lấy dữ liệu
    $data = processAccountActions();
    $user = $data['user'];
    $bookings = $data['bookings'];
    $success_message = $data['success'] ? $data['message'] : '';
    $error_message = !$data['success'] && $data['message'] ? $data['message'] : '';
?>
<?php
    if (isset($_SESSION['alert'])) {
        $msg = $_SESSION['alert']['message'];
        $type = $_SESSION['alert']['type'];
        echo "<script>
            window.onload = function() {
                showAlert('$msg', '$type', 5000);
            };
        </script>";
        unset($_SESSION['alert']);
    }
?>
<script src="view/layout/js/show_alert.js"></script>


    <div class="container py-5">
        <!-- Page Title -->
        <h1 class="mb-4 text-center">Tài khoản</h1>

        <!-- Thông báo -->
        <?php if ($success_message): ?>
            <div class="alert alert-success text-center"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <?php if ($error_message): ?>
            <div class="alert alert-danger text-center"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <script>
            setTimeout(function() {
                const alerts = document.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                });
            }, 3000);
        </script>

        <?php if ($user === null): ?>
            <div class="text-center">
                <br>
                <a href="view/login.php" target="_blank" class="btn btn-primary mt-2">Đăng nhập ngay</a>
            </div>
            <script>
                setTimeout(function() {
                    window.location.href = 'view/login.php'; 
                }, 3500);
            </script>
        <?php else: ?>
            <div class="row">
                <!-- Sidebar Menu -->
                <div class="col-12 col-md-3 mb-4">
                    <div class="list-group">
                        <a href="#" id="profileTab" class="menu-item d-flex align-items-center active">
                            <i class="bi bi-person me-3"></i>
                            <span>Thông tin tài khoản</span>
                        </a>
                        <a href="#" id="passwordTab" class="menu-item d-flex align-items-center">
                            <i class="bi bi-shield-lock me-3"></i>
                            <span>Mật khẩu</span>
                        </a>
                        <a href="#" id="tripTab" class="menu-item d-flex align-items-center">
                            <i class="bi bi-luggage me-3"></i>
                            <span>Chuyến đi của tôi</span>
                        </a>
                        <a href="?pg=account&action=logout" id="log-out" class="menu-item d-flex align-items-center">
                            <i class="bi bi-box-arrow-right me-3"></i>
                            <span>Đăng xuất</span>
                        </a>
                        <div class="d-flex">
                            <form action="controller/user/control-2fa.php" method="post" id="form-2fa" class="d-flex">
                                <span>Bảo mật hai lớp</span>
                                <div style="margin-left: 20px;">
                                    <label class="switch">
                                        <?php 
                                            $user_list = get_user_by_id($_SESSION['user']);
                                            $u = $user_list[0];
                                        ?>
                                        <input type="checkbox" name="2fa" id="toggle-2fa" <?= ($u['2fa'] == 1) ? 'checked' : '' ?>>
                                        <div class="slider">
                                            <div class="circle">
                                                <svg class="cross" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 365.696 365.696" y="0" x="0" height="6" width="6" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path data-original="#000000" fill="currentColor" d="M243.188 182.86 356.32 69.726c12.5-12.5 12.5-32.766 0-45.247L341.238 9.398c-12.504-12.503-32.77-12.503-45.25 0L182.86 122.528 69.727 9.374c-12.5-12.5-32.766-12.5-45.247 0L9.375 24.457c-12.5 12.504-12.5 32.77 0 45.25l113.152 113.152L9.398 295.99c-12.503 12.503-12.503 32.769 0 45.25L24.48 356.32c12.5 12.5 32.766 12.5 45.247 0l113.132-113.132L295.99 356.32c12.503 12.5 32.769 12.5 45.25 0l15.081-15.082c12.5-12.504 12.5-32.77 0-45.25zm0 0"></path>
                                                    </g>
                                                </svg>
                                                <svg class="checkmark" xml:space="preserve" style="enable-background:new 0 0 512 512" viewBox="0 0 24 24" y="0" x="0" height="10" width="10" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path class="" data-original="#000000" fill="currentColor" d="M9.707 19.121a.997.997 0 0 1-1.414 0l-5.646-5.647a1.5 1.5 0 0 1 0-2.121l.707-.707a1.5 1.5 0 0 1 2.121 0L9 14.171l9.525-9.525a1.5 1.5 0 0 1 2.121 0l.707.707a1.5 1.5 0 0 1 0 2.121z"></path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </form>
                        </div>
                        <div style="margin-top: 20px;">
                            <form action="controller/user/delete-account.php" method="post">
                                <button type="submit" class="btn btn-danger" name="btn-delacc">
                                    <i class="bi bi-person-fill-x"></i>
                                    Xóa tài khoản
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-12 col-md-9">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div id="profileContent">
                                <!-- Profile Picture -->
                                <div class="profile-picture">
                                    <i class="bi bi-person text-white fs-1"></i>
                                    <div class="Edit-icon">
                                        <i class="bi bi-pencil-fill text-secondary small"></i>
                                    </div>
                                </div>
                                <!-- Personal Information -->
                                <form method="post" action="controller/user/update_profile.php">
                                    <div class="info-item">
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                <p class="text-muted mb-md-0">Họ và tên</p>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <p class="mb-0"><?php echo htmlspecialchars($user['fullname']); ?></p>
                                                <input type="text" name="fullname" placeholder="<?php echo htmlspecialchars($user['fullname']); ?>">
                                            </div>
                                            <div class="col-12 col-md-2 text-md-end">
                                                <button type="submit" class="btn btn-info" name="btn-changeName">Thay đổi</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="info-item">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            <p class="text-muted mb-md-0">Email</p>
                                        </div>
                                        <div class="col-12 col-md-7">
                                            <p class="mb-0"><?php echo htmlspecialchars($user['email']); ?></p>
                                            <input type="hidden" name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
                                        </div>
                                    </div>
                                </div>
                                <form method="post" action="controller/user/update_profile.php">
                                    <div class="info-item">
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                <p class="text-muted mb-md-0">Giới tính</p>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <p class="mb-0"><?php echo htmlspecialchars($user['gioitinh']); ?></p>
                                                <input type="text" name="gioitinh" placeholder="<?php echo htmlspecialchars($user['gioitinh']); ?>">
                                            </div>
                                            <div class="col-12 col-md-2 text-md-end">
                                                <button type="submit" class="btn btn-info" name="btn-changeGT">Thay đổi</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form method="post" action="controller/user/update_profile.php">
                                    <div class="info-item">
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                <p class="text-muted mb-md-0">Ngày sinh</p>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <p class="mb-0"><?php echo date('d/m/Y', strtotime($user['ngaysinh'])); ?></p>
                                                <input type="date" name="ngaysinh" value="<?php echo htmlspecialchars($user['ngaysinh']); ?>">
                                            </div>
                                            <div class="col-12 col-md-2 text-md-end">
                                                <button type="submit" class="btn btn-info" name="btn-changeNS">Thay đổi</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form method="post" action="controller/user/update_profile.php">
                                    <div class="info-item">
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                <p class="text-muted mb-md-0">Số điện thoại</p>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <p class="mb-0"><?php echo htmlspecialchars($user['phone']); ?></p>
                                                <input type="text" name="phone" value="<?php echo htmlspecialchars($user['phone']); ?>">
                                            </div>
                                            <div class="col-12 col-md-2 text-md-end">
                                                <button type="submit" class="btn btn-info" name="btn-changeSDT">Thay đổi</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form method="post" action="controller/user/update_profile.php">
                                    <div class="info-item">
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                <p class="text-muted mb-md-0">Địa chỉ</p>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <p class="mb-0"><?php echo htmlspecialchars($user['address']); ?></p>
                                                <input type="text" name="address" value="<?php echo htmlspecialchars($user['address']); ?>">
                                            </div>
                                            <div class="col-12 col-md-2 text-md-end">
                                                <button type="submit" class="btn btn-info" name="btn-changeDC">Thay đổi</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Form đổi mật khẩu (Mặc định ẩn) -->
                        <div class="card-body">
                            <div id="passwordContent" style="display: none">
                                <h4 class="mb-3">Đổi mật khẩu</h4>
                                <form action="controller/user/update_password.php" method="post">
                                    <div class="info-item">
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                <p class="text-muted mb-md-0">Mật khẩu hiện tại</p>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <input type="password" class="form-control" name="currentPassword" id="currentPassword" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                <p class="text-muted mb-md-0">Mật khẩu mới</p>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <input type="password" class="form-control" name="newPassword" id="newPassword" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="info-item">
                                        <div class="row">
                                            <div class="col-12 col-md-3">
                                                <p class="text-muted mb-md-0">Xác nhận mật khẩu mới</p>
                                            </div>
                                            <div class="col-12 col-md-7">
                                                <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" name="change_password" class="btn btn-primary checkPass">Lưu thay đổi</button>
                                        <button type="reset" class="btn btn-secondary" id="backToProfile">Quay lại</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Chuyến đi của tôi (Mặc định ẩn) -->
                        <div class="card-body">
                            <div id="tripContent" style="display: none">
                                <h4 class="mb-3">Chuyến đi của tôi</h4>
                                <button type="button" class="btn btn-secondary mb-3" id="backToProfileFromTrip">Quay lại</button>

                                <!-- Tabs cho hai phần: Đã đặt thành công & Đã hủy -->
                                <ul class="nav nav-tabs" id="tripTabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="success-tab" data-bs-toggle="tab" href="#successTrips">Đã đặt thành công</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="cancelled-tab" data-bs-toggle="tab" href="#cancelledTrips">Đã hủy</a>
                                    </li>
                                </ul>

                                <!-- Nội dung của hai tab -->
                                <div class="tab-content mt-3">
                                    <!-- Tab 1: Đã đặt thành công -->
                                    <div class="tab-pane fade show active" id="successTrips">
                                        <?php
                                        $success_bookings = array_filter($bookings, fn($booking) => $booking['status'] == 0);
                                        if (count($success_bookings) > 0):
                                            foreach ($success_bookings as $booking):
                                                $booking_date = new DateTime($booking['bookdate']);
                                                $now = new DateTime();
                                                $days_diff = $now->diff($booking_date)->days;
                                                $can_cancel = $days_diff <= 3;
                                        ?>
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <h5 class="mb-1"><?php echo htmlspecialchars($booking['name']); ?></h5>
                                                        <p class="text-muted mb-0">Ngày khởi hành: <?php echo htmlspecialchars($booking['khoihanh']); ?></p>
                                                        <p class="text-muted mb-0">Ngày đặt: <?php echo date('d/m/Y H:i:s', strtotime($booking['bookdate'])); ?></p>
                                                        <p class="text-muted mb-0">Trạng thái: <?php echo htmlspecialchars($booking['payment']); ?></p>
                                                        <a href="index.php?pg=detail&tourid=<?php echo htmlspecialchars($booking['tourid']) ?>&categoryid=<?php echo htmlspecialchars($booking['categoryid']) ?>" style="text-decoration: none; margin-right: 10px;">Xem chi tiết</a>
                                                        <?php if ($can_cancel): ?>
                                                            <form action="?pg=account" method="post" class="d-inline">
                                                                <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
                                                                <button type="submit" name="cancel_booking" class="btn btn-outline-danger mt-2">Hủy tour</button>
                                                            </form>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                        <?php
                                            endforeach;
                                        else:
                                        ?>
                                            <p class="text-muted">Bạn chưa có chuyến đi nào.</p>
                                        <?php endif; ?>
                                    </div>

                                    <!-- Tab 2: Đã hủy -->
                                    <div class="tab-pane fade" id="cancelledTrips">
                                        <?php
                                        $cancelled_bookings = array_filter($bookings, fn($booking) => $booking['status'] == 1);
                                        if (count($cancelled_bookings) > 0):
                                            foreach ($cancelled_bookings as $booking):
                                                $cancel_date = (new DateTime())->format('d/m/Y');
                                        ?>
                                                <div class="card mb-3">
                                                    <div class="card-body">
                                                        <h5 class="mb-1"><?php echo htmlspecialchars($booking['name']); ?></h5>
                                                        <p class="text-muted mb-0">Ngày khởi hành: <?php echo htmlspecialchars($booking['khoihanh']); ?></p>
                                                        <p class="text-muted mb-0">Mã đặt chỗ: <?php echo htmlspecialchars($booking['id']); ?></p>
                                                        <p class="text-danger mb-0">Đã hủy vào ngày <?php echo $cancel_date; ?></p>
                                                        <a href="index.php?pg=detail&tourid=<?php echo htmlspecialchars($booking['tourid']) ?>&categoryid=<?php echo htmlspecialchars($booking['categoryid']) ?>" style="text-decoration: none; margin-right: 10px;">Xem chi tiết</a>
                                                    </div>
                                                </div>
                                        <?php
                                            endforeach;
                                        else:
                                        ?>
                                            <p class="text-muted">Bạn chưa có chuyến đi nào bị hủy.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    
    