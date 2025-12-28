<?php
if (!isset($BASE)) $BASE = '';
if (!isset($image_path)) $image_path = $BASE . '/image';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Kantin Ascendia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        :root {
            --primary-blue: #0046ad;
            --success-green: #2ecc71;
            --danger-red: #ff4757;
            --soft-bg: #f8fafc;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: var(--soft-bg);
            margin: 0; padding: 40px 20px;
            color: #1e293b;
        }

        .checkout-container {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 30px;
        }

        @media (max-width: 900px) {
            .checkout-container { grid-template-columns: 1fr; }
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 800;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--primary-blue);
        }

        /* Form Input Styles */
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 600; font-size: 0.9rem; }
        .form-control { 
            width: 100%; padding: 12px; border: 1px solid #e2e8f0; 
            border-radius: 12px; box-sizing: border-box; font-size: 1rem;
            transition: 0.3s;
        }
        .form-control:focus { outline: none; border-color: var(--primary-blue); box-shadow: 0 0 0 3px rgba(0,70,173,0.1); }

        /* Payment Methods */
        .payment-group { margin-bottom: 30px; }
        .payment-group-label {
            font-size: 0.8rem; font-weight: 700; color: #94a3b8;
            text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; display: block;
        }

        .payment-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; }
        .pay-card {
            border: 2px solid #f1f5f9; padding: 20px 10px; border-radius: 15px;
            text-align: center; cursor: pointer; transition: 0.3s; font-weight: 700; color: #64748b;
        }
        .pay-card:hover { border-color: var(--primary-blue); background: #f0f7ff; }
        .pay-card.active { border-color: var(--primary-blue); background: #f0f7ff; color: var(--primary-blue); box-shadow: 0 5px 15px rgba(0,70,173,0.1); }

        /* Order Summary */
        .summary-item {
            display: flex; justify-content: space-between; align-items: center;
            padding: 15px 0; border-bottom: 1px solid #f1f5f9;
        }
        .item-detail b { display: block; font-size: 1rem; }
        .item-detail span { font-size: 0.85rem; color: #94a3b8; }
        .item-price { font-weight: 700; }

        .total-price {
            display: flex; justify-content: space-between; margin-top: 20px;
            padding-top: 20px; border-top: 2px dashed #e2e8f0;
            font-size: 1.4rem; font-weight: 800; color: var(--primary-blue);
        }

        .btn-pay {
            width: 100%; background: var(--success-green); color: white; border: none;
            padding: 20px; border-radius: 20px; font-size: 1.1rem; font-weight: 800;
            cursor: pointer; margin-top: 10px; transition: 0.3s;
        }
        .btn-pay:hover { background: #27ae60; transform: translateY(-3px); box-shadow: 0 10px 20px rgba(46,204,113,0.3); }
    </style>
</head>
<body>

<div class="checkout-container">
    <div>
        <div class="card">
            <div class="section-title">
                <i class="fas fa-user"></i> Informasi Pengiriman
            </div>
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" id="custName" class="form-control" placeholder="Contoh: Budi Santoso">
            </div>
            <div class="form-group">
                <label>Kelas / Nomor Meja</label>
                <input type="text" id="custTable" class="form-control" placeholder="Contoh: XI RPL 1 / Meja 05">
            </div>
        </div>

        <div class="card">
            <div class="section-title">
                <i class="fas fa-credit-card"></i> Metode Pembayaran
            </div>

            <div class="payment-group">
                <span class="payment-group-label">E-Wallet</span>
                <div class="payment-grid">
                    <div class="pay-card" onclick="selectPay(this, 'OVO')">OVO</div>
                    <div class="pay-card" onclick="selectPay(this, 'GOPAY')">GOPAY</div>
                    <div class="pay-card" onclick="selectPay(this, 'DANA')">DANA</div>
                </div>
            </div>

            <div class="payment-group">
                <span class="payment-group-label">Bank</span>
                <div class="payment-grid">
                    <div class="pay-card" onclick="selectPay(this, 'BRI')">BRI</div>
                    <div class="pay-card" onclick="selectPay(this, 'BNI')">BNI</div>
                    <div class="pay-card" onclick="selectPay(this, 'BCA')">BCA</div>
                </div>
            </div>

            <div class="payment-group">
                <span class="payment-group-label">Lainnya</span>
                <div class="payment-grid">
                    <div class="pay-card active" onclick="selectPay(this, 'COD')">Tunai (COD)</div>
                    <div class="pay-card" onclick="selectPay(this, 'KantinPay')">KantinPay</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card" style="height: fit-content; position: sticky; top: 20px;">
        <div class="section-title">Ringkasan Pesanan</div>
        
        <div id="summaryList" class="summary-list">
            </div>

        <div style="margin-top: 20px;">
            <div style="display:flex; justify-content:space-between; color:#64748b; margin-bottom:8px;">
                <span>Subtotal</span>
                <span id="subtotalLabel">Rp 0</span>
            </div>
            <div style="display:flex; justify-content:space-between; color:#64748b; margin-bottom:8px;">
                <span>Biaya Antar</span>
                <span>Rp 2.000</span>
            </div>
            <div class="total-price">
                <span>Total</span>
                <span id="totalLabel">Rp 0</span>
            </div>
        </div>

        <button class="btn-pay" onclick="processFinalOrder()">Konfirmasi & Pesan</button>
        <button onclick="window.location.href='/elvan-amin-albert/layanansiswa/kantin'" 
        style="width:100%; background:none; border:none; color:#94a3b8; margin-top:15px; cursor:pointer; font-weight:600;">
            Kembali Belanja
        </button>
    </div>
</div>

<script>
    let selectedMethod = 'COD';
    const cart = JSON.parse(localStorage.getItem('kantin_cart')) || [];
    const totalBase = parseInt(localStorage.getItem('kantin_total')) || 0;
    const deliveryFee = 2000;

    function renderSummary() {
        const list = document.getElementById('summaryList');
        if(cart.length === 0) {
            list.innerHTML = "<p style='color:#94a3b8;'>Keranjang kosong.</p>";
            return;
        }

        list.innerHTML = cart.map(item => `
            <div class="summary-item">
                <div class="item-detail">
                    <b>${item.name}</b>
                    <span>${item.qty} x Rp ${item.price.toLocaleString('id-ID')}</span>
                </div>
                <div class="item-price">Rp ${(item.qty * item.price).toLocaleString('id-ID')}</div>
            </div>
        `).join('');

        document.getElementById('subtotalLabel').innerText = `Rp ${totalBase.toLocaleString('id-ID')}`;
        document.getElementById('totalLabel').innerText = `Rp ${(totalBase + deliveryFee).toLocaleString('id-ID')}`;
    }

    function selectPay(el, method) {
        document.querySelectorAll('.pay-card').forEach(c => c.classList.remove('active'));
        el.classList.add('active');
        selectedMethod = method;
    }

    function processFinalOrder() {
    const name = document.getElementById('custName').value.trim();
    const table = document.getElementById('custTable').value.trim();

    if (!name || !table) {
        alert("Mohon isi Nama dan Kelas/Meja pengiriman!");
        return;
    }

    if (cart.length === 0) return;
    
    const totalFinal = totalBase + deliveryFee;

    // Simpan data tambahan untuk halaman payment
    localStorage.setItem('order_name', name);
    localStorage.setItem('order_table', table);
    localStorage.setItem('selected_method', selectedMethod);
    localStorage.setItem('final_total', totalFinal);

    // Alihkan ke file fisik payment.php di folder yang sama (page)
    window.location.href = "payment.php";
    }

    renderSummary();
</script>

</body>
</html>