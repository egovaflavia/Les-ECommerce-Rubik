<?php
// jk kosong keranjang belanja,mk larikan ke index
if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang Kosong, Silahkan Berbelanja Dahulu');</script>";
    echo "<script>window.location='index.php?page=module/Produk/index'</script>";
}

if (empty($_SESSION["akun"]) or !isset($_SESSION["akun"])) {
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>window.location='index.php?page=module/Keranjang/index'</script>";
}

$id = $_SESSION['akun']->pelanggan_id;
$dPelanggan = $db->getOnePelanggan($id);
// var_dump($dPelanggan);

?>
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
        <li class="active"> Checkout</li>
    </ul>
    <h3> Checkout <a href="index.php?page=module/Produk/index" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Lanjut Belanja </a></h3>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar Produk</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Sub Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
                $dProduk = $db->getOneProduk($id_produk);
                // var_dump($_SESSION['keranjang']);
                $sub = $dProduk->produk_harga * $jumlah;
                $total += $sub;
            ?>
                <tr>
                    <td>
                        <center>
                            <img width="50px" src="admin/assets/gambar_produk/<?= $dProduk->produk_gambar ?>" alt="" />
                        </center>
                    </td>
                    <td><?= $dProduk->produk_nama ?></td>
                    <td>
                        <?= $jumlah ?>
                    </td>
                    <td>Rp. <?= number_format($dProduk->produk_harga); ?></td>
                    <td>Rp. <?= number_format($sub); ?></td>
                </tr>
            <?php } ?>
            <!-- <tr>
                <td colspan="4" style="text-align:right">Total Price: </td>
                <td> $228.00</td>
            </tr> -->
            <tr>
                <td colspan="4" style="text-align:right"><strong>TOTAL</strong>
                </td>
                <td class="label label-important" style="display:block">Rp. <strong> <?= number_format($total); ?> </strong></td>
            </tr>
            <div class="clr"></div>
            <tr>
                <td colspan="5">
                    <form method="POST" class="form-horizontal">
                        <div class="span2">
                            <div class="control-group">
                                <label class="control-label">Nama Pelanggan</label>
                                <div class="controls">
                                    <input readonly name="id" value="<?= $dPelanggan->pelanggan_id ?>" type="hidden">
                                    <input readonly name="total" value="<?= $total ?>" type="hidden">
                                    <input readonly name="nama" value="<?= $dPelanggan->pelanggan_nama ?>" type="text">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">No Telp.</label>
                                <div class="controls">
                                    <input readonly name="tlp" value="<?= $dPelanggan->pelanggan_tlp ?>" type="text">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Alamat Tujuan</label>
                                <div class="controls">
                                    <select name="ongkir">
                                        <?php
                                        foreach ($db->getAllOngkir() as $dOngkir) {
                                        ?>
                                            <option value="<?= $dOngkir->ongkir_id ?>"><?= $dOngkir->ongkir_kota ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Alamat Lengkap</label>
                                <div class="controls">
                                    <textarea required name="alamat" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Pesan ke Admin</label>
                                <div class="controls">
                                    <textarea placeholder="Pesan ke Admin" name="custome" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                </td>
            </tr>
        </tbody>
    </table>

    <a href="index.php?page=module/Produk/index" class="btn btn-large"><i class="icon-arrow-left"></i> Lanjut Belanja </a>
    <button name="checkout" class="btn btn-large pull-right">Checkout <i class="icon-arrow-right"></i></button>
    </form>
    <?php
    if (isset($_POST['checkout'])) {
        // $keranjang[] = $_SESSION['keranjang'];
        $db->Checkout($_POST, $_SESSION['keranjang']);
    } ?>
</div>