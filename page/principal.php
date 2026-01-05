    <section class="principal-hero-section">
        <div class="principal-layout-content">
            <div class="principal-text-column">
                <span class="section-tag">SELAMAT DATANG</span>
                <h1 class="section-title">Sambutan dari Kepala SMK Teknologi Ascendia</h1>
                
                <p>Puji syukur kepada Tuhan Yang Maha Esa atas berkat dan rahmat-Nya. Kami bangga dapat menyambut Anda di halaman resmi SMK Teknologi Ascendia. Kami berkomitmen untuk menciptakan lingkungan belajar yang unggul dan membentuk generasi muda yang siap menghadapi tantangan global.</p>
                
                <blockquote>
                    "Pendidikan bukan hanya tentang mengisi wadah, melainkan tentang menyalakan api pengetahuan dan karakter."
                </blockquote>
                    
                <p class="principal-signature">
                    **[Prof. Elvan Reynaldi, M.Kom]**<br>
                    Kepala SMK Teknologi Ascendia
                </p>

                <a href="<?php echo $BASE; ?>/kontak" class="btn-primary-profile">Hubungi Kami</a>
            </div>

            <div class="principal-image-column">
                <img src="<?php echo $image_path; ?>/principal.png" alt="Foto Kepala Sekolah" class="principal-photo">
            </div>
        </div>
    </section>

    <style>
/* --- A. COLOMN 1: HERO/SAMBUTAN KEPALA SEKOLAH --- */
.principal-hero-section {
    background-color: #f7f7f7;
    padding: 100px 50px;
    overflow: hidden;
    position: relative;
    margin-top: 0; 
}

.principal-layout-content {
    display: flex;
    max-width: 1200px;
    margin: 0 auto;
    gap: 80px;
    align-items: center;
}

.principal-text-column {
    flex: 1;
    max-width: 60%;
    margin-bottom: 0; 
}

.principal-text-column h1 {
    font-size: 3em;
    color: #0c1a4b;
    margin-bottom: 20px;
}

.principal-text-column blockquote {
    border-left: 5px solid #ff6600;
    padding-left: 20px;
    margin: 25px 0;
    font-style: italic;
    color: #003366;
    font-size: 1.1em;
}

.principal-signature {
    font-size: 1.1em;
    font-weight: bold; 
    color: #333;
    margin-top: 25px;
}

.principal-image-column {
    flex: 0 0 40%;
    position: relative;
}

.principal-photo {
    width: 100%; 
    height: 450px; 
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    transition: all 0.5s ease;
    object-fit: cover; 
}

.principal-photo:hover {
    transform: none; 
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
}

.btn-primary-profile {
    display: inline-block;
    background-color: #ff6600; 
    color: white;
    padding: 12px 30px;
    border-radius: 50px; 
    text-decoration: none;
    font-weight: bold;
    margin-top: 30px;
    box-shadow: 0 4px 10px rgba(255, 102, 0, 0.4);
    transition: all 0.3s ease;
}

.btn-primary-profile:hover {
    background-color: #e65c00;
    transform: translateY(-2px);
    box-shadow: 0 6px 15px rgba(255, 102, 0, 0.6);
}



@media (max-width: 768px) {
    .principal-layout-content {
        flex-direction: column;
        gap: 40px;
    }
    
    .principal-text-column, .principal-image-column {
        max-width: 100%;
        text-align: center;
    }
    
    .principal-photo {
        height: 350px; 
    }

    .principal-text-column h1 {
        font-size: 2.5em;
    }
    
    .principal-hero-section {
        padding: 80px 20px;
    }
    
    .facts-container-profile {
        grid-template-columns: repeat(2, 1fr); 
        gap: 20px;
    }

    .visimisi-container {
        flex-direction: column;
        gap: 30px;
    }
    
    .tujuan-content-grid {
        grid-template-columns: 1fr; 
    }

    .section-title-center {
        /* Hapus transform X agar rata tengah normal di mobile */
        transform: none;
        left: 0;
        width: 100%;
    }

    .principal-text-column h1 {
        font-size: 1.5em;
    }

    .principal-text-column p {
        font-size: 0.8em;
    }

    .principal-text-column blockquote {
        font-size: 0.9em;
    }
}
    </style>