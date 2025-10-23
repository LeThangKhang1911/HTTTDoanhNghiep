<?php
    require_once 'ad-model/AdminXuhuong/get_xuhuong.php';
    $news_list = get_all_news();

?>
<h2 style="margin-top: 20px; text-align: center;">Danh sách tất cả các tin tức</h2>

<div style="text-align: right; margin: 0px 30px 15px 0px;">
    <a href="index-admin.php?pg=addnews" class="btn btn-success">
        <i class="fas fa-plus"></i> Thêm tin tức
    </a>
</div>

<table class="table" style="margin-top: 10px;">
  <thead>
    <tr>
      <th scope="col" style="text-align:center;">ID</th>
      <th scope="col" style="text-align:center;">Tiêu đề</th>
      <th scope="col" style="text-align:center;">Ẩn / Hiện</th>
      <th scope="col" style="text-align:center;">Ngày đăng</th>
      <th scope="col" style="text-align:center;">Thứ tự được hiển thị</th>
      <th scope="col" style="text-align:center;">Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        foreach($news_list as $news){
    ?>
        <tr>
            <th scope="row" style="text-align: center;"><?php echo $news['id']; ?></th>
            <td style="text-align: center;"><?php echo $news['name']; ?></td>
            <td style="text-align: center;">
                <?php
                    if($news['hide'] == 0){
                        echo "Hiện";
                    }
                    else {
                        echo "Ẩn";
                    }
                ?>
            </td>
            <td style="text-align: center;"><?php echo date('d/m/Y H:i:s', strtotime($news['datebegin'])); ?></td>
            <td style="text-align:center;"><?php echo $news['ordered']; ?></td>
            <td style="text-align: center;">
                <a href="index-admin.php?pg=newsdetail&id=<?php echo $news['id']; ?>" class="btn btn-info btn-sm">Xem chi tiết</a>
                <a href="ad-controller/XuhuongManage/delete_news.php?id=<?php echo $news['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
            </td>
        </tr>
    <?php } ?>
  </tbody>
</table>
