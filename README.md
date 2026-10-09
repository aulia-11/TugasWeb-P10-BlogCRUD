# Tugas Web P10 — Blog CRUD Laravel

## Deskripsi

Project ini merupakan aplikasi blog sederhana berbasis Laravel untuk mengelola postingan. Aplikasi menyediakan fitur tambah, lihat, edit, dan hapus postingan, serta fitur tambahan untuk memudahkan pengelolaan data.

## Teknologi

* PHP
* Laravel 12
* MySQL
* Blade Template
* HTML dan CSS

## Fitur

* Menampilkan daftar postingan
* Menambahkan postingan baru
* Melihat detail postingan
* Mengedit postingan
* Menghapus postingan menggunakan soft delete
* Validasi input dan menampilkan pesan kesalahan
* Pesan notifikasi setelah operasi berhasil
* Pencarian berdasarkan judul atau isi postingan
* Pagination untuk daftar postingan
* Upload dan penggantian gambar postingan
* Blade Layout dan Blade Components (Alert dan Card)
* Perlindungan form menggunakan CSRF

## Struktur Utama

* `app/Http/Controllers/` — Controller aplikasi
* `app/Models/` — Model database
* `app/View/Components/` — Class Blade Components
* `database/migrations/` — Struktur tabel database
* `resources/views/` — Tampilan aplikasi
* `routes/web.php` — Definisi route aplikasi

## Cara Menjalankan Project

1. Clone repository:

   ```bash
   git clone https://github.com/aulia-11/TugasWeb-P10-BlogCRUD.git
   ```

2. Masuk ke folder project:

   ```bash
   cd TugasWeb-P10-BlogCRUD
   ```

3. Install dependency PHP:

   ```bash
   composer install
   ```

4. Salin file konfigurasi:

   ```bash
   copy .env.example .env
   ```

5. Buat database MySQL bernama `blog_crud`, lalu sesuaikan konfigurasi database pada file `.env`.

6. Buat application key:

   ```bash
   php artisan key:generate
   ```

7. Jalankan migration:

   ```bash
   php artisan migrate
   ```

8. Buat symbolic link untuk penyimpanan gambar:

   ```bash
   php artisan storage:link
   ```

9. Jalankan server Laravel:

   ```bash
   php artisan serve
   ```

10. Buka alamat berikut di browser:
    `http://127.0.0.1:8000`

## Repository

https://github.com/aulia-11/TugasWeb-P10-BlogCRUD

## Catatan

File `.env` tidak disertakan dalam repository. Konfigurasi database perlu disesuaikan pada masing-masing komputer sebelum aplikasi dijalankan.