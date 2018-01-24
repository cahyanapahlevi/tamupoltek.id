<?php
include "koneksi.php";
if (isset($_POST['send'])) {  
	$nama	= $_POST['nama'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$query = mysqli_query($connect,"INSERT INTO kritiksaran VALUES ('','$nama','$email','$message')") or die (mysql_error());

		echo "<script language=\"javascript\">\n";
	echo "alert(\"Terimakasih Atas Support Anda !\")\n";
	echo "window.location=\"../\" ";
	echo "</script>";
	
}
?>
