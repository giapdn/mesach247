@extends('admin.layouts.app')
@section('start-point')
    Yêu cầu tút tiền
@endsection
@section('title')
    Danh sách
@endsection
@section('content')
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
                    name: "Mã đơn",
                    width: "auto",
                    formatter: function(e, row) {
                        const id = row.cells[0].data;
                        const detailUrl = "{{ route('don-hang.detail', ':id') }}".replace(':id', id);

                        return gridjs.html(`
                        <div class="flex-grow-1">
                            <span class="fw-semibold">  ${e}</span>
                        </div>
                        <div class="d-flex justify-content-start mt-2">
                            <a href="${detailUrl}" class="btn btn-link p-0">Xem</a>
                        </div>
                    `);
                    }
                }, {
                    name: "Họ và tên",
                    width: "auto",

                },
                {
                    name: "Email",
                    width: "auto",
                    formatter: function(e) {
                        return gridjs.html('<a >' + e + "</a>")
                    }
                },
                {
                    name: "Sách",
                    width: "auto",
                    formatter: function(e) {
                        return gridjs.html('<a >' + e + "</a>")
                    }
                },
                {
                    name: "Số tiền",
                    width: "auto",
                    formatter: function(e) {
                        const formattedPrice = Number(e).toLocaleString('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        });

                        return gridjs.html('<a >' + formattedPrice + '</a>');
                    }
                },
                {
                    name: "Phương thức",
                    width: "auto",
                    formatter: function(e) {
                        return gridjs.html('<a >' + e + "</a>")
                    }
                },
                {
                    name: "Trạng thái",
                    width: "auto",
                    formatter: function(e) {
                        let colorClass = '';
                        let xuLy = '';
                        switch (e) {
                            case 'thanh_cong':
                                colorClass = 'bg-success text-white fs-6';
                                xuLy = 'Thành Công';
                                break;
                            case 'dang_xu_ly':
                                colorClass = 'bg-primary  text-white fs-6';
                                xuLy = 'Đang xử lí';
                                break;
                            case 'that_bai':
                                colorClass = 'bg-danger text-white fs-6';
                                xuLy = 'Thất bại';
                                break;
                            default:
                                colorClass = 'bg-secondary text-white fs-6';
                        }
                        return gridjs.html(
                            `<span class="badge ${colorClass} ">${xuLy}</span>`
                        );
                        return gridjs.html('<a href="">' + e + "</a>")
                    }
                },
            ],
            pagination: {
                limit: 5
            },
            sort: !0,
            search: !0,
            data: [
                @for ($i = 1; $i <= 10; $i++)
                    [
                        1,
                        ' aaaa ',
                        ' aaaa ',
                        ' aaaa ',
                        ' aaaa ',
                        ' aaaa ',
                    ],
                @endfor
            ]
        }).render(document.getElementById("table-gridjs"));
    </script>
@endpush
