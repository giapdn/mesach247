@extends('admin.layouts.app')

@section('start-point')
    Quản lý bài viết
@endsection

@section('title')
    Danh sách bài viết
@endsection

@section('content')
    <div class="row">
        <!-- Form thêm bài viết -->
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="fs-16">Thêm bài viết mới</h5>
                </div>
                <div class="card-body">
                    <form id="postForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="chuyen_muc_id" class="form-label">Chuyên mục</label>
                            <select class="form-select" id="chuyen_muc_id" name="chuyen_muc_id">
                                <option value="">Chọn chuyên mục</option>
                            </select>
                            <div id="chuyen_muc_id_error" class="text-danger error" style="display: none;"></div>
                        </div>
                        <div class="mb-3">
                            <label for="hinh_anh" class="form-label">Hình ảnh</label>
                            <input type="file" class="form-control" id="hinh_anh" name="hinh_anh">
                            <div id="hinh_anh_error" class="text-danger error" style="display: none;"></div>
                        </div>
                        <div class="mb-3">
                            <label for="tieu_de" class="form-label">Tiêu đề</label>
                            <input type="text" class="form-control" id="tieu_de" name="tieu_de" placeholder="Nhập tiêu đề">
                            <div id="tieu_de_error" class="text-danger error" style="display: none;"></div>
                        </div>
                        <div class="mb-3">
                            <label for="noi_dung" class="form-label">Nội dung</label>
                            <textarea class="form-control" id="noi_dung" name="noi_dung" rows="3" placeholder="Nhập nội dung"></textarea>
                            <div id="noi_dung_error" class="text-danger error" style="display: none;"></div>
                        </div>
                        <div class="mb-3">
                            <label for="ngay_dang" class="form-label">Ngày đăng</label>
                            <input type="date" class="form-control" id="ngay_dang" name="ngay_dang">
                            <div id="ngay_dang_error" class="text-danger error" style="display: none;"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm bài viết</button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Bảng hiển thị bài viết -->
        <div class="col-xl-9 col-lg-8">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Danh sách bài viết</h4>
                        <a href="{{ route('bai-viet.add') }}" class="btn btn-success">
                            <i class="ri-add-line align-bottom me-1"></i> Thêm bài viết mới
                        </a>
                    </div>
                    <div class="card-body">
                        <div id="table-gridjs"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
@endpush
@php
    $data = $baiViets->map(function ($baiViet) {
        return [
            $baiViet->id,
            $baiViet->user_id,
            $baiViet->chuyen_muc_id,
            $baiViet->hinh_anh,
            $baiViet->tieu_de,
            $baiViet->noi_dung,
            $baiViet->ngay_dang ? $baiViet->ngay_dang->format('Y-m-d') : 'Chưa có',
        ];
    });
@endphp
@push('scripts')
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>
    <script>
        document.getElementById("table-gridjs") && new gridjs.Grid({
            columns: [
                { 
                    name: "ID", 
                    width: "80px", 
                    formatter: (cell, row) => {
                        return gridjs.html(`
                            <div class="d-flex flex-column align-items-center">
                                <span class="fw-semibold">${cell}</span>
                                <div class="mt-2">
                                    <a href="/bai-viet/${cell}/edit" class="btn btn-link p-0">Sửa</a>
                                    <a href="/bai-viet/${cell}/detail" class="btn btn-link p-0">Xem</a>
                                    <a href="/bai-viet/${cell}/delete" class="btn btn-link p-0 text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa bài viết này?') && deletePost(${cell})">Xóa</a>
                                </div>
                            </div>
                        `);
                    }
                },
                { name: "ID User", width: "100px" },
                { name: "ID Chuyên mục", width: "120px" },
                { name: "Hình ảnh", width: "100px", formatter: (e) => gridjs.html(`<img src="${e}" alt="" width="50px">`) },
                { name: "Tiêu đề", width: "200px" },
                { name: "Nội dung", width: "300px" },
                { name: "Ngày đăng", width: "120px" }
            ],
            pagination: { limit: 5 },
            sort: true,
            search: true,
            data: {!! json_encode($data) !!}
        }).render(document.getElementById("table-gridjs"));

    </script>
    <script>
        document.getElementById('postForm').addEventListener('submit', function(event) {
            var isValid = true;

            // Clear old error messages
            clearErrors();

            // Get values from fields
            var chuyenMucId = document.getElementById('chuyen_muc_id').value.trim();
            var hinhAnh = document.getElementById('hinh_anh').files.length; // Number of files selected
            var tieuDe = document.getElementById('tieu_de').value.trim();
            var noiDung = document.getElementById('noi_dung').value.trim();
            var ngayDang = document.getElementById('ngay_dang').value.trim();

            // Validate Chuyên mục
            if (chuyenMucId === '') {
                showError('chuyen_muc_id_error', 'Bạn phải chọn chuyên mục.');
                isValid = false;
            }

            // Validate Hình ảnh
            if (hinhAnh === 0) {
                showError('hinh_anh_error', 'Bạn phải chọn hình ảnh.');
                isValid = false;
            }

            // Validate Tiêu đề
            if (tieuDe === '') {
                showError('tieu_de_error', 'Tiêu đề không được để trống.');
                isValid = false;
            }

            // Validate Nội dung
            if (noiDung === '') {
                showError('noi_dung_error', 'Nội dung không được để trống.');
                isValid = false;
            }

            // Validate Ngày đăng
            if (ngayDang === '') {
                showError('ngay_dang_error', 'Ngày đăng không được để trống.');
                isValid = false;
            }

            // Prevent form submission if invalid
            if (!isValid) {
                event.preventDefault();
            }
        });

        function showError(id, message) {
            var errorElement = document.getElementById(id);
            if (errorElement) {
                errorElement.textContent = message;
                errorElement.style.display = 'block';
            }
        }

        function clearErrors() {
            var errorElements = document.querySelectorAll('.error');
            errorElements.forEach(function(element) {
                element.style.display = 'none';
            });
        }
    </script>
@endpush
