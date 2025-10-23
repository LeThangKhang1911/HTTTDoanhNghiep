<?php
require_once __DIR__ . '/../controller/tour/tour_detail.php';
require_once 'model/tour/get_tour.php';
update_views_tour_id($_GET['tourid']);
fetch_tour_detail(); // Lấy tất cả dữ liệu tour

?>

    <div class="container mt-3">
            <div class="row">
                <!--Anh chinh-->
                <div class="col-lg-6 mt-3">
                    <!-- Hiển thị ảnh động từ hàm get_TourImage -->
                    <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="upload/image/tour/<?php echo ($image); ?>" alt="" class="img-fluid rounded custom-width">
                            </div>
                        </div>
                    </div>

                </div>
                <!--Noi dung-->
                <div class="col-lg-6 mt-3">
                    <!-- Hiển thị mô tả tour -->
                    <p class="tour-description"><?php echo nl2br(($tour['description'])); ?></p>
                    <!-- Thêm thông tin động: Phương tiện, thời gian, khởi hành -->
                    <p><i class="bi bi-calendar3"></i> Khởi hành: <?php echo $transport_info['khoihanh']; ?></p>
                    <p><i class="bi bi-clock"></i> Thời gian: <?php echo $transport_info['thoigian']; ?></p>
                    <p><i class="bi bi-bus-front-fill"></i> Phương tiện: <?php echo $transport_info['vehicle']; ?></p>
                    <!-- Hiển thị giá -->
                    <?php if ($tour['price'] != $tour['price_sale']) : ?>
                            <p>
                                <strong class="fs-5">Giá gốc:</strong> 
                                <span class="text-decoration-line-through text-primary">
                                    <?php echo number_format($tour['price'], 0, ',', '.') . '₫'; ?>
                                </span>
                            </p>
                            <p>
                                <strong class="fs-5">Giá khuyến mãi:</strong> 
                                <span class="text-danger fs-5">
                                    <?php echo number_format($tour['price_sale'], 0, ',', '.') . '₫'; ?>
                                </span>
                            </p>
                        <?php else : ?>
                            <p>
                                <strong class="fs-5">Giá:</strong> 
                                <span class="text-danger fs-5">
                                    <?php echo number_format($tour['price'], 0, ',', '.') . '₫'; ?>
                                </span>
                            </p>
                        <?php endif; ?>
                    <!--nút đặt tour dẫn đến pay.php -->
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="index.php?pg=pay&tourid=<?php echo $_GET['tourid']?>" class="btn btn-success px-4">ĐẶT TOUR</a>
                    </div>
                </div>
            </div>
        </div>
        <!--Tabs gioi thieu&danh gia-->
        <div class="container mt-4">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="mo-ta-tab" data-bs-toggle="tab" data-bs-target="#mo-ta" type="button" role="tab">MÔ TẢ</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="lich-trinh-tab" data-bs-toggle="tab" data-bs-target="#lich-trinh" type="button" role="tab">LỊCH TRÌNH</button>
                </li>
                
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="danh-gia-tab" data-bs-toggle="tab" data-bs-target="#danh-gia" type="button" role="tab">BÌNH LUẬN</button>
                </li>
            </ul>
        
            <div class="tab-content border p-3" id="myTabContent">
                <!-- Tab Mô tả -->
                <div class="tab-pane fade show active" id="mo-ta" role="tabpanel">
                    <p><?php echo nl2br($mota); ?></p>
                    <!-- Hiển thị ảnh image1, image2, image3 nếu có -->
                    <?php if (!empty($image1)): ?>
                        <img src="upload/image/tour/<?php echo ($image1); ?>" alt="Image 1" class="img-fluid rounded custom-width mb-2">
                    <?php endif; ?>

                    <?php if (!empty($image2)): ?>
                        <img src="upload/image/tour/<?php echo ($image2); ?>" alt="Image 2" class="img-fluid rounded custom-width mb-2">
                    <?php endif; ?>

                    <?php if (!empty($image3)): ?>
                        <img src="upload/image/tour/<?php echo ($image3); ?>" alt="Image 3" class="img-fluid rounded custom-width mb-2">
                    <?php endif; ?>
                </div>
                <!-- Tab Lịch trình -->
                <div class="tab-pane fade" id="lich-trinh" role="tabpanel">
                    <?php if (!empty($lichtrinh)): ?>
                        <ul>
                            <?php foreach ($lichtrinh as $item): ?>
                                <li><?php echo ($item['ngay']) . ': ' . nl2br(($item['noidung'])); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p>Chưa có lịch trình cho tour này.</p>
                    <?php endif; ?>
                </div>
                <!-- Tab Bình luận -->
                <div class="tab-pane fade" id="danh-gia" role="tabpanel">
                    <iframe src="controller/tour/binhluan.php?tourid=<?= $_GET['tourid'] ?>"  width="100%"  height="400px"  frameborder="0" ></iframe>
                </div>
            </div>
        </div>
        <!-- Sản phẩm tương tự -->
        <div id="carouselExample" class="carousel slide" data-bs-ride="false">
            <div class="carousel-inner">
                <div class="container mt-5">
                    <h4 class="fw-bold">SẢN PHẨM TƯƠNG TỰ</h4>
                    <?php if (!empty($similar_tours)): ?>
                        <?php
                            $tour_chunks = array_chunk($similar_tours, 4);
                            foreach ($tour_chunks as $index => $chunk):
                        ?>
                            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                <div class="row d-flex justify-content-center align-items-center">
                                    <?php showTour($chunk); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="carousel-item active">
                            <p class="text-center">Không có tour tương tự.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (!empty($similar_tours) && count($similar_tours) > 4): ?>
            <!-- Nút trái -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="fs-1 text-danger"><i class="bi-chevron-left"></i></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <!-- Nút phải -->
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="fs-1 text-danger"><i class="bi-chevron-right"></i></span>
                <span class="visually-hidden">Next</span>
            </button>
            <?php endif; ?>
        </div>

