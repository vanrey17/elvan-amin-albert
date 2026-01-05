
<body>
    <main class="hero-section">
        <div class="hero-content">
            <h1>Pendidikan</h1>
            <p>
                Pendidikan di SMK Teknologi ASCENDIA telah menerapkan kurikulum merdeka untuk menunjang pertumbuhan dan perkembangan siswa siswa.
            </p>
            <a href="#" class="scroll-explore">Scroll to Explore</a>
        </div>
    </main>

<?php
include 'page/identitas.php';
include 'page/fakta-singkat.php';
include 'page/principal.php';

?>

<style>
    /* --- 2. Hero Section --- */
.hero-section {
    /* Ganti 'path/to/your/image.jpg' dengan URL atau path gambar Anda */
    background-image: linear-gradient(rgba(0, 0, 0, 0.4)), url("image/ascendia-bangunan.png");
    background-size: cover;
    background-position: center top;
    height: 100vh;    
    flex-direction: column;
    padding: 0; /* Hapus padding yang mengganggu penempatan navbar */
    position: relative;
    color: white;
}
.hero-content {
    /* Gunakan flex untuk menempatkan konten di bawah navbar */
    display: flex;
    flex-direction: column;
    justify-content: flex-end; /* Dorong konten ke bawah */
    flex-grow: 1; /* Biarkan konten mengisi ruang yang tersisa */
    padding: 250px 50px 80px 70px; /* Padding bawah untuk konten teks */
    max-width: 600px;
}
.hero-content h1 {
    font-size: 4em;
    margin-bottom: 10px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8); /* Gelapkan bayangan agar lebih jelas */
}
.hero-content p {
    font-size: 1.2em;
    line-height: 1.5;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8);
    padding: 5px 0;
}
.scroll-explore {
    position: absolute;
    right: 50px;
    bottom: 30px;
    color: white;
    text-decoration: none;
    font-size: 14px;
}

@media (max-width: 768px) {
    .hero-content h1 {
        font-size: 2em;
    }
    .hero-content p {
        font-size: 1em;
    }
}

</style>
</body>