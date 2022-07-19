<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}

include('../../config/koneksi.php');

// ambil data dari form
$nik_warga = htmlspecialchars($_POST['nik_warga']);
$nama_warga = htmlspecialchars($_POST['nama_warga']);
$tempat_lahir_warga = htmlspecialchars($_POST['tempat_lahir_warga']);
$tanggal_lahir_warga = htmlspecialchars($_POST['tgl_kelahiran']);
$jenis_kelamin_warga = htmlspecialchars($_POST['jenis_kelamin_warga']);

$alamat_ktp_warga = htmlspecialchars($_POST['alamat_ktp_warga']);
$alamat_warga = htmlspecialchars($_POST['alamat_warga']);
$desa_kelurahan_warga = htmlspecialchars($_POST['desa_kelurahan_warga']);
$kecamatan_warga = htmlspecialchars($_POST['kecamatan_warga']);
$kabupaten_kota_warga = htmlspecialchars($_POST['kabupaten_kota_warga']);
$provinsi_warga = htmlspecialchars($_POST['provinsi_warga']);
$negara_warga = htmlspecialchars($_POST['negara_warga']);
$dusun_warga = htmlspecialchars($_POST['dusun_warga']);
$rt_warga = htmlspecialchars($_POST['rt_warga']);
$rw_warga = htmlspecialchars($_POST['rw_warga']);

$agama_warga = htmlspecialchars($_POST['agama_warga']);
$pendidikan_terakhir_warga = htmlspecialchars($_POST['pendidikan_terakhir_warga']);
$pekerjaan_warga = htmlspecialchars($_POST['pekerjaan_warga']);
# $status_perkawinan_warga = htmlspecialchars($_POST['status_perkawinan_warga']);
$status_pernikahan = htmlspecialchars($_POST['status_pernikahan']);

$id_user = $_SESSION['user']['id_user'];
//cek nik warga dari database apakah ada atau tidak
$len = strlen($nik_warga);
if ($len != 16) {
	if ($len > 16) {
		echo "<script>window.alert('GAGAL MENYIMPAN!! NIK Lebih..!!'); history.back()</script>";
	}else {
		echo "<script>window.alert('GAGAL MENYIMPAN!! NIK Kurang..!!'); history.back()</script>";
	}
}elseif (
	$nama_warga === null || trim($nama_warga)==='' || $tempat_lahir_warga===null || trim($tempat_lahir_warga)==='' ||
	$tanggal_lahir_warga === null || trim($tanggal_lahir_warga)==='' || $jenis_kelamin_warga===null || trim($jenis_kelamin_warga)==='' ||
	$alamat_ktp_warga === null || trim($alamat_ktp_warga)==='' || $alamat_warga===null || trim($alamat_warga)==='' ||
	$desa_kelurahan_warga === null || trim($desa_kelurahan_warga)==='' || $kecamatan_warga===null || trim($kecamatan_warga)==='' ||
	$kabupaten_kota_warga === null || trim($kabupaten_kota_warga)==='' || $provinsi_warga===null || trim($provinsi_warga)==='' ||
	$negara_warga === null || trim($negara_warga)==='' || $dusun_warga===null || trim($dusun_warga)==='' ||
	$rt_warga === null || trim($rt_warga)==='' || $rw_warga===null || trim($rw_warga)==='' ||
	$agama_warga === null || trim($agama_warga)==='' || $pendidikan_terakhir_warga===null || trim($pendidikan_terakhir_warga)==='' ||
	$pekerjaan_warga === null || trim($pekerjaan_warga)==='' || $status_pernikahan===null || trim($status_pernikahan)===''
) {
	echo "<script>window.alert('GAGAL MENYIMPAN!! /n Masih ada Data yang KOSONG.!!'); history.back()</script>";
}else {
	$query_cek="SELECT nik_warga from warga where nik_warga=$nik_warga";
	$cek_nik=mysqli_num_rows(mysqli_query($db, $query_cek));
	if($cek_nik>0){
		echo "<script>window.alert('Tambah warga gagal!, NIK $nik_warga sudah digunakan !'); history.back()</script>";
	} else {

		$query = "INSERT INTO warga (id_warga, nik_warga, nama_warga, tempat_lahir_warga, tanggal_lahir_warga, jenis_kelamin_warga, alamat_ktp_warga, alamat_warga, desa_kelurahan_warga, kecamatan_warga, kabupaten_kota_warga, provinsi_warga, negara_warga, dusun_warga, rt_warga, rw_warga, agama_warga, pendidikan_terakhir_warga, pekerjaan_warga, status_pernikahan, id_user, created_at, updated_at) VALUES (NULL, '$nik_warga', '$nama_warga', '$tempat_lahir_warga', '$tanggal_lahir_warga', '$jenis_kelamin_warga', '$alamat_ktp_warga', '$alamat_warga', '$desa_kelurahan_warga', '$kecamatan_warga', '$kabupaten_kota_warga', '$provinsi_warga', '$negara_warga', '$dusun_warga', '$rt_warga', '$rw_warga', '$agama_warga', '$pendidikan_terakhir_warga', '$pekerjaan_warga', '$status_pernikahan', '$id_user', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000');";
		//echo $query;
		$hasil = mysqli_query($db, $query);

		//cek keberhasilan pendambahan data
		if ($hasil == true) {
			echo "<script>window.alert('Tambah warga berhasil'); window.location.href='../warga/index.php'</script>";
		} else {
			echo "<script>window.alert('Tambah warga gagal!'); history.back()</script>";

		}
	}
}
