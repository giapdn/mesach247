@extends('client.layouts.app')
@section('content')
    @push('styles')
        <style type="text/css">
            @media (max-width: 767px) {
                .panel-heading .pull-right {
                    margin-top: 25px;
                    margin-bottom: 10px;
                    float: left !important;
                }
            }

            .timeline {
                position: relative;
                */ margin-top: 4px;
                margin-bottom: 30px;
            }

            .timeline .line {
                position: absolute;
                width: 4px;
                display: block;
                background: currentColor;
                top: 0px;
                bottom: 0px;
                margin-left: 30px;
                color: #a5d9ea;
            }

            .timeline .line::before {
                top: -4px;
            }

            .timeline .line::after {
                bottom: -4px;
            }

            .timeline .line::before,
            .timeline .line::after {
                content: '';
                position: absolute;
                left: -4px;
                width: 12px;
                height: 12px;
                display: block;
                border-radius: 50%;
                background: currentColor;
            }

            .timeline .panel {
                position: relative;
                margin: 10px 0px 21px 70px;
                clear: both;
            }

            @media (max-width: 413px) {
                .timeline .panel {
                    margin: 20px 0px;
                }

                .timeline .line::before,
                .timeline .line::after {
                    width: 0px;
                }

                .timeline .line {
                    top: unset;
                }
            }


            .timeline .panel::before {
                position: absolute;
                display: block;
                top: 8px;
                left: -24px;
                content: '';
                width: 0px;
                height: 0px;
                border: inherit;
                border-width: 12px;
                border-top-color: transparent;
                border-bottom-color: transparent;
                border-left-color: transparent;
            }

            .timeline .panel .panel-heading.icon * {
                font-size: 20px;
                vertical-align: middle;
                line-height: 40px;
            }

            .timeline .panel .panel-heading.icon {
                position: absolute;
                left: -59px;
                display: block;
                width: 40px;
                height: 40px;
                padding: 0px;
                border-radius: 50%;
                text-align: center;
                float: left;
                background-image: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                color: white;
            }

            .timeline .panel-outline {
                border-color: transparent;
                background: transparent;
                box-shadow: none;
            }

            .timeline .panel-outline .panel-body {
                padding: 10px 0px;
            }

            .timeline .panel-outline .panel-heading:not(.icon),
            .timeline .panel-outline .panel-footer {
                display: none;
            }

            .panel-title {
                display: inline-block;
            }

            .user_card_info {
                width: 120px;
                float: left;
            }

            .user_card_info_0 {
                margin-bottom: 10px;
            }

            .panel-body .user_avatar_parent {

                border: 1px solid black;
                -webkit-box-shadow: 10px 10px 5px -7px rgba(0, 0, 0, 0.5);
                -moz-box-shadow: 10px 10px 5px -7px rgba(0, 0, 0, 0.5);
                box-shadow: 10px 10px 5px -7px rgba(0, 0, 0, 0.5);
                width: 152px;
                height: 152px;

                margin: auto;
                margin-bottom: 20px;
            }

            .panel-body .user_avatar_parent {
                width: 152px;
                height: 152px;
            }

            .panel-body .user_avatar_2 img {
                width: 150px;
                height: 150px;
                border-radius: unset;
            }


            @media (min-width: 768px) {
                .panel-body .user_avatar_parent {
                    margin-left: unset;
                    margin-right: unset;
                }
            }


            label[for="upload_avatar"] {
                position: absolute;
                bottom: -5px;
                width: 100%;
                padding: 5px 10px;
                border-radius: 30px;
                color: white;
                background-image: linear-gradient(135deg, #000000 30%, #746754 100%);
                left: 0;
                right: 0;
                margin-left: auto;
                margin-right: auto;
                border: white 1px solid;
                text-align: center;
            }

            .valid-feedback {
                width: 100%;
                margin-bottom: 10px;
                font-size: 80%;
                color: #28a745;
            }

            .invalid-feedback {
                width: 100%;
                margin-bottom: 10px;
                font-size: 80%;
                color: #dc3545;
            }

            .img-bordered {
                border: 3px solid gray;
                border-radius: 50%;
            }

            .hidden-content {
                display: none;
            }
        </style>

        <style>
            #fqa .panel-body a {
                border-bottom: 1px dashed black;
            }

            h1 {
                font-size: 32px;
                padding-right: 15px;
                padding-left: 15px;
                font-family: "Oswald";
                font-weight: normal;
                margin-bottom: 20px;
            }

            .number {
                z-index: 5;
                text-align: center;
                color: white;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                background-color: #ebebeb;
                /* margin: 3px; */
                display: inline-flex;
                justify-content: center;
                align-items: center;
                background-image: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                border: 1px #1ebbf0 solid;
                font-size: 12px;
                margin-right: 7px;
            }

            .panel-default>.panel-heading {
                background-image: unset;
            }
        </style>
    @endpush

    <div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container tax">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <span class="fa fa-home"></span> <a href="/" itemprop="url">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active">
                Hồ sơ
            </li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-xs-12">
                <div id="ss-user">
                    <div class="user_avatar_parent">
                        <div class="user_avatar_2">
                            <img style="object-fit: cover"
                                src="{{ $user->hinh_anh ? Storage::url($user->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                alt="Avatar" class="img-bordered" />
                        </div>
                    </div>
                    <div class="ss-info zbottom-10">
                        <div class="user_nickname">
                            <a href="https://truyenhdt.com/author/1728740683/">
                                {{ $user->ten_doc_gia }} </a>
                        </div>
                    </div>
                </div>
                <div id="user-sidebar">
                    <ul class="list-group">
                        <li class="list-group-item tf-active" id="menu-profile">
                            <a href="javascript:void(0)" class="menu-link" data-target="profile-content"
                                data-breadcrumb="Hồ sơ"><i class="fa fa-tachometer" aria-hidden="true"></i> Hồ sơ</a>
                        </li>
                        <li class="list-group-item" id="menu-upload">
                            <a href="javascript:void(0)" class="menu-link" data-target="upload-content"
                                data-breadcrumb="Đăng Truyện"><i class="fa fa-list-alt" aria-hidden="true"></i> Tủ sách cá
                                nhân</a>
                        </li>
                        <li class="list-group-item" id="menu-notification">
                            <a href="javascript:void(0)" class="menu-link" data-target="notification-content"
                                data-breadcrumb="Cài đặt thông báo"><i class="fa fa-bell" aria-hidden="true"></i> Thông
                                báo</a>
                        </li>
                        <li class="list-group-item" id="menu-message">
                            <a href="javascript:void(0)" class="menu-link" data-target="message-content"
                                data-breadcrumb="Tin Nhắn"><i class="fa fa-envelope" aria-hidden="true"></i> Tin Nhắn</a>
                        </li>
                        <li class="list-group-item" id="menu-library">
                            <a href="javascript:void(0)" class="menu-link" data-target="library-content"
                                data-breadcrumb="Tủ Truyện"><i class="fa fa-money" aria-hidden="true"></i> Lịch sử giao
                                dịch</a>
                        </li>
                        <li class="list-group-item" id="menu-security">
                            <a href="javascript:void(0)" class="menu-link" data-target="security-content"
                                data-breadcrumb="Cài đặt bảo mật"><i class="fa fa-lock" aria-hidden="true"></i> Đổi mật
                                khẩu</a>
                        </li>


                        <li class="list-group-item" id="menu-deactivation">
                            <a href="javascript:void(0)" class="menu-link" data-target="deactivation-content"
                                data-breadcrumb="Ngừng kích hoạt tài khoản"><i class="fa fa-question-circle"
                                    aria-hidden="true"></i> Câu hỏi thường gặp</a>
                        </li>
                        <li class="list-group-item" id="menu-activity-log">
                            <a href="javascript:void(0)" class="menu-link" data-target="activity-log-content"
                                data-breadcrumb="Nhật ký hoạt động"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng
                                xuất</a>
                        </li>
                    </ul>
                </div>


                <div class="modal fade" id="myModalDashboard" tabindex="-1" role="dialog"
                    aria-labelledby="myModalDashboardLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalDashboardLabel">Chú ý:</h4>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát!</button>
                            </div>
                        </div>
                    </div>
                </div>
                <style type="text/css">
                    h1 {
                        font-family: "Oswald";
                        font-weight: normal;
                        font-size: 26px;
                        text-align: center;
                    }

                    .user_nickname {
                        font-family: "Oswald";
                        font-size: 20px;
                        text-align: center;
                        margin: 0px 0px 0px 0px;
                    }


                    .user_avatar_parent,
                    .user_avatar_2 img {
                        width: 100px;
                        height: 100px;
                    }

                    .user_avatar_parent {
                        position: relative;
                        display: block;
                    }

                    .user_avatar_2 img {
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                        border-radius: 50%;
                    }

                    .user-badge img {
                        width: 20px;
                    }

                    #ss-user {
                        display: flex;
                        justify-content: space-evenly;
                        align-items: center;
                    }

                    .ss-info {
                        text-align: center;
                    }

                    .list-group-item.tf-active {
                        background-image: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                        color: white;
                    }

                    .list-group-item.tf-active a {
                        color: white;
                    }

                    #user-sidebar .list-group-item {
                        border: 1px solid #1ebbf0;
                        width: 49%;
                        display: inline-block;
                        min-height: 44px;
                        max-height: 55px;
                    }

                    @media (min-width: 768px) {
                        #ss-user {
                            display: unset;
                        }

                        .theloai-thumlist h3 {
                            min-height: 45px;
                        }

                        .user_avatar_parent,
                        .user_avatar_2 img {
                            width: 150px;
                            height: 150px;
                        }

                        .user_avatar_2 img {
                            border-radius: unset;
                        }

                        .user_nickname {
                            margin: 12px 0px 0px 0px;
                        }

                        .user_avatar_parent {
                            margin-left: auto;
                            margin-right: auto;
                        }

                        #user-sidebar .list-group-item {
                            width: 33%
                        }
                    }

                    @media (min-width: 1200px) {
                        #user-sidebar .list-group-item {
                            width: 100%;
                            display: block;
                        }
                    }

                    ul.list-group li {}


                    /** Top sidebar **/
                    .hr-primary {
                        border-top-width: 5px;
                        margin: 0px 0px 20px 0px;
                        border-width: 0;
                        border-color: #1ebbf0;
                        -moz-border-image: -moz-linear-gradient(left, #1ebbf0 30%, #39dfaa 100%);
                        -webkit-border-image: -webkit-linear-gradient(left, #1ebbf0 30%, #39dfaa 100%);
                        border-image: linear-gradient(left, #1ebbf0 30%, #39dfaa 100%);
                        border-image-slice: 1;
                        height: 2px;
                        border-style: solid;
                        border-width: 2px;
                        border-color: rgba(0, 0, 0, .08);
                        border-left: none;
                        border-right: none;
                        border-bottom: none;
                        line-height: 9px;
                    }

                    @media (min-width: 768px) {
                        .hr-primary {
                            height: 4px;
                            border-width: 4px;
                        }
                    }

                    .list-group.list-group-horizontal {
                        border-radius: 4px;
                        overflow-x: auto;
                        overflow-y: hidden;
                        white-space: nowrap;
                        position: relative;
                        margin-bottom: 0px;
                        margin-top: 30px;
                    }

                    .list-group-horizontal .list-group-item {
                        display: inline-block;
                        margin-bottom: -1px;
                        margin-right: -4px;
                        min-height: 44px;
                        /*		 	border-right-width: 0;
                                                                                                                                                                                                                                    */
                    }

                    .list-group-horizontal .list-group-item:first-child {
                        border-top-right-radius: 0;
                        border-bottom-left-radius: 4px;
                    }

                    .list-group-horizontal .list-group-item:last-child {
                        border-top-right-radius: 4px;
                        border-bottom-left-radius: 0;
                        border-right-width: 1px;
                    }

                    /*-------------------------------------------------
                                                                                                                                                                                                                                        |           Badge
                                                                                                                                                                                                                                        |-------------------------------------------------*/
                    .badge {
                        display: inline-block;
                        padding: .25em .4em;
                        font-size: 75%;
                        font-weight: 700;
                        line-height: 1;
                        text-align: center;
                        white-space: nowrap;
                        vertical-align: baseline;
                        border-radius: .25rem;
                    }

                    .badge-success {
                        color: #fff;
                        background-color: #28a745;
                    }

                    .badge-info {
                        color: #fff;
                        background-color: #17a2b8;
                    }

                    .badge-warning {
                        color: #212529;
                        background-color: #ffc107;
                    }

                    .badge-danger {
                        color: #fff;
                        background-color: #dc3545;
                    }

                    .badge-secondary {
                        color: #fff;
                        background-color: #6c757d;
                    }

                    .pull-right .badge,
                    a .badge,
                    .tf-active .badge {
                        display: inline-block;
                        min-width: 10px;
                        padding: 3px 7px;
                        font-size: 12px;
                        font-weight: 700;
                        line-height: 1;
                        color: #fff;
                        text-align: center;
                        white-space: nowrap;
                        vertical-align: middle;
                        background-image: linear-gradient(135deg, #000000 30%, #746754 100%);
                        border-radius: 10px;
                        border: white 1px solid;
                        margin-bottom: 1px;
                    }

                    #tf-user ul.dropdown-menu i.fa {
                        width: 15px;
                    }

                    /*		@media (min-width: 1200px) {
                                                                                                                                                                                                                                            .pull-right .badge, a .badge, .tf-active .badge{
                                                                                                                                                                                                                                                padding: 3px 7px;
                                                                                                                                                                                                                                                font-size: 12px;
                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                        }*/
                    /*-------------------------------------------------
                                                                                                                                                                                                                                        |            Button Ajax Loading
                                                                                                                                                                                                                                        |-------------------------------------------------*/
                    .lds-ellipsis {
                        display: inline-block;
                        position: relative;
                        margin-bottom: 10px
                    }

                    .lds-ellipsis div {
                        position: absolute;
                        top: 0;
                        width: 13px;
                        height: 13px;
                        border-radius: 50%;
                        background-image: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                        animation-timing-function: cubic-bezier(0, 1, 1, 0)
                    }

                    .lds-ellipsis div:nth-child(1) {
                        left: 8px;
                        animation: lds-ellipsis1 .6s infinite
                    }

                    .lds-ellipsis div:nth-child(2) {
                        left: 8px;
                        animation: lds-ellipsis2 .6s infinite
                    }

                    .lds-ellipsis div:nth-child(3) {
                        left: 32px;
                        animation: lds-ellipsis2 .6s infinite
                    }

                    .lds-ellipsis div:nth-child(4) {
                        left: 56px;
                        animation: lds-ellipsis3 .6s infinite
                    }

                    @keyframes lds-ellipsis1 {
                        0% {
                            transform: scale(0)
                        }

                        100% {
                            transform: scale(1)
                        }
                    }

                    @keyframes lds-ellipsis3 {
                        0% {
                            transform: scale(1)
                        }

                        100% {
                            transform: scale(0)
                        }
                    }

                    @keyframes lds-ellipsis2 {
                        0% {
                            transform: translate(0, 0)
                        }

                        100% {
                            transform: translate(24px, 0)
                        }
                    }

                    .text-center .lds-ellipsis {
                        margin-left: -75px
                    }


                    .list-group-item .dropdown-menu {
                        left: unset;
                        right: 0;
                    }

                    #upload_avatar {
                        display: none;
                    }

                    .alert .close {
                        position: absolute;
                        top: 10px;
                        right: 15px;
                        width: auto;
                        height: auto;
                        line-height: normal;
                        background-color: transparent;
                        color: #555;
                        font-size: 20px;
                        opacity: 0.8;
                        border: none;
                        padding: 0;
                    }

                    .alert {
                        position: relative;
                        padding-right: 50px;
                    }

                    .d-flex {
                        display: flex;
                        align-items: center;
                        /* This ensures vertical center alignment of all flex items */
                    }

                    .align-items-center {
                        align-items: center;
                        /* This is technically redundant if already included in .d-flex */
                    }

                    .pull-right {
                        margin-left: auto;
                        /* This will push your form-group to the right */
                    }
                </style>
            </div>
            <div class="col-lg-9 col-xs-12">
                {{-- --}}
                <div id="content-area">

                    <div id="profile-content" class="menu-content">
                        <h1 id="h1">Thông tin cá nhân</h1>

                        <div class="timeline">

                            <div class="line text-muted"></div>

                            <article class="panel panel-info panel-outline">
                                <div class="panel-heading icon">
                                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3">
                                            <div class="user_avatar_parent">
                                                <div class="user_avatar_2">
                                                    <img style="object-fit: cover" id="avatar-preview"
                                                        src="{{ $user->hinh_anh ? Storage::url($user->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                                        alt="Avatar" />
                                                </div>

                                                <input type="file" id="upload_avatar" accept="image/*">

                                                <label for="upload_avatar" class="user_avatar_upload_icon">
                                                    <span class="glyphicon glyphicon-folder-open"
                                                        aria-hidden="true"></span>
                                                    <i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload
                                                </label>
                                            </div>


                                        </div>
                                        <div class="col-xs-12 col-sm-5">
                                            <div class="user_card_info_0">
                                                <span class="user_card_info">◉ Họ và tên:</span> {{ $user->ten_doc_gia }}
                                            </div>
                                            <div class="user_card_info_0">
                                                <span class="user_card_info crop-text">◉ Email:</span> {{ $user->email }}
                                            </div>
                                            <div class="user_card_info_0">
                                                <span class="user_card_info">◉ ID Thành Viên:</span> {{ $user->id }}
                                            </div>

                                        </div>
                                        <div class="col-xs-12 col-sm-4">
                                            <div class="user_card_info_0">
                                                <span class="user_card_info">◉ Số điện thoại:</span>
                                                {{ $user->so_dien_thoai }}
                                            </div>
                                            <div class="user_card_info_0">
                                                <span class="user_card_info">◉ Ngày sinh:</span>
                                                {{ \Carbon\Carbon::parse($user->sinh_nhat)->format('d/m/Y') }}
                                            </div>
                                            <div class="user_card_info_0">
                                                <span class="user_card_info">◉ Giới tính:</span> {{ $user->gioi_tinh }}
                                            </div>
                                            <div class="user_card_info_0">
                                                <span class="user_card_info"><i class="fa fa-money"
                                                        aria-hidden="true"></i> Số
                                                    dư:</span> {{ number_format($user->so_du, 0, ',', '.') }} VNĐ
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-3"></div>

                                    </div>

                                    <div class="col-xs-12 col-sm-9">
                                        <em><a href="/q-a/" class="link-color"><i class="fa fa-blind hidden-xs"
                                                    aria-hidden="true"></i> Những câu hỏi
                                                thường gặp</a></em>
                                    </div>
                                </div>
                            </article>

                            <article class="panel panel-default">
                                <div class="panel-heading icon">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                <div class="panel-heading">
                                    <h2 class="panel-title">Cập nhật Thông Tin Cá Nhân</h2>
                                </div>
                                <div class="panel-body">
                                    {{-- Thông báo thành công --}}
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    {{--  Thông báo lỗi chung --}}
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong class="fs-5">Thất bại</strong> <br>
                                            <strong class="d-block">Vui lòng kiểm tra các lỗi sau:</strong>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form id="avatar-upload-form" action="{{ route('trang-ca-nhan.update', $user->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <input type="file" id="hidden_upload_avatar" name="hinh_anh"
                                            style="display:none" accept="image/*">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="fullName">Họ và Tên:</label>
                                                    <input type="text"
                                                        class="form-control @error('ten_doc_gia') is-invalid @enderror"
                                                        id="fullName" name="ten_doc_gia"
                                                        value="{{ old('ten_doc_gia', $user->ten_doc_gia) }}">
                                                    @error('ten_doc_gia')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="phone">Số điện thoại:</label>
                                                    <input type="text"
                                                        class="form-control @error('so_dien_thoai') is-invalid @enderror"
                                                        id="phone" name="so_dien_thoai"
                                                        value="{{ old('so_dien_thoai', $user->so_dien_thoai) }}">
                                                    @error('so_dien_thoai')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="dob">Ngày sinh:</label>
                                                    <input type="date"
                                                        class="form-control @error('sinh_nhat') is-invalid @enderror"
                                                        id="dob" name="sinh_nhat"
                                                        max="{{ now()->format('Y-m-d') }}"
                                                        value="{{ old('sinh_nhat', $user->sinh_nhat ? \Carbon\Carbon::parse($user->sinh_nhat)->format('Y-m-d') : '') }}">
                                                    @error('sinh_nhat')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="email">Email:</label>
                                                    <input type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        id="email" name="email"
                                                        value="{{ old('email', $user->email) }}">
                                                    @error('email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="address">Địa chỉ:</label>
                                                    <input type="text"
                                                        class="form-control @error('dia_chi') is-invalid @enderror"
                                                        id="address" name="dia_chi"
                                                        value="{{ old('dia_chi', $user->dia_chi) }}">
                                                    @error('dia_chi')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="gender">Giới tính:</label>
                                                    <select name="gioi_tinh" id="gender"
                                                        class="form-control @error('gioi_tinh') is-invalid @enderror">
                                                        <option value="Nam"
                                                            {{ old('gioi_tinh', $user->gioi_tinh) == 'Nam' ? 'selected' : '' }}>
                                                            Nam
                                                        </option>
                                                        <option value="Nữ"
                                                            {{ old('gioi_tinh', $user->gioi_tinh) == 'Nữ' ? 'selected' : '' }}>
                                                            Nữ
                                                        </option>
                                                    </select>
                                                    @error('gioi_tinh')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-2">Cập nhật</button>
                                            <button type="reset" class="btn btn-secondary">Hủy bỏ</button>

                                        </div>
                                    </form>
                                </div>
                            </article>

                            {{--                  --}}

                        </div>
                    </div>
                    {{--                    end profile                    --}}

                    <div id="upload-content" class="menu-content hidden-content">
                        <style>
                            .list-group-item.tf-active1 {
                                background-image: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                                color: white;
                            }

                            .list-group-item.tf-active1 a {
                                color: white;
                            }
                        </style>

                        <h1 id="h1">Tủ sách cá nhân</h1>
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item tf-active1" id="menu-currently-reading"
                                data-target="#currently-reading">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-book" aria-hidden="true"></i> Sách đang đọc
                                    <span class="badge">45</span>
                                </a>
                            </li>
                            <li class="list-group-item" id="menu-purchased" data-target="#purchased">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Sách đã mua
                                    <span class="badge">11</span>
                                </a>
                            </li>
                            <li class="list-group-item" id="menu-favorites" data-target="#favorites">
                                <a href="javascript:void(0);">
                                    <i class="fa fa-heart" aria-hidden="true"></i> Yêu thích
                                    <span class="badge">11</span>
                                </a>
                            </li>

                        </ul>



                        <div id="currently-reading-content" class="content-div" style="display: block;">
                            <div class="hr-primary"></div>
                            <div class="list-group-item list-group-item-info d-flex">
                                <strong class="font-16">Sách đang đọc (45)</strong>

                                <div class="pull-right">
                                    <form action="" method="get" class="navbar-form navbar-left"
                                        role="search_truyen">
                                        <input name="sort" value="new" role="search_truyen" class="hidden">
                                        <input name="author" value="my" role="search_truyen" class="hidden">
                                        <input name="post_status" value="all" role="search_truyen" class="hidden">
                                        <input class="form-control" name="search_title" type="text" value=""
                                            placeholder="Nhập Tên Truyện..." aria-label="" role="search_truyen">
                                        <input class="btn btn-primary" type="submit" value="Tìm kiếm"
                                            role="search_truyen">
                                    </form>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div style="overflow-x:auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>

                                                <th>Truyện</th>
                                                <th>Tác giả</th>
                                                <th>Gần đây</th>
                                                <th>Mới nhất</th>
                                                <th>Tình Trạng</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <th>149</th>

                                                <th>
                                                    <img src="https://truyenhdt.com/wp-content/uploads/2023/04/9140707.jpg"
                                                        width="40" height="60" style="margin-right: 5px;" />
                                                    Vạn Người Chê Thụ Cù&nbsp;&hellip;
                                                </th>
                                                <th>Alexander okok</th>
                                                <th>Chap 1</th>
                                                <th>Chap 100</th>
                                                <th><span class="badge badge-success">Hoàn Thành</span></th>
                                                <th>
                                                    <div class="dropdown pull-right">
                                                        <button class="btn btn-default dropdown-toggle" type="button"
                                                            data-toggle="dropdown"><i class="fa fa-cog"
                                                                aria-hidden="true"></i>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-info" aria-hidden="true"></i> Chi
                                                                    Tiết</a></li>
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-trash text-danger"
                                                                        aria-hidden="true"></i> Xóa lịch sử </a></li>
                                                        </ul>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>149</th>

                                                <th>
                                                    <img src="https://truyenhdt.com/wp-content/uploads/2023/04/9140707.jpg"
                                                        width="40" height="60" style="margin-right: 5px;" />
                                                    Vạn Người Chê Thụ Cù&nbsp;&hellip;
                                                </th>
                                                <th>Alexander okok</th>
                                                <th>Chap 1</th>
                                                <th>Chap 100</th>
                                                <th><span class="badge badge-success">Hoàn Thành</span></th>
                                                <th>
                                                    <div class="dropdown pull-right">
                                                        <button class="btn btn-default dropdown-toggle" type="button"
                                                            data-toggle="dropdown"><i class="fa fa-trash"
                                                                aria-hidden="true"></i>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-info" aria-hidden="true"></i> Chi
                                                                    Tiết</a></li>
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-trash text-danger"
                                                                        aria-hidden="true"></i> Xóa lịch sử </a></li>
                                                        </ul>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>149</th>

                                                <th>
                                                    <img src="https://truyenhdt.com/wp-content/uploads/2023/06/truc-ma-cua-toi-vo-cung-nham-hiem-1686392020.jpg"
                                                        width="40" height="60" style="margin-right: 5px;" />
                                                    Vạn Người Chê Thụ Cù&nbsp;&hellip;
                                                </th>
                                                <th>Alexander okok</th>
                                                <th>Chap 1</th>
                                                <th>Chap 100</th>
                                                <th><span class="badge badge-success">Hoàn Thành</span></th>
                                                <th>
                                                    <div class="dropdown pull-right">
                                                        <button class="btn btn-default dropdown-toggle" type="button"
                                                            data-toggle="dropdown"><i class="fa fa-cog"
                                                                aria-hidden="true"></i>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-info" aria-hidden="true"></i> Chi
                                                                    Tiết</a></li>
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-trash text-danger"
                                                                        aria-hidden="true"></i> Xóa lịch sử </a></li>
                                                        </ul>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>149</th>

                                                <th>
                                                    <img src="https://truyenhdt.com/wp-content/uploads/2023/07/di-the-tim-chong-1688466583.jpg"
                                                        width="40" height="60" style="margin-right: 5px;" />
                                                    Vạn Người Chê Thụ Cù&nbsp;&hellip;
                                                </th>
                                                <th>Alexander okok</th>
                                                <th>Chap 1</th>
                                                <th>Chap 100</th>
                                                <th><span class="badge badge-success">Hoàn Thành</span></th>
                                                <th>
                                                    <div class="dropdown pull-right">
                                                        <button class="btn btn-default dropdown-toggle" type="button"
                                                            data-toggle="dropdown"><i class="fa fa-cog"
                                                                aria-hidden="true"></i>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-info" aria-hidden="true"></i> Chi
                                                                    Tiết</a></li>
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-trash text-danger"
                                                                        aria-hidden="true"></i> Xóa lịch sử </a></li>
                                                        </ul>
                                                    </div>
                                                </th>
                                            </tr>



                                        </tbody>
                                    </table>
                                    <ul class="pagination text-center" id="id_pagination">
                                        <li class="active"><a href="/user/nhiem-vu/?q=1&x=1&n=1#h1">1</a></li>
                                        <li class><a href="/user/nhiem-vu/?q=1&x=1&n=2#h1">2</a></li>
                                        <li class><a href="/user/nhiem-vu/?q=1&x=1&n=3#h1">3</a></li>
                                        <li class><a href="/user/nhiem-vu/?q=1&x=1&n=4#h1">4</a></li>
                                        <li class><a href="/user/nhiem-vu/?q=1&x=1&n=5#h1">5</a></li>
                                        <li><a href="/user/nhiem-vu/?q=1&x=1&n=2#h1">»</a></li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div id="purchased-content" class="content-div" style="display: none;">
                            <div class="hr-primary"></div>
                            <div class="list-group-item list-group-item-info d-flex">
                                <strong class="font-16">Sách đã mua(45)</strong>

                                <div class="pull-right">
                                    <form action="" method="get" class="navbar-form navbar-left"
                                        role="search_truyen">
                                        <input name="sort" value="new" role="search_truyen" class="hidden">
                                        <input name="author" value="my" role="search_truyen" class="hidden">
                                        <input name="post_status" value="all" role="search_truyen" class="hidden">
                                        <input class="form-control" name="search_title" type="text" value=""
                                            placeholder="Nhập Tên Truyện..." aria-label="" role="search_truyen">
                                        <input class="btn btn-primary" type="submit" value="Tìm kiếm"
                                            role="search_truyen">
                                    </form>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div style="overflow-x:auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>

                                                <th>Truyện</th>
                                                <th>Tác giả</th>
                                                <th>Gần đây</th>
                                                <th>Mới nhất</th>
                                                <th>Tình Trạng</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <th>149</th>

                                                <th>
                                                    <img src="https://truyenhdt.com/wp-content/uploads/2023/04/9140707.jpg"
                                                        width="40" height="60" style="margin-right: 5px;" />
                                                    Vạn Người Chê Thụ Cù&nbsp;&hellip;
                                                </th>
                                                <th>Alexander okok</th>
                                                <th>Chap 1</th>
                                                <th>Chap 100</th>
                                                <th><span class="badge badge-success">Hoàn Thành</span></th>
                                                <th>
                                                    <div class="dropdown pull-right">
                                                        <button class="btn btn-default dropdown-toggle" type="button"
                                                            data-toggle="dropdown"><i class="fa fa-cog"
                                                                aria-hidden="true"></i>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-info" aria-hidden="true"></i> Chi
                                                                    Tiết</a></li>
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-trash text-danger"
                                                                        aria-hidden="true"></i> Xóa lịch sử </a></li>
                                                        </ul>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>149</th>

                                                <th>
                                                    <img src="https://truyenhdt.com/wp-content/uploads/2023/04/9140707.jpg"
                                                        width="40" height="60" style="margin-right: 5px;" />
                                                    Vạn Người Chê Thụ Cù&nbsp;&hellip;
                                                </th>
                                                <th>Alexander okok</th>
                                                <th>Chap 1</th>
                                                <th>Chap 100</th>
                                                <th><span class="badge badge-success">Hoàn Thành</span></th>
                                                <th>
                                                    <div class="dropdown pull-right">
                                                        <button class="btn btn-default dropdown-toggle" type="button"
                                                            data-toggle="dropdown"><i class="fa fa-trash"
                                                                aria-hidden="true"></i>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-info" aria-hidden="true"></i> Chi
                                                                    Tiết</a></li>
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-trash text-danger"
                                                                        aria-hidden="true"></i> Xóa lịch sử </a></li>
                                                        </ul>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>149</th>

                                                <th>
                                                    <img src="https://truyenhdt.com/wp-content/uploads/2023/06/truc-ma-cua-toi-vo-cung-nham-hiem-1686392020.jpg"
                                                        width="40" height="60" style="margin-right: 5px;" />
                                                    Vạn Người Chê Thụ Cù&nbsp;&hellip;
                                                </th>
                                                <th>Alexander okok</th>
                                                <th>Chap 1</th>
                                                <th>Chap 100</th>
                                                <th><span class="badge badge-success">Hoàn Thành</span></th>
                                                <th>
                                                    <div class="dropdown pull-right">
                                                        <button class="btn btn-default dropdown-toggle" type="button"
                                                            data-toggle="dropdown"><i class="fa fa-cog"
                                                                aria-hidden="true"></i>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-info" aria-hidden="true"></i> Chi
                                                                    Tiết</a></li>
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-trash text-danger"
                                                                        aria-hidden="true"></i> Xóa lịch sử </a></li>
                                                        </ul>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>149</th>

                                                <th>
                                                    <img src="https://truyenhdt.com/wp-content/uploads/2023/07/di-the-tim-chong-1688466583.jpg"
                                                        width="40" height="60" style="margin-right: 5px;" />
                                                    Vạn Người Chê Thụ Cù&nbsp;&hellip;
                                                </th>
                                                <th>Alexander okok</th>
                                                <th>Chap 1</th>
                                                <th>Chap 100</th>
                                                <th><span class="badge badge-success">Hoàn Thành</span></th>
                                                <th>
                                                    <div class="dropdown pull-right">
                                                        <button class="btn btn-default dropdown-toggle" type="button"
                                                            data-toggle="dropdown"><i class="fa fa-cog"
                                                                aria-hidden="true"></i>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-info" aria-hidden="true"></i> Chi
                                                                    Tiết</a></li>
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-trash text-danger"
                                                                        aria-hidden="true"></i> Xóa lịch sử </a></li>
                                                        </ul>
                                                    </div>
                                                </th>
                                            </tr>



                                        </tbody>
                                    </table>
                                    <ul class="pagination text-center" id="id_pagination">
                                        <li class="active"><a href="/user/nhiem-vu/?q=1&x=1&n=1#h1">1</a></li>
                                        <li class><a href="/user/nhiem-vu/?q=1&x=1&n=2#h1">2</a></li>
                                        <li class><a href="/user/nhiem-vu/?q=1&x=1&n=3#h1">3</a></li>
                                        <li class><a href="/user/nhiem-vu/?q=1&x=1&n=4#h1">4</a></li>
                                        <li class><a href="/user/nhiem-vu/?q=1&x=1&n=5#h1">5</a></li>
                                        <li><a href="/user/nhiem-vu/?q=1&x=1&n=2#h1">»</a></li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div id="favorites-content" class="content-div" style="display: none;">
                            <div class="hr-primary"></div>
                            <div class="list-group-item list-group-item-info d-flex">
                                <strong class="font-16">Sách yêu thích (45)</strong>

                                <div class="pull-right">
                                    <form action="" method="get" class="navbar-form navbar-left"
                                        role="search_truyen">
                                        <input name="sort" value="new" role="search_truyen" class="hidden">
                                        <input name="author" value="my" role="search_truyen" class="hidden">
                                        <input name="post_status" value="all" role="search_truyen" class="hidden">
                                        <input class="form-control" name="search_title" type="text" value=""
                                            placeholder="Nhập Tên Truyện..." aria-label="" role="search_truyen">
                                        <input class="btn btn-primary" type="submit" value="Tìm kiếm"
                                            role="search_truyen">
                                    </form>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div style="overflow-x:auto;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>

                                                <th>Truyện</th>
                                                <th>Tác giả</th>
                                                <th>Gần đây</th>
                                                <th>Mới nhất</th>
                                                <th>Tình Trạng</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <th>149</th>

                                                <th>
                                                    <img src="https://truyenhdt.com/wp-content/uploads/2023/04/9140707.jpg"
                                                        width="40" height="60" style="margin-right: 5px;" />
                                                    Vạn Người Chê Thụ Cù&nbsp;&hellip;
                                                </th>
                                                <th>Alexander okok</th>
                                                <th>Chap 1</th>
                                                <th>Chap 100</th>
                                                <th><span class="badge badge-success">Hoàn Thành</span></th>
                                                <th>
                                                    <div class="dropdown pull-right">
                                                        <button class="btn btn-default dropdown-toggle" type="button"
                                                            data-toggle="dropdown"><i class="fa fa-cog"
                                                                aria-hidden="true"></i>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-info" aria-hidden="true"></i> Chi
                                                                    Tiết</a></li>
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-trash text-danger"
                                                                        aria-hidden="true"></i> Xóa lịch sử </a></li>
                                                        </ul>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>149</th>

                                                <th>
                                                    <img src="https://truyenhdt.com/wp-content/uploads/2023/04/9140707.jpg"
                                                        width="40" height="60" style="margin-right: 5px;" />
                                                    Vạn Người Chê Thụ Cù&nbsp;&hellip;
                                                </th>
                                                <th>Alexander okok</th>
                                                <th>Chap 1</th>
                                                <th>Chap 100</th>
                                                <th><span class="badge badge-success">Hoàn Thành</span></th>
                                                <th>
                                                    <div class="dropdown pull-right">
                                                        <button class="btn btn-default dropdown-toggle" type="button"
                                                            data-toggle="dropdown"><i class="fa fa-trash"
                                                                aria-hidden="true"></i>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-info" aria-hidden="true"></i> Chi
                                                                    Tiết</a></li>
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-trash text-danger"
                                                                        aria-hidden="true"></i> Xóa lịch sử </a></li>
                                                        </ul>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>149</th>

                                                <th>
                                                    <img src="https://truyenhdt.com/wp-content/uploads/2023/06/truc-ma-cua-toi-vo-cung-nham-hiem-1686392020.jpg"
                                                        width="40" height="60" style="margin-right: 5px;" />
                                                    Vạn Người Chê Thụ Cù&nbsp;&hellip;
                                                </th>
                                                <th>Alexander okok</th>
                                                <th>Chap 1</th>
                                                <th>Chap 100</th>
                                                <th><span class="badge badge-success">Hoàn Thành</span></th>
                                                <th>
                                                    <div class="dropdown pull-right">
                                                        <button class="btn btn-default dropdown-toggle" type="button"
                                                            data-toggle="dropdown"><i class="fa fa-cog"
                                                                aria-hidden="true"></i>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-info" aria-hidden="true"></i> Chi
                                                                    Tiết</a></li>
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-trash text-danger"
                                                                        aria-hidden="true"></i> Xóa lịch sử </a></li>
                                                        </ul>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>149</th>

                                                <th>
                                                    <img src="https://truyenhdt.com/wp-content/uploads/2023/07/di-the-tim-chong-1688466583.jpg"
                                                        width="40" height="60" style="margin-right: 5px;" />
                                                    Vạn Người Chê Thụ Cù&nbsp;&hellip;
                                                </th>
                                                <th>Alexander okok</th>
                                                <th>Chap 1</th>
                                                <th>Chap 100</th>
                                                <th><span class="badge badge-success">Hoàn Thành</span></th>
                                                <th>
                                                    <div class="dropdown pull-right">
                                                        <button class="btn btn-default dropdown-toggle" type="button"
                                                            data-toggle="dropdown"><i class="fa fa-cog"
                                                                aria-hidden="true"></i>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-info" aria-hidden="true"></i> Chi
                                                                    Tiết</a></li>
                                                            <li><a href="/user/nhiem-vu/view/?id=149#h1"><i
                                                                        class="fa fa-trash text-danger"
                                                                        aria-hidden="true"></i> Xóa lịch sử </a></li>
                                                        </ul>
                                                    </div>
                                                </th>
                                            </tr>



                                        </tbody>
                                    </table>
                                    <ul class="pagination text-center" id="id_pagination">
                                        <li class="active"><a href="/user/nhiem-vu/?q=1&x=1&n=1#h1">1</a></li>
                                        <li class><a href="/user/nhiem-vu/?q=1&x=1&n=2#h1">2</a></li>
                                        <li class><a href="/user/nhiem-vu/?q=1&x=1&n=3#h1">3</a></li>
                                        <li class><a href="/user/nhiem-vu/?q=1&x=1&n=4#h1">4</a></li>
                                        <li class><a href="/user/nhiem-vu/?q=1&x=1&n=5#h1">5</a></li>
                                        <li><a href="/user/nhiem-vu/?q=1&x=1&n=2#h1">»</a></li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <style type="text/css">
                            .pagination {
                                padding: 15px 0 0 0
                            }

                            ul.pagination li {
                                list-style: none;
                                display: inline-block;
                                margin: 10px 0
                            }

                            .pagination li:hover a {
                                background: linear-gradient(135deg, #848484 30%, #000 100%);
                                color: #fff
                            }

                            .pagination li.active a {
                                color: #fff;
                                background: linear-gradient(135deg, #000 30%, #848484 100%)
                            }

                            .pagination li.active:hover a,
                            .pagination li.disabled:hover a {
                                background: linear-gradient(135deg, #000 30%, #848484 100%);
                                cursor: not-allowed;
                                pointer-events: none
                            }

                            .pagination li a {
                                border: solid 1px #000;
                                color: #000;
                                padding: .6rem 1rem;
                                border-radius: 4px;
                                border: solid 1px #000;
                                margin: 4px 2px
                            }
                        </style>
                    </div>

                    {{--                    end đăng truyên                 --}}
                    <div id="message-content" class="menu-content hidden-content">
                        <h1>Tin nhắn</h1>
                        <div class="timeline">
                            <div class="line text-muted"></div>
                            <article class="panel panel-info panel-outline">
                                <div class="panel-heading icon">
                                    <i class="fa fa-id-card-o" aria-hidden="true"></i>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-3">
                                            <h2>Code ở đây</h2>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                            <p>Code ở đây</p>
                                        </div>
                                    </div>
                                </div>
                            </article>


                            {{--                  --}}

                        </div>
                    </div>

                    {{--                    end tin nhắn                    --}}
                    <div id="library-content" class="menu-content hidden-content">
                        <h1>Lịch Sử Giao Dịch</h1>
                        <div class="timeline">
                            <div class="line text-muted"></div>
                            <article class="panel panel-info panel-outline">
                                <div class="panel-heading icon">
                                    <i class="fa fa-history" aria-hidden="true"></i>
                                </div>
                                <div class="panel-body">
                                    <!-- Nơi đặt bảng lịch sử giao dịch -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID Giao Dịch</th>
                                                <th>Ngày</th>
                                                <th>Số Tiền</th>
                                                <th>Trạng Thái</th>
                                                <th>Chi Tiết</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Các dòng dữ liệu sẽ được thêm vào đây -->
                                            <tr>
                                                <td>12345</td>
                                                <td>2023-10-17</td>
                                                <td>1.000.000 VND</td>
                                                <td>Hoàn Thành</td>
                                                <td><button class="btn btn-primary"
                                                        onclick="showDetails(12345)">Xem</button></td>
                                            </tr>
                                            <!-- Thêm các dòng dữ liệu khác tương tự -->
                                            <!-- Các dòng dữ liệu sẽ được thêm vào đây -->
                                            <tr>
                                                <td>12345</td>
                                                <td>2023-10-17</td>
                                                <td>1.000.000 VND</td>
                                                <td>Hoàn Thành</td>
                                                <td><button class="btn btn-primary"
                                                        onclick="showDetails(12345)">Xem</button></td>
                                            </tr>
                                            <!-- Thêm các dòng dữ liệu khác tương tự -->
                                            <!-- Các dòng dữ liệu sẽ được thêm vào đây -->
                                            <tr>
                                                <td>12345</td>
                                                <td>2023-10-17</td>
                                                <td>1.000.000 VND</td>
                                                <td>Hoàn Thành</td>
                                                <td><button class="btn btn-primary"
                                                        onclick="showDetails(12345)">Xem</button></td>
                                            </tr>
                                            <!-- Thêm các dòng dữ liệu khác tương tự -->



                                        </tbody>
                                    </table>
                                </div>
                            </article>
                        </div>
                    </div>


                    {{-- Security Settings Page --}}
                    <div id="security-content" class="menu-content hidden-content">
                        <h1>Đổi mật khẩu</h1>
                        <div class="timeline">
                            <div class="line text-muted"></div>
                            <article class="panel panel-info panel-outline">
                                <div class="panel-heading icon">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </div>
                                <div class="panel-body">
                                    <form method="POST" action="#">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="current-password">Mật khẩu hiện tại:</label>
                                            <input type="password" class="form-control" id="current-password"
                                                name="current_password">
                                        </div>
                                        <div class="form-group">
                                            <label for="new-password">Mật khẩu mới:</label>
                                            <input type="password" class="form-control" id="new-password"
                                                name="new_password">
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm-password">Xác nhận mật khẩu mới:</label>
                                            <input type="password" class="form-control" id="confirm-password"
                                                name="confirm_password">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cập nhật mật khẩu</button>
                                    </form>
                                </div>
                            </article>
                        </div>
                    </div>

                    {{-- Notification Settings Page --}}
                    <div id="notification-content" class="menu-content hidden-content">
                        <h1>Cài đặt thông báo</h1>
                        <div class="filter">
                            <label for="notification-type">Lọc thông báo:</label>
                            <select id="notification-type" class="form-control">
                                <option value="all">Tất cả thông báo</option>
                                <option value="general">Thông báo chung</option>
                                <option value="new-chapter">Thông báo về chương mới của sách</option>
                                <option value="violations">Thông báo vi phạm</option>
                            </select>
                        </div>
                        <div class="timeline">

                                <div class="row tf-flex">
                                    <div class="col-xs-10 col-lg-9 crop-text-1 col-line-last"> <i
                                            class="fa fa-circle text-success" aria-hidden="true"></i> <a
                                            href="/notify/thong-bao-tinh-nang-moi"> <span
                                                class="notify-date">01/03/2024</span> Thông Báo Tính Năng Mới </a> </div>
                                    <div class="col-xs-2 col-lg-3 crop-text-1 col-line-last">
                                        <div class="pull-right"> 153 <i class="fa fa-comments" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row tf-flex">
                                    <div class="col-xs-10 col-lg-9 crop-text-1 col-line-last"> <i
                                            class="fa fa-circle text-success" aria-hidden="true"></i> <a
                                            href="/notify/tinh-nang-moi-dlcc"> <span class="notify-date">28/08/2023</span>
                                            Tính Năng Mới ĐLCC </a> </div>
                                    <div class="col-xs-2 col-lg-3 crop-text-1 col-line-last">
                                        <div class="pull-right"> 185 <i class="fa fa-comments" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row tf-flex">
                                    <div class="col-xs-10 col-lg-9 crop-text-1 col-line-last"> <i
                                            class="fa fa-circle text-success" aria-hidden="true"></i> <a
                                            href="/notify/event-tac-gia"> <span class="notify-date">27/07/2023</span>
                                            [Event] Tác Giả </a> </div>
                                    <div class="col-xs-2 col-lg-3 crop-text-1 col-line-last">
                                        <div class="pull-right"> 32 <i class="fa fa-comments" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row tf-flex">
                                    <div class="col-xs-10 col-lg-9 crop-text-1 col-line-last"> <i
                                            class="fa fa-circle text-success" aria-hidden="true"></i> <a
                                            href="/notify/nghe-audio-va-mot-so-tinh-nang-moi"> <span
                                                class="notify-date">17/06/2023</span> Nghe Audio và Một số tính năng mới
                                        </a> </div>
                                    <div class="col-xs-2 col-lg-3 crop-text-1 col-line-last">
                                        <div class="pull-right"> 57 <i class="fa fa-comments" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row tf-flex">
                                    <div class="col-xs-10 col-lg-9 crop-text-1 col-line-last"> <i
                                            class="fa fa-circle text-success" aria-hidden="true"></i> <a
                                            href="/notify/update-tinh-nang-moi"> <span
                                                class="notify-date">25/03/2023</span> Update Tính Năng Mới </a> </div>
                                    <div class="col-xs-2 col-lg-3 crop-text-1 col-line-last">
                                        <div class="pull-right"> 63 <i class="fa fa-comments" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row tf-flex">
                                    <div class="col-xs-10 col-lg-9 crop-text-1 col-line-last"> <i
                                            class="fa fa-circle text-success" aria-hidden="true"></i> <a
                                            href="/notify/p2p-them-paypal-payoneer-zalopay-vnpay"> <span
                                                class="notify-date">17/02/2023</span> P2P – Thêm Paypal, Payoneer, ZaloPay,
                                            VNPay </a> </div>
                                    <div class="col-xs-2 col-lg-3 crop-text-1 col-line-last">
                                        <div class="pull-right"> 25 <i class="fa fa-comments" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row tf-flex">
                                    <div class="col-xs-10 col-lg-9 crop-text-1 col-line-last"> <i
                                            class="fa fa-circle text-success" aria-hidden="true"></i> <a
                                            href="/notify/tinh-nang-tien-te-moi"> <span
                                                class="notify-date">30/01/2023</span> Tính Năng &amp; Tiền Tệ mới </a>
                                    </div>
                                    <div class="col-xs-2 col-lg-3 crop-text-1 col-line-last">
                                        <div class="pull-right"> 29 <i class="fa fa-comments" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row tf-flex">
                                    <div class="col-xs-10 col-lg-9 crop-text-1 col-line-last"> <i
                                            class="fa fa-circle text-danger" aria-hidden="true"></i> <a
                                            href="/notify/co-che-event-chao-don-nam-moi-2023"> <span
                                                class="notify-date">28/12/2022</span> Cơ chế &amp; Event chào đón năm mới
                                            2023 </a> </div>
                                    <div class="col-xs-2 col-lg-3 crop-text-1 col-line-last">
                                        <div class="pull-right"> 42 <i class="fa fa-comments" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row tf-flex">
                                    <div class="col-xs-10 col-lg-9 crop-text-1 col-line-last"> <i
                                            class="fa fa-circle text-success" aria-hidden="true"></i> <a
                                            href="/notify/thong-bao-ve-viec-pr-truyen-doc-quyen-tren-web"> <span
                                                class="notify-date">27/11/2022</span> Thông báo về việc PR truyện độc quyền
                                            trên web </a> </div>
                                    <div class="col-xs-2 col-lg-3 crop-text-1 col-line-last">
                                        <div class="pull-right"> 86 <i class="fa fa-comments" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="row tf-flex">
                                    <div class="col-xs-10 col-lg-9 crop-text-1 col-line-last"> <i
                                            class="fa fa-circle text-success" aria-hidden="true"></i> <a
                                            href="/notify/truyenhd-da-co-app-chinh-thuc-tren-google-play"> <span
                                                class="notify-date">10/10/2022</span> TruyenHD đã chính thức có app trên
                                            Google Play </a> </div>
                                    <div class="col-xs-2 col-lg-3 crop-text-1 col-line-last">
                                        <div class="pull-right"> 107 <i class="fa fa-comments" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                                <ul class="pagination text-center" id="id_pagination">
                                    <li class="active"><a href="/notify/?n=1#h1">1</a></li>
                                    <li class=""><a href="/notify/?n=2#h1">2</a></li>
                                    <li><a href="/notify/?n=2#h1">»</a></li>
                                </ul>
                                <style type="text/css">
                                    .pagination {
                                        padding: 15px 0 0 0
                                    }

                                    ul.pagination li {
                                        list-style: none;
                                        display: inline-block;
                                        margin: 10px 0
                                    }

                                    .pagination li:hover a {
                                        background: linear-gradient(135deg, #848484 30%, #000 100%);
                                        color: #fff
                                    }

                                    .pagination li.active a {
                                        color: #fff;
                                        background: linear-gradient(135deg, #000 30%, #848484 100%)
                                    }

                                    .pagination li.active:hover a,
                                    .pagination li.disabled:hover a {
                                        background: linear-gradient(135deg, #000 30%, #848484 100%);
                                        cursor: not-allowed;
                                        pointer-events: none
                                    }

                                    .pagination li a {
                                        border: solid 1px #000;
                                        color: #000;
                                        padding: .6rem 1rem;
                                        border-radius: 4px;
                                        border: solid 1px #000;
                                        margin: 4px 2px
                                    }
                                </style>
                            </div>

                    </div>



                    {{-- Account Deactivation Page --}}
                    <div id="deactivation-content" class="menu-content hidden-content">

                        <h1 class="text-center crop-text-2">Những Câu Hỏi Thường Gặp</h1>
                        <h2 class="crop-text-2">Dành cho Độc Giả</h2>
                        <div class="panel-group row" id="fqa">
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q1">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse1" class="collapsed" aria-expanded="false"> <span
                                                    class="number">1</span><i class="fa fa-money" aria-hidden="true"></i>
                                                Vàng
                                                dùng để làm gì? </a> </h4>
                                    </div>
                                    <div id="collapse1" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Dùng để mua chương VIP, bố cáo truyện, donate cho thành
                                            viên
                                            mình yêu thích và nhiều tính năng thú vị khác </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q2">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse2" class="collapsed" aria-expanded="false"> <span
                                                    class="number">2</span>Làm sao để kiếm Vàng? </a> </h4>
                                    </div>
                                    <div id="collapse2" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> - Cách đơn giản nhất là <a
                                                href="../user/deposit/index.html#h1">Nạp Tiền</a><br>- <a
                                                href="../guide/referral/index.html">Giới thiệu thành viên</a><br>- Được
                                            donate
                                            từ thành viên khác<br>- Khó hơn là làm <a
                                                href="../user/nhiem-vu/index.html#h1">Nhiệm Vụ</a><br>- Đăng truyện và set
                                            chương VIP. Nếu có độc giả mua bạn sẽ được Vàng.<br>- Quy đổi từ lượt xem của
                                            truyện
                                            sang Vàng </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q3">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse3" class="collapsed" aria-expanded="false"> <span
                                                    class="number">3</span>1 Vàng có giá trị bao nhiêu VNĐ? </a> </h4>
                                    </div>
                                    <div id="collapse3" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> 1 Vàng = 1 VNĐ </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q4">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse4" class="collapsed" aria-expanded="false"> <span
                                                    class="number">4</span>Tôi nạp Vàng sau bao lâu sẽ nhận được? </a>
                                        </h4>
                                    </div>
                                    <div id="collapse4" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> - Đối với Paypal bạn sẽ nhận được ngay<br>- Đối với thẻ
                                            cào sẽ
                                            trong khoảng thời gian 1 phút </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q5">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse5" class="collapsed" aria-expanded="false"> <span
                                                    class="number">5</span><i class="fa fa-ticket"
                                                    aria-hidden="true"></i> Ánh
                                                Kim dùng để làm gì? </a> </h4>
                                    </div>
                                    <div id="collapse5" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Ánh Kim chỉ sử dụng 1 mục đích duy nhất là đề cử truyện
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q6">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse6" class="collapsed" aria-expanded="false"> <span
                                                    class="number">6</span>Làm sao để kiếm Ánh Kim? </a> </h4>
                                    </div>
                                    <div id="collapse6" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Khi <a href="../user/deposit/index.html#h1">Nạp Vàng</a>
                                            bằng
                                            bất cứ hình thức nào bạn sẽ nhận được Ánh Kim đi kèm </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q7">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse7" class="collapsed" aria-expanded="false"> <span
                                                    class="number">7</span><i class="fa fa-diamond"
                                                    aria-hidden="true"></i> Ruby
                                                dùng để làm gì? </a> </h4>
                                    </div>
                                    <div id="collapse7" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Ruby để mở khoá một số tính năng </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q8">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse8" class="collapsed" aria-expanded="false"> <span
                                                    class="number">8</span>Làm sao để kiếm Ruby? </a> </h4>
                                    </div>
                                    <div id="collapse8" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Đối với truyện đã được duyệt. <br /> - Nếu bạn đăng chương
                                            công
                                            khai: +1 Ruby<br /> - Nếu bạn xoá chương công khai: -5 Ruby </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q9">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse9" class="collapsed" aria-expanded="false"> <span
                                                    class="number">9</span><i class="fa fa-bolt" aria-hidden="true"></i>
                                                Exp
                                                dùng để làm gì? </a> </h4>
                                    </div>
                                    <div id="collapse9" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Exp để mở khoá một số tính năng </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q10">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse10" class="collapsed" aria-expanded="false"> <span
                                                    class="number">10</span>Làm sao để kiếm Exp? </a> </h4>
                                    </div>
                                    <div id="collapse10" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body">
                                            <div>- <a href="../user/nhiem-vu/personal/index.html#h1">Tham gia nhiệm vụ
                                                    hàng
                                                    ngày</a></div>
                                            <div>- <a href="../user/deposit/history/p2p/index.html#h1">Đánh giá người bán
                                                    Vàng</a> khi mua Vàng thông qua <a
                                                    href="../user/deposit/p2p/index9391.html?swcfpc=1#h1">P2P giá linh
                                                    hoạt</a>
                                            </div>
                                            <div>- <a href="../user/deposit/history/p2p-bank/index.html#h1">Đánh giá người
                                                    bán
                                                    Vàng</a> khi mua Vàng thông qua <a
                                                    href="../user/deposit/p2p-bank/index9391.html?swcfpc=1#h1">P2P giá cố
                                                    định</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q11">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse11" class="collapsed" aria-expanded="false"> <span
                                                    class="number">11</span>Truyện VIP khi nào sẽ mở miễn phí? </a> </h4>
                                    </div>
                                    <div id="collapse11" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Hệ thống không tự mở miễn phí cho các bạn. Phụ thuộc vào
                                            thành
                                            viên quản lý truyện đó (tác giả, dịch giả, đồng quản lý,..) </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q12">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse12" class="collapsed" aria-expanded="false"> <span
                                                    class="number">12</span>Tại sao comment của tôi không được duyệt? </a>
                                        </h4>
                                    </div>
                                    <div id="collapse12" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Để bình luận được duyệt, phải thỏa mãn tất cả các yêu cầu
                                            sau:<br><br>- Không được xúc phạm, đe dọa đến bất kỳ cá nhân/ tổ chức nào<br>-
                                            Không
                                            được dẫn link đến website khác<br>- Không lôi kéo thành viên </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q13">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse13" class="collapsed" aria-expanded="false"> <span
                                                    class="number">13</span>Tại sao tôi nhắn tin qua Facebook, Telegram
                                                không
                                                được phản hồi? </a> </h4>
                                    </div>
                                    <div id="collapse13" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Vui lòng vào thẳng vấn đề, đặt rõ câu hỏi. Nếu gặp lỗi
                                            hãy
                                            chụp
                                            ảnh màn hình hoặc quay lại video để bộ phận kỹ thuật có thể giải quyết nhanh
                                            hơn.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q14">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse14" class="collapsed" aria-expanded="false"> <span
                                                    class="number">14</span>Tôi thấy website bị vỡ giao diện </a> </h4>
                                    </div>
                                    <div id="collapse14" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Vui lòng dùng trình duyệt Chrome để đạt hiệu suất và trải
                                            nghiệm website tốt hơn </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q15">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse15" class="collapsed" aria-expanded="false"> <span
                                                    class="number">15</span>Làm sao để nhận thông báo truyện khi ra chương
                                                mới
                                            </a> </h4>
                                    </div>
                                    <div id="collapse15" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Vui lòng bấm vào nút Theo Dõi ở mỗi đầu truyện. Mỗi khi
                                            truy
                                            cập vào Trang Chủ, hệ thống sẽ thông báo ngay tại đầu website khi truyện có
                                            chương
                                            mới </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q16">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse16" class="collapsed" aria-expanded="false"> <span
                                                    class="number">16</span>Tôi đăng nhập bằng thiết bị mới bị mất lịch sử
                                                đọc
                                                truyện? </a> </h4>
                                    </div>
                                    <div id="collapse16" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Hệ thống lưu lịch sử đọc truyện vào trình duyệt chứ không
                                            lưu
                                            vào tài khoản. Hãy dùng chức năng <a
                                                href="../user/setting/data/index.html#h1">chuyển đổi từ liệu</a> để chuyển
                                            đổi 2
                                            chiều giữa trình duyệt và tài khoản </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h2 class="crop-text-2">Dành cho Tác giả/ Dịch giả/ Editor/ Đồng quản lý</h2>
                        <div class="panel-group row" id="fqa">
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q1">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapsez1" class="collapsed" aria-expanded="false"> <span
                                                    class="number">1</span>Tôi có thể kiếm tiền với truyện của mình? </a>
                                        </h4>
                                    </div>
                                    <div id="collapsez1" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Với truyện sáng tác/ dịch/ edit bạn có thể bật chương VIP
                                            để
                                            tạo ra doanh thu. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q2">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapsez2" class="collapsed" aria-expanded="false"> <span
                                                    class="number">2</span>Tôi có thể kiếm tiền với truyện sưu tầm? </a>
                                        </h4>
                                    </div>
                                    <div id="collapsez2" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Hoàn toàn được, bạn có thể dùng chắc năng quy đổi từ lượt
                                            xem
                                            thành Vàng </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q3">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapsez3" class="collapsed" aria-expanded="false"> <span
                                                    class="number">3</span>Tỷ lệ chia sẻ doanh thu của website? </a> </h4>
                                    </div>
                                    <div id="collapsez3" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Lên đến 90%. Nghĩa là nếu truyện của bạn bán được 100
                                            Vàng
                                            thì
                                            bạn sẽ nhận về 90 Vàng </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q4">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapsez4" class="collapsed" aria-expanded="false"> <span
                                                    class="number">4</span>Tôi rút Vàng sau bao lâu sẽ nhận được? </a>
                                        </h4>
                                    </div>
                                    <div id="collapsez4" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> - Khi thực hiện rút tiền về tài khoản, bạn sẽ nhận được
                                            trong
                                            24h trừ ngày nghỉ và lễ tết. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q5">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapsez5" class="collapsed" aria-expanded="false"> <span
                                                    class="number">5</span>Tôi có mất phí rút tiền không? </a> </h4>
                                    </div>
                                    <div id="collapsez5" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Hoàn toàn miễn phí </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q6">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapsez6" class="collapsed" aria-expanded="false"> <span
                                                    class="number">6</span>Truyện của tôi đã có trên hệ thống. Tôi muốn
                                                quyền
                                                quản lý? </a> </h4>
                                    </div>
                                    <div id="collapsez6" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Nếu bạn sáng tác/ dịch/ edit truyện đó. Bạn hoàn toàn có
                                            thể
                                            lấy quyền quản lý, vui lòng gửi bằng chứng chứng minh cho BQT. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q7">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapsez7" class="collapsed" aria-expanded="false"> <span
                                                    class="number">7</span>Tại sao truyện của tôi không được duyệt? </a>
                                        </h4>
                                    </div>
                                    <div id="collapsez7" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> - Bạn phải click vào nút Yêu cầu BQT duyệt truyện thì
                                            truyện
                                            của bạn mới được xem xét đăng công khai. <a
                                                href="../guide/publish/index.html">Chi
                                                tiết xem tại đây</a>.<br><br>Nếu đã đủ điều kiện mà truyện của bạn > 1 ngày
                                            chưa
                                            được duyệt, vui lòng liên hệ BQT </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="panel panel-default" id="q8">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion"
                                                href="#collapsez8" class="collapsed" aria-expanded="false"> <span
                                                    class="number">8</span>Tôi muốn đăng tiếp truyện đã có trên hệ thống?
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapsez8" class="panel-collapse collapse" aria-expanded="false"
                                        style="height: 211px;">
                                        <div class="panel-body"> Nếu truyện dịch/edit đã lâu không ra chương. Bạn vui lòng
                                            liên
                                            hệ BQT để đăng tiếp truyện </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    {{-- Activity Log Page --}}
                    <div id="activity-log-content" class="menu-content hidden-content">
                        <h1>Nhật ký hoạt động</h1>
                        <div class="timeline">
                            <div class="line text-muted"></div>
                            <article class="panel panel-info panel-outline">
                                <div class="panel-heading icon">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-unstyled">
                                        {{-- Iterate over activities --}}
                                        {{-- @foreach ($activities as $activity)
                    <li>{{ $activity->description }} - {{ $activity->created_at->diffForHumans() }}</li>
                    @endforeach --}}
                                    </ul>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Thông Báo</h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đã Hiểu!</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.getElementById('upload_avatar').addEventListener('change', function(event) {
            const input = event.target;

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Cập nhật src của ảnh đại diện với ảnh mới đã chọn
                    document.getElementById('avatar-preview').src = e.target.result;
                }

                // Đọc file ảnh đã chọn
                reader.readAsDataURL(input.files[0]);

                // Cập nhật file vào input ẩn để gửi trong form
                const hiddenFileInput = document.getElementById('hidden_upload_avatar');
                hiddenFileInput.files = input.files;
            }
        });
    </script>
@endpush
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Thêm sự kiện click cho tất cả các mục trong sidebar
            document.querySelectorAll('#user-sidebar .list-group-item').forEach(item => {
                item.addEventListener('click', function() {
                    // Lấy dữ liệu từ thuộc tính data của li
                    var targetContent = this.querySelector('a').getAttribute('data-target');
                    var breadcrumbText = this.querySelector('a').getAttribute('data-breadcrumb');

                    // Ẩn tất cả các nội dung menu
                    document.querySelectorAll('.menu-content').forEach(content => {
                        content.classList.add('hidden-content');
                    });

                    // Hiển thị nội dung tương ứng với li được chọn
                    document.getElementById(targetContent).classList.remove('hidden-content');

                    // Cập nhật breadcrumb
                    document.querySelector('.breadcrumb-item.active').textContent = breadcrumbText;

                    // Xóa class 'tf-active' khỏi tất cả các mục
                    document.querySelectorAll('.list-group-item').forEach(i => {
                        i.classList.remove('tf-active');
                    });

                    // Thêm class 'tf-active' vào mục được nhấp
                    this.classList.add('tf-active');


                });
            });

        });

        document.addEventListener('DOMContentLoaded', function() {
            // Thêm sự kiện click cho tất cả các mục
            document.querySelectorAll('.list-group-item').forEach(item => {
                item.addEventListener('click', function() {
                    // Xóa class 'tf-active1' khỏi tất cả các mục
                    document.querySelectorAll('.list-group-item').forEach(i => {
                        i.classList.remove('tf-active1');
                    });

                    // Thêm class 'tf-active1' vào mục được nhấp
                    this.classList.add('tf-active1');

                    // Ẩn tất cả các nội dung
                    document.querySelectorAll('.content-div').forEach(content => {
                        content.style.display = 'none';
                    });

                    // Hiển thị nội dung tương ứng
                    const targetId = this.getAttribute('data-target');
                    const targetContentDiv = document.querySelector(targetId + '-content');
                    if (targetContentDiv) {
                        targetContentDiv.style.display = 'block';
                    }
                });
            });

            // Tự động kích hoạt click vào tab "Sách đang đọc"
            document.querySelector('#menu-currently-reading').click();
        });
    </script>





    <style type="text/css">
        .d-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .d-flex .form-group {
            margin-bottom: 0px;
        }

        table {
            background-color: transparent;
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }

        .table>caption+thead>tr:first-child>td,
        .table>caption+thead>tr:first-child>th,
        .table>colgroup+thead>tr:first-child>td,
        .table>colgroup+thead>tr:first-child>th,
        .table>thead:first-child>tr:first-child>td,
        .table>thead:first-child>tr:first-child>th {
            border-top: 0;
        }

        .table>thead>tr>th {
            vertical-align: bottom;
            border-bottom: 2px solid #ddd;
        }

        .table>tbody>tr>td,
        .table>tbody>tr>th,
        .table>tfoot>tr>td,
        .table>tfoot>tr>th,
        .table>thead>tr>td,
        .table>thead>tr>th {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: middle;
            border-top: 1px solid #ddd;
        }

        th {
            text-align: left;
        }

        tbody th {
            font-weight: normal;
        }

        table tbody tr:last-child .dropdown-menu,
        table tbody tr:nth-last-child(2) .dropdown-menu {
            /*		right: 0;
                                                        left: unset;
                                                        top: unset;
                                                        bottom: 35px;*/
        }

        ul.pagination li {
            list-style: none;
            display: inline-block;
            margin: 10px 0px;
        }

        .pagination li:hover a {
            background: linear-gradient(135deg, #848484 30%, #000000 100%);
            color: #fff;
        }

        .pagination li.active a {
            color: #fff;
            background: linear-gradient(135deg, #000000 30%, #848484 100%);
        }

        .pagination li.active:hover a,
        .pagination li.disabled:hover a {
            background: linear-gradient(135deg, #000000 30%, #848484 100%);
            cursor: not-allowed;
            pointer-events: none;
        }

        .pagination li a {
            border: solid 1px #000000;
            color: #000000;
            padding: 0.6rem 1.0rem;
            border-radius: 4px;
            border: solid 1px black;
            margin: 4px 2px;
        }

        #css-td-n-a-q-a td {
            display: block;
            width: 100%
        }
    </style>
@endpush
