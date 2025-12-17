<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKS Smart Ascendia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <!-- <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f3f4f6; }
        .ascendia-orange { color: #F97316; }
        .bg-ascendia-orange { background-color: #F97316; }
        .glass-panel {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style> -->
</head>
<body class="bg-slate-50 text-slate-800">

    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex items-center gap-3">
                    <div class="bg-ascendia-orange text-white p-2 rounded-lg">
                        <i class="fas fa-hospital-alt text-2xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold tracking-tight text-slate-800">ASCENDIA <span class="text-teal-600">HEALTH</span></h1>
                        <p class="text-xs text-slate-500">Sistem Informasi UKS Digital</p>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-sm font-semibold">
                        <i class="fas fa-user-md mr-2"></i>dr. Bayu (Standby)
                    </span>
                    <span class="text-sm text-slate-500"><?php echo date("l, d M Y"); ?></span>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-1 space-y-6">
                
                <div class="bg-white rounded-2xl shadow-lg p-6 border-t-4 border-teal-500">
                    <h2 class="text-lg font-semibold mb-4 text-slate-700">Ketersediaan Bed</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center p-4 bg-teal-50 rounded-xl border border-teal-100">
                            <i class="fas fa-bed text-3xl text-teal-600 mb-2"></i>
                            <p class="text-sm text-slate-500">Bed Laki-laki</p>
                            <p class="text-xl font-bold text-slate-800">2 <span class="text-xs font-normal">/ 3 Kosong</span></p>
                        </div>
                        <div class="text-center p-4 bg-pink-50 rounded-xl border border-pink-100">
                            <i class="fas fa-bed text-3xl text-pink-500 mb-2"></i>
                            <p class="text-sm text-slate-500">Bed Perempuan</p>
                            <p class="text-xl font-bold text-slate-800">1 <span class="text-xs font-normal">/ 3 Kosong</span></p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-bold text-slate-800">Registrasi Kunjungan</h2>
                        <i class="fas fa-notes-medical text-orange-500 text-xl"></i>
                    </div>

                    <?php if($message): ?>
                        <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4 text-sm">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST" class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Nama Lengkap</label>
                            <input type="text" name="name" required class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-orange-300 focus:border-orange-500 outline-none transition" placeholder="Contoh: Budi Santoso">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Kelas / Jabatan</label>
                            <input type="text" name="grade" required class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-orange-300 focus:border-orange-500 outline-none transition" placeholder="Contoh: XI RPL 1">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-600 mb-1">Keluhan Utama</label>
                            <textarea name="symptom" rows="3" required class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-orange-300 focus:border-orange-500 outline-none transition" placeholder="Apa yang dirasakan?"></textarea>
                        </div>
                        <button type="submit" name="submit_visit" class="w-full bg-slate-800 hover:bg-slate-900 text-white font-bold py-3 rounded-lg shadow-md transition transform hover:scale-[1.02]">
                            Daftar Periksa
                        </button>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-full flex flex-col">
                    <div class="p-6 bg-slate-800 text-white flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-bold">Monitor Pasien Hari Ini</h2>
                            <p class="text-slate-400 text-sm">Real-time update dari ruang UKS</p>
                        </div>
                        <div class="bg-slate-700 p-2 rounded-lg">
                            <i class="fas fa-history"></i>
                        </div>
                    </div>

                    <div class="p-0 overflow-x-auto flex-grow">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50 text-slate-500 text-sm uppercase tracking-wider">
                                <tr>
                                    <th class="p-5 font-semibold">Nama Siswa</th>
                                    <th class="p-5 font-semibold">Kelas</th>
                                    <th class="p-5 font-semibold">Keluhan</th>
                                    <th class="p-5 font-semibold text-center">Status</th>
                                    <th class="p-5 font-semibold text-right">Waktu</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <?php if(empty($visits)): ?>
                                    <tr>
                                        <td colspan="5" class="p-10 text-center text-slate-400">
                                            <i class="fas fa-check-circle text-4xl mb-3 text-slate-200"></i><br>
                                            Tidak ada antrian pasien saat ini.
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach($visits as $v): ?>
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="p-5 font-medium text-slate-800"><?php echo htmlspecialchars($v['student_name']); ?></td>
                                        <td class="p-5 text-slate-500"><?php echo htmlspecialchars($v['grade']); ?></td>
                                        <td class="p-5 text-slate-600"><?php echo htmlspecialchars($v['symptoms']); ?></td>
                                        <td class="p-5 text-center">
                                            <?php 
                                                $statusClass = 'bg-slate-100 text-slate-600';
                                                if($v['status'] == 'Sedang Dirawat') $statusClass = 'bg-yellow-100 text-yellow-700 border border-yellow-200';
                                                if($v['status'] == 'Selesai') $statusClass = 'bg-green-100 text-green-700 border border-green-200';
                                            ?>
                                            <span class="px-3 py-1 rounded-full text-xs font-bold <?php echo $statusClass; ?>">
                                                <?php echo $v['status']; ?>
                                            </span>
                                        </td>
                                        <td class="p-5 text-right text-slate-400 text-sm">
                                            <?php echo date('H:i', strtotime($v['created_at'])); ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="p-4 bg-slate-50 border-t border-slate-100 text-center text-sm text-slate-400">
                        SMK Teknologi Ascendia Health System v1.0
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>