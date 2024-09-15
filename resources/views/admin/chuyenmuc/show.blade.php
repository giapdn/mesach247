@extends('admin.layouts.app')

@section('start-point')
    Quản lý chuyên mục
@endsection

@section('title')
    Chi tiết chuyên mục
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row gx-lg-5">
                        <div class="col-xl-12">
                            <div class="mt-xl-0 mt-5">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h4>{{ $chuyenMuc->ten_chuyen_muc }}</h4>
                                        <div class="hstack gap-3 flex-wrap">
                                            <div class="vr"></div>
                                            <div class="text-muted">ID: <span class="text-body fw-medium">{{ $chuyenMuc->id }}</span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Tên chuyên mục: <span class="text-body fw-medium">{{ $chuyenMuc->ten_chuyen_muc }}</span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Chuyên mục cha ID: <span class="text-body fw-medium">{{ $chuyenMuc->chuyen_muc_cha_id ?? 'Không' }}</span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Ngày tạo: <span class="text-body fw-medium">{{ $chuyenMuc->created_at }}</span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Ngày cập nhật: <span class="text-body fw-medium">{{ $chuyenMuc->updated_at }}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
