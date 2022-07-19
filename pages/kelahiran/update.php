<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}

include('../../config/koneksi.php');
# include ('data-cek.php');

// ambil data dari form
$id_kelahiran = htmlspecialchars($_GET['id_kelahiran']);
$nama_bayi = htmlspecialchars($_POST['nama_bayi']);
$jk = htmlspecialchars($_POST['jk']);
$tgl_kelahiran = htmlspecialchars($_POST['tgl_kelahiran']);
$berat_bayi = htmlspecialchars($_POST['berat_bayi']);
$panjang_bayi = htmlspecialchars($_POST['panjang_bayi']);
$is_kembar = htmlspecialchars($_POST['is_kembar']);
$nama_ayah = htmlspecialchars($_POST['nama_ayah']);
$nama_ibu = htmlspecialchars($_POST['nama_ibu']);
$lokasi_lahir = htmlspecialchars($_POST['lokasi_lahir']);
$tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
$penolong = htmlspecialchars($_POST['penolong']);

$query="UPDATE  tbl_kelahiran SET nama_bayi='$nama_bayi', tgl_kelahiran = '$tgl_kelahiran', jk = '$jk', berat_bayi = '$berat_bayi', panjang_bayi = '$panjang_bayi', nama_ayah = '$nama_ayah', nama_ibu = '$nama_ibu', lokasi_lahir = '$lokasi_lahir', tempat_lahir = '$tempat_lahir', penolong = '$penolong' WHERE id_kelahiran = '$id_kelahiran'";

	$hasil = mysqli_query($db, $query);


	// cek keberhasilan pendambahan data
	if ($hasil == true) {	
 		echo "<script>window.alert('data kelahiran berhasil diperbarui'); window.location.href='../kelahiran/index.php'</script>";
	} else {
  		// echo "<script>window.alert('Tambah data gagal!'); window.history.back()'</script>";
  		echo mysqli_error($db);
	}

?>