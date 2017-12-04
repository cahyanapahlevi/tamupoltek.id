<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="header">
          <h4 class="title">Kritik & Saran</h4>
      </div>
        <div class="content table-responsive">
          <table class="table table-striped" id="tabel_data">
              <thead>
                <th>Id</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Message</th>
                <th>Action</th>
              </thead>

              <tbody>
                  <?php
                  $query = mysqli_query($connect,"SELECT * FROM `contactus`");
                  while($data = mysqli_fetch_array($query)){
                  ?>

                  <tr>
                    <td><?php echo $data['id_contact']?></td>
                    <td><?php echo $data['nama']?></td>
                    <td><?php echo $data['email']?></td>
                    <td><?php echo $data['message']?></td>
                    <td>
                    <a class="btn btn-danger" onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??'))
                    { location.href='menu/deleteadmin.php?id=<?php echo $data['id_contact'];?>' }">Hapus</a>
                    </td>

                  </tr>
                  <?php } ?>
              </tbody>
          </table>
        </div>
    </div>
  </div>
</div>
