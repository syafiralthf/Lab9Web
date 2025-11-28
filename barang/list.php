<?php
include "koneksi.php";
$result = mysqli_query($conn, "SELECT * FROM data_barang");
?>

<h2>Data Barang</h2>

<a class="btn" href="index.php?page=barang-form">+ Tambah Barang</a>

<table>
    <tr>
        <th>Gambar</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
    <tr>
        <td>
            <?php if ($row['gambar'] != ""): ?>
                <img src="gambar/<?= $row['gambar'] ?>" class="thumb">
            <?php else: ?>
                -
            <?php endif; ?>
        </td>

        <td><?= $row['nama'] ?></td>
        <td><?= $row['kategori'] ?></td>
        <td><?= number_format($row['harga_beli']) ?></td>
        <td><?= number_format($row['harga_jual']) ?></td>
        <td><?= $row['stok'] ?></td>

        <td>
            <a class="link" href="index.php?page=barang-edit&id=<?= $row['id_barang'] ?>">Ubah</a> |
            <a class="link" href="index.php?page=barang-delete&id=<?= $row['id_barang'] ?>"
                onclick="return confirm('Hapus data?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>