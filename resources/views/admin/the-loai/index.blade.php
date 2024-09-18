@extends('admin.layouts.app')
@section('start-point')
    Quản lý thể loại
@endsection
@section('title')
    Danh sách thể loại
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h5 class="fs-16">Thêm thể loại mới</h5>
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush filter-accordion">
                    <div class="card-body border-bottom">
                        <form action="" method="post">
                            <div class="filter-choices-input">
                                <label class="form-label">Mã thể loại</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Tên thể loại</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Ảnh đại diện</label>
                                <input class="form-control" type="file">
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Mô tả</label>
                                <input class="form-control" type="text">
                            </div>
                            <label class="form-check-label mt-3" for="SwitchCheck3">Trạng thái</label>
                            <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3">
                            </div>
                            <div class="filter-choices-input mt-3">
                                <button type="submit" class="btn btn-sm btn-success">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-9 col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0 flex-grow-1">Danh sách </h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="table-gridjs"></div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
        </div>
        <!-- end col -->        </div>
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
        document.getElementById("table-gridjs") && new gridjs.Grid({
            columns: [{
                name: "ID", width: "80px", formatter: function (e) {
                    return gridjs.html('<span class="fw-semibold">' + e + "</span>")
                }
            }, {name: "Họ và tên", width: "150px",
                formatter: function (e) {
                    return gridjs.html(` ${e}
                    <div class="d-flex justify-content-start mt-2">
                        <a href="{{ route('the-loai.edit') }}" class="btn btn-link p-0">Sửa |</a>
                        <a href="{{ route('the-loai.detail') }}" class="btn btn-link p-0">Xem |</a>
                        <a href="#" class="btn btn-link p-0 text-danger">Xóa</a>
                    </div>
                `);
                }
            }, {
                name: "Email", width: "220px", formatter: function (e) {
                    return gridjs.html('<a href="">' + e + "</a>")
                }
            }, {name: "Ảnh",
                width: "100px",
                formatter: function (e) {
                    return gridjs.html(`<img src="{{ asset('${e}') }}" alt="" width="50px">`)
                }
            }, {name: "Company", width: "180px"}, {
                name: "Country",
                width: "180px",
                formatter: function (e) {
                    return gridjs.html('<span class="badge bg-success-subtle text-success">' + e + "</span>")
                }
            },],
            pagination: {limit: 10},
            sort: !0,
            search: !0,
            data: [["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck AInc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],
                ["01", "Jonathan", "jonathan@example.com", "assets/admin/images/about.jpg", "Hauck Inc", "Holy See"],

            ]
        }).render(document.getElementById("table-gridjs"));
    </script>
@endpush

