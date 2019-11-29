<?php
include "../../koneksi/koneksi.php";
$noform= $_GET ['noform'];

	$ubah="UPDATE tb_dokumen SET status = 'Proses' WHERE no_form ='$noform' ";

	mysqli_query($koneksi,$ubah);

	echo "
	<script>
	alert('Data Pemohon Berhasil Di Ubah Menjadi Proses');
	document.location.href='../indexadmin.php?admin=cekizinpemohon';
	</script>
	";
	
?>