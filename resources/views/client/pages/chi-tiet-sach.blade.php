@extends('client.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/client/themes/truyenfull/echo/css/truyenf384.css?v100063') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/themes/truyenfull/echo/css/customer-chi-tiet-sach.css') }}">
    <link rel="stylesheet"
          href="{{ asset('assets/client/themes/truyenfull/echo/css/bootstrap/only-popupf384.css?v100063')  }}">

@endpush
@section('content')
    <div class="container" id="truyen_tabs">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container container-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../index.html"><span class="fa fa-home"></span> Home</a></li>
            <li class="breadcrumb-item"><a href="../../keyword/dam-my/index.html">Danh sách</a></li>
            <li class="breadcrumb-item"><a href="index.html">{{ $sach->ten_sach }}</a></li>
        </ol>
    </div>
    <div class="container cpt truyen">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-9">
                <div class="row">
                    <h1 class="crop-text-1">{{ $sach->ten_sach }}</h1>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <div class="book3dcenter">
                            <div class="book3d"><img src="{{ Storage::url($sach->anh_bia_sach) }}"
                                                     alt="{{ $sach->ten_sach }}"/></div>
                            <div class="text-center" id="truyen_button"> <span id="button_reading"> <a
                                        href="chap/10838849-chuong-1/index.html"
                                        class="btn btn-md color-white btn-primary"><i class="fa fa-play-circle"
                                                                                      aria-hidden="true"></i> Đọc Sách</a> </span>
                                <span id="button_follow"><a
                                        href="../../user/quan-ly-truyen/bookmark/index0f07.html?id=10838849#h2"> <span
                                            class="btn btn-md color-primary border-primary"><i
                                                class="fa fa-bell color-primary" aria-hidden="true"></i> <span
                                                class="hidden-xs hidden-sm hidden-md hidden-lg">Theo dõi</span>
                                            (168)</span> </a></span> <span id="clickapp" class="hidden"> <span
                                        class="btn btn-md color-white btn-primary"> <i class="fa fa-lg fa-mobile"
                                                                                       aria-hidden="true"></i> Đọc trên app </span> </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
                        <div id="rate">
                            <div class="rating" data-block>
                                @for ($i = 5; $i >= 1; $i--)
                                    @php
                                        $starClass = '';
                                        if ($trungBinhHaiLong >= $i) {
                                            $starClass = 'active';
                                        } elseif ($trungBinhHaiLong >= $i - 0.5) {
                                            $starClass = 'half_active';
                                        }
                                    @endphp
                                    <div class="{{ $starClass }}" data-ratingvalue="{{ $i }}"
                                         data-ratingtext="{{ $i == 5 ? 'Rất hay!' : ($i == 4 ? 'Hay' : ($i == 3 ? 'Trung bình' : ($i == 2 ? 'Tệ' : 'Rất tệ'))) }}"></div>
                                @endfor
                            </div>
                            <div class="rate-hover"></div>
                            <div class="rate-noti"></div>
                            <div class="rate-info">
                                <strong>{{ $trungBinhHaiLong }}</strong>/5 trên tổng số
                                <strong>{{ $soLuongDanhGia }}</strong> lượt đánh giá
                            </div>
                        </div>


                        <div id="thong_tin">
                            <table class="color-gray">
                                <tr>
                                    <td><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Tác Giả:</td>
                                    <th class="table-column2 crop-text-1"><i class="fa fa-user" aria-hidden="true"></i>
                                        <a href="../../tac-gia/tie%cc%89u-van-dan/index.html"
                                           rel="tag">{{ $sach->tac_gia }}</a>
                                    </th>
                                    <th rowspan="2" class="table-column3"><a
                                            href="../../user/quan-ly-truyen/ticket/index0f07.html?id=10838849#h2"> <span
                                                class="dlcc"><span><i class="fa fa-hand-o-right" aria-hidden="true"></i> Mua Ngay</span></span>
                                        </a></th>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Tình Trạng:</td>
                                    <th class="table-column2 crop-text-1"><i
                                            class="{{ $sach->tinh_trang_cap_nhat == 'da_full' ? 'fa fa-check' : 'fa fa-spin fa-circle-o-notch' }}"
                                            aria-hidden="true"></i>
                                        <span
                                            class="{{ $sach->tinh_trang_cap_nhat == 'da_full' ? 'text-success' : 'text-warning' }}">{{ $sach->tinh_trang_cap_nhat == 'da_full' ? 'Hoàn Thành' : 'Đang Cập Nhật' }}</span>
                                    </th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Giá:</td>
                                    <th class="table-column2 crop-text-1">
                                        <span class="text-danger">{{ $gia_sach }} VNĐ</span>
                                    </th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Số chương:</td>
                                    <th class="table-column2 crop-text-1">
                                        <span class="">{{ $sach->chuongs->count() }} chương</span>
                                    </th>
                                    <th></th>
                                </tr>
                            </table>
                            <div class="crop-text-1 keywords"> <span class="keyword"><a
                                        href="../../keyword/chu-thu/index.html"
                                        rel="tag">{{ $sach->theLoai->ten_the_loai }}</a></span>
                            </div>
                            <div class="excerpt ztop-10">
                                <div class="excerpt-collapse crop-text-5"> {{ $sach->tom_tat }}
                                </div>
                            </div>
                        </div>
                        <div id="views" data-date="1720310405"
                             data-title="Sau Khi Ôm Bụng Bỏ Chạy, Đại Mỹ Nhân Cùng Nhãi Con Đi Xin Cơm"
                             data-id="10838849"
                             data-slug="sau-khi-om-bung-bo-chay-dai-my-nhan-cung-nhai-con-di-xin-com">
                        </div>
                    </div>
                </div>
                <div id="ads-truyen-layout-1" class="text-center"></div>
                <div id="newchap">
                    <div class="explanation">
                        <ul class="listchap">
                            @foreach($chuongMoi as $item)
                                <li>
                                    <div class="col-xs-7 col-md-9 crop-text-1"><span class="list"><i
                                                class="fa fa-caret-right"
                                                aria-hidden="true"></i></span>
                                        <a href="chap/11710146-chuong-33/index.html" title="{{ $item->so_chuong }}">Chương {{ $item->so_chuong }}
                                            : {{ $item->tieu_de }}</a></div>
                                    <div class="col-xs-5 col-md-3"><span class="pull-right"> <span
                                                class="label-title label-new"></span> </span></div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div data-type="2">
                    <div id="dsc">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="heading"><i class="fa fa-list" aria-hidden="true"></i> Danh Sách Chương</h3>
                            </div>
                            <div>
                                <div class="pull-right">
                                    <a href="#truyen_tabs">
                                        <div class="uptop"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <ul class="listchap clearfix" id="chuongs">
                        </ul>
                        <div id="pagination" class="">
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-3">
                <div id="ads-truyen-layout-2" class="text-center"></div>
                <div class="list-user-parent text-center">
                    <div class="list-user">
                        <div class="item-user" title="{{ $sach->user->ten_doc_gia }}">
                            <div class="u-avatar"><a href="../../author/juldoct578/index.html"> <img
                                        src="{{ Storage::url($sach->user->hinh_anh) }}"
                                    /> </a>
                            </div>
                            <div class="u-user"><a
                                    href="../../author/juldoct578/index.html"> {{ $sach->user->ten_doc_gia }} </a> <span
                                    class="badge badge-success">{{ $sach->user->vai_tros->first()->ten_vai_tro }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="add-per font-12 add-request"><a
                            href="../../user/quan-ly-truyen/request/index0f07.html?id=10838849#h2">
                            <div class="btn-request"><i class="fa fa-user-plus" aria-hidden="true"></i> Xem trang cá
                                nhân
                            </div>
                        </a></div>
                </div>
                <div id="related">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <h2 class="heading"><i class="fa fa-book" aria-hidden="true"></i> Có Thể Bạn Thích</h2>
                        </div>
                        <div class="hidden-md hidden-lg">
                            <div class="pull-right"><a href="#truyen_tabs">
                                    <div class="uptop"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                                </a></div>
                        </div>
                    </div>
                    <div class="slider-container">
                        @foreach($sachCungTheLoai as $item)
                            <div class=" d-flex align-items-center mb-4">
                                <img style="width:50px; border-radius:10%"
                                     src="{{ Storage::url($item->anh_bia_sach) }}"
                                     alt="Ảnh"
                                     class="img-fluid rounded shadow"/>
                                <div class="content ms-3">
                                    <h5 class="text-primary">{{ $item->ten_sach }}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="row">
            <div class="hidden-md hidden-sm hidden-xs"></div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div id="comments">
                    <div class="d-flex justify-content-between">
                        <div><h3 class="heading"><i class="fa fa-star-o" aria-hidden="true"></i> Đánh giá (10)</h3>
                        </div>
                        <div>
                            <div class="pull-right"><a href="#truyen_tabs">
                                    <div class="uptop"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                                </a></div>
                        </div>
                    </div>
                    <ol class>
                        <li>
                            <div itemscope itemtype="http://schema.org/UserComments">
                                <div class="comment-author vcard">
                                    <div class="avatar_user_comment"><a href="../../author/1718205429/index.html"><img
                                                alt="user" src="../../img/user/1718205429-1727175730.jpg"
                                                class="avatar-32"></a>
                                        <div class="user_position"></div>
                                    </div>
                                    <div class="post-comments">
                                        <div><span class="fn" itemprop="creator" itemscope
                                                   itemtype="http://schema.org/Person"><span itemprop="name"><a
                                                        href="../../author/1718205429/index.html"><span
                                                            style="color:#000000">Vitaminee Trái Cây</span></a></span></span>
                                            <span class="ago"> (23 giờ trước) </span> <small class="pull-right"> <span
                                                    class="addcomment" data-id="2308247" data-name="Vitaminee Trái Cây"><i
                                                        class="fa fa-reply" aria-hidden="true"></i> Trả Lời</span>
                                            </small>
                                        </div>
                                        <div class="rating">
                                            <div class=" half_active" data-ratingvalue="10" data-ratingtext="Tuyệt đỉnh"></div>
                                            <div class="active " data-ratingvalue="9" data-ratingtext="Hay"></div>
                                            <div class="active " data-ratingvalue="8" data-ratingtext="Khá đấy"></div>
                                            <div class="active " data-ratingvalue="7" data-ratingtext="Cũng được"></div>
                                            <div class="active " data-ratingvalue="6" data-ratingtext="Được"></div>
                                        </div>
                                            <div class="commenttext" itemprop="commentText">
                                                <p>Truyện này bao nhiêu chương ạ</p>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ol>
                    <div class="flex-comment">
                        <span class="addcomment">
                            <span class="btn btn-primary font-12 font-oswald">
                                <i class="fa fa-plus" aria-hidden="true"></i> Đánh giá sách
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                        </span>
                        <span class="load_more_cmt" data-cpage="1">
                            <span class="btn-primary-border font-12 font-oswald">Xem Thêm Đánh giá→</span>
                        </span>
                    </div>
                    <div class="load_more_cmt_notify"></div>
                </div>
                <div class="modal fade respond" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Đánh giá</h4></div>
                            <div class="modal-body clearfix">
                                <div id="show_after_check_user"></div>
                                <div class="form-group form-group-ajax"><textarea class="form-control" name="comment"
                                                                                  id="comment_content" tabindex="4"
                                                                                  placeholder="Nhập đánh giá của bạn ở đây... *"></textarea>
                                </div>
                                <div class="form-group-ajax"><span id="user_comment"> <span
                                            class="btn btn-primary font-12"><i
                                                class="fa fa-upload" aria-hidden="true"></i> Gửi Nhận Xét</span> </span>
                                    <div id="show_user_comment"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade respond" id="myModal2" tabindex="-1" role="dialog"
                     aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Chú Ý</h4></div>
                            <div class="modal-body clearfix"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="show_pre_comment_ajax"></div>
                <div id="zdata" data-postname="abo-bia-do-dan-alpha-doan-menh-mot-long-lam-ca-man"
                     data-posttype="truyen"></div>
            </div>
            <div class="col-md-3 hidden-sm hidden-xs"></div>
        </div>
    </div>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../index.html"><span class="fa fa-home"></span> Home</a></li>
            <li class="breadcrumb-item"><a href="../../keyword/dam-my/index.html">Danh sách</a></li>
            <li class="breadcrumb-item"><a href="index.html">{{ $sach->ten_sach }}</a></li>
        </ol>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/client/emb.js') }}"></script>
    <script>
        $(document).ready(function () {
            let currentPage = 1;
            const sachId = {{ $sach->id ?? 'null' }};

            function fetchChuongs(page = 1) {
                // Hiển thị trạng thái loading
                $('#chuongs').empty().append('<li>Đang tải...</li>');
                $.ajax({
                    url: `/data-chuong/${sachId}`,
                    type: 'GET',
                    data: {page: page},
                    success: function (response) {

                        $('#chuongs').empty();
                        if (response.data.length === 0) {
                            $('#chuongs').append('<li>Không có dữ liệu.</li>');
                            updatePagination(1, 1);
                            return;
                        }

                        // Hiển thị các chương
                        response.data.forEach(function (data) {
                            let content = `
                            <li class="col-xs-12 col-sm-6 col-md-6">
                                <div class="row">
                                    <div class="col-xs-10 crop-text">
                                        <span class="list">
                                            <i class="fa fa-caret-right" aria-hidden="true"></i>
                                        </span>
                                        <a href="/chi-tiet-chuong/${data.id}/${data.tieu_de}" title="Chương ${data.so_chuong}: ${data.tieu_de}">Chương ${data.so_chuong}: ${data.tieu_de}</a>
                                    </div>
                                    <div class="col-xs-2 pull-right">
                                        <img src="{{ asset('assets/client/themes/truyenfull/echo/img/vip3.gif') }}" alt="vip">
                                    </div>
                                </div>
                            </li>
                        `;
                            $('#chuongs').append(content);
                        });

                        // Cập nhật phân trang
                        updatePagination(response.current_page, response.last_page);
                    },
                    error: function (error) {
                        console.error('Lỗi', error);
                    }
                });
            }

            function updatePagination(currentPage, lastPage) {
                $('#pagination').empty();
                let paginationContent = `
                <div>
                    <span>Trang ${currentPage} / ${lastPage}</span>
                    <div class="text-center">
                        <button id="prev" class="btn btn-primary" ${currentPage === 1 ? 'disabled' : ''}>Trước</button>
            `;

                // Tạo các nút cho từng trang
                for (let i = 1; i <= lastPage; i++) {
                    paginationContent += `<button class="btn page-link me-2 ${currentPage === i ? 'btn-success' : 'btn-secondary'}" data-page="${i}">${i}</button>`;
                }

                paginationContent += `
                    <button id="next" class="btn btn-primary" ${currentPage === lastPage ? 'disabled' : ''}>Sau</button>
                </div>
            </div>
            `;
                $('#pagination').append(paginationContent);
                // Cập nhật sự kiện cho các nút phân trang
                $('#prev').off('click').on('click', function () {
                    if (currentPage > 1) {
                        currentPage--;
                        fetchChuongs(currentPage);
                    }
                });
                $('#next').off('click').on('click', function () {
                    if (currentPage < lastPage) {
                        currentPage++;
                        fetchChuongs(currentPage);
                    }
                });
                // Sự kiện cho các nút số trang
                $('.page-link').off('click').on('click', function () {
                    const page = $(this).data('page');
                    currentPage = page;
                    fetchChuongs(currentPage);
                });
            }

            fetchChuongs();
        });
    </script>
@endpush

