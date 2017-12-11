<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="header">
              <h4 class="title">Data Member</h4>

          </div>
          <div class="content table-responsive">
              <table class="table table-striped" id="tabel_data">
                  <thead>
                      <th>Id</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                      <th>Telepon</th>
                      <th>Alamat</th>
                      <th>Nama Usaha</th>
                      <th>Jenis Usaha</th>
                      <th>Pekerjaan</th>
                      <th>Pilihan</th>
                  </thead>

                  <tbody>
                      <?php
$query = mysqli_query($connect,"SELECT * FROM `user`");
while($data = mysqli_fetch_array($query)){
?>

                      <tr>
                        <td><?php echo $data['id_user']?></td>
                        <td><?php echo $data['nama_user']?></td>
                        <td><?php echo $data['email_user']?></td>
                        <td><?php echo $data['pass_user']?></td>
                          <td><?php echo $data['phone_user']?></td>
                        <td><?php echo $data['alamat_user']?></td>
                        <td><?php echo $data['nama_usaha']?></td>
                        <td><?php echo $data['jenis_usaha']?></td>
                          <td><?php echo $data['pekerjaan']?></td>
                          <td>
      <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??'))
      { location.href='menu/deleteuser.php?id=<?php echo $data['id_user'];?>' }" class="btn btn-danger">Hapus</a>
</td>

                      </tr>
                      <?php } ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
