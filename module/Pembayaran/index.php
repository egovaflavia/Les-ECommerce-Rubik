<?php

$id = $_GET['id'];
$dDetail = $db->getDetail($id);
$dPemesanan = $db->getOnePemesanan($id);
// var_dump($dDetail);
// var_dump($dPemesanan);

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
        <li class="active"> Pembayaran</li>
    </ul>
    <h3> Pembayaran <a href="index.php?page=module/Produk/index" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Lanjut Belanja </a></h3>


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
                <td colspan="3" style="text-align:right"><strong>TOTAL</strong>
                </td>
                <td class="label label-important" style="display:block">Rp. <strong><?= number_format($dDetail->pemesanan_total); ?> </strong></td>
            </tr>
            <div class="clr"></div>
            <tr>
                <td colspan="5">
                    <form enctype="multipart/form-data" method="POST" class="form-horizontal">
                        <div class="span2">
                            <div class="control-group">
                                <label class="control-label">Metode Pembayaran</label>
                                <div class="controls">
                                    <select required name="metode">
                                        <option value="Transfer">Transfer</option>
                                        <option value="Cash On Delivery">Cash On Delivery(COD)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Nama Pemesan</label>
                                <div class="controls">
                                    <input value="<?= $dPemesanan->pemesanan_id ?>" name="id" type="hidden">
                                    <input value="<?= $dPemesanan->pelanggan_nama ?>" required name="nama" type="text">
                                </div>
                            </div>
                            <small style="color: red"><i>Kosongkan Jika Metode COD</i></small>
                            <div class=" control-group">
                                <label class="control-label">Bank</label>
                                <div class="controls">
                                    <input name="bank" type="text">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Jumlah</label>
                                <div class="controls">
                                    <input readonly value="<?= $dPemesanan->pemesanan_total ?>" required name="jumlah" type="number">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Foto Bukti</label>
                                <div class="controls">
                                    <input name="gambar" type="file">
                                </div>
                            </div>
                            <div class="control-group ">
                                <div class="controls">
                                    <button name="konfirmasi" class="btn btn-primary">Konfirmasi</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['konfirmasi'])) {
                        // $keranjang[] = $_SESSION['keranjang'];
                        if ($db->addKonfirmasi($_POST, $_FILES['gambar']) > 0) {
                            echo "
                            <script>
                            alert('Terimakasih telah melakukan pembayaran');
                            window.location='index.php?page=module/Riwayat/index';
                            </script>
                            ";
                        } else {
                            echo "
                            <script>
                            alert('Pembayaran gagal');
                            window.location='index.php?page=module/Riwayat/index';
                            </script>
                            ";
                        }
                    } ?>
                </td>
            </tr>
        </tbody>
    </table>

    <a href="index.php?page=module/Produk/index" class="btn btn-large"><i class="icon-arrow-left"></i> Lanjut Belanja </a>
</div>