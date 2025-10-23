<div class="container">
      <div class="row">
        <!-- Cột chính -->
        <div class="col-lg-8 mt-5">
          <div class="position-relative">
            <img
              src="../layout/image/bg-signup.jpg"
              class="img-fluid w-100"
              alt="diadiemSupperHot"
            />

            <div class="position-absolute bottom-0 start-0 p-3 text-white">
              <h1 class="display-6">
                Kỳ nghỉ trọn vẹn cho cả gia đình
              </h1>
            </div>
          </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4 mt-5 d-flex flex-column h-100 news-sidebar">
          <?php
            require_once "controller/news/news.php";
            $news = get_news(2);
            for($i=0; $i<count($news); $i++){

            
          ?>
          <div class="row border-bottom mb-3 pb-3 d-flex align-items-stretch">
            <!-- <div class="col-7">
              <img
                src="../image/anam-resort-nha-trang-vietnam-23.webp"
                class="img-fluid news-sidebar-image"
                alt="diadiemHot-1"
              />
            </div>
            <div class="col-5 d-flex align-items-start">
              <p class="news-sidebar-title">
                4 ngày chu du qua 3 miền đất "thần thoại" cùng Viettourist
              </p>
            </div> -->
            <?php echo showNewsHomeNoImageOne($news[$i]) ?>
          </div>

          <!-- <div class="row border-bottom mb-3 pb-3 d-flex align-items-stretch">
            <div class="col-7">
              <img
                src="../image/anam-resort-nha-trang-vietnam-23.webp"
                class="img-fluid news-sidebar-image"
                alt="diadiemHot-2"
              />
            </div>
            <div class="col-5 d-flex align-items-start">
              <p class="news-sidebar-title">
                Trải nghiệm hệ sinh thái Horizon Seeker với đặc quyền “thẻ nghỉ
                dưỡng”
              </p>
            </div>
          </div>

          <div class="row mb-3 pb-3 d-flex align-items-stretch">
            <div class="col-7">
              <img
                src="../image/anam-resort-nha-trang-vietnam-23.webp"
                class="img-fluid news-sidebar-image"
                alt="diadiemHot-3"
              />
            </div>
            <div class="col-5 d-flex align-items-start">
              <p class="news-sidebar-title">
                Lễ hội Mùa Xuân 2025 tại Lynn Times Thanh Thủy
              </p>
            </div>
          </div> -->
          <?php } ?>
        </div>
      </div>
    </div>

    <!-- Mục khác -->
    <div class="container">
      <div class="row pt-5">
        <div class="col-4 border-end">
          <h4>Điểm du lịch</h4>
          <?php
            $tintuc = get_news_all(4);
            for ($i=0; $i < count($tintuc) ; $i++) { 
          ?>
          <div class="row pb-3 pt-4">
            <div class="col-12">
              <!-- <div class="card">
                <img
                  src="../image/anam-resort-nha-trang-vietnam-23.webp"
                  class="card-img-top"
                  alt="Hình ảnh điểm du lịch"
                />
                <div class="card-body">
                  <h5 class="card-title">Biển Phú Quốc</h5>
                  <p class="card-text">
                    Thiên đường nhiệt đới với biển xanh cát trắng.
                  </p>
                </div>
              </div> -->
              <?php echo showNewsOne($tintuc[$i]); ?>
            </div>
          </div>
          <?php } ?>
          <!-- <div class="row pb-3">
            <div class="col-12">
              <div class="card">
                <img
                  src="../image/anam-resort-nha-trang-vietnam-23.webp"
                  class="card-img-top"
                  alt="Hình ảnh điểm du lịch"
                />
                <div class="card-body">
                  <h5 class="card-title">Biển Phú Quốc</h5>
                  <p class="card-text">
                    Thiên đường nhiệt đới với biển xanh cát trắng.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row pb-3">
            <div class="col-12">
              <div class="card">
                <img
                  src="../image/anam-resort-nha-trang-vietnam-23.webp"
                  class="card-img-top"
                  alt="Hình ảnh điểm du lịch"
                />
                <div class="card-body">
                  <h5 class="card-title">Biển Phú Quốc</h5>
                  <p class="card-text">
                    Thiên đường nhiệt đới với biển xanh cát trắng.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row pb-3">
            <div class="col-12">
              <div class="card">
                <img
                  src="../image/anam-resort-nha-trang-vietnam-23.webp"
                  class="card-img-top"
                  alt="Hình ảnh điểm du lịch"
                />
                <div class="card-body">
                  <h5 class="card-title">Biển Phú Quốc</h5>
                  <p class="card-text">
                    Thiên đường nhiệt đới với biển xanh cát trắng.
                  </p>
                </div>
              </div>
            </div>
          </div> -->
        </div>

        <div class="col-4 border-end">
          <h4>Ẩm thực</h4>
          <?php
            $amthuc = get_news_amthuc(4);
            for ($i=0; $i < count($amthuc); $i++) { 
          ?>
          <div class="row pb-3 pt-4">
            <div class="col-12">
              <!-- <div class="card">
                <img
                  src="../image/anam-resort-nha-trang-vietnam-23.webp"
                  class="card-img-top"
                  alt="Hình ảnh điểm du lịch"
                />
                <div class="card-body">
                  <h5 class="card-title">Biển Phú Quốc</h5>
                  <p class="card-text">
                    Thiên đường nhiệt đới với biển xanh cát trắng.
                  </p>
                </div>
              </div> -->
              <?php echo showNewsOne($amthuc[$i]); ?>
            </div>
          </div>
          <?php } ?>
          <!-- <div class="row pb-3">
            <div class="col-12">
              <div class="card">
                <img
                  src="../image/anam-resort-nha-trang-vietnam-23.webp"
                  class="card-img-top"
                  alt="Hình ảnh điểm du lịch"
                />
                <div class="card-body">
                  <h5 class="card-title">Biển Phú Quốc</h5>
                  <p class="card-text">
                    Thiên đường nhiệt đới với biển xanh cát trắng.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row pb-3">
            <div class="col-12">
              <div class="card">
                <img
                  src="../image/anam-resort-nha-trang-vietnam-23.webp"
                  class="card-img-top"
                  alt="Hình ảnh điểm du lịch"
                />
                <div class="card-body">
                  <h5 class="card-title">Biển Phú Quốc</h5>
                  <p class="card-text">
                    Thiên đường nhiệt đới với biển xanh cát trắng.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row pb-3">
            <div class="col-12">
              <div class="card">
                <img
                  src="../image/anam-resort-nha-trang-vietnam-23.webp"
                  class="card-img-top"
                  alt="Hình ảnh điểm du lịch"
                />
                <div class="card-body">
                  <h5 class="card-title">Biển Phú Quốc</h5>
                  <p class="card-text">
                    Thiên đường nhiệt đới với biển xanh cát trắng.
                  </p>
                </div>
              </div>
            </div>
          </div> -->
        </div>
        <div class="col-4">
          <h4>Kinh nghiệm</h4>
          <?php
            $kinhnghiem = get_news_kinhnghiem(4);
            for ($i=0; $i < count($kinhnghiem); $i++) { 
          ?>
          <div class="row pb-3 pt-4">
            <div class="col-12">
              <!-- <div class="card">
                <img
                  src="../image/anam-resort-nha-trang-vietnam-23.webp"
                  class="card-img-top"
                  alt="Hình ảnh điểm du lịch"
                />
                <div class="card-body">
                  <h5 class="card-title">Biển Phú Quốc</h5>
                  <p class="card-text">
                    Thiên đường nhiệt đới với biển xanh cát trắng.
                  </p>
                </div>
              </div> -->
              <?php echo showNewsOne($kinhnghiem[$i]); ?>
            </div>
          </div>
          <?php } ?>
          <!-- <div class="row pb-3">
            <div class="col-12">
              <div class="card">
                <img
                  src="../image/anam-resort-nha-trang-vietnam-23.webp"
                  class="card-img-top"
                  alt="Hình ảnh điểm du lịch"
                />
                <div class="card-body">
                  <h5 class="card-title">Biển Phú Quốc</h5>
                  <p class="card-text">
                    Thiên đường nhiệt đới với biển xanh cát trắng.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row pb-3">
            <div class="col-12">
              <div class="card">
                <img
                  src="../image/anam-resort-nha-trang-vietnam-23.webp"
                  class="card-img-top"
                  alt="Hình ảnh điểm du lịch"
                />
                <div class="card-body">
                  <h5 class="card-title">Biển Phú Quốc</h5>
                  <p class="card-text">
                    Thiên đường nhiệt đới với biển xanh cát trắng.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="row pb-3">
            <div class="col-12">
              <div class="card">
                <img
                  src="../image/anam-resort-nha-trang-vietnam-23.webp"
                  class="card-img-top"
                  alt="Hình ảnh điểm du lịch"
                />
                <div class="card-body">
                  <h5 class="card-title">Biển Phú Quốc</h5>
                  <p class="card-text">
                    Thiên đường nhiệt đới với biển xanh cát trắng.
                  </p>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>