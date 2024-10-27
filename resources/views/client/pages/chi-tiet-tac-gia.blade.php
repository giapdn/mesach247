@extends('client.layouts.app')
@section('content')
    @push('styles')
        <style>
            .author-card {
                background-color: #f9f9f9;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 10px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            }

            .user_avatar_2 img {
                width: 120px;
                height: 120px;
                object-fit: cover;
                border-radius: 50%;
                display: block;
                margin: 0 auto;
            }

            .user_nickname {
                font-size: 22px;
                font-weight: bold;
                margin-bottom: 5px;
            }

            .user_login {
                font-size: 14px;
                margin-bottom: 15px;
                color: #666;
            }

            #user_count .number {
                font-size: 22px;
                font-weight: bold;
            }

            #user_count .text {
                font-size: 14px;
                color: #999;
            }

            .description {
                font-size: 14px;
                color: #777;
            }

            .text-muted {
                color: #888 !important;
            }

            .text-center {
                text-align: center;
            }

            .load_more_tax {
                text-align: center;
            }

            .btn {
                display: inline-block;
                margin: 0 auto;
            }
        </style>
    @endpush
    <div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <span class="fa fa-home"></span> <a href="{{ url('/') }}" itemprop="url">Trang chủ</a>
            </li>
            <li class="breadcrumb-item active">
                Thành Viên
            </li>
            <li class="breadcrumb-item">
                <a href="#">
                    {{ $author->ten_doc_gia }} </a>
            </li>
        </ol>
    </div>

    <div class="container">
        <div class="row">
            <!-- Thông tin tác giả -->
            <div class="col-xs-12 col-md-3">
                <div id="post_author" class="author-card">
                    <div class="user_avatar_parent text-center">
                        <div class="user_avatar_2">
                            <img src="{{ $author->hinh_anh ? Storage::url($author->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg') }}"
                                alt="{{ $author->ten_doc_gia }} Avatar">
                        </div>
                    </div>
                    <h1 class="user_nickname text-center">
                        <span>{{ $author->ten_doc_gia }}</span>
                    </h1>
                    <div class="user_login text-center text-muted"> {{ $author->vai_tros->first()->ten_vai_tro }}</div>
                    <div class="row" id="user_count" style="margin-top: 15px;">
                        <div class="col-xs-4 text-center">
                            <div class="number" style="font-weight: bold; font-size: 20px;">{{ $books->count() }}</div>
                            <div class="text text-muted">Sách</div>
                        </div>
                        <div class="col-xs-4 text-center">
                            <div class="number" style="font-weight: bold; font-size: 20px;">{{ $yeuThichCount }}</div>
                            <div class="text text-muted">Yêu thích</div>
                        </div>
                        <div class="col-xs-4 text-center">
                            <div class="number" style="font-weight: bold; font-size: 20px;">{{ $soLuongSachCount }}</div>
                            <div class="text text-muted">Đã bán</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Danh sách sách -->
            <div class="col-xs-12 col-md-9">
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-book" aria-hidden="true"></i> Sách Quản Lý</h3>
                </div>
                <div id="title-result">
                    <div class="pull-right">
                        <div class="form-group">
                            <select id="filter_keyword_tax" class="form-control" onchange="filterBooks()">
                                <option value="all" {{ $filter == 'all' ? 'selected' : '' }}>Tất Cả</option>
                                <option value="newest" {{ $filter == 'newest' ? 'selected' : '' }}>Sách Mới</option>
                                <option value="updating" {{ $filter == 'updating' ? 'selected' : '' }}>Đang Cập Nhật
                                </option>
                                <option value="new" {{ $filter == 'new' ? 'selected' : '' }}>Đã Full</option>
                                <option value="top-favorite" {{ $filter == 'top-favorite' ? 'selected' : '' }}>🏆Top Yêu
                                    thích</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="content-keyword">
                    <table class="theloai-thumlist">
                        <tbody>
                            @foreach ($books as $book)
                                <tr class="col-md-6 col-sm-6 col-xs-12">
                                    <td>
                                        <a href="{{ route('chi-tiet-sach', $book->id) }}" class="thumbnail"
                                            title="{{ $book->ten_sach }}">
                                            <img src="{{ $book->anh_bia_sach_url }}" alt="{{ $book->ten_sach }}">
                                        </a>
                                    </td>
                                    <td class="text">
                                        <h2 class="crop-text-2">
                                            <a href="{{ route('chi-tiet-sach', $book->id) }}"
                                                title="{{ $book->ten_sach }}">
                                                {{ $book->ten_sach }}
                                            </a>
                                        </h2>
                                        <div class="content">
                                            <p class="crop-text-1 color-gray">
                                                <span class="fa fa-user"></span> Tác giả: {{ $book->tac_gia }}
                                            </p>
                                            <p class="crop-text-2">{{ $book->tom_tat }}</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="load_more_tax text-center">
                        <span class="btn btn-sm btn-in-primary" id="btn-xem-them" data-maxpage="3">Xem Thêm Sách →</span>
                        <span class="btn btn-sm btn-in-primary" id="btn-an-truyen" style="display: none;">Ẩn Sách ←</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function filterBooks() {
            var filter = document.getElementById('filter_keyword_tax').value;

            // Gửi request AJAX
            $.ajax({
                url: '?filter=' + filter,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Xóa nội dung danh sách sách hiện tại
                    var content = '';
                    data.forEach(function(book) {
                        content += `
                <tr class="col-md-6 col-sm-6 col-xs-12">
                    <td>
                        <a href="/sach/${book.id}" class="thumbnail" title="${book.ten_sach}">
                            <img src="${book.anh_bia_sach_url}" alt="${book.ten_sach}">
                        </a>
                    </td>
                    <td class="text">
                        <h2 class="crop-text-2">
                            <a href="/sach/${book.id}" title="${book.ten_sach}">${book.ten_sach}</a>
                        </h2>
                        <div class="content">
                            <p class="crop-text-1 color-gray">
                                <span class="fa fa-user"></span> Tác giả: ${book.tac_gia}
                            </p>
                            <p class="crop-text-2">${book.tom_tat}</p>
                            
                            ${book.nguoi_yeu_thich_count ? 
                            `<p class="crop-text-2">
                                            <span class="fa fa-heart"></span> Yêu thích: ${book.nguoi_yeu_thich_count} lượt
                                        </p>` : ''}
                        </div>
                    </td>
                </tr>`;
                    });

                    // Cập nhật nội dung bảng sách
                    $('#content-keyword tbody').html(content);
                },
                error: function(xhr) {
                    console.log('Đã xảy ra lỗi trong khi tải sách.');
                }
            });
        }

        // Gắn sự kiện change vào dropdown để gọi filterBooks
        document.getElementById('filter_keyword_tax').addEventListener('change', filterBooks);
    </script>
    <script>
        var storageBaseUrl = "{{ Storage::url('') }}"; // Trả về base URL của thư mục storage
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const booksPerPage = 10;
            let currentPage = 1;

            function updateBooksDisplay() {
                const rows = document.querySelectorAll('#content-keyword tbody tr');
                const totalBooks = rows.length;

                rows.forEach((row, index) => {
                    row.style.display = (index < booksPerPage * currentPage) ? '' : 'none';
                });

                // Hiển thị hoặc ẩn nút "Xem Thêm Truyện" nếu còn sách để xem
                const xemThemButton = document.getElementById('btn-xem-them');
                const anTruyenButton = document.getElementById('btn-an-truyen');

                xemThemButton.style.display = (booksPerPage * currentPage < totalBooks) ? 'inline-block' : 'none';
                anTruyenButton.style.display = (currentPage > 1) ? 'inline-block' : 'none';
            }

            // Xử lý khi nhấn nút "Xem Thêm Truyện"
            document.getElementById('btn-xem-them').addEventListener('click', function() {
                currentPage++;
                updateBooksDisplay();
            });

            // Xử lý khi nhấn nút "Ẩn Truyện"
            document.getElementById('btn-an-truyen').addEventListener('click', function() {
                currentPage = 1;
                updateBooksDisplay();
            });

            // Gọi hàm updateBooksDisplay ban đầu để hiển thị sách
            updateBooksDisplay();
        });
    </script>
@endpush
