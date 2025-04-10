# 🎬 Review Film
![login](/public/images/loginn.jpg)
![home](/public/images/home.jpg)
![home2](/public/images/home2.jpg)
![fitergenre](/public/images/fitergenre.jpg)


Proyek ini adalah website direktori sinopsis dan trailer film berbasis Laravel 11 dan Tailwind CSS.

## 📌 Fitur Utama
- Manajemen film (judul, sinopsis, trailer, genre, dll.)
- Sistem komentar dan rating film
- Peran pengguna: Admin, Author, dan Subscriber
- Sistem otentikasi dan otorisasi pengguna
- Tampilan responsif dengan Tailwind CSS

---

## ⚙️ Persyaratan Sistem
Sebelum menginstal, pastikan perangkat Anda memiliki:

- **PHP 8.2 atau lebih baru**
- **Composer** (untuk mengelola dependencies)
- **Node.js & npm** (untuk Tailwind CSS dan Vite)
- **MySQL / MariaDB** (sebagai database)
- **Git** (opsional, jika ingin clone repository)

---

## 🔧 Instalasi

### 1️⃣ Clone Repository
```sh
git clone https://github.com/Muslihhh/Film.git
cd Film
```

### 2️⃣ Install Dependencies
```sh
composer install
npm install
```

### 3️⃣ Konfigurasi Environment
Buat file `.env` dari template:
```sh
cp .env.example .env
```

Edit `.env` untuk menyesuaikan koneksi database:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=film
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Generate Key
```sh
php artisan key:generate
```

### 5️⃣ Setup Database
```sh
php artisan migrate --seed
```

### 6️⃣ Jalankan Server
```sh
php artisan serve
```
Akses proyek di browser: `http://127.0.0.1:8000`

---

## 📦 Dependency & Ekstensi yang Dibutuhkan

### **Backend (Laravel 11)**
- `laravel/framework`


### **Frontend**
- `tailwindcss`
- `vite`
- `alpinejs`
- `librarry flowbite`

---

## 📜 Lisensi
Proyek ini menggunakan lisensi **MIT**. Anda bebas untuk menggunakannya, tetapi tetap mencantumkan credit.

🚀 Selamat Coding! Jika ada pertanyaan, jangan ragu untuk membuat **Issue** di GitHub! 😃

