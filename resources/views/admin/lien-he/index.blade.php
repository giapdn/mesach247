@extends('admin.layouts.app')
@section('start-point')
    Quản lý liên hệ
@endsection
@section('title')
    Danh sách
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class=" d-flex align-items-center flex-wrap gap-2">
                        <div class="col-3 flex-grow-1">
                            <div class="col-sm-2">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-muted">Sort by: </span>
                                    <select class="form-select mb-0" data-choices data-choices-search-false id="choices-single-default">
                                        <option value="Name">Name</option>
                                        <option value="Company">Company</option>
                                        <option value="Lead">Lead</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="flex-shrink-0">
                            <div class="hstack text-nowrap gap-2">
                                <button class="btn btn-soft-danger material-shadow-none" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                                <button class="btn btn-danger material-shadow-none"><i class="ri-filter-2-line me-1 align-bottom"></i> Filters</button>
                                <button class="btn btn-soft-success material-shadow-none">Import</button>
                                <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-soft-info material-shadow-none"><i class="ri-more-2-fill"></i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <li><a class="dropdown-item" href="#">All</a></li>
                                    <li><a class="dropdown-item" href="#">Last Week</a></li>
                                    <li><a class="dropdown-item" href="#">Last Month</a></li>
                                    <li><a class="dropdown-item" href="#">Last Year</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xxl-9">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="table-gridjs"></div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-3">
            <div class="card" id="contact-view-detail">
                <div class="card-body text-center">
                    <div class="position-relative d-inline-block">
                        <img src="{{ asset('assets/admin/images/users/avatar-10.jpg') }}" alt="" class="avatar-lg rounded-circle img-thumbnail material-shadow">
                        <span class="contact-active position-absolute rounded-circle bg-success"><span class="visually-hidden"></span>
                    </div>
                    <h5 class="mt-4 mb-1">Tonya Noble</h5>
                    <p class="text-muted">Nesta Technologies</p>

                    <ul class="list-inline mb-0">
                        <li class="list-inline-item avatar-xs">
                            <a href="javascript:void(0);" class="avatar-title bg-success-subtle text-success fs-15 rounded">
                                <i class="ri-phone-line"></i>
                            </a>
                        </li>
                        <li class="list-inline-item avatar-xs">
                            <a href="javascript:void(0);" class="avatar-title bg-danger-subtle text-danger fs-15 rounded">
                                <i class="ri-mail-line"></i>
                            </a>
                        </li>
                        <li class="list-inline-item avatar-xs">
                            <a href="javascript:void(0);" class="avatar-title bg-warning-subtle text-warning fs-15 rounded">
                                <i class="ri-question-answer-line"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <h6 class="text-muted text-uppercase fw-semibold mb-3">Personal Information</h6>
                    <p class="text-muted mb-4">Hello, I'm Tonya Noble, The most effective objective is one that is tailored to the job you are applying for. It states what kind of career you are seeking, and what skills and experiences.</p>
                    <div class="table-responsive table-card">
                        <table class="table table-borderless mb-0">
                            <tbody>
                            <tr>
                                <td class="fw-medium" scope="row">Designation</td>
                                <td>Lead Designer / Developer</td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Email ID</td>
                                <td>tonyanoble@velzon.com</td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Phone No</td>
                                <td>414-453-5725</td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Lead Score</td>
                                <td>154</td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Tags</td>
                                <td>
                                    <span class="badge bg-primary-subtle text-primary">Lead</span>
                                    <span class="badge bg-primary-subtle text-primary">Partner</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-medium" scope="row">Last Contacted</td>
                                <td>15 Dec, 2021 <small class="text-muted">08:58AM</small></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
@endsection

@push('styles')
    <link href="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">


@endpush
@push('scripts')
    <!-- list.js min js -->
    <script src="{{ asset('assets/admin/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('assets/admin/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <script src="{{ asset('assets/admin/js/pages/crm-contact.init.js') }}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('assets/admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- prismjs plugin -->
    <script src="{{ asset('assets/admin/libs/prismjs/prism.js') }}"></script>

    <!-- gridjs js -->
    <script src="{{ asset('assets/admin/libs/gridjs/gridjs.umd.js') }}"></script>
    <!--  Đây là chỗ hiển thị dữ liệu phân trang -->
    <script>
        document.getElementById("table-gridjs") && fetch("{{ route('data-sach.index') }}")
            .then(response => response.json())
            .then(data => {
                const gridData = data.map(item => [
                    item.id,
                    item.ten_sach,
                    item.anh_bia_sach,
                    item.gia_goc,
                    item.ngay_dang,
                    item.the_loai_id,
                    item.so_luong_da_ban,
                    item.trang_thai,
                ]);
                new gridjs.Grid({
                    columns: [
                        { name: "ID", width: "80px" },
                        { name: "Tiêu đề sách", width: "150px",
                            formatter: function (e) {
                                return gridjs.html(` <b>${e}</b>
                                <div class="d-flex justify-content-start mt-2">
                                    <a href="{{ route('sach1.edit') }}" class="btn btn-link p-0">Sửa |</a>
                                    <a href="{{ route('sach1.detail') }}" class="btn btn-link p-0">Xem |</a>
                                    <a href="#" class="btn btn-link p-0 text-danger">Xóa</a>
                                </div>
                            `);
                            }
                        },
                        { name: "Ảnh bìa", width: "100px",
                            formatter: function (e) {
                                return gridjs.html(`<img src="${e}" alt="User Image" width="50px">`);
                            }
                        },
                        { name: "Giá gốc", width: "70px",
                            formatter: function (e) {
                                return gridjs.html(`<div class="text-danger">${e}</div>`);
                            }
                        },
                        { name: "Ngày đăng", width: "180px",
                        },
                        { name: "Đã bán", width: "100px" },
                        { name: "Trạng thái", width: "70px",
                            formatter: function (e) {
                                return gridjs.html(`<div class="badge bg-success">${e}</div>`);
                            }
                        },
                    ],
                    pagination: { limit: 5 },
                    sort: true,
                    search: true,
                    data: gridData
                }).render(document.getElementById("table-gridjs"));
            })
            .catch(error => console.error('Error:', error));
    </script>
@endpush
