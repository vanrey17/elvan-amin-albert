<div class="main-footer">
    <div class="footer-top-container">
        <div class="footer-column contact-info-column">
            <address>
            Jl. Sosial Km.5 No.472,<br>
            Kemuning, Palembang
            </address>


            <div class="social-media">
                <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
                <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
            </div>


            <p class="contact-item"><i class="fas fa-phone-alt"></i> +62 21 546 0234</p>
            <p class="contact-item"><i class="fas fa-envelope"></i> <a href="mailto:reyelvan16@gmail.com">ascendia@sch.co.id</a></p>
            <p class="contact-item"><i class="fas fa-map-marker-alt"></i> <a href="https://maps.app.goo.gl/KdDu9ttbRb9bWLVY6">Lihat di Google Maps</a></p>
        </div>


        <div class="footer-column footer-menu-group">
            <a href="<?php echo $BASE; ?>/tujuan">Tujuan Kami</a>
            <a href="<?php echo $BASE; ?>/visimisi">Visi & Misi</a>
            <a href="#">Karier</a>
            <a href="#">Blogs</a>
            <a href="#">Berita dan Acara</a>
        </div>


        <div class="footer-column footer-menu-group">
            <a href="<?php echo $BASE; ?>/programstudi">Program</a>
            <a href="<?php echo $BASE; ?>/kurikulum">Kurikulum</a>
            <a href="#">Jalur Pembelajaran</a>
            <a href="<?php echo $BASE; ?>/dukunganpembelajaran">Dukungan Pembelajaran</a>
            <a href="#">Pembelajaran Pelayanan</a>
        </div>


        <div class="footer-column footer-menu-group">
            <a href="#">Hubungi Kami</a>
            <a href="<?php echo $BASE; ?>/turvirtual">Tur Virtual</a>
            <a href="<?php echo $BASE; ?>/daftarsekarang">Daftar Sekarang</a>
            <a href="<?php echo $BASE; ?>/biaya">Biaya Sekolah</a>
            <a href="#">FAQ</a>
        </div>
    </div>


    <div class="footer-bottom">
        <h4 class="accreditations-title">Memorandum of Understanding</h4>
        <div class="accreditations-logos">
            <img src="<?php echo $image_path; ?>/mikrotik.png" alt="Mikrotik" class="accreditation-logo">
            <img src="<?php echo $image_path; ?>/biznet.png" alt="Biznet" class="accreditation-logo">
            <img src="<?php echo $image_path; ?>/indihome.png" alt="Indihome" class="accreditation-logo">
            <img src="<?php echo $image_path; ?>/yamaha.png" alt="Yamaha" class="accreditation-logo">
        </div>
    </div>
</div>

<div class="footer-license">
<p style="text-align:center;padding:15px 0;margin:0;background-color:#131d28;color:white;">© 2025 SMK Teknologi ASCENDIA Palembang | All Rights Reserved</p>
</div>
<style>

    
/* --- FOOTER UTAMA --- */
.main-footer {
    background-color: #2C3E50; /* Warna biru gelap sesuai gambar */
    color: white;
    padding: 60px 50px 30px; /* Padding atas-bawah-samping */
}

.footer-top-container {
    display: grid;
    /* Ini sudah benar: 2fr untuk kontak, 3 kolom 1fr untuk menu */
    grid-template-columns: 2fr repeat(3, 1fr); 
    max-width: 1200px;
    margin: 0 auto;
    gap: 40px;
    align-items: start;
    /* Anda bisa menambahkan align-items: start; di sini jika diperlukan */
    /* align-items: start; */ 
    padding-bottom: 40px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

/* --- Kolom Kontak (Kiri) --- */
.contact-info-column {
    font-size: 0.9em;
    margin-left: 100px;
}

.contact-info-column address {
    /* Pastikan teks di dalam alamat rata kiri */
    text-align: left; 
    
    /* Hapus margin horizontal bawaan jika ada */
    margin-left: 0;
    margin-right: 0;
}


.social-media {
    display: flex;
    align-items: center;
    /* Jarak vertikal dari alamat di atasnya */
    margin-top: 15px; 
    /* Pastikan margin-left 0 agar rata dengan tepi kolom */
    margin-left: 0; 
    padding-left: 0;
}

.social-media a {
    color: white;
    font-size: 1.2em;
    align-items: center;
    margin-right: 15px;
    text-align: center;
    transition: color 0.3s;
    
}
.social-media a:hover {
    color: #ff6600; /* Warna hover oranye */
}

.contact-item {
    display: flex;
    align-items: center;
    margin-top: 15px;
    margin-bottom: 0;
    /* Pastikan margin-left 0 agar rata dengan tepi kolom */
    margin-left: 0; 
    padding-left: 0;
}

.contact-item i {
    color: #ff6600; /* Ikon oranye */
    margin-right: 10px;
    font-size: 1em;
}

.contact-item a {
    color: #a0a0a0;
    text-decoration: none;
}
.contact-item a:hover {
    color: white;
}

/* --- Kolom Menu --- */
.footer-menu-group a {
    display: block; /* Membuat setiap link berada di baris baru */
    color: #a0a0a0;
    text-decoration: none;
    margin-bottom: 22px;
    font-size: 1em;
    transition: color 0.3s;
}

.footer-menu-group a:hover {
    color: white;
}

/* --- Bagian Bawah (Akreditasi) --- */
.footer-bottom {
    max-width: 1200px;
    margin: 30px auto 0;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.accreditations-title {
    font-size: 1.2em;
    font-weight: 600;
    color: #a0a0a0;
    margin: 0 40px 0 0;
}

.accreditations-logos {
    display: flex;
    gap: 20px;
    align-items: center;
    flex-wrap: wrap;
}

.accreditation-logo {
    height: 40px; /* Sesuaikan ukuran logo */
    width: auto;
    opacity: 0.7; /* Sedikit redup */
}

@media (max-width: 768px) {
    .footer-top-container {
        grid-template-columns: 1fr; /* Ubah ke satu kolom pada layar kecil */
        gap: 30px;
    }
    
    .contact-info-column {
        margin-left: 0; /* Hapus margin kiri pada layar kecil */
    }
    
    .footer-bottom {
        flex-direction: column;
        align-items: flex-start;
        gap: 20px;
    }
    
    .accreditations-title {
        margin: 0;
    }

    .accreditations-logos img {
        justify-content: flex-start;
        width: 20%;
        height: auto;
    }

    .footer-license p {
        text-align: center;
        font-size: 0.7em;
    }

    .contact-info-column address, .contact-item {
        font-size: 0.8em;
    }
    .footer-menu-group a {
        font-size: 0.7em;
    }
}
</style>