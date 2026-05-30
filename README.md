<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Anggota Kelompok

1. Richard Samuel Hatane - 245150200111061
2. TM Panji Fachroni - 245150200111052
3. Achmad Yusuf Hamdani Firmansyah - 245150207111084
4. Ahmad Syafi Nurroyyan - 245150201111041

## Link Website: https://nanotrackerweb-production-d843.up.railway.app/

## Nano Tracker Web (Setup Local)

1. Copy .env.example

2. Generate application key

php artisan key:generate

3. Buat database (MySQL)

CREATE DATABASE nano_tracker_db;
CREATE USER 'root'@'localhost' IDENTIFIED BY 'your_password';
GRANT ALL PRIVILEGES ON nano_tracker_db.* TO 'root'@'localhost';
FLUSH PRIVILEGES;

4. Update .env pakai your_password

DB_DATABASE=nano_tracker_db
DB_USERNAME=nano_user
DB_PASSWORD=your_password

5. Run migrasi

php artisan migrate

6. Start dev server

php artisan serve

