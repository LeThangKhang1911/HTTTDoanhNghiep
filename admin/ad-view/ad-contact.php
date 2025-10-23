<?php
    require_once 'ad-model/AdminContact/get_contact.php';
    $feedback = get_feedback();

?>

<h2 style="margin-top: 20px; text-align: center;">Danh sách tất cả quản trị viên trang web</h2>


<table class="table" style="margin-top: 10px;">
  <thead>
    <tr>
      <th scope="col" style="text-align: center;">ID</th>
      <th scope="col" style="text-align: center;">Họ và tên khách hàng</th>
      <th scope="col" style="text-align: center;">Tiêu đề</th>
      <th scope="col" style="text-align: center;">Nội dung</th>
      <th scope="col" style="text-align: center;">Ngày phản hồi</th>
      <th scope="col" style="text-align: center;"></th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach($feedback as $fb){
    ?>
        <tr>
            <th scope="row" style="text-align: center;"><?php echo $fb['id']; ?></th>
            <td style="text-align: center;"><?php echo $fb['fullname']; ?></td>
            <td style="text-align: center;"><?php echo $fb['title']; ?></td>
            <td style="text-align: center;"><?php echo $fb['content']; ?></td>
            <td style="text-align: center;"><?php echo date('d/m/Y H:i:s', strtotime($fb['date'])); ?></td>
            <td style="text-align: center;">
                <a href="mailto: <?php echo $fb['email']; ?>" class="btn btn-info btn-sm">Trả lời</a>
            </td>
        </tr>
    <?php } ?>
  </tbody>
</table>