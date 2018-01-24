
<?php
include '../koneksi.php';
$sql="UPDATE `detail_booking` SET `id_booking` = '',`id_stand` = '';";
$query=mysqli_query($connect,$sql) or die(mysql_error($query));
if($query){
    echo "<script language=\"javascript\">\n";
	echo "alert(\"Data Berhasil DIRESET !!\")\n";
	echo "window.location=\"../home.php?home=stand\" ";
	echo "</script>";
	}else {
		echo "<script language=\"javascript\">\n";
		echo "alert(\"Maaf Gagal Dihapus, Silahkan Ulangi\")\n";
		echo "window.location=\"../home.php?home=stand\" ";
		echo "</script>";
		}
?>
