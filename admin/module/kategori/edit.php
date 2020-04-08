<?php
if (isset($_POST["edit"])) {
    if ($db->uKategori($_POST) > 0) {
        echo "
        <script>
        alert('Data Berhasil Di Edit');
        document.location.href = 'index.php?page=module/kategori/index';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Di Edit');
        document.location.href = 'index.php?page=module/kategori/index';
        </script>";
    }
}

$id = $_GET['id'];
$dKategori = $db->getOneKategori($id);
// var_dump($dKategori);
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Edit Data Kategori</li>
</ol>

<div class="card card-register mt-3">
    <div class="card-header"> <i class="fas fa-table"></i> Edit Data Kategori</div>
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dKategori->kategori_id ?>" name="id" type="hidden">
                    <input value="<?= $dKategori->kategori_nama ?>" name="nama" type="text" class="form-control" autofocus="autofocus">
                    <label>Nama Kategori</label>
                </div>
            </div>
            <button name="edit" class="btn btn-success">Edit</button>
        </form>
    </div>
</div>