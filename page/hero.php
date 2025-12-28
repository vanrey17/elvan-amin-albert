    <main class="program-hero-section">
        <div class="hero-background">
            <div class="hero-overlay"></div>
            <div class="hero-content">
                <span class="badge">SMK Vokasi Merdeka Belajar</span>
                <h1><?php echo $page_title; ?></h1>
                <p class="desc"><?php echo $page_description; ?></p>
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
.program-hero-section {
        position: relative;
        height: 400px;
        color: white;
        overflow: hidden;
    }
.hero-background {
    background: url('https://images.unsplash.com/photo-1562564025-51dc11516a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');
    background-size: cover;
    background-position: center;
    height: 100%;
    
    /* --- INI KUNCI AGAR POSISI DI TENGAH --- */
    display: flex;              /* Mengaktifkan mode flexbox */
    justify-content: center;    /* Membuat konten di tengah secara Horizontal (Kiri-Kanan) */
    align-items: center;        /* Membuat konten di tengah secara Vertikal (Atas-Bawah) */
    text-align: center;         /* Membuat tulisan (text) menjadi rata tengah */
    /* --------------------------------------- */
    
    position: relative;
}

.hero-content {
    position: relative;
    z-index: 2;
    max-width: 800px;
    padding: 20px;
    
    /* --- TAMBAHAN AGAR LEBIH PASTI --- */
    margin: 0 auto;             /* Memastikan container ada di tengah */
    display: flex;              /* Flexbox untuk elemen di dalam content */
    flex-direction: column;     /* Susunan atas-bawah */
    align-items: center;        /* Memastikan item seperti Badge ada di tengah */
    /* --------------------------------- */
}

    .hero-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(135deg, rgba(30, 41, 59, 1.2), rgba(37, 99, 235, 0.2));
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 800px;
        padding: 20px;
    }

    .hero-content h1 {
        font-size: 2.5rem;
        margin: 10px 0;
        font-weight: 700;
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
</style>