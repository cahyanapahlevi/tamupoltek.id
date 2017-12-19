
<?php
include "koneksi.php";
function nomor2() {
  include "koneksi.php";
	$sql = "SELECT id_booking FROM booking ORDER BY id_booking DESC LIMIT 0,1";
	$query = mysqli_query($connect,$sql) or die (mysqli_error($query));
	list ($no_temp) = mysqli_fetch_row($query);

	if ($no_temp == '') {
		$no_urut = 'b0001';
		} else {
		$jum = substr($no_temp,1,5);
		$jum++;
		if($jum <= 9) {
			$no_urut = 'b000' . $jum;
		} elseif ($jum <= 99) {
			$no_urut = 'b00' . $jum;
		} elseif ($jum <= 999) {
			$no_urut = 'b0' . $jum;
		} elseif ($jum <= 9999) {
			$no_urut = 'b' . $jum;
		} else {
			die("Nomor urut melebih batas");
		}
	}
		return $no_urut;
}
$idbooking = nomor2();

if (isset($_POST['submit'])) {
$id=$idbooking;
$id_user = $_POST['id_user'];
$tgl     = $_POST['tanggal'];
$event  = $_POST['date_event'];
if(!empty($_POST['check_list'])) {
  $checked_count = count($_POST['check_list']);
  foreach($_POST['check_list'] as $selected) {
$query  = "INSERT INTO `booking` (`id_booking`,`date_booking`,`status`,`id_user`,`id_event`,`id_stand`) VALUES ('$id','$tgl','','$id_user','$event','$selected')";
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
if(empty($_POST['check_list'])){
  echo "<script language=\"javascript\">\n";
  echo "alert(\"Please Select Atleast One Option.\")\n";
  echo "window.location=\"../index.php\" ";
  echo "</script>";
  }
}
?>
