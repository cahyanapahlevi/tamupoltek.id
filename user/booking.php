<?php
if(isset($_POST['submit'])){
if(!empty($_POST['check_list'])) {
// Counting number of checked checkboxes.
$checked_count = count($_POST['check_list']);
echo "You have selected following ".$checked_count." option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
foreach($_POST['check_list'] as $selected) {
echo "<p>".$selected ."</p>";
}
echo "<br/><b>Note :</b> <span>Similarily, You Can Also Perform CRUD Operations using These Selected Values.</span>";
}
else{
echo "<b>Please Select Atleast One Option.</b>";
}
}
?>
<?php
include "koneksi.php";
if (isset($_POST['submit'])) {
$id      = $selected;
$id_user = $_POST['id_user'];
$tgl     = $_POST['tanggal'];
$sql     = mysqli_query($connect,"select * from stand");
$query2  = mysqli_fetch_array($sql);
if(isset($query2['id_user']))
if(!empty($_POST['check_list'])) {
  $checked_count = count($_POST['check_list']);
  foreach($_POST['check_list'] as $selected) {
$query  = "UPDATE `stand` SET `id_user`='$id_user',`tgl_pemesanan`='$tgl' WHERE id_stand='$selected'  ";
$simpan = mysqli_query($connect,$query) or die(mysqli_error($simpan));

if($simpan){
echo "<script language=\"javascript\">\n";
echo "alert(\"Berhasil, Booking !\")\n";
echo "window.location=\"../index.php\" ";
echo "</script>";
}else {
	echo "<script language=\"javascript\">\n";
	echo "alert(\"Maaf Gagal Disimpan, Silahkan Ulangi\")\n";
	echo "window.location=\"../index.php\" ";
	echo "</script>";
	}
}
}
}
?>
