# Sistem Perpustakaan Digital Kampus

Aplikasi web manajemen perpustakaan berbasis **Laravel 12** yang dirancang untuk mengelola pendataan buku, kategori, anggota, transaksi peminjaman & pengembalian buku, REST API, serta penyajian statistik dan laporan menggunakan pola konsumsi API internal.

---

## Fitur Utama

- **Autentikasi & Otorisasi Berbasis Peran:** Role `admin` dan `petugas` dengan middleware proteksi rute.
- **Manajemen Kategori & Buku (CRUD):** Relasi `hasMany` / `belongsTo`, pencegahan N+1 query problem melalui eager loading.
- **Manajemen Anggota:** Validasi ketat (NIM unik, format email kampus `@pens.ac.id`).
- **Transaksi Peminjaman & Pengembalian:** Mendukung multi-buku per transaksi (`loan_items`), pencatatan petugas otomatis, penandaan status pengembalian.
- **Dashboard Statistik & Laporan Peminjaman:** Mengonsumsi REST API internal (`GET /api/stats` dan `GET /api/loans`) via Laravel HTTP Client dengan proteksi fallback `ConnectionException`.
- **REST API Lengkap:** Endpoint JSON berstandar RESTful (`/api/books`, `/api/members`, `/api/loans`, `/api/stats`) dengan API Resource.
- **Seeder & Factory Realistis:** Data dummy kurasi bernuansa Indonesia (`id_ID`) untuk kemudahan pengujian dan demo.
- **Custom Clean Pagination:** Tampilan pagination ringan tanpa dependensi Tailwind CSS.

---

## Panduan Instalasi & Menjalankan Project

### 1. Clone Repository
```bash
git clone https://github.com/<username>/app-perpustakaan.git
cd app-perpustakaan
```

### 2. Install Dependensi PHP
```bash
composer install
```

### 3. Konfigurasi Environment (`.env`)
Salin file `.env.example` ke `.env`:
```bash
cp .env.example .env
```
*(Di Windows PowerShell: `copy .env.example .env`)*

Buka file `.env` dan pastikan konfigurasi database dan API internal sudah sesuai:
```env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

# URL instance server kedua khusus internal API call
INTERNAL_API_URL=http://127.0.0.1:8011

# Locale faker Indonesia untuk seeding
APP_FAKER_LOCALE=id_ID

# Konfigurasi Database MySQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=app_perpustakaan
DB_USERNAME=root
DB_PASSWORD=
```

Generate application key:
```bash
php artisan key:generate
```

### 4. Migrasi & Seeding Database
Jalankan migrasi seluruh tabel sekaligus pengisian data dummy awal:
```bash
php artisan migrate:fresh --seed
```

Data default yang tersedia setelah seeding:
- **Admin:** `admin@pens.ac.id` | Password: `password` (Nama: Bambang Sutrisno)
- **Petugas 1:** `petugas1@pens.ac.id` | Password: `password` (Nama: Siti Rahmawati)
- **Petugas 2:** `petugas2@pens.ac.id` | Password: `password` (Nama: Ahmad Fauzi)
- **5 Kategori:** Novel, Komik, Sains, Teknologi, Sejarah
- **20 Buku** dengan judul dan penerbit kurasi Indonesia
- **15 Anggota** dengan email domain `@pens.ac.id`
- **10 Transaksi Peminjaman** riil

---

## Menjalankan Server Aplikasi (PENTING: 2 Server Berbeda Port)

Server bawaan PHP (`php artisan serve`) hanya memproses satu request dalam satu waktu (single-threaded). Karena controller `Dashboard` dan `Laporan` memanggil API internal aplikasi sendiri via HTTP Client, aplikasi **membutuhkan dua instance server** yang berjalan berdampingan pada port berbeda untuk menghindari deadlock.

Buka **dua terminal terpisah**:

### Terminal 1: Server Utama (Akses Browser & Klien Eksternal)
```bash
php artisan serve --port=8000
```
Akses aplikasi melalui browser: [http://127.0.0.1:8000](http://127.0.0.1:8000)

### Terminal 2: Server Khusus API Internal
```bash
php artisan serve --port=8011
```
Server ini menangani request `Http::get()` dari dalam aplikasi menuju endpoint `/api/...`.

> **Catatan:** Jika server pada port 8011 tidak berjalan, fitur Dashboard dan Laporan tetap dapat diakses dengan aman tanpa crash (error 500) berkat penanganan fallback `try/catch (ConnectionException $e)`.

---

## Dokumentasi API & Skenario Demo

- **Dokumentasi REST API Lengkap:** Silakan baca file [`api.md`](./api.md)
- **Skenario Pengujian & Demo UAS:** Silakan baca file [`DEMO.md`](./DEMO.md)
