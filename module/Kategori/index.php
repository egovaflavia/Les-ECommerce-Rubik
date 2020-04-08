<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.html">Home</a> <span class="divider">/</span></li>
        <li class="active">List Produk</li>
    </ul>
    <h3>Daftar Produk <small class="pull-right"> RUKM Dua Putra </small></h3>
    <br class="clr" />
    <div class="tab-content">
        <ul class="thumbnails">
            <?php
            $id = $_GET['id'];
            foreach ($db->getKategoriProduk($id) as $dProduk) {
                // var_dump($dProduk);
            ?>
                <li class="span3">
                    <div class="thumbnail">
                        <a href="index.php?page=module/Detail/index&id=<?= $dProduk->produk_id ?>"><img style="width: 140px; height: 160px" src="admin/assets/gambar_produk/<?= $dProduk->produk_gambar ?>" alt="" /></a>
                        <div class="caption">
                            <h5><?= $dProduk->produk_nama ?></h5>
                            <h4 style="text-align:center">
                                <a class="btn" href="index.php?page=module/Detail/index&id=<?= $dProduk->produk_id ?>">
                                    <i class="icon-zoom-in"></i></a>
                                <?php
                                if ($dProduk->produk_stok == 0) {
                                ?>
                                    <a disabled type="submit" class="btn"><span class="icon-ban-circle"></span>
                                        Stok Tidak Tersedia</a>
                                <?php } else { ?>
                                    <a class="btn" href="index.php?page=module/Keranjang/beli&id=<?= $dProduk->produk_id ?>">Tambah ke Keranjang <i class="icon-shopping-cart"></i></a>
                                <?php } ?>
                                <a class="btn btn-primary" href="index.php?page=module/Detail/index&id=<?= $dProduk->produk_id ?>">Rp. <?= number_format($dProduk->produk_harga); ?></a>
                            </h4>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
        <hr class="soft" />
    </div>

</div>