<?php
// Tentukan variabel data yang berbeda untuk setiap halaman (RPL)
$page_title = "METODE PEMBELAJARAN";
$page_description = "Di SMK Teknologi Ascendia, pembelajaran berpusat pada Anda. 
Mengadopsi semangat Kurikulum Merdeka, kami menerapkan pendekatan aktif yang 
memprioritaskan eksplorasi, pemecahan masalah, dan kolaborasi, memastikan setiap 
siswa mendapatkan pengalaman belajar yang mendalam sesuai dengan minat dan potensi mereka.";

include 'page/hero.php';
?>

<div class="container">
    
    <h2 class="section-heading">🚀 Metode Pembelajaran Aktif</h2>
    
    <div class="method-card">
        <div class="method-text">
            <h3>Think, Pair, Share (TPS)</h3>
            <p>Guru menyajikan materi, siswa berpikir secara individu (**Think**), berpasangan untuk berdiskusi (**Pair**), lalu berbagi hasilnya dengan seluruh kelas (**Share**).</p>
        </div>
        <div class="method-image-container">
            <img src="image/TPS.png" alt="Ilustrasi Think, Pair, Share">
        </div>
    </div>

    <div class="method-card">
        <div class="method-text">
            <h3>Jigsaw</h3>
            <p>Siswa dibagi menjadi **kelompok ahli** untuk mempelajari bagian materi tertentu, kemudian kembali ke kelompok asalnya untuk mengajarkan bagian tersebut kepada teman-temannya.</p>
        </div>
        <div class="method-image-container">
            <img src="image/jigsaw.png" alt="Ilustrasi Metode Jigsaw">
        </div>
    </div>

    <div class="method-card">
        <div class="method-text">
            <h3>Project Based Learning (PBL)</h3>
            <p>Siswa mengerjakan **proyek yang menantang** untuk menghasilkan suatu produk, seperti membuat laporan, poster, atau model.</p>
        </div>
        <div class="method-image-container">
            <img src="image/pbl.png" alt="Ilustrasi Project Based Learning">
        </div>
    </div>

    <div class="method-card">
        <div class="method-text">
            <h3>Problem Based Learning (PBL)</h3>
            <p>Siswa diberi **masalah nyata** untuk dianalisis dan dipecahkan secara ilmiah, mendorong kemampuan berpikir kritis dan solusi.</p>
        </div>
        <div class="method-image-container">
            <img src="image/pbl2.png">
        </div>
    </div>

    <hr style="border: 0; border-top: 1px dashed #ccc; margin: 40px 0;">

    <h2 class="section-heading">✨ Metode Pembelajaran Lainnya</h2>

    <div class="method-card">
        <div class="method-text">
            <h3>Discovery Learning</h3>
            <p>Siswa menemukan **konsep dan prinsip** melalui eksplorasi dan percobaan, misalnya dalam pelajaran IPA sederhana, dengan sedikit arahan dari guru.</p>
        </div>
        <div class="method-image-container">
            <img src="image/discovery-learning.png" alt="Ilustrasi Discovery Learning">
        </div>
    </div>

    <div class="method-card">
        <div class="method-text">
            <h3>Differentiated Learning</h3>
            <p>Pembelajaran disesuaikan dengan **minat, kesiapan, dan kebutuhan belajar** setiap siswa, misalnya dengan memberikan pilihan tugas yang variatif.</p>
        </div>
        <div class="method-image-container">
            <img src="image/diffenatd-learning.png" alt="Ilustrasi Differentiated Learning">
        </div>
    </div>
    
    <hr style="border: 0; border-top: 2px solid var(--primary-color); margin: 50px 0;">

    <h2 class="section-heading">🎯 Penerapan dan Dampak</h2>
    <div class="implementation-grid">
        
        <div class="implementation-card">
            <h4>Mengembangkan Keterampilan 4C</h4>
            <p>Dirancang untuk menumbuhkan keterampilan **Berpikir Kritis, Komunikasi, Kolaborasi, dan Kreativitas** (4C).</p>
        </div>
        
        <div class="implementation-card">
            <h4>Pembelajaran Berpusat pada Siswa</h4>
            <p>Fleksibilitas dan kemandirian siswa menjadi kunci utama, dengan peran guru bergeser sebagai **fasilitator**.</p>
        </div>

        <div class="implementation-card">
            <h4>Pembelajaran Mendalam</h4>
            <p>Mendorong pengalaman belajar yang lebih mendalam, menumbuhkan kesadaran siswa untuk menjadi **pembelajar aktif** dan mandiri.</p>
        </div>
    </div>

</div>

<style>

        :root {
                    --primary-color: #FF6B00; /* Orange dari tombol Hubungi Kami */
                    --secondary-color: #0F1D38; /* Biru gelap dari judul Sambutan */
                    --text-color: #333;
                    --light-bg: #F8F9FA;
                }

        .container {
                    max-width: 1200px;
                    margin: 0 auto;
                    padding: 40px 20px;
                }
                
        .section-heading {
                    color: var(--secondary-color);
                    border-bottom: 3px solid var(--primary-color);
                    display: inline-block;
                    padding-bottom: 5px;
                    margin-bottom: 30px;
                    text-align: center;
                }

        /* CARD METODE PEMBELAJARAN (2 Kolom) */

        
        .method-card {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            min-height: 180px; /* Tinggi minimum untuk konsistensi */
        }
        
        .method-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .method-text {
            flex: 2; /* Mengambil 2/3 ruang */
            padding: 30px;
        }

        .method-image-container {
            flex: 1; /* Kolom Gambar: Mengambil 1/3 ruang */
            background-color: var(--light-bg);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        
        .method-image-container img {
            width: 400px; /* Gambar mengisi container */
            height: 200px;
            object-fit: cover; /* Memastikan gambar mencakup area tanpa merusak rasio */
        }

        .method-text h3 {
            color: var(--primary-color);
            margin-top: 0;
            font-size: 1.5rem;
            border-left: 4px solid var(--secondary-color);
            padding-left: 10px;
        }

        .method-text p {
            color: var(--text-color);
            line-height: 1.6;
            margin-bottom: 0;
        }

        /* Bagian Penerapan (Kotak Informasi) */
        .implementation-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 40px;
        }

        .implementation-card {
            background-color: var(--secondary-color);
            color: #fff;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
        }

        .implementation-card h4 {
            color: var(--primary-color);
            margin-top: 0;
        }

        @media (max-width: 768px) {

            .method-card {
                flex-direction: column;
                min-height: auto; /* Sesuaikan tinggi pada layar kecil */
                width: 300px;
                height: auto;
            }
        
            .method-text h3, .implementation-card h4 {
                flex: none;
                width: 100%;
                font-size: 1em;
            }
            .method-text p, .implementation-card p {
                flex: none;
                width: 100%;
                font-size: 0.8em;
            }
        
            .method-image-container {
                padding: 20px 0;
            }
        
            .method-image-container img {
                width: 100%; /* Gambar mengisi lebar penuh pada layar kecil */
                height: auto; /* Sesuaikan tinggi otomatis */
            }
        }
    </style>