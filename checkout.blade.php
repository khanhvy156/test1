@extends('layouts.app') {{-- Hoặc layout chính của bạn --}}

@section('content')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-md-7">
            <div class="card" style="padding: 20px; border: none; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                <h4 style="color: #ff7043;"><i class="fas fa-info-circle"></i> Thông tin giao hàng</h4>
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p style="margin-bottom: 0;">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    
                    <div class="form-group mb-3">
                        <label>Họ và tên khách hàng</label>
                        {{-- Ưu tiên lấy từ Session đã đăng nhập --}}
                        <input type="text" name="txt_hoten" class="form-control" 
                               value="{{ old('txt_hoten', session('khachhang_ten')) }}" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Số điện thoại</label>
                            <input type="text" name="txt_sdt" class="form-control" 
                                   value="{{ old('txt_sdt', session('khachhang_phone')) }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Địa chỉ Email</label>
                            <input type="email" name="txt_email" class="form-control" 
                                   value="{{ old('txt_email', session('khachhang_email')) }}" required>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Địa chỉ giao hàng</label>
                        <textarea name="txt_diachi" class="form-control" rows="3" required>{{ old('txt_diachi', session('khachhang_addr')) }}</textarea>
                    </div>

                    <h5 class="mt-4"><i class="fas fa-credit-card"></i> Hình thức thanh toán</h5>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-check p-3 border rounded">
                                <input class="form-check-input" type="radio" name="payment_method" id="cod" value="Tiền mặt" checked>
                                <label class="form-check-label" for="cod">Tiền mặt (COD)</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check p-3 border rounded">
                                <input class="form-check-input" type="radio" name="payment_method" id="bank" value="Chuyển khoản">
                                <label class="form-check-label" for="bank">Chuyển khoản</label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 mt-4" style="color: white; font-weight: bold; background-color: #ff7043;">
                        XÁC NHẬN ĐẶT HÀNG
                    </button>
                </form>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card" style="padding: 20px; border: 1px solid #ff7043;">
                <h4 style="color: #ff7043;">Đơn hàng của bạn</h4>
                <hr>
                
                @if(session('cart') && count(session('cart')) > 0)
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $id => $item)
                        @php $total += $item['Gia'] * $item['SoLuong']; @endphp
                        <div class="d-flex justify-content-between mb-2">
                            <span><strong>{{ $item['SoLuong'] }}x</strong> {{ $item['TenSanPham'] }}</span>
                            <span>{{ number_format($item['Gia'] * $item['SoLuong']) }}đ</span>
                        </div>
                        <small class="text-muted">{{ number_format($item['Gia']) }}đ / món</small>
                        <hr>
                    @endforeach

                    <div class="d-flex justify-content-between">
                        <span>Tạm tính:</span>
                        <span>{{ number_format($total) }}đ</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span style="color: #28a745;">Phí giao hàng:</span>
                        <span style="color: #28a745;">FREE</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h4 style="color: #ff7043;">TỔNG CỘNG:</h4>
                        <h4 style="color: #ff7043;">{{ number_format($total) }}đ</h4>
                    </div>
                @else
                    <p>Giỏ hàng trống!</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection