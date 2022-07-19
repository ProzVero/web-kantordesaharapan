<?php
include('../../config/koneksi.php');

// ambil dari url
$get_id_kelahiran = $_GET['id_meninggal'];

// ambil dari database
$query = "SELECT * FROM tbl_meninggal WHERE id_meninggal = $get_id_meninggal";

$hasil = mysqli_query($db, $query);

$data_kelahiran = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_kelahiran[] = $row;
}
// ambil data KK

$query_keluarga = "SELECT warga.nama_warga, kartu_keluarga.nomor_keluarga, kartu_keluarga.id_keluarga, tbl_meninggal.id_meninggal FROM warga JOIN kartu_keluarga ON warga.id_warga=kartu_keluarga.id_kepala_keluarga JOIN tbl_meninggal WHERE kartu_keluarga.id_keluarga=tbl_meninggal.id_keluarga AND tbl_meninggal.id_meninggal=$get_id_meninggal ";

$hasil_keluarga = mysqli_query($db, $query_keluarga);

$data_keluarga = array();

while ($row_keluarga = mysqli_fetch_assoc($hasil_keluarga)){
	$data_keluarga[] = $row_keluarga;
}
