@extends('admin.layouts.app')
@section('start-point')
    Quản lý chương
@endsection
@section('title')
    Danh sách chương
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Danh sách Chương</h4>
                        <div class="flex-shrink-0">
                            <form action="{{ route('chuong.index') }}" method="GET" id="filterForm">
                                <div class="row d-flex">
                                    <div class="col-lg-7">
                                        <select class="form-select" name="kiem_duyet" id="kiemDuyetSelect">
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
                                    <div class="col-lg-5">
                                        <select class="form-select" name="trang_thai" id="trangThaiSelect">
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
                            </form>
                        </div>
                        <script>
                            document.getElementById('kiemDuyetSelect').addEventListener('change', function () {
                                document.getElementById('filterForm').submit();
                            });

                            document.getElementById('trangThaiSelect').addEventListener('change', function () {
                                document.getElementById('filterForm').submit();
                            });
                        </script>

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
            var chuongs = @json($chuongs);
            var canKiemDuyet = @json(Auth::user()->hasPermission('sach-kiemDuyet'));
            var canAnHien = @json(Auth::user()->hasPermission('sach-anHien'));
            new gridjs.Grid({
                columns: [
                    {name: "ID", hidden: true},
                    {
                        name: "Số chương", width: "auto",
                        formatter: function (param, row) {
                            var id = row.cells[0].data;
                            var sachId = row.cells[4].data;
                            var detailUrl = `{{ route('chuong.show', ['sach' => ':sachId', 'chuong' => ':id']) }}`.replace(':sachId', sachId).replace(':id', id);
                            // console.log(detailUrl);  // Xem URL được tạo ra
                            return gridjs.html(` <b>Chương ${param}</b>
                                                            <div class="d-flex justify-content-start mt-2">
                                                                <a href="${detailUrl}" class="btn btn-link p-0">Xem</a>
                                                            </div>
                                `);
                        }
                    },
                    {name: "Tiêu đề chương", width: "auto"},
                    {
                        name: "Sách", width: "auto",
                        formatter: function (param, row) {
                            var sachId = row.cells[4].data;
                            var detailUrl = `{{ route('sach.show', ':id') }}`.replace(':id', sachId);
                            return gridjs.html(` <b>${param}</b>
                                                            <div class="d-flex justify-content-start mt-2">
                                                                <a href="${detailUrl}" class="btn btn-link p-0">Xem</a>
                                                            </div>
                                `);
                        }
                    },
                    {name: "ID sách", hidden: true},
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
                data: chuongs.map(function (item) {
                    return [
                        item.id,
                        item.so_chuong,
                        item.tieu_de,
                        item.sach.ten_sach,
                        item.sach_id,
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
            fetch(`/admin/chuong/an-hien/${id}`, {
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

        // Xử lý tình trạng kiểm duyệt
        function tinhKiemDuyet(id, newStatus) {
            if (!confirm('Bạn muốn thay đổi trạng thái kiểm duyệt chứ?')) {
                return;
            }
            fetch(`/admin/chuong/tinh-trang-cap-nhat/${id}`, {
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

