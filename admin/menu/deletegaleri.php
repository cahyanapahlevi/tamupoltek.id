
<?php
include '../koneksi.php';
$id=$_GET['id'];
$sql1=mysqli_query($connect,"select * from galeri where id_galeri='$id' ");
$cek=mysqli_fetch_array($sql1);

if($cek['gambar']==''){
  }else {
    @unlink("../../images/galeri/$cek[gambar]");
  }
  $sql="delete from galeri where id_galeri='$id'";
  $query=mysqli_query($connect,$sql) or die(mysqli_error($query));
  if($query){
    echo "<script language=\"javascript\">\n";
  	echo "alert(\"Data Berhasil Dihapus!!\")\n";
  	echo "window.location=\"../home.php?home=gallery\" ";
  	echo "</script>";
  	}else {
  		echo "<script language=\"javascript\">\n";
  		echo "alert(\"Maaf Gagal Dihapus, Silahkan Ulangi\")\n";
  		echo "window.location=\"../home.php?home=gallery\" ";
  		echo "</script>";
  		}
?>
