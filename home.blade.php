<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FastFood - Đặt món nhanh, giao tận nơi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
       /* 1. CORE STYLES */
    body { margin: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #fff8f3; color: #333; overflow-x: hidden; }

    /* 2. HEADER */
    .header {
        background: #ff6f00; color: white; padding: 10px 40px;
        display: flex; justify-content: space-between; align-items: center;
        position: sticky; top: 0; z-index: 1000; box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }
    .logo { font-size: 22px; font-weight: 900; cursor: pointer; display: flex; align-items: center; gap: 10px; letter-spacing: 0.3px; }
    
    .menu { display: flex; gap: 5px; }
    .menu a {
        color: white; text-decoration: none; font-weight: bold; padding: 10px 15px;
        border-radius: 25px; transition: 0.3s; font-size: 13px;
    }
    .menu a:hover, .menu a.active { background: rgba(255,255,255,0.2); }

    /* 3. HEADER RIGHT (Giỏ hàng & Auth) */
    .header-right { display: flex; align-items: center; gap: 15px; }
    
    .cart-btn { 
        color: white; text-decoration: none; font-weight: bold; 
        display: flex; align-items: center; gap: 8px; font-size: 14px;
        padding: 8px 12px; border-radius: 20px; transition: 0.3s;
    }
    .cart-btn:hover { background: rgba(255,255,255,0.1); color: #ffeb3b; }
    .cart-count { background: #ff4747; color: white; border-radius: 50%; padding: 2px 7px; font-size: 11px; }

    #auth-section { display: flex; align-items: center; gap: 10px; }
    .btn-auth {
        padding: 8px 20px; border-radius: 25px; text-decoration: none;
        font-weight: bold; cursor: pointer; border: none; transition: 0.3s;
        font-size: 13px; white-space: nowrap;
    }
    .btn-login { background: white; color: #ff6f00; }
    .btn-register { background: transparent; color: white; border: 2px solid white; }
    .btn-logout { background: #333; color: white; }
    .btn-auth:hover { transform: translateY(-2px); box-shadow: 0 4px 8px rgba(0,0,0,0.2); }
    .user-name { font-weight: bold; font-size: 14px; }

    /* 4. BANNER & SLIDER */
    .slider { width: 100%; height: 480px; position: relative; overflow: hidden; }
    .banner-img { width: 100%; height: 100%; object-fit: cover; }
    .overlay { position: absolute; inset: 0; background: linear-gradient(to right, rgba(0,0,0,0.7), transparent); }
    .banner-content { position: absolute; top: 50%; left: 80px; transform: translateY(-50%); color: white; max-width: 550px; }
    .banner-content h1 { font-size: 52px; margin-bottom: 15px; line-height: 1.1; }
    .banner-btn { padding: 15px 35px; background: #ff6f00; color: white; border: none; border-radius: 30px; font-weight: bold; cursor: pointer; transition: 0.3s; font-size: 16px; }

    /* 5. ABOUT SECTION */
    .about-jollibee { padding: 80px 5%; background-color: #fff; display: flex; justify-content: center; }
    .about-container { max-width: 1200px; display: flex; align-items: center; gap: 50px; flex-wrap: wrap; }
    .about-content { flex: 1; min-width: 300px; }
    .about-content h1 { font-size: 42px; color: #ff6f00; margin-bottom: 20px; font-weight: 800; line-height: 1.2; }
    .about-content p { font-size: 18px; line-height: 1.8; color: #555; margin-bottom: 30px; }
    .about-btn { padding: 15px 40px; background: linear-gradient(45deg, #ff6f00, #ff9800); color: white; border: none; border-radius: 50px; font-weight: bold; font-size: 16px; cursor: pointer; box-shadow: 0 10px 20px rgba(255, 111, 0, 0.3); transition: all 0.3s ease; }
    .about-btn:hover { transform: translateY(-3px); filter: brightness(1.1); }
    .about-image { flex: 1; min-width: 300px; text-align: center; }
    .about-image img { width: 100%; max-width: 500px; border-radius: 20px; filter: drop-shadow(10px 15px 25px rgba(0,0,0,0.1)); animation: float 4s ease-in-out infinite; }

    @keyframes float { 0% { transform: translateY(0px); } 50% { transform: translateY(-15px); } 100% { transform: translateY(0px); } }

    /* 6. SERVICES & NEWS */
    .jollibee-services { background: #fff; padding: 60px 20px; text-align: center; }
    .jollibee-row { display: flex; justify-content: center; flex-wrap: wrap; gap: 25px; max-width: 1200px; margin: 40px auto 0; }
    .jollibee-item img { width: 170px; height: 170px; border-radius: 50%; object-fit: cover; border: 5px solid #fff3e0; transition: 0.3s; }
    .jollibee-item:hover img { border-color: #ff6f00; transform: scale(1.05); }

    /* 6.1 FEATURED PRODUCTS */
    .section-wrap{ padding: 70px 20px; background: #fff; }
    .section-inner{ max-width: 1200px; margin: 0 auto; }
    .section-title{
        margin: 0 0 8px;
        font-size: 34px;
        line-height: 1.2;
        color: #111;
        letter-spacing: -0.2px;
        font-weight: 900;
    }
    .section-subtitle{
        margin: 0 0 26px;
        color: #555;
        font-size: 16px;
        line-height: 1.6;
    }
    .product-grid{
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
        gap: 18px;
    }
    .product-card{
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.06);
        box-shadow: 0 10px 24px rgba(0,0,0,0.06);
        transition: 0.25s ease;
        display: flex;
        flex-direction: column;
        min-height: 100%;
    }
    .product-card:hover{ transform: translateY(-6px); box-shadow: 0 14px 34px rgba(0,0,0,0.12); }
    .product-thumb{
        width: 100%;
        height: 190px;
        object-fit: cover;
        background: #fff3e0;
    }
    .product-body{ padding: 14px 14px 16px; display: flex; flex-direction: column; gap: 10px; flex: 1; }
    .product-name{ margin: 0; font-size: 16px; font-weight: 900; color: #222; line-height: 1.25; }
    .product-meta{ display:flex; justify-content: space-between; align-items: baseline; gap: 10px; }
    .product-price{ font-weight: 900; color: #ff6f00; }
    .product-price-old{ color: #888; text-decoration: line-through; font-size: 13px; font-weight: 700; }
    .product-actions{ display:flex; gap: 10px; margin-top: auto; }
    .btn-outline{
        flex: 1;
        border: 1px solid rgba(0,0,0,0.12);
        background: #fff;
        color: #222;
        border-radius: 14px;
        padding: 11px 12px;
        font-weight: 800;
        cursor: pointer;
        transition: 0.2s ease;
        text-decoration: none;
        text-align: center;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-size: 13px;
        white-space: nowrap;
    }
    .btn-outline:hover{ border-color: rgba(255,111,0,0.55); color: #ff6f00; }
    .btn-primary{
        flex: 1.2;
        border: none;
        background: linear-gradient(45deg, #ff6f00, #ff9800);
        color: #fff;
        border-radius: 14px;
        padding: 11px 12px;
        font-weight: 900;
        cursor: pointer;
        transition: 0.2s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-size: 13px;
        white-space: nowrap;
    }
    .btn-primary:hover{ transform: translateY(-1px); filter: brightness(1.03); }

    /* 6.2 TRUST / VALUE PROPS */
    .value-grid{
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 14px;
        margin-top: 18px;
    }
    .value-card{
        border-radius: 18px;
        padding: 16px;
        background: linear-gradient(180deg, rgba(255,111,0,0.08), rgba(255,255,255,0.9));
        border: 1px solid rgba(255,111,0,0.18);
        display: flex;
        gap: 12px;
        align-items: flex-start;
    }
    .value-ico{
        width: 42px; height: 42px;
        border-radius: 14px;
        background: rgba(255,111,0,0.14);
        display:flex; align-items:center; justify-content:center;
        color: #ff6f00;
        font-size: 18px;
        flex: 0 0 auto;
    }
    .value-card h4{ margin: 1px 0 6px; font-size: 15px; font-weight: 900; color: #222; }
    .value-card p{ margin: 0; color: #555; font-size: 13px; line-height: 1.55; }

    .news { padding: 60px 20px; background: #fff; text-align: center; }
    .news-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 25px; max-width: 1200px; margin: auto; }
    .news-card { background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.08); transition: 0.3s; cursor: pointer; }
    .news-card:hover { transform: translateY(-8px); }
    .news-card img { width: 100%; height: 200px; object-fit: cover; }

    /* 6.3 PRODUCT MODAL (like news) */
    #productModal{
        display:none; position:fixed; inset:0; background:rgba(0,0,0,0.7);
        justify-content:center; align-items:center; z-index: 3200; backdrop-filter: blur(5px);
    }
    .modal-actions-row{
        display:flex; gap: 10px; margin-top: 14px;
    }
    .modal-actions-row .btn-outline,
    .modal-actions-row .btn-primary{
        flex: 1;
        padding: 12px 12px;
        border-radius: 14px;
        font-size: 13px;
    }

    /* 12. CHAT WIDGET */
    #chatFab{
        position: fixed;
        right: 18px;
        bottom: 18px;
        width: 54px;
        height: 54px;
        border-radius: 16px;
        border: none;
        cursor: pointer;
        background: linear-gradient(45deg, #ff6f00, #ff9800);
        color: #fff;
        box-shadow: 0 16px 34px rgba(0,0,0,0.22);
        z-index: 12000;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size: 20px;
        transition: 0.2s ease;
    }
    #chatFab:hover{ transform: translateY(-2px); filter: brightness(1.03); }

    #chatPanel{
        position: fixed;
        right: 18px;
        bottom: 86px;
        width: min(360px, calc(100vw - 36px));
        height: 520px;
        background: rgba(255,255,255,0.98);
        border-radius: 18px;
        border: 1px solid rgba(0,0,0,0.08);
        box-shadow: 0 18px 50px rgba(0,0,0,0.18);
        z-index: 12000;
        overflow: hidden;
        display: none;
        backdrop-filter: blur(10px);
        flex-direction: column;
    }
    .chat-head{
        display:flex;
        justify-content:space-between;
        align-items:center;
        padding: 12px 12px;
        background: linear-gradient(90deg, rgba(255,111,0,0.14), rgba(255,152,0,0.10));
        border-bottom: 1px solid rgba(0,0,0,0.06);
    }
    .chat-head .title{
        font-weight: 900;
        color: #111;
        font-size: 14px;
        display:flex;
        align-items:center;
        gap: 8px;
    }
    .chat-head .close{
        border: none;
        background: transparent;
        cursor: pointer;
        font-size: 18px;
        padding: 4px 8px;
        color: #111;
        font-weight: 900;
    }
    .chat-body{
        padding: 10px 10px;
        overflow: auto;
        background: #fff;
        flex: 1;
    }
    .chat-row{ display:flex; margin: 10px 0; }
    .chat-row.me{ justify-content:flex-end; }
    .chat-bubble{
        max-width: 82%;
        padding: 10px 12px;
        border-radius: 14px;
        border: 1px solid rgba(0,0,0,0.08);
        background: rgba(255,111,0,0.08);
        color: #111;
        font-size: 13px;
        line-height: 1.4;
        white-space: pre-wrap;
        word-break: break-word;
        font-weight: 700;
    }
    .chat-row.other .chat-bubble{ background:#fff; }
    .chat-time{ margin-top: 6px; font-size: 11.5px; color: rgba(0,0,0,0.55); font-weight: 700; }
    .chat-foot{
        display:flex;
        gap: 8px;
        padding: 10px;
        border-top: 1px solid rgba(0,0,0,0.06);
        background: rgba(255,255,255,0.96);
        flex: 0 0 auto;
    }
    .chat-foot textarea{
        flex: 1;
        resize: none;
        min-height: 40px;
        max-height: 120px;
        padding: 10px 12px;
        border-radius: 12px;
        border: 1px solid rgba(0,0,0,0.12);
        outline: none;
        font-family: inherit;
        font-size: 13px;
    }
    .chat-foot button{
        border: none;
        cursor: pointer;
        border-radius: 12px;
        padding: 10px 12px;
        background: #ff6f00;
        color: #fff;
        font-weight: 900;
        min-width: 86px;
    }
    .chat-foot button:disabled{ opacity: 0.6; cursor: not-allowed; }
    .chat-pre{
        padding: 10px;
        border: 1px dashed rgba(0,0,0,0.14);
        border-radius: 14px;
        background: rgba(255,111,0,0.05);
        margin: 10px;
        display:none;
    }
    .chat-pre .row{
        display:grid;
        grid-template-columns: 1fr;
        gap: 10px;
    }
    .chat-pre input{
        width: 100%;
        padding: 10px 12px;
        border-radius: 12px;
        border: 1px solid rgba(0,0,0,0.12);
        outline: none;
    }
    .chat-pre .btn{
        width: 100%;
        padding: 10px 12px;
        border-radius: 12px;
        border: none;
        background: rgba(255,111,0,0.14);
        color: #111;
        font-weight: 900;
        cursor: pointer;
    }
    .chat-end-wrap{
        padding: 10px;
        border-top: 1px dashed rgba(0,0,0,0.10);
        background: rgba(255,111,0,0.03);
        flex: 0 0 auto;
    }
    .chat-end-btn{
        width: 100%;
        padding: 10px 12px;
        border-radius: 12px;
        border: 1px solid rgba(0,0,0,0.12);
        background: #fff;
        color: #111;
        font-weight: 900;
        cursor: pointer;
        transition: 0.2s ease;
    }
    .chat-end-btn:hover{ background: rgba(0,0,0,0.03); transform: translateY(-1px); }

    /* 7. MODALS */
    #newsModal, #authModal {
        display:none; position:fixed; inset:0; background:rgba(0,0,0,0.7); 
        justify-content:center; align-items:center; z-index: 3000; backdrop-filter: blur(5px);
    }
    .modal-box { background:white; width:90%; max-width: 450px; border-radius:20px; overflow:hidden; position: relative; animation: fadeIn 0.3s; }
    @keyframes fadeIn { from { opacity: 0; transform: scale(0.9); } to { opacity: 1; transform: scale(1); } }
    .modal-padding { padding: 25px; }

    /* 8. FORM */
    .form-group { margin-bottom: 15px; text-align: left; }
    .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
    .form-group input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 10px; box-sizing: border-box; }

    /* 9. FOOTER */
    .footer-jollibee{
        background: #111;
        color: rgba(255,255,255,0.86);
        padding: 64px 20px 22px;
        margin-top: 40px;
        border-top: 1px solid rgba(255,255,255,0.06);
    }
    .footer-container{
        display: grid;
        grid-template-columns: 1.3fr 1fr 1fr 1.1fr;
        gap: 24px;
        max-width: 1200px;
        margin: 0 auto;
    }
    .footer-brand{
        font-weight: 900;
        font-size: 18px;
        letter-spacing: 0.2px;
        margin: 0 0 10px;
        color: #fff;
    }
    .footer-desc{ margin: 0 0 14px; color: rgba(255,255,255,0.78); line-height: 1.65; font-size: 14px; }
    .footer-col h4{
        margin: 0 0 12px;
        color: #fff;
        font-size: 14px;
        font-weight: 900;
        letter-spacing: 0.6px;
    }
    .footer-list{ margin: 0; padding: 0; list-style: none; display: grid; gap: 10px; }
    .footer-list a{
        color: rgba(255,255,255,0.82);
        text-decoration: none;
        font-weight: 700;
        font-size: 13px;
        transition: 0.2s ease;
    }
    .footer-list a:hover{ color: #ffb36b; }
    .footer-chip{
        display: inline-flex;
        gap: 10px;
        align-items: center;
        padding: 12px 14px;
        border-radius: 16px;
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.08);
        color: rgba(255,255,255,0.88);
        font-weight: 900;
        text-decoration: none;
        width: fit-content;
    }
    .footer-chip i{ color: #ffb36b; }
    .footer-bottom{
        max-width: 1200px;
        margin: 26px auto 0;
        padding-top: 16px;
        border-top: 1px solid rgba(255,255,255,0.08);
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        color: rgba(255,255,255,0.66);
        font-size: 12.5px;
    }
    .footer-bottom a{ color: rgba(255,255,255,0.72); text-decoration: none; font-weight: 800; }
    .footer-bottom a:hover{ color: #ffb36b; }

    /* Responsive */
    @media (max-width: 768px) {
        .about-container { flex-direction: column; text-align: center; }
        .banner-content { left: 20px; text-align: center; }
        .banner-content h1 { font-size: 32px; }
        .footer-container{ grid-template-columns: 1fr; }
    }
    /* 10. SUCCESS POPUP */
    .success-popup-overlay {
        position: fixed; inset: 0; background: rgba(0,0,0,0.8); 
        display: flex; justify-content: center; align-items: center; 
        z-index: 9999; backdrop-filter: blur(8px);
    }
    .success-box {
        background: white; padding: 40px; border-radius: 30px; 
        text-align: center; max-width: 400px; width: 90%; 
        animation: fadeInSuccess 0.4s ease-out; position: relative;
    }
    .success-icon {
        width: 80px; height: 80px; background: #f0fdf4; color: #22c55e; 
        border-radius: 50%; display: flex; align-items: center; 
        justify-content: center; margin: 0 auto 20px; font-size: 40px;
    }
    .btn-done {
        background: #ff6f00; color: white; border: none; padding: 12px 30px; 
        border-radius: 12px; font-weight: bold; cursor: pointer; width: 100%; margin-top: 20px;
    }
    @keyframes fadeInSuccess {
        from { opacity: 0; transform: scale(0.8); }
        to { opacity: 1; transform: scale(1); }
    }

    /* 11. TOAST NOTIFICATIONS */
    #toastStack{
        position: fixed;
        top: 18px;
        right: 18px;
        z-index: 10000;
        display: flex;
        flex-direction: column;
        gap: 10px;
        pointer-events: none;
    }
    .toast{
        pointer-events: auto;
        min-width: 260px;
        max-width: 360px;
        background: rgba(255,255,255,0.95);
        border-radius: 16px;
        padding: 12px 14px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.14);
        border: 1px solid rgba(0,0,0,0.06);
        display: flex;
        align-items: flex-start;
        gap: 10px;
        transform: translateY(-8px);
        opacity: 0;
        transition: 0.25s ease;
        backdrop-filter: blur(8px);
    }
    .toast.show{ transform: translateY(0); opacity: 1; }
    .toast .icon{
        width: 34px; height: 34px;
        border-radius: 12px;
        display:flex; align-items:center; justify-content:center;
        flex: 0 0 auto;
        font-size: 16px;
    }
    .toast.success .icon{ background: #ecfdf5; color: #16a34a; }
    .toast.error .icon{ background: #fef2f2; color: #dc2626; }
    .toast.warn .icon{ background: #fff7ed; color: #ea580c; }
    .toast .content{ flex: 1; }
    .toast .title{ font-weight: 800; font-size: 13px; margin: 0 0 2px; }
    .toast .msg{ margin:0; font-size: 13px; color: #444; line-height: 1.35; }
    .toast .close{
        border: none; background: transparent; cursor: pointer;
        color: #777; font-size: 18px; line-height: 1;
        padding: 2px 6px;
        flex: 0 0 auto;
    }
    </style>
</head>
<body>
    @if(session('success_order_id'))
    <div id="orderSuccessModal" class="success-popup-overlay">
        <div class="success-box">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            <h2 style="color: #16a34a; margin: 0 0 10px;">THÀNH CÔNG!</h2>
            <p style="color: #666; font-size: 16px;">Cảm ơn bạn đã ủng hộ FastFood. <br> Mã đơn hàng của bạn là: <b style="color: #ff6f00;">#{{ session('success_order_id') }}</b></p>
            <button onclick="closeOrderSuccess()" class="btn-done">TIẾP TỤC MUA SẮM</button>
        </div>
    </div>
    @endif

<div id="toastStack" aria-live="polite" aria-relevant="additions"></div>

<div class="header">
    <div class="logo" onclick="goHome()">FastFood</div>
    <div class="menu">
        <a href="javascript:void(0)" onclick="goHome()" class="active">TRANG CHỦ</a>
        <a href="javascript:void(0)" id="nav-about" onclick="loadAbout()">GIỚI THIỆU</a>
        <a href="javascript:void(0)" id="nav-menu" onclick="loadMenu()">THỰC ĐƠN</a>
        <a href="javascript:void(0)" id="nav-promo" onclick="loadPromotion()">KHUYẾN MÃI</a>
        <a href="javascript:void(0)" id="nav-service" onclick="loadService()">DỊCH VỤ</a>
        <a href="javascript:void(0)" id="nav-system" onclick="loadSystem()">HỆ THỐNG</a>
        <a href="javascript:void(0)" id="nav-contact" onclick="loadContact()">LIÊN HỆ</a>
    </div>

<div class="header-right">
    <a href="{{ route('cart.index') }}" class="cart-btn">
        <i class="fas fa-shopping-cart"></i>
        <span>Giỏ hàng</span>
       <span id="cart-count" class="cart-count">
        @php
            $cartCount = 0;
            foreach (session('cart', []) as $it) {
                $cartCount += (int) ($it['SoLuong'] ?? 0);
            }
        @endphp
        {{ $cartCount }}
</span>
    </a>
<div id="auth-section">
    @if(Session::has('khachhang'))
        <span class="user-name" style="color: white; font-weight: bold; margin-right: 15px;">
            <i class="fas fa-user-circle"></i> {{ session('khachhang_ten') ?? (is_object(session('khachhang')) ? session('khachhang')->HoVaTen : '') }}
        </span>
        <a href="{{ route('logout') }}" class="btn-auth btn-logout">Đăng xuất</a>
    @else
        <a href="javascript:void(0)" onclick="openAuthModal('login')" class="btn-auth btn-login">Đăng nhập</a>
        <a href="javascript:void(0)" onclick="openAuthModal('register')" class="btn-auth btn-register">Đăng ký</a>
    @endif
</div>
</div>
</div>

<div id="page-content">
    <div class="slider" id="home-banner">
        <img src="/images/banner.jpg" class="banner-img" alt="Banner">
        <div class="overlay"></div>
        <div class="banner-content">
            <h1>Đặt món nhanh, ngon chuẩn vị</h1>
            <p>Giao nhanh – đóng gói kỹ – ưu đãi cập nhật mỗi ngày. Chọn món bạn thích và đặt ngay trong vài giây.</p>
            <button class="banner-btn" onclick="loadMenu()">ĐẶT MÓN NGAY</button>
        </div>
    </div>

    <div id="main-content">
        <div class="jollibee-services">
            <h2 style="color: #ff6f00;">TẬN HƯỞNG DỊCH VỤ</h2>
            <div class="jollibee-row">
                <div class="jollibee-item"><img src="/images/new1.jpg"><h3>LẤY TẠI CỬA HÀNG</h3></div>
                <div class="jollibee-item"><img src="/images/party.png"><h3>TIỆC SINH NHẬT</h3></div>
                <div class="jollibee-item"><img src="/images/kidclub.png"><h3>KID CLUB</h3></div>
                <div class="jollibee-item"><img src="/images/donhang.jpg"><h3>ĐƠN HÀNG LỚN</h3></div>
            </div>
        </div>

        <div class="section-wrap" style="background:#fff8f3;">
            <div class="section-inner">
                <h2 class="section-title">Món nổi bật hôm nay</h2>
                <p class="section-subtitle">Gợi ý nhanh từ các món mới cập nhật. Nhấn “Thêm vào giỏ” để đặt món, hoặc xem chi tiết để chọn đúng khẩu vị.</p>

                <div class="product-grid">
                    @foreach(($sanpham ?? []) as $sp)
                        @php
                            // Đồng bộ cách lấy ảnh: nếu DB lưu filename thì nằm trong /images/
                            $rawImg = (string) ($sp->hinhanh ?? '');
                            if ($rawImg !== '' && str_starts_with($rawImg, 'http')) {
                                $img = $rawImg;
                            } else {
                                $rawImg = ltrim($rawImg, '/');
                                $img = $rawImg !== '' ? ('/images/' . $rawImg) : '/images/new2.jpg';
                            }
                            $giaGoc = (float) ($sp->Gia ?? 0);
                            $giaGiam = (float) ($sp->gia_giam ?? 0);
                            $giaHienTai = $giaGiam > 0 ? $giaGiam : (($sp->khuyenmai ?? 0) == 1 ? round($giaGoc * 0.9) : $giaGoc);
                        @endphp
                        <div class="product-card">
                            <img class="product-thumb" src="{{ $img }}" alt="{{ $sp->TenSanPham ?? 'Sản phẩm' }}" onerror="this.onerror=null;this.src='/images/new2.jpg';">
                            <div class="product-body">
                                <h3 class="product-name">{{ $sp->TenSanPham ?? 'Sản phẩm' }}</h3>
                                <div class="product-meta">
                                    <div style="display:flex; gap:10px; align-items: baseline;">
                                        <div class="product-price">{{ number_format($giaHienTai, 0, ',', '.') }}đ</div>
                                        @if($giaHienTai < $giaGoc && $giaGoc > 0)
                                            <div class="product-price-old">{{ number_format($giaGoc, 0, ',', '.') }}đ</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-actions">
                                    <button class="btn-outline" type="button" onclick="openProduct('{{ $sp->MaSanPham }}')">
                                        <i class="fa-regular fa-eye"></i> Chi tiết
                                    </button>
                                    <button class="btn-primary" type="button" onclick="addToCart('{{ $sp->MaSanPham }}')">
                                        <i class="fa-solid fa-cart-plus"></i> Thêm vào giỏ
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="value-grid">
                    <div class="value-card">
                        <div class="value-ico"><i class="fa-solid fa-shield-heart"></i></div>
                        <div>
                            <h4>Chất lượng rõ ràng</h4>
                            <p>Nguyên liệu được kiểm soát, chế biến theo quy trình nhất quán để đảm bảo hương vị và an toàn.</p>
                        </div>
                    </div>
                    <div class="value-card">
                        <div class="value-ico"><i class="fa-solid fa-bolt"></i></div>
                        <div>
                            <h4>Phục vụ nhanh</h4>
                            <p>Tối ưu quy trình để bạn đặt món nhanh, theo dõi dễ và nhận hàng đúng kỳ vọng.</p>
                        </div>
                    </div>
                    <div class="value-card">
                        <div class="value-ico"><i class="fa-solid fa-box"></i></div>
                        <div>
                            <h4>Đóng gói kỹ</h4>
                            <p>Đóng gói gọn gàng, hạn chế đổ tràn và giữ nhiệt tốt hơn trong quá trình vận chuyển.</p>
                        </div>
                    </div>
                    <div class="value-card">
                        <div class="value-ico"><i class="fa-solid fa-headset"></i></div>
                        <div>
                            <h4>Hỗ trợ tận tâm</h4>
                            <p>Cần hỗ trợ đơn hàng? Tổng đài và kênh liên hệ luôn sẵn sàng trong giờ phục vụ.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about-jollibee">
            <div class="about-container">
                <div class="about-content">
                    <h1>FastFood – Trọn vẹn trải nghiệm</h1>
                    <p>FastFood hướng tới trải nghiệm đặt món tiện lợi, minh bạch giá và ưu đãi, phục vụ nhất quán theo tiêu chuẩn. Từ món ăn đến đóng gói và giao nhận, chúng tôi luôn ưu tiên sự hài lòng của bạn.</p>
                    <button class="about-btn" onclick="loadAbout()">XEM THÊM</button>
                </div>
                <div class="about-image">
                    <img src="/images/cuahang1.png" alt="Fast Food Delivery">
                </div>
            </div>
        </div>

        <div class="news">
            <h2 style="color: #ff6f00;">TIN TỨC</h2>
            <div class="news-grid">
                <div class="news-card" onclick="openNews(1)"><img src="/images/cuahang.png"><div class="modal-padding"><h4>Khai trương cửa hàng</h4></div></div>
                <div class="news-card" onclick="openNews(2)"><img src="/images/new2.jpg"><div class="modal-padding"><h4>Combo siêu ưu đãi</h4></div></div>
                <div class="news-card" onclick="openNews(3)"><img src="/images/new3.jpg"><div class="modal-padding"><h4>Ưu đãi cuối tuần</h4></div></div>
                <div class="news-card" onclick="openNews(4)"><img src="/images/congty.jpg"><div class="modal-padding"><h4>Tin công ty</h4></div></div>
            </div>
        </div>
    </div>
</div>

<footer class="footer-jollibee">
    <div class="footer-container">
        <div class="footer-col">
            <div class="footer-brand">FASTFOOD VIỆT NAM</div>
            <p class="footer-desc">Đặt món nhanh, giao tận nơi. Chúng tôi tập trung vào chất lượng, tốc độ phục vụ và trải nghiệm mua hàng đơn giản, rõ ràng.</p>
            <a class="footer-chip" href="tel:19001533" aria-label="Gọi tổng đài 1900-1533">
                <i class="fa-solid fa-phone"></i>
                <span>1900-1533</span>
            </a>
        </div>

        <div class="footer-col">
            <h4>HỖ TRỢ KHÁCH HÀNG</h4>
            <ul class="footer-list">
                <li><a href="/lien-he">Liên hệ</a></li>
                <li><a href="/he-thong">Hệ thống cửa hàng</a></li>
                <li><a href="/dich-vu">Dịch vụ</a></li>
                <li><a href="/khuyen-mai">Khuyến mãi</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>THÔNG TIN</h4>
            <ul class="footer-list">
                <li><a href="/gioi-thieu">Giới thiệu</a></li>
                <li><a href="/menu">Thực đơn</a></li>
                <li><a href="/cart">Giỏ hàng</a></li>
                <li><a href="/checkout">Thanh toán</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>KẾT NỐI</h4>
            <ul class="footer-list">
                <li><a href="javascript:void(0)"><i class="fa-brands fa-facebook"></i> Facebook</a></li>
                <li><a href="javascript:void(0)"><i class="fa-brands fa-instagram"></i> Instagram</a></li>
                <li><a href="javascript:void(0)"><i class="fa-brands fa-tiktok"></i> TikTok</a></li>
            </ul>
            <div style="margin-top: 14px; color: rgba(255,255,255,0.72); font-size: 13px; line-height: 1.6;">
                <div><i class="fa-solid fa-location-dot" style="color:#ffb36b;"></i> TP.HCM, Việt Nam</div>
                <div><i class="fa-regular fa-clock" style="color:#ffb36b;"></i> 08:00 – 22:00 (T2–CN)</div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div>© {{ date('Y') }} FastFood. All rights reserved.</div>
        <div style="display:flex; gap: 14px; flex-wrap: wrap;">
            <a href="javascript:void(0)">Chính sách</a>
            <a href="javascript:void(0)">Điều khoản</a>
            <a href="javascript:void(0)">Bảo mật</a>
        </div>
    </div>
</footer>

<div id="newsModal">
    <div class="modal-box">
        <img id="newsImg" src="" style="width:100%; height: 220px; object-fit: cover;">
        <div class="modal-padding">
            <h2 id="newsTitle" style="color:#ff6f00; margin-top: 0;"></h2>
            <p id="newsDesc" style="line-height: 1.6; color: #666;"></p>
            <button class="banner-btn" style="width:100%;" onclick="closeNews()">ĐÓNG</button>
        </div>
    </div>
</div>

<div id="productModal">
    <div class="modal-box">
        <img id="productImg" src="" style="width:100%; height: 220px; object-fit: cover;">
        <div class="modal-padding">
            <h2 id="productTitle" style="color:#ff6f00; margin-top: 0;"></h2>
            <p id="productDesc" style="line-height: 1.6; color: #666; margin-bottom: 0;"></p>
            <div class="modal-actions-row">
                <button class="btn-outline" type="button" onclick="closeProduct()">
                    <i class="fa-solid fa-xmark"></i> Đóng
                </button>
                <button id="productAddBtn" class="btn-primary" type="button">
                    <i class="fa-solid fa-cart-plus"></i> Thêm vào giỏ
                </button>
            </div>
        </div>
    </div>
</div>

<div id="authModal">
    <div class="modal-box modal-padding">
        <span onclick="closeAuthModal()" style="position:absolute; right:20px; top:15px; font-size:25px; cursor:pointer;">&times;</span>
        
        <div id="loginFormSection">
            <h2 style="color:#ff6f00; text-align:center; margin-bottom: 20px;">ĐĂNG NHẬP</h2>
            
           <form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Tài khoản (Họ và Tên)</label>
        <input type="text" name="HoVaTen" required placeholder="Nhập tên...">
    </div>

    <div class="form-group">
        <label>Mật khẩu</label>
        <input type="password" name="password" required placeholder="Nhập mật khẩu...">
    </div>
    
    <button type="submit" class="banner-btn" style="width:100%; margin-top: 10px;">
        ĐĂNG NHẬP
    </button>
</form>
            
            <p style="text-align:center; margin-top:15px;">Chưa có tài khoản? <a href="javascript:void(0)" onclick="toggleAuthForm('register')" style="color:#ff6f00; font-weight:bold;">Đăng ký</a></p>
        </div>

        <div id="registerFormSection" style="display:none;">
            <h2 style="color:#ff6f00; text-align:center;">ĐĂNG KÝ</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group"><label>Họ và tên</label><input type="text" name="name" required></div>
                <div class="form-group"><label>Email</label><input type="email" name="email" required></div>
                <div class="form-group"><label>Mật khẩu</label><input type="password" name="password" required></div>
                <button type="submit" class="banner-btn" style="width:100%;">ĐĂNG KÝ</button>
            </form>
            <p style="text-align:center; margin-top:15px;"><a href="javascript:void(0)" onclick="toggleAuthForm('login')" style="color:#ff6f00; font-weight:bold;">Quay lại Đăng nhập</a></p>
        </div>
    </div>
</div>

<!-- CHAT WIDGET -->
<button id="chatFab" type="button" aria-label="Mở chat hỗ trợ">
    <i class="fa-solid fa-comments"></i>
</button>
<div id="chatPanel" role="dialog" aria-label="Chat hỗ trợ">
    <div class="chat-head">
        <div class="title"><i class="fa-solid fa-headset"></i> Hỗ trợ khách hàng</div>
        <button class="close" type="button" aria-label="Đóng" onclick="toggleChat(false)">&times;</button>
    </div>
    <div id="chatPre" class="chat-pre">
        <div style="font-weight:900; margin-bottom:8px;">Để lại thông tin để tư vấn nhanh</div>
        <div class="row">
            <input id="chatName" placeholder="Họ và tên (tuỳ chọn)" />
            <input id="chatPhone" placeholder="Số điện thoại (tuỳ chọn)" />
            <button id="chatStartBtn" class="btn" type="button">Bắt đầu chat</button>
        </div>
        <div style="margin-top:8px; color: rgba(0,0,0,0.62); font-size: 12.5px; line-height:1.4;">
            Bạn có thể để trống và bắt đầu chat ngay.
        </div>
    </div>
    <div id="chatBody" class="chat-body"></div>
    <div class="chat-end-wrap">
        <button id="chatEndBtn" class="chat-end-btn" type="button">Kết thúc cuộc trò chuyện</button>
    </div>
    <div class="chat-foot">
        <textarea id="chatText" placeholder="Nhập tin nhắn..." maxlength="2000"></textarea>
        <button id="chatSendBtn" type="button">Gửi</button>
    </div>
</div>
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function showToast(type, message, title) {
    const stack = document.getElementById('toastStack');
    if (!stack) return;

    const safeType = (type === 'success' || type === 'error' || type === 'warn') ? type : 'success';
    const t = title || (safeType === 'success' ? 'Yay!' : safeType === 'error' ? 'Oops!' : 'Lưu ý');
    const icon = safeType === 'success' ? '✓' : safeType === 'error' ? '!' : 'i';

    const toast = document.createElement('div');
    toast.className = 'toast ' + safeType;
    toast.innerHTML = `
        <div class="icon">${icon}</div>
        <div class="content">
            <div class="title">${t}</div>
            <p class="msg"></p>
        </div>
        <button class="close" type="button" aria-label="Đóng">&times;</button>
    `;
    toast.querySelector('.msg').textContent = message || '';

    const closeBtn = toast.querySelector('.close');
    const remove = () => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 220);
    };
    closeBtn.addEventListener('click', remove);

    stack.appendChild(toast);
    // animate in
    requestAnimationFrame(() => toast.classList.add('show'));
    // auto close
    setTimeout(remove, 2400);
}

// Dùng cho trang khuyến mãi (và các nơi gọi addToCart)
function addToCart(productId) {
    const token = $('meta[name="csrf-token"]').attr('content');
    return $.ajax({
        url: "{{ route('cart.add') }}",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': token
        },
        xhrFields: {
            withCredentials: true
        },
        data: {
            _token: token,
            id: productId
        },
        success: function (res) {
            if (res && res.success) {
                const badge = document.getElementById('cart-count');
                if (badge && res.count !== undefined) badge.innerText = res.count;
                showToast('success', res.message || 'Đã thêm vào giỏ hàng!', 'Đã thêm');
            } else {
                showToast('warn', res?.message || 'Không thể thêm vào giỏ!', 'Chưa xong');
                if (res?.redirect) window.location.href = res.redirect;
            }
        },
        error: function (xhr) {
            if (xhr.status === 419) {
                showToast('warn', 'Phiên làm việc đã hết hạn. Vui lòng tải lại trang!', 'Hết phiên');
                return;
            }
            if (xhr.status === 401) {
                showToast('warn', 'Vui lòng đăng nhập để đặt món nhé.', 'Chưa đăng nhập');
                // nếu có modal login thì mở, không thì chuyển trang
                if (typeof openAuthModal === 'function') openAuthModal('login');
                else window.location.href = '/login';
                return;
            }
            showToast('error', 'Lỗi hệ thống, vui lòng thử lại!', 'Có lỗi');
        }
    });
}

// Bắt click nút "THÊM VÀO GIỎ" trong menu (menu load bằng AJAX nên không chạy script nội bộ)
document.addEventListener('click', function (e) {
    const btn = e.target.closest('button.js-add-to-cart');
    if (!btn) return;
    e.preventDefault();
    e.stopPropagation();

    const productId = btn.getAttribute('data-product-id');
    if (!productId) return;

    const originalHtml = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> ĐANG THÊM...';

    const req = (typeof addToCart === 'function') ? addToCart(productId) : null;
    if (req && typeof req.always === 'function') {
        req.always(() => {
            btn.disabled = false;
            btn.innerHTML = originalHtml;
        });
    } else {
        btn.disabled = false;
        btn.innerHTML = originalHtml;
    }
});
    // --- DỮ LIỆU TIN TỨC ---
    const newsData = {
        1: { img: '/images/cuahang.png', title: 'KHAI TRƯƠNG CỬA HÀNG', desc: 'Chào đón cửa hàng mới tại trung tâm thành phố với hàng ngàn voucher giảm giá 50%.' },
        2: { img: '/images/new2.jpg', title: 'COMBO SIÊU CẤP', desc: 'Combo Gà + Khoai + Pepsi chỉ 69k áp dụng cho cả ăn tại chỗ và mang về.' },
        3: { img: '/images/new3.jpg', title: 'ƯU ĐÃI CUỐI TUẦN', desc: 'Giảm giá cực sốc vào mỗi thứ 7 và Chủ Nhật hàng tuần cho các dòng Burger.' },
        4: { img: '/images/congty.jpg', title: 'TIN TỨC CÔNG TY', desc: 'FastFood vinh dự nhận giải thưởng thương hiệu thức ăn nhanh được yêu thích nhất 2026.' }
    };

    function openNews(id) {
        const item = newsData[id];
        document.getElementById("newsImg").src = item.img;
        document.getElementById("newsTitle").innerText = item.title;
        document.getElementById("newsDesc").innerText = item.desc;
        document.getElementById("newsModal").style.display = "flex";
        document.body.style.overflow = "hidden";
    }
    function closeNews() { document.getElementById("newsModal").style.display = "none"; document.body.style.overflow = "auto"; }

    // --- DỮ LIỆU SẢN PHẨM NỔI BẬT (HIỂN THỊ MODAL GIỐNG TIN TỨC) ---
    const productData = {
        @foreach(($sanpham ?? []) as $sp)
            @php
                $img = $sp->hinhanh ? (str_starts_with($sp->hinhanh, 'http') ? $sp->hinhanh : (str_starts_with($sp->hinhanh, '/') ? $sp->hinhanh : '/'.$sp->hinhanh)) : '';
                // Nếu file name thuần (vd: ga.jpg) thì ưu tiên /images/
                if ($img && !str_starts_with($img, 'http') && !str_starts_with($img, '/images/')) {
                    $img = '/images/' . ltrim($sp->hinhanh, '/');
                }
                $desc = $sp->MoTa ?? null;
                if (!$desc) {
                    $desc = 'Hương vị tuyệt hảo từ FastFood, được chế biến từ nguyên liệu tươi sạch, đảm bảo vệ sinh an toàn thực phẩm.';
                }
            @endphp
            "{{ $sp->MaSanPham }}": {
                img: @json($img ?: '/images/new2.jpg'),
                title: @json($sp->TenSanPham ?? 'Sản phẩm'),
                desc: @json($desc),
            },
        @endforeach
    };

    function openProduct(id){
        const item = productData[id];
        if (!item) return;
        document.getElementById("productImg").src = item.img;
        document.getElementById("productTitle").innerText = item.title;
        document.getElementById("productDesc").innerText = item.desc;

        const addBtn = document.getElementById('productAddBtn');
        if (addBtn) {
            addBtn.onclick = function(){ addToCart(id); };
        }

        document.getElementById("productModal").style.display = "flex";
        document.body.style.overflow = "hidden";
    }
    function closeProduct(){
        const m = document.getElementById("productModal");
        if (m) m.style.display = "none";
        document.body.style.overflow = "auto";
    }

    // --- AUTH MODAL ---
    function openAuthModal(type) { document.getElementById('authModal').style.display = "flex"; toggleAuthForm(type); }
    function closeAuthModal() { document.getElementById('authModal').style.display = "none"; }
    function toggleAuthForm(type) {
        document.getElementById('loginFormSection').style.display = (type === 'login') ? 'block' : 'none';
        document.getElementById('registerFormSection').style.display = (type === 'register') ? 'block' : 'none';
    }

    
    // --- AJAX NAVIGATION ---
    function loadAjaxPage(url, navId) {
    console.log("Đang tải trang: " + url); // Kiểm tra xem hàm có chạy không
    
    fetch(url)
        .then(res => {
            if (!res.ok) throw new Error("Mã lỗi: " + res.status);
            return res.text();
        })
        .then(data => {
            // 1. Ẩn banner trang chủ
            const banner = document.getElementById('home-banner');
            if(banner) banner.style.display = "none";

            // 2. Đổ dữ liệu vào vùng nội dung chính
            const mainContent = document.getElementById('main-content');
            if(mainContent) {
                mainContent.innerHTML = data;
            } else {
                console.error("Không tìm thấy div #main-content");
            }

            // 3. Cập nhật menu active
            setActive(navId);
            
            // 4. Cập nhật URL trình duyệt (không load lại trang)
            window.history.pushState({}, '', url);
        })
        .catch(err => {
            console.error("Lỗi tải trang:", err);
            showToast('error', "Không thể tải trang. Vui lòng thử lại!", 'Lỗi tải trang');
        });
}
    function setActive(id) {
        document.querySelectorAll('.menu a').forEach(a => a.classList.remove('active'));
        const activeLink = document.getElementById(id);
        if(activeLink) activeLink.classList.add('active');
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function goHome() { location.href = "/"; }
    function loadAbout() { loadAjaxPage('/gioi-thieu', 'nav-about'); }
    function loadMenu() { loadAjaxPage('/menu', 'nav-menu'); }
    function loadPromotion() { loadAjaxPage('/khuyen-mai', 'nav-promo'); }
    function loadService() { loadAjaxPage('/dich-vu', 'nav-service'); }
    function loadSystem() { loadAjaxPage('/he-thong', 'nav-system'); }
    function loadContact() { loadAjaxPage('/lien-he', 'nav-contact'); }

    // Menu categories: đổi nội dung ngay trong trang menu (không chuyển trang)
    document.addEventListener('click', function (e) {
        const a = e.target.closest('a.js-category');
        if (!a) return;
        e.preventDefault();
        e.stopPropagation();

        const url = a.getAttribute('data-url') || '/menu';
        loadAjaxPage(url, 'nav-menu');
    });

    // Đóng modal khi click ra ngoài
    window.onclick = function(e) {
        if (e.target == document.getElementById('authModal')) closeAuthModal();
        if (e.target == document.getElementById('newsModal')) closeNews();
        if (e.target == document.getElementById('productModal')) closeProduct();
    }
    



// Hàm đóng Popup và quay về trang chủ
    function closeOrderSuccess() {
        const modal = document.getElementById('orderSuccessModal');
        if(modal) {
            modal.style.display = 'none';
            window.location.href = '/'; // Tải lại trang chủ để làm mới giỏ hàng
        }
    }
function addProductToCart(productId) {
    // Đồng bộ dùng chung endpoint /cart/add (Session cart)
    if (typeof addToCart === 'function') return addToCart(productId);
}
function closeAuthModal() { 
    document.getElementById('authModal').style.display = "none"; 
    // Nếu thấy có session (tên user đã hiện) mà vẫn đang ở trang menu ảo, hãy reload
    if(document.querySelector('.user-name')) {
        // window.location.href = "/"; 
    }
}

// --- CHAT WIDGET ---
let __chat = {
    open: false,
    sessionId: null,
    lastId: 0,
    timer: null,
    fetching: false,
    started: false,
    token: null,
    sending: false,
    es: null
};

function __chatLoadToken(){
    try { return localStorage.getItem('ff_chat_token'); } catch(e){ return null; }
}
function __chatSaveToken(t){
    try { if (t) localStorage.setItem('ff_chat_token', t); } catch(e){}
}
function __chatClearToken(){
    try { localStorage.removeItem('ff_chat_token'); } catch(e){}
}

function __chatEsc(s){
    return (s ?? '').toString()
        .replaceAll('&','&amp;')
        .replaceAll('<','&lt;')
        .replaceAll('>','&gt;');
}

function toggleChat(force){
    const panel = document.getElementById('chatPanel');
    if (!panel) return;
    const toOpen = (force === undefined) ? (panel.style.display !== 'block') : !!force;
    panel.style.display = toOpen ? 'flex' : 'none';
    __chat.open = toOpen;
    if (toOpen) {
        __chatLockInput();
        // Nếu đã có phiên chat đang mở trong server session thì resume để thấy tin admin
        // load token for stable resume (even after reload)
        __chat.token = __chatLoadToken();
        fetch('/chat/status', {
            credentials: 'same-origin',
            headers: (__chat.token ? { 'X-CHAT-TOKEN': __chat.token } : {})
        })
            .then(r => r.json())
            .then(res => {
                if (!__chat.open) return;
                if (res && res.success && res.has_session && res.session_id) {
                    __chat.sessionId = res.session_id;
                    __chat.started = true;
                    const pre = document.getElementById('chatPre');
                    if (pre) pre.style.display = 'none';
                    __chatUnlockInput();
                    __chatStartPolling();
                    __chatFetch(true);
                } else {
                    __chatEnsureSession();
                }
            })
            .catch(() => {
                __chatEnsureSession();
            });
    } else {
        __chatStopPolling();
    }
}

function __chatStartPolling(){
    __chatStopPolling();
    // Fallback poll nhanh
    __chatFetch(true);
    __chat.timer = setInterval(() => __chatFetch(false), 900);

    // SSE realtime (nếu trình duyệt hỗ trợ)
    if (typeof EventSource === 'function' && __chat.sessionId) {
        const qs = new URLSearchParams({
            sid: String(__chat.sessionId),
            after_id: String(__chat.lastId),
            token: __chat.token || __chatLoadToken() || '',
            t: String(Date.now())
        });
        try {
            __chat.es = new EventSource(`/chat/stream?${qs.toString()}`);
            __chat.es.addEventListener('messages', (ev) => {
                try {
                    const arr = JSON.parse(ev.data || '[]');
                    __chatRender(arr, false);
                } catch(e){}
            });
            // Khi SSE chạy ổn thì không cần poll nữa
            if (__chat.timer) clearInterval(__chat.timer);
            __chat.timer = null;
        } catch(e) {
            __chat.es = null;
        }
    }
}
function __chatStopPolling(){
    if (__chat.timer) clearInterval(__chat.timer);
    __chat.timer = null;
    try { __chat.es?.close(); } catch(e){}
    __chat.es = null;
}

function __chatEnsureSession(){
    if (__chat.sessionId) return;
    const pre = document.getElementById('chatPre');
    if (pre) pre.style.display = 'block';
}

function __chatLockInput(){
    const ta = document.getElementById('chatText');
    const btn = document.getElementById('chatSendBtn');
    if (ta) ta.disabled = true;
    if (btn) btn.disabled = true;
}
function __chatUnlockInput(){
    const ta = document.getElementById('chatText');
    const btn = document.getElementById('chatSendBtn');
    if (ta) ta.disabled = false;
    if (btn) btn.disabled = false;
}

function __chatResetToPre(){
    __chatStopPolling();
    __chat.sessionId = null;
    __chat.lastId = 0;
    __chat.started = false;
    __chat.token = null;
    __chatClearToken();
    const body = document.getElementById('chatBody');
    if (body) body.innerHTML = '';
    const pre = document.getElementById('chatPre');
    if (pre) pre.style.display = 'block';
    const name = document.getElementById('chatName');
    const phone = document.getElementById('chatPhone');
    if (name) name.value = '';
    if (phone) phone.value = '';
    __chatLockInput();
}

function __chatStartSession(){
    const name = (document.getElementById('chatName')?.value || '').trim();
    const phone = (document.getElementById('chatPhone')?.value || '').trim();
    if (!name || !phone) {
        showToast('warn', 'Vui lòng nhập Tên và SĐT để bắt đầu chat.', 'Thiếu thông tin');
        return Promise.resolve(false);
    }
    const token = $('meta[name="csrf-token"]').attr('content');
    __chat.token = __chat.token || __chatLoadToken();
    return $.ajax({
        url: '/chat/start',
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': token },
        data: { name, phone }
    }).then(res => {
        if (res && res.success) {
            __chat.sessionId = res.session_id;
            if (res.chat_token) { __chat.token = res.chat_token; __chatSaveToken(res.chat_token); }
            __chat.lastId = 0;
            __chat.started = true;
            const body = document.getElementById('chatBody');
            if (body) body.innerHTML = '';
            const pre = document.getElementById('chatPre');
            if (pre) pre.style.display = 'none';
            __chatUnlockInput();
            __chatStartPolling();
            return true;
        }
        return false;
    }).catch(() => false);
}

function __chatRender(messages, initial){
    const body = document.getElementById('chatBody');
    if (!body || !messages || !messages.length) return;
    const nearBottom = (body.scrollTop + body.clientHeight + 120) >= body.scrollHeight;
    let html = '';
    for (const m of messages){
        // Chỉ update lastId với message thật từ server (id > 0)
        const mid = Number(m.id || 0);
        if (Number.isFinite(mid) && mid > 0) __chat.lastId = Math.max(__chat.lastId, mid);
        const rowCls = (m.sender_type === 'customer') ? 'me' : 'other';
        html += `
            <div class="chat-row ${rowCls}">
                <div>
                    <div class="chat-bubble">${__chatEsc(m.message)}</div>
                    <div class="chat-time">${__chatEsc(m.created_at_fmt || '')}</div>
                </div>
            </div>
        `;
    }
    body.insertAdjacentHTML('beforeend', html);
    if (initial || nearBottom) body.scrollTop = body.scrollHeight;
}

function __chatFetch(initial){
    if (!__chat.open) return;
    if (!__chat.sessionId) return;
    if (__chat.fetching) return;
    __chat.fetching = true;
    const qs = new URLSearchParams({
        after_id: String(__chat.lastId),
        sid: String(__chat.sessionId),
        t: String(Date.now()) // cache-bust
    });
    return fetch(`/chat/fetch?${qs.toString()}`, {
        credentials: 'same-origin',
        headers: (__chat.token ? { 'X-CHAT-TOKEN': __chat.token } : {})
    })
        .then(r => r.json())
        .then(res => {
            if (!res || !res.success) return;
            __chatRender(res.messages || [], initial);
        })
        .catch(() => {})
        .finally(() => { __chat.fetching = false; });
}

// (Đã bỏ long-poll vì dễ gây chậm trên XAMPP. Dùng poll nhanh + render ngay khi gửi.)

function __chatSend(){
    const btn = document.getElementById('chatSendBtn');
    const ta = document.getElementById('chatText');
    const msg = (ta?.value || '').trim();
    if (!msg) return;

    const doSend = () => {
        __chatStopPolling();
        if (__chat.sending) return;
        __chat.sending = true;
        btn.disabled = true;
        const token = $('meta[name="csrf-token"]').attr('content');
        const chatToken = __chat.token || __chatLoadToken();

        // Hiện ngay tin nhắn của khách (không chờ server)
        __chatRender([{
            id: 0, // tin tạm (không làm tăng lastId)
            sender_type: 'customer',
            message: msg,
            created_at_fmt: ''
        }], false);

        return $.ajax({
            url: '/chat/send',
            type: 'POST',
            headers: Object.assign(
                { 'X-CSRF-TOKEN': token },
                (chatToken ? { 'X-CHAT-TOKEN': chatToken } : {})
            ),
            data: { message: msg }
        }).then(() => {
            if (ta) ta.value = '';
            // fetch để lấy tin auto-reply/admin mới nhất + đồng bộ lastId
            return __chatFetch(false);
        }).finally(() => {
            btn.disabled = false;
            __chat.sending = false;
            __chatStartPolling();
        });
    };

    // Bắt buộc đã "Bắt đầu chat" (nhập tên + sdt)
    if (!__chat.sessionId || !__chat.started) {
        showToast('warn', 'Bạn cần nhập Tên và SĐT rồi bấm "Bắt đầu chat" trước.', 'Chưa bắt đầu');
        const pre = document.getElementById('chatPre');
        if (pre) pre.style.display = 'block';
        return;
    }
    doSend();
}

document.addEventListener('click', function(e){
    const fab = e.target.closest('#chatFab');
    if (fab) { toggleChat(); return; }
});
document.addEventListener('click', function(e){
    const startBtn = e.target.closest('#chatStartBtn');
    if (startBtn) { __chatStartSession(); return; }
    const sendBtn = e.target.closest('#chatSendBtn');
    if (sendBtn) { __chatSend(); return; }
    const endBtn = e.target.closest('#chatEndBtn');
    if (endBtn) {
        const token = $('meta[name="csrf-token"]').attr('content');
        fetch('/chat/end', {
            method: 'POST',
            headers: Object.assign(
                { 'X-CSRF-TOKEN': token || '' },
                (__chat.token ? { 'X-CHAT-TOKEN': __chat.token } : {})
            ),
            credentials: 'same-origin'
        })
        .then(r => r.json())
        .then(res => {
            if (res && res.success) {
                showToast('success', 'Đã kết thúc cuộc trò chuyện.', 'Hoàn tất');
                __chatResetToPre();
            } else {
                showToast('error', res?.message || 'Không thể kết thúc cuộc trò chuyện.', 'Lỗi');
            }
        })
        .catch(() => showToast('error', 'Không thể kết thúc cuộc trò chuyện.', 'Lỗi'));
        return;
    }
});
document.addEventListener('keydown', function(e){
    if (!__chat.open) return;
    if (e.key !== 'Enter') return;
    const ta = e.target.closest('#chatText');
    if (!ta) return;
    if (e.shiftKey) return;
    e.preventDefault();
    __chatSend();
});
    
</script>

</body>
</html>