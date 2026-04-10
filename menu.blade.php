<style>
    .menu-container { padding: 20px; max-width: 1200px; margin: auto; min-height: 500px; }
    .category-tabs { display: flex; gap: 10px; margin-bottom: 30px; flex-wrap: wrap; justify-content: center; }
    
    .category-item { 
        padding: 10px 25px; background: white; border: 2px solid #ff6f00; 
        color: #ff6f00; border-radius: 25px; cursor: pointer; font-weight: bold; 
        transition: 0.3s; text-decoration: none; display: inline-block;
    }
    .category-item.active, .category-item:hover { background: #ff6f00; color: white; }
    
    .product-grid { 
        display: grid; 
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); 
        gap: 30px; 
    }
    .product-card { 
        background: white; border-radius: 15px; padding: 15px; text-align: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: 0.3s;
        border: 1px solid #eee;
    }
    .product-card:hover { transform: translateY(-8px); box-shadow: 0 10px 25px rgba(255,111,0,0.15); }
    
    .product-card img { 
        width: 100%; aspect-ratio: 1/1; object-fit: cover; 
        border-radius: 10px; background: #f8f8f8;
    }
    
    .product-card h3 { font-size: 18px; margin: 15px 0 10px; color: #333; height: 45px; overflow: hidden; line-height: 1.3; }
    .product-price { color: #ff6f00; font-weight: 800; font-size: 22px; margin-bottom: 15px; }
    
    .btn-add-cart {
        background: #ff6f00; color: white; border: none; padding: 12px; 
        border-radius: 10px; font-weight: bold; cursor: pointer; width: 100%;
        transition: 0.2s; display: flex; align-items: center; justify-content: center; gap: 8px;
    }
    .btn-add-cart:hover { background: #e65f00; transform: scale(1.02); }
    .btn-add-cart:active { transform: scale(0.98); }
    .btn-add-cart:disabled { background: #ccc; cursor: not-allowed; }

    .product-desc{
        margin: -4px 0 12px;
        color: #777;
        font-size: 13px;
        line-height: 1.35;
        height: 34px;
        overflow: hidden;
    }
</style>

<div class="menu-container" id="menu-root">
    <h2 style="text-align: center; color: #ff6f00; margin-bottom: 30px; font-size: 28px; text-transform: uppercase;">
        {{ $danhmuc_ten }}
    </h2>

    <div class="category-tabs">
        <a href="javascript:void(0)" data-url="/menu?madanhmuc=0" class="category-item js-category {{ $danhmuc_id == 0 ? 'active' : '' }}">
            TẤT CẢ
        </a>
        @foreach($danhmuc as $dm)
            <a href="javascript:void(0)"
               data-url="/menu?madanhmuc={{ $dm->MaDanhMuc }}"
               class="category-item js-category {{ $danhmuc_id == $dm->MaDanhMuc ? 'active' : '' }}">
                {{ mb_strtoupper($dm->TenDanhMuc) }}
            </a>
        @endforeach
    </div>

    <div class="product-grid">
        @forelse($products as $item)
            <div class="product-card">
                <img src="{{ asset('images/' . $item->hinhanh) }}" 
                     alt="{{ $item->TenSanPham }}"
                     onerror="this.src='{{ asset('images/default-food.png') }}'">
                
                <h3>{{ $item->TenSanPham }}</h3>
                <div class="product-desc">
                    {{ \Illuminate\Support\Str::limit(strip_tags((string) ($item->MoTa ?? '')), 70) }}
                </div>
                <div class="product-price">{{ number_format($item->Gia, 0, ',', '.') }}đ</div>
                
                <button type="button"
                        class="btn-add-cart js-add-to-cart"
                        data-product-id="{{ $item->MaSanPham }}">
                    <i class="fas fa-cart-plus"></i> <span>THÊM VÀO GIỎ</span>
                </button>
            </div>
        @empty
            <div style="grid-column: 1/-1; text-align: center; padding: 50px;">
                <p style="color: #999; font-size: 18px;">Hiện chưa có sản phẩm nào trong danh mục này.</p>
            </div>
        @endforelse
    </div>
</div>