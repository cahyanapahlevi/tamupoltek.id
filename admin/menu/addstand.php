<?php
include "../koneksi.php";
function nomor() {
  include "../koneksi.php";
	$sql = "SELECT id_stand FROM stand ORDER BY id_stand DESC LIMIT 0,1";
	$query = mysqli_query($connect,$sql) or die (mysqli_error($query));
	list ($no_temp) = mysqli_fetch_row($query);

	if ($no_temp == '') {
		$no_urut = 'A01';
		} else {
		$jum = substr($no_temp,1,3);
		$jum++;
		if($jum <= 9) {
			$no_urut = 'A0' . $jum;
		} elseif ($jum <= 99) {
			$no_urut = 'A' . $jum;
    }else {
			die("Nomor urut melebih batas");
		}
	}
		return $no_urut;
}
$idstand = nomor();

if (isset($_POST['save'])) {
	$id			= $idstand;
	$query = "INSERT INTO `stand` (`id_stand`) VALUES ('$id')";
	$simpan = mysqli_query($connect,$query)or die(mysqli_error($simpan));
}
	if($simpan){
	echo "<script language=\"javascript\">\n";
	echo "alert(\"Data Berhasil Dimasukkan!!\")\n";
	echo "window.location=\"../home.php?home=stand\" ";
	echo "</script>";
	}else {
		echo "<script language=\"javascript\">\n";
		echo "alert(\"Maaf Gagal Disimpan, Silahkan Ulangi\")\n";
		echo "window.location=\"../home.php?home=stand\" ";
		echo "</script>";
		}

?>
