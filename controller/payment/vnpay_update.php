#### **3. Tệp `controller/vnpay_update.php`**

Tệp này xử lý yêu cầu AJAX từ `pay.php` để cập nhật URL VNPay động khi tổng tiền thay đổi.

<xaiArtifact artifact_id="c10be427-5311-46eb-9580-a3ccede5b8af" artifact_version_id="15325960-83e0-4294-8843-1bcd9ed0f3df" title="controller/vnpay_update.php" contentType="text/php">
<?php
require_once __DIR__ . '/vnpay.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tourid = isset($_POST['tourid']) ? (int)$_POST['tourid'] : 0;
    $total_price = isset($_POST['total_price']) ? (float)$_POST['total_price'] : 0;
    $tour_name = isset($_POST['tour_name']) ? urldecode($_POST['tour_name']) : '';

    if ($tourid > 0 && $total_price > 0 && !empty($tour_name)) {
        $vnp_Url = createVnpayPaymentUrl($tourid, $total_price, $tour_name);
        $response = array(
            'code' => '00',
            'message' => 'success',
            'data' => $vnp_Url
        );
    } else {
        $response = array(
            'code' => '01',
            'message' => 'Invalid input data'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>