<?php
session_start();
include("koneksi.php");
    if (isset($_POST['signin'])) {

		$email = $_POST['email'];
		$pass = $_POST['password'];
		$query = "SELECT * FROM `user` WHERE email_user='$email' and pass_user='$pass'";
		$login = mysqli_query($connect,$query);//mengambil data dari database
		$dtuser=mysqli_fetch_assoc($login);//menampung data dari variabel login

  if(mysqli_num_rows($login)) { //jika(menghitung jumlah baris dari variabel login)
		$_SESSION['id']=$dtuser['id_user'];//membuat session(kunci) untuk kehalaman berikutnya dengan acuan field"nama_pelanggan" dari variabel dtUser
			echo "<script language=\"javascript\">\n";
			echo "alert(\"Berhasil!!\")\n";
			echo "window.location=\"../index.php\" ";
			echo "</script>";
		}else {
			echo "<script language=\"javascript\">\n";
			echo "alert(\"Cek Email dan password  !!\")\n";
			echo "window.location=\"../\" ";
			echo "</script>";
			}
		}
?>
