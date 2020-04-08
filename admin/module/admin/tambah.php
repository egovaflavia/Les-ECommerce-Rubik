<?php
if (isset($_POST["simpan"])) {
    if ($db->addAdmin($_POST) > 0) {
        echo "
        <script>
        alert('Data Berhasil Ditambah');
        document.location.href = 'index.php?page=module/admin/index';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Ditambah');
        document.location.href = 'index.php?page=module/admin/index';
        </script>";
    }
}
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Data Admin</li>
</ol>

<div class="card card-register mt-3">
    <div class="card-header"> <i class="fas fa-table"></i> Tambah Data Admin</div>
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <div class="form-label-group">
                    <input name="user" type="text" class="form-control" autofocus="autofocus">
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
                <label>Level</label>
                <div class="form-label-group">
                    <select name="level" class="form-control">
                        <option value="Admin">Admin</option>
                        <option value="Karyawan">Karyawan</option>
                        <option value="Supplier">Supplier</option>
                        <option value="Pimpinan">Pimpinan</option>
                    </select>
                </div>
            </div>
            <button name="simpan" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>