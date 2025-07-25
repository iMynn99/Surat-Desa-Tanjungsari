<?php include 'konek.php'; ?>
<link href="demo1/css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="demo1/js/jquery-2.1.3.min.js"></script>
<script src="demo1/js/sweetalert.min.js"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman Pendaftaran Pemohon</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="main/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="main/vendors/base/vendor.bundle.base.css">
    <link href="main/js/sweetalert.css" rel="stylesheet" type="text/css">
    <script src="main/js/jquery-2.1.3.min.js"></script>
    <script src="main/js/sweetalert.min.js"></script>
    <script src="main/js/sweetalert-dev.js"></script>
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="main/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="main/images/favicon.png" />
    <style>
    .titleLogo {
        font-family: monospace;
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo text-center">
                                <img src="main/img/logoku2.png" alt="logo">
                                <div class="titleLogo mt-5">Balai Desa Tanjungsari</div>
                            </div>
                            <h6 class="text-center">HALAMAN PENDAFTARAN</h6>
                            <form method="POST" class="pt-3">
                                <div class="form-group">
                                    <input type="number" name="nik" class="form-control form-control-lg"
                                        placeholder="NIK Anda.."
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        maxlength="16" required autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control form-control-lg"
                                        placeholder="Nama Lengkap Anda.." required>
                                </div>
                                <div class="form-group">
                                    <select name="jekel" id="" class="form-control">
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="kota" class="form-control form-control-lg"
                                        placeholder="Kota Lahir Anda.." required>
                                </div>
                                <div class="form-group">
                                    <input type="date" name="tgl" class="form-control form-control-lg" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg"
                                        placeholder="Password" required>
                                </div>
                                <div class="mb-4">

                                </div>
                                <div class="mt-3">
                                    <button type="submit"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                                        name="register">
                                        DAFTAR
                                    </button>
                                </div>
                                <div class="mt-3">
                                    <a class="btn btn-block btn-danger btn-lg font-weight-medium auth-form-btn"
                                        href="<?= $url_index; ?>">BATAL</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Sudah memiliki akun? <a href="login.php" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- insert register -->
    <?php
  if (isset($_POST['register'])) {
    $nik = $_POST['nik'];
    $password = $_POST['password'];
    $hak_akses = "Pemohon";
    $nama = $_POST['nama'];
    $jekel = $_POST['jekel'];
    $kota = $_POST['kota'];
    $tgl = $_POST['tgl'];

    $sql_simpan = "INSERT INTO data_user (nik,password,hak_akses,nama,tanggal_lahir,jekel,tempat_lahir) VALUES ('$nik','$password','$hak_akses','$nama','$tgl','$jekel','$kota')";
    $query_simpan = mysqli_query($konek, $sql_simpan);

    if ($query_simpan) {
      echo "<script language='javascript'>swal('Selamat...', 'Akun Berhasil dibuat!', 'success');</script>";
      echo '<meta http-equiv="refresh" content="3; url=login.php">';
    } else {
      echo "<script language='javascript'>swal('Gagal...', 'Akun Gagal dibuat!', 'error');</script>";
      echo '<meta http-equiv="refresh" content="3; url=register.php">';
    }
  }

  ?>
    <!-- plugins:js -->
    <script src="main/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="main/js/off-canvas.js"></script>
    <script src="main/js/hoverable-collapse.js"></script>
    <script src="main/js/template.js"></script>
    <!-- endinject -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- endinject -->
    <script src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
</body>

</html>