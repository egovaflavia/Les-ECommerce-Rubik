<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Supplier</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Tabel Supplier</div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="?page=module/supplier/tambah" class="btn btn-primary ">Tambah Data</a>
            <br><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telephone</th>
                        <th width="88px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($db->getAllSupplier() as $no => $dSupplier) {
                        // var_dump($dSupplier);
                    ?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $dSupplier->supplier_nama ?></td>
                            <td><?= $dSupplier->supplier_alamat ?></td>
                            <td><?= $dSupplier->supplier_tlp ?></td>
                            <td>
                                <a href="index.php?page=module/supplier/edit&id=<?= $dSupplier->supplier_id ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="index.php?page=module/supplier/hapus&id=<?= $dSupplier->supplier_id ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php }  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>