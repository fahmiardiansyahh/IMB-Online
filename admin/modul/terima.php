<?php
session_start();
include "../../koneksi/koneksi.php";
$noform= $_GET ['noform'];

	$result=mysqli_query($koneksi,"SELECT * FROM tb_dokumen WHERE no_form='$noform'");
	while($isiresult=mysqli_fetch_assoc($result) ) {

		if ($isiresult['status']==='Diterima') {

		 echo "
	<script>
	alert('Data Pemohon Sudah Dalam Status Di Terima');
	document.location.href='../indexadmin.php?admin=cekizinpemohon';
	</script>
	";

		}else {

	$ubah="UPDATE tb_dokumen SET status = 'Diterima' WHERE no_form ='$noform' ";

	$ubahsimpan=mysqli_query($koneksi,$ubah);

		}


	}


	if ($ubahsimpan) {

		$query=mysqli_query($koneksi,"SELECT * FROM tb_perusahaan WHERE no_form='$noform'");

		while ($isiquery=mysqli_fetch_assoc($query) ) {

				$nomorform=$isiquery['no_form'];
				$namaperusahaan=$isiquery['nama_perusahaan'];
				$tgldaftar=$isiquery['tanggal_daftar'];
				$alamat=$isiquery['alamat'];
				$jenisizin=$isiquery['jenis_izin'];
				$luasbangunan=$isiquery['luas_bangunan'];
				$totalbiaya=(24000) * ($isiquery['luas_bangunan']);
			$masaberlaku=date('Y-m-d',time()+60*60*24*7);
			$id_admin=$_SESSION['id_admin'];

			$simpan="INSERT INTO tb_diterima VALUES (

			'$nomorform','$namaperusahaan','$tgldaftar','$alamat','$jenisizin','$luasbangunan','$totalbiaya','$masaberlaku','$id_admin'




			)";

			mysqli_query($koneksi,$simpan);
		}	
	}


	 echo "
	<script>
	alert('Data Pemohon Berhasil Di Ubah Menjadi Di Terima');
	document.location.href='../indexadmin.php?admin=cekizinpemohon';
	</script>
	";
	
?>



<!-- echo "
	<script>
	alert('Data Pemohon Berhasil Di Ubah Menjadi Di Terima');
	document.location.href='../indexadmin.php?admin=cekizinpemohon';
	</script>
	";
	 -->