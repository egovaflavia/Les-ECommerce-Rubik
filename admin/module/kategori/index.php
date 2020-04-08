<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Kategori</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Tabel Kategori</div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="?page=module/kategori/tambah" class="btn btn-primary ">Tambah Data</a>
            <br><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>Nama Kategori</th>
                        <th width="88px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($db->getAllKategori() as $no => $dKategori) {
                        // var_dump($dKategori);
                        // exit;
                    ?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $dKategori->kategori_nama ?></td>
                            <td>
                                <a href="index.php?page=module/kategori/edit&id=<?= $dKategori->kategori_id ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="index.php?page=module/kategori/hapus&id=<?= $dKategori->kategori_id ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php }  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>