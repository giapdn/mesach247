@extends('admin.layouts.app')
@section('start-point')
    Quản lý banner
@endsection
@section('title')
    Chi tiết banner
@endsection

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="websiteUrl" class="form-label">Ảnh Banner:</label>
                        </div>
                        <div class="col-lg-9">
                            <img src="{{ asset('storage/' . $banner->hinh_anh) }}" alt="Banner Image" width="200px"
                                height="100px">

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="timeInput" class="form-label">Nội dung:</label>
                        </div>

                        <div class="col-lg-9">
                            <textarea class="form-control" rows="5" readonly>{{ $banner->noi_dung }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="loaiBanner" class="form-label">Loại Banner:</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="loaiBanner" value="{{ $banner->loai_banner }}"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="loaiBanner" class="form-label">Trạng thái:</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="loaiBanner" 
                                   value="{{ $banner->trang_thai === 'hien' ? 'Hiển thị' : 'Ẩn' }}" readonly>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('banner.index') }}" class="btn btn-sm btn-primary">Quay lại</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
