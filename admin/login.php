<?php
session_start();
include 'assets/model/db.php';
include 'assets/libs/helper/helper.php';
$db = new Db();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>eCommerce Tas</title>
    <?php include 'components/head.php' ?>
</head>

<body id="page-top">


    <div class="container">


        <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <div class="form-label-group">
                            <input name="username" type="text" class="form-control" autofocus="autofocus">
                            <label>Username</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input name="password" type="password" class="form-control">
                            <label>Password</label>
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
                    <button name="login" class=" btn btn-primary btn-block">Login</button>
                </form>
                <?php
                if (isset($_POST['login'])) {
                    $db->LoginAdmin($_POST);
                }
                ?>
            </div>
        </div>

    </div>

    <?php include 'components/scripts.php' ?>
</body>

</html>