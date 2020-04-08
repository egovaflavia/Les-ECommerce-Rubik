<div id="sidebar" class="span3">
    <div class="well well-small"><a id="myCart" href="index.php?page=module/Keranjang/index"><img src="assets/themes/images/ico-cart.png" alt="cart">Keranjang Belanja</a></div>
    <ul id="sideManu" class="nav nav-tabs nav-stacked">
        <li class="subMenu open"><a> Kategori</a>
            <ul>
                <?php
                foreach ($db->getAllKategori() as $dKategori) {
                    // var_dump($dKategori);
                ?>
                    <li><a href="index.php?page=module/Kategori/index&id=<?= $dKategori->kategori_id ?>"><i class="icon-chevron-right"></i><?= $dKategori->kategori_nama ?></a>
                    </li>
                <?php } ?>
            </ul>
        </li>
    </ul>
    <br />
    <div class="thumbnail">
        <a href="https://tokopedia.co.id/"><img style="width: 300px" src="admin/assets/tokopedia.png" alt="" /></a>
        <div class="caption">
            <h5><a href="https://tokopedia.com/">Tokopedia</a></h5>

        </div>
    </div><br />
    <div class="thumbnail">
        <a href="https://shopee.co.id/"><img src="admin/assets/shopee.jpg" alt=" Payments Methods"></a>
        <div class="caption">
            <h5><a href="https://shopee.co.id/">Shopee</a></h5>
        </div>
    </div>
</div>