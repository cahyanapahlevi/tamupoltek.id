<?php
session_start();
if (isset($_REQUEST['save'])) {
include "../koneksi.php";
$id = $_SESSION['id'];
$nama = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$phone = $_POST['phone'];
$alamat = $_POST['alamat'];
$nusaha =$_POST['nama_usaha'];
$jusaha =$_POST['jenis_usaha'];
$pekerjaan =$_POST['pekerjaan'];
$sql = "UPDATE user SET nama_user='$nama',email_user='$email', pass_user='$pass', phone_user='$phone',alamat_user='$alamat'
        , nama_usaha='$nusaha',jenis_usaha='$jusaha',pekerjaan='$pekerjaan' where id_user='$id'";
$query = mysqli_query($connect,$sql);
if($query) {
	echo "<script language=\"javascript\">\n";
	echo "alert(\"Berhasil disimpan !!!\")\n";
	echo "window.location=\"../home.php?page=main\" ";
	echo "</script>";
}else {
	echo "<script language=\"javascript\">\n";
	echo "alert(\"Gagal Disimpan !! Coba Lagi\")\n";
	echo "window.location=\"../home.php?page=main\" ";
	echo "</script>";
	}
}
?>
