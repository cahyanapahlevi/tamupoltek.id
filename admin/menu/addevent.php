<?php
include "../koneksi.php";
if (isset($_POST['save'])) {
	$id			= $_POST['id_event'];
	$event	= $_POST['event'];
	$query = "INSERT INTO event VALUES ('$id','$event')";
	$simpan = mysqli_query($connect,$query) or die(mysqli_error($simpan));

	if($simpan){
	echo "<script language=\"javascript\">\n";
	echo "alert(\"Data Berhasil Dimasukkan!!\")\n";
	echo "window.location=\"../home.php?home=event\" ";
	echo "</script>";
	}else {
		echo "<script language=\"javascript\">\n";
		echo "alert(\"Maaf Gagal Disimpan, Silahkan Ulangi\")\n";
		echo "window.location=\"../home.php?home=event\" ";
		echo "</script>";
		}
}
?>
