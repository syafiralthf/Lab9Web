<?php
include "koneksi.php";

$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok = $_POST['stok'];

$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];

if ($gambar != "") {
    move_uploaded_file($tmp, "gambar/$gambar");
}

mysqli_query($conn,
"INSERT INTO data_barang (nama, kategori, harga_beli, harga_jual, stok, gambar)
 VALUES ('$nama','$kategori','$harga_beli','$harga_jual','$stok','$gambar')");

header("Location: index.php?page=barang");
?>