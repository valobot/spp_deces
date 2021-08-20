<?php
	include "../koneksi.php";
	$id_byr = $_GET['id_byr'];
	$myquery =  "delete from bayar where id_byr ='$id_byr' limit 1"; 
	$hapus = mysql_query($myquery) or die ("gagal menghapus"); 
	header ("location:?page=spp");
 ?>
