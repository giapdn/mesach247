@extends('client.layouts.app')
@section('content')
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/"><span class="fa fa-home"></span> Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ route('client.yeu-thich.index') }}">Yêu thích</a></li>

        </ol>
    </div>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/client/home.css') }}">
        <style>
            /* General Styles */
            .book-item {
                position: relative;
                width: 150px;
                height: 220px;
                margin: 15px;
                padding: 0; /* Removed padding for full image display */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                transition: transform 0.2s ease;
                overflow: hidden;
                background-color: #fff;
                display: inline-block;
            }

            .book-item:hover {
                transform: translateY(-5px);
            }
            .book-item:hover .book-image {
                opacity: 0.5; /* Dims the image */
            }
            .remove-button {
                position: absolute;
                top: 50%; /* Center vertically */
                left: 50%; /* Center horizontally */
                transform: translate(-50%, -50%); /* Adjust for exact centering */
                opacity: 0; /* Initially hidden */
                transition: opacity 0.3s ease; /* Smooth transition */
                z-index: 20; /* Ensure it appears above other elements */
            }

            /* Show button on hover */
            .book-item:hover .remove-button {
                opacity: 1; /* Show button on hover */
            }

            /* Button styles */
            .remove-button button {
                background-color: white; /* Black with opacity */
                color: white; /* Button text color */
                border: none; /* Remove border */
                padding: 10px; /* Padding for the button */
                border-radius: 50%; /* Circular shape */
                cursor: pointer; /* Pointer cursor on hover */
                width: 40px; /* Fixed width */
                height: 40px; /* Fixed height */
                display: flex; /* Flexbox for centering text */
                justify-content: center; /* Center text horizontally */
                align-items: center; /* Center text vertically */
                transition: background-color 0.3s ease; /* Smooth background color transition */
            }

            .remove-button button:hover {
                background-color: white; /* Darker black on hover */
            }

            /* Book Image */
            .book-image {
                width: 100%;
                height: 100%; /* Make the image container full height */
                overflow: hidden;
            }

            .book-image img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.3s ease;
            }

            /* Price Tag */
            .price-tag {
                position: absolute;
                top: 0; /* Aligns it to the top */
                right: 0; /* Aligns it to the right */
                background: linear-gradient(135deg, #1ebbf0 30%, #39dfaa 100%);
                color: white;
                padding: 5px 10px;
                border-radius: 0 10px 0 10px;
                font-size: 12px;
                font-weight: bold;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Adds a subtle shadow for depth */
                z-index: 10; /* Ensures the price tag appears above other elements */
                margin: 0; /* Remove margin to position it exactly in the corner */
            }

            .heart-tag {
                position: absolute;
                top: 0; /* Aligns it to the top */
                left: 0; /* Aligns it to the right */
                background: white;
                border-radius: 10px 0 10px 0;
                padding: 5px 10px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Adds a subtle shadow for depth */
                z-index: 10; /* Ensures the price tag appears above other elements */
                margin: 0; /* Remove margin to position it exactly in the corner */
            }



            /* Book Info */
            .book-info {
                position: absolute;
                bottom: 0;
                width: 100%;
                background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
                text-align: center;
                padding: 5px 0;
            }

            .book-title {
                font-weight: bold;
                font-size: 14px;
                color: #333;
                margin: 0;
            }

        </style>

    @endpush
    <div class="container mt-5" style="min-height: 500px !important;">
        <div class="book-container d-flex justify-content-center" style="flex-wrap: wrap !important;">
            @foreach ($sachYeuThich as $yeuThich)
                @php
                    $book = $yeuThich->sach;
                @endphp
                <li class="book-item">
                    <a href="{{ route('chi-tiet-sach', $book->id) }}" title="{{ $book->ten_sach }}">
                        <div class="book-image">
                            <img src="{{ Storage::url($book->anh_bia_sach) }}" alt="{{ $book->ten_sach }}">
                            <div class="price-tag">
                                @if($book->gia_goc === 0)
                                    Miễn Phí
                                @else
                                    {{ number_format(!empty($book->gia_khuyen_mai) ? $book->gia_khuyen_mai : $book->gia_goc, 0, ',', '.') }}
                                    VNĐ
                                @endif
                            </div>
                            <div class="heart-tag">
                                <img src="{{ asset('assets\gif\icons8-heart.gif') }}" style="width: 18px; height: 18px">
                            </div>
                        </div>
                        <div class="book-info">
                            <h4 class="book-title">{{ $book->ten_sach }}</h4>
                        </div>
                        <div class="remove-button">
                            <button title="Gỡ khỏi yêu thích" onclick="deleteYeuThich(event, {{$book->id}})"><img src="{{ asset('assets\gif\icons8-broken-heart.gif') }}" style="width: 25px; height: 25px"></button>
                        </div>
                    </a>
                </li>

            @endforeach
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        function deleteYeuThich(event, sachId) {
            event.preventDefault();
            event.stopPropagation();

            if (confirm('Bạn có chắc muốn xóa sách này khỏi yêu thích?')) {
                fetch(`/yeu-thich/${sachId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);

                            const bookElement = event.target.closest('.book-item');
                            if (bookElement) {
                                bookElement.remove();
                            } else {
                                alert('Không tìm thấy phần tử sách để xóa.');
                            }
                        } else {
                            alert('Đã xảy ra lỗi khi xóa sách khỏi yêu thích.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }

    </script>

@endpush
