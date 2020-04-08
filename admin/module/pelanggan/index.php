<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Pelanggan</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Tabel Pelanggan</div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="?page=module/pelanggan/tambah" class="btn btn-primary ">Tambah Data</a>
            <br><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telephone</th>
                        <th>Alamat</th>
                        <th width="88px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($db->getAllPelanggan() as $no => $dPelanggan) {
                        // var_dump($dPelanggan);
                    ?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $dPelanggan->pelanggan_user ?></td>
                            <td><?= $dPelanggan->pelanggan_pass ?></td>
                            <td><?= $dPelanggan->pelanggan_nama ?></td>
                            <td><?= $dPelanggan->pelanggan_email ?></td>
                            <td><?= $dPelanggan->pelanggan_tlp ?></td>
                            <td><?= $dPelanggan->pelanggan_alamat ?></td>
                            <td>
                                <a href="index.php?page=module/pelanggan/edit&id=<?= $dPelanggan->pelanggan_id ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="index.php?page=module/pelanggan/hapus&id=<?= $dPelanggan->pelanggan_id ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php }  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>