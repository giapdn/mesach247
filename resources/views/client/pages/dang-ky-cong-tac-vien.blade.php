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

            .contract-form {
                border: 2px solid #ffffff;
                padding: 20px;
                border-radius: 10px;
                background-color: #f9f9f9;
                box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
                max-width: 100%;
            }

            .custom-title {
                text-align: center;
                font-weight: bold;
                margin-bottom: 10px;
            }

            .custom-title h1 {
                font-size: 32px;
                font-weight: 700;
            }

            .custom-title .underline {
                width: 100px;
                height: 4px;
                background-color: #6be6ff;
                margin: 10px auto;
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

            .id-upload {
                display: flex;
                justify-content: space-between;
            }

            .id-upload .col-sm-6 {
                padding-left: 0;
                padding-right: 0;
            }
        </style>

        <div class="container" style="background-image: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);">
            <div class="custom-title mt-5 mb-5">
                <h1>ĐĂNG KÝ CỘNG TÁC VIÊN</h1>
                <div class="underline"></div>
            </div>

            <!-- Row with two columns: Form on the left, image on the right -->
            <div class="row">
                <div class="col-md-6">
                    <div class="contract-form mb-5">
                        <form action="{{ route('kiemDuyetCTV') }}" method="post" enctype="multipart/form-data"
                            class="form-horizontal">
                            @csrf
                            <!-- Form Fields Here -->
                            <!-- Tên -->
                            <!-- Tên -->
                            <div class="form-group">
                                <label for="name" class="control-label">Tên:</label>
                                <div>
                                    <input type="text" class="form-control" id="ten_doc_gia" name="ten_doc_gia"
                                        placeholder="Nhập tên" value="{{ Auth::check() ? Auth::user()->ten_doc_gia : '' }}"
                                        required>
                                    @error('ten_doc_gia')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email" class="control-label">Email:</label>
                                <div>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Nhập email" value="{{ Auth::check() ? Auth::user()->email : '' }}"
                                        required>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Số điện thoại -->
                            <div class="form-group">
                                <label for="phone" class="control-label">Số Điện Thoại:</label>
                                <div>
                                    <input type="tel" class="form-control" id="so_dien_thoai" name="so_dien_thoai"
                                        placeholder="Nhập số điện thoại"
                                        value="{{ Auth::check() ? Auth::user()->so_dien_thoai : '' }}" required
                                        pattern="[0-9]*" inputmode="numeric"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">

                                    @error('so_dien_thoai')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Địa chỉ -->
                            <div class="form-group">
                                <label for="address" class="control-label">Địa Chỉ:</label>
                                <div>
                                    <input type="text" class="form-control" id="dia_chi" name="dia_chi"
                                        placeholder="Nhập địa chỉ" value="{{ Auth::check() ? Auth::user()->dia_chi : '' }}"
                                        required>
                                    @error('dia_chi')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Ngày Tháng Năm Sinh -->
                            <div class="form-group">
                                <label for="sinh_nhat" class="control-label">Ngày Tháng Năm Sinh:</label>
                                <div>
                                    <input type="date" class="form-control" id="sinh_nhat" name="sinh_nhat"
                                        placeholder="Chọn ngày tháng năm sinh"
                                        value="{{ Auth::check() && Auth::user()->sinh_nhat ? date('Y-m-d', strtotime(Auth::user()->sinh_nhat)) : '' }}"
                                        max="{{ date('Y-m-d') }}" required>
                                    @error('sinh_nhat')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Giới tính -->
                            <div class="form-group">
                                <label for="gender" class="control-label">Giới Tính:</label>
                                <div>
                                    <select class="form-control" id="gioi_tinh" name="gioi_tinh" required>
                                        <option value="Nam"
                                            {{ Auth::check() && Auth::user()->gioi_tinh == 'Nam' ? 'selected' : '' }}>Nam
                                        </option>
                                        <option value="Nữ"
                                            {{ Auth::check() && Auth::user()->gioi_tinh == 'Nữ' ? 'selected' : '' }}>Nữ
                                        </option>
                                    </select>
                                    @error('gioi_tinh')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Ảnh căn cước mặt trước và mặt sau -->
                            <div class="form-group">
                                <label class="control-label">Ảnh Căn Cước:</label>
                                <div class="id-upload">
                                    <!-- Mặt Trước -->
                                    <div class="col-sm-6 text-center">
                                        <label for="cmnd_mat_truoc" class="control-label">Mặt Trước:</label>
                                        <!-- Default Image Preview -->
                                        <img id="preview_mat_truoc" src="{{ asset('assets/client/img/mattruoc.jpg') }}" alt="Mặt Trước" style="width: 70%; max-height: 130px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                        <!-- File Input -->
                                        <input type="file" class="form-control" id="cmnd_mat_truoc" name="cmnd_mat_truoc" accept="image/*" onchange="previewImage(event, 'preview_mat_truoc')" style="max-width: 290px; margin: 0 auto;">
                                        @error('cmnd_mat_truoc')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Mặt Sau -->
                                    <div class="col-sm-6 text-center">
                                        <label for="cmnd_mat_sau" class="control-label">Mặt Sau:</label>
                                        <!-- Default Image Preview -->
                                        <img id="preview_mat_sau" src="{{ asset('assets/client/img/matsau.jpg') }}" alt="Mặt Sau" style="width: 70%; max-height: 130px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                        <!-- File Input -->
                                        <input type="file" class="form-control" id="cmnd_mat_sau" name="cmnd_mat_sau" accept="image/*" onchange="previewImage(event, 'preview_mat_sau')" style="max-width: 290px; margin: 0 auto;">
                                        @error('cmnd_mat_sau')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <script>
                                // JavaScript function to preview the selected image
                                function previewImage(event, previewId) {
                                    const reader = new FileReader();
                                    reader.onload = function() {
                                        document.getElementById(previewId).src = reader.result;
                                    };
                                    reader.readAsDataURL(event.target.files[0]);
                                }
                            </script>


                            <!-- Ghi Chú -->
                            <div class="form-group">
                                <label for="ghi_chu" class="control-label">Ghi Chú:</label>
                                <div>
                                    <textarea class="form-control" id="ghi_chu" name="ghi_chu" placeholder="Nhập ghi chú" rows="3"></textarea>
                                </div>
                            </div>

                            <!-- Upload CV -->
                            <div class="form-group">
                                <label for="cv_upload" class="control-label">Upload CV:</label>
                                <div>
                                    <input type="file" class="form-control" id="cv_upload" name="cv_pdf"
                                        accept=".pdf,.doc,.docx" required>
                                </div>
                            </div>


                            <!-- Đồng ý điều kiện -->
                            <div class="form-group">
                                <div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="ok" name="ok" required> Tôi đồng ý với
                                            các điều kiện và điều khoản của hợp đồng.
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Remaining Form Fields Here (Email, Phone, Address, Date of Birth, Gender, etc.) -->

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Đăng Ký">
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Image Section on the Right -->
                <div class="col-md-6  align-items-center justify-content-center">
                    <img src="{{ asset('assets/client/img/sunbook.png') }}" alt="Form Image" class="img-fluid"
                        style="max-width: 100%; height: auto; ">
                </div>
            </div>
        </div>
    @endsection
