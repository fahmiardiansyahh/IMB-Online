  <?php 
    include 'koneksi/koneksi.php';

 
    if (isset($_POST['cari']) ) {
    $cari=$_POST['noform'];
    $tampil=mysqli_query($koneksi,"SELECT * FROM tb_diterima WHERE no_form ='$cari'");

    if (mysqli_num_rows($tampil)===0){
        echo "
      <script>
      alert('Data No Formulir Anda Tidak Di Temukan Silahkan Hubungi Admin !!!');
      document.location.href='index.php?cari=tracking';
      </script>";


    }else {
       echo "
      <script>
      window.open('modul/cetakkartu.php?noform=$cari','_blank');
      </script>";

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
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
       <link rel="stylesheet" href="../assets/css/plugins.css" />
        <link rel="stylesheet" href="../assets/css/lora-web-font.css" />
        <link rel="stylesheet" href="../assets/css/opensans-web-font.css" />
        <link rel="stylesheet" href="../assets/css/magnific-popup.css">

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="jumbotron">
  <div class="container">	
  <div class="row">
    <div class="col-sm-12">
    	<form action="" method="POST"> 
    		<fieldset>
    	<legend style="margin-bottom: 50px; padding-top: 30px;"><b>IZIN TRACKING</legend></b>
      <div class="input-group ">	
      <input type="text" class="form-control" placeholder="Masukan No.Formulir Anda ex: 673546551607" style="height: 60px;" name="noform" required maxlength="12">
      <div class="input-group-btn">
        <button class="btn btn-primary" type="submit" style="height: 60px;" name="cari">
        	<span class="glyphicon glyphicon-search"></span>
        </button>
      </div>
    </div><!-- /input-group -->
    </div>
  </div>
</form>
</fieldset>
 </div>
 </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
     <script src="../assets/js/vendor/bootstrap.min.js"></script>
        <script src="../assets/js/vendor/isotope.min.js"></script>
        <script src="../assets/js/plugins.js"></script>
         <script src="../assets/js/jquery.magnific-popup.js"></script>
        <script src="../assets/js/main.js"></script>
  </body>
</html>