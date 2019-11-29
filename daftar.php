    <?php 
      include 'koneksi/koneksi.php';

   

      if (isset($_POST['submit']) ) {
      $namaawal=$_POST['namaawal'];
      $namaakhir=$_POST['namaakhir'];
      $username=$_POST['username'];
      $password=$_POST['password'];
      $passwordkonfirmasi=$_POST['passwordkonfirmasi'];
       $query=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='$username'");
  
        if(is_numeric($namaawal) || is_numeric($namaakhir)) {
          echo"
          <script>
          alert('Nama Awal Nama Akhir Tidak Boleh Nomor');
          document.location.href='daftar.php';

          </script>
          ";
        }else if (mysqli_fetch_assoc($query) ) {
          echo "
          <script>
          alert('Username Yang Anda Masukukan Sudah Terdaftar');
          document.location.href='daftar.php';
          </script>
          ";
         }else if ($password != $passwordkonfirmasi){

          echo "
          <script>
          alert('Password Anda Dengan Password Konfirmasi Berbeda');
          document.location.href='daftar.php';
          </script>
          ";
        }else{
          $nama=$namaawal .'  ' .$namaakhir;
          $array="INSERT INTO tb_user VALUES(
          '','$nama','$username','$password'
        )";
          mysqli_query($koneksi,$array);
        echo "
          <script>
          alert('Anda Berhasil Mendaftar');
          document.location.href='login.php';
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
    <title>Daftar</title>

    <!-- Bootstrap -->
     <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

       
        <!--        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">-->


        <!--For Plugins external css-->
        <link rel="stylesheet" href="assets/css/plugins.css" />
        <link rel="stylesheet" href="assets/css/lora-web-font.css" />
        <link rel="stylesheet" href="assets/css/opensans-web-font.css" />
        <link rel="stylesheet" href="assets/css/magnific-popup.css">

        <!--Theme custom css -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="css/style2.css">

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="assets/css/responsive.css" />

        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="h
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="background-image:url(assets/images/home.png);
  background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    -o-background-size: cover;
    width: 100%;
    overflow: hidden;
    line-height:45px;">
        <div class="container">

    <form class="well form-horizontal" action="" method="post"  id="contact_form">
      <div class="simbol">
      <a href="index.php" class="glyphicon glyphicon-remove silang"></a></div>
<fieldset>

<!-- Form Name -->
<legend><center><h2><b style="color: black;">Registrasi</b></h2></center></legend><br>

<!-- Text input-->
 
<div class="form-group">
  <label class="col-md-4 control-label">Nama Awal</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="namaawal" placeholder="Nama Awal" class="form-control"  type="text" required>
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Nama Akhir</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="namaakhir" placeholder="Nama Akhir" class="form-control"  type="text">
    </div>
  </div>
</div>

 <!--  <div class="form-group"> 
  <label class="col-md-4 control-label">Department / Office</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="department" class="form-control selectpicker">
      <option value="">Select your Department/Office</option>
      <option>Department of Engineering</option>
      <option>Department of Agriculture</option>
      <option >Accounting Office</option>
      <option >Tresurer's Office</option>
      <option >MPDC</option>
      <option >MCTC</option>
      <option >MCR</option>
      <option >Mayor's Office</option>
      <option >Tourism Office</option>
    </select>
  </div> -->
<!-- </div>
</div> -->
  
<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Username</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="username" placeholder="Username" class="form-control"  type="text" required maxlength="10" minlength="8">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="password" placeholder="Password" class="form-control"  type="password" required maxlength="8" minlength="6">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Confirm Password</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="passwordkonfirmasi" placeholder="Password Konfirmasi" class="form-control"  type="password" required maxlength="8" minlength="6">
    </div>
  </div>
</div>

<!-- Text input-->
  <!--      <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
    </div>
  </div>
</div>
 -->

<!-- Text input-->
       
<!-- <div class="form-group">
  <label class="col-md-4 control-label">Contact No.</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="contact_no" placeholder="(639)" class="form-control" type="text">
    </div>
  </div>
</div>
 -->
<!-- Select Basic -->

<!-- Success message -->
<!-- <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div> -->

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" name="submit" class="btn btn-primary" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div><!-- /.container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/buatan.js"></script>
  </body>
</html>