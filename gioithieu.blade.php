<style>
    /* Tổng thể - Phong cách Modern Minimalism */
    .about-page {
        font-family: 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
        color: #222;
        line-height: 1.8;
    }

    /* 1. HERO SECTION - Hoành tráng tràn viền (Full width) */
    .about-hero {
        background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                    url('https://images.unsplash.com/photo-1513104890138-7c749659a591?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        height: 70vh; /* Cao hơn để tạo cảm giác đẳng cấp */
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
    }

    .about-hero h1 {
        font-size: 60px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin: 0;
        text-shadow: 2px 2px 15px rgba(0,0,0,0.3);
    }

    .about-hero p {
        font-size: 20px;
        font-weight: 300;
        max-width: 600px;
        margin: 15px auto 0;
    }

    /* 2. CHỈ SỐ ẤN TƯỢNG (Stats Section) */
    .stats-container {
        display: flex;
        justify-content: space-around;
        background: white;
        padding: 50px 10%;
        margin-top: -60px; /* Nhấc lên trên Hero một chút */
        border-radius: 15px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        width: 80%;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        z-index: 10;
    }

    .stat-card { text-align: center; }
    .stat-card h2 { font-size: 45px; color: #ff7043; margin: 0; }
    .stat-card p { font-weight: bold; color: #666; margin-top: 5px; text-transform: uppercase; font-size: 14px; }

    /* 3. NỘI DUNG CHI TIẾT - CHỮ XEN KẼ ẢNH */
    .about-section {
        max-width: 1200px;
        margin: 100px auto;
        padding: 0 30px;
    }

    .section-title {
        text-align: center;
        margin-bottom: 70px;
    }

    .section-title h2 {
        font-size: 36px;
        color: #ff7043;
        position: relative;
        display: inline-block;
        padding-bottom: 15px;
    }

    .section-title h2::after {
        content: "";
        position: absolute;
        bottom: 0; left: 25%;
        width: 50%; height: 3px;
        background: #ff7043;
    }

    .content-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 80px;
        align-items: center;
        margin-bottom: 100px;
    }

    .content-text h3 { font-size: 28px; color: #333; margin-bottom: 20px; }
    .content-text p { margin-bottom: 20px; font-size: 17px; text-align: justify; color: #555; }

    /* 4. CAM KẾT CHẤT LƯỢNG (Quality Cards) */
    .commitments {
        background: #fdf2ee;
        padding: 80px 0;
        text-align: center;
    }

    .commitment-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 50px auto 0;
        padding: 0 30px;
    }

    .commit-card {
        background: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        transition: 0.3s;
        border-bottom: 5px solid #eee;
    }

    .commit-card:hover {
        transform: translateY(-10px);
        border-bottom-color: #ff7043;
    }

    .commit-card .icon { font-size: 50px; color: #ff7043; margin-bottom: 25px; display: block; }
    .commit-card h4 { font-size: 22px; margin-bottom: 15px; color: #333; }
    .commit-card p { color: #777; font-size: 16px; }

    /* 5. PHẦN CẢM ƠN VÀ NÚT CTA (Hoành tráng hơn Ảnh 4) */
    .cta-footer {
        padding: 100px 0;
        text-align: center;
        background: linear-gradient(135deg, #ff7043, #ff9a76);
        color: white;
    }
    
    .cta-footer h2 { font-size: 36px; margin-bottom: 30px; color: white !important; }
    
    .btn-view-menu {
        display: inline-block;
        background: white;
        color: #ff7043 !important; /* Chữ cam trên nền trắng */
        padding: 18px 50px;
        border-radius: 50px;
        text-decoration: none !important;
        font-weight: bold;
        font-size: 20px;
        text-transform: uppercase;
        transition: 0.3s;
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }
    
    .btn-view-menu:hover {
        background: #fff;
        transform: scale(1.05);
        box-shadow: 0 15px 25px rgba(0,0,0,0.25);
    }
</style>

<div class="about-page">
    <section class="about-hero">
        <div class="hero-content">
            <h1>Hơn cả một bữa ăn</h1>
            <p>Khát vọng nâng tầm ẩm thực nhanh tại Việt Nam.</p>
        </div>
    </section>

    <section class="stats-container">
        <div class="stat-card"><h2>15+</h2><p>Năm Kinh Nghiệm</p></div>
        <div class="stat-card"><h2>120+</h2><p>Chi Nhánh Toàn Quốc</p></div>
        <div class="stat-card"><h2>5M+</h2><p>Khách Hàng Hạnh Phúc</p></div>
        <div class="stat-card"><h2>100%</h2><p>Nguyên Liệu Sạch</p></div>
    </section>

    <div class="about-section">
        <div class="content-grid">
            <div class="content-text">
                <h3>Câu Chuyện Thương Hiệu</h3>
                <p>Khởi nguồn từ một cửa hàng nhỏ tại TP. Hồ Chí Minh năm 2010, FastFood ra đời không chỉ để bán thức ăn nhanh, mà là để bán sự tâm huyết trong từng món ăn mà người Việt yêu thích.</p>
                <p>Năm 2010, giữa lòng Sài Gòn nhộn nhịp, cửa hàng FastFood đầu tiên chính thức khai trương. Chúng tôi không chỉ bán thức ăn nhanh; chúng tôi bán sự tâm huyết trong từng món ăn mà người Việt yêu thích.</p>
                <p>Chúng tôi tin rằng ẩm thực phải là sự kết hợp giữa hương vị hiện đại và độ tươi ngon thuần khiết của nguyên liệu Việt. Đó là lý do FastFood không ngừng cải tiến công thức để cân bằng giữa sự tiện lợi và dinh dưỡng.</p>
            </div>
            <div class="content-img">
                <img src="https://images.unsplash.com/photo-1550547660-d9450f859349?ixlib=rb-1.2.1&w=800" style="width: 100%; border-radius: 20px; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
            </div>
        </div>
    </div>

    <section class="commitments">
        <div class="section-title">
            <h2>Hành Trình Kiến Tạo Tương Lai</h2>
        </div>
        <div class="commitment-grid">
            <div class="commit-card">
                <span class="icon">🎯</span>
                <h4>Tầm Nhìn 2030</h4>
                <p>Trở thành biểu tượng của ngành ẩm thực nhanh tại Việt Nam, mang đến trải nghiệm đẳng cấp quốc tế bằng chính sự khác biệt trong văn hóa phục vụ.</p>
            </div>
            <div class="commit-card">
                <span class="icon">🚀</span>
                <h4>Sứ Mệnh Phục Vụ</h4>
                <p>Năm 2010, giữa lòng Sài Gòn nhộn nhịp, cửa hàng FastFood đầu tiên chính thức khai trương. Chúng tôi không chỉ bán thức ăn nhanh; chúng tôi bán sự tâm huyết trong từng món ăn mà người Việt yêu thích.</p>
                <p>Mang đến những bữa ăn an toàn, nhanh chóng và giàu dinh dưỡng. Cải thiện quy trình chế biến để phục vụ nóng hổi trong chưa đầy 15 phút.</p>
            </div>
            <div class="commit-card">
                <span class="icon">💎</span>
                <h4>Giá Trị Cốt Lõi</h4>
                <p>Chính trực trong kinh doanh, tận tâm với khách hàng, không ngừng đổi mới sáng tạo và luôn đặt chất lượng vệ sinh an toàn thực phẩm lên hàng đầu.</p>
            </div>
        </div>
    </section>

    <div class="about-section">
        <div class="content-grid">
            <div class="content-img">
                <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?ixlib=rb-1.2.1&w=800" style="width: 100%; border-radius: 20px; box-shadow: 0 10px 20px rgba(0,0,0,0.1);">
            </div>
            <div class="content-text">
                <h3>Tiêu Chuẩn Chất Lượng Vàng</h3>
                <p>Tại FastFood, mỗi miếng gà rán giòn rụm hay chiếc Burger đậm đà đều được kiểm soát bởi quy trình nghiêm ngặt 3 lớp. 100% thịt tươi được nhập mới mỗi ngày.</p>
                <p>Chúng tôi tự hào là đơn vị tiên phong áp dụng quy trình chế biến trong môi trường vô trùng và cam kết sử dụng dầu ăn sạch để bảo vệ sức khỏe người tiêu dùng.</p>
                <p>Sứ mệnh của chúng tôi</p>
                <p>Mang đến những bữa ăn an toàn, nhanh chóng và giàu dinh dưỡng. Cải thiện quy trình chế biến để phục vụ nóng hổi trong chưa đầy 15 phút.</p>
            </div>
        </div>
    </div>

    <section class="cta-footer">
    <h2>Cảm ơn bạn đã là một phần của chúng tôi!</h2>
    <p>Hãy để FastFood phục vụ bạn những bữa ăn ngon nhất ngay hôm nay.</p>
    
    <a href="javascript:void(0)" onclick="loadMenu()" class="btn-view-menu">
        Xem thực đơn ngay
    </a>
</section>