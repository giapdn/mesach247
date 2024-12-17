@extends('client.layouts.app')
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/client/home.css') }}">
        <style>
            /* General Styles */
            .book-item {
                position: relative;
                width: 150px;
                height: 220px;
                margin: 10px;
                padding: 0;
                /* Removed padding for full image display */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                transition: transform 0.2s ease;
                overflow: hidden;
                background-color: #fff;
                display: inline-block;
            }

            .book-item:hover {
                transform: translateY(-5px);
            }

            /* Book Image */
            .book-image {
                width: 100%;
                height: 100%;
                /* Make the image container full height */
                overflow: hidden;
            }

            .book-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.3s ease;
            }

            /* Price Tag */
            .price-tag {
                position: absolute;
                top: 0;
                /* Aligns it to the top */
                right: 0;
                /* Aligns it to the right */
                background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                color: white;
                padding: 5px 10px;
                border-radius: 0 10px 0 10px;
                font-size: 12px;
                font-weight: bold;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                /* Adds a subtle shadow for depth */
                z-index: 10;
                /* Ensures the price tag appears above other elements */
                margin: 0;
                /* Remove margin to position it exactly in the corner */
            }

            .price-tag.da-mua {
                background: linear-gradient(135deg, #ff8a00 30%, #ffc107 100%);
                box-shadow: 0 0 5px rgba(255, 138, 0, 0.5),
                    0 0 10px rgba(255, 138, 0, 0.4),
                    0 0 15px rgba(255, 138, 0, 0.3),
                    0 0 20px rgba(255, 138, 0, 0.2);
                animation: burn-mua 1.5s infinite alternate;
                padding: 5px 10px;
                border-radius: 0 10px 0 10px;
            }

            /* Giá khuyến mãi */
            .price-tag.gia-khuyen-mai {
                background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                box-shadow: 0 0 5px rgba(30, 187, 240, 0.5),
                    0 0 10px rgba(30, 187, 240, 0.4),
                    0 0 15px rgba(30, 187, 240, 0.3),
                    0 0 20px rgba(30, 187, 240, 0.2);
                animation: burn-goc 1.5s infinite alternate;
                padding: 5px 10px;
                border-radius: 0 10px 0 10px;
            }

            /* Giá gốc */
            .price-tag.gia-goc {
                background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                box-shadow: 0 0 5px rgba(30, 187, 240, 0.5),
                    0 0 10px rgba(30, 187, 240, 0.4),
                    0 0 15px rgba(30, 187, 240, 0.3),
                    0 0 20px rgba(30, 187, 240, 0.2);
                animation: burn-goc 1.5s infinite alternate;
                padding: 5px 10px;
                border-radius: 0 10px 0 10px;
            }

            /* Animation bốc cháy cho giá đã mua */
            @keyframes burn-mua {
                0% {
                    box-shadow:
                        0 0 5px rgba(255, 138, 0, 0.5),
                        0 0 10px rgba(255, 138, 0, 0.4),
                        0 0 15px rgba(255, 138, 0, 0.3),
                        0 0 20px rgba(255, 138, 0, 0.2);
                    transform: scale(1);
                }

                100% {
                    box-shadow:
                        0 0 10px rgba(255, 138, 0, 0.7),
                        0 0 20px rgba(255, 138, 0, 0.5),
                        0 0 30px rgba(255, 138, 0, 0.4),
                        0 0 40px rgba(255, 138, 0, 0.3);
                    transform: scale(1.05);
                }
            }

            /* Animation bốc cháy cho giá khuyến mãi */
            @keyframes burn-khuyen-mai {
                0% {
                    box-shadow:
                        0 0 5px rgba(30, 187, 240, 0.5),
                        0 0 10px rgba(30, 187, 240, 0.4),
                        0 0 15px rgba(30, 187, 240, 0.3),
                        0 0 20px rgba(30, 187, 240, 0.2);
                    transform: scale(1);
                }

                100% {
                    box-shadow:
                        0 0 10px rgba(30, 187, 240, 0.7),
                        0 0 20px rgba(30, 187, 240, 0.5),
                        0 0 30px rgba(30, 187, 240, 0.4),
                        0 0 40px rgba(30, 187, 240, 0.3);
                    transform: scale(1.05);
                }
            }

            /* Animation bốc cháy cho giá gốc */
            @keyframes burn-goc {
                0% {
                    box-shadow:
                        0 0 5px rgba(30, 187, 240, 0.5),
                        0 0 10px rgba(30, 187, 240, 0.4),
                        0 0 15px rgba(30, 187, 240, 0.3),
                        0 0 20px rgba(30, 187, 240, 0.2);
                    transform: scale(1);
                }

                100% {
                    box-shadow:
                        0 0 10px rgba(30, 187, 240, 0.7),
                        0 0 20px rgba(30, 187, 240, 0.5),
                        0 0 30px rgba(30, 187, 240, 0.4),
                        0 0 40px rgba(30, 187, 240, 0.3);
                    transform: scale(1.05);
                }
            }


            /* Book Info */
            .book-info {
                position: absolute;
                bottom: 0;
                width: 100%;
                background-color: rgba(255, 255, 255, 0.8);
                /* Semi-transparent background */
                text-align: center;
                padding: 5px 0;
            }

            .book-title {
                font-weight: bold;
                font-size: 14px;
                color: #333;
                margin: 0;
            }
        </style>
    @endpush
    @push('scripts')
        <script src="{{ asset('js/client/home.js') }}"></script>
    @endpush
    <div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../index.html"><span class="fa fa-home"></span> Home</a></li>
            <li class="breadcrumb-item"><a href="../../index4f9e.html?page_id=7676677">Bảng Xếp Hạng</a></li>

        </ol>
    </div>
    <div class="container tax">
        <div class="ranking-section">

            <div class="col-xs-8">
                <ul class="nav nav-tabs nav-tabs-css" data-id="ticket">
                    <li role="presentation" data-time="view" class="active">
                        <a href="#" onclick="changeBackground('image1.jpg')">Sách bán chạy nhất</a>
                    </li>
{{--                    <li role="presentation" data-time="review">--}}
{{--                        <a href="#" onclick="changeBackground('image2.jpg')">Sách được đánh giá cao nhất</a>--}}
{{--                    </li>--}}
                    <li role="presentation" data-time="favorite">
                        <a href="#" onclick="changeBackground('image3.jpg')">Top tác giả</a>
                    </li>
                </ul>
            </div>
        </div>
        <style>
            .nav-tabs-css li a {
                width: 200px;
                /* Transparent when not selected */
                color: white;
                /* Default text color */
                transition: opacity 0.1s ease, background-color 0.1s ease;
            }

            .nav-tabs-css li {
                width: 250px;
                height: 50px;
                display: flex;
                /* Use flexbox for alignment */
                justify-content: center;
                /* Center the content horizontally */
                align-items: center;
                /* Center the content vertically */
                color: white;
                /* Default text color */
                transition: opacity 0.1s ease, background-color 0.1s ease;
            }


            .nav-tabs-css li.active {
                opacity: 1;
                /* Fully visible when selected */
                background: white;
                /* Background color for selected tab */
                color: #333;
                /* Text color for selected tab */
                border-radius: 5px 5px 0 0;
                /* Optional styling for selected tab */
                padding: 5px 10px;
            }

            .nav-tabs-css li.active a {

                background-color: white;
                /* Background color for selected tab */
                color: #ffffff;
                /* Text color for selected tab */
                border-radius: 5px 5px 0 0;
                /* Optional styling for selected tab */
                padding: 5px 10px;
            }


            .ranking-section .col-xs-8 {
                margin-top: 330px;
                /* Adjust this value to your preference */
            }

            .ranking-section {
                margin-bottom: 30px;
                background-image: url('{{ asset('assets/client/img/bangxephang.png') }}'), linear-gradient(135deg, #39dfaa 30%, #1ebbf0 100%);
                background-size: cover;
                background-position: center;
                padding: 20px;
                border-radius: 10px;
                color: white;
                transition: background-image 0.3s ease-in-out;
                min-height: 400px;
                /* Adjust the value to your desired height */
            }
        </style>

        <div class="list-group view-row">

            <div class="col-xs-12 col-sm-6 col-md-8">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i> Top sách bán chạy</h3>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="list-group mb-3">
                                <div class="book-container" data-section="sachmienphi">
                                    @foreach ($sachKhongThuocTop5 as $yeuThich)
                                        @php
                                            $book = $yeuThich;
                                            $user = Auth()->user();
                                            $checkVaiTro = '';
                                            $buy = '';
                                            if (Auth::check()) {
                                                $checkVaiTro =
                                                    $user->hasRole(1) ||
                                                    $user->hasRole(3) ||
                                                    ($user->hasRole(4) && $book->user_id == $user->id);
                                                $buy = $book
                                                    ->DonHang()
                                                    ->where('user_id', $user->id)
                                                    ->where('trang_thai', 'thanh_cong')
                                                    ->exists();
                                            }

                                            $isPurchased = $checkVaiTro || $buy;
                                            if ($checkVaiTro) {
                                                $status = 'Đã Sở Hữu';
                                            } else {
                                                $status = 'Đã Mua';
                                            }
                                        @endphp
                                        <li class="book-item">
                                            <a href="{{ route('chi-tiet-sach', $book->id) }}" title="{{ $book->ten_sach }}">
                                                <div class="book-image">
                                                    <img src="{{ Storage::url($book->anh_bia_sach) }}"
                                                        alt="{{ $book->ten_sach }}">
                                                    <div
                                                        class="price-tag @if ($isPurchased) da-mua @elseif($book->gia_goc === 0) gia-goc @elseif($book->gia_khuyen_mai) gia-khuyen-mai @endif">
                                                        @if ($isPurchased)
                                                            {{ $status }}
                                                        @elseif($book->gia_goc === 0)
                                                            Miễn Phí
                                                        @elseif(!empty($book->gia_khuyen_mai))
                                                            <div class="price-slide">
                                                                <span class="original-price"
                                                                    style="text-decoration: line-through; color: black;">
                                                                    {{ number_format($book->gia_khuyen_mai, 0, ',', '.') }}
                                                                    VNĐ
                                                                </span>
                                                            </div>
                                                            <div class="price-slide">
                                                                <span class="promo-price">
                                                                    {{ number_format($book->gia_goc, 0, ',', '.') }} VNĐ
                                                                </span>
                                                            </div>
                                                        @elseif(!empty($book->gia_goc))
                                                            {{ number_format($book->gia_goc, 0, ',', '.') }} VNĐ
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="book-info">
                                                    <h4 class="book-title">{{ $book->ten_sach }}</h4>
                                                </div>

                                            </a>
                                        </li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i> Top 5</h3>
                    <div id="top">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row" id="top">
                                    @foreach ($top5 as $index => $sach)
                                        @if ($index < 3)
                                            <div class="ztop-item ztop-item-{{ $index + 1 }}">


                                                <div class="vinhdanhtop" style="width:70%; margin-left:14px;">
                                                    <a class="img" href="{{ route('chi-tiet-sach', $sach->id) }}"
                                                        title="{{ $sach->ten_sach }}">
                                                        <img style="border-radius: 5px; width: 90px; height: 120px;"
                                                            src="{{ Storage::url($sach->anh_bia_sach) }}"
                                                            alt="{{ $sach->ten_sach }}">

                                                        <span class="khung-vien-rank"></span>



                                                        <div class="ztop-labeld"><img
                                                                src="{{ asset('assets/client/themes/truyenfull/echo/img/crown.png') }}">
                                                        </div>
                                                        <div class="ztop-label-3a">{{ $index + 1 }}</div>

                                                    </a>

                                                </div>



                                                <strong class="ztop-name">
                                                    <a href="{{ route('chi-tiet-sach', $sach->id) }}"
                                                        class="crop-text-1">{{ $sach->ten_sach }}</a>
                                                </strong>
                                                <strong class="ztop-gold crop-text">
                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                    {{ number_format(!empty($sach->gia_khuyen_mai) ? $sach->gia_khuyen_mai : $sach->gia_goc, 0, ',', '.') }}
                                                    VNĐ
                                                </strong>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </li>

                            @foreach ($top5 as $index => $sach)
                                @if ($index >= 3)
                                    <li class="list-group-item">
                                        <div class="crop-text">
                                            <a href="{{ route('chi-tiet-sach', $sach->id) }}" class="ztop-flex">
                                                <div>
                                                    <span class="ztop-number">{{ $index + 1 }}</span>
                                                    <img class="ztop-img-2d"
                                                        src="{{ Storage::url($sach->anh_bia_sach) }}" />
                                                    <strong><span style="color:#000000"
                                                            href="{{ route('chi-tiet-sach', $sach->id) }}">{{ Str::limit($sach->ten_sach, 15, '...') }}</span></strong>
                                                </div>
                                                <div class="pull-right ztop-gold-2">
                                                    <i class="fa fa-money" aria-hidden="true"></i>
                                                    {{ number_format(!empty($sach->gia_khuyen_mai) ? $sach->gia_khuyen_mai : $sach->gia_goc, 0, ',', '.') }}
                                                    VNĐ
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-group review-row">
            <div class="col-xs-12 col-sm-6 col-md-8">
{{--                <div class="h3">--}}
{{--                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i> Top sách được đánh giá cao</h3>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                            <div class="list-group mb-3">--}}
{{--                                <div class="book-container" data-section="sachmienphi">--}}
{{--                                    @foreach ($sachKhongThuocTop5DG as $yeuThich)--}}
{{--                                        @php--}}
{{--                                            $book = $yeuThich;--}}
{{--                                            $user = Auth()->user();--}}
{{--                                            $checkVaiTro = '';--}}
{{--                                            $buy = '';--}}
{{--                                            if (Auth::check()) {--}}
{{--                                                $checkVaiTro =--}}
{{--                                                    $user->hasRole(1) ||--}}
{{--                                                    $user->hasRole(3) ||--}}
{{--                                                    ($user->hasRole(4) && $book->user_id == $user->id);--}}
{{--                                                $buy = $book--}}
{{--                                                    ->DonHang()--}}
{{--                                                    ->where('user_id', $user->id)--}}
{{--                                                    ->where('trang_thai', 'thanh_cong')--}}
{{--                                                    ->exists();--}}
{{--                                            }--}}
{{--                                            $isPurchased = $checkVaiTro || $buy;--}}
{{--                                            if ($checkVaiTro) {--}}
{{--                                                $status = 'Đã Sở Hữu';--}}
{{--                                            } else {--}}
{{--                                                $status = 'Đã Mua';--}}
{{--                                            }--}}
{{--                                        @endphp--}}
{{--                                        <li class="book-item">--}}
{{--                                            <a href="{{ route('chi-tiet-sach', $book->id) }}"--}}
{{--                                                title="{{ $book->ten_sach }}">--}}
{{--                                                <div class="book-image">--}}
{{--                                                    <img src="{{ Storage::url($book->anh_bia_sach) }}"--}}
{{--                                                        alt="{{ $book->ten_sach }}">--}}
{{--                                                    <div--}}
{{--                                                        class="price-tag @if ($isPurchased) da-mua @elseif($book->gia_goc === 0) gia-goc @elseif($book->gia_khuyen_mai) gia-khuyen-mai @endif">--}}
{{--                                                        @if ($isPurchased)--}}
{{--                                                            {{ $status }}--}}
{{--                                                        @elseif($book->gia_goc === 0)--}}
{{--                                                            Miễn Phí--}}
{{--                                                        @elseif(!empty($book->gia_khuyen_mai))--}}
{{--                                                            <div class="price-slide">--}}
{{--                                                                <span class="original-price"--}}
{{--                                                                    style="text-decoration: line-through; color: black;">--}}
{{--                                                                    {{ number_format($book->gia_khuyen_mai, 0, ',', '.') }}--}}
{{--                                                                    VNĐ--}}
{{--                                                                </span>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="price-slide">--}}
{{--                                                                <span class="promo-price">--}}
{{--                                                                    {{ number_format($book->gia_goc, 0, ',', '.') }} VNĐ--}}
{{--                                                                </span>--}}
{{--                                                            </div>--}}
{{--                                                        @elseif(!empty($book->gia_goc))--}}
{{--                                                            {{ number_format($book->gia_goc, 0, ',', '.') }} VNĐ--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="book-info">--}}
{{--                                                    <h4 class="book-title">{{ $book->ten_sach }}</h4>--}}
{{--                                                </div>--}}

{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


                <style>
                    .book-container {
                        display: flex;
                        flex-wrap: wrap;
                        /* Dùng wrap để các sách tự động xuống dòng nếu không vừa */
                        justify-content: start;
                        transition: transform 0.5s ease-in-out;
                    }

                    .book {
                        font-size: 10px;
                        border-radius: 10px;
                        flex-shrink: 0;
                        align-items: center;
                        text-align: center;
                        position: relative;
                        display: inline-block;
                        width: calc(100% / 4 - 20px);
                        /* Điều chỉnh kích thước sách */
                        height: 350px;
                        /* Giảm chiều cao sách */
                        margin: 10px;
                        vertical-align: top;
                    }

                    .book .image-container {
                        position: relative;
                        /* Không cần chứa phần hover nữa */
                    }

                    .book-hover-details {
                        display: none;
                        /* Vô hiệu hóa phần hover */
                    }

                    .book:hover {
                        transform: translateY(-5px);
                    }

                    .price-tag {
                        position: absolute;
                        top: 0;
                        right: 0;
                        background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                        color: white;
                        padding: 5px 10px;
                        border-radius: 0 10px 0 10px;
                        font-size: 8px;
                        font-weight: bold;
                    }

                    .price-tag.da-mua {
                        background: linear-gradient(135deg, #ff8a00 30%, #ffc107 100%);
                        box-shadow: 0 0 5px rgba(255, 138, 0, 0.5),
                            0 0 10px rgba(255, 138, 0, 0.4),
                            0 0 15px rgba(255, 138, 0, 0.3),
                            0 0 20px rgba(255, 138, 0, 0.2);
                        animation: burn-mua 1.5s infinite alternate;
                        padding: 5px 10px;
                        border-radius: 0 10px 0 10px;
                    }

                    /* Giá khuyến mãi */
                    .price-tag.gia-khuyen-mai {
                        background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                        box-shadow: 0 0 5px rgba(30, 187, 240, 0.5),
                            0 0 10px rgba(30, 187, 240, 0.4),
                            0 0 15px rgba(30, 187, 240, 0.3),
                            0 0 20px rgba(30, 187, 240, 0.2);
                        animation: burn-goc 1.5s infinite alternate;
                        padding: 5px 10px;
                        border-radius: 0 10px 0 10px;
                    }

                    /* Giá gốc */
                    .price-tag.gia-goc {
                        background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                        box-shadow: 0 0 5px rgba(30, 187, 240, 0.5),
                            0 0 10px rgba(30, 187, 240, 0.4),
                            0 0 15px rgba(30, 187, 240, 0.3),
                            0 0 20px rgba(30, 187, 240, 0.2);
                        animation: burn-goc 1.5s infinite alternate;
                        padding: 5px 10px;
                        border-radius: 0 10px 0 10px;
                    }

                    .book a img {
                        display: block;
                        width: 100%;
                        height: 80%;
                        /* Giảm chiều cao của hình ảnh */
                        border-radius: 10px;
                        box-shadow: rgba(0, 0, 0, 0.24) 0 3px 8px;
                        object-fit: cover;
                    }

                    .book-info {
                        font-size: 12px;
                        padding: 10px;
                        text-align: center;
                    }

                    .book-title {
                        font-size: small;
                        /* Giảm kích thước chữ của tiêu đề sách */
                        color: #333;
                        overflow: hidden;
                        white-space: nowrap;
                        text-overflow: ellipsis;
                    }

                    .book .heart-icon {
                        font-size: 8px;
                        /* Giảm kích thước của icon trái tim */
                        color: #f44336;
                        /* Màu đỏ cho icon trái tim */
                        transition: transform 0.3s ease-in-out;
                    }

                    .book .heart-icon:hover {
                        transform: scale(1.2);
                        /* Tăng kích thước khi hover */
                    }

                    /* Các media query để phù hợp với các kích thước màn hình nhỏ hơn */
                    @media (max-width: 768px) {
                        .book {
                            width: calc(100% / 3 - 20px);
                            /* Điều chỉnh lại kích thước */
                        }
                    }

                    @media (max-width: 480px) {
                        .book {
                            width: calc(100% / 2 - 20px);
                            /* Điều chỉnh cho kích thước màn hình nhỏ hơn */
                        }
                    }
                </style>
            </div>




            <!-- CSS cho bố cục sách điều chỉnh kích thước linh hoạt -->

{{--            <div class="col-xs-12 col-sm-6 col-md-4">--}}
{{--                <div class="h3">--}}
{{--                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i> Top 5</h3>--}}
{{--                    <div id="top">--}}
{{--                        <ul class="list-group">--}}
{{--                            <li class="list-group-item">--}}
{{--                                <div class="row" id="top">--}}
{{--                                    @if (!empty($top5DG) && $top5DG instanceof \Illuminate\Support\Collection)--}}
{{--                                        @foreach ($top5DG as $index => $sach)--}}
{{--                                            @if ($index < 3)--}}
{{--                                                <div class="ztop-item ztop-item-{{ $index + 1 }}">--}}
{{--                                                    <div class="vinhdanhtop" style="width:70%; margin-left:14px;">--}}
{{--                                                        <!-- Thay đổi href để liên kết đến trang chi tiết sách -->--}}
{{--                                                        <a class="img"--}}
{{--                                                            href="{{ route('chi-tiet-sach', ['id' => $sach->sach_id]) }}"--}}
{{--                                                            title="{{ $sach->ten_sach }}">--}}
{{--                                                            <img style="border-radius: 5px; width: 90px; height: 120px;"--}}
{{--                                                                src="{{ Storage::url($sach->anh_bia_sach) }}"--}}
{{--                                                                alt="{{ $sach->ten_sach }}">--}}
{{--                                                            <span class="khung-vien-rank"></span>--}}



{{--                                                            <div class="ztop-labeld">--}}
{{--                                                                <img--}}
{{--                                                                    src="{{ asset('assets/client/themes/truyenfull/echo/img/crown.png') }}">--}}
{{--                                                            </div>--}}
{{--                                                            <div class="ztop-label-3a">{{ $index + 1 }}</div>--}}
{{--                                                        </a>--}}
{{--                                                    </div>--}}
{{--                                                    <strong class="ztop-name">--}}
{{--                                                        <a href="{{ route('chi-tiet-sach', ['id' => $sach->sach_id]) }}"--}}
{{--                                                            class="crop-text-1">{{ $sach->ten_sach }}</a>--}}
{{--                                                    </strong>--}}
{{--                                                    <strong class="ztop-gold crop-text">--}}
{{--                                                        @php--}}
{{--                                                            $tongMucDoHaiLong = 0;--}}
{{--                                                            $soLuotDanhGia = 0;--}}
{{--                                                            $danhGias = \App\Models\DanhGia::where(--}}
{{--                                                                'sach_id',--}}
{{--                                                                $sach->sach_id,--}}
{{--                                                            )--}}
{{--                                                                ->where('trang_thai', 'hien')--}}
{{--                                                                ->get();--}}
{{--                                                            foreach ($danhGias as $danhGia) {--}}
{{--                                                                $tongMucDoHaiLong +=--}}
{{--                                                                    $mucDoHaiLongOrder[$danhGia->muc_do_hai_long];--}}
{{--                                                                $soLuotDanhGia++;--}}
{{--                                                            }--}}
{{--                                                            $trungBinh =--}}
{{--                                                                $soLuotDanhGia > 0--}}
{{--                                                                    ? $tongMucDoHaiLong / $soLuotDanhGia--}}
{{--                                                                    : 0;--}}
{{--                                                            $soSao = round($trungBinh);--}}
{{--                                                            $soSao = min($soSao, 5);--}}
{{--                                                        @endphp--}}
{{--                                                        @for ($i = 0; $i < 5; $i++)--}}
{{--                                                            @if ($i < $soSao)--}}
{{--                                                                <span style="color: #FFD700;">★</span>--}}
{{--                                                            @else--}}
{{--                                                                <span style="color: #C0C0C0;">★</span>--}}
{{--                                                            @endif--}}
{{--                                                        @endfor--}}
{{--                                                    </strong>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
{{--                                    @else--}}
{{--                                        <div class="col-12 text-center">Không có sách nào trong danh sách top 5.</div>--}}
{{--                                    @endif--}}

{{--                                </div>--}}
{{--                            </li>--}}
{{--                            @php--}}
{{--                                use Illuminate\Support\Str;--}}
{{--                            @endphp--}}

{{--                            @if (!empty($top5DG) && $top5DG instanceof \Illuminate\Support\Collection)--}}
{{--                                @foreach ($top5DG as $index => $sach)--}}
{{--                                    @if ($index >= 3)--}}
{{--                                        <li class="list-group-item">--}}
{{--                                            <div class="crop-text">--}}
{{--                                                <a href="{{ route('chi-tiet-sach', $sach->sach_id) }}" class="ztop-flex">--}}
{{--                                                    <div>--}}
{{--                                                        <span class="ztop-number">{{ $index + 1 }}</span>--}}
{{--                                                        <img class="ztop-img-2"--}}
{{--                                                            src="{{ Storage::url($sach->anh_bia_sach) }}" />--}}
{{--                                                        <strong>--}}
{{--                                                            <span style="color:#000000">--}}
{{--                                                                {{ Str::limit($sach->ten_sach, 15, '...') }}--}}
{{--                                                            </span>--}}
{{--                                                        </strong>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="pull-right ztop-gold-2">--}}
{{--                                                        @php--}}
{{--                                                            $tongMucDoHaiLong = 0;--}}
{{--                                                            $soLuotDanhGia = 0;--}}
{{--                                                            $danhGias = \App\Models\DanhGia::where(--}}
{{--                                                                'sach_id',--}}
{{--                                                                $sach->sach_id,--}}
{{--                                                            )--}}
{{--                                                                ->where('trang_thai', 'hien')--}}
{{--                                                                ->get();--}}
{{--                                                            foreach ($danhGias as $danhGia) {--}}
{{--                                                                $tongMucDoHaiLong +=--}}
{{--                                                                    $mucDoHaiLongOrder[$danhGia->muc_do_hai_long];--}}
{{--                                                                $soLuotDanhGia++;--}}
{{--                                                            }--}}
{{--                                                            $trungBinh =--}}
{{--                                                                $soLuotDanhGia > 0--}}
{{--                                                                    ? $tongMucDoHaiLong / $soLuotDanhGia--}}
{{--                                                                    : 0;--}}
{{--                                                            $soSao = round($trungBinh);--}}
{{--                                                            $soSao = min($soSao, 5);--}}
{{--                                                        @endphp--}}
{{--                                                        @for ($i = 0; $i < 5; $i++)--}}
{{--                                                            @if ($i < $soSao)--}}
{{--                                                                <span style="color: #FFD700;">★</span>--}}
{{--                                                            @else--}}
{{--                                                                <span style="color: #C0C0C0;">★</span>--}}
{{--                                                            @endif--}}
{{--                                                        @endfor--}}
{{--                                                    </div>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>


        <div class="list-group favorite-row">
            <div class="col-xs-12 col-sm-6 col-md-8">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i> Top tác giả xuất sắc</h3>
                    <div class="n-row" style="position: relative">
                        <div class="row text-left">
                            @foreach ($khongThuocTop5TacGia as $index => $sach)
                                <div class="col-xs-12 col-sm-12 col-md-6">
                                    <div class="list-group mb-3 mt-4"
                                        style="box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3); border-radius: 15px; position: relative;">
                                        {{-- Tag for "Hot Author" --}}
                                        <span class="badge badge-danger">Tác giả xuất sắc</span>
                                        <a href="{{ route('chi-tiet-tac-gia', $sach->user->id) }}"
                                            class="crop-text d-flex">
                                            <img style="width: 100px; height: 100px; align-self: center; border-radius: 15px; object-fit: cover; border-right: 5px solid rgb(0, 241, 185); border-bottom: 5px solid rgb(0, 108, 90);"
                                                src="{{ $sach->user->hinh_anh ? Storage::url($sach->user->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                                alt="Bìa sách" />

                                            <div class="flex-grow-1" style="margin-left: 10px; padding: 10px;">
                                                <div class="d-flex justify-content-between">
                                                    <span style="font-weight: bold;">
                                                        {{ $sach->user->ten_doc_gia }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span>Tác phẩm: {{ $sach->tong_sach }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span>Số lượt bán: {{ $sach->tong_sach_da_ban }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span>Yêu thích: {{ $sach->tong_sach_duoc_yeu_thich }}</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                {{-- Open new row after every 2 items --}}
                                @if (($index + 1) % 2 == 0 && $index < count($khongThuocTop5TacGia) - 1)
                        </div>
                        <div class="row text-left">
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .book-container {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 10px;
                }

                .book-container>* {
                    width: 150px;
                    height: 200px;
                    box-sizing: border-box;
                    margin-bottom: 50px;
                    border-radius: 15px;
                    /* Ensures uniform rounded corners */
                }

                .list-group {
                    border-radius: 15px;
                    /* Consistent border radius */
                }

                .badge-danger {
                    position: absolute;
                    top: 0;
                    right: 0;
                    background: linear-gradient(135deg, #39dfaa 30%, #1ebbf0 100%);
                    /* Gradient similar to the image */
                    color: #fff;
                    font-weight: bold;
                    padding: 5px 10px 5px 15px;
                    border-radius: 0 15px 0 15px;
                    /* Rounded only on top-right and bottom-left corners */
                    display: flex;
                    align-items: center;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                    font-size: 0.85rem;
                    text-transform: uppercase;
                    letter-spacing: 0.5px;
                }
            </style>


            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-star" aria-hidden="true"></i> Top 5</h3>
                    <div id="top">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row" id="top">
                                    @foreach ($top5TacGia as $index => $sach)
                                        @if ($index < 3)
                                            <div class="ztop-item ztop-item-{{ $index + 1 }}">
                                                <a href="{{ route('chi-tiet-tac-gia', $sach->user->id) }}">
                                                    <img class="ztop-img"
                                                        src="{{ $sach->user->hinh_anh ? Storage::url($sach->user->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}" />
                                                    <div class="ztop-label">
                                                        <img
                                                            src="{{ asset('assets/client/themes/truyenfull/echo/img/crown.png') }}">
                                                    </div>
                                                    <div class="ztop-label-2">
                                                        <img
                                                            src="{{ asset('assets/client/themes/truyenfull/echo/img/crown-top' . ($index + 1) . '.png') }}">
                                                    </div>
                                                    <div class="ztop-label-3">{{ $index + 1 }}</div>
                                                </a>
                                                <strong class="ztop-name">
                                                    <a href="{{ route('chi-tiet-tac-gia', $sach->user->id) }}"
                                                        class="crop-text-1">{{ $sach->user->ten_doc_gia }}</a>
                                                </strong>

                                            </div>
                                        @endif
                                    @endforeach


                                </div>
                            </li>

                            @foreach ($top5TacGia as $index => $sach)
                                @if ($index >= 3)
                                    <li class="list-group-item">
                                        <div class="crop-text">
                                            <a href="{{ route('chi-tiet-tac-gia', $sach->user->id) }}" class="ztop-flex">
                                                <div>
                                                    <span class="ztop-number">{{ $index + 1 }}</span>
                                                    <img class="ztop-img-2"
                                                        src="{{ Storage::url($sach->user->hinh_anh) }}" />
                                                    <strong><span style="color:#000000"
                                                            href="{{ route('chi-tiet-tac-gia', $sach->user->id) }}">{{ Str::limit($sach->user->ten_doc_gia, 15, '...') }}</span></strong>
                                                </div>
                                                <div class="pull-right ztop-gold-2">
                                                    <p>Lượt bán: {{ $sach->tong_sach_da_ban }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <style type="text/css">
            .vinhdanhtop {
                position: relative;
            }

            .vinhdanhtop img {
                margin-bottom: 5px;

            }

            .img-wrapper {
                position: relative;
                display: inline-block;
            }



            .khung-vien-rank {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;

                box-sizing: border-box;
                pointer-events: none;
                /* Để khung không che mất các tương tác với ảnh */
            }

            .rank-icon {
                position: absolute;
                top: -3px;
                width: 50px;
                /* Điều chỉnh kích thước icon hạng nếu cần */
                height: auto;

            }

            .overBox {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: rgba(0, 0, 0, 0.7);
                color: white;
                padding: 5px;
                text-align: center;
                font-size: 14px;
                box-sizing: border-box;
            }

            .ztop-img-list {
                width: 30px;
                border-radius: 50%;
                margin-right: 10px;
            }

            .z-top-date {
                color: gray;
                font-size: 12px;
                font-style: italic;
            }

            .z-top-flex {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            #heading_tax {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 15px;
            }

            .user_avatar_parent {
                position: relative;
                width: 120px;
                height: 120px;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

            .user_avatar_2 img {
                width: 120px;
                height: 120px;
                display: block;
                margin-left: auto;
                margin-right: auto;
                -webkit-box-shadow: 0 10px 15px 0 rgba(0, 0, 0, .15);
                -moz-box-shadow: 0 10px 15px 0 rgba(0, 0, 0, .15);
                box-shadow: 0 10px 15px 0 rgba(0, 0, 0, .15);
                border-radius: 50%;
            }

            h1.user_nickname {
                font-family: "Oswald";
                font-size: 20px;
                text-align: center;
                margin: 12px 0px 4px 0px;
            }

            .user_login {
                text-align: center;
                font-size: 15px;
                font-weight: bold;
                margin-bottom: 10px;
            }

            .alert.alert-info {
                border-color: #1ebbf0;
            }

            #user_count {
                text-align: center;
                margin: 20px 0px;
            }

            #user_count .number {
                font-size: 16px;
                font-weight: bold;
            }

            #post_author {
                background-color: rgba(0, 0, 0, .04);
                padding: 20px 10px;
            }

            ul.theloai-thumlist {
                margin-top: unset;
            }

            #post_author .description {
                margin: 0px 20px;
                text-align: center;
            }

            #post_author .max-width {
                max-width: 220px;
                text-align: center;
                margin: auto;
            }

            @media (max-width: 768px) {
                .h3 {
                    margin-top: 20px;
                }
            }

            .h3 {
                margin-bottom: 10px;
            }

            .btn-r {
                background-image: linear-gradient(135deg, #FF0000 30%, #FE9A2E 100%);
            }

            .ztop-img {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                border: 4px solid #efca20;
            }

            .ztop-img-2 {
                width: 30px;
                height: 30px;
                margin: 0px 5px;
                border-radius: 50%;
            }

            .ztop-img-2d {
                width: 30px;
                height: 40px;
                margin: 0px 5px;
                border-radius: 5px;
            }

            .ztop-name {
                text-align: center;
                margin-top: 30px;
                display: block;
                width: 120px;
            }

            .ztop-labeld {
                position: absolute;
                top: -20px;
                right: -20px;
                z-index: 1;
            }

            .ztop-label {
                position: absolute;
                top: -60px;
                right: -5px;
                z-index: 1;
            }

            .ztop-label-2d {
                position: absolute;
                top: 100px;
                z-index: 1;
                left: 50%;
                transform: translate(-50%, 0);
            }

            .ztop-label-2 {
                position: absolute;
                z-index: 1;
                left: 50%;
                transform: translate(-50%, 0);
            }

            .ztop-label-3 {
                position: absolute;
                z-index: 1;
                left: 50%;
                transform: translate(-50%, 0);
                padding: 5px 12px;
                color: white;
                border-radius: 50%;
                bottom: -55px;
                background-image: linear-gradient(135deg, #f0ed1e 30%, #ec7d50 100%);
            }

            .ztop-label-3a {
                position: absolute;
                z-index: 1;
                left: 50%;
                transform: translate(-50%, 0);
                padding: 5px 12px;
                color: white;
                border-radius: 50%;
                bottom: -18px;
                background-image: linear-gradient(135deg, #f0ed1e 30%, #ec7d50 100%);
            }

            .ztop-label img {
                width: 40px;
                transform: rotate(22deg);
            }

            .ztop-labeld img {
                width: 40px;
                transform: rotate(22deg);
            }

            #top {
                display: flex;
                justify-content: center;
            }

            .ztop-gold {
                text-align: center;
                display: block;
                margin: 10px 0px;
                color: #ddb80f;
            }

            .ztop-gold-2 {
                color: #ddb80f;
                font-weight: bold;
            }

            .ztop-number {
                z-index: 5;
                text-align: center;
                color: white;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                background-color: #ebebeb;
                display: inline-flex;
                justify-content: center;
                align-items: center;
                background-image: linear-gradient(135deg, #c2c2bd 30%, #6c554b 100%);
                border: 1px #c2c2bd solid;
                font-size: 12px;
                margin-right: 7px;
            }

            .ztop-flex {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .ztop-item {
                margin: 15px 10px 0px 10px;
                text-align: center;
            }


            .ztop-item a {
                position: relative;
            }

            .ztop-item-1 {
                order: 2;
            }

            .ztop-item-2 {
                order: 1;
                margin-top: 30px;
            }

            .ztop-item-3 {
                order: 3;
                margin-top: 30px;
            }

            .ztop-item-2 .ztop-img {
                width: 90px;
                height: 90px;
                border: 4px solid #bcbbb9;
            }

            .ztop-item-3 .ztop-img {
                width: 90px;
                height: 90px;
                border: 4px solid #cc8a27;
            }

            .ztop-item-1 .ztop-label-2 img {
                width: 110px;

            }

            .ztop-item-1 .ztop-label-2d img {
                width: 110px;
            }

            .ztop-item-2 .ztop-label-2 img,
            .ztop-item-3 .ztop-label-2 img {
                width: 90px;
            }

            .ztop-item-2 .ztop-label-2d img,
            .ztop-item-3 .ztop-label-2d img {
                width: 90px;
            }

            .ztop-item-2 .ztop-label-3 {
                color: white;
                bottom: -50px;
                padding: 3px 10px;
                background-image: linear-gradient(135deg, #bcbbb9 30%, #6a7173 100%);
            }

            .ztop-item-2 .ztop-label-3a {
                color: white;
                bottom: -14px;
                padding: 3px 10px;
                background-image: linear-gradient(135deg, #bcbbb9 30%, #6a7173 100%);
            }

            .ztop-item-3 .ztop-label-3 {
                color: white;
                bottom: -50px;
                padding: 3px 10px;
                background-image: linear-gradient(135deg, #cc8a27 30%, #8b5a32 100%);
            }

            .ztop-item-3 .ztop-label-3a {
                color: white;
                bottom: -14px;
                padding: 3px 10px;
                background-image: linear-gradient(135deg, #cc8a27 30%, #8b5a32 100%);
            }

            @media only screen and (min-width: 768px) and (max-width: 1199px) {
                .ztop-img {
                    width: 80px;
                    height: 80px;
                }

                .ztop-label {
                    top: -51px;
                    right: -10px;
                }

                .ztop-labeld {
                    top: -51px;
                    right: -10px;
                }

                .ztop-name {
                    width: 80px;
                }

                .ztop-item-2 .ztop-img,
                .ztop-item-3 .ztop-img {
                    width: 70px;
                    height: 70px;
                }

                .ztop-item-2 .ztop-img,
                .ztop-item-3 .ztop-img {
                    width: 70px;
                    height: 70px;
                }

                .ztop-label-3 {
                    bottom: -45px;
                }

                .ztop-label-3d {
                    bottom: -45px;
                }

                .ztop-item-2 .ztop-label-3,
                .ztop-item-3 .ztop-label-3 {
                    bottom: -40px;
                }

                .ztop-item-2 .ztop-label-3,
                .ztop-item-3 .ztop-label-3 {
                    bottom: -40px;
                }
            }

            @media only screen and (min-width: 375px) and (max-width: 413px) {
                .ztop-img {
                    width: 80px;
                    height: 80px;
                }

                .ztop-label {
                    top: -51px;
                    right: -10px;
                }

                .ztop-labeld {
                    top: -51px;
                    right: -10px;
                }

                .ztop-name {
                    width: 80px;
                }

                .ztop-item-2 .ztop-img,
                .ztop-item-3 .ztop-img {
                    width: 70px;
                    height: 70px;
                }
            }

            @media only screen and (max-width: 375px) {
                .ztop-img {
                    width: 80px;
                    height: 80px;
                }

                .ztop-label {
                    top: -51px;
                    right: -10px;
                }

                .ztop-labeld {
                    top: -51px;
                    right: -10px;
                }

                .ztop-item {
                    margin: 0px 5px;
                }

                .ztop-name {
                    width: 80px;
                }

                .ztop-item-2 .ztop-img,
                .ztop-item-3 .ztop-img {
                    width: 70px;
                    height: 70px;
                }


                .ztop-label-3 {
                    bottom: -45px;
                }



                .ztop-label-3d {
                    bottom: -45px;
                }


                .ztop-item-2 .ztop-label-3,
                .ztop-item-3 .ztop-label-3 {
                    bottom: -40px;
                }
            }

            #top .list-group {
                width: 100%;
            }

            #title-result {
                margin-bottom: 10px;
            }

            .list-group {
                margin-bottom: 0px;
            }
        </style>
    @endsection

    @push('scripts')
        <script>
            $(document).ready(function() {
                let selectedTab = localStorage.getItem('selectedTab') || 'view';

                // Remove active class and reset background color for all <a> tags
                $('.nav-tabs-css li').removeClass('active');
                $('.nav-tabs-css li a').css('background-color', '').css('color',
                    'white'); // Reset background and text color for <a> tags

                // Set active class and background color for the selected <a> tag
                $(`.nav-tabs-css li[data-time="${selectedTab}"]`).addClass('active');
                $(`.nav-tabs-css li[data-time="${selectedTab}"] a`).css('background', 'white').css('color',
                    '#333'); // Set background for selected tab <a>

                $('.view-row, .review-row, .favorite-row').hide();
                $(`.${selectedTab}-row`).show();

                $('.nav-tabs-css li').click(function() {
                    $('.nav-tabs-css li').removeClass('active');
                    $('.nav-tabs-css li a').css('background', '').css('color',
                        'white'); // Reset background and text color for all <a> tags

                    $(this).addClass('active');
                    $(this).find('a').css('background', 'white').css('color',
                        '#333'); // Set background for clicked <a>

                    $('.view-row, .review-row, .favorite-row').hide();

                    selectedTab = $(this).data('time');

                    localStorage.setItem('selectedTab', selectedTab);

                    $(`.${selectedTab}-row`).show();
                });
            });
        </script>
    @endpush
