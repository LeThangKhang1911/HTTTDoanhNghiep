<?php
    require_once __DIR__ . '/../../model/menu/get_menu.php';

    function showMenu($list) {
        echo '<ul class="navbar-nav flex-row mb-2 mb-lg-0">';

        foreach ($list as $menu) {
            $isTour = $menu['name'] == 'Tour';
            $isHome = $menu['name'] == 'Trang chủ';
            // Thêm class "dropdown" nếu là mục tour
            echo '<li class="nav-item' . ($isTour ? ' dropdown' : '') . '">';

            // Thêm class và thuộc tính dropdown-toggle nếu là tour
            echo '<a class="nav-link nav-navigation-link" 
                    href="index.php?pg=' . ($isHome ? '' : $menu['meta']) . '" 
                    ' . ($isTour ? 'role="button" aria-expanded="false"' : '') . '>' 
                    . $menu['name'] . 
                '</a>';

            // Nếu là "Tour", hiển thị menu con
            if ($isTour) {
                echo '
                    <ul class="dropdown-menu dropdown-navbar">
                        <li class="d-flex">
                            <div class="dropdown-col">
                                <ul class="list-location">
                                    <a href="index.php?pg=Tour&category=1" style="text-decoration: none; color:black">Du lịch miền Bắc</a>
                                    <li><a class="dropdown-item" href="index.php?pg=Tour&name=tay-bac">Tây Bắc</a></li>
                                    <li><a class="dropdown-item" href="index.php?pg=Tour&name=ha-noi">Hà Nội</a></li>
                                    <li><a class="dropdown-item" href="index.php?pg=Tour&name=ha-long">Hạ Long</a></li>
                                    <li><a class="dropdown-item" href="index.php?pg=Tour&name=sap-pa">Sapa</a></li>
                                </ul>
                            </div>
                            <div class="dropdown-col">
                                <ul class="list-location">
                                    <a href="index.php?pg=Tour&category=2" style="text-decoration: none; color:black">Du lịch miền Trung</a>
                                    <li><a class="dropdown-item" href="index.php?pg=Tour&name=hue">Huế</a></li>
                                    <li><a class="dropdown-item" href="index.php?pg=Tour&name=da-nang">Đà Nẵng</a></li>
                                    <li><a class="dropdown-item" href="index.php?pg=Tour&name=hoi-an">Hội An</a></li>
                                    <li><a class="dropdown-item" href="index.php?pg=Tour&name=nha-trang">Nha Trang</a></li>
                                    <li><a class="dropdown-item" href="index.php?pg=Tour&name=da-lat">Đà Lạt</a></li>
                                </ul>
                            </div>
                            <div class="dropdown-col">
                                <ul class="list-location">
                                    <a href="index.php?pg=Tour&category=3" style="text-decoration: none; color:black">Du lịch miền Nam</a>
                                    <li><a class="dropdown-item" href="index.php?pg=Tour&name=phu-quoc">Phú Quốc</a></li>
                                    <li><a class="dropdown-item" href="index.php?pg=Tour&name=mien-tay">Miền Tây</a></li>
                                    <li><a class="dropdown-item" href="index.php?pg=Tour&name=vung-tau">Vũng Tàu - Côn Đảo</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>';
            }

            echo '</li>';
        }

        // Search form
        echo '
            <div class="search">
                <button type="button" id="btn-nav-search">
                    <i class="bi bi-search" style="color: #fff;"></i>
                </button>
                <div id="form-container">
                    <form action="controller/menu/search.php" method="post" class="search-form">
                        <label for="location" style="font-weight: bold;">Điểm đến</label>
                        <input class="form-input" type="text" name="location" id="location" placeholder="Nhập địa điểm muốn đến">
                        <button type="submit" class="btn btn-outline-success" name="btn-search" style="margin-top: 5px;">Tìm kiếm</button>
                    </form>
                </div>
                <script src="view/layout/js/search_form.js"></script>
            </div>
        ';

        echo '</ul>';
    }
?>
