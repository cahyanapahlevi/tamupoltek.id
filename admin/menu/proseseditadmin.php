<?php
if (isset($_REQUEST['edit'])) {
include "../koneksi.php";
$id = $_POST['id_admin'];
$username = $_POST['username'];
$pass = $_POST['password'];
$phone = $_POST['phone'];
$sql = "UPDATE admin SET username='$username', password='$pass', phone_admin='$phone' where id_admin='$id'";
$query = mysqli_query($connect,$sql);
if($query) {
	echo "<script language=\"javascript\">\n";
	echo "alert(\"Berhasil disimpan !!!\")\n";
	echo "window.location=\"../home.php?home=admin\" ";
	echo "</script>";
}else {
	echo "<script language=\"javascript\">\n";
	echo "alert(\"Gagal Disimpan !! Coba Lagi\")\n";
	echo "window.location=\"../home.php?home=admin\" ";
	echo "</script>";
	}
}
?>
