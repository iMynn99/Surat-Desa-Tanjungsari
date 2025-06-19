<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<?php
if (isset($_GET['id_request_skk'])) {
    $id = $_GET['id_request_skk'];
    $id_ajuan = $_GET['id_request_skk'];
    $sql = "SELECT * FROM data_request_skk natural join data_user WHERE id_request_skk='$id'";
    $query = mysqli_query($konek, $sql);
    $data = mysqli_fetch_array($query, MYSQLI_BOTH);
    $id = $data['id_request_skk'];
    $nik = $data['nik'];
    $nama = $data['nama'];
    $tempat = $data['tempat_lahir'];
    $tgl = $data['tanggal_lahir'];
    $tgl2 = $data['tanggal_request'];
    $format1 = date('Y', strtotime($tgl2));
    $format2 = date('d-m-Y', strtotime($tgl));
    $format3 = date('d F Y', strtotime($tgl2));
    $format4 = date('m', strtotime($tgl2));
    $agama = $data['agama'];
    $jekel = $data['jekel'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $status_warga = $data['status_warga'];
    $keperluan = $data['keperluan'];
    $request = $data['request'];
    $acc = $data['acc'];
    $no_surat = $data['id_request_skk'];
    $no_suratdb = $data['id_request_skk'];
    if ($no_surat == "") {
        $no_surat = "Belum ada no surat!";
    }

    if ($format4 = "1") {
        $romawi = "I";
    } elseif ($format4 = "2") {
        $romawi = "II";
    } elseif ($format5 = "3") {
        $romawi = "III";
    } elseif ($format5 = "4") {
        $romawi = "IV";
    } elseif ($format5 = "5") {
        $romawi = "V";
    } elseif ($format5 = "6") {
        $romawi = "VI";
    } elseif ($format5 = "7") {
        $romawi = "VII";
    } elseif ($format5 = "8") {
        $romawi = "VIII";
    } elseif ($format5 = "9") {
        $romawi = "IX";
    } elseif ($format5 = "10") {
        $romawi = "X";
    } elseif ($format5 = "11") {
        $romawi = "XII";
    } elseif ($format5 = "12") {
        $romawi = "XIII";
    }

    // cek kepalada desa /lurah
    $wuery = mysqli_query($konek, "select * from data_user where hak_akses='Lurah'");
    $data_ = mysqli_fetch_array($wuery);

    $format4 = date('d F Y');
    if ($acc == 0) {
        $acc = "BELUM TTD";
    } elseif ($acc == 1) {
        $acc;
    }
}
?>
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold"></h2>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-tools">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="">No Surat</label>
                                <input type="number" name="no_surat" class="form-control" placeholder="No Surat">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="ttd" value="simpan" class="btn btn-success btn-sm"
                                    required="">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="acc" value="acc" class="btn btn-primary btn-sm">
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['ttd'])) {
                            $no_surat = $_POST['no_surat'];
                            if ($no_surat == "") {
                                echo "<script language='javascript'>swal('Gagal...', 'No surat tidak boleh kosong', 'error');</script>";
                                echo '<meta http-equiv="refresh" content="3; url=?halaman=view_skk&id_request_skk=' . $id_ajuan . '">';
                            } else {
                                $update = mysqli_query($konek, "UPDATE data_request_skk SET no_surat='$no_surat' WHERE id_request_skk=$id");
                                if ($update) {
                                    echo "<script language='javascript'>swal('Selamat...', 'No surat berhasil disimpan', 'success');</script>";
                                    echo '<meta http-equiv="refresh" content="3; url=?halaman=view_skk&id_request_skk=' . $id_ajuan . '">';
                                } else {
                                    echo "<script language='javascript'>swal('Gagal...', 'ACC Lurah Gagal', 'error');</script>";
                                    echo '<meta http-equiv="refresh" content="3; url=?halaman=view_skk">';
                                }
                            }
                        } elseif (isset($_POST['acc'])) {
                            $ket = "Surat sedang dalam proses cetak";
                            $tgl = date('Y-m-d');
                            if ($no_suratdb == "") {
                                echo "<script language='javascript'>swal('Gagal...', 'Belum ada no surat', 'error');</script>";
                                echo '<meta http-equiv="refresh" content="3; url=?halaman=view_skk&id_request_skk=' . $id_ajuan . '">';
                            } else {
                                $update2 = mysqli_query($konek, "UPDATE data_request_skk SET status=2, acc='$tgl', keterangan='$ket' WHERE id_request_skk=$id");
                                if ($update2) {
                                    echo "<script language='javascript'>swal('Selamat...', 'ACC Berhasil', 'success');</script>";
                                    echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_skk">';
                                } else {
                                    echo "<script language='javascript'>swal('Gagal...', 'ACC Lurah Gagal', 'error');</script>";
                                    echo '<meta http-equiv="refresh" content="3; url=?halaman=view_skk">';
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body p-5">
                    <div class="cetak-surat p-5">
                        <table border="1" align="center">
                            <table align="center" width="100%">
                                <tr>
                                    <td width="15%" align="center">
                                        <img src="../main/img/logoku.png" width="70" height="87" alt="">
                                    </td>
                                    <td align="center">
                                        <font size="4">PEMERINTAH KABUPATEN PEKALONGAN</font><br>
                                        <font size="4">KECAMATAN KAJEN</font><br>
                                        <font size="5"><b>DESA TANJUNGSARI</b></font><br>
                                        <font size="2"><i>Alamat : Jl. Daha No. 163 Desa Tanjungsari Kode Pos 511</i>
                                        </font>
                                    </td>
                                    <!-- <td width="15%"></td> -->
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <hr color="black" style="height:2px; border:1px solid black;">
                                    </td>
                                </tr>
                            </table>

                            <br>
                            <center>
                                <font size="4"><b><u>SURAT KETERANGAN KEHILANGAN</u></b></font><br>
                                <b>Nomor : <?= $no_surat; ?> / Tanjungsari / <?= $romawi; ?> / <?= $format1; ?></b>
                            </center>
                            <br><br>

                            <p style="margin: 0 50px; text-align: justify;">
                                Yang Bertanda Tangan Di Bawah Ini:<br><br>
                                Nama
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
                                <b><?= $data_['nama']; ?></b><br>
                                Jabatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Kepala
                                Desa
                                Tanjungsari<br><br>
                                Dengan Ini Menerangkan Dengan Sebenarnya :
                            </p>

                            <table style="margin-left: 70px;" cellspacing="5" cellpadding="2">
                                <tr>
                                    <td>1</td>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= $nama; ?></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Tempat / tgl lahir</td>
                                    <td>:</td>
                                    <td><?= $tempat . ", " . $format2; ?></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td><?= $nik; ?></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Kebangsaan</td>
                                    <td>:</td>
                                    <td>Indonesia</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Agama</td>
                                    <td>:</td>
                                    <td><?= $agama; ?></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Pekerjaan</td>
                                    <td>:</td>
                                    <td><?= $status_warga; ?></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $alamat; ?></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Keperluan</td>
                                    <td>:</td>
                                    <td><?= $keperluan; ?></td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Keterangan Lain</td>
                                    <td>:</td>
                                    <td>
                                        Bahwa atas nama <?= $nama; ?> benar benar kehilangan barang.
                                    </td>
                                </tr>
                            </table>

                            <br>
                            <p style="margin: 0 50px; text-align: justify;">
                                Demikian Surat Keterangan Ini Di Berikan Kepada Yang Bersangkutan, Bahwa Orang Tersebut
                                Benar-Benar Menjadi
                                Warga Desa Tanjungsari.
                            </p>

                            <br><br><br><br><br><br><br><br><br>
                            <table align="right" style="margin-right: 70px; text-align: center;">
                                <tr>
                                    <td>Tanjungsari, <?= $format4; ?></td>
                                </tr>
                                <tr>
                                    <td>Kepala Desa Tanjungsari</td>
                                </tr>
                                <tr>
                                    <td><br><br><br><br></td>
                                </tr>
                                <tr>
                                    <td><b><u>(<?= $data_['nama']; ?>)</u></b></td>
                                </tr>
                            </table>
                        </table>

                        <br><br><br><br><br><br><br><br><br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>