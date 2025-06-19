<?php include '../konek.php'; ?>
<?php
if (isset($_GET['id_request_skk'])) {
    $id = $_GET['id_request_skk'];
    $sql = "SELECT * FROM data_request_skk natural join data_user WHERE id_request_skk='$id'";
    $query = mysqli_query($konek, $sql);
    $data = mysqli_fetch_array($query, MYSQLI_BOTH);
    $nik = $data['nik'];
    $nama = $data['nama'];
    $tempat = $data['tempat_lahir'];
    $tgl = $data['tanggal_lahir'];
    $tgl2 = $data['tanggal_request'];
    $format2 = date('Y', strtotime($tgl2));
    $format1 = date('d-m-Y', strtotime($tgl));
    $format3 = date('d F Y', strtotime($tgl2));
    $agama = $data['agama'];
    $jekel = $data['jekel'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $status_warga = $data['status_warga'];
    $request = $data['request'];
    $keperluan = $data['keperluan'];
    $acc = $data['acc'];
    $format4 = date('d F Y', strtotime($acc));
    $no_surat = $data['id_request_skk'];
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
    <title>Surat Keterangan Kehilangan</title>
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
        <font size="4"><b><u>SURAT KETERANGAN KEHILANGAN</u></b></font><br>
        <b>Nomor : <?= $no_surat; ?> / DS / <?= $romawi; ?> / <?= $format1; ?></b>
    </center>
    <br><br>

    <p style="margin: 0 50px; text-align: justify;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang Bertanda Tangan
        Dibawah Ini Kepala Desa .Tanjungsari Kecamatan Kajen Kabupaten Pekalongan Menerangkan Bahwa :<br><br>
    </p>
    <br><br>
    <p style="margin: 0 50px; text-align: justify;">
        Nama Lengkap &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        <b><?= $data_['nama']; ?></b><br>
    </p>
    <p style="margin: 0 50px; text-align: justify;">
        Tempat, Tanggal Lahir
        &nbsp;&nbsp;&nbsp;:
        <b><?= $tempat . ", " . $format2; ?></b><br>
    </p>
    <p style="margin: 0 50px; text-align: justify;">
        Nik
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        <b><?= $nik; ?></b><br>
    </p>
    <p style="margin: 0 50px; text-align: justify;">
        Warga Negara
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        <b>Indonesia</b><br>
    </p>
    <p style="margin: 0 50px; text-align: justify;">
        Agama
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        <b><?= $agama; ?></b><br>
    </p>
    <p style="margin: 0 50px; text-align: justify;">
        Pekerjaan
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        <b><?= $status_warga; ?></b><br>
    </p>
    <p style="margin: 0 50px; text-align: justify;">
        Alamat
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        <b><?= $alamat; ?></b><br>
    </p>
    <p style="margin: 0 50px; text-align: justify;">
        Keterangan
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        <b>Bahwa atas nama <?= $nama; ?> benar benar kehilangan barang.</b><br>
    </p>
    <br><br>

    <p style="margin: 0 50px; text-align: justify;">
        Demikian Surat Keterangan Ini di berikan kepada yang bersangkutan .Agar mendapat perhatian dan pelayanan
        sebagaimana mestinya
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