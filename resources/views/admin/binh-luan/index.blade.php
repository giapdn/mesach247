@extends('admin.layouts.app')
@section('start-point')
    Quản lý bình luận
@endsection
@section('title')
    Danh sách bình luận
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <img src="{{ asset('assets/admin/images/about.jpg') }}" alt="">
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
        <!-- end col -->
    </div>
    <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('styles')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/libs/gridjs/theme/mermaid.min.css') }}">
    <style>
        .tooltip-content {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .tooltip-content .tooltip-text {
            visibility: hidden;
            width: 300px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 5px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            top: 125%;
            /* Hiển thị tooltip phía dưới */
            left: 50%;
            margin-left: -150px;
            /* Căn giữa tooltip */
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip-content:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }
    </style>
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
                width: "150px",
                formatter: function(e) {
                    let detailUrl = "{{ route('binh-luan.detail', ':id') }}".replace(':id', e[0]);

                    return gridjs.html(`
                        <span class="fw-semibold">${e[0]}</span>
                        <div class="d-flex justify-content-start mt-2">
                            <a href="${detailUrl}" class="btn btn-link p-0">Xem chi tiết</a> 
                        </div>
                    `);
                }
            }, {
                name: "Độc giả",
                width: "150px",
                formatter: function(e) {
                    return gridjs.html('<span class="fw-semibold">' + e + "</span>")
                }
            }, {
                name: "Bài viết",
                width: "150px",
                formatter: function(e) {
                    return gridjs.html('<span class="fw-semibold">' + e + "</span>")
                }
            }, {
                name: "Nội dung bình luận",
                width: "220px",
                formatter: function(e) {
                    const truncatedText = e.split(' ').slice(0, 10).join(' ') + (e.split(' ').length >
                        10 ? '...' : '');

                    return gridjs.html(`
                    <div class="tooltip-content">
                        <span>${truncatedText}</span>
                        <div class="tooltip-text">${e}</div>
                    </div>
                `);
                }
            }, {
                name: "Ngày bình luận",
                width: "100px",
                formatter: function(e) {
                    return gridjs.html('<span class="fw-semibold">' + e + "</span>")
                }
            }, {
                name: "Trạng thái",
                width: "80px",
                formatter: function(e, row) {
                    return gridjs.html(`
                    <span class="badge ${e == 'hien' ? 'bg-success' : 'bg-danger'} status-toggle" 
                          data-id="${row.cells[0].data}" 
                          data-status="${e}">
                        ${e == 'hien' ? 'Hiển thị' : 'Ẩn'}
                    </span>
                `);
                }
            }],
            pagination: {
                limit: 5
            },
            sort: true,
            search: true,
            data: [
                @foreach ($binhLuans as $binhLuan)
                    [
                        '{{ $binhLuan->id }}',
                        '{{ $binhLuan->user->ten_doc_gia }}',
                        '{{ $binhLuan->baiViet->tieu_de }}',
                        '{{ $binhLuan->noi_dung }}',
                        '{{ \Carbon\Carbon::parse($binhLuan->ngay_binh_luan)->format('d/m/Y') }}',
                        '{{ $binhLuan->trang_thai }}',
                    ],
                @endforeach
            ]
        }).render(document.getElementById("table-gridjs"));

        // Thêm sự kiện click cho các trạng thái
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('status-toggle')) {
                const id = e.target.getAttribute('data-id');
                const currentStatus = e.target.getAttribute('data-status');
                const newStatus = currentStatus === 'hien' ? 'an' : 'hien';

                fetch(`/the-loai/${id}/update-status`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            trang_thai: newStatus
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            // Cập nhật lại giao diện
                            e.target.setAttribute('data-status', newStatus);
                            e.target.classList.toggle('bg-success');
                            e.target.classList.toggle('bg-danger');
                            e.target.innerHTML = newStatus === 'hien' ? 'Hiển thị' : 'Ẩn';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    </script>
@endpush
