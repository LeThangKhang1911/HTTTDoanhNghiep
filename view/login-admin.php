<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout/css/bootstrap.css">
    <link rel="stylesheet" href="layout/css/login-form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="layout/image/favicon-32x32-login.png" type="image/x-icon">
    <title>Admin Login</title>

</head>
<body>
    <div class="container form-login" style="padding: 15px; border: 0.5px solid black; width: 500px; border-radius: 3px;">
        <div>
            <h3 class="loichao">XIN CHÀO!</h3>
        </div>
        <div>
            <form action="../admin/ad-controller/ad-login-logout/ad-login.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label label-text">Tên tài khoản</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Email">
                    </div>
                    <div id="emailHelp" class="form-text">Vui lòng nhập email do phòng nhân sự cấp.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label label-text">Mật khẩu</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                    </div>
                </div>
                <a href="../admin/ad-controller/ad-login-logout/ad-forgot-pass.php" class="link-forgot-password"><p>Quên mật khẩu?</p></a>
                <div id="errorMgs" style="color: red; margin-top: 10px;"></div>
                <div class="form-btn">
                    <button type="submit" class="btn btn-success" id="btn-login" name="btn-adlogin">Đăng nhập</button>
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
    <script src="layout/js/login-form.js"></script>
    <script src="layout/js/show_alert.js"></script>
    <script src="layout/js/bootstrap.bundle.min.js"></script>
</body>
</html>