<?php
include "./koneksi.php";
if (isset($_POST['simpan1'])) {
	$id=$_POST['id_galeri'];
	$nama=$_POST['nama_gambar'];
	$gambar=$_POST['gambar'];
	$input=$_FILES['gambar']['name'];
	$tempat=$_FILES['gambar']['tmp_name'];
  move_uploaded_file($tempat, "../images/galeri/".$input);

	if(empty($tempat)){
		echo "<script language=\"javascript\">\n";
		echo "alert(\"Maaf Anda belum memilih Gambar\")\n";
		echo "window.location=\"./home.php?home=gallery\" ";
		echo "</script>";
	}else {
	$query = mysqli_query($connect,"INSERT INTO galeri VALUES ('$id','$nama','$input')") or die (mysql_error());
  echo "<script language=\"javascript\">\n";
	echo "alert(\"Data berhasil disimpan ..\")\n";
	echo "window.location=\"./home.php?home=gallery\" ";
	echo "</script>";
	}
}
?>
<div class="modal-dialog modal-sm">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">ADD GAMBAR</h4>
		</div>
		<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
		<div class="modal-body">
				<p>Id Gambar</p>
				<div class="form-line">
				<input type="text" class="form-control" name="id_galeri" value="<?php echo $id; ?>">
				</div>
				<p>Nama Gambar</p>
				<div class="form-line">
				<input type="text" class="form-control" placeholder="Nama Gambar" name="nama_gambar" value="">
				</div>
        <p>Gambar</p>
				<div class="form-line">
				<input type="file" class="form-control" placeholder="" name="gambar" value="">
				</div>

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
			<button type="submit" class="btn btn-success" name="simpan1">Save</button>
		</div>
		</form>
		</div>
	</div>
