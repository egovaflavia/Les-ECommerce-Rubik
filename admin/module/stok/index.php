<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Stok Produk</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Stok Produk</div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="?page=module/stok/tambah" class="btn btn-primary ">Tambah Data Produk</a>
            <br><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Stok</th>
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
                            <td><?= $dproduk->produk_stok ?></td>
                            <td>
                                <a href="index.php?page=module/stok/edit&id=<?= $dproduk->produk_id ?>" class="btn btn-success btn-sm">Update Stok</a>
                            </td>
                        </tr>
                    <?php }  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>