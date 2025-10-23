<?php
    require_once __DIR__.'/../../../model/pdo.php';
    // function lấy tổng doanh thu 
    function total_money(){
        $sql = "SELECT SUM(total_price) AS total FROM booktour WHERE status = 0";
        return pdo_query($sql);
    }
    // function lấy tổng số khách hàng
    function count_user(){
        $sql = "SELECT COUNT(userid) AS sluser FROM user";
        return pdo_query($sql);
    }
    // tổng số lượt xem tour
    function count_view_tour(){
        $sql = "SELECT SUM(view) AS view FROM tour";
        return pdo_query($sql);
    }
    // hàm tính số tour
    function count_tour(){
        $sql = "SELECT COUNT(*) AS sl_tour FROM tour";
        return pdo_query($sql);
    }
    // hàm lấy dữ liệu đặt tour các ngày trong tuần
    function count_booktour_in_day(){
        $sql = "SELECT DAYOFWEEK(bookdate) AS day, COUNT(*) AS book
                FROM booktour
                WHERE YEARWEEK(bookdate, 1) = YEARWEEK(CURDATE(), 1) AND status = 0
                GROUP BY day";
        return pdo_query($sql);
    }
    // hàm lấy doanh thu theo ngày trong tuần
    function get_doanh_thu_in_day(){
        $sql = "SELECT DAYOFWEEK(bookdate) AS day, SUM(total_price) AS doanhthu
                FROM booktour
                WHERE YEARWEEK(bookdate, 1) = YEARWEEK(CURDATE(), 1) AND status = 0
                GROUP BY day";
        return pdo_query($sql);
    }

    // hàm lấy user đăng kí mới theo ngày
    function get_user_new_in_week(){
        $sql = "SELECT DAYOFWEEK(datebegin) AS day, COUNT(*) AS newuser
            FROM user
            WHERE YEARWEEK(datebegin, 1) = YEARWEEK(CURDATE(), 1)
            GROUP BY day";
        return pdo_query($sql);
    }

    // lấy lượt book tour theo tháng
    function count_booktour_in_month_of_year(){
        $sql = "SELECT MONTH(bookdate) AS month, COUNT(*) AS book
                FROM booktour
                WHERE YEAR(bookdate) = YEAR(CURDATE()) AND status = 0
                GROUP BY month";
        return pdo_query($sql);
    }
    

    // Hàm lấy doanh thu theo tháng
    function get_doanh_thu_in_month_of_year(){
        $sql = "SELECT MONTH(bookdate) AS month, SUM(total_price) AS doanhthu
                FROM booktour
                WHERE YEAR(bookdate) = YEAR(CURDATE()) AND status = 0
                GROUP BY month";
        return pdo_query($sql);
    }
    

    // Hàm lấy user đăng ký mới theo tháng
    function get_user_new_in_month_of_year(){
        $sql = "SELECT MONTH(datebegin) AS month, COUNT(*) AS newuser
                FROM user
                WHERE YEAR(datebegin) = YEAR(CURDATE())
                GROUP BY month";
        return pdo_query($sql);
    }
    
?>