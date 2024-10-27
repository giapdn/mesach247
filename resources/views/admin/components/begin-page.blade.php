<div id="layout-wrapper">
    <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box horizontal-logo">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt=""
                                     height="17">
                            </span>
                        </a>

                        <a href="" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/admin/images/logooo.png') }}" alt="" height="17">
                            </span>
                        </a>
                    </div>

                    <button type="button"
                            class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none"
                            id="topnav-hamburger-icon">
                        <span class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>

                    <!-- App Search-->
                    <form class="app-search d-none d-md-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Tìm kiếm..." autocomplete="off"
                                   id="search-options" value="">
                            <span class="mdi mdi-magnify search-widget-icon"></span>
                            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                                  id="search-close-options"></span>
                        </div>
                        <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                            <div data-simplebar style="max-height: 320px;">
                                <!-- item-->
                                <div class="dropdown-header">
                                    <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                                </div>

                                <div class="dropdown-item bg-transparent text-wrap">
                                    <a href="index.html" class="btn btn-soft-secondary btn-sm rounded-pill">how to
                                        setup <i class="mdi mdi-magnify ms-1"></i></a>
                                    <a href="index.html" class="btn btn-soft-secondary btn-sm rounded-pill">buttons
                                        <i class="mdi mdi-magnify ms-1"></i></a>
                                </div>
                                <!-- item-->
                                <div class="dropdown-header mt-2">
                                    <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                                    <span>Analytics Dashboard</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                                    <span>Help Center</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                                    <span>My account settings</span>
                                </a>

                                <!-- item-->
                                <div class="dropdown-header mt-2">
                                    <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                                </div>

                                <div class="notification-list">
                                    <!-- item -->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                        <div class="d-flex">
                                            <img src="{{ asset('assets/admin/images/user/avatar-2.jpg') }}"
                                                 class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="m-0">Angela Bernier</h6>
                                                <span class="fs-11 mb-0 text-muted">Manager</span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- item -->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                        <div class="d-flex">
                                            <img src="{{ asset('assets/admin/images/user/avatar-3.jpg') }}"
                                                 class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="m-0">David Grasso</h6>
                                                <span class="fs-11 mb-0 text-muted">Web Designer</span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- item -->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                        <div class="d-flex">
                                            <img src="{{ asset('assets/admin/images/user/avatar-5.jpg') }}"
                                                 class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="m-0">Mike Bunch</h6>
                                                <span class="fs-11 mb-0 text-muted">React Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="text-center pt-3 pb-1">
                                <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All
                                    Results <i class="ri-arrow-right-line ms-1"></i></a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="d-flex align-items-center">

                    <div class="dropdown d-md-none topbar-head-dropdown header-item">
                        <button type="button"
                                class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle"
                                id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <i class="bx bx-search fs-22"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                             aria-labelledby="page-header-search-dropdown">
                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                               aria-label="Recipient's username">
                                        <button class="btn btn-primary" type="submit"><i
                                                class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button"
                                class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle"
                                data-toggle="fullscreen">
                            <i class='bx bx-fullscreen fs-22'></i>
                        </button>
                    </div>

                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button"
                                class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle light-dark-mode">
                            <i class='bx bx-moon fs-22'></i>
                        </button>
                    </div>

                    <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                        <button type="button"
                                class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle"
                                id="page-header-notifications-dropdown" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                            <i class='bx bx-bell fs-22'></i>
                            @if($tong > 0)
                                <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">
                                    {{ $tong }}
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            @endif
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                             aria-labelledby="page-header-notifications-dropdown">

                            <div class="dropdown-head bg-primary bg-pattern rounded-top">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 fs-16 fw-semibold text-white"> Thông Báo </h6>
                                        </div>
                                        <div class="col-auto dropdown-tabs">
                                            @if($tong > 0)
                                                <span class="badge bg-light text-body fs-13">{{ $tong }} Thông Báo Mới</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="px-2 pt-2">
                                    <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true"
                                        id="notificationItemsTab" role="tablist">
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab"
                                               role="tab" aria-selected="true">
                                                Sách
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="tab" href="#messages-tab"
                                               role="tab" aria-selected="false">
                                                Tiền
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="tab" href="#alerts-tab"
                                               role="tab" aria-selected="false">
                                                Đăng ký cộng tác viên
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <div class="tab-content position-relative" id="notificationItemsTabContent">
                                <!-- Tab thông báo sách -->
                                <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                                    <div data-simplebar style="max-height: 300px;" class="pe-2">
                                        @if($notificationsSach->isEmpty())
                                            <p>Không có thông báo nào về sách</p>
                                        @else
                                            <div id="notification-list-sach">
                                                @foreach($notificationsSach as $index => $notification)
                                                    <div class="text-reset notification-item d-block dropdown-item position-relative"
                                                         data-notification-id="{{ $notification->id }}"
                                                         style="display: {{ $index < 5 ? 'block' : 'none' }};">
                                                        <div class="d-flex">
                                                            <div class="avatar-xs me-3 flex-shrink-0">
                                                                <span class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                                                    <i class="bx bx-book"></i>
                                                                </span>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                @if(isset($notification->url))
                                                                    <a href="{{ $notification->url }}" class="stretched-link">
                                                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">{{ $notification->tieu_de }}</h6>
                                                                    </a>
                                                                @else
                                                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">{{ $notification->tieu_de }}</h6>
                                                                @endif
                                                                <div class="fs-13 text-muted">
                                                                    <p class="mb-1">{{ $notification->noi_dung }}</p>
                                                                </div>
                                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                    <span><i class="mdi mdi-clock-outline"></i> {{ $notification->created_at->diffForHumans() }}</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="my-3 text-center view-all">
                                            <button type="button" id="view-more-btn-sach" class="btn btn-soft-success waves-effect waves-light">
                                                Xem Thêm
                                                <i class="ri-arrow-right-line align-middle"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tab thông báo tiền -->
                                <div class="tab-pane fade py-2 ps-2" id="messages-tab" role="tabpanel">
                                    <div data-simplebar style="max-height: 300px;" class="pe-2">
                                        @if($notificationsTien->isEmpty())
                                            <p>Không có thông báo nào về tiền</p>
                                        @else
                                            <div id="notification-list-tien">
                                                @foreach($notificationsTien as $index => $notification)
                                                    <div class="text-reset notification-item d-block dropdown-item position-relative"
                                                         data-notification-id="{{ $notification->id }}"
                                                         style="display: {{ $index < 5 ? 'block' : 'none' }};">
                                                        <div class="d-flex">
                                                            <div class="avatar-xs me-3 flex-shrink-0">
                                                                <span class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                                                    <i class="bx bx-money"></i>
                                                                </span>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                @if(isset($notification->url))
                                                                    <a href="{{ $notification->url }}" class="stretched-link">
                                                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">{{ $notification->tieu_de }}</h6>
                                                                    </a>
                                                                @else
                                                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">{{ $notification->tieu_de }}</h6>
                                                                @endif
                                                                <div class="fs-13 text-muted">
                                                                    <p class="mb-1">{{ $notification->noi_dung }}</p>
                                                                </div>
                                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                    <span><i class="mdi mdi-clock-outline"></i> {{ $notification->created_at->diffForHumans() }}</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="my-3 text-center view-all">
                                            <button type="button" id="view-more-btn-tien" class="btn btn-soft-success waves-effect waves-light">
                                                Xem Thêm
                                                <i class="ri-arrow-right-line align-middle"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                {{-- Tab thông báo CTV --}}
                                <div class="tab-pane fade p-4" id="alerts-tab" role="tabpanel"
                                     aria-labelledby="alerts-tab">
                                    <div data-simplebar style="max-height: 300px;" class="pe-2">
                                        @if($notificationCTV->isEmpty())
                                            <p>Không có thông báo nào về đăng ký cộng tác viên</p>
                                        @else
                                            <div id="notification-list-tien">
                                                @foreach($notificationCTV as $index => $notification)
                                                    <div class="text-reset notification-item d-block dropdown-item position-relative"
                                                         data-notification-id="{{ $notification->id }}"
                                                         style="display: {{ $index < 5 ? 'block' : 'none' }};">
                                                        <div class="d-flex">
                                                            <div class="avatar-xs me-3 flex-shrink-0">
                                                                <span class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                                                  <i class="bx bx-user-plus"></i>
                                                                </span>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                @if(isset($notification->url))
                                                                    <a href="{{ $notification->url }}" class="stretched-link">
                                                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">{{ $notification->tieu_de }}</h6>
                                                                    </a>
                                                                @else
                                                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">{{ $notification->tieu_de }}</h6>
                                                                @endif
                                                                <div class="fs-13 text-muted">
                                                                    <p class="mb-1">{{ $notification->noi_dung }}</p>
                                                                </div>
                                                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                                    <span><i class="mdi mdi-clock-outline"></i> {{ $notification->created_at->diffForHumans() }}</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        <div class="my-3 text-center view-all">
                                            <button type="button" id="view-more-btn-tien" class="btn btn-soft-success waves-effect waves-light">
                                                Xem Thêm
                                                <i class="ri-arrow-right-line align-middle"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                @if (auth()->check())
                                    <img style="object-fit: cover" class="rounded-circle header-profile-user"
                                         src="{{ auth()->user()->hinh_anh ? Storage::url(auth()->user()->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                         alt="Header Avatar">
                                @endif

                                <span class="text-start ms-xl-2">
                                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">
                                        @if (auth()->check())
                                            {{ auth()->user()->ten_doc_gia }}
                                        @endif
                                    </span>
                                    <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">
                                        @if (auth()->check())
                                            <!-- Lặp qua các vai trò và hiển thị tên vai trò -->
                                            @foreach (auth()->user()->vai_tros as $vaiTro)
                                                {{ $vaiTro->ten_vai_tro }}@if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        @endif
                                    </span>
                                </span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">Chào mừng @if (auth()->check())
                                    {{ auth()->user()->ten_doc_gia }}
                                @endif
                            </h6>
                            <a class="dropdown-item"
                               href="{{ route('users.showProfile', ['user' => auth()->user()->id]) }}"><i
                                    class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle">Hồ sơ</span></a>
                            <a class="dropdown-item" href="{{ route('faqs.index') }}"><i
                                    class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle">Giúp đỡ</span></a>
                            <div class="dropdown-divider"></div>
                            @if(auth()->user()->hasRole('4'))
                                <a class="dropdown-item" href="{{ route('rut-tien.rutTien') }}"><i
                                        class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Ví : <b>{{ number_format(auth()->user()->so_du) }} VNĐ</b></span></a>
                            @endif
                            <a class="dropdown-item"
                               href="#" data-bs-toggle="offcanvas"
                               data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas"><span
                                    class="badge bg-success-subtle text-success mt-1 float-end"></span><i
                                    class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                                    class="align-middle">Cài đặt</span></a>
                            {{-- <div class="customizer-setting d-none d-md-block">
                                <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2">
                                    <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
                                </div>
                            </div> --}}
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="dropdown-item" type="submit"><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-logout">Đăng xuất</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- removeNotificationModal -->
    <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="NotificationModalbtn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.jso)}}" trigger="loop"
                                   colors="primary:#f7b84b,secondary:#f06548"
                                   style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete
                            It!
                        </button>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <!-- Dark Logo-->
            <a href="index.html" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets/admin/images/logo-dark.png') }}" alt="" height="17">
                </span>
            </a>
            <!-- Light Logo-->
            <a href="" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ asset('assets/admin/images/logo-sm.png') }}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets/admin/images/logooo.png') }}" alt="" height="40">
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>

        <div class="dropdown sidebar-user m-1 rounded">
            <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-flex align-items-center gap-2">
                    <img class="rounded header-profile-user"
                         src="{{ asset('assets/admin/images/user/avatar-1.jpg') }}" alt="Header Avatar">
                    <span class="text-start">
                        <span class="d-block fw-medium sidebar-user-name-text">Anna Adame</span>
                        <span class="d-block fs-14 sidebar-user-name-sub-text"><i
                                class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span
                                class="align-middle">Online</span></span>
                    </span>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <h6 class="dropdown-header">Welcome Anna!</h6>
                <a class="dropdown-item" href="pages-profile.html"><i
                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Profile</span></a>
                <a class="dropdown-item" href="apps-chat.html"><i
                        class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Messages</span></a>
                <a class="dropdown-item" href="apps-tasks-kanban.html"><i
                        class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Taskboard</span></a>
                <a class="dropdown-item" href="pages-faqs.html"><i
                        class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Help</span></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="pages-profile.html"><i
                        class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Balance : <b>$5971.67</b></span></a>
                <a class="dropdown-item" href="pages-profile-settings.html"><span
                        class="badge bg-success-subtle text-success mt-1 float-end">New</span><i
                        class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Settings</span></a>
                <a class="dropdown-item" href="auth-lockscreen-basic.html"><i
                        class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock
                        screen</span></a>
                <a class="dropdown-item" href="auth-logout-basic.html"><i
                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                                                                                             data-key="t-logout">Logout</span></a>
            </div>
        </div>
        <div id="scrollbar">
            <div class="container-fluid">


                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-menu">Quản trị</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse"
                           role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-bar-chart-fill"></i> <span data-key="t-dashboards">Thống Kê</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarDashboards">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{ route('admin') }}" class="nav-link" data-key="t-analytics">
                                        Quản lý</a>
                                </li>
                                @if (Auth::check() && Auth::user()->hasPermission('cong-tac-vien'))
                                    <li class="nav-item">
                                        <a href="{{ route('cong-tac-vien.index') }}" class="nav-link" data-key="t-crm">
                                            Thống kê cộng tác viên </a>
                                    </li>
                                @endif
                                @if (Auth::check() && Auth::user()->hasPermission('thong-ke-doanh-thu'))
                                    <li class="nav-item">
                                        <a href="{{ route('thong-ke-doanh-thu.index') }}" class="nav-link"
                                           data-key="t-ecommerce"> Thống kê doanh thu </a>
                                    </li>
                                @endif
                                @if (Auth::check() && Auth::user()->hasPermission('thong-ke-don-hang'))
                                    <li class="nav-item">
                                        <a href="{{ route('thong-ke-don-hang.thongKeDonHang') }}" class="nav-link"
                                           data-key="t-ecommerce"> Thống kê đơn hàng</a>
                                    </li>
                                @endif
                                @if (Auth::check() && Auth::user()->hasPermission('thong-ke-danh-gia'))
                                    <li class="nav-item">
                                        <a href="{{ route('admin.sachDanhGiaCaoNhat') }}" class="nav-link"
                                           data-key="t-thongkesachdanhgia"> Thống kê đánh giá </a>
                                    </li>
                                @endif
                                @if (Auth::check() && Auth::user()->hasPermission('thong-ke-chung-cong-tac-vien'))
                                    <li class="nav-item">
                                        <a href="{{ route('thong-ke-chung-cong-tac-vien.index') }}" class="nav-link"
                                           data-key="t-thongkesachdanhgia"> Thống kê
                                            chung cộng tác viên </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li> <!-- end Dashboard Menu -->

                    <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Quản lý </span>
                    </li>

                    @if (Auth::check() && Auth::user()->hasPermission('sach-index'))

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sach" data-bs-toggle="collapse" role="button"
                               aria-expanded="false" aria-controls="sach">
                                <i class="ri-honour-line "></i> <span data-key="t-authentication">Quản lý sách</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sach">
                                <ul class="nav nav-sm flex-column">
                                    @if (Auth::check() && Auth::user()->hasPermission('sach-index'))
                                        <li class="nav-item">
                                            <a href="{{ route('sach.index') }}" class="nav-link"
                                               data-key="t-analytics">
                                                Danh sách sách</a>
                                        </li>
                                    @endif
                                    @if (Auth::check() && Auth::user()->hasPermission('sach-store'))
                                        <li class="nav-item">
                                            <a href="{{ route('sach.create') }}" class="nav-link" data-key="t-crm">
                                                Thêm mới sách</a>
                                        </li>
                                    @endif
                                    @if (Auth::check() && Auth::user()->hasPermission('the-loai-index'))
                                        <li class="nav-item">
                                            <a class="nav-link menu-link" href="{{ route('the-loai.index') }}">
                                                <span data-key="tydonhang">Quản lý thể loại</span>
                                            </a>
                                        </li>
                                    @endif
                                        @if (Auth::check() && Auth::user()->hasPermission('sach-index'))
                                            <li class="nav-item">
                                                <a class="nav-link menu-link" href="{{ route('chuong.index') }}">
                                                   <span data-key="t-quanlychuong">Quản lý chương</span>
                                                </a>
                                            </li>
                                        @endif
                                </ul>
                            </div>

                        </li>
                    @endif

                    {{--                        <li class="nav-item"> --}}
                    {{--                            <a class="nav-link menu-link" href="{{ route('users.index') }}"> --}}
                    {{--                                <i class="ri-account-circle-line"></i> <span data-key="t-quanlytaikhoan">Thành viên</span> --}}
                    {{--                            </a> --}}
                    @if (Auth::check() && Auth::user()->hasPermission('users-index'))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#quanlythanhvien" data-bs-toggle="collapse"
                               role="button" aria-expanded="false" aria-controls="quanlythanhvien">
                                <i class=" ri-profile-fill"></i> <span
                                    data-key="t-authentication">Quản lý thành viên</span>
                            </a>

                            <div class="collapse menu-dropdown" id="quanlythanhvien">
                                <ul class="nav nav-sm flex-column">
                                    @if (Auth::check() && Auth::user()->hasPermission('users-index'))
                                        <li class="nav-item">
                                            <a href="{{ route('users.index') }}" class="nav-link"
                                               data-key="t-analytics">
                                                Danh sách thành viên</a>
                                        </li>
                                    @endif
                                    @if (Auth::check() && Auth::user()->hasPermission('roles-index'))
                                        <li class="nav-item">
                                            <a href="{{ route('roles.index') }}" class="nav-link"
                                               data-key="t-crm">Danh sách vai
                                                trò</a>
                                        </li>
                                    @endif
                                    @if (Auth::check() && Auth::user()->hasPermission('roles-index'))
                                        <li class="nav-item">
                                            <a href="{{ route('users.index', ['role_id' => 4]) }}" class="nav-link"
                                               data-key="t-crm">Danh sách cộng tác viên</a>
                                        </li>
                                    @endif

                                    {{--                                    <li class="nav-item"> --}}
                                    {{--                                        <a href="{{ route('chuyen-muc.index') }}" class="nav-link" data-key="t-crm">Quản lý chuyên mục</a> --}}
                                    {{--                                    </li> --}}
                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::check() && Auth::user()->hasPermission('bai-viet-index'))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#quanlybaiviet" data-bs-toggle="collapse"
                               role="button" aria-expanded="false" aria-controls="quanlybaiviet">
                                <i class=" ri-quill-pen-line"></i> <span data-key="t-authentication">Quản lý bài
                                    viết</span>
                            </a>
                            <div class="collapse menu-dropdown" id="quanlybaiviet">
                                <ul class="nav nav-sm flex-column">
                                    @if (Auth::check() && Auth::user()->hasPermission('bai-viet-index'))
                                        <li class="nav-item">
                                            <a href="{{ route('bai-viet.index') }}" class="nav-link"
                                               data-key="t-analytics">
                                                Danh sách bài viết</a>
                                        </li>
                                    @endif

                                    @if (Auth::check() && Auth::user()->hasPermission('bai-viet-store'))
                                        <li class="nav-item">
                                            <a href="{{ route('bai-viet.create') }}" class="nav-link"
                                               data-key="t-crm">
                                                Thêm
                                                mới
                                                bài viết</a>
                                        </li>
                                    @endif

                                    @if (Auth::check() && Auth::user()->hasPermission('chuyen-muc-index'))
                                        <li class="nav-item">
                                            <a href="{{ route('chuyen-muc.index') }}" class="nav-link"
                                               data-key="t-crm">Quản
                                                lý
                                                chuyên mục</a>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </li>
                    @endif
                    @if (Auth::check() && Auth::user()->hasPermission('lien-he-index'))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('lien-he.index') }}">
                                <i class=" ri-mail-send-line"></i> <span data-key="t-quanlylienhe">Quản lý liên
                                    hệ</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::check() && Auth::user()->hasPermission('don-hang-index'))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('don-hang.index') }}">
                                <i class=" ri-shopping-cart-line"></i> <span data-key="t-quanlydonhang">Quản lý đơn
                                    hàng</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::check() && Auth::user()->hasPermission('binh-luan-index'))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('binh-luan.index') }}">
                                <i class="ri-message-3-line"></i> <span data-key="t-quanlybinhluan">Quản lý bình luận
                                </span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::check() && Auth::user()->hasPermission('danh-gia-index'))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('danh-gia.index') }}">
                                <i class=" ri-star-s-line"></i> <span data-key="t-quanlydonhang">Quản lý đánh
                                    giá</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::check() && Auth::user()->hasPermission('banner-index'))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('banner.index') }}">
                                <i class="ri-image-2-fill"></i> <span data-key="t-quanlybanner">Quản lý banner
                                </span>
                            </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('kiem-duyet-cong-tac-vien') }}">
                            <i class="ri-pages-line"></i>
                            <span data-key="t-quanlybanner">Kiểm duyệt cộng tác viên</span>
                        </a>
                    </li>

                    {{-- Bắt đầu phần của CTV --}}
                    @if(Auth()->user()->hasRole('4'))
                        <li class="menu-title"><span data-key="t-menu">Cộng tác viên</span></li>
                    @endif
                    @if (Auth::check() && Auth::user()->hasPermission('rut-tien'))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('rut-tien.rutTien') }}">
                                <i class="ri-wallet-3-line"></i>
                                <span data-key="t-quanlybanner">Rút tiền
                            </span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::check() && Auth::user()->hasPermission('yeu-cau-rut-tien'))
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{ route('yeu-cau-rut-tien.index') }}">
                                <i class="ri-money-pound-circle-line"></i>
                                <span data-key="t-quanlybanner">Yêu cầu rút tiền
                            </span>
                            </a>
                        </li>
                    @endif
                    <li class="menu-title"><span data-key="t-menu">Khác</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('noi-quy.index') }}">
                            <i class="ri-file-list-3-line"></i>
                            <span data-key="t-quanlybanner">Quy định về nội dung
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{ route('cau-hoi-thuong-gap.index') }}">
                            <i class="ri-questionnaire-fill"></i>
                            <span data-key="t-quanlybanner">Hỏi đáp
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->
        </div>

        <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div
                            class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                            <h4 class="mb-sm-0">@yield('title')</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">@yield('start-point')</a>
                                    </li>
                                    <li class="breadcrumb-item active">@yield('title')</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        © MeSach247
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            MeSach247
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- end main content-->

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Tab thông báo sách
        let currentIndexSach = 5;
        const loadMoreBtnSach = document.getElementById('view-more-btn-sach');
        const notificationsSach = document.querySelectorAll('#notification-list-sach .notification-item');

        notificationsSach.forEach((notification, index) => {
            if (index >= currentIndexSach) {
                notification.style.display = 'none';
            }
        });

        loadMoreBtnSach.addEventListener('click', function () {
            for (let i = currentIndexSach; i < currentIndexSach + 5 && i < notificationsSach.length; i++) {
                notificationsSach[i].style.display = 'block';
            }
            currentIndexSach += 5;
            if (currentIndexSach >= notificationsSach.length) {
                loadMoreBtnSach.style.display = 'none';
            }
        });

        // Tab thông báo tiền
        let currentIndexTien = 5;
        const loadMoreBtnTien = document.getElementById('view-more-btn-tien');
        const notificationsTien = document.querySelectorAll('#notification-list-tien .notification-item');
        notificationsTien.forEach((notification, index) => {
            if (index >= currentIndexTien) {
                notification.style.display = 'none';
            }
        });

        loadMoreBtnTien.addEventListener('click', function () {
            for (let i = currentIndexTien; i < currentIndexTien + 5 && i < notificationsTien.length; i++) {
                notificationsTien[i].style.display = 'block';
            }
            currentIndexTien += 5;
            if (currentIndexTien >= notificationsTien.length) {
                loadMoreBtnTien.style.display = 'none';
            }
        });
    });

</script>
