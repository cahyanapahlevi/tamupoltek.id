<?php
include ("./koneksi.php");
if (!isset($_SESSION)) {
session_start();
}//kunci untuk memulai
unset($_SESSION['idadmin']);//menhilangkan session email
?>
<script>
window.location="./";
</script>
