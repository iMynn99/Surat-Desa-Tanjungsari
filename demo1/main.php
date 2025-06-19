<?php
session_start();
if (isset($_SESSION['password']) == "" || ($_SESSION['hak_akses']) == "") {
	header('location:login.php');
} else {
	$hak_akses = $_SESSION['hak_akses'];
	$nama = $_SESSION['nama'];
	$nik = $_SESSION['nik'];
}
?>
<?php include 'header.php'; ?>
<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="mx-4 mt-2">
                    <a href="main.php" class="btn btn-block">
                        <img src="../main/img/logoku.png" width="100px" alt="">
                    </a>
                    <span class="mx-2" style="color: black;font-family:monospace; font-weight:bold;">Balai Desa
                        Tanjungsari</span>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">fitur</h4>
                </li>
                <?php
				if ($hak_akses == "Pemohon") {
				?>
                <li class="nav-item">
                    <a href="?halaman=tampil_pemohon">
                        <i class="fas fa-user-alt"></i>
                        <p>Biodata Anda</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?halaman=tampil_status">
                        <i class="far fa-calendar-check"></i>
                        <p>Status Request</p>
                    </a>
                </li>
                <?php
				}
				?>
                <li class="mx-4 mt-2">
                    <a href="logout.php" class="btn btn-danger btn-block"><span class="btn-label mr-2"> <i
                                class="icon-logout"></i> </span>Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->

<div class="main-panel">
    <div class="content">
        <?php
		if (isset($_GET['halaman'])) {
			$hal = $_GET['halaman'];
			switch ($hal) {
				case 'beranda';
					include 'beranda.php';
					break;
				case 'ubah_pemohon';
					include 'ubah_pemohon.php';
					break;
				case 'tampil_pemohon';
					include 'tampil_pemohon.php';
					break;
				case 'request_sktm';
					include 'request_sktm.php';
					break;
				case 'request_sku';
					include 'request_sku.php';
					break;
				case 'request_skp';
					include 'request_skp.php';
					break;
				case 'request_skbm';
					include 'request_skbm.php';
					break;
				case 'request_skmak';
					include 'request_skmak.php';
					break;
				case 'request_skk';
					include 'request_skk.php';
					break;
				case 'request_skd';
					include 'request_skd.php';
					break;
				case 'tampil_status';
					include 'status_request.php';
					break;
				case 'belum_acc_sktm';
					include 'belum_acc_sktm.php';
					break;
				case 'belum_acc_sku';
					include 'belum_acc_sku.php';
					break;
				case 'belum_acc_skp';
					include 'belum_acc_skp.php';
					break;
				case 'belum_acc_skd';
					include 'belum_acc_skd.php';
					break;
				case 'belum_acc_skbm';
					include 'belum_acc_skbm.php';
					break;
				case 'belum_acc_skmak';
					include 'belum_acc_skmak.php';
					break;
				case 'belum_acc_skk';
					include 'belum_acc_skk.php';
					break;
				case 'sudah_acc_sktm';
					include 'acc_sktm.php';
					break;
				case 'sudah_acc_sku';
					include 'acc_sku.php';
					break;
				case 'sudah_acc_skp';
					include 'acc_skp.php';
					break;
				case 'sudah_acc_skd';
					include 'acc_skd.php';
					break;
				case 'sudah_acc_skbm';
					include 'acc_skbm.php';
					break;
				case 'sudah_acc_skmak';
					include 'acc_skmak.php';
					break;
				case 'sudah_acc_skk';
					include 'acc_skk.php';
					break;
				case 'detail_sktm';
					include 'detail_sktm.php';
					break;
				case 'detail_sku';
					include 'detail_sku.php';
					break;
				case 'detail_skp';
					include 'detail_skp.php';
					break;
				case 'detail_skd';
					include 'detail_skd.php';
					break;
				case 'detail_skbm';
					include 'detail_skbm.php';
					break;
				case 'cetak_sktm';
					include 'cetak_sktm.php';
					break;
				case 'cetak_skbm';
					include 'cetak_skbm.php';
					break;
				case 'cetak_skmak';
					include 'cetak_skmak.php';
					break;
				case 'cetak_skk';
					include 'cetak_skk.php';
					break;
				case 'tampil_user';
					include 'tampil_user.php';
					break;
				case 'tambah_user';
					include 'tambah_user.php';
					break;
				case 'ubah_user';
					include 'ubah_user.php';
					break;
				case 'ubah_sktm';
					include 'ubah_request_sktm.php';
					break;
				case 'ubah_sku';
					include 'ubah_request_sku.php';
					break;
				case 'ubah_skp';
					include 'ubah_request_skp.php';
					break;
				case 'ubah_skd';
					include 'ubah_request_skd.php';
					break;
				case 'ubah_skbm';
					include 'ubah_request_skbm.php';
					break;
				case 'ubah_skmak';
					include 'ubah_request_skmak.php';
					break;
				case 'ubah_skk';
					include 'ubah_request_skk.php';
					break;
					case 'view_sktm';
					include 'view_sktm.php';
					break;
				case 'view_sku';
					include 'view_sku.php';
					break;
				case 'view_skp';
					include 'view_skp.php';
					break;
				case 'view_skd';
					include 'view_skd.php';
					break;
				case 'view_skbm';
					include 'view_skbm.php';
					break;
				case 'view_skmak';
					include 'view_skmak.php';
					break;
				case 'view_skk';
					include 'view_skk.php';
					break;
				case 'view_cetak_sktm';
					include 'view_cetak_sktm.php';
					break;
				case 'view_cetak_sku';
					include 'view_cetak_sku.php';
					break;
				case 'view_cetak_skp';
					include 'view_cetak_skp.php';
					break;
				case 'view_cetak_skd';
					include 'view_cetak_skd.php';
					break;
				case 'view_cetak_skbm';
					include 'view_cetak_skbm.php';
					break;
				case 'view_cetak_skmak';
					include 'view_cetak_skmak.php';
					break;
				case 'view_cetak_skk';
					include 'view_cetak_skk.php';
					break;
				case 'laporan_perbulan';
					include 'laporan_perbulan.php';
					break;
				case 'laporan_pertahun';
					include 'laporan_pertahun.php';
					break;
				default:
					echo "<center>HALAMAN KOSONG</center>";
					break;
			}
		} else {
			include 'beranda.php';
		}
		?>
    </div>
    <?php include 'footer.php'; ?>