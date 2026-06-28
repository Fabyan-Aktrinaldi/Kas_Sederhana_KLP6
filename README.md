# 💰 Sistem Kas Sederhana

Aplikasi web sederhana untuk mencatat pemasukan dan pengeluaran kas, dibangun dengan PHP + MySQL dan dijalankan menggunakan Docker.

> 📦 Project Base Learning — Mata Kuliah Teknologi Kontainer  
> Universitas Halu Oleo

---

## 🖥️ Tampilan Aplikasi

| Halaman | Deskripsi |
|---|---|
| Dashboard | Ringkasan total pemasukan, pengeluaran, dan saldo |
| Transaksi | Tabel semua transaksi dengan fitur edit & hapus |
| Tambah | Form input transaksi baru |
| Edit | Form ubah data transaksi |

---

## 🛠️ Teknologi

| Layer | Teknologi |
|---|---|
| Frontend / Backend | HTML + PHP 8.2 |
| Database | MySQL 8.0 |
| Web Server | Apache |
| Containerisasi | Docker + Docker Compose |
| Icons | Tabler Icons (CDN) |

---

## 📁 Struktur Project

```
kas-sederhana/
├── Dockerfile
├── docker-compose.yml
├── README.md
├── db/
│   └── init.sql              # Inisialisasi database & tabel
└── src/
    ├── assets/
    │   └── style.css         # Global CSS
    ├── config/
    │   └── koneksi.php       # Konfigurasi koneksi database
    ├── includes/
    │   ├── sidebar.php       # Komponen sidebar
    │   ├── topbar.php        # Komponen topbar
    │   └── scripts.php       # JavaScript hamburger menu
    ├── index.php             # Halaman awal & cek koneksi
    ├── dashboard.php         # Dashboard ringkasan kas
    ├── transaksi.php         # Daftar semua transaksi
    ├── tambah.php            # Form tambah transaksi
    ├── edit.php              # Form edit transaksi
    └── hapus.php             # Proses hapus transaksi
```

---

## 🚀 Cara Menjalankan

### Prasyarat
- [Docker Desktop](https://www.docker.com/products/docker-desktop/) sudah terinstall dan berjalan

### Langkah-langkah

**1. Clone repository**
```bash
git clone https://github.com/Fabyan-Aktrinaldi/Kas_Sederhana_KLP6.git
cd kas-sederhana
```

**2. Jalankan Docker**
```bash
docker compose up --build
```

**3. Buka di browser**
```
http://localhost:8080
```

**4. Matikan container**
```bash
docker compose down
```

> Untuk menghapus data database juga:
> ```bash
> docker compose down -v
> ```

---

## ⚙️ Konfigurasi Database

Konfigurasi koneksi ada di `src/config/koneksi.php`:

```php
$host = "db";       // nama service di docker-compose
$user = "root";
$pass = "root";
$db   = "kas_db";
```

Database dan tabel dibuat otomatis saat container pertama kali dijalankan melalui `db/init.sql`.

---

## ✨ Fitur

- ✅ Dashboard ringkasan kas (pemasukan, pengeluaran, saldo)
- ✅ Tampil semua transaksi
- ✅ Tambah transaksi baru
- ✅ Edit transaksi
- ✅ Hapus transaksi
- ✅ Sidebar navigasi dengan hamburger menu
- ✅ Prepared statements (aman dari SQL Injection)
- ✅ Output escaping (aman dari XSS)

---

## 👥 Anggota Kelompok

| No | Nama | NIM |
|---|---|---|
| 1 | Aksar Febryanto | F1G124058 |
| 2 | Dina Safitri | F1G124006 |
| 3 | Fabyan Aktrinaldi | F1G124029 |
| 4 | Kaltsum A. Mahbubah | F1G124011 |

---

## 📄 Lisensi

Project ini dibuat untuk keperluan tugas akademik.  
Universitas Halu Oleo — 2026
