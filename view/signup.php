<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout/css/bootstrap.css">
    <link rel="stylesheet" href="layout/css/signup.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="layout/image/logo-signup.png" type="image/x-icon">
    <title>Đăng kí</title>
</head>
<body>
    <div>
        <div class="signup-form" style="background-color: aliceblue; padding: 10px;">
            <h3>Đăng kí</h3>
            <form action="../controller/signup-login/signup.php" method="post">
                <div class="mb-3">
                    <label for="ten" class="form-label label-text">Họ và tên</label>
                    <div class="input-group">
                        <input type="text" id="ten" class="form-control" name="fullname" placeholder="Nhập họ và tên của bạn">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label label-text">Email</label>
                    <div class="input-group">
                        <input type="text" id="email" class="form-control" name="email" placeholder="Nhập email của bạn">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label label-text">Mật khẩu</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="Password" name="password" placeholder="Nhập mật khẩu">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label label-text">Xác thực mật khẩu</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="Password" name="repassword" placeholder="Nhập lại mật khẩu">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="gioitinh" class="form-label label-text">Giới tính</label>
                    <div class="d-flex" id="gioitinh">
                        <div class="form-check" style="margin-right: 10px;">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="Nam" checked>
                            <label class="form-check-label" for="male">
                                Nam
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="Nữ">
                            <label class="form-check-label" for="female">
                                Nữ
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="birthday" class="form-label label-text">Ngày sinh</label>
                    <div class="input-group">
                        <input type="date" id="birthday" class="form-control" name="birthday">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="phone-number" class="form-label label-text">Số điện thoại</label>
                    <div class="input-group">
                        <input type="tel" id="phone-number" class="form-control" name="phone-number">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label label-text">Địa chỉ</label>
                    <div class="input-group">
                        <input type="text" id="address" class="form-control" name="address">
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" id="check">
                    <label class="form-check-label" for="check">
                        Xác nhận thông tin của bạn là chính xác.
                    </label>
                </div>
                <div id="errorMgs" style="color: red; margin-top: 10px;"></div>
                <div class="form-btn">
                    <button type="submit" class="btn btn-success" id="btn-signup" name="btn-register">Đăng kí</button>
                    <button type="reset" class="btn btn-danger">Hủy</button>
                </div>
            </form>
        </div>
    </div>
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
    <script src="layout/js/signup.js"></script>
    <script src="layout/js/bootstrap.bundle.min.js"></script>
    <script src="layout/js/show_alert.js"></script>
</body>
</html>