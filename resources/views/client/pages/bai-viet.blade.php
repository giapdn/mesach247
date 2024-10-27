@extends('client.layouts.app')
@section('content')
    @push('styles')
        <style>
            #slider-keyword {
                overflow-x: auto;
                overflow-y: hidden;
                padding: 0;
                margin: 0;
                white-space: nowrap;
                text-align: center;
                position: relative
            }

            #slider-keyword .btn-primary-border:hover,
            #slider-keyword .btn-primary-border:hover a {
                background: #fff;
                color: #1ebbf0;
                background-clip: padding-box
            }

            #slider-keyword .tag {
                font-weight: 400;
                font-family: Oswald;
                font-size: 12px;
                position: relative;
                padding: .6rem 1rem;
                box-sizing: border-box;
                color: #1ebbf0;
                background: #fff;
                background-clip: padding-box;
                border: solid 1px transparent;
                border-radius: 4px;
                margin: 4px 2px;
                display: inline-block
            }

            #slider-keyword .tag:before {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                z-index: -1;
                margin: -1px;
                border-radius: inherit;
                background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%)
            }

            #slider-keyword .tag.active {
                background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                color: #fff
            }

            #slider-keyword .tag.active:hover {
                color: #fff;
                background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                background-clip: padding-box
            }

            h1 {
                margin-bottom: 0
            }

            .btn.border-primary,
            .btn.border-primary:hover {
                color: #1ebbf0
            }

            .btn-r {
                background-image: linear-gradient(135deg, red 30%, #fe9a2e 100%)
            }

            .btn-r:hover {
                background-image: linear-gradient(135deg, #fe9a2e 30%, red 100%)
            }

            .col-line-last {
                height: 40px;
                line-height: 40px;
                border-bottom: 1px dashed #ccc
            }

            .sidebar-right .col-line-last a {
                text-decoration: none;
                border-bottom: unset
            }

            .sidebar-right h3 a {
                text-decoration: none;
                border-bottom: unset
            }

            ul.theloai-thumlist {
                padding-left: 0
            }

            table.theloai-thumlist tbody {
                width: 100%;
                display: table;
            }

            table.theloai-thumlist {
                margin-top: 15px;
                display: block
            }

            .theloai-thumlist>li,
            .theloai-thumlist tr {
                display: block;
                padding-left: 0;
                margin-bottom: 10px
            }

            .theloai-thumlist h2 {
                padding-left: 10px;
                font-size: 16px;
                font-weight: 600;
                margin-bottom: 5px
            }

            @media (min-width: 1200px) {
                .theloai-thumlist h3 {
                    min-height: 45px
                }
            }

            .theloai-thumlist p {
                margin-bottom: 4px;
                margin-top: 4px
            }

            .theloai-thumlist .thumbnail {
                width: 74px;
                height: 111px;
                float: left;
                box-shadow: 0 2px 8px rgba(1, 3, 3, .16);
                position: relative
            }

            .theloai-thumlist .thumbnail img {
                width: 74px;
                height: 111px
            }

            .theloai-thumlist .rating {
                position: absolute;
                bottom: 0;
                left: 0;
                background: #eac100;
                color: #fff;
                font-size: 13px;
                font-weight: 300;
                padding: 2px 8px
            }

            .theloai-thumlist .content {
                overflow: hidden;
                padding-left: 10px;
                font-size: 13px
            }

            .theloai-thumlist .text {
                max-height: 135px;
                overflow: hidden
            }

            .theloai-thumlist .crop-text-2 {
                height: 36px
            }

            .theloai-thumlist h2.crop-text-2 {
                height: 43px
            }

            ul.pagination li {
                list-style: none;
                display: inline-flex;
                padding-bottom: 5px;
                margin-right: 3px
            }

            .pagination li.active,
            .pagination li.disabled {
                pointer-events: none;
                cursor: default;
                text-decoration: none
            }

            .pagination li:hover a {
                background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%) !important;
                color: #fff !important;
                border: solid 1px #337ab7 !important
            }

            .pagination li.active a {
                background: linear-gradient(135deg, #39dfaa 30%, #1ebbf0 100%) !important;
                color: #fff !important;
                border: solid 1px #337ab7 !important
            }

            .pagination li a {
                border: solid 1px #000;
                color: #000;
                padding: .7rem 1.2rem
            }

            .full-label {
                width: 34px;
                height: 50px;
                position: absolute;
                display: block;
                top: 0;
                left: -7px;
                z-index: 1;
                background: transparent url({{ asset('assets/client/themes/truyenfull/echo/img/full-label.png') }}) no-repeat
            }

            .label-new {
                border: 1px solid #1ebbf0;
                color: #1ebbf0
            }

            .label-full {
                border: 1px solid #39dfaa;
                color: #39dfaa
            }

            .label-title {
                padding: 0px 3px;
                font-size: 13px;
                vertical-align: bottom;
                margin-left: 5px
            }

            .label-new:before {
                content: "New"
            }

            .label-full:before {
                content: "Full"
            }
        </style>
    @endpush
    <div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>

    <div class="container container-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/"><span class="fa fa-home"></span> Trang Chủ</a>
            </li>
            <li class="breadcrumb-item">
                <a href="">Danh Sách Bài Viết</a>
            </li>
        </ol>
    </div>

    <div class="container tax">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                @if (isset($currentChuyenMuc))
                    <h2 class="heading ztop-30">
                        <i class="fa fa-list" aria-hidden="true"></i> Danh Sách Bài Viết -
                        {{ $currentChuyenMuc->ten_chuyen_muc }}
                    </h2>
                @else
                    <h2 class="heading ztop-30">
                        <i class="fa fa-list" aria-hidden="true"></i> Danh Sách Bài Viết
                    </h2>
                @endif

                <div id="filter-keyword" class="ztop-10 zbottom-10">
                    <hr />
                    <div id="content-keyword">
                        <div id="title-result">
                            <div class="pull-left">Có {{ $baiViets->count() }} bài viết</div>
                            <div class="pull-right">
                                <div class="form-group">
                                    <select id="filter_keyword_tax" class="form-control" onchange="filterPosts()">
                                        <option value="">Tất cả</option>
                                        <option value="new-chap" {{ request('filter') == 'new-chap' ? 'selected' : '' }}>Mới
                                            Cập Nhật</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <table class="theloai-thumlist">
                            <tbody>
                                @foreach ($baiViets as $baiViet)
                                    <tr class="col-md-4 col-sm-4 col-xs-12 bai-viet-item" itemscope
                                        itemtype="https://schema.org/Book"
                                        style="{{ $loop->index >= 6 ? 'display: none;' : '' }}">
                                        <td class="d-flex">
                                            <meta itemprop="bookFormat" content="EBook" />
                                            <a href="{{ route('chi-tiet-bai-viet', $baiViet->id) }}"
                                                title="{{ $baiViet->tieu_de }}">
                                                <img src="{{ Storage::url($baiViet->hinh_anh) }}"
                                                    alt="{{ $baiViet->tieu_de }}"
                                                    style="width: 267px; height: 150px; object-fit: cover;" />
                                            </a>
                                        </td>
                                        <td class="text">
                                            <h2 class="crop-text-2" itemprop="name">
                                                <a
                                                    href="{{ route('chi-tiet-bai-viet', $baiViet->id) }}">{{ $baiViet->tieu_de }}</a>
                                            </h2>
                                            <div class="content">
                                                <p class="crop-text-1 color-gray">
                                                    {{ $baiViet->chuyenMuc->ten_chuyen_muc ?? 'Chuyên mục' }}
                                                    <span
                                                        itemprop="author">{{ $baiViet->ngay_dang->format('d/m/Y') }}</span>
                                                </p>
                                                <p itemprop="description">
                                                    {!! \Illuminate\Support\Str::words($baiViet->noi_dung, 10, '...') !!}
                                                </p>
                                                <p class="crop-text-1 color-gray">
                                                    <span class="fa fa-user"></span> Tác giả: <a
                                                        href="#">{{ $baiViet->tacGia->ten_doc_gia }}</a>
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </table>

                        <div class="clearfix"></div>
                        <div class="load_more_tax text-center">
                            <span id="load-more-posts" class="btn-primary-border font-12 font-oswald">Xem Thêm Bài Viết
                                →</span>
                            <span id="hide-posts" class="btn-primary-border font-12 font-oswald" style="display: none;">Ẩn
                                Bài Viết ←</span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-md-3">
                <style type="text/css">
                    /*-------------------------------------------------------------------------- | layout bxh truyện |--------------------------------------------------------------------------*/
                    .nav-tabs>li.active>a,
                    .nav-tabs>li.active>a:hover,
                    .nav-tabs>li.active>a:focus {
                        background: -webkit-linear-gradient(135deg, #39dfaa 10%, #1ebbf0 100%);
                        text-align: center;
                        color: white;
                        border: unset;
                    }

                    .nav-tabs {
                        margin-bottom: 10px;
                        font-size: 12px;
                        border-bottom: 1px solid #1ebbf0;
                    }

                    .nav.nav-tabs-css>li>a {
                        padding: 5px 5px;
                        font-weight: 600;
                        text-align: center;
                    }

                    .nav-tabs>li>a {
                        border-radius: unset;
                    }

                    .nav-tabs>li {
                        margin-bottom: -3px;
                        width: 25%;
                    }

                    .nav-tabs>li>a:hover {
                        border-color: transparent;
                    }

                    .nav>li>a:hover,
                    .nav>li>a:focus {
                        background: -webkit-linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                        color: transparent;
                        -webkit-background-clip: text;
                        text-decoration: none;
                    }

                    .row-heading .form-group {
                        margin-bottom: 0px;
                    }
                </style>


                <div class="row row-heading">
                    <div class="col-xs-12">
                        <h2 class="heading">
                            <i class="fa fa-free-code-camp" aria-hidden="true"></i> Top 10 bài viết được bình luận nhiều
                            nhất
                        </h2>
                    </div>
                </div>


                <div id="topdanhvong_echo">
                    <ul class="list-ranking">
                        @foreach ($topBaiViets as $index => $baiViet)
                            <li class="item">
                                <div class="index">
                                    @if ($index < 3)
                                        <i class="icon-medal-{{ $index + 1 }}"></i>
                                    @else
                                        {{ $index + 1 }}
                                    @endif
                                </div>
                                <div class="content media">
                                    <a href="{{ route('chi-tiet-bai-viet', $baiViet->id) }}"
                                        class="crop-text-1">{{ $baiViet->tieu_de }}</a>
                                    <span class="color-gray item-number">{{ $baiViet->binh_luans_count }} bình luận</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>


                <div id="sidebar-tax" class="sidebar-right sidebar-more">
                    <h2 class="heading ztop-15"><i class="fa fa-info-circle" aria-hidden="true"></i> Có Thể Hữu Ích?</h2>


                    <!-- Hiển thị danh sách chuyên mục -->
                    <p><strong>Chuyên mục:</strong></p>
                    <ul>
                        @foreach ($chuyenMucs as $chuyenMuc)
                            <li>{{ $chuyenMuc->ten_chuyen_muc }}</li>
                        @endforeach
                    </ul>


                    <!-- Hiển thị danh sách tiêu đề bài viết -->
                    <p><strong>Bài viết:</strong></p>
                    <ul>
                        @foreach ($baiViets as $baiViet)
                            <li><a href="{{ route('chi-tiet-bai-viet', $baiViet->id) }}">{{ $baiViet->tieu_de }}</a></li>
                        @endforeach
                    </ul>
                </div>


            </div>

        </div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/"><span class="fa fa-home"></span> Trang Chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="">Danh Sách Bài Viết</a>
                </li>
            </ol>
{{--        <style type="text/css">--}}
{{--            .book-cover {--}}
{{--                transform: perspective(70px);--}}
{{--            }--}}

{{--            .tax-slide {--}}
{{--                overflow-x: auto;--}}
{{--                overflow-y: hidden;--}}
{{--                margin: 0;--}}
{{--                white-space: nowrap;--}}
{{--                text-align: center;--}}
{{--                position: relative;--}}
{{--                margin-bottom: 10px;--}}
{{--            }--}}

{{--            #follow_tax {--}}
{{--                display: inline-block;--}}
{{--                float: right;--}}
{{--            }--}}

{{--            h1 {--}}
{{--                display: inline-block;--}}
{{--                width: calc(100% - 100px);--}}
{{--                overflow: hidden;--}}
{{--                white-space: nowrap;--}}
{{--                text-overflow: ellipsis;--}}
{{--            }--}}

{{--            @media screen and (min-width: 768px) {--}}
{{--                #heading_tax {--}}
{{--                    display: flex;--}}
{{--                    justify-content: space-between;--}}
{{--                    align-items: center;--}}
{{--                    margin-bottom: 15px--}}
{{--                }--}}


{{--                #follow_tax {--}}
{{--                    order: 3--}}
{{--                }--}}

{{--                .tax-slide {--}}
{{--                    order: 2--}}
{{--                }--}}

{{--                #follow_tax {--}}
{{--                    margin-left: 20px;--}}
{{--                }--}}
{{--            }--}}
{{--        </style>--}}
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('load-more-posts').addEventListener('click', function() {
            // Lấy tất cả các bài viết đang bị ẩn (có style "display: none")
            const hiddenPosts = document.querySelectorAll('.bai-viet-item[style*="display: none;"]');

            const maxToShow = 6;
            let count = 0;

            // Hiển thị thêm 6 bài viết
            hiddenPosts.forEach((post) => {
                if (count < maxToShow) {
                    post.style.display = 'block';
                    count++;
                }
            });

            // Hiển thị nút "Ẩn Bài Viết" nếu đã hiển thị thêm bài viết
            if (count > 0) {
                document.getElementById('hide-posts').style.display = 'inline-block';
            }

            // Kiểm tra xem có còn bài viết ẩn hay không, nếu không thì ẩn nút "Xem thêm"
            if (hiddenPosts.length <= maxToShow) {
                this.style.display = 'none';
            }
        });

        document.getElementById('hide-posts').addEventListener('click', function() {
            const baiVietItems = document.querySelectorAll('.bai-viet-item');
            const initialToShow = 6;
            let count = 0;

            // Ẩn tất cả các bài viết sau bài viết thứ 6
            baiVietItems.forEach((post, index) => {
                if (index >= initialToShow) {
                    post.style.display = 'none';
                    count++;
                }
            });

            // Hiển thị lại nút "Xem thêm bài viết" nếu có bài viết bị ẩn
            if (count > 0) {
                document.getElementById('load-more-posts').style.display = 'inline-block';
            }

            // Ẩn nút "Ẩn Bài Viết" sau khi ẩn hết bài viết
            this.style.display = 'none';
        });

        window.onload = function() {
            const baiVietItems = document.querySelectorAll('.bai-viet-item');
            const initialToShow = 6; // Số lượng bài viết hiển thị ban đầu

            baiVietItems.forEach((item, index) => {
                if (index < initialToShow) {
                    item.style.display = 'block'; // Hiển thị các bài viết đầu tiên (không ẩn 6 bài đầu)
                } else {
                    item.style.display = 'none'; // Ẩn các bài viết sau bài thứ 6
                }
            });
        };
    </script>
    <script>
        function filterPosts() {
            var filterValue = document.getElementById('filter_keyword_tax').value;
            var url = "{{ route('filterByChuyenMuc', ['id' => $currentChuyenMuc->id ?? null]) }}";

            if (filterValue === "") {
                window.location.href = url;
            } else {
                window.location.href = url + '?filter=' + filterValue;
            }
        }
    </script>
@endpush
