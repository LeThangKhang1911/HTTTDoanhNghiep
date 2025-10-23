<?php
    require_once __DIR__.'/../../vendor/autoload.php';
    require_once __DIR__.'/../../model/pdo.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    function createMail(){
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  
            $mail->SMTPAuth = true; 
            $mail->Username = 'lephuvinh30605@gmail.com';  
            $mail->Password = 'jlct aozw ehfz jhzw';  
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port = 587; 
            $mail->CharSet = 'UTF-8';  
    
            return $mail;
        } catch (Exception $e) {
            echo "Lỗi cấu hình PHPMailer: {$e->getMessage()}";
            return null;
        }
    }
    /**
     * Hàm gửi email OTP
     * @param string $to - Địa chỉ email nhận OTP
     * @param string $type - Loại email (ví dụ: 'register', 'login', 'resend')
     * @return bool - Trả về true nếu gửi thành công, false nếu thất bại
     */
    function emailOTP($to, $type, $otp) {
        try {

            $mail = createMail();
            $mail->setFrom('lephuvinh30605@gmail.com', 'TRAVEL EXPLORER');
            $mail->addAddress($to);

            switch ($type) {
                case 'register':
                    $mail->Subject = 'Xác thực tài khoản đăng ký';
                    $mail->Body = "Chào bạn,<br>Đây là mã OTP của bạn để xác thực tài khoản đăng ký: <b>$otp</b><br>Mã này sẽ hết hạn sau 3 phút.";
                    $mail->AltBody = "Chào bạn,\nĐây là mã OTP của bạn để xác thực tài khoản đăng ký: $otp\nMã này sẽ hết hạn sau 3 phút.";
                    break;
                case 'login':
                    $mail->Subject = 'Xác thực đăng nhập';
                    $mail->Body = "Chào bạn,<br>Đây là mã OTP của bạn để xác thực đăng nhập: <b>$otp</b><br>Mã này sẽ hết hạn sau 3 phút.";
                    $mail->AltBody = "Chào bạn,\nĐây là mã OTP của bạn để xác thực đăng nhập: $otp\nMã này sẽ hết hạn sau 3 phút.";
                    break;
                case 'resend':
                    $mail->Subject = 'Gửi lại mã OTP';
                    $mail->Body = "Chào bạn,<br>Đây là mã OTP mới của bạn: <b>$otp</b><br>Mã này sẽ hết hạn sau 3 phút.";
                    $mail->AltBody = "Chào bạn,\nĐây là mã OTP mới của bạn: $otp\nMã này sẽ hết hạn sau 3 phút.";
                    break;
                default:
                    throw new Exception("Loại email không hợp lệ.");
            }
            $mail->send();
            $_SESSION['success'] = 'OTP đã được gửi thành công.';
            return true;
        } catch (Exception $e) {
            $_SESSION['error'] = "Không thể gửi email. Lỗi: {$e->getMessage()}";
            return false;
        }
    }
    function send_SuccessMail($to){
        try {
            $mail = createMail();
            $mail->setFrom('lephuvinh30605@gmail.com', 'TRAVEL EXPLORER');
            $mail->addAddress($to);
            $mail->Subject = 'Đăng ký tài khoản thành công!';
            $mail->Body = "Chào bạn,<br>Bạn đã đăng ký tài khoản thành công ở website TRAVEL EXPLORE<br>";
            $mail->AltBody = "Chào bạn,\nBạn đã đăng ký tài khoản thành công ở website TRAVEL EXPLORE";
            $mail->send();
            $_SESSION['signup-success'] = 'Mail đã được gửi thành công.';
            return true;
        } catch (Exception $e) {
            $_SESSION['error'] = "Không thể gửi email. Lỗi: {$e->getMessage()}";
            return false;
        }
    }
    function send_ForgotPass($to, $pass){
        try {
            $mail = createMail();
            $mail->setFrom('lephuvinh30605@gmail.com', 'TRAVEL EXPLORER');
            $mail->addAddress($to);
            $mail->Subject = 'Khôi phục mật khẩu';
            $mail->Body = "Chào bạn,<br>Đây là mật khẩu của bạn: <b>$pass</b><br>Bạn vui long thay đổi mật khẩu sau khi đăng nhập thành công.";
            $mail->AltBody = "Chào bạn,\nĐây là mật khẩu của bạn: $pass\nBạn vui long thay đổi mật khẩu sau khi đăng nhập thành công.";
            $mail->send();
            $_SESSION['signup-success'] = 'Mail đã được gửi thành công.';
            return true;
        }
        catch (Exception $e) {
            $_SESSION['error'] = "Không thể gửi email. Lỗi: {$e->getMessage()}";
            return false;
        }
    }
    function send_bookTourSuccess($to, $tenTour, $price, $ngaydat){
        try {
            $mail = createMail();
            $mail->setFrom('lephuvinh30605@gmail.com', 'TRAVEL EXPLORER');
            $mail->addAddress($to);
            $mail->Subject = 'Đặt tour thành công!';
            $mail->Body = "Chào bạn,<br>Bạn đã đặt tour thành công tại TRAVEL EXPLORE<br>
                            Tên tour: <b>$tenTour</b><br>
                            Giá: <b>$price</b><br>
                            Ngày đặt: <b>$ngaydat</b><br>";
            $mail->AltBody = "Chào bạn,\nBạn đã đặt tour thành công tại TRAVEL EXPLORE\n 
                                Tên tour: $tenTour\n
                                Giá: $price\n
                                Ngày đặt: $ngaydat\n";
            $mail->send();
            $_SESSION['signup-success'] = 'Mail đã được gửi thành công.';
            return true;
        } catch (Exception $e) {
            $_SESSION['error'] = "Không thể gửi email. Lỗi: {$e->getMessage()}";
            return false;
        }
    }
?>
