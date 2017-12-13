<?php
session_start();
include("user/koneksi.php");
?>
<?php
function nomor() {
  include "user/koneksi.php";
	$sql = "SELECT id_user FROM user ORDER BY id_user DESC LIMIT 0,1";
	$query = mysqli_query($connect,$sql) or die (mysqli_error($query));
	list ($no_temp) = mysqli_fetch_row($query);

	if ($no_temp == '') {
		$no_urut = 'u0001';
		} else {
		$jum = substr($no_temp,1,5);
		$jum++;
		if($jum <= 99) {
			$no_urut = 'u000' . $jum;
		} elseif ($jum <= 999) {
			$no_urut = 'u00' . $jum;
		} elseif ($jum <= 9999) {
			$no_urut = 'u0' . $jum;
		} elseif ($jum <= 99999) {
			$no_urut = 'u' . $jum;
		} else {
			die("Nomor urut melebih batas");
		}
	}
		return $no_urut;
}
$id_user = nomor();
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Taman Usaha Poltek</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/flexslider.css">
<link rel="stylesheet" href="css/jquery.fancybox.css">
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/font-icon.css">
<link rel="stylesheet" href="css/animate.min.css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
</head>

<body>
<!-- header section -->
<section class="banner" role="banner">
  <header id="header">
    <div class="header-content clearfix"> <a class="logo" href="index.php"><i class="fa fa-shopping-cart"> TAMU</i></a>
      <nav class="navigation" role="navigation">
        <ul class="primary-nav">
		 <li><a href="#banner">Home</a></li>
          <li><a href="#event">Event</a></li>
          <li><a href="#content-3-10">About</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <!--<li><a href="#testimonials">Testimonials</a></li>-->
        <?php if (!isset($_SESSION['id'])) { ?>
          <li><a href="#" data-toggle="modal" data-target="#login">Booking Stand</a></li>
          <li><a href="#" data-toggle="modal" data-target="#login">Login</a></li>
        <?php } else { ?>
          <li><a href="#booking">Booking Stand</a></li>
            <li class="dropdown">
            <?php
            $ceknama=mysqli_query($connect,"select * from user where id_user='$_SESSION[id]' ");
            $ceknamalagi=mysqli_fetch_array($ceknama);
            ?>
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $ceknamalagi['nama_user'];?>
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#" data-toggle="modal" data-target="#akun">Account</a></li>
                  <li><a href="user/logout.php">Sign Out</a></li>
                </ul>
            </li>

            <?php } ?>

          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
      <a href="#" class="nav-toggle">Menu<span></span></a> </div>
  </header>
  <!-- banner text -->
    <div class="banner" id="banner">
	<div class="slider-banner">

            <div data-lazy-background="images/slides/13.jpg">
                <h3 data-pos="['75%', '-40%', '50%', '35%']" data-duration="700" data-effect="move">
                TAMU POLTEK
                </h3> <br>
                <p data-pos="['60%', '30%', '75%', '38%']" data-duration="700" data-effect="move">
                    Taman Usaha Politeknik Negeri Jember
                </p>
            </div>
        <div data-lazy-background="images/slides/11.jpg">
                <h3 data-pos="['75%', '-40%', '50%', '35%']" data-duration="700" data-effect="move">
                   TAMU POLTEK
                </h3> <br>
                <p data-pos="['60%', '30%', '75%', '38%']" data-duration="700" data-effect="move">
                    Taman Usaha Politeknik Negeri Jember
                </p>
            </div>
        <div data-lazy-background="images/slides/12.jpg">
                <h3 data-pos="['75%', '-40%', '50%', '35%']" data-duration="700" data-effect="move">
                   TAMU POLTEK
                </h3> <br>
                <p data-pos="['60%', '30%', '75%', '38%']" data-duration="700" data-effect="move">
                     Taman Usaha Politeknik Negeri Jember
                </p>
            </div>

        </div>
      <!-- banner text -->
    </div>
</section>
<!-- header section -->
<!-- intro section -->
<section id="intro" class="section intro">
  <div class="container">
    <div class="col-md-8 col-md-offset-2 text-center">
      <h3>Looking to grow your business?</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu libero scelerisque ligula sagittis faucibus eget quis lacus.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
  </div>
</section>
<!-- intro section -->

<!-- services section -->
<section id="event" class="services service-section">
  <div class="container">
  <div class="section-header">
                <h2 class="wow fadeInDown">Events</h2>
                <p class="wow fadeInDown">Jadwal Tamu Poltek</p>
            </div>
    <div class="row" >
      <div class="col-md-6 col-sm-6 services text-center wow pulse" data-wow-duration="2s" data-wow-iteration="300"> <span class="icon icon-strategy"></span>
        <div class="services-content">
          <h5>Designing</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu libero scelerisque ligula sagittis faucibus eget quis lacus.</p>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 services text-center wow pulse" data-wow-duration="4s" data-wow-iteration="300"> <span class="icon icon-tools"></span>
        <div class="services-content">
          <h5>Development</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu libero scelerisque ligula sagittis faucibus eget quis lacus.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- services section -->
<!--About-->
<section id="content-3-10" class="content-block data-section nopad content-3-10">
	<div class="image-container col-sm-6 col-xs-12 pull-left">
		<div class="background-image-holder wow fadeInLeft">
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-6 col-xs-12 content">
				<div class="editContent wow fadeInDown">
					<h3>About Tamu Poltek</h3>
				</div>
				<div class="editContent wow fadeInDown">
					<p>Taman usaha Politeknik Negeri Jember atau yang lebih sering dikenal dengan sebutan Tamu Poltek merupakan media atau sarana untuk mewadai inspirasi kewirausahaan mahasiswa.</p>
					<p></p>
				</div>
				<a href="#gallery" class="btn btn-outline btn-outline outline-dark wow fadeInLeft">Our Gallery</a>
			</div>
		</div><!-- /.row-->
	</div><!-- /.container -->
</section>


<!-- package section -->
<section class="video-section">
  <div class="container">
    <div class="row">
            <div id="content24" data-section="content-24" class="data-section">
    		<div class="col-md-6">
				<h3 class="eidtContent">Content Video</h3>
				<p class="eidtContent">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
   				<p class="editContent">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
				<p class="editContent">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
    		</div>
			<div class="col-md-6">
				<div class="embed-responsive embed-responsive-16by9">
				  <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/146742515?badge=0" allowfullscreen=""></iframe>
				</div>
			</div>
    	</div>
			</div><!-- end row -->
  </div>
</section>
<!-- package section -->

<!-- gallery section -->
<section id="gallery" class="gallery section">
  <div class="container-fluid">
    <div class="section-header">
                <h2 class="wow fadeInDown animated">Gallery</h2>
                <p class="wow fadeInDown animated">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
            </div>
    <div class="row no-gutter">
      <?php

				$cek = mysqli_query($connect,"select * from galeri LIMIT 8");
				while($cek2=mysqli_fetch_assoc($cek)){
			?>
      <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="images/galeri/<?php echo $cek2['gambar'];?>" class="work-box"> <img src="images/galeri/<?php echo $cek2['gambar'];?>" alt="">
        <div class="overlay">
          <div class="overlay-caption">
             <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay -->
        </a> </div>
      <?php } ?>
    </div>
  </div>
</section>
<!-- gallery section -->

<?php if (isset($_SESSION['id'])) { ?> ?>
<!-- our team section -->
<section id="booking" class="section teams">
  <div class="container">
      <div class="section-header">
        <h2 class="wow fadeInDown animated">Booking Stand</h2>
        <p class="wow fadeInDown animated">Choose Your Best Location <br> For Your Stand</p>
    </div>
    <h2>Select Your Stand:</h2>
<form action="user/booking.php" method="post">
<label class="control-group">Bagian Depan (Jalan Mastrip)</label>
<div class="control-group">
  <div class="checkbox">
  <label><input type="checkbox" onclick="if(this.checked){myFunction(this.value)}else{functionUnchek(this.value)}" name="check_list[]" value="A01">A01</label><br>
  <label><input type="checkbox" onclick="if(this.checked){myFunction(this.value)}else{functionUnchek(this.value)}" name="check_list[]" value="A02">A02</label><br>
  <label><input type="checkbox" onclick="if(this.checked){myFunction(this.value)}else{functionUnchek(this.value)}" name="check_list[]" value="A03">A03</label><br>
  <label><input type="checkbox" onclick="if(this.checked){myFunction(this.value)}else{functionUnchek(this.value)}" name="check_list[]" value="A04">A04</label><br>
  <label><input type="checkbox" onclick="if(this.checked){myFunction(this.value)}else{functionUnchek(this.value)}" name="check_list[]" value="A05">A05</label><br>
  </div>
</div>
<label>Stand yang dipilih: <input type="text" id="order" name="total" class="num" value="" readonly="readonly" /></label>

<script>
function myFunction(a){
  if(a != null){
    document.getElementById('order').value += a + " ";
  }
}
function functionUnchek(a){
  var nilai = document.getElementById('order').value;
  document.getElementById('order').value = nilai.replace(a + " ", "");
}
</script>

<input type="submit" name="submit" Value="Submit"/>
<?php include 'user/booking.php';?>
</form>
  </div>
</section>
<!-- our team section -->
<?php } ?>


<!-- Testimonials section -->
<section id="testimonials" class="section testimonials no-padding">
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="flexslider">
        <ul class="slides">
          <?php
          $sql=mysqli_query($connect,"Select * from kritiksaran LIMIT 3");
          while($query=mysqli_fetch_array($sql)){ ?>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"<?php echo $query['message']; ?>" </h1>
                <p><?php echo $query['nama']; ?></p>
              </blockquote>
            </div>
          </li>
          <?php } ?>
        </ul>

      </div>
    </div>
  </div>
</section>
<!-- Testimonials section -->

<!-- contact section -->
<section id="contact" class="section">
  <div class="container">
      <div class="section-header">
                <h2 class="wow fadeInDown">Critic and Suggestion</h2>
                <p class="wow fadeInDown">Kritik dan Saran Anda berguna untuk membangun Tamu Poltek <br> menjadi Lebih Baik</p>
            </div>
    <div class="row wow fadeInLeft">
      <div class="col-md-8 col-md-offset-2 conForm">
        <div id="message"></div>
        <form method="post" action="user/contact.php" >

          <input name="nama"  type="text" required class="col-xs-12 col-sm-12 col-md-12 col-lg-12" placeholder="Your name..." >
          <input name="email"  type="email" required class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 noMarr" placeholder="Email Address..." >
          <textarea name="message"  cols="" rows=""  required class="col-xs-12 col-sm-12 col-md-12 col-lg-12" placeholder="Message..."></textarea>
          <input type="submit" name="send" class="btn btn-info btn-fill btn-wd" value="send">

          <div id="simple-msg"></div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- contact section -->
<!-- Footer section -->
<footer class="footer">
<div class="container-fluid">
<div id="map-row" class="row">
    <div class="col-sm-8">
    	<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.423138184401!2d113.72092261432672!3d-8.160052594126485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b617d8f623%3A0xf6c4437632474338!2sPoliteknik+Negeri+Jember!5e0!3m2!1sid!2sid!4v1511319466851"></iframe>

    </div>
	 <div class="col-sm-4">
			<h2 style="margin-top:0;color:#fff;">Contact us</h2>
    		<address style="color:#fff;">
    			<strong>Taman Usaha Politeknik Negeri Jember</strong><br>
    			Jl. Mastrip Kotak Pos 164<br>
    			Sumbersari, Tegalgede,<br>
    			Kabupaten Jember, <br>
    			Jawa Timur 68121<br>
    			<abbr title="Phone">Tel:</abbr> (604) 555-4321
    		</address>
			  © 2018 Company Name. Template by <a target="_blank" href="http://webthemez.com/interior-design/" title="Bootstrap Themes and HTML Templates">WebThemez.com</a>
	 </div>
	 </div>
</div>
</footer>

<!-- MODAL -->
<div class="modal fade bs-modal-sm" id="login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs nav-justified">
              <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>
              <li class=""><a href="#signup" data-toggle="tab">Register</a></li>
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="signin">
            <form class="form-horizontal" action="user/proseslogin.php" method="post">
            <fieldset>
            <!-- Sign In Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">Email:</label>
              <div class="controls">
                <input required id="userid" name="email" type="text" class="form-control" placeholder="example@gmail.com" class="input-medium" required="">
              </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="passwordinput" >Password:</label>
              <div class="controls">
                <input required id="passwordinput" name="password" class="form-control" type="password" placeholder="********" class="input-medium">
              </div>
            </div>

            <!-- Multiple Checkboxes (inline) -->
            <div class="control-group">
              <label class="control-label" for="rememberme"></label>
              <div class="controls">
                  <input type="checkbox" name="rememberme" id="rememberme-0" value="Remember me">
                   <font color="#000">Remember me</font>
                </label>
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls">
              <center>
                <button id="signin" name="signin" class="btn btn-success btn-block" type="submit" >Sign In</button>
              </center>
              </div>
            </div>
            </fieldset>
            </form>
        </div>
        <div class="tab-pane fade" id="signup">
            <form class="form-horizontal" action="user/register.php" method="post">
                <input type="text" value="<?php echo $id_user; ?>" name="id_user" />
            <fieldset>
            <!-- Sign Up Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="Email">Email:</label>
              <div class="controls">
                <input id="Email" name="email" class="form-control" type="text" placeholder="example@gmail.com" class="input-large" required="">
              </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">Nama Lengkap:</label>
              <div class="controls">
                <input id="userid" name="nama" class="form-control" type="text" placeholder="example" class="input-large" required="">
              </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">Password:</label>
              <div class="controls">
                <input id="password" name="password" class="form-control" type="password" placeholder="********" class="input-large" required="">
                <em>1-8 Characters</em>
              </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="reenterpassword" >Re-Enter Password:</label>
              <div class="controls">
                <input id="reenterpassword" class="form-control" name="password" type="password" placeholder="********" class="input-large" required="">
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
              <center>
                <button id="confirmsignup" name="signup" type="submit" class="btn btn-success btn-block">Sign Up</button>
              </center>
              </div>
            </div>
            </fieldset>
            </form>
      </div>
    </div>
    </div>
   </div>
  </div>
</div>

<?php
$ceknama=mysqli_query($connect,"select * from user where id_user='$_SESSION[id]' ");
$ceknamalagi=mysqli_fetch_array($ceknama);
?>
<div class="modal fade bs-modal-md" id="akun" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="row">
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
          <A href="edit.html" >Edit Profile</A>
          <A href="edit.html" >Logout</A>
         <br>
  <p class=" text-info">May 05,2014,03:00 pm </p>
        </div>
          <div class="col-xs-12" >
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo $ceknamalagi['nama_user'];?></h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3 col-lg-3 " align="center">
                  <img src="" class="img-circle img-responsive fa fa-user" >
                  </div>
                  <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                      <tbody>
                        <tr>
                          <td>Nama</td>
                          <td><?php echo $ceknamalagi['nama_user'];?></td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td><?php echo $ceknamalagi['email_user'];?></td>
                        </tr>
                        <tr>
                          <td>Password</td>
                          <td><?php echo $ceknamalagi['pass_user'];?></td>
                        </tr>
                        <tr>
                          <td>Phone</td>
                          <td><?php echo $ceknamalagi['phone_user'];?></td>
                        </tr>
                        <tr>
                          <td>Home Address</td>
                          <td><?php echo $ceknamalagi['alamat_user'];?></td>
                        </tr>
                        <tr>
                          <td>Nama Usaha</td>
                          <td><?php echo $ceknamalagi['nama_usaha'];?></td>
                        </tr>
                          <td>Jenis Usaha</td>
                          <td><?php echo $ceknamalagi['jenis_usaha'];?>
                        </td>
                      </tr>
                        <td>Pekerjaan</td>
                        <td><?php echo $ceknamalagi['pekerjaan'];?>
                      </td>

                      </tbody>
                    </table>

                    <a href="#" data-toggle="modal" data-target="#editakun" class="btn btn-primary">Edit Profile</a>
                    <a href="#booking" class="btn btn-primary">Booking</a>
                  </div>
                </div>
              </div>
                   <div class="panel-footer">
                          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                          <span class="pull-right">
                              <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                              <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                          </span>
                      </div>
            </div>
          </div>
        </div>

    </div>
  </div>
</div>

<div class="modal fade bs-modal-md" id="editakun" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="row">
        <div class="col-md-5  toppad  pull-right col-md-offset-3 ">
          <A href="edit.html" >Edit Profile</A>
          <A href="edit.html" >Logout</A>
         <br>
  <p class=" text-info">May 05,2014,03:00 pm </p>
        </div>
          <div class="col-xs-12" >
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo $ceknamalagi['nama_user'];?></h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-3 col-lg-3 " align="center">
                  <img src="" class="img-circle img-responsive">
                  <i class="glyphicon glyphicon-user"></i>
                  </div>
                  <form class="form-horizontal" action="user/edituser.php" method="post">
                  <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                      <tbody>
                        <tr>
                          <td>Nama</td>
                          <td>
                          <input id="Email" name="name" class="form-control" type="text" placeholder="" value="<?php echo $ceknamalagi['nama_user'];?>" class="input-large" required="">
                          </td>
                        </tr>
                        <tr>
                          <td>Email</td>
                          <td>
                            <input id="Email" name="email" class="form-control" type="text" placeholder="" value="<?php echo $ceknamalagi['email_user'];?>" class="input-large" required="">
                          </td>
                        </tr>
                        <tr>
                          <td>Password</td>
                          <td>
                            <input id="Email" name="pass" class="form-control" type="text" placeholder="" value="<?php echo $ceknamalagi['pass_user'];?>" class="input-large" required="">
                          </td>
                        </tr>
                        <tr>
                          <td>Phone</td>
                          <td>
                            <input id="Email" name="phone" class="form-control" type="text" placeholder="" value="<?php echo $ceknamalagi['phone_user'];?>" class="input-large" >
                          </td>
                        </tr>
                        <tr>
                          <td>Home Address</td>
                          <td>
                            <input id="Email" name="alamat" class="form-control" type="text" placeholder="" value="<?php echo $ceknamalagi['alamat_user'];?>" class="input-large" >
                          </td>
                        </tr>
                        <tr>
                          <td>Nama Usaha</td>
                          <td>
                            <input id="Email" name="nama_usaha" class="form-control" type="text" placeholder="" value="<?php echo $ceknamalagi['nama_usaha'];?>" class="input-large" >
                          </td>
                        </tr>
                          <td>Jenis Usaha</td>
                          <td>
                            <input id="Email" name="jenis_usaha" class="form-control" type="text" placeholder="" value="<?php echo $ceknamalagi['jenis_usaha'];?>" class="input-large" >
                        </td>
                        <tr>
                          <td>Pekerjaan</td>
                          <td>
                            <input id="Email" name="pekerjaan" class="form-control" type="text" placeholder="" value="<?php echo $ceknamalagi['pekerjaan'];?>" class="input-large" >
                          </td>
                        </tr>

                      </tbody>
                    </table>
                    <center>
                      <button id="confirmupdate" name="save" type="submit" class="btn btn-success btn-block">SAVE</button>
                    </center>
                  </div>
                </form>
                </div>
              </div>
                   <div class="panel-footer">
                          <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                          <span class="pull-right">
                              <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                              <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                          </span>
                      </div>
            </div>
          </div>
        </div>

    </div>
  </div>
</div>

<!-- Footer section -->
<!-- JS FILES -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/main.js"></script>
<script type="text/javascript" src="js/jquery.contact.js"></script>
<script type="text/javascript" src="js/jquery.devrama.slider.min-0.9.4.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.isotope.min.js"></script>
<script>
              new WOW().init();
              </script>
<script type="text/javascript">
		$(document).ready(function(){
			$('.slider-banner').DrSlider({
				'transition': 'fade',
				showNavigation: false,
				progressColor: "#9e015e"
			});
		});
	</script>
</body>

</html>
