<?php
require_once __DIR__ . '/../../model/tour/get_tour.php';

$per_page = 12; // Tổng số tour mỗi trang
$per_category = 4; // Số tour mỗi danh mục trên mỗi trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$meta = $_GET['name'] ?? '';
$category = $_GET['category'] ?? 0;
$price = $_GET['price'] ?? 0;
$departure = $_GET['departure'] ?? 0;
$rating = $_GET['rating'] ?? 0;

$tours = [];
$tours_by_category = [];
$total_pages = 1;
$total_tours_all = 0;
$categories = [
    1 => ['name' => 'Du lịch miền Bắc'],
    2 => ['name' => 'Du lịch miền Trung'],
    3 => ['name' => 'Du lịch miền Nam']
];

// Dữ liệu tĩnh cho view
$price_labels = [
    1 => '0đ - 5.000.000đ',
    2 => '5.000.000đ - 10.000.000đ',
    3 => '10.000.000đ - 15.000.000đ',
    4 => '15.000.000đ - 20.000.000đ',
    5 => '20.000.000đ - 25.000.000đ'
];
$departure_locations = [
    1 => 'Hà Nội', 2 => 'Thành phố Hồ Chí Minh'
];
$destination_labels = [
    'tay-bac' => 'Tây Bắc',
    'ha-noi' => 'Hà Nội',
    'ha-long' => 'Hạ Long',
    'sapa' => 'Sa Pa',
    'hue' => 'Huế',
    'da-nang' => 'Đà Nẵng',
    'hoi-an' => 'Hội An',
    'nha-trang' => 'Nha Trang',
    'da-lat' => 'Đà Lạt',
    'phu-quoc' => 'Phú Quốc',
    'mien-tay' => 'Miền Tây',
    'vung-tau' => 'Vũng Tàu - Côn Đảo',
];

// Kiểm tra dữ liệu đầu vào
$price_ranges = [
    1 => [0, 5000000],
    2 => [5000000, 10000000],
    3 => [10000000, 15000000],
    4 => [15000000, 20000000],
    5 => [20000000, 25000000]
];
$min_price = $max_price = $depa = null;
if ($price && isset($price_ranges[$price])) {
    [$min_price, $max_price] = $price_ranges[$price];
}
if ($departure && isset($departure_locations[$departure])) {
    $depa = $departure_locations[$departure];
}
if ($rating && !($rating >= 1 && $rating <= 5)) {
    $rating = 0;
}
if ($category && !isset($categories[$category])) {
    $category = 0;
}

// Kiểm tra nếu $meta không nằm trong $destination_labels
if ($meta && !isset($destination_labels[$meta])) {
    $tours = get_tour_by_meta($meta);
    if (count($tours)==0) {
        $tours = [];
        $total_pages = 1; // Không có trang nào
    }
    else {
        $total_tours = count($tours);
        $total_pages = $total_tours > 0 ? ceil($total_tours / $per_page) : 1;
        $tours = array_slice($tours, ($page - 1) * $per_page, $per_page);
    }
    
} elseif ($meta || $category || $price || $departure || $rating) {
    // Lấy tour theo bộ lọc
    $tours = get_tours_filtered($meta, $category, $min_price, $max_price, $depa, $rating);
    $total_tours = count($tours);
    $total_pages = $total_tours > 0 ? ceil($total_tours / $per_page) : 1;
    $tours = array_slice($tours, ($page - 1) * $per_page, $per_page);
} else {
    // Lấy tổng số tour cho mỗi danh mục
    $total_tours_by_category = [];
    $min_tours = PHP_INT_MAX;
    foreach ($categories as $cat_id => $cat) {
        $total_tours_by_category[$cat_id] = get_total_tours_by_category($cat_id);
        $total_tours_all += $total_tours_by_category[$cat_id];
        // Tìm số tour nhỏ nhất trong các danh mục
        $min_tours = min($min_tours, $total_tours_by_category[$cat_id]);
    }

    // Tính số trang dựa trên danh mục có ít tour nhất
    $total_pages = $min_tours > 0 ? ceil($min_tours / $per_category) : 1;
    if ($page > $total_pages) $page = $total_pages;

    // Lấy 4 tour từ mỗi danh mục cho trang hiện tại
    foreach ($categories as $cat_id => $cat) {
        $offset = ($page - 1) * $per_category;
        $tours_by_category[$cat_id] = get_tour_by_category_limited($cat_id, $per_category, $offset);
    }
}
?>