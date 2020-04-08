<?php
include 'admin/assets/model/db.php';
include 'admin/assets/libs/helper/helper.php';
// include 'admin/libs/helper/helper.php';
$db = new Db();

$id = $_GET['id'];
$dPemesanan = $db->getOnePemesanan($id);
$dDetail = $db->getDetail($id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>UKM Dua Putra</title>
    <?php include 'components/head.php' ?>
</head>

<body>
    <div class="container">
        <div class="">
            <div class="">
                <h3> Nota Pembelian <?= $dPemesanan->pemesanan_id ?>
                </h3>
                <table>
                    <tr>
                        <td>Nama Pelanggan</td>
                        <td>:</td>
                        <td width="750px"><?= $dPemesanan->pelanggan_nama ?></td>
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
                    <br>
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
        </div>
    </div>
</body>

</html>