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
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5 class="fs-16">Thêm thể loại mới</h5>

                            <!-- Thông báo khi thêm thành công -->
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="ri-notification-off-line label-icon"></i>
                                    <strong class="fs-5">{{ session('success') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <!-- Thông báo khi thêm thất bại -->
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="ri-error-warning-line label-icon"></i>
                                    <strong class="fs-5">Thất bại</strong>
                                    <strong class="d-block">Vui lòng kiểm tra các lỗi sau:</strong>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush filter-accordion">
                    <div class="card-body border-bottom">
                        <form action="{{ route('the-loai.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Tên thể loại </label>
                                <input class="form-control @error('ten_the_loai') is-invalid @enderror" type="text" name="ten_the_loai" value="{{ old('ten_the_loai') }}">
                            </div>
                            <div class=" mt-3">
                                <label class="form-label">Ảnh đại diện</label>
                                <input class="form-control @error('anh_the_loai') is-invalid @enderror" type="file" name="anh_the_loai">
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Mô tả ngắn </label>
                                <textarea class="form-control @error('mo_ta') is-invalid @enderror"  id="" cols="15" rows="3" name="mo_ta">{{ old('mo_ta') }}</textarea>
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Trạng thái @error('trang_thai') is-invalid @enderror</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3">
                                    <input type="hidden" name="trang_thai" id="trang_thai_hidden" value="Ẩn">
                                </div>
                            </div>
                            <div class="filter-choices-input mt-3">
                                <button type="submit" class="btn btn-sm btn-success">Thêm mới</button>
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

        document.addEventListener('DOMContentLoaded', function() {
            var checkbox = document.getElementById('SwitchCheck3');
            var hiddenInput = document.getElementById('trang_thai_hidden');
            hiddenInput.value = checkbox.checked ? 'Hiện' : 'Ẩn';
            checkbox.addEventListener('change', function() {
                hiddenInput.value = checkbox.checked ? 'Hiện' : 'Ẩn';
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            var theLoais = @json($theLoais);
            new gridjs.Grid({
                columns: [
                    { name: "ID", width: "40px",
                        formatter: function (param, row) {
                            var id = row.cells[0].data;
                            var editUrl = `{{ route('the-loai.edit', ':id') }}`.replace(':id', id);
                            var detailUrl = `{{ route('the-loai.show', ':id') }}`.replace(':id', id);
                            var deleteUrl = `{{ route('the-loai.destroy', ':id') }}`.replace(':id', id);
                            return gridjs.html(` <b>${param}</b>
                                <div class="d-flex justify-content-start mt-2">
                                    <a href="${editUrl}" class="btn btn-link p-0">Sửa |</a>
                                    <a href="${detailUrl}" class="btn btn-link p-0">Xem |</a>
                                    <form action="${deleteUrl}" method="post">
                                    @csrf
                                    @method('delete')
                                     <button type="submit" class="btn btn-link p-0 text-danger" onclick="return confirm('Bạn có muốn xóa!')">Xóa</button>
                                    </form>
                                </div>
                    `);
                        }},
                    { name: "Tiêu thể loại", width: "80px",
                    },
                    { name: "Ảnh thể loại", width: "50px",
                        formatter: function (param) {
                            return gridjs.html(`<img src="{{ Storage::url('${param}') }}" alt="User Image" width="50px">`);
                        }
                    },
                    { name: "Thời gian sửa", width: "60px",
                        formatter: function (param) {
                            const date = new Date(param);
                            return `${date.getDate().toString().padStart(2, '0')}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getFullYear()}`;
                        },
                    },
                    { name: "Thời gian sửa", width: "60px",
                        formatter: function (param) {
                            const date = new Date(param);
                            return `${date.getDate().toString().padStart(2, '0')}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getFullYear()}`;
                        }
                    },
                    { name: "Trạng thái", width: "50px",
                        formatter: function (param) {
                            return gridjs.html(`<div class="fs-6 badge ${param === 'hien' ? 'bg-success' : 'bg-danger'}">${param  === 'hien' ? 'Hiện' : 'Ẩn'}</div>`);
                        }
                    },
                ],
                data: theLoais.map(function(item) {
                    return [
                        item.id,
                        item.ten_the_loai,
                        item.anh_the_loai,
                        item.created_at,
                        item.updated_at,
                        item.trang_thai,
                    ];
                }),
                pagination: { limit: 5 },
                sort: true,
                search: true,
            }).render(document.getElementById("table-gridjs"));
        });
    </script>
@endpush

