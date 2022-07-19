<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}

include('../../config/koneksi.php');

// ambil data dari form
$id_kematian = htmlspecialchars($_GET['id_kematian']);

// delete database
$query = "DELETE FROM tbl_meninggal WHERE id_meninggal = $id_kematian";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Data berhasil dihapus!');window.location.href='../meninggal'</script>";
} else {
  echo "<script>window.alert('Data mutasi gagal dihapus!'); window.location.href='../meninggal'</script>";
}
