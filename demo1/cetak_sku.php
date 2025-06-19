<?php include '../konek.php'; ?>
<?php
if (isset($_GET['id_request_sku'])) {
    $id = $_GET['id_request_sku'];
    $sql = "SELECT * FROM data_request_sku natural join data_user WHERE id_request_sku='$id'";
    $query = mysqli_query($konek, $sql);
    $data = mysqli_fetch_array($query, MYSQLI_BOTH);
    $nik = $data['nik'];
    $nama = $data['nama'];
    $tempat = $data['tempat_lahir'];
    $tgl = $data['tanggal_lahir'];
    $tgl2 = $data['tanggal_request'];
    $format1 = date('Y', strtotime($tgl2));
    $format2 = date('d-m-Y', strtotime($tgl));
    $format3 = date('d F Y', strtotime($tgl2));
    $agama = $data['agama'];
    $jekel = $data['jekel'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $status_warga = $data['status_warga'];
    $request = $data['request'];
    $usaha = $data['usaha'];
    $keperluan = $data['keperluan'];
    $acc = $data['acc'];
    $format4 = date('d F Y');

    $no_surat = $data['id_request_sku'];
    $format5 = date('m', strtotime($tgl2));
    if ($format5 == "1") {
        $romawi = "I";
    } elseif ($format5 == "2") {
        $romawi = "II";
    } elseif ($format5 == "2") {
        $romawi = "II";
    } elseif ($format5 == "3") {
        $romawi = "III";
    } elseif ($format5 == "4") {
        $romawi = "IV";
    } elseif ($format5 == "5") {
        $romawi = "V";
    } elseif ($format5 == "6") {
        $romawi = "VI";
    } elseif ($format5 == "7") {
        $romawi = "VII";
    } elseif ($format5 == "8") {
        $romawi = "VIII";
    } elseif ($format5 == "9") {
        $romawi = "IX";
    } elseif ($format5 == "10") {
        $romawi = "X";
    } elseif ($format5 == "11") {
        $romawi = "XII";
    } elseif ($format5 == "12") {
        $romawi = "XIII";
    }

    // cek kepalada desa /lurah
    $wuery = mysqli_query($konek, "select * from data_user where hak_akses='Lurah'");
    $data_ = mysqli_fetch_array($wuery);
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Usaha</title>
</head>

<body style="font-family: 'Times New Roman', Times, serif;">

    <table align="center" width="100%">
        <tr>
            <td width="15%" align="center">
                <img src="../main/img/logoku.png" width="70" height="87" alt="">
            </td>
            <td align="center">
                <font size="4">PEMERINTAH KABUPATEN PEKALONGAN</font><br>
                <font size="4">KECAMATAN KAJEN</font><br>
                <font size="5"><b>DESA TANJUNGSARI</b></font><br>
                <font size="2"><i>Alamat : Jl. Daha No. 163 Desa Tanjungsari Kode Pos 511</i></font>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr color="black" style="height:2px; border:1px solid black;">
            </td>
        </tr>
    </table>

    <br>
    <center>
        <font size="4"><b><u>SURAT KETERANGAN USAHA</u></b></font><br>
        <b>Nomor : <?= $no_surat; ?> / DS / <?= $romawi; ?> / <?= $format1; ?></b>
    </center>
    <br><br>

    <p style="margin: 0 50px; text-align: justify;">
        Yang Bertanda Tangan Di Bawah Ini:<br><br>
        Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        <b><?= $data_['nama']; ?></b><br>
        Jabatan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Kepala Desa
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
                Benar Adanya Bahwa Orang Tersebut memiliki usaha<br>
                Toko parfum "BARKAH PARFUM" di Dukuh karangtuang<br>
                Rt 002/Rw 001 Desa Tanjungsari Kecamatan Kajen <br>
                Kabupaten Pekalongan Jawa Tengah <br>
                yang sudah berjalan kurang lebih 5 tahun.
            </td>
        </tr>
    </table>

    <br>
    <p style="margin: 0 50px; text-align: justify;">
        Demikian Surat Keterangan Ini Di Berikan Kepada Yang Bersangkutan, Bahwa Orang Tersebut Benar-Benar Menjadi
        Warga Desa Tanjungsari.
    </p>

    <br><br>
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

    <br><br><br><br>
</body>

</html>

<script>
window.print();
</script>