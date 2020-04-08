<?php
if (isset($_POST["simpan"])) {
    if ($db->addPelanggan($_POST) > 0) {
        echo "
        <script>
        alert('Data Berhasil Ditambah');
        document.location.href = 'index.php?page=module/pelanggan/index';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Ditambah');
        document.location.href = 'index.php?page=module/pelanggan/index';
        </script>";
    }
}
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data pelanggan</li>
</ol>

<div class="card card-register mt-3">
    <div class="card-header"> <i class="fas fa-table"></i> Tambah Data pelanggan</div>
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <div class="form-label-group">
                    <input name="user" type="text" class="form-control" autofocus>
                    <label>Username</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="pass" type="text" class="form-control">
                    <label>Password</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="nama" type="text" class="form-control">
                    <label>Nama</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="email" type="text" class="form-control">
                    <label>Email</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="lahir" type="date" class="form-control" Lahir">
                    <label>Tanggal Lahir</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="tlp" type="number" min="0" class="form-control" Telephone">
                    <label>No Telephone</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input name="alamat" type="text" class="form-control">
                    <label>Alamat</label>
                </div>
            </div>
            <button name="simpan" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>