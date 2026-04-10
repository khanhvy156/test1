<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Montserrat:wght@300;400;500;600;800&display=swap" rel="stylesheet">

<style>
    .system-page { font-family: 'Montserrat', sans-serif; color: #2d3436; background: #fff; line-height: 1.8; }
    
    /* 1. HERO SECTION - CÂU CHUYỆN ĐẦU TRANG */
    .system-hero {
        background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                    url('https://images.unsplash.com/photo-1552566626-52f8b828add9?w=1600');
        background-size: cover; background-attachment: fixed; background-position: center;
        height: 500px; display: flex; align-items: center; justify-content: center; text-align: center; color: white;
    }
    .hero-wrap h1 { font-family: 'Playfair Display', serif; font-size: 60px; margin-bottom: 15px; color: #ff7043; }
    .hero-wrap p { font-weight: 300; letter-spacing: 3px; text-transform: uppercase; font-size: 16px; max-width: 800px; margin: 0 auto; line-height: 1.5; }

    /* 2. STATS BAR - */
    .system-stats {
        display: flex; justify-content: center; gap: 60px; background: white;
        padding: 50px; width: 85%; margin: -70px auto 60px;
        border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.1);
        position: relative; z-index: 10;
    }
    .stat-item { text-align: center; flex: 1; border-right: 1px solid #eee; }
    .stat-item:last-child { border-right: none; }
    .stat-item h2 { color: #ff7043; font-size: 45px; margin: 0; font-weight: 800; }
    .stat-item p { font-size: 12px; font-weight: 700; color: #b2bec3; text-transform: uppercase; margin-top: 8px; letter-spacing: 1px; }

    /* 3. PHẦN NỘI DUNG DÀI (PHILOSOPHY) */
    .philosophy-section { max-width: 1100px; margin: 0 auto 80px; padding: 0 20px; text-align: center; }
    .philosophy-section h2 { font-family: 'Playfair Display', serif; font-size: 40px; color: #2d3436; margin-bottom: 30px; font-style: italic; }
    .philosophy-section .main-text { font-size: 17px; color: #636e72; text-align: justify; column-count: 2; column-gap: 50px; margin-bottom: 40px; }
    .philosophy-section .highlight-quote { font-size: 24px; font-weight: 600; color: #ff7043; margin: 50px 0; font-style: italic; line-height: 1.4; border-top: 1px solid #eee; border-bottom: 1px solid #eee; padding: 30px 0; }

    /* 4. LAYOUT 3 ĐỊA CHỈ VÀNG VÀ MAP */
    .store-grid-container { background: #f9f9f9; padding: 100px 0; }
    .store-grid { max-width: 1300px; margin: 0 auto; display: grid; grid-template-columns: 420px 1fr; gap: 40px; padding: 0 20px; }
    
    .store-sidebar h3 { font-size: 24px; font-weight: 800; margin-bottom: 30px; color: #2d3436; text-transform: uppercase; border-bottom: 3px solid #ff7043; display: inline-block; padding-bottom: 5px; }
    .store-card {
        background: white; padding: 30px; border-radius: 20px; margin-bottom: 20px;
        cursor: pointer; transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); border: 1px solid #eee;
    }
    .store-card:hover, .store-card.active { border-color: #ff7043; box-shadow: 0 15px 35px rgba(255,112,67,0.15); transform: scale(1.03); }
    .store-card h4 { font-size: 20px; font-weight: 800; margin-bottom: 12px; color: #ff7043; }
    .store-card p { font-size: 14px; color: #636e72; margin: 8px 0; display: flex; align-items: flex-start; gap: 12px; }
    .store-card p i { margin-top: 4px; color: #ff7043; }

    .map-wrapper { border-radius: 30px; overflow: hidden; height: 700px; box-shadow: 0 25px 50px rgba(0,0,0,0.1); border: 10px solid white; }

    /* 5. PHẦN TIÊU CHUẨN VẬN HÀNH (NHIỀU CHỮ) */
    .standards-section { max-width: 1200px; margin: 100px auto; padding: 0 20px; display: grid; grid-template-columns: 1fr 1fr; gap: 80px; align-items: center; }
    .standards-text h3 { font-size: 32px; font-weight: 800; margin-bottom: 25px; color: #2d3436; }
    .standards-text p { font-size: 16px; color: #636e72; margin-bottom: 20px; text-align: justify; }
    .standards-img img { width: 100%; border-radius: 50px 0 50px 0; box-shadow: 20px 20px 0 #ff7043; }

    /* 6. FRANCHISE BANNER */
    .franchise-footer { background: #2d3436; color: white; padding: 100px 20px; text-align: center; border-radius: 60px 60px 0 0; }
    .franchise-footer h2 { font-size: 45px; font-weight: 900; margin-bottom: 25px; }
    .franchise-footer p { max-width: 750px; margin: 0 auto 40px; font-size: 18px; opacity: 0.8; line-height: 1.6; }
    .btn-franchise-vip { display: inline-block; padding: 20px 60px; background: #ff7043; color: white !important; border-radius: 100px; font-weight: 800; font-size: 18px; text-decoration: none; transition: 0.3s; box-shadow: 0 10px 20px rgba(255,112,67,0.3); }
    .btn-franchise-vip:hover { background: white; color: #ff7043 !important; transform: translateY(-5px); }

    @media (max-width: 992px) {
        .philosophy-section .main-text { column-count: 1; }
        .store-grid, .standards-section { grid-template-columns: 1fr; }
        .map-wrapper { height: 450px; }
    }
</style>

<div class="system-page">
    <section class="system-hero">
        <div class="hero-wrap">
            <p>Hành trình 15 năm kiến tạo hương vị độc bản</p>
            <h1>Hệ Thống Cửa Hàng</h1>
        </div>
    </section>

    <div class="system-stats">
        <div class="stat-item"><h2>15+</h2><p>Năm kinh nghiệm</p></div>
        <div class="stat-item"><h2>120+</h2><p>Chi nhánh toàn quốc</p></div>
        <div class="stat-item"><h2>5M+</h2><p>Khách hàng tin dùng</p></div>
        <div class="stat-item"><h2>100%</h2><p>Nguyên liệu VietGAP</p></div>
    </div>

    <section class="philosophy-section">
        <h2>"Hơn cả một bữa ăn nhanh, đó là một trải nghiệm không gian."</h2>
        <div class="main-text">
            <p>Bắt đầu từ một cửa hàng nhỏ vào năm 2011, chúng tôi đã dành trọn 15 năm để nghiên cứu và định hình lại khái niệm về thức ăn nhanh tại Việt Nam. Đối với chúng tôi, một bữa ăn ngon không chỉ nằm ở vị giác, mà còn phải được thưởng thức trong một không gian khơi gợi cảm hứng. Hệ thống 120+ cửa hàng của chúng tôi được xây dựng dựa trên sự thấu hiểu sâu sắc về thói quen sinh hoạt của thực khách hiện đại.</p>
            <p>Mỗi chi nhánh là một sự kết hợp tinh tế giữa phong cách công nghiệp (Industrial Style) mạnh mẽ và nét ấm cúng của nội thất gỗ thiên nhiên. Chúng tôi đầu tư mạnh mẽ vào hệ thống ánh sáng đạt chuẩn 3000K – mức ánh sáng vàng ấm tạo sự thư giãn tối đa cho mắt và giúp món ăn trông bắt mắt hơn. Đặc biệt, tiêu chuẩn vệ sinh và kiểm soát mùi được chúng tôi ưu tiên hàng đầu với hệ thống thông gió hiện đại, đảm bảo bạn luôn cảm thấy sảng khoái dù đang ở giữa một nhà hàng thức ăn nhanh bận rộn nhất.</p>
        </div>
        <div class="highlight-quote">
            "Chúng tôi không chỉ mở rộng số lượng, chúng tôi nâng tầm chất lượng sống qua từng điểm chạm dịch vụ."
        </div>
    </section>

    <div class="store-grid-container">
        <div class="store-grid">
            <div class="store-sidebar">
                <h3>Các Điểm Đến Flagship</h3>
                
                <div class="store-card active" onclick="changeStore('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4602324283286!2d106.69806431533411!3d10.7756586621453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3f1695f9c9%3A0xc48c0337c7ee085!2zMTIzIEzDqiBM4bujaSwgQuG6v24gVGjDoG5oLCBRdeG6rW4gMSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1648870000000!5m2!1svi!2s')">
                    <span style="color:#ff7043; font-weight:800; font-size:10px; text-transform:uppercase;">Miền Nam - Premium</span>
                    <h4>FastFood Lê Lợi</h4>
                    <p>📍 123 Lê Lợi, P. Bến Thành, Quận 1, TP. HCM</p>
                    <p>📞 Hotline: 1900 1234 - Máy lẻ 01</p>
                    <p>🕒 Hoạt động: 07:00 – 23:00 (Kể cả ngày lễ)</p>
                </div>

                <div class="store-card" onclick="changeStore('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8977453149246!2d105.85023151538356!3d21.03061109287959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab95328d0959%3A0x6a2c3a516089d383!2zNDUgxJBpbmggVGnDsyBIb8OgbmcsIEjDoG5nIELhuqFjLCBIb8OgbiBLaeG6v20sIEjDoG7aSBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1648870000000!5m2!1svi!2s')">
                    <span style="color:#ff7043; font-weight:800; font-size:10px; text-transform:uppercase;">Miền Bắc - Heritage</span>
                    <h4>FastFood Hoàn Kiếm</h4>
                    <p>📍 45 Đinh Tiên Hoàng, Q. Hoàn Kiếm, Hà Nội</p>
                    <p>📞 Hotline: 1900 1234 - Máy lẻ 02</p>
                    <p>🕒 Hoạt động: 07:30 – 23:30 (Thứ 6-CN mở muộn)</p>
                </div>

                <div class="store-card" onclick="changeStore('https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.8955502123533!2d108.22301901534963!3d16.070908843659226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218306df6779d%3A0x8849767223b8f161!2zMTU4IELhuqFjaCDEkOG6sW5nLCBI4bqjaSBDaMOidSAxLCBI4bqjaSBDaMOidSwgxJDDoCBO4bq1bmcsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1648870000000!5m2!1svi!2s')">
                    <span style="color:#ff7043; font-weight:800; font-size:10px; text-transform:uppercase;">Miền Trung - Riverside</span>
                    <h4>FastFood Đà Nẵng</h4>
                    <p>📍 158 Bạch Đằng, Hải Châu, Đà Nẵng</p>
                    <p>📞 Hotline: 1900 1234 - Máy lẻ 03</p>
                    <p>🕒 Hoạt động: 07:00 – 23:00 (View Sông Hàn)</p>
                </div>
            </div>

            <div class="map-wrapper">
                <iframe id="map-frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4602324283286!2d106.69806431533411!3d10.7756586621453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f3f1695f9c9%3A0xc48c0337c7ee085!2zMTIzIEzDqiBM4bujaSwgQuG6v24gVGjDoG5oLCBRdeG6rW4gMSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1648870000000!5m2!1svi!2s" 
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

    <section class="standards-section">
        <div class="standards-text">
            <h3>Tiêu Chuẩn Vận Hành 5 Sao</h3>
            <p>Để duy trì chất lượng đồng nhất trên toàn bộ 120+ chi nhánh, chúng tôi áp dụng hệ thống quản trị ISO 22000 tiên tiến nhất. Mọi nguyên liệu từ trang trại đến bàn ăn đều được kiểm duyệt khắt khe qua 6 bước kiểm tra chất lượng mỗi sáng. Chúng tôi tự hào là đối tác chiến lược của các trang trại VietGAP hàng đầu tại Đà Lạt, đảm bảo rau củ luôn tươi mới trong vòng 24 giờ kể từ khi thu hoạch.</p>
            <p>Bên cạnh đó, đội ngũ nhân viên của chúng tôi không chỉ được đào tạo về kỹ năng phục vụ, mà còn được truyền cảm hứng về lòng hiếu khách. Mỗi nụ cười của nhân viên là một sự cam kết cho một bữa ăn trọn vẹn và hạnh phúc của bạn.</p>
        </div>
        <div class="standards-img">
            <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=800" alt="Kitchen Standard">
        </div>
    </section>

    <section class="franchise-footer">
        <h2>Cơ Hội Hợp Tác Bền Vững</h2>
        <p>Với hành trình 15 năm và vị thế dẫn đầu, chúng tôi luôn chào đón những đối tác nhượng quyền có cùng tâm huyết. Hãy cùng chúng tôi lan tỏa giá trị ẩm thực sạch và phong cách sống hiện đại đến mọi miền Tổ Quốc.</p>
        <a href="javascript:void(0)" onclick="loadContact()" class="btn-franchise-vip">LIÊN HỆ NHƯỢNG QUYỀN</a>
    </section>
</div>

<script>
    function changeStore(embedUrl) {
        // Cập nhật iframe map
        document.getElementById('map-frame').src = embedUrl;
        
        // Hiệu ứng Active cho Card
        const cards = document.querySelectorAll('.store-card');
        cards.forEach(c => c.classList.remove('active'));
        event.currentTarget.classList.add('active');
        
        // Cuộn mượt đến Map trên Mobile
        if(window.innerWidth < 992) {
            document.querySelector('.map-wrapper').scrollIntoView({ behavior: 'smooth' });
        }
    }
</script>