<meta name="csrf-token" content="{{ csrf_token() }}">
<form method="POST" action="{{ route('cai-dat-bao-mat', $user->id) }}" id="change-password-form">
    @csrf @method('PUT')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-group">
        <div class="form-group">
            <label for="current-password">Mật khẩu hiện tại:</label>
            <input type="password" class="form-control" id="old_password" name="old_password" autocomplete="off"
                required>
            <span class="text-danger" id="error-old_password"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="new_password">Mật khẩu mới:</label>
        <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password"
            name="new_password" autocomplete="off" required>
        @error('new_password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="new_password_confirmation">Xác nhận mật khẩu mới:</label>
        <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation"
            autocomplete="off" required>
    </div>

    <button type="submit" onclick="return confirm('Xác nhận đổi mật khẩu')" class="btn btn-primary">Cập nhật mật
        khẩu</button>
</form>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#change-password-form').on('submit', function(e) {
            e.preventDefault();
            $('span.text-danger').text('');

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.fire({
                        title: 'Thành công!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Đăng nhập lại'
                    }).then((result) => {
                        if (result.value) {
                            window.location.href =
                                '/dang-nhap';
                        }
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        title: 'Lỗi!',
                        text: 'Hãy kiểm tra lại mật khẩu của bạn!',
                        icon: 'error',
                        confirmButtonText: 'Thử lại'
                    });
                }
            });
        });
    });
</script>
<style>
    .swal2-popup {
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size: 12px;
    }

    .swal2-title {
        color: #333;
    }

    .swal2-button {
        background-color: #4A90E2;
        color: white;
    }
</style>
