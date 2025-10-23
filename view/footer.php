<!-- Footer -->
<div class=" footer-background">
        <hr style="width: 100%; height: 1px; background-color: black; border: none; opacity: 1; margin-bottom: 0px;">
        <div class="container">
            <footer class="row row-cols-1 row-cols-sm-2 row-cols-xl-4" style="padding: 25px;">
                <div class="col mb-3">
                    <h4 class="footer-text">LIÊN HỆ</h4>
                    <div class="d-flex">
                        <div class="footer-phone">
                            <i class="bi bi-telephone-outbound-fill footer-text"></i>
                        </div>
                        <div class="footer-contact-info">
                            <p class="footer-text">
                                Hỗ trợ trực tuyến 24/7
                            </p>
                            <p class="footer-text">
                                HOTLINE: <a href="tel:1900000" style="text-decoration: none;">1900 0000</a>
                            </p>
                        </div>
                    </div>
                </div>
          
                <div class="col mb-3">
                    <h5 class="footer-text" onclick="toggleSection(this)">Dịch vụ</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="index.php" class="nav-link p-0 footer-text">Trang chủ</a></li>
                        <li class="nav-item mb-2"><a href="index.php?pg=Xu-huong-du-lich" class="nav-link p-0 footer-text">Xu hướng du lịch</a></li>
                        <li class="nav-item mb-2"><a href="index.php?pg=Lien-he" class="nav-link p-0 footer-text">Liên hệ</a></li>
                    </ul>
                </div>
          
                <div class="col mb-3">
                    <h5 class="footer-text" onclick="toggleSection(this)">Tour</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="index.php?pg=Tour&category=1" class="nav-link p-0 footer-text">Du lịch miền Bắc</a></li>
                        <li class="nav-item mb-2"><a href="index.php?pg=Tour&category=2" class="nav-link p-0 footer-text">Du Lịch miền Trung</a></li>
                        <li class="nav-item mb-2"><a href="index.php?pg=Tour&category=3" class="nav-link p-0 footer-text">Du lịch miền Nam</a></li>
                    </ul>
                </div>
          
                <div class="col mb-3">
                    <h5 class="footer-text" onclick="toggleSection(this)">Liên hệ</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="https://www.facebook.com/saigontourist.sts" target="_blank" class="nav-link p-0 footer-text"><i class="bi bi-facebook" style="font-size: 30px; margin: 5px;"></i><span style="font-size: 20px;">Facebook</span></a></li>
                        <li class="nav-item mb-2"><a href="https://www.youtube.com/@SAIGONTOURISTGROUP" target="_blank" class="nav-link p-0 footer-text"><i class="bi bi-youtube" style="font-size: 30px; margin: 5px;"></i><span style="font-size: 20px;">Youtube</span></a></li>
                        <li class="nav-item mb-2"><a href="https://www.tiktok.com/@saigontourist_sts?lang=en" target="_blank" class="nav-link p-0 footer-text"><i class="bi bi-tiktok" style="font-size: 30px; margin: 5px;"></i><span style="font-size: 20px;">Tiktok</span></a></li>
                    </ul>
                </div>

                <script>
                    function toggleSection(header) {
                        let list = header.nextElementSibling; 
                        if (list.style.display === "none") {
                            list.style.display = "block"; 
                        } else {
                            list.style.display = "none"; 
                        }
                    }
                </script>
            </footer>
        </div>
        <div class="d-flex justify-content-center align-items-center footer-line-end">
            <p class="footer-text footer-text">&copy; 2025 | Lê Phú Vinh - Lương Lê Nhân Trí - Nguyễn Minh Hưng - Đồ án cuối kì: Trang web Tour du lịch</p>
        </div>
    </div>
    <script src="view/layout/js/darkmode.js"></script>
    <script src="view/layout/js/account_tab.js"></script>
    <script src="view/layout/js/checkPay_form.js"></script>
    <script src="view/layout/js/detail.js"></script>
    <script src="view/layout/js/login-form.js"></script>
    <script src="view/layout/js/signup.js"></script>
    <script src="view/layout/js/toggle-2fa.js"></script>
    <script src="view/layout/js/bootstrap.bundle.min.js"></script>
</body>
</html>