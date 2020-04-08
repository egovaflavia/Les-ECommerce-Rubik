-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Feb 2020 pada 23.29
-- Versi Server: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penjualan_rubik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  `admin_level` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_user`, `admin_pass`, `admin_nama`, `admin_level`) VALUES
(5, 'admin', 'admin', 'Administrator', 'Admin'),
(6, 'karyawan', 'karyawan', 'Karyawan', 'Karyawan'),
(7, 'supplier', 'supplier', 'Supplier', 'Supplier'),
(8, 'pimpinan', 'pimpinan', 'Pimpinan', 'Pimpinan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail`
--

CREATE TABLE IF NOT EXISTS `tb_detail` (
  `detail_id` int(11) NOT NULL,
  `pemesanan_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `detail_jumlah` int(11) NOT NULL,
  `detail_harga` int(11) NOT NULL,
  `detail_sub_harga` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_detail`
--

INSERT INTO `tb_detail` (`detail_id`, `pemesanan_id`, `produk_id`, `detail_jumlah`, `detail_harga`, `detail_sub_harga`) VALUES
(1, 1, 11, 1, 70000, 70000),
(2, 2, 11, 1, 70000, 70000),
(3, 3, 9, 1, 50000, 50000),
(4, 0, 9, 1, 50000, 50000),
(5, 0, 9, 1, 50000, 50000),
(6, 0, 11, 1, 70000, 70000),
(7, 6, 9, 1, 50000, 50000),
(8, 7, 9, 1, 50000, 50000),
(9, 8, 9, 1, 50000, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Rubik Ganepo'),
(2, 'Rendang Ubi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ongkir`
--

CREATE TABLE IF NOT EXISTS `tb_ongkir` (
  `ongkir_id` int(11) NOT NULL,
  `ongkir_kota` varchar(50) NOT NULL,
  `ongkir_tarif` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ongkir`
--

INSERT INTO `tb_ongkir` (`ongkir_id`, `ongkir_kota`, `ongkir_tarif`) VALUES
(1, 'Padang', 25000),
(2, 'Bukittinggi', 40000),
(3, 'Dumai', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE IF NOT EXISTS `tb_pelanggan` (
  `pelanggan_id` int(11) NOT NULL,
  `pelanggan_user` varchar(50) NOT NULL,
  `pelanggan_pass` varchar(50) NOT NULL,
  `pelanggan_nama` varchar(50) NOT NULL,
  `pelanggan_email` varchar(50) NOT NULL,
  `pelanggan_tgl_lahir` date NOT NULL,
  `pelanggan_tlp` varchar(50) NOT NULL,
  `pelanggan_alamat` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`pelanggan_id`, `pelanggan_user`, `pelanggan_pass`, `pelanggan_nama`, `pelanggan_email`, `pelanggan_tgl_lahir`, `pelanggan_tlp`, `pelanggan_alamat`) VALUES
(2, 'Egova', 'asdasd12', 'Egova Riva Gustino', 'egovaflavia@gmail.com', '2020-01-01', '12358123', 'Padang'),
(3, 'Fugiat et dolorem d', 'Quam nobis voluptas ', 'Ut sint tempore rem', 'wixof@mailinator.com', '2005-07-17', '34', 'Illum perspiciatis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE IF NOT EXISTS `tb_pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `pemesanan_id` int(11) NOT NULL,
  `pembayaran_metode` varchar(100) NOT NULL,
  `pembayaran_nama_pengirim` varchar(50) NOT NULL,
  `pembayaran_bank` varchar(50) NOT NULL DEFAULT 'COD',
  `pembayaran_jumlah` int(11) NOT NULL,
  `pembayaran_tgl` date NOT NULL,
  `pembayaran_gambar_bukti` varchar(255) NOT NULL DEFAULT 'COD'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`pembayaran_id`, `pemesanan_id`, `pembayaran_metode`, `pembayaran_nama_pengirim`, `pembayaran_bank`, `pembayaran_jumlah`, `pembayaran_tgl`, `pembayaran_gambar_bukti`) VALUES
(1, 1, 'Transfer', 'Egova', 'BRI', 95000, '2020-01-16', '49fb3f3f-b8b2-478f-99da-201f4300ecf5.jpeg'),
(2, 2, 'Transfer', 'Cumque magni velit c', 'Eos et et facilis i', 85, '2020-01-16', 'BCK2.jpg'),
(4, 3, 'Cash On Delivery', 'Egova Riva Gustino', '', 90000, '2020-01-20', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemesanan`
--

CREATE TABLE IF NOT EXISTS `tb_pemesanan` (
  `pemesanan_id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `ongkir_id` int(11) NOT NULL,
  `pemesanan_tgl` date NOT NULL,
  `pemesanan_status` varchar(50) NOT NULL DEFAULT 'Pending',
  `pemesanan_total` int(11) NOT NULL,
  `pemesanan_kota` varchar(50) NOT NULL,
  `pemesanan_tarif` int(11) NOT NULL,
  `pemesanan_alamat_pengiriman` varchar(50) NOT NULL,
  `pemesanan_custome` text,
  `pemesanan_expired` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`pemesanan_id`, `pelanggan_id`, `ongkir_id`, `pemesanan_tgl`, `pemesanan_status`, `pemesanan_total`, `pemesanan_kota`, `pemesanan_tarif`, `pemesanan_alamat_pengiriman`, `pemesanan_custome`, `pemesanan_expired`) VALUES
(8, 2, 3, '2020-01-02', 'Pending', 100000, 'Dumai', 50000, 'Fugiat lorem sint t', 'Numquam dolor quos c', '2020-03-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_produk`
--

CREATE TABLE IF NOT EXISTS `tb_produk` (
  `produk_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `produk_nama` varchar(50) NOT NULL,
  `produk_harga` int(11) NOT NULL,
  `produk_stok` int(11) NOT NULL,
  `produk_desk` text NOT NULL,
  `produk_gambar` varchar(50) NOT NULL,
  `produk_tgl_post` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_produk`
--

INSERT INTO `tb_produk` (`produk_id`, `kategori_id`, `supplier_id`, `produk_nama`, `produk_harga`, `produk_stok`, `produk_desk`, `produk_gambar`, `produk_tgl_post`) VALUES
(9, 1, 1, 'RG-01', 50000, 104, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum consequuntur delectus libero! Voluptatum aspernatur quidem, saepe eius repellendus culpa eos debitis asperiores earum veniam modi, expedita neque! Quo, amet delectus?', 'rubik.jpeg', '2020-01-20'),
(11, 2, 1, 'RU-01', 70000, 100, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum consequuntur delectus libero! Voluptatum aspernatur quidem, saepe eius repellendus culpa eos debitis asperiores earum veniam modi, expedita neque! Quo, amet delectus?', 'rendanubi.jpeg', '2020-01-16'),
(13, 2, 4, 'Eveniet maxime labo', 36, 79, 'Quia sit porro recu', 'bf86bc3a-cde6-4b2a-a221-db2e5257941f_169.jpeg', '2020-01-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE IF NOT EXISTS `tb_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_nama` varchar(100) NOT NULL,
  `supplier_alamat` varchar(100) NOT NULL,
  `supplier_tlp` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`supplier_id`, `supplier_nama`, `supplier_alamat`, `supplier_tlp`) VALUES
(1, 'CV. Mandiri Jaya', 'Jln. Veteran No. 21 Padang Pariaman- Sumatera Barat', '0752-32123'),
(4, 'Assumenda qui quo ha', 'Commodi ipsam aliqua', '22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_detail`
--
ALTER TABLE `tb_detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  ADD PRIMARY KEY (`ongkir_id`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`pemesanan_id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_detail`
--
ALTER TABLE `tb_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_ongkir`
--
ALTER TABLE `tb_ongkir`
  MODIFY `ongkir_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `pemesanan_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
