<div align="center">
  <img src="public/images/logo.png" alt="PT Griya Beku Nusantara logo" width="180">
  <h1>PT Griya Beku Nusantara</h1>
  <p><strong>Homemade frozen food with authentic Nusantara flavors.</strong></p>
  <p>Laravel-based company profile and digital catalog</p>
</div>

---

## About the Project

This website introduces PT Griya Beku Nusantara and displays its frozen food catalog dynamically. Visitors can view product information and contact the admin through WhatsApp. Administrators can manage products through a login-protected panel.

## Features

| Area | Features |
| --- | --- |
| **Home** | Business profile, hygiene commitment, blast-freezing process, service areas, and featured products |
| **Catalog** | Product list from the database, category filters, prices, weights, and product details |
| **Ordering** | WhatsApp links on product detail pages |
| **Admin panel** | Login, logout, and product CRUD operations |
| **Product photos** | Image upload and validation; old files are removed when photos are replaced or products are deleted |
| **Initial data** | Seeders for categories, six example products, and an admin account |
| **Interface** | Blade and Tailwind CSS with a responsive layout |

## Technology

- PHP and Laravel (versions are defined in `composer.json`)
- Blade and Tailwind CSS
- MySQL/MariaDB or SQLite
- Eloquent ORM with category and product relationships
- Laravel Storage for product images

## Running the Application

### Requirements

- PHP version specified in `composer.json`
- Composer
- Node.js and npm
- MySQL/MariaDB or SQLite

### Installation

Open a terminal in the project directory and install the PHP dependencies:

```bash
composer install
```

If `.env` does not exist, copy the example environment file and generate the application key:

```bash
cp .env.example .env
php artisan key:generate
```

On Windows PowerShell, use `Copy-Item .env.example .env` instead of `cp`.

Install the frontend dependencies and build the assets:

```bash
npm install
npm run build
```

Configure the database connection in `.env`, then initialize the database and start the application:

```bash
php artisan migrate:fresh --seed
php artisan storage:link
php artisan serve
```

Open `http://127.0.0.1:8000` in a browser.

**Warning:** `migrate:fresh` deletes existing tables and data before rebuilding the database.

## Admin Login

Open `http://127.0.0.1:8000/admin/login`.

The seeder creates the following account:

```text
Email       admin@griyabekunusantara.test
Password    password
```

These credentials are intended for local use. Change them before publishing the application. Running the seeder again resets this account's password.

## Database and Image Storage

The `products` table is related to `categories` through `category_id`. Example MySQL/MariaDB configuration:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=griya_beku_nusantara
DB_USERNAME=root
DB_PASSWORD=
```

Create the `griya_beku_nusantara` database first. For SQLite, set `DB_CONNECTION=sqlite` and create `database/database.sqlite` before running migrations.

Product photos are stored in `storage/app/public/products`. Run `php artisan storage:link` so the application can expose and display these files.

## Main Routes

| Method | URL | Description |
| --- | --- | --- |
| `GET` | `/` | Home page |
| `GET` | `/produk` | Catalog and category filter |
| `GET` | `/produk/{product}` | Product details and WhatsApp link |
| `GET` | `/admin/login` | Admin login form |
| `POST` | `/admin/login` | Process login |
| `POST` | `/admin/logout` | Log out |
| `GET/POST/PUT/DELETE` | `/admin/products/...` | Product CRUD; requires login |

The admin WhatsApp number can be configured through `ADMIN_WHATSAPP_NUMBER` in `.env`.

## Directory Structure

```text
app/Http/Controllers/       Public, login, and admin controllers
app/Http/Requests/          Product form validation
app/Models/                 Category, Product, and User models
database/migrations/        Tables and relationships
database/seeders/           Categories, products, and initial account
public/images/logo.png      Griya Beku Nusantara logo
resources/views/            Blade pages
routes/web.php              Application routes
```