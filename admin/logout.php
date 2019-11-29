<?php
  session_start();
  unset($_SESSION['loginadmin']);
unset( $_SESSION['id_admin']);
unset( $_SESSION['namaadmin']);
unset($_SESSION['usernameadmin']);
  echo "<script>alert('Logout Berhasil !'); window.location = 'loginadmin.php'</script>";
?>
