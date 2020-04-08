<?php
if (isset($_POST["edit"])) {
    if ($db->uPelanggan($_POST) > 0) {
        echo "
        <script>
        alert('Data Berhasil Di Edit');
        document.location.href = 'index.php?page=module/pelanggan/index';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Di Edit');
        document.location.href = 'index.php?page=module/pelanggan/index';
        </script>";
    }
}

$id = $_GET['id'];
$dPelanggan = $db->getOnePelanggan($id);
// var_dump($dPelanggan);
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data pelanggan</li>
</ol>

<div class="card card-register mt-3">
    <div class="card-header"> <i class="fas fa-table"></i> Edit Data pelanggan</div>
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dPelanggan->pelanggan_id ?>" name="id" type="hidden">
                    <input value="<?= $dPelanggan->pelanggan_user ?>" name="user" type="text" class="form-control" autofocus>
                    <label>Username</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dPelanggan->pelanggan_pass ?>" name="pass" type="text" class="form-control">
                    <label>Password</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dPelanggan->pelanggan_nama ?>" name="nama" type="text" class="form-control">
                    <label>Nama</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dPelanggan->pelanggan_email ?>" name="email" type="text" class="form-control">
                    <label>Email</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dPelanggan->pelanggan_tgl_lahir ?>" name="lahir" type="date" class="form-control" Lahir">
                    <label>Tanggal Lahir</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dPelanggan->pelanggan_tlp ?>" name="tlp" type="number" min="0" class="form-control" Telephone">
                    <label>No Telephone</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dPelanggan->pelanggan_alamat ?>" name="alamat" type="text" class="form-control">
                    <label>Alamat</label>
                </div>
            </div>
            <button name="edit" class="btn btn-success">Edit</button>
        </form>
    </div>
</div>