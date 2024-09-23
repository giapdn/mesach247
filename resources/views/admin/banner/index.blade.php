@extends('admin.layouts.app')
@section('start-point')
    Quản lý banner
@endsection
@section('title')
    Danh sách banner
@endsection
@section('content')
    <div class="row">
        {{-- <div class="col-xl-5 col-lg-4">
            <div class="card">
                <div class="card-header" id="bannerFormToggle">
                    <div class="d-flex ">
                        <div class="flex-grow-1">
                            <h5 class="fs-16" style="cursor: pointer;">Thêm banner mới</h5>
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
                        <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf



                            <div class="filter-choices-input mt-3">
                                <label for="tieu_de">Tiêu đề:</label>
                                <input type="text" name="tieu_de" class="form-control">{{ old('tieu_de') }}</input>
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label for="noi_dung">Nội dung:</label>
                                <textarea name="noi_dung" class="form-control">{{ old('noi_dung') }}</textarea>
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label for="loai_banner">Loại Banner:</label>
                                <select name="loai_banner" class="form-control">
                                    <option value="Slideshow" {{ old('loai_banner') == 'Slideshow' ? 'selected' : '' }}>
                                        Slideshow</option>
                                    <option value="Footer" {{ old('loai_banner') == 'Footer' ? 'selected' : '' }}>Footer
                                    </option>
                                </select>
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Trạng thái</label>
                                <select name="trang_thai" class="form-control">
                                    <option value="hien">Hiển thị</option>
                                    <option value="an">Ẩn</option>
                                </select>
                            </div>


                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Thêm ảnh</label>
                                <div id="add-row" class="btn btn-primary">+</div>
                                <table class="table align-middle mb-0">
                                    <tbody id="image-table-body">
                                        <tr>
                                            <td class="d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <img id="preview_0"
                                                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrVLGzO55RQXipmjnUPh09YUtP-BW3ZTUeAA&s"
                                                        width="50px">
                                                    <input type="file" id="hinh_anh" name="list_image[]"
                                                        class="form-control mx-2" onchange="previewImage(this, 0)">
                                                    <button class="btn btn-light remove-row"><i
                                                            class="bx bx-trash"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    var rowCount = 1;

                                    // Thêm sự kiện cho nút 'Thêm hàng'
                                    document.getElementById('add-row').addEventListener('click', function() {
                                        var tableBody = document.getElementById('image-table-body');
                                        var newRow = document.createElement('tr');

                                        newRow.innerHTML = `
                                            <td class="d-flex align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <img id="preview_${rowCount}" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrVLGzO55RQXipmjnUPh09YUtP-BW3ZTUeAA&s" width="50px">
                                                    <input type="file" id="hinh_anh" name="list_image[id_${rowCount}]" class="form-control mx-2" onchange="previewImage(this, ${rowCount})">
                                                    <button class="btn btn-light remove-row"><i class="bx bx-trash"></i></button>
                                                </div>
                                            </td>
                                        `;

                                        tableBody.appendChild(newRow);
                                        rowCount++;
                                    });

                                    // Thêm sự kiện xóa cho các nút thùng rác khi thêm hàng mới
                                    document.addEventListener('click', function(event) {
                                        if (event.target.closest('.remove-row')) {
                                            var row = event.target.closest('tr');
                                            row.remove();
                                        }
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
                            </script>
                            <button type="submit" class="btn btn-sm btn-success ">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>



            <div class="card">
                <div class="card-header" id="bannerFormToggle">
                    <div class="d-flex ">
                        <div class="flex-grow-1">
                            <h5 class="fs-16" style="cursor: pointer;">Xem trước</h5>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <select id="loai_banner_select" class="form-control" onchange="loadBannersByType()">
                        <option value="Slideshow">Slideshow</option>
                        <option value="Footer">Footer</option>
                    </select>
                </div>

                <div class="card mt-3">
                    <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner px-3" id="carousel-images">
                            <!-- Ảnh slideshow sẽ được đổ vào đây bằng AJAX -->
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"
                                style="width: 20px; height: 20px;"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"
                                style="width: 20px; height: 20px;"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>



        </div> --}}
        <!-- end col -->

        <div class="col-xl-12 col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Danh sách </h4>
                            <div class="flex-shrink-0">
                                <a href="{{ route('banner.create') }}" class="btn btn-success"><i
                                        class="ri-add-line align-bottom me-1"></i> Thêm mới banner</a>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="table-gridjs"></div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
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
        // Lấy dữ liệu từ Laravel và truyền vào JavaScript
        const banners = @json($banners);

        document.getElementById("table-gridjs") && new gridjs.Grid({
            columns: [{
                name: "ID",
                hidden: true,

            }, {
                name: "Tiêu đề",
                width: "auto",
                formatter: function (param, row) {
                    var id = row.cells[0].data;
                    var editUrl = `{{ route('banner.edit', ':id') }}`.replace(':id', id);
                    var detailUrl = `{{ route('banner.show', ':id') }}`.replace(':id', id);
                    var deleteUrl = `{{ route('banner.destroy', ':id') }}`.replace(':id', id);
                    return gridjs.html(` <b>${param}</b>
                                <div class="d-flex justify-content-start mt-2">
                                    <a href="${editUrl}" class="btn btn-link p-0">Sửa |</a>
                                    <a href="${detailUrl}" class="btn btn-link p-0">Xem |</a>
                                       <form action="${deleteUrl}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-link p-0 text-danger" onclick="return confirm('Bạn có muốn xóa Banner!')">Xóa</button>
                                       </form>
                                </div>
                    `);
                }
            },
                {
                    name: "Album Ảnh",
                    width: "auto",
                    formatter: function (param) {
                        if (param.length > 0) {
                            return gridjs.html(
                                param.map(hinhAnh => '<img src="' + "{{ Storage::url('') }}" + hinhAnh.hinh_anh + '" width="50px" height="50px" style="margin-right: 5px;" alt="Đây là ảnh">').join('')
                            );
                        } else {
                            return gridjs.html('Không có hình ảnh');
                        }
                    }
                },
                {name: "Loại banner", width: "auto",
                    formatter: function (param) {
                        return gridjs.html('<span class="fw-semibold"> ' + param + "</span>");
                    }
                },
                {
                    name: "Trạng thái",
                    width: "auto",
                    formatter: function (lien, row) {
                        let trangThaiViet = {
                            'an': 'Ẩn',
                            'hien': 'Hiện'
                        };

                        let statusClass = '';
                        switch (lien) {
                            case 'an':
                                statusClass = 'status-an';
                                break;
                            case 'hien':
                                statusClass = 'status-hien';
                                break;
                        }

                        return gridjs.html(`
                                <div class="btn-group btn-group-sm" id="status-${row.cells[0].data}"
                                    onmouseover="showStatusOptions(${row.cells[0].data})"
                                    onmouseout="hideStatusOptions(${row.cells[0].data})">

                                    <button type="button" class="btn ${statusClass}">${trangThaiViet[lien]}</button>
                                    <button type="button" class="btn ${statusClass} dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" id="status-options-${row.cells[0].data}">
                                        <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'an')">Ẩn</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'hien')">Hiện</a></li>
                                    </ul>
                                </div>
                            `);
                    }
                }],
            pagination: {
                limit: 5
            },
            sort: true,
            search: true,
            data: banners.map(banner => [
                banner.id,
                banner.tieu_de,
                banner.hinh_anh_banner,
                banner.loai_banner,
                banner.trang_thai
            ])

        }).render(document.getElementById("table-gridjs"));

        function deleteBanner(url) {
            if (confirm("Bạn có chắc chắn muốn xóa banner này?")) {
                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Xóa thành công!');
                            location.reload(); // Reload lại trang
                        } else {
                            alert('Có lỗi xảy ra khi xóa banner.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }

        function loadBannersByType() {
            var selectedType = document.getElementById("loai_banner_select").value;

            fetch(`/get-banners-by-type/${selectedType}`)
                .then(response => response.json())
                .then(data => {
                    var carouselInner = document.getElementById("carousel-images");
                    carouselInner.innerHTML = ''; // Xóa nội dung cũ

                    if (data.banners.length > 0) {
                        data.banners.forEach((banner, index) => {
                            let activeClass = index === 0 ? 'active' : '';
                            let imgElement = `
                                        <div class="carousel-item ${activeClass}">
                                            <img src="{{ Storage::url('') }}${banner.hinh_anh}" class="d-block w-100" alt="Banner Image" style="width: 300px; height: 150px; object-fit: cover;">
                                        </div>`;
                            carouselInner.innerHTML += imgElement;
                        });
                    } else {
                        carouselInner.innerHTML = '<p>Không có banner nào được tìm thấy.</p>';
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        // Load banners mặc định khi trang được tải
        document.addEventListener('DOMContentLoaded', loadBannersByType);


        document.getElementById('bannerFormToggle').addEventListener('click', function () {
            const formContent = document.getElementById('bannerFormSection');
            if (formContent.style.display === 'none' || formContent.style.display === '') {
                formContent.style.display = 'block'; // Hiện form nếu đang bị ẩn
            } else {
                formContent.style.display = 'none'; // Ẩn form nếu đang hiện
            }
        });

        function showStatusOptions(id) {
            document.getElementById('status-options-' + id).classList.remove('d-none');
        }

        // Xử lý trỏ chuột
        function hideStatusOptions(id) {
            document.getElementById('status-options-' + id).classList.add('d-none');
        }

        // Xử lý chuyển đổi trạng thái
        function changeStatus(id, newStatus) {
            if (!confirm('Bạn muốn thay đổi trạng thái cập nhật chứ?')) {
                return;
            }
            fetch(`/banner/${id}/update-status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ status: newStatus })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        let trangThaiViet = {
                            'an': 'Ẩn',
                            'hien': 'Hiện'
                        };
                        let statusClass = newStatus === 'an' ? 'status-an' : 'status-hien';

                        let statusButton = document.querySelector(`#status-${id} .btn`);
                        let dropdownToggle = document.querySelector(`#status-${id} .dropdown-toggle`);
                        statusButton.className = `btn ${statusClass}`;
                        statusButton.textContent = trangThaiViet[newStatus];
                        dropdownToggle.className = `btn ${statusClass} dropdown-toggle dropdown-toggle-split`;
                        hideStatusOptions(id);
                    } else {
                        alert('Không thể cập nhật trạng thái này.');
                    }
                });
        }
    </script>

    <style>
        /* Màu của nút */
        .status-an {
            background-color: red; /* Màu đỏ cho trạng thái Ẩn */
            color: #fff;
        }

        .status-hien {
            background-color: green; /* Màu xanh cho trạng thái Hiện */
            color: #fff;
        }

        /* Giữ nguyên màu khi hover */
        .status-an:hover {
            background-color: red; /* Giữ nguyên màu đỏ cho nút trạng thái Ẩn */
            color: #fff;
        }

        .status-hien:hover {
            background-color: green; /* Giữ nguyên màu xanh cho nút trạng thái Hiện */
            color: #fff;
        }

        /* Màu nền dropdown */
        .status-an .dropdown-menu {
            background-color: red;
        }

        .status-hien .dropdown-menu {
            background-color: green;
        }

        /* Mũi tên của dropdown */
        .status-an .dropdown-toggle::after,
        .status-hien .dropdown-toggle::after {
            border-top-color: #fff;
        }

        .btn-group-sm .dropdown-menu {
            min-width: 100px; /* Tăng kích thước chiều rộng của menu */
        }


    </style>
@endpush
