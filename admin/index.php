<?php
session_start();
include("koneksi.php");
if(!isset($_SESSION['idadmin'])){
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>
<head>
<title>Lucid Login Form A Flat Responsive widget Template :: w3layouts</title>
<!-- For-Mobile-Apps -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Lucid Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //For-Mobile-Apps -->
<!-- Style -->
<link rel="stylesheet" href="assets/css/stylelogin.css" type="text/css" media="all" />
<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
<link href="assets/fonts/BerkshireSwash-Regular" rel="stylesheet">

</head>
<body>
<div class="container">
<h1><img src="assets/img/logopoltek.png" style="height:150px;width:150px;"></h1>
<h1>Admin Tamu Poltek</h1>
<center>

</center>
	<div class="signin">
     	<form role="form" action="proseslogin.php" method="post" class="login-form">
	      	<input type="text" name="username" class="user" value="Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" />
	      	<input type="password" name="password" class="pass" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" />
	      	<label>
		  		<input type="checkbox" value="Remember-Me" /> Remember Me?
		  	</label>
          	<input type="submit" name="signin" value="LOGIN" />
	 	</form>
	</div>
</div>
<div class="footer">
     <p>Copyright &copy; 2017 TamuPoltek | Design by <a href="">Huge Team</a></p>
</div>
</body>
</html>
<?php } else {
	echo "<script language=\"javascript\">\n";
	echo "alert(\"Maaf Anda Sudah Login !\")\n";
	echo "window.location=\"home.php?home=main\" ";
	echo "</script>";}
?>
