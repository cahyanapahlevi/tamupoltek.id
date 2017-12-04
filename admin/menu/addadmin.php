<?php
include "./koneksi.php";
if (isset($_POST['simpan'])) {
	$id=$_POST['id_admin'];
	$user=$_POST['username'];
	$pass=$_POST['password'];
	$phone=$_POST['phone'];
	$query = "INSERT INTO admin(id_admin,username,password,phone_admin) VALUES ('$id','$user','$pass','$phone')";
	$simpan = mysqli_query($connect,$query);
	if($simpan){
	echo "<script language=\"javascript\">\n";
	echo "alert(\"Data Berhasil Dimasukkan!!\")\n";
	echo "window.location=\"./home.php?home=admin\" ";
	echo "</script>";
	}else {
		echo "<script language=\"javascript\">\n";
		echo "alert(\"Maaf Gagal Disimpan, Silahkan Ulangi\")\n";
		echo "window.location=\"./home.php?home=admin\" ";
		echo "</script>";
		}
}
?>
<div class="modal-dialog modal-sm">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">ADD ADMIN</h4>
		</div>
		<form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
		<div class="modal-body">
				<p>Id Admin</p>
				<div class="form-line">
				<input type="text" class="form-control" name="id_admin" value="<?php echo $id; ?>">
				</div>
				<p>Username</p>
				<div class="form-line">
				<input type="text" class="form-control" placeholder="Username" name="username" value="">
				</div>
				<p>Password</p>
				<div class="form-line">
				<input type="text" class="form-control" placeholder="*****" name="password" value="">
				</div>
				<p>Telephone</p>
				<div class="form-line">
				<input type="text" class="form-control" placeholder="08xxxxxxx" name="phone" value="">
				</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
			<button type="submit" class="btn btn-success" name="simpan">Save</button>
		</div>
		</form>
		</div>
	</div>
