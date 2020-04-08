<div class="span9">
	<div class="well well-small">
		<h4>Produk Terbaru <small class="pull-right">Hanya di UKM Dua Putra</small></h4>
		<div class="row-fluid">
			<div id="featured" class="carousel slide">
				<div class="carousel-inner">
					<div class="item active">
						<ul class="thumbnails">
							<?php
							foreach ($db->getTerbaruProduk() as $dProdukTerbaru) {
								// var_dump($dProdukTerbaru);
							?>
								<li class="span3">
									<div class="thumbnail">
										<i class="tag"></i>
										<a href="index.php?page=module/Detail/index&id=<?= $dProdukTerbaru->produk_id ?>"><img style="width: 160px; height: 160px" src="admin/assets/gambar_produk/<?= $dProdukTerbaru->produk_gambar ?>" alt=""></a>
										<div class="caption">
											<h5><?= $dProdukTerbaru->produk_nama ?></h5>
											<h4>
												<a class="btn" href="index.php?page=module/Detail/index&id=<?= $dProdukTerbaru->produk_id ?>">Detail</a>
												<span class=" pull-right">Rp. <?= number_format($dProdukTerbaru->produk_harga); ?></span>
											</h4>
										</div>
									</div>
								</li>
							<?php } ?>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</div>
	<h4>Top Produk </h4>
	<ul class="thumbnails">
		<?php
		foreach ($db->getTerbaruProduk() as $dProdukTerbaru) {
			// var_dump($dProdukTerbaru);
		?>
			<li class="span3">
				<div class="thumbnail">
					<a href="index.php?page=module/Detail/index&id=<?= $dProdukTerbaru->produk_id ?>"><img style="width: 160px; height: 160px" src="admin/assets/gambar_produk/<?= $dProdukTerbaru->produk_gambar ?>" alt="" /></a>
					<div class="caption">
						<h5><?= $dProdukTerbaru->produk_nama ?></h5>
						<p>
							Lorem Ipsum is simply dummy text.
						</p>

						<h4 style="text-align:center">
							<a class="btn" href="index.php?page=module/Detail/index&id=<?= $dProdukTerbaru->produk_id ?>"> <i class="icon-zoom-in"></i></a>
							<?php
							if ($dProdukTerbaru->produk_stok == 0) {
							?>
								<a disabled type="submit" class="btn"><span class="icon-ban-circle"></span>
									Stok Tidak Tersedia</a>
							<?php } else { ?>
								<a class="btn" href="index.php?page=module/Keranjang/beli&id=<?= $dProdukTerbaru->produk_id ?>">Tambah ke Keranjang <i class="icon-shopping-cart"></i></a>
							<?php } ?>
							<a class="btn btn-primary" href="index.php?page=module/Detail/index&id=<?= $dProdukTerbaru->produk_id ?>">Rp. <?= number_format($dProdukTerbaru->produk_harga); ?></a></h4>
					</div>
				</div>
			</li>
		<?php } ?>
	</ul>

</div>