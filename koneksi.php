
<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_simkeu";

$koneksi = new mysqli($host,$user,$pass,$db);
if ($koneksi->connect_error){
	die('maaf gagal melakukan koneksi = '.$koneksi->connect_error);
}

?>