<?php
// chat.php - Backend untuk Chatbot SMK Teknologi ASCENDIA
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); 

// 1. Ambil Input User
$input = json_decode(file_get_contents('php://input'), true);
$history = $input['history'] ?? [];

// 2. API Key Gemini (Ganti dengan API Key Anda)
$apiKey = 'AIzaSyDUXqbO8-bphcSAJS5yhIvhkjtEOZhn0Kc'; 

// --- FUNGSI SCANNER OTOMATIS ---
function getWebsiteContent() {
    // Tentukan folder tempat file konten berada (sesuai index.php Anda)
    $pageFolder = __DIR__ . '/page/';
    
    // File yang TIDAK BOLEH dibaca oleh AI (karena isinya cuma menu/iklan/error)
    $blacklist = ['header.php', 'footer.php', '404.php', 'koneksi.php', 'config.php'];

    $fullText = "DATA WEBSITE SMK TEKNOLOGI ASCENDIA:\n";

    // Ambil semua file berakhiran .php di folder page
    $files = glob($pageFolder . "*.php");

    foreach ($files as $filePath) {
        $fileName = basename($filePath);

        // Lewati file yang ada di blacklist
        if (in_array($fileName, $blacklist)) {
            continue;
        }

        // Baca isi file
        $content = file_get_contents($filePath);
        
        // --- PEMBERSIHAN DATA (PENTING) ---
        // 1. Hapus kode PHP (keamanan: agar logika/password tidak terbaca)
        $content = preg_replace('/<\?php.*?\?>/s', '', $content);
        
        // 2. Hapus tag HTML (hemat token & agar AI fokus ke teks)
        $textOnly = strip_tags($content);
        
        // 3. Hapus spasi/enter berlebih
        $textOnly = preg_replace('/\s+/', ' ', $textOnly);
        $textOnly = trim($textOnly);

        // Jika file tidak kosong setelah dibersihkan, tambahkan ke konteks
        if (!empty($textOnly)) {
            // Gunakan nama file sebagai judul topik (misal: tjkt.php -> TJKT)
            $topic = strtoupper(str_replace('.php', '', $fileName));
            $fullText .= "Topik: $topic\nIsi: $textOnly\n---\n";
        }
    }
    return $fullText;
}

// Jalankan fungsi scanner
$websiteData = getWebsiteContent();

// --- LOGIKA AI (SYSTEM PROMPT) ---
$systemInstruction = "
Anda adalah asisten AI virtual yang ramah untuk website sekolah Ascendia.
Tugas Anda adalah membantu pengunjung dengan menjawab pertanyaan berdasarkan informasi yang tersedia di atas.

Panduan menjawab:
1. Gunakan informasi di atas sebagai sumber utama, tetapi gunakan penalaran yang wajar untuk menjawab pertanyaan yang berkaitan.
2. Jika pengguna menyapa (Halo, Selamat Pagi), balaslah dengan ramah.
3. Jawablah dengan bahasa Indonesia yang sopan, singkat, dan jelas.
4. Jika jawaban benar-benar tidak ditemukan dalam data, katakan: 'Maaf, informasi tersebut belum tersedia di sini. Silakan hubungi tim kami langsung untuk detail lebih lanjut.'
WEBSITE CONTENT:
" . $websiteData;
// ----------------------------------

// 3. Siapkan History Percakapan
$geminiContents = [];
foreach ($history as $index => $msg) {
    if ($index === 0 && $msg['role'] === 'model') continue; // Lewati sapaan awal
    $geminiContents[] = [
        "role" => $msg['role'],
        "parts" => [["text" => $msg['text']]]
    ];
}

if (empty($geminiContents)) {
    echo json_encode(['error' => 'Menunggu input user...']);
    exit;
}

// Susun Payload ke Google Gemini
$data = [
    "contents" => $geminiContents,
    "systemInstruction" => [
        "parts" => [["text" => $systemInstruction]]
    ]
];

// 4. Kirim Request (Model Gemini 2.5 Flash - Cepat & Hemat)
$url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=" . $apiKey;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo json_encode(['error' => 'Koneksi Error: ' . curl_error($ch)]);
} else {
    $decoded = json_decode($response, true);
    
    if (isset($decoded['candidates'][0]['content']['parts'][0]['text'])) {
        echo json_encode(['reply' => $decoded['candidates'][0]['content']['parts'][0]['text']]);
    } else {
        $errMsg = $decoded['error']['message'] ?? 'Gagal mendapatkan balasan dari AI.';
        echo json_encode(['error' => $errMsg]);
    }
}
curl_close($ch);
?>