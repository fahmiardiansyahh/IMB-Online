<?php 
  include "koneksi/koneksi.php";
  session_start();
  if (!isset($_SESSION['login']) ) {
   echo "
      <script>
      alert('Anda Harus Login Terlebih Dahulu !');
      document.location.href='login.php';
      </script>";

}
  $date= date("Y-m-d");
  // NOMOR URUT ORDER
      $query =mysqli_query($koneksi, "SELECT max(no_form) as maxKode FROM tb_pemohon WHERE no_form LIKE '$date%'");
      $data = mysqli_fetch_array($query);
      $noOrder = $data['maxKode'];
      $noUrut = (int) substr($noOrder, 9, 3);
      $noUrut++;
      $char = rand(100,999);
      $tahun=substr($date, 0, 4);
      $bulan=substr($date, 5, 2);
      $id_Order = $char .$tahun .$bulan . sprintf("%03s", $noUrut);

 ?>

 <?php

    if (isset($_POST['submit']) ) {

      $idpemohon=$_SESSION['id_pemohon'];
      $namapemohon=$_POST['namapemohon'];
      $kontak=$_POST['kontak'];
      $tanggal=date('Y-m-d');
      $jenisidentitas=$_POST['jenisidentitas'];
      $noidentitas=$_POST['noidentitas'];
      $tempatlahir=$_POST['tempatlahir'];
      $tanggallahir=$_POST['tanggallahir'];
      $npwp=$_POST['npwp'];
      $alamat=$_POST['alamat'];
      $provinsi="Jawa Barat";
      $kabupaten="Bogor";
      $kecamatan=$_POST['kecamatan'];
      $kelurahan=$_POST['kelurahan'];
     
          $array="INSERT INTO tb_pemohon VALUES (
            '$id_Order','$idpemohon','$namapemohon','$kontak','$tanggal','$jenisidentitas','$noidentitas','$tempatlahir','$tanggallahir','$npwp','$alamat','$provinsi','$kabupaten','$kecamatan','$kelurahan'
        )";
          mysqli_query($koneksi,$array);
          echo "
                <script>
                alert('Data Pemohon Berhasil Di Simpan Anda Akan Di Alihkan Ke Form Pendaftaran Perusahaan !');
                  document.location.href='formulirperusahaan.php'
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
    <title>Form Pemohonan</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- JS  -->
    <script type="text/javascript">
   function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
       if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
      return true;
    }
    </script>

    <script type="text/javascript">
      function isNumberKey(evt)
      {
           var charCode = (evt.which) ? evt.which : event.keyCode
        if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32)
            return false;
        return true;
}
    </script>



  </head>
  <body class="latar">
<nav class="navbar navbar-default" style="background-color:#00a5ff;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <p class="brand" style="padding-top: 15px;"><img src="assets/images/logo.png" alt="" height="30"><b style="font-size: 18px;">Formulir Tambah Pemohon</b></p>
    <!-- Collect the nav links, forms, and other content for toggling -->
    
  </div><!-- /.container-fluid -->
</nav>
  
    <div class="container kotak">
      <div class="row">
        <div class="col-sm-10">
          <h2 style="position: relative; left: 225px;padding-top: 20px;"> Pengisian Formulir Menggunakan Huruf Kapital</h2>
          <hr style="position: relative; left: 95px; size: 60px;border-top: 2px solid black">
        </div>
      </div>
      <div class="row">
      <form action="" method="post" style="position: relative;left: 95px;" onsubmit="return hanyaAngka(this)">
        <div class="form-group">
            <div class="col-sm-5 col-sm-offset-5">
                <label for="noform">No.Formulir</label>
                <input type="text" class="form-control" name="noform" value="<?=$id_Order; ?>" disabled>
                </div>
              </div>
        <div class="form-group">
        <div class="col-sm-10" style="margin-top: 20px;">
            <label for="nama">Nama Pemohon</label>
            <input type="text" class="form-control" name="namapemohon" placeholder="Nama Pemohon" id="nama" onkeypress='return isNumberKey(event)' autocomplete="off" required>
         </div>
        </div>
         <div class="form-group">
        <div class="col-sm-4" style="margin-top: 20px;">
            <label for="jenisidentitas">Jenis Identitas</label>
            <select  class="form-control" name="jenisidentitas" id="jenisidentitas" required>
              <option selected value="">-------------------------------Pilih-----------------------------</option>
              <option value="KTP">KTP</option>
              <option value="SIM">SIM</option>
              <option value="PASSPORT">PASSPORT</option>
            </select>
         </div>
        </div>
         <div class="form-group">
        <div class="col-sm-6" style="margin-top: 20px;">
            <label for="nama">Nomor Identitas</label>
            <input type="text" class="form-control" name="noidentitas" placeholder="No.identitas KTP/SIM/Lainnya" required maxlength="18" minlength="18" onkeypress='return hanyaAngka(event)' autocomplete="off" >
         </div>
        </div>
        <div class="form-group">
        <div class="col-sm-4" style="margin-top: 20px;">
            <label for="tempatlahir">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempatlahir" placeholder="Tempat Lahir" id="tempatlahir" onkeypress='return isNumberKey(event)' autocomplete="off" required>
         </div>
        </div>
        <div class="form-group">
        <div class="col-sm-6" style="margin-top: 20px;">
            <label for="tanggal">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggallahir" placeholder="Tanggal Lahir" id="tanggal" required>
         </div>
        </div>
          <div class="form-group">
        <div class="col-sm-10" style="margin-top: 20px;">
            <label for="npwp">Nomor Pokok Wajib Pajak</label>
            <input type="text" class="form-control" name="npwp" placeholder="Masukan Nomor NPWP" id="npwp" required maxlength="15" minlength="15" onkeypress='return hanyaAngka(event)' autocomplete="off" >
         </div>
        </div>
          <div class="form-group">
        <div class="col-sm-10" style="margin-top: 20px;">
            <label for="alamat">Alamat</label>
          <textarea class="form-control" cols="30" rows="3" name="alamat" placeholder="Alamat" required></textarea>
         </div>
        </div>
        <div class="form-group">
        <div class="col-sm-5" style="margin-top: 20px;">
            <label for="provinsi">Provinsi</label>
            <input type="text" class="form-control" name="provinsi" value="Jawa Barat" id="provinsi"  disabled>
         </div>
        </div>
         <div class="form-group">
        <div class="col-sm-5" style="margin-top: 20px;">
            <label for="kota">Kabupaten/Kota</label>
            <input type="text" class="form-control" name="kota" value="Bogor" disabled>
         </div>
        </div>
        <div class="form-group">
        <div class="col-sm-5" style="margin-top: 20px;">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Masukan Nama Kecamatan Anda" onkeypress='return isNumberKey(event)' autocomplete="off" required>
         </div>
        </div>
          <div class="form-group">
        <div class="col-sm-5" style="margin-top: 20px;">
            <label for="kelurahan">Kelurahan</label>
            <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Masukan Nama Kelurahan Anda" onkeypress='return isNumberKey(event)' autocomplete="off" required>
         </div>
        </div>
          <div class="form-group">
        <div class="col-sm-10" style="margin-top: 20px;">
            <label for="kontak">No.HP/Telepon</label>
            <input type="text" class="form-control" name="kontak" placeholder="Masukan No.HP/Telepon" id="kontak" minlength="10" required maxlength="13" autocomplete="off" onkeypress='return hanyaAngka(event)' >
         </div>
        </div>
           <div class="form-group">
        <div class="col-sm-10 text-right" style="margin-top: 20px;">
          <button class="btn btn-primary" type="submit" name="submit" onclick="return confirm('Apakah Anda Ingin Proses Pendaftaran Jika Ya anda Tidak Dapat Kembali Ke Menu Sebelumnya !!!')">Simpan</button>
        <a href="indexuser.php" class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin Membatalkan Izin Permohonan Anda ?')">Kembali</a>
        </div>
      </div>
          </form>
      </div>
    </div>
    <!-- Footer -->
     <footer id="footer" class="footer">
          <div class="container">
            <div class="scroll-top"></div>
            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="copyright">
                  <p>&copy; 2018 All Rights Reserved.</p>
                </div>
              </div>
            </div>
          </div>
        </footer>
    <!-- Akhir Footer -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>