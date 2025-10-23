<?php
session_start();
require_once __DIR__ . '/../../model/pdo.php';

$tourid = $_GET['tourid'] ?? 0;
$comment_submitted = false;
$fullname = '';

// Lấy tên người dùng từ bảng users nếu đã đăng nhập
if (isset($_SESSION['user']) && $_SESSION['user'] > 0) {
    $userid = $_SESSION['user'];
    $sql = "SELECT fullname FROM user WHERE userid = ?";
    try {
        $user = pdo_query_one($sql, $userid);
        $fullname = $user['fullname'] ?? 'Người dùng ẩn danh';
    } catch (PDOException $e) {
        die("Lỗi khi lấy thông tin người dùng: " . $e->getMessage());
    }
}

// Xử lý gửi bình luận
if (isset($_POST['guibinhluan'])) {
    // Kiểm tra đăng nhập
    if (!isset($_SESSION['user']) || $_SESSION['user'] <= 0) {
        // Nếu người dùng chưa đăng nhập
    } else {
        $content = $_POST['noidung'] ?? '';
        $datecomment = date('Y-m-d H:i:s');
        $userid = $_SESSION['user'];

        if ($content != '' && $tourid > 0) {
            $sql = "INSERT INTO comment (name, userid, tourid, content, datecomment, hide)
                    VALUES (?, ?, ?, ?, ?, 0)";
            try {
                pdo_execute($sql, $fullname, $userid, $tourid, $content, $datecomment);
                $comment_submitted = true;
            } catch (PDOException $e) {
                die("Lỗi khi thêm bình luận: " . $e->getMessage());
            }
        }
    }
}

// Lấy danh sách bình luận
$sql = "SELECT * FROM comment WHERE tourid = ? AND hide = 0 ORDER BY datecomment DESC";
try {
    $comments = pdo_query($sql, $tourid);
} catch (PDOException $e) {
    die("Lỗi khi lấy bình luận: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình Luận</title>
    <style>
        body {
            background-color: #fff;
            padding: 0;
            margin: 0;
            overflow-x: hidden;
            font-family: 'Poppins', sans-serif;
        }
        .container-fluid {
            padding: 0;
            width: 100%;
            overflow-x: hidden;
        }
        .comment-section {
            width: 100%;
            background-color: #fff;
            padding: 20px;
            box-sizing: border-box;
        }
        .comment-form {
            margin-bottom: 30px;
        }
        .comment-form textarea {
            width: 100%;
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 12px 15px;
            margin-bottom: 15px;
            resize: none;
            box-sizing: border-box;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .comment-form textarea::placeholder {
            color: #aaa;
            font-style: italic;
        }
        .comment-form textarea:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
            outline: none;
        }
        .comment-form .btn {
            background: linear-gradient(45deg, #007bff, #00c4ff);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 16px;
            color: #fff;
            border-radius: 25px;
            box-shadow: 0 3px 10px rgba(0, 123, 255, 0.3);
            transition: transform 0.2s ease, box-shadow 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }
        .comment-form .btn:hover {
            background: linear-gradient(45deg, #0056b3, #0096cc);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.5);
        }
        .comment-list h5 {
            font-size: 24px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }
        .comment-item {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
            width: 100%;
            box-sizing: border-box;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease, box-shadow 0.3s ease;
        }
        .comment-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .comment-item img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }
        .comment-content {
            flex-grow: 1;
            word-wrap: break-word;
        }
        .comment-content .user-name {
            font-weight: 600;
            font-size: 18px;
            color: #333;
        }
        .comment-content .comment-text {
            margin: 8px 0;
            font-size: 16px;
            color: #555;
            word-wrap: break-word;
        }
        .comment-content .comment-meta {
            color: #888;
            font-size: 14px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="comment-section">
            <!-- Form bình luận -->
            <div class="comment-form">
                <form action="binhluan.php?tourid=<?php echo $tourid ?>" method="post" onsubmit="return checkLogin()">
                    <input type="hidden" name="tourid" value="<?php echo $tourid ?>">
                    <textarea name="noidung" rows="4" placeholder="Nội dung bình luận..." required></textarea>
                    <button type="submit" name="guibinhluan" class="btn">Gửi</button>
                </form>
            </div>

            <!-- Hiển thị danh sách bình luận -->
            <div class="comment-list">
                <h5>Bình luận (<?php echo count($comments); ?>)</h5>
                <?php if (count($comments) > 0): ?>
                    <?php foreach ($comments as $comment): ?>
                        <div class="comment-item">
                            <!-- Ảnh đại diện -->
                            <img src="../../view/layout/image/avatar.png" alt="Avatar">
                            <div class="comment-content">
                                <div class="user-name"><?php echo htmlspecialchars($comment['name']); ?></div>
                                <div class="comment-text"><?php echo htmlspecialchars($comment['content']); ?></div>
                                <div class="comment-meta">
                                    <?php
                                    $date = new DateTime($comment['datecomment']);
                                    $now = new DateTime();
                                    $interval = $now->diff($date);
                                    if ($interval->days > 0) {
                                        echo $interval->days . ' ngày trước';
                                    } elseif ($interval->h > 0) {
                                        echo $interval->h . ' giờ trước';
                                    } else {
                                        echo $interval->i . ' phút trước';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="font-size: 16px; color: #888;">Chưa có bình luận nào.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        function checkLogin() {
            // Kiểm tra trạng thái đăng nhập
            const isLoggedIn = <?php echo (isset($_SESSION['user']) && $_SESSION['user'] > 0) ? 'true' : 'false'; ?>;
            
            if (!isLoggedIn) {
                alert("Bạn cần đăng nhập để thực hiện tính năng này");
                window.open("../../view/login.php", "_blank"); // Mở trang đăng nhập trong tab mới
                return false; // Ngăn form submit
            }
            return true; // Cho phép form submit nếu đã đăng nhập
        }
    </script>
</body>
</html>