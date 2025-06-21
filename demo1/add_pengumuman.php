<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Pengumuman</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Judul</label>
                                    <input type="text" name="judul" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Isi</label>
                                    <textarea name="isi" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Photo</label>
                                    <input type="file" name="foto" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" card-action">
                        <button name="simpan" class="btn btn-success btn-sm">Simpan</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>

<?php

if (isset($_POST['simpan'])) {
    $judul = htmlspecialchars($_POST['judul']);
    $isi = htmlspecialchars($_POST['isi']);

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $nama_file_asli = $_FILES['foto']['name'];
        $tmp_name = $_FILES['foto']['tmp_name'];
        $ekstensi_file = pathinfo($nama_file_asli, PATHINFO_EXTENSION);
        $filefoto = uniqid() . '.' . $ekstensi_file;
        $folder_tujuan = "../dataFoto/pengumuman/";
        $path_lengkap_file = $folder_tujuan . $filefoto;

        if (move_uploaded_file($tmp_name, $path_lengkap_file)) {
            $sql = "INSERT INTO pengumuman (judul, isi, foto) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($konek, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "sss", $judul, $isi, $filefoto);
                $query = mysqli_stmt_execute($stmt);

                if ($query) {
                    echo "<script language='javascript'>swal('Selamat...', 'Simpan Berhasil', 'success');</script>";
                    echo '<meta http-equiv="refresh" content="3; url=?halaman=pengumuman">';
                } else {
                    echo "<script language='javascript'>swal('Gagal...', 'Simpan Gagal ke Database', 'error');</script>";
                    echo '<meta http-equiv="refresh" content="3; url=?halaman=pengumuman">';
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "<script language='javascript'>swal('Gagal...', 'Persiapan Statement Gagal', 'error');</script>";
                echo '<meta http-equiv="refresh" content="3; url=?halaman=pengumuman">';
            }
        } else {
            echo "<script language='javascript'>swal('Gagal...', 'Gagal Mengunggah File Foto', 'error');</script>";
            echo '<meta http-equiv="refresh" content="3; url=?halaman=pengumuman">';
        }
    } else {
        echo "<script language='javascript'>swal('Peringatan...', 'Tidak Ada File Foto yang Diunggah atau Ada Error', 'warning');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=pengumuman">';
    }
}
?>