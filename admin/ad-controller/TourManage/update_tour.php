<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../ad-model/AdminTour/get_tour.php';
require_once __DIR__ . '/../../ad-model/AdminTour/get_tourdetail.php';
require_once __DIR__ . '/../../ad-model/AdminManagement/get_dieuchinh.php';

// Hàm kiểm tra categoryid tồn tại
function is_valid_category($categoryid)
{
    $sql = "SELECT id FROM category WHERE id = ?";
    $result = pdo_query_one($sql, $categoryid);
    return $result !== false;
}

// Xử lý xóa bình luận
if (isset($_GET['action']) && $_GET['action'] === 'delete_comment' && isset($_GET['comment_id'])) {
    $comment_id = intval($_GET['comment_id']);
    $tourid = isset($_GET['tourid']) ? intval($_GET['tourid']) : 0;

    // Kiểm tra $tourid hợp lệ
    if ($tourid <= 0) {
        $_SESSION['alert'] = [
            'message' => 'ID tour không hợp lệ khi xóa bình luận!',
            'type' => 'error'
        ];
        header('Location: ../../index-admin.php?pg=tour');
        exit();
    }

    require_once __DIR__ . '/../../ad-model/AdminTour/get_tourdetail.php';
    delete_comment($comment_id, $tourid);

    $_SESSION['alert'] = [
        'message' => 'Xóa bình luận thành công!',
        'type' => 'success'
    ];
    // Chuyển hướng về trang chi tiết tour ban đầu
    header('Location: ../../index-admin.php?pg=tourdetail&id=' . $tourid);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Xử lý cập nhật thông tin tour chính
        if (isset($_POST['btn-updatetour'])) {
            $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $price = isset($_POST['price']) ? floatval($_POST['price']) : 0;
            $sale_percent = isset($_POST['sale_percent']) ? intval($_POST['sale_percent']) : 0;
            $vehicle = isset($_POST['vehicle']) ? trim($_POST['vehicle']) : '';
            $khoihanh = isset($_POST['khoihanh']) ? trim($_POST['khoihanh']) : '';
            $thoigian = isset($_POST['thoigian']) ? trim($_POST['thoigian']) : '';
            $diemkhoihanh = isset($_POST['diemkhoihanh']) ? trim($_POST['diemkhoihanh']) : '';
            $description = isset($_POST['description']) ? trim($_POST['description']) : '';
            $hide = isset($_POST['hide']) ? 1 : 0;
            $ordered = isset($_POST['ordered']) ? intval($_POST['ordered']) : 0;
            $meta = isset($_POST['meta']) ? trim($_POST['meta']) : '';
            $categoryid = isset($_POST['categoryid']) ? intval($_POST['categoryid']) : 0;
            $seat = isset($_POST['seat']) ? intval($_POST['seat']) : 0;
            $phanhang = isset($_POST['phanhang']) ? intval($_POST['phanhang']) : 0;
            $price_sale = $price - ($price * ($sale_percent/100));
            // Kiểm tra dữ liệu bắt buộc
            $errors = [];
            if (empty($name)) {
                $errors[] = "Tên tour là bắt buộc!";
            }
            if ($price <= 0) {
                $errors[] = "Giá tour phải lớn hơn 0!";
            }
            if ($categoryid <= 0 || !is_valid_category($categoryid)) {
                $errors[] = "Danh mục không hợp lệ!";
            }
            if ($ordered < 0) {
                $errors[] = "Thứ tự hiển thị phải là số không âm!";
            }

            if (!empty($errors)) {
                $_SESSION['alert'] = [
                    'message' => implode('<br>', $errors),
                    'type' => 'error'
                ];
                $_SESSION['form_data'] = $_POST;
                header('Location: ../../ad-view/ad-tourDetail.php?id=' . $id);
                exit();
            }

            // Cấu hình thư mục lưu ảnh
            $uploadDir = __DIR__ . '/../../../upload/image/tour/';
            $maxFileSize = 40 * 1024 * 1024; // 40MB

            // Tạo thư mục nếu chưa tồn tại
            if (!is_dir($uploadDir)) {
                $errors[] = "Không thể tạo thư mục $uploadDir! Kiểm tra quyền thư mục cha.";
            }

            // Kiểm tra quyền ghi thư mục
            if (!is_writable($uploadDir)) {
                $errors[] = "Thư mục $uploadDir không có quyền ghi! Vui lòng kiểm tra quyền thư mục.";
            }

            // Hàm xử lý tải lên tệp
            function uploadFile($fileKey, $uploadDir, $maxFileSize)
            {
                if (!empty($_FILES[$fileKey]['name'])) {
                    $file = $_FILES[$fileKey];
                    $originalFileName = basename($file['name']);
                    $cleanFileName = preg_replace('/[^A-Za-z0-9\-_\.]/', '_', $originalFileName);
                    $filePath = $uploadDir . $cleanFileName;
                    $fileSize = $file['size'];

                    if ($fileSize > $maxFileSize) {
                        $errors[] = "Tệp $fileKey vượt quá giới hạn kích thước (40MB)!";
                        return null;
                    }

                    if (!file_exists($filePath)) {
                        if (move_uploaded_file($file['tmp_name'], $filePath)) {
                            return $cleanFileName;
                        } else {
                            $errors[] = "Lỗi khi tải lên tệp $fileKey! Đường dẫn đích: $filePath";
                            return null;
                        }
                    } else {
                        return $cleanFileName;
                    }
                }
                return null;
            }

            // Xử lý tải lên ảnh và giữ ảnh hiện tại
            $image = uploadFile('image', $uploadDir, $maxFileSize);
            $image = $image !== null ? $image : (isset($_POST['current_image']) ? trim($_POST['current_image']) : '');

            // Xử lý ảnh cho chi tiết tour
            $image1 = uploadFile('image1', $uploadDir, $maxFileSize);
            $image1 = $image1 !== null ? $image1 : (isset($_POST['current_image1']) ? trim($_POST['current_image1']) : '');

            $image2 = uploadFile('image2', $uploadDir, $maxFileSize);
            $image2 = $image2 !== null ? $image2 : (isset($_POST['current_image2']) ? trim($_POST['current_image2']) : '');

            $image3 = uploadFile('image3', $uploadDir, $maxFileSize);
            $image3 = $image3 !== null ? $image3 : (isset($_POST['current_image3']) ? trim($_POST['current_image3']) : '');

            if (!empty($errors)) {
                $_SESSION['alert'] = [
                    'message' => implode('<br>', $errors),
                    'type' => 'error'
                ];
                $_SESSION['form_data'] = $_POST;
                header('Location: ../../ad-view/ad-tourDetail.php?id=' . $id);
                exit();
            }

            // Cập nhật tour
            update_tour($id, $name, $price, $price_sale, $sale_percent, $image, $vehicle, $khoihanh, $thoigian, $diemkhoihanh, $description, $hide, $ordered, $meta, $categoryid, $seat, $phanhang);

            // Ghi log vào dieuchinhtour
            $adminid = isset($_SESSION['admin']['adid']) ? $_SESSION['admin']['adid'] : 1;
            add_dieuchinhtour($id, $adminid, "Sửa");

            $_SESSION['alert'] = [
                'message' => 'Cập nhật tour thành công.',
                'type' => 'success'
            ];
            header('Location: ../../index-admin.php?pg=tour');
            exit();
        }

        // Xử lý cập nhật chi tiết tour
        if (isset($_POST['btn-updatechitiettour'])) {
            $tourid = isset($_POST['tourid']) ? intval($_POST['tourid']) : 0;
            $chitiettour_id = isset($_POST['id']) ? intval($_POST['id']) : 0;

            $mota1 = isset($_POST['mota1']) ? trim($_POST['mota1']) : '';
            $image1 = isset($_POST['current_image1']) ? trim($_POST['current_image1']) : '';
            $image2 = isset($_POST['current_image2']) ? trim($_POST['current_image2']) : '';
            $image3 = isset($_POST['current_image3']) ? trim($_POST['current_image3']) : '';

            // Kiểm tra dữ liệu bắt buộc
            $errors = [];
            if (empty($mota1)) {
                $errors[] = "Mô tả chi tiết là bắt buộc!";
            }

            if (!empty($errors)) {
                $_SESSION['alert'] = [
                    'message' => implode('<br>', $errors),
                    'type' => 'error'
                ];
                header('Location: ../../ad-view/ad-tourDetail.php?id=' . $tourid);
                exit();
            }

            // Cấu hình thư mục lưu ảnh
            $uploadDir = __DIR__ . '/../../../upload/image/tour/';
            $maxFileSize = 40 * 1024 * 1024; // 40MB

            // Tạo thư mục nếu chưa tồn tại
            if (!is_dir($uploadDir)) {
                $errors[] = "Không thể tạo thư mục $uploadDir! Kiểm tra quyền thư mục cha.";
            }

            // Kiểm tra quyền ghi thư mục
            if (!is_writable($uploadDir)) {
                $errors[] = "Thư mục $uploadDir không có quyền ghi! Vui lòng kiểm tra quyền thư mục.";
            }

            // Xử lý upload ảnh chi tiết
            function uploadFile($fileKey, $uploadDir, $maxFileSize)
            {
                if (!empty($_FILES[$fileKey]['name'])) {
                    $file = $_FILES[$fileKey];
                    $originalFileName = basename($file['name']);
                    $cleanFileName = preg_replace('/[^A-Za-z0-9\-_\.]/', '_', $originalFileName);
                    $filePath = $uploadDir . $cleanFileName;
                    $fileSize = $file['size'];

                    if ($fileSize > $maxFileSize) {
                        $errors[] = "Tệp $fileKey vượt quá giới hạn kích thước (40MB)!";
                        return null;
                    }

                    if (!file_exists($filePath)) {
                        if (move_uploaded_file($file['tmp_name'], $filePath)) {
                            return $cleanFileName;
                        } else {
                            $errors[] = "Lỗi khi tải lên tệp $fileKey! Đường dẫn đích: $filePath";
                            return null;
                        }
                    } else {
                        return $cleanFileName;
                    }
                }
                return null;
            }

            $image1 = uploadFile('image1', $uploadDir, $maxFileSize) ?: $image1;
            $image2 = uploadFile('image2', $uploadDir, $maxFileSize) ?: $image2;
            $image3 = uploadFile('image3', $uploadDir, $maxFileSize) ?: $image3;

            if (!empty($errors)) {
                $_SESSION['alert'] = [
                    'message' => implode('<br>', $errors),
                    'type' => 'error'
                ];
                header('Location: ../../ad-view/ad-tourDetail.php?id=' . $tourid);
                exit();
            }

            // Cập nhật hoặc thêm chi tiết tour
            if ($chitiettour_id > 0) {
                update_chitiettour($chitiettour_id, $mota1, $image1, $image2, $image3);
            } else {
                add_chitiettour($tourid, $mota1, $image1, $image2, $image3);
            }

            // Ghi log
            $adminid = isset($_SESSION['admin']['adid']) ? $_SESSION['admin']['adid'] : 1;
            add_dieuchinhtour($tourid, $adminid, "Sửa");

            $_SESSION['alert'] = [
                'message' => 'Cập nhật chi tiết tour thành công!',
                'type' => 'success'
            ];
            header('Location: ../../index-admin.php?pg=tour');
            exit();
        }

        // Xử lý cập nhật lịch trình tour
        if (isset($_POST['btn-updatelichtrinhtour'])) {
            $tourid = isset($_POST['tourid']) ? intval($_POST['tourid']) : 0;
            $lichtrinhtour_id = isset($_POST['id']) ? intval($_POST['id']) : 0;

            $Ngay1 = isset($_POST['Ngay1']) ? trim($_POST['Ngay1']) : '';
            $Ngay2 = isset($_POST['Ngay2']) ? trim($_POST['Ngay2']) : '';
            $Ngay3 = isset($_POST['Ngay3']) ? trim($_POST['Ngay3']) : '';
            $Ngay4 = isset($_POST['Ngay4']) ? trim($_POST['Ngay4']) : '';
            $Ngay5 = isset($_POST['Ngay5']) ? trim($_POST['Ngay5']) : '';
            $Ngay6 = isset($_POST['Ngay6']) ? trim($_POST['Ngay6']) : '';

            // Cập nhật hoặc thêm lịch trình tour
            if ($lichtrinhtour_id > 0) {
                update_lichtrinhtour($lichtrinhtour_id, $Ngay1, $Ngay2, $Ngay3, $Ngay4, $Ngay5, $Ngay6);
            } else {
                add_lichtrinhtour($tourid, $Ngay1, $Ngay2, $Ngay3, $Ngay4, $Ngay5, $Ngay6);
            }

            // Ghi log
            $adminid = isset($_SESSION['admin']['adid']) ? $_SESSION['admin']['adid'] : 1;
            add_dieuchinhtour($tourid, $adminid, "Sửa");

            $_SESSION['alert'] = [
                'message' => 'Cập nhật lịch trình tour thành công!',
                'type' => 'success'
            ];
            header('Location: ../../index-admin.php?pg=tour');
            exit();
        }
    } catch (Exception $e) {
        $_SESSION['alert'] = [
            'message' => 'Lỗi: ' . $e->getMessage(),
            'type' => 'error'
        ];
        $tourid = isset($_POST['tourid']) ? $_POST['tourid'] : (isset($_POST['id']) ? $_POST['id'] : (isset($_GET['tourid']) ? $_GET['tourid'] : 0));
        header('Location: ../../ad-view/ad-tourDetail.php?id=' . $tourid);
        exit();
    }
} else {
    $_SESSION['alert'] = [
        'message' => 'Đã có lỗi xảy ra.',
        'type' => 'error'
    ];
    header('Location: ../../ad-view/ad-tourDetail.php?id=' . (isset($_GET['id']) ? $_GET['id'] : 0));
    exit();
}