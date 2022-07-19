<?php
include('../../config/koneksi.php');

// ambil dari database
# $query = "SELECT *, TIMESTAMPDIFF(YEAR, `tanggal_lahir_warga`, CURDATE()) AS usia_warga FROM warga";
$query = "SELECT * FROM tbl_kelahiran";

$hasil = mysqli_query($db, $query);

$data_lahir = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_lahir[] = $row;
}

// hitung kelahiran
$query_jumlah_kelahiran = "SELECT COUNT(*) AS total FROM tbl_kelahiran";
$hasil_jumlah_kelahiran = mysqli_query($db, $query_jumlah_kelahiran);
$jumlah_kelahiran = mysqli_fetch_assoc($hasil_jumlah_kelahiran);


$query1 = mysqli_query($db, "SELECT * FROM tbl_kelahiran WHERE tgl_kelahiran LIKE  '2022%'");
$query2 = mysqli_query($db, "SELECT * FROM tbl_kelahiran WHERE tgl_kelahiran LIKE  '2023%'");
$query3 = mysqli_query($db, "SELECT * FROM tbl_kelahiran WHERE tgl_kelahiran LIKE  '2024%'");
$query4 = mysqli_query($db, "SELECT * FROM tbl_kelahiran WHERE tgl_kelahiran LIKE  '2025%'");
$query5 = mysqli_query($db, "SELECT * FROM tbl_kelahiran WHERE tgl_kelahiran LIKE  '2026%'");


$jml1 = mysqli_num_rows($query1);
$jml2 = mysqli_num_rows($query2);
$jml3 = mysqli_num_rows($query3);
$jml4 = mysqli_num_rows($query4);
$jml5 = mysqli_num_rows($query5);

