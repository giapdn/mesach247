@extends('client.layouts.app')
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/client/themes/truyenfull/echo/css/truyenf384.css?v100063') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/themes/truyenfull/echo/css/customer-chi-tiet-sach.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/client/themes/truyenfull/echo/css/bootstrap/only-popupf384.css?v100063') }}">
    <style>
        .rating .star {
            cursor: pointer;
            color: lightgray;
            transition: color 0.2s ease, transform 0.2s ease;
        }

        .rating .star.active {
            color: gold;
        }

        .rating .star.inactive {
            color: lightgray;
        }

        .rating .star:hover {
            color: #FFD700;
            transform: scale(1.4);
        }

        .rating .star:hover~.star {
            color: lightgray;
        }
    </style>
          href="{{ asset('assets/client/themes/truyenfull/echo/css/bootstrap/only-popupf384.css?v100063')  }}">

@endpush
@section('content')
    <style>
        /* .rating {
                                                                                                                                                                                            direction: ltr;
                                                                                                                                                                                        } */

        .rating-container {
            margin-right: 5px;
        }
    </style>
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
            <div class="col-xs-12 col-sm-12 col-md-10">
                <div class="row">
                    <h1 class="crop-text-1">{{ $sach->ten_sach }}</h1>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                        <div class="book3dcenter">
                            <div class="book3d"><img src="{{ Storage::url($sach->anh_bia_sach) }}"
                                    alt="{{ $sach->ten_sach }}" /></div>
                            <div class="text-center" id="truyen_button"> <span id="button_reading"> <a
                                        href="{{ route('chi-tiet-chuong', [$chuongDauTien->id, $chuongDauTien->tieu_de]) }}"
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
                                        data-ratingtext="{{ $i == 5 ? 'Rất hay!' : ($i == 4 ? 'Hay' : ($i == 3 ? 'Trung bình' : ($i == 2 ? 'Tệ' : 'Rất tệ'))) }}">
                                    </div>
                                @endfor
                            </div>
                            <div class="rate-hover"></div>
                            <div class="rate-noti"></div>
                            <div class="rate-info">
                                <strong>
                                    @if ($trungBinhHaiLong)
                                        {{ $trungBinhHaiLong }}
                                    @else
                                        {{ 0 }}
                                    @endif
                                </strong>/5 trên tổng số
                                <strong>{{ $soLuongDanhGia }}</strong> lượt đánh giá
                            </div>
                        </div>

                        <div id="thong_tin">
                            <table class="color-gray">
                                <tr>
                                    <td><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Tác Giả:</td>
                                    <th class="table-column2 crop-text-1"><i class="fa fa-user" aria-hidden="true"></i>
                                        <a href="{{ route('chi-tiet-tac-gia',$sach->user->id) }}"
                                            rel="tag">{{ $sach->tac_gia }}</a>
                                    </th>
                                    <th rowspan="2" class="table-column3">
                                        <a href="#"
                                            onclick="event.preventDefault(); document.getElementById('payment-form').submit();">
                                            <span class="dlcc">
                                                <span>
                                                    <i class="fa fa-hand-o-right" aria-hidden="true"></i>
                                                    Mua Ngay
                                                </span>
                                            </span>
                                        </a>
                                    </th>

                                    <form id="payment-form" action="{{ route('thanh-toan', $sach->id) }}" method="get"
                                        style="display: none;">
                                        <input type="hidden" value="{{$sach->gia_khuyen_mai}}" name="amount">
                                        @csrf
                                    </form>
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
                                        href="{{ route('the-loai',$sach->theLoai->id) }}"
                                        rel="tag">{{ $sach->theLoai->ten_the_loai }}</a></span>
                            </div>
                            <div class="excerpt ztop-10">
                                <div class="excerpt-collapse crop-text-5"> {{ $sach->tom_tat }}
                                </div>
                            </div>
                        </div>
                        <div id="views" data-date="1720310405"
                            data-title="Sau Khi Ôm Bụng Bỏ Chạy, Đại Mỹ Nhân Cùng Nhãi Con Đi Xin Cơm" data-id="10838849"
                            data-slug="sau-khi-om-bung-bo-chay-dai-my-nhan-cung-nhai-con-di-xin-com">
                        </div>
                    </div>
                </div>
                <div id="ads-truyen-layout-1" class="text-center"></div>
                <div id="newchap">
                    <div class="explanation">
                        <ul class="listchap">
                            @foreach ($chuongMoi as $item)
                                <li>
                                    <div class="col-xs-7 col-md-9 crop-text-1"><span class="list"><i
                                                class="fa fa-caret-right" aria-hidden="true"></i></span>
                                        <a href="{{ route('chi-tiet-chuong', [$item->id, $item->tieu_de]) }}"
                                            title="{{ $item->so_chuong }}">Chương {{ $item->so_chuong }}
                                            : {{ $item->tieu_de }}</a>
                                    </div>
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
            <div class="col-xs-12 col-sm-12 col-md-2">
                <div id="ads-truyen-layout-2" class="text-center"></div>
                <div class="list-user-parent text-center">
                    <div class="list-user">
                        <div class="item-user" title="{{ $sach->user->ten_doc_gia }}">
                            <div class="u-avatar"><a href="{{ route('chi-tiet-tac-gia',$sach->user->id) }}"> <img
                                        src="{{ Storage::url($sach->user->hinh_anh) }}" /> </a>
                            </div>
                            <div class="u-user"><a href="{{ route('chi-tiet-tac-gia',$sach->user->id) }}">
                                    {{ $sach->user->ten_doc_gia }} </a> <span
                                    class="badge badge-success">{{ $sach->user->vai_tros->first()->ten_vai_tro }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="add-per font-12 add-request"><a
                            href="{{ route('chi-tiet-tac-gia',$sach->user->id) }}">
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
                        @foreach ($sachCungTheLoai as $item)
                            <a href="{{ route('chi-tiet-sach', $item->id) }}">  <div class=" d-flex align-items-center mb-4">
                                <img style="width:50px; border-radius:10%" src="{{ Storage::url($item->anh_bia_sach) }}"
                                    alt="Ảnh" class="img-fluid rounded shadow" />
                                <div class="content ms-3">
                                   <h5 class="text-primary">{{ $item->ten_sach }}</h5>
                                </div>
                            </div> </a>
                        @endforeach
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        {{--                              Bình luận                           --}}
        <div class="row">
            <div class="hidden-md hidden-sm hidden-xs"></div>
            <div class="col-md-9 col-sm-12 col-xs-12">
                <div id="comments">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="heading"><i class="fa fa-star-o" aria-hidden="true"></i> Đánh giá
                                ({{ $soLuongDanhGia }})</h3>
                        </div>
                        <div>
                            <div class="pull-right"><a href="#truyen_tabs">
                                    <div class="uptop"><i class="fa fa-arrow-up" aria-hidden="true"></i></div>
                                </a></div>
                        </div>
                    </div>
                    <ol id="danhGiaList">
                        @foreach ($listDanhGia->take(3) as $danhGia)
                            <li data-id="{{ $danhGia->id }}">
                                <div itemscope itemtype="http://schema.org/UserComments">
                                    <div class="comment-author vcard">
                                        <div class="avatar_user_comment">
                                            @if ($danhGia->user->hinh_anh)
                                                <img alt="user" src="{{ Storage::url($danhGia->user->hinh_anh) }}"
                                                    class="avatar-32">
                                            @else
                                                <img alt="user"
                                                    src="{{ asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                                    class="avatar-32">
                                            @endif
                                        </div>
                                        <div class="post-comments">
                                            <div class="d-flex justify-content-between">

                                                <span itemprop="name" class="username"
                                                    style="font-size: 14px">{{ $danhGia->user->ten_doc_gia }}</span>


                                                <div>
                                                    <span
                                                        style="color:#000000">{{ \Carbon\Carbon::parse($danhGia->created_at)->format('d/m/Y') }}</span>
                                                </div>
                                            </div>

                                            @php
                                                $ratings = [
                                                    'rat_hay' => 5,
                                                    'hay' => 4,
                                                    'trung_binh' => 3,
                                                    'te' => 2,
                                                    'rat_te' => 1,
                                                ];
                                                $currentRating = $ratings[$danhGia->muc_do_hai_long] ?? 0;
                                            @endphp
                                            <div class="rating">
                                                @for ($i = 5; $i >= 1; $i--)
                                                    <div class="{{ $i <= $currentRating ? 'active' : 'inactive' }}"
                                                        data-ratingvalue="{{ $i }}"
                                                        data-ratingtext="{{ $i == 5 ? 'Rất hay!' : ($i == 4 ? 'Hay' : ($i == 3 ? 'Trung bình' : ($i == 2 ? 'Tệ' : 'Rất tệ'))) }}">
                                                    </div>
                                                @endfor
                                            </div>

                                            <div class="commenttext" itemprop="commentText">
                                                <p class="mt-5">{{ $danhGia->noi_dung }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ol>
                    <div class="flex-comment">
                        @if ($userReview)
                            <span class="addcomment" style="display: none;">
                                <span class="btn btn-primary font-12 font-oswald">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Đánh giá lại
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </span>
                            </span>
                        @else
                            <span class="addcomment">
                                <span class="btn btn-primary font-12 font-oswald">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Đánh giá sách
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </span>
                            </span>
                        @endif

                        <div id="loadMoreWrapper">
                            <button id="loadMoreBtn" class="btn-primary-border font-12 font-oswald" data-page="1">Xem
                                thêm đánh giá→</button>
                        </div>
                    </div>
                    <div class="load_more_cmt_notify"></div>
                </div>
                <div class="modal fade respond" id="myModal" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="closeDanhGia" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title" id="myModalLabel">Đánh giá</h3>
                            </div>
                            <div class="modal-body clearfix">
                                @if ($userReview)
                                    <form id="updateRatingForm" method="post" enctype="multipart/form-data"
                                        action="{{ route('cap-nhat-danh-gia', $userReview->id) }}">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="sach_id" value="{{ $sach->id }}">
                                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                        <input type="hidden" name="ngay_danh_gia" value="{{ now() }}">

                                        <!-- Giá trị sao -->
                                        <input type="hidden" id="rating_value" name="rating_value"
                                            value="{{ $soSao }}">
                                        <!-- Nhập đánh giá sao -->
                                        <div class="mb-3 mr-3">
                                            <span>Đánh giá: </span>
                                            <div class="rating ms-2">
                                                @for ($i = 5; $i >= 1; $i--)
                                                    <div class="star {{ $soSao >= $i ? 'active' : 'inactive' }}"
                                                        data-ratingvalue="{{ $i }}"
                                                        data-ratingtext="{{ $i == 5 ? 'Rất hay!' : ($i == 4 ? 'Hay' : ($i == 3 ? 'Trung bình' : ($i == 2 ? 'Tệ' : 'Rất tệ'))) }}">
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <textarea class="form-control" name="noi_dung" id="noi_dung">{{ $userReview->noi_dung }}</textarea>
                                        </div>

                                        <!-- Nút gửi đánh giá -->
                                        <div class="d-flex justify-content-between">
                                            <div class="form-group-ajax modal-footer">
                                                <button type="submit" class="btn btn-primary" id="submitComment">
                                                    <i class="fa fa-upload icon-small" aria-hidden="true"></i> Gửi Nhận
                                                    Xét
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Thoát</button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <form id="newRatingForm" method="post" enctype="multipart/form-data"
                                        action="{{ route('danh-sach.danh-gia') }}">
                                        @csrf
                                        <input type="hidden" name="sach_id" value="{{ $sach->id }}">
                                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                        <input type="hidden" name="ngay_danh_gia" value="{{ now() }}">

                                        <!-- Giá trị sao -->
                                        <input type="hidden" id="rating_value" name="rating_value" value="5">

                                        <!-- Nhập đánh giá sao -->
                                        <div class="mb-3 mr-3">
                                            <span>Đánh giá: </span>
                                            <div class="rating ms-2">
                                                @for ($i = 5; $i >= 1; $i--)
                                                    <div class="star {{ $soSao >= $i ? 'active' : 'inactive' }}"
                                                        data-ratingvalue="{{ $i }}"
                                                        data-ratingtext="{{ $i == 5 ? 'Rất hay!' : ($i == 4 ? 'Hay' : ($i == 3 ? 'Trung bình' : ($i == 2 ? 'Tệ' : 'Rất tệ'))) }}">
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="noi_dung" id="noi_dung" placeholder="Nhập đánh giá của bạn ở đây... *"></textarea>
                                        </div>

                                        <!-- Nút gửi đánh giá -->
                                        <div class="d-flex justify-content-between">
                                            <div class="form-group-ajax modal-footer">
                                                <button type="submit" class="btn btn-primary" id="submitComment">
                                                    <i class="fa fa-upload icon-small" aria-hidden="true"></i> Gửi Nhận
                                                    Xét
                                                </button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Thoát</button>
                                            </div>
                                        </div>
                                    </form>
                                @endif
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

        {{--                           End Bình luận                           --}}
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/client/emb.js') }}"></script>
    <script>
        $(document).ready(function() {
            let currentPage = 1;
            const sachId = {{ $sach->id ?? 'null' }};

            function fetchChuongs(page = 1) {
                // Hiển thị trạng thái loading
                $('#chuongs').empty().append('<li>Đang tải...</li>');
                $.ajax({
                    url: `/data-chuong/${sachId}`,
                    type: 'GET',
                    data: {
                        page: page
                    },
                    success: function(response) {

                        $('#chuongs').empty();
                        if (response.data.length === 0) {
                            $('#chuongs').append('<li>Không có dữ liệu.</li>');
                            updatePagination(1, 1);
                            return;
                        }

                        // Hiển thị các chương
                        response.data.forEach(function(data) {
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
                    error: function(error) {
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
                    paginationContent +=
                        `<button class="btn page-link me-2 ${currentPage === i ? 'btn-success' : 'btn-secondary'}" data-page="${i}">${i}</button>`;
                }

                paginationContent += `
                    <button id="next" class="btn btn-primary" ${currentPage === lastPage ? 'disabled' : ''}>Sau</button>
                </div>
            </div>
            `;
                $('#pagination').append(paginationContent);
                // Cập nhật sự kiện cho các nút phân trang
                $('#prev').off('click').on('click', function() {
                    if (currentPage > 1) {
                        currentPage--;
                        fetchChuongs(currentPage);
                    }
                });
                $('#next').off('click').on('click', function() {
                    if (currentPage < lastPage) {
                        currentPage++;
                        fetchChuongs(currentPage);
                    }
                });
                // Sự kiện cho các nút số trang
                $('.page-link').off('click').on('click', function() {
                    const page = $(this).data('page');
                    currentPage = page;
                    fetchChuongs(currentPage);
                });
            }

            fetchChuongs();
        });
    </script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            function renderStars(rating) {
                let stars = '';
                for (let i = 5; i >= 1; i--) {
                    stars += `<div class="star ${i <= rating ? 'active' : 'inactive'}"
                data-ratingvalue="${i}"
                data-ratingtext="${i === 5 ? 'Rất hay!' : (i === 4 ? 'Hay' : (i === 3 ? 'Trung bình' : (i === 2 ? 'Tệ' : 'Rất tệ')))}">
                </div>`;
                }
                return stars;
            }
            updateStars(5);
            // Hàm cập nhật sao khi có giá trị rating mới
            function updateStars(rating) {
                $('.rating .star').each(function() {
                    const starValue = $(this).data('ratingvalue');
                    $(this).removeClass('active inactive').addClass(starValue <= rating ? 'active' :
                        'inactive');
                });
            }

            // Khi nhấn vào một sao, cập nhật giá trị rating
            $(document).on('click', '.star', function() {
                const ratingValue = $(this).data('ratingvalue');
                $('#rating_value').val(ratingValue);
                updateStars(ratingValue); // Hiển thị sao ngay lập tức
            });

            // Xử lý gửi đánh giá mới và hiển thị sao ngay sau khi thêm
            $('#newRatingForm').on('submit', function(event) {
                event.preventDefault();
                const formData = new FormData(this);

                $.ajax({
                    url: $(this).attr('action'),
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert(response.message);
                        const ratingValue = response.data.rating_value;
                        addReviewToList(response.data.danhGia, ratingValue);
                        $('.addcomment').hide();
                        $('#newRatingForm')[0].reset();
                    },
                    error: function(xhr) {
                        console.log(xhr);
                        alert('Có lỗi xảy ra, vui lòng thử lại.');
                    }
                });
            });

            // Hàm thêm đánh giá mới vào danh sách
            function addReviewToList(danhGia, ratingValue) {
                const newReview = `
            <li data-id="${danhGia.id}">
                <div itemscope itemtype="http://schema.org/UserComments">
                    <div class="comment-author vcard">
                        <div class="avatar_user_comment">
                            <a href="">
                                <img alt="user" src="${danhGia.user.hinh_anh_url || '{{ asset('assets/admin/images/users/user-dummy-img.jpg') }}'}" class="avatar-32">
                            </a>
                        </div>
                        <div class="post-comments">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <span itemprop="name"><a href="">${danhGia.user.ten_doc_gia}</a></span>
                                </div>
                                <div><span style="color:#000000">${new Date(danhGia.ngay_danh_gia).toLocaleDateString('vi-VN')}</span></div>
                            </div>
                            <div class="rating">
                                ${renderStars(ratingValue)}
                            </div>
                            <div class="commenttext" itemprop="commentText">
                                <p>${danhGia.noi_dung}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>`;

                $('#danhGiaList').prepend(newReview);
                updateStars(ratingValue);
            }
        });
    </script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#loadMoreBtn').on('click', function() {
                let page = $(this).data('page'); // Lấy trang hiện tại từ nút "Xem thêm"
                let sachId = {{ $sach->id }}; // ID của sách, đảm bảo giá trị này có sẵn trong view

                $.ajax({
                    url: '{{ route('getDanhGia') }}',
                    type: 'GET',
                    data: {
                        page: page + 1, // Tăng trang hiện tại lên 1 để tải thêm đánh giá
                        sach_id: sachId
                    },
                    success: function(response) {
                        let danhGiaList = response.data;
                        let html = '';

                        // Lặp qua danh sách đánh giá mới và tạo HTML
                        $.each(danhGiaList, function(index, danhGia) {
                            let currentRating = 0;
                            switch (danhGia.muc_do_hai_long) {
                                case 'rat_hay':
                                    currentRating = 5;
                                    break;
                                case 'hay':
                                    currentRating = 4;
                                    break;
                                case 'trung_binh':
                                    currentRating = 3;
                                    break;
                                case 'te':
                                    currentRating = 2;
                                    break;
                                case 'rat_te':
                                    currentRating = 1;
                                    break;
                                default:
                                    currentRating = 0;
                            }

                            html += `<li data-id="${danhGia.id}">
                            <div itemscope itemtype="http://schema.org/UserComments">
                                <div class="comment-author vcard">
                                    <div class="avatar_user_comment">
                                        ${danhGia.user.hinh_anh_url ? `
                                                                <img alt="user" src="${danhGia.user.hinh_anh_url}" class="avatar-32">
                                                            ` : `
                                                                <img alt="user" src="{{ asset('assets/admin/images/users/user-dummy-img.jpg') }}" class="avatar-32">
                                                            `}
                                    </div>
                                    <div class="post-comments">
                                        <div class="d-flex justify-content-between">
                                            <span itemprop="name" class="username" style="font-size: 14px;">${danhGia.user.ten_doc_gia}</span>
                                            <div><span style="color:#000000">${new Date(danhGia.created_at).toLocaleDateString('vi-VN')}</span></div>
                                        </div>
                                        <div class="rating">`;
                            for (let i = 5; i >= 1; i--) {
                                html += `<div class="${i <= currentRating ? 'active' : 'inactive'}"
                                data-ratingvalue="${i}"
                                data-ratingtext="${i === 5 ? 'Rất hay!' : (i === 4 ? 'Hay' : (i === 3 ? 'Trung bình' : (i === 2 ? 'Tệ' : 'Rất tệ')))}">
                            </div>`;
                            }
                            html += `</div>
                            <div class="commenttext" itemprop="commentText">
                                <p class="mt-5">${danhGia.noi_dung}</p>
                            </div>
                        </div>
                    </div>
                </li>`;
                        });

                        // Thêm đánh giá mới vào danh sách
                        $('#danhGiaList').append(html);

                        // Cập nhật lại số trang hiện tại cho nút "Xem thêm"
                        $('#loadMoreBtn').data('page', page + 1);

                        // Kiểm tra xem còn dữ liệu để tải hay không, nếu hết thì ẩn nút "Xem thêm"
                        if (!response.next_page_url) {
                            $('#loadMoreWrapper').hide(); // Ẩn nút "Xem thêm" nếu hết dữ liệu
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText); // In lỗi ra console để xem chi tiết
                        alert('Có lỗi xảy ra, vui lòng thử lại.');
                    }
                });
            });
        });
    </script>

@endpush
