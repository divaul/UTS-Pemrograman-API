# API Mahasiswa - Laravel REST API

Aplikasi REST API untuk mengelola data mahasiswa menggunakan Laravel dengan autentikasi Laravel Sanctum.

## 📋 Deskripsi

API ini menyediakan endpoint untuk:
- Autentikasi pengguna dengan token
- Mengelola data mahasiswa (Create, Read, Update, Delete)
- Pencarian mahasiswa berdasarkan nama dan NIM

## 🛠️ Teknologi

- **Laravel 12.x** - PHP Framework
- **Laravel Sanctum** - API Authentication
- **SQLite** - Database
- **PHP 8.2+** - Programming Language

## 📦 Instalasi

### Prasyarat
- PHP >= 8.2
- Composer
- SQLite

### Langkah Instalasi

1. **Clone Repository**
```bash
git clone <repository-url>
cd <project-folder>
```

2. **Install Dependencies**
```bash
composer install
```

3. **Konfigurasi Environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Konfigurasi Database**

Edit file `.env`:
```env
DB_CONNECTION=SQLite
```

5. **Jalankan Migration & Seeder**
```bash
php artisan migrate
php artisan db:seed
```

6. **Jalankan Server**
```bash
php artisan serve
```

Server akan berjalan di `http://localhost:8000`

## 🔑 API Endpoints

### Base URL
```
http://localhost:8000/api
```

### Authentication

#### Login
```http
POST /api/login
Content-Type: application/json

{
  "email": "user@example.com",
  "password": "password"
}
```

**Response:**
```json
{
  "success": true,
  "message": "Login berhasil",
  "token": "1|xxxxxxxxxxxxxxxxxxxxx",
  "user": {
    "id": 1,
    "email": "user@example.com"
  }
}
```

### Mahasiswa Endpoints

**Semua endpoint mahasiswa memerlukan autentikasi. Sertakan token di header:**
```
Authorization: Bearer {token}
```

#### 1. Get All Mahasiswa
```http
GET /api/mahasiswa
```

**Response:**
```json
{
  "success": true,
  "message": "Data mahasiswa berhasil diambil",
  "total": 10,
  "data": [
    {
      "id": 1,
      "nama": "John Doe",
      "nim": "2025123456",
      "created_at": "2025-11-10T10:00:00.000000Z",
      "updated_at": "2025-11-10T10:00:00.000000Z"
    }
  ]
}
```

#### 2. Get Mahasiswa by ID
```http
GET /api/mahasiswa/{id}
```

**Response:**
```json
{
  "success": true,
  "message": "Data mahasiswa berhasil diambil",
  "data": {
    "id": 1,
    "nama": "John Doe",
    "nim": "2025123456",
    "created_at": "2025-11-10T10:00:00.000000Z",
    "updated_at": "2025-11-10T10:00:00.000000Z"
  }
}
```

#### 3. Search by Nama
```http
GET /api/mahasiswa/nama/{nama}
```

#### 4. Search by NIM
```http
GET /api/mahasiswa/nim/{nim}
```

## 🗂️ Struktur Database

### Tabel: mahasiswas

| Kolom | Tipe | Deskripsi |
|-------|------|-----------|
| id | BIGINT | Primary key (auto increment) |
| nama | VARCHAR | Nama mahasiswa |
| nim | VARCHAR | Nomor Induk Mahasiswa (unique) |
| created_at | TIMESTAMP | Waktu data dibuat |
| updated_at | TIMESTAMP | Waktu data diupdate |

### Tabel: users

| Kolom | Tipe | Deskripsi |
|-------|------|-----------|
| id | BIGINT | Primary key |
| email | VARCHAR | Email user (unique) |
| password | VARCHAR | Password (hashed) |
| created_at | TIMESTAMP | Waktu registrasi |
| updated_at | TIMESTAMP | Waktu update |

## 🔐 Keamanan

### Token Authentication
- Menggunakan Laravel Sanctum untuk token-based authentication
- Token expires dalam 60 menit (dapat dikonfigurasi di `config/sanctum.php`)
- Setiap login baru akan menghapus token lama

### Mass Assignment Protection
- Model menggunakan `$fillable` untuk melindungi dari mass assignment vulnerability

### Password Hashing
- Password di-hash menggunakan bcrypt
- Validasi password menggunakan `Hash::check()`

## 📝 Contoh Penggunaan

### Menggunakan cURL

**Login:**
```bash
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{"email":"user@example.com","password":"password"}'
```

**Get Mahasiswa:**
```bash
curl -X GET http://localhost:8000/api/mahasiswa \
  -H "Authorization: Bearer YOUR_TOKEN_HERE"
```

### Menggunakan Postman

1. Buat request baru dengan method POST ke `/api/login`
2. Tambahkan body JSON dengan email dan password
3. Salin token dari response
4. Untuk request lain, tambahkan header:
   - Key: `Authorization`
   - Value: `Bearer {token}`

## 🧪 Testing

Data dummy mahasiswa akan dibuat otomatis saat menjalankan seeder:
- 10 mahasiswa dengan nama dan NIM random
- NIM mengikuti format: `YYYY` + 6 digit angka random

## 🐛 Troubleshooting

### Error: Token Mismatch
- Pastikan menggunakan token yang valid
- Cek apakah token sudah expired (default 60 menit)
- Login ulang untuk mendapatkan token baru

### Error: Database Connection
- Pastikan konfigurasi database di `.env` sudah benar
- Pastikan SQLite sudah running
- Jalankan `php artisan config:clear`

### Error: 404 Not Found
- Pastikan route sudah terdaftar dengan `php artisan route:list`
- Cek apakah menggunakan base URL yang benar
