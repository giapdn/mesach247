@extends('admin.layouts.app')
@section('start-point')
    Quản lý banner
@endsection
@section('title')
    Sửa banner
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-5 col-lg-4">
            <div class="card">
                <div class="card-header" id="bannerFormToggle">
                    <div class="d-flex ">
                        <div class="flex-grow-1">
                            <h5 class="fs-16" style="cursor: pointer;">Sửa banner: {{ $banner->tieu_de }}</h5>
                        </div>
                    </div>
                </div>
                <div id="bannerFormSection" class="accordion accordion-flush filter-accordion">
                    <div class="card-body border-bottom">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('banner.update', $banner->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            {{-- <div class="filter-choices-input mt-3">
                                <label for="hinh_anh">Ảnh Banner:</label>
                                <input type="file" name="hinh_anh" class="form-control">
                            </div> --}}


                            <div class="filter-choices-input mt-3">
                                <label for="tieu_de">Tiêu đề:</label>
                                <input type="text" name="tieu_de"
                                    class="form-control @error('tieu_de') is-invalid @enderror"
                                    value="{{ old('tieu_de', $banner->tieu_de) }}">
                            </div>

                            <div class="filter-choices-input mt-3">
                                <label for="noi_dung">Nội dung:</label>
                                <textarea name="noi_dung" class="form-control  @error('noi_dung') is-invalid @enderror">{{ old('noi_dung', $banner->noi_dung) }}</textarea>
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label for="loai_banner">Loại Banner:</label>
                                <select name="loai_banner" class="form-control">
                                    <option value="slider"
                                        {{ old('loai_banner', $banner->loai_banner) == 'slider' ? 'selected' : '' }}>
                                        Slideshow</option>
                                    <option value="footer"
                                        {{ old('loai_banner', $banner->loai_banner) == 'footer' ? 'selected' : '' }}>Footer
                                    </option>
                                </select>
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Trạng thái</label>
                                <select name="trang_thai" class="form-control">
                                    <option value="hien"
                                        {{ old('trang_thai', $banner->trang_thai) == 'hien' ? 'selected' : '' }}>Hiển thị
                                    </option>
                                    <option value="an"
                                        {{ old('trang_thai', $banner->trang_thai) == 'an' ? 'selected' : '' }}>Ẩn</option>
                                </select>
                            </div>


                            <div class="filter-choices-input mt-3">
                                <div class="d-flex justify-content-between align-items-end">
                                    <label class="form-label">Ảnh slide</label>
                                    <div id="add-row" class="btn btn-success btn-sm mb-2">+</div>
                                </div>
                                <table class="table align-middle mb-0">
                                    <tbody id="image-table-body">
                                        @foreach ($banner->hinhAnhBanner as $index => $item)
                                            <tr>
                                                <td class="d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <img id="preview_{{ $index }}"
                                                            src="{{ Storage::url($item->hinh_anh) }}" width="50px">
                                                        <input type="file" id="image"
                                                            name="list_image[{{ $item->id }}]"
                                                            class="form-control mx-2"
                                                            onchange="previewImage(this, {{ $index }})">
                                                        <input type="hidden" name="list_image[{{ $item->id }}]"
                                                            value="{{ $item->id }}">
                                                        <button class="btn btn-light remove-row"
                                                            onclick="removeRow(this)"><i class="bx bx-trash"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>


                            <div class="mt-3 d-flex justify-content-end">
                                <div>
                                    <button type="submit" class="btn btn-warning me-2">Sửa</button>
                                    <a href="{{ route('banner.index') }}" class="btn btn-secondary "
                                        style="width: 100px;">Quay
                                        lại</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>


        </div>
        <!-- end col -->

        <div class="col-xl-7 col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>Slide ở đây</h1>
                        </div>
                        <div class="card-body">
                            <div id="bannerCarousel" class="carousel slide mb-3 " data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($banner->hinhAnhBanner as $key => $hinhAnh)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ Storage::url($hinhAnh->hinh_anh) }}"
                                                class="d-block w-100 img-fluid" style="height: 300px; object-fit: cover;"
                                                alt="Banner {{ $banner->id }} Image {{ $key + 1 }}">
                                        </div>
                                    @endforeach
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
                </div>
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
            var rowCount = {{ count($banner->hinhAnhBanner) }};

            // Thêm sự kiện cho nút 'Thêm hàng'
            document.getElementById('add-row').addEventListener('click', function() {
                var tableBody = document.getElementById('image-table-body');
                var newRow = document.createElement('tr');

                newRow.innerHTML = `
                    <td class="d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <img id="preview_${rowCount}" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrVLGzO55RQXipmjnUPh09YUtP-BW3ZTUeAA&s" width="50px">
                            <input type="file" id="hinh_anh" name="list_image[id_${rowCount}]" class="form-control mx-2" onchange="previewImage(this, ${rowCount})">
                                                        <button class="btn btn-light remove-row" onclick="removeRow(this)"><i class="bx bx-trash"></i></button>
                        </div>
                    </td>
                `;

                tableBody.appendChild(newRow);
                rowCount++;
            });




        });

        function previewImage(input, rowIndex) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById(`preview_${rowIndex}`).setAttribute('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // function previewImageAndAddToSlideshow(input, rowIndex) {
        //     if (input.files && input.files[0]) {
        //         const reader = new FileReader();
        //         reader.onload = function(e) {
        //             // Cập nhật ảnh xem trước
        //             document.getElementById(`preview_${rowIndex}`).setAttribute('src', e.target.result);

        //             // Thêm ảnh vào carousel
        //             var carouselInner = document.getElementById('carouselImages');
        //             var newCarouselItem = document.createElement('div');
        //             newCarouselItem.classList.add('carousel-item');
        //             newCarouselItem.innerHTML = `
        //             <img src="${e.target.result}" class="d-block w-100 img-fluid" style="height: 300px; object-fit: cover;" alt="Image ${rowIndex + 1}">
        //         `;

        //             // Nếu là ảnh đầu tiên, đặt class 'active'
        //             if (carouselInner.children.length === 0) {
        //                 newCarouselItem.classList.add('active');
        //             }

        //             // Thêm ảnh vào carousel
        //             carouselInner.appendChild(newCarouselItem);
        //         };
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }

        function removeRow(item) {
            var row = item.closest('tr');
            row.remove();
        }
    </script>
@endpush
