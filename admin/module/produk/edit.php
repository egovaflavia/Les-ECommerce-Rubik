<?php
if (isset($_POST["edit"])) {
    $gambar_nama   = $_FILES['gambar'];
    if ($db->uProduk($_POST, $gambar_nama, $gambar_lokasi) > 0) {
        echo "
        <script>
        alert('Data Berhasil Di Edit');
        document.location.href = 'index.php?page=module/produk/index';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Di Edit');
        document.location.href = 'index.php?page=module/produk/index';
        </script>";
    }
}

$id = $_GET['id'];
$dProduk = $db->getOneProduk($id);
// var_dump($dProduk);
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Produk</li>
</ol>

<div class="card card-register mt-3">
    <div class="card-header"> <i class="fas fa-table"></i> Edit Data Produk</div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dProduk->produk_id ?>" name="id" type="hidden">
                    <input value="<?= $dProduk->produk_nama ?>" name="nama" type="text" class="form-control" autofocus>
                    <label>Nama Produk</label>
                </div>
            </div>
            <div class="form-group">
                <label>Supplier</label>
                <div class="form-label-group">
                    <select class="form-control" name="supplier">
                        <?php
                        foreach ($db->getAllSupplier() as $dSupplier) {
                        ?>
                            <option value="<?= $dSupplier->supplier_id ?>"><?= $dSupplier->supplier_nama ?></option>
                        <?php } ?>
                    </select>

                    <script>
                        document.getElementsByName("supplier")[0].value = "<?= $dProduk->supplier_id ?>";
                    </script>

                </div>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <div class="form-label-group">
                    <select class="form-control" name="kategori">
                        <?php
                        foreach ($db->getAllKategori() as $dKategori) {
                        ?>
                            <option value="<?= $dKategori->kategori_id ?>"><?= $dKategori->kategori_nama ?></option>
                        <?php } ?>
                    </select>

                    <script>
                        document.getElementsByName("kategori")[0].value = "<?= $dProduk->kategori_id ?>";
                    </script>

                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dProduk->produk_harga ?>" name="harga" type="number" min="1" class="form-control">
                    <label>Harga</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dProduk->produk_stok ?>" name="stok" type="number" min="1" class="form-control">
                    <label>Stok</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dProduk->produk_desk ?>" name="deskripsi" type="text" class="form-control">
                    <label>Deskripsi</label>
                </div>
            </div>

            <button name="edit" class="btn btn-success">Edit</button>
        </form>
    </div>
</div>