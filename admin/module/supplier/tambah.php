<?php
if (isset($_POST["simpan"])) {
    if ($db->addSupplier($_POST) > 0) {
        echo "
        <script>
        alert('Data Berhasil Ditambah');
        document.location.href = 'index.php?page=module/supplier/index';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Ditambah');
        document.location.href = 'index.php?page=module/supplier/index';
        </script>";
    }
}
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Supplier</li>
</ol>

<div class="card card-register mt-3">
    <div class="card-header"> <i class="fas fa-table"></i> Tambah Data Supplier</div>
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <div class="form-label-group">
                    <input name="nama" type="text" class="form-control" autofocus="autofocus">
                    <label>Nama Supplier</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="alamat" type="text" class="form-control">
                    <label>Alamat Supplier</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="tlp" type="number" class="form-control">
                    <label>No Telp. Supplier</label>
                </div>
            </div>
            <button name="simpan" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>