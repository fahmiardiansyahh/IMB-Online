<?php 
  session_start();
    include '../koneksi/koneksi.php';

    $noformget=$_GET['noform'];
  
    $query=mysqli_query($koneksi,"SELECT * FROM tb_diterima WHERE no_form='$noformget'");

    while($isiquery=mysqli_fetch_assoc($query) ) {
      $noform=$isiquery['no_form'];
      $namaperusahaan=$isiquery['nama_perusahaan'];
      $tgldaftar=$isiquery['tanggal_daftar'];
      $alamat=$isiquery['alamat'];
      $jenisizin=$isiquery['jenis_izin'];
      $luasbangunan=$isiquery['luas_bangunan'];
      $total=$isiquery['total_biaya'];
      $masaberlaku=$isiquery['masa_berlaku'];
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
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/style2.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body onload="window.print()">
    <!-- onload="window.print()" -->
    <section class="wadah">
    <div class="container kartu">
      <div class="row">
          <div class="col-md-10">
              <h1><?=strtoupper($jenisizin); ?></h1>
              <h4><strong>IMB ONLINE KABUPATEN BOGOR</strong></h4>
              <img src="../assets/images/logo.png" class="text-right logo">


          </div>
      </div>
    </div>

    <div class="container isi">
      <div class="row">
        <div class="col-md-5 col-md-offset-1">
          <h4 class="title">Detail Izin</h4>
        </div>
        <div class="col-md-5 text-right">
            <h4 class="title">Keterangan Izin</h4>
        </div>
      </div>
    </div>

      <div class="container">
        <div class="row">
          <div class="col-md-3 col-md-offset-1">
          <label style="margin-top: 40px;">No.Formulir : &nbsp;&nbsp; </label><p style="display: inline; padding-left: 50px; "><?=$noform; ?></p>

             <label style="margin-top: 40px;">Nama Perusahaan : &nbsp;&nbsp; </label><p style="display: inline; padding-left: 20px;"><?=$namaperusahaan; ?></p>

                <label style="margin-top: 40px;">Tanggal Daftar : &nbsp;&nbsp; </label><p style="display: inline; padding-left: 50px;">2018-12-16</p>

               <label style="margin-top: 40px;">Lokasi : &nbsp;&nbsp; </label><p style="display: inline; padding-left: 20px;"><?=$alamat; ?></p>
          </div>
          <div class="col-md-3 garis text-center">
          
          </div>
          <div class="col-md-3 text-right">
            <label style="margin-top: 40px;">Jenis Izin : &nbsp;&nbsp; </label><p style="display: inline; padding-left: 45px; "><?=$jenisizin; ?></p>
             <label style="margin-top: 40px;">Luas Bangunan : &nbsp;&nbsp; </label><p style="display: inline; padding-left: 80px; "><?=$luasbangunan; ?></p>
              <label style="margin-top: 40px;">Total Biaya : &nbsp;&nbsp; </label><p style="display: inline; padding-left: 45px; "><?="Rp.".number_format($total,0,".","."); ?></p>
               <label style="margin-top: 40px;">Masa Berlaku : &nbsp;&nbsp; </label><p style="display: inline; padding-left: 60px; "><?=$masaberlaku; ?></p>
          </div>
        </div>
      </div>
      <div class="container kartu">
      <div class="row">
          <div class="col-md-10">
              
              <h5><strong><i>PENTING :</i></strong></h5>
              <p class="text-center col-md-offset-2" style="font-style: italic;" ><strong>CETAK SURAT INI DAN BAWA KE KANTOR IMB KABUPATEN BOGOR UNTUK MELAKUKAN PEMBAYARAN, APABILA LEWAT DARI MASA BERLAKU MAKA PEMOHON WAJIB MENDAFTAR ULANG.    </p></strong>

          </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1" style="background-color: red; margin-top: 10px; height: 30px;padding-top: 5px;">
          <marquee><b>RUMUS TOTAL BAYAR = Rp.24.000 X LUAS BANGUNAN</b></marquee> 
        </div>
      </div>
    </div>
    </section>
      <script type="text/javascript" src="assets/js/bootstrap.js"></script>
  </body>
</html>