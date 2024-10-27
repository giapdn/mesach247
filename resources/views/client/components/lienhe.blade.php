<div class="feedback-button-container">
    <button id="feedbackButton" class="feedback-button">PHẢN HỒI</button>
</div>

<!-- Form for feedback -->
<div id="feedbackForm" class="feedback-form">
    <div class="form-header">
        <span class="close-btn">&times;</span>
        <h3>Gửi Lời Nhắn Đến Quản Trị Viên</h3>
    </div>
    <form action="{{ route('lien_he.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Họ Tên:</label>
        <input type="text" id="name" name="ten_khach_hang" class="editable"
               value="{{ Auth::check() ? Auth::user()->ten_doc_gia : 'Nhập tên' }}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="editable"
               value="{{ Auth::check() ? Auth::user()->email : 'Nhập email' }}" required>

        <label for="link">Chủ đề:</label>
        <input type="text" id="chu_de" name="chu_de" class="editable" required>

        <label for="message">Lời Nhắn:</label>
        <textarea id="message" name="noi_dung" class="editable" placeholder="Vui lòng mô tả chi tiết vấn đề..." required></textarea>

        <div class="upload-wrapper">
            <label for="fileUpload" class="upload-label">
                <i class="fa fa-upload"></i> Tải Lên Hình Ảnh
            </label>
            <label class="text-danger" for="message">Bạn có thể tải lên các hình ảnh mô tả vấn đề hoặc lỗi.</label>
            <input type="file" id="fileUpload" name="anh" style="display:none;">

            <!-- Phần hiển thị ảnh sau khi chọn sẽ xuất hiện sau đây (hiện tại không có ảnh được chọn) -->
            <div id="imagePreviewContainer" class="image-preview-container" style="display:none;">
                <div class="image-preview">
                    <img id="previewImage" src="" alt="Preview Image" class="preview-img" />
                    <span id="fileName" class="file-name"></span>
                    <span id="removeImage" class="remove-image"><i class="fa fa-trash"></i></span>
                </div>
            </div>
        </div>

        <script>
            // Xử lý khi người dùng chọn file ảnh
            document.getElementById('fileUpload').addEventListener('change', function(event) {
                const file = event.target.files[0]; // Lấy file được chọn
                const previewImage = document.getElementById('previewImage'); // Thẻ img hiển thị preview
                const fileName = document.getElementById('fileName'); // Thẻ span hiển thị tên file
                const imagePreviewContainer = document.getElementById('imagePreviewContainer'); // Container hiển thị ảnh

                if (file) {
                    const reader = new FileReader();

                    // Giới hạn tên file nếu dài quá 20 ký tự
                    let fileNameText = file.name;
                    if (fileNameText.length > 20) {
                        fileNameText = fileNameText.substring(0, 17) + '...'; // Cắt ngắn tên và thêm "..."
                    }

                    // Khi file được tải xong, đặt URL vào src của thẻ img và hiển thị container
                    reader.onload = function(e) {
                        previewImage.src = e.target.result; // Set nguồn của ảnh là ảnh mới
                        fileName.textContent = fileNameText; // Hiển thị tên file (đã cắt ngắn nếu cần)
                        imagePreviewContainer.style.display = 'flex'; // Hiển thị container chứa ảnh
                    }

                    // Đọc file dưới dạng URL
                    reader.readAsDataURL(file);
                }
            });

            // Xử lý khi người dùng nhấn vào biểu tượng thùng rác để xóa ảnh
            document.getElementById('removeImage').addEventListener('click', function() {
                document.getElementById('fileUpload').value = ''; // Xóa giá trị của input file
                document.getElementById('previewImage').src = ''; // Xóa ảnh hiển thị
                document.getElementById('fileName').textContent = ''; // Xóa tên file
                document.getElementById('imagePreviewContainer').style.display = 'none'; // Ẩn container hiển thị ảnh
            });

            document.addEventListener('DOMContentLoaded', function() {
                var alertClose = document.querySelector('.custom-alert-close');
                var alertBox = document.getElementById('customAlert');

                // Đóng thông báo khi nhấn vào dấu X
                if (alertClose) {
                    alertClose.addEventListener('click', function() {
                        alertBox.style.display = 'none';
                    });
                }

                // Tự động ẩn thông báo sau 5 giây
                setTimeout(function() {
                    if (alertBox) {
                        alertBox.style.display = 'none';
                    }
                }, 5000); // 5000ms = 5 giây
            });
        </script>

        <button type="submit" class="btn btn-primary mt-4">Gửi Lời Nhắn</button>
    </form>


</div>

@if (session('success'))
    <div id="customAlert" class="custom-alert">
        <span class="custom-alert-message">{{ session('success') }}</span>
        <span class="custom-alert-close">&times;</span>
    </div>
@endif

<div id="backToTop" class="back-to-top">
    <span>&uarr;</span>
</div>

<style>
    .custom-alert {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 15px;
        background-color: #28a745;
        /* Màu nền xanh lá cho thành công */
        color: white;
        border-radius: 5px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: space-between;
        min-width: 250px;
        max-width: 400px;
    }

    .custom-alert-message {
        flex-grow: 1;
        padding-right: 10px;
    }

    .custom-alert-close {
        cursor: pointer;
        padding-left: 10px;
        font-weight: bold;
        color: white;
    }

    .custom-alert-close:hover {
        color: #e2e6ea;
    }

    .upload-wrapper {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        margin-bottom: 10px;
    }

    .upload-label {
        cursor: pointer;
        display: inline-block;
        padding: 10px 20px;
        background-color: #f8f9fa;
        /* Màu nền nhẹ */
        border: 1px solid #ccc;
        /* Đường viền nhạt */
        border-radius: 5px;
        /* Góc bo tròn */
        color: #333;
        /* Màu chữ */
        font-size: 16px;
        /* Kích thước chữ */
        text-align: center;
        text-decoration: none;
        /* Bỏ gạch chân */
        display: flex;
        align-items: center;
        /* Căn giữa biểu tượng và chữ theo chiều dọc */
        gap: 8px;
        /* Khoảng cách giữa biểu tượng và chữ */
    }

    .upload-label i {
        font-size: 18px;
        /* Kích thước biểu tượng */
    }

    .upload-label:hover {
        background-color: #e2e6ea;
        /* Màu nền khi hover */
    }


    .image-preview-container {
        display: flex;
        align-items: center;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-top: 10px;
    }

    .image-preview {
        display: flex;
        align-items: center;
    }

    .preview-img {
        max-width: 50px;
        max-height: 50px;
        margin-right: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    .file-name {
        flex-grow: 1;
        margin-right: 10px;
    }

    .remove-image {
        color: #888;
        cursor: pointer;
    }

    .remove-image:hover {
        color: red;
    }

    .back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        background-color: #d3d3d3;
        /* Màu nền của nút */
        border-radius: 50%;
        text-align: center;
        line-height: 50px;
        font-size: 24px;
        color: white;
        cursor: pointer;
        display: none;
        /* Ban đầu ẩn đi */
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s;
    }

    .back-to-top:hover {
        background-color: #888;
        /* Màu khi hover */
    }

    .back-to-top span {
        display: inline-block;
        transform: rotate(360deg);
        /* Nếu muốn mũi tên quay ngang */
    }



    /* Style for feedback button on the right */
    .feedback-button-container {
        position: fixed;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1000;
    }

    .feedback-button {
        padding: 20px 7px;
        background-color: #f1f1f1;
        border: 1px solid #ccc;
        border-radius: 5px 0 0 5px;
        cursor: pointer;
        writing-mode: vertical-rl;
        text-align: center;
        font-size: 16px;
        color: #333;
    }

    /* Feedback form sliding from the right */
    .feedback-form {
        position: fixed;
        right: -400px;
        /* Hidden by default */
        top: 0;
        width: 400px;
        height: 100%;
        background-color: white;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
        padding: 20px;
        z-index: 1001;
        transition: right 0.3s ease;
    }

    .feedback-form.open {
        right: 0;
    }

    .form-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .close-btn {
        font-size: 24px;
        cursor: pointer;
    }

    .editable {
        padding: 10px;
        margin: 10px 0;
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 5px;
        min-height: 30px;
        /* Đảm bảo chiều cao tối thiểu */
    }

    .editable:focus {
        border-color: #007bff;
        outline: none;
        /* Loại bỏ viền mặc định khi focus */
    }

    .form-header {
        display: flex;
        justify-content: center;
        /* Căn giữa theo chiều ngang */
        align-items: center;
        /* Căn giữa theo chiều dọc */
        position: relative;
        padding: 10px;
        /* Tùy chỉnh khoảng cách */
        border-bottom: 1px solid #ddd;
        /* Tùy chỉnh đường viền dưới */
    }

    .form-header h3 {
        margin: 0;
        flex-grow: 1;
        /* Cho phép tiêu đề chiếm không gian còn lại */
        text-align: center;
        /* Căn giữa tiêu đề */
    }

    .close-btn {
        position: absolute;
        left: 10px;
        /* Tùy chỉnh khoảng cách với cạnh trái */
        top: 50%;
        transform: translateY(-50%);
        /* Căn giữa theo chiều dọc */
        font-size: 20px;
        /* Tùy chỉnh kích thước nút */
        cursor: pointer;
    }
</style>
<script>
    // Hiển thị nút khi scroll xuống dưới một khoảng nhất định
    window.onscroll = function() {
        var backToTop = document.getElementById("backToTop");
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            backToTop.style.display = "block";
        } else {
            backToTop.style.display = "none";
        }
    };

    // Khi nhấn vào nút, cuộn về đầu trang
    document.getElementById('backToTop').addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // Hiệu ứng cuộn mượt
        });
    });

    // Get the button, form, and close button
    var feedbackButton = document.getElementById("feedbackButton");
    var feedbackForm = document.getElementById("feedbackForm");
    var closeButton = document.getElementsByClassName("close-btn")[0];

    // When the user clicks the button, open the form (slide it in from the right)
    feedbackButton.onclick = function() {
        feedbackForm.classList.add("open");
    }

    // When the user clicks on the close button (X), close the form
    closeButton.onclick = function() {
        feedbackForm.classList.remove("open");
    }

    // When the user clicks outside the form, close the form
    window.onclick = function(event) {
        // Check if the click happened outside the form
        if (!feedbackForm.contains(event.target) && event.target !== feedbackButton) {
            feedbackForm.classList.remove("open");
        }
    }
</script>
