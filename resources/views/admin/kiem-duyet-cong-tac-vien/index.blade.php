@extends('admin.layouts.app')
@section('start-point')
    Yêu cầu đăng ký cộng tác viên
@endsection
@section('title')
    Danh sách
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0 flex-grow-1">Danh sách yêu cầu đăng ký cộng tác viên</h4>

                </div><!-- end card header -->

                <div class="card-body">
                    <div id="table-gridjs"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection

@push('styles')
    <!-- Sweet Alert css-->
    <!-- Sweet Alert css-->
    <link href="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
@endpush

@push('scripts')
    <!-- list.js min js -->
    <script src="{{ asset('assets/admin/libs/list.js/list.min.js') }}"></script>

    <!--list pagination js-->
    <script src="{{ asset('assets/admin/libs/list.pagination.js/list.pagination.min.js') }}"></script>



    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- prismjs plugin -->
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>
    <!--  Đây là chỗ hiển thị dữ liệu phân trang -->

    <script>
        document.getElementById("table-gridjs") && new gridjs.Grid({
            columns: [{
                name: "STT",
                hidden: true,
            }, {
                name: "Họ và tên",
                width: "auto",
                formatter: function(e, row) {
                    const id = row.cells[0].data;
                    const detailUrl = "{{ route('chi-tiet-kiem-duyet.show', ':id') }}".replace(':id', id);

                        return gridjs.html(`
                            <div class="flex-grow-1">
                                <span class="fw-semibold">  ${e}</span>
                            </div>
                            <div class="d-flex justify-content-start mt-2">
                                <a href="${detailUrl}" class="btn btn-link p-0">Xem</a>
                            </div>
                        `);
                }
            },
                {
                    name: "Email",
                    width: "auto",
                    formatter: function(e) {
                        return gridjs.html('<a >' + e + "</a>")
                    }
                },
                {
                    name: "Số điện thoại",
                    width: "auto",
                    formatter: function(e) {
                        const formattedPhone = e.replace(/(\d{3})(\d{3})(\d{4})/, '$1 $2 $3');
                        return gridjs.html('<a>' + formattedPhone + '</a>');
                    }
                },
                {
                    name: "Ngày tháng năm sinh",
                    width: "auto",
                    formatter: function(cell) {
                        const date = new Date(cell);
                        const formattedDate = date.toLocaleDateString('vi-VN', {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric'
                        });
                        return gridjs.html(`<a >${formattedDate}</a>`);
                    }
                }, {
                    name: "Trạng thái",
                    width: "auto",
                    formatter: function (lien, row) {
                        let trangThaiViet = {
                            'chua_ho_tro' : 'Chưa hỗ trợ',
                            'duyet' : 'Đã duyệt',
                            'tu_choi' : 'Đã từ chối'
                        };

                        let statusClass = '';
                        switch (lien) {
                            case 'chua_ho_tro':
                                statusClass = 'status-chua_ho_tro';
                                break;
                            case 'duyet':
                                statusClass = 'status-duyet';
                                break;
                            case 'tu_choi':
                                statusClass = 'status-tu_choi';
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
                                        <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'tu_choi')">Đã từ chối</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'duyet')">Đã duyệt</a></li>
                                        <li><a class="dropdown-item" href="#" onclick="changeStatus(${row.cells[0].data}, 'chua_ho_tro')">Chưa hỗ trợ</a></li>
                                   </ul>
                                </div>
                            `);
                    }
                },
            ],
            pagination: {
                limit: 5
            },
            sort: !0,
            search: !0,
            data: [
                    @foreach ($congTacViens as $yeucau)
                [
                    '{{ $yeucau->id }}',
                    '{{ $yeucau->ten_doc_gia }}',
                    '{{ $yeucau->email }}',
                    '{{ $yeucau->so_dien_thoai }}',
                    '{{ $yeucau->sinh_nhat }}',
                    '{{ $yeucau->trang_thai }}',
                ],
                @endforeach
            ]
        }).render(document.getElementById("table-gridjs"));

        function showStatusOptions(id) {
            document.getElementById('status-options-' + id).classList.remove('d-none');
        }

        // Sử lý trỏ chuột
        function hideStatusOptions(id) {
            document.getElementById('status-options-' + id).classList.add('d-none');
        }

        // Sử lý chuyển đổi trạng thái
        function changeStatus(id, newStatus) {
            if (!confirm('Bạn muốn thay đổi trạng thái chứ?')) {
                return;
            }

            fetch(`/admin/kiem-duyet-cong-tac-vien/${id}/update-status`, {
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
                            'tu_choi': 'Đã từ chối',
                            'duyet': 'Đã duyệt',
                            'chua_ho_tro': 'Chưa hỗ trợ'
                        };

                        let statusClass = '';
                        switch (newStatus) {
                            case 'chua_ho_tro':
                                statusClass = 'status-chua_ho_tro';
                                break;
                            case 'duyet':
                                statusClass = 'status-duyet';
                                break;
                            case 'tu_choi':
                                statusClass = 'status-tu_choi';
                                break;
                        }

                        // Cập nhật nút trạng thái và màu sắc dropdown
                        let statusButton = document.querySelector(`#status-${id} .btn`);
                        let dropdownToggle = document.querySelector(`#status-${id} .dropdown-toggle`);

                        statusButton.className = `btn ${statusClass}`;
                        statusButton.textContent = trangThaiViet[newStatus];

                        // Cập nhật màu sắc của mũi tên
                        dropdownToggle.className = `btn ${statusClass} dropdown-toggle dropdown-toggle-split`;
                        dropdownToggle.style.borderTopColor = statusButton.style.color;

                        hideStatusOptions(id);
                    } else {
                        alert(data.message || 'Không thể cập nhật trạng thái này.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Có lỗi xảy ra. Vui lòng thử lại.');
                });
        }

    </script>

    <style>
        /* Màu của nút */
        .status-chua_ho_tro {
            background-color: #ffc107;
            color: #fff;
        }

        .status-duyet {
            background-color: green;
            color: #fff;
        }

        .status-tu_choi {
            background-color: red;
            color: #fff;
        }

        /* Màu hover cho nút */
        .status-chua_ho_tro:hover {
            background-color: #ffc107;
            color: #fff;
        }

        .status-duyet:hover {
            background-color: #28A745;
            color: #fff;
        }

        .status-tu_choi:hover {
            background-color: red;
            color: #fff;
        }

        /* Màu của mũi tên khi chuyển đổi trạng thái */
        .status-chua_ho_tro .dropdown-toggle::after {
            border-top-color: #fff;
        }

        .status-duyet .dropdown-toggle::after {
            border-top-color: #fff;
        }

        .status-tu_choi .dropdown-toggle::after {
            border-top-color: #fff;
        }

        /* Màu nền cho dropdown menu */
        .status-chua_ho_tro .dropdown-menu {
            background-color: #ffc107;
        }

        .status-duyet .dropdown-menu {
            background-color: #28A745;
        }

        .status-tu_choi .dropdown-menu {
            background-color: red;
        }

        .btn-group-sm .btn {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            height: 1.5rem;
        }

        .dropdown-menu {
            font-size: 0.75rem;
        }

        .btn-group-sm .dropdown-menu {
            min-width: 80px;
        }
    </style>

@endpush
