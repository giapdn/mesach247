@extends('admin.layouts.app')
@section('start-point')
    Quản lý yêu cầu
@endsection
@section('title')
    Chi tiết yêu cầu
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-xxl-9">
            <div class="card" id="demo">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-header border-bottom-dashed p-4 ">

                            <div class="card-body bg-light p-4 ribbon-box">
                                <div style="padding-left: 86%"
                                     class="ribbon-three {{ $kiemDuyet->trang_thai == 'duyet'
                                        ? 'ribbon-three-success text-light'
                                        : ($kiemDuyet->trang_thai == 'chua_ho_tro'
                                            ? 'ribbon-three-warning text-light'
                                            : ($kiemDuyet->trang_thai == 'tu_choi'
                                                ? 'ribbon-three-danger text-light'
                                                : 'ribbon-three-secondary text-light')) }}">
                                    <span style="font-size: 0.85em;">
                                        {{ $kiemDuyet->trang_thai == 'duyet'
                                            ? 'Đã Duyệt'
                                            : ($kiemDuyet->trang_thai == 'chua_ho_tro'
                                                ? 'Chưa Xử Lý'
                                                : ($kiemDuyet->trang_thai == 'tu_choi'
                                                    ? 'Đã Từ Chối'
                                                    : 'Không xác định')) }}
                                    </span>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <div>
                                        <div>
                                            <span style="font-size: 1.2em; font-weight: bold;">Tên Khách Hàng: </span>
                                            <span style="font-size: 1.2em; color: red;font-weight: bold;">
                                                {{ $kiemDuyet->ten_doc_gia }}</span>
                                        </div>

                                        <div style="font-size: 1.1em; margin-top: 10px;">Ngày tạo:
                                            {{ $kiemDuyet->created_at->format('d/m/Y') }}</div>
                                    </div>


                                </div>
                            </div>
                        </div>


                    </div><!--end col-->
                    <div class="container ps-5 pe-5 ">
                        <div class="row">
                            <!-- Card cho thông tin sách và ảnh -->
                            <div class="col-md-12">
                                <div class="card mb-3 bg-light">
                                    <div class="row g-0">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        @if ($kiemDuyet->cmnd_mat_truoc)
                                                            <img src="{{ Storage::url($kiemDuyet->cmnd_mat_truoc) }}" alt="Ảnh CMND Mặt Trước"
                                                                 class="img-fluid"
                                                                 style="max-width: 100%; border-radius: 10px;">
                                                        @endif

                                                        @if ($kiemDuyet->cmnd_mat_sau)
                                                            <img src="{{ Storage::url($kiemDuyet->cmnd_mat_sau) }}" alt="Ảnh CMND Mặt Sau"
                                                                 class="img-fluid"
                                                                 style="max-width: 100%; border-radius: 10px;">
                                                        @endif
                                                    </div>

                                                    <div class="col-sm-7">
                                                        <h4 style="font-weight: bold;">Chi tiết yêu cầu</h4>

                                                        <p class="mt-4" style="font-size: 15px;">Tên khách hàng:
{{--                                                            <span style="color: #007bff;"><a href="{{ route('chi-tiet-ctv', $kiemDuyet->user->id) }}">--}}
{{--                                                                    {{ $kiemDuyet->ten_doc_gia }}</a></span>--}}
                                                            {{ $kiemDuyet->ten_doc_gia }}
                                                        </p>

                                                        <p class="no-dots" style="font-size: 15px;">Email:
                                                            {{ $kiemDuyet->email }}</p>
                                                        </p>
                                                        <p class="no-dots" style="font-size: 15px;">Số điện thoại:
                                                            {{ $kiemDuyet->so_dien_thoai }}
                                                        </p>
                                                        <p class="no-dots" style="font-size: 15px;">
                                                            Ngày tháng năm sinh: {{ \Carbon\Carbon::parse($kiemDuyet->sinh_nhat)->format('d/m/Y') }}
                                                        </p>
                                                        <p class="no-dots" style="font-size: 15px;">Giới tính:
                                                            {{ $kiemDuyet->gioi_tinh }}</p>
                                                        </p>
                                                        <p class="no-dots" style="font-size: 15px;">Địa chỉ:
                                                            {{ $kiemDuyet->dia_chi }}</p>
                                                        </p>

                                                        <p class="no-dots" style="font-size: 15px;">
                                                            CV ứng viên:
                                                            <a href="{{ asset('storage/' . $kiemDuyet->cv_pdf) }}" target="_blank"> Xem tại đây</a>
                                                        </p>
                                                        <p class="no-dots" style="font-size: 15px;">
                                                            Ghi chú:
                                                            @if (!empty($kiemDuyet->ghi_chu))
                                                                {{ $kiemDuyet->ghi_chu }}
                                                            @else
                                                                Không có ghi chú
                                                            @endif
                                                        </p>
                                                        <hr>

                                                        <style>
                                                            p.no-dots::before {
                                                                content: '•';
                                                                color: #28a745;
                                                                /* Màu xanh lá */
                                                                font-size: 20px;
                                                                /* Lớn hơn một chút so với chữ để nổi bật */
                                                                padding-right: 10px;
                                                                /* Khoảng cách giữa ba chấm và văn bản */
                                                                vertical-align: middle;
                                                                /* Căn chỉnh chấm sao cho phù hợp với đường base của text */
                                                            }
                                                        </style>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div><!--end row-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
    </div>
    <!--end row-->
@endsection

@push('scripts')
    <script src="{{ asset('assets/admin/js/pages/invoicedetails.js') }}"></script>
@endpush
