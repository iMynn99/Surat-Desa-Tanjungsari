<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="fw-bold text-uppercase">TAMPIL ACC REQUEST SURAT KETERANGAN MASIH AKTIF KERJA</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="table-responsive">
                            <table id="add1" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal Request</th>
                                        <th>NIK</th>
                                        <th>Nama Lengkap</th>
                                        <th>Scan KTP</th>
                                        <th>Scan KK</th>
                                        <th>Keperluan</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									$i = 1;
									$sql = "SELECT * FROM data_request_skmak natural join data_user WHERE status=0";
									$query = mysqli_query($konek, $sql);
									while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
										$id_request_skmak = $data['id_request_skmak'];
										$tgl = $data['tanggal_request'];
										$format = date('d F Y', strtotime($tgl));
										$nik = $data['nik'];
										$nama = $data['nama'];
										$status = $data['status'];
										$ktp = $data['scan_ktp'];
										$kk = $data['scan_kk'];
										$keperluan = $data['keperluan'];
										$keterangan = $data['keterangan'];

										if ($status == "2") {
											$status = "<b style='color:blue'>ACC</b>";
										} elseif ($status == "0") {
											$status = "<b style='color:red'>BELUM ACC</b>";
										}
									?>
                                    <tr>
                                        <td><?php echo $format; ?></td>
                                        <td><?php echo $nik; ?></td>
                                        <td><?php echo $nama; ?></td>
                                        <td><img src="../dataFoto/scan_ktp/<?php echo $ktp; ?>" width="50" height="50"
                                                alt=""></td>
                                        <td><img src="../dataFoto/scan_kk/<?php echo $kk; ?>" width="50" height="50"
                                                alt=""></td>
                                        <td><?php echo $keperluan; ?></td>
                                        <td>
                                            <a type="button" class="btn btn-success btn-sm"
                                                href="?halaman=view_skmak&id_request_skmak=<?= $id_request_skmak; ?>"><i
                                                    class="fas fa fa-eye"></i> View Surat</a>
                                            <div class="form-button-action">
                                                <a type="button" data-toggle="tooltip" title=""
                                                    class="btn btn-link btn-primary btn-lg"
                                                    data-original-title="Cek Data"
                                                    href="?halaman=detail_skmak&id_request_skmak=<?= $id_request_skmak; ?>">
                                                    <i class="fa fa-edit"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
									}
									?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?php
if (isset($_POST['acc'])) {
	if (isset($_POST['check'])) {
		foreach ($_POST['check'] as $value) {
			// echo $value;
			$ubah = "UPDATE data_request_skmak set status =1 where id_request_skmak = $value";

			$query = mysqli_query($konek, $ubah);

			if ($query) {
				echo "<script language='javascript'>swal('Selamat...', 'ACC Staf Berhasil!', 'success');</script>";
				echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_skmak">';
			} else {
				echo "<script language='javascript'>swal('Gagal...', 'ACC Staf Gagal!', 'error');</script>";
				echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_skmak">';
			}
		}
	}
}
?>