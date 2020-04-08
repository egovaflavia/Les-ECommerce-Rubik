<div class="span9">
    <ul class="breadcrumb">
        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
        <li class="active"> Daftar</li>
    </ul>
    <h3> Daftar <a href="index.php?page=module/Produk/index" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Lanjut Belanja </a></h3>
    <hr class="soft" />
    <?php
    if (!isset($_SESSION['akun'])) { ?>
        <table class="table table-bordered">
            <tr>
                <th> Daftar </th>
            </tr>
            <tr>
                <td>
                    <form method="POST" class="form-horizontal">
                        <div class="control-group">
                            <div class="form-label-group">
                                <label class="control-label">Username</label>
                                <div class="controls">
                                    <input name="user" type="text" class="control" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-label-group">
                                <label class="control-label">Password</label>
                                <div class="controls">
                                    <input name="pass" type="text" class="control">
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-label-group">
                                <label class="control-label">Nama</label>
                                <div class="controls">
                                    <input name="nama" type="text" class="control">
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-label-group">
                                <label class="control-label">Email</label>
                                <div class="controls">
                                    <input name="email" type="text" class="control">
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-label-group">
                                <label class="control-label">Tanggal Lahir</label>
                                <div class="controls">
                                    <input name="lahir" type="date" class="control" Lahir">
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-label-group">
                                <label class="control-label">No Telephone</label>
                                <div class="controls">
                                    <input name="tlp" type="number" min="0" class="control" Telephone">
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-label-group">
                                <label class="control-label">Alamat</label>
                                <div class="controls">
                                    <input name="alamat" type="text" class="control">
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-label-group">
                                <div class="controls">
                                    <button name="daftar" class="btn btn-success">Daftar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['daftar'])) {
                        if ($db->addPelanggan($_POST) > 0) {
                            echo "
                            <script>
                            alert('Anda berhasil mendaftar, silahkan login');
                            window.location='index.php';
                            </script>
                            ";
                        } else {
                            echo "
                            <script>
                            alert('Anda gagal mendaftar, silahkan login');
                            window.location='index.php';
                            </script>
                            ";
                        }
                    }
                    ?>
                </td>
            </tr>
        </table>
    <?php } ?>

    <a href="index.php?page=module/Produk/index" class="btn btn-large"><i class="icon-arrow-left"></i> Lanjut Belanja </a>

</div>