
<?php
include '../koneksi.php';
$id=$_GET['id'];
$sql="delete from user where id_user='$id'";
$query=mysqli_query($connect,$sql) or die(mysql_error($query));
if($query){
    echo "<script language=\"javascript\">\n";
	echo "alert(\"Data Berhasil Dihapus!!\")\n";
	echo "window.location=\"../home.php?home=user\" ";
	echo "</script>";
	}else {
		echo "<script language=\"javascript\">\n";
		echo "alert(\"Maaf Gagal Dihapus, Silahkan Ulangi\")\n";
		echo "window.location=\"../home.php?home=user\" ";
		echo "</script>";
		}
?>
