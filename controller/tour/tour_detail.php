<?php
    require_once __DIR__ . '/../../model/tour/get_tour.php';
    require_once __DIR__ . '/showtour.php';

    // Hàm lấy mô tả và ảnh chi tiết tour 
    function get_Mota($tourid) {
        $chitiet = get_chitiet_tour($tourid);
        if (empty($chitiet) || !isset($chitiet[0]['mota1'])) {
            return [
                'description' => '',
                'image1' => '',
                'image2' => '',
                'image3' => ''
            ];
        }
        return [
            'description' => $chitiet[0]['mota1'],
            'image1' => isset($chitiet[0]['image1']) ? $chitiet[0]['image1'] : '',
            'image2' => isset($chitiet[0]['image2']) ? $chitiet[0]['image2'] : '',
            'image3' => isset($chitiet[0]['image3']) ? $chitiet[0]['image3'] : ''
        ];
    }

    // Hàm lấy lịch trình tour 
    function get_Lichtrinh($tourid) {
        $sql = "SELECT Ngay1, Ngay2, Ngay3, Ngay4, Ngay5, Ngay6 FROM lichtrinhtour WHERE tourid = ?";
        $result = pdo_query($sql, $tourid);
        
        if (empty($result) || !isset($result[0])) {
            return [];
        }
        $lichtrinh = [];
        $days = [
            'Ngày 1' => $result[0]['Ngay1'],
            'Ngày 2' => $result[0]['Ngay2'],
            'Ngày 3' => $result[0]['Ngay3'],
            'Ngày 4' => $result[0]['Ngay4'],
            'Ngày 5' => $result[0]['Ngay5'],
            'Ngày 6' => $result[0]['Ngay6']
        ];
        foreach ($days as $ngay => $noidung) {
            if (!empty($noidung) && trim($noidung) !== '') {
                $noidung = preg_replace('/^(NGÀY|Ngày)\s*(0?[1-6])(:|\s|$)/iu', '', $noidung);
                $noidung = trim($noidung); // Xóa khoảng trắng thừa
                if (!empty($noidung)) { // Chỉ thêm nếu nội dung không rỗng sau khi loại nhãn
                    $lichtrinh[] = [
                        'ngay' => $ngay,
                        'noidung' => $noidung
                    ];
                }
            }
        }
        return $lichtrinh;
    }

    // Hàm lấy thông tin tour từ database
    function get_TourInfo($tourid) {
        $tour = get_tour_id($tourid);
        if (empty($tour) || check_tour_hide($tourid)) {
            return null;
        }
        return $tour[0]; // Lấy tour đầu tiên từ mảng
    }

    // Hàm lấy tour tương tự theo categoryid
    function get_SimilarTours($tourid, $categoryid) {
        $similar_tours = get_tour_category($categoryid);
        return array_filter($similar_tours, function($t) use ($tourid) {
            return $t['id'] != $tourid;
        });
    }

    // Hàm lấy ảnh tour
    function get_TourImage($tourid) {
        $tour = get_tour_id($tourid);
        if (empty($tour) || check_tour_hide($tourid)) {
            return '';
        }
        return !empty($tour[0]['image']) ? $tour[0]['image'] : '';
    }

    // Hàm lấy thông tin phương tiện, thời gian, khởi hành
    function get_TransportInfo($tourid) {
        $tour = get_tour_id($tourid);
        if (empty($tour) || check_tour_hide($tourid)) {
            return '';
        }
        $tour = $tour[0];
        $vehicle = '';
        if ($tour['vehicle'] == 1) {
            $vehicle = 'Xe buýt';
        } elseif ($tour['vehicle'] == 2) {
            $vehicle = 'Xe buýt, Máy bay';
        } elseif ($tour['vehicle'] == 3) {
            $vehicle = 'Xe buýt, Máy bay, Tàu hỏa';
        }
        
        return [
            'khoihanh' => htmlspecialchars($tour['khoihanh']),
            'thoigian' => htmlspecialchars($tour['thoigian']),
            'vehicle' => $vehicle
        ];
    }

    
    // Hàm chính: Tổng hợp dữ liệu chi tiết tour
    function get_tour_detail_data($tourid) {
        // Lấy thông tin tour
        $tour = get_TourInfo($tourid);
        if (!$tour) {
            return ['error' => 'Tour không tồn tại hoặc đã bị ẩn.'];
        }

        // Lấy dữ liệu từ các hàm
        $mota = get_Mota($tourid);
        $lichtrinh = get_Lichtrinh($tourid);
        $image = get_TourImage($tourid);
        $transport_info = get_TransportInfo($tourid);
        $similar_tours = get_SimilarTours($tourid, $tour['categoryid']);

        return [
            'tour' => $tour,
            'mota' => $mota,
            'lichtrinh' => $lichtrinh,
            'image' => $image,
            'transport_info' => $transport_info,
            'similar_tours' => $similar_tours
        ];
    }

    // Lấy và gán toàn bộ dữ liệu tour chi tiết
    function fetch_tour_detail() {
        global $tour, $mota, $lichtrinh, $image, $transport_info, $similar_tours, $image1, $image2, $image3;

        // Lấy tourid từ URL
        $tourid = isset($_GET['tourid']) ? intval($_GET['tourid']) : 0;

        // Lấy dữ liệu từ get_tour_detail_data
        $data = get_tour_detail_data($tourid);
        if (isset($data['error'])) {
            echo $data['error'];
            exit;
        }

        // Gán dữ liệu vào biến toàn cục
        $tour = $data['tour'];
        $mota = $data['mota']['description'];
        $lichtrinh = $data['lichtrinh'];
        $image = $data['image'];
        $transport_info = $data['transport_info'];
        $similar_tours = $data['similar_tours'];
        $image1 = $data['mota']['image1'] ?? '';
        $image2 = $data['mota']['image2'] ?? '';
        $image3 = $data['mota']['image3'] ?? '';
    }
?>