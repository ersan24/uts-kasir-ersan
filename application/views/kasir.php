<!DOCTYPE html>
<html>
<head>
    <title>UTS Kasir Ersan</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <h1>Aplikasi Kasir</h1>
    <form method="post" action="<?= site_url('kasir/tambah_item') ?>">
        Nama Barang: <input type="text" name="nama" required><br>
        Harga: <input type="number" name="harga" required><br>
        Jumlah: <input type="number" name="jumlah" required><br> <!-- Tambah input jumlah -->
        <button type="submit">Tambah Item</button>
    </form>

    <hr>

    <h2>Daftar Belanja</h2>
    <ul>
        <?php if (!empty($items)) : ?>
            <?php foreach ($items as $key => $item) : ?>
                <li><?= $item['nama'] ?> - Rp <?= $item['harga'] ?> x <?= $item['jumlah'] ?> <!-- Tampilkan jumlah barang -->
                    <a href="<?= site_url('kasir/hapus_item/' . $key) ?>">Hapus</a>
                </li>
            <?php endforeach; ?>
            <li><strong>Total: Rp <?= $total ?></strong></li>
            <li><a href="<?= site_url('kasir/hapus_semua_item') ?>">Hapus Semua Item</a></li>
        <?php else : ?>
            <li>Tidak ada item yang ditambahkan</li>
        <?php endif; ?>
    </ul>
</body>
</html>
