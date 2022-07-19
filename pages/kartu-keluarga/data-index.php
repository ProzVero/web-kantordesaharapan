<?php
include('../../config/koneksi.php');

// ambil dari database
$query = "SELECT * FROM kartu_keluarga LEFT JOIN warga ON kartu_keluarga.id_kepala_keluarga = warga.id_warga";

$hasil = mysqli_query($db, $query);

$data_kartu_keluarga = array();

while ($row = mysqli_fetch_assoc($hasil)) {
  $data_kartu_keluarga[] = $row;
}

// hitung kartu keluarga
$query_jumlah_kartu_keluarga = "SELECT COUNT(*) AS total FROM kartu_keluarga";
$hasil_jumlah_kartu_keluarga = mysqli_query($db, $query_jumlah_kartu_keluarga);
$jumlah_kartu_keluarga = mysqli_fetch_assoc($hasil_jumlah_kartu_keluarga);

$query1 = mysqli_query($db, "SELECT * FROM kartu_keluarga WHERE dusun_keluarga='campurejo'");
$query2 = mysqli_query($db, "SELECT * FROM kartu_keluarga WHERE dusun_keluarga='bibang'");
$query3 = mysqli_query($db, "SELECT * FROM kartu_keluarga WHERE dusun_keluarga='harapan'");
$query4 = mysqli_query($db, "SELECT * FROM kartu_keluarga WHERE dusun_keluarga='patoko'");
$query5 = mysqli_query($db, "SELECT * FROM kartu_keluarga WHERE dusun_keluarga='-'");


$jml1 = mysqli_num_rows($query1);
$jml2 = mysqli_num_rows($query2);
$jml3 = mysqli_num_rows($query3);
$jml4 = mysqli_num_rows($query4);
$jml5 = mysqli_num_rows($query5);