@extends('admin.layouts.app')

@section('start-point')
    Quản lý chuyên mục
@endsection

@section('title')
    Danh sách chuyên mục
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h5 class="fs-16">Thêm chuyên mục mới</h5>
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush filter-accordion">
                    <div class="card-body border-bottom">
                        <form id="chuyenmucForm" action="{{ route('chuyenmuc.store') }}" method="post">
                            @csrf
                            <div class="filter-choices-input">
                                <label class="form-label">Tên chuyên mục</label>
                                <input id="ten_chuyen_muc" name="ten_chuyen_muc" class="form-control" type="text">
                                <div id="ten_chuyen_muc_error" class="text-danger" style="display: none;">Tên chuyên mục không được để trống.</div>
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Chuyên mục cha ID (nếu có)</label>
                                <input id="chuyen_muc_cha_id" name="chuyen_muc_cha_id" class="form-control" type="number">
                                <div id="chuyen_muc_cha_id_error" class="text-danger" style="display: none;"></div>
                            </div>
                            <div class="filter-choices-input mt-3">
                                <button type="submit" class="btn btn-sm btn-success">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- end col -->

        <div class="col-xl-9 col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0 flex-grow-1">Danh sách chuyên mục</h4>
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
        document.getElementById("table-gridjs") && new gridjs.Grid({
            columns: [{
                    name: "ID",
                    width: "80px",
                    formatter: function(id) {
                        return gridjs.html(`
                            <span class="fw-semibold">${id}</span>
                            <div class="d-flex justify-content-start mt-2">
<a href="/chuyen-muc/${id}/edit" class="btn btn-link p-0">Sửa</a> |
<a href="/chuyen-muc/${id}/detail" class="btn btn-link p-0">Xem</a> |
<a href="/chuyen-muc/${id}/delete" class="btn btn-link p-0 text-danger" 
   onclick="return confirm('Bạn chắc chắn muốn xóa chuyên mục này?') && deleteChuyenMuc(${id})">Xóa</a>

                            </div>
                        `);
                    }
                },
                {
                    name: "Tên chuyên mục",
                    width: "150px",
                    formatter: (e) => gridjs.html(e)
                },
                {
                    name: "Chuyên mục cha ID",
                    width: "150px",
                    formatter: (e) => gridjs.html(e || "Không có")
                },
                {
                    name: "Ngày tạo",
                    width: "200px",
                    formatter: (e) => gridjs.html(e)
                }
            ],
            pagination: {
                limit: 5
            },
            sort: true,
            search: true,
            data: {!! json_encode(
                $chuyenMucs->map(function ($chuyenMuc) {
                    return [
                        $chuyenMuc->id,
                        $chuyenMuc->ten_chuyen_muc,
                        $chuyenMuc->chuyen_muc_cha_id,
                        $chuyenMuc->created_at->format('Y-m-d H:i:s'),
                        $chuyenMuc->id,
                    ];
                }),
            ) !!}
        }).render(document.getElementById("table-gridjs"));

        function confirmDelete(id) {
            if (confirm('Bạn có chắc muốn xóa chuyên mục này không?')) {
                // Thực hiện xóa chuyên mục
                window.location.href = `{{ route('chuyenmuc.destroy', '') }}/${id}`;
            }
        }
    </script>
<script>
    document.getElementById('chuyenmucForm').addEventListener('submit', function(event) {
    var isValid = true;

    // Xóa thông báo lỗi cũ
    document.getElementById('ten_chuyen_muc_error').style.display = 'none';
    document.getElementById('chuyen_muc_cha_id_error').style.display = 'none';

    // Lấy giá trị từ các trường
    var tenChuyenMuc = document.getElementById('ten_chuyen_muc').value.trim();
    var chuyenMucChaId = document.getElementById('chuyen_muc_cha_id').value.trim();

    // Kiểm tra tên chuyên mục
    if (tenChuyenMuc === '') {
        document.getElementById('ten_chuyen_muc_error').style.display = 'block';
        isValid = false;
    }

    // Kiểm tra chuyên mục cha ID (nếu có)
    if (chuyenMucChaId !== '' && isNaN(chuyenMucChaId)) {
        document.getElementById('chuyen_muc_cha_id_error').textContent = 'Chuyên mục cha ID phải là số.';
        document.getElementById('chuyen_muc_cha_id_error').style.display = 'block';
        isValid = false;
    }

    // Nếu không hợp lệ, ngăn gửi form
    if (!isValid) {
        event.preventDefault();
    }
});

</script>
@endpush