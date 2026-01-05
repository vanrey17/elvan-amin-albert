<?php

include 'config.php';



// Logika Simpan Data

if (isset($_POST['upload_blog'])) {

    $judul = mysqli_real_escape_string($conn, $_POST['judul']);

    $isi = mysqli_real_escape_string($conn, $_POST['isi']);

    $nama_file = "";



    // 1. Tentukan path target (Keluar dari page-admin lalu masuk ke uploads/berkas/)

    $target_dir = "../uploads/berkas/";



    // 2. Cek apakah folder ada, jika tidak buat foldernya

    if (!is_dir($target_dir)) {

        mkdir($target_dir, 0777, true);

    }



    if (!empty($_FILES['gambar']['name'])) {

        $nama_file = time() . "_" . $_FILES['gambar']['name'];

        $target_file = $target_dir . $nama_file;

       

        // Proses pemindahan file

        if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {

            // Berhasil upload file fisik

        } else {

            echo "<script>alert('Gagal mengupload gambar ke server!');</script>";

        }

    }



    // 3. Masukkan ke Database

    $query = "INSERT INTO tb_blog (judul, isi, gambar) VALUES ('$judul', '$isi', '$nama_file')";

   

    if (mysqli_query($conn, $query)) {

        // Pastikan 'page=list-blog' sesuai dengan rute di admin.php Anda

        echo "<script>alert('Blog berhasil diupload!'); window.location='admin.php?page=list-blog';</script>";

    } else {

        echo "<script>alert('Gagal menyimpan ke database: " . mysqli_error($conn) . "');</script>";

    }

}

?>



<div class="card" style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">

    <h3 style="margin-bottom: 20px; color: #2c3e50; border-bottom: 2px solid #eee; padding-bottom: 10px;">

        <i class="fas fa-newspaper"></i> Post Kegiatan Sekolah Baru

    </h3>

   

    <form action="" method="POST" enctype="multipart/form-data">

        <div style="margin-bottom: 15px;">

            <label style="display: block; font-weight: bold; margin-bottom: 8px;">Judul Kegiatan:</label>

            <input type="text" name="judul" required placeholder="Masukkan judul..."

                   style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">

        </div>

       

        <div style="margin-bottom: 15px;">

            <label style="display: block; font-weight: bold; margin-bottom: 8px;">Isi Berita/Kegiatan:</label>

            <textarea name="isi" required placeholder="Tulis konten di sini..."

                      style="width: 100%; height: 200px; padding: 12px; border: 1px solid #ddd; border-radius: 8px; font-family: inherit;"></textarea>

        </div>



        <div style="margin-bottom: 20px;">

            <label style="display: block; font-weight: bold; margin-bottom: 8px;">Foto Kegiatan:</label>

            <div id="preview-area" style="margin-bottom: 10px; display: none;">

                <img id="img-show" src="#" style="max-width: 200px; border-radius: 8px; border: 1px solid #ddd;">

            </div>

            <input type="file" name="gambar" id="input-img" required accept="image/*"

                   style="background: #f8f9fa; padding: 10px; border-radius: 8px; width: 100%; border: 1px dashed #ccc;">

        </div>



        <div style="display: flex; gap: 10px;">

            <button type="submit" name="upload_blog" style="background: #27ae60; color: white; padding: 12px 25px; border: none; border-radius: 8px; cursor: pointer; font-weight: bold;">

                <i class="fas fa-upload"></i> Publish Kegiatan

            </button>

            <a href="admin.php?page=list-blog" style="background: #95a5a6; color: white; padding: 12px 20px; border-radius: 8px; text-decoration: none; font-weight: bold;">Batal</a>

        </div>

    </form>

</div>



<script>

    // Preview gambar sebelum diupload

    document.getElementById('input-img').onchange = function (evt) {

        const [file] = this.files;

        if (file) {

            document.getElementById('preview-area').style.display = 'block';

            document.getElementById('img-show').src = URL.createObjectURL(file);

        }

    }

</script>