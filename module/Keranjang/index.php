<?php
// jk kosong keranjang belanja,mk larikan ke index
if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang Kosong, Silahkan Berbelanja Dahulu');</script>";
    echo "<script>window.location='index.php?page=module/Produk/index'</script>";
}
?>
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
        <li class="active"> Keranjang Belanja</li>
    </ul>
    <h3> Keranjang Belanja <a href="index.php?page=module/Produk/index" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Lanjut Belanja </a></h3>
    <hr class="soft" />
    <?php
    if (!isset($_SESSION['akun'])) { ?>
        <table class="table table-bordered">
            <tr>
                <th> Login </th>
            </tr>
            <tr>
                <td>
                    <form method="POST" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">Username</label>
                            <div class="controls">
                                <input name="username" type="text" placeholder="Username">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Password</label>
                            <div class="controls">
                                <input name="password" type="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button name="login" type="submit" class="btn">Login</button> OR <a href="index.php?page=module/Daftar/index" class="btn">Daftar</a>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['login'])) {
                        $db->Login($_POST);
                    }
                    ?>
                </td>
            </tr>
        </table>
    <?php } ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar Produk</th>
                <th>Nama Produk</th>
                <th width="140px">Jumlah</th>
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
                        <div class="input-append">
                            <input class="span1" style="max-width:34px" readonly value="<?= $jumlah ?>" id="appendedInputButtons" size="16" type="text">
                            <a href="index.php?page=module/Keranjang/kurang&id=<?= $dProduk->produk_id ?>" class="btn btn-warning "><i class="icon-minus"></i></a>
                            <a href="index.php?page=module/Keranjang/beli&id=<?= $dProduk->produk_id ?>" class="btn "><i class="icon-plus"></i></a>
                            <a href="index.php?page=module/Keranjang/hapus&id=<?= $dProduk->produk_id ?>" class="btn btn-danger"><i class="icon-remove icon-white"></i></a>
                        </div>
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
        </tbody>
    </table>


    <a href="index.php?page=module/Produk/index" class="btn btn-large"><i class="icon-arrow-left"></i> Lanjut Belanja </a>
    <a href="index.php?page=module/Checkout/index" class="btn btn-large pull-right">Checkout <i class="icon-arrow-right"></i></a>

</div>