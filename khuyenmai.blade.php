<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .promo-card {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        background: white; 
        border-radius: 30px; 
        overflow: hidden; 
        box-shadow: 0 10px 30px rgba(0,0,0,0.05); 
        position: relative; 
        border: 1px solid #f0f0f0;
    }
    .promo-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(255,111,0,0.15) !important;
    }
    .btn-gradient {
        background: linear-gradient(45deg, #ff6f00, #ff9100);
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 6px 15px rgba(255,111,0,0.3);
        color: white;
        cursor: pointer;
    }
    .btn-gradient:hover {
        filter: brightness(1.1);
        box-shadow: 0 10px 25px rgba(255,111,0,0.5);
    }
</style>

<div class="promo-page" style="padding: 60px 20px; max-width: 1200px; margin: auto; animation: fadeInUp 0.6s ease-out; font-family: 'Segoe UI', sans-serif;">
    
    <div style="text-align: center; margin-bottom: 60px;">
        <h1 style="color: #333; font-size: 38px; font-weight: 800;">🎁 SIÊU ƯU ĐÃI <span style="color: #ff6f00;">HÔM NAY</span></h1>
        <p style="color: #777; font-size: 18px;">Giảm giá trực tiếp 10% cho các sản phẩm trong danh mục này</p>
        <div style="width: 60px; height: 4px; background: #ff6f00; margin: 20px auto; border-radius: 10px;"></div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 35px;">
        @forelse($promos as $item)
            @php
                $giaGoc = $item->Gia;
                $giaMoi = $giaGoc * 0.9; // Giảm 10%
            @endphp
        <div class="promo-card">
            <div style="position: absolute; top: 15px; right: 15px; z-index: 5; background: #e74c3c; color: white; padding: 8px 18px; border-radius: 20px; font-weight: bold; font-size: 13px; box-shadow: 0 4px 12px rgba(231,76,60,0.3);">
                GIẢM 10%
            </div>

            <div style="height: 230px; overflow: hidden;">
                <img src="/images/{{ $item->hinhanh }}" alt="{{ $item->TenSanPham }}" style="width: 100%; height: 100%; object-fit: cover;">
            </div>

            <div style="padding: 25px;">
                <h3 style="margin: 0 0 10px; font-size: 22px; color: #333; font-weight: 700;">{{ $item->TenSanPham }}</h3>
                <p style="color: #888; font-size: 14px; line-height: 1.6; height: 45px; overflow: hidden;">{{ $item->MoTa }}</p>

                <div style="display: flex; justify-content: space-between; align-items: center; background: #fffcf9; padding: 15px; border-radius: 20px; margin: 20px 0;">
                    <div>
                        <span style="text-decoration: line-through; color: #bbb; font-size: 16px; display: block; margin-bottom: -5px;">
                            {{ number_format($giaGoc) }}đ
                        </span>
                        <span style="color: #e74c3c; font-weight: 800; font-size: 28px;">
                            {{ number_format($giaMoi) }}đ
                        </span>
                    </div>
                    <div style="text-align: right;">
                        <small style="color: #27ae60; font-weight: 600; display: block;">Đang áp dụng</small>
                        <small style="color: #555;">Còn: <strong>{{ $item->so_luong_con }}</strong> món</small>
                    </div>
                </div>

                <button class="btn-gradient" 
                        style="width: 100%; padding: 18px; border-radius: 50px; font-weight: bold; font-size: 16px; text-transform: uppercase; display: flex; justify-content: center; align-items: center; gap: 10px;"
                        onclick="addToCart({{ $item->MaSanPham }})">
                    🛒 ĐẶT MÓN NGAY
                </button>
            </div>
        </div>
        @empty
        <div style="grid-column: 1/-1; text-align: center; padding: 100px 0;">
            <p style="color: #bbb; font-size: 20px;">Hiện tại chưa có món ăn nào được bật khuyến mãi (khuyenmai = 1).</p>
        </div>
        @endforelse
    </div>

    <div style="margin-top: 80px; background: linear-gradient(135deg, #fff 0%, #fff8f0 100%); padding: 40px; border-radius: 30px; border: 1px solid #ffe0b2; position: relative; overflow: hidden;">
        <h2 style="color: #ff6f00; font-size: 26px; font-weight: 700; margin-bottom: 20px; position: relative; z-index: 2;">Quy định áp dụng giảm giá</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; position: relative; z-index: 2;">
            <div style="color: #555; font-size: 15px;">
                <p>✅ <strong>Giá trị thực:</strong> Số tiền 10% được trừ trực tiếp từ giá gốc của sản phẩm được lưu trong hệ thống.</p>
                <p>✅ <strong>Tình trạng hàng:</strong> Chỉ những sản phẩm còn tồn kho (lớn hơn 0) mới được phép hiển thị tại trang khuyến mãi này.</p>
            </div>
            <div style="color: #555; font-size: 15px;">
                <p>✅ <strong>Thời gian:</strong> Chương trình áp dụng cho đến khi người quản lý cập nhật lại trạng thái khuyến mãi về bằng 0.</p>
                <p>✅ <strong>Hỗ trợ:</strong> Mọi thắc mắc về đơn hàng giảm giá vui lòng gọi hotline 1900 1533 để được giải quyết nhanh nhất.</p>
            </div>
        </div>
        <div style="position: absolute; right: -20px; bottom: -20px; font-size: 120px; color: rgba(255,111,0,0.05); font-weight: 900; transform: rotate(-15deg);">%</div>
    </div>
</div>