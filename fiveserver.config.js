// fiveserver.config.js
module.exports = {
  // Properti untuk Live Reload (opsional, tapi disarankan)
  highlight: true, 
  injectBody: true,
  
  // *** PENTING: Atur path PHP di sini ***
  
  // Contoh untuk macOS atau Ubuntu/Linux
  // Gunakan satu dari dua baris 'php' di bawah ini, 
  // sesuaikan dengan sistem operasi Anda dan path yang ditemukan
  
  // php: "/usr/bin/php", 
  
  // Contoh untuk Windows (jika menggunakan XAMPP)
  // Perhatikan penggunaan dua backslash ganda (\\)
  php: "C:\\xampp\\php\\php.exe" 
  
  // Anda bisa menambahkan properti lain di sini, seperti:
  // root: "nama_subfolder_proyek_anda",
  // open: "index.php"
};