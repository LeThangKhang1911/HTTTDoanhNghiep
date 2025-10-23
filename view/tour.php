<?php
include_once 'controller/tour/filtertour.php';
require_once 'controller/tour/showtour.php';
?>

<div class="container body-web">
    <div class="d-flex flex-column align-items-center">
        <?php
        $category_titles = [
            1 => 'Du lịch miền Bắc',
            2 => 'Du lịch miền Trung',
            3 => 'Du lịch miền Nam'
        ];
        $header_title = isset($category_titles[$category]) ? $category_titles[$category] : 'TOUR';
        if ($meta) {
            if (isset($destination_labels[$meta])) {
                $header_title = 'Tìm kiếm tour: ' . htmlspecialchars($destination_labels[$meta]);
            } else {
                $header_title = 'Tìm kiếm tour: ' . htmlspecialchars($meta);
            }
        }
        ?>
        <h2 style="color: #0092e0; margin-top: 10px;"><?= $header_title ?></h2>
        <hr style="width: 100px; height: 5px; background-color: navy; border-radius: 10px; border: none; opacity: 1; margin-bottom: 40px;">
    </div>
    <div class="product">
        <!-- Bộ lọc -->
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-2">
                <select class="form-select form-select-sm" onchange="updateFilters(this, 'price')">
                    <option value="" <?= !$price ? 'selected' : ''; ?>>Chọn mức giá</option>
                    <?php foreach ($price_labels as $value => $label): ?>
                        <option value="<?= $value ?>" <?= $price == $value ? 'selected' : ''; ?>><?= $label ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-2">
                <select class="form-select form-select-sm" onchange="updateFilters(this, 'departure')">
                    <option value="" <?= !$departure ? 'selected' : ''; ?>>Điểm đi</option>
                    <?php foreach ($departure_locations as $value => $label): ?>
                        <option value="<?= $value ?>" <?= $departure == $value ? 'selected' : ''; ?>><?= $label ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-2">
                <select class="form-select form-select-sm" onchange="updateFilters(this, 'name')">
                    <option value="" <?= !$meta ? 'selected' : ''; ?>>Điểm đến</option>
                    <?php foreach ($destination_labels as $value => $label): ?>
                        <option value="<?= $value ?>" <?= $meta == $value ? 'selected' : ''; ?>><?= $label ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-2">
                <select class="form-select form-select-sm" onchange="updateFilters(this, 'rating')">
                    <option value="" <?= !$rating ? 'selected' : ''; ?>>Xếp hạng tour</option>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <option value="<?= $i ?>" <?= $rating == $i ? 'selected' : ''; ?>><?= str_repeat('★', $i) ?></option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>

        <!-- Hiển thị các bộ lọc đã chọn -->
        <?php if ($meta || $price || $departure || $rating): ?>
            <div class="row d-flex justify-content-center align-items-center" style="margin-bottom: 20px;">
                <div class="col-12">
                    <strong>Bộ lọc đã chọn: </strong>
                    <?php
                    $filters = [];
                    if ($price) {
                        $filters[] = "Giá: " . $price_labels[$price] . " <a href='javascript:void(0)' onclick=\"removeFilter('price')\" class='text-danger' style='text-decoration: none;'> x </a>";
                    }
                    if ($departure) {
                        $filters[] = "Điểm đi: " . $departure_locations[$departure] . " <a href='javascript:void(0)' onclick=\"removeFilter('departure')\" class='text-danger' style='text-decoration: none;'> x </a>";
                    }
                    if ($meta) {
                        $display_label = isset($destination_labels[$meta]) ? $destination_labels[$meta] : htmlspecialchars($meta);
                        $filters[] = "Điểm đến: " . $display_label . " <a href='javascript:void(0)' onclick=\"removeFilter('name')\" class='text-danger' style='text-decoration: none;'> x </a>";
                    }
                    if ($rating) {
                        $filters[] = "Xếp hạng: " . str_repeat('★', $rating) . " <a href='javascript:void(0)' onclick=\"removeFilter('rating')\" class='text-danger' style='text-decoration: none;'> x </a>";
                    }
                    echo implode(" | ", $filters);
                    ?>
                    <a href="index.php?pg=Tour" class="btn btn-sm btn-danger" style="margin-left: 10px;">Xóa tất cả</a>
                </div>
            </div>
        <?php endif; ?>

        <!-- Danh sách tour -->
        <div id="content1" class="content active-content">
            <?php if (!$meta && !$category && !$price && !$departure && !$rating): ?>
                <?php if ($total_tours_all == 0): ?>
                    <p style="text-align: center; color: #666;">Hiện tại chưa có tour nào.</p>
                <?php else: ?>
                    <?php foreach ($categories as $cat_id => $cat): ?>
                        <?php if (!empty($tours_by_category[$cat_id])): ?>
                            <h3 style="color: #0092e0; margin-top: 20px;"><?php echo $cat['name']; ?></h3>
                            <div class="row d-flex justify-content-start align-items-center">
                                <?php showTour($tours_by_category[$cat_id]); ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php else: ?>
                <div class="row d-flex justify-content-start align-items-center">
                    <?php if (!empty($tours)): ?>
                        <?php showTour($tours); ?>
                    <?php else: ?>
                        <p style="text-align: center; color: #666;">Không tìm thấy tour nào phù hợp.</p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- Phân trang -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mt-3">
                    <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="index.php?pg=Tour&<?= $meta ? 'name=' . urlencode($meta) . '&' : '' ?><?= $category ? 'category=' . $category . '&' : '' ?><?= $price ? 'price=' . $price . '&' : '' ?><?= $departure ? 'departure=' . $departure . '&' : '' ?><?= $rating ? 'rating=' . $rating . '&' : '' ?>page=<?= $page - 1 ?>">«</a>
                    </li>
                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                        <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                            <a class="page-link" href="index.php?pg=Tour&<?= $meta ? 'name=' . urlencode($meta) . '&' : '' ?><?= $category ? 'category=' . $category . '&' : '' ?><?= $price ? 'price=' . $price . '&' : '' ?><?= $departure ? 'departure=' . $departure . '&' : '' ?><?= $rating ? 'rating=' . $rating . '&' : '' ?>page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?= $page >= $total_pages ? 'disabled' : '' ?>">
                        <a class="page-link" href="index.php?pg=Tour&<?= $meta ? 'name=' . urlencode($meta) . '&' : '' ?><?= $category ? 'category=' . $category . '&' : '' ?><?= $price ? 'price=' . $price . '&' : '' ?><?= $departure ? 'departure=' . $departure . '&' : '' ?><?= $rating ? 'rating=' . $rating . '&' : '' ?>page=<?= $page + 1 ?>">»</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<script>
function updateFilters(select, param) {
    const params = new URLSearchParams(window.location.search);
    if (select.value) {
        params.set(param, select.value);
    } else {
        params.delete(param);
    }
    params.set('pg', 'Tour');
    params.delete('page');
    window.location.href = 'index.php?' + params.toString();
}

function removeFilter(param) {
    const params = new URLSearchParams(window.location.search);
    params.delete(param);
    params.set('pg', 'Tour');
    params.delete('page');
    window.location.href = 'index.php?' + params.toString();
}
</script>