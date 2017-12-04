<?php
session_start();
include("koneksi.php");
    if (isset($_POST['signin'])) {

		$user = $_POST['username'];
		$pass = $_POST['password'];
		$query = "SELECT * FROM `admin` WHERE username='$user' and password='$pass'";
		$login = mysqli_query($connect,$query);//mengambil data dari database
		$dtadmin=mysqli_fetch_assoc($login);//menampung data dari variabel login

  if(mysqli_num_rows($login)) { //jika(menghitung jumlah baris dari variabel login)
		$_SESSION['idadmin']=$dtadmin['id_admin'];//membuat session(kunci) untuk kehalaman berikutnya dengan acuan field"nama_pelanggan" dari variabel dtUser
			echo "<script language=\"javascript\">\n";
			echo "alert(\"Berhasil!!\")\n";
			echo "window.location=\"home.php?home=main\" ";
			echo "</script>";
		}else {
			echo "<script language=\"javascript\">\n";
			echo "alert(\"Cek username dan password  !!\")\n";
			echo "window.location=\"index.php\" ";
			echo "</script>";
			}
		}
?>
