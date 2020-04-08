<?php
if (isset($_POST["edit"])) {
    if ($db->uSupplier($_POST) > 0) {
        echo "
        <script>
        alert('Data Berhasil Di Edit');
        document.location.href = 'index.php?page=module/supplier/index';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Di Edit');
        document.location.href = 'index.php?page=module/supplier/index';
        </script>";
    }
}

$id = $_GET['id'];
$dSupplier = $db->getOneSupplier($id);
// var_dump($dSupplier);
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Edit Data Supplier</li>
</ol>

<div class="card card-register mt-3">
    <div class="card-header"> <i class="fas fa-table"></i> Edit Data Supplier</div>
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dSupplier->supplier_id ?>" name="id" type="hidden" class="form-control">
                    <input value="<?= $dSupplier->supplier_nama ?>" name="nama" type="text" class="form-control" autofocus="autofocus">
                    <label>Nama Supplier</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dSupplier->supplier_alamat ?>" name="alamat" type="text" class="form-control">
                    <label>Alamat Supplier</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dSupplier->supplier_tlp ?>" name="tlp" type="number" class="form-control">
                    <label>No Telp. Supplier</label>
                </div>
            </div>
            <button name="edit" class="btn btn-success">Edit</button>
        </form>
    </div>
</div>