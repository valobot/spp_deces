<?php
	include "dt/koneksi.php";
 
	$id = $_GET['id'];
	$query = mysqli_query("delete from pengeluaran_sklh where id='$id'");
 
	if ($query) {
		header('location:?page=sklh');
	}
?>
