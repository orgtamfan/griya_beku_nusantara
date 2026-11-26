# PT Griya Beku Nusantara

Website company profile dan katalog digital frozen food berbasis Laravel. Pengunjung dapat melihat profil, katalog, detail produk, serta menghubungi admin melalui WhatsApp. Pengelolaan produk dilakukan melalui panel admin yang dilindungi login.

## Fitur

- Beranda dengan profil usaha, komitmen higienitas dan blast freezing, area layanan, serta produk unggulan.
- Katalog produk dinamis dengan filter kategori dan halaman detail.
- Login dan logout admin; semua halaman CRUD produk memerlukan autentikasi.
- CRUD produk dan kategori terkait, termasuk unggah foto, validasi server-side, dan penghapusan foto saat produk dihapus atau fotonya diganti.
- Seeder kategori, produk contoh, dan akun admin.
- Tampilan responsif menggunakan Blade dan Tailwind CSS.

## Menjalankan aplikasi

Persyaratan: PHP sesuai `composer.json`, Composer, serta MySQL/MariaDB atau SQLite.

```bash
composer install
cp .env.example .env
php artisan key:generate
```

Atur koneksi database pada `.env`, lalu jalankan:

```bash
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

Buka `http://127.0.0.1:8000`. Perintah `migrate:fresh` menghapus seluruh tabel dan data yang sudah ada sebelum migrasi ulang.

## Login admin

Halaman login tersedia di `/admin/login`. Rute `/admin/products` dan seluruh rute CRUD di bawahnya akan mengarahkan pengunjung yang belum login ke halaman login.

Akun awal setelah menjalankan seeder:

```text
Email    : admin@griyabekunusantara.test
Password : password
```

Kata sandi tersebut hanya untuk penggunaan lokal. Ganti kredensial awal sebelum aplikasi dipakai atau dipublikasikan. Akun ini dibuat oleh `DatabaseSeeder`; menjalankan seeder ulang akan menetapkan kata sandi awal kembali untuk email tersebut.

## Database

Contoh konfigurasi MySQL/MariaDB pada `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=griya_beku_nusantara
DB_USERNAME=root
DB_PASSWORD=
```

Buat database terlebih dahulu. SQLite juga dapat digunakan dengan mengatur `DB_CONNECTION=sqlite` dan membuat berkas `database/database.sqlite` sebelum migrasi.

Tabel `products` memiliki relasi many-to-one ke `categories`. Foto produk disimpan pada disk `public` di `storage/app/public/products`, dan dapat diakses setelah membuat symlink dengan `php artisan storage:link`.

## Rute utama

| Method | URL | Keterangan |
| :--- | :--- | :--- |
| GET | `/` | Beranda publik |
| GET | `/produk` | Katalog dan filter kategori |
| GET | `/produk/{product}` | Detail produk dan tautan WhatsApp |
| GET | `/admin/login` | Form login admin |
| POST | `/admin/login` | Proses login |
| POST | `/admin/logout` | Logout admin |
| GET/POST/PUT/DELETE | `/admin/products/...` | Panel CRUD produk (perlu login) |

Nomor WhatsApp dapat diatur melalui `ADMIN_WHATSAPP_NUMBER` pada `.env`.
