<?php
include ("./koneksi.php");
if (!isset($_SESSION)) {
session_start();
}//kunci untuk memulai
unset($_SESSION['id']);//menhilangkan session id
?>
<script>
window.location="../";
</script>
