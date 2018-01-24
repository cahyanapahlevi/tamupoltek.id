<?php
include "./koneksi.php";
?>
<div class="row">
  <div class="col-lg-4 col-md-5">
    <?php
    $id = $_SESSION['id'];
    $ceknama=mysqli_query($connect,"select * from user where id_user='$id' ");
    $cekbooking=mysqli_query($connect,"SELECT * FROM detail_booking,event,booking WHERE booking.id_event=event.id_event and detail_booking.id_booking=booking.id_booking and id_user='$id'");
    $ceknamalagi=mysqli_fetch_array($ceknama);
    $cekbookinglagi=mysqli_fetch_array($cekbooking);
    $tgl2=date('l, d-m-Y, h:i:a');
    ?>
      <div class="card card-user">
          <div class="image">
              <img src="assets/img/background.jpg" alt="..."/>
          </div>
          <div class="content">
              <div class="author">
                <img class="avatar border-white" src="assets/img/faces/face-2.jpg" alt="..."/>
                <h4 class="title"><?php echo $ceknamalagi['nama_user'];?><br />
                   <a href="#"><small><?php echo $ceknamalagi['email_user'];?></small></a>
                </h4>
              </div>
              <p class="description text-center">
                  <br>
                  " <?php echo $ceknamalagi['nama_usaha'];?> "<br>
                  <?php echo $ceknamalagi['pekerjaan'];?><br>
                  <?php echo $ceknamalagi['phone_user'];?><br>
                  <?php echo $ceknamalagi['alamat_user'];?>
              </p>
          </div>
          <hr>
          <div class="text-center">
              <div class="row">
                  <div class="col-md-3 col-md-offset-1">
                      <h5>12<br /><small>Files</small></h5>
                  </div>
                  <div class="col-md-4">
                      <h5>2GB<br /><small>Used</small></h5>
                  </div>
                  <div class="col-md-3">
                      <h5>24,6$<br /><small>Spent</small></h5>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <div class="col-lg-5 col-md-7 collapse" id="collapse">
      <div class="card">
          <div class="header">
              <h4 class="title">Edit Profile</h4>
          </div>
          <div class="content">
              <form action="menu/edituser.php" method="post">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Username</label>
                              <input type="text" name="name" class="form-control border-input" placeholder="" value="<?php echo $ceknamalagi['nama_user'];?>">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control border-input" placeholder="" value="<?php echo $ceknamalagi['email_user'];?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label>Password</label>
                              <input type="text" name="pass" class="form-control border-input" placeholder="" value="<?php echo $ceknamalagi['pass_user'];?>">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Address</label>
                              <input type="text" name="alamat" class="form-control border-input" placeholder="" value="<?php echo $ceknamalagi['alamat_user'];?>">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Phone Number</label>
                              <input type="number" name="phone" class="form-control border-input" placeholder="" value="<?php echo $ceknamalagi['phone_user'];?>">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Nama Usaha</label>
                              <input type="text" name="nama_usaha" class="form-control border-input" placeholder="" value="<?php echo $ceknamalagi['nama_usaha'];?>">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <label>Jenis Usaha</label>
                              <input type="text" name="jenis_usaha" class="form-control border-input" placeholder="" value="<?php echo $ceknamalagi['jenis_usaha'];?>">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control border-input" placeholder="" value="<?php echo $ceknamalagi['pekerjaan'];?>">
                        </div>
                      </div>
                  </div>
                  <div class="text-center">
                      <button type="submit" class="btn btn-info btn-fill btn-wd" name="save">Update Profile</button>
                  </div>
                  <div class="clearfix"></div>
              </form>
          </div>
      </div>
  </div>

    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                  <a href="home.php?home=user">
                    <div class="col-xs-5">
                      <div class="icon-big icon-success text-center">
                          <i class="ti-write"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p><a data-toggle="collapse" href="#collapse">EDIT PROFILE</a></p>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <hr />
                    <div class="stats">
                        <i class="ti-reload"></i>See now
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                  <?php
                  $sql2 = "SELECT * FROM kritiksaran";
                  $query = mysqli_query($connect,$sql2);
                  $count = mysqli_num_rows($query);
                  ?>
                  <a href="home.php?home=report">
                    <div class="col-xs-5">
                        <div class="icon-big icon-success text-center">
                            <i class="ti-write"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Report Booking</p>
                            <?php echo $count;?>
                        </div>
                    </div>

                </div>
                <div class="footer">
                    <hr />
                    <div class="stats">
                        <i class="ti-calendar"></i> Last day
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                  <?php
                  $sql3 = "SELECT * FROM booking";
                  $query = mysqli_query($connect,$sql3);
                  $count = mysqli_num_rows($query);
                  ?>
                  <a href="home.php?home=booking">
                    <div class="col-xs-5">
                        <div class="icon-big icon-danger text-center">
                            <i class="ti-money"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Booking List</p>
                            <?php echo $count;?>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <hr />
                    <div class="stats">
                        <i class="ti-timer"></i> In the last hour
                    </div>
                </div>
              </a>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="content">
                <div class="row">
                    <div class="col-xs-5">
                        <div class="icon-big icon-info text-center">
                            <i class="ti-twitter-alt"></i>
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Followers</p>
                            +45
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <hr />
                    <div class="stats">
                        <i class="ti-reload"></i> Updated now
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
