<section class="facts-section-profile">
    <h2 class="facts-title">FAKTA ASCENDIA</h2>
    
    <div class="facts-container-profile facts-seven-items">
        
        <div class="fact-item-profile">
            <i class="fas fa-users fact-icon"></i>
            <div class="fact-number-group">
                <span class="fact-number">30</span>
                <span class="fact-label">siswa/kelas</span>
            </div>
            <p class="fact-description">Rata-rata ukuran kelas untuk fokus pembelajaran maksimal.</p>
        </div>

        <div class="fact-item-profile">
            <i class="fas fa-chalkboard-teacher fact-icon"></i>
            <div class="fact-number-group">
                <span class="fact-number">50</span>
                <span class="fact-label">kelas</span>
            </div>
            <p class="fact-description">Rasio Siswa-Guru, memastikan bimbingan personal.</p>
        </div>

        <div class="fact-item-profile">
            <i class="fas fa-graduation-cap fact-icon"></i>
            <div class="fact-number-group">
                <span class="fact-number">95</span>
                <span class="fact-label">%</span>
            </div>
            <p class="fact-description">Tingkat Penyerapan Kerja dan Kuliah Lulusan.</p>
        </div>
        
        <div class="fact-item-profile">
            <i class="fas fa-user-graduate fact-icon"></i>
            <div class="fact-number-group">
                <span class="fact-number">2000</span>
                <span class="fact-label">+</span>
            </div>
            <p class="fact-description">Alumni yang sukses tersebar di berbagai industri.</p>
        </div>

        <div class="fact-item-profile">
            <i class="fas fa-book-open fact-icon"></i>
            <div class="fact-number-group">
                <span class="fact-number">1500</span>
                <span class="fact-label">siswa</span>
            </div>
            <p class="fact-description">Total siswa aktif yang belajar di semua jurusan.</p>
        </div>
        
        <div class="fact-item-profile">
            <i class="fas fa-briefcase fact-icon"></i>
            <div class="fact-number-group">
                <span class="fact-number">85</span>
                <span class="fact-label">orang</span>
            </div>
            <p class="fact-description">Tenaga pengajar dan staf profesional berdedikasi.</p>
        </div>

        <div class="fact-item-profile">
            <i class="fas fa-flask fact-icon"></i>
            <div class="fact-number-group">
                <span class="fact-number">8</span>
                <span class="fact-label">Lab & Bengkel</span>
            </div>
            <p class="fact-description">Fasilitas praktik terkini sesuai standar industri.</p>
        </div>
        
        <div class="fact-item-profile">
            <i class="fas fa-industry fact-icon"></i>
            <div class="fact-number-group">
                <span class="fact-number">5+</span>
                <span class="fact-label">Mitra Industri</span>
            </div>
            <p class="fact-description">Kerja sama aktif untuk Praktik Kerja Lapangan (PKL).</p>
        </div>

    </div>
</section>

<style>
.facts-container {
    /* ... properti Grid lainnya ... */
    display: grid;
    grid-template-columns: repeat(4, 1fr); 
    gap: 10px;
    max-width: 900px;
    margin: 0 auto; /* Penting: Meratakan seluruh container fakta di tengah halaman */
}

.facts-section {
    text-align: center;
    padding: 40px 0;
}

.facts-section h3 {
    font-size: 1.8em;
    color: #333;
    margin-bottom: 60px;
}

.fact-item {
    text-align: center; /* Meratakan ikon (block) dan teks (inline/block) */
    margin-bottom: 40px;
    
}

.fact-icon {
    font-size: 3em; 
    display: block;
    margin: 0 auto; /* Meratakan ikon secara horizontal */
}


/* Penataan Angka */
.fact-number-group {
    display: flex; 
    justify-content: center; /* KUNCI: Meratakan span (angka dan label) di tengah */
    align-items: baseline; /* Menjaga angka dan label sejajar di garis bawah */
    line-height: 1;
    margin-bottom: 5px;
    margin-top: 10px; /* Jarak dari ikon di atasnya */
}

.fact-number {
    font-size: 2.5em;
    font-weight: 700;
    color: #333;
    margin: 0; 
    line-height: 1;
}

.fact-label {
    font-size: 1.5em; 
    font-weight: 700;
    color: #333;
    margin-left: 5px; 
    line-height: 1;
}

/* Penataan Deskripsi */
.fact-description {
    font-size: 1em;
    color: #555;
    margin-top: 5px;
    line-height: 1.3;
}

/* Item 5 dimulai di kolom 3 dan membentang 1 kolom */
.fact-item:nth-child(5) {
    grid-column: 3 / span 1;
}

/* Item 6 dimulai di kolom 4 dan membentang 1 kolom */
.fact-item:nth-child(6) {
    grid-column: 4 / span 1;
}

@media (max-width: 768px) {
    .facts-container {
        grid-template-columns: repeat(2, 1fr); 
        gap: 5px;
    }
    .fact-item-profile {
        margin-bottom: 30px;
        font-size: 0.6em;
    }
}

</style>