{{-- @extends('client.layouts.app')
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
@endpush --}}


@extends('client.layouts.app')
@section('content')
    <div class="clearfix"></div>
    <div class="container">
        <div id="ads-header" class="text-center" style="margin-bottom: 10px"></div>
    </div>
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <span class="fa fa-home"></span> <a href="https://truyenhdt.com/" itemprop="url">Home</a>
            </li>
            <li class="breadcrumb-item active">
                Thành Viên
            </li>
            <li class="breadcrumb-item">
                <a href="https://truyenhdt.com/author/vinnita">
                    Vinita </a>
            </li>
        </ol>
    </div>
    <style>
        /* Container chính */
        .main-container {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .author-info-section {
    height: 450px;
    display: flex;
    align-items: center;
    justify-content: center; /* Centering content horizontally */
    margin-bottom: 20px;
    padding: 130px;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 70%, rgba(255, 255, 255, 1) 70%), url('{{ asset('assets/client/img/banner-author.png') }}') no-repeat center center;
    background-size: cover;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    color: #ffffff;
}

.author-stats-section {
    margin-top: 280px;
    display: flex; /* This will align the child divs horizontally */
    gap: 20px; /* Adds space between each stats div */
    /* Optional: Add specific styles for positioning or additional visual tweaks */

}



        .author-info-section img {
            margin-top: 190px;
            width: 150px;
            height: 150px;
            border-radius: 10%;
            border: 5px solid white;
            margin-right: 20px;
            object-fit: cover;
        }

        .author-details-section {
            color: #000;
            flex-grow: 1;
            padding-top: 250px;
        }

        .author-details-section h1 {
            font-size: 1.8em;
            margin-bottom: 10px;
        }

        .author-stats-section {
            display: flex;
            justify-content: space-around;
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

        .author-stats-section div {
            display: flex;
            flex-direction: column;
        }

        .author-stats-section span {
            font-weight: bold;
            font-size: 1.2em;
        }

        .follow-btn-section {
            border: 2px solid #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: white;
            color: #4CAF50;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .follow-btn-section:hover {
            background-color: #4CAF50;
            color: white;
        }
    </style>
    <div class="container">
        <!-- Phần đầu với avatar và thông tin -->
        <section class="author-info-section">
            <img src="{{ asset('assets/client/img/banner2.jpg') }}" alt="Tác giả">
            <div class="author-details-section">
                <h1>Từ Dạ</h1>
                <p>tuda.snv</p>
            </div>
            <div class="author-stats-section">
                <div>
                    <span>3</span>
                    <p>Số truyện</p>
                </div>
                <div>
                    <span>830</span>
                    <p>Người theo dõi</p>
                </div>
                <div>
                    <span>159</span>
                    <p>Đề cử</p>
                </div>
                <button class="follow-btn-section">+ THEO DÕI</button>
            </div>
        </section>

        <!-- Thông tin thống kê -->
        {{-- <div class="author-stats-section">
            <div>
                <span>3</span>
                <p>Số truyện</p>
            </div>
            <div>
                <span>830</span>
                <p>Người theo dõi</p>
            </div>
            <div>
                <span>159</span>
                <p>Đề cử</p>
            </div>
            <button class="follow-btn-section">+ THEO DÕI</button>
        </div> --}}


    </div>




    <div class="container tax">
        <div class="row">
            {{-- <div class="col-xs-12 col-md-3">
                <div id="post_author">
                    <div class="max-width">
                        <div class="user_avatar_parent">
                            <div class="user_avatar_2">
                                <img src="https://truyenhdt.com/img/user/vinnita-1724640086.jpg">
                            </div>
                        </div>
                        <h1 data-term="author:802569" class="user_nickname"><span style="color:#000000">Vinita</span>
                        </h1>
                        <div class="user_login">Thành Viên</div>
                        <div class="text-center">
                            <style type="text/css">
                                .user-badge img {
                                    width: 20px;
                                }
                            </>
                            <span id="sms">
                            </span>
                            <span id="follow"></span>

                        </div>
                        <div class="row" id="user_count">
                            <div class="col-xs-4">
                                <div class="number">28</div>
                                <div class="text">Truyện</div>
                            </div>
                            <div class="col-xs-4">
                                <div class="number">0</div>
                                <div class="text">Following</div>
                            </div>
                            <div class="col-xs-4">
                                <div class="number">12</div>
                                <div class="text">Follower</div>
                            </div>
                            <div class="col-xs-4">
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="description">
                        Chưa có giới thiệu </div>
                </div>
            </div> --}}
            <div class="col-xs-12 col-md-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                    </div>
                </div>
                <div class="h3">
                    <h3 class="heading"><i class="fa fa-book" aria-hidden="true"></i> Truyện Quản Lý</h3>
                </div>
                <div id="content-keyword">
                    <div id="title-result">
                        <div class="pull-left">
                            28 Truyện </div>
                        <div class="pull-right">
                            <div class="form-group">
                                <select id="filter_keyword_tax" class="form-control">
                                    <option value="new-chap">Mới Cập Nhật</option>
                                    <option value="ticket_new">Mới Được Đẩy</option>
                                    <option value="new">Truyện Mới</option>
                                    <option value="new-full">Hoàn Thành</option>
                                    <option value="top-ticket-week">🏆Top Đề Cử - Tuần</option>
                                    <option value="top-ticket-month">🏆Top Đề Cử - Tháng</option>
                                    <option value="top-ticket-total">🏆Top Đề Cử - Tất Cả</option>
                                    <option value="top-revenue-week">💸Top Doanh Thu - Tuần</option>
                                    <option value="top-revenue-month">💸Top Doanh Thu - Tháng</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <table class="theloai-thumlist">
                        <tbody>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/xuyen-sach-roi-ta-bi-bon-dai-lao-duoi-theo-sung"
                                        class="thumbnail" title="Xuyên Sách Rồi Ta Bị Bốn Đại Lão Đuổi Theo Sủng">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/11759157-1728028123.jpg"
                                            alt="Xuyên Sách Rồi Ta Bị Bốn Đại Lão Đuổi Theo Sủng" itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/xuyen-sach-roi-ta-bi-bon-dai-lao-duoi-theo-sung"
                                            title="Xuyên Sách Rồi Ta Bị Bốn Đại Lão Đuổi Theo Sủng" itemprop="url">
                                            Xuyên Sách Rồi Ta Bị Bốn Đại Lão Đuổi Theo Sủng </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/hoa-nhat-v/" rel="tag">Hòa Nhật
                                                    V</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">[Nhiều nam chính + Tu la tràng +
                                            Cạnh tranh nam + Nhiều ngoại truyện, nhiều kết cục]Quý Thanh Diều xuyên sách
                                            rồi, nhiệm vụ là cùng lúc công&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/tieu-giong-cai-la-van-nhan-me-duong-mot-o-long-xu-xu"
                                        class="thumbnail" title="Tiểu Giống Cái Là Vạn Nhân Mê, Dưỡng Một Ổ Lông Xù Xù">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/tieu-giong-cai-la-van-nhan-me-duong-mot-o-long-xu-xu-1728587866.jpg"
                                            alt="Tiểu Giống Cái Là Vạn Nhân Mê, Dưỡng Một Ổ Lông Xù Xù" itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/tieu-giong-cai-la-van-nhan-me-duong-mot-o-long-xu-xu"
                                            title="Tiểu Giống Cái Là Vạn Nhân Mê, Dưỡng Một Ổ Lông Xù Xù" itemprop="url">
                                            Tiểu Giống Cái Là Vạn Nhân Mê, Dưỡng Một Ổ Lông Xù Xù </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/nhat-ca-cuong-chinh-bat-a-dich-nu-nhan/"
                                                    rel="tag">Nhất Cá Cương Chính Bất A Đích Nữ Nhân</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">Xuyên không trở thành một trong
                                            những giống cái đỉnh cấp quý hiếm nhất, Tô Nại buộc phải khám phá bí mật về
                                            sự trường thọ của các thú&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/nguy-trang-thanh-huong-dao-chua-lanh-nhom-linh-gac-thich-toi-thanh-nghien"
                                        class="thumbnail"
                                        title="Ngụy Trang Thành Hướng Đạo Chữa Lành, Nhóm Lính Gác Thích Tôi Thành Nghiện">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/nguy-trang-thanh-huong-dao-chua-lanh-nhom-linh-gac-thich-toi-thanh-nghien-1728660520.jpg"
                                            alt="Ngụy Trang Thành Hướng Đạo Chữa Lành, Nhóm Lính Gác Thích Tôi Thành Nghiện"
                                            itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <span class="label-title label-new"></span>
                                        <a href="https://truyenhdt.com/truyen/nguy-trang-thanh-huong-dao-chua-lanh-nhom-linh-gac-thich-toi-thanh-nghien"
                                            title="Ngụy Trang Thành Hướng Đạo Chữa Lành, Nhóm Lính Gác Thích Tôi Thành Nghiện"
                                            itemprop="url">
                                            Ngụy Trang Thành Hướng Đạo Chữa Lành, Nhóm Lính Gác Thích Tôi Thành Nghiện
                                        </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/o-mai-tay-qua/" rel="tag">Ô
                                                    Mai
                                                    Tây Qua</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">Sau khi dung nhập với quỷ đằng
                                            (dây leo quỷ) và có được năng lực cắn nuốt, Ninh Du tỉnh dậy trong thời đại
                                            tinh tế tương lai. Vừa&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/dai-tan-de-nhat-bat-sat" class="thumbnail"
                                        title="Đại Tấn Đệ Nhất Bát Sắt">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/dai-tan-de-nhat-bat-sat-1728414233.jpg"
                                            alt="Đại Tấn Đệ Nhất Bát Sắt" itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/dai-tan-de-nhat-bat-sat"
                                            title="Đại Tấn Đệ Nhất Bát Sắt" itemprop="url">
                                            Đại Tấn Đệ Nhất Bát Sắt </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/hoa-but-xao-xao/"
                                                    rel="tag">Họa
                                                    Bút Xao Xao</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">Hoa Trường Hi xuyên không đến
                                            triều Đại Tấn, một thời đại võ đạo thịnh hành. Cha của nàng là một đầu lĩnh
                                            bắt tội phạm của Lục Phiến&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/thu-the-kieu-sung-xuyen-sach-xong-ta-tro-thanh-van-nhan-me"
                                        class="thumbnail"
                                        title="Thú Thế Kiều Sủng: Xuyên Sách Xong Ta Trở Thành Vạn Nhân Mê">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/11785390-1728470422.jpg"
                                            alt="Thú Thế Kiều Sủng: Xuyên Sách Xong Ta Trở Thành Vạn Nhân Mê"
                                            itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/thu-the-kieu-sung-xuyen-sach-xong-ta-tro-thanh-van-nhan-me"
                                            title="Thú Thế Kiều Sủng: Xuyên Sách Xong Ta Trở Thành Vạn Nhân Mê"
                                            itemprop="url">
                                            Thú Thế Kiều Sủng: Xuyên Sách Xong Ta Trở Thành Vạn Nhân Mê </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/thanh-ninh-dong-can/"
                                                    rel="tag">Thanh Nịnh Đống Càn</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">(Nhiều đực ít cái + Sinh con +
                                            Nuôi con + Xây dựng và trồng trọt + Bệnh mỹ nhân + Nam chính sạch hoàn toàn
                                            + Sủng ngọt&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/hoa-hong-hong-kong-chi-mot-cai-liec-nhin-khien-dai-lao-bac-kinh-cong-moi"
                                        class="thumbnail"
                                        title="Hoa Hồng Hồng Kông Chỉ Một Cái Liếc Nhìn Khiến Đại Lão Bắc Kinh Cong Môi">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/hoa-hong-hong-kong-chi-mot-cai-liec-nhin-khien-dai-lao-bac-kinh-cong-moi-1728397204.jpg"
                                            alt="Hoa Hồng Hồng Kông Chỉ Một Cái Liếc Nhìn Khiến Đại Lão Bắc Kinh Cong Môi"
                                            itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/hoa-hong-hong-kong-chi-mot-cai-liec-nhin-khien-dai-lao-bac-kinh-cong-moi"
                                            title="Hoa Hồng Hồng Kông Chỉ Một Cái Liếc Nhìn Khiến Đại Lão Bắc Kinh Cong Môi"
                                            itemprop="url">
                                            Hoa Hồng Hồng Kông Chỉ Một Cái Liếc Nhìn Khiến Đại Lão Bắc Kinh Cong Môi
                                        </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/canh-lac-tich-moc/"
                                                    rel="tag">Cảnh Lạc Tích Mộc</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">[Công chúa nhỏ Hồng Kông x Đại lão
                                            Bắc Kinh] [Yêu tinh quyến rũ x Nhân vật âm hiểm thâm trầm]&quot;Diêm vương
                                            sống&quot; của Bắc Kinh, Chu Mặc Thời&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/thap-nien-70-linh-giai-ngu-tho-lo-bi-toi-mang-nhanh-phat-len"
                                        class="thumbnail"
                                        title="Thập Niên 70, Lính Giải Ngũ Thô Lỗ Bị Tôi Mang Nhanh Phất Lên">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11663364-1726602095.jpg"
                                            alt="Thập Niên 70, Lính Giải Ngũ Thô Lỗ Bị Tôi Mang Nhanh Phất Lên"
                                            itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/thap-nien-70-linh-giai-ngu-tho-lo-bi-toi-mang-nhanh-phat-len"
                                            title="Thập Niên 70, Lính Giải Ngũ Thô Lỗ Bị Tôi Mang Nhanh Phất Lên"
                                            itemprop="url">
                                            Thập Niên 70, Lính Giải Ngũ Thô Lỗ Bị Tôi Mang Nhanh Phất Lên </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/that-so-cuu/" rel="tag">Thất
                                                    Sơ
                                                    Cửu</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">Khương Trừng, một phiên dịch viên
                                            thành thạo năm ngôn ngữ đã xuyên không vào trong sách. Trong truyện, nguyên
                                            chủ là một cô gái mồ côi cha mẹ,&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/phu-quan-doat-duoc-giua-duong-han-khong-binh-thuong"
                                        class="thumbnail" title="Phu Quân Đoạt Được Giữa Đường, Hắn Không Bình Thường">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/phu-quan-doat-duoc-giua-duong-han-khong-binh-thuong-1728328258.jpg"
                                            alt="Phu Quân Đoạt Được Giữa Đường, Hắn Không Bình Thường" itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/phu-quan-doat-duoc-giua-duong-han-khong-binh-thuong"
                                            title="Phu Quân Đoạt Được Giữa Đường, Hắn Không Bình Thường" itemprop="url">
                                            Phu Quân Đoạt Được Giữa Đường, Hắn Không Bình Thường </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/on-khinh/" rel="tag">Ôn
                                                    Khinh</a>
                                            </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">Cha mẹ song thân đều mất, Ngu
                                            Thính Vãn phải sống nhờ nhà người thân, làm việc quần quật từ sáng sớm đến
                                            khuya mà không một lời oán&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/ac-doc-giong-cai-sieu-mem-dai-lao-tinh-te-khong-kim-duoc"
                                        class="thumbnail"
                                        title="Ác Độc Giống Cái Siêu Mềm, Đại Lão Tinh Tế Không Kìm Được">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/11775918-1728318980.jpg"
                                            alt="Ác Độc Giống Cái Siêu Mềm, Đại Lão Tinh Tế Không Kìm Được"
                                            itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/ac-doc-giong-cai-sieu-mem-dai-lao-tinh-te-khong-kim-duoc"
                                            title="Ác Độc Giống Cái Siêu Mềm, Đại Lão Tinh Tế Không Kìm Được"
                                            itemprop="url">
                                            Ác Độc Giống Cái Siêu Mềm, Đại Lão Tinh Tế Không Kìm Được </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/nguyet-ha-kim-ket/"
                                                    rel="tag">Nguyệt Hạ Kim Kết</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">Giống cái ác độc thì đã sao, nhắm
                                            mắt vẫn có thể đánh bại toàn bộ tinh tế!Giây trước Quân Y Lạc còn đang trong
                                            phòng thí nghiệm điều&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/ban-trai-khong-phai-nguoi-xong-roi-toi-lai-cang-yeu-hon"
                                        class="thumbnail"
                                        title="Bạn Trai Không Phải Người? Xong Rồi, Tôi Lại Càng Yêu Hơn!">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11651281-1726414143.jpg"
                                            alt="Bạn Trai Không Phải Người? Xong Rồi, Tôi Lại Càng Yêu Hơn!"
                                            itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/ban-trai-khong-phai-nguoi-xong-roi-toi-lai-cang-yeu-hon"
                                            title="Bạn Trai Không Phải Người? Xong Rồi, Tôi Lại Càng Yêu Hơn!"
                                            itemprop="url">
                                            Bạn Trai Không Phải Người? Xong Rồi, Tôi Lại Càng Yêu Hơn! </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/mieu-mao-nho/" rel="tag">Miêu
                                                    Mao
                                                    Nho</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">Sở Tương nhận được một thẻ trò
                                            chơi có tên là “Trái tim nhảy tưng tưng!” với bao bì cũ kỹ và hình trái tim
                                            màu hồng đầy nữ&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/sau-khi-xuyen-vao-truyen-ngot-van-tro-thanh-ban-gai-cu-doc-ac-cua-tong-tai-ba-dao"
                                        class="thumbnail"
                                        title="Sau Khi Xuyên Vào Truyện Ngọt Văn Trở Thành Bạn Gái Cũ Độc Ác Của Tổng Tài Bá Đạo">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11647950-1726372482.jpg"
                                            alt="Sau Khi Xuyên Vào Truyện Ngọt Văn Trở Thành Bạn Gái Cũ Độc Ác Của Tổng Tài Bá Đạo"
                                            itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/sau-khi-xuyen-vao-truyen-ngot-van-tro-thanh-ban-gai-cu-doc-ac-cua-tong-tai-ba-dao"
                                            title="Sau Khi Xuyên Vào Truyện Ngọt Văn Trở Thành Bạn Gái Cũ Độc Ác Của Tổng Tài Bá Đạo"
                                            itemprop="url">
                                            Sau Khi Xuyên Vào Truyện Ngọt Văn Trở Thành Bạn Gái Cũ Độc Ác Của Tổng Tài
                                            Bá Đạo </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/mieu-mao-nho/" rel="tag">Miêu
                                                    Mao
                                                    Nho</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">Sở Nghiên tỉnh dậy ở bệnh viện,
                                            không còn nhớ gì về quá khứ. Ký ức mơ hồ duy nhất còn sót lại là cảm giác
                                            như mình đã&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/du-loai-quan-lai-thuong-trieu-ta-an-dua-nu-gia-nam-trang-lam-danh-tuong"
                                        class="thumbnail"
                                        title="Đủ Loại Quan Lại Thượng Triều Ta Ăn Dưa, Nữ Giả Nam Trang Làm Danh Tướng">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/11759962.jpg"
                                            alt="Đủ Loại Quan Lại Thượng Triều Ta Ăn Dưa, Nữ Giả Nam Trang Làm Danh Tướng"
                                            itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/du-loai-quan-lai-thuong-trieu-ta-an-dua-nu-gia-nam-trang-lam-danh-tuong"
                                            title="Đủ Loại Quan Lại Thượng Triều Ta Ăn Dưa, Nữ Giả Nam Trang Làm Danh Tướng"
                                            itemprop="url">
                                            Đủ Loại Quan Lại Thượng Triều Ta Ăn Dưa, Nữ Giả Nam Trang Làm Danh Tướng
                                        </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/gia-gia-gia-tu-ke/"
                                                    rel="tag">Gia
                                                    Gia Gia Tử Kê</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">Trời còn chưa sáng, Lâm Vi Chi đã
                                            buộc phải đi lên triều. Lâm Vi Chi tỏ vẻ: “Nữ giả nam đã đành, giờ còn phải
                                            đi chầu sớm,&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/ca-nha-phao-hoi-doc-tam-ta-tram-me-cot-truyen-sup-do"
                                        class="thumbnail" title="Cả Nhà Pháo Hôi Đọc Tâm Ta, Trầm Mê Cốt Truyện Sụp Đổ">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/ca-nha-phao-hoi-doc-tam-ta-tram-me-cot-truyen-sup-do-1727880343.jpg"
                                            alt="Cả Nhà Pháo Hôi Đọc Tâm Ta, Trầm Mê Cốt Truyện Sụp Đổ"
                                            itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/ca-nha-phao-hoi-doc-tam-ta-tram-me-cot-truyen-sup-do"
                                            title="Cả Nhà Pháo Hôi Đọc Tâm Ta, Trầm Mê Cốt Truyện Sụp Đổ" itemprop="url">
                                            Cả Nhà Pháo Hôi Đọc Tâm Ta, Trầm Mê Cốt Truyện Sụp Đổ </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/hoi-khieu-vu-dich-vien-con-con/"
                                                    rel="tag">Hội Khiêu Vũ Đích Viên Cổn Cổn</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">[Xuyên sách + Cả nhà thuật đọc tâm
                                            + Đoàn sủng + Hệ thống]Dao Quang Nguyệt xuyên vào sách, trở thành một em bé
                                            mới sinh nhưng sắp bị&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/xuyen-thanh-au-te-sieu-hiem-bi-toan-tinh-te-doan-sung"
                                        class="thumbnail" title="Xuyên Thành Ấu Tể Siêu Hiếm, Bị Toàn Tinh Tế Đoàn Sủng">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/11760578.jpg"
                                            alt="Xuyên Thành Ấu Tể Siêu Hiếm, Bị Toàn Tinh Tế Đoàn Sủng"
                                            itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/xuyen-thanh-au-te-sieu-hiem-bi-toan-tinh-te-doan-sung"
                                            title="Xuyên Thành Ấu Tể Siêu Hiếm, Bị Toàn Tinh Tế Đoàn Sủng" itemprop="url">
                                            Xuyên Thành Ấu Tể Siêu Hiếm, Bị Toàn Tinh Tế Đoàn Sủng </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/cam-li-te-te/" rel="tag">Cẩm
                                                    Lí
                                                    Tể Tể</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">(Đoàn sủng trong tinh tế, ấu tể dễ
                                            thương trưởng thành, chữa lành, học hành, người thú dị chủng) Ngư Bảo bị
                                            Diệu Tổ đẩy xuống giếng, vô tình&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/xuyen-qua-thu-the-muon-van-hung-thu-quy-cau-ta-sung-ai"
                                        class="thumbnail" title="Xuyên Qua Thú Thế: Muôn Vàn Hùng Thú Quỳ Cầu Ta Sủng Ái">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/11620992-1725974234.jpg"
                                            alt="Xuyên Qua Thú Thế: Muôn Vàn Hùng Thú Quỳ Cầu Ta Sủng Ái"
                                            itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/xuyen-qua-thu-the-muon-van-hung-thu-quy-cau-ta-sung-ai"
                                            title="Xuyên Qua Thú Thế: Muôn Vàn Hùng Thú Quỳ Cầu Ta Sủng Ái"
                                            itemprop="url">
                                            Xuyên Qua Thú Thế: Muôn Vàn Hùng Thú Quỳ Cầu Ta Sủng Ái </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/chap-cuu-kiem/" rel="tag">Chấp
                                                    Cửu Kiếm</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">Đồ Linh trong tận thế dựa vào dị
                                            năng mà hô mưa gọi gió, lại ngoài ý muốn xuyên qua đến thú thế. Nơi đây,
                                            giống cái rất hiếm&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/luu-day-diet-quoc-nang-don-khong-quoc-kho-mang-nhai-con-tao-phan"
                                        class="thumbnail"
                                        title="Lưu Đày? Diệt Quốc? Nàng Dọn Không Quốc Khố Mang Nhãi Con Tạo Phản">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/luu-day-diet-quoc-nang-don-khong-quoc-kho-mang-nhai-con-tao-phan-1727914424.jpg"
                                            alt="Lưu Đày? Diệt Quốc? Nàng Dọn Không Quốc Khố Mang Nhãi Con Tạo Phản"
                                            itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/luu-day-diet-quoc-nang-don-khong-quoc-kho-mang-nhai-con-tao-phan"
                                            title="Lưu Đày? Diệt Quốc? Nàng Dọn Không Quốc Khố Mang Nhãi Con Tạo Phản"
                                            itemprop="url">
                                            Lưu Đày? Diệt Quốc? Nàng Dọn Không Quốc Khố Mang Nhãi Con Tạo Phản </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/bach-dao-diem-chuc/"
                                                    rel="tag">Bạch Đào Điềm Chúc</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">[Đại lão xuyên sách + dọn sạch
                                            quốc khố + không gian tích trữ + trồng trọt làm giàu + lưu đày nuôi con]Đang
                                            hưởng thụ mỹ nam thì&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/sau-khi-nghe-hieu-dam-long-xu-noi-chuyen-toi-mang-to-quoc-bay"
                                        class="thumbnail"
                                        title="Sau Khi Nghe Hiểu Đám Lông Xù Nói Chuyện, Tôi Mang Tổ Quốc Bay">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/09/sau-khi-nghe-hieu-dam-long-xu-noi-chuyen-toi-mang-to-quoc-bay-1726236844.jpg"
                                            alt="Sau Khi Nghe Hiểu Đám Lông Xù Nói Chuyện, Tôi Mang Tổ Quốc Bay"
                                            itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/sau-khi-nghe-hieu-dam-long-xu-noi-chuyen-toi-mang-to-quoc-bay"
                                            title="Sau Khi Nghe Hiểu Đám Lông Xù Nói Chuyện, Tôi Mang Tổ Quốc Bay"
                                            itemprop="url">
                                            Sau Khi Nghe Hiểu Đám Lông Xù Nói Chuyện, Tôi Mang Tổ Quốc Bay </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/lat-dieu-gia-ma/"
                                                    rel="tag">Lạt
                                                    Điều Gia Ma</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">[Đọc tâm động vật + Vả mặt + Đoàn
                                            sủng + Tu La tràng + Yêu nước + Con gái yêu quý của nhà nước lớn + Nhẹ
                                            nhàng&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                            <tr class="col-md-6 col-sm-6 col-xs-12" itemscope itemtype="https://schema.org/Book">
                                <td>
                                    <meta itemprop="bookFormat" content="EBook" />
                                    <a href="https://truyenhdt.com/truyen/uong-sua-bi-doc-tam-thao-thiet-nhai-con-thanh-kinh-thanh-doan-sung"
                                        class="thumbnail"
                                        title="Uống Sữa Bị Đọc Tâm, Thao Thiết Nhãi Con Thành Kinh Thành Đoàn Sủng">
                                        <img src="data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs="
                                            data-src="https://truyenhdt.com/wp-content/uploads/2024/10/uong-sua-bi-doc-tam-thao-thiet-nhai-con-thanh-kinh-thanh-doan-sung-1727883622.jpg"
                                            alt="Uống Sữa Bị Đọc Tâm, Thao Thiết Nhãi Con Thành Kinh Thành Đoàn Sủng"
                                            itemprop="image" />
                                    </a>
                                </td>
                                <td class="text">
                                    <h2 class="crop-text-2" itemprop="name">
                                        <a href="https://truyenhdt.com/truyen/uong-sua-bi-doc-tam-thao-thiet-nhai-con-thanh-kinh-thanh-doan-sung"
                                            title="Uống Sữa Bị Đọc Tâm, Thao Thiết Nhãi Con Thành Kinh Thành Đoàn Sủng"
                                            itemprop="url">
                                            Uống Sữa Bị Đọc Tâm, Thao Thiết Nhãi Con Thành Kinh Thành Đoàn Sủng </a>
                                    </h2>
                                    <div class="content">
                                        <p class="crop-text-1 color-gray">
                                            <span class="fa fa-user"></span> Tác giả:
                                            <span itemprop="author">
                                                <a href="https://truyenhdt.com/tac-gia/thinh-thinh-bat-thinh/"
                                                    rel="tag">Thính Thính Bất Thính</a> </span>
                                        </p>
                                        <p class="crop-text-2" itemprop="description">Trên trời chỉ có một con tiểu Thao
                                            Thiết duy nhất hạ phàm, hạ phàm mới phát hiện quả thực đúng như lời Thiên
                                            Đạo cha nói: Có quyền&nbsp;&hellip;</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="load_more_tax text-center"><span class="btn btn-sm btn-in-primary" data-maxpage="3">Xem
                            Thêm Truyện →</span></div>
                </div>
            </div>
        </div>
    </div>
@endsection
