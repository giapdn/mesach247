@extends('client.layouts.app')
@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/client/home.css') }}">
    @endpush
    @push('scripts')
        <script src="{{ asset('js/client/home.js') }}"></script>
    @endpush

    @if(session('success'))
        <script>
            Swal.fire({
                title: "Thành công !",
                text: "{{session('success')}}",
                icon: "success"
            });
        </script>
    @elseif(session('error'))
        <script>
            Swal.fire({
                title: "Thất bại",
                text: "{{session('error')}}",
                icon: "error"
            });
        </script>
    @endif

    <style>
        .order-widget {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 430px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
            border-radius: 8px;
            padding: 20px;
            z-index: 1000;
            font-family: Arial, sans-serif;
        }

        .order-widget h1 {
            font-size: 1.4em;
            margin: 0 0 15px;
            color: #333;
            text-align: center;
        }

        .order-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #eee;
            border-radius: 5px;
            background-color: #fff;
            transition: box-shadow 0.3s;
        }

        .order-container:hover {
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .order-header {
            font-weight: bold;
            font-size: 1em;
            color: #555;
        }

        .timer {
            color: #e63946;
            font-size: 0.9em;
        }

        .buy-again {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 0.9em;
            transition: background-color 0.3s;
        }

        .buy-again:hover {
            background-color: #0056b3;
        }

        #order-list {
            max-height: calc(3 * 60px + 30px);
            overflow-y: auto;
        }
    </style>

    <div class="order-widget box" style="display: none">
        <h1>Bạn có đơn hàng chưa hoàn thành !</h1>
        <div id="order-list">
            <!-- Các đơn hàng sẽ được thêm vào đây -->
        </div>
    </div>

    <script>
        let orders = [];
        let timerInterval = null; // Biến lưu trữ interval
        const orderList = document.getElementById('order-list');
        const userId = @json(auth()->user()->id ?? null);

        if (userId) {
            document.addEventListener('DOMContentLoaded', () => {
                fetch(`/api/don-hang/dang-xu-ly/${userId}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.length > 0) {
                            console.log('Dữ liệu đơn hàng:', data);
                            orders = data.map(order => ({
                                ...order,
                                timeLeft: order.timeLeft || 0,
                            }));
                            displayOrders();

                            // Đảm bảo chỉ chạy setInterval một lần
                            if (!timerInterval) {
                                timerInterval = setInterval(updateTimers, 1000);
                            }
                        }
                    })
                    .catch(error => console.error('Lỗi khi lấy dữ liệu:', error));
            });
        }

        // function displayOrders() {
        //     document.querySelector('.order-widget.box').style.display = ''
        //     orderList.innerHTML = '';
        //     orders.forEach(order => {
        //         const orderDiv = document.createElement('div');
        //         orderDiv.classList.add('order-container');
        //         orderDiv.id = `order-${order.id}`; // Gán ID cho mỗi đơn hàng
        //
        //         const orderHeader = document.createElement('div');
        //         orderHeader.classList.add('order-header');
        //         orderHeader.textContent = `Mã đơn: ${order.name}`;
        //
        //         const timerDiv = document.createElement('div');
        //         timerDiv.classList.add('timer');
        //         timerDiv.textContent = formatTime(order.timeLeft);
        //
        //         const buyAgainButton = document.createElement('button');
        //         buyAgainButton.classList.add('buy-again');
        //         buyAgainButton.textContent = 'Thanh toán';
        //
        //         // Xử lý logic mua lại ngay
        //         buyAgainButton.addEventListener('click', () => {
        //             if (order.payment_link) {
        //                 window.open(order.payment_link, '_blank');
        //             } else {
        //                 alert('Không có liên kết thanh toán!');
        //             }
        //         });
        //
        //         orderDiv.appendChild(orderHeader);
        //         orderDiv.appendChild(timerDiv);
        //         orderDiv.appendChild(buyAgainButton);
        //
        //         orderList.appendChild(orderDiv);
        //
        //         // Lưu tham chiếu đến phần tử bộ đếm
        //         order.timerElement = timerDiv;
        //         order.element = orderDiv; // Tham chiếu đến chính DOM element
        //     });
        // }

        function displayOrders() {
            document.querySelector('.order-widget.box').style.display = '';
            orderList.innerHTML = ''; // Xóa nội dung cũ
            orders.forEach(order => {
                const orderDiv = document.createElement('div');
                orderDiv.classList.add('order-container');
                orderDiv.id = `order-${order.id}`; // Gán ID cho mỗi đơn hàng

                const orderHeader = document.createElement('div');
                orderHeader.classList.add('order-header');
                orderHeader.textContent = `Mã đơn: ${order.name}`;

                const timerDiv = document.createElement('div');
                timerDiv.classList.add('timer');
                timerDiv.textContent = formatTime(order.timeLeft);

                const buyAgainButton = document.createElement('button');
                buyAgainButton.classList.add('buy-again');
                buyAgainButton.textContent = 'Thanh toán';

                // Xử lý logic mua lại ngay
                buyAgainButton.addEventListener('click', () => {
                    if (order.payment_link) {
                        window.open(order.payment_link, '_blank');
                    } else {
                        alert('Không có liên kết thanh toán!');
                    }
                });

                orderDiv.appendChild(orderHeader);
                orderDiv.appendChild(timerDiv);
                orderDiv.appendChild(buyAgainButton);

                orderList.appendChild(orderDiv);

                // Lưu tham chiếu đến phần tử bộ đếm
                order.timerElement = timerDiv;
                order.element = orderDiv; // Tham chiếu đến chính DOM element
            });
        }

        function formatTime(seconds) {
            const minutes = Math.floor(seconds / 60);
            const secs = seconds % 60;
            return `${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
        }

        function updateTimers() {
            orders = orders.filter(order => {
                if (order.timeLeft > 0) {
                    order.timeLeft--;
                    order.timerElement.textContent = formatTime(order.timeLeft);
                    return true; // Giữ lại đơn hàng còn thời gian
                } else {
                    // Ẩn phần tử DOM khi hết hạn
                    order.element.style.display = 'none';
                    return false; // Loại bỏ đơn hàng khỏi danh sách
                }
            });

            // Nếu không còn đơn hàng nào, dừng interval
            if (orders.length === 0 && timerInterval) {
                document.querySelector('.order-widget.box').style.display = 'none'
                clearInterval(timerInterval);
                timerInterval = null;
            }
        }
    </script>


    <!-- Slider -->
    <!-- Snowfall Effect Container -->
    <div class="snow-container">
        <!-- Snowflakes -->
        <div class="snow">
            <div class="snowflake">❄</div>
            <div class="snowflake">❅</div>
            <div class="snowflake">❆</div>
            <!-- Add more snowflakes if needed -->
        </div>

        <!-- Slider -->
        <div class="slider-cont" id="sliderbanner">
            @if (!is_null($slider))
                @foreach ($slider->hinhAnhBanner as $item)
                    <div class="sliderbanner-item">
                        <a href="#" target="_blank">
                            <img src="{{ Storage::url($item->hinh_anh) }}" alt="Banner Image"/>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="sliderbanner-item">
                    <a href="#" target="_blank">
                        <img src="{{ asset('assets/client/slide/truyen/slide2.gif') }}" alt="Banner Image"/>
                    </a>
                </div>
            @endif
        </div>
    </div>



    <!-- Main content -->
    <div class="container ztop-10">
        <!-- Đổ ra các row sách từ controller truyền zo -->
        @foreach($sections as $section)
            <x-book-section
                heading="{{$section['heading']}}"
                :books="$section['books']"
                sectionId="{{$loop->index}}"
            />
        @endforeach
    </div>

    @if(!empty($topTacGias))
        <div class="container">
            <div class="panel panel-default comic-card">
                <div class="panel-body">
                    <h2 class="ms-2 mt-2 ms-4 heading" style="font-weight: bold;font-size: 32px">Tác Giả Nổi Bật</h2>
                    <div class="list-user-parent text-center d-flex justify-content-center">
                        <div class="list-user">
                            @foreach($topTacGias as $item)
                                <div class="item-user" title="{{$item->ten_doc_gia}}">
                                    <div class="u-avatar">
                                        <a href="{{route('chi-tiet-tac-gia', $item->id)}}">
                                            <img style="object-fit: cover"
                                                 src="{{(!is_null($item->hinh_anh) ? Storage::url($item->hinh_anh) : asset('assets/admin/images/users/user-dummy-img.jpg'))}}"
                                                 class="avatar-img" alt="user-avt"/>
                                        </a>
                                    </div>
                                    <div>
                                        <div>
                                            <a
                                                href="{{route('chi-tiet-tac-gia', $item->id)}}">{{$item->ten_doc_gia}}</a>
                                        </div>
                                        <span style="opacity: 60%">Đang có {{$item->total_books}} sách được bán</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container">
        <h1 class="ms-2" style="font-weight: bold">Bài Viết</h1>
        <hr class="mt-1">
        <div class="slider-container2 mb-5">
            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <div class="slider-wrapper2">
                <div class="slider-track">
                    @foreach ($bai_viets as $item)
                        <div class="slider-item2">
                            <a href="{{route('chi-tiet-bai-viet', $item->id)}}" target="_self">
                                <img src="{{ Storage::url($item->hinh_anh) }}" alt="Banner Image"
                                     class="slider-banner-image2"/>
                            </a>
                            <span style="font-weight: bold">{{$item->tieu_de}}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>
        </div>
    </div>

    <style>
        .slider-container2 {
            position: relative;
            overflow: hidden;
            margin: 0 auto;
        }

        .slider-wrapper2 {
            overflow: hidden;
            width: 100%;
        }

        .slider-track {
            display: flex;
            transition: transform 0.5s ease;
        }

        .slider-item2 {
            min-width: 33.33%;
            box-sizing: border-box;
            padding: 0 5px;
        }

        .slider-banner-image2 {
            margin-bottom: 2%;
            width: 100%;
            height: 240px;
            border-radius: 10px;
        }

        .slider-banner-image2 {
            object-fit: cover;
        }

        .prev,
        .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            cursor: pointer;
            font-size: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
            z-index: 10;
            /* Đảm bảo nút luôn nằm trên ảnh */
        }

        .slider-track {
            display: flex;
            transition: transform 0.5s ease;
            z-index: 1;
            /* Đảm bảo track của slider nằm sau nút điều hướng */
        }


        .prev {
            left: 0;
        }

        .next {
            right: 0;
        }
    </style>

    <script>
        let currentIndex = 0;

        function moveSlide(step) {
            const slides = document.querySelectorAll(".slider-item2");
            const totalSlides = slides.length;

            // Calculate the maximum index that allows three images to be shown at once
            const maxIndex = totalSlides - 3;

            // Update currentIndex based on the step
            currentIndex += step;

            // Ensure currentIndex remains within the valid range
            if (currentIndex < 0) {
                currentIndex = 0;
            } else if (currentIndex > maxIndex) {
                currentIndex = maxIndex;
            }

            // Move the slider track to show the correct images
            const offset = -currentIndex * (100 / 3);
            document.querySelector(".slider-track").style.transform = `translateX(${offset}%)`;
        }
    </script>

    <div class="container ">
        <div class="row">
            <div class="col-xs-12 col-md-12 ">
                <div class="bg-customer"
                     style="background-image: url('{{ asset('assets/client/img/banner2.jpg') }}');padding: 2%">
                    <h2 class="text-success me-5" style="font-size: 40px">TRỞ THÀNH CỘNG TÁC VIÊN TẠI MESACH247 NGAY
                        THÔI!
                    </h2>
                    <div>
                        <a class="btn btn-lg btn-primary" href="{{route('hop-dong')}}">Đăng Ký Cộng Tác Viên</a>
                        {{--                        <button type="submit" class="btn btn-lg btn-primary">Đăng Ký Cộng Tác Viên</button>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="slider-footer d-flex">
            @foreach ($sliderFooter->hinhAnhBanner as $item)
                <div class="sliderbanner-item">
                    <a target="_blank">
                        <img src="{{ Storage::url($item->hinh_anh) }}" alt="Banner Image" class="slider-banner-image"/>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        // Snowfall effect
        document.addEventListener("DOMContentLoaded", function () {
            const snowContainer = document.querySelector('.snow');
            for (let i = 0; i < 50; i++) {
                const snowflake = document.createElement('div');
                snowflake.classList.add('snowflake');
                snowflake.textContent = i % 2 === 0 ? '❄' : i % 3 === 0 ? '❅' : '❆';
                snowflake.style.left = Math.random() * 100 + 'vw';
                snowflake.style.animationDuration = (Math.random() * 3 + 5) + 's';
                snowflake.style.fontSize = (Math.random() * 10 + 10) + 'px';
                snowContainer.appendChild(snowflake);
            }
        });

    </script>

@endpush
@push('styles')
    <style>
        /* Snowflake Style */
        @keyframes snowFall {
            0% {
                transform: translateY(0);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh);
                opacity: 0;
            }
        }

        .snowflake {
            position: absolute;
            top: -50px;
            font-size: 1em;
            color: white;
            opacity: 0.8;
            animation: snowFall 10s linear infinite;
            pointer-events: none;
        }

        .snow-container {
            position: relative;
            overflow: hidden;
        }

        .snow-container #sliderbanner {
            position: relative;
            z-index: 1;
        }

        .snow-container .snow {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 2;
        }

    </style>
@endpush
