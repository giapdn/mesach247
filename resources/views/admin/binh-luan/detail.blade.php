@extends('admin.layouts.app')
@section('start-point')
    Quản lý bình luận
@endsection
@section('title')
    Chi tiết bình luận
@endsection
@section('content')
    <div class="row">
        <div class="col-xxl-3">
            <div class="card">
                <div class="card-body text-center">
                    <!-- Ảnh bài viết -->
                    <div class="mb-2">
                        <img src="{{ Storage::url($binhLuan->baiViet->hinh_anh) }}" alt="Ảnh Bài Viết" class="img-fluid"
                            style="max-width: 250px;">
                    </div>

                    <!-- Tên sản phẩm dưới chân ảnh -->
                    <h5 class="fs-14 mb-4">{{ $binhLuan->baiViet->tieu_de }}</h5>

                    <!-- Nút Xem Bài Viết -->
                    <a href="{{ route('bai-viet.show', $binhLuan->bai_viet_id) }}" class="btn btn-primary">Xem Bài Viết</a>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body text-center">
                    <h6 class=" fw-semibold">Tổng số bình luận: {{ $tongBinhLuan }}</h6>
                    <!--end table-->
                </div>
            </div>



        </div>
        <!---end col-->
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-header">
                    <h6 class="fw-semibold text-uppercase">Thông Tin Người Bình Luận</h6>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Họ tên</th>
                                <th>Điện thoại</th>
                                <th>Email</th>
                                <th>Trạng thái</th>
                                <th>Ngày bình luận</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $binhLuan->user->ten_doc_gia }}</td>
                                <td>{{ $binhLuan->user->so_dien_thoai }}</td>
                                <td>{{ $binhLuan->user->email }}</td>
                                <td><span class="badge fs-6 {{$binhLuan->trang_thai === 'hien' ? 'bg-success' : 'bg-danger'}}">{{ $binhLuan->trang_thai === 'hien' ? 'Hiển thị' : 'Ẩn' }}</span></td>
                                <td>{{ \Carbon\Carbon::parse($binhLuan->created_at)->translatedFormat('d \T\h\á\n\g m, Y') }}</td>
                            </tr>
                        </tbody>

                    </table>
                    <div class="card">
                        <div class="card-header">
                            <h6 class="fw-semibold text-uppercase">Nội Dung Bình Luận</h6>

                        </div>
                        <div class="card-body">
                            <p>{{ $binhLuan->noi_dung }}</p>
                        </div>
                    </div>

                    <!-- Nút Liên Hệ Khách Hàng -->
                    {{--                    <div class="text-center mt-4"> --}}
                    {{--                        <a href="#" class="btn btn-primary">Liên Hệ Khách Hàng</a> --}}
                    {{--                    </div> --}}
                </div>
            </div>


            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <div>
                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#reviews" role="tab">
                                    Bình luận khác của khách hàng ({{ $danhGiaKhac->count() }})
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
                                            <th scope="col">Độc giả</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Nội dung</th>
                                            <th scope="col">Ngày bình luận</th>
                                            <th scope="col">Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($danhGiaKhac as $danhgia)
                                            <tr>
                                                <td>
                                                    <h6 class="fs-15 mb-0">{{ $danhgia->user->ten_doc_gia }}</h6>
                                                </td>
                                                <td>
                                                    @if ($danhgia->trang_thai == 'hien')
                                                        <span class="badge fs-6 bg-success w-60">Hiện</span>
                                                    @else
                                                        <span class="badge fs-6 bg-danger w-60">Ẩn</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @php
                                                        $tu = explode(' ', $danhgia->noi_dung);
                                                        $tuHienThi = array_slice($tu, 0, 10);
                                                        $noiDungHienThi = implode(' ', $tuHienThi);
                                                    @endphp

                                                    <span class="noi-dung">{{ $noiDungHienThi }}...</span>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($danhgia->created_at)->format('d/m/Y') }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="javascript:void(0);" class="btn btn-light btn-icon"
                                                            id="dropdownMenuLink3" data-bs-toggle="dropdown"
                                                            aria-expanded="true">
                                                            <i class="ri-equalizer-fill"></i>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="dropdownMenuLink3">
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('binh-luan.detail', $danhgia->id) }}"><i
                                                                        class="ri-eye-fill me-2 align-middle text-muted"></i>Xem</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
@endpush

@push('scripts')
@endpush
