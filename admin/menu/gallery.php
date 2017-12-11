<?php
include "./koneksi.php";
function nomor() {
  include "./koneksi.php";
	$sql = "SELECT id_galeri FROM galeri ORDER BY id_galeri DESC LIMIT 0,1";
	$query = mysqli_query($connect,$sql) or die (mysqli_error($query));
	list ($no_temp) = mysqli_fetch_row($query);

	if ($no_temp == '') {
		$no_urut = 'G0001';
		} else {
		$jum = substr($no_temp,1,5);
		$jum++;
		if($jum <= 9) {
			$no_urut = 'G000' . $jum;
		} elseif ($jum <= 99) {
			$no_urut = 'G00' . $jum;
		} elseif ($jum <= 999) {
			$no_urut = 'G0' . $jum;
		} elseif ($jum <= 9999) {
			$no_urut = 'G' . $jum;
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
              <h4 class="title">Data Gambar</h4>
              <br>
              <a href="addgaleri.php" class="btn btn-success" data-toggle='modal' data-target='#addgaleri'>
              <i class="fa fa-plus"></i> Tambah Gambar</a>
          </div>

          <div class="content table-responsive">
              <table class="table table-striped" id="tabel_data">
                  <thead>
                      <th>Id</th>
                    <th>Nama Gambar</th>
                    <th>Gambar</th>
                    
                      <th>Pilihan</th>
                  </thead>

                  <tbody>
                      <?php
                         $query = mysqli_query($connect,"SELECT * FROM `galeri`");
                         while($data = mysqli_fetch_array($query)){
                      ?>

                      <tr>
                        <td><?php echo $data['id_galeri']?></td>
                        <td><?php echo $data['nama_gambar']?></td>
                        <td><img src="/images/galeri/<?php echo $data['gambar'];?>"height="60px" width="60px" /></td>
                        
                        <td>
                          
                          <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??'))
                          { location.href='menu/deletegaleri.php?id=<?php echo $data['id_galeri'];?>' }" class="btn btn-danger">
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
