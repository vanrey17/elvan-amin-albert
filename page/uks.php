<?php
// 1. MULAI OUTPUT BUFFERING
ob_start();

// 2. Inisialisasi Session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 3. Sertakan Koneksi
require_once 'config.php'; 

$message = ''; // Inisialisasi variabel pesan

// 4. LOGIKA PROSES DATA (Diperbaiki kurung tutup dan penempatan eksekusi)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_visit'])) {
    $name    = mysqli_real_escape_string($conn, $_POST['name']);
    $grade   = mysqli_real_escape_string($conn, $_POST['grade']);
    $gender  = mysqli_real_escape_string($conn, $_POST['gender']);
    $symptom = mysqli_real_escape_string($conn, $_POST['symptom']);
    
    $query_insert = "INSERT INTO tb_visit_uks (student_name, grade, gender, symptoms, status) 
                     VALUES ('$name', '$grade', '$gender', '$symptom', 'Menunggu')";
    
    // Eksekusi query di dalam blok IF post
    if (mysqli_query($conn, $query_insert)) {
        $message = "Antrian berhasil didaftarkan!";
    } else {
        $message = "Gagal mendaftar: " . mysqli_error($conn);
    }
}

// 6. Logika Kapasitas Bed
$total_bed_l = 3;
$total_bed_p = 3;

$res_l = mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_visit_uks WHERE status = 'Sedang Dirawat' AND gender = 'L'");
$used_l = ($res_l) ? mysqli_fetch_assoc($res_l)['total'] : 0;

$res_p = mysqli_query($conn, "SELECT COUNT(*) as total FROM tb_visit_uks WHERE status = 'Sedang Dirawat' AND gender = 'P'");
$used_p = ($res_p) ? mysqli_fetch_assoc($res_p)['total'] : 0;

$sisa_bed_l = $total_bed_l - $used_l;
$sisa_bed_p = $total_bed_p - $used_p;

// 7. Ambil Data Pasien (Ditaruh setelah proses insert agar data baru langsung muncul)
$tb_visit_uks = []; 
$query_select = "SELECT * FROM tb_visit_uks ORDER BY FIELD(status, 'Sedang Dirawat', 'Menunggu', 'Selesai') ASC, created_at DESC";
$result = mysqli_query($conn, $query_select);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $tb_visit_uks[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKS Digital | Ascendia Smart School</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-medical { background: radial-gradient(circle at top right, #f0fdfa, #ffffff); }
    </style>
</head>
<body class="bg-medical text-slate-800">

    <header class="bg-slate-900 py-12 px-4 relative overflow-hidden mb-10">
        <div class="absolute top-0 right-0 w-64 h-64 bg-teal-500/10 rounded-full -mr-20 -mt-20 blur-3xl"></div>
        <div class="max-w-7xl mx-auto relative z-10 text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">
                UKS <span class="text-teal-400">SMART</span> ASCENDIA
            </h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-sm md:text-base">Sistem monitoring kesehatan siswa real-time.</p>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 pb-20">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white rounded-3xl shadow-xl p-6 border border-slate-100">
                    <h2 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-6 flex items-center">
                        <i class="fas fa-bed-pulse me-2 text-teal-500"></i> Kapasitas Ruang Rawat
                    </h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="p-4 rounded-2xl border-2 <?php echo ($sisa_bed_l <= 0) ? 'border-red-100 bg-red-50' : 'border-teal-50 bg-teal-50/30'; ?>">
                            <p class="text-xs text-slate-500 mb-1">Bed Laki-laki</p>
                            <span class="text-3xl font-black"><?php echo max(0, $sisa_bed_l); ?></span><span class="text-sm text-slate-400">/<?php echo $total_bed_l; ?></span>
                        </div>
                        <div class="p-4 rounded-2xl border-2 <?php echo ($sisa_bed_p <= 0) ? 'border-red-100 bg-red-50' : 'border-pink-50 bg-pink-50/30'; ?>">
                            <p class="text-xs text-slate-500 mb-1">Bed Perempuan</p>
                            <span class="text-3xl font-black"><?php echo max(0, $sisa_bed_p); ?></span><span class="text-sm text-slate-400">/<?php echo $total_bed_p; ?></span>
                        </div>
                    </div>
                </div>

                <?php if($message): ?>
                    <div id="notif" class="bg-green-100 border border-green-200 text-green-700 px-6 py-4 rounded-2xl flex items-center shadow-sm">
                        <i class="fas fa-check-circle mr-3"></i>
                        <span class="font-bold"><?php echo $message; ?></span>
                    </div>
                    <script>
                        setTimeout(() => { document.getElementById('notif').style.display = 'none'; }, 5000);
                    </script>
                <?php endif; ?>

                <div class="bg-white rounded-3xl shadow-xl p-8 border border-slate-100">
                    <h2 class="text-xl font-bold text-slate-800 mb-6">E-Registrasi</h2>

                    <form action="" method="POST" class="space-y-5">
                        <input type="text" name="name" required class="w-full px-5 py-3 bg-slate-50 border rounded-2xl outline-none focus:border-teal-500" placeholder="Nama Lengkap">
                        <div class="grid grid-cols-2 gap-4">
                            <input type="text" name="grade" required class="w-full px-5 py-3 bg-slate-50 border rounded-2xl" placeholder="Kelas">
                            <select name="gender" required class="w-full px-5 py-3 bg-slate-50 border rounded-2xl">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <textarea name="symptom" rows="3" required class="w-full px-5 py-3 bg-slate-50 border rounded-2xl" placeholder="Keluhan"></textarea>
                        <button type="submit" name="submit_visit" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-4 rounded-2xl shadow-lg transition-all">
                            Kirim Antrian
                        </button>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-8">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-100 h-full">
                    <div class="p-8 border-b border-slate-50 flex justify-between items-center">
                        <h2 class="text-2xl font-black text-slate-800">Live Monitor Pasien</h2>
                        <span class="text-xs font-bold text-teal-600 uppercase tracking-widest"><i class="fas fa-circle animate-pulse me-1"></i> Sistem Aktif</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-slate-400 text-[11px] uppercase tracking-widest border-b">
                                    <th class="px-8 py-5 text-left">Pasien</th>
                                    <th class="px-8 py-5 text-left">Keluhan</th>
                                    <th class="px-8 py-5 text-center">Status</th>
                                    <th class="px-8 py-5 text-right">Waktu</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                <?php if(empty($tb_visit_uks)): ?>
                                    <tr><td colspan="4" class="py-24 text-center text-slate-400">Belum ada pasien hari ini.</td></tr>
                                <?php else: ?>
                                    <?php foreach($tb_visit_uks as $v): ?>
                                    <tr class="hover:bg-slate-50 transition-colors">
                                        <td class="px-8 py-6">
                                            <div class="font-bold text-slate-700"><?php echo htmlspecialchars($v['student_name']); ?></div>
                                            <div class="text-xs text-slate-400"><?php echo htmlspecialchars($v['grade']); ?> (<?php echo $v['gender']; ?>)</div>
                                        </td>
                                        <td class="px-8 py-6 text-sm italic text-slate-600">"<?php echo htmlspecialchars($v['symptoms']); ?>"</td>
                                        <td class="px-8 py-6 text-center">
                                            <?php 
                                                $status = $v['status'];
                                                $badge = "bg-slate-100 text-slate-500";
                                                if($status == 'Sedang Dirawat') $badge = "bg-amber-100 text-amber-600";
                                                if($status == 'Selesai') $badge = "bg-teal-100 text-teal-600";
                                                if($status == 'Menunggu') $badge = "bg-rose-50 text-rose-500";
                                            ?>
                                            <span class="px-3 py-1 rounded-xl text-[10px] font-black uppercase <?php echo $badge; ?>">
                                                <?php echo $status; ?>
                                            </span>
                                        </td>
                                        <td class="px-8 py-6 text-right font-bold text-slate-400">
                                            <?php echo date('H:i', strtotime($v['created_at'])); ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
ob_end_flush(); 
?>