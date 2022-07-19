<?php
include('../../config/koneksi.php');

// ambil dari database
$query = "SELECT *, TIMESTAMPDIFF(YEAR, `tanggal_lahir_warga`, CURDATE()) AS usia_warga FROM warga";

$hasil = mysqli_query($db, $query);

$data_warga = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_warga[] = $row;
}

$query1 = mysqli_query($db, "SELECT * FROM warga WHERE pendidikan_terakhir_warga='SD'");
$query2 = mysqli_query($db, "SELECT * FROM warga WHERE pendidikan_terakhir_warga='SMP'");
$query3 = mysqli_query($db, "SELECT * FROM warga WHERE pendidikan_terakhir_warga='SMA'");
$query4 = mysqli_query($db, "SELECT * FROM warga WHERE pendidikan_terakhir_warga='Tidak Sekolah'");
$query5 = mysqli_query($db, "SELECT * FROM warga WHERE pendidikan_terakhir_warga='Tidak Tamat SD'");
$query6 = mysqli_query($db, "SELECT * FROM warga WHERE pendidikan_terakhir_warga='S1'");
$query7 = mysqli_query($db, "SELECT * FROM warga WHERE pendidikan_terakhir_warga='S2'");
$query8 = mysqli_query($db, "SELECT * FROM warga WHERE pendidikan_terakhir_warga='S3'");
$query9 = mysqli_query($db, "SELECT * FROM warga WHERE pendidikan_terakhir_warga='D1'");
$query10 = mysqli_query($db, "SELECT * FROM warga WHERE pendidikan_terakhir_warga='D2'");
$query11 = mysqli_query($db, "SELECT * FROM warga WHERE pendidikan_terakhir_warga='D3'");
$query12 = mysqli_query($db, "SELECT * FROM warga WHERE pendidikan_terakhir_warga='-'");


$jmlsd = mysqli_num_rows($query1);
$jmlsmp = mysqli_num_rows($query2);
$jmlsma = mysqli_num_rows($query3);
$jmltidaksklh = mysqli_num_rows($query4);
$jmltidaktamat = mysqli_num_rows($query5);
$jmls1 = mysqli_num_rows($query6);
$jmls2 = mysqli_num_rows($query7);
$jmls3 = mysqli_num_rows($query8);
$jmld1 = mysqli_num_rows($query9);
$jmld2 = mysqli_num_rows($query10);
$jmld3 = mysqli_num_rows($query11);
$jmllain = mysqli_num_rows($query12);
