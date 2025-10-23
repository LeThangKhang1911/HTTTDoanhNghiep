<?php
    require_once __DIR__.'/../pdo.php';
    // lấy tour theo id
    function get_tour_id($id){
        $sql = "SELECT * FROM tour WHERE id = $id AND hide = 0";
        return pdo_query($sql);
    }
    // lấy danh sách tour mới theo thứ tự id
    function get_tour_new($limi){
        $sql = "SELECT * FROM tour WHERE hide = 0 ORDER BY id DESC limit ".$limi;
        return pdo_query($sql);
    }
    // Lấy tour theo điểm đến
    function get_tour_destination($des){
        $sql = "SELECT * FROM tour WHERE hide = 0 AND name LIKE '%".$des."%'";
        return pdo_query($sql);
    }
    // Lấy tour theo mức giá
    function get_tour_price($min_price, $max_price){
        $sql = "SELECT * FROM tour WHERE (price BETWEEN $min_price AND $max_price) OR (price_sale BETWEEN $min_price AND $max_price) AND hide = 0";
        return pdo_query($sql);
    }
    // lấy tour theo ngày khởi hành
    function get_tour_date($date){
        $sql = "SELECT * FROM tour WHERE hide = 0 AND khoihanh LIKE '%".$date."%'";
        return pdo_query($sql);
    }
    // lấy tour theo thời gian chuyến đi
    function get_tour_time($time){
        $sql = "SELECT * FROM tour WHERE hide = 0 AND thoigian LIKE '%".$time."%'";
        return pdo_query($sql);
    }
    // lấy tour theo nơi xuất phát
    function get_tour_departure($depa){
        $sql = "SELECT * FROM tour WHERE hide = 0 AND diemkhoihanh LIKE '%".$depa."%'";
        return pdo_query($sql);
    }
    // lấy tour theo thứ tự xuất hiện
    function get_tour_order($limi){
        $sql = "SELECT * FROM tour WHERE hide = 0 ORDER BY ordered ASC limit ".$limi;
        return pdo_query($sql);
    }

    // lấy tour theo hạng
    function get_tour_hang($limi){
        $sql = "SELECT * FROM tour WHERE hide = 0 ORDER BY phanhang DESC LIMIT ".$limi;
        return pdo_query($sql);
    }

    // lấy tour theo lượt xem
    function get_tour_by_view($limi){
        $sql = "SELECT * FROM tour WHERE hide = 0 ORDER BY view DESC LIMIT ".$limi;
        return pdo_query($sql);
    }

    // lấy tour theo category 
    function get_tour_category($categoryid){
        $sql = "SELECT * FROM tour WHERE hide = 0 AND categoryid = $categoryid";
        return pdo_query($sql);
    }

    // lấy tour theo meta
    function get_tour_meta($meta){
        $sql = "SELECT * FROM tour WHERE hide = 0 AND meta LIKE '%" . $meta . "%'";
        return pdo_query($sql);
    }

    // Hàm kiểm tra tour có ẩn hay không, nếu tour ẩn thì trả về true 
    function check_tour_hide($id){
        $sql = "SELECT hide FROM tour WHERE id = $id";
        $result = pdo_query($sql);
        if (!empty($result)) {
            $hide_value = $result[0]['hide'];
            return $hide_value == 0 ? false : true;
        }
    
        return false; 
    }

    // Hàm lấy chi tiết tour
    function get_chitiet_tour($id){
        $sql = "SELECT * FROM chitiettour WHERE tourid = ?";
        return pdo_query($sql, $id);
    }

    // Hàm lấy lịch trình tour
    function get_lichtrinh_tour($id){
        $sql = "SELECT * FROM lichtrinhtour WHERE tourid = ?";
        return pdo_query($sql, $id);
    }

    // Lấy tour theo meta (vùng miền)
    function get_tour_by_meta($meta)
    {
        $sql = "SELECT t.*, c.name as category_name
                FROM tour t
                LEFT JOIN category c ON t.categoryid = c.id
                WHERE t.hide = 0 and t.meta LIKE '%" . $meta . "%'";
        return pdo_query($sql);
    }

    // Lấy tour phân trang
    function get_tour_paginated($page, $per_page)
    {
        $offset = ($page - 1) * $per_page;
        $sql = "SELECT t.*, c.name as category_name
                FROM tour t
                LEFT JOIN category c ON t.categoryid = c.id
                WHERE t.hide = 0
                ORDER BY t.id DESC
                LIMIT $per_page OFFSET $offset";
        return pdo_query($sql);
    }


    // Lấy tổng số tour để tính phân trang
    function get_total_tours()
    {
        $sql = "SELECT COUNT(*) as total FROM tour";
        $result = pdo_query($sql);
        return $result[0]['total'];
    }


    // Lấy tour theo danh mục với giới hạn và offset
    function get_tour_by_category_limited($categoryid, $per_page, $offset) {
        $categoryid = (int)$categoryid; // Ép kiểu thành số nguyên
        $per_page = (int)$per_page; // Ép kiểu thành số nguyên
        $offset = (int)$offset; // Ép kiểu thành số nguyên
        $sql = "SELECT t.*, c.name as category_name
                FROM tour t
                LEFT JOIN category c ON t.categoryid = c.id
                WHERE t.categoryid = ? and t.hide = 0
                ORDER BY t.id DESC
                LIMIT ? OFFSET ?";
        try {
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            // Gắn tham số với kiểu dữ liệu rõ ràng
            $stmt->bindParam(1, $categoryid, PDO::PARAM_INT);
            $stmt->bindParam(2, $per_page, PDO::PARAM_INT);
            $stmt->bindParam(3, $offset, PDO::PARAM_INT);
            $stmt->execute();
            $rows = $stmt->fetchAll();
            return $rows;
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
    }

    // Lấy tổng số tour theo danh mục
    function get_total_tours_by_category($categoryid): int
    {
        $categoryid = (int)$categoryid; // Ép kiểu thành số nguyên
        $sql = "SELECT COUNT(*) as total FROM tour WHERE categoryid = ?";
        try {
            $conn = pdo_get_connection();
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $categoryid, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return !empty($result) && isset($result[0]['total']) ? (int)$result[0]['total'] : 0;
        } catch (PDOException $e) {
            throw $e;
        } finally {
            unset($conn);
        }
    }
    // Lấy danh sách tour theo bộ lọc
    function get_tours_filtered($meta, $category, $min_price, $max_price, $depa, $rating)
    {
        $sql = "SELECT t.* FROM tour t WHERE 1=1";
        $params = [];
        if ($meta) {
            $sql .= " AND t.meta LIKE ?";
            $params[] = "%$meta%";
        }
        if ($category) {
            $sql .= " AND t.categoryid = ?";
            $params[] = $category;
        }
        if ($min_price !== null && $max_price !== null) {
            $sql .= " AND (t.price BETWEEN ? AND ? OR t.price_sale BETWEEN ? AND ?)";
            $params[] = $min_price;
            $params[] = $max_price;
            $params[] = $min_price;
            $params[] = $max_price;
        }
        if ($depa) {
            $sql .= " AND t.diemkhoihanh LIKE ?";
            $params[] = "%$depa%";
        }
        if ($rating) {
            $sql .= " AND t.phanhang = ?";
            $params[] = $rating;
        }
        return pdo_query($sql, ...$params);
    }
    // lấy tất cả dữ liệu(dùng cho admin)
    function getTourAll(){
        $sql = "SELECT * FROM tour";
        return pdo_query($sql);
    }

    // hàm update lượt xem
    function update_views_tour_id($id){
        $sql = "UPDATE tour SET view = view + 1 WHERE id = ?";
        pdo_execute($sql, $id);
    }

    // Hàm lấy số lượng khách hàng đặt tour của tour bằng id
    function count_booktour_by_id($tourid){
        $sql = "SELECT COUNT(*) FROM booktour WHERE tourid = ?";
        return pdo_query($sql, $tourid);
    }

    // cập nhật ẩn/hiện của tour bằng id
    function update_hide_tour_by_id($id, $hide){
        $sql = "UPDATE tour SET hide = ? WHERE id = ?";
        pdo_execute($sql, $hide, $id);
    }
?>  
