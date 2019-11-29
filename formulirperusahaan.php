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
  $queries = "SELECT max(id_perusahaan) as maxKode FROM tb_perusahaan";
  $hasil = mysqli_query($koneksi,$queries);
  $data  = mysqli_fetch_array($hasil);
  $idperusahaan = $data['maxKode'];
  $noUrut = (int) substr($idperusahaan, 3, 3);
  $noUrut++;
  $char = "PRS";
  $newID = $char . sprintf("%03s", $noUrut);
 ?>
 
  <?php 
    $query=mysqli_query($koneksi,"SELECT * FROM tb_pemohon WHERE id_pemohon='$_SESSION[id_pemohon]'ORDER BY no_form DESC");
    while($array=mysqli_fetch_assoc($query) ) {
      $noform=$array['no_form'];
      $npwp=$array['npwp'];

     } 
   }
  ?>
<?php 
       if (isset($_POST['submit']) ) {

      $idperusahaan=$_POST['idperusahaan'];
      $noform=$noform;  
      $idpemohon=$_SESSION['id_pemohon'];
      $tanggal=date('Y-m-d');
      $badanusaha=$_POST['badanusaha'];
      $bidangusaha=$_POST['bidangusaha'];
      $jenisizin=$_POST['jenisizin'];
      $namaperusahaan=$_POST['namaperusahaan'];
      $npwp=$npwp;
      $alamat=$_POST['alamat'];
      $provinsi="Jawa Barat";
      $kabupaten="Bogor";
      $kecamatan=$_POST['kecamatan'];
      $kelurahan=$_POST['kelurahan'];
      $kontak=$_POST['kontak'];
      $luasbangunan=$_POST['luasbangunan'];
       
       

          $simpan="INSERT INTO tb_perusahaan VALUES (

          '$idperusahaan','$noform','$idpemohon','$tanggal','$badanusaha','$bidangusaha','$jenisizin','$namaperusahaan','$npwp','$alamat','$provinsi','$kabupaten','$kecamatan','$kelurahan','$kontak','$luasbangunan'
        )";

        echo "
                <script>
                alert('Data Perusahaan Berhasil Di Simpan Anda Akan Di Alihkan Ke Form Upload Dokumen  !');
                  document.location.href='formupload.php';
                  </script>";

        mysqli_query($koneksi,$simpan);

        }















 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Form Perusahaan</title>

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
    <!-- Akhir Angka Saja -->
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
    <p class="brand" style="padding-top: 15px;"><img src="assets/images/logo.png" alt="" height="30"><b style="font-size: 18px;">Formulir Tambah Perusahaan</b></p>
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
                <input type="text" class="form-control" name="noform" value="<?=$noform;  ?>" disabled>
                </div>
              </div>

              <div class="form-group">
        <div class="col-sm-10" style="margin-top: 20px;">
            <input type="hidden" class="form-control" name="idperusahaan" value="<?=$newID; ?>" id="idperusahaan" >
         </div>
        </div> 
        <div class="form-group">
        <div class="col-sm-3" style="margin-top: 20px;">
            <label for="badanusaha">Badan Usaha</label>
            <select class="form-control" name="badanusaha"  id="badanusaha" required>
              <option selected value="">--------------------Pilih--------------------</option>
              <option value="Perseroan Terbatas">Perseroan Terbatas</option>
              <option value="Koperasi">Koperasi</option>
              <option value="Perusahaan Perorangan">Perusahaan Perorangan</option>
              <option value="Yayasan">Yayasan</option>
            </select>
         </div>
        </div>
         <div class="form-group">
        <div class="col-sm-3" style="margin-top: 20px;">
            <label for="bidangusaha">Bidang Usaha</label>
            <select class="form-control" name="bidangusaha" id="bidangusaha" required>
                  <option selected value="">--------------------Pilih--------------------</option>
                  <option value="Industri">Industri</option>
                  <option value="Non Industri">Non Industri</option>
            </select>
         </div>
        </div>
          <div class="form-group">
        <div class="col-sm-4" style="margin-top: 20px;">
            <label for="jenisizin">Jenis Izin</label>
            <select class="form-control" name="jenisizin" id="jenisizin" required>
                  <option selected value="">--------------------Pilih--------------------</option>
                  <option value="Izin Perindustrian">Izin Perindustrian</option>
                  <option value="Izin Perorangan">Izin Perorangan</option>
                  <option value="Izin Perbankan">Izin Perbankan</option>
                  <option value="Izin Pendidikan">Izin Pendidikan</option>
                  <option value="Izin Perdagangan">Izin Perdagangan</option>
            </select>
         </div>
        </div>
        <div class="form-group">
        <div class="col-sm-10" style="margin-top: 20px;">
            <label for="namaperusahaan">Nama Perusahaan/Perorangan</label>
            <input type="text" class="form-control" name="namaperusahaan" placeholder="Nama Perusahaan/Perorangan" id="namaperusahaan" onkeypress='return isNumberKey(event)' required>
         </div>
        </div>
          <div class="form-group">
        <div class="col-sm-10" style="margin-top: 20px;">
            <label for="npwp">Nomor Pokok Wajib Pajak</label>
            <input type="text" class="form-control" name="npwp" placeholder="Masukan Nomor NPWP" id="npwp" value="<?= $npwp; ?>" disabled>
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
            <input type="text" class="form-control" name="provinsi" value="Jawa Barat" id="provinsi" disabled>
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
            <input type="text" class="form-control" name="kecamatan" placeholder="Masukan Kecamatan" onkeypress='return isNumberKey(event)' id="kecamatan" required>
         </div>
        </div>
          <div class="form-group">
        <div class="col-sm-5" style="margin-top: 20px;">
            <label for="kelurahan">Kelurahan</label>
            <input type="text" class="form-control" name="kelurahan" placeholder="Masukan Kelurahan" onkeypress='return isNumberKey(event)' id="kelurahan" required>
         </div>
        </div>
          <div class="form-group">
        <div class="col-sm-10" style="margin-top: 20px;">
            <label for="kontak">No.HP/Telepon</label>
            <input type="text" class="form-control" name="kontak" placeholder="Masukan No.HP/Telepon" id="kontak" minlength="13" maxlength="13" onkeypress='return hanyaAngka(event)' required>
         </div>
        </div>
        <div class="form-group">
        <div class="col-sm-10" style="margin-top: 20px;">
            <label for="luasbangunan">Luas Bangunan (M)<sup>2</sup></label>
            <input type="text" class="form-control" name="luasbangunan" placeholder="Luas Bangunan" id="luasbangunan" onkeypress='return hanyaAngka(event)' maxlength="20" required>
         </div>
        </div>
           <div class="form-group">
        <div class="col-sm-10 text-right" style="margin-top: 20px;">
          <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
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