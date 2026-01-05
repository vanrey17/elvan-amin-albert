<section class="content-section">
    <div class="identity-header">
        <p class="breadcrumb"><span>&#x2329;</span> Identitas Kami</p>
        <div class="identity-layout">
            <div class="title-column">
                <h2>Sekolah Menengah Kejuruan SWASTA yang telah berdiri sejak tahun 1977</h2>
            </div>
            <div class="description-column">
                <p>Ascendia" berarti mendaki atau mencapai puncak. Kami mengabadikan setiap 
                    perjalanan, proses, dan pertumbuhan unik siswa kami, mulai dari langkah 
                    pertama hingga ke titik kesuksesan tertinggi mereka—di dunia kerja, kewirausahaan, atau pendidikan lanjutan.</p>
            </div>
        </div>
    </div>
</section>

<style>
    .content-section {
    padding: 60px 100px;
    background-color: white; /* Pastikan latar belakangnya putih */
}

.identity-header {
    margin-bottom: 80px;
}

.breadcrumb {
    color: #007bff; /* Warna biru muda untuk link/breadcrumb */
    font-size: 14px;
    margin-bottom: 5px;
}

/* Layout untuk Judul dan Deskripsi (Menggunakan Flexbox) */
.identity-layout {
    display: flex;
    gap: 40px; /* Jarak antara dua kolom */
}

.title-column {
    flex: 0 0 45%; /* Kolom judul mengambil sekitar 45% lebar */
}

.description-column {
    flex: 1; /* Kolom deskripsi mengisi sisa ruang */
    padding-top: 15px; /* Sedikit geser ke bawah agar sejajar */
}

.title-column h2 {
    font-size: 2.5em;
    color: #333;
    line-height: 1.2;
    margin: 0;
}

.description-column p {
    color: #555;
    line-height: 1.6;
}
@media (max-width: 768px) {
    .content-section {
        padding: 40px 20px;
    }
    .identity-layout {
        flex-direction: column;
    }
    .title-column, .description-column {
        flex: 1 0 100%;
    }
    .title-column h2 {
        font-size: 1em;
    }
    .description-column p {
        font-size: 0.8em;
    }
}
</style>