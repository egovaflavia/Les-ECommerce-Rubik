<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Pemesanan</li>
</ol>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Data Tabel Pemesanan</div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>Nama Pemesan</th>
                        <th>Tanggal Pemesanan</th>
                        <th>Tujuan Pengiriman</th>
                        <th>Pesan</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th width="150px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($db->getAllPemesanan() as $no => $dpemesanan) {
                        // var_dump($dpemesanan);
                    ?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $dpemesanan->pelanggan_nama ?></td>
                            <td><?= TglIndo($dpemesanan->pemesanan_tgl) ?></td>
                            <td><?= $dpemesanan->pemesanan_kota ?></td>
                            <td>
                                <?php if (empty($dpemesanan->pemesanan_custome)) { ?>
                                    Tidak Custome
                                <?php } else { ?>
                                    <?= $dpemesanan->pemesanan_custome ?>
                                <?php } ?>
                            </td>
                            <td><?= $dpemesanan->pemesanan_status ?></td>
                            <td><?= rupiah($dpemesanan->pemesanan_total) ?></td>
                            <td>
                                <a href="index.php?page=module/pemesanan/detail&id=<?= $dpemesanan->pemesanan_id ?>" class="btn btn-success btn-sm">Detail</a>
                                <a href="index.php?page=module/pemesanan/pembayaran&id=<?= $dpemesanan->pemesanan_id ?>" class="btn btn-primary btn-sm">Pembayaran</a>
                            </td>
                        </tr>
                    <?php }  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>