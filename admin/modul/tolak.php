<?php
include "../../koneksi/koneksi.php";
$noform= $_GET ['noform'];
$result=mysqli_query($koneksi,"SELECT * FROM tb_dokumen WHERE no_form='$noform'");
	while($isiresult=mysqli_fetch_assoc($result) ) {


		if ($isiresult['status']==='Ditolak') {

		 echo "
	<script>
	alert('Data Pemohon Sudah Dalam Status Di Tolak Masa Mau Di tolak Terus !!!');
	document.location.href='../indexadmin.php?admin=cekizinpemohon';
	</script>


	";
	}
	else{
	$ubah="UPDATE tb_dokumen SET status = 'Ditolak' WHERE no_form ='$noform' ";

	$ubahtolak=mysqli_query($koneksi,$ubah);
	}
}
	if ($ubahtolak) {
	$query="DELETE FROM tb_diterima WHERE no_form ='$noform'";
	
	mysqli_query($koneksi,$query);

	}
	echo "
	<script>
	alert('Data Pemohon Berhasil Di Ubah Menjadi Di Tolak');
	document.location.href='../indexadmin.php?admin=cekizinpemohon';
	</script>
	";
?>

<!--  -->