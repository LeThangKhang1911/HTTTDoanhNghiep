<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../ad-model/AdminTour/get_tour.php';
$tours = get_all_tours();
?>

<?php
// Hiển thị và xóa thông báo nếu có
if (isset($_SESSION['alert'])) {
    $message = htmlspecialchars($_SESSION['alert']['message']);
    echo "<script>alert('$message');</script>";
    unset($_SESSION['alert']); // Xóa để không hiển thị lại
}
?>

<h2 style="margin-top: 20px; text-align: center;">Danh sách tất cả các tour</h2>

<div style="text-align: right; margin: 0px 30px 15px 0px;">
    <a href="index-admin.php?pg=addtour" class="btn btn-success">
        <i class="fas fa-plus"></i> Thêm tour
    </a>
</div>

<table class="table" style="margin-top: 10px;">
    <thead>
        <tr>
            <th scope="col" style="text-align: center;">ID</th>
            <th scope="col" style="text-align: center;">Tên tour</th>
            <th scope="col" style="text-align: center;">Giá</th>
            <th scope="col" style="text-align: center;">Ẩn / Hiện</th>
            <th scope="col" style="text-align: center;">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tours as $tour) { ?>
            <tr>
                <th scope="row" style="text-align: center;"><?php echo $tour['id']; ?></th>
                <td style="text-align: center;"><?php echo $tour['name']; ?></td>
                <td style="text-align: center;"><?php echo number_format($tour['price'], 0, ',', '.'); ?> VNĐ</td>
                <td style="text-align: center;">
                    <?php echo $tour['hide'] == 0 ? 'Hiện' : 'Ẩn'; ?>
                </td>
                <td style="text-align: center;">
                    <a href="index-admin.php?pg=tourdetail&id=<?php echo $tour['id']; ?>" class="btn btn-info btn-sm">Xem chi tiết</a>
                    <a href="ad-controller/TourManage/delete_tour.php?id=<?php echo $tour['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>