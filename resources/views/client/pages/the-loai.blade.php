@extends('client.layouts.app')
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
@section('content')

    <div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container container-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><span class="fa fa-home"></span> Trang Chủ</a></li>
            <li class="breadcrumb-item active">Tên Thể Loại</li>
            <li class="breadcrumb-item"><a href="">{{ $theLoai->ten_the_loai }}</a></li>
        </ol>
    </div>
    <div class="container tax">
        <div class="row ">
            <div class="col-xs-12 col-md-8 ">
                <div class="align-items-center d-flex justify-content-between">
                    <div class="align-items-center">
                        <h2 class="heading ztop-25"><i class="fa fa-list" aria-hidden="true"></i>
                            Sách thuộc thể loại {{ $theLoai->ten_the_loai }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-9">
                <div id="filter-keyword" class="ztop-10 zbottom-10">
                    <div id="content-keyword">
                        <div id="title-result">
                            <div class="pull-left" id="book-count">Có {{ $sach->count() }} cuốn sách</div>
                            <div class="pull-right">
                                <div class="form-group">
                                    <select id="filter_keyword_tax" class="form-control">
                                        <option value="">Tất Cả</option>
                                        <option value="new-chap">Sách Mới</option>
                                        <option value="ticket_new">Đã Full</option>
                                        <option value="new">Đang Cập Nhật</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix">

                        </div>
                        <div id="my-table">
                            @foreach ($sach as $index => $item)
                                <div class="col-md-6 col-sm-6 col-xs-12 book-item" itemscope
                                    itemtype="https://schema.org/Book" style="{{ $index >= 6 ? 'display: none;' : '' }}">
                                    <table class="theloai-thumlist">
                                        <tbody id="uxd">
                                            <tr>
                                                <td>
                                                    <meta itemprop="bookFormat" content="EBook" />
                                                    <a href="{{ route('chi-tiet-sach',['id' => $id]) }}" class="thumbnail" title="{{ $item->ten_sach }}">
                                                        <img src="{{ $item->anh_bia_sach }}" alt="{{ $item->ten_sach }}"
                                                            itemprop="image" />
                                                    </a>
                                                </td>
                                                <td class="text">
                                                    <h2 class="crop-text-2" itemprop="name">
                                                        <a href="{{ route('chi-tiet-sach',['id' => $id]) }}" title="{{ $item->ten_sach }}"
                                                            itemprop="url">{{ $item->ten_sach }}</a>
                                                    </h2>
                                                    <div class="content">
                                                        <p class="crop-text-1 color-gray">
                                                            <span class="fa fa-user"></span> Tác giả:
                                                            <span itemprop="author">
                                                                <a href=""
                                                                    rel="tag">{{ $item->user->ten_doc_gia }}</a>
                                                            </span>
                                                        </p>
                                                        <p class="crop-text-2" itemprop="description">{{ $item->tom_tat }}
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        </div>
                        <div class="clearfix"></div>
                        <div class="load_more_tax text-center">
                            <span id="load-more" class="btn-primary-border font-12 font-oswald">Xem Thêm Sách →</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-3">
                <style>
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
                        <h2 class="heading"><i class="fa fa-free-code-camp" aria-hidden="true"></i>
                            {{ $theLoai->ten_the_loai }} </h2>
                    </div>
                </div>
                <ul class="nav nav-tabs nav-tabs-css nav-topdanhvong" data-id="topdanhvong">
                    <li role="presentation" data-date="ticket" class="active"><a>Top Bán Chạy</a></li>
                </ul>
                <div id="topdanhvong_echo">
                    <ul class="list-ranking">
                        @foreach ($topSachsTL as $index => $sach)
                            <li class="item">
                                <div class="index index-{{ $index + 1 }}">
                                    @if ($index == 0)
                                        <i class="icon-medal-1"></i>
                                    @elseif($index == 1)
                                        <i class="icon-medal-2"></i>
                                    @elseif($index == 2)
                                        <i class="icon-medal-3"></i>
                                    @else
                                        {{ $index + 1 }}
                                    @endif
                                </div>
                                <div class="content media">
                                    <div class="info">
                                        <strong class="crop-text">
                                            <a href="" class="d-block">
                                                {{ $sach->ten_sach }}
                                            </a>
                                        </strong>
                                        @if ($index == 0)
                                            <div class="view color-gray">
                                                <span class="fa fa-user"></span>
                                                <a>{{ $sach->user->ten_doc_gia }}</a>
                                            </div>
                                        @endif
                                        <div class="crop-text-1 color-gray"></div>
                                    </div>
                                    @if ($index == 0)
                                        <div class="thumb">
                                            <div class="book-cover">
                                                <a href="" title="{{ $sach->ten_san_pham }}"
                                                    class="book-cover-link">
                                                    <img src="{{ $sach->anh_bia_sach }}"
                                                        alt="{{ $sach->ten_san_pham }}">
                                                </a>
                                                <span class="book-cover-shadow"></span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div id="sidebar-tax" class="sidebar-right sidebar-more">
                    <h2 class="heading ztop-15"><i class="fa fa-info-circle" aria-hidden="true"></i> Có Thể Hữu Ích?
                    </h2>
                    <p><strong>{{ $theLoai->ten_the_loai }}</strong> {{ $theLoai->mo_ta }}
                </div>
            </div>
        </div>
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

{{--                h1 {--}}
{{--                    order: 1;--}}
{{--                    width: unset;--}}
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
    <div class="container tax">
        <div class="row">
            <div class="col-xs-12 col-md-8"></div>
            <div class="col-xs-12 col-md-4 sidebar-right"></div>
        </div>
    </div>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><span class="fa fa-home"></span> Trang Chủ</a></li>
            <li class="breadcrumb-item active">Tên Thể Loại</li>
            <li class="breadcrumb-item"><a href="">{{ $theLoai->ten_the_loai }}</a></li>
        </ol>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('load-more').addEventListener('click', function() {
            const hiddenBooks = document.querySelectorAll('.book-item[style*="display: none;"]');
            const maxToShow = 6;
            let count = 0;

            hiddenBooks.forEach((book) => {
                if (count < maxToShow) {
                    book.style.display = 'block';
                    count++;
                }
            });
            if (hiddenBooks.length <= count) {
                this.style.display = 'none';
            }
        });
    </script>
    <script>
        $('#filter_keyword_tax').on('change', function() {
            const selectedValue = $(this).val();
            console.log(selectedValue);

            const url = `{{ url('the-loai/' . $id) }}`;

            $.ajax({
                url: `${url}?filter=${selectedValue}`,
                type: 'GET',
                dataType: 'json',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(data) {
                    console.log(data.sach);
                    const tbody = $('#my-table');
                    tbody.empty();

                    $('#book-count').html(`Có ` + data.sach.length + ` cuốn sách`);

                    data.sach.forEach(function(object) {
                        tbody.append(`
            <div class="col-md-6 col-sm-6 col-xs-12 book-item" itemscope
                itemtype="https://schema.org/Book" style="">
                <table class="theloai-thumlist">
                    <tbody>
                        <tr>
                            <td>
                                <meta itemprop="bookFormat" content="EBook" />
                                <a href="" class="thumbnail" title="${object.ten_sach}">
                                    <img src="${object.anh_bia_sach}" alt="${object.ten_sach}"
                                        itemprop="image" />
                                </a>
                            </td>
                            <td class="text">
                                <h2 class="crop-text-2" itemprop="name">
                                    <a href="" title="${object.ten_sach}"
                                        itemprop="url">${object.ten_sach}</a>
                                </h2>
                                <div class="content">
                                    <p class="crop-text-1 color-gray">
                                        <span class="fa fa-user"></span> Tác giả:
                                        <span itemprop="author">
                                            <a href=""
                                                rel="tag">${object.ten_doc_gia }</a>
                                        </span>
                                    </p>
                                    <p class="crop-text-2" itemprop="description">${object.tom_tat}
                                    </p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        `);
                    });

                    // Đưa mã kiểm tra loadMoreButton vào đây
                    const loadMoreButton = document.getElementById('load-more');
                    if (data.total > 6) {
                        loadMoreButton.style.display = 'block';
                    } else {
                        loadMoreButton.style.display = 'none';
                    }
                },
            });
        });

        const loadMoreButton = document.getElementById('load-more');
        if (data.total > 6) {
            loadMoreButton.style.display = 'block';
        } else {
            loadMoreButton.style.display = 'none';
        }
    </script>
@endpush
