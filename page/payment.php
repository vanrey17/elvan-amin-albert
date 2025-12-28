<?php
$BASE_URL = "/elvan-amin-albert";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran - Kantin Ascendia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f8fafc; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .payment-card { background: white; padding: 40px; border-radius: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); max-width: 450px; width: 90%; text-align: center; }
        .method-icon { font-size: 50px; color: #0046ad; margin-bottom: 20px; }
        .amount { font-size: 2rem; font-weight: 800; color: #1e293b; margin: 10px 0; }
        .va-number { background: #f1f5f9; padding: 15px; border-radius: 12px; font-family: monospace; font-size: 1.2rem; letter-spacing: 2px; margin: 20px 0; border: 1px dashed #cbd5e1; position: relative; }
        .btn-done { background: #2ecc71; color: white; border: none; padding: 15px 30px; border-radius: 12px; font-weight: bold; cursor: pointer; width: 100%; font-size: 1rem; }
    </style>
</head>
<body>

<div class="payment-card">
    <div id="iconArea" class="method-icon"><i class="fas fa-university"></i></div>
    <h2 style="margin:0;">Instruksi Pembayaran</h2>
    <p style="color: #64748b;" id="methodText">Transfer Virtual Account</p>
    
    <div class="amount" id="displayTotal">Rp 0</div>
    
    <div class="va-number" id="vaNumber">
        8801234567890123
        <i class="fas fa-copy" style="position:absolute; right:15px; cursor:pointer; font-size:0.9rem; color:#94a3b8;"></i>
    </div>

    <ul style="text-align: left; color: #64748b; font-size: 0.9rem; margin-bottom: 30px;">
        <li>Buka aplikasi m-banking atau e-wallet Anda</li>
        <li>Pilih menu Transfer / Pembayaran VA</li>
        <li>Masukkan nomor di atas</li>
        <li>Pastikan nominal sesuai dengan total</li>
    </ul>

    <button class="btn-done" onclick="finishOrder()">Saya Sudah Bayar</button>
</div>

<script>
    // Ambil data dari localStorage
    const method = localStorage.getItem('selected_method') || 'COD';
    const total = localStorage.getItem('final_total') || 0;
    
    document.getElementById('displayTotal').innerText = `Rp ${parseInt(total).toLocaleString('id-ID')}`;
    document.getElementById('methodText').innerText = `Pembayaran via ${method}`;

    // Simulasi Nomor VA unik berdasarkan timestamp
    if(method === 'COD') {
        document.getElementById('vaNumber').innerText = "BAYAR TUNAI SAAT TIBA";
        document.getElementById('iconArea').innerHTML = '<i class="fas fa-hand-holding-dollar"></i>';
    } else {
        const randomVA = "88" + Date.now().toString().slice(-10);
        document.getElementById('vaNumber').innerText = randomVA;
    }

    function finishOrder() {
        alert("Terima kasih! Pesanan Anda sedang diproses oleh kantin.");
        localStorage.clear();
        window.location.href = "<?= $BASE_URL ?>/layanansiswa/kantin";
    }
</script>

</body>
</html>