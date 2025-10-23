function showAlert(message, type = 'error', duration = 5000) {
    // Tạo phần tử div cho thông báo
    const alertBox = document.createElement('div');

    // Tạo nội dung văn bản
    const messageText = document.createElement('span');
    messageText.textContent = message;

    // Tạo nút OK
    const closeButton = document.createElement('button');
    closeButton.textContent = 'OK';
    closeButton.style.marginLeft = '20px';
    closeButton.style.padding = '5px 10px';
    closeButton.style.border = 'none';
    closeButton.style.borderRadius = '3px';
    closeButton.style.cursor = 'pointer';
    closeButton.style.backgroundColor = 'rgba(255, 255, 255, 0.2)';
    closeButton.style.color = 'white';

    // Khi người dùng bấm OK, xoá alert
    closeButton.onclick = () => {
        clearTimeout(autoHide);
        document.body.removeChild(alertBox);
    };

    // Xác định màu dựa trên loại thông báo
    let backgroundColor = '#f44336'; // Default: error - red
    if (type === 'success') backgroundColor = '#4CAF50';
    else if (type === 'warning') backgroundColor = '#ff9800';
    else if (type === 'info') backgroundColor = '#2196F3';

    // Style hộp thông báo
    alertBox.style.position = 'fixed';
    alertBox.style.top = '20px';
    alertBox.style.left = '50%';
    alertBox.style.transform = 'translateX(-50%)';
    alertBox.style.backgroundColor = backgroundColor;
    alertBox.style.color = 'white';
    alertBox.style.padding = '15px 20px';
    alertBox.style.borderRadius = '4px';
    alertBox.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.2)';
    alertBox.style.zIndex = '1000';
    alertBox.style.textAlign = 'center';
    alertBox.style.minWidth = '250px';
    alertBox.style.display = 'flex';
    alertBox.style.justifyContent = 'space-between';
    alertBox.style.alignItems = 'center';

    // Thêm message và nút vào alert box
    alertBox.appendChild(messageText);
    alertBox.appendChild(closeButton);

    // Thêm alert vào body
    document.body.appendChild(alertBox);

    // Tự động ẩn sau thời gian quy định
    const autoHide = setTimeout(() => {
        if (document.body.contains(alertBox)) {
            document.body.removeChild(alertBox);
        }
    }, duration);
}
