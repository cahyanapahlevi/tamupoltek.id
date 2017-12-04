<?php
if (isset($_REQUEST['edit'])) {
include "../koneksi.php";
$id = $_REQUEST['id_event'];
$event = $_REQUEST['eventdate'];
$sql = "UPDATE event SET eventdate='$event' where id_event='$id'";
$query = mysqli_query($connect,$sql);
if($query) {
	echo "<script language=\"javascript\">\n";
	echo "alert(\"Berhasil disimpan !!!\")\n";
	echo "window.location=\"../home.php?home=event\" ";
	echo "</script>";
}else {
	echo "<script language=\"javascript\">\n";
	echo "alert(\"Gagal Disimpan !! Coba Lagi\")\n";
	echo "window.location=\"../home.php?home=event\" ";
	echo "</script>";
	}
}
?>
