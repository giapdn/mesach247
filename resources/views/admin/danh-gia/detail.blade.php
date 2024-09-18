@extends('admin.layouts.app')
@section('start-point')
    Quản lý đánh giá
@endsection
@section('title')
    Quản lý đánh giá
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-3">
            <div class="card">
                <div class="card-body text-center">
                    <!-- Ảnh thay thế -->
                    <div class="mb-2">
                        <img src="{{ asset('assets/admin/images/users/avatar-2.jpg') }}" alt="Ảnh Sản Phẩm" class="img-fluid" style="max-width: 200px;">
                    </div>

                    <!-- Tên sản phẩm dưới chân ảnh -->
                    <h5 class="fs-14 mb-4">Tên Sách</h5>

                    <!-- Nút Xem Sản Phẩm -->
                    <a href="#" class="btn btn-primary">Xem Sách</a>
                </div>
            </div>


            <!--end card-->
            <div class="card mb-3">
                <div class="card-body">
                    <div class="table-card">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td class="fw-medium">Mức Độ</td>
                                    <td class="fw-medium">Số Lượt Đánh Giá</td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-success text-white w-50">Rất hay</span></td>
                                    <td>120</td> <!-- Thay số lượng đánh giá thực tế tại đây -->
                                </tr>
                                <tr>
                                    <td><span class="badge bg-primary text-white w-50">Hay</span></td>
                                    <td>85</td> <!-- Thay số lượng đánh giá thực tế tại đây -->
                                </tr>
                                <tr>
                                    <td><span class="badge bg-warning text-dark w-50">Trung bình</span></td>
                                    <td>40</td> <!-- Thay số lượng đánh giá thực tế tại đây -->
                                </tr>
                                <tr>
                                    <td><span class="badge bg-danger text-white w-50">Tệ</span></td>
                                    <td>15</td> <!-- Thay số lượng đánh giá thực tế tại đây -->
                                </tr>
                                <tr>
                                    <td><span class="badge bg-dark text-white w-50">Rất tệ</span></td>
                                    <td>5</td> <!-- Thay số lượng đánh giá thực tế tại đây -->
                                </tr>
                            </tbody>
                        </table>
                        <!--end table-->
                    </div>
                </div>
            </div>

        </div>
        <!---end col-->
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted">
                        <div class="position-absolute top-0 end-0 p-3">
                            <span class="badge bg-success text-white p-3">Rất hay</span>
                        </div>
                        <h6 class="mb-3 fw-semibold text-uppercase">Thông Tin Người Đánh Giá</h6>
                        <p><strong>Họ Tên:</strong> John Doe</p>
                        <p><strong>Số Điện Thoại:</strong> +123 456 7890</p>
                        <p><strong>Email:</strong> johndoe@example.com</p>
                        <p><strong>Ngày Đánh Giá:</strong> 15 Tháng 9, 2024</p>

                        <h6 class="mb-3 fw-semibold text-uppercase">Nội Dung Đánh Giá</h6>
                        <p>Sản phẩm này vượt quá mong đợi của tôi! Thiết kế đẹp mắt và hiệu năng xuất sắc. Rất khuyến khích mọi người sử dụng!</p>

                        <h6 class="mb-3 fw-semibold text-uppercase">Hình Ảnh Đánh Giá</h6>
                        <div class="review-images">
                            <img src="{{ asset('assets/admin/images/users/avatar-2.jpg') }}" alt="Hình Đánh Giá 1" class="img-fluid mb-2" style="max-width: 100px; max-height: 100px;">
                            <img src="{{ asset('assets/admin/images/users/avatar-2.jpg') }}" class="img-fluid mb-2" style="max-width: 100px; max-height: 100px;">
                        </div>
                    </div>

                    <!-- Nút Liên Hệ Khách Hàng -->
                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-primary">Liên Hệ Khách Hàng</a>
                    </div>
                </div>
            </div>


            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <div>
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#reviews" role="tab">
                                    Đánh giá khác của khách hàng (3)
                                </a>
                            </li>
                        </ul>
                        <!--end nav-->
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="reviews" role="tabpanel">
                            <div class="table-responsive table-card">
                                <table class="table table-borderless align-middle mb-0">
                                    <thead class="table-light text-muted">
                                        <tr>
                                            <th scope="col">Tên sách</th>
                                            <th scope="col">Đánh giá</th>
                                            <th scope="col">Nhận xét</th>
                                            <th scope="col">Ngày</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h6 class="fs-15 mb-0">ABCXYZ</h6>
                                            </td>
                                            <td>
                                                <span class="badge bg-success w-60">Rất hay</span>
                                            </td>
                                            <td>Sản phẩm tuyệt vời! Nó thực sự giúp tôi rất nhiều.</td>
                                            <td>15 Tháng 9, 2024</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" class="btn btn-light btn-icon"
                                                       id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="true">
                                                        <i class="ri-equalizer-fill"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="dropdownMenuLink1">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-eye-fill me-2 align-middle text-muted"></i>Xem</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Xóa</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="fs-15 mb-0">ABCXYZ</h6>
                                            </td>
                                            <td>
                                                <span class="badge bg-primary w-60">Hay</span>
                                            </td>
                                            <td>Giá trị tốt so với mức giá. Tôi sẽ giới thiệu!</td>
                                            <td>10 Tháng 9, 2024</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" class="btn btn-light btn-icon"
                                                       id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="true">
                                                        <i class="ri-equalizer-fill"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="dropdownMenuLink2">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-eye-fill me-2 align-middle text-muted"></i>Xem</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Xóa</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6 class="fs-15 mb-0">ABCXYZ</h6>
                                            </td>
                                            <td>
                                                <span class="badge bg-warning w-60">Trung bình</span>
                                            </td>
                                            <td>Sản phẩm bình thường, tôi mong đợi nhiều hơn.</td>
                                            <td>05 Tháng 9, 2024</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" class="btn btn-light btn-icon"
                                                       id="dropdownMenuLink3" data-bs-toggle="dropdown" aria-expanded="true">
                                                        <i class="ri-equalizer-fill"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="dropdownMenuLink3">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-eye-fill me-2 align-middle text-muted"></i>Xem</a>
                                                        </li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                                    class="ri-delete-bin-5-line me-2 align-middle text-muted"></i>Xóa</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                        </div>
                    </div>
                    <!--end tab-content-->
                </div>
            </div>


            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->


@endsection

@push('styles')
    <style>
        .card {
            border: 1px solid #dee2e6;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
@endpush
