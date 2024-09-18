@extends('admin.layouts.app')
@section('start-point')
    Quản lý sách
@endsection
@section('title')
    Chi tiết
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
                                    <div class="swiper-wrapper">
                                        <img src="{{ asset('assets/admin/images/products/img-8.png') }}" alt="" class="img-fluid d-block" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->

                        <div class="col-xl-8">
                            <div class="mt-xl-0 mt-5">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <h4>1001 cách kiếm tiền nhanh nhất</h4>
                                        <div class="hstack gap-3 flex-wrap">
                                            <div class="text-muted">Tác giả : <a href="#" class="text-primary">Tuannm4204</a></div>
                                            <div></div>
                                            <div class="text-muted">Thể loại : <span class="text-body fw-medium">làm giàu =)) </span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Ngày đăng : <span class="text-body fw-medium">11-11-2111</span></div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div>
                                            <a href="{{ route('sach1.edit') }}" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap gap-2 align-items-center mt-3">
                                    <div class="text-muted fs-16">
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                    </div>
                                    <div class="text-muted">( 9.9k lượt đánh giá )</div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                        <i class="ri-money-dollar-circle-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">Giá gốc:</p>
                                                    <h5 class="mb-0">$120.40</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                        <i class="ri-file-copy-2-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">Số lượng đã bán :</p>
                                                    <h5 class="mb-0">2,234</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                        <i class="ri-stack-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">Lượt xem :</p>
                                                    <h5 class="mb-0">1,230</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="p-2 border border-dashed rounded">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    <div class="avatar-title rounded bg-transparent text-success fs-24">
                                                        <i class="ri-inbox-archive-fill"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="text-muted mb-1">Tổng doanh thu :</p>
                                                    <h5 class="mb-0">$60,645</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <div class="mt-4 text-muted">
                                    <h5 class="fs-14">Mô tả ngắn :</h5>
                                    <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material composition is 100% organic cotton. This is one of the world’s leading designer lifestyle brands and is internationally recognized for celebrating the essence of classic American cool style, featuring preppy with a twist designs.</p>
                                </div>

                                <div class="mt-4 text-muted">
                                    <h5 class="fs-14">Mô tả chi tiết :</h5>
                                    <p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material composition is 100% organic cotton. This is one of the world’s leading designer lifestyle brands and is internationally recognized for celebrating the essence of classic American cool style, featuring preppy with a twist designs
                                    Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material composition is 100% organic cotton. This is one of the world’s leading designer lifestyle brands and is internationally recognized for celebrating the essence of classic American cool style, featuring preppy with a twist designs.</p>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mt-3">
                                            <h5 class="fs-14">Trạng thái :</h5>
                                            <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                <input type="checkbox" class="form-check-input" id="customSwitchsizelg" checked="">
                                                <label class="form-check-label" for="customSwitchsizelg">Ẩn / Hiện</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <h5 class="fs-14">Danh sách chương :</h5>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="table-gridjs"></div>
                                                </div><!-- end card-body -->
                                            </div><!-- end card -->
                                        </div>
                                        <!-- end col -->
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <div>
                                        <h5 class="fs-14 mb-3">Đánh giá :</h5>
                                    </div>
                                    <div class="row gy-4 gx-0">
                                        <div class="col-lg-4">
                                            <div>
                                                <div class="pb-3">
                                                    <div class="bg-light px-3 py-2 rounded-2 mb-2">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-grow-1">
                                                                <div class="fs-16 align-middle text-warning">
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-fill"></i>
                                                                    <i class="ri-star-half-fill"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <h6 class="mb-0">4.5 out of 5</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <div class="text-muted">Total <span class="fw-medium">5.50k</span> lượt đánh giá
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-3">
                                                    <div class="row align-items-center g-2">
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0">5 star</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-2">
                                                                <div class="progress animated-progress progress-sm">
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50.16%" aria-valuenow="50.16" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0 text-muted">2758</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->

                                                    <div class="row align-items-center g-2">
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0">4 star</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-2">
                                                                <div class="progress animated-progress progress-sm">
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 19.32%" aria-valuenow="19.32" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0 text-muted">1063</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->

                                                    <div class="row align-items-center g-2">
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0">3 star</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-2">
                                                                <div class="progress animated-progress progress-sm">
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 18.12%" aria-valuenow="18.12" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0 text-muted">997</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->

                                                    <div class="row align-items-center g-2">
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0">2 star</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-2">
                                                                <div class="progress animated-progress progress-sm">
                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 7.42%" aria-valuenow="7.42" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0 text-muted">408</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->

                                                    <div class="row align-items-center g-2">
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0">1 star</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-2">
                                                                <div class="progress animated-progress progress-sm">
                                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 4.98%" aria-valuenow="4.98" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="p-2">
                                                                <h6 class="mb-0 text-muted">274</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->

                                        <div class="col-lg-8">
                                            <div class="ps-lg-4">
                                                <div class="d-flex flex-wrap align-items-start gap-3">
                                                    <h5 class="fs-14">Đánh giá: </h5>
                                                </div>

                                                <div class="me-lg-n3 pe-lg-4" data-simplebar style="max-height: 225px;">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="py-2">
                                                            <div class="border border-dashed rounded p-3">
                                                                <div class="d-flex align-items-start mb-3">
                                                                    <div class="hstack gap-3">
                                                                        <div class="badge rounded-pill bg-success mb-0">
                                                                            <i class="mdi mdi-star"></i> 4.2
                                                                        </div>
                                                                        <div class="vr"></div>
                                                                        <div class="flex-grow-1">
                                                                            <p class="text-muted mb-0"> Superb sweatshirt. I loved it. It is for winter.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex flex-grow-1 gap-2 mb-3">
                                                                    <a href="#" class="d-block">
                                                                        <img src="{{ asset('assets/admin/images/small/img-12.jpg') }}" alt="" class="avatar-sm rounded object-fit-cover material-shadow">
                                                                    </a>
                                                                    <a href="#" class="d-block">
                                                                        <img src="{{ asset('assets/admin/images/small/img-11.jpg') }}" alt="" class="avatar-sm rounded object-fit-cover material-shadow">
                                                                    </a>
                                                                    <a href="#" class="d-block">
                                                                        <img src="{{ asset('assets/admin/images/small/img-10.jpg') }}" alt="" class="avatar-sm rounded object-fit-cover material-shadow">
                                                                    </a>
                                                                </div>

                                                                <div class="d-flex align-items-end">
                                                                    <div class="flex-grow-1">
                                                                        <h5 class="fs-14 mb-0">Henry</h5>
                                                                    </div>

                                                                    <div class="flex-shrink-0">
                                                                        <p class="text-muted fs-13 mb-0">12 Jul, 21</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="py-2">
                                                            <div class="border border-dashed rounded p-3">
                                                                <div class="d-flex align-items-start mb-3">
                                                                    <div class="hstack gap-3">
                                                                        <div class="badge rounded-pill bg-success mb-0">
                                                                            <i class="mdi mdi-star"></i> 4.0
                                                                        </div>
                                                                        <div class="vr"></div>
                                                                        <div class="flex-grow-1">
                                                                            <p class="text-muted mb-0"> Great at this price, Product quality and look is awesome.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-end">
                                                                    <div class="flex-grow-1">
                                                                        <h5 class="fs-14 mb-0">Nancy</h5>
                                                                    </div>

                                                                    <div class="flex-shrink-0">
                                                                        <p class="text-muted fs-13 mb-0">06 Jul, 21</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li class="py-2">
                                                            <div class="border border-dashed rounded p-3">
                                                                <div class="d-flex align-items-start mb-3">
                                                                    <div class="hstack gap-3">
                                                                        <div class="badge rounded-pill bg-success mb-0">
                                                                            <i class="mdi mdi-star"></i> 4.2
                                                                        </div>
                                                                        <div class="vr"></div>
                                                                        <div class="flex-grow-1">
                                                                            <p class="text-muted mb-0">Good product. I am so happy.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-end">
                                                                    <div class="flex-grow-1">
                                                                        <h5 class="fs-14 mb-0">Joseph</h5>
                                                                    </div>

                                                                    <div class="flex-shrink-0">
                                                                        <p class="text-muted fs-13 mb-0">06 Jul, 21</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li class="py-2">
                                                            <div class="border border-dashed rounded p-3">
                                                                <div class="d-flex align-items-start mb-3">
                                                                    <div class="hstack gap-3">
                                                                        <div class="badge rounded-pill bg-success mb-0">
                                                                            <i class="mdi mdi-star"></i> 4.1
                                                                        </div>
                                                                        <div class="vr"></div>
                                                                        <div class="flex-grow-1">
                                                                            <p class="text-muted mb-0">Nice Product, Good Quality.</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex align-items-end">
                                                                    <div class="flex-grow-1">
                                                                        <h5 class="fs-14 mb-0">Jimmy</h5>
                                                                    </div>

                                                                    <div class="flex-shrink-0">
                                                                        <p class="text-muted fs-13 mb-0">24 Jun, 21</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end Ratings & Reviews -->
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
                name: "Chương", width: "80px", formatter: function (e) {
                    return gridjs.html('<span class="fw-semibold">' + e + "</span>")
                }
            }, {name: "Tiêu đề chương", width: "150px",
                formatter: function (e) {
                    return gridjs.html('<a href="#">' + e + "</a>")
                }

            }
                ],
            pagination: {limit: 5},
            sort: !0,
            search: !0,
            data: [["Chương 1", "Khởi đầu"],
                ["Chương 2", "Khởi đầu"],
                ["Chương 3", "Khởi đầu"],
                ["Chương 4", "Khởi đầu"],
                ["Chương 5", "Khởi đầu"],
                ["Chương 6", "Khởi đầu"],


            ]
        }).render(document.getElementById("table-gridjs"));
    </script>
@endpush
