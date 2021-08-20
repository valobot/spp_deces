<?php
	include "dt/koneksi.php";
 
	$id_yps = $_GET['id_yps'];
	$query = mysqli_query("delete from pengeluaran_sklh where id_yps='$id_yps'");
 
	if ($query) {
		header('location:?page=sklh');
	}
?>
