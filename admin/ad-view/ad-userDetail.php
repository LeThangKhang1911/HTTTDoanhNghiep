<?php
require_once 'ad-model/AdminUser/get_khachhang.php';
require_once 'ad-model/AdminUser/get_bookings.php';

$customer_id = $_GET['id'] ?? 0;
$customer = get_customer_by_id($customer_id);
$bookings = get_bookings_by_customer($customer_id);
?>

<h2 style="margin-top: 20px; text-align: center;">Chi tiết khách hàng</h2>

<div style="margin: 20px;">
    <h4>Thông tin khách hàng</h4>
    <table class="table">
        <tr>
            <th>ID</th>
            <td><?php echo $customer['userid'] ?? 'N/A'; ?></td>
        </tr>
        <tr>
            <th>Tên</th>
            <td><?php echo htmlspecialchars($customer['fullname'] ?? 'N/A'); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo htmlspecialchars($customer['email'] ?? 'N/A'); ?></td>
        </tr>
        <tr>
            <th>Giới tính</th>
            <td><?php echo htmlspecialchars($customer['gioitinh'] ?? 'N/A'); ?></td>
        </tr>
        <tr>
            <th>Ngày sinh</th>
            <td><?php echo $customer['ngaysinh'] ? date('d/m/Y', strtotime($customer['ngaysinh'])) : 'N/A'; ?></td>
        </tr>
        <tr>
            <th>Số điện thoại</th>
            <td><?php echo htmlspecialchars($customer['phone'] ?? 'N/A'); ?></td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td><?php echo htmlspecialchars($customer['address'] ?? 'N/A'); ?></td>
        </tr>
        <tr>
            <th>Ngày đăng ký</th>
            <td><?php echo $customer['datebegin'] ? date('d/m/Y H:i:s', strtotime($customer['datebegin'])) : 'N/A'; ?></td>
        </tr>
    </table>

    <h4>Danh sách tour đã đặt</h4>
    <table class="table">
        <thead>
            <tr>
                <th style="text-align:center;">ID Đặt tour</th>
                <th style="text-align:center;">Tên tour</th>
                <th style="text-align:center;">Ngày đặt</th>
                <th style="text-align:center;">Tổng giá</th>
                <th style="text-align:center;">Trạng thái</th>
                <th style="text-align:center;">Thanh toán</th>
                <th style="text-align:center;">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking) { ?>
                <?php if ($booking['status'] == 0) { // Chỉ hiển thị tour đã đặt ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $booking['id']; ?></td>
                        <td style="text-align:center;"><?php echo htmlspecialchars($booking['name']); ?></td>
                        <td style="text-align:center;"><?php echo date('d/m/Y H:i:s', strtotime($booking['bookdate'])); ?></td>
                        <td style="text-align:center;"><?php echo number_format($booking['total_price'], 0, ',', '.') . ' VNĐ'; ?></td>
                        <td style="text-align:center;">Đã đặt</td>
                        <td style="text-align:center;"><?php echo htmlspecialchars($booking['payment'] ?? 'Chưa thanh toán'); ?></td>
                        <td style="text-align:center;">
                            <a href="ad-controller/AdminUser/cancel_booktour.php?bookingid=<?php echo $booking['id']; ?>&customerid=<?php echo $customer_id; ?>" class="btn btn-warning btn-sm" onclick="return confirm('Bạn có chắc chắn muốn hủy tour này không?')">Hủy tour</a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>

    <h4>Danh sách tour đã hủy</h4>
    <table class="table">
        <thead>
            <tr>
                <th style="text-align:center;">ID Đặt tour</th>
                <th style="text-align:center;">Tên tour</th>
                <th style="text-align:center;">Ngày đặt</th>
                <th style="text-align:center;">Tổng giá</th>
                <th style="text-align:center;">Trạng thái</th>
                <th style="text-align:center;">Thanh toán</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking) { ?>
                <?php if ($booking['status'] == 1) { // Chỉ hiển thị tour đã hủy ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $booking['id']; ?></td>
                        <td style="text-align:center;"><?php echo htmlspecialchars($booking['name']); ?></td>
                        <td style="text-align:center;"><?php echo date('d/m/Y H:i:s', strtotime($booking['bookdate'])); ?></td>
                        <td style="text-align:center;"><?php echo number_format($booking['total_price'], 0, ',', '.') . ' VNĐ'; ?></td>
                        <td style="text-align:center;">Đã hủy</td>
                        <td style="text-align:center;"><?php echo htmlspecialchars($booking['payment'] ?? 'Chưa thanh toán'); ?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>