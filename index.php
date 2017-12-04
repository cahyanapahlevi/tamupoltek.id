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
<link rel="stylesheet" href="css/font-awesome.min.css">
</head>

<body>
<!-- header section -->
<section class="banner" role="banner">
  <header id="header">
    <div class="header-content clearfix"> <a class="logo" href="index.php">Tamu Poltek</a>
      <nav class="navigation" role="navigation">
        <ul class="primary-nav">
		 <li><a href="#banner">Home</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#content-3-10">About</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#teams">Our Team</a></li>
          <li><a href="#testimonials">Testimonials</a></li>
        <?php if (!isset($_SESSION['id'])) { ?>
          <li><a href="#" data-toggle="modal" data-target="#login">Login</a></li>
        <?php } else { ?>
            <li class="dropdown">
            <?php
            $ceknama=mysqli_query($connect,"select * from user where id_user='$_SESSION[id]' ");
            $ceknamalagi=mysqli_fetch_array($ceknama);
            ?>
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $ceknamalagi['nama_user'];?>
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="user/userprof.php">Account</a></li>
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
            <div data-lazy-background="images/slides/1.jpg">
                <h3 data-pos="['68%', '-40%', '58%', '42%']" data-duration="700" data-effect="move">
                    Success
                </h3> <br>
                <p data-pos="['75%', '110%', '75%', '36%']" data-duration="700" data-effect="move">
                    Lorem ipsum dolor sitamet consectetur adipiscing
                </p>
            </div>
            <div data-lazy-background="images/slides/2.jpg">
                <h3 data-pos="['75%', '-40%', '58%', '42%']" data-duration="700" data-effect="move">
                    Ultimate
                </h3> <br>
                <p data-pos="['75%', '110%', '75%', '36%']" data-duration="700" data-effect="move">
                    Lorem ipsum dolor sitamet consectetur adipiscing
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
<section id="services" class="services service-section">
  <div class="container">
  <div class="section-header">
                <h2 class="wow fadeInDown animated">Our Services</h2>
                <p class="wow fadeInDown animated">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
            </div>
    <div class="row">
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-strategy"></span>
        <div class="services-content">
          <h5>Designing</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu libero scelerisque ligula sagittis faucibus eget quis lacus.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-briefcase"></span>
        <div class="services-content">
          <h5>Research</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu libero scelerisque ligula sagittis faucibus eget quis lacus.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-tools"></span>
        <div class="services-content">
          <h5>Development</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu libero scelerisque ligula sagittis faucibus eget quis lacus.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-genius"></span>
        <div class="services-content">
          <h5>Financial</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu libero scelerisque ligula sagittis faucibus eget quis lacus.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-megaphone"></span>
        <div class="services-content">
          <h5>Consulting</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu libero scelerisque ligula sagittis faucibus eget quis lacus.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 services text-center"> <span class="icon icon-trophy"></span>
        <div class="services-content">
          <h5>Quality</h5>
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
		<div class="background-image-holder">

		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-6 col-xs-12 content">
				<div class="editContent">
					<h3>About Tamu Poltek</h3>
				</div>
				<div class="editContent">
					<p>Taman usaha Politeknik Negeri Jember atau yang lebih sering dikenal dengan sebutan Tamu Poltek merupakan media atau sarana untuk mewadai inspirasi kewirausahaan mahasiswa.</p>
					<p></p>
				</div>
				<a href="#gallery" class="btn btn-outline btn-outline outline-dark">Our Gallery</a>
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
      <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="images/portfolio/01.jpg" class="work-box"> <img src="images/portfolio/01.jpg" alt="">
        <div class="overlay">
          <div class="overlay-caption">
             <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay -->
        </a> </div>
      <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="images/portfolio/02.jpg" class="work-box"> <img src="images/portfolio/02.jpg" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay -->
        </a> </div>
      <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="images/portfolio/03.jpg" class="work-box"> <img src="images/portfolio/03.jpg" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay -->
        </a> </div>
      <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="images/portfolio/04.jpg" class="work-box"> <img src="images/portfolio/04.jpg" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay -->
        </a> </div>
      <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="images/portfolio/05.jpg" class="work-box"> <img src="images/portfolio/05.jpg" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay -->
        </a> </div>
      <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="images/portfolio/06.jpg" class="work-box"> <img src="images/portfolio/06.jpg" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay -->
        </a> </div>
      <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="images/portfolio/07.jpg" class="work-box"> <img src="images/portfolio/07.jpg" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay -->
        </a> </div>
      <div class="col-lg-3 col-md-6 col-sm-6 work"> <a href="images/portfolio/08.jpg" class="work-box"> <img src="images/portfolio/08.jpg" alt="">
        <div class="overlay">
          <div class="overlay-caption">
             <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay -->
        </a> </div>
    </div>
  </div>
</section>
<!-- gallery section -->
<!-- our team section -->
<section id="teams" class="section teams">
  <div class="container">
      <div class="section-header">
                <h2 class="wow fadeInDown animated">Our Team</h2>
                <p class="wow fadeInDown animated">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
            </div>
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <div class="person"><img src="images/team-1.jpg" alt="" class="img-responsive">
          <div class="person-content">
            <h4>Jonh Dow</h4>
            <h5 class="role">Founder</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit eget risus vitae massa.</p>
          </div>
          <ul class="social-icons clearfix">
            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="person"> <img src="images/team-2.jpg" alt="" class="img-responsive">
          <div class="person-content">
            <h4>Markus Linn</h4>
            <h5 class="role">Creative</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit eget risus vitae massa.</p>
          </div>
          <ul class="social-icons clearfix">
            <li><a href="#" class=""><span class="fa fa-facebook"></span></a></li>
            <li><a href="#" class=""><span class="fa fa-twitter"></span></a></li>
            <li><a href="#" class=""><span class="fa fa-google-plus"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="person"> <img src="images/team-3.jpg" alt="" class="img-responsive">
          <div class="person-content">
            <h4>Chris Jemes</h4>
            <h5 class="role">Technical</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit eget risus vitae massa.</p>
          </div>
          <ul class="social-icons clearfix">
            <li><a href="#" class=""><span class="fa fa-facebook"></span></a></li>
            <li><a href="#" class=""><span class="fa fa-twitter"></span></a></li>
            <li><a href="#" class=""><span class="fa fa-google-plus"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="person"> <img src="images/team-4.jpg" alt="" class="img-responsive">
          <div class="person-content">
            <h4>Vintes Mars</h4>
            <h5 class="role">Marketing</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit eget risus vitae massa.</p>
          </div>
          <ul class="social-icons clearfix">
            <li><a href="#" class=""><span class="fa fa-facebook"></span></a></li>
            <li><a href="#" class=""><span class="fa fa-twitter"></span></a></li>
            <li><a href="#" class=""><span class="fa fa-google-plus"></span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- our team section -->
<section id="pricing5" data-section="pricing-5" class="data-section">
    <div class="container">
          <div class="section-header">
                <h2 class="wow fadeInDown animated">Pricing</h2>
                <p class="wow fadeInDown animated">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
            </div>
         <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <div class="table">
                    <h3 class="editContent">Basic</h3>
                    <h2 class="editContent">$13</h2>
                    <p class="editContent">Per Month</p>
                    <ul class="table-content">
                        <li class="editContent"><i class="fa fa-hdd-o"></i> 10 GB Storage</li>
                        <li class="editContent"><i class="fa fa-pie-chart"></i> 500 GB Bandwidth</li>
                        <li class="editContent"><i class="fa fa-envelope-o"></i> Email Support</li>
                        <li class="editContent"><i class="fa fa-cogs"></i> 24x7 Support</li>
                    </ul>

                    <div class="text-center text-uppercase">
                        <a href="#" class="btn btn-default-green-transparent-tiny editContent">Signup Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="table long-table">
                    <h3 class="editContent">Premium</h3>
                    <h2 class="editContent">$23</h2>
                    <p class="editContent">Per Month</p>
                    <ul class="table-content">
                        <li class="editContent"><i class="fa fa-hdd-o"></i> 10 GB Storage</li>
                        <li class="editContent"><i class="fa fa-pie-chart"></i> 500 GB Bandwidth</li>
                        <li class="editContent"><i class="fa fa-envelope-o"></i> Email Support</li>
                        <li class="editContent"><i class="fa fa-cogs"></i> 24x7 Support</li>
                    </ul>

                    <div class="text-center text-uppercase">
                        <a href="#" class="btn btn-default-blue-tiny editContent">Signup Now</a>
                    </div>
                </div>

            </div>

            <div class="col-md-3">
                <div class="table">
                    <h3 class="editContent">Developer</h3>
                    <h2 class="editContent">$33</h2>
                    <p class="editContent">Per Month</p>
                    <ul class="table-content">
                        <li class="editContent"><i class="fa fa-hdd-o"></i> 10 GB Storage</li>
                        <li class="editContent"><i class="fa fa-pie-chart"></i> 500 GB Bandwidth</li>
                        <li class="editContent"><i class="fa fa-envelope-o"></i> Email Support</li>
                        <li class="editContent"><i class="fa fa-cogs"></i> 24x7 Support</li>
                    </ul>

                    <div class="text-center text-uppercase">
                        <a href="#" class="btn btn-default-green-transparent-tiny editContent">Signup Now</a>
                    </div>
                </div>

            </div>
         </div>
    </div>
</section>
<!-- Testimonials section -->
<section id="testimonials" class="section testimonials no-padding">
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="flexslider">
        <ul class="slides">
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa
semper aliquam quis mattis consectetur adipiscing elit.." </h1>
                <p>Chris Mentsl</p>
              </blockquote>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"Praesent eget risus vitae massa Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa
semper aliquam quis mattis consectetur adipiscing elit.." </h1>
                <p>Kristean velnly</p>
              </blockquote>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"Consectetur adipiscing elit Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa
semper aliquam quis mattis consectetur adipiscing elit.." </h1>
                <p>Markus Denny</p>
              </blockquote>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"Vitae massa semper aliquam Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa
semper aliquam quis mattis consectetur adipiscing elit.." </h1>
                <p>John Doe</p>
              </blockquote>
            </div>
          </li>
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
                <h2 class="wow fadeInDown animated">Contact Us</h2>
                <p class="wow fadeInDown animated">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
            </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2 conForm">
        <div id="message"></div>
        <form method="post" action="php/contact.php" name="cform" id="cform">
          <input name="name" id="name" type="text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" placeholder="Your name..." >
          <input name="email" id="email" type="email" class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 noMarr" placeholder="Email Address..." >
          <textarea name="comments" id="comments" cols="" rows="" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" placeholder="Message..."></textarea>
          <input type="submit" id="submit" name="send" class="submitBnt" value="Send">
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
