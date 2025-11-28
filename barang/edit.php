<?php
include "koneksi.php";

$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_barang=$id");
$data = mysqli_fetch_assoc($q);
?>

<h2>Ubah Barang</h2>

<form action="index.php?page=barang-save&id=<?= $id ?>" method="post" enctype="multipart/form-data">

    <label>Nama Barang</label>
    <input type="text" name="nama" value="<?= $data['nama'] ?>">

    <label>Kategori</label>
    <select name="kategori">
        <option <?= ($data['kategori']=="Elektronik")?"selected":"" ?>>Elektronik</option>
        <option <?= ($data['kategori']=="Komputer")?"selected":"" ?>>Komputer</option>
        <option <?= ($data['kategori']=="Hand Phone")?"selected":"" ?>>Hand Phone</option>
    </select>

    <label>Harga Beli</label>
    <input type="number" name="harga_beli" value="<?= $data['harga_beli'] ?>">

    <label>Harga Jual</label>
    <input type="number" name="harga_jual" value="<?= $data['harga_jual'] ?>">

    <label>Stok</label>
    <input type="number" name="stok" value="<?= $data['stok'] ?>">

    <label>Gambar</label>
    <input type="file" name="gambar">

    <button class="btn">Simpan</button>

</form>