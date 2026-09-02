# App Perpustakaan

**Tujuan Aplikasi:**  
Aplikasi ini dirancang untuk memudahkan manajemen peminjaman, pengembalian, dan pendataan buku di perpustakaan secara efisien.

## Cara Menjalankan Project Secara Lokal
1. Clone repository ini: `git clone <url-repo-github>`
2. Masuk ke direktori project: `cd app-perpustakaan`
3. Install dependencies (jika ada, misal: `npm install` atau `composer install`)
4. Jalankan local server (misal: `npm start` atau `php spark serve`)
5. Buka `http://localhost:8080` di browser Anda.

Konsep MVC:
Model bertugas menangani struktur data, logika bisnis, dan interaksi langsung dengan database. View adalah antarmuka visual (UI) yang dirender ke layar sehingga pengguna dapat melihat dan berinteraksi dengan aplikasi. Sedangkan Controller bertindak sebagai penghubung utama yang menerima request dari pengguna melalui View, memproses data tersebut menggunakan Model, dan mengembalikan hasil akhirnya kembali ke View.