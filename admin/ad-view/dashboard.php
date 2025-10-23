<?php
    require_once 'ad-model/AdminDashboard/get_data.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $doanhthu = total_money();
    $sl_user = count_user();
    $sl_view = count_view_tour();
    $sl_tour = count_tour();
    $bookInweek = count_booktour_in_day();
    $book_data_in_day = array_fill(0, 6, 0);
    foreach ($bookInweek as $row) {
        $day = $row['day']; // DAYOFWEEK trả 1 (CN) đến 7 (T7)
        $count = $row['book'];
        // Đổi CN = 1 thành 6, T2 = 2 thành 0, ..., T7 = 7 thành 5
        $index = ($day + 5) % 7;
        $book_data_in_day[$index] = $count;
    }
    $doanhthuInweek = get_doanh_thu_in_day();
    $doanh_thu_data_in_day = array_fill(0, 6, 0);
    foreach ($doanhthuInweek as $dt) {
        $dt_day = $dt['day'];
        $dt_doanhthu = $dt['doanhthu'];
        $i = ($dt_day + 5) % 7;
        $doanh_thu_data_in_day[$i] = $dt_doanhthu;
    }
    $userNewInWeek = get_user_new_in_week();
    $user_data_in_day = array_fill(0, 6, 0);
    foreach ($userNewInWeek as $user){
        $us = $user['day'];
        $usNew = $user['newuser'];
        $j = ($us + 5) % 7;
        $user_data_in_day[$j] = $usNew;
    }

?>






<div>
    <div class="row" style="margin-top: 50px;">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-2 ps-3">
                <div class="d-flex justify-content-between">
                    <div>
                    <p class="text-sm mb-0 text-capitalize">Tổng doanh thu</p>
                    <h4 class="mb-0"><?php echo number_format($doanhthu[0]['total'], 0, ',', '.') . 'đ'; ?></h4>
                    </div>
                    <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                    <i class="material-symbols-rounded opacity-10">weekend</i>
                    </div>
                </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-2 ps-3">
                    <p class="mb-0 text-sm">Tính đến: <?php echo date('d/m/Y H:i:s'); ?></p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize">Số lượng khách hàng</p>
                            <h4 class="mb-0"><?php echo $sl_user[0]['sluser']; ?></h4>
                        </div>
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="material-symbols-rounded opacity-10">person</i>
                        </div>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-2 ps-3">
                    <p class="mb-0 text-sm">Tính đến: <?php echo date('d/m/Y H:i:s'); ?></p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize">Lượt xem Tour</p>
                            <h4 class="mb-0"><?php echo $sl_view[0]['view']; ?></h4>
                        </div>
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="material-symbols-rounded opacity-10">leaderboard</i>
                        </div>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-2 ps-3">
                    <p class="mb-0 text-sm">Tính đến: <?php echo date('d/m/Y H:i:s'); ?></p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="text-sm mb-0 text-capitalize">Số lượng Tour</p>
                            <h4 class="mb-0"><?php echo $sl_tour[0]['sl_tour']; ?></h4>
                        </div>
                        <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="material-symbols-rounded opacity-10">pin_drop</i>
                        </div>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-2 ps-3">
                    <p class="mb-0 text-sm">Tính đến: <?php echo date('d/m/Y H:i:s'); ?></p>
                </div>
            </div>
        </div>
    </div>

    <?php
        // Lấy ngày đầu tuần (Thứ 2)
        $today = new DateTime();
        $dayOfWeek = $today->format('N'); // 1 (Mon) đến 7 (Sun)
        $startOfWeek = clone $today;
        $startOfWeek->modify('-' . ($dayOfWeek - 1) . ' days');
    ?>
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 ">Số lượng đặt tour hằng ngày</h6>
                    <p class="text-sm "><?php echo "Từ " . $startOfWeek->format('d/m/Y') . " đến " . $today->format('d/m/Y H:i:s'); ?></p>
                    <div class="pe-2">
                        <div class="chart">
                            <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                        </div>
                    </div>
                    <hr class="dark horizontal">
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card ">
                <div class="card-body">
                    <h6 class="mb-0 "> Doanh thu hằng ngày </h6>
                    <p class="text-sm "><?php echo "Từ " . $startOfWeek->format('d/m/Y') . " đến " . $today->format('d/m/Y H:i:s'); ?></p>
                    <div class="pe-2">
                        <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
                        </div>
                    </div>
                    <hr class="dark horizontal">
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 ">Số lượng khách hàng đăng kí mới</h6>
                    <p class="text-sm "><?php echo "Từ " . $startOfWeek->format('d/m/Y') . " đến " . $today->format('d/m/Y H:i:s'); ?></p>
                    <div class="pe-2">
                        <div class="chart">
                            <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                        </div>
                    </div>
                    <hr class="dark horizontal">
                </div>
            </div>
        </div>
    </div>

    <!-- biểu đồ kết hợp 3 thông tin -->
    <div class="row" style="margin-top: 20px;">
        <div class="mt-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0 ">Thống kê theo tháng trong năm 2025</h6>
                    <div class="pe-2">
                        <div class="chart">
                            <canvas id="combinedChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        // Lấy dữ liệu theo tháng trong năm hiện tại
        $booktour_data = count_booktour_in_month_of_year();
        $doanhthu_data = get_doanh_thu_in_month_of_year();
        $newuser_data = get_user_new_in_month_of_year();

        $months = range(1, 12); // Mảng các tháng trong năm
        $booktour_counts = array_fill(0, 12, 0); // Mỗi tháng có 1 giá trị
        $doanhthu_values = array_fill(0, 12, 0);
        $newuser_counts = array_fill(0, 12, 0);

        // Gán dữ liệu đặt tour
        foreach ($booktour_data as $row) {
            $month = (int)$row['month'] - 1; // Tháng từ 0 -> 11
            $booktour_counts[$month] = (int)$row['book'];
        }

        // Gán dữ liệu doanh thu
        foreach ($doanhthu_data as $row) {
            $month = (int)$row['month'] - 1;
            $doanhthu_values[$month] = (float)$row['doanhthu'];
        }

        // Gán dữ liệu người dùng mới
        foreach ($newuser_data as $row) {
            $month = (int)$row['month'] - 1;
            $newuser_counts[$month] = (int)$row['newuser'];
        }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // biểu đồ 1
    const booktourData = <?php echo json_encode(array_values($book_data_in_day)); ?>;
    var ctx = document.getElementById("chart-bars").getContext("2d");
    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["T2", "T3", "T4", "T5", "T6", "T7", "CN"],
            datasets: [{
                label: "Lượt đặt tour",
                borderRadius: 5,
                backgroundColor: "#43A047",
                data: booktourData,
                barThickness: 'flex'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
            y: {
                beginAtZero: true,
                ticks: { stepSize: 1, color: "#737373" },
                grid: { color: "#e5e5e5" }
            },
            x: {
                ticks: { color: "#737373" },
                grid: { display: false }
            }
            }
        }
    });

    // biểu đồ 2:
    const doanhthuData = <?php echo json_encode(array_values($doanh_thu_data_in_day)); ?>;
    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
        type: "line",
        data: {
            labels: ["T2", "T3", "T4", "T5", "T6", "T7", "CN"],
            datasets: [{
            label: "Doanh thu",
            tension: 0,
            borderWidth: 2,
            pointRadius: 3,
            pointBackgroundColor: "#43A047",
            pointBorderColor: "transparent",
            borderColor: "#43A047",
            backgroundColor: "transparent",
            fill: true,
            data: doanhthuData,
            maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
            legend: {
                display: false,
            },
            tooltip: {
                callbacks: {
                title: function(context) {
                    const fullMonths = ["T2", "T3", "T4", "T5", "T6", "T7", "CN"];
                    return fullMonths[context[0].dataIndex];
                }
                }
            }
            },
            interaction: {
            intersect: false,
            mode: 'index',
            },
            scales: {
            y: {
                beginAtZero: true,
                grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [4, 4],
                color: '#e5e5e5'
                },
                ticks: {
                stepSize: 1,
                display: true,
                color: '#737373',
                padding: 10,
                font: {
                    size: 12,
                    lineHeight: 2
                },
                }
            },
            x: {
                grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5]
                },
                ticks: {
                display: true,
                color: '#737373',
                padding: 10,
                font: {
                    size: 12,
                    lineHeight: 2
                },
                }
            },
            },
        },
    });

    // biểu đồ 3
    const userData = <?php echo json_encode(array_values($user_data_in_day)); ?>;
    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
        type: "line",
        data: {
            labels: ["T2", "T3", "T4", "T5", "T6", "T7", "CN"],
            datasets: [{
            label: "Khách hàng mới",
            tension: 0,
            borderWidth: 2,
            pointRadius: 3,
            pointBackgroundColor: "#43A047",
            pointBorderColor: "transparent",
            borderColor: "#43A047",
            backgroundColor: "transparent",
            fill: true,
            data: userData,
            maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
            legend: {
                display: false,
            }
            },
            interaction: {
            intersect: false,
            mode: 'index',
            },
            scales: {
            y: {
                beginAtZero: true,
                grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [4, 4],
                color: '#e5e5e5'
                },
                ticks: {
                stepSize: 1,
                display: true,
                padding: 10,
                color: '#737373',
                stepSize: 1,
                font: {
                    size: 14,
                    lineHeight: 2
                },
                }
            },
            x: {
                grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [4, 4]
                },
                ticks: {
                display: true,
                color: '#737373',
                padding: 10,
                font: {
                    size: 14,
                    lineHeight: 2
                },
                }
            },
            },
        },
    });
</script>
<script>
    const months = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];

    const booktourCounts = <?php echo json_encode($booktour_counts); ?>;
    const doanhthuValues = <?php echo json_encode($doanhthu_values); ?>;
    const newuserCounts = <?php echo json_encode($newuser_counts); ?>;

    const ctx4 = document.getElementById('combinedChart').getContext('2d');
    const combinedChart = new Chart(ctx4, {
        type: 'line',
        data: {
            labels: months,
            datasets: [
                {
                    label: 'Số lượng đặt tour',
                    data: booktourCounts,
                    borderColor: 'blue',
                    backgroundColor: 'blue',
                    borderWidth: 2,
                    tension: 0.4,              
                    pointRadius: 4,
                    pointHoverRadius: 5,
                    fill: false,
                    yAxisID: 'y'
                },
                {
                    label: 'Doanh thu (VND)',
                    data: doanhthuValues,
                    borderColor: 'green',
                    backgroundColor: 'green',
                    borderWidth: 2,
                    tension: 0.4,
                    pointRadius: 4,
                    pointHoverRadius: 5,
                    fill: false,
                    yAxisID: 'y1'
                },
                {
                    label: 'Người dùng mới',
                    data: newuserCounts,
                    borderColor: 'red',
                    backgroundColor: 'red',
                    borderWidth: 2,
                    tension: 0.4,
                    pointRadius: 4,
                    pointHoverRadius: 5,
                    fill: false,
                    yAxisID: 'y'
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Tháng trong năm'
                    }
                },
                y: {
                    type: 'linear',
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Số lượng (Đặt tour / Người dùng mới)'
                    },
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                    },
                },
                y1: {
                    type: 'linear',
                    position: 'right',
                    title: {
                        display: true,
                        text: 'Doanh thu (VND)'
                    },
                    beginAtZero: true,
                    grid: {
                        drawOnChartArea: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                }
            },
            elements: {
                line: {
                    tension: 0.4 
                }
            }
        }
    });
</script>
