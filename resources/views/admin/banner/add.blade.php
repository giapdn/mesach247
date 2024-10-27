@extends('admin.layouts.app')
@section('start-point')
    Quản lý banner
@endsection
@section('title')
    Thêm mới banner
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-5 col-lg-4">
            <div class="card">
                <div class="card-header" id="bannerFormToggle" style="cursor: pointer;">
                    <h5 class="fs-16 mb-0">Thêm banner mới</h5>
                </div>
                <div id="bannerFormSection" class="accordion accordion-flush filter-accordion">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="tieu_de" class="form-label">Tiêu đề:</label>
                                <input type="text" name="tieu_de"
                                    class="form-control @error('tieu_de') is-invalid @enderror"
                                    value="{{ old('tieu_de') }}" placeholder="Tiêu đề cho banner">
                            </div>

                            <div class="mb-3">
                                <label for="noi_dung" class="form-label">Nội dung:</label>
                                <textarea placeholder="Nội dung của banner" name="noi_dung" class="form-control @error('noi_dung') is-invalid @enderror">{{ old('noi_dung') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="loai_banner" class="form-label">Loại Banner:</label>
                                <select name="loai_banner" class="form-select">
                                    <option value="slider" {{ old('loai_banner') == 'slider' ? 'selected' : '' }}>
                                        Slideshow</option>
                                    <option value="footer" {{ old('loai_banner') == 'footer' ? 'selected' : '' }}>Footer
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="trang_thai" class="form-label">Trạng thái:</label>
                                <select name="trang_thai" class="form-select">
                                    <option value="hien">Hiển thị</option>
                                    <option value="an">Ẩn</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-end">
                                    <label class="form-label">Ảnh slide</label>
                                    <div id="add-row" class="btn btn-secondary btn-sm mb-2">+</div>
                                </div>
                                <table class="table align-middle mb-0">
                                    <tbody id="image-table-body">
                                        <tr>
                                            <td class="d-flex align-items-center justify-content-around">
                                                <img id="preview_0"
                                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrVLGzO55RQXipmjnUPh09YUtP-BW3ZTUeAA&s"
                                                    width="50px" height="auto">
                                                <input type="file" id="hinh_anh" name="list_image[id_0]"
                                                    class="form-control mx-2"
                                                    onchange="previewImageAndAddToSlideshow(this, 0)">
                                                <button class="btn btn-light remove-row" onclick="removeRow(this)"><i
                                                        class="bx bx-trash text-danger"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="mb-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-success me-2">Thêm</button>
                                <a href="{{ route('banner.index') }}" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-7 col-lg-8">
            <div class="card">
                <h1 class="card-header">Slide ở đây</h1>
                <div id="bannerCarousel" class="carousel slide mb-3 p-2" data-bs-ride="carousel">
                    <div class="carousel-inner" id="carouselImages">
                        <!-- Nơi ảnh sẽ được thêm vào -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>

    <!-- end row -->
@endsection

@push('styles')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
@endpush
@push('scripts')
    <!-- prismjs plugin -->
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>
    <!--  Đây là chỗ hiển thị dữ liệu phân trang -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var rowCount = 1;

            // Thêm hàng mới khi nhấn nút "Thêm"
            document.getElementById('add-row').addEventListener('click', function() {
                var tableBody = document.getElementById('image-table-body');
                var newRow = document.createElement('tr');

                newRow.innerHTML = `
                <td class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <img id="preview_${rowCount}" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrVLGzO55RQXipmjnUPh09YUtP-BW3ZTUeAA&s" width="50px" height="auto">
                        <input type="file" id="hinh_anh" name="list_image[id_${rowCount}]" class="form-control mx-2" onchange="previewImageAndAddToSlideshow(this, ${rowCount})">
                        <button class="btn btn-light remove-row" onclick="removeRow(this)"><i class="bx bx-trash text-danger"></i></button>
                    </div>
                </td>
            `;
                tableBody.appendChild(newRow);
                rowCount++;
            });
        });

        // Hàm xem trước ảnh và thêm ảnh vào slideshow
        function previewImageAndAddToSlideshow(input, rowIndex) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    // Cập nhật ảnh xem trước
                    document.getElementById(`preview_${rowIndex}`).setAttribute('src', e.target.result);

                    // Thêm ảnh vào carousel
                    var carouselInner = document.getElementById('carouselImages');
                    var newCarouselItem = document.createElement('div');
                    newCarouselItem.classList.add('carousel-item');
                    newCarouselItem.innerHTML = `
                    <img src="${e.target.result}" class="d-block w-100 img-fluid" style="height: 300px; object-fit: cover;" alt="Image ${rowIndex + 1}">
                `;

                    // Nếu là ảnh đầu tiên, đặt class 'active'
                    if (carouselInner.children.length === 0) {
                        newCarouselItem.classList.add('active');
                    }

                    // Thêm ảnh vào carousel
                    carouselInner.appendChild(newCarouselItem);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeRow(item) {
            var row = item.closest('tr');
            row.remove();
        }
    </script>
@endpush
