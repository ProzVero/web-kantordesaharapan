<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
//mysqli_report(MYSQLI_REPORT_ERROR);

$host = "localhost";
$user = "root";
$pass = "";
$database = "db_desaharapan";

/*$host = "sql305.epizy.com";
$user = "epiz_30684866";
$pass = "SNablWZ4dYwtLeU";
$database = "epiz_30684866_desaharapan";*/

$db = mysqli_connect($host, $user, $pass, $database) or die("gagal koneksi ke database");
