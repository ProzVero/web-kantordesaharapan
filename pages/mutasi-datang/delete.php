<?php
session_start();
if (!isset($_SESSION['user'])) {
  // jika user belum login
  header('Location: ../login');
  exit();
}

include('../../config/koneksi.php');

// ambil data dari form
$id_mutasi = htmlspecialchars($_GET['id_mutasi_masuk']);

// delete database
$query = "DELETE FROM mutasi_masuk WHERE id_mutasi_masuk = $id_mutasi";

$hasil = mysqli_query($db, $query);

// cek keberhasilan pendambahan data
if ($hasil == true) {
  echo "<script>window.alert('Data berhasil dihapus!');window.location.href='../mutasi-datang'</script>";
} else {
  echo "<script>window.alert('Data mutasi gagal dihapus!'); window.location.href='../mutasi-datang'</script>";
}
