<?php
require_once __DIR__ . '/../../model/pdo.php';

// Kiểm tra đăng nhập (không dùng header nữa)
function checkLogin() {
    if (!isset($_SESSION['user']) || $_SESSION['user'] <= 0) {
        return false; // Trả về false nếu chưa đăng nhập
    }
    return $_SESSION['user'];
}

// Lấy thông tin người dùng
function getUserInfo($userid) {
    $sql = "SELECT fullname, email, gioitinh, ngaysinh, phone, password, address FROM user WHERE userid = ?";
    try {
        return pdo_query_one($sql, $userid);
    } catch (PDOException $e) {
        die("Lỗi khi lấy thông tin người dùng: " . $e->getMessage());
    }
}

// Cập nhật thông tin cá nhân
function updateProfile($userid, $fullname, $email, $gioitinh, $ngaysinh, $phone, $address) {
    $sql = "UPDATE user SET fullname = ?, email = ?, gioitinh = ?, ngaysinh = ?, phone = ?, address = ? WHERE userid = ?";
    try {
        pdo_execute($sql, $fullname, $email, $gioitinh, $ngaysinh, $phone, $address ,$userid);
        return ["success" => true, "message" => "Cập nhật thông tin thành công!"];
    } catch (PDOException $e) {
        return ["success" => false, "message" => "Lỗi khi cập nhật thông tin: " . $e->getMessage()];
    }
}

// Đổi mật khẩu
function changePassword($userid, $current_password, $new_password, $confirm_password) {
    $sql = "SELECT password FROM user WHERE userid = ?";
    $current_user = pdo_query_one($sql, $userid);

    if ($current_user['password'] !== $current_password) {
        return ["success" => false, "message" => "Mật khẩu hiện tại không đúng."];
    }
    if ($new_password !== $confirm_password) {
        return ["success" => false, "message" => "Mật khẩu mới và xác nhận mật khẩu không khớp."];
    }

    $sql = "UPDATE user SET password = ? WHERE userid = ?";
    try {
        pdo_execute($sql, $new_password, $userid);
        return ["success" => true, "message" => "Đổi mật khẩu thành công!"];
    } catch (PDOException $e) {
        return ["success" => false, "message" => "Lỗi khi đổi mật khẩu: " . $e->getMessage()];
    }
}

// Lấy danh sách tour đã đặt
function getUserBookings($userid) {
    $sql = "SELECT b.id, b.tourid, b.bookdate, b.status, t.name, t.khoihanh, t.categoryid, b.payment 
            FROM booktour b 
            JOIN tour t ON b.tourid = t.id 
            WHERE b.userid = ? 
            ORDER BY b.bookdate DESC";
    try {
        return pdo_query($sql, $userid);
    } catch (PDOException $e) {
        die("Lỗi khi lấy danh sách tour: " . $e->getMessage());
    }
}

// Hủy tour
function cancelBooking($booking_id, $userid) {
    $sql = "SELECT bookdate FROM booktour WHERE id = ? AND userid = ? AND status = 0";
    $booking = pdo_query_one($sql, $booking_id, $userid);

    if ($booking) {
        $booking_date = new DateTime($booking['bookdate']);
        $now = new DateTime();
        $interval = $now->diff($booking_date);
        $days_diff = $interval->days;

        if ($days_diff <= 3) {
            $sql = "UPDATE booktour SET status = 1 WHERE id = ?";
            try {
                pdo_execute($sql, $booking_id);
                return ["success" => true, "message" => "Hủy tour thành công!"];
            } catch (PDOException $e) {
                return ["success" => false, "message" => "Lỗi khi hủy tour: " . $e->getMessage()];
            }
        } else {
            return ["success" => false, "message" => "Chỉ có thể hủy tour trong vòng 3 ngày kể từ ngày đặt."];
        }
    } else {
        return ["success" => false, "message" => "Tour không tồn tại hoặc đã bị hủy."];
    }
}

// Xử lý các hành động
function processAccountActions() {
    $userid = checkLogin();
    if ($userid === false) {
        return ["success" => false, "message" => "Vui lòng đăng nhập để tiếp tục.", "user" => null, "bookings" => []];
    }

    $result = ["success" => false, "message" => ""];

    // Lấy thông tin người dùng
    $user = getUserInfo($userid);

    // Xử lý thay đổi thông tin cá nhân
    if (isset($_POST['update_profile'])) {
        $fullname = $_POST['fullname'] ?? '';
        $email = $_POST['email'] ?? '';
        $gioitinh = $_POST['gioitinh'] ?? '';
        $ngaysinh = $_POST['ngaysinh'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';
        $result = updateProfile($userid, $fullname, $email, $gioitinh, $ngaysinh, $phone, $address);
        if ($result['success']) {
            $user = getUserInfo($userid); // Cập nhật lại thông tin người dùng
        }
    }

    // Xử lý đổi mật khẩu
    if (isset($_POST['change_password'])) {
        $current_password = $_POST['currentPassword'] ?? '';
        $new_password = $_POST['newPassword'] ?? '';
        $confirm_password = $_POST['confirmPassword'] ?? '';
        $result = changePassword($userid, $current_password, $new_password, $confirm_password);
    }

    // Xử lý hủy tour
    if (isset($_POST['cancel_booking'])) {
        $booking_id = $_POST['booking_id'] ?? 0;
        $result = cancelBooking($booking_id, $userid);
    }

    // Xử lý thay đổi một trường thông tin
    if (isset($_POST['update_field'])) {
        $field_name = $_POST['field_name'] ?? '';
        $field_value = $_POST[$field_name] ?? '';
        
        if (!empty($field_name) && !empty($field_value)) {
            $sql = "UPDATE user SET $field_name = ? WHERE userid = ?";
            try {
                pdo_execute($sql, $field_value, $userid);
                $result = ["success" => true, "message" => "Cập nhật thông tin thành công!"];
                $user = getUserInfo($userid); // Cập nhật lại thông tin người dùng
            } catch (PDOException $e) {
                $result = ["success" => false, "message" => "Lỗi khi cập nhật thông tin: " . $e->getMessage()];
            }
        } else {
            $result = ["success" => false, "message" => "Thông tin không hợp lệ!"];
        }
    }
    // Lấy danh sách tour
    $bookings = getUserBookings($userid);

    return [
        "user" => $user,
        "bookings" => $bookings,
        "message" => $result['message'],
        "success" => $result['success']
    ];
}