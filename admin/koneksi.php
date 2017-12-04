<?php
// gunakan variabel session pada halaman ini.
// fungsi ini harus diletakkan di awal halaman.
//isilah dengan user dan password dari mysql anda
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="tamupoltek";
$connect=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
?>
