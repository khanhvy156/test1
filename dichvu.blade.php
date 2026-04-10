<style>
    /* RESET & FONT */
    .service-page { font-family: 'Montserrat', 'Segoe UI', sans-serif; color: #2d3436; line-height: 1.6; }

    /* 1. HERO SECTION - CỰC CHÁY */
    .service-hero {
        background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                    url('https://images.unsplash.com/photo-1552566626-52f8b828add9?w=1600');
        background-size: cover; background-attachment: fixed; background-position: center;
        height: 550px; display: flex; align-items: center; justify-content: center; text-align: center; color: white;
    }
    .hero-content h1 { font-size: 65px; font-weight: 900; text-transform: uppercase; letter-spacing: 5px; margin-bottom: 20px; color: #ff7043; }
    .hero-content p { font-size: 20px; max-width: 800px; margin: 0 auto; opacity: 0.9; font-weight: 300; }

    /* 2. CORE SERVICES - DỊCH VỤ CỐT LÕI */
    .section-padding { padding: 100px 0; }
    .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
    
    .main-services { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 40px; margin-top: -100px; }
    
    .service-card {
        background: white; padding: 50px 40px; border-radius: 30px; 
        box-shadow: 0 20px 40px rgba(0,0,0,0.1); border-bottom: 5px solid #ff7043;
        transition: 0.4s ease; position: relative;
    }
    .service-card:hover { transform: translateY(-15px); }
    .service-card i { font-size: 50px; color: #ff7043; margin-bottom: 25px; display: block; }
    .service-card h3 { font-size: 26px; margin-bottom: 20px; color: #d35400; text-transform: uppercase; }
    .service-card p { font-size: 15px; color: #636e72; text-align: justify; }

    /* 3. QUY TRÌNH 5S - NHIỀU CHỮ & CHUYÊN NGHIỆP */
    .process-section { background: #f9f9f9; padding: 100px 0; }
    .title-wrapper { text-align: center; margin-bottom: 70px; }
    .title-wrapper h2 { font-size: 40px; text-transform: uppercase; color: #2d3436; }
    .title-wrapper .line { width: 80px; height: 5px; background: #ff7043; margin: 20px auto; }

    .process-box { display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: center; }
    .process-content h4 { font-size: 24px; color: #ff7043; margin-bottom: 15px; }
    .process-content p { margin-bottom: 30px; font-size: 16px; color: #2d3436; }
    .process-step-item { display: flex; gap: 20px; margin-bottom: 25px; }
    .step-icon { background: #ff7043; color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-weight: bold; }

    /* 4. BẢNG GIÁ DỊCH VỤ TIỆC - NHÌN LÀ MUỐN ĐẶT */
    .pricing-area { padding: 100px 0; background: #2d3436; color: white; }
    .price-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 50px; }
    
    .price-card {
        background: rgba(255,255,255,0.05); padding: 50px 30px; border-radius: 40px;
        border: 1px solid rgba(255,255,255,0.1); backdrop-filter: blur(10px); text-align: center;
        transition: 0.3s;
    }
    .price-card:hover { background: rgba(255,255,255,0.1); border-color: #ff7043; }
    .price-card.popular { border: 2px solid #ff7043; transform: scale(1.05); }
    .badge { background: #ff7043; color: white; padding: 5px 15px; border-radius: 20px; font-size: 12px; margin-bottom: 15px; display: inline-block; }
    
    .price-card h4 { font-size: 22px; margin-bottom: 10px; }
    .price-card .cost { font-size: 45px; font-weight: 900; color: #ff7043; display: block; margin-bottom: 30px; }
    .price-card ul { list-style: none; padding: 0; margin-bottom: 40px; }
    .price-card ul li { padding: 10px 0; border-bottom: 1px solid rgba(255,255,255,0.1); font-size: 14px; opacity: 0.8; }
    
    .btn-order-service {
        display: inline-block; width: 100%; padding: 15px; background: #ff7043; color: white;
        text-decoration: none; border-radius: 50px; font-weight: bold; transition: 0.3s;
    }
    .btn-order-service:hover { background: white; color: #ff7043; }

    /* 5. LIÊN HỆ GẤP */
    .contact-bar { background: #ff7043; padding: 40px 0; text-align: center; color: white; }
    .contact-bar h3 { font-size: 28px; margin-bottom: 10px; color: white !important; }
    .contact-bar p { font-size: 18px; }
</style>

<div class="service-page">
    <section class="service-hero">
        <div class="hero-content">
            <h1>Dịch Vụ Chuyên Nghiệp</h1>
            <p>Hơn cả một bữa ăn nhanh, chúng tôi mang đến giải pháp ẩm thực toàn diện cho cuộc sống hiện đại của bạn với tiêu chuẩn chất lượng quốc tế.</p>
        </div>
    </section>

    <div class="container">
        <section class="main-services">
            <div class="service-card">
                <h3>🚀 Giao Hàng Hỏa Tốc</h3>
                <p>Hệ thống vận hành thông minh đảm bảo đơn hàng của bạn được xử lý trong 60 giây và giao tận cửa trong vòng 20-30 phút. Chúng tôi sử dụng túi giữ nhiệt 3 lớp công nghệ mới nhất để giữ khoai tây chiên luôn giòn tan và gà rán luôn nóng hổi như vừa rời khỏi chảo dầu.</p>
            </div>
            <div class="service-card">
                <h3>🎂 Tổ Chức Sự Kiện</h3>
                <p>Bạn muốn một buổi sinh nhật "cháy" nhất? Đội ngũ sự kiện của FastFood sẽ lo từ khâu thiết kế thiệp mời, trang trí không gian theo chủ đề (Siêu anh hùng, Công chúa,...) đến việc chuẩn bị các trò chơi hoạt náo và thực đơn tiệc buffet gà rán không giới hạn.</p>
            </div>
            <div class="service-card">
                <h3>💼 Suất Ăn Doanh Nghiệp</h3>
                <p>Giải pháp tối ưu cho các buổi họp, hội thảo hoặc cơm trưa văn phòng. Chúng tôi cung cấp các combo "Lunch-Box" đầy đủ dinh dưỡng, đóng gói sang trọng và hỗ trợ xuất hóa đơn VAT nhanh chóng cho doanh nghiệp trong vòng 24h.</p>
            </div>
        </section>
    </div>

    <section class="process-section">
        <div class="container">
            <div class="title-wrapper">
                <h2>Quy Trình Phục Vụ Chuẩn 5 Sao</h2>
                <div class="line"></div>
                <p>Để có một miếng gà hoàn hảo, chúng tôi tuân thủ nghiêm ngặt 5 bước vàng</p>
            </div>
            
            <div class="process-box">
                <div class="process-img">
                    <img src="https://images.unsplash.com/photo-1559466273-d95e72debaf8?w=600" style="width: 100%; border-radius: 40px; box-shadow: 0 30px 60px rgba(0,0,0,0.15);">
                </div>
                <div class="process-content">
                    <div class="process-step-item">
                        <div class="step-icon">1</div>
                        <div>
                            <h4>Tuyển chọn nguyên liệu</h4>
                            <p>Tất cả thịt gà và rau củ đều được nhập từ các trang trại chuẩn VietGAP vào lúc 4 giờ sáng mỗi ngày. Nguyên liệu luôn tươi mới, nói không với thực phẩm đông lạnh quá hạn.</p>
                        </div>
                    </div>
                    <div class="process-step-item">
                        <div class="step-icon">2</div>
                        <div>
                            <h4>Tẩm ướp độc quyền</h4>
                            <p>Sử dụng công thức 11 loại gia vị thảo mộc bí truyền. Thịt được massage và ướp trong phòng lạnh 4 tiếng để thấm sâu vào từng thớ thịt trước khi đem đi chế biến.</p>
                        </div>
                    </div>
                    <div class="process-step-item">
                        <div class="step-icon">3</div>
                        <div>
                            <h4>Chế biến áp suất</h4>
                            <p>Sử dụng hệ thống nồi chiên áp suất hiện đại giúp gà chín đều từ bên trong, giữ được độ mọng nước (juicy) mà lớp vỏ bên ngoài vẫn đạt độ giòn rụm hoàn hảo.</p>
                        </div>
                    </div>
                    <div class="process-step-item">
                        <div class="step-icon">4</div>
                        <div>
                            <h4>Kiểm soát chất lượng (KCS)</h4>
                            <p>Mỗi món ăn trước khi đóng gói đều phải qua khâu kiểm tra nhiệt độ và trình bày. Chỉ những sản phẩm đạt điểm 10 chất lượng mới được phép giao đến khách hàng.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing-area">
        <div class="container">
            <div class="title-wrapper">
                <h2 style="color: white;">Báo Giá Dịch Vụ Đặt Tiệc</h2>
                <div class="line"></div>
            </div>
            
            <div class="price-grid">
                <div class="price-card">
                    <h4>GÓI SINH NHẬT</h4>
                    <span class="cost">1.200k</span>
                    <ul>
                        <li>Áp dụng cho nhóm 10 - 12 trẻ em</li>
                        <li>12 Phần ăn trẻ em tự chọn</li>
                        <li>Trang trí bong bóng & nón tiệc</li>
                        <li>Tặng bánh kem bắp cao cấp</li>
                        <li>Tặng 1 bộ đồ chơi cho chủ tiệc</li>
                    </ul>
                    <a href="#" class="btn-order-service">ĐẶT TIỆC NGAY</a>
                </div>
                
                <div class="price-card popular">
                    <div class="badge">BÁN CHẠY NHẤT</div>
                    <h4>GÓI VĂN PHÒNG</h4>
                    <span class="cost">2.500k</span>
                    <ul>
                        <li>Áp dụng cho 20 - 25 người</li>
                        <li>Combo gà rán & Burger đa dạng</li>
                        <li>Miễn phí 25 phần nước ngọt lớn</li>
                        <li>Giao hàng đúng giờ họp</li>
                        <li>Hỗ trợ xuất hóa đơn đỏ (VAT)</li>
                    </ul>
                    <a href="#" class="btn-order-service">ĐẶT TIỆC NGAY</a>
                </div>
                
                <div class="price-card">
                    <h4>GÓI SỰ KIỆN LỚN</h4>
                    <span class="cost">5.000k</span>
                    <ul>
                        <li>Áp dụng cho trên 50 người</li>
                        <li>Thực đơn thiết kế theo ngân sách</li>
                        <li>Có nhân viên phục vụ tận nơi</li>
                        <li>Hệ thống âm thanh karaoke</li>
                        <li>Ưu đãi giảm 10% lần đặt sau</li>
                    </ul>
                    <a href="#" class="btn-order-service">LIÊN HỆ BÁO GIÁ</a>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-bar">
        <div class="container">
            <h3>TỔNG ĐÀI CHĂM SÓC KHÁCH HÀNG 24/7</h3>
            <p>Gọi ngay <strong>1900 6789</strong> để được hỗ trợ mọi vấn đề về dịch vụ và đơn hàng của bạn.</p>
        </div>
    </section>
</div>