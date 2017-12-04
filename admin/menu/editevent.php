<?php
include "../koneksi.php";
$id=$_GET['id_event'];
$sql="select * from event where id_event='$id'";
$query = mysqli_query($connect,$sql);
$sql_res = mysqli_fetch_array($query) or die(mysqli_error($sql_res));
?>
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Event</h4>
        </div>
        <form class="form-horizontal" role="form" action="menu/proseseditevent.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <p>Id Event</p>
            <div class="form-line">
            <input type="text" class="form-control" name="id_event" value="<?php echo $sql_res['id_event']; ?>">
            </div>
            <p>Tanggal Event</p>
            <div class="form-line">
            <input type="date" class="form-control" placeholder="Tanggal Event" name="eventdate" value="<?php echo $sql_res['eventdate'] ; ?>">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success" name="edit">Save</button>
        </div>
        </form>
        </div>
			</div>
