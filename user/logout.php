<?php
require ("koneksi.php");
session_start();//kunci untuk memulai
unset($_SESSION['id']);//menhilangkan session email
?>
<script>
window.location="../";
</script>
