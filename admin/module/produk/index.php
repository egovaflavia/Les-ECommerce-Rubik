<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Produk</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Tabel Produk</div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="?page=module/produk/tambah" class="btn btn-primary ">Tambah Data</a>
            <br><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Tanggal Post</th>
                        <th width="90px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($db->getAllProduk() as $no => $dproduk) {
                        // echo "<pre>";
                        // var_dump($dproduk);
                        // echo "</pre>";
                    ?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $dproduk->produk_nama ?></td>
                            <td><?= $dproduk->kategori_nama ?></td>
                            <td><?= rupiah($dproduk->produk_harga) ?></td>
                            <td><?= $dproduk->produk_stok ?></td>
                            <td><img width="100px" src="assets/gambar_produk/<?= $dproduk->produk_gambar ?>" alt="Tidak ada gambar"></td>
                            <td><?= TglIndo($dproduk->produk_tgl_post) ?></td>
                            <td>
                                <a href="index.php?page=module/produk/edit&id=<?= $dproduk->produk_id ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="index.php?page=module/produk/hapus&id=<?= $dproduk->produk_id ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php }  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>