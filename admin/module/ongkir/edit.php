<?php
if (isset($_POST["edit"])) {
    if ($db->uOngkir($_POST) > 0) {
        echo "
        <script>
        alert('Data Berhasil Di Edit');
        document.location.href = 'index.php?page=module/ongkir/index';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Di Edit');
        document.location.href = 'index.php?page=module/ongkir/index';
        </script>";
    }
}

$id = $_GET['id'];
$dOngkir = $db->getOneOngkir($id);
// var_dump($dOngkir);
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Edit Data Ongkir</li>
</ol>

<div class="card card-register mt-3">
    <div class="card-header"> <i class="fas fa-table"></i> Edit Data Ongkir</div>
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dOngkir->ongkir_id ?>" name="id" type="hidden">
                    <input value="<?= $dOngkir->ongkir_kota ?>" name="kota" type="text" class="form-control" autofocus="autofocus">
                    <label>Kota Tujuan</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dOngkir->ongkir_tarif ?>" name="tarif" min="1" type="number" class="form-control">
                    <label>Tarif</label>
                </div>
            </div>
            <button name="edit" class="btn btn-success">Edit</button>
        </form>
    </div>
</div>