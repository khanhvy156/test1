<meta name="csrf-token" content="{{ csrf_token() }}">

<form id="formLogin">

    @csrf 

    <div style="margin-bottom: 10px;">
        <input 
            type="text" 
            name="HoVaTen" 
            placeholder="Nhập Họ và Tên (VD: Nguyễn Văn A)" 
            required
            style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 10px;">
        <input 
            type="password" 
            name="password" 
            placeholder="Mật khẩu" 
            required
            style="width: 100%; padding: 8px;">
    </div>

    <button 
        type="submit" 
        style="
            background: #ff6f00; 
            color: white; 
            border: none; 
            padding: 10px 20px; 
            cursor: pointer;
            border-radius: 5px;
        ">
        Đăng nhập
    </button>

</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#formLogin').on('submit', function(e) {

        e.preventDefault();

        $.ajax({

            url: "/login",
            type: "POST",

            data: $(this).serialize(),

            success: function(res) {

                if (res.success) {

                    alert(res.message);

                    // CHUYỂN VỀ TRANG CHỦ
                    window.location.href = "/";

                } 
                else {

                    alert(res.message);

                }

            },

            error: function(xhr) {

                alert('Lỗi hệ thống!');

                console.log(xhr.responseText);

            }

        });

    });

});

</script>