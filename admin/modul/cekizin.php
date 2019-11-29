<?php 
	include '../koneksi/koneksi.php';
  // $query=mysqli_query($koneksi,"SELECT * FROM tb_perusahaan JOIN tb_pemohon ON tb_perusahaan.no_form=tb_pemohon.no_form JOIN tb_dokumen ON tb_perusahaan.no_form=tb_dokumen.no_form ");
  
   
	$gabung=mysqli_query($koneksi,"SELECT * FROM tb_perusahaan JOIN tb_pemohon ON tb_perusahaan.no_form=tb_pemohon.no_form JOIN tb_dokumen ON tb_perusahaan.no_form=tb_dokumen.no_form ");

 ?>

 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Cek Izin Pemohon</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="height: 80px;">
    <h2 class="text-center"><b>Cek Izin Pemohon</b></h2>
    <hr  style=" border-top: 1px solid grey;">
    <div class="container" style="padding-top: 10px;background-image: url(../images/eight_horns.png);border-radius: 10px;border:2px ridge red;">
    <div class="row">
    	<div class="col-sm-12 ">
    		<table class="table table-striped ">
    			<tr align="center">
    			<thead>
    			<th>No.</th>
    			<th>No.Form</th>
    			<th>Tanggal</th>
    			<th>Nama Perusahaan</th>
    			<th>Alamat</th>
    			<th>Kontak</th>
    			<th>Status</th>
    			<th>Aksi</th>
    			</thead>
    			</tr>
    			<?php $i=1; ?>
    			<?php while($gabungan=mysqli_fetch_assoc($gabung)) :?>

             		

    			<tr>
    				<tbody>
    				<td><?=$i; ?></td>
    				<td><?=$gabungan['no_form']; ?></td>
    				<td><?=$gabungan['tanggal_daftar']; ?></td>
    				<td><?=$gabungan['nama_perusahaan']; ?></td>
    				<td><?=$gabungan['alamat']; ?></td>
    				<td><?=$gabungan['kontak']; ?></td>
    				<td><?=$gabungan['status']; ?></td>

    				<td><a  name="terima" href="modul/terima.php?noform=<?=$gabungan['no_form']; ?>" class="btn btn-primary" onclick="return confirm('Apakah Anda Ingin Mengubah Status Menjadi Di Terima ?')" >Terima</a>&nbsp;&nbsp;<a name="tolak" class="btn btn-danger" href="modul/tolak.php?noform=<?=$gabungan['no_form']; ?>" onclick="return confirm('Apakah Anda Ingin Mengubah Status Menjadi Di Tolak ?')" >Tolak</a>&nbsp;&nbsp;<a href="#" data-toggle="modal" data-target=".bs-example-modal-lg<?php echo $gabungan['no_form']; ?>">Lihat Detail</a>

    			<?php  

             		$noform=$gabungan['no_form']; 
             		$tanggal=$gabungan['tanggal_daftar'];
             		$namapemohon=$gabungan['nama_pemohon'];
             		$namaperusahaan=$gabungan['nama_perusahaan'];
             		$alamat=$gabungan['alamat'];
             		$kontak=$gabungan['kontak'];
             		$luas=$gabungan['luas_bangunan'];
             		$ktp=$gabungan['ktp'];
             		$pbb=$gabungan['pbb'];
             		$surat=$gabungan['surat_tanah'];
             		?>
             			
        <div class="modal fade bs-example-modal-lg<?php echo $gabungan['no_form']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                   Detail Pemohon
                </h4>
            </div>
                        
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">No.Form</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" 
                        id="inputEmail3" value="<?=$noform; ?>" disabled />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Tanggal Daftar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                            id="inputPassword3" value="<?=$tanggal; ?>" disabled />
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Nama Pemohon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                            id="inputPassword3" value="<?=$namapemohon; ?>" disabled />
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Nama Perusahaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                            id="inputPassword3" value="<?=$namaperusahaan; ?>" disabled />
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                            id="inputPassword3" value="<?=$alamat; ?>" disabled />
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Kontak</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                            id="inputPassword3" value="<?=$kontak;  ?>" disabled />
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Luas  M <sup>2</sup>  </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                            id="inputPassword3" value="<?=$luas;  ?>" disabled />
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Gambar KTP</label>
                    <div class="col-sm-10">
                        <img width="150" src="../images/<?=$ktp; ?>" >
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Gambar PBB</label>
                    <div class="col-sm-10">
                        <img width="150" src="../images/<?=$pbb; ?>">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Gambar Surat Tanah</label>
                    <div class="col-sm-10">
                            <img width="150" src="../images/<?=$surat; ?>">
                    </div>
                  </div>
                </form>
                

                
                
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
            </div>
        </div>
    </div>
</div>
</td>
            </tbody>
          </tr>

    				<?php $i++;?>

    			<?php endwhile; ?>

    		</table>
    	</div>
    </div>
    </div>
  

	
 

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>