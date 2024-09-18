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
            <form id="editChuyenMucForm" action="{{ route('chuyenmuc.update', $chuyenMuc->id) }}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" id="nameInput" name="ten_chuyen_muc" value="{{ $chuyenMuc->ten_chuyen_muc }}">
                        <div id="nameInput_error" class="text-danger" style="display: none;">Tên chuyên mục không được để trống.</div>
                    </div>
                </div>
                
                <!-- Chuyên mục cha ID -->
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="parentIdInput" class="form-label">Chuyên mục cha ID</label>
                    </div>
                    <div class="col-lg-9">
                        <input type="number" class="form-control" id="parentIdInput" name="chuyen_muc_cha_id" value="{{ $chuyenMuc->chuyen_muc_cha_id }}">
                        <div id="parentIdInput_error" class="text-danger" style="display: none;"></div>
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
<script>
document.getElementById('editChuyenMucForm').addEventListener('submit', function(event) {
    var isValid = true;

    // Xóa thông báo lỗi cũ
    document.getElementById('nameInput_error').style.display = 'none';
    document.getElementById('parentIdInput_error').style.display = 'none';

    // Lấy giá trị từ các trường
    var tenChuyenMuc = document.getElementById('nameInput').value.trim();
    var chuyenMucChaId = document.getElementById('parentIdInput').value.trim();

    // Kiểm tra tên chuyên mục
    if (tenChuyenMuc === '') {
        document.getElementById('nameInput_error').style.display = 'block';
        isValid = false;
    }

    // Kiểm tra chuyên mục cha ID (nếu có)
    if (chuyenMucChaId !== '' && isNaN(chuyenMucChaId)) {
        document.getElementById('parentIdInput_error').textContent = 'Chuyên mục cha ID phải là số.';
        document.getElementById('parentIdInput_error').style.display = 'block';
        isValid = false;
    }

    // Nếu không hợp lệ, ngăn gửi form
    if (!isValid) {
        event.preventDefault();
    }
});
</script>
@endpush
