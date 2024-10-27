@extends('admin.layouts.app')
@section('start-point')
    Quản lý sách
@endsection
@section('title')
    Sửa
@endsection
@section('content')
    <div class="row">
        <div class="card-header">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <div class="card">
                        <div class="card-body">

                            <h5>Sửa chương sách: {{ $sach->ten_sach }}</h5>
                            <!-- Thông báo khi thêm thành công -->
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="ri-notification-off-line label-icon"></i>
                                    <strong class="fs-5">{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif

                            <!-- Thông báo khi thêm thất bại -->
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="ri-error-warning-line label-icon"></i>
                                    <strong class="fs-5">Thất bại</strong>
                                    <strong class="d-block">Vui lòng kiểm tra các lỗi sau:</strong>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="createproduct-form" autocomplete="off" class="needs-validation" novalidate
                  action="{{ route('chuong.update', [$sach->id, $chuong->id]) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Thông tin chính</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-name-input">Số chương</label>
                                            <input type="text" name="so_chuong"
                                                   value="{{ old('so_chuong', $chuong->so_chuong) }}"
                                                   class="form-control @error('so_chuong') is-invalid @enderror"
                                                   id="manufacturer-name-input" placeholder="Nhập chương số...">
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="mb-3">
                                            <label class="form-label" for="manufacturer-brand-input">Tiêu đề</label>
                                            <input type="text" name="tieu_de"
                                                   value="{{ old('tieu_de', $chuong->tieu_de) }}"
                                                   class="form-control @error('tieu_de') is-invalid @enderror"
                                                   id="manufacturer-brand-input" placeholder="Nhập tiêu đề chương">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Nội dung chương</h5>
                            </div>
                            <div class="card-body">
                                <textarea id="ckeditor-classic" name="noi_dung"
                                          class="form-control @error('noi_dung') is-invalid @enderror">{{ old('noi_dung', $chuong->noi_dung) }}</textarea>
                            </div>
                        </div>
                        <div class="text-end mb-3">
                            <a href="{{ route('sach.show', $sach->id) }}" class="btn btn-info">Quay lại</a>
                            @if ($chuong->kiem_duyet != 'duyet')
                                <button type="submit" name="action" value="ban_nhap" class="btn btn-secondary ">Lưu
                                    thành bản nháp
                                </button>
                            @endif
                            <button type="submit" name="action" value="cho_xac_nhan" class="btn btn-warning ">Lưu chương
                            </button>
                        </div>
                        <!-- end card -->

                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </form>
        </div>
    </div>

@endsection

@push('styles')
    <!-- Plugins css -->
    <link href="{{ asset('assets/admin/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css"/>

@endpush

@push('scripts')
    <!-- ckeditor -->
    <script src="{{ asset('assets/admin/ckeditor/ckeditor.js') }}"></script>

    <!-- dropzone js -->
    <script src="{{ asset('assets/admin/libs/dropzone/dropzone-min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/pages/ecommerce-product-create.init.js') }}"></script>

    <script>
        CKEDITOR.replace('ckeditor-classic', {
            language: 'vi',
            filebrowserUploadUrl: "{{ route('ckeditor.upload') }}?type=chuong&_token={{ csrf_token() }}",
            filebrowserUploadMethod: 'form'
        });

        function hienThiAnh(event) {
            const anhBiaSach = document.getElementById('anh_bia');
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function () {
                anhBiaSach.src = reader.result;
                anhBiaSach.style.display = 'block';
            }
            if (file) {
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
