<?php
$id = $_GET['id'];
$dProduk = $db->getOneProduk($id);
// var_dump($dProduk);
?>
<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
        <li><a href="products.html">Produk</a> <span class="divider">/</span></li>
        <li class="active">Detail</li>
    </ul>
    <div class="row">
        <div id="gallery" class="span3">
            <a href="admin/assets/gambar_produk/<?= $dProduk->produk_gambar ?>" title="<?= $dProduk->produk_nama ?>">
                <img src="admin/assets/gambar_produk/<?= $dProduk->produk_gambar ?>" style="width:100%" />
            </a>
        </div>

        <div class="span6">
            <h3><?= $dProduk->produk_nama ?> </h3>
            <hr class="soft" />
            <form class="form-horizontal qtyFrm">
                <div class="control-group">
                    <label class="control-label"><span>Rp. <?= number_format($dProduk->produk_harga); ?></span></label>
                    <div class="controls">
                        <form method="POST">
                            <input type="number" min="1" max="<?= $dProduk->produk_stok ?>" class="span1" placeholder="Qty." />
                            <button type="submit" class="btn btn-large btn-primary pull-right"> Add to cart
                                <i class=" icon-shopping-cart"></i></button>
                        </form>
                    </div>
                </div>
            </form>

            <hr class="soft" />
            <h4><?= number_format($dProduk->produk_stok) ?></h4>
            <hr class="soft clr" />
            <p>
                <?= $dProduk->produk_desk ?>

            </p>
            <br class="clr" />
            <a href="#" name="detail"></a>
            <hr class="soft" />
        </div>

        <div class="span9">
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="home">
                    <h4>Informasi Produk</h4>
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="techSpecRow">
                                <th colspan="2">Detail Produk</th>
                            </tr>
                            <tr class="techSpecRow">
                                <td class="techSpecTD1">Kategori: </td>
                                <td class="techSpecTD2"><?= $dProduk->kategori_nama ?></td>
                            </tr>
                            <tr class="techSpecRow">
                                <td class="techSpecTD1">Nama Produk:</td>
                                <td class="techSpecTD2"><?= $dProduk->produk_nama ?></td>
                            </tr>
                            <tr class="techSpecRow">
                                <td class="techSpecTD1">Harga:</td>
                                <td class="techSpecTD2">Rp. <?= number_format($dProduk->produk_harga); ?></td>
                            </tr>
                            <tr class="techSpecRow">
                                <td class="techSpecTD1">Stok:</td>
                                <td class="techSpecTD2"><?= number_format($dProduk->produk_stok); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>