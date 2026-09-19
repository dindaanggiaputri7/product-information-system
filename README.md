# Mini Project 1: Product Information System

### Sistem Informasi Produk & Monitoring Stok

> **Mata Kuliah:** Pemrograman Web  
> **Project:** Mini Project 1  
> **Teknologi:** PHP Native, HTML, Tailwind CSS, XAMPP

---

## 1. Deskripsi Project

**Product Information System** adalah aplikasi berbasis PHP yang digunakan untuk menampilkan informasi produk dan melakukan monitoring terhadap kondisi stok.

Project ini menerapkan konsep dasar PHP seperti **Multidimensional Associative Array, Function, Conditional, Foreach, Require Once**, serta **Separation of Concerns** dengan memisahkan data, proses, dan tampilan ke dalam beberapa file.

Produk dengan jumlah stok kurang dari 3 akan secara otomatis dikategorikan sebagai **Stok Kritis**.

---

## 2. Tujuan

Project ini dibuat untuk menerapkan konsep yang telah dipelajari pada Pemrograman Web, khususnya:

- Multidimensional Associative Array
- Function
- Conditional
- Perulangan `foreach`
- `require_once`
- Pemisahan Data Layer, Processing Layer, dan Presentation Layer
- Server-Side Rendering menggunakan PHP

---

## 3. Tampilan Aplikasi

### Dashboard

![Dashboard Product Information System](Asset/dashboard.png)

Dashboard menampilkan informasi yang dihitung secara otomatis dari data produk:

- Total Produk
- Total Stok
- Nilai Aset Stok
- Stok Kritis

### Tabel Produk

![Tabel Produk](Asset/product-table.png)

Tabel menampilkan:

- ID
- Nama Produk
- Kategori
- Harga
- Stok
- Status
- Deskripsi

Produk dengan stok kurang dari 3 akan diberikan penanda **Stok Kritis**.

### Pencarian Produk

![Pencarian Produk](Asset/search.png)

Pencarian dapat dilakukan berdasarkan ID, nama produk, atau kategori.

---

## 4. Struktur Project

```text
product-information-system/
│
├── Asset/
│   ├── dashboard.png
│   ├── product-table.png
│   └── search.png
│
├── config.php
├── products.php
├── functions.php
├── index.php
└── README.md

Pembagian Layer
File            	Layer                 	Fungsi
config.php	      Configuration         	Menyimpan konfigurasi aplikasi
products.php	    Data	                  Menyimpan data produk
functions.php	    Processing	            Mengolah dan menghitung data
index.php	        Presentation	          Menampilkan hasil ke halaman web

5. Fitur Utama
Dashboard

Sistem menghitung secara otomatis:

Total Produk → jumlah data produk
Total Stok → jumlah seluruh stok
Nilai Aset Stok → harga × stok
Stok Kritis → jumlah produk dengan stok < 3

Nilai dashboard tidak ditulis secara manual, tetapi diperoleh dari data pada products.php.

Monitoring Stok

Aturan kondisi stok:

Stok < 3  → Stok Kritis
Stok ≥ 3  → Stok Aman
Pencarian

Pengguna dapat mencari produk berdasarkan:

ID
Nama Produk
Kategori

6. Data Produk

Data yang digunakan pada project:

ID	Nama Produk	Kategori	Harga	Stok
P001	Laptop Asus ROG	Electronics	Rp15.000.000	5
P002	Mouse Wireless Logitech	Accessories	Rp250.000	2
P003	Mechanical Keyboard	Accessories	Rp750.000	12
P004	Monitor 24 Inch IPS	Electronics	Rp2.100.000	1

Berdasarkan data tersebut, sistem secara otomatis menghasilkan:

Total Produk   : 4
Total Stok     : 20 Unit
Nilai Aset     : Rp86.600.000
Stok Kritis    : 2 Produk

7. Konsep PHP yang Diterapkan

Project menggunakan:

Array Multidimensi untuk menyimpan data produk.
Function untuk melakukan pengolahan data.
foreach untuk membaca dan menampilkan data.
Conditional untuk menentukan status stok.
require_once untuk menghubungkan file PHP.
htmlspecialchars() untuk membantu menjaga keamanan output HTML.
Server-Side Rendering untuk memproses data menggunakan PHP sebelum ditampilkan pada browser.

8. Cara Menjalankan
Pastikan XAMPP sudah terpasang.
Aktifkan Apache pada XAMPP.
Letakkan folder project di:
C:\xampp\htdocs\product-information-system
Buka browser dan akses:
http://localhost/product-information-system/

9. Pengembangan Selanjutnya

Project ini masih dapat dikembangkan dengan fitur seperti:

Filter kategori
Tambah produk
Edit produk
Hapus produk
Penyimpanan menggunakan JSON
Database
Manajemen stok yang lebih lengkap

Fitur tersebut merupakan rencana pengembangan dan belum termasuk dalam versi Mini Project 1 saat ini.

Author

Dinda Anggia Putri
Program Studi Sistem Informasi
Universitas Malikussaleh
