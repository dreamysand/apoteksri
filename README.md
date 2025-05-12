<h1 align="center">💊 Apotek Sri - Sistem Informasi Apotek</h1>
<p align="center">
  <img src="https://img.shields.io/badge/PHP-Native-blue?logo=php" />
  <img src="https://img.shields.io/badge/TailwindCSS-UI-green?logo=tailwindcss" />
  <img src="https://img.shields.io/badge/DomPDF-Struk%20PDF-orange" />
  <img src="https://img.shields.io/badge/Role-Admin%20%26%20User-lightgrey" />
</p>

<p align="center">
  💼 Sistem web berbasis <strong>PHP Native</strong> untuk mengelola apotek. Pengguna dapat mengirim resep, admin memproses resep dan transaksi melalui sistem kasir, serta mencetak struk pembelian dalam format PDF. Dibangun dengan <strong>Tailwind CSS</strong> dan <strong>DomPDF</strong>.
</p>

---

## 🚀 Fitur Utama

- 📦 **Manajemen Obat**  
  Tambah, ubah, dan hapus data obat yang tersedia di apotek.

- 👥 **Manajemen Anggota**  
  Pengguna bisa mendaftar dan login untuk melakukan pembelian atau upload resep.

- 📤 **Upload Resep (User)**  
  Pengguna dapat mengunggah resep berbentuk gambar atau PDF.

- ✅ **Konfirmasi Resep (Admin)**  
  Resep harus dikonfirmasi oleh admin untuk bisa diproses ke transaksi.

- 💰 **Sistem Kasir Pop-up**  
  Kasir muncul tanpa reload halaman setelah klik "Terima", langsung menghitung dan menampilkan transaksi.

- 🧾 **Cetak Struk PDF**  
  Setelah transaksi berhasil, sistem secara otomatis membuat file PDF struk menggunakan DomPDF.

- 🧾 **Riwayat Transaksi**  
  Menampilkan daftar transaksi seperti tampilan Tokopedia, lengkap dengan detail, gambar obat, dan tombol cetak struk.

---

## 🛠 Teknologi yang Digunakan

- PHP Native
- Tailwind CSS
- JavaScript (AJAX + DOM)
- MySQL
- DomPDF

---

## ⚙️ Instalasi

### 1. Clone Repositori

```bash
git clone https://github.com/dreamysand/apoteksri.git
cd apoteksri
