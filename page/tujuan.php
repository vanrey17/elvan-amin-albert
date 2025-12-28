<?php
// Tentukan variabel data yang berbeda untuk setiap halaman
$page_title = "TUJUAN KAMI";
$page_description = "Visi besar SMK Vokasi Merdeka Belajar dalam mencetak lulusan unggul yang siap menghadapi tantangan masa depan.";
include 'page/hero.php';
?>



<section class="tujuan-wrapper">
    <div class="container">
        <div class="section-intro text-center">
            <h2 class="main-title">Membangun Masa Depan Melalui 4 Pilar Utama</h2>
            <div class="title-line"></div>
        </div>

        <div class="tujuan-content-grid">
            <div class="tujuan-card-new">
                <div class="card-number">01</div>
                <div class="icon-wrapper">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3>Penguasaan Kompetensi</h3>
                <p>Membekali siswa dengan keahlian teknis mutakhir sesuai standar industri global di bidang TJKT, RPL, MPLB, DKV, dan TSM.</p>
                <div class="card-footer">Industrial Standard</div>
            </div>

            <div class="tujuan-card-new active-blue">
                <div class="card-number">02</div>
                <div class="icon-wrapper">
                    <i class="fas fa-user-tie"></i>
                </div>
                <h3>Sikap Profesional</h3>
                <p>Mencetak lulusan yang berintegritas, disiplin, dan memiliki etos kerja tinggi (Soft Skills) yang siap bersaing di pasar kerja internasional.</p>
                <div class="card-footer">Work Readiness</div>
            </div>

            <div class="tujuan-card-new">
                <div class="card-number">03</div>
                <div class="icon-wrapper">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3>Pengembangan Karakter</h3>
                <p>Mendorong pertumbuhan spiritual dan moral melalui Profil Pelajar Pancasila untuk membentuk individu yang bertanggung jawab pada sosial.</p>
                <div class="card-footer">Moral Integrity</div>
            </div>

            <div class="tujuan-card-new active-orange">
                <div class="card-number">04</div>
                <div class="icon-wrapper">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Inovasi & Wirausaha</h3>
                <p>Menumbuhkan mentalitas inovator dan kemampuan berwirausaha sehingga lulusan mampu menciptakan peluang kerja baru mandiri.</p>
                <div class="card-footer">Entrepreneurship</div>
            </div>
        </div>
    </div>
</section>

<style>
:root {
    --asc-blue: #0046ad;
    --asc-orange: #ff6600;
    --asc-dark: #1a1a1a;
    --text-muted: #636e72;
}

.tujuan-wrapper {
    background-color: #f9fbff;
    padding: 80px 0;
    font-family: 'Segoe UI', sans-serif;
}

.text-center { text-align: center; }

/* Section Titles */
.section-intro { margin-bottom: 60px; }
.sub-title { color: var(--asc-orange); font-weight: 800; letter-spacing: 2px; text-transform: uppercase; font-size: 0.9rem; }
.main-title { color: var(--asc-blue); font-size: 2.2rem; margin-top: 10px; font-weight: 800; }
.title-line { width: 60px; height: 4px; background: var(--asc-orange); margin: 20px auto; border-radius: 2px; }

/* Modern Grid & Cards */
.tujuan-content-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.tujuan-card-new {
    background: white;
    padding: 45px 30px;
    border-radius: 25px;
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    border: 1px solid #f0f0f0;
}

.tujuan-card-new:hover {
    transform: translateY(-15px);
    box-shadow: 0 20px 40px rgba(0, 70, 173, 0.1);
}

.card-number {
    position: absolute;
    top: 20px;
    right: 30px;
    font-size: 3rem;
    font-weight: 900;
    color: #000;
    z-index: 1;
}

.icon-wrapper {
    width: 70px;
    height: 70px;
    background: #f0f5ff;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.8rem;
    color: var(--asc-blue);
    margin-bottom: 25px;
    position: relative;
    z-index: 2;
}

.tujuan-card-new h3 {
    font-size: 1.3rem;
    color: var(--asc-dark);
    margin-bottom: 15px;
    font-weight: 700;
}

.tujuan-card-new p {
    color: var(--text-muted);
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 20px;
}

.card-footer {
    font-size: 0.75rem;
    font-weight: bold;
    color: var(--asc-orange);
    text-transform: uppercase;
    border-top: 1px solid #eee;
    padding-top: 15px;
}

/* Color Accents */
.active-blue { border-bottom: 5px solid var(--asc-blue); }
.active-orange { border-bottom: 5px solid var(--asc-orange); }

/* Animation */
.fade-in { animation: fadeIn 1s ease-in; }
.fade-in-delay { animation: fadeIn 1.5s ease-in; }
@keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

@media (max-width: 768px) {
    .main-title { font-size: 1.8rem; }
}
</style>