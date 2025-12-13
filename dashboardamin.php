<?php
include 'config.php';

$nim = "";
$nama = "";
$alamat = "";
$ProgramStudi = "";


//submit data

if (isset($_POST['tombol_submit_datamahasiswa'])) {
    $nim     = $_POST['nim'];
    $nama    = $_POST['nama'];
    $alamat  = $_POST['alamat'];
    $ProgramStudi = $_POST['ProgramStudi'];

    // Validasi bahwa semua tabel diisii atau bisa juga dengan 
    // if ($nim && $nama && $alamat && $ProgramStudi)
    //  {$sqli="insert into tb_mahasiswa..."
    //     $q1= mysqli_query($koneksi,$sqli} }

    if (empty($nim) || empty($nama) || empty($alamat) || empty($ProgramStudi)) {
        echo "<script>alert('Semua field wajib diisi!');</script>";
        exit;
    }
    // saya ingin menampilkan pesan eror jika nim diisi dengan data yang sama dengan yang sudah ada di database karena nim unique
    // lalu saya akan menampilkan pesan eror gagal menambahkan data nim sudah ada
    // Cek apakah nim sudah ada
    $checkNim = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE nim='$nim'");

    if (mysqli_num_rows($checkNim) > 0) {
        echo "<script>alert('NIM ini sudah terdaftar! Silakan gunakan NIM lain.');</script>";
        exit;
    }

    // Simpan data mahasiswa
    $query = "INSERT INTO tb_mahasiswa (nim, nama, alamat, programstudi) VALUES ('$nim', '$nama', '$alamat', '$ProgramStudi')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Data mahasiswa berhasil disimpan!'); window.location='dashboard.php';</script>";
        exit(); // Menghentikan PHP agar HTML tidak ikut terload
    } else {
        echo "<script>alert('Terjadi kesalahan saat menyimpan data.');</script>";
    }
}
// edit data
$editMode = false;

if (isset($_GET['edit_id'])) {
    $editMode = true;
    $edit_id = $_GET['edit_id'];

    $q = mysqli_query($conn, "SELECT * FROM tb_mahasiswa WHERE id='$edit_id'");
    $d = mysqli_fetch_assoc($q);
// Untuk mengambil isi data dari query, digunakan:

//$d = mysqli_fetch_assoc($q);


//Fungsinya: Mengambil 1 baris data dari hasil query
//Mengubah menjadi array asosiatif seperti: $d = [
//    "nim" => "12345",
//    "nama" => "Andi",
//    "alamat" => "Palembang",
//    "programstudi" => "Informatika"];



    $nim = $d['nim'];
    $nama = $d['nama'];
    $alamat = $d['alamat'];
    $ProgramStudi = $d['programstudi'];
}
else {
    $editMode = false;
}
// update data
if (isset($_POST['tombol_update_datamahasiswa']) && isset($_POST['edit_id'])) {

    $edit_id = $_POST['edit_id'];
    $nim     = $_POST['nim'];
    $nama    = $_POST['nama'];
    $alamat  = $_POST['alamat'];
    $ProgramStudi = $_POST['ProgramStudi'];

    $query = "UPDATE tb_mahasiswa SET 
                nim='$nim',
                nama='$nama',
                alamat='$alamat',
                programstudi='$ProgramStudi'
              WHERE id='$edit_id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal update data');</script>";
    }
}

// delete data
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $query = "DELETE FROM tb_mahasiswa WHERE id='$delete_id'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data');</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
    
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="mx-auto">
    <!-- untuk memasukkan data-->
    <div class="card mx-auto" style="max-width: 800px; margin-top: 100px; padding: 20px;">
        <div class="card-header ">
            Create data/Edit data
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $nim?>" required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama"   value="<?php echo $nama?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat?>" required>
                </div>
                <div class="mb-3">
                    <label for="ProgramStudi" class="form-label">Program Studi</label>
                    <!-- place holder tidak bisa di pakai dalam form select -->
                    <select class="form-select" id="ProgramStudi" name="ProgramStudi"  required>
                        <!-- maka gunakan value yang kosong namun disabled selected untuk mengatasi place holder -->
                        <option value="" disabled selected> Pilih Program Studi </option>
                        <option value="informatika">Informatika</option>
                        <option value="sistem informasi">Sistem Informasi</option>
                        <option value="bisnis digital">Bisnis Digital</option>
                    </select>
                </div>
                <!-- tombol submit berubah menjadi update jika edit data -->
                 <?php if ($editMode):  ?>
                    <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
                    <button type="submit" name="tombol_update_datamahasiswa" class="btn btn-primary">Simpan Data</button>
                    <a href="dashboard.php" class="btn btn-secondary">Batal</a>
                <?php else: ?>
                    <button type="submit" name="tombol_submit_datamahasiswa" class="btn btn-primary">Submit Data </button>
                <?php endif; ?>
            </form>
        </div>
    </div>
  </div>

    <!-- untuk mengeluarkan dan menampilkan data-->

  <div class="mx-auto">
    <div class="card mx-auto" style="max-width: 800px; margin-top: 100px; padding: 20px;">
        <div class="card-header  text-white bg-secondary">
           Data Mahasiswa
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Program Studi</th>
                        <!-- eror terjadi ketika ingin mendelete data karena struktur tabel itu tidak sesuai
                         seharusnya ada 5 tabel jadi 1. Kesalahan fatal: Kolom tabel tidak sesuai jumlah kolom


Tapi kamu menambahkan tombol Edit/Delete:

echo "<td><a href='dashboard.php?edit_id=...'>Edit</a> |
<a href='dashboard.php?delete_id=...'>Delete</a></td>";
Itu berarti kolom ke-5, tapi kamu tidak membuat <th>Aksi</th>
Akibatnya:
Struktur tabel menjadi rusak
 Browser bisa miss-baca HTML
 Tombol delete bisa tidak bekerja
 Javascript onclick bisa mati
 Query string kadang tidak terbaca
SOLUSI: Tambahkan kolom AKSI di header -->
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tb_mahasiswa";
                    $result = mysqli_query($conn, $query);

                    // mengambil dan menampilkan data dari databse
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            
                            echo "<tr>";
                            echo "<td>" . $row['nim'] . "</td>";
                            echo "<td>" . $row['nama'] . "</td>";
                            echo "<td>" . $row['alamat'] . "</td>";
                            echo "<td>" . $row['programstudi'] . "</td>";
                            // saya ingin menambahkan tombol aksi edit dan delete data yang nanti akan langsung mengubah database

                            // ?edit disini adalah kode query string yang akan di tangkap di halaman dashboard.php
                            // lalu edit_id= adalah id berapa yang akan di edit datanya
                            // lalu dihapus.php?id= adalah id berapa yang akan di hapus datanya
                            echo "<td><a href='dashboard.php?edit_id=" . $row['id'] . "' class='btn btn-primary'>Edit</a> |
                                      <a href='dashboard.php?delete_id=" . $row['id'] . "' class='btn btn-danger'  
                                      onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\" >Delete</a></td>";
// ada \ karena karena sedang menulis string di dalam string PHP. Karena kamu menulis tanda kutip ( “ atau ' ) di dalam echo PHP, 
// sehingga perlu di-escape dengan backslash agar PHP tidak bingung.Backslash \ dipakai agar PHP tahu bahwa
//  kutip di dalam HTML bukan penutup string PHP.Kalau tidak pakai backslash, PHP akan error.
                            echo "</tr>";
                        }   

                    } else {
                        echo "<tr><td colspan='4'>Tidak ada data mahasiswa.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

    </div>
  </div>