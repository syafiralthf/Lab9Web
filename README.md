# Lab9Web - PHP Modular

Nama: Syafira Luthfi Azzahra

NIM: 312410353

Kelas: TI.2.A.4

Mata Kuliah: Pemrograman Web 1

# Membuat Database

```php
CREATE TABLE data_barang (
    id_barang INT(11) AUTO_INCREMENT PRIMARY KEY,
    kategori VARCHAR(50),
    nama VARCHAR(100),
    gambar VARCHAR(255),
    harga_beli INT(11),
    harga_jual INT(11),
    stok INT(11)
);
```

# Koneksi.php

```php
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "latihan1";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal");
}
?>
```

Kode `koneksi.php` digunakan untuk membuat koneksi antara aplikasi PHP dan database MySQL. Di dalam file ini ditentukan informasi server seperti hostname, username, password, dan nama database. Kemudian, `mysqli_connect()` digunakan untuk mencoba menghubungkan PHP ke database yang dituju. Jika koneksi gagal, program akan dihentikan dengan pesan “Koneksi gagal”.

* `$host`, `$user`, `$pass`, `$db` → menyimpan konfigurasi database.
* `mysqli_connect()` → membuat koneksi ke MySQL.
* `if (!$conn)` → mengecek apakah koneksi berhasil atau gagal.
* `die("Koneksi gagal")` → menghentikan proses jika terjadi error.
* File ini di-include di semua file yang butuh akses database (CRUD barang).

# Header.php

```php
<!DOCTYPE html>
<html>
<head>
    <title>PHP Modular</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<header>
    <h1>PHP Modular</h1>

    <div class="nav-table-container">
        <table class="nav-table">
            <tr>
                <td><a href="index.php?page=home">Beranda</a></td>
                <td><a href="index.php?page=about">Tentang</a></td>
                <td><a href="index.php?page=barang">Data Barang</a></td>
                <td><a href="index.php?page=kontak">Kontak</a></td>
            </tr>
        </table>
    </div>
</header>
```

Kode `header.php` digunakan untuk membuat bagian atas tampilan (header) yang akan muncul di semua halaman aplikasi. File ini memuat struktur HTML awal seperti judul website “PHP Modular”, lalu menampilkan menu navigasi yang dibuat dalam bentuk tabel berisi link menuju halaman Beranda, Tentang, Data Barang, dan Kontak.
* Menampilkan judul utama “PHP Modular”.
* Menyediakan navigasi untuk berpindah halaman.
* Navigasi dibuat dalam bentuk tabel agar rata dan rapi.
* Menggunakan link `index.php?page=...` untuk mengaktifkan sistem modular.
* Diletakkan dalam div `.container` supaya tampilan tetap terstruktur.
* Dipanggil di semua halaman melalui `include "header.php";`.

# Footer.php

```php
<footer>
    © 2025 - Teknik Informatika | Universitas Pelita Bangsa
</footer>

</div>
</body>
</html>
```

Kode `footer.php` berfungsi menampilkan bagian bawah halaman (footer) yang digunakan pada seluruh halaman aplikasi. Isi footer ini biasanya berupa informasi hak cipta atau identitas pembuat, seperti “© 2025 - Teknik Informatika | Universitas Pelita Bangsa”. Footer ditempatkan di dalam tag `<footer>` agar lebih terstruktur dan mudah diatur tampilannya melalui CSS.
* Menampilkan informasi copyright atau identitas pembuat.
* Menggunakan tag `<footer>` agar rapi dan semantik.
* Selalu berada di bagian bawah tampilan halaman.
* Dipanggil di setiap halaman melalui `include "footer.php";`.

# Index.php

```php
<?php
include "header.php";

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {

    case 'home':
        include "mod/pages/home.php";
        break;

    case 'about':
        include "mod/pages/about.php";
        break;

    case 'kontak':
        include "mod/pages/kontak.php";
        break;

    case 'barang':
        include "mod/barang/list.php";
        break;

    case 'barang-form':
        include "mod/barang/form.php";
        break;

    case 'barang-save':
        include "mod/barang/save.php";
        break;

    case 'barang-edit':
        include "mod/barang/edit.php";
        break;

    case 'barang-delete':
        include "mod/barang/delete.php";
        break;

    default:
        include "mod/pages/home.php"; 
}

include "footer.php";
?>
```

Kode `index.php` berfungsi sebagai pusat pengendali atau *router* dalam aplikasi modular. File ini menentukan halaman mana yang akan ditampilkan berdasarkan parameter `page` pada URL. Pertama, `header.php` dipanggil agar menu dan bagian atas halaman selalu muncul. Variabel `$page` mengecek apakah pengguna membuka menu home, about, kontak, atau bagian barang; jika tidak ada parameter, halaman home digunakan. Bagian `switch` memproses nilai `$page` dan memanggil file modul yang sesuai, seperti halaman home, about, kontak, atau modul CRUD barang (list, form, save, edit, delete). Jika parameter tidak dikenali, halaman home tetap menjadi tampilan default. Terakhir, `footer.php` disertakan agar footer selalu tampil di setiap halaman. Struktur ini membuat aplikasi lebih rapi, terpisah, dan mudah diatur.

* `include "header.php";` → menampilkan header & menu di semua halaman.
* `$page = isset($_GET['page']) ? $_GET['page'] : 'home';` → membaca parameter halaman atau default ke home.
* `switch ($page)` → memilih modul sesuai halaman yang dibuka.
* `home / about / kontak` → memanggil halaman statis dalam folder `mod/pages`.
* `barang / barang-form / barang-save / barang-edit / barang-delete` → memanggil modul CRUD barang dari folder `mod/barang`.
* `default:` → jika page tidak ada, kembali ke home.
* `include "footer.php";` → menampilkan footer di semua halaman.

# Home.php

```php
<h2>Beranda</h2>
<p>Selamat datang di aplikasi PHP Modular. Silakan pilih menu pada navigasi di atas.</p>
```

<img width="1919" height="789" alt="image" src="https://github.com/user-attachments/assets/2902f051-27ba-4b88-ac6c-35e66733e5d6" />

# Abouut.php

```php
<h2>Tentang</h2>
<p>Aplikasi ini dibuat untuk keperluan Praktikum 9 pada mata kuliah Pemrograman Web, Universitas Pelita Bangsa. Sistem ini sudah menggunakan konsep modularisasi sehingga kode lebih rapi, mudah dibaca, dan mudah dikembangkan.</p>
```

<img width="1919" height="582" alt="image" src="https://github.com/user-attachments/assets/14551ab2-c1eb-48c3-a249-b34790abfe9f" />

# Kontak.php

```php
<div class="content">
    <h2>Kontak</h2>

    <p> Silahkan hubungi kontak dibawah ini </p>

    <p><strong>Nomor Telepon:</strong> 0821-1234-5678</p>
    <p><strong>Email:</strong> syafira@gmail.com</p>
    <p><strong>Alamat:</strong> Cikarang, Jawa Barat</p>
</div>
```

<img width="1919" height="639" alt="image" src="https://github.com/user-attachments/assets/10d65244-622c-4020-93ad-1a077d8c7d88" />

# Hasil Akhir Praktikum

## Data Barang

<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/59edf293-f777-4914-b007-2f4eb6c72c4a" />

## Tambah Barang

<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/439a3918-9741-491e-a7f0-3faa0d4b625d" />

## Ubah Barang

<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/dc55bc4d-747e-4889-9cf2-ab79aecfdc68" />

## Hapus Barang

<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/7b2f3e7a-4f0c-4074-bb35-a0e019f098af" />
