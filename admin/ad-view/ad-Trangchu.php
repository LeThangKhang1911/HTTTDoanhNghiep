<?php
    require_once 'ad-model/AdminHome/get_slide.php';
    require_once 'ad-model/AdminHome/get_canhdep.php';
    require_once '../model/tour/get_tour.php';
    $slide_list = get_slide();
    $canhdep_list = get_canhdep();
    $tourNew_list = get_tour_new(4);
    $tourHot_list = get_tour_by_view(3);
?>
<h2>Các phần hiển thị trong trang chủ</h2>
<h3 style="text-align: center; margin-top: 50px;">Danh sách các hình ảnh nền</h3>
<div style="text-align: right; margin-bottom: 15px;">
    <a href="index-admin.php?pg=addslide" class="btn btn-success">
        <i class="fas fa-plus"></i> Thêm hình ảnh
    </a>
</div>
<table class="table" style="margin-top: 10px;">
  <thead>
    <tr>
      <th scope="col" style="text-align:center">ID</th>
      <th scope="col" style="text-align:center">Tên ảnh</th>
      <th scope="col" style="text-align:center">Ảnh</th>
      <th scope="col" style="text-align:center">Ẩn/Hiện</th>
      <th scope="col" style="text-align:center">Thứ tự ảnh</th>
      <th scope="col" style="text-align:center">Ngày thêm ảnh</th>
      <th scope="col" style="text-align:center">Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach($slide_list as $slide){
    ?>
        <tr>
            <th scope="row" style="text-align:center"><?php echo $slide['id']; ?></th>
            <td style="text-align:center"><?php echo $slide['name']; ?></td>
            <td style="text-align:center">
                    <img src="../upload/image/slide/<?php echo $slide['image'] ?>" alt="" style="height: 60px;">
            </td>
            <td style="text-align:center">
                <?php
                    if($slide['hide']==0){
                        echo "Hiện";
                    }
                    else{
                        echo "Ẩn";
                    }
                ?>
            </td>
            <td style="text-align:center"><?php echo $slide['ordered']; ?></td>
            <td style="text-align:center"><?php echo date('d/m/Y', strtotime($slide['datebegin'])); ?></td>
            <td style="text-align:center">
                <a href="index-admin.php?pg=updateslide&id=<?php echo $slide['id']; ?>" class="btn btn-info btn-sm">Xem chi tiết</a>
                <a href="ad-controller/HomeManage/delete_slide.php?id=<?php echo $slide['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
            </td>
        </tr>
    <?php } ?>
  </tbody>
</table>

<h3 style="text-align: center;">Danh sách các cảnh đẹp</h3>
<div style="text-align: right; margin-bottom: 15px;">
    <a href="index-admin.php?pg=addcanhdep" class="btn btn-success">
        <i class="fas fa-plus"></i> Thêm hình ảnh
    </a>
</div>
<table class="table" style="margin-top: 10px;">
  <thead>
    <tr>
      <th scope="col" style="text-align:center">ID</th>
      <th scope="col" style="text-align:center">Tên địa danh</th>
      <th scope="col" style="text-align:center">Hình ảnh</th>
      <th scope="col" style="text-align:center">Ẩn/Hiện</th>
      <th scope="col" style="text-align:center">Ngày thêm ảnh</th>
      <th scope="col" style="text-align:center">Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach($canhdep_list as $canhdep){
    ?>
        <tr>
            <th scope="row" style="text-align:center"><?php echo $canhdep['id']; ?></th>
            <td style="text-align:center"><?php echo $canhdep['name']; ?></td>
            <td style="text-align:center">
                <img src="../upload/image/canhdepchay/<?php echo $canhdep['image']; ?>" alt="" style="height: 60px;">
            </td>
            <td style="text-align:center">
                <?php
                    if($slide['hide']==0){
                        echo "Hiện";
                    }
                    else{
                        echo "Ẩn";
                    }
                ?>
            </td>
            <td style="text-align:center"><?php echo date('d/m/Y', strtotime($canhdep['datebegin'])); ?></td>
            <td style="text-align:center">
                <a href="index-admin.php?pg=updatecanhdep&id=<?php echo $canhdep['id']; ?>" class="btn btn-info btn-sm">Xem chi tiết</a>
                <a href="ad-controller/HomeManage/delete_canhdep.php?id=<?php echo $canhdep['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
            </td>
        </tr>
    <?php } ?>
  </tbody>
</table>

<h3 style="text-align: center;">Danh sách các Tour mới</h3>

<table class="table" style="margin-top: 10px;">
  <thead>
    <tr>
      <th scope="col" style="text-align:center">ID</th>
      <th scope="col" style="text-align:center">Tên tour</th>
      <th scope="col" style="text-align:center">Lượt xem</th>
      <th scope="col" style="text-align:center">Số lượng đặt tour</th>
      <th scope="col" style="text-align:center">Hạng ★</th>
      <th scope="col" style="text-align:center">Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach($tourNew_list as $tourNew){
    ?>
        <tr>
            <th scope="row" style="text-align:center"><?php echo $tourNew['id']; ?></th>
            <td style="text-align:center"><?php echo $tourNew['name']; ?></td>
            <td style="text-align:center"><?php echo $tourNew['view']; ?></td>
            <td style="text-align:center">
                <?php
                    $luotBookTour = count_booktour_by_id($tourNew['id']);
                    echo $luotBookTour[0]["COUNT(*)"];
                ?>
            </td>
            <td style="text-align:center"><?php echo $tourNew['phanhang']; ?></td>
            <td style="text-align:center">
                <a href="index-admin.php?pg=tourdetail&id=<?php echo $tourNew['id']; ?>" class="btn btn-info btn-sm">Xem chi tiết</a>
                <a href="ad-controller/HomeManage/hideTour.php?id=<?php echo $tourNew['id']; ?>&hide=<?php echo $tourNew['hide']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Ẩn</a>
            </td>
        </tr>
    <?php } ?>
  </tbody>
</table>


<h3 style="text-align: center;">Danh sách các Tour Hot</h3>

<table class="table" style="margin-top: 10px;">
  <thead>
    <tr>
      <th scope="col" style="text-align:center">ID</th>
      <th scope="col" style="text-align:center">Tên tour</th>
      <th scope="col" style="text-align:center">Lượt xem</th>
      <th scope="col" style="text-align:center">Số lượng đặt tour</th>
      <th scope="col" style="text-align:center">Hạng ★</th>
      <th scope="col" style="text-align:center">Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach($tourHot_list as $tourHot){
    ?>
        <tr>
            <th scope="row" style="text-align:center"><?php echo $tourHot['id']; ?></th>
            <td style="text-align:center"><?php echo $tourHot['name']; ?></td>
            <td style="text-align:center"><?php echo $tourHot['view']; ?></td>
            <td style="text-align:center">
                <?php
                    $luotBookTour = count_booktour_by_id($tourHot['id']);
                    echo $luotBookTour[0]["COUNT(*)"];
                ?>
            </td>
            <td style="text-align:center"><?php echo $tourHot['phanhang']; ?></td>
            <td style="text-align:center">
                <a href="index-admin.php?pg=tourdetail&id=<?php echo $tourHot['id']; ?>" class="btn btn-info btn-sm">Xem chi tiết</a>
                <a href="ad-controller/HomeManage/hideTour.php?id=<?php echo $tourNew['id']; ?>&hide=<?php echo $tourNew['hide']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Ẩn</a>
            </td>
        </tr>
    <?php } ?>
  </tbody>
</table>