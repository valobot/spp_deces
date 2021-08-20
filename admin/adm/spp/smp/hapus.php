<?php
	include "dt/koneksi.php";
 
	$id_sppsmp = $_GET['id_sppsmp'];
	$query = mysqli_query("delete from spp_smp where id_sppsmp='$id_sppsmp'");
 
	if ($query) {
		header('location:?page=sppsmp');
	}
?>