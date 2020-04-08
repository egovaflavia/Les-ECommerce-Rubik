<div id="header">
    <div class="container">
        <div id="welcomeLine" class="row">
            <div class="span6">
            </div>
        </div>
        <!-- Navbar ================================================== -->
        <div id="logoArea" class="navbar">
            <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-inner">
                <a class="brand" href="index.php">UKM Dua Putra</a>
                <ul id="topMenu" class="nav pull-right">
                    <li class=""><a href="index.php?page=module/Produk/index">Produk</a></li>
                    <li class=""><a href="index.php?page=module/Profil/index">Profil</a></li>
                    <li class=""><a href="index.php?page=module/Keranjang/index">Keranjang Belanja</a></li>

                    <?php
                    if (isset($_SESSION['akun'])) {
                    ?>
                        <li class=""><a href="index.php?page=module/Riwayat/index">Riwayat Belanja</a></li>
                        <li class=""><a href="index.php?page=module/Logout/index">Logout</a></li>
                    <?php } else { ?>
                        <li class=""><a href="index.php?page=module/Daftar/index">Daftar</a></li>
                        <li class="">
                            <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
                            <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3>Login</h3>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" class="form-horizontal loginFrm">
                                        <div class="control-group">
                                            <input name="username" type="text" placeholder="Username">
                                        </div>
                                        <div class="control-group">
                                            <input name="password" type="password" placeholder="Password">
                                        </div>
                                        <div class="control-group">
                                            <input class="btn btn-primary" type="submit" name="login" value="Login">
                                        </div>
                                    </form>
                                    <?php
                                    if (isset($_POST['login'])) {
                                        $db->Login($_POST);
                                    }
                                    ?>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>