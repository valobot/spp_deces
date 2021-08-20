<?php
	include "dt/koneksi.php";
 
	$id_kelas = $_GET['id_kelas'];
	$query = mysqli_query("delete from kelas where id_kelas='$id_kelas'");
 
	if ($query) {
		header('location:?page=kls');
	}
?>