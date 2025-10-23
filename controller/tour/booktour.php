<?php
session_start();

require_once __DIR__ . '/../../model/pdo.php';
require_once '../sendmail/sendmail.php';
require_once __DIR__ . '/../payment/vnpay.php';
require_once __DIR__ . '/../../model/user/get_user.php';

$vnp_HashSecret = "U9W20KJ9GX76F4Q7UTRKM4PIAJUZJT13";

$vnp_SecureHash = $_GET['vnp_SecureHash'] ?? '';
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}
unset($inputData['vnp_SecureHash']);
ksort($inputData);
$hashData = "";
$i = 0;
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}
$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

if ($secureHash == $vnp_SecureHash) {
    if ($_GET['vnp_ResponseCode'] == '00') {
        $tourid = explode('_', $_GET['vnp_TxnRef'])[0];
        $total_price = $_GET['vnp_Amount'] / 100;
        $userid = isset($_SESSION['user']) ? (int)$_SESSION['user'] : 0;
        $payment = 'VNPay';
        $status = 'confirmed';
        $bookdate = date('Y-m-d H:i:s');

        $user = get_user_by_id($userid);
        if (empty($user) || $userid <= 0) {
            echo "<script>alert('Người dùng không hợp lệ hoặc chưa đăng nhập.'); window.location.href = '../../index.php';</script>";
            exit;
        }
        $user = $user[0];

        $sql = "SELECT name FROM tour WHERE id = ?";
        $tour = pdo_query($sql, $tourid);
        if (empty($tour)) {
            echo "<script>alert('Không tìm thấy thông tin tour.'); window.location.href = '../../index.php';</script>";
            exit;
        }
        $tour = $tour[0];

        $sql = "INSERT INTO booktour (userid, tourid, total_price, status, payment, bookdate) 
                VALUES (?, ?, ?, ?, ?, ?)";
        pdo_execute($sql, $userid, $tourid, $total_price, $status, $payment, $bookdate);

        $to = $user['email'];
        $tenTour = $tour['name'];
        $price = number_format($total_price, 0, ',', '.') . ' VND';
        $ngaydat = $bookdate;

        if (send_bookTourSuccess($to, $tenTour, $price, $ngaydat)) {
            echo "<script>alert('Đặt tour thành công! Email xác nhận đã được gửi.'); window.location.href = '../../index.php';</script>";
        } else {
            echo "<script>alert('Đặt tour thành công nhưng gửi email thất bại.'); window.location.href = '../../index.php';</script>";
        }
    } else {
        echo "<script>alert('Thanh toán không thành công. Mã lỗi: " . ($_GET['vnp_ResponseCode'] ?? 'N/A') . "'); window.location.href = '../../index.php';</script>";
    }
} else {
    echo "<script>alert('Chữ ký giao dịch không hợp lệ.'); window.location.href = '../../index.php';</script>";
}
?>
