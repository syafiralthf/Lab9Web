<h2>Tambah Barang</h2>

<form action="index.php?page=barang-save" method="post" enctype="multipart/form-data">

    <label>Nama Barang</label>
    <input type="text" name="nama" required>

    <label>Kategori</label>
    <select name="kategori">
        <option>Elektronik</option>
        <option>Komputer</option>
        <option>Hand Phone</option>
    </select>

    <label>Harga Beli</label>
    <input type="number" name="harga_beli">

    <label>Harga Jual</label>
    <input type="number" name="harga_jual">

    <label>Stok</label>
    <input type="number" name="stok">

    <label>Gambar</label>
    <input type="file" name="gambar">

    <button class="btn" type="submit">Simpan</button>

</form>