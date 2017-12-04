<?php
include "koneksi.php";
if (isset($_POST['signup'])) {
$id			= $_POST['id_user'];
$nama   =$_POST['nama'];
$email  =$_POST['email'];
$pass   = $_POST['password'];
$query  = "INSERT INTO `user`(`id_user`,`nama_user`, `email_user`, `pass_user`) VALUES ('$id','$nama','$email','$pass')";
$simpan = mysqli_query($connect,$query)or die(mysqli_error($simpan));

if($simpan){
echo "<script language=\"javascript\">\n";
echo "alert(\"Berhasil, Silahkan Log In !!\")\n";
echo "window.location=\"../index.php\" ";
echo "</script>";
}else {
	echo "<script language=\"javascript\">\n";
	echo "alert(\"Maaf Gagal Disimpan, Silahkan Ulangi\")\n";
	echo "window.location=\"../index.php\" ";
	echo "</script>";
	}
}
?>
