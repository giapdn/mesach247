@extends('admin.layouts.app')
@section('start-point')
    Quản lý sách
@endsection
@section('title')
    Chi tiết thể loại
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row gx-lg-5">
                        <div class="col-xl-4 col-md-8 mx-auto">
                            <div class="product-img-slider sticky-side-div">
                                <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                    <img src="{{ Storage::url($theLoai->anh_the_loai) }}" alt="" class="img-fluid d-block" />
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-8">
                            <div class="mt-xl-0 mt-5">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h4>{{ $theLoai->ten_the_loai }}</h4>
                                        <div class="hstack gap-3 flex-wrap">
                                            <div class="vr"></div>
                                            <div class="text-muted">Mã thể loại : <span class="text-body fw-medium">#000{{ $theLoai->id }}</span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Ngày tạo : <span class="text-body fw-medium"> {{ optional($theLoai->created_at)->format('d-m-Y') ?? 'Không có dữ liệu' }}</span></div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div>
                                            <a href="{{ route('the-loai.edit', $theLoai->id) }}" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 text-muted">
                                    <h5 class="fs-14">Mô tả :</h5>
                                    <p>{{ $theLoai->mo_ta }}</p>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mt-3">
                                            <h5 class="fs-14">Trạng thái :</h5>
                                            <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                <input disabled class="form-check-input @error('trang_thai') is-invalid @enderror" type="checkbox" role="switch" id="SwitchCheck3"
                                                    {{ old('trang_thai', $theLoai->trang_thai) === 'hien' ? 'checked' : '' }}>
                                                <input type="hidden" name="trang_thai" id="trang_thai_hidden" value="{{ old('trang_thai', $theLoai->trang_thai) }}">
                                                <label class="form-check-label" for="SwitchCheck3">Ẩn / Hiện</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                                <h5 class="fs-14">Danh sách các sách thuộc thể loại :</h5>
                                        <div class="card-body">
                                            <div id="table-gridjs"></div>
                                        </div>

                                        </div>
                                    </div>
                                    </div>

                                </div>

                                <!-- end card body -->
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection

@push('styles')
    <!--Swiper slider css-->
<link href="{{ asset('assets/admin/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
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
            var saches = @json($saches);
            new gridjs.Grid({
            columns: [
        {  name: "ID", hidden: true },
        { name: "Tiêu đề sách", width: "150px",
            formatter: function (param, row) {
            var id = row.cells[0].data;
            var detailUrl = `{{ route('sach.show', ':id') }}`.replace(':id', id);
            return gridjs.html(`<b>${param}</b>
                            <div class="d-flex justify-content-start mt-2">
                                <a href="${detailUrl}" class="btn btn-link p-0">Xem Sách</a>
                            </div>
                        `);
        }
        },
        { name: "Ảnh bìa", width: "100px",
            formatter: function (e) {
            return gridjs.html(`<img src="${e}" alt="Bìa sách" width="50px">`);
        }
        },
        { name: "Giá gốc", width: "70px",
            formatter: function (e) {
            return gridjs.html(`<div class="text-danger">${e}</div>`);
        }
        },
        { name: "Tác giả", width: "100px" },
        { name: "Trạng thái", width: "70px",
            formatter: function (e) {
            var colorClass = e === 'Hiện' ? 'bg-success' : 'bg-danger';
            return gridjs.html(`<div class="badge ${colorClass}">${e}</div>`);
        }
        },
            ],
            data: saches.map(function(item) {
            return [
            item.id,
            item.ten_sach,
            item.anh_bia_sach,
            item.gia_goc,
            item.tac_gia,
            item.trang_thai === 'hien' ? 'Hiện' : 'Ẩn',
            ];
        }),
            pagination: { limit: 5 },
            sort: true,
            search: true,
        }).render(document.getElementById("table-gridjs"));
        });
    </script>

@endpush
