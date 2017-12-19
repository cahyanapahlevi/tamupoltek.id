<?php
include "./koneksi.php";
?>


<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="header">
              <h4 class="title">BOOKING LIST</h4>
              <br>
          </div>

          <div class="content table-responsive">
              <table class="table table-striped" id="tabel_data">
                  <thead>
                    <th>Id</th>
                    <th>Tanggal Booking</th>
                    <th>Status</th>
                    <th>ID USER</th>
                    <th>ID_EVENT</th>
                    <th>ID_STAND</th>
                    <th></th>
                  </thead>
                  <tbody>
                      <?php
                         $query = mysqli_query($connect,"SELECT * FROM `booking`");
                         while($data = mysqli_fetch_array($query)){
                      ?>
                      <tr>
                        <td><?php echo $data['id_booking']?></td>
                        <td><?php echo $data['date_booking']?></td>
                        <td><?php echo $data['status']?></td>
                        <td><?php echo $data['id_user']?></td>
                        <td><?php echo $data['id_event']?></td>
                        <td><?php echo $data['id_stand']?></td>
                        <td>
                          <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??'))
                          { location.href='menu/deletebooking.php?id=<?php echo $data['id_booking'];?>' }" class="btn btn-danger">
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
