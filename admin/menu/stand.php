<?php
include "./koneksi.php";
?>
<div class="row">
<div class="col-md-7">
  <div class="card">
    <div class="header">
      <div class="alert alert-warning alert-with-icon" data-notify="container">
          <button type="button" aria-hidden="true" class="close">×</button>
          <span data-notify="icon" class="ti-alarm-clock"></span>
          <span data-notify="message"><strong>TABEL STAND</strong></span>
      </div>
    </div>
    <div class="content table-responsive">
      <table class="table table-striped" id="tabel_data">
        <thead>
            <th>No</th>
            <th>KODE</th>
            <th>STATUS</th>
        </thead>
        <tbody>
          <?php
              $no = 1;
              $sql=mysqli_query($connect,"Select * from stand");
              while($query=mysqli_fetch_array($sql)){
          ?>
          <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $query['id_stand']; ?></td>
            <td><?php echo $query['status']; ?></td>
          </tr>
          <?php $no++ ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="col-md-5">
<div class="card">
    <div class="header">
      <div class="alert alert-info alert-with-icon" data-notify="container">
          <button type="button" aria-hidden="true" class="close">×</button>
          <span data-notify="icon" class="ti-bell"></span>
          <span data-notify="message"><strong>RESET STAND </strong></span>
      </div>
    </div>
    <div class="content table-responsive">
      <form role="form" action="menu/addstand.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <!--<label for="email"></label>
          <!--<input type="text" value="<?php echo $idstand; ?>" name="id_stand" />
          <!--<input type="number" name="jmlstand" class="form-control" placeholder="Isi Angka">-->
        </div>
        <button type="submit" class="btn btn-default" name="save">TAMBAH STAND</button>
        <a onclick="if(confirm('Apakah anda yakin ingin MERESET DATA STAND ini ??'))
        { location.href='menu/deletestand.php' }" class="btn btn-danger">
        <i class="fa fa-trash"></i> RESET STAND</a>
      </form>
</div>
</div>
</div>
