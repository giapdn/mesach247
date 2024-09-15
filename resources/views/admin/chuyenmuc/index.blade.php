@extends('admin.layouts.app')

@section('start-point')
    Quản lý chuyên mục
@endsection

@section('title')
    Danh sách chuyên mục
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h5 class="fs-16">Thêm chuyên mục mới</h5>
                        </div>
                    </div>
                </div>
                <div class="accordion accordion-flush filter-accordion">
                    <div class="card-body border-bottom">
                        <form action="{{ route('chuyenmuc.store') }}" method="post">
                            @csrf
                            <div class="filter-choices-input">
                                <label class="form-label">Tên chuyên mục</label>
                                <input name="ten_chuyen_muc" class="form-control" type="text" required>
                            </div>
                            <div class="filter-choices-input mt-3">
                                <label class="form-label">Chuyên mục cha ID (nếu có)</label>
                                <input name="chuyen_muc_cha_id" class="form-control" type="number">
                            </div>
                            <div class="filter-choices-input mt-3">
                                <button type="submit" class="btn btn-sm btn-success">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0 flex-grow-1">Danh sách chuyên mục</h4>
                        </div>
                        <div class="card-body">
                            <!-- Form tìm kiếm -->
                            <form id="search-form">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="search" value="{{ $search }}" placeholder="Tìm kiếm chuyên mục...">
                                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                                </div>
                            </form>
                            
                            <!-- Bảng dữ liệu -->
                            <table class="table table-striped" id="chuyenMucTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên chuyên mục</th>
                                        <th>Chuyên mục cha ID</th>
                                        <th>Ngày tạo</th>
                                        <th>Ngày cập nhật</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Dữ liệu sẽ được điền bởi JavaScript -->
                                </tbody>
                            </table>
                            
                            <!-- Phân trang -->
                            <div id="pagination" class="d-flex justify-content-center">
                                <!-- Các nút phân trang sẽ được điền bởi JavaScript -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let data = @json($chuyenMucs);
    const rowsPerPage = 5;
    let currentPage = 1;

    function displayTable(page) {
        const tableBody = document.querySelector('#chuyenMucTable tbody');
        const start = (page - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        tableBody.innerHTML = '';

        const paginatedData = data.slice(start, end);
        paginatedData.forEach(item => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${item.id}</td>
                <td>${item.ten_chuyen_muc}</td>
                <td>${item.chuyen_muc_cha_id ? item.chuyen_muc_cha_id : 'Không'}</td>
                <td>${new Date(item.created_at).toLocaleDateString('vi-VN')}</td>
                <td>${new Date(item.updated_at).toLocaleDateString('vi-VN')}</td>
                <td>
                    <a href="/chuyen-muc/${item.id}/edit" class="btn btn-link p-0">Sửa</a> |
                    <a href="/chuyen-muc/${item.id}/detail" class="btn btn-link p-0">Xem</a> |
                    <form action="/chuyen-muc/${item.id}" method="POST" style="display:inline;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-link p-0 text-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                    </form>
                </td>
            `;
            tableBody.appendChild(row);
        });

        updatePagination();
    }

    function updatePagination() {
        const paginationDiv = document.getElementById('pagination');
        paginationDiv.innerHTML = '';

        const pageCount = Math.ceil(data.length / rowsPerPage);
        for (let i = 1; i <= pageCount; i++) {
            const pageButton = document.createElement('button');
            pageButton.textContent = i;
            pageButton.classList.add('btn', 'btn-outline-primary', 'mx-1');
            pageButton.addEventListener('click', () => {
                currentPage = i;
                displayTable(currentPage);
            });
            if (i === currentPage) {
                pageButton.classList.add('active');
            }
            paginationDiv.appendChild(pageButton);
        }
    }

    // Hiển thị bảng dữ liệu ban đầu
    displayTable(currentPage);

    // Xử lý sự kiện tìm kiếm
    document.getElementById('search-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const searchTerm = document.getElementById('search').value.toLowerCase();
        data = @json($chuyenMucs).filter(item => item.ten_chuyen_muc.toLowerCase().includes(searchTerm));
        currentPage = 1;
        displayTable(currentPage);
        updatePagination();
    });
});

</script>
@endpush
