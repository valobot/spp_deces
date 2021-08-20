<?php
	include "dt/koneksi.php";
 
	$nis = $_GET['nis'];
	$query = mysqli_query("delete from siswa where nis='$nis'");
 
	if ($query) {
		header('location:?page=sis');
	}
?>