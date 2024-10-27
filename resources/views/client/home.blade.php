@extends('client.layouts.app')
@section('content')

    <div class="col-xs-12">
        <div class="slider-cont slider-cont-sliderbanner" id="sliderbanner">
            @foreach ($slider->hinhAnhBanner as $item)
                <div class="sliderbanner-item">
                    <a href="#" target="_blank">
                        <img src="{{ Storage::url($item->hinh_anh) }}" alt="Banner Image"/>
                    </a>
                </div>
            @endforeach
        </div>
        <script>
            $(document).ready(function () {
                $('#sliderbanner').slick({
                    centerMode: true, // Trung tâm slide hiện tại
                    centerPadding: '60px', // Khoảng cách padding để hiển thị một phần của slide tiếp theo
                    slidesToShow: 1, // Số slide hiển thị mỗi lần
                    arrows: true, // Hiển thị mũi tên điều hướng
                    dots: false, // Tắt điểm chấm dưới slider nếu không cần
                    responsive: [{
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1
                        }
                    },
                        {
                            breakpoint: 480,
                            settings: {
                                arrows: false,
                                centerMode: true,
                                centerPadding: '20px',
                                slidesToShow: 1
                            }
                        }
                    ]
                });
            });
        </script>

        <style type="text/css">
            .sliderbanner-item {
                background-color: #ffffff;
                /* Giữ nguyên chiều rộng là 100% */
                width: 100%;
                height: 450px;
                /* Tăng chiều cao */
                object-fit: cover;
                /* Đảm bảo ảnh phù hợp với kích thước không bị méo */
                border-radius: 15px;
                /* Tăng bo góc nếu cần */
            }

            .sliderbanner-item img {
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                width: 100%;
                /* Giữ nguyên chiều rộng là 100% */
                height: 450px;
                /* Tăng chiều cao */
                object-fit: cover;
                /* Đảm bảo ảnh phù hợp với kích thước không bị méo */
                border-radius: 15px;
                /* Tăng bo góc nếu cần */
            }


            .slider-cont.slider-cont-sliderbanner .slick-prev.slick-arrow {
                left: 10px;
                /* Điều chỉnh vị trí mũi tên trái */
                z-index: 1;
            }

            .slider-cont.slider-cont-sliderbanner .slick-next.slick-arrow {
                right: 10px;
                /* Điều chỉnh vị trí mũi tên phải */
                z-index: 1;
            }
        </style>


    </div>
    <div class="container">
        <div class="row">
            {{-- <div class="col-xs-12 col-md-3 col-md-push-9" style="position: relative;">
                <div class="position-relative"> <a href="user/dang-truyen/index.html" class="btn-primary btn-dangtruyen"> <i
                            class="fa fa-plus-circle" aria-hidden="true"></i>
                        <span>Đăng truyện</span> </a>
                    <div class="button-writer__arrow"> <img width="30" height="54"
                            src="{{ asset('assets/client/themes/truyenfull/echo/img/arrow2.png') }}"> </div>
                </div>
                <div class="ztop-15">
                    <div class="text-center dangtruyen-title"> Bạn muốn đăng truyện?</div>
                </div>
                <div class="ztop-30"></div>
                <style type="text/css">
                    .btn-dangtruyen {
                        width: 100%;
                        height: 50px;
                        display: inline-block;
                        font-weight: 400;
                        text-align: center;
                        vertical-align: middle;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;
                        background-color: transparent;
                        border: 1px solid transparent;
                        padding: 0.375rem 0.75rem;
                        border-radius: 5px;
                        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                        box-shadow: 0 2px 8px 0.56px rgba(0, 0, 0, 0.2);
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        font-size: 20px;
                    }

                    .btn-dangtruyen i {
                        margin-right: 8px;
                    }

                    .btn-dangtruyen span {
                        font-family: "Roboto Condensed";
                    }

                    .dangtruyen-title {
                        font-size: 18px;
                        font-weight: 500;
                    }

                    .position-relative {
                        position: relative !important;
                    }

                    .button-writer__arrow {
                        position: absolute;
                        top: 30px;
                        right: 20px;
                    }

                    .button-writer__arrow img {
                        width: 30px;
                    }
                </style>
                <div class="tf_pc_absolute">
                    <div id="tf_home" data-domain="truyenhdt.com"></div>
                    <div style="margin-bottom: 10px;"></div>
                    <div class="col-btn-home-icon-parent">
                        <div class="col-btn-home-icon" id="tab_home_1">
                            <div class="btn-home-icon" data-value="tab_home_1"> <i class="fa fa-eye fa-lg"
                                    aria-hidden="true"></i>
                                <div class="number-home-icon" id="number-da-doc"></div>
                            </div>
                            <div class="text-home-icon"> Đã Đọc </div>
                        </div>
                        <div class="col-btn-home-icon" id="tab_home_3">
                            <div class="btn-home-icon" data-value="tab_home_3"> <i class="fa fa-tags"
                                    aria-hidden="true"></i>
                                <div class="number-home-icon" id="number-tu-khoa"></div>
                            </div>
                            <div class="text-home-icon"> Bookmark </div>
                        </div>
                        <div class="col-btn-home-icon" id="tab_home_2">
                            @auth
                                <a href="{{ route('thong-bao-chung', ['id' => auth()->user()->id]) }}">
                                    <div class="btn-home-icon" data-value="tab_home_2">
                                        <i class="fa fa-bell fa-lg" aria-hidden="true"></i>
                                        <div id="show_number_notify"></div>
                                    </div>
                                    <div class="text-home-icon">Thông Báo</div>
                                </a>
                            @endauth
                        </div>
                        <div class="col-btn-home-icon" id="tab_home_4"> <a href="user/profile/index.html#h1">
                                <div class="btn-home-icon" data-value="tab_home_4"> <i class="fa fa-user"
                                        aria-hidden="true"></i> </div>
                                <div class="text-home-icon"> Tài Khoản </div>
                            </a> </div>
                        <div class="col-btn-home-icon" id="tab_home_5"> <a href="q-a/index.html">
                                <div class="btn-home-icon" data-value="tab_home_5"> <i class="fa fa-reply-all"
                                        aria-hidden="true"></i> </div>
                                <div class="text-home-icon"> Hỏi Đáp </div>
                            </a> </div>
                        <div class="col-btn-home-icon" id="tab_home_6"> <a href="amp/index.html">
                                <div class="btn-home-icon-2" data-value="tab_home_6"> <i class="fa fa-home"
                                        aria-hidden="true"></i> </div>
                                <div class="text-home-icon"> Bản Mới </div>
                            </a> </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="show-layout-home-1"></div>
                </div>
            </div> --}}

            {{-- Đổ ra banner của trang chủ --}}

            {{-- <div class="col-xs-12 col-m-12 col-md-3 col-md-pull-9">
                <div id="news">
                    <div class="row tf-flex">
                        <div class="col-xs-7">
                            <h2 class="heading crop-text">
                                <i class="fa fa-bullhorn" aria-hidden="true"></i>
                                Thông Báo {{ $tong_thong_baos }}
                            </h2>
                        </div>
                        <div class="col-xs-5 l-more">
                            <span class="pull-right">
                                @auth
                                    <a href="{{ route('thong-bao-chung', ['id' => auth()->user()->id]) }}" title="Xem Thêm">
                                        Xem
                                        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                    </a>
                                @endauth
                            </span>
                        </div>
                    </div>
                    <div class="news-child">
                        @foreach ($thong_baos as $thong_baos)
                            <div class="tf-flex col-line-last">
                                <div class="crop-text"> <i
                                        class="fa fa-circle {{ $thong_baos->trang_thai === 'chua_xem' ? 'text-danger' : 'text-success' }} text-success"
                                        aria-hidden="true"></i>
                                    <a href="{{ route('chi-tiet-thong-bao', $thong_baos->id) }}"
                                        class="{{ $thong_baos->trang_thai === 'chua_xem' ? 'font-weight-bold' : '' }}">
                                        <span class="notify-date">{{ $thong_baos->created_at->format('d/m') }}</span>
                                        {{ $thong_baos->tieu_de }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> --}}
        </div>
    </div>





    {{--         <div class="container top-layout" id="home-layout-add">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-xs-12 col-md-6 col-md-push-3">--}}
    {{--                    <h2 class="heading crop-text"><i class="fa fa-copyright" aria-hidden="true"></i> Độc Quyền</h2>--}}
    {{--                    <div class="row ztop-5">--}}
    {{--                        <div class="col-xs-10">--}}
    {{--                            <div id="docquyen">--}}
    {{--                                <div class="docquyen-item"><img--}}
    {{--                                        src="{{ asset('assets/client/uploads/2024/09/au-te-manh-oa-o-tinh-te-lam-doan-sung-1725664021.jpg') }}" />--}}
    {{--                                </div>--}}
    {{--                                <div class="docquyen-item"><img--}}
    {{--                                        src="{{ asset('assets/client/uploads/2024/10/xe-can-cu-cua-toi-trong-mat-the-1728297403.jpg') }}" />--}}
    {{--                                </div>--}}
    {{--                                <div class="docquyen-item"><img--}}
    {{--                                        src="{{ asset('assets/client/uploads/2024/08/11501574.jpg') }}" /></div>--}}
    {{--                                <div class="docquyen-item"><img--}}
    {{--                                        src="{{ asset('assets/client/uploads/2024/09/11646211.jpg') }}" /></div>--}}
    {{--                                <div class="docquyen-item"><img--}}
    {{--                                        src="{{ asset('assets/client/uploads/2023/12/xuyen-thanh-thai-tu-phi-bi-luu-day-1702997084.jpg') }}" />--}}
    {{--                                </div>--}}
    {{--                                <div class="docquyen-item"><img--}}
    {{--                                        src="{{ asset('assets/client/uploads/2024/09/11624124.jpg') }}" /></div>--}}
    {{--                                <div class="docquyen-item"><img--}}
    {{--                                        src="{{ asset('assets/client/uploads/2023/07/9473346.jpg') }}" /></div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-xs-6" style=" right: 0px; position: absolute;">--}}
    {{--                            <div class="docquyen-content docquyen-content-0 "> <a--}}
    {{--                                    href="truyen/au-te-manh-oa-o-tinh-te-lam-doan-sung/index.html"> <span--}}
    {{--                                        class="docquyen-title crop-text-1">Bé Con Xuyên Tới Tinh Tế Làm Thần Thú</span> </a>--}}
    {{--                                <div class="docquyen-excerpt ztop-10">Ở thời đại tinh tế, La Dương xuyên qua trở thành một--}}
    {{--                                    con ma thú vô cùng đáng yêu, chỉ có thể dựa vào lương thực cứu tế mà …</div>--}}
    {{--                                <div class="ztop-15"></div> <a href="truyen/au-te-manh-oa-o-tinh-te-lam-doan-sung/index.html">--}}
    {{--                                    <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>--}}
    {{--                            </div>--}}
    {{--                            <div class="docquyen-content docquyen-content-1 hidden"> <a--}}
    {{--                                    href="truyen/xe-can-cu-cua-toi-trong-mat-the/index.html"> <span--}}
    {{--                                        class="docquyen-title crop-text-1">Xe Căn Cứ Của Tôi Trong Mạt Thế</span> </a>--}}
    {{--                                <div class="docquyen-excerpt ztop-10">Khi tận thế đang đến gần, Giang Lưu Thạch bất ngờ nhận--}}
    {{--                                    được một công nghệ đen có thể nâng cấp và cải tiến các phương tiện giao thông. …</div>--}}
    {{--                                <div class="ztop-15"></div> <a href="truyen/xe-can-cu-cua-toi-trong-mat-the/index.html">--}}
    {{--                                    <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>--}}
    {{--                            </div>--}}
    {{--                            <div class="docquyen-content docquyen-content-2 hidden"> <a--}}
    {{--                                    href="truyen/chet-roi-cung-khong-tha-cho-em/index.html"> <span--}}
    {{--                                        class="docquyen-title crop-text-1">Chết Rồi Cũng Không Tha Cho Em</span> </a>--}}
    {{--                                <div class="docquyen-excerpt ztop-10">Năm 18 tuổi, vì thể chất đặc biệt, cậu đã nhận nhầm--}}
    {{--                                    một hồn ma là ba mình dưới sự thao túng kỳ lạ của ông nội.Ma quái, thật …</div>--}}
    {{--                                <div class="ztop-15"></div> <a href="truyen/chet-roi-cung-khong-tha-cho-em/index.html">--}}
    {{--                                    <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>--}}
    {{--                            </div>--}}
    {{--                            <div class="docquyen-content docquyen-content-3 hidden"> <a--}}
    {{--                                    href="truyen/dau-bep-lam-tinh-chinh-phuc-tinh-te/index.html"> <span--}}
    {{--                                        class="docquyen-title crop-text-1">Đầu Bếp Lam Tinh, Chinh Phục Tinh Tế</span> </a>--}}
    {{--                                <div class="docquyen-excerpt ztop-10">Bếp trưởng nổi danh Lam Tinh, Úc Trục Nhan, sau một--}}
    {{--                                    tai nạn máy bay bất ngờ xuyên vào một cuốn tiểu thuyết máu chó giữa thế giới tinh …--}}
    {{--                                </div>--}}
    {{--                                <div class="ztop-15"></div> <a href="truyen/dau-bep-lam-tinh-chinh-phuc-tinh-te/index.html">--}}
    {{--                                    <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>--}}
    {{--                            </div>--}}
    {{--                            <div class="docquyen-content docquyen-content-4 hidden"> <a--}}
    {{--                                    href="truyen/xuyen-thanh-thai-tu-phi-bi-luu-day/index.html"> <span--}}
    {{--                                        class="docquyen-title crop-text-1">Xuyên Thành Thái Tử Phi Bị Lưu Đày</span> </a>--}}
    {{--                                <div class="docquyen-excerpt ztop-10">Editor: CyndaquilGiới thiệu:Sau khi tỉnh dậy sau một--}}
    {{--                                    tai nạn, Chu Sơ Ninh xuyên qua thành con vợ lẽ, nam giả nữ thay chị gái con dòng chính--}}
    {{--                                    đi …</div>--}}
    {{--                                <div class="ztop-15"></div> <a href="truyen/xuyen-thanh-thai-tu-phi-bi-luu-day/index.html">--}}
    {{--                                    <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>--}}
    {{--                            </div>--}}
    {{--                            <div class="docquyen-content docquyen-content-5 hidden"> <a--}}
    {{--                                    href="truyen/trong-sinh-mat-the-tro-thanh-be-yeu-cua-dai-lao-tan-ac/index.html"> <span--}}
    {{--                                        class="docquyen-title crop-text-1">Trọng Sinh Mạt Thế: Trở Thành Bé Yêu Của Đại Lão--}}
    {{--                                        Tàn Ác</span> </a>--}}
    {{--                                <div class="docquyen-excerpt ztop-10">Lục Dao thức tỉnh vào một tuần trước khi mạt thế buông--}}
    {{--                                    xuống, biết được mình là nữ phụ vì đưa không gian tùy thân cho em gái mà …</div>--}}
    {{--                                <div class="ztop-15"></div> <a--}}
    {{--                                    href="truyen/trong-sinh-mat-the-tro-thanh-be-yeu-cua-dai-lao-tan-ac/index.html"> <span--}}
    {{--                                        class="btn btn-primary border-radius">Đọc Truyện</span> </a>--}}
    {{--                            </div>--}}
    {{--                            <div class="docquyen-content docquyen-content-6 hidden"> <a--}}
    {{--                                    href="truyen/xuyen-sach-lam-de-nhat-nu-nha-dich/index.html"> <span--}}
    {{--                                        class="docquyen-title crop-text-1">Xuyên Sách Làm Đệ Nhất Nữ Nha Dịch</span> </a>--}}
    {{--                                <div class="docquyen-excerpt ztop-10">Giới thiệu nội dungNàng tình cờ xuyên vào trong sách,--}}
    {{--                                    phát hiện cha mẹ của nguyên chủ trong sách đều bị giết, cả nhà bị chu di tam tộc. …--}}
    {{--                                </div>--}}
    {{--                                <div class="ztop-15"></div> <a href="truyen/xuyen-sach-lam-de-nhat-nu-nha-dich/index.html">--}}
    {{--                                    <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <hr class="docquyen-hr">--}}
    {{--                    <div class="row docquyen-event">--}}
    {{--                        <div class="col-xs-4">--}}
    {{--                            <div class="d-event-title crop-text"> <a--}}
    {{--                                    href="truyen/trong-truyen-me-ke-chong-co-kha-nang-nghe-tieng-long/index.html"> Trong--}}
    {{--                                    Truyện Mẹ Kế, Chồng Có Khả Năng Nghe Tiếng Lòng </a> </div>--}}
    {{--                            <div class="d-event-excerpt crop-text-2 ztop-5 font-15"> Ngu Miểu xuyên sách, xuyên vào một cuốn--}}
    {{--                                truyện hào môn, trở thành mẹ kế. Trong sách, nguyên chủ không yêu tiền tài chỉ yêu chồng hào--}}
    {{--                                môn, vì … </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-xs-4">--}}
    {{--                            <div class="d-event-title crop-text"> <a--}}
    {{--                                    href="truyen/xuyen-sach-roi-ta-bi-bon-dai-lao-duoi-theo-sung/index.html"> Xuyên Sách Rồi--}}
    {{--                                    Ta Bị Bốn Đại Lão Đuổi Theo Sủng </a> </div>--}}
    {{--                            <div class="d-event-excerpt crop-text-2 ztop-5 font-15"> [Nhiều nam chính + Tu la tràng + Cạnh--}}
    {{--                                tranh nam + Nhiều ngoại truyện, nhiều kết cục]Quý Thanh Diều xuyên sách rồi, nhiệm vụ là--}}
    {{--                                cùng lúc công … </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-xs-4">--}}
    {{--                            <div class="d-event-title crop-text"> <a--}}
    {{--                                    href="truyen/phoi-bay-kiep-truoc-khien-ca-coi-mang-chan-dong/index.html"> Phơi Bày Kiếp--}}
    {{--                                    Trước Khiến Cả Cõi Mạng Chấn Động </a> </div>--}}
    {{--                            <div class="d-event-excerpt crop-text-2 ztop-5 font-15"> Cơ thể của Dạ Vãn Lan bị xuyên qua,--}}
    {{--                                người xuyên việt khiến cuộc sống của cô trở nên chướng khí mù mịt rồi vung tay rời đi, cuối--}}
    {{--                                … </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <style type="text/css">--}}
    {{--                        .d-event-title {--}}
    {{--                            font-size: 17px;--}}
    {{--                            font-weight: bold;--}}
    {{--                        }--}}

    {{--                        hr.docquyen-hr {--}}
    {{--                            margin-top: 7px;--}}
    {{--                            margin-bottom: 10px;--}}
    {{--                        }--}}

    {{--                        #docquyen {--}}
    {{--                            left: -75px;--}}
    {{--                            margin-top: 15px;--}}
    {{--                            min-height: 136px;--}}
    {{--                        }--}}

    {{--                        @media (min-width:1200px) {--}}
    {{--                            #docquyen {--}}
    {{--                                left: -90px;--}}
    {{--                            }--}}
    {{--                        }--}}

    {{--                        #docquyen img {--}}
    {{--                            width: 100%;--}}
    {{--                            border-width: 4px;--}}
    {{--                            border-style: solid;--}}
    {{--                            border-image: linear-gradient(#1ebbf0, #39dfaa) 30;--}}
    {{--                        }--}}

    {{--                        .docquyen-title {--}}
    {{--                            font-size: 18px;--}}
    {{--                            font-weight: 600;--}}
    {{--                        }--}}

    {{--                        .docquyen-excerpt {--}}
    {{--                            height: 102px;--}}
    {{--                            font-size: 16px;--}}
    {{--                            overflow: hidden;--}}
    {{--                            display: -webkit-box;--}}
    {{--                            -webkit-box-orient: vertical;--}}
    {{--                            -webkit-line-clamp: 4;--}}
    {{--                        }--}}

    {{--                        #docquyen div[aria-hidden="true"] {--}}
    {{--                            transform: translate(-5%, 0) scale(.01);--}}
    {{--                        }--}}

    {{--                        #docquyen .slick-current+div {--}}
    {{--                            transform: translate(-25%, 0) scale(.8);--}}
    {{--                            position: relative;--}}
    {{--                            z-index: 5;--}}
    {{--                        }--}}

    {{--                        #docquyen .slick-current+div+div {--}}
    {{--                            transform: translate(-80%, 0) scale(.6);--}}
    {{--                        }--}}

    {{--                        #docquyen .slick-current {--}}
    {{--                            transform: translate(0%, 0) scale(1);--}}
    {{--                            position: relative;--}}
    {{--                            z-index: 10;--}}
    {{--                        }--}}

    {{--                        #docquyen .slick-index-pre1 {--}}
    {{--                            transform: translate(25%, 0) scale(.8);--}}
    {{--                        }--}}

    {{--                        #docquyen .slick-index-pre2 {--}}
    {{--                            transform: translate(80%, 0) scale(.6);--}}
    {{--                        }--}}
    {{--                    </style>--}}
    {{--                </div>--}}
    {{--                <div class="col-xs-12 col-md-3 col-md-pull-6">--}}
    {{--                    <h2 class="heading"><i class="fa fa-thumb-tack" aria-hidden="true"></i> BTV Đề Cử</h2>--}}
    {{--                    <div class="slider-cont slider-premiumItem-img" id="slider-premiumItem-img2">--}}
    {{--                        <div class="slider-item">--}}
    {{--                            <div class="premiumItem">--}}
    {{--                                <div class="img"><a--}}
    {{--                                        href="truyen/xuyen-sach-thap-nien-70-mo-khoa-bi-kip-tan-tinh-anh-linh-xue-xoa/index.html"--}}
    {{--                                        title="Xuyên Sách Thập Niên 70: Mở Khóa Bí Kíp, Tán Tỉnh Anh Lính Xuề Xòa"><img--}}
    {{--                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="--}}
    {{--                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/05/11137877.jpg"--}}
    {{--                                            alt="Xuyên Sách Thập Niên 70: Mở Khóa Bí Kíp, Tán Tỉnh Anh Lính Xuề Xòa" /><span--}}
    {{--                                            class="lb-item">Dịch/Edit</span><span class="overBox"><i class="fa fa-star"></i>--}}
    {{--                                            6.71/10</a></div><strong class="title"><a--}}
    {{--                                        href="truyen/xuyen-sach-thap-nien-70-mo-khoa-bi-kip-tan-tinh-anh-linh-xue-xoa/index.html"--}}
    {{--                                        title="Xuyên Sách Thập Niên 70: Mở Khóa Bí Kíp, Tán Tỉnh Anh Lính Xuề Xòa">Xuyên--}}
    {{--                                        Sách Thập Niên 70: Mở Khóa Bí Kíp, Tán Tỉnh Anh Lính Xuề Xòa</a></strong>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="slider-item">--}}
    {{--                            <div class="premiumItem">--}}
    {{--                                <div class="img"><a href="truyen/ket-minh-hon-co-vo-tre-la-ma/index.html"--}}
    {{--                                        title="Người Trừ Tà Kết Minh Hôn"><img--}}
    {{--                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="--}}
    {{--                                            data-src="https://truyenhdt.com/wp-content/uploads/2023/06/ket-minh-hon-co-vo-tre-la-ma-1686835676.jpg"--}}
    {{--                                            alt="Người Trừ Tà Kết Minh Hôn" /><span class="lb-item">Dịch/Edit</span><span--}}
    {{--                                            class="overBox"><i class="fa fa-star"></i> 8/10</a></div><strong--}}
    {{--                                    class="title"><a href="truyen/ket-minh-hon-co-vo-tre-la-ma/index.html"--}}
    {{--                                        title="Người Trừ Tà Kết Minh Hôn">Người Trừ Tà Kết Minh Hôn</a></strong>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="slider-item">--}}
    {{--                            <div class="premiumItem">--}}
    {{--                                <div class="img"><a--}}
    {{--                                        href="truyen/truoc-khi-luu-day-ta-dung-khong-gian-khoang-sach-hoang-cung/index.html"--}}
    {{--                                        title="Trước Khi Lưu Đày Ta Dùng Không Gian Khoắng Sạch Hoàng Cung"><img--}}
    {{--                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="--}}
    {{--                                            data-src="https://truyenhdt.com/wp-content/uploads/2023/09/truoc-khi-luu-day-ta-dung-khong-gian-khoang-sach-hoang-cung.jpg"--}}
    {{--                                            alt="Trước Khi Lưu Đày Ta Dùng Không Gian Khoắng Sạch Hoàng Cung" /><span--}}
    {{--                                            class="lb-item">Dịch/Edit</span><span class="overBox"><i class="fa fa-star"></i>--}}
    {{--                                            7/10</a></div><strong class="title"><a--}}
    {{--                                        href="truyen/truoc-khi-luu-day-ta-dung-khong-gian-khoang-sach-hoang-cung/index.html"--}}
    {{--                                        title="Trước Khi Lưu Đày Ta Dùng Không Gian Khoắng Sạch Hoàng Cung">Trước Khi Lưu--}}
    {{--                                        Đày Ta Dùng Không Gian Khoắng Sạch Hoàng Cung</a></strong>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="slider-item">--}}
    {{--                            <div class="premiumItem">--}}
    {{--                                <div class="img"><a href="truyen/nguoi-yeu-be-nho-cua-chi/index.html"--}}
    {{--                                        title="Người Yêu Bé Nhỏ Của Chị"><img--}}
    {{--                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="--}}
    {{--                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/05/nguoi-yeu-be-nho-cua-chi-1716285112.jpg"--}}
    {{--                                            alt="Người Yêu Bé Nhỏ Của Chị" /><span class="lb-item">Sáng Tác</span><span--}}
    {{--                                            class="overBox"><i class="fa fa-star"></i> 9.12/10</a></div><strong--}}
    {{--                                    class="title"><a href="truyen/nguoi-yeu-be-nho-cua-chi/index.html"--}}
    {{--                                        title="Người Yêu Bé Nhỏ Của Chị">Người Yêu Bé Nhỏ Của Chị</a></strong>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="slider-item">--}}
    {{--                            <div class="premiumItem">--}}
    {{--                                <div class="img"><a href="truyen/mi-tinh-3/index.html" title="Mị Tình"><img--}}
    {{--                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="--}}
    {{--                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/08/mi-tinh-3-1722687688.jpg"--}}
    {{--                                            alt="Mị Tình" /><span class="lb-item">Dịch/Edit</span><span class="overBox"><i--}}
    {{--                                                class="fa fa-star"></i> 9.19/10</a></div><strong class="title"><a--}}
    {{--                                        href="truyen/mi-tinh-3/index.html" title="Mị Tình">Mị Tình</a></strong>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="slider-item">--}}
    {{--                            <div class="premiumItem">--}}
    {{--                                <div class="img"><a href="truyen/dua-vao-rut-tham-nam-thang-o-thap-nien-70/index.html"--}}
    {{--                                        title="Dựa Vào Rút Thăm Nằm Thắng Ở Thập Niên 70"><img--}}
    {{--                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="--}}
    {{--                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/dua-vao-rut-tham-nam-thang-o-thap-nien-70-1727294231.jpg"--}}
    {{--                                            alt="Dựa Vào Rút Thăm Nằm Thắng Ở Thập Niên 70" /><span--}}
    {{--                                            class="lb-item">Dịch/Edit</span><span class="overBox"><i class="fa fa-star"></i>--}}
    {{--                                            7.33/10</a></div><strong class="title"><a--}}
    {{--                                        href="truyen/dua-vao-rut-tham-nam-thang-o-thap-nien-70/index.html"--}}
    {{--                                        title="Dựa Vào Rút Thăm Nằm Thắng Ở Thập Niên 70">Dựa Vào Rút Thăm Nằm Thắng Ở Thập--}}
    {{--                                        Niên 70</a></strong>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="slider-item">--}}
    {{--                            <div class="premiumItem">--}}
    {{--                                <div class="img"><a--}}
    {{--                                        href="truyen/thap-nien-70-xuyen-thanh-co-em-gai-dung-cam-cua-dai-lao/index.html"--}}
    {{--                                        title="Thập Niên 70: Xuyên Thành Cô Em Gái Dũng Cảm Của Đại Lão"><img--}}
    {{--                                            src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="--}}
    {{--                                            data-src="https://truyenhdt.com/wp-content/uploads/2023/05/thap-nien-70-xuyen-thanh-co-em-gai-dung-cam-cua-dai-lao-1684534314.jpg"--}}
    {{--                                            alt="Thập Niên 70: Xuyên Thành Cô Em Gái Dũng Cảm Của Đại Lão" /><span--}}
    {{--                                            class="lb-item">Dịch/Edit</span><span class="overBox"><i class="fa fa-star"></i>--}}
    {{--                                            8.64/10</a></div><strong class="title"><a--}}
    {{--                                        href="truyen/thap-nien-70-xuyen-thanh-co-em-gai-dung-cam-cua-dai-lao/index.html"--}}
    {{--                                        title="Thập Niên 70: Xuyên Thành Cô Em Gái Dũng Cảm Của Đại Lão">Thập Niên 70: Xuyên--}}
    {{--                                        Thành Cô Em Gái Dũng Cảm Của Đại Lão</a></strong>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="col-xs-12 col-md-3">--}}
    {{--                    <div id="decu">--}}
    {{--                        <div class="row row-heading">--}}
    {{--                            <div class="col-xs-7">--}}
    {{--                                <h2 class="heading crop-text"><i class="fa fa-fire" aria-hidden="true"></i> Đề Cử Tháng</h2>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-xs-5">--}}
    {{--                                <div class="pull-right">--}}
    {{--                                    <div class="form-group"> <select id="ajax-topdanhvong" name="newest-category"--}}
    {{--                                            class="form-control">--}}
    {{--                                            <option value="all">Tất Cả</option>--}}
    {{--                                            <option value="bach-hop">Bách Hợp <i class="fa fa-venus-double c-d-d"--}}
    {{--                                                    aria-hidden="true"></i></option>--}}
    {{--                                            <option value="can-dai">Cận Đại</option>--}}
    {{--                                            <option value="co-dai">Cổ Đại</option>--}}
    {{--                                            <option value="di-gioi">Dị Giới</option>--}}
    {{--                                            <option value="di-nang">Dị Năng</option>--}}
    {{--                                            <option value="huyen-huyen">Huyền Huyễn <i class="fa fa-magic c-d-d"--}}
    {{--                                                    aria-hidden="true"></i></option>--}}
    {{--                                            <option value="hai-huoc">Hài Hước</option>--}}
    {{--                                            <option value="hac-bang">Hắc Bang</option>--}}
    {{--                                            <option value="he-thong">Hệ Thống <i class="fa fa-universal-access c-d-d"--}}
    {{--                                                    aria-hidden="true"></i></option>--}}
    {{--                                            <option value="khoa-huyen">Khoa Huyễn <i class="fa fa-space-shuttle c-d-d"--}}
    {{--                                                    aria-hidden="true"></i></option>--}}
    {{--                                            <option value="kiem-hiep">Kiếm Hiệp</option>--}}
    {{--                                            <option value="ky-huyen">Kỳ Huyễn</option>--}}
    {{--                                            <option value="linh-di">Linh Dị</option>--}}
    {{--                                            <option value="mat-the">Mạt Thế</option>--}}
    {{--                                            <option value="ngon-tinh">Ngôn Tình <i class="fa fa-heartbeat c-d-d"--}}
    {{--                                                    aria-hidden="true"></i></option>--}}
    {{--                                            <option value="nguoc">Ngược</option>--}}
    {{--                                            <option value="nu-cuong">Nữ Cường</option>--}}
    {{--                                            <option value="nu-phu">Nữ Phụ</option>--}}
    {{--                                            <option value="phuong-tay">Phương Tây</option>--}}
    {{--                                            <option value="quan-nhan">Quân Nhân</option>--}}
    {{--                                            <option value="showbiz">Showbiz</option>--}}
    {{--                                            <option value="sung">Sủng <i class="fa fa-heartbeat c-d-d"--}}
    {{--                                                    aria-hidden="true"></i></option>--}}
    {{--                                            <option value="tien-hiep">Tiên Hiệp</option>--}}
    {{--                                            <option value="trinh-tham">Trinh Thám</option>--}}
    {{--                                            <option value="teen">Truyện Teen <i class="fa fa-child c-d-d"--}}
    {{--                                                    aria-hidden="true"></i></option>--}}
    {{--                                            <option value="trong-sinh">Trọng Sinh</option>--}}
    {{--                                            <option value="tuong-lai">Tương Lai</option>--}}
    {{--                                            <option value="tong-tai">Tổng Tài</option>--}}
    {{--                                            <option value="vong-du">Võng Du <i class="fa fa-gamepad c-d-d"--}}
    {{--                                                    aria-hidden="true"></i></option>--}}
    {{--                                            <option value="vuon-truong">Vườn Trường</option>--}}
    {{--                                            <option value="xuyen-khong">Xuyên Không <i class="fa fa-history c-d-d"--}}
    {{--                                                    aria-hidden="true"></i></option>--}}
    {{--                                            <option value="xuyen-nhanh">Xuyên Nhanh</option>--}}
    {{--                                            <option value="dam-my">Đam Mỹ <i class="fa fa-mars-double c-d-d"--}}
    {{--                                                    aria-hidden="true"></i></option>--}}
    {{--                                            <option value="dien-van">Điền Văn</option>--}}
    {{--                                            <option value="do-thi">Đô Thị</option>--}}
    {{--                                            <option value="dong-nhan">Đồng Nhân <i class="fa fa-bullseye c-d-d"--}}
    {{--                                                    aria-hidden="true"></i></option>--}}
    {{--                                        </select> </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div id="ajax-topdanhvong-show" class="ztop-5">--}}
    {{--                            <ul class="top-3-vinhdanh">--}}
    {{--                                <li>--}}
    {{--                                    <div class="vinhdanhtop"><a class="img"--}}
    {{--                                            href="truyen/nguoi-choi-binh-thuong-x-de-tu-thien-tai/index.html"--}}
    {{--                                            title="NPC Đừng Sợ, Tôi Là Người Tốt"><img--}}
    {{--                                                src="{{ asset('assets/client/uploads/2024/10/nguoi-choi-binh-thuong-x-de-tu-thien-tai-1728001681.jpg') }}"--}}
    {{--                                                alt="NPC Đừng Sợ, Tôi Là Người Tốt"><span class="khung-vien-rank"></span>--}}
    {{--                                            <div class="overBox crop-text-2">NPC Đừng Sợ, Tôi Là Người Tốt</div>--}}
    {{--                                        </a>--}}
    {{--                                        <div class="info text-center"><span class="rank-tag">TOP 1</span></div>--}}
    {{--                                    </div>--}}
    {{--                                </li>--}}
    {{--                                <li>--}}
    {{--                                    <div class="vinhdanhtop"><a class="img"--}}
    {{--                                            href="truyen/thien-kim-gia-hong-drama-bi-dam-phao-hoi-nghe-tieng-long/index.html"--}}
    {{--                                            title="Thiên Kim Giả Hóng Drama Bị Đám Pháo Hôi Nghe Tiếng Lòng"><img--}}
    {{--                                                src="{{ asset('assets/client/uploads/2024/07/thien-kim-gia-hong-drama-bi-dam-phao-hoi-nghe-tieng-long-1720458430.jpg') }}"--}}
    {{--                                                alt="Thiên Kim Giả Hóng Drama Bị Đám Pháo Hôi Nghe Tiếng Lòng"><span--}}
    {{--                                                class="khung-vien-rank"></span>--}}
    {{--                                            <div class="overBox crop-text-2">Thiên Kim Giả Hóng Drama Bị Đám Pháo Hôi Nghe--}}
    {{--                                                Tiếng Lòng</div>--}}
    {{--                                        </a>--}}
    {{--                                        <div class="info text-center"><span class="rank-tag">TOP 2</span></div>--}}
    {{--                                    </div>--}}
    {{--                                </li>--}}
    {{--                                <li>--}}
    {{--                                    <div class="vinhdanhtop"><a class="img"--}}
    {{--                                            href="truyen/nghe-len-tieng-long-ai-nu-bi-ghet-bo-duoc-sung-ai/index.html"--}}
    {{--                                            title="Nghe Lén Tiếng Lòng Ái Nữ Bị Ghét Bỏ Được Sủng Ái"><img--}}
    {{--                                                src="{{ asset('assets/client/uploads/2024/06/nghe-len-tieng-long-ai-nu-bi-ghet-bo-duoc-sung-ai-1719186291.jpg') }}"--}}
    {{--                                                alt="Nghe Lén Tiếng Lòng Ái Nữ Bị Ghét Bỏ Được Sủng Ái"><span--}}
    {{--                                                class="khung-vien-rank"></span>--}}
    {{--                                            <div class="overBox crop-text-2">Nghe Lén Tiếng Lòng Ái Nữ Bị Ghét Bỏ Được Sủng--}}
    {{--                                                Ái</div>--}}
    {{--                                        </a>--}}
    {{--                                        <div class="info text-center"><span class="rank-tag">TOP 3</span></div>--}}
    {{--                                    </div>--}}
    {{--                                </li>--}}
    {{--                            </ul>--}}
    {{--                            <ul class="star-rank-list">--}}
    {{--                                <li>--}}
    {{--                                    <div class="zxt1"><i class="fa fa-star fa-2x" aria-hidden="true"></i><span--}}
    {{--                                            class="zxt2">4</span></div><span class="crop-text-1"><a--}}
    {{--                                            href="truyen/sau-khi-bi-nghe-thay-tieng-long-nguoi-qua-duong-giap-bong-phat-nhanh/index.html"--}}
    {{--                                            title="Sau Khi Bị Nghe Thấy Tiếng Lòng, Người Qua Đường Giáp Bỗng Phất Nhanh">Sau--}}
    {{--                                            Khi Bị Nghe Thấy Tiếng Lòng, Người Qua Đường Giáp Bỗng Phất Nhanh</a></span>--}}
    {{--                                </li>--}}
    {{--                                <li>--}}
    {{--                                    <div class="zxt1"><i class="fa fa-star fa-2x" aria-hidden="true"></i><span--}}
    {{--                                            class="zxt2">5</span></div><span class="crop-text-1"><a--}}
    {{--                                            href="truyen/ban-ngay-bi-huy-hon-ban-dem-bi-chi-huy-vua-dang-yeu-vua-hung-du-doi-om/index.html"--}}
    {{--                                            title="Vợ Yêu Bỏ Trốn Của Sĩ Quan Đại Nhân">Vợ Yêu Bỏ Trốn Của Sĩ Quan Đại--}}
    {{--                                            Nhân</a></span>--}}
    {{--                                </li>--}}
    {{--                                <li>--}}
    {{--                                    <div class="zxt1"><i class="fa fa-star fa-2x" aria-hidden="true"></i><span--}}
    {{--                                            class="zxt2">6</span></div><span class="crop-text-1"><a--}}
    {{--                                            href="truyen/tiem-an-tu-ky-my-thuc/index.html"--}}
    {{--                                            title="Tiệm Ăn Từ Ký [Mỹ Thực]">Tiệm Ăn Từ Ký [Mỹ Thực]</a></span>--}}
    {{--                                </li>--}}
    {{--                            </ul>--}}
    {{--                        </div>--}}
    {{--                        <div id="ajax-topdanhvong-show2"> </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div> --}}
    <div class="container ztop-10">
        <h2 class="mt-2 ms-4 heading" style="font-weight: bold; font-size: 32px">Sách Mới Cập Nhật</h2>
        <hr style="margin:0 3px 0 3px">
        <div class="book-container">
            @foreach ($newBooks as $item)
                <div class="book">
                    <a href="{{ route('chi-tiet') }}">
                        <img src="{{ Storage::url($item->anh_bia_sach) }}" alt="Cover Image">
                        <div class="price-tag">
                            {{ number_format(!empty($item->gia_khuyen_mai) ? $item->gia_khuyen_mai : $item->gia_goc, 0, ',', '.') }}
                            ₫
                        </div>

                        <div class="book-info">
                            <h4 class="book-title">{{ $item->ten_sach }}
                                @if($item->tinh_trang_cap_nhat === 'da_full')
                                    <span class="" style="border: 1px solid #39dfaa; padding: 0px 5px 0px 5px; color: #39dfaa">Full</span>
                                    <span class="" style="border: 1px solid ; padding: 0px 5px 0px 5px; color: #1ebbf0">New</span>
                                @else
                                    <span class="text-warning" style="border: 1px solid #ffc107; padding: 0px 5px 0px 5px">Đang ra</span>
                                    <span class="" style="border: 1px solid ; padding: 0px 5px 0px 5px; color: #1ebbf0">New</span>
                                @endif
                            </h4>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <h2 class="mt-2 ms-4 heading" style="font-weight: bold;font-size: 32px">Sách Hot</h2>
        <hr style="margin:0 3px 0 3px">
        <div class="container top-layout" id="home-layout-add">
            <div class="row">
                <div class="col-xs-12 col-md-12 ">
                    <div class="row ztop-5">
                        <div class="col-xs-10">
                            <div id="docquyen">
                                <div class="docquyen-item"><img
                                        src="{{ asset('assets/client/uploads/2024/09/au-te-manh-oa-o-tinh-te-lam-doan-sung-1725664021.jpg') }}"/>
                                </div>
                                <div class="docquyen-item"><img
                                        src="{{ asset('assets/client/uploads/2024/10/xe-can-cu-cua-toi-trong-mat-the-1728297403.jpg') }}"/>
                                </div>
                                <div class="docquyen-item"><img
                                        src="{{ asset('assets/client/uploads/2024/08/11501574.jpg') }}"/></div>
                                <div class="docquyen-item"><img
                                        src="{{ asset('assets/client/uploads/2024/09/11646211.jpg') }}"/></div>
                                <div class="docquyen-item"><img
                                        src="{{ asset('assets/client/uploads/2023/12/xuyen-thanh-thai-tu-phi-bi-luu-day-1702997084.jpg') }}"/>
                                </div>
                                <div class="docquyen-item"><img
                                        src="{{ asset('assets/client/uploads/2024/09/11624124.jpg') }}"/></div>
                                <div class="docquyen-item"><img
                                        src="{{ asset('assets/client/uploads/2023/07/9473346.jpg') }}"/></div>
                            </div>
                        </div>
                        <div class="col-xs-4" style=" right: 0px; position: absolute;">
                            <div class="docquyen-content docquyen-content-0 "><a
                                    href="truyen/au-te-manh-oa-o-tinh-te-lam-doan-sung/index.html"> <span
                                        class="docquyen-title crop-text-1">Bé Con Xuyên Tới Tinh Tế Làm Thần Thú</span>
                                </a>
                                <div class="docquyen-excerpt ztop-10">Ở thời đại tinh tế, La Dương xuyên qua trở thành
                                    một
                                    con ma thú vô cùng đáng yêu, chỉ có thể dựa vào lương thực cứu tế mà …
                                </div>
                                <div class="ztop-15"></div>
                                <a href="truyen/au-te-manh-oa-o-tinh-te-lam-doan-sung/index.html">
                                    <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                            </div>
                            <div class="docquyen-content docquyen-content-1 hidden"><a
                                    href="truyen/xe-can-cu-cua-toi-trong-mat-the/index.html"> <span
                                        class="docquyen-title crop-text-1">Xe Căn Cứ Của Tôi Trong Mạt Thế</span> </a>
                                <div class="docquyen-excerpt ztop-10">Khi tận thế đang đến gần, Giang Lưu Thạch bất ngờ
                                    nhận
                                    được một công nghệ đen có thể nâng cấp và cải tiến các phương tiện giao thông. …
                                </div>
                                <div class="ztop-15"></div>
                                <a href="truyen/xe-can-cu-cua-toi-trong-mat-the/index.html">
                                    <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                            </div>
                            <div class="docquyen-content docquyen-content-2 hidden"><a
                                    href="truyen/chet-roi-cung-khong-tha-cho-em/index.html"> <span
                                        class="docquyen-title crop-text-1">Chết Rồi Cũng Không Tha Cho Em</span> </a>
                                <div class="docquyen-excerpt ztop-10">Năm 18 tuổi, vì thể chất đặc biệt, cậu đã nhận
                                    nhầm
                                    một hồn ma là ba mình dưới sự thao túng kỳ lạ của ông nội.Ma quái, thật …
                                </div>
                                <div class="ztop-15"></div>
                                <a href="truyen/chet-roi-cung-khong-tha-cho-em/index.html">
                                    <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                            </div>
                            <div class="docquyen-content docquyen-content-3 hidden"><a
                                    href="truyen/dau-bep-lam-tinh-chinh-phuc-tinh-te/index.html"> <span
                                        class="docquyen-title crop-text-1">Đầu Bếp Lam Tinh, Chinh Phục Tinh Tế</span>
                                </a>
                                <div class="docquyen-excerpt ztop-10">Bếp trưởng nổi danh Lam Tinh, Úc Trục Nhan, sau
                                    một
                                    tai nạn máy bay bất ngờ xuyên vào một cuốn tiểu thuyết máu chó giữa thế giới tinh …
                                </div>
                                <div class="ztop-15"></div>
                                <a href="truyen/dau-bep-lam-tinh-chinh-phuc-tinh-te/index.html">
                                    <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                            </div>
                            <div class="docquyen-content docquyen-content-4 hidden"><a
                                    href="truyen/xuyen-thanh-thai-tu-phi-bi-luu-day/index.html"> <span
                                        class="docquyen-title crop-text-1">Xuyên Thành Thái Tử Phi Bị Lưu Đày</span>
                                </a>
                                <div class="docquyen-excerpt ztop-10">Editor: CyndaquilGiới thiệu:Sau khi tỉnh dậy sau
                                    một
                                    tai nạn, Chu Sơ Ninh xuyên qua thành con vợ lẽ, nam giả nữ thay chị gái con dòng
                                    chính
                                    đi …
                                </div>
                                <div class="ztop-15"></div>
                                <a href="truyen/xuyen-thanh-thai-tu-phi-bi-luu-day/index.html">
                                    <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                            </div>
                            <div class="docquyen-content docquyen-content-5 hidden"><a
                                    href="truyen/trong-sinh-mat-the-tro-thanh-be-yeu-cua-dai-lao-tan-ac/index.html"> <span
                                        class="docquyen-title crop-text-1">Trọng Sinh Mạt Thế: Trở Thành Bé Yêu Của Đại Lão
                                        Tàn Ác</span> </a>
                                <div class="docquyen-excerpt ztop-10">Lục Dao thức tỉnh vào một tuần trước khi mạt thế
                                    buông
                                    xuống, biết được mình là nữ phụ vì đưa không gian tùy thân cho em gái mà …
                                </div>
                                <div class="ztop-15"></div>
                                <a
                                    href="truyen/trong-sinh-mat-the-tro-thanh-be-yeu-cua-dai-lao-tan-ac/index.html"> <span
                                        class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                            </div>
                            <div class="docquyen-content docquyen-content-6 hidden"><a
                                    href="truyen/xuyen-sach-lam-de-nhat-nu-nha-dich/index.html"> <span
                                        class="docquyen-title crop-text-1">Xuyên Sách Làm Đệ Nhất Nữ Nha Dịch</span>
                                </a>
                                <div class="docquyen-excerpt ztop-10">Giới thiệu nội dungNàng tình cờ xuyên vào trong
                                    sách,
                                    phát hiện cha mẹ của nguyên chủ trong sách đều bị giết, cả nhà bị chu di tam tộc. …
                                </div>
                                <div class="ztop-15"></div>
                                <a href="truyen/xuyen-sach-lam-de-nhat-nu-nha-dich/index.html">
                                    <span class="btn btn-primary border-radius">Đọc Truyện</span> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <style type="text/css">
                    .d-event-title {
                        font-size: 17px;
                        font-weight: bold;
                    }

                    hr.docquyen-hr {
                        margin-top: 7px;
                        margin-bottom: 10px;
                    }

                    #docquyen {
                        left: -75px;
                        margin-top: 15px;
                        min-height: 136px;
                    }

                    @media (min-width: 1200px) {
                        #docquyen {
                            left: -90px;
                        }
                    }

                    #docquyen img {
                        width: 100%;
                        border-width: 4px;
                        border-style: solid;
                        border-image: linear-gradient(#1ebbf0, #39dfaa) 30;
                    }

                    .docquyen-title {
                        font-size: 18px;
                        font-weight: 600;
                    }

                    .docquyen-excerpt {
                        height: 102px;
                        font-size: 16px;
                        overflow: hidden;
                        display: -webkit-box;
                        -webkit-box-orient: vertical;
                        -webkit-line-clamp: 4;
                    }

                    #docquyen div[aria-hidden="true"] {
                        transform: translate(-5%, 0) scale(.01);
                    }

                    #docquyen .slick-current + div {
                        transform: translate(-25%, 0) scale(.8);
                        position: relative;
                        z-index: 5;
                    }

                    #docquyen .slick-current + div + div {
                        transform: translate(-80%, 0) scale(.6);
                    }

                    #docquyen .slick-current {
                        transform: translate(0%, 0) scale(1);
                        position: relative;
                        z-index: 10;
                    }

                    #docquyen .slick-index-pre1 {
                        transform: translate(25%, 0) scale(.8);
                    }

                    #docquyen .slick-index-pre2 {
                        transform: translate(80%, 0) scale(.6);
                    }
                </style>
            </div>
        </div>
    </div>
    <style type="text/css">
        .book-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 20px;
            margin: auto;
        }

        .book {
            width: calc(100% / 6 - 10px);
            /* Chia tổng số sách trên mỗi hàng và trừ đi khoảng cách giữa các sách */
            margin-bottom: 20px;
            /* Khoảng cách giữa các hàng */
            transition: transform 0.3s ease-in-out;
            align-items: center;
            text-align: center;
            position: relative;
        }

        .book:hover {
            transform: translateY(-5px);
        }


        .price-tag {
            position: absolute;
            top: 0;
            /* Vẫn giữ ở đầu trên cùng */
            right: 0;
            /* Thay đổi từ left sang right */
            background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
            /* Màu nền hồng nhạt */
            color: white;
            /* Màu chữ trắng */
            padding: 5px 10px;
            /* Đệm cho khối giá */
            border-radius: 0 10px 0 10px;
            /* Bo góc dưới bên trái */
            font-size: 13px;
            /* Kích thước font */
            font-weight: bold;
            /* In đậm chữ */
        }


        .book img {
            display: block;
            width: 100%;
            height: auto;
            /* Điều chỉnh lại các thuộc tính của ảnh */
            border-radius: 10px;

        }

        .book-info {
            padding: 10px;
            text-align: center;
        }

        .book-title {
            font-size: 14px;
            color: #333;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            /* Hiển thị dấu "..." nếu tiêu đề quá dài */
        }

        .book-price {
            font-size: 14px;
            color: #666;
        }

        @media (max-width: 768px) {
            .book {
                width: calc(100% / 3 - 10px);
                /* Cho màn hình nhỏ hơn, hiển thị 3 sách mỗi hàng */
            }
        }

        @media (max-width: 480px) {
            .book {
                width: calc(100% / 2 - 10px);
                /* Cho màn hình rất nhỏ, hiển thị 2 sách mỗi hàng */
            }
        }
    </style>
    <style>
        .comic-card {
            margin-top: 20px;
        }

        .comic-image {
            width: 100%;
            height: auto;
        }

        .comic-title {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .comic-details {
            font-size: 14px;
            color: #666;
        }

        .comic-stats {
            font-size: 12px;
            color: #999;
        }
    </style>
    <div class="container ztop-10">
        <h2 class="mt-2 ms-4 heading" style="font-weight: bold; font-size: 32px">Sách Đã Hoàn Thành</h2>
        <hr style="margin:0 3px 0 3px">
        <div class="book-container">
            @foreach ($fulledBooks as $item)
                <div class="book">
                    <a href="{{ route('chi-tiet') }}">
                        <img src="{{ Storage::url($item->anh_bia_sach) }}" alt="Cover Image">
                        <div class="price-tag">
                            {{ number_format(!empty($item->gia_khuyen_mai) ? $item->gia_khuyen_mai : $item->gia_goc, 0, ',', '.') }}
                            ₫
                        </div>

                        <div class="book-info">
                            <h4 class="book-title">{{ $item->ten_sach }}
                                @if($item->tinh_trang_cap_nhat === 'da_full')
                                    <span class="" style="border: 1px solid #39dfaa; padding: 0px 5px 0px 5px; color: #39dfaa">Full</span>
                                @else
                                    <span class="text-warning" style="border: 1px solid #ffc107; padding: 0px 5px 0px 5px">Đang ra</span>
                                @endif
                            </h4>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container">
        <div class="panel panel-default comic-card">
            <div class="panel-body">
                <h2 class="ms-2 mt-2 ms-4 heading" style="font-weight: bold;font-size: 32px">Tác Giả Hot</h2>
                <div class="list-user-parent text-center d-flex justify-content-center">
                    <div class="list-user">
                        <div class="item-user" title="Tác giả 1">
                            <div class="u-avatar">
                                <a href="../../author/juldoct578/index.html">
                                    <img src="{{ asset('assets/client/img/banner2.jpg') }}" class="avatar-img"/>
                                </a>
                            </div>
                            <div>
                                <div>
                                    <a class="" href="../../author/juldoct578/index.html">Tác giả 1</a>
                                </div>
                                <span class="badge badge-success">Đang có 99+ sách</span>
                            </div>
                        </div>
                        <!-- You can add more item-user divs here -->
                    </div>
                    <div class="list-user">
                        <div class="item-user" title="Tác giả 1">
                            <div class="u-avatar">
                                <a href="../../author/juldoct578/index.html">
                                    <img src="{{ asset('assets/client/img/banner2.jpg') }}" class="avatar-img"/>
                                </a>
                            </div>
                            <div>
                                <div>
                                    <a class="" href="../../author/juldoct578/index.html">Tác giả 1</a>
                                </div>
                                <span class="badge badge-success">Đang có 99+ sách</span>
                            </div>
                        </div>
                        <!-- You can add more item-user divs here -->
                    </div>
                    <div class="list-user">
                        <div class="item-user" title="Tác giả 1">
                            <div class="u-avatar">
                                <a href="../../author/juldoct578/index.html">
                                    <img src="{{ asset('assets/client/img/banner2.jpg') }}" class="avatar-img"/>
                                </a>
                            </div>
                            <div>
                                <div>
                                    <a class="" href="../../author/juldoct578/index.html">Tác giả 1</a>
                                </div>
                                <span class="badge badge-success">Đang có 99+ sách</span>
                            </div>
                        </div>
                        <!-- You can add more item-user divs here -->
                    </div>
                    <div class="list-user">
                        <div class="item-user" title="Tác giả 1">
                            <div class="u-avatar">
                                <a href="../../author/juldoct578/index.html">
                                    <img src="{{ asset('assets/client/img/banner2.jpg') }}" class="avatar-img"/>
                                </a>
                            </div>
                            <div>
                                <div>
                                    <a class="" href="../../author/juldoct578/index.html">Tác giả 1</a>
                                </div>
                                <span class="badge badge-success">Đang có 99+ sách</span>
                            </div>
                        </div>
                        <!-- You can add more item-user divs here -->
                    </div>
                    <div class="list-user">
                        <div class="item-user" title="Tác giả 1">
                            <div class="u-avatar">
                                <a href="../../author/juldoct578/index.html">
                                    <img src="{{ asset('assets/client/img/banner2.jpg') }}" class="avatar-img"/>
                                </a>
                            </div>
                            <div>
                                <div>
                                    <a class="" href="../../author/juldoct578/index.html">Tác giả 1</a>
                                </div>
                                <span class="badge badge-success">Đang có 99+ sách</span>
                            </div>
                        </div>
                        <!-- You can add more item-user divs here -->
                    </div>
                    <div class="list-user">
                        <div class="item-user" title="Tác giả 1">
                            <div class="u-avatar">
                                <a href="../../author/juldoct578/index.html">
                                    <img src="{{ asset('assets/client/img/banner2.jpg') }}" class="avatar-img"/>
                                </a>
                            </div>
                            <div>
                                <div>
                                    <a class="" href="../../author/juldoct578/index.html">Tác giả 1</a>
                                </div>
                                <span class="badge badge-success">Đang có 99+ sách</span>
                            </div>
                        </div>
                        <!-- You can add more item-user divs here -->
                    </div>
                    <div class="list-user">
                        <div class="item-user" title="Tác giả 1">
                            <div class="u-avatar">
                                <a href="../../author/juldoct578/index.html">
                                    <img src="{{ asset('assets/client/img/banner2.jpg') }}" class="avatar-img"/>
                                </a>
                            </div>
                            <div>
                                <div>
                                    <a class="" href="../../author/juldoct578/index.html">Tác giả 1</a>
                                </div>
                                <span class="badge badge-success">Đang có 99+ sách</span>
                            </div>
                        </div>
                        <!-- You can add more item-user divs here -->
                    </div>
                    <div class="list-user">
                        <div class="item-user" title="Tác giả 1">
                            <div class="u-avatar">
                                <a href="../../author/juldoct578/index.html">
                                    <img src="{{ asset('assets/client/img/banner2.jpg') }}" class="avatar-img"/>
                                </a>
                            </div>
                            <div>
                                <div>
                                    <a class="" href="../../author/juldoct578/index.html">Tác giả 1</a>
                                </div>
                                <span class="badge badge-success">Đang có 99+ sách</span>
                            </div>
                        </div>
                        <!-- You can add more item-user divs here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .list-user {
            display: flex; /* Use flexbox to arrange items */
            justify-content: center; /* Center child items */
            overflow-x: auto; /* Allow horizontal scrolling if necessary */
            padding: 15px 10px; /* Add padding */
            margin: 0; /* Remove default margin */
            white-space: nowrap; /* Prevent line breaks */
            position: relative; /* For potential absolute positioning of children */
        }

        .item-user {
            display: inline-block; /* Allows item-user to behave like a block */
            margin-right: 20px; /* Spacing between items */
            text-align: center; /* Center content within each item */
        }

        .u-avatar {
            margin-bottom: 5px; /* Space between avatar and text */
        }

        .u-avatar img {
            width: 200px; /* Set image width */
            height: 200px; /* Set image height */
            border-radius: 50%; /* Make image circular */
            display: block; /* Ensures image doesn't have inline spacing */
            margin: 0 auto; /* Center the image */
        }

        @media (min-width: 992px) {
            .item-user {
                margin-right: 30px; /* Increased space for larger screens */
            }

            .u-avatar img {
                width: 150px; /* Reduced size for larger screens */
                height: 150px; /* Maintain aspect ratio */
            }
            /* Optional: Adjust margin on last item to avoid extra spacing */
            .item-user:last-child {
                margin-right: 0;
            }
        }
    </style>
    <div class="container ">
        <div class="row">
            <div class="col-xs-12 col-md-12 ">
                <div class="bg-customer">
                    <h2 class="text-success me-5" style="font-size: 40px">TRỞ THÀNH CỘNG TÁC VIÊN TẠI MESACH247 NGAY THÔI!
                    </h2>
                    <div>
                        <button type="submit" class="btn btn-lg btn-primary">Đăng Ký Cộng Tác Viên</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .bg-customer {
            background-image: url('{{ asset('assets/client/img/banner2.jpg') }}'); /* Đường dẫn tới hình ảnh */
            background-size: cover; /* Đảm bảo hình ảnh bao phủ toàn bộ màn hình */
            background-repeat: no-repeat; /* Ngăn không cho hình ảnh lặp lại */
            background-attachment: fixed; /* Cố định hình ảnh nền */
            background-position: center; /* Đặt vị trí hình ảnh ở giữa */
            height: 150px;
            width: 100%;
            border-radius: 12px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 18px;
        }
    </style>
    <div class="container ztop-10">
        <h2 class="mt-2 ms-4 heading" style="font-weight: bold; font-size: 32px">Sách Đề Cử Tháng</h2>
        <hr style="margin:0 3px 0 3px">
        <div class="book-container">
            @foreach ($newBooks as $item)
                <div class="book">
                    <a href="{{ route('chi-tiet') }}">
                        <img src="{{ Storage::url($item->anh_bia_sach) }}" alt="Cover Image">
                        <div class="price-tag">
                            {{ number_format(!empty($item->gia_khuyen_mai) ? $item->gia_khuyen_mai : $item->gia_goc, 0, ',', '.') }}
                            ₫
                        </div>

                        <div class="book-info">
                            <h4 class="book-title">{{ $item->ten_sach }}
                                @if($item->tinh_trang_cap_nhat === 'da_full')
                                    <span class="" style="border: 1px solid #39dfaa; padding: 0px 5px 0px 5px; color: #39dfaa">Full</span>
                                @else
                                    <span class="text-warning" style="border: 1px solid #ffc107; padding: 0px 5px 0px 5px">Đang ra</span>
                                @endif
                            </h4>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="slider-footer d-flex">
            @foreach ($sliderFooter->hinhAnhBanner as $item)
                <div class="sliderbanner-item">
                    <a href="#" target="_blank">
                        <img src="{{ Storage::url($item->hinh_anh) }}" alt="Banner Image" class="slider-banner-image"/>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
<style>
    .slider-footer {
        display: flex;
        justify-content: space-between; /* Dàn đều các mục */
        align-items: center;
        flex-wrap: nowrap; /* Không cho phép xuống dòng */
        overflow: hidden; /* Ẩn phần vượt quá kích thước khung chứa */
    }

    .sliderbanner-item {
        flex: 1; /* Đảm bảo các item có kích thước ngang bằng */
        text-align: center;
        margin: 0 10px; /* Khoảng cách giữa các item */
    }

    .slider-banner-image {
        width: 200px; /* Kích thước chiều rộng cố định */
        height: 120px; /* Kích thước chiều cao cố định */
        object-fit: cover; /* Thuộc tính cover để giữ tỷ lệ và cắt ảnh nếu cần */
    }


</style>

@endsection
