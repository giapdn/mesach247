@extends('admin.layouts.app')
@section('start-point')
    Quản lý sách
@endsection
@section('title')
    Danh sách
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h5 class="fs-16">Bộ lọc</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="{{ route('sach.index') }}" class="text-decoration-underline" id="clearall">Xóa tất
                                cả</a>
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush filter-accordion">
                    <form action="{{ route('sach.index') }}" method="GET" id="filterForm">
                        <div class="card-body border-bottom">
                            <p class="text-muted text-uppercase fs-12 fw-medium mb-2">Trạng thái</p>
                            <div class="d-flex gap-2 justify-content-center">
                                <div class="col-lg-6">
                                    <select class="form-select" name="kiem_duyet">
                                        <option value="all">Tất cả</option>
                                        <option
                                            value="cho_xac_nhan" {{ request('kiem_duyet') == 'cho_xac_nhan' ? 'selected' : '' }}>
                                            Chờ xác nhận
                                        </option>
                                        <option
                                            value="duyet" {{ request('kiem_duyet') == 'duyet' ? 'selected' : '' }}>
                                            Duyệt
                                        </option>
                                        <option
                                            value="tu_choi" {{ request('kiem_duyet') == 'tu_choi' ? 'selected' : '' }}>
                                            Từ chối
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <select class="form-select" name="trang_thai">
                                        <option value="all">Tất cả</option>
                                        <option
                                            value="hien" {{ request('trang_thai') == 'hien' ? 'selected' : '' }}>
                                            Hiện
                                        </option>
                                        <option value="an" {{ request('trang_thai') == 'an' ? 'selected' : '' }}>
                                            Ẩn
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-bottom">
                            <p class="text-muted text-uppercase fs-12 fw-medium mb-2">Thể loại</p>
                            <div id="flush-collapseBrands" class="accordion-collapse collapse show"
                                 aria-labelledby="flush-headingBrands">
                                <div class="accordion-body text-body pt-0">
                                    <div class="d-flex flex-column gap-2 mt-3 filter-check">
                                        @foreach($theLoais as $item)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                       id="theloai-{{$item->id}}" value="{{$item->id}}"
                                                       name="the_loai[]"
                                                    {{ in_array($item->id, request()->get('the_loai', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="theloai-{{$item->id}}">
                                                    {{$item->ten_the_loai}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-bottom">
                            <div class="row">
                                <p class="text-muted text-uppercase fs-12 fw-medium mb-2">Lọc theo khoảng thời gian</p>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Từ ngày</span>
                                    <input type="date" class="form-control" name="from_date"
                                           value="{{ request()->get('from_date') }}">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Đến ngày</span>
                                    <input type="date" class="form-control" name="to_date"
                                           value="{{ request()->get('to_date') }}">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary" name="{{ request('sach-cua-tois') == 'mySach' ? 'sach-cua-tois' : '' }}" value="mySach">Lọc</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-9 col-lg-8">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">

                        <h4 class="card-title mb-0 flex-grow-1">Danh sách </h4>
                        @if(auth()->user()->vai_tros->contains('id', 1))
                            <div class="me-3 d-flex gap-3">
                                <a href="{{ route('sach.index') }}" class="btn btn-info">Xem tất cả danh sách</a>
                                    <button type="submit" name="sach-cua-tois" class="btn btn-primary" form="filterForm" value="mySach">Xem sách của
                                        tôi
                                    </button>
                            </div>
                        @endif

                        <div class="flex-shrink-0">
                            <a href="{{ route('sach.create') }}" class="btn btn-success"><i
                                    class="ri-add-line align-bottom me-1"></i> Thêm mới sách</a>
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="table-gridjs"></div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
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
        document.addEventListener('DOMContentLoaded', function () {
            var saches = @json($saches);
            var canCapNhat = @json(Auth::user()->hasPermission('sach-capNhat'));
            var canKiemDuyet = @json(Auth::user()->hasPermission('sach-kiemDuyet'));
            var canAnHien = @json(Auth::user()->hasPermission('sach-anHien'));

            new gridjs.Grid({
                columns: [
                    {
                        name: "ID", hidden: true,
                    },
                    {
                        name: "Tiêu đề sách", width: "auto",
                        formatter: function (param, row) {
                            var id = row.cells[0].data;
                            var editUrl = `{{ route('sach.edit', ':id') }}`.replace(':id', id);
                            var detailUrl = `{{ route('sach.show', ':id') }}`.replace(':id', id);
                            var deleteUrl = `{{ route('sach.destroy', ':id') }}`.replace(':id', id);
                            var canDelete = @json(Auth::user()->hasPermission('sach-destroy'));
                            var canUpdate = @json(Auth::user()->hasPermission('sach-update'));
                            var html = ` <b>${param}</b>
                                <div class="d-flex justify-content-start mt-2">`;
                            if (canUpdate) {
                                html += `<a href="${editUrl}" class="btn btn-link p-0">Sửa |</a>`
                            }
                            html += ` <a href="${detailUrl}" class="btn btn-link p-0">Xem </a>`;
                            if (canDelete) {
                                html += `<form action="${deleteUrl}" method="post">
                                            @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-link p-0 text-danger" onclick="return confirm('Bạn có muốn xóa sách!')"> |Xóa</button>
                           </form>`
                            }
                            html += `</div>`;
                            return gridjs.html(html);
                        }
                    },
                    {
                        name: "Thể loại", width: "auto",
                    },
                    {
                        name: "Ngày đăng", width: "auto",
                        formatter: function (param) {
                            const date = new Date(param);
                            return `${date.getDate().toString().padStart(2, '0')}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getFullYear()}`;
                        }
                    },
                    {name: "Tác giả", width: "auto"},
                    {
                        name: "Tình trạng cập nhật", width: "auto",
                        formatter: function (lien, row) {
                            let trangThaiViet = {
                                'da_full': 'Đã Full',
                                'tiep_tuc_cap_nhat': 'Tiếp Tục Cập Nhật'
                            };

                            let statusClass = lien === 'da_full' ? 'status-da_full' : 'status-tiep_tuc_cap_nhat';
                            var html = '';
                            if (canCapNhat) {
                                html = `
                                <div class="btn-group btn-group-sm" id="update-status-${row.cells[0].data}"
                                    onmouseover="showStatusOptions(${row.cells[0].data})"
                                    onmouseout="hideStatusOptions(${row.cells[0].data})">

                                    <button type="button" class="btn ${statusClass}">${trangThaiViet[lien]}</button>
                                    <button type="button" class="btn ${statusClass} dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" id="status-options-${row.cells[0].data}">
                                        <li><a class="dropdown-item" href="#" onclick="tinhTrangCapNhat(${row.cells[0].data}, 'da_full')">Đã Full</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="tinhTrangCapNhat(${row.cells[0].data}, 'tiep_tuc_cap_nhat')">Tiếp Tục Cập Nhật</a></li>
                                    </ul>
                                </div>
                            `;
                            } else {
                                html = `
                                <div class="btn-group btn-group-sm" id="update-status-${row.cells[0].data}"
                                    onmouseover="showStatusOptions(${row.cells[0].data})"
                                    onmouseout="hideStatusOptions(${row.cells[0].data})">

                                    <div  class="btn ${statusClass}">${trangThaiViet[lien]}</div>
                                </div>
                            `;
                            }
                            return gridjs.html(html);
                        }
                    },
                    {
                        name: "Tình trạng kiểm duyệt", width: "auto",
                        formatter: function (lien, row) {
                            let trangThaiViet = {
                                'cho_xac_nhan': 'Chờ Xác Nhận',
                                'tu_choi': 'Từ Chối',
                                'duyet': 'Duyệt',
                                'ban_nhap': 'Bản Nháp'
                            };

                            let statusClass = '';
                            switch (lien) {
                                case 'cho_xac_nhan':
                                    statusClass = 'status-cho_xac_nhan';
                                    break;
                                case 'tu_choi':
                                    statusClass = 'status-tu_choi';
                                    break
                                case 'duyet':
                                    statusClass = 'status-duyet';
                                    break;
                                case 'ban_nhap':
                                    statusClass = 'status-ban_nhap';
                                    break;
                            }
                            var html = '';
                            if (canKiemDuyet) {
                                html = `
                                <div class="btn-group btn-group-sm" id="update-${row.cells[0].data}"
                                    onmouseover="showStatusOptions(${row.cells[0].data})"
                                    onmouseout="hideStatusOptions(${row.cells[0].data})">

                                    <button type="button" class="btn ${statusClass}">${trangThaiViet[lien]}</button>
                                    <button type="button" class="btn ${statusClass} dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown-toggle-split-before">
                                        <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" id="status-options-${row.cells[0].data}">
                                        <li><a class="dropdown-item" href="#" onclick="tinhKiemDuyet(${row.cells[0].data}, 'cho_xac_nhan')">Chờ Xác Nhận</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="tinhKiemDuyet(${row.cells[0].data}, 'tu_choi')">Từ Chối</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="tinhKiemDuyet(${row.cells[0].data}, 'duyet')">Duyệt</a></li>
                                    </ul>
                                </div>
                            `;
                            } else {
                                html = `
                                <div class="btn-group btn-group-sm" id="update-${row.cells[0].data}"
                                    onmouseover="showStatusOptions(${row.cells[0].data})"
                                    onmouseout="hideStatusOptions(${row.cells[0].data})">

                                    <button type="button" class="btn ${statusClass}">${trangThaiViet[lien]}</button>
                                </div>
                            `;
                            }
                            return gridjs.html(html);
                        }
                    },
                    {
                        name: "Trạng thái", width: "auto",
                        formatter: function (lien, row) {
                            let trangThaiViet = {
                                'an': 'Ẩn',
                                'hien': 'Hiện'
                            };

                            let statusClass = lien === 'an' ? 'status-an' : 'status-hien';
                            var html = '';
                            if (canAnHien) {
                                html = `
                                <div class="btn-group btn-group-sm" id="visibility-status-${row.cells[0].data}"
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
                            `;
                            } else {
                                html = `
                                <div class="btn-group btn-group-sm" id="visibility-status-${row.cells[0].data}"
                                    onmouseover="showStatusOptions(${row.cells[0].data})"
                                    onmouseout="hideStatusOptions(${row.cells[0].data})">

                                    <button type="button" class="btn ${statusClass}">${trangThaiViet[lien]}</button>

                                </div>
                            `;
                            }
                            return gridjs.html(html);
                        }
                    },
                ],
                data: saches.map(function (item) {
                    return [
                        item.id,
                        item.ten_sach,
                        item.the_loai ? item.the_loai.ten_the_loai : 'Chưa phân loại',
                        item.ngay_dang,
                        item.tac_gia,
                        item.tinh_trang_cap_nhat,
                        item.kiem_duyet,
                        item.trang_thai,
                    ];
                }),
                pagination: {limit: 5},
                sort: true,
                search: true,
            }).render(document.getElementById("table-gridjs"));
        });

        function showStatusOptions(id) {
            document.getElementById('status-options-' + id).classList.remove('d-none');
        }

        // Xử lý trỏ chuột
        function hideStatusOptions(id) {
            document.getElementById('status-options-' + id).classList.add('d-none');
        }

        // Xử lý chuyển đổi trạng thái Ẩn & Hiện
        function changeStatus(id, newStatus) {
            if (!confirm('Bạn muốn thay đổi trạng thái cập nhật chứ?')) {
                return;
            }
            fetch(`/admin/sach/an-hien/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({status: newStatus})
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        let trangThaiViet = {
                            'an': 'Ẩn',
                            'hien': 'Hiện'
                        };
                        let statusClass = newStatus === 'an' ? 'status-an' : 'status-hien';
                        let statusButton = document.querySelector(`#visibility-status-${id} .btn`);
                        let dropdownToggle = document.querySelector(`#visibility-status-${id} .dropdown-toggle`);
                        statusButton.className = `btn ${statusClass}`;
                        statusButton.textContent = trangThaiViet[newStatus];

                        // Cập nhật màu sắc của mũi tên
                        dropdownToggle.className = `btn ${statusClass} dropdown-toggle dropdown-toggle-split`;
                        dropdownToggle.style.borderTopColor = statusButton.style.color; // Cập nhật màu của mũi tên

                        hideStatusOptions(id);
                    } else {
                        alert('Không thể cập nhật trạng thái này.');
                    }
                });
        }

        // Xử lý tình trạng cập nhật
        function tinhTrangCapNhat(id, newStatus) {
            if (!confirm('Bạn muốn thay đổi trạng thái tình trạng cập nhật chứ?')) {
                return;
            }

            fetch(`/admin/sach/cap-nhat/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({status: newStatus})
            })
                .then(response => response.json())
                .then(data => {
                    if (data.thanh_cong) {
                        let trangThaiViet = {
                            'da_full': 'Đã Full',
                            'tiep_tuc_cap_nhat': 'Tiếp Tục Cập Nhật'
                        };
                        let statusClass = newStatus === 'da_full' ? 'status-da_full' : 'status-tiep_tuc_cap_nhat';
                        let statusButton = document.querySelector(`#update-status-${id} .btn`);
                        let dropdownToggle = document.querySelector(`#update-status-${id} .dropdown-toggle`);
                        statusButton.className = `btn ${statusClass}`;
                        statusButton.textContent = trangThaiViet[newStatus];

                        // Cập nhật màu sắc của mũi tên
                        dropdownToggle.className = `btn ${statusClass} dropdown-toggle dropdown-toggle-split`;
                        dropdownToggle.style.borderTopColor = statusButton.style.color; // Cập nhật màu của mũi tên

                        hideStatusOptions(id);
                    } else {
                        alert('Không thể cập nhật trạng thái này.');
                    }
                });
        }

        // Xử lý tình trạng kiểm duyệt
        function tinhKiemDuyet(id, newStatus) {
            if (!confirm('Bạn muốn thay đổi trạng thái kiểm duyệt chứ?')) {
                return;
            }
            fetch(`/admin/sach/tinh-trang-cap-nhat/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({status: newStatus})
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        let trangThaiViet = {
                            'cho_xac_nhan': 'Chờ Xác Nhận',
                            'tu_choi': 'Từ Chối',
                            'duyet': 'Duyệt',
                        };
                        let statusClass = '';
                        switch (newStatus) {
                            case 'cho_xac_nhan':
                                statusClass = 'status-cho_xac_nhan';
                                break;
                            case 'tu_choi':
                                statusClass = 'status-tu_choi';
                                break
                            case 'duyet':
                                statusClass = 'status-duyet';
                                break;
                        }

                        // Cập nhật trạng thái của nút và mũi tên
                        let statusButton = document.querySelector(`#update-${id} .btn`);
                        let dropdownToggle = document.querySelector(`#update-${id} .dropdown-toggle`);

                        statusButton.className = `btn ${statusClass}`;
                        statusButton.textContent = trangThaiViet[newStatus];

                        // Cập nhật màu sắc của mũi tên
                        dropdownToggle.className = `btn ${statusClass} dropdown-toggle dropdown-toggle-split`;
                        dropdownToggle.style.borderTopColor = statusButton.style.color; // Cập nhật màu của mũi tên

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


        /* Màu của nút của Đã Full & Tiếp Tục Cập Nhật */
        .status-da_full {
            background-color: blue; /* Màu xanh cho Đã Full */
            color: #fff;
        }

        .status-tiep_tuc_cap_nhat {
            background-color: orange; /* Màu cam cho Tiếp Tục Cập Nhật */
            color: #fff;
        }

        .status-da_full:hover {
            background-color: blue; /* Màu xanh cho Đã Full */
            color: #fff;
        }

        .status-tiep_tuc_cap_nhat:hover {
            background-color: orange; /* Màu cam cho Tiếp Tục Cập Nhật */
            color: #fff;
        }

        /* Màu nền dropdown cho Đã Full & Tiếp Tục Cập Nhật */
        .status-da_full .dropdown-menu {
            background-color: blue; /* Màu xanh cho Đã Full */
        }

        .status-tiep_tuc_cap_nhat .dropdown-menu {
            background-color: orange; /* Màu cam cho Tiếp Tục Cập Nhật */
        }

        /* Mũi tên của dropdown cho Đã Full & Tiếp Tục Cập Nhật */
        .status-da_full .dropdown-toggle::after,
        .status-tiep_tuc_cap_nhat .dropdown-toggle::after {
            border-top-color: #fff; /* Màu mũi tên trắng */
        }

        /* Màu của nút cho các trạng thái kiểm duyệt */
        .status-cho_xac_nhan {
            background-color: orange; /* Màu vàng cho Chờ Xác Nhận */
            color: #fff;
        }

        .status-tu_choi {
            background-color: #FF0000; /* Màu đỏ cho Từ Chối */
            color: #fff;
        }

        .status-duyet {
            background-color: green; /* Màu xanh cho Duyệt */
            color: #fff;
        }

        .status-ban_nhap {
            background-color: #6c757d; /* Màu xám cho Bản Nháp */
            color: #fff;
        }

        .status-cho_xac_nhan:hover {
            background-color: orange; /* Màu vàng cho Chờ Xác Nhận */
            color: #fff;
        }

        .status-tu_choi:hover {
            background-color: #FF0000; /* Màu đỏ cho Từ Chối */
            color: #fff;
        }

        .status-duyet:hover {
            background-color: green; /* Màu xanh cho Duyệt */
            color: #fff;
        }

        .status-ban_nhap:hover {
            background-color: #6c757d; /* Màu xám cho Bản Nháp */
            color: #fff;
        }

        /* Màu nền dropdown cho các trạng thái kiểm duyệt */
        .status-cho_xac_nhan .dropdown-menu {
            background-color: orange; /* Màu vàng cho Chờ Xác Nhận */
        }

        .status-tu_choi .dropdown-menu {
            background-color: #FF0000; /* Màu đỏ cho Từ Chối */
        }

        .status-duyet .dropdown-menu {
            background-color: green; /* Màu xanh cho Duyệt */
        }

        .status-ban_nhap .dropdown-menu {
            background-color: #6c757d; /* Màu xám cho Bản Nháp */
        }

        /* Mũi tên của dropdown cho các trạng thái kiểm duyệt */
        .status-cho_xac_nhan .dropdown-toggle::after,
        .status-tu_choi .dropdown-toggle::after,
        .status-duyet .dropdown-toggle::after,
        .status-ban_nhap .dropdown-toggle::after {
            border-top-color: #fff; /* Màu mũi tên trắng */
        }

    </style>
@endpush

