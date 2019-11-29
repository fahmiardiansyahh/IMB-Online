<?php 
	session_start();
	include 'koneksi/koneksi.php';

if (!isset($_SESSION['login']) ) {
	 echo "
			<script>
			alert('Anda Harus Login Terlebih Dahulu !');
			document.location.href='login.php';
			</script>";

}

 ?>
<!DOCTYPE html>
<!--
	Transit by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>IMB ONLINE </title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header">
				<h1><a href="index.html"><img src="assets/images/logo.png" height="40"></a></h1>
				<nav id="nav">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a  data-toggle="modal" data-target="#editpassword" href="">Edit Password</a></li>
						<li><a href="logout.php" class="button special">Logout</a></li>
					</ul>
				</nav>
			</header>
			<div class="modal fade" id="editpassword" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">
                  <b>Edit Password</b>
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form" action="" method="POST">
                  <div class="form-group">
                    <label  class="col-sm-5 control-label"
                              for="passwordlama">Masukan Password Lama :</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" 
                        id="passwordlama" placeholder="Password Lama" name="passwordlama" required maxlength="8" minlength="6">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-5 control-label"
                          for="passwordbaru" >Masukan Password Baru</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control"
                            id="passwordbaru" placeholder="Password Baru" name="passwordbaru" required maxlength="8" minlength="6">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-5 control-label"
                          for="konfirmasipassword" >Masukan Konfirmasi Password </label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control"
                            id="konfirmasipassword" placeholder="Password Baru" name="konfirmasipassword" required maxlength="8" minlength="6">
                    </div>
                  </div>
            </div>
    <p style="text-align: center; color: red; font-style: italic;">
    		
    	<?php 
 		$arrayisi=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE id_pemohon='$_SESSION[id_pemohon]'");
 		while ($query=mysqli_fetch_assoc($arrayisi) ) {
 			$passworddatabase=$query['password'];
 		}
 		if (isset($_POST['simpan']) ) {

 			$passwordlama=$_POST['passwordlama'];
 			$passwordbaru=$_POST['passwordbaru'];
 			$konfirmasi=$_POST['konfirmasipassword'];
 		 if ($_POST['passwordlama'] != $passworddatabase){
 		 echo "<script>
                alert('Password Lama Yang Anda Masukan Salah !!!');
                </script>"; 	
        echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span>   <a style='color:black'>".'Password Lama Yang Anda Masukan Salah!!!'."</a></div>";  
      }else if ($passwordbaru === $konfirmasi ){
        $query=mysqli_query($koneksi,"UPDATE tb_user SET password='$passwordbaru' WHERE id_pemohon='$_SESSION[id_pemohon]' ");
        echo "<script>
                alert('Password Anda Berhasil Di Ubah !!!');
                </script>";
        echo "<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span>   <a style='color:black'>".'Password Anda Berhasil Di Ubah !!!'."</a></div>";
      }else{
      	echo "<script>
                alert('Password Baru dan Konfirmasi Password Anda Berbeda !!!');
                </script>";
        echo "<div class='alert alert-danger'><span class='glyphicon glyphicon-info-sign'></span>   <a style='color:black'>".'Password Baru dan Konfirmasi Password Anda Berbeda !!!'."</a></div>";
      }
 		}

 	 ?>




    </p>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
            	 <button type="submit" name="simpan" class="btn btn-primary">
                    Simpan
                </button>
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Tutup
                </button>
            </div>
        </div>
    </div>
</div>
     </form>
		<!-- Banner -->
			<section id="banner">
				<h2>Hi.Selamat Datang <?=$_SESSION['nama']; ?></h2>
				<p>Di WebSite IMB Online Kabupaten Bogor</p>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="container">
					<header class="major">
						<h2>Silahkan Pilih Menu Untuk Mendaftar</h2>
					</header>
					<div class="row 150%">
						<div class="3u 12u$(medium)">
							<section class="box">
								<a href="formpemohon.php"><i class="icon big rounded color3 fal fa-file"></i></a>
								<h3>FORM.PEMOHON</h3>
							</section>
						</div>
						<div class="3u 12u$(medium)">
							<section class="box" style="opacity:0.6;">
								<a href="formulirperusahaan.php" onclick="this.href='javascript:void(0)';this.disabled=1" ><i class="icon big rounded color9 fal fa-file"></i></a>
								<h3>FORM.PERUSAHAAN</h3>
								<!-- onclick="this.href='javascript:void(0)';this.disabled=1" -->
								<!--  style="opacity:0.6;" -->
							</section>
						</div>
						<div class="3u 12u$(medium)">
							<section class="box" style="height: 255px; opacity: 0.6;">
								<a href="formupload.php" onclick="this.href='javascript:void(0)';this.disabled=1"><i class="icon big rounded color1 fal fa-upload"></i></a>
								<h3>UPLOAD DOKUMEN</h3>
							</section>
						</div>
						<div class="3u 12u$(medium)">
							<section class="box">
								<a href="https://www.youtube.com/channel/UCiaWqqpD5ZTRDP0c48HHE0A?view_as=subscriber" target="_blank"><i class="icon big rounded color6 fab fa-youtube"></i></a>
								<h3>VIDEO AMATIRAN</h3>
							</section>
						</div>
					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>RIWAYAT DAFTAR</h2>
					</header>
					<section class="profiles">
						<table class="table table-bordered">
  						<tr>
  							<th>TANGGAL DAFTAR</th>
  							<th>NO.FORMULIR</th>
  							<th>NAMA PEMOHON</th>
  							<th>NAMA PERUSAHAAN</th>
  							<th>JENIS IZIN</th>
  							<th>STATUS</th>
  							<th>AKSI</th>
  						</tr>
  						<tr>
  		
  		<?php 
  		$gabung=mysqli_query($koneksi,"SELECT * FROM tb_perusahaan JOIN tb_pemohon ON tb_perusahaan.no_form=tb_pemohon.no_form JOIN tb_dokumen ON tb_perusahaan.no_form=tb_dokumen.no_form WHERE tb_pemohon.id_pemohon='$_SESSION[id_pemohon]'");
  		 ?>
  		 <?php while ($gabungan=mysqli_fetch_assoc($gabung)): ?>
  							<td><?= $gabungan['tanggal_daftar']; ?></td>
  							<td><?=$gabungan['no_form']; ?></td>
  							<td><?=$gabungan['nama_pemohon']; ?></td>
  							<td><?= $gabungan['nama_perusahaan']; ?></td>
  							<td><?= $gabungan['jenis_izin']; ?></td>
  							<td><?= $gabungan['status']; ?><td>


  								<?php if ($gabungan['status']==='Diterima'){

  							echo "
  							<a href='modul/cetakkartu.php?noform=$gabungan[no_form]' class='btn btn-primary' target='_blank'> CETAK </a>";


  							}else if ($gabungan['status']==='Ditolak') {
  								echo "

  								<p>
  								<b style='color:red;'>
  								Data Anda Di Tolak
  								</b>
  								</p>
  								";


  							}else {

  								echo "

  								<p><b style='color:orange;'>
  								Data Anda  Sedang Di Proses
  								</b>
  								</p>
  								";

  							}

  						?>

  					
						
						</tr>
					<?php endwhile; ?>
			</table>		
</section>
</div>		
</section>

		

		<!-- Footer -->
		<!-- 	<footer id="footer">
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Untitled. All rights reserved.</li>
								<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
								<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
 -->
	</body>
</html>