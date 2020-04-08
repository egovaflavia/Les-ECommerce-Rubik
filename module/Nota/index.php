<?php

$id = $_GET['id'];
$dPemesanan = $db->getOnePemesanan($id);
$dDetail = $db->getDetail($id);
// var_dump($dPemesanan);
// var_dump($dDetail);

// proteksi keamanan ==============================================================================================
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// mendapatkan id yg login////////////////////////////////////////////////////////////////////////////////////////
$idLogin = $_SESSION['akun']->pelanggan_id; //////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// mendpatkan id orang yg beli////////////////////////////////////////////////////////////////////////////////////
$idOrangYgBeli = $dPemesanan->pelanggan_id; ///////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ($idLogin !== $idOrangYgBeli) { ////////////////////////////////////////////////////////////////////////////////
    echo "////////////////////////////////////////////////////////////////////////////////////////////////////////
    <script>alert('Jangan Nakal');location='index.php?page=module/Riwayat/index'</script>/////////////////////////
    "; ////////////////////////////////////////////////////////////////////////////////////////////////////////////
} /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// proteksi keamanan ==============================================================================================

?>
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
        <li class="active"> Nota Pembelian </li>
    </ul>
    <h3> Nota Pembelian <?= $dPemesanan->pemesanan_id ?> <a target="_blank" href="cetak.php?id=<?= $id ?>" class="btn btn-primary"><i class="icon-print"></i> Cetak </a>
    </h3>
    <table>
        <tr>
            <td>Nama Pelanggan</td>
            <td>:</td>
            <td width="420px"><?= $dPemesanan->pelanggan_nama ?></td>
            <td>Tujuan Pengiriman</td>
            <td>:</td>
            <td><?= $dPemesanan->pelanggan_nama ?></td>
        </tr>
        <tr>
            <td>No Telp</td>
            <td>:</td>
            <td><?= $dPemesanan->pelanggan_tlp ?></td>
            <td>Ongkos Kirim</td>
            <td>:</td>
            <td>Rp. <?= number_format($dPemesanan->pemesanan_tarif); ?></td>
        </tr>
        <tr>
            <td>Tanggal Pembelian</td>
            <td>:</td>
            <td><?= TglIndo($dPemesanan->pemesanan_tgl) ?></td>
            <td>Alamat Lengkap</td>
            <td>:</td>
            <td><?= $dPemesanan->pemesanan_alamat_pengiriman ?></td>
        </tr>
        <tr>
            <td>Custome</td>
            <td>:</td>
            <td>
                <?php if (empty($dPemesanan->pemesanan_custome)) { ?>
                    Tidak ada Custome
                <?php } else { ?>
                    <?= $dPemesanan->pemesanan_custome ?>
                <?php } ?>
            </td>
        </tr>
    </table>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Sub Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dDetail as $dDetail) {
            ?>
                <tr>
                    <td><?= $dDetail->produk_nama ?></td>
                    <td><?= $dDetail->detail_jumlah ?></td>
                    <td>Rp. <?= number_format($dDetail->produk_harga); ?></td>
                    <td>Rp. <?= number_format($dDetail->detail_sub_harga); ?></td>

                </tr>
            <?php } ?>
            <tr>
                <td colspan="3" style="text-align:right">Ongkos Kirim </td>
                <td>Rp. <?= number_format($dDetail->pemesanan_tarif); ?></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:right"><strong>TOTAL</strong>
                </td>
                <td class="label label-important" style="display:block">Rp. <strong><?= number_format($dDetail->pemesanan_total); ?> </strong></td>
            </tr>
            <div class="clr"></div>
        </tbody>
    </table>

    <?php
    if (isset($_POST['checkout'])) {
        // $keranjang[] = $_SESSION['keranjang'];
        $db->Checkout($_POST, $_SESSION['keranjang']);
    } ?>
</div>