module.exports = {
  php: "C:/xampp/php/php.exe", // Gunakan / agar tidak error di Windows
  host: "0.0.0.0",            // Supaya bisa dibuka di Android
  root: ".",
  open: "index.php",
  
  // Aturan ini memaksa semua alamat masuk ke index.php
  router: {
    base: "/elvan-amin-albert",
    index: "index.php"
  },
  
  injectBody: true,
  navigate: false,
  wait: 1000 // Tunggu 1 detik sebelum reload
};