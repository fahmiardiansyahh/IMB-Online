<?php
  session_start();
   unset($_SESSION['login']);
unset( $_SESSION['id_pemohon']);
unset( $_SESSION['nama']);
unset($_SESSION['username']);
  echo "<script>alert('Logout Berhasil !'); window.location = 'index.php'</script>";
?>
