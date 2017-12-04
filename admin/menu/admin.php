<?php
include "./koneksi.php";
function nomor() {
  include "./koneksi.php";
	$sql = "SELECT id_admin FROM admin ORDER BY id_admin DESC LIMIT 0,1";
	$query = mysqli_query($connect,$sql) or die (mysqli_error($query));
	list ($no_temp) = mysqli_fetch_row($query);

	if ($no_temp == '') {
		$no_urut = 'a0001';
		} else {
		$jum = substr($no_temp,1,5);
		$jum++;
		if($jum <= 9) {
			$no_urut = 'a000' . $jum;
		} elseif ($jum <= 99) {
			$no_urut = 'a00' . $jum;
		} elseif ($jum <= 999) {
			$no_urut = 'a0' . $jum;
		} elseif ($jum <= 9999) {
			$no_urut = 'a' . $jum;
		} else {
			die("Nomor urut melebih batas");
		}
	}
		return $no_urut;
}
$id = nomor();
?>


<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="header">
              <h4 class="title">Data Admin</h4>
              <br>
              <a href="addadmin.php" class="btn btn-success" data-toggle='modal' data-target='#addadmin'>
              <i class="fa fa-plus"></i> Tambah Admin</a>
          </div>

          <div class="content table-responsive">
              <table class="table table-striped" id="tabel_data">
                  <thead>
                      <th>Id</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Telepon</th>
                      <th>Pilihan</th>
                  </thead>

                  <tbody>
                      <?php
                         $query = mysqli_query($connect,"SELECT * FROM `admin`");
                         while($data = mysqli_fetch_array($query)){
                      ?>

                      <tr>
                        <td><?php echo $data['id_admin']?></td>
                        <td><?php echo $data['username']?></td>
                        <td><?php echo $data['password']?></td>
                        <td><?php echo $data['phone_admin']?></td>
                        <td>
                          <a class="editadmin btn btn-warning" id='<?php echo $data['id_admin'];?>' data-toggle="modal" data-target="#admin">
                          <i class="fa fa-pencil"></i></a>
                          <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??'))
                          { location.href='menu/deleteadmin.php?id=<?php echo $data['id_admin'];?>' }" class="btn btn-danger">
                          <i class="fa fa-trash"></i></a>
                        </td>

                      </tr>
                      <?php } ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
