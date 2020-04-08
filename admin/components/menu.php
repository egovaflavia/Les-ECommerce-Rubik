<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
        </a>
    </li>
    <?php if ($_SESSION['admin']->admin_level == "Admin") { ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Master</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="index.php?page=module/admin/index">Admin</a>
                <a class="dropdown-item" href="index.php?page=module/supplier/index">Supplier</a>
                <a class="dropdown-item" href="index.php?page=module/pelanggan/index">Pelanggan</a>
                <a class="dropdown-item" href="index.php?page=module/kategori/index">Kategori</a>
                <a class="dropdown-item" href="index.php?page=module/produk/index">Produk</a>
                <a class="dropdown-item" href="index.php?page=module/stok/index">Stok</a>
                <a class="dropdown-item" href="index.php?page=module/ongkir/index">Ongkir</a>
                <a class="dropdown-item" href="index.php?page=module/pemesanan/index">Pemesanan</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="Laporan" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Laporan</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="Laporan">
                <a class="dropdown-item" href="index.php?page=module/laporan/index">Penjulan</a>
            </div>
        </li>
    <?php } elseif ($_SESSION['admin']->admin_level == "Karyawan") { ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Master</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="index.php?page=module/supplier/index">Supplier</a>
                <a class="dropdown-item" href="index.php?page=module/pelanggan/index">Pelanggan</a>
                <a class="dropdown-item" href="index.php?page=module/kategori/index">Kategori</a>
                <a class="dropdown-item" href="index.php?page=module/produk/index">Produk</a>
                <a class="dropdown-item" href="index.php?page=module/stok/index">Stok</a>
                <a class="dropdown-item" href="index.php?page=module/ongkir/index">Ongkir</a>
                <a class="dropdown-item" href="index.php?page=module/pemesanan/index">Pemesanan</a>
            </div>
        </li>
    <?php } elseif ($_SESSION['admin']->admin_level == "Supplier") { ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Master</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="pagesDropdown">
                <a class="dropdown-item" href="index.php?page=module/stok/index">Stok</a>
            </div>
        </li>
    <?php } elseif ($_SESSION['admin']->admin_level == "Supplier") { ?>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="Laporan" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-fw fa-folder"></i>
                <span>Laporan</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="Laporan">
                <a class="dropdown-item" href="index.php?page=module/laporan/index">Penjulan</a>
            </div>
        </li>
    <?php } ?>
    <li class="nav-item">
        <a class="nav-link" href="logout.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Logout</span></a>
    </li>
</ul>