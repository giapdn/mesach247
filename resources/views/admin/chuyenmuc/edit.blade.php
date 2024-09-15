@extends('admin.layouts.app')

@section('start-point')
    Quản lý chuyên mục
@endsection

@section('title')
    Sửa chuyên mục
@endsection

@section('content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('chuyenmuc.update', $chuyenMuc->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Mã chuyên mục (ID) -->
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="idInput" class="form-label">Mã chuyên mục</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" id="idInput" value="{{ $chuyenMuc->id }}" readonly>
                    </div>
                </div>
                
                <!-- Tên chuyên mục -->
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="nameInput" class="form-label">Tên chuyên mục</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" id="nameInput" name="ten_chuyen_muc" value="{{ $chuyenMuc->ten_chuyen_muc }}" required>
                    </div>
                </div>
                
                <!-- Chuyên mục cha ID -->
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="parentIdInput" class="form-label">Chuyên mục cha ID</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="number" class="form-control" id="parentIdInput" name="chuyen_muc_cha_id" value="{{ $chuyenMuc->chuyen_muc_cha_id }}">
                    </div>
                </div>
                
                <!-- Nút sửa -->
                <div class="text-center">
                    <button type="submit" class="btn btn-warning">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<!-- Bạn có thể thêm các styles cần thiết ở đây -->
@endpush

@push('scripts')
<!-- Bạn có thể thêm các scripts cần thiết ở đây -->
@endpush
