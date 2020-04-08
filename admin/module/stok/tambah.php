<?php
if (isset($_POST["simpan"])) {
    $gambar_nama   = $_FILES['gambar'];
    // $gambar_nama   = $_FILES['gambar']['name'];
    // $gambar_lokasi = $_FILES['gambar']['tmp_name'];
    if ($db->addProduk($_POST, $gambar_nama, $gambar_lokasi) > 0) {
        echo "
        <script>
        alert('Data Berhasil Ditambah');
        document.location.href = 'index.php?page=module/produk/index';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Ditambah');
        document.location.href = 'index.php?page=module/produk/index';
        </script>";
    }
}

$dKategori = $db->getAllKategori();
$dSupplier = $db->getAllSupplier();
// var_dump($dKategori);
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data produk</li>
</ol>

<div class="card card-register mt-3">
    <div class="card-header"> <i class="fas fa-table"></i> Tambah Data produk</div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <div class="form-label-group">
                    <input name="nama" type="text" class="form-control" autofocus>
                    <label>Nama Produk</label>
                </div>
            </div>
            <div class="form-group">
                <label>Supplier</label>
                <div class="form-label-group">
                    <select class="form-control" name="supplier">
                        <?php
                        foreach ($dSupplier as $dSupplier) {
                        ?>
                            <option value="<?= $dSupplier->supplier_id ?>"><?= $dSupplier->supplier_nama ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <div class="form-label-group">
                    <select class="form-control" name="kategori">
                        <?php
                        foreach ($dKategori as $dKategori) {
                        ?>
                            <option value="<?= $dKategori->kategori_id ?>"><?= $dKategori->kategori_nama ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="harga" type="number" min="1" class="form-control">
                    <label>Harga</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="stok" type="number" min="1" class="form-control">
                    <label>Stok</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="deskripsi" type="text" class="form-control">
                    <label>Deskripsi</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="gambar" id="file" type="file" class="form-control">
                    <label>Gambar</label>
                    <img width="400px" src="" alt="Tidak ada gambar" id="gambar_thumbnail">
                </div>
                <script>
                    var fileInput = document.getElementById('file');

                    fileInput.addEventListener('change', function() {
                        document.getElementById("gambar_thumbnail").src = URL.createObjectURL(fileInput.files[0]);
                    });
                </script>
            </div>

            <button name="simpan" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>