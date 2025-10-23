<?php
require_once 'ad-model/AdminUser/get_khachhang.php';
$customer_list = get_all_customers();
?>

<h2 style="margin-top: 20px; text-align: center;">Danh sách khách hàng</h2>

<table class="table" style="margin-top: 10px;">
    <thead>
        <tr>
            <th scope="col" style="text-align:center;">ID</th>
            <th scope="col" style="text-align:center;">Tên</th>
            <th scope="col" style="text-align:center;">Email</th>
            <th scope="col" style="text-align:center;">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customer_list as $customer) { ?>
            <tr>
                <th scope="row" style="text-align: center;"><?php echo $customer['userid']; ?></th>
                <td style="text-align: center;"><?php echo htmlspecialchars($customer['fullname']); ?></td>
                <td style="text-align: center;"><?php echo htmlspecialchars($customer['email']); ?></td>
                <td style="text-align: center;">
                    <a href="index-admin.php?pg=userdetail&id=<?php echo $customer['userid']; ?>" class="btn btn-info btn-sm">Xem chi tiết</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>