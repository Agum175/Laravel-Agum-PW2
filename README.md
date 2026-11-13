Sistem Manajemen Produk - Laravel (Pemrograman Web 2)

Author: Agum Shutriansyah

Proyek ini merupakan aplikasi sederhana berbasis Laravel yang dikembangkan untuk memenuhi tugas mata kuliah Pemrograman Web 2. Sesuai dengan namanya, aplikasi ini berfokus pada pengelolaan data produk. Meskipun terbilang sederhana, proyek ini menjadi wadah latihan yang baik untuk mengimplementasikan beberapa fitur penting dalam pengembangan web, seperti manipulasi form menggunakan modal, validasi data, penggunaan Eloquent ORM, hingga penyesuaian format mata uang pada antarmuka.

# Fitur Utama

Berikut adalah beberapa fitur yang sudah berjalan di dalam aplikasi ini:

- Form Modal Interaktif: Menambahkan produk baru dapat dilakukan tanpa harus me-reload halaman. Antarmuka modal didesain menggunakan Tailwind CSS agar tampilannya lebih rapi dan modern.
- Validasi Input Data: Sistem memastikan data yang masuk valid. Kolom tertentu wajib diisi, dan khusus untuk harga serta stok, input diwajibkan berupa angka. Jika terjadi kesalahan input, pesan error akan muncul secara otomatis.
- Eloquent ORM & Migrations: Pengelolaan data ke dalam database menggunakan fitur Eloquent dari Laravel, sementara struktur tabelnya dibuat dan dikelola melalui migration agar lebih terstruktur.
- Format Rupiah Otomatis: Tampilan harga pada tabel daftar produk sudah diformat secara otomatis menjadi format mata uang Rupiah (contoh: Rp 150.000) tanpa perlu pengetikan manual.

# Struktur File Penting

Jika ingin melakukan modifikasi atau mempelajari alur kodenya, berikut adalah file-file inti yang perlu diperhatikan:

- Controller: app/Http/Controllers/ProductController.php
- Model: app/Models/Product.php
- Migration: database/migrations/..._create_products_table.php
- Routing: routes/web.php
- Tampilan (View): resources/views/products/index.blade.php

# Panduan Instalasi & Menjalankan Proyek

Untuk menjalankan proyek ini di lingkungan lokal, silakan ikuti langkah-langkah berikut:

1. Clone Repositori
bash
git clone https://github.com/Agum175/Laravel-Agum-PW2
cd Laravel_Project_Ilham


2. Install Dependensi
Jalankan perintah berikut untuk mengunduh semua library yang dibutuhkan (PHP dan Node.js):
bash
composer install
npm install


3. Konfigurasi Environment
Salin file konfigurasi bawaan dan buat application key baru:
bash
cp .env.example .env
php artisan key:generate


4. Pengaturan Database
Buat database baru di MySQL (misalnya dengan nama laravel_product), lalu sesuaikan konfigurasinya pada file .env:
env
DB_DATABASE=laravel_product
DB_USERNAME=root
DB_PASSWORD=

(Pastikan pengaturan di atas sesuai dengan konfigurasi MySQL di komputer Anda).

5. Migrasi Database
Jalankan perintah ini untuk membuat struktur tabel secara otomatis:
bash
php artisan migrate


6. Kompilasi Asset Frontend
Jalankan perintah berikut dan biarkan terminal ini tetap berjalan selama proses development:
bash
npm run dev


7. Jalankan Server Lokal
Buka terminal baru, lalu jalankan server Laravel:
bash
php artisan serve


8. Akses Aplikasi
Buka browser dan akses alamat berikut: http://127.0.0.1:8000/products
