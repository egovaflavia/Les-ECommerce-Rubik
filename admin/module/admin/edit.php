<?php
if (isset($_POST["edit"])) {
    if ($db->uAdmin($_POST) > 0) {
        echo "
        <script>
        alert('Data Berhasil Di Edit');
        document.location.href = 'index.php?page=module/admin/index';
        </script>";
    } else {
        echo "<script>
        alert('Data Gagal Di Edit');
        document.location.href = 'index.php?page=module/admin/index';
        </script>";
    }
}

$id = $_GET['id'];
$dAdmin = $db->getOneAdmin($id);
// var_dump($dAdmin);
?>
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="index.php">Home</a>
    </li>
    <li class="breadcrumb-item active">Edit Data Admin</li>
</ol>

<div class="card card-register mt-3">
    <div class="card-header"> <i class="fas fa-table"></i> Edit Data Admin</div>
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dAdmin->admin_id ?>" name="id" type="hidden">
                    <input value="<?= $dAdmin->admin_user ?>" name="user" type="text" class="form-control" autofocus="autofocus">
                    <label>Username</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dAdmin->admin_pass ?>" name="pass" type="text" class="form-control">
                    <label>Password</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dAdmin->admin_nama ?>" name="nama" type="text" class="form-control">
                    <label>Nama</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <input value="<?= $dAdmin->admin_level ?>" name="level" type="text" class="form-control">
                    <label>Level</label>
                </div>
            </div>
            <button name="edit" class="btn btn-success">Edit</button>
        </form>
    </div>
</div>