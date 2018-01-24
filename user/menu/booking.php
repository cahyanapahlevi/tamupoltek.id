
<?php
include "./koneksi.php";
function nomor2() {
  include "./koneksi.php";
	$sql = "SELECT id_booking FROM booking ORDER BY id_booking DESC LIMIT 0,1";
	$query = mysqli_query($connect,$sql) or die (mysqli_error($query));
	list ($no_temp) = mysqli_fetch_row($query);

	if ($no_temp == '') {
		$no_urut = 'b0001';
		} else {
		$jum = substr($no_temp,1,5);
		$jum++;
		if($jum <= 9) {
			$no_urut = 'b000' . $jum;
		} elseif ($jum <= 99) {
			$no_urut = 'b00' . $jum;
		} elseif ($jum <= 999) {
			$no_urut = 'b0' . $jum;
		} elseif ($jum <= 9999) {
			$no_urut = 'b' . $jum;
		} else {
			die("Nomor urut melebih batas");
		}
	}
		return $no_urut;
}
$idbooking = nomor2();
if (isset($_POST['cek'])) {
  if (isset($_SESSION['event'])) {
  }//kunci untuk memulai
  unset($_SESSION['event']);

$id=$idbooking;
$event=$_POST['check_list'];

if(!empty($_POST['check_list'])) {
  $checked_count = count($_POST['check_list']);
  foreach($_POST['check_list'] as $selected) {
  $tes = mysqli_query($connect,"SELECT * from `event` where eventdate='$selected'");
  $ceks = mysqli_fetch_assoc($tes);

  if(mysqli_num_rows($tes)) {
    for ($i=0; $i < $checked_count; $i++) {
      echo $event[$i];
    }
    $_SESSION['event']=array($event);
    //$_SESSION['event']=$ceks['id_event'];//membuat session(kunci) untuk kehalaman berikutnya dengan acuan field"nama_pelanggan" dari variabel dtUser
    echo "<script language=\"javascript\">\n";
    echo "alert(\"Berhasil, Booking !\")\n";
    echo "</script>";
    }else {
    	echo "<script language=\"javascript\">\n";
    	echo "alert(\"Maaf Gagal Disimpan, Silahkan Ulangi\")\n";
    	echo "</script>";
    	}
    }
  }
if(empty($_POST['check_list'])){
  echo "<script language=\"javascript\">\n";
  echo "alert(\"Please Select Atleast One Option.\")\n";
  //echo "window.location=\"home.php?page=booking\" ";
  echo "</script>";
  }
}
?>
    <div class="card">
        <div class="content">
            <div class="row">
              <div class="header">
                  <h4 class="title">BOOKING STAND</h4>
              </div>
            </div>
            <div class="footer">
                <hr />
                <div class="stats">
                    <h3><i class="ti-alarm-clock"></i> <u>Pilih Jadwal Event</u></h3>
                </div>
            </div>
            <form class="form-horizontal" action="" method="post">
              <div class="row">
                  <div class="col-md-12">
                    <?php
                    $sql=mysqli_query($connect,"select * from event ORDER BY id_event ASC limit 3,4");
                    $sql2=mysqli_query($connect,"select * from event ORDER BY id_event ASC limit 1,2");
                     while($cekevent=mysqli_fetch_array($sql2) and $cekevent2=mysqli_fetch_array($sql)){
                       ?>
                <table>
                  <tr>
                    <th>
                    <div class="col-md-12">
                      <div class="checkbox">
                      <label>
                        <input type="checkbox" name="check_list[]" value="<?php echo $cekevent['eventdate']; ?>"><?php echo $cekevent['eventdate']; ?>
                      </label>
                      </div>
                    </div>
                    </th>
                  <th>
                  <div class="col-md-12">
                    <div class="checkbox">
                    <label>
                      <input type="checkbox" name="check_list[]" value="<?php echo $cekevent2['eventdate']; ?>"><?php echo $cekevent2['eventdate']; ?>
                    </label>
                    </div>
                    </div>
                  </th>
                </tr>
              </table>
                  <?php } ?>
                  </div>
              </div>
              <div class="text-center">
                  <button type="submit" class="btn btn-success btn-fill btn-wd" name="cek">CEK STAND</button>
              </div>
            </form>
        </div>
    </div>

<?php
    if(isset($_SESSION['event'])){
?>
<div class="col-lg-6 col-md-5">
    <div class="card">
        <div class="content">
            <div class="row">
              <div class="header">
                  <h4 class="title">SELECT YOUR BEST STAND:</h4>
              </div>
            </div>
            <div class="footer">
                <hr />
                <div class="stats">
                    <h3><i class="ti-alarm-clock"></i> <u>Jadwal Event</u></h3>
                </div>
            </div>
      <form action="prosesbooking.php" method="post">
        <label class="control-group"></label>
          <div class="control-group">
            <?php
            date_default_timezone_set('Asia/Jakarta');
             $tgl=date('l, Y-m-d ,h:i a');
              $tgl_event='';
              $sql1="SELECT * from `event` where id_event='$_SESSION[event]'";
              $query=mysqli_query($connect,$sql1);
              while($hevent=mysqli_fetch_array($query)){
            ?>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
            <label><?php echo $hevent['eventdate']?> : </label>
              </div>

            </div>
            <div class="col-md-6">
              <div class="form-group">

              <?php
                $sql     = mysqli_query($connect,"SELECT stand.id_stand FROM stand WHERE NOT EXISTS (SELECT * FROM detail_booking, event,booking WHERE detail_booking.id_stand = stand.id_stand and booking.id_event=event.id_event and event.eventdate='$tgl_event')");
                while($query2=mysqli_fetch_array($sql)){
              ?>
                  <input type="checkbox" name="check_list[]" value="<?php echo $query2['id_stand'];?>"> <?php echo $query2['id_stand'];?>
                  <?php } ?>
          </div>
        </div>
        </form>
    </div>
  <?php }?>
<?php }?>
</div>
</div>
</div>
</div>
