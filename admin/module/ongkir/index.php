<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Ongkir</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Tabel Ongkir</div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="?page=module/ongkir/tambah" class="btn btn-primary ">Tambah Data</a>
            <br><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>Kota</th>
                        <th>Tarif</th>
                        <th width="88px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($db->getAllOngkir() as $no => $dOngkir) {
                        // var_dump($dOngkir);
                        // exit;    
                    ?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $dOngkir->ongkir_kota ?></td>
                            <td><?= rupiah($dOngkir->ongkir_tarif) ?></td>
                            <td>
                                <a href="index.php?page=module/ongkir/edit&id=<?= $dOngkir->ongkir_id ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="index.php?page=module/ongkir/hapus&id=<?= $dOngkir->ongkir_id ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php }  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>