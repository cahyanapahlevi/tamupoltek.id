<?php
include "koneksi.php";
if (isset($_POST['send'])) {
	$nama	= $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$query = "INSERT INTO contactus('id_contact','nama','email','message') VALUES ('','$nama','$email','$message')";
	$simpan = mysqli_query($connect,$query) or die(mysqli_error($simpan));

	if($simpan){
	echo "<script language=\"javascript\">\n";
	echo "alert(\"Terimakasih Atas Support Anda !\")\n";
	echo "window.location=\"../\" ";
	echo "</script>";
	}else {
		echo "<script language=\"javascript\">\n";
		echo "alert(\"Maaf Gagal Disimpan, Silahkan Ulangi\")\n";
		echo "window.location=\"../\" ";
		echo "</script>";
		}
}
?>
