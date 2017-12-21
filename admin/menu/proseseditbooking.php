<?php
include "../koneksi.php";
$id = $_GET['id'];
$status = 'PAID';
$sql = "UPDATE booking SET status='$status' where id_booking='$id'";
$query = mysqli_query($connect,$sql);
if($query) {
	echo "<script language=\"javascript\">\n";
	echo "alert(\"Berhasil di Update !!!\")\n";
	echo "window.location=\"../home.php?home=booking\" ";
	echo "</script>";
}else {
	echo "<script language=\"javascript\">\n";
	echo "alert(\"Gagal Disimpan !! Coba Lagi\")\n";
	echo "window.location=\"../home.php?home=booking\" ";
	echo "</script>";
	}
?>
