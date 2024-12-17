@extends('admin.layouts.app')

@section('title', 'Rút tiền')

@section('content')
    <div class="container ">
        <div class="card shadow p-4">
            <!-- Updated Header Layout -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="d-flex align-items-center">
                    <h4 class="mb-0 d-flex align-items-center justify-content-center">
                        <i class="bx bx-wallet text-primary fs-2 me-2"></i>
                        {{ number_format($soDu, 0, ',', '.') }} VNĐ
                    </h4>
                    <button type="button" class="btn btn-primary ms-2" onclick="checkSD()">Rút tiền</button>
                </div>
                <div>

                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                            data-bs-target="#supportModal">
                        Hỗ trợ
                    </button>

                    <button type="button" class="btn btn-info ms-2" data-bs-toggle="modal"
                            data-bs-target="#setupWithdrawalModal">
                        Thiết lập tài khoản rút tiền
                    </button>

                    <div class="modal fade" id="setupWithdrawalModal" tabindex="-1"
                         aria-labelledby="setupWithdrawalModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="setupWithdrawalModalLabel">Cập nhật thông tin tài khoản
                                        rút tiền</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form Content for Account Setup -->
                                    <form action="{{ route('thiet-lap-rut-tien.capNhat') }}" method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <!-- Tên Ngân Hàng -->
                                        <div class="mb-3">
                                            <label for="bankName" class="form-label">Tên ngân hàng</label>
                                            <select class="form-control" id="bank-name-input" name="ten_ngan_hang"
                                                    required>
                                                <option value="">Chọn ngân hàng</option>
                                                <option
                                                    value="MBBank" {{ isset($accountInfo) && $accountInfo->ten_ngan_hang == 'MBBank' ? 'selected' : '' }}>
                                                    NH TMCP Quan Doi MBBank
                                                </option>
                                                <option
                                                    value="BIDV" {{ isset($accountInfo) && $accountInfo->ten_ngan_hang == 'BIDV' ? 'selected' : '' }}>
                                                    NH TMCP Dau Tu va Phat Trien Viet Nam BIDV
                                                </option>
                                                <option
                                                    value="Agribank" {{ isset($accountInfo) && $accountInfo->ten_ngan_hang == 'Agribank' ? 'selected' : '' }}>
                                                    NH Nong Nghiep Phat Trien Nong Thon VN Agribank
                                                </option>
                                                <option
                                                    value="Vietcombank" {{ isset($accountInfo) && $accountInfo->ten_ngan_hang == 'Vietcombank' ? 'selected' : '' }}>
                                                    Ngan Hang Vietcombank VCB
                                                </option>
                                                <option
                                                    value="ACBBank" {{ isset($accountInfo) && $accountInfo->ten_ngan_hang == 'ACBBank' ? 'selected' : '' }}>
                                                    NH TMCP A Chau ACB
                                                </option>
                                                <option
                                                    value="Techcombank" {{ isset($accountInfo) && $accountInfo->ten_ngan_hang == 'Techcombank' ? 'selected' : '' }}>
                                                    Ngan hang Ky Thuong Viet Nam Techcombank
                                                </option>
                                            </select>
                                            @error('ten_ngan_hang')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Số Tài Khoản -->
                                        <div class="mb-3">
                                            <label for="accountNumber" class="form-label">Số tài khoản</label>
                                            <input
                                                type="text"
                                                class="form-control @error('so_tai_khoan') is-invalid @enderror"
                                                id="accountNumber"
                                                name="so_tai_khoan"
                                                value="{{ old('so_tai_khoan', $accountInfo->so_tai_khoan ?? '') }}"
                                                required>
                                            @error('so_tai_khoan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Tên Chủ Tài Khoản -->
                                        <div class="mb-3">
                                            <label for="accountHolderName" class="form-label">Tên chủ tài khoản</label>
                                            <input
                                                type="text"
                                                class="form-control @error('ten_chu_tai_khoan') is-invalid @enderror"
                                                id="accountHolderName"
                                                name="ten_chu_tai_khoan"
                                                value="{{ old('ten_chu_tai_khoan', $accountInfo->ten_chu_tai_khoan ?? '') }}"
                                                required
                                                oninput="this.value = this.value.toUpperCase()">
                                            @error('ten_chu_tai_khoan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="qrImage" class="form-label">Ảnh QR</label>

                                            @if (!empty($accountInfo->anh_qr))
                                                <div id="current-qr-code" class="mb-2">
                                                    <img src="{{ asset('storage/' . $accountInfo->anh_qr) }}"
                                                         alt="Ảnh QR hiện tại"
                                                         style="max-width: 200px; max-height: 200px; display: block; border: 1px solid #ddd; border-radius: 5px;">
                                                </div>
                                            @endif

                                            <input
                                                type="file"
                                                class="form-control @error('anh_qr') is-invalid @enderror"
                                                id="qrImage"
                                                name="anh_qr"
                                                accept="image/*"
                                                onchange="previewQRCode(event)">

                                            @error('anh_qr')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                            <div id="qr-code-preview" class="mt-3" style="display: none;">
                                                <img id="preview-image"
                                                     alt="Xem trước mã QR"
                                                     style="max-width: 200px; max-height: 200px; border: 1px solid #ddd; border-radius: 5px;">
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-secondary me-2"
                                                    data-bs-dismiss="modal">Đóng
                                            </button>
                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="setupWithdrawalModal" tabindex="-1"
                         aria-labelledby="setupWithdrawalModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="setupWithdrawalModalLabel">Cập nhật thông tin tài khoản
                                        rút tiền</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form Content for Account Setup -->
                                    <form>
                                        ...
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng
                                    </button>
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Support Modal -->
                    <div class="modal fade" id="supportModal" tabindex="-1" aria-labelledby="supportModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="supportModalLabel">Liên hệ hỗ trợ</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="ps-3 pe-3 pt-2">
                                    <p class="bg-primary-subtle rounded-3 p-2">
                                        Cộng tác viên có bất kỳ vấn đề gì về rút tiền vui lòng liên hệ các kênh dưới đây
                                        để
                                        được hỗ trợ sớm nhất!
                                    </p>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <!-- Left side with contact options -->
                                        <div class="col-md-7">

                                            <div class="mb-3">
                                                <a href="mailto:mesach247@gmail.com"
                                                   class="btn btn-primary btn-label rounded-pill">
                                                    <i
                                                        class="ri-mail-line label-icon align-middle rounded-pill fs-16 me-2"></i>
                                                    Gửi Email Cho Chúng Tôi
                                                </a>
                                            </div>
                                            <div class="mb-3">
                                                <a target="_blank"
                                                   href="https://www.facebook.com/BigSuncom?mibextid=kFxxJD"
                                                   class="btn btn-info btn-label rounded-pill">
                                                    <i
                                                        class="ri-facebook-line label-icon align-middle rounded-pill fs-16 me-2"></i>
                                                    Liên Hệ Facebook
                                                </a>
                                            </div>
                                            <div class="mb-3">
                                                <a href="https://zalo.me/0981679804"
                                                   class="btn btn-warning btn-label rounded-pill">
                                                    <i
                                                        class="ri-phone-line label-icon align-middle rounded-pill fs-16 me-2"></i>
                                                    Liên Hệ Zalo Cho Chúng Tôi
                                                </a>
                                            </div>
                                        </div>

                                        <!-- Right side with an image -->
                                        <div class="col-md-5 d-flex justify-content-center align-items-center"
                                             style="height: 100%;">
                                            <lord-icon src="https://cdn.lordicon.com/zpxybbhl.json" trigger="loop"
                                                       colors="primary:#405189,secondary:#0ab39c"
                                                       style="width:160px; height:160px;"> <!-- Increased size -->
                                            </lord-icon>
                                        </div>

                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="justify-content-between align-items-center fs-9" style="color:gray">
                <p>
                    1. Cộng tác viên sẽ nhận được hoa hồng từ <strong>60% đến 80%</strong>
                    trên giá trị bán ra của mỗi cuốn sách được bán thành công.

                    <br>
                    - Giá trị hoa hồng được tính dựa trên giá bán thực tế của sản phẩm ,
                    sau khi trừ đi các khoản giảm giá, khuyến mãi (nếu có) hoặc các khoản chi phí khác liên quan đến
                    giao dịch.
                    <br>- Ví dụ: Nếu một cuốn sách có giá bán là 200.000 VND và không có chương trình giảm giá hay
                    khuyến mãi, bạn sẽ nhận hoa hồng là 120.000 VND (60% của 200.000 VND).

                    <br>2. Hoa hồng chỉ được tính cho các đơn hàng thành công .
                    Nếu đơn hàng bị hủy vì lý do nào đó, hoa hồng sẽ không được tính. MêSách247 có quyền xác minh các
                    giao dịch và hoa hồng trước khi thanh toán.
                    <br>3. Các khoản thanh toán sẽ được thực hiện khi bạn gửi yêu cầu rút tiền
                    (ví dụ: chuyển khoản ngân hàng, ví điện tử hoặc các phương thức thanh toán khác mà MêSách247 hỗ
                    trợ). Nếu số tiền trong ví (hoa hồng) của bạn không đạt hạn mức rút chúng tôi sẽ từ chối yêu cầu rút
                    tiền của bạn.
                    <br>4. Mỗi ngày, bạn được phép rút tối đa 3 lần, với hạn mức tối đa 30 triệu đồng mỗi tuần.
                    <br>
                    <span id="expandLink" style="color:blue; cursor:pointer;">Xem thêm</span>
                </p>

                <div id="additionalInfo" style="display:none; color:gray;">
                    <p>Thông tin bổ sung về quy trình rút tiền và các điều kiện áp dụng:</p>
                    <ul>
                        <li><strong>Đảm bảo an toàn:</strong> Mọi yêu cầu rút tiền phải được thực hiện thông qua hệ
                            thống
                            bảo mật của chúng tôi. Đảm bảo rằng bạn đã cập nhật phần mềm bảo mật và đăng nhập từ thiết
                            bị
                            đáng tin cậy.
                        </li>
                        <li><strong>Tránh sai sót:</strong> Khi nhập số tài khoản, bạn cần kiểm tra kỹ lưỡng thông tin
                            hai
                            lần. Chúng tôi khuyên bạn sử dụng tính năng "Lưu tài khoản" để tránh nhập sai số tài khoản
                            trong
                            các lần rút tiền tiếp theo.
                        </li>
                        <li><strong>Xử lý khi gửi nhầm số tài khoản:</strong> Trong trường hợp gửi nhầm số tài khoản,
                            bạn
                            cần liên hệ ngay với chúng tôi qua số điện thoại hỗ trợ khách hàng. Chúng tôi sẽ hỗ trợ xác
                            minh
                            và đảo ngược giao dịch nếu số tiền chưa được chuyển đi.
                        </li>
                        <li><strong>Giới hạn rút tiền:</strong> Mỗi người dùng chỉ được phép rút tối đa là 30.000.000
                            VND
                            mỗi tuần và 3 lần trên 1 ngày. Các yêu cầu rút tiền vượt quá giới hạn này sẽ cần xác minh bổ
                            sung.
                        </li>
                        <li><strong>Thời gian xử lý:</strong> Yêu cầu rút tiền thường được xử lý trong vòng 24 đến 48
                            giờ
                            làm việc, tùy thuộc vào ngân hàng của bạn.
                        </li>
                        <li><strong>Các biện pháp phòng ngừa lừa đảo:</strong> Chúng tôi sử dụng công nghệ phân tích
                            hành vi
                            để phát hiện các giao dịch bất thường. Bất kỳ giao dịch nghi ngờ nào cũng sẽ được tạm ngừng
                            cho
                            đến khi xác minh đầy đủ.
                        </li>
                    </ul>
                </div>

            </div>

            <script>
                document.getElementById('expandLink').onclick = function () {
                    var info = document.getElementById('additionalInfo');
                    if (info.style.display === 'none') {
                        info.style.display = 'block';
                    } else {
                        info.style.display = 'none';
                    }
                };
            </script>


            <!-- Modal -->
            <div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form action="{{ route('withdraw.store') }}" method="POST" autocomplete="off"
                              enctype="multipart/form-data" class="giap" id="adu">
                            @csrf
                            <div class="text-center pt-4 pb-2">
                                <h4>Rút tiền</h4>
                            </div>
                            <div class="modal-body">
                                <div class="mb-4">
                                    <h5 class="mb-3">Thông tin rút tiền</h5>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="bank-name-input">Tên ngân hàng</label>
                                        <select class="form-control" id="bank-name-input" name="bank-name-input"
                                                required>
                                            <option value="">Chọn ngân hàng</option>
                                            <option
                                                value="MBBank" {{ isset($accountInfo) && $accountInfo->ten_ngan_hang == 'MBBank' ? 'selected' : '' }}>
                                                NH TMCP Quan Doi MBBank
                                            </option>
                                            <option
                                                value="BIDV" {{ isset($accountInfo) && $accountInfo->ten_ngan_hang == 'BIDV' ? 'selected' : '' }}>
                                                NH TMCP Dau Tu va Phat Trien Viet Nam BIDV
                                            </option>
                                            <option
                                                value="Agribank" {{ isset($accountInfo) && $accountInfo->ten_ngan_hang == 'Agribank' ? 'selected' : '' }}>
                                                NH Nong Nghiep Phat Trien Nong Thon VN Agribank
                                            </option>
                                            <option
                                                value="Vietcombank" {{ isset($accountInfo) && $accountInfo->ten_ngan_hang == 'Vietcombank' ? 'selected' : '' }}>
                                                Ngan Hang Vietcombank VCB
                                            </option>
                                            <option
                                                value="ACBBank" {{ isset($accountInfo) && $accountInfo->ten_ngan_hang == 'ACBBank' ? 'selected' : '' }}>
                                                NH TMCP A Chau ACB
                                            </option>
                                            <option
                                                value="Techcombank" {{ isset($accountInfo) && $accountInfo->ten_ngan_hang == 'Techcombank' ? 'selected' : '' }}>
                                                Ngan hang Ky Thuong Viet Nam Techcombank
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="account-number-input">Số tài khoản</label>
                                        <input type="number" class="form-control" id="account-number-input"
                                               name="account-number-input" placeholder="Nhập số tài khoản"
                                               value="{{ old('account-number-input', $accountInfo->so_tai_khoan ?? '') }}"
                                               required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="recipient-name-input">Tên chủ tài khoản</label>
                                        <input type="text" class="form-control" id="recipient-name-input"
                                               name="recipient-name-input"
                                               value="{{ old('recipient-name-input', $accountInfo->ten_chu_tai_khoan ?? '') }}"
                                               placeholder="VD: NGUYEN VAN A" required
                                               style="text-transform: uppercase">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="amount-input">Số tiền muốn rút (Số tiền phải lớn hơn hoặc bằng
                                            100.000 VNĐ)</label>
                                        <input name="amount-input" id="amount-input" class="form-control"
                                               value="{{ old('amount-input') }}" type="number" min="100000">
                                        @error('amount-input')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Thêm trường ghi chú -->
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="note-input">Ghi chú</label>
                                        <textarea class="form-control" id="ghi_chu" name="ghi_chu"
                                                  placeholder="Nhập ghi chú (nếu có)" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="qr-code-input">Tải lên mã QR</label>

                                        @if (!empty($accountInfo->anh_qr))
                                            <div id="current-qr-code" class="mb-2">
                                                <img src="{{ asset('storage/' . $accountInfo->anh_qr) }}"
                                                     alt="Mã QR hiện tại"
                                                     style="max-width: 200px; max-height: 200px; display: block; border: 1px solid #ddd; border-radius: 10px;">
                                                <input type="hidden" name="current-qr-code"
                                                       value="{{ $accountInfo->anh_qr }}">
                                            </div>
                                        @endif

                                        <input
                                            type="file"
                                            class="form-control"
                                            id="qr-code-input"
                                            name="qr-code-input"
                                            accept="image/*"

                                        >

                                        <!-- Container hiển thị ảnh mới -->
                                        <div id="qr-code-preview-container" class="mt-3" style="display: none;">
                                            <img id="qr-code-preview" alt="Xem trước mã QR"
                                                 style="max-width: 200px; max-height: 200px; border: 1px solid #ddd; border-radius: 10px;">
                                        </div>
                                        {{--                                        <input--}}
                                        {{--                                            type="file"--}}
                                        {{--                                            class="form-control"--}}
                                        {{--                                            id="qr-code-input"--}}
                                        {{--                                            name="qr-code-input"--}}
                                        {{--                                            accept="image/*"--}}
                                        {{--                                        >--}}

                                        {{--                                        <div id="qr-code-preview-container" class="mt-3" style="display: none">--}}
                                        {{--                                            <img id="qr-code-preview" alt="Xem trước mã QR"--}}
                                        {{--                                                 src="{{ asset('storage/' . $accountInfo->anh_qr) }}"--}}
                                        {{--                                                 style="max-width: 200px; max-height: 200px; border: 1px solid #ddd; border-radius: 10px;">--}}
                                        {{--                                        </div>--}}
                                    </div>
                                    <script>
                                        // function previewQrCode(event) {
                                        //     const fileInput = $(event.target)[0];
                                        //     const file = fileInput.files[0];
                                        //     const $previewContainer = $('#qr-code-preview-container');
                                        //     const $previewImage = $('#qr-code-preview');
                                        //
                                        //     if (file) {
                                        //         const reader = new FileReader();
                                        //
                                        //         reader.onload = function (e) {
                                        //             console.log("URL Base64:", e.target.result); // In ra URL Base64 để kiểm tra
                                        //             $previewImage.attr('src', e.target.result); // Cập nhật ảnh
                                        //             $previewContainer.show(); // Hiển thị container
                                        //         };
                                        //
                                        //         reader.readAsDataURL(file);
                                        //     } else {
                                        //         console.warn("Không có file nào được chọn");
                                        //     }
                                        // }

                                    </script>
                                </div>


                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <label for="qr-code-input">Xác thực captcha</label>
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                                <button type="submit" class="btn btn-success">Xác nhận rút tiền</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="otpModalLabel">Xác nhận OTP</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Chúng tôi đã gửi mã OTP đến email của bạn. Vui lòng kiểm tra và nhập mã OTP bên dưới:</p>
                            <input type="text" id="otp-input" class="form-control" placeholder="Nhập mã OTP" required>
                            <small id="otp-error" class="text-danger" style="display: none;">Mã OTP không đúng. Vui lòng
                                thử lại.</small>

                            <!-- Hiển thị bộ đếm thời gian -->
                            <p style="margin-top: 2%"><strong>Thời gian còn lại: <span
                                        id="countdown">05:00</span></strong></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                            <button type="button" class="btn btn-success" id="verify-otp-btn">Xác nhận</button>
                        </div>
                    </div>
                </div>
            </div>


            <script>
                let isOtpVerified = false;
                let countdownTimer;
                let countdownSeconds = 5 * 60; // 5 phút (5 * 60 giây)

                function startCountdown() {
                    countdownTimer = setInterval(function () {
                        const minutes = Math.floor(countdownSeconds / 60);
                        const seconds = countdownSeconds % 60;

                        // Cập nhật thời gian đếm ngược trên UI
                        $('#countdown').text(
                            `${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`
                        );

                        // Khi bộ đếm hết thời gian, xóa OTP và ẩn modal
                        if (countdownSeconds <= 0) {
                            clearInterval(countdownTimer);  // Dừng bộ đếm
                            $.ajax({
                                url: '/admin/otp/remove', // URL của API xóa OTP
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}' // CSRF token cho bảo mật
                                },
                                success: function (response) {
                                    hideLoader()
                                    if (response.success) {
                                        $('#otpModal').modal('hide');
                                    } else {
                                        console.log('Có lỗi xảy ra khi xóa OTP');
                                    }
                                },
                                error: function (err) {
                                    hideLoader()
                                    console.log('Lỗi:', err);
                                }
                            });
                        }

                        countdownSeconds--;
                    }, 1000);
                }

                $('#otpModal').on('shown.bs.modal', function () {
                    countdownSeconds = 5 * 60; // Đặt lại bộ đếm về 5 phút
                    startCountdown();
                });

                $(document).ready(function () {
                    $('#adu').on('submit', function (e) {
                        e.preventDefault(); // Ngăn form gửi đi ngay lập tức
                        // Gửi yêu cầu để tạo OTP
                        $.ajax({
                            url: '/admin/otp/send', // API gửi OTP
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function (response) {
                                console.log(response)
                                if (response.success) {
                                    // Hiển thị modal OTP
                                    $('#withdrawModal').modal('hide')
                                    $('#otpModal').modal('show');
                                    hideLoader()
                                } else {
                                    alert('Không thể gửi OTP. Vui lòng thử lại.');
                                }
                            },
                            error: function (err) {
                                hideLoader()
                                console.log(err)
                                alert('Có lỗi xảy ra khi gửi OTP. Vui lòng thử lại.');
                            }
                        });
                    });

                    // Xác thực OTP
                    $('#verify-otp-btn').on('click', function () {
                        const otp = $('#otp-input').val();

                        $.ajax({
                            url: '{{ route("otp.verify") }}', // API xác thực OTP
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                otp: otp
                            },
                            success: function (response) {
                                if (response.success) {
                                    isOtpVerified = true;
                                    // OTP xác thực thành công, gửi form
                                    $('#adu')[0].submit(); // Gửi form rút tiền thực tế
                                    $('#otpModal').modal('hide'); // Ẩn modal OTP
                                } else {
                                    $('#otp-error').show(); // Hiển thị lỗi nếu OTP sai
                                }
                            },
                            error: function (err) {
                                hideLoader()
                                console.log(err)
                                alert('OTP không khớp, vui lòng thử lại.');
                            }
                        });
                    });

// Lắng nghe sự kiện đóng modal OTP
                    $('#otpModal').on('hidden.bs.modal', function () {
                        if (!isOtpVerified) {
                            clearInterval(countdownTimer);
                            // Gửi yêu cầu API đến server để xóa OTP trong session
                            $.ajax({
                                url: '/admin/otp/remove', // URL của API xóa OTP
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}' // CSRF token cho bảo mật
                                },
                                success: function (response) {
                                    hideLoader()
                                    if (response.success) {
                                        alert('Yêu cầu rút tiền không thành công, vui lòng thao tác lại.')
                                        console.log(response.message);  // Thông báo đã xóa OTP
                                    } else {
                                        console.log('Có lỗi xảy ra khi xóa OTP');
                                    }
                                },
                                error: function (err) {
                                    hideLoader()
                                    console.log('Lỗi:', err);
                                }
                            });
                        }
                    });
                });
            </script>


            <div class="row mt-3">

                <div class="col-lg-12">
                    <div class="card border-1">
                        <div class="card-header">
                            <h4 class="card-title mb-0 flex-grow-1">Lịch sử rút tiền</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="table-gridjs"></div>

                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->

            </div>


        </div>
    </div>

    <div id="detailsModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chi tiết yêu cầu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Nội dung modal -->
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>Mã yêu cầu</th>
                            <td id="modalMaYeuCau"></td>
                        </tr>
                        <tr>
                            <th>Ngày tạo</th>
                            <td id="modalCreatedAt"></td>
                        </tr>
                        <tr>
                            <th>Số tiền rút</th>
                            <td id="modalSoTien"></td>
                        </tr>
                        <tr>
                            <th>Trạng thái</th>
                            <td id="modalTrangThai"></td>
                        </tr>
                        <tr>
                            <th>Tên ngân hàng</th>
                            <td id="modalTenNganHang"></td>
                        </tr>
                        <tr>
                            <th>Số tài khoản</th>
                            <td id="modalSoTaiKhoan"></td>
                        </tr>
                        <tr>
                            <th>Tên chủ tài khoản</th>
                            <td id="modalTenChuTaiKhoan"></td>
                        </tr>
                        <tr>
                            <th>Ghi chú</th>
                            <td id="modalGhiChu"></td>
                        </tr>
                        <tr id="image_x" style="display: none">
                            <th id="titl">Ảnh</th>
                            <td>
                                <img id="modalAnhQR" src="" alt="Ảnh QR" style="max-width: 200px;">
                            </td>
                        </tr>
                        <tr id="ly_do_tu_choi" style="display: none">
                            <th>Lý do từ chối</th>
                            <td id="modalReason">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button onclick="huyYeuCauRut(this.getAttribute('data-id'))" type="button" style="display: none"
                            id="destroyRq" class="btn btn-danger" data-id="" data-bs-dismiss="modal">Hủy yêu cầu
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script>
        function huyYeuCauRut(id) {
            if (confirm('Bạn chắc chứ ?')) {
                fetch(`/api/rut-tien/huy-yeu-cau/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        // Laravel CSRF token
                    },
                })
                    .then(response => {
                        return response.json()
                    })
                    .then(data => {
                        if (data.success) {
                            alert('Bạn đã hủy yêu cầu rút tiền')
                            window.location.reload();
                        } else {
                            alert('Có lỗi xảy ra, vui lòng thử lại sau ít phút.')
                        }
                    })
            }
        }

        function showDetails(id) {
            // Hiển thị thông báo đang tải dữ liệu
            document.getElementById('modalMaYeuCau').textContent = 'Đang tải...';
            document.getElementById('modalCreatedAt').textContent = 'Đang tải...';
            document.getElementById('modalSoTien').textContent = 'Đang tải...';
            document.getElementById('modalTrangThai').textContent = 'Đang tải...';
            document.getElementById('modalTenNganHang').textContent = 'Đang tải...';
            document.getElementById('modalSoTaiKhoan').textContent = 'Đang tải...';
            document.getElementById('modalTenChuTaiKhoan').textContent = 'Đang tải...';
            document.getElementById('modalGhiChu').textContent = 'Đang tải...';
            document.getElementById('modalAnhQR').src = '';
            document.getElementById('modalReason').textContent = 'Đang tải...';

            // Gửi yêu cầu AJAX
            fetch(`/api/rut-tien/${id}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Không thể tải dữ liệu');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('modalMaYeuCau').textContent = data.ma_yeu_cau || 'N/A';
                    document.getElementById('modalCreatedAt').textContent = data.created_at || 'N/A';
                    document.getElementById('modalSoTien').textContent = data.so_tien || 'N/A';
                    switch (data.trang_thai) {
                        case 'da_duyet':
                            document.getElementById('modalTrangThai').textContent = 'Đã duyệt' || 'N/A';
                            break;
                        case 'da_huy':
                            document.getElementById('modalTrangThai').textContent = 'Đã từ chối' || 'N/A';
                            break;
                        default:
                            document.getElementById('modalTrangThai').textContent = 'Đang xử lý' || 'N/A';
                            break
                    }

                    document.getElementById('modalTrangThai').style.color = (data.trang_thai === 'da_duyet') ? 'green' : 'red'
                    document.getElementById('modalTenNganHang').textContent = data.ten_ngan_hang || 'N/A';
                    document.getElementById('modalSoTaiKhoan').textContent = data.so_tai_khoan || 'N/A';
                    document.getElementById('modalTenChuTaiKhoan').textContent = data.ten_chu_tai_khoan || 'N/A';
                    document.getElementById('modalGhiChu').textContent = data.ghi_chu || 'Không có';
                    if (data.trang_thai === 'da_duyet') {
                        document.getElementById('modalAnhQR').src = data.anh_ket_qua || '';
                        document.getElementById('titl').textContent = 'Ảnh xác nhận giao dịch'
                        document.getElementById('image_x').style.display = '';
                    } else if (data.trang_thai === 'da_huy') {
                        document.getElementById('ly_do_tu_choi').style.display = '';
                        document.getElementById('modalReason').textContent = data.ly_do_tu_choi
                        document.getElementById('modalReason').style.color = 'red'
                        document.getElementById('modalAnhQR').src = data.anh_qr || '';
                        document.getElementById('titl').textContent = 'Mã qr'
                        document.getElementById('image_x').style.display = '';
                    } else {
                        document.getElementById('modalAnhQR').src = data.anh_qr || '';
                        document.getElementById('titl').textContent = 'Mã qr'
                        document.getElementById('image_x').style.display = '';
                        document.getElementById('modalTrangThai').textContent = 'Đang xử lý' || 'N/A';
                        document.getElementById('modalTrangThai').style.color = 'blue';

                        document.getElementById('destroyRq').setAttribute('data-id', data.id)
                        document.getElementById('destroyRq').style.display = '';
                    }
                })
                .catch(error => {
                    console.error(error);
                    alert('Có lỗi xảy ra. Vui lòng thử lại sau!');
                });

            // Hiển thị modal
            const modal = new bootstrap.Modal(document.getElementById('detailsModal'));
            modal.show();
        }
    </script>

@endsection
@push('styles')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
    <!-- Add Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
@endpush
@push('scripts')
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dataFromController = @json($dataForGridJs);

            const grid = new gridjs.Grid({
                columns: [
                    {
                        hidden: true,
                    },
                    {
                        name: "Ngày yêu cầu",
                        width: "auto",
                        formatter: function (cell, row) {
                            var date = new Date(cell);
                            return gridjs.html(
                                `<div>
                                    <span>${date.getHours()}:${date.getMinutes()} ${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}</span><br>
                                    <a href="#" onclick="showDetails(${row.cells[0].data})" >Chi tiết</a>
                                </div>
                                `
                            );
                        }
                    },
                    {
                        name: "Số tiền rút",
                        width: "auto"
                    },
                    {
                        name: "Trạng thái",
                        width: "auto",
                        formatter: function (cell) {
                            let label = "";
                            let style = "";


                            switch (cell) {
                                case 'dang_xu_ly':
                                    label = "Đang xử lý";
                                    style =
                                        "background-color: #ffa500;";
                                    break;
                                case 'da_huy':
                                    label = "Đã bị hủy";
                                    style =
                                        "background-color: red;";
                                    break;
                                case 'da_duyet':
                                    label = "Thành công";
                                    style =
                                        "background-color: green;";
                                    break;
                            }

                            return gridjs.html(`<span id="statusOfRq" class="" style="${style} color: white;padding: 5px 5px; border-radius: 4px;">${label}</span>`);
                        }
                    }
                ],
                data: dataFromController.map(function (item) {
                    return [
                        item.id,
                        item.created_at,
                        item.so_tien,
                        item.trang_thai,
                    ];
                }),
                sort: true,
                search: true,
                pagination: {
                    limit: 5
                },
                language: {
                    'search': {
                        'placeholder': 'Tìm kiếm...'
                    },
                }
            });

            grid.render(document.getElementById("table-gridjs"));
        });

    </script>
    <button type="button" class="btn btn-primary ms-2" onclick="checkSD()">Rút tiền</button>

    <script>
        function checkSD() {
            $.ajax({
                url: '{{ route("withdraw.checkSD") }}',
                type: 'GET',
                success: function (response) {
                    if (!response.success) {
                        alert(response.message);
                    } else {
                        $('#withdrawModal').modal('show');
                    }
                },
                error: function () {
                    alert('Có lỗi xảy ra, vui lòng thử lại.');
                }
            });
        }

        // xem trước ảnh qr
        function previewQRCode(event) {
            const file = event.target.files[0];
            const previewContainer = document.getElementById('qr-code-preview');
            const previewImage = document.getElementById('preview-image');

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'block';
                    const currentQRCode = document.getElementById('current-qr-code');
                    if (currentQRCode) {
                        currentQRCode.style.display = 'none';
                    }
                };
                reader.readAsDataURL(file);
            } else {
                previewContainer.style.display = 'none';
                previewImage.src = '';
                const currentQRCode = document.getElementById('current-qr-code');
                if (currentQRCode) {
                    currentQRCode.style.display = 'block';
                }
            }
        }
    </script>

    @if(session('error'))
        <script>
            alert('{{ session('error') }}');
        </script>
    @endif

@endpush
