@extends('admin.layouts.app')
@section('start-point')
    Quản lý bình luận
@endsection
@section('title')
    Chi tiết bình luận
@endsection
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="commentId" class="form-label">ID:</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="commentId" value="{{ $binhLuan->id }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="userName" class="form-label">Độc giả:</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="userName"
                                value="{{ $binhLuan->user->ten_doc_gia }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="postTitle" class="form-label">Bài viết:</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="postTitle"
                                value="{{ $binhLuan->baiViet->tieu_de }}" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="commentContent" class="form-label">Nội dung bình luận:</label>
                        </div>
                        <div class="col-lg-9">
                            <textarea class="form-control" rows="5" id="commentContent" readonly>{{ $binhLuan->noi_dung }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="commentDate" class="form-label">Ngày bình luận:</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="commentDate"
                                value="{{ \Carbon\Carbon::parse($binhLuan->ngay_binh_luan)->format('d/m/Y') }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="binhLuan" class="form-label">Trạng thái:</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" class="form-control" id="binhLuan" 
                                   value="{{ $binhLuan->trang_thai === 'hien' ? 'Hiển thị' : 'Ẩn' }}" readonly>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('binh-luan.index') }}" class="btn btn-sm btn-primary">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush
