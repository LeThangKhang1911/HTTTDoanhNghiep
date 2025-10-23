<?php
    require_once 'ad-model/AdminManagement/get_dieuchinh.php';
    require_once 'ad-model/AdminManagement/get_admin.php';
    $dieuchinh = get_dieuchinh_tour();
?>

<h3 style="text-align: center;">Danh sách các lần điều chỉnh/đăng tour</h3>
<table class="table" style="margin-top: 10px;">
  <thead>
    <tr>
      <th scope="col" style="text-align:center">ID</th>
      <th scope="col" style="text-align:center">ID tour được thêm/điều chỉnh</th>
      <th scope="col" style="text-align:center">Tên người thêm/điều chỉnh</th>
      <th scope="col" style="text-align:center">Hành động</th>
      <th scope="col" style="text-align:center">Ngày điều chỉnh</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach($dieuchinh as $dc){
    ?>
        <tr>
            <th scope="row" style="text-align:center"><?php echo $dc['id']; ?></th>
            <td style="text-align:center"><?php echo $dc['tourid']; ?></td>
            <td style="text-align:center">
                <?php
                    $admin = get_admin_by_id($dc['adminid']);
                    $ad = $admin[0];
                    echo $ad['fullname']
                ?>
            </td>
            <td style="text-align:center"><?php echo $dc['action'] ?></td>
            <td style="text-align:center"><?php echo date('d/m/Y H:i:s', strtotime($dc['date'])); ?></td>
        </tr>
    <?php } ?>
  </tbody>
</table>