<?php
include "./koneksi.php";
function nomor() {
  include "./koneksi.php";
	$sql = "SELECT id_event FROM event ORDER BY id_event DESC LIMIT 0,1";
	$query = mysqli_query($connect,$sql) or die (mysqli_error($query));
	list ($no_temp) = mysqli_fetch_row($query);

	if ($no_temp == '') {
		$no_urut = 'e0001';
		} else {
		$jum = substr($no_temp,1,5);
		$jum++;
		if($jum <= 9) {
			$no_urut = 'e000' . $jum;
		} elseif ($jum <= 99) {
			$no_urut = 'e00' . $jum;
		} elseif ($jum <= 999) {
			$no_urut = 'e0' . $jum;
		} elseif ($jum <= 9999) {
			$no_urut = 'e' . $jum;
		} else {
			die("Nomor urut melebih batas");
		}
	}
		return $no_urut;
}
$id = nomor();
?>

<div class="row">
<div class="col-md-5">
<div class="card">
    <div class="header">
      <div class="alert alert-info alert-with-icon" data-notify="container">
          <button type="button" aria-hidden="true" class="close">×</button>
          <span data-notify="icon" class="ti-bell"></span>
          <span data-notify="message"><strong>Please Set the event of Date</strong></span>
      </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-10">
                <h5>Inputkan Tanggal yang diinginkan :</h5>
              <form role="form" action="menu/addevent.php" method="post" enctype="multipart/form-data">
                <input type="text" value="<?php echo $id; ?>" name="id_event" />
                  <div class="row">
                      <div class="col-md-10">
                          <div class="form-group">
                              <label>Jadwal Tamu Poltek</label>
                              <input type="date" class="form-control" placeholder="date" name="event" id="calendar">
                          </div>
                      </div>
                  </div>
                  <div class="text-center">
                      <button type="submit" class="btn btn-info btn-fill btn-wd" name="save">SAVE</button>
                  </div>
                  <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
</div>
</div>


<div class="col-md-7">
  <div class="card">
    <div class="header">
      <div class="alert alert-warning alert-with-icon" data-notify="container">
          <button type="button" aria-hidden="true" class="close">×</button>
          <span data-notify="icon" class="ti-alarm-clock"></span>
          <span data-notify="message"><strong>JADWAL TAMU POLTEK</strong></span>
      </div>
    </div>
    <div class="content table-responsive">
        <table class="table table-striped">
            <thead>
              <th>No</th>
              <th>ID Event</th>
              <th>Tanggal Event</th>
              <th>Edit</th>
              <th>Hapus</th>
            </thead>
            <tbody>
              <?php
                $no = 1;
                //$query = mysqli_query($connect,"SELECT * FROM `event` Order by id_event DESC LIMIT 5");
                 $query = mysqli_query($connect,"SELECT * FROM `event` ");
                 while($data = mysqli_fetch_array($query)){
              ?>
                <tr>
                  <td><?php echo $no?></td>
                  <td><?php echo $data['id_event']?></td>
                  <td><?php echo $data['eventdate']?></td>
                  <td>
                      <a href="#" class="editevent btn btn-success" id='<?php echo $data['id_event'];?>' data-toggle="modal" data-target="#event">
                      <i class="fa fa-pencil"></i></a>
                  </td>
                  <td>
                      <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??'))
                      { location.href='menu/deleteevent.php?id=<?php echo $data['id_event'];?>' }" class="btn btn-danger">
                      <i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <?php $no++?>
            </tbody>
            <?php }?>
        </table>


    </div>
  </div>
</div>
</div>
