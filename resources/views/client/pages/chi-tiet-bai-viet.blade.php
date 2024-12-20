@extends('client.layouts.app')
@section('content')
    @push('styles')
        <style>
            .small-title {
                font-size: 40px;
            }

            .avatar-321 {
                border-radius: 50%;
                width: 40px;
                height: 40px;
                object-fit: cover;
                /* Đảm bảo ảnh hiển thị gọn đẹp trong hình tròn */
            }

            #comments .post-comments div:first-child {
                font-size: 15px !important;
                padding: 0 !important;
                border-bottom: none !important;
            }
            @media (min-width: 1200px)
            .reading {
                width: 1170px;
            }
            @media (min-width: 992px)
            .reading {
                width: 970px;
            }

            @media (min-width: 768px)
            .reading {
                width: 750px;
            }
            .reading {
                color: rgb(51, 51, 51); font-size: 18px; line-height: 1.6; text-align: justify;
                padding-right: 250px;
                padding-left: 250px;
                margin-right: auto;
                margin-left: auto;
            }
            .comments-custom {
                padding-right: 250px;
                padding-left: 250px;
            }
        </style>
    @endpush
    <div class="container container-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}"><span class="fa fa-home"></span> Trang chủ</a></li>
            <li class="breadcrumb-item"><a
                    href="/chuyen-muc/{{ $baiViet->chuyenMuc->id }}">{{ $baiViet->chuyenMuc->ten_chuyen_muc }}</a></li>
            <li class="breadcrumb-item active">{{ $baiViet->tieu_de }}</li>
        </ol>
    </div>

    <div class="container cpt truyen">
        <div class="row">
            <div class="col-xs-12">

                <!-- Thông tin bài viết -->
                {{-- <div class="color-gray col-md-12">
                    <span class="me-3">
                        Tác giả: <a
                            href="{{ route('chi-tiet-tac-gia', $baiViet->tacGia->id) }}">{{ $baiViet->tacGia->ten_doc_gia }}</a>
                        - {{ $baiViet->ngay_dang->format('d/m/Y') }}
                    </span>
                </div> --}}

                {{-- <div class="color-gray col-md-1">
                    <a
                        href="/web/setting-chap?url=https://truyenhdt.com/truyen/quai-vat-xuc-tu-co-day-chi-muon-song/chap/9841373-chuong-1/">
                        <i class="fa fa-cog" aria-hidden="true"></i> Cài Đặt </a>
                </div> --}}

                <h1 class="text-center small-title">{{ $baiViet->tieu_de }}</h1>
                <div class="text-center color-gray mb-5">
                    <h2 class="me-3">
                        <a href="{{ route('chi-tiet-tac-gia', $baiViet->tacGia->id) }}"><i class="fa fa-user"
                                aria-hidden="true"></i>
                            {{ $baiViet->tacGia->ten_doc_gia }} - {{ $baiViet->ngay_dang->format('d/m/Y') }}</a>
                    </h2>
                </div>

                <!-- Hình ảnh bài viết -->
                <div class="text-center reading" style="aspect-ratio: 16/9; overflow: hidden;">
                    <img  src="{{ asset('storage/' . $baiViet->hinh_anh) }}" alt="{{ $baiViet->tieu_de }}"
                        style="width: 100%; height: 100%; object-fit: cover; display: block; margin: 0 auto;" />
                </div>


                {{--                Đổ nội dung --}}
                <div class="reading"
                 >
                    <p>{!! $baiViet->noi_dung !!}</p>
                </div>


                <div class="col-md-12 col-sm-12 col-xs-12 comments-custom">
                    <div id="comments">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="heading">
                                    <i class="fa fa-comments-o" aria-hidden="true"></i> Bình Luận
                                    (<span id="commentCount">{{ $baiViet->binhLuans->count() }}</span>)
                                </h3>

                            </div>
                            {{-- <div>
                                <div class="pull-right"> <a href="#truyen_tabs">
                                        <div class="uptop"> <i class="fa fa-arrow-up" aria-hidden="true"></i> </div>
                                    </a> </div>
                            </div> --}}
                        </div>
                        <!-- Bình luận -->
                        <ol class="list-unstyled" id="commentsList">
                            @foreach ($baiViet->binhLuans as $binhLuan)
                                <li>
                                    <div class="comment-author vcard">
                                        <div class="avatar_user_comment">
                                            <img src="{{ $binhLuan->user->hinh_anh ? asset('storage/' . $binhLuan->user->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                                alt=" " class="avatar-321" style="border-radius: 50%;" />

                                        </div>
                                        <div class="post-comments">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <span class="fn">
                                                        <a href="#">{{ $binhLuan->user->ten_doc_gia }}</a>
                                                    </span>
                                                    <span
                                                        class="ago">({{ $binhLuan->created_at->diffForHumans() }})</span>
                                                </div>
                                            </div>
                                            <div class="commenttext mt-2" >
                                                <p>{{ $binhLuan->noi_dung }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                        @if (auth()->check())
                            <div class="flex-comment">
                                <span class="addcomment">
                                    <span class="btn btn-primary font-12 font-oswald" id="openCommentModal">
                                        <i class="fa fa-plus" aria-hidden="true"></i> Thêm Bình Luận
                                        <i class="fa fa-comment" aria-hidden="true"></i>
                                    </span>
                                </span>
                                <span id="loadMoreComments" data-cpage="1">
                                    <span class="btn-primary-border font-12 font-oswald">Xem Thêm Bình Luận →</span>
                                </span>
                                <span id="hideComments" style="display: none;">
                                    <span class="btn-primary-border font-12 font-oswald">Ẩn Bình Luận ←</span>
                                </span>
                            </div>
                        @else
                            <div class="alert alert-warning" role="alert">
                                Bạn chưa đăng nhập, vui lòng <a href="{{ route('cli.auth.login') }}">đăng nhập</a> để bình
                                luận.
                            </div>
                        @endif

                    </div>
                    <div class="modal fade respond" id="myModal" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="myModalLabel">Bình Luận</h3>
                                </div>
                                <form id="commentForm" action="{{ route('bai-viet.addComment', $baiViet->id) }}"
                                    method="POST" class="giap">
                                    @csrf
                                    <div class="modal-body clearfix">
                                        <div class="form-group form-group-ajax">
                                            <textarea class="form-control" name="noi_dung" id="comment_content" tabindex="4"
                                                placeholder="Nhập bình luận của bạn ở đây..."></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Gửi Bình Luận</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="modal fade respond" id="myModal2" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Chú Ý</h4>
                                </div>
                                <div class="modal-body clearfix"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div id="show_pre_comment_ajax"></div>
                    <div id="zdata" data-postname="abo-bia-do-dan-alpha-doan-menh-mot-long-lam-ca-man"
                        data-posttype="truyen"></div> --}}
                </div>
                {{-- <div class="col-md-3 hidden-sm hidden-xs"></div> --}}
            </div>
        </div>
    @endsection

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/vi.min.js"></script>
    @endpush
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#openCommentModal').click(function() {
                    $('#myModal').modal('show');
                });

                $('#commentForm').on('submit', function(e) {
                    e.preventDefault();

                    var noiDung = $('#comment_content').val().trim();

                    if (!noiDung) {
                        alert('Bạn cần nhập nội dung bình luận trước khi gửi.');
                        return;
                    }

                    var url = $(this).attr('action');

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: url,
                        data: {
                            'noi_dung': noiDung
                        },

                        success: function(response) {
                            hideLoader();
                            if (response.success) {
                                // Đoạn HTML cho bình luận mới
                                var newComment = `
                                    <li>
                                        <div class="comment-author vcard">
                                            <div class="avatar_user_comment">
                                                <img src="${response.binhLuan.user.hinh_anh ? '/storage/' + response.binhLuan.user.hinh_anh : '/assets/admin/images/users/user-dummy-img.jpg'}"
                                                    alt=" " class="avatar-321" />
                                            </div>
                                            <div class="post-comments">
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <span class="fn">
                                                            <a href="#">${response.binhLuan.user.ten_doc_gia}</a>
                                                        </span>
                                                        <span class="ago">(${moment(response.binhLuan.created_at).fromNow()})</span>
                                                    </div>
                                                </div>
                                                <div class="commenttext mt-2">
                                                    <p>${response.binhLuan.noi_dung}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                `;

                                // Thêm bình luận mới vào danh sách
                                $('#commentsList').prepend(newComment);

                                // Xóa nội dung ô nhập
                                $('#comment_content').val('');

                                // Cập nhật số lượng bình luận
                                $('#comments .heading').html(`
                                    <i class="fa fa-comments-o" aria-hidden="true"></i> Bình Luận
                                    (${response.totalComments})
                                `);

                                // Ẩn modal và xóa backdrop
                                document.getElementById('myModal').style.display = 'none';
                                var backdrop = document.querySelector('.modal-backdrop');
                                if (backdrop) {
                                    backdrop.parentNode.removeChild(backdrop);
                                }
                                $('body').removeClass('modal-open');
                                $('.modal-backdrop').remove();
                            } else {
                                alert('Có lỗi xảy ra. Vui lòng thử lại.');
                            }
                        },
                        error: function(xhr) {
                            if (xhr.status === 401) {
                                alert('Bạn cần đăng nhập để bình luận.');
                            } else {
                                alert('Đã xảy ra lỗi, vui lòng thử lại.');
                            }
                            hideLoader();
                        }
                    });
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Khi trang tải xong, hiển thị 3 bình luận đầu tiên
                const commentItems = document.querySelectorAll('#commentsList li');
                const initialToShow = 3;

                // Ẩn tất cả các bình luận ngoài 3 bình luận đầu
                commentItems.forEach((item, index) => {
                    if (index >= initialToShow) {
                        item.style.display = 'none';
                    }
                });

                // Khi người dùng nhấn nút "Xem Thêm Bình Luận"
                document.getElementById('loadMoreComments').addEventListener('click', function() {
                    const hiddenComments = document.querySelectorAll(
                        '#commentsList li[style*="display: none;"]');
                    const maxToShow = 3;

                    let count = 0;

                    // Hiển thị 3 bình luận tiếp theo
                    hiddenComments.forEach((comment) => {
                        if (count < maxToShow) {
                            comment.style.display = 'block';
                            count++;
                        }
                    });

                    // Hiển thị nút "Ẩn Bình Luận" nếu có bình luận được hiển thị thêm
                    if (count > 0) {
                        document.getElementById('hideComments').style.display =
                            'inline-block';
                    }

                    // Kiểm tra nếu không còn bình luận nào ẩn thì ẩn nút "Xem Thêm"
                    if (hiddenComments.length <= maxToShow) {
                        this.style.display = 'none';
                    }
                });

                // Khi người dùng nhấn nút "Ẩn Bình Luận"
                document.getElementById('hideComments').addEventListener('click', function() {
                    const commentItems = document.querySelectorAll('#commentsList li');
                    const initialToShow = 3;

                    let count = 0;

                    // Ẩn tất cả các bình luận ngoài 3 bình luận đầu
                    commentItems.forEach((item, index) => {
                        if (index >= initialToShow) {
                            item.style.display = 'none';
                            count++;
                        }
                    });

                    // Hiển thị lại nút "Xem Thêm Bình Luận" nếu có bình luận bị ẩn
                    if (count > 0) {
                        document.getElementById('loadMoreComments').style.display = 'inline-block';
                    }

                    // Ẩn nút "Ẩn Bình Luận" khi tất cả bình luận bị ẩn lại
                    this.style.display = 'none';
                });
            });
        </script>
    @endpush
