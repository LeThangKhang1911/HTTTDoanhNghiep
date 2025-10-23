<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
function createVnpayPaymentUrl($tourid, $total_price, $tour_name) {
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    // Lưu ý: Trên localhost, VNPay không thể gửi kết quả về URL này. Kiểm tra kết quả giao dịch trên cổng quản lý VNPay sandbox.
    $vnp_Returnurl = "http://localhost/CuoiKi_LTWUD/controller/tour/booktour.php";
    $vnp_TmnCode = "KMTR3Z05"; // Thay bằng mã website tại VNPay
    $vnp_HashSecret = "U9W20KJ9GX76F4Q7UTRKM4PIAJUZJT13"; // Thay bằng chuỗi bí mật

    $vnp_TxnRef = $tourid . "_" . time(); // Mã đơn hàng, kết hợp tourid và timestamp
    $vnp_OrderInfo = "Thanh toan tour: " . $tour_name;
    $vnp_OrderType = "tour"; // Loại đơn hàng
    $vnp_Amount = $total_price * 100; // Tổng tiền (nhân 100 theo yêu cầu VNPay)
    $vnp_Locale = "vn"; // Ngôn ngữ mặc định
    $vnp_BankCode = ""; // Để trống, người dùng sẽ chọn ngân hàng trên VNPay
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    // Thời gian hết hạn giao dịch (mặc định 15 phút từ thời điểm hiện tại)
    $vnp_ExpireDate = date('YmdHis', strtotime('+15 minutes'));

    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
        "vnp_ExpireDate" => $vnp_ExpireDate,
    );

    if (!empty($vnp_BankCode)) {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }

    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }

    return $vnp_Url;
}
?>