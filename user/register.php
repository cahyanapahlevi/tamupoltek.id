<?php
include "koneksi.php";
function nomor() {
  include "koneksi.php";
	$sql = "SELECT id_user FROM user ORDER BY id_user DESC LIMIT 0,1";
	$query = mysqli_query($connect,$sql) or die (mysqli_error($query));
	list ($no_temp) = mysqli_fetch_row($query);

	if ($no_temp == '') {
		$no_urut = 'u0001';
		} else {
		$jum = substr($no_temp,1,5);
		$jum++;
		if($jum <= 99) {
			$no_urut = 'u000' . $jum;
		} elseif ($jum <= 999) {
			$no_urut = 'u00' . $jum;
		} elseif ($jum <= 9999) {
			$no_urut = 'u0' . $jum;
		} elseif ($jum <= 99999) {
			$no_urut = 'u' . $jum;
		} else {
			die("Nomor urut melebih batas");
		}
	}
		return $no_urut;
}
$id_user = nomor();

if (isset($_POST['signup'])) {
$id			= $id_user;
$nama   = $_POST['nama'];
$email  = $_POST['email'];
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
