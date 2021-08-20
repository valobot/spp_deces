<?php
	include "dt/koneksi.php.php";
 
	$id_jrsn = $_GET['id_jrsn'];
	$query = mysqli_query("delete from jurusan where id_jrsn='$id_jrsn'");
 
	if ($query) {
		header('location:?page=jrsn');
	}
?>