<?php
// --- BAGIAN 1: KONEKSI & LOGIKA ---

$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'db_project_smk';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$message = ''; 
$tb_visit_uks = [];

// A. Handle Form Submit
if (isset($_POST['submit_visit'])) {
    $name    = mysqli_real_escape_string($conn, $_POST['name']);
    $grade   = mysqli_real_escape_string($conn, $_POST['grade']);
    $gender  = mysqli_real_escape_string($conn, $_POST['gender']); // Ambil data gender
    $symptom = mysqli_real_escape_string($conn, $_POST['symptom']);
    
    // Default status 'Menunggu'
    $query_insert = "INSERT INTO tb_visit_uks (student_name, grade, gender, symptoms, status) VALUES ('$name', '$grade', '$gender', '$symptom', 'Menunggu')";
    
    if (mysqli_query($conn, $query_insert)) {
        $message = "Antrian berhasil didaftarkan!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}

// B. Hitung Ketersediaan Bed (Hanya yang statusnya 'Sedang Dirawat')
// Total Kapasitas
$total_bed_l = 3;
$total_bed_p = 3;

// Hitung terpakai Laki-laki
$query_l = "SELECT COUNT(*) as total FROM tb_visit_uks WHERE status IN ('Menunggu', 'Sedang Dirawat') AND gender = 'L' AND DATE(created_at) = CURDATE()";
$res_l = mysqli_query($conn, $query_l);
$used_l = mysqli_fetch_assoc($res_l)['total'];

// Hitung terpakai Perempuan
$query_p = "SELECT COUNT(*) as total FROM tb_visit_uks WHERE status IN ('Menunggu', 'Sedang Dirawat') AND gender = 'P' AND DATE(created_at) = CURDATE()";
$res_p = mysqli_query($conn, $query_p);
$used_p = mysqli_fetch_assoc($res_p)['total'];

// Hitung Sisa
$sisa_bed_l = $total_bed_l - $used_l;
$sisa_bed_p = $total_bed_p - $used_p;

// C. Ambil Data Pasien Hari Ini
$query_select = "SELECT * FROM tb_visit_uks WHERE DATE(created_at) = CURDATE() ORDER BY created_at DESC";
$result = mysqli_query($conn, $query_select);

$tb_visit_uks = []; // Reset array untuk memastikan data segar
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
        .glass-effect { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(10px); }
        .bg-medical { background: radial-gradient(circle at top right, #f0fdfa, #ffffff); }
    </style>
</head>
<body class="bg-medical text-slate-800">

    <header class="bg-slate-900 py-12 px-4 relative overflow-hidden mb-10">
        <div class="absolute top-0 right-0 w-64 h-64 bg-teal-500/10 rounded-full -mr-20 -mt-20 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-orange-500/10 rounded-full -ml-20 -mb-20 blur-3xl"></div>
        
        <div class="max-w-7xl mx-auto relative z-10 text-center">
            <div class="inline-flex items-center space-x-2 bg-teal-500/20 text-teal-400 px-4 py-1.5 rounded-full mb-4">
                <i class="fas fa-heart-pulse animate-pulse"></i>
                <span class="text-xs font-bold uppercase tracking-widest">Health & Wellness Center</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white mb-4">
                UKS <span class="text-teal-400">SMART</span> ASCENDIA
            </h1>
            <p class="text-slate-400 max-w-2xl mx-auto text-sm md:text-base">
                Sistem monitoring kesehatan siswa real-time. Memastikan kenyamanan dan penanganan medis dasar yang cepat, tepat, dan terintegrasi.
            </p>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 pb-20">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <div class="lg:col-span-4 space-y-6">
                
                <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 p-6 border border-slate-100">
                    <h2 class="text-sm font-bold text-slate-400 uppercase tracking-wider mb-6 flex items-center">
                        <i class="fas fa-bed-pulse me-2 text-teal-500"></i> Kapasitas Ruang Rawat
                    </h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="relative p-4 rounded-2xl border-2 <?php echo ($sisa_bed_l == 0) ? 'border-red-100 bg-red-50' : 'border-teal-50 bg-teal-50/30'; ?> transition-all">
                            <span class="absolute top-2 right-3 text-[10px] font-bold text-teal-600/40">MALE</span>
                            <p class="text-xs text-slate-500 mb-1">Bed Laki-laki</p>
                            <div class="flex items-end space-x-1">
                                <span class="text-3xl font-black text-slate-800"><?php echo max(0, $sisa_bed_l); ?></span>
                                <span class="text-sm text-slate-400 mb-1">/ <?php echo $total_bed_l; ?></span>
                            </div>
                            <div class="w-full bg-slate-200 h-1.5 mt-3 rounded-full overflow-hidden">
                                <div class="bg-teal-500 h-full transition-all" style="width: <?php echo ($sisa_bed_l/$total_bed_l)*100; ?>%"></div>
                            </div>
                        </div>

                        <div class="relative p-4 rounded-2xl border-2 <?php echo ($sisa_bed_p == 0) ? 'border-red-100 bg-red-50' : 'border-pink-50 bg-pink-50/30'; ?> transition-all">
                            <span class="absolute top-2 right-3 text-[10px] font-bold text-pink-600/40">FEMALE</span>
                            <p class="text-xs text-slate-500 mb-1">Bed Perempuan</p>
                            <div class="flex items-end space-x-1">
                                <span class="text-3xl font-black text-slate-800"><?php echo max(0, $sisa_bed_p); ?></span>
                                <span class="text-sm text-slate-400 mb-1">/ <?php echo $total_bed_p; ?></span>
                            </div>
                            <div class="w-full bg-slate-200 h-1.5 mt-3 rounded-full overflow-hidden">
                                <div class="bg-pink-500 h-full transition-all" style="width: <?php echo ($sisa_bed_p/$total_bed_p)*100; ?>%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 p-8 border border-slate-100">
                    <div class="flex items-center space-x-3 mb-8">
                        <div class="w-10 h-10 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-file-medical"></i>
                        </div>
                        <h2 class="text-xl font-bold text-slate-800">E-Registrasi</h2>
                    </div>

                    <?php if($message): ?>
                        <div class="flex items-center p-4 mb-6 text-sm text-green-800 rounded-2xl bg-green-50 border border-green-100">
                            <i class="fas fa-check-circle me-2"></i>
                            <div><span class="font-bold">Berhasil!</span> <?php echo $message; ?></div>
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST" class="space-y-5">
                        <div class="group">
                            <label class="block text-xs font-bold text-slate-500 mb-2 ml-1 uppercase">Identitas Siswa</label>
                            <input type="text" name="name" required class="w-full px-5 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-teal-500/10 focus:border-teal-500 transition-all outline-none" placeholder="Masukkan nama lengkap">
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 mb-2 ml-1 uppercase">Kelas</label>
                                <input type="text" name="grade" required class="w-full px-5 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-teal-500/10 focus:border-teal-500 transition-all outline-none" placeholder="XI TJKT">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 mb-2 ml-1 uppercase">Gender</label>
                                <select name="gender" required class="w-full px-5 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-teal-500/10 focus:border-teal-500 transition-all outline-none bg-white">
                                    <option value="" disabled selected>Pilih</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 mb-2 ml-1 uppercase">Keluhan / Gejala</label>
                            <textarea name="symptom" rows="3" required class="w-full px-5 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-teal-500/10 focus:border-teal-500 transition-all outline-none" placeholder="Jelaskan kondisi yang dirasakan..."></textarea>
                        </div>
                        
                        <button type="submit" name="submit_visit" class="w-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-teal-200 transition-all active:scale-95 flex items-center justify-center space-x-2">
                            <i class="fas fa-paper-plane text-sm"></i>
                            <span>Kirim Antrian</span>
                        </button>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-8">
                <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 overflow-hidden border border-slate-100 h-full">
                    <div class="p-8 border-b border-slate-50 flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h2 class="text-2xl font-black text-slate-800">Live Monitor Pasien</h2>
                            <p class="text-slate-400 text-sm">Data kunjungan hari ini: <span class="text-teal-600 font-bold"><?php echo date('d M Y'); ?></span></p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="flex h-3 w-3 relative">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-teal-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-teal-500"></span>
                            </span>
                            <span class="text-xs font-bold text-teal-600 uppercase tracking-widest">Sistem Aktif</span>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-slate-400 text-[11px] uppercase tracking-widest border-b border-slate-50">
                                    <th class="px-8 py-5 text-left">Pasien</th>
                                    <th class="px-8 py-5 text-left">Keluhan</th>
                                    <th class="px-8 py-5 text-center">Status</th>
                                    <th class="px-8 py-5 text-right">Waktu</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                <?php if(empty($tb_visit_uks)): ?>
                                    <tr>
                                        <td colspan="4" class="py-24 text-center">
                                            <div class="flex flex-col items-center">
                                                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                                                    <i class="fas fa-user-md text-3xl text-slate-200"></i>
                                                </div>
                                                <p class="text-slate-400 font-medium">Belum ada pasien yang terdaftar hari ini.</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach($tb_visit_uks as $v): ?>
                                    <tr class="hover:bg-slate-50/50 transition-colors group">
                                        <td class="px-8 py-6">
                                            <div class="flex items-center space-x-4">
                                                <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center font-bold text-xs <?php echo ($v['gender'] == 'L') ? 'bg-blue-100 text-blue-600' : 'bg-pink-100 text-pink-600'; ?>">
                                                    <?php echo $v['gender']; ?>
                                                </div>
                                                <div>
                                                    <div class="font-bold text-slate-700 group-hover:text-teal-600 transition-colors"><?php echo htmlspecialchars($v['student_name']); ?></div>
                                                    <div class="text-xs text-slate-400 font-semibold"><?php echo htmlspecialchars($v['grade']); ?></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-6">
                                            <p class="text-sm text-slate-600 line-clamp-1 italic">"<?php echo htmlspecialchars($v['symptoms']); ?>"</p>
                                        </td>
                                        <td class="px-8 py-6 text-center">
                                            <?php 
                                                $class = "bg-slate-100 text-slate-500";
                                                $icon = "fa-clock";
                                                if($v['status'] == 'Sedang Dirawat') { $class = "bg-amber-100 text-amber-600 border border-amber-200"; $icon = "fa-bed-pulse"; }
                                                if($v['status'] == 'Selesai') { $class = "bg-teal-100 text-teal-600 border border-teal-200"; $icon = "fa-circle-check"; }
                                                if($v['status'] == 'Menunggu') { $class = "bg-rose-50 text-rose-500 border border-rose-100"; $icon = "fa-hourglass-half"; }
                                            ?>
                                            <span class="inline-flex items-center px-3 py-1.5 rounded-xl text-[10px] font-black uppercase tracking-wider <?php echo $class; ?>">
                                                <i class="fas <?php echo $icon; ?> me-1.5"></i>
                                                <?php echo $v['status']; ?>
                                            </span>
                                        </td>
                                        <td class="px-8 py-6 text-right">
                                            <span class="text-sm font-bold text-slate-400"><?php echo date('H:i', strtotime($v['created_at'])); ?></span>
                                            <div class="text-[10px] text-slate-300">WIB</div>
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

    <footer class="text-center py-10 text-slate-400 text-xs">
        <p>&copy; 2025 Ascendia Smart School - Medical Record System</p>
    </footer>

</body>
</html>