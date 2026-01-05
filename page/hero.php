    <main class="program-hero-section">
        <div class="hero-background">
            <div class="hero-overlay">
            <div class="hero-content">
                <span class="badge">SMK Vokasi Merdeka Belajar</span>
                <h1><?php echo $page_title; ?></h1>
                <p class="desc"><?php echo $page_description; ?></p>
            </div>
            </div>
        </div>
    </main>

    <style>
    :root {
        --primary: #2563eb;
        --secondary: #1e293b;
        --accent: #f59e0b;
        --bg-light: #f8fafc;
        --text-dark: #334155;
        --text-light: #64748b;
        --radius: 12px;
        --shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }

body {
        font-family: 'Poppins', sans-serif;
        color: var(--text-dark);
        margin: 0;
        line-height: 1.6;
        background-color: #fff;
    }
/* Hero Section */
/* 1. Container Utama */
.program-hero-section {
    position: relative;
    height: 400px;
    width: 100%;
    overflow: hidden;
}

/* 2. Background & Flexbox (Kunci Utama Tengah) */
.hero-background {
    background: url('https://images.unsplash.com/photo-1562564025-51dc11516a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');
    background-size: cover;
    background-position: center;
    height: 100%;
    width: 100%;
    display: flex;             /* Mengaktifkan Flexbox */
    justify-content: flex-start;    /* Tengah Horizontal */
    align-items: center;        /* Tengah Vertikal */
    text-align: center;
    position: relative;
}

/* 3. Overlay (Pastikan menutupi seluruh background) */
.hero-overlay {
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: linear-gradient(135deg, rgba(30, 41, 59, 0.9), rgba(37, 99, 235, 0.5));
    z-index: 1;
}

/* 4. Konten */
.hero-content {
    position: relative;
    top:100px;
    z-index: 2;
    width: 90%;                /* Menggunakan % agar fleksibel di HP */
    max-width: 800px;
    padding: 20px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;       /* Memastikan elemen di dalamnya (badge, h1) ke tengah */
}

    .hero-content h1 {
        font-size: 2.5rem;
        margin: 10px 0;
        font-weight: 700;
        color: #ffffff;
    }

    .hero-content .subtitle {
        font-size: 1.25rem;
        font-weight: 300;
        margin-bottom: 20px;
        color: #e2e8f0;
    }

    .badge {
        background-color: var(--accent);
        color: white;
        padding: 5px 15px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .hero-content .desc {
        color: #fff;
        font-size: 1rem;
        line-height: 1.6;
    }

@media (max-width: 768px) {
    .program-hero-section {
        height: 300px;         /* Tinggi sedikit dikurangi untuk HP */
        max-width: 400px;
    }
    
    .hero-background {
        padding: 0;            /* HAPUS padding besar yang tadi (100px) */
    }

    .hero-content {
        padding: 40px;
        max-width: 300px;
        top:70px;
        right:40px;
    }
    .hero-content h1 {
        font-size: 1rem;     /* Ukuran font lebih proporsional */
    }

    .hero-content .desc {
        font-size: 0.7rem;
    }
    .hero-content span {
        font-size: 0.60rem;
    }
    }
</style>