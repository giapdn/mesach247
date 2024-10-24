@extends('client.layouts.app')
@section('content')

    <body>
        <style>
            .form-group {
                margin-bottom: 20px;
                padding-left: 20px;
                padding-right: 20px;
            }

            label {
                margin-bottom: 5px;
            }

            /* Chia phần tải ảnh căn cước thành hai cột nằm ngang */
            .id-upload {
                display: flex;
                justify-content: space-between;
            }

            .id-upload .col-sm-6 {
                padding-left: 0;
                padding-right: 0;
            }

            /* Tạo khung cho biểu mẫu và giới hạn kích thước */
            .contract-form {
                border: 2px solid #ffffff;
                padding: 20px;
                border-radius: 10px;
                background-color: #f9f9f9;
                box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
                max-width: 600px;
                /* Giới hạn chiều rộng */
                margin: 0 auto;
                /* Căn giữa biểu mẫu */
            }

            /* Phong cách cho tiêu đề giống hình ảnh */
            .custom-title {
                text-align: center;
                font-weight: bold;
                margin-bottom: 10px;
            }

            .custom-title h1 {
                font-size: 32px;
                font-weight: 700;
            }

            .custom-title h3 {
                font-size: 20px;
                font-weight: 600;
                margin-top: 0;
            }

            .custom-title .underline {
                width: 100px;
                height: 4px;
                background-color: #6be6ff;
                /* Màu hồng của gạch ngang */
                margin: 10px auto;
                /* Căn giữa */
            }

            .registration-info {
                background-color: #f4f4f9;
                margin-top: 20px;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .registration-info h3 {
                color: #0056b3;
                font-family: 'Arial', sans-serif;

                text-transform: uppercase;
                margin-bottom: 10px;
            }

            .registration-info p {
                font-family: 'Helvetica', sans-serif;
                font-size: 16px;
                color: #333;
                line-height: 1.6;
            }
        </style>
        <div class="container" style="background-image: url('{{ asset('public/assets/client/img/banner2.jpg') }}');">

    

            <div class="custom-title mt-3">
                <h1>ĐĂNG KÝ CỘNG TÁC VIÊN</h1>
                <div class="underline"></div>

            </div>
            <div class="contract-form mb-5">
                <form action="submit_form.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                    <!-- Tên -->
                    <div class="form-group">
                        <label for="name" class="control-label">Tên:</label>
                        <div>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên"
                                required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="control-label">Email:</label>
                        <div>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Nhập email" required>
                        </div>
                    </div>

                    <!-- Số điện thoại -->
                    <div class="form-group">
                        <label for="phone" class="control-label">Số Điện Thoại:</label>
                        <div>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="Nhập số điện thoại" required>
                        </div>
                    </div>

                    <!-- Địa chỉ -->
                    <div class="form-group">
                        <label for="address" class="control-label">Địa Chỉ:</label>
                        <div>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Nhập địa chỉ" required>
                        </div>
                    </div>

                    <!-- Tuổi -->
                    <div class="form-group">
                        <label for="age" class="control-label">Tuổi:</label>
                        <div>
                            <input type="number" class="form-control" id="age" name="age" placeholder="Nhập tuổi"
                                required>
                        </div>
                    </div>

                    <!-- Giới tính -->
                    <div class="form-group">
                        <label for="gender" class="control-label">Giới Tính:</label>
                        <div>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="male">Nam</option>
                                <option value="female">Nữ</option>
                                <option value="other">Khác</option>
                            </select>
                        </div>
                    </div>

                    <!-- Ảnh căn cước mặt trước và mặt sau -->
                    <div class="form-group">
                        <label class="control-label">Ảnh Căn Cước:</label>
                        <div class="id-upload">
                            <div class="col-sm-6">
                                <label for="id_front" class="control-label">Mặt Trước:</label>
                                <input type="file" class="form-control" id="id_front" name="id_front" accept="image/*"
                                    required>
                            </div>
                            <div class="col-sm-6">
                                <label for="id_back" class="control-label">Mặt Sau:</label>
                                <input type="file" class="form-control" id="id_back" name="id_back" accept="image/*"
                                    required>
                            </div>
                        </div>
                    </div>

                    <!-- Đồng ý điều kiện -->
                    <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="agree" name="agree" required> Tôi đồng ý với các điều
                                    kiện và điều khoản của hợp đồng.
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Nút Submit -->
                    <div class="form-group">
                        <div>
                            <input type="submit" class="btn btn-success" value="Đăng Ký">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endsection
