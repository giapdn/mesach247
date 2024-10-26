<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Truyện</th>
            <th>Tác giả</th>
            <th>Giá tiền</th>
            <th>Tình Trạng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sachDaMua as $key => $sachMua)
            <tr>
                <th>{{ $key + 1 }}</th>

                <th>
                    <a href="{{ route('chi-tiet-sach', $sachMua->sach->id) }}">
                    <img src="https://truyenhdt.com/wp-content/uploads/2023/04/9140707.jpg" width="40" height="60"
                        style="margin-right: 5px;" />
                    {{ $sachMua->sach->ten_sach }}
                </a>
                </th>
                <th> {{ $sachMua->sach->user->ten_doc_gia }}</th>
                <th>{{ number_format($sachMua->sach->gia_goc, 0, ',', '.') }} VNĐ</th>
                <th>
                    @if ($sachMua->sach->tinh_trang_cap_nhat == 'da_full')
                        <span class="badge badge-success">Hoàn Thành</span>
                    @else
                        <span class="badge badge-warning">Đang cập nhật</span>
                    @endif
                </th>
            </tr>
        @endforeach
    </tbody>
</table>

<ul class="pagination text-center" id="id_pagination">
    @if ($sachDaMua->currentPage() > 1)
        <li><a href="{{ $sachDaMua->previousPageUrl() }}&section=purchased">«</a></li>
    @endif

    @for ($i = 1; $i <= $sachDaMua->lastPage(); $i++)
        <li class="{{ $i == $sachDaMua->currentPage() ? 'active' : '' }}">
            <a href="{{ $sachDaMua->url($i) }}&section=purchased">{{ $i }}</a>
        </li>
    @endfor

    @if ($sachDaMua->hasMorePages())
        <li><a href="{{ $sachDaMua->nextPageUrl() }}&section=purchased">»</a></li>
    @endif
</ul>
