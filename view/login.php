<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="layout/css/bootstrap.css">
    <link rel="stylesheet" href="layout/css/login.css">
    <link rel="shortcut icon" href="layout/image/favicon-32x32-login.png" type="image/x-icon">
    <title>Login</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row" style="height: 100vh; width: 100vw;">
            <div class="col-lg-6 col-12 col-login">
                <a href="./login-admin.php" target="_self" class="link-login">
                    <img src="layout/image/admin.png" alt="..." class="img-login">
                    <div class="text-login">
                        <h3>Quản trị viên</h3>
                        <p style="font-size: 20px;">Nếu là quản trị viên - hãy nhấn vào đây để đăng nhập</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-12 col-login">
                <a href="./login-user.php" target="_self" class="link-login">
                    <img src="layout/image/profile.png" alt="..." class="img-login">
                    <div class="text-login">
                        <h3>Khách hàng</h3>
                        <p style="font-size: 20px;">Nếu là khách hàng - hãy nhấn vào đây để đăng nhập</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script src="layout/js/bootstrap.bundle.min.js"></script>
</body>
</html>