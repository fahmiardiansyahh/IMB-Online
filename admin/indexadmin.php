<?php 
	session_start();
	include '../koneksi/koneksi.php';

if (!isset($_SESSION['loginadmin']) ) {
	 echo "
			<script>
			alert('Anda Harus Login Terlebih Dahulu !');
			document.location.href='loginadmin.php';
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
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/skel.css" />
			<link rel="stylesheet" href="../css/style.css" />
			<link rel="stylesheet" href="../css/style-xlarge.css" />
		
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="../js/jquery.min.js"></script>
		<script src="../js/skel.min.js"></script>
		<script src="../js/skel-layers.min.js"></script>
		<script src="../js/init.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header">
				<h1><a href="indexadmin.php"><img src="../assets/images/logo.png" height="40"></a></h1>
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
 		$arrayisi=mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE id_admin='$_SESSION[id_admin]'");
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
        $query=mysqli_query($koneksi,"UPDATE tb_admin SET password='$passwordbaru' WHERE id_admin='$_SESSION[id_admin]' ");
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
				<h2>Hi.Selamat Datang Admin <?=$_SESSION['namaadmin']; ?></h2>
				<p>Di WebSite IMB Online Kabupaten Bogor</p>
			</section>

		<!-- One -->
			<section id="one" class="wrapper style1 special">
				<div class="container">
					<header class="major">
						<h2>Silahkan Pilih Menu Di Bawah Ini!!</h2>
					</header>
					<div class="row 150%">
						<div class="3u 12u$(medium)">
							<section class="box">
								<a href="indexadmin.php?admin=cekizinpemohon"><i class="icon big rounded color3 fas fa-search"></i></a>
								<h3>Cek Izin Pemohon</h3>
							</section>
						</div>
						<div class="3u 12u$(medium)">
							<section class="box">
								<a href="#" data-toggle="modal" data-target="#detailuser"><i class="icon big rounded color9 far fa-eye"></i></a>
								<h3>Lihat User</h3>
								<!-- onclick="this.href='javascript:void(0)';this.disabled=1" -->
								<!--  style="opacity:0.6;" -->
							</section>
						</div>
						<div class="3u 12u$(medium)">
							<section class="box" style="height: 255px; ">
								<a href="#" data-toggle="modal" data-target="#cetaklaporan"><i class="icon big rounded color1 far fa-print"></i></a>
								<h3>Cetak Laporan</h3>
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
			<section>
			   <?php
            if(isset($_GET['admin'])){
            if($_GET['admin']=="cekizinpemohon")
              include "modul/cekizin.php"; }?>
       </section>
			<!-- Modal -->
			 <div class="modal fade" id="detailuser" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                   User
                </h4>
            </div>

          

             		
             	

             	          
            <!-- Modal Body -->
            <div class="modal-body">
                
                <table class="table table-striped" width="100%">
          <tr>

        

            <th width="25%">No.</th>
           	<th width="25%">Username</th>
           	<th width="25%">Password</th>
           	<th width="25%">Nama Profil</th>
        	</tr>
        	<tr>
        		  	<?php 
          	$user=mysqli_query($koneksi,"SELECT * FROM tb_user");

          	 ?>
          	 <?php $i=1; ?>
          	 <?php  while($isiuser=mysqli_fetch_assoc($user)): ?>
        		<td><?=$i; ?></td>
        		<td><?=$isiuser['username']; ?></td>
        		<td><?=$isiuser['password']; ?></td>
        		<td><?=$isiuser['nama']; ?></td>

        	</tr>
      		<?php $i++ ?>
      		<?php endwhile; ?>
        </table>

                
                
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
            	<a class="btn btn-success" href="modul/cetakuser.php" target="_blank">
                    Cetak
  				</a>
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Tutup
                </button>
            </div>
        </div>
    </div>
</div>
			<!-- Akhir Modal -->

		<!-- modal Cetak laporan -->
		<!-- Modal -->
<div class="modal fade" id="cetaklaporan" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Cetak Laporan
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <h3 class="text-center">Pilih Tanggal Yang Ingin Di Cetak</h3>
                <form class="form-horizontal" role="form" method="POST" action="modul/cetaklaporan.php" target="_blank">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">TANGGAL :</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" 
                        id="inputEmail3" placeholder="Email" name="tanggal"  required />
                    </div>
                  </div>
              
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="carilaporan">
                    Proses
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



<!--   	<?php 
  	// if (isset($_POST['carilaporan']) ){

  	// 	header("LOCATION : cetaklaporan.php");



  	// }



  	 ?>
 -->

		<!-- Akhir Modal Cetak Laporan -->
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