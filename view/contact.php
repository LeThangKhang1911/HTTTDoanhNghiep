<script>
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        });
    }, 5000);
</script>
<!-- Contact -->
<div class="background-lienhe">
        <div class="container mt-3">
            <h4 class="text-center p-4">THÔNG TIN LIÊN HỆ</h4>
            <!-- Hiển thị thông báo hệ thống -->
            <?php if (isset($_SESSION['flash_message'])): ?>
                <div class="alert alert-<?php echo $_SESSION['flash_message']['type'] == 'success' ? 'success' : 'danger'; ?> text-center">
                    <?php echo htmlspecialchars($_SESSION['flash_message']['message']); ?>
                </div>
                <?php unset($_SESSION['flash_message']); // Xóa thông báo sau khi hiển thị ?>
            <?php endif; ?>

            <div class="row">
                <!--Form lien he-->
                <div class="col-md-6">
                    <form action="controller/tour/submit_feedback.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Tên của bạn (bắt buộc):</label>
                            <input type="text" class="form-control custom-input" name="fullname" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Địa chỉ Email (bắt buộc):</label>
                            <input type="email" class="form-control custom-input" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tiêu đề:</label>
                            <input type="text" class="form-control custom-input" name="title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Thông điệp:</label>
                            <textarea class="form-control custom-input custom-textarea" name="content"></textarea>
                        </div>
                        <button type="submit" name="submit_feedback" class="btn btn-primary"><strong>GỬI NGAY</strong></button>
                    </form>
                </div>
                <!--Thong tin lien he-->
                <div class="col-md-6">
                    <div class="d-flex flex-column align-items-start" >
                        <img src="view/layout/image/lienhe.png" alt="banner" style="width: 75%; height: 230px;">

                        <!--Address-->
                        <div class="contact-item">
                            <div class="icon-circle">
                                <i class="bi bi-geo-alt-fill text-success"></i>
                            </div>
                            <div>
                                <p class="mb-0"><strong>19 Đ Nguyễn Hữu Thọ, Tân Phong</strong></p>
                                <p class="mb-0">Quận 7, Tp Hồ Chí Minh</p>
                            </div>
                        </div>
                        <!--Phone-->
                        <div class="contact-item">
                            <div class="icon-circle">
                                <i class="bi bi-telephone-fill text-warning"></i>
                            </div>
                            <div>
                                <p class="mb-0"><strong>1900 0000</strong></p>
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="contact-item">
                            <div class="icon-circle">
                                <i class="bi bi-envelope-fill text-danger"></i>
                            </div>
                            <div>
                                <p class="mb-0"><strong>dulich@gmail</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <div class="container mt-5">
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3171.8199278228963!2d106.69651602481837!3d10.731808121826434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528b2747a81a3%3A0x33c1813055acb613!2zxJDhuqFpIGjhu41jIFTDtG4gxJDhu6ljIFRo4bqvbmc!5e0!3m2!1svi!2s!4v1743052652560!5m2!1svi!2s" 
                    width="100%" 
                    height="450" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>