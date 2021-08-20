<?php
	include "dt/koneksi.php";
	$no_pendf = $_GET['no_pendf'];
	$myquery =  "delete from calonsiswa where no_pendf ='$no_pendf' limit 1"; 
	$hapus = mysqli_query($myquery) or die ("gagal menghapus"); 
	header ("location:?page=kes");
 ?>
