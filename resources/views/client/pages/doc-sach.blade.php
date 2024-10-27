@extends('client.layouts.app')
@push('styles')
<script>
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });

    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey && (e.key === 'c' || e.key === 'u')) {
            e.preventDefault();
        }
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'PrintScreen') {
            alert('Chụp màn hình không được phép trên trang này.');
            e.preventDefault();
        }
    });


</script>
    <link rel="stylesheet" href="https://truyenhdt.com/wp-content/themes/truyenfull/echo/css/chap.css?v100063">
    <style>
        .modal-content-scroll {
            max-height: 30em; /* Giới hạn chiều cao cho 10 dòng */
            overflow-y: auto; /* Tạo thanh cuộn dọc nếu cần */
        }
        .no-select {
            -webkit-user-select: none; /* Safari */
            -moz-user-select: none; /* Firefox */
            -ms-user-select: none; /* IE/Edge */
            user-select: none; /* Non-prefixed version, currently supported by Chrome and Opera */
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
            <li class="breadcrumb-item"><a href="https://truyenhdt.com"><span class="fa fa-home"></span> Home</a>
            </li>
            <li class="breadcrumb-item"><a href="/keyword/ngon-tinh/">{{ $chuong->sach->theLoai->ten_the_loai }}</a>
            </li>
            <li class="breadcrumb-item"><a href="/keyword/linh-di/">{{ $chuong->sach->ten_sach }}</a></li>
            <li class="breadcrumb-item"><a
                    href="https://truyenhdt.com/truyen/quai-vat-xuc-tu-co-day-chi-muon-song/chap/9841373-chuong-1//">Chương {{ $chuong->so_chuong }}
                    : {{ $chuong->tieu_de }}</a></li>
        </ol>
    </div>
    <div class="container cpt truyen">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center"> Chương {{ $chuong->so_chuong }} : {{ $chuong->tieu_de }} <span
                        class="dropdown dropdown-wrench ms-3 color-gray font-16"> <a class="dropdown-toggle"
                                                                                     data-toggle="dropdown" href="#"></a>
                    </span></h1>
                <div class="text-center color-gray"> <span class="me-3"> <a href="/author/dieudieu"> <i
                                class="fa fa-user" aria-hidden="true"></i> {{ $chuong->sach->tac_gia }} </a> </span>
                    <span
                        class="me-3"> <i class="fa fa-file-word-o" aria-hidden="true"></i> {{ $countText }} chữ </span>
                    <a
                        href="/web/setting-chap?url=https://truyenhdt.com/truyen/quai-vat-xuc-tu-co-day-chi-muon-song/chap/9841373-chuong-1/">
                        <i class="fa fa-cog" aria-hidden="true"></i> Cài Đặt </a></div>
                <div class="pagination pagination-top mt-5">
                    <div class="next-chap next-chap-1">
                        @if($backChuong)
                            <a href="{{ route('chi-tiet-chuong', [$backChuong->id, $chuong->tieu_de]) }}"
                               class="tag-sm color-white btn-primary"
                               role="button">
                                « <span></span>Trước
                            </a>
                        @else
                        @endif
                    </div>
                    <div class="fullchap">
                        <div class="fullchap">
                            <div class="full">
                                <span class="btn btn-secondary2 btn-unborder" data-toggle="modal"
                                      data-target="#myModal">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="next-chap next-chap-2">
                        @if($nextChuong)
                            <a href="{{ route('chi-tiet-chuong', [$nextChuong->id, $chuong->tieu_de]) }}"
                               class="tag-sm color-white btn-primary"
                               role="button">
                                <span></span>Tiếp »
                            </a>
                        @else
                        @endif
                    </div>
                </div>
                <div id="ads-chap-top" class="text-center"></div>
                <div class="reading" style="color: rgb(51, 51, 51);">
                    <p id="text-for-audio">{{ $chuong->noi_dung }}</p>
                </div>

                <div class="hidden-xs hidden-sm hidden-md text-center mt-3 color-gray"> Sử dụng mũi tên trái (←) hoặc
                    phải (→) để chuyển chương
                </div>
                <div id="ads-chap-bottom" class="text-center"></div>
                <div class="pagination pagination-bottom">
                    <div class="next-chap next-chap-1">
                        @if($backChuong)
                            <a href="{{ route('chi-tiet-chuong', [$backChuong->id, $chuong->tieu_de]) }}"
                               class="tag-sm color-white btn-primary"
                               role="button">
                                « <span></span>Trước
                            </a>
                        @else
                        @endif
                    </div>
                    <div class="fullchap">
                        <div class="fullchap">
                            <div class="full">
                                <span class="btn btn-secondary2 btn-unborder" data-toggle="modal"
                                      data-target="#myModal">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="next-chap next-chap-2">
                        @if($nextChuong)
                            <a href="{{ route('chi-tiet-chuong', [$nextChuong->id, $chuong->tieu_de]) }}"
                               class="tag-sm color-white btn-primary"
                               role="button">
                                <span></span>Tiếp »
                            </a>
                        @else
                        @endif
                    </div>
                </div>
                <div id="views" data-title="Quái Vật Xúc Tu Cô Đây Chỉ Muốn Sống" data-id="9841373"
                     data-slug="quai-vat-xuc-tu-co-day-chi-muon-song" data-chap="9841373-chuong-1"
                     data-chapid="9841429" data-gold="0" data-date="2023-09-21 16:38:50" data-status="publish">
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Danh Sách Chương</h4>
                </div>
                <div class="modal-body">
                    <div class="modal-content-scroll">
                        @foreach($danhSachChuong as $item)
                            <p>
                                <a href="{{ route('chi-tiet-chuong', [$item->id, $item->tieu_de]) }}" class="{{ $item->id == $chuong->id ? 'text-danger' : '' }}">Chương {{ $item->so_chuong }}
                                    : {{ $item->tieu_de }}</a></p>
                        @endforeach
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="https://truyenhdt.com"><span class="fa fa-home"></span> Home</a>
            </li>
            <li class="breadcrumb-item"><a href="/keyword/ngon-tinh/">{{ $chuong->sach->theLoai->ten_the_loai }}</a>
            </li>
            <li class="breadcrumb-item"><a href="/keyword/linh-di/">{{ $chuong->sach->ten_sach }}</a></li>
            <li class="breadcrumb-item"><a
                    href="https://truyenhdt.com/truyen/quai-vat-xuc-tu-co-day-chi-muon-song/chap/9841373-chuong-1//">Chương {{ $chuong->so_chuong }}
                    : {{ $chuong->tieu_de }}</a></li>
        </ol>
    </div>
@endsection
@push('scripts')


    <script src="{{ asset('assets/client/themes/truyenfull/echo/js/ajax/chuong.js') }}" type="text/javascript">
    </script>

@endpush

