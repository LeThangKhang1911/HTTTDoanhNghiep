<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    echo '<script>
        alert("Vui lòng đăng nhập tài khoản!");
        window.location.href = "view/login-user.php";
    </script>';
    exit;
}



require_once __DIR__ . '/../model/tour/get_tour.php';
require_once __DIR__ . '/../controller/payment/vnpay.php';
// Lấy tourid từ URL
$tourid = isset($_GET['tourid']) ? (int)$_GET['tourid'] : 0;

// Lấy thông tin tour
$tour = null;
if ($tourid > 0) {
    $tour_data = get_tour_id($tourid);
    if (!empty($tour_data)) {
        $tour = $tour_data[0]; // Lấy tour đầu tiên
    }
}

// Kiểm tra nếu không tìm thấy tour hoặc tour bị ẩn
if (!$tour || check_tour_hide($tourid)) {
    echo "<div class='container py-5'><p class='text-center text-danger'>Không tìm thấy thông tin chuyến đi hoặc chuyến đi không khả dụng!</p></div>";
    exit;
}

// Tính giá chuyến đi (ưu tiên price_sale nếu có)
$tour_price = ($tour['price_sale'] > 0 && $tour['price_sale'] < $tour['price']) ? $tour['price_sale'] : $tour['price'];

// Định dạng giá
$formatted_price = number_format($tour_price, 0, ',', '.') . 'đ';

// Lấy hình ảnh tour
$imgPath = !empty($tour['image']) && file_exists(__DIR__ . "/../upload/image/tour/" . $tour['image'])
    ? 'upload/image/tour/' . htmlspecialchars($tour['image'])
    : 'upload/image/tour/default.jpg';

// Số lượng thành viên mặc định
$default_members = 1;
$total_price = $tour_price * $default_members;
$formatted_total_price = number_format($total_price, 0, ',', '.') . ' VND';



// Lấy URL thanh toán ban đầu từ controller
$vnp_Url = createVnpayPaymentUrl($tourid, $total_price, $tour['name']);
?>

<!-- Main Content -->
<main class="container py-5">
    <!-- Page Title -->
    <h1 class="mb-4 text-center">Xác nhận và thanh toán</h1>

    <div class="row g-5 ">
        <!-- Cột phải: Thông tin chuyến đi -->
        <div class="col-lg-6">
            <div class="bg_color rounded-3 p-4 shadow-sm">
                <!-- Hình ảnh tour -->
                <div class="room-image mb-4 text-center">
                    <img src="<?php echo $imgPath; ?>" alt="<?php echo htmlspecialchars($tour['name']); ?>" class="img-fluid rounded" style="max-height: 300px; object-fit: cover;" />
                </div>

                <!-- Thông tin chuyến đi -->
                <h3 class="fw-bold mb-3 text-center">Thông Tin Chuyến Đi</h3>

                <!-- Tên chuyến đi -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="fw-medium">Tên chuyến đi:</span>
                    <input type="text" class="form-control w-50" id="tenchuyen" value="<?php echo htmlspecialchars($tour['name']); ?>" readonly />
                </div>

                <!-- Giá chuyến -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="fw-medium">Giá chuyến:</span>
                    <input type="text" class="form-control w-50" id="giachuyen" value="<?php echo $formatted_price; ?>" readonly />
                </div>


                <!-- Thời gian -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="fw-medium">Thời gian:</span>
                    <input type="text" class="form-control w-50" id="thoigiandi" value="<?php echo htmlspecialchars($tour['thoigian']); ?>" readonly />
                </div>

            </div>
        </div>
        <!-- Cột trái: Thanh toán qua VNPay -->
        <div class="col-lg-6">
            <div class="bg_color rounded-3 p-4 shadow-sm">
                <h2 class="fs-4 fw-bold mb-3">Thanh toán qua VNPay</h2>
                <div>
                    <!-- Lưu ý: Trên localhost, sau khi thanh toán, VNPay sẽ không thể chuyển hướng về vnpay_return.php. Kiểm tra kết quả giao dịch trên cổng quản lý VNPay sandbox. -->
                    <form id="vnpayForm" action="<?php echo $vnp_Url; ?>" method="POST">
                        <input type="hidden" name="tourid" value="<?php echo $tourid; ?>">
                        <input type="hidden" name="total_price" id="hidden_total_price" value="<?php echo $total_price; ?>">
                        <button type="submit" class="btn btn-secondary w-100 py-2 fw-medium">
                            Thanh toán
                        </button>
                    </form>
                </div>
            </div>
        </div>


    </div>
</main>