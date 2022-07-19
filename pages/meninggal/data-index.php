<?php
include('../../config/koneksi.php');

// ambil dari database
# $query = "SELECT *, TIMESTAMPDIFF(YEAR, `tanggal_lahir_warga`, CURDATE()) AS usia_warga FROM warga";
# $query = "SELECT * FROM tbl_meninggal";
$query = "SELECT *, warga.nama_warga, warga.jenis_kelamin_warga FROM `tbl_meninggal` JOIN warga on warga.id_warga=tbl_meninggal.id_warga";
$hasil = mysqli_query($db, $query);

$data_kematian = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_kematian[] = $row;
}

// hitung kelahiran
$query_jumlah_kematian = "SELECT COUNT(*) AS total FROM tbl_meninggal";
$hasil_jumlah_kematian = mysqli_query($db, $query_jumlah_kematian);
$jumlah_kematian = mysqli_fetch_assoc($hasil_jumlah_kematian);


$query1 = mysqli_query($db, "SELECT * FROM tbl_meninggal WHERE tgl_meninggal LIKE  '2022%'");
$query2 = mysqli_query($db, "SELECT * FROM tbl_meninggal WHERE tgl_meninggal LIKE  '2023%'");
$query3 = mysqli_query($db, "SELECT * FROM tbl_meninggal WHERE tgl_meninggal LIKE  '2024%'");
$query4 = mysqli_query($db, "SELECT * FROM tbl_meninggal WHERE tgl_meninggal LIKE  '2025%'");
$query5 = mysqli_query($db, "SELECT * FROM tbl_meninggal WHERE tgl_meninggal LIKE  '2026%'");


$jml1 = mysqli_num_rows($query1);
$jml2 = mysqli_num_rows($query2);
$jml3 = mysqli_num_rows($query3);
$jml4 = mysqli_num_rows($query4);
$jml5 = mysqli_num_rows($query5);