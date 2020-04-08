<?php
if (isset($_POST["edit"])) {
    if ($db->uStok($_POST) > 0) {
        echo "
        <script>
        alert('Data Berhasil Di Edit');
        document.location.href = 'index.php?page=module/stok/index';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Di Edit');
        document.location.href = 'index.php?page=module/stok/index';
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
                    <input readonly value="<?= $dProduk->produk_id ?>" name="id" type="hidden">
                    <input readonly value="<?= $dProduk->produk_nama ?>" name="nama" type="text" class="form-control" autofocus>
                    <label>Nama Produk</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dProduk->produk_stok ?>" name="stok" type="number" min="1" class="form-control">
                    <label>Stok</label>
                </div>
            </div>
            <button name="edit" class="btn btn-success">Edit</button>
        </form>
    </div>
</div>