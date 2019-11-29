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
?>
<?php 
     $query=mysqli_query($koneksi,"SELECT * FROM tb_perusahaan WHERE id_pemohon='$_SESSION[id_pemohon]'ORDER BY no_form AND npwp DESC");
     while ($queryisi=mysqli_fetch_assoc($query) ) {
      $id_perusahaan=$queryisi['id_perusahaan'];
      $no_form=$queryisi['no_form'];
     }
  
 ?>
<?php
  global $id_perusahaan;
  global $no_form;
  if (isset($_POST['submit']) ) {
    $status="Proses";
    $idpemohon=$_SESSION['id_pemohon'];
    $noform=$no_form;
    $idperusahaandata=$id_perusahaan;
    $namaktp=$_FILES['ktp']['name'];
    $ukuranfilektp=$_FILES['ktp']['size'];
    $errorktp=$_FILES['ktp']['error'];
    $tmpktp=$_FILES['ktp']['tmp_name'];
    $namapbb=$_FILES['pbb']['name'];
    $ukuranfilepbb=$_FILES['pbb']['size'];
    $errorpbb=$_FILES['pbb']['error'];
    $tmppbb=$_FILES['pbb']['tmp_name'];
     $namasurattanah=$_FILES['surattanah']['name'];
    $ukuranfilesurattanah=$_FILES['surattanah']['size'];
    $errorsurattanah=$_FILES['surattanah']['error'];
    $tmpsurattanah=$_FILES['surattanah']['tmp_name'];
    //cek Gambar Upload apa sudah di upload apa belum
    if ($errorktp || $errorpbb || $errorsurattanah === 4 ) {

       echo "
          <script>
          alert('KTP / PBB / SURAT TANAH BELUM DI UPLOAD !!!');
          document.location.href='formupload.php';
          </script>
          ";
          die;        }
    // Cek Gambar yang dikirimkan pastikan ekstensi jpg ,png , jpeg
    $ekstensiuploadvalid=['jpg','jpeg','png'];
    $ekstensiktp=explode('.', $namaktp);
    $ekstensipbb=explode('.', $namapbb);
    $ekstensisurattanah=explode('.', $namasurattanah);
    $ekstensiktp=strtolower(end($ekstensiktp));
    $ekstensipbb=strtolower(end($ekstensipbb));
    $ekstensisurattanah=strtolower(end($ekstensisurattanah));
    //cek apakah ekstensi gambar yang di upload ada ga di array $ekstensiuploadvalid
  
    if (!in_array($ekstensiktp , $ekstensiuploadvalid) ) {
       echo "
          <script>
          alert('YANG ANDA UPLOAD BUKAN GAMBAR !!!');
          document.location.href='formupload.php';
          </script>
          ";
          die;
    }else if (!in_array($ekstensipbb , $ekstensiuploadvalid) )  {
       echo "
          <script>
          alert('YANG ANDA UPLOAD BUKAN GAMBAR !!!');
          document.location.href='formupload.php';
          </script>
          ";
          die;

    }else if (!in_array($ekstensisurattanah , $ekstensiuploadvalid) )  {
       echo "
          <script>
          alert('YANG ANDA UPLOAD BUKAN GAMBAR !!!');
          document.location.href='formupload.php';
          </script>
          ";
          die;
}else {
    //cek Ukuran Size Upload Gambar
  //   if ($ukuranfilektp || $ukuranfilepbb || $ukuranfilesurattanah > 3000000 ){
  //      echo "
  //         <script>
  //         alert('UKURAN GAMBAR TERLALU BESAR MASKSIMAL 3MB !!!');
  //         </script>
  //         ";
  // }

    // Lolos Pengecekan Gambar Siap Di Upload
    // Generate Nama Gambar Baru
    $namafilebaruktp=uniqid();
    $namafilebaruktp .='.';
    $namafilebaruktp .=$ekstensiktp;
    $namafilebarupbb=uniqid();
    $namafilebarupbb .='.';
    $namafilebarupbb .=$ekstensipbb;
    $namafilebarusurattanah=uniqid();
    $namafilebarusurattanah .='.';
    $namafilebarusurattanah .=$ekstensisurattanah;
    move_uploaded_file($tmpktp, 'images/' . $namafilebaruktp);
    move_uploaded_file($tmppbb, 'images/'. $namafilebarupbb);
    move_uploaded_file($tmpsurattanah, 'images/' . $namafilebarusurattanah);

    $simpan="INSERT INTO tb_dokumen VALUES (

    '$noform','$idpemohon','$idperusahaandata','$namafilebaruktp','$namafilebarupbb','$namafilebarusurattanah','$status')";
    mysqli_query($koneksi,$simpan);
     echo "
          <script>
          alert('SUKSES !!! Terima Kasih Silahkan Anda Cek Status Pendirian Bangunan Anda Dengan Menggunakn Kolom Pencarian Di Halaman Utama Web Ini Terima Kasih !!!');
          document.location.href='indexuser.php';
          </script>
          ";
        }
  }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Selamat Datang Di Form Upload</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style2.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
    <p class="brand" style="padding-top: 15px;"><img src="assets/images/logo.png" alt="" height="30"><b style="font-size: 18px;">Upload Dokumen</b></p>
    <!-- Collect the nav links, forms, and other content for toggling -->
    
  </div><!-- /.container-fluid -->
</nav>
    <div class="container tempat">
      <div class="row">
    <div class="belakang col-sm-12" style="margin-top: 50px; position: relative; left: 40px; padding-top: 20px;">
   <div class="container col-sm-3 col-sm-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading "><strong>Upload File</strong> <small>KTP </small></div>
        <div class="panel-body">

          <!-- Standar Form -->
          <h4>Upload KTP</h4>
          <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
            <!-- <div class="form-inline"> -->
              <div class="form-group">
                <input type="file" name="ktp" id="js-upload-files" multiple>
              </div>
           <!--  </div> -->
         
        </div>
      </div>
    </div>

    <div class="col-sm-3">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Upload File</strong> <small>PBB</small></div>
        <div class="panel-body">
          <h4>Upload PBB</h4>
          <div class="form-group">
            <input type="file" name="pbb">
          </div>
        </div>
      </div>
    </div>
     <div class="col-sm-3">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Upload File</strong> <small>Surat Tanah</small></div>
        <div class="panel-body">
          <h4>Upload Surat Tanah</h4>
          <div class="form-group">
            <input type="file" name="surattanah">
          </div>
        </div>
      </div>
    </div>
</div>
</div>
<div class="row">
  <div class="col-sm-3">
<button type="submit" class="btn btn-success tombol" name="submit">Simpan</button>
</div>
  </div>
</div>
     </form>
     <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>