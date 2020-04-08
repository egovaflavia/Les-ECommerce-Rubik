<?php

// var_dump($_SESSION['akun']);;
$id = $_SESSION['akun']->pelanggan_id;
$dPemesanan = $db->getOnePemesananPelanggan($id);


?>
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
        <li class="active"> Riwayat Belanja</li>
    </ul>
    <h3> Riwayat Belanja <a href="index.php?page=module/Produk/index" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Lanjut Belanja </a></h3>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Pemesanan</th>
                <th>Status</th>
                <th>Total</th>
                <th>Tanggal Expired</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($dPemesanan as $dPemesanan) { ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= TglIndo($dPemesanan->pemesanan_tgl) ?></td>
                    <td><?= $dPemesanan->pemesanan_status ?></td>
                    <td>Rp. <?= number_format($dPemesanan->pemesanan_total); ?></td>
                    <td><?= TglIndo($dPemesanan->pemesanan_expired) ?></td>
                    <td>
                        <a target="_blank" href="index.php?page=module/Nota/index&id=<?= $dPemesanan->pemesanan_id ?>" class="btn btn-success"> <span class="fa fa-print"></span> Cetak</a>
                        <?php
                        if ($dPemesanan->pemesanan_status == "Pending") {
                        ?>
                            <a href="index.php?page=module/Pembayaran/index&id=<?= $dPemesanan->pemesanan_id ?>" class="btn btn-primary"> <span class="fa fa-print"></span> Pembayaran</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
            <div class="clr"></div>
        </tbody>
    </table>

    <a href="index.php?page=module/Produk/index" class="btn btn-large"><i class="icon-arrow-left"></i> Lanjut Belanja </a>
    <?php
    if (isset($_POST['checkout'])) {
        // $keranjang[] = $_SESSION['keranjang'];
        $db->Checkout($_POST, $_SESSION['keranjang']);
    } ?>
</div>