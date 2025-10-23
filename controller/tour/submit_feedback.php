<?php
require_once __DIR__ . '/../../model/pdo.php';
session_start(); // Bắt đầu session

// Hàm lưu phản hồi vào bảng customerfeedback
function saveFeedback($fullname, $email, $title, $content) {
    $sql = "INSERT INTO customerfeedback (fullname, email, title, content, date) VALUES (?, ?, ?, ?, NOW())"; // Câu lệnh SQL để chèn phản hồi vào bảng customerfeedback
    try {
        pdo_execute($sql, $fullname, $email, $title, $content);
        return ["success" => true, "message" => "Gửi phản hồi thành công!"];    
    } catch (PDOException $e) {
        return ["success" => false, "message" => "Lỗi khi gửi phản hồi: " . $e->getMessage()];
    }
}

// Xử lý dữ liệu từ form
if (isset($_POST['submit_feedback'])) {
    $fullname = $_POST['fullname'] ?? '';
    $email = $_POST['email'] ?? '';
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';


    // Lưu phản hồi vào cơ sở dữ liệu
    $result = saveFeedback($fullname, $email, $title, $content);    

    if ($result['success']) {
        $_SESSION['flash_message'] = ["type" => "success", "message" => "Gửi phản hồi thành công!"];    
    } else {
        $_SESSION['flash_message'] = ["type" => "error", "message" => $result['message']];
    }
    header("Location: ../../index.php?pg=Lien-he");
    exit();
} else {
    $_SESSION['flash_message'] = ["type" => "error", "message" => "Không có dữ liệu gửi lên."];     
    header("Location: ../../index.php?pg=Lien-he&error=");  // Chuyển hướng về trang liên hệ với thông báo lỗi
    exit();
}
?>