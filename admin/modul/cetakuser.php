  <?php 
  session_start();
    include '../../koneksi/koneksi.php';


    if (!isset($_SESSION['loginadmin']) ) {
   echo "
      <script>
      alert('Anda Harus Login Terlebih Dahulu !');
      document.location.href='loginadmin.php';
      </script>";

}
   ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../css/style2.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print()" >
    <!-- onload="window.print()" -->
    <div class="col-sm-12 text-center">
    <img src="../../assets/images/logo.png" class="gambar">
    <h1>Laporan Data User</h1>
    <h4>Imb Online Bogor</h4>
    <h5>No.Telpon/Fax : 0217766532/0217766533</h5>
    <hr class="garis">
    <b><p class="text-right">Tanggal <?=date('d-M-Y') ?></p></b>
    <br>

      <table class="table table-bordered">
        <thead>
      <tr>
     <th>No.</th>
     <th>Username</th>
     <th>Password</th>
     <th>Nama Profil</th>
      </tr>
    </thead>
    <tbody>
      <?php $tampil=mysqli_query($koneksi,"SELECT * FROM tb_user") ?>
      <?php $i=1; ?>
<?php while($r = mysqli_fetch_assoc($tampil)) :?>
      <tr>
      <td><?=$i; ?></td>
      <td><?=$r['username'];?></td>
      <td><?= $r['password'];?></td>
      <td><?= $r['nama'];?></td>
    </tr>
  </tbody>
    <?php $i++ ?>
  <?php endwhile; ?>
      </table>
      <p class="text-right">IMB Online Bogor</p>
      <br>
      <br>
      <p class="text-right">(........................)</p>
      <p class="text-right">Administrator <?=$_SESSION['namaadmin']; ?></p>
        </div>
      <script type="text/javascript" src="assets/js/bootstrap.js"></script>
  </body>
</html>