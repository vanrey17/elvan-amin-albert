<?php
// Tentukan variabel data
$page_title = "PRINSIP 9K";
$page_description = "Nilai inti pembentuk ekosistem pendidikan yang positif, berdaya saing, dan berkarakter di SMK Vokasi Merdeka Belajar.";
include 'page/hero.php';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <section class="ninek-content">
        <div class="container">
            <div class="ninek-modern-grid">
                <?php
                $ninek_data = [
                    ['title' => 'Keamanan', 'desc' => 'Lingkungan aman dari ancaman fisik & psikis.', 'icon' => 'fa-shield-halved'],
                    ['title' => 'Kebersihan', 'desc' => 'Lingkungan rapi, sehat, dan bebas sampah.', 'icon' => 'fa-broom'],
                    ['title' => 'Ketertiban', 'desc' => 'Disiplin menaati aturan dan norma sosial.', 'icon' => 'fa-clipboard-check'],
                    ['title' => 'Keindahan', 'desc' => 'Lingkungan asri, artistik, dan menyenangkan.', 'icon' => 'fa-leaf'],
                    ['title' => 'Kekeluargaan', 'desc' => 'Rasa persaudaraan dan peduli antar warga.', 'icon' => 'fa-users-items'],
                    ['title' => 'Kerindangan', 'desc' => 'Penghijauan untuk suasana sejuk & nyaman.', 'icon' => 'fa-tree'],
                    ['title' => 'Kesehatan', 'desc' => 'Pola hidup sehat dan sanitasi terjaga.', 'icon' => 'fa-heart-pulse'],
                    ['title' => 'Keterbukaan', 'desc' => 'Komunikasi transparan, jujur, dan edukatif.', 'icon' => 'fa-comments'],
                    ['title' => 'Keteladanan', 'desc' => 'Menjadi uswah/contoh dalam etika & sikap.', 'icon' => 'fa-star']
                ];

                foreach ($ninek_data as $index => $item): 
                    $color_class = ($index % 2 == 0) ? 'blue-theme' : 'orange-theme';
                ?>
                <div class="ninek-card <?php echo $color_class; ?>">
                    <div class="card-bg-icon"><i class="fas <?php echo $item['icon']; ?>"></i></div>
                    <div class="card-body">
                        <div class="icon-box">
                            <i class="fas <?php echo $item['icon']; ?>"></i>
                        </div>
                        <h4><?php echo $item['title']; ?></h4>
                        <p><?php echo $item['desc']; ?></p>
                    </div>
                    <div class="card-number"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

<style>


/* Grid Modern */
.ninek-modern-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 30px 20px;
}

/* Card Styling */
.ninek-card {
    background: white;
    border-radius: 20px;
    padding: 40px 30px;
    position: relative;
    overflow: hidden;
    transition: all 0.4s ease;
    box-shadow: 0 10px 25px rgba(0,0,0,0.03);
    border: 1px solid #edf2f7;
    z-index: 1;
}

.ninek-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.icon-box {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 20px;
    transition: 0.3s;
}

.blue-theme .icon-box { background: #eef4ff; color: var(--asc-blue); }
.orange-theme .icon-box { background: #fff5ee; color: var(--asc-orange); }

.ninek-card h4 {
    font-size: 1.4rem;
    font-weight: 700;
    margin-bottom: 12px;
    color: var(--asc-dark);
}

.ninek-card p {
    color: var(--text-gray);
    line-height: 1.5;
    font-size: 0.95rem;
    position: relative;
    z-index: 2;
}

/* Dekorasi Background Card */
.card-bg-icon {
    position: absolute;
    bottom: -20px;
    right: -10px;
    font-size: 8rem;
    opacity: 0.03;
    transform: rotate(-15deg);
    z-index: 0;
}

.card-number {
    position: absolute;
    top: 20px;
    right: 25px;
    font-weight: 900;
    font-size: 1.2rem;
    opacity: 0.1;
}

/* Hover Effect Specific */
.blue-theme:hover { border-bottom: 4px solid var(--asc-blue); }
.orange-theme:hover { border-bottom: 4px solid var(--asc-orange); }

@media (max-width: 768px) {
    .hero-9k h1 { font-size: 2.2rem; }
    .ninek-modern-grid { grid-template-columns: 1fr; }
}
</style>