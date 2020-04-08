<?php
if (isset($_POST["simpan"])) {
    if ($db->addOngkir($_POST) > 0) {
        echo "
        <script>
        alert('Data Berhasil Ditambah');
        document.location.href = 'index.php?page=module/ongkir/index';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Ditambah');
        document.location.href = 'index.php?page=module/ongkir/index';
        </script>";
    }
}
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Ongkir</li>
</ol>

<div class="card card-register mt-3">
    <div class="card-header"> <i class="fas fa-table"></i> Tambah Data Ongkir</div>
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <div class="form-label-group">
                    <input name="kota" type="text" class="form-control" autofocus="autofocus">
                    <label>Kota Tujuan</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="tarif" type="number" min="1" class="form-control">
                    <label>Tarif</label>
                </div>
            </div>
            <button name="simpan" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>