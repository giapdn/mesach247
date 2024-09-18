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
                    <h5 class="fs-16">Sửa thể loại: <b>{{ $theLoai->ten_the_loai }}</b></h5>

                    <!-- Thông báo khi thêm thành công -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="ri-notification-off-line label-icon"></i>
                            <strong class="fs-5">{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="createproduct-form" autocomplete="off" class="needs-validation" novalidate action="{{ route('the-loai.update',$theLoai->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">ID</label>
                                    <input type="text" class="form-control" id="" value="{{ $theLoai->id }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="nameInput" class="form-label">Tên thể loại</label>
                                    <input type="text" class="form-control @error('ten_the_loai') is-invalid @enderror" required name="ten_the_loai" id="nameInput" value="{{ old('ten_the_loai',$theLoai->ten_the_loai) }}" placeholder="Nhập tên thể loại">
                                </div>
                                <div class="mb-3">
                                    <label for="websiteUrl" class="form-label">Mô tả ngắn</label>
                                    <textarea class="form-control @error('mo_ta') is-invalid @enderror"  id="" cols="15" rows="3" name="mo_ta">{{ old('mo_ta', $theLoai->mo_ta) }}</textarea>

                                </div>
                            </div>
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Ảnh đại diện</h5>
                            </div>
                            <div class="card-body">
                                <input type="file" class="mb-3 form-control @error('anh_the_loai') is-invalid @enderror" name="anh_the_loai" multiple="multiple">
                            </div>

                        </div>
                        <!-- end card -->

                        <div class="text-end mb-3">
                            <button type="submit" class="btn btn-success w-sm">Sửa</button>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Hành động</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Trạng Thái</label>
                                    <div class="form-check form-switch form-switch-lg" dir="ltr">
                                        <input class="form-check-input @error('trang_thai') is-invalid @enderror" type="checkbox" role="switch" id="SwitchCheck3"
                                            {{ old('trang_thai', $theLoai->trang_thai) === 'hien' ? 'checked' : '' }}>
                                        <input type="hidden" name="trang_thai" id="trang_thai_hidden" value="{{ old('trang_thai', $theLoai->trang_thai) }}">
                                        <label class="form-check-label" for="SwitchCheck3">Ẩn / Hiện</label>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Ảnh được chọn</h5>
                            </div>
                            <!-- end card body -->
                            <div class="card-body card-body d-flex justify-content-center">
                                <img src="{{ Storage::url($theLoai->anh_the_loai) }}" width="200px">
                            </div>
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
    <link href="{{ asset('assets/admin/libs/dropzone/dropzone.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <!-- ckeditor -->
    <script src="{{ asset('assets/admin/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <!-- dropzone js -->
    <script src="{{ asset('assets/admin/libs/dropzone/dropzone-min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/pages/ecommerce-product-create.init.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var checkbox = document.getElementById('SwitchCheck3');
        var hiddenInput = document.getElementById('trang_thai_hidden');
        hiddenInput.value = checkbox.checked ? 'hien' : 'an';
        checkbox.addEventListener('change', function() {
            hiddenInput.value = checkbox.checked ? 'hien' : 'an';
        });
    });
</script>
@endpush
