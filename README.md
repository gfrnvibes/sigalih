# Sigalih
SIGALIH merupakan kepanjangan dari **Sistem Informasi Desa Sirnagalih** (Website Desa) yang saya buat sebagai tugas akhir/skripsi saya di Informatika untuk menempuh gelar S1.
Fitur dalam Website ini yaitu Pembuatan Surat yang bisa sampai puluhan jenis surat yang disediakan. Selain pembuatan surat secara otomatis, terdapat juga fitur bank sampah.

## Stack yang dipakai
- PHP 8.3
- Laravel 10
- Livewire 3
- Bootstrap 5
- ilovepdf/ilovepdf-php
- maatwebsite/excel
- phpoffice/phpword

## Cara menjalankan Program
1. Clone Repository
2. ```cd sigalih```
3. ```composer install```
4. ```cp .env.example .env```
5. ```php artisan key:generate```
6. Konfigurasi Database
7. ```php artisan migrate```
8. ```php artisan serve```
9. Buka ```http://127.0.0.1:8000``` di Browser
    
# Screenshoot
## Home
![website utama](https://github.com/Gufron14/sigalih/blob/main/screenshoot/Screenshot%202024-09-25%20011004.png)

## Layanan Pengajuan Surat
![layanan](https://github.com/Gufron14/sigalih/blob/main/screenshoot/Screenshot%202024-09-25%20012706.png)

## Formulir salah satu jenis Surat
![formulir pengajuan surat](https://github.com/Gufron14/sigalih/blob/main/screenshoot/Screenshot%202024-09-25%20012932.png)

## Fitur Bank Sampah
![bank sampah](https://github.com/Gufron14/sigalih/blob/main/screenshoot/Screenshot%202024-09-25%20013056.png)

## Riwayat Setor Sampah
![riwayat setor sampah](https://github.com/Gufron14/sigalih/blob/main/screenshoot/Screenshot%202024-09-25%20014337.png)

## Halaman Admin Pelayanan Surat
![admin surat](https://github.com/Gufron14/sigalih/blob/main/screenshoot/Screenshot%202024-09-25%20013458.png)

## Dashboard Admin Bank Sampah
![dashboard bank sampah](https://github.com/Gufron14/sigalih/blob/main/screenshoot/Screenshot%202024-09-25%20013607.png)

## Setoran Nasabah oleh Admin Bank Sampah
![admin bank sampah](https://github.com/Gufron14/sigalih/blob/main/screenshoot/Screenshot%202024-09-25%20013734.png)
