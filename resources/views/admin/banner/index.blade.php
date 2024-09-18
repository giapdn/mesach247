@extends('admin.layouts.app')
@section('start-point')
    Quản lý banner
@endsection
@section('title')
    Danh sách banner
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h5 class="fs-16">Thêm banner mới</h5>
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush filter-accordion">
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
                                <label for="hinh_anh">Ảnh Banner:</label>
                                <input type="file" name="hinh_anh" class="form-control">
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
                width: "150px",
                formatter: function(e) {
                    let detailUrl = "{{ route('banner.detail', ':id') }}".replace(':id', e);
                    let editUrl = "{{ route('banner.edit', ':id') }}".replace(':id', e);
                    let deleteUrl = "{{ route('banner.destroy', ':id') }}".replace(':id', e);

                    return gridjs.html(`
                        <span class="fw-semibold">${e}</span>
                        <div class="d-flex justify-content-start mt-2">
                            <a href="${detailUrl}" class="btn btn-link p-0">Xem</a> |
                            <a href="${editUrl}" class="btn btn-link p-0">Sửa</a> | 
                            <button class="btn btn-link p-0 text-danger" onclick="deleteBanner('${deleteUrl}')">Xóa</button>
                        </div>
                    `);
                }

            }, {
                name: "Ảnh",
                width: "180px",
                formatter: function(e) {
                    return gridjs.html(`<img src="${e}" alt="Ảnh" width="100px" height="50px">`);
                }
            }, {
                name: "Nội dung",
                width: "220px",
            }, {
                name: "Loại banner",
                width: "150px",
                formatter: function(e) {
                    return gridjs.html('<span class="fw-semibold"> ' + e + "</span>");
                }
            }, {
                name: "Trạng thái",
                width: "100px",
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
            data: banners.map(banner => [
                banner.id,
                "{{ Storage::url('') }}" + banner.hinh_anh,
                banner.noi_dung,
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

        // Thêm sự kiện click cho các trạng thái
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('status-toggle')) {
                const id = e.target.getAttribute('data-id');
                const currentStatus = e.target.getAttribute('data-status');
                const newStatus = currentStatus === 'hien' ? 'an' : 'hien';

                fetch(`/banner/${id}/update-status`, {
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
