<?php
if (!isset($BASE)) $BASE = '';
if (!isset($image_path)) $image_path = $BASE . '/image';

$kantin_data = [
    'bu-inah' => [
        "nama" => "Warung Bu Inah",
        "tagline" => "Spesialis Nasi & Masakan Berat",
        "icon" => "fa-bowl-rice",
        "menu" => [
            ["id" => 1, "nama" => "Nasi Rames Komplit", "harga" => 15000, "desc" => "Lauk lengkap, porsi mengenyangkan.", "img" => "nasi_rames.jpg"],
            ["id" => 2, "nama" => "Nasi Ayam Bakar Madu", "harga" => 18000, "desc" => "Ayam empuk bumbu madu rempah.", "img" => "ayam_bakar.jpg"],
            ["id" => 3, "nama" => "Soto Ayam Bening", "harga" => 10000, "desc" => "Kuah segar, tanpa santan.", "img" => "soto.jpg"]
        ]
    ],
    'pak-budi' => [
        "nama" => "Snack Pak Budi",
        "tagline" => "Camilan Sehat & Makanan Ringan",
        "icon" => "fa-cookie",
        "menu" => [
            ["id" => 4, "nama" => "Jasuke", "harga" => 7000, "desc" => "Jagung manis, susu, dan keju melimpah.", "img" => "jasuke.jpg"],
            ["id" => 5, "nama" => "Roti Bakar Gandum", "harga" => 10000, "desc" => "Gandum utuh dengan selai kacang.", "img" => "roti_bakar.jpg"]
        ]
    ]
];
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; background-color: #f4f7f6; }
    .kantin-hero { background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('<?= $image_path ?>/kantin_bg.jpg') #27ae60; background-size: cover; background-position: center; height: 180px; display: flex; flex-direction: column; justify-content: center; align-items: center; color: white; border-radius: 0 0 50px 50px; text-align: center; }
    .kantin-tabs { display: flex; justify-content: center; gap: 12px; margin: -30px 0 30px; z-index: 10; flex-wrap: wrap; }
    .tab-btn { background: white; border: none; padding: 12px 25px; border-radius: 50px; font-weight: 600; cursor: pointer; display: flex; align-items: center; gap: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: 0.3s; }
    .tab-btn.active { background: #0046ad; color: white; }
    .outlet-content { display: none; }
    .outlet-content.active { display: block; animation: fadeIn 0.5s; }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    
    .menu-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; max-width: 1100px; margin: 0 auto; padding: 0 20px 100px; }
    .menu-card { background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border: 1px solid #eee; transition: 0.3s; }
    .menu-card:hover { transform: translateY(-5px); }
    .menu-img { width: 100%; height: 180px; object-fit: cover; }
    .menu-content { padding: 15px; }
    .btn-add { width: 100%; background: #27ae60; color: white; border: none; padding: 10px; border-radius: 10px; cursor: pointer; font-weight: bold; transition: 0.2s; }
    .btn-add:hover { background: #219150; }
    
    /* Floating Cart */
    .floating-cart { position: fixed; bottom: 85px; right: 20px; width: 320px; background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); z-index: 1000; display: none; overflow: hidden; }
    .cart-header { background: #0046ad; color: white; padding: 15px; display: flex; justify-content: space-between; align-items: center; }
    .cart-body { max-height: 250px; overflow-y: auto; padding: 15px; }
    .cart-item { display: flex; justify-content: space-between; margin-bottom: 10px; font-size: 0.85rem; border-bottom: 1px solid #eee; padding-bottom: 5px; }
    .cart-toggle { position: fixed; bottom: 20px; right: 20px; background: #0046ad; color: white; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; cursor: pointer; box-shadow: 0 5px 15px rgba(0,0,0,0.3); z-index: 999; }
    .cart-badge { background: #ff3b30; color: white; padding: 2px 8px; border-radius: 20px; font-size: 0.7rem; position: absolute; top: 0; right: 0; }
    .btn-confirm { width: 100%; background: #0046ad; color: white; border: none; padding: 12px; border-radius: 12px; font-weight: bold; cursor: pointer; font-size: 1rem; }
</style>

<div class="kantin-hero">
    <h1>Kantin Sehat Ascendia</h1>
    <p>Pesan Praktis, Makan Nikmat!</p>
</div>

<div class="kantin-tabs">
    <?php $first = true; foreach ($kantin_data as $id => $val): ?>
        <button class="tab-btn <?= $first ? 'active' : '' ?>" onclick="openOutlet(event, '<?= $id ?>')">
            <i class="fas <?= $val['icon'] ?>"></i> <?= $val['nama'] ?>
        </button>
    <?php $first = false; endforeach; ?>
</div>

<div id="outlet-container">
    <?php $first = true; foreach ($kantin_data as $id => $current): ?>
        <div id="<?= $id ?>" class="outlet-content <?= $first ? 'active' : '' ?>">
            <div class="menu-grid">
                <?php foreach ($current['menu'] as $item): ?>
                    <div class="menu-card">
                        <img src="<?= $image_path ?>/<?= $item['img'] ?>" class="menu-img" onerror="this.src='https://via.placeholder.com/280x180?text=No+Image'">
                        <div class="menu-content">
                            <h3 style="margin:0; font-size: 1.1rem;"><?= $item['nama'] ?></h3>
                            <p style="font-size: 0.8rem; color: #777; margin: 5px 0;"><?= $item['desc'] ?></p>
                            <span style="color:#27ae60; font-weight:800; display:block; margin: 5px 0;">Rp <?= number_format($item['harga'],0,',','.') ?></span>
                            <button class="btn-add" onclick="addToCart('<?= $item['nama'] ?>', <?= $item['harga'] ?>)">
                                <i class="fas fa-plus"></i> Tambah
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php $first = false; endforeach; ?>
</div>

<div class="cart-toggle" onclick="toggleCart()">
    <i class="fas fa-shopping-basket"></i>
    <span id="cartCount" class="cart-badge" style="display:none;">0</span>
</div>

<div id="mainCart" class="floating-cart">
    <div class="cart-header">
        <span><i class="fas fa-shopping-cart"></i> Keranjang</span>
        <i class="fas fa-times" onclick="toggleCart()" style="cursor:pointer;"></i>
    </div>
    <div id="cartBody" class="cart-body"></div>
    <div style="padding: 15px; border-top: 1px solid #eee;">
        <div style="display:flex; justify-content:space-between; font-weight:bold; margin-bottom: 10px;">
            <span>Total:</span>
            <span id="totalPrice">Rp 0</span>
        </div>
        <button onclick="goToCheckout()" class="btn-confirm">Checkout Sekarang</button>
    </div>
</div>

<script>
let cart = [];

// Fungsi ganti tab outlet
function openOutlet(evt, outletId) {
    document.querySelectorAll(".outlet-content").forEach(c => c.classList.remove("active"));
    document.querySelectorAll(".tab-btn").forEach(t => t.classList.remove("active"));
    document.getElementById(outletId).classList.add("active");
    evt.currentTarget.classList.add("active");
}

// Buka/Tutup Keranjang
function toggleCart() {
    const cartEl = document.getElementById('mainCart');
    cartEl.style.display = (cartEl.style.display === 'block') ? 'none' : 'block';
}

// Tambah ke keranjang
function addToCart(name, price) {
    const existing = cart.find(item => item.name === name);
    if (existing) {
        existing.qty++;
    } else {
        cart.push({ name: name, price: price, qty: 1 });
    }
    updateUI();
}

// Update tampilan keranjang dan badge
function updateUI() {
    const body = document.getElementById('cartBody');
    const totalEl = document.getElementById('totalPrice');
    const countEl = document.getElementById('cartCount');
    
    if (cart.length === 0) {
        body.innerHTML = '<p style="text-align:center;color:#ccc;margin: 20px 0;">Keranjang Kosong</p>';
        totalEl.innerText = 'Rp 0';
        countEl.style.display = 'none';
        return;
    }

    let total = 0;
    let qtyTotal = 0;
    body.innerHTML = cart.map(item => {
        total += item.qty * item.price;
        qtyTotal += item.qty;
        return `
            <div class="cart-item">
                <span>${item.name} (x${item.qty})</span>
                <span>Rp ${(item.qty * item.price).toLocaleString('id-ID')}</span>
            </div>`;
    }).join('');
    
    totalEl.innerText = 'Rp ' + total.toLocaleString('id-ID');
    countEl.innerText = qtyTotal;
    countEl.style.display = 'block';
}

// Fungsi utama untuk pindah ke checkout.php
function goToCheckout() {
    if (cart.length === 0) {
        alert("Keranjang masih kosong!");
        return;
    }

    const total = cart.reduce((sum, item) => sum + (item.qty * item.price), 0);

    localStorage.setItem('kantin_cart', JSON.stringify(cart));
    localStorage.setItem('kantin_total', total);

    // Mengarahkan ke file fisik di dalam folder page
    // Asumsi project root Anda adalah /elvan-amin-albert/
    window.location.href = "/elvan-amin-albert/page/checkout.php";
}
</script>