<?php
include 'conf.php';
session_start();
class Db extends Conf
{
    public function getAllAdmin()
    {
        $query = $this->getAll("SELECT * FROM tb_admin");
        return $query;
    }

    public function addAdmin($data)
    {
        global $conn;

        $user  = $data['user'];
        $pass  = $data['pass'];
        $nama  = $data['nama'];
        $level = $data['level'];

        $query = "INSERT INTO tb_admin VALUES ('','$user', '$pass', '$nama', '$level')";
        $conn->query($query);
        // echo $query;
        // exit;
        return $conn->affected_rows;
    }

    public function getOneAdmin($id)
    {
        $query = $this->getAll("SELECT * FROM tb_admin WHERE admin_id = $id")[0];
        return $query;
    }

    public function uAdmin($data)
    {
        global $conn;

        $id    = $data['id'];
        $user  = $data['user'];
        $pass  = $data['pass'];
        $nama  = $data['nama'];
        $level = $data['level'];

        $query = "UPDATE `tb_admin` SET `admin_user`  = '$user',
                                        `admin_pass`  = '$pass',
                                        `admin_nama`  = '$nama',
                                        `admin_level` = '$level' WHERE
                                        `admin_id`    = '$id'";
        // echo $query;
        // exit;
        $conn->query($query);

        return $conn->affected_rows;
    }

    public function deleteAdmin($id)
    {
        global $conn;
        $query = "DELETE FROM tb_admin WHERE admin_id = '$id'";
        $conn->query($query);

        return $conn->affected_rows;
    }

    // Pelanggan ========================================================================

    public function getAllPelanggan()
    {
        $query = $this->getAll("SELECT * FROM tb_pelanggan");
        return $query;
    }

    public function addPelanggan($data)
    {
        global $conn;

        $user   = $data['user'];
        $pass   = $data['pass'];
        $nama   = $data['nama'];
        $email  = $data['email'];
        $lahir  = $data['lahir'];
        $tlp    = $data['tlp'];
        $alamat = $data['alamat'];

        $query  = "INSERT INTO tb_pelanggan VALUES ('',
                                                    '$user', 
                                                    '$pass', 
                                                    '$nama', 
                                                    '$email', 
                                                    '$lahir', 
                                                    '$tlp', 
                                                    '$alamat')";
        $conn->query($query);
        // echo $query;
        // exit;
        return $conn->affected_rows;
    }

    public function getOnePelanggan($id)
    {
        $query = $this->getAll("SELECT * FROM tb_pelanggan WHERE pelanggan_id = $id")[0];
        return $query;
    }

    public function uPelanggan($data)
    {
        global $conn;

        $id     = $data['id'];
        $user   = $data['user'];
        $pass   = $data['pass'];
        $nama   = $data['nama'];
        $email  = $data['email'];
        $lahir  = $data['lahir'];
        $tlp    = $data['tlp'];
        $alamat = $data['alamat'];

        $query = "UPDATE `tb_pelanggan` SET pelanggan_user      = '$user',
                                            pelanggan_pass      = '$pass',
                                            pelanggan_nama      = '$nama',
                                            pelanggan_email     = '$email',
                                            pelanggan_tgl_lahir = '$lahir',
                                            pelanggan_tlp       = '$tlp',
                                            pelanggan_alamat    = '$alamat' WHERE
                                            pelanggan_id        = '$id'";
        // echo $query;
        // exit;
        $conn->query($query);

        return $conn->affected_rows;
    }

    public function deletePelanggan($id)
    {
        global $conn;
        $conn->query("DELETE FROM tb_pelanggan WHERE pelanggan_id = '$id'");

        return $conn->affected_rows;
    }
    // Supplier     ========================================================================

    public function getAllSupplier()
    {
        $query = $this->getAll("SELECT * FROM tb_supplier");
        return $query;
    }

    public function addSupplier($data)
    {
        global $conn;

        $nama   = $data['nama'];
        $alamat = $data['alamat'];
        $tlp    = $data['tlp'];
        $query  = "INSERT INTO tb_supplier VALUES ('','$nama', '$alamat', '$tlp')";
        $conn->query($query);
        // echo $query;
        // exit;
        return $conn->affected_rows;
    }

    public function deleteSupplier($id)
    {
        global $conn;
        $query = "DELETE FROM tb_supplier WHERE supplier_id = '$id'";
        $conn->query($query);

        return $conn->affected_rows;
    }

    public function getOneSupplier($id)
    {
        $query = $this->getAll("SELECT * FROM tb_supplier WHERE supplier_id = $id")[0];
        return $query;
    }

    public function uSupplier($data)
    {
        global $conn;

        $id     = $data['id'];
        $nama   = $data['nama'];
        $alamat = $data['alamat'];
        $tlp    = $data['tlp'];

        $query = "UPDATE `tb_supplier` SET   `supplier_nama`    = '$nama',
                                            `supplier_alamat`  = '$alamat',
                                            `supplier_tlp`     = '$tlp' WHERE
                                            `supplier_id`      = '$id' ";
        // echo $query;
        // exit;
        $conn->query($query);

        return $conn->affected_rows;
    }

    // Kategori     ========================================================================

    public function getAllKategori()
    {
        $query = $this->getAll("SELECT * FROM tb_kategori");
        return $query;
    }

    public function deleteKategori($id)
    {
        global $conn;
        $conn->query("DELETE FROM tb_kategori WHERE kategori_id = '$id'");
        return $conn->affected_rows;
    }

    public function addKategori($data)
    {
        global $conn;
        $nama = $data['nama'];
        $conn->query("INSERT INTO tb_kategori VALUES ('','$nama')");
        return $conn->affected_rows;
    }

    public function getOneKategori($id)
    {
        $query = $this->getAll("SELECT * FROM tb_kategori WHERE kategori_id = '$id'")[0];
        return $query;
    }

    public function uKategori($data)
    {
        global $conn;
        $id = $data['id'];
        $nama = $data['nama'];
        $conn->query("UPDATE tb_kategori SET kategori_nama = '$nama' WHERE kategori_id = '$id'");
        return $conn->affected_rows;
    }

    // Produk       ========================================================================

    public function getTerbaruProduk()
    {
        $query = $this->getAll("SELECT * FROM tb_produk LEFT JOIN tb_kategori ON tb_produk.kategori_id=tb_kategori.kategori_id LIMIT 4");
        return $query;
    }

    public function getKategoriProduk($id)
    {
        $query = $this->getAll("SELECT * FROM tb_produk LEFT JOIN tb_kategori ON tb_produk.kategori_id=tb_kategori.kategori_id WHERE tb_produk.kategori_id = '$id'");
        return $query;
    }

    public function getAllProduk()
    {
        $query = $this->getAll("SELECT * FROM tb_produk LEFT JOIN tb_kategori ON tb_produk.kategori_id=tb_kategori.kategori_id");
        return $query;
    }


    public function addProduk($data, $gambar)
    {
        global $conn;
        // echo "<pre>";
        // var_dump($gambar['name']);
        // var_dump($data['nama']);
        // echo "</pre>";
        // exit;


        $namaGambar = $gambar['name'];
        $lokasi     = $gambar['tmp_name'];

        move_uploaded_file($lokasi, "assets/gambar_produk/$namaGambar");

        $nama     = $data['nama'];
        $kategori = $data['kategori'];
        $harga    = $data['harga'];
        $stok     = $data['stok'];
        $desk     = $data['deskripsi'];
        $supplier = $data['supplier'];



        $query = "INSERT INTO tb_produk VALUES ('',
                                                '$kategori',
                                                '$supplier',
                                                '$nama',
                                                '$harga',
                                                '$stok',
                                                '$desk',
                                                '$namaGambar',
                                                NOW())";
        $conn->query($query);
        // echo $query;
        // exit;
        return $conn->affected_rows;
    }

    public function getOneProduk($id)
    {
        $query = $this->getAll("SELECT * FROM tb_produk 
                                LEFT JOIN tb_kategori ON tb_produk.kategori_id=tb_kategori.kategori_id 
                                LEFT JOIN tb_supplier ON tb_produk.supplier_id=tb_supplier.supplier_id 
                                WHERE tb_produk.produk_id = '$id'")[0];
        return $query;
    }

    public function uProduk($data, $gambar)
    {
        global $conn;
        // echo "<pre>";
        // var_dump($gambar['name']);
        // var_dump($data['nama']);
        // echo "</pre>";
        // exit;

        $namaGambar = $gambar['name'];
        $lokasi     = $gambar['tmp_name'];

        move_uploaded_file($lokasi, "assets/gambar_produk/$namaGambar");

        $id       = $data['id'];
        $nama     = $data['nama'];
        $kategori = $data['kategori'];
        $harga    = $data['harga'];
        $stok     = $data['stok'];
        $desk     = $data['deskripsi'];
        $supplier = $data['supplier'];

        $query = "UPDATE tb_produk  SET     `kategori_id`='$kategori',
                                            `supplier_id`='$supplier',
                                            `produk_nama`='$nama',
                                            `produk_harga`='$harga',
                                            `produk_stok`='$stok',
                                            `produk_desk`='$desk',
                                            -- `produk_gambar`= '$namaGambar',
                                            `produk_tgl_post`= NOW() WHERE 
                                            `produk_id`= '$id' ";
        $conn->query($query);
        // echo $query;
        // exit;
        return $conn->affected_rows;
    }

    public function deleteProduk($id)
    {
        global $conn;
        $query = "DELETE FROM tb_produk WHERE produk_id = '$id'";
        $conn->query($query);
        return $conn->affected_rows;
    }

    public function uStok($data)
    {
        global $conn;

        $id       = $data['id'];
        $stok     = $data['stok'];

        $query = "UPDATE tb_produk  SET `produk_stok`='$stok' WHERE 
                                        `produk_id`= '$id' ";
        $conn->query($query);
        // echo $query;
        // exit;
        return $conn->affected_rows;
    }

    // Ongkir ===========================================================================================

    public function getAllOngkir()
    {
        $query = $this->getAll("SELECT * FROM tb_ongkir");
        return $query;
    }

    public function deleteOngkir($id)
    {
        global $conn;
        $conn->query("DELETE FROM tb_ongkir WHERE ongkir_id = '$id'");
        return $conn->affected_rows;
    }

    public function addOngkir($data)
    {
        global $conn;
        $kota  = $data['kota'];
        $tarif = $data['tarif'];
        $conn->query("INSERT INTO tb_ongkir VALUES ('','$kota','$tarif')");
        return $conn->affected_rows;
    }

    public function getOneOngkir($id)
    {
        $query = $this->getAll("SELECT * FROM tb_ongkir WHERE ongkir_id = '$id'")[0];
        return $query;
    }

    public function uOngkir($data)
    {
        global $conn;
        $id    = $data['id'];
        $kota  = $data['kota'];
        $tarif = $data['tarif'];
        $conn->query("UPDATE tb_ongkir SET  ongkir_kota  = '$kota', 
                                            ongkir_tarif = '$tarif' 
                                            WHERE 
                                            ongkir_id = '$id'");
        return $conn->affected_rows;
    }

    // Checkout  =================================================================================================

    public function Checkout($data, $keranjang)
    {
        global $conn;
        $id     = $data['id'];
        $ongkir = $data['ongkir'];
        $kota   = $data['kota'];
        $total  = $data['total'];
        $alamat = $data['alamat'];
        $custome     = $data['custome'];
        // Mendpatkan Nilai Ongkir
        $gOngkir       = $this->getOneOngkir($ongkir);
        $kota          = $gOngkir->ongkir_kota;
        $tarif         = $gOngkir->ongkir_tarif;
        $total_belanja = $tarif + $total;
        $tgl           = date("Y-d-m");
        $dua_hari      = mktime(0, 0, 0, date("n") + 2, date("j"), date("Y"));
        $kedepan       = date("Y-d-m", $dua_hari);


        $query = "INSERT INTO `tb_pemesanan`( `pelanggan_id`, `ongkir_id`, `pemesanan_tgl`, `pemesanan_total`, `pemesanan_kota`, `pemesanan_tarif`, `pemesanan_alamat_pengiriman`, `pemesanan_custome`, `pemesanan_expired`)
                                                VALUES 
                                                (
                                                    '$id',
                                                    '$ongkir',
                                                    '$tgl',
                                                    '$total_belanja',
                                                    '$kota',
                                                    '$tarif',
                                                    '$alamat',
                                                    '$custome',
                                                    '$kedepan'                                       
                                                    )";
        // echo $query;
        // exit;
        $conn->query($query);
        $last_id = $conn->insert_id;
        foreach ($keranjang as $id_produk_keranjang => $jumlah) {
            $dProduk = $this->getOneProduk($id_produk_keranjang);
            $harga = $dProduk->produk_harga;
            $sub_harga = $harga * $jumlah;
            $query_detail = "INSERT INTO `tb_detail`(   `pemesanan_id`, 
                                                        `produk_id`, 
                                                        `detail_jumlah`, 
                                                        `detail_harga`, 
                                                        `detail_sub_harga`) 
                                                        VALUES 
                                                        (
                                                            '$last_id',
                                                            '$id_produk_keranjang',
                                                            '$jumlah',
                                                            '$harga',
                                                            '$sub_harga'
                                                        )";
            $conn->query($query_detail);
        }
        unset($_SESSION['keranjang']);
        echo "<script>alert('Pembelian Sukses');</script>";
        echo "<script>window.location='index.php?page=module/Nota/index&id=$last_id';</script>";
    }

    // Pemesanan =================================================================================================

    public function getAllPemesanan()
    {
        $query = $this->getAll("SELECT * FROM tb_pemesanan 
                                LEFT JOIN tb_pelanggan ON tb_pemesanan.pelanggan_id=tb_pelanggan.pelanggan_id
                                ");
        return $query;
    }

    public function getOnePemesanan($id)
    {
        $query = $this->getAll("SELECT * FROM tb_pemesanan LEFT JOIN tb_pelanggan ON tb_pemesanan.pelanggan_id=tb_pelanggan.pelanggan_id WHERE tb_pemesanan.pemesanan_id= '$id' ")[0];
        return $query;
    }

    public function getOnePemesananPelanggan($id)
    {
        $query = $this->getAll("SELECT * FROM tb_pemesanan LEFT JOIN tb_pelanggan ON tb_pemesanan.pelanggan_id=tb_pelanggan.pelanggan_id WHERE tb_pemesanan.pelanggan_id= '$id' ");
        return $query;
    }

    public function getDetail($id)
    {
        $query = $this->getAll("SELECT * FROM tb_detail 
        LEFT JOIN tb_produk ON tb_detail.produk_id=tb_produk.produk_id
        LEFT JOIN tb_pemesanan ON tb_detail.pemesanan_id=tb_pemesanan.pemesanan_id
        LEFT JOIN tb_pelanggan ON tb_pemesanan.pelanggan_id=tb_pelanggan.pelanggan_id
        WHERE tb_detail.pemesanan_id= '$id' ");
        return $query;
    }
    // Pembayaran ==================================================================================

    public function addPembayaran($data)
    {
        global $conn;
        var_dump($data);
        exit;
    }

    public function getPembayaranPemesanan($id)
    {
        $query = $this->getAll("SELECT * FROM tb_pembayaran WHERE pemesanan_id = '$id' ");
        return $query;
    }


    public function getPembayaran($id)
    {
        $query = $this->getAll("SELECT * FROM tb_pembayaran WHERE pembayaran_id = '$id' ");
        return $query;
    }

    public function uPemesanan($data)
    {
        global $conn;
        $id     = $data['id'];
        $status = $data['status'];

        $query  = "UPDATE tb_pemesanan SET  pemesanan_status  = '$status' WHERE
                                            pemesanan_id      = '$id' ";

        $conn->query($query);

        return $conn->affected_rows;
    }

    public function addKonfirmasi($data, $gambar)
    {
        global $conn;
        $id     = $data['id'];
        $nama   = $data['nama'];
        $metode = $data['metode'];
        $bank   = $data['bank'];
        $jumlah = $data['jumlah'];

        $nama_gambar  = $gambar['name'];
        $lokasi  = $gambar['tmp_name'];

        move_uploaded_file($lokasi, "admin/assets/gambar_bukti/$nama_gambar");
        $conn->query("INSERT INTO `tb_pembayaran`(  `pemesanan_id`, 
                                                    `pembayaran_metode`, 
                                                    `pembayaran_nama_pengirim`, 
                                                    `pembayaran_bank`, 
                                                    `pembayaran_jumlah`, 
                                                    `pembayaran_tgl`, 
                                                    `pembayaran_gambar_bukti`) 
                                                    VALUES 
                                                    (
                                                        '$id',
                                                        '$metode',
                                                        '$nama',
                                                        '$bank',
                                                        '$jumlah',
                                                        NOW(),
                                                        '$nama_gambar'
                                                        )");
        return $conn->affected_rows;
    }

    public function Login($data)
    {
        global $conn;

        $username = $data['username'];
        $password = $data['password'];

        $ambil = $conn->query("SELECT * FROM tb_pelanggan WHERE pelanggan_user = '$username' AND pelanggan_pass = '$password'");
        $pecah = $ambil->fetch_object();
        $cek = $ambil->num_rows;

        if ($cek == 1) {

            $_SESSION['akun'] = $pecah;
            echo "
            <script>
            alert('Anda berhasil login');
            window.location='index.php?page=module/Riwayat/index';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('Anda berhasil login');
            window.location='index.php?page=module/Riwayat/index';
            </script>
            ";
        }
    }
    public function LoginAdmin($data)
    {
        global $conn;

        $username = $data['username'];
        $password = $data['password'];
        $level    = $data['level'];

        $ambil = $conn->query("SELECT * FROM tb_admin WHERE admin_user = '$username' AND admin_pass = '$password'");
        $pecah = $ambil->fetch_object();
        $cek = $ambil->num_rows;

        if ($cek == 1) {

            if ($level != $pecah->admin_level) {
                echo "
                <script>
                alert('Pilih level dengan benar');
                window.location='login.php';
                </script>
                ";
            } else {
                $_SESSION['admin'] = $pecah;
                echo "
                <script>
                alert('Anda berhasil login');
                window.location='index.php';
                </script>
                ";
            }
        } else {
            echo "
            <script>
            alert('Anda gagal login');
            window.location='login.php';
            </script>
            ";
        }
    }
}
