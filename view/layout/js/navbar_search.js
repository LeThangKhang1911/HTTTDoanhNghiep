fetch('controller/menu/slide.php') 
    .then(response => response.json())  // Chuyển đổi dữ liệu JSON
    .then(images => {
        let currentIndex = 0;
        let background = document.querySelector(".nav-bg-slide");
        const basePath = "upload/image/slide/";

        if (images.length > 0) {
            // Ảnh khi mở web
            console.log(basePath+images[currentIndex]);
            console.log("Đang lấy ảnh:", images[currentIndex]);  // Kiểm tra giá trị của ảnh
            background.style.backgroundImage = `url(${basePath}${images[currentIndex]})`;
        }

        // Chuyển ảnh kế tiếp 
        document.getElementById('btn-carousel-next').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % images.length;
            background.style.backgroundImage = `url(${basePath}${images[currentIndex]})`;
        });

        // Chuyển ảnh trước đó
        document.getElementById('btn-carousel-prev').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            background.style.backgroundImage = `url(${basePath}${images[currentIndex]})`;
        });

        // Tự động chuyển ảnh 
        setInterval(() => {
            let nextIndex = (currentIndex + 1) % images.length;
            background.style.backgroundImage = `url(${basePath}${images[nextIndex]})`;
            currentIndex = nextIndex; 
        }, 5000);
    })
    .catch(error => console.error('Error:', error));  // Xử lý lỗi
