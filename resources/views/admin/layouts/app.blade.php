<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
      data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    <meta charset="utf-8"/>
    <title>Quản trị</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">

    <!-- jsvectormap css -->
    <link href="{{ asset('assets/admin/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet"
          type="text/css"/>

    <!--Swiper slider css-->
    <link href="{{ asset('assets/admin/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .loader-container {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            visibility: visible; /* Hiển thị loader */
        }

        .loader {
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            animation: openCloseHorizontal 2s infinite ease-in-out; /* Hiệu ứng đóng mở ngang */
        }

        .loader img {
            width: 100%; /* Căn chỉnh kích thước ảnh */
            transform-origin: center; /* Đặt gốc biến đổi ở giữa ảnh */
        }

        @keyframes openCloseHorizontal {
            0%, 100% {
                transform: scaleX(1); /* Ảnh ở trạng thái mở hoàn toàn */
            }
            50% {
                transform: scaleX(0.1); /* Ảnh bị nén ngang (đóng lại) */
            }
        }
    </style>
    @vite(['resources/js/server.js'])
    @stack('styles')
    @include('components.font')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="{{ asset('assets/admin/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- custom Css-->
    <link href="{{ asset('assets/admin/css/custom.min.css') }}" rel="stylesheet" type="text/css"/>

    {{--    <style>--}}
    {{--        * {--}}
    {{--            font-family: "Fira Sans", sans-serif;--}}
    {{--            font-weight: 400 ;--}}
    {{--            font-style: normal ;--}}
    {{--            padding: 0 ;--}}
    {{--            margin: 0;--}}
    {{--        }--}}
    {{--    </style>--}}
</head>

<body>

<div class="loader-container">
    <div class="loader">
        <img src="{{ asset('assets/admin/images/book-icon.png') }}" alt="Loading"/>
    </div>
</div>
<!-- Toast Container -->
<div id="toast-container" class="position-fixed top-0 end-0 p-3" style="z-index: 1050;">
    <!-- Success Toast -->
    @if (session('success'))
        <div id="success-toast" class="toast align-items-center text-white bg-success border-0" role="alert"
             aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <strong>Thành công</strong>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
            </div>
        </div>
    @endif
    @if ($errors->any())
        <!-- Error Toast -->
        <div id="error-toast" class="toast align-items-center text-white bg-danger border-0" role="alert"
             aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <strong>Thất bại!</strong>
                    <ul class="mt-2 mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
            </div>
        </div>
    @endif

</div>

<!-- Begin page -->
@include('admin.layouts.begin-page')
<!-- END layout-wrapper -->


<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

<!--preloader-->
<div id="preloader">
    <div id="status">
        <div class="spinner-border text-primary avatar-sm" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>

<div class="customizer-setting d-none d-md-block">
    <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
         data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
        <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
    </div>
</div>

<!-- Theme Settings -->
<div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
    <div class="d-flex align-items-center bg-primary bg-gradient p-3 offcanvas-header">
        <h5 class="m-0 me-2 text-white">Tùy chỉnh chủ đề</h5>

        <button type="button" class="btn-close btn-close-white ms-auto" id="customizerclose-btn"
                data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <div data-simplebar class="h-100">
            <div class="p-4">
                <h6 class="mb-0 fw-semibold text-uppercase">Bố trí</h6>
                <p class="text-muted">Chọn bố cục của bạn</p>

                <div class="row gy-3">
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input id="customizer-layout01" name="data-layout" type="radio" value="vertical"
                                   class="form-check-input">
                            <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                   for="customizer-layout01">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                            </label>
                        </div>
                        <h5 class="fs-13 text-center mt-2">Thẳng đứng</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal"
                                   class="form-check-input">
                            <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                   for="customizer-layout02">
                                    <span class="d-flex h-100 flex-column gap-1">
                                        <span class="bg-light d-flex p-1 gap-1 align-items-center">
                                            <span class="d-block p-1 bg-primary-subtle rounded me-1"></span>
                                            <span class="d-block p-1 pb-0 px-2 bg-primary-subtle ms-auto"></span>
                                            <span class="d-block p-1 pb-0 px-2 bg-primary-subtle"></span>
                                        </span>
                                        <span class="bg-light d-block p-1"></span>
                                        <span class="bg-light d-block p-1 mt-auto"></span>
                                    </span>
                            </label>
                        </div>
                        <h5 class="fs-13 text-center mt-2">Nằm ngang</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input id="customizer-layout03" name="data-layout" type="radio" value="twocolumn"
                                   class="form-check-input">
                            <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                   for="customizer-layout03">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1">
                                                <span class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                            </span>
                                        </span>
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                            </label>
                        </div>
                        <h5 class="fs-13 text-center mt-2">Hai Cột</h5>
                    </div>
                    <!-- end col -->

                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input id="customizer-layout04" name="data-layout" type="radio" value="semibox"
                                   class="form-check-input">
                            <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                   for="customizer-layout04">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0 p-1">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column pt-1 pe-2">
                                                <span class="bg-light d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                            </label>
                        </div>
                        <h5 class="fs-13 text-center mt-2">Hộp bán nguyệt</h5>
                    </div>
                    <!-- end col -->
                </div>

                <div class="form-check form-switch form-switch-md mb-3 mt-4">
                    <input type="checkbox" class="form-check-input" id="sidebarUserProfile">
                    <label class="form-check-label" for="sidebarUserProfile">Thanh bên Hồ sơ người dùng Avatar</label>
                </div>

                <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Chủ đề</h6>
                <p class="text-muted">Chọn chủ đề phù hợp với bạn.</p>

                <div class="row">
                    <div class="col-6">
                        <div class="form-check card-radio">
                            <input id="customizer-theme01" name="data-theme" type="radio" value="default"
                                   class="form-check-input">
                            <label class="form-check-label p-0" for="customizer-theme01">
                                <img src="../../{{ asset('assets/admin/images/demo/default.png') }}"
                                     alt="" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-13 text-center fw-medium mt-2">Mặc định</h5>
                    </div>
                    <div class="col-6">
                        <div class="form-check card-radio">
                            <input id="customizer-theme02" name="data-theme" type="radio" value="saas"
                                   class="form-check-input">
                            <label class="form-check-label p-0" for="customizer-theme02">
                                <img src="../../{{ asset('assets/admin/images/demo/saas.png') }}" alt=""
                                     class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-13 text-center fw-medium mt-2">Sự hỗn láo</h5>
                    </div>
                    <div class="col-6">
                        <div class="form-check card-radio">
                            <input id="customizer-theme03" name="data-theme" type="radio" value="corporate"
                                   class="form-check-input">
                            <label class="form-check-label p-0" for="customizer-theme03">
                                <img src="../../{{ asset('assets/admin/images/demo/corporate.png') }}"
                                     alt="" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-13 text-center fw-medium mt-2">Doanh nghiệp</h5>
                    </div>
                    <div class="col-6">
                        <div class="form-check card-radio">
                            <input id="customizer-theme04" name="data-theme" type="radio" value="galaxy"
                                   class="form-check-input">
                            <label class="form-check-label p-0" for="customizer-theme04">
                                <img src="../../{{ asset('assets/admin/images/demo/galaxy.png') }}"
                                     alt="" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-13 text-center fw-medium mt-2">Thiên hà</h5>
                    </div>
                    <div class="col-6">
                        <div class="form-check card-radio">
                            <input id="customizer-theme05" name="data-theme" type="radio" value="material"
                                   class="form-check-input">
                            <label class="form-check-label p-0" for="customizer-theme05">
                                <img src="../../{{ asset('assets/admin/images/demo/material.png') }}"
                                     alt="" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-13 text-center fw-medium mt-2">Vật liệu</h5>
                    </div>
                    <div class="col-6">
                        <div class="form-check card-radio">
                            <input id="customizer-theme06" name="data-theme" type="radio" value="creative"
                                   class="form-check-input">
                            <label class="form-check-label p-0" for="customizer-theme06">
                                <img src="../../{{ asset('assets/admin/images/demo/creative.png') }}"
                                     alt="" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-13 text-center fw-medium mt-2">Sáng tạo</h5>
                    </div>
                    <div class="col-6">
                        <div class="form-check card-radio">
                            <input id="customizer-theme07" name="data-theme" type="radio" value="minimal"
                                   class="form-check-input">
                            <label class="form-check-label p-0" for="customizer-theme07">
                                <img src="../../{{ asset('assets/admin/images/demo/minimal.png') }}"
                                     alt="" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-13 text-center fw-medium mt-2">Tối thiểu</h5>
                    </div>
                    <div class="col-6">
                        <div class="form-check card-radio">
                            <input id="customizer-theme08" name="data-theme" type="radio" value="modern"
                                   class="form-check-input">
                            <label class="form-check-label p-0" for="customizer-theme08">
                                <img src="../../{{ asset('assets/admin/images/demo/modern.png') }}"
                                     alt="" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-13 text-center fw-medium mt-2">Hiện đại</h5>
                    </div>
                    <!-- end col -->
                    <div class="col-6">
                        <div class="form-check card-radio">
                            <input id="customizer-theme09" name="data-theme" type="radio" value="interactive"
                                   class="form-check-input">
                            <label class="form-check-label p-0" for="customizer-theme09">
                                <img src="../../{{ asset('assets/admin/images/demo/interactive.png') }}"
                                     alt="" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-13 text-center fw-medium mt-2">Tương tác</h5>
                    </div><!-- end col -->

                    <div class="col-6">
                        <div class="form-check card-radio">
                            <input id="customizer-theme10" name="data-theme" type="radio" value="classic"
                                   class="form-check-input">
                            <label class="form-check-label p-0" for="customizer-theme10">
                                <img src="../../{{ asset('assets/admin/images/demo/classic.png') }}"
                                     alt="" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-13 text-center fw-medium mt-2">Cổ điển</h5>
                    </div><!-- end col -->

                    <div class="col-6">
                        <div class="form-check card-radio">
                            <input id="customizer-theme11" name="data-theme" type="radio" value="vintage"
                                   class="form-check-input">
                            <label class="form-check-label p-0" for="customizer-theme11">
                                <img src="../../{{ asset('assets/admin/images/demo/vintage.png') }}"
                                     alt="" class="img-fluid">
                            </label>
                        </div>
                        <h5 class="fs-13 text-center fw-medium mt-2">Cổ điển</h5>
                    </div><!-- end col -->
                </div>

                <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Bảng màu</h6>
                <p class="text-muted">Chọn chế độ sáng hoặc tối.</p>

                <div class="colorscheme-cardradio">
                    <div class="row">
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-bs-theme"
                                       id="layout-mode-light" value="light">
                                <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                       for="layout-mode-light">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Nền sáng</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check card-radio dark">
                                <input class="form-check-input" type="radio" name="data-bs-theme"
                                       id="layout-mode-dark" value="dark">
                                <label class="form-check-label p-0 avatar-md w-100 bg-dark material-shadow"
                                       for="layout-mode-dark">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span
                                                    class="bg-white bg-opacity-10 d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-white bg-opacity-10 rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-white bg-opacity-10 d-block p-1"></span>
                                                    <span class="bg-white bg-opacity-10 d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Nền tối</h5>
                        </div>
                    </div>
                </div>

                <div id="sidebar-visibility">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Hiển thị thanh bên</h6>
                    <p class="text-muted">Chọn hiển thị hoặc Thanh bên ẩn.</p>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-visibility"
                                       id="sidebar-visibility-show" value="show">
                                <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                       for="sidebar-visibility-show">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0 p-1">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column pt-1 pe-2">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Hiển thị</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-visibility"
                                       id="sidebar-visibility-hidden" value="hidden">
                                <label class="form-check-label p-0 avatar-md w-100 px-2 material-shadow"
                                       for="sidebar-visibility-hidden">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column pt-1 px-2">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Ẩn giấu</h5>
                        </div>
                    </div>
                </div>

                <div id="layout-width">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Chiều rộng bố trí</h6>
                    <p class="text-muted">Chọn bố cục dạng Fluid hoặc dạng Boxed.</p>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-layout-width"
                                       id="layout-width-fluid" value="fluid">
                                <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                       for="layout-width-fluid">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Dịch</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check card-radio">
                                <input class="form-check-input" type="radio" name="data-layout-width"
                                       id="layout-width-boxed" value="boxed">
                                <label class="form-check-label p-0 avatar-md w-100 px-2 material-shadow"
                                       for="layout-width-boxed">
                                        <span class="d-flex gap-1 h-100 border-start border-end">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Đóng hộp</h5>
                        </div>
                    </div>
                </div>

                <div id="layout-position">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Vị trí bố trí</h6>
                    <p class="text-muted">Chọn Vị trí bố trí cố định hoặc có thể cuộn.</p>

                    <div class="btn-group radio" role="group">
                        <input type="radio" class="btn-check" name="data-layout-position"
                               id="layout-position-fixed" value="fixed">
                        <label class="btn btn-light w-sm" for="layout-position-fixed">Đã sửa</label>

                        <input type="radio" class="btn-check" name="data-layout-position"
                               id="layout-position-scrollable" value="scrollable">
                        <label class="btn btn-light w-sm ms-0" for="layout-position-scrollable">Có thể cuộn</label>
                    </div>
                </div>
                <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Màu thanh trên cùng</h6>
                <p class="text-muted">Chọn màu thanh trên cùng sáng hoặc tối.</p>

                <div class="row">
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar"
                                   id="topbar-color-light" value="light">
                            <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                   for="topbar-color-light">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                            </label>
                        </div>
                        <h5 class="fs-13 text-center mt-2">Nền sáng</h5>
                    </div>
                    <div class="col-4">
                        <div class="form-check card-radio">
                            <input class="form-check-input" type="radio" name="data-topbar"
                                   id="topbar-color-dark" value="dark">
                            <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                   for="topbar-color-dark">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                <span class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-primary d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                            </label>
                        </div>
                        <h5 class="fs-13 text-center mt-2">Nền tối</h5>
                    </div>
                </div>

                <div id="sidebar-size">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Kích thước thanh bên</h6>
                    <p class="text-muted">Chọn kích thước của Thanh bên.</p>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-size"
                                       id="sidebar-size-default" value="lg">
                                <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                       for="sidebar-size-default">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Mặc định</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-size"
                                       id="sidebar-size-compact" value="md">
                                <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                       for="sidebar-size-compact">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span class="d-block p-1 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Nhỏ gọn</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-size"
                                       id="sidebar-size-small" value="sm">
                                <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                       for="sidebar-size-small">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1">
                                                    <span class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Nhỏ (Biểu tượng xem)</h5>
                        </div>

                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar-size"
                                       id="sidebar-size-small-hover" value="sm-hover">
                                <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                       for="sidebar-size-small-hover">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1">
                                                    <span class="d-block p-1 bg-primary-subtle mb-2"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Chế độ xem nhỏ khi di chuột</h5>
                        </div>
                    </div>
                </div>

                <div id="sidebar-view">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Chế độ xem thanh bên</h6>
                    <p class="text-muted">Chọn chế độ xem Mặc định hoặc Thanh bên tách biệt.</p>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-layout-style"
                                       id="sidebar-view-default" value="default">
                                <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                       for="sidebar-view-default">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Mặc định</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-layout-style"
                                       id="sidebar-view-detached" value="detached">
                                <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                       for="sidebar-view-detached">
                                        <span class="d-flex h-100 flex-column">
                                            <span class="bg-light d-flex p-1 gap-1 align-items-center px-2">
                                                <span class="d-block p-1 bg-primary-subtle rounded me-1"></span>
                                                <span class="d-block p-1 pb-0 px-2 bg-primary-subtle ms-auto"></span>
                                                <span class="d-block p-1 pb-0 px-2 bg-primary-subtle"></span>
                                            </span>
                                            <span class="d-flex gap-1 h-100 p-1 px-2">
                                                <span class="flex-shrink-0">
                                                    <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                        <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="bg-light d-block p-1 mt-auto px-2"></span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Tách biệt</h5>
                        </div>
                    </div>
                </div>
                <div id="sidebar-color">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Màu thanh bên</h6>
                    <p class="text-muted">Chọn màu cho Thanh bên.</p>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio" data-bs-toggle="collapse"
                                 data-bs-target="#collapseBgGradient.show">
                                <input class="form-check-input" type="radio" name="data-sidebar"
                                       id="sidebar-color-light" value="light">
                                <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                       for="sidebar-color-light">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-white border-end d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Nền sáng</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio" data-bs-toggle="collapse"
                                 data-bs-target="#collapseBgGradient.show">
                                <input class="form-check-input" type="radio" name="data-sidebar"
                                       id="sidebar-color-dark" value="dark">
                                <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                       for="sidebar-color-dark">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-primary d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-white bg-opacity-10 rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Nền tối</h5>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-link avatar-md w-100 p-0 overflow-hidden border collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseBgGradient"
                                    aria-expanded="false" aria-controls="collapseBgGradient">
                                    <span class="d-flex gap-1 h-100">
                                        <span class="flex-shrink-0">
                                            <span class="bg-vertical-gradient d-flex h-100 flex-column gap-1 p-1">
                                                <span
                                                    class="d-block p-1 px-2 bg-white bg-opacity-10 rounded mb-2"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                                <span class="d-block p-1 px-2 pb-0 bg-white bg-opacity-10"></span>
                                            </span>
                                        </span>
                                        <span class="flex-grow-1">
                                            <span class="d-flex h-100 flex-column">
                                                <span class="bg-light d-block p-1"></span>
                                                <span class="bg-light d-block p-1 mt-auto"></span>
                                            </span>
                                        </span>
                                    </span>
                            </button>
                            <h5 class="fs-13 text-center mt-2">Độ dốc</h5>
                        </div>
                    </div>
                    <!-- end row -->

                    <div class="collapse" id="collapseBgGradient">
                        <div class="d-flex gap-2 flex-wrap img-switch p-2 px-3 bg-light rounded">

                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar"
                                       id="sidebar-color-gradient" value="gradient">
                                <label class="form-check-label p-0 avatar-xs rounded-circle"
                                       for="sidebar-color-gradient">
                                    <span class="avatar-title rounded-circle bg-vertical-gradient"></span>
                                </label>
                            </div>
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar"
                                       id="sidebar-color-gradient-2" value="gradient-2">
                                <label class="form-check-label p-0 avatar-xs rounded-circle"
                                       for="sidebar-color-gradient-2">
                                    <span class="avatar-title rounded-circle bg-vertical-gradient-2"></span>
                                </label>
                            </div>
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar"
                                       id="sidebar-color-gradient-3" value="gradient-3">
                                <label class="form-check-label p-0 avatar-xs rounded-circle"
                                       for="sidebar-color-gradient-3">
                                    <span class="avatar-title rounded-circle bg-vertical-gradient-3"></span>
                                </label>
                            </div>
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-sidebar"
                                       id="sidebar-color-gradient-4" value="gradient-4">
                                <label class="form-check-label p-0 avatar-xs rounded-circle"
                                       for="sidebar-color-gradient-4">
                                    <span class="avatar-title rounded-circle bg-vertical-gradient-4"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="sidebar-img">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Hình ảnh thanh bên</h6>
                    <p class="text-muted">Chọn hình ảnh của Thanh bên.</p>

                    <div class="d-flex gap-2 flex-wrap img-switch">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidebar-image"
                                   id="sidebarimg-none" value="none">
                            <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-none">
                                    <span
                                        class="avatar-md w-auto bg-light d-flex align-items-center justify-content-center">
                                        <i class="ri-close-fill fs-20"></i>
                                    </span>
                            </label>
                        </div>

                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidebar-image"
                                   id="sidebarimg-01" value="img-1">
                            <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-01">
                                <img src="{{ asset('assets/admin/images/sidebar/img-1.jpg') }}" alt=""
                                     class="avatar-md w-auto object-fit-cover">
                            </label>
                        </div>

                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidebar-image"
                                   id="sidebarimg-02" value="img-2">
                            <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-02">
                                <img src="{{ asset('assets/admin/images/sidebar/img-2.jpg') }}" alt=""
                                     class="avatar-md w-auto object-fit-cover">
                            </label>
                        </div>
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidebar-image"
                                   id="sidebarimg-03" value="img-3">
                            <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-03">
                                <img src="{{ asset('assets/admin/images/sidebar/img-3.jpg') }}" alt=""
                                     class="avatar-md w-auto object-fit-cover">
                            </label>
                        </div>
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-sidebar-image"
                                   id="sidebarimg-04" value="img-4">
                            <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-04">
                                <img src="{{ asset('assets/admin/images/sidebar/img-4.jpg') }}" alt=""
                                     class="avatar-md w-auto object-fit-cover">
                            </label>
                        </div>
                    </div>
                </div>

                <div id="sidebar-color">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Màu cơ bản</h6>
                    <p class="text-muted">Chọn màu chính.</p>

                    <div class="d-flex flex-wrap gap-2">
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-theme-colors"
                                   id="themeColor-01" value="default">
                            <label class="form-check-label avatar-xs p-0" for="themeColor-01"></label>
                        </div>
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-theme-colors"
                                   id="themeColor-02" value="green">
                            <label class="form-check-label avatar-xs p-0" for="themeColor-02"></label>
                        </div>
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-theme-colors"
                                   id="themeColor-03" value="purple">
                            <label class="form-check-label avatar-xs p-0" for="themeColor-03"></label>
                        </div>
                        <div class="form-check sidebar-setting card-radio">
                            <input class="form-check-input" type="radio" name="data-theme-colors"
                                   id="themeColor-04" value="blue">
                            <label class="form-check-label avatar-xs p-0" for="themeColor-04"></label>
                        </div>
                    </div>
                </div>

                <div id="preloader-menu">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Bộ nạp trước</h6>
                    <p class="text-muted">Chọn trình tải trước.</p>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-preloader"
                                       id="preloader-view-custom" value="enable">
                                <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                       for="preloader-view-custom">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                    <!-- <div id="preloader"> -->
                                    <div id="status" class="d-flex align-items-center justify-content-center">
                                        <div class="spinner-border text-primary avatar-xxs m-auto" role="status">
                                            <span class="visually-hidden">Đang tải...</span>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Cho phép</h5>
                        </div>
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-preloader"
                                       id="preloader-view-none" value="disable">
                                <label class="form-check-label p-0 avatar-md w-100 material-shadow"
                                       for="preloader-view-none">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Vô hiệu hóa</h5>
                        </div>
                    </div>

                </div>
                <!-- end preloader-menu -->

                <div id="body-img" style="display: none;">
                    <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Hình nền</h6>
                    <p class="text-muted">Chọn hình nền cơ thể.</p>

                    <div class="row">
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-body-image"
                                       id="body-img-none" value="none">
                                <label class="form-check-label p-0 avatar-md w-100" data-body-image="none"
                                       for="body-img-none">
                                        <span class="d-flex gap-1 h-100">
                                            <span class="flex-shrink-0">
                                                <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                                                    <span
                                                        class="d-block p-1 px-2 bg-primary-subtle rounded mb-2"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                    <span class="d-block p-1 px-2 pb-0 bg-primary-subtle"></span>
                                                </span>
                                            </span>
                                            <span class="flex-grow-1">
                                                <span class="d-flex h-100 flex-column">
                                                    <span class="bg-light d-block p-1"></span>
                                                    <span class="bg-light d-block p-1 mt-auto"></span>
                                                </span>
                                            </span>
                                        </span>
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Không có</h5>
                        </div>
                        <!-- end col -->
                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-body-image"
                                       id="body-img-one" value="img-1">
                                <label class="form-check-label p-0 avatar-md w-100" data-body-image="img-1"
                                       for="body-img-one">
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Một</h5>
                        </div>
                        <!-- end col -->

                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-body-image"
                                       id="body-img-two" value="img-2">
                                <label class="form-check-label p-0 avatar-md w-100" data-body-image="img-2"
                                       for="body-img-two">
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Hai</h5>
                        </div>
                        <!-- end col -->

                        <div class="col-4">
                            <div class="form-check sidebar-setting card-radio">
                                <input class="form-check-input" type="radio" name="data-body-image"
                                       id="body-img-three" value="img-3">
                                <label class="form-check-label p-0 avatar-md w-100" data-body-image="img-3"
                                       for="body-img-three">
                                </label>
                            </div>
                            <h5 class="fs-13 text-center mt-2">Ba</h5>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>

            </div>
        </div>

    </div>
    <div class="offcanvas-footer border-top p-3 text-center">
        <div class="row">
            <div class="col-6">
                <button type="button" class="btn btn-light w-100" id="reset-layout">Cài lại</button>
            </div>
            <div class="col-6">
                <a href="https://1.envato.market/velzon-admin" target="_blank" class="btn btn-primary w-100">Mua
                    ngay</a>
            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
<script src="{{ asset('assets/admin/js/plugins.js') }}"></script>

<!-- apexcharts -->
<script src="{{ asset('assets/admin/libs/apexcharts/apexcharts.min.js') }}"></script>
<!-- Vector map-->
<script src="{{ asset('assets/admin/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
<script src="{{ asset('assets/admin/libs/jsvectormap/maps/world-merc.js') }}"></script>
<!-- Dashboard init -->

<!--Swiper slider js-->
<script src="{{ asset('assets/admin/libs/swiper/swiper-bundle.min.js') }}"></script>

<!-- Dashboard init -->
<script src="{{ asset('assets/admin/js/pages/dashboard-ecommerce.init.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('assets/admin/libs/chart.js/chart.umd.js')}}"></script>

<!-- chartjs init -->
<script src="{{ asset('assets/admin/js/pages/chartjs.init.js')}}"></script>

@stack('scripts')
<script src="{{ asset('assets/admin/js/app.js') }}"></script>

<!-- App js -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if (session('success'))
        var successToast = new bootstrap.Toast(document.getElementById('success-toast'), {
            autohide: true,
            delay: 2000
        });
        successToast.show();
        @endif

        @if (session('errors'))
        var errorToast = new bootstrap.Toast(document.getElementById('error-toast'), {
            autohide: true,
            delay: 2000
        });
        errorToast.show();
        @endif
    });
</script>
<script>
    function showLoader() {
        document.querySelector('.loader-container').style.visibility = 'visible';
    }

    function hideLoader() {
        document.querySelector('.loader-container').style.visibility = 'hidden';
    }

    document.addEventListener('DOMContentLoaded', () => {
        showLoader(); // Hiển thị loader ngay khi DOM đã sẵn sàng
    });
    window.addEventListener('load', () => {
        hideLoader()
    });

    let arrForm = document.getElementsByClassName('giap')

    for (let i = 0; i < arrForm.length; i++) {
        arrForm[i].addEventListener('submit', () => {
            showLoader()
            this.submit()
        })
    }
    // let myF = document.getElementById('createproduct-form');
    // myF.addEventListener('submit', (event) => {
    //
    // })
</script>


</body>

</html>
