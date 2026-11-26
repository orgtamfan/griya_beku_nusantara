<div align="center">
  <img src="public/images/logo.png" alt="Logo rumah PT Griya Beku Nusantara" width="180">
  <h1>PT Griya Beku Nusantara</h1>
  <p><strong>Frozen food rumahan, rasa khas Nusantara.</strong></p>
  <p>Website company profile dan katalog digital berbasis Laravel</p>
</div>

---

## Tentang Proyek

Website untuk mengenalkan PT Griya Beku Nusantara dan menampilkan katalog frozen food secara dinamis. Pengunjung dapat melihat informasi produk dan menghubungi admin melalui WhatsApp. Admin dapat mengelola produk melalui panel yang dilindungi login.

## Fitur

| Area | Fitur |
| --- | --- |
| **Beranda** | Profil usaha, komitmen higienitas, proses blast freezing, area layanan, dan produk unggulan |
| **Katalog** | Daftar produk dari database, filter kategori, harga, berat, dan detail produk |
| **Pemesanan** | Tautan WhatsApp pada halaman detail produk |
| **Panel admin** | Login, logout, serta CRUD produk |
| **Foto produk** | Unggah dan validasi gambar; file lama dibersihkan saat foto diganti atau produk dihapus |
| **Data awal** | Seeder untuk kategori, enam produk contoh, dan akun admin |
| **Tampilan** | Blade dan Tailwind CSS dengan layout responsif |

## Teknologi

- PHP dan Laravel (versi mengikuti `composer.json`)
- Blade dan Tailwind CSS
- MySQL/MariaDB atau SQLite
- Eloquent ORM dengan relasi kategori dan produk
- Laravel Storage untuk gambar produk

## Menjalankan Aplikasi

### Persyaratan

PHP sesuai `composer.json`, Composer, dan MySQL/MariaDB atau SQLite.

### Instalasi

Dari terminal di folder proyek:

```bash
composer install
```

Jika belum memiliki `.env`, salin dari berkas contoh, lalu buat application key:

```bash
cp .env.example .env
php artisan key:generate
```

Di Windows PowerShell, gunakan `Copy-Item .env.example .env` sebagai pengganti perintah `cp`.

Atur koneksi database di `.env`, kemudian siapkan database dan jalankan aplikasi:

```bash
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

Buka `http://127.0.0.1:8000` di browser. **Perhatian:** `migrate:fresh` menghapus tabel dan data lama sebelum membuat ulang database.

## Login Admin

Buka `http://127.0.0.1:8000/admin/login`.

Akun awal yang dibuat oleh seeder:

```text
Email       admin@griyabekunusantara.test
Kata sandi  password
```

Kredensial ini untuk penggunaan lokal. Ganti sebelum aplikasi dipublikasikan. Menjalankan seeder kembali akan mengatur ulang kata sandi akun tersebut.

## Database dan Penyimpanan Gambar

Tabel `products` berelasi ke `categories` melalui `category_id`. Contoh konfigurasi MySQL/MariaDB:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=griya_beku_nusantara
DB_USERNAME=root
DB_PASSWORD=
```

Buat database `griya_beku_nusantara` terlebih dahulu. Untuk SQLite, atur `DB_CONNECTION=sqlite` dan siapkan `database/database.sqlite` sebelum menjalankan migrasi.

Foto produk disimpan pada `storage/app/public/products`. Jalankan `php artisan storage:link` agar file dapat ditampilkan oleh aplikasi.

## Rute Utama

| Method | URL | Keterangan |
| --- | --- | --- |
| `GET` | `/` | Beranda |
| `GET` | `/produk` | Katalog dan filter kategori |
| `GET` | `/produk/{product}` | Detail produk dan tautan WhatsApp |
| `GET` | `/admin/login` | Form login admin |
| `POST` | `/admin/login` | Proses login |
| `POST` | `/admin/logout` | Logout |
| `GET/POST/PUT/DELETE` | `/admin/products/...` | CRUD produk, perlu login |

Nomor WhatsApp admin dapat diatur melalui `ADMIN_WHATSAPP_NUMBER` pada `.env`.

## Struktur Direktori

```text
app/Http/Controllers/       Controller halaman publik, login, dan admin
app/Http/Requests/          Validasi form produk
app/Models/                 Model Category, Product, dan User
database/migrations/        Struktur tabel dan relasi
database/seeders/           Kategori, produk, dan akun awal
public/images/logo.png      Logo rumah Griya Beku Nusantara
resources/views/            Halaman Blade
routes/web.php              Rute aplikasi
```