<?php
include "../koneksi.php";
$id=$_GET['id_admin'];
$sql="select * from admin where id_admin='$id'";
$query = mysqli_query($connect,$sql);
$sql_res = mysqli_fetch_array($query) or die(mysqli_error($sql_res));
?>
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Admin</h4>
        </div>
        <form class="form-horizontal" role="form" action="menu/proseseditadmin.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <p>Id Admin</p>
            <div class="form-line">
            <input type="text" class="form-control" name="id_admin" value="<?php echo $sql_res['id_admin']; ?>">
            </div>
            <p>Username</p>
            <div class="form-line">
            <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $sql_res['username'] ; ?>">
            </div>
            <p>Password</p>
            <div class="form-line">
            <input type="text" class="form-control" placeholder="*****" name="password" value="<?php echo $sql_res['password'] ; ?>">
            </div>
            <p>Telephone</p>
            <div class="form-line">
            <input type="text" class="form-control" placeholder="08xxxxxxx" name="phone" value="<?php echo $sql_res['phone_admin'] ; ?>">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success" name="edit">Save</button>
        </div>
        </form>
        </div>
			</div>
