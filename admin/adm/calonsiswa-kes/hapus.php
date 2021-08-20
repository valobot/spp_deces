<?php
	include "dt/koneksi.php";
	$no_pendf = $_GET['no_pendf'];
	$myquery =  "delete from calonsiswa_kes where no_pendf ='$no_pendf' limit 1"; 
	$hapus = mysql_query($myquery) or die ("gagal menghapus"); 
	header ("location:?page=kes");
 ?>
